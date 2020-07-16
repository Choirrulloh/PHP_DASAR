<?php 
	session_start();
	if (isset($_SESSION["login"])) {
		header("Location: index.php");
		exit;
	}
require 'functions.php';
if (isset($_POST["register"])) {
	if (registrasi($_POST) > 0) {
		echo "
			<script>
				alert('User baru berhasil ditambahkan');
				document.location.href='index.php';
			</script>
		";
	}else{
		echo mysqli_error($conn);
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Halaman Registrasi</title>
	<link rel="stylesheet" href="">
	<style>
		input{
			display: block;
		}
	</style>
</head>
<body>
	<h1>Halaman Registrasi</h1>
	<form action="" method="post">
		<ul>
			<li>
				<label for="username">username: </label>
				<input type="text" name="username" id="username">
			</li>
			<li>
				<label for="password">password: </label>
				<input type="password" name="password" id="password">
			</li>
			<li>
				<label for="password2">konfirmasi password: </label>
				<input type="password" name="password2" id="password2">
			</li>
			<li>
				<button type="submit" name="register">
					Suign up
				</button>
			</li>
		</ul>
	</form>
	
</body>
</html>
