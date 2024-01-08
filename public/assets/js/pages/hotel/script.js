// scripts.js

$(document).ready(function () {
    // JS1 - Tanggal Check-in dan Check-out
    var currentDateTime = new Date();
    var year = currentDateTime.getFullYear();
    var month = (currentDateTime.getMonth() + 1);
    var date = currentDateTime.getDate() + 1;

    if (date < 10) {
        date = '0' + date;
    }
    if (month < 10) {
        month = '0' + month;
    }

    var dateTomorrow = year + "-" + month + "-" + date;
    var checkinElem = $(".date-input[placeholder='Check-in Date']");
    var checkoutElem = $(".date-input[placeholder='Check-out Date']");

    checkinElem.attr("min", dateTomorrow);

    checkinElem.on("change", function () {
        checkoutElem.attr("min", this.value);
    });

    // JS2 - Room Information
    // Dummy data for room information
    const roomData = [
        { image: "superior_santika.jpeg", name: "Superior Room", description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque.", needs: ["free-cancellation", "free-breakfast"] },
        { image: "deluxe_santika.jpeg", name: "Deluxe Room", description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque.", needs: ["extra-benefit", "large-bed"] },
        { image: "executive_santika.jpeg", name: "Executive Room", description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque.", needs: ["free-breakfast", "large-bed"] }
    ];

    // Populate room information table
    const roomInfoTable = $(".room-info-table");
    roomData.forEach(room => {
        const needsAttr = room.needs.map(need => `data-need="${need}"`).join(' ');
        roomInfoTable.append(`
            <tr ${needsAttr}>
                <td>
                    <img src="${room.image}" alt="Gambar Kamar">
                </td>
                <td>
                    <h5>${room.name}</h5>
                    <p class="room-description">${room.description}</p>
                </td>
                <td>
                    <button class="book-room-btn" data-room="${room.name}">Pesan Kamar</button>
                </td>
            </tr>
        `);
    });

    // Handle room booking button click
    roomInfoTable.find('.book-room-btn').on('click', function () {
        const roomName = $(this).data('room');
        alert(`Room "${roomName}" booked!`); // Replace this with your actual booking logic
    });

    // Event handler untuk setiap perubahan pada checkbox
    $('.search-by-need-btn').on('click', filterRooms);

    // Inisialisasi pemfilteran kamar
    filterRooms();

    // JS3 - Pencarian Hotel berdasarkan Nama atau Lokasi
    var searchInput = document.getElementById('searchInput');
    searchInput.addEventListener('input', performSearch);

    function performSearch() {
        var searchQuery = searchInput.value.toLowerCase();
        var hotels = document.querySelectorAll('.hotel-info h2');

        hotels.forEach(function (hotel) {
            var hotelName = hotel.textContent.toLowerCase();
            var parentHotel = hotel.closest('.hotel');
            var isVisible = hotelName.includes(searchQuery);

            parentHotel.style.display = isVisible ? 'block' : 'none';
        });
    }
});
