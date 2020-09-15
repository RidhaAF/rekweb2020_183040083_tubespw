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
      <link type="text/css" rel="stylesheet" href="../../css/materialize.css"  media="screen,projection"/>

      <link href="../../css/style-icons.css" type="text/css" rel="stylesheet" media="screen,projection" />
      <link rel="stylesheet" href="../../css/materialize-social.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    	<title>Tugas 3 | Admin</title>
    	<link href="assets/img/logo.png" rel="shortcut icon">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body class="scrollspy" id="home">
    <h1 align="center">Daftar Mobil</h1>
	 
	 <div id="container">
    	<div class="row">
    		<div class="col s1"></div>
    		<div class="col s10 grey lighten-2">
		 	<table class="highlight centered" border="1" cellspacing="0" cellpading="10">
			 	<thead>
				  	<tr>
				  		
						<th>No</th>
				  		<th>Foto</th>
				 		<th>Merk</th>
				 		<th>Model</th>
				 		<th>CC</th>
				 		<th>Top Speed</th>
				 		<th>Tahun Produksi</th>
				 		<th>Negara Pembuat</th>
				 		<th>Harga</th>
				 	</tr>
				</thead>';
	 	
	$i = 1;
	foreach( $mobil as $cars ) {

$html .= '<tbody>
			<tr>
				<td align="center">'. $i++ .'</td>
				<td><img src="assets/img/'. $cars["foto"] .'" width="300"></td>
	 			<td align="center">'. $cars['merk'] .'</td>
	 			<td align="center">'. $cars['model'] .'</td>
	 			<td align="center">'. $cars['cc'] .'</td>
	 			<td align="center">'. $cars['topspeed'] .'</td>
	 			<td align="center">'. $cars['tahunproduksi'] .'</td>
	 			<td align="center">'. $cars['negarapembuat'] .'</td>
	 			<td align="center" class="harga">'. $cars['harga'] .'</td>
	 		</tr>
 		</tbody>';
	}
	

$html .= '</table>
			</div>
			<div class="col s1"></div>
		</div>
		</div>
    </body>
  </html>';
$mpdf->WriteHTML($html);
$mpdf->Output('Daftar-Mobil_admin.pdf', \Mpdf\Output\Destination::INLINE);