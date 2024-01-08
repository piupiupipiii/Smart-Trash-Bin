<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use App\Models\Room;
use chillerlan\QRCode\Common\EccLevel;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    public function create(Request $request)
    {
        if (! $room = Room::with(['hotel'])->find((int) $request->room)) {
            abort(404);
        }

        return view('pages.booking.create', ['room' => $room]);
    }

    public function store(Request $request)
    {
        if (! $room = Room::with(['hotel'])->find((int) $request->room_id)) {
            abort(404);
        }

        $order = new Order;
        $order->user_id = auth()->user()->id;
        $order->room_id = $room->id;
        $order->total_adults = $request->total_adults;
        $order->total_children = $request->total_children;
        $order->check_in = $request->checkin_date;
        $order->check_out = $request->checkout_date;
        $order->message = $request->visitor_message ?: '';
        $order->save();

        $payment = new Payment;
        $payment->order_id = $order->id;
        $payment->price = $room->price * abs(Carbon::parse($request->checkin_date)->diffInDays(Carbon::parse($request->checkout_date)));
        $payment->token = base64_encode(sprintf(
            '%s-%d:%s-%s',
            now()->format("Ymd-{$room->hotel->id}-{$room->id}-His"),
            auth()->user()->id,
            auth()->user()->email,
            str(Str::random())->upper(),
        ));
        $payment->save();

        return redirect()->route('booking.detail', ['id' => $order->id]);
    }

    public function detail(int $id, Request $request)
    {
        if (! $order = Order::with('payment')->where(['id' => $id, 'user_id' => auth()->user()->id])->first()) {
            abort(404);
        }

        $qr = (new QRCode)
            ->setOptions(new QROptions(['eccLevel' => EccLevel::H]))
            ->render($order->payment->token);

        return view('pages.booking.detail', ['order' => $order, 'qr' => $qr]);
    }

    public function cancel(Request $request)
    {
        if (! $order = Order::where(['id' => $request->id, 'user_id' => auth()->user()->id])->first()) {
            abort(404);
        }

        $order->delete();

        return redirect()->route('profile.index');
    }
}
