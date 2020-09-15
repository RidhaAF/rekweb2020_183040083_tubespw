<?php 
// koneksi ke database
function koneksi() {
	$conn = mysqli_connect("localhost", "root", "") or die("Koneksi Gagal!");
	mysqli_select_db($conn, "tubes_183040083") or die("DB Salah!");

	return $conn;
}


function query($query) {
	$conn = koneksi();
	$results = mysqli_query($conn, $query);

	$rows = [];
	while( $row = mysqli_fetch_assoc($results) ) {
		$rows[] = $row;
	}
	return $rows;
}


function tambah($data) {
	$conn = koneksi();

	$foto = upload();
	if( !$foto ) {
		return false;
	}

	$merk = htmlspecialchars($data["merk"]);
	$model = htmlspecialchars($data["model"]);
	$cc = htmlspecialchars($data["cc"]);
	$topspeed = htmlspecialchars($data["topspeed"]);
	$tahunproduksi = htmlspecialchars($data["tahunproduksi"]);
	$negarapembuat = htmlspecialchars($data["negarapembuat"]);
	$harga = htmlspecialchars($data["harga"]);

	$query = "INSERT INTO mobil
				VALUES
			  ('', '$foto', '$merk', '$model', '$cc', '$topspeed', '$tahunproduksi', '$negarapembuat', '$harga')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function upload() {

	$namaFile = $_FILES['foto']['name'];
	$ukuranFile = $_FILES['foto']['size'];
	$error = $_FILES['foto']['error'];
	$tmpName = $_FILES['foto']['tmp_name'];

	// cek apakah tidak ada foto yang diupload
	if( $error === 4 ) {
		echo "<script>
				alert('pilih foto terlebih dahulu!');
			  </script>";
		return false;
	}

	// cek apakah yang diupload adalah foto
	$ekstensiFotoValid = ['jpg', 'jpeg', 'png'];
	$ekstensiFoto = explode('.', $namaFile);
	$ekstensiFoto = strtolower(end($ekstensiFoto));
	if( !in_array($ekstensiFoto, $ekstensiFotoValid) ) {
		echo "<script>
				alert('yang anda upload bukan foto!');
			  </script>";
		return false;
	}

	// cek jika ukurannya terlalu besar dari 5MB
	if( $ukuranFile > 5000000 ) {
		echo "<script>
				alert('ukuran foto terlalu besar!');
			  </script>";
		return false;
	}

	// lolos pengecekan, foto siap diupload
	// generate nama foto baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiFoto;

	move_uploaded_file($tmpName, '../assets/img/' . $namaFileBaru);

	return $namaFileBaru;
}


function hapus($id) {
	$conn = koneksi();
	mysqli_query($conn, "DELETE FROM mobil WHERE id = $id");

	return mysqli_affected_rows($conn);
}


function ubah($data) {
	$conn = koneksi();

	$id = $data["id"];
	$id = htmlspecialchars($data["id"]);
	$fotoLama = htmlspecialchars($data["fotoLama"]);
	
	// cek apakah user pilih foto baru atau tidak
	if( $_FILES['foto']['error'] === 4 ) {
		$foto = $fotoLama;
	} else {
		$foto = upload();
	}

	$merk = htmlspecialchars($data["merk"]);
	$model = htmlspecialchars($data["model"]);
	$cc = htmlspecialchars($data["cc"]);
	$topspeed = htmlspecialchars($data["topspeed"]);
	$tahunproduksi = htmlspecialchars($data["tahunproduksi"]);
	$negarapembuat = htmlspecialchars($data["negarapembuat"]);
	$harga = htmlspecialchars($data["harga"]);

	$query = "UPDATE mobil SET
				foto = '$foto',
				merk = '$merk',
				model = '$model',
				cc = '$cc',
				topspeed = '$topspeed',
				tahunproduksi = '$tahunproduksi',
				negarapembuat = '$negarapembuat',
				harga = '$harga'
			  WHERE id = '$id'
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);	
}

function cari($search) {
	$query = "SELECT * FROM mobil WHERE
			foto LIKE '%$search%' OR
			merk LIKE '%$search%' OR
			model LIKE '%$search%' OR
			cc LIKE '%$search%' OR
			topspeed LIKE '%search%' OR
			tahunproduksi LIKE '%$search%' OR
			negarapembuat LIKE '%$search%' OR
			harga LIKE '%$search%' ";

	return query($query);
}

function registrasi($data) {
	$conn = koneksi();

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	// cek username
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('username sudah terdaftar!')
		      </script>";
		return false;
	}


	// cek konfirmasi password
	if( $password !== $password2 ) {
		echo "<script>
				alert('password tidak sesuai!');
		      </script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan userbaru ke database
	mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

	return mysqli_affected_rows($conn);

}

?>