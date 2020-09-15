<?php 
	session_start();
	require '../functions.php';

	// cek cookie
	if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
		$id = $_COOKIE['id'];
		$key = $_COOKIE['key'];

		// ambil username berdasarkan id
		$conn = koneksi();
		$result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
		$row = mysqli_fetch_assoc($result);

		// cek cookie dan username
		if( $key === hash('sha256', $row['username']) ) {
			$_SESSION['login'] = true;
		}


	}

	if( isset($_SESSION["login"]) ) {
		header("Location: index.php");
		exit;
	}


	if( isset($_POST["login"]) ) {

		$username = $_POST["username"];
		$password = $_POST["password"];

		$result = mysqli_query(koneksi(), "SELECT * FROM user WHERE username = '$username'");

		// cek username
		if( mysqli_num_rows($result) === 1 ) {

			// cek password
			$row = mysqli_fetch_assoc($result);
			if( password_verify($password, $row["password"]) ) {
				// set session
				$_SESSION["login"] = true;

				// cek remember me
				if( isset($_POST['remember']) ) {
					// buat cookie
					setcookie('id', $row['id'], time()+60);
					setcookie('key', hash('sha256', $row['username']), time()+60);
				}

				header("Location: index.php");
				exit;
			}
		}

		$error = true;
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Admin</title>
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
		<h1>Login as Admin</h1>

		<img src="../../assets/img/admin.png" class="adminimg">

		<?php if( isset($error) ) : ?>
			<p style="color: red; font-style: italic;">username / password salah</p>
		<?php endif; ?>
		
		<form action="" method="post" align="center">
				<label for="username">Username</label>
				<input type="text" name="username" id="username">

				<br>

				<label for="password">Password</label>
				<input type="password" name="password" id="password">

				<br>

				<input type="checkbox" name="remember" id="remember">
				<label for="remember">Remember me</label>

				<br><br>

				<button type="submit" name="login">Login</button>
		</form>
	</div>
</body>
</html>