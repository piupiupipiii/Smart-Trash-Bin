@extends('layouts.app')

@section('content')
    @if(session('login_invalid'))
        <p class="rounded-md ring-1 ring-inset ring-gray-300 py-5 px-8 mb-5">
            Kombinasi email dan password salah
        </p>
    @endif

    <form action="{{ route('login.authenticate') }}" method="post" class="flex flex-col gap-4 justify-center rounded-md ring-1 ring-inset ring-gray-300 py-10 px-8 mb-5">
        @csrf
        <div>
            <label for="email" class="block font-medium leading-6 text-gray-900">Email</label>
            <div class="relative mt-2 rounded-md shadow-sm">
                <input type="email" id="email" name="email" required class="block w-full rounded-md border-0 py-2 px-[1rem] text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6">
            </div>
        </div>
        <div>
            <label for="password" class="block font-medium leading-6 text-gray-900">Password</label>
            <div class="relative mt-2 rounded-md shadow-sm">
                <input type="password" id="password" name="password" required class="block w-full rounded-md border-0 py-2 px-[1rem] text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6">
            </div>
        </div>
        <button type="submit" class="h-min mt-auto text-white bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg w-full sm:w-auto px-5 py-3 text-center dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800">Login</button>
    </form>
@endsection
