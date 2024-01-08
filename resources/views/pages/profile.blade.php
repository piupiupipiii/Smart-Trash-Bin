@extends('layouts.app')

@section('content')
    <div class="flex flex-col gap-4 justify-center rounded-md ring-1 ring-inset ring-gray-300 py-8 px-8 mb-5">
        <div>
            <label for="name" class="block font-medium leading-6 text-gray-900">Nama</label>
            <div class="relative mt-2 rounded-md shadow-sm">
                <input type="text" id="name" readonly value="{{ $user->name }}" class="block w-full rounded-md border-0 py-2 px-[1rem] text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6">
            </div>
        </div>
        <div>
            <label for="email" class="block font-medium leading-6 text-gray-900">Email</label>
            <div class="relative mt-2 rounded-md shadow-sm">
                <input type="email" id="email" readonly value="{{ $user->email }}" class="block w-full rounded-md border-0 py-2 px-[1rem] text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6">
            </div>
        </div>
        <div>
            <label for="phone" class="block font-medium leading-6 text-gray-900">Nomor Telepon</label>
            <div class="relative mt-2 rounded-md shadow-sm">
                <input type="tel" id="phone" readonly value="{{ $user->phone }}" class="block w-full rounded-md border-0 py-2 px-[1rem] text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6">
            </div>
        </div>
        <hr>
        <p>Mendaftar sejak {{ str($user->created_at)->toDate()->timezone('Asia/Jakarta')->toFormattedDateString() }}</p>
    </div>

    <hr class="my-5">

    <h2 class="text-xl font-bold mb-5">Riwayat Transaksi</h2>

    @if($user->orders->isEmpty())
        <p><i>Belum ada transaksi</i></p>
    @else
        <ol>
            @foreach($user->orders as $order)
                <li class="rounded-md ring-1 ring-inset ring-gray-300 py-8 px-8 mb-5 flex flex-row justify-between">
                    <div>
                        <p class="font-medium">{{ $order->room->hotel->name }}</p>
                        <p>
                            {{ str($order->checkin_date)->toDate()->timezone('Asia/Jakarta')->toFormattedDateString() }}
                            s/d
                            {{ str($order->checkout_date)->toDate()->timezone('Asia/Jakarta')->toFormattedDateString() }}
                        </p>
                    </div>

                    <a href="{{ route('booking.detail', ['id' => $order->id]) }}" class="h-min mt-auto focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-md text-sm w-full sm:w-auto px-5 py-3 text-center dark:focus:ring-sky-800 ring-1 ring-inset ring-gray-300">Detail</a>
                </li>
            @endforeach
        </ol>
    @endif
@endsection

