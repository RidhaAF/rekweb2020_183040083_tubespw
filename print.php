<?php

require_once __DIR__ . '/vendor/autoload.php';

	require 'php/functions.php';
	$mobil = query("SELECT * FROM mobil");

$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
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

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body class="scrollspy" id="home">
    <h1>Daftar Mobil</h1>
	 
	 <div class="container" id="container">';
	 	
	foreach( $mobil as $cars ) {
$html .= '<div class="row grey lighten-2">
		    <div class="col s12 m12">
		      <div class="card">
		        <div class="card-image">
		          <img class="responsive-img materialboxed" src="assets/img/'. $cars["foto"] .'" width="400">
		        </div>
		        <div class="card-content">
		          <h2 class="card-title">'. $cars["merk"] .'</h2>
		          <p class="card-title">'. $cars["model"] .'</p>
		          <p class="card-title">'. $cars["harga"] .'</p>
		        </div>
		        <div class="card-action">
		        </div>
		      </div>
		    </div>
		  </div>';
	}


$html .= '</div>
    </body>
  </html>';
$mpdf->WriteHTML($html);
$mpdf->Output('Daftar-Mobil_user.pdf', \Mpdf\Output\Destination::INLINE);