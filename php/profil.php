<?php 
	if (!isset($_GET['id'])) {
		header("Location : ./index.php");
		exit;
	}

	require 'functions.php';
	$id = $_GET["id"];

	$cars = query("SELECT * FROM mobil WHERE id = $id")[0];
 ?>

 <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.css"  media="screen,projection"/>

      <title>Spesifikasi Mobil</title>
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

		.btn {
			background-color: #b8860b !important;
		}

		.btn.waves-effect.waves-light {
			color: #003355 !important;
		}

	 	h1 {
 			text-align: center;
 			font-family: 'Karla', sans-serif;
 			color: #003355;
 			font-weight: bold;
 		}

		img {
			width: 500px;
		}

		thead {
			font-family: 'Rambla', sans-serif;
		}

		.harga {
			font-weight: bold;
		}

		body {
			background-color: #e0e0e0;
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
		        <a href="#home" class="brand-logo">AUTODRIFT 25</a>
		      </div>
		    </nav>
		  </div>
	 	<!-- akhir navbar -->

	 	<!-- table -->
    	<div class="container">
    		<div class="row">
				<h1>Spesifikasi mobil</h1>
					<div class="col m6">
						<img class="materialboxed responsive-img" src="./../assets/img/<?= $cars['foto']; ?>">
					</div>

				 	<div class="col m6">
				 	<table class="highlight responsive-table">
					 	<thead>
						  	<tr>
						 		<th>Merk</th>
						 		<th>Model</th>
						 		<th>CC</th>
						 		<th>Top Speed</th>
						 		<th>Tahun Produksi</th>
						 		<th>Negara Pembuat</th>
						 		<th>Harga</th>
						 	</tr>
						</thead>

						<tbody>
							<tr>
					 			<td align="center"><?= $cars['merk']; ?></td>
					 			<td align="center"><?= $cars['model']; ?></td>
					 			<td align="center"><?= $cars['cc']; ?></td>
					 			<td align="center"><?= $cars['topspeed']; ?></td>
					 			<td align="center"><?= $cars['tahunproduksi']; ?></td>
					 			<td align="center"><?= $cars['negarapembuat']; ?></td>
					 			<td align="center" class="harga"><?= $cars['harga']; ?></td>
					 		</tr>
				 		</tbody>
					</table>
					</div>
			</div>
			<!-- akhir table -->

			<p align="center"><a class="btn waves-effect waves-light" href="./../index.php" role="button" style="font-family: 'Rambla', sans-serif;">Kembali</a></p>

		</div>


      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="../js/materialize.min.js"></script>
      <script type="text/javascript">
      	const materialboxed = document.querySelectorAll('.materialboxed');
            M.Materialbox.init(materialboxed);
      </script>
    </body>
  </html>