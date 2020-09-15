// ambil element pake Document Object Model
var search = document.getElementById('search');
var tombolCari = document.getElementById('tombol-cari');
var container = document.getElementById('container');

// tambahkan event ketika keywordnya diketik
search.addEventListener('keyup', function() {

	// buat object ajax
	var xhr = new XMLHttpRequest();

	// cek kesiapan ajax
	// 4 = ready, 200 = status OK!
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			container.innerHTML = xhr.responseText;
		}
	}

	// eksekusi ajax
	xhr.open('GET', 'ajax/mobil2.php?search=' + search.value, true);
	xhr.send();


});