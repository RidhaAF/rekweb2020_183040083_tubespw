<?php 

	require 'php/functions.php';

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
      <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>

      <link href="css/style-icons.css" type="text/css" rel="stylesheet" media="screen,projection" />
      <link rel="stylesheet" href="css/materialize-social.css">

      <title>Tugas Besar</title>
      <link href="assets/img/logo.png" rel="shortcut icon">
      <link href="https://fonts.googleapis.com/css?family=Karla:400,700" rel="stylesheet">
	  <link href="https://fonts.googleapis.com/css?family=Rambla:700i" rel="stylesheet">
	  <link href="https://fonts.googleapis.com/css?family=Palanquin+Dark:500" rel="stylesheet">
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

		.slider .indicators .indicator-item {
		  background-color: #b8860b;
		}

		.slider .indicators .indicator-item.active {
		  background-color: #003355;
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

		.card .card-action a:not(.btn):not(.btn-large):not(.btn-small):not(.btn-large):not(.btn-floating) {
		  color: #b8860b;
		  font-family: 'Palanquin Dark', sans-serif;
		}

		hr {
			border-color: rgba(0,0,0,0.1);
		}

		h1 {
			text-align: center;
			font-family: 'Palanquin Dark', sans-serif;
			color: #003355 !important;
		}

		h2 {
			font-family: 'Rambla', sans-serif;
			color: #003355 !important;
		}

		body {
		    display: flex;
		    min-height: 100vh;
		    flex-direction: column;
		}

		main {
		    flex: 1 0 auto;
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

		@media print {
			.header, .navbar-fixed, .sidenav, .slider, .section-search, .page-footer {
				display: none;
			}
		}
	  </style>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body class="scrollspy" id="home">

    <!-- Header -->
    	<header>

     <!-- navbar -->
    	<div class="navbar-fixed">
		    <nav>
		      <div class="nav-wrapper">
		        <a href="#home" class="brand-logo">AUTODRIFT 25</a>
		        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons menu">menu</i></a>
		        <ul class="right hide-on-med-and-down">
		        	<li><a class="btn waves-effect waves-light" href="print.php" target="_blank">Print<i class="material-icons left">print</i></a></li>
		        	<li><a class="btn waves-effect waves-light" href="php/admin/admin.php">Login<i class="material-icons left">account_circle</i></a></li>
		        </ul>
		      </div>
		    </nav>
		  </div>
	 <!-- akhir navbar -->

	 <!-- mobile navbar -->
	  	<ul class="sidenav" id="mobile-demo">
	  	  <li><a class="btn waves-effect waves-light" href="print.php" target="_blank">Print<i class="material-icons left">print</i></a></li>
		  <li><a class="btn waves-effect waves-light" href="php/admin/admin.php">Login<i class="material-icons left">account_circle</i></a></li>
		</ul>
	 <!-- akhir mobile navbar -->

	 	</header>
	 <!-- Akhir header -->


	 <!-- Main -->
	 	<main>

	 <!-- slider -->
	 	<div class="slider">
		    <ul class="slides">
		      <li>
		        <img src="assets/img/3.jpg"> <!-- random image -->
		        <div class="caption center-align">
		        </div>
		      </li>
		      <li>
		        <img src="assets/img/2.jpg"> <!-- random image -->
		        <div class="caption left-align">
		        </div>
		      </li>
		      <li>
		        <img src="assets/img/10.jpg"> <!-- random image -->
		        <div class="caption right-align">
		        </div>
		      </li>
		    </ul>
		  </div>
	 <!-- akhir slider -->

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

	 <!-- card -->
	 <div class="container" id="container">
	 	<?php if (empty($mobil)) :?>
		<h1 align="center" class="data">Data Tidak Ditemukan!</h1>

		<?php else : ?>
	 
		<?php foreach( $mobil as $cars ) : ?>

		 <div class="row grey lighten-2">
		    <div class="col s12 m12">
		      <div class="card">
		        <div class="card-image">
		          <img class="responsive-img materialboxed" src="assets/img/<?= $cars["foto"]; ?>">
		        </div>
		        <div class="card-content">
		          <h2 class="card-title"><?= $cars["merk"]; ?></h2>
		          <p class="card-title"><?= $cars["model"]; ?></p>
		          <p class="card-title"><?= $cars["harga"]; ?></p>
		        </div>
		        <div class="card-action">
		          <a href="php/profil.php?id=<?=$cars['id'];?>">Baca Spesifikasi Lengkap</a>
		        </div>
		      </div>
		    </div>
		  </div>

	   <?php endforeach; ?>
	  <?php endif ?>
	 </div>
	 <!-- akhir card -->

	 	</main>
	 <!-- Akhir Main -->


	 <!-- Footer -->
	 <footer class="page-footer">
      <div class="container">
        <div class="row">
          <div class="col l6 s6">
            <h5>Social Media</h5>
            <a href="https://www.facebook.com/ridhaaf12" target="_blank" class="waves-effect waves-light btn-floating social facebook"><i class="fa fa-facebook"></i> Sign in with facebook</a>
            <a href="https://www.instagram.com/ridhaaf" target="_blank" class="waves-effect waves-light btn-floating social instagram"><i class="fa fa-instagram"></i> Sign in with instagram</a>
            <a href="https://www.twitter.com/ridhaaf_" target="_blank" class="waves-effect waves-light btn-floating social twitter"><i class="fa fa-twitter"></i> Sign in with twitter</a>
          </div>
          <div class="col l2 offset-l4 s3 offset-s3">
            <h5>YouTube</h5>
            <ul>
              <li><a href="https://www.youtube.com/channel/UCKKrTdg_4Pd28rMkY75LpgQ?view_as=subscriber" target="_blank"><img src="assets/img/logo_yt.png" width="50" alt="YouTube"></a></li>
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
      <script src="js/script.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript">
      	const sidenav = document.querySelectorAll('.sidenav');
            M.Sidenav.init(sidenav);

      	const slider = document.querySelectorAll('.slider');
            M.Slider.init(slider, {
              indicators: false,
              height: 500,
              duration: 500,
              interval: 3000
            });

        const materialboxed = document.querySelectorAll('.materialboxed');
            M.Materialbox.init(materialboxed);

        const scrollspy = document.querySelectorAll('.scrollspy');
            M.ScrollSpy.init(scrollspy, {
              scrollOffset: 55
            });
      </script>
    </body>
  </html>