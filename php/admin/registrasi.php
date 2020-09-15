<?php 
require '../functions.php';

if( isset($_POST["register"]) ) {

	if( registrasi($_POST) > 0 ) {
		echo "<script>
				alert('user baru berhasil ditambahkan!');
				document.location.href = 'admin/admin.php';
			  </script>";
	} else {
		echo mysqli_error($conn);
	}

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Registrasi</title>
	<link href="../../assets/img/logo.png" rel="shortcut icon">
	<link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Archivo" rel="stylesheet">
	<style>
		h1 {
			text-align: center;
			font-family: 'Courgette', cursive;
			color: white;
		}

		p {
			color: red;
			font-style: italic;
			text-align: center;
		}

		label, button {
			font-family: 'Archivo', sans-serif;
		}

		label {
			color: white;
		}

		.container {
			border-radius: 15%;
			background-color: #00395c;
			width: 300px;
			margin: auto;
			padding: 20px;
		}

		label {
		  display: inline-block;
		  width: 140px;
		}

		body {
			background-color: lightskyblue;
		}

		.adminimg {
			width: 100px;
			position: relative;
			left: 100px;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Registrasi</h1>

		<img src="../../assets/img/admin.png" class="adminimg">
		
		<form action="" method="post" align="center">
				<label for="username">Username</label>
				<input type="text" name="username" id="username">
				<br>
				<label for="password">Password</label>
				<input type="password" name="password" id="password">
				<br>
				<label for="password">Konfirmasi Password</label>
				<input type="password" name="password2" id="password2">
				<br><br>
				<button type="submit" name="register">Registrasi</button>
		</form>
	</div>
</body>
</html>