// Ambil elemen yang dibutuhkan
var keyword = document.getElementById('keyword');
var container = document.getElementById('container');

// Tambahkan event ketika keyboard ditulis
keyword.addEventListener('keyup', function () {

    // Buat Objek Ajax
    var xhr = new XMLHttpRequest();

    // Cek Kesiapan Ajax
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            container.innerHTML = xhr.responseText;
        }
    }

    // Eksekusi ajax
    xhr.open('GET', 'ajax/search_mitra.php?keyword=' + keyword.value, true);
    xhr.send();
});