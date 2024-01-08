@extends('layouts.app')

@section('content')
    <p class="rounded-md ring-1 ring-inset ring-gray-300 py-5 px-8 mb-5">
        Booking di hotel <b>{{ $order->room->hotel->name }}</b> ({{ $order->room->hotel->address }})
        dengan kamar <b>{{ $order->room->name }}</b> berhasil!
    </p>

    <div class="flex flex-col gap-4 justify-center rounded-md ring-1 ring-inset ring-gray-300 py-10 px-8 mb-5">
        <div>
            <label for="hotel-name" class="block font-medium leading-6 text-gray-900">Hotel</label>
            <div class="relative mt-2 rounded-md shadow-sm">
                <input type="text" id="hotel-name" readonly value="{{ $order->room->hotel->name }}" class="block w-full rounded-md border-0 py-2 px-[1rem] text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6">
            </div>
        </div>
        <div>
            <label for="hotel-address" class="block font-medium leading-6 text-gray-900">Alamat</label>
            <div class="relative mt-2 rounded-md shadow-sm">
                <input type="email" id="hotel-address" readonly value="{{ $order->room->hotel->address }}" class="block w-full rounded-md border-0 py-2 px-[1rem] text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6">
            </div>
        </div>
        <hr>
        <div>
            <label for="room" class="block font-medium leading-6 text-gray-900">Kamar</label>
            <div class="relative mt-2 rounded-md shadow-sm">
                <input type="text" id="room" readonly value="{{ $order->room->name }}" class="block w-full rounded-md border-0 py-2 px-[1rem] text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6">
            </div>
        </div>
        <div>
            <label for="date" class="block font-medium leading-6 text-gray-900">Check-in</label>
            <div class="relative mt-2 rounded-md shadow-sm">
                <input type="date" id="date" readonly value="{{ $order->check_in }}" class="block w-full rounded-md border-0 py-2 px-[1rem] text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6">
            </div>
        </div>
        <div>
            <label for="checkout-date" class="block font-medium leading-6 text-gray-900">Check-out</label>
            <div class="relative mt-2 rounded-md shadow-sm">
                <input type="date" id="checkout-date" readonly value="{{ $order->check_out }}" class="block w-full rounded-md border-0 py-2 px-[1rem] text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6">
            </div>
        </div>
        <hr>
        <div>
            <label for="name" class="block font-medium leading-6 text-gray-900">Atas Nama</label>
            <div class="relative mt-2 rounded-md shadow-sm">
                <input type="text" id="name" readonly value="{{ $order->name ?: auth()->user()->name }}" class="block w-full rounded-md border-0 py-2 px-[1rem] text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6">
            </div>
        </div>
        <div>
            <label for="price" class="block font-medium leading-6 text-gray-900">Harga</label>
            <div class="relative mt-2 rounded-md shadow-sm">
                <input type="text" id="price" readonly value="Rp{{ number_format($order->payment->price, 0, ',', '.') }}" class="block w-full rounded-md border-0 py-2 px-[1rem] text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6">
            </div>
        </div>

        <img src="{!! $qr !!}" alt="QR" class="mx-auto h-[25rem]">
    </div>

    @if(str($order->check_in)->toDate() > now()->addDays(3))
        <form action="{{ route('booking.cancel') }}" method="post">
            @csrf
            @method('PATCH')
            <input type="hidden" name="id" value="{{ $order->id }}">
            <button type="submit" class="h-min mt-auto focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-md text-sm w-full sm:w-auto px-5 py-3 text-center dark:focus:ring-sky-800 ring-1 ring-inset ring-gray-300 mb-5">Batalkan</button>
        </form>
    @else
        <div class="mb-5">
            <i>Anda tidak dapat membatalkan booking</i>
        </div>
    @endif
@endsection
