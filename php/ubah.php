<?php

session_start();

if ( !isset($_SESSION["login"]) ) {
	header("Location: admin/admin.php");
	exit;
}

require 'functions.php';

// ambil data di URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$cars = query("SELECT * FROM mobil WHERE id = $id")[0];


// cek apakah tombol ubah sudah ditekan atau belum
if( isset($_POST["ubah"]) ) {
	
	// cek apakah data berhasil diubah atau tidak
	if( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('Data berhasil diubah!');
				document.location.href = 'admin/index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('Data gagal diubah!');
				document.location.href = 'admin/index.php';
			</script>
		";
	}


}
?>

<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.css"  media="screen,projection"/>

      <title>Ubah Data Mobil</title>
      	<link href="../assets/img/logo.png" rel="shortcut icon">
		<link href="https://fonts.googleapis.com/css?family=Karla:400,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Rambla:700i" rel="stylesheet">
		<style>
			nav {
				background-color: #003355;
			}

			nav a.brand-logo {
				color: #b8860b !important;
				font-size: 20px !important;
				padding-left: 20px;
				font-family: 'Rambla', sans-serif;
			}

			nav a.brand-logo:hover {
			  color: #fff !important;
			}

			h1 {
	 			text-align: center;
	 			color: #b8860b !important;
				font-family: 'Karla', sans-serif;
				font-weight: bold;
	 		}

	 		.waves-effect.waves-light.btn {
	 			color: #b8860b !important;
	 			background-color: #003355 !important;
	 		}

	 		form {
	 			background-color: #e0e0e0 !important;
	 		}

	 		/* label color */
		    .input-field label {
		      color: #003355 !important;
		    }
		    /* label focus color */
		    .input-field input[type=text]:focus + label {
		      color: #b8860b;
		    }
		    /* label underline focus color */
		    .input-field input[type=text]:focus {
		      border-bottom: 1px solid #003355 !important;
		      box-shadow: 0 1px 0 0 #003355 !important;
		    }
		    /* valid color */
		    .input-field input[type=text].valid {
		      border-bottom: 1px solid #b8860b !important;
		      box-shadow: 0 1px 0 0 #b8860b !important;
		    }
		</style>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>

    	<!-- navbar -->
	    	<div class="navbar-fixed">
			    <nav>
			      <div class="nav-wrapper">
			        <a href="admin/index.php" class="brand-logo">AUTODRIFT 25</a>
			      </div>
			    </nav>
			  </div>
		 <!-- akhir navbar -->

    	<div class="container">
			<h1>Ubah Data Mobil</h1>

			<!-- Form -->
			<div class="row">
			    <form class="col s12" action="" method="post" enctype="multipart/form-data">
			    	<input type="hidden" name="id" required value="<?= $cars["id"]; ?>">
					<input type="hidden" name="fotoLama" value="<?= $cars["foto"]; ?>">

				  <div class="row">
			        <div class="input-field col s1">
			          <label for="foto">Foto</label>
			        </div>
			        <div class="input-field col s11">
					  <img width="300" src="../assets/img/<?= $cars["foto"]; ?>">
					  <input type="file" name="foto" id="foto">
			        </div>
			      </div>
			      <div class="row">
			        <div class="input-field col s6">
			          <input id="merk" type="text" name="merk" class="validate" value="<?= $cars["merk"]; ?>">
			          <label for="merk">Merk</label>
			        </div>
			        <div class="input-field col s6">
			          <input id="model" type="text" name="model" class="validate" value="<?= $cars["model"]; ?>">
			          <label for="model">Model</label>
			        </div>
			      </div>
			      <div class="row">
			        <div class="input-field col s12">
			          <input id="cc" type="text" name="cc" class="validate" value="<?= $cars["cc"]; ?>">
			          <label for="cc">CC</label>
			        </div>
			      </div>
			      <div class="row">
			        <div class="input-field col s12">
			          <input id="topspeed" type="text" name="topspeed" class="validate" value="<?= $cars["topspeed"]; ?>">
			          <label for="topspeed">Top Speed</label>
			        </div>
			      </div>
			      <div class="row">
			        <div class="input-field col s12">
			          <input id="tahunproduksi" type="text" name="tahunproduksi" class="validate" value="<?= $cars["tahunproduksi"]; ?>">
			          <label for="tahunproduksi">Tahun Produksi</label>
			        </div>
			      </div>
			      <div class="row">
			        <div class="input-field col s12">
			          <input id="negarapembuat" type="text" name="negarapembuat" class="validate" value="<?= $cars["negarapembuat"]; ?>">
			          <label for="negarapembuat">Negara Pembuat</label>
			        </div>
			      </div>
			      <div class="row">
			        <div class="input-field col s12">
			          <input id="harga" type="text" name="harga" class="validate" value="<?= $cars["harga"]; ?>">
			          <label for="harga">Harga</label>
			        </div>
			      </div>

					<a class="waves-effect waves-light btn" href="admin/index.php"><i class="material-icons left">chevron_left</i>Kembali</a>
					<button type="submit" name="ubah"><a class="waves-effect waves-light btn"><i class="material-icons right">edit</i>Ubah Data</a></button>
			    </form>
			  </div>
			<!-- Akhir From -->

      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="../js/materialize.min.js"></script>
    </body>
  </html>