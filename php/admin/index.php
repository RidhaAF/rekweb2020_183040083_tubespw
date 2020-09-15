<?php 

	session_start();

	if ( !isset($_SESSION["login"]) ) {
		header("Location: admin.php");
		exit;
	}

	require '../functions.php';

	$mobil = query("SELECT * FROM mobil");

	if (isset($_POST['cari'])) {
		$mobil = cari($_POST['search']);
	}
	
?>

<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../../css/materialize.css"  media="screen,projection"/>

      <link href="../../css/style-icons.css" type="text/css" rel="stylesheet" media="screen,projection" />
      <link rel="stylesheet" href="../../css/materialize-social.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    	<title>Tugas 3 | Admin</title>
    	<link href="../../assets/img/logo.png" rel="shortcut icon">
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

			i.material-icons.menu {
				color: #b8860b !important;
			}

			h3, h5 {
				color: #b8860b !important;
				font-family: 'Karla', sans-serif;
				font-weight: bold;
			}

			input.in-place {
				background-color: #003355 !important;
			}

			.input-field input[type=search]:not(.browser-default) {
				color: white;
			}

			.input-field input[type=search]:focus:not(.browser-default) {
				color: white;
			}

			th {
				font-family: 'Rambla', sans-serif;
			}

			hr {
				border-color: rgba(0,0,0,0.1);
			}

			h1 {
				text-align: center;
				font-family: 'Rambla', cursive;
				color: #003355 !important;
			}

			img {
				width: 200px;
			}

			table {
				margin: auto;
			}

			td a {
				color: #003355 !important;
			}

			.page-footer, li a {
				background-color: #00426f !important;
				color: #b8860b !important;
			}

			.footer-copyright {
				background-color: #003355 !important;
				color: #b8860b !important;
				font-family: 'Karla', sans-serif;
				font-weight: bold;
			}

			.yt {
				width: 50px;
			}
		</style>
	</head>
	<body class="scrollspy" id="home">

		<!-- navbar -->
    	<div class="navbar-fixed">
		    <nav>
		      <div class="nav-wrapper">
		        <a href="#home" class="brand-logo">AUTODRIFT 25</a>
		        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons menu">menu</i></a>
		        <ul class="right hide-on-med-and-down">
		        	<li><a class="btn waves-effect waves-light" href="../../print2.php" target="_blank">Print<i class="material-icons left">print</i></a></li>
		        	<li><a class="btn waves-effect waves-light" href="../tambah.php">Tambah Data<i class="material-icons left">add_box</i></a></li>
		        	<li><a class="btn waves-effect waves-light" href="logout.php">Logout<i class="material-icons left">account_circle</i></a></li>
		        </ul>
		      </div>
		    </nav>
		  </div>
		<!-- akhir navbar -->

		<!-- mobile navbar -->
		  	<ul class="sidenav" id="mobile-demo">
		  		<li><a class="btn waves-effect waves-light" href="../../print2.php" target="_blank">Print<i class="material-icons left">print</i></a></li>
		  		<li><a class="btn waves-effect waves-light" href="../tambah.php">Tambah Data<i class="material-icons left">add_box</i></a></li>
			  	<li><a class="btn waves-effect waves-light" href="logout.php">Logout<i class="material-icons left">account_circle</i></a></li>
			</ul>
		<!-- akhir mobile navbar -->
		
		<!-- search bar -->
		 <section id="search_sec" class="section section-search center">
	    
	      <div class="row">
	      	<div class="col s1"></div>
	        <div class="col s10">
	          <h3>Cari Mobil</h3>
	          <form action="" method="post">
		          <div class="input-field">
		            <input class="in-place" placeholder=" Lamborghini, Toyota, Kijang, dll.." type="search" id="search" name="search">
			        <button class="btn waves-effect waves-light" type="submit" name="cari" id="tombol-cari">Cari<i class="material-icons right">search</i></button>
		          </div>
		          <hr>
	          </form>
	        </div>
	      </div>
	    
	  </section>
		<!-- akhir search bar -->

		<!-- table -->
		<div id="container">
    	<div class="row">
    		<div class="col s1"></div>
    		<div class="col s10 grey lighten-2">
		 	<table class="centered highlight responsive-table">
			 	<thead>
				  	<tr>
				  		<th>No</th>
						<th>Opsi</th>
				  		<th>Foto</th>
				 		<th>Merk</th>
				 		<th>Model</th>
				 		<th>CC</th>
				 		<th>Top Speed</th>
				 		<th>Tahun Produksi</th>
				 		<th>Negara Pembuat</th>
				 		<th>Harga</th>
				 	</tr>
				</thead>

			<?php if (empty($mobil)) :?>
			 	<tr>
			 		<td colspan="10">
			 			<h1>Data Tidak Ditemukan!</h1>
			 		</td>
			 	</tr>
				<?php else : ?>

				<?php $i = 1; ?>
				<?php foreach( $mobil as $cars ) : ?>

				<tbody>
					<tr>
						<td class="no"><?= $i; ?></td>
						<td>
							<a href="../../php/ubah.php?id=<?= $cars["id"]; ?>">Ubah</a> |
							<a href="../../php/hapus.php?id=<?= $cars["id"]; ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?');">Hapus</a>
						</td>
						<td><img src="../../assets/img/<?= $cars["foto"] ?>"></td>
			 			<td align="center"><?= $cars['merk']; ?></td>
			 			<td align="center"><?= $cars['model']; ?></td>
			 			<td align="center"><?= $cars['cc']; ?></td>
			 			<td align="center"><?= $cars['topspeed']; ?></td>
			 			<td align="center"><?= $cars['tahunproduksi']; ?></td>
			 			<td align="center"><?= $cars['negarapembuat']; ?></td>
			 			<td align="center" class="harga"><?= $cars['harga']; ?></td>
			 		</tr>
		 		</tbody>

			 		<?php $i++; ?>
					<?php endforeach; ?>
				<?php endif ?>
			</table>
			</div>
			<div class="col s1"></div>
		</div>
		</div>
		<!-- akhir table -->

		<!-- Footer -->
		 <footer class="page-footer">
	      <div class="container">
	        <div class="row">
	          <div class="col l6 s12">
	            <h5>Social Media</h5>
	            <a href="https://www.facebook.com/ridhaaf12" target="_blank" class="waves-effect waves-light btn-floating social facebook"><i class="fa fa-facebook"></i> Sign in with facebook</a>
	            <a href="https://www.instagram.com/ridhaaf" target="_blank" class="waves-effect waves-light btn-floating social instagram"><i class="fa fa-instagram"></i> Sign in with instagram</a>
	            <a href="https://www.twitter.com/ridhaaf_" target="_blank" class="waves-effect waves-light btn-floating social twitter"><i class="fa fa-twitter"></i> Sign in with twitter</a>
	          </div>
	          <div class="col l2 offset-l4 s12">
	            <h5>YouTube</h5>
	            <ul>
	              <li><a href="https://www.youtube.com/channel/UCKKrTdg_4Pd28rMkY75LpgQ?view_as=subscriber" target="_blank"><img src="../../assets/img/logo_yt.png" class="yt" alt="YouTube"></a></li>
	            </ul>
	          </div>
	        </div>
	      </div>
	      <div class="footer-copyright">
	        <div class="container">
	        <p class="center">Copyright &copy; 2019 Ridha Ahmad Firdaus, All Rights Reserved.</p>
	        </div>
	      </div>
	     </footer>
		 <!-- Akhir Footer -->

      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="../../js/materialize.min.js"></script>
      <script type="text/javascript">
      	const sidenav = document.querySelectorAll('.sidenav');
            M.Sidenav.init(sidenav);

        const materialboxed = document.querySelectorAll('.materialboxed');
            M.Materialbox.init(materialboxed);

        const scrollspy = document.querySelectorAll('.scrollspy');
            M.ScrollSpy.init(scrollspy, {
              scrollOffset: 55
            });
      </script>
    </body>
  </html>