@extends('layouts.app')

@section('content')
    <p class="rounded-md ring-1 ring-inset ring-gray-300 py-5 px-8 mb-5">
        Anda akan booking di hotel <b>{{ $room->hotel->name }}</b> ({{ $room->hotel->address }})
        dengan kamar <b>{{ $room->name }}</b>
    </p>

    <form action="{{ route('booking.store') }}" method="post" class="flex flex-col gap-4 justify-center rounded-md ring-1 ring-inset ring-gray-300 py-10 px-8 mb-5">
        @csrf
        <input type="hidden" name="room_id" value="{{ $room->id }}">
        <input type="hidden" name="for_themself" value="1">

        <div>
            <label for="name" class="block font-medium leading-6 text-gray-900">Nama</label>
            <div class="relative mt-2 rounded-md shadow-sm">
                <input type="text" id="name" name="visitor_name" pattern="[A-Z\sa-z]{3,20}" required value="{{ auth()->user()->name }}" class="block w-full rounded-md border-0 py-2 px-[1rem] text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6">
            </div>
        </div>
        <div>
            <label for="email" class="block font-medium leading-6 text-gray-900">Email</label>
            <div class="relative mt-2 rounded-md shadow-sm">
                <input type="email" id="email" name="visitor_email" required value="{{ auth()->user()->email }}" class="block w-full rounded-md border-0 py-2 px-[1rem] text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6">
            </div>
        </div>
        <div>
            <label for="phone" class="block font-medium leading-6 text-gray-900">Nomor Telepon</label>
            <div class="relative mt-2 rounded-md shadow-sm">
                <input type="tel" id="phone" name="visitor_phone" pattern="[0-9]{10,14}" required value="{{ auth()->user()->phone }}" class="block w-full rounded-md border-0 py-2 px-[1rem] text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6">
            </div>
        </div>
        <div>
            <label for="adult" class="block font-medium leading-6 text-gray-900">Orang Dewasa</label>
            <div class="relative mt-2 rounded-md shadow-sm">
                <input type="number" id="adult" name="total_adults" min="1" required value="2" class="block w-full rounded-md border-0 py-2 px-[1rem] text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6">
            </div>
        </div>
        <div>
            <label for="child" class="block font-medium leading-6 text-gray-900">Anak-Anak</label>
            <div class="relative mt-2 rounded-md shadow-sm">
                <input type="number" id="child" name="total_children" min="0" required value="0" class="block w-full rounded-md border-0 py-2 px-[1rem] text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6">
            </div>
        </div>
        <div>
            <label for="date" class="block font-medium leading-6 text-gray-900">Check-in</label>
            <div class="relative mt-2 rounded-md shadow-sm">
                <input type="date" id="date" name="checkin_date" required value="{{ now()->toDateString() }}" class="block w-full rounded-md border-0 py-2 px-[1rem] text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6">
            </div>
        </div>
        <div>
            <label for="checkout-date" class="block font-medium leading-6 text-gray-900">Check-out</label>
            <div class="relative mt-2 rounded-md shadow-sm">
                <input type="date" id="checkout-date" name="checkout_date" required value="{{ now()->addDay()->toDateString() }}" class="block w-full rounded-md border-0 py-2 px-[1rem] text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6">
            </div>
        </div>
        <hr>
        <div>
            <label for="message" class="block font-medium leading-6 text-gray-900">Butuh yang lain?</label>
            <div class="relative mt-2 rounded-md shadow-sm">
                <textarea
                    id="message"
                    name="visitor_message"
                    placeholder="Beritahu kami jika ada tambahan yang dibutuhkan"
                    class="block w-full rounded-md border-0 py-2 px-[1rem] text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6"
                ></textarea>
            </div>
        </div>

        <button type="submit" class="h-min mt-auto text-white bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg w-full sm:w-auto px-5 py-3 text-center dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800">Booking Room</button>
    </form>
@endsection
