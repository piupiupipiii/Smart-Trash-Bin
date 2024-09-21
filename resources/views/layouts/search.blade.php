<div class="flex flex-col sm:flex-row gap-3 justify-center rounded-md ring-1 ring-inset ring-gray-300 py-5 mb-5">
    <div>
        <label for="query" class="block font-medium leading-6 text-gray-900">Search</label>
        <div class="relative mt-2 rounded-md shadow-sm">
            <input type="text" name="query" id="query" class="block w-full rounded-md border-0 py-1.5 pl-4 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6" placeholder="Hotel name or location">
        </div>
    </div>
    <div>
        <label for="search_type" class="block font-medium leading-6 text-gray-900">Search Type</label>
        <div class="relative mt-2 rounded-md shadow-sm">
            <select name="search_type" id="search_type" class="block w-full rounded-md border-0 py-1.5 pl-4 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6">
                <option value="hotel_name">Hotel Name</option>
                <option value="location">Location</option>
            </select>
        </div>
    </div>
    <div>
        <label for="check_in" class="block font-medium leading-6 text-gray-900">Check-in</label>
        <div class="relative mt-2 rounded-md shadow-sm">
            <input type="date" name="check_in" id="check_in" class="block w-full rounded-md border-0 py-1.5 pl-4 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6" placeholder="Hotel name or location">
        </div>
    </div>
    <div>
        <label for="check_out" class="block font-medium leading-6 text-gray-900">Check-out</label>
        <div class="relative mt-2 rounded-md shadow-sm">
            <input type="date" name="check_out" id="check_out" class="block w-full rounded-md border-0 py-1.5 pl-4 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6" placeholder="Hotel name or location">
        </div>
    </div>
    <button type="submit" class="h-min mt-auto text-white bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2 text-center dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800">Search</button>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var searchInput = document.getElementById('query');
        var searchType = document.getElementById('search_type');
        var checkIn = document.getElementById('check_in');
        var checkOut = document.getElementById('check_out');
        var searchBtn = document.querySelector('.search-btn');

        searchBtn.addEventListener('click', function () {
            var query = searchInput.value;
            var type = searchType.value;
            var checkInDate = checkIn.value;
            var checkOutDate = checkOut.value;

            // Lakukan logika pencarian di sini
            console.log('Query:', query);
            console.log('Search Type:', type);
            console.log('Check-in Date:', checkInDate);
            console.log('Check-out Date:', checkOutDate);

            // Contoh logika pencarian:
            // Kirimkan query dan jenis pencarian ke server menggunakan AJAX
            // Kemudian, perlihatkan hasil pencarian di halaman
        });
    });
</script>
