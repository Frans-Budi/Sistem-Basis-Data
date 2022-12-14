// Ambil Element yang dibutuhkan
var kuli = document.getElementById('Kuli');
var mandor = document.getElementById('Mandor');
var container = document.getElementById('container');

// Tambahkan Event ketika mandor diclick
mandor.addEventListener('click', function () {

    // Buat Objek Ajax
    var xhr = new XMLHttpRequest();

    // Cek kesiapan Ajax
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            container.innerHTML = xhr.responseText;
        }
    }

    // Eksekusi ajax
    xhr.open('GET', 'ajax/tipe_mandor.php', true);
    xhr.send();

});

// Tambahkan Event ketika kuli diclick
kuli.addEventListener('click', function () {

    // Buat Objek Ajax
    var xhr = new XMLHttpRequest();

    // Cek kesiapan Ajax
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            container.innerHTML = xhr.responseText;
        }
    }

    // Eksekusi ajax
    xhr.open('GET', 'ajax/tipe_kuli.php', true);
    xhr.send();

});