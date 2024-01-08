@extends('layouts.app')

@section('content')
    <form action="{{ route('register.store') }}" method="post" class="flex flex-col gap-4 justify-center rounded-md ring-1 ring-inset ring-gray-300 py-10 px-8 mb-5">
        @csrf
        <div>
            <label for="name" class="block font-medium leading-6 text-gray-900">Nama</label>
            <div class="relative mt-2 rounded-md shadow-sm">
                <input type="text" id="name" name="name" required class="block w-full rounded-md border-0 py-2 px-[1rem] text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6">
            </div>
        </div>
        <div>
            <label for="email" class="block font-medium leading-6 text-gray-900">Email</label>
            <div class="relative mt-2 rounded-md shadow-sm">
                <input type="email" id="email" name="email" required class="block w-full rounded-md border-0 py-2 px-[1rem] text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6">
            </div>
        </div>
        <div>
            <label for="phone" class="block font-medium leading-6 text-gray-900">Phone</label>
            <div class="relative mt-2 rounded-md shadow-sm">
                <input type="text" id="phone" name="phone" required class="block w-full rounded-md border-0 py-2 px-[1rem] text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6">
            </div>
        </div>
        <div>
            <label for="password" class="block font-medium leading-6 text-gray-900">Password</label>
            <div class="relative mt-2 rounded-md shadow-sm">
                <input type="password" id="password" name="password" required class="block w-full rounded-md border-0 py-2 px-[1rem] text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6">
            </div>
        </div>
        <button type="submit" class="h-min mt-auto text-white bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg w-full sm:w-auto px-5 py-3 text-center dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800">Register</button>
    </form>
@endsection
