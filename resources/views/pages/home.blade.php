@extends('layouts.app')

@section('content')
@include('layouts.search')
    <ul>
        @foreach($hotels as $hotel)
            <li class="rounded-md ring-1 ring-inset ring-gray-300 py-10 px-8 mb-5 grid grid-cols-2 gap-5">
                @if($image = $hotel->images->first())
                    <img src="{{ asset($image->path) }}" alt="{{ $image->alt }}" class="rounded-md object-cover w-full">
                @endif

                <div>
                    <h2 class="font-bold text-3xl mb-3">{{ $hotel->name }}</h2>
                    <span class="block">{{ $hotel->address }}</span>
                    <span class="block">
                        @for($i = 1; $i <= 5; ++$i)
                            @if($i <= $hotel->stars)
                                <i class="bi bi-star-fill"></i>
                            @else
                                <i class="bi bi-star"></i>
                            @endif
                        @endfor
                    </span>

                    <div class="mt-5">
                        <h3 class="mb-3 text-xl font-medium">Fasilitas</h3>

                        <div class="flex flex-row gap-5">
                            @foreach($hotel->facilities as $facility)
                                <div class="flex flex-col items-center">
                                    @if(str($facility->icon)->startsWith('bi'))
                                        <i class="{{ $facility->icon }} w-auto text-2xl"></i>
                                    @else
                                        <img src="{{ asset($facility->icon) }}" alt="icon" class="w-auto h-[2rem]">
                                    @endif

                                    <p class="text-sm">{{ $facility->name }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <a href="{{ route('hotel', ['id' => $hotel->id]) }}" class="block rounded-md ring-1 ring-inset ring-gray-300 px-3 py-2.5 mt-5 text-center focus:ring-2 focus:ring-inset focus:ring-sky-600 bg-blue-500 hover:bg-purple-600 focus:bg-purple-600 text-white font-bold rounded-lg transition duration-300 ease-in-out">Detail</a>

                </div>
            </li>
        @endforeach
    </ul>
@endsection

@push('script')
    <script src="{{ asset('assets/js/pages/home/script.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var searchInput = document.getElementById('searchInput')
            searchInput.addEventListener('input', performSearch)

            $('.search-btn').on('click', filterRooms)
        })

        function performSearch () {
            var searchQuery = document.getElementById('searchInput').value.toLowerCase()
            var hotels = document.querySelectorAll('.hotel-info h2')

            hotels.forEach(function (hotel) {
                var hotelName = hotel.textContent.toLowerCase()
                var parentHotel = hotel.closest('.hotel')
                var isVisible = hotelName.includes(searchQuery)

                parentHotel.style.display = isVisible ? 'block' : 'none'
            })
        }

        function filterRooms () {
            var selectedNeeds = $('input[data-need]:checked').map(function () {
                return $(this).data('need')
            }).get()

            $('.room-info-table tr').hide()

            if (selectedNeeds.length > 0) {
                selectedNeeds.forEach(function (need) {
                    $('.room-info-table tr[data-needs*="' + need + '"]').show()
                })
            } else {
                $('.room-info-table tr').show()
            }
        }
    </script>
@endpush
