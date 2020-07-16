<?php 
session_start();
require 'functions.php';
if (isset($_POST["login"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
	if (mysqli_num_rows($result) === 1) {

		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password"])) {
			$_SESSION["login"] = true;
			header("Location: index.php");
			exit;	
		}elseif (!password_verify($password, $row["password"])){
			$errorPass = true;
		}
	}else{
		$errorUser = true;
	}
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<h1>Halaman login</h1>
	<?php if (isset($errorUser)): ?>
		<p style="color: red;">username salah</p>
	<?php elseif (isset($errorPass)): ?>
		<p style="color: red;">password salah</p>
	<?php endif ?>
	<form action="" method="post">
		<ul>
			<li>
				<label for="username">Username: </label>
				<input type="text" name="username" id="username">
			</li>
			<li>
				<label for="password">Password: </label>
				<input type="password" name="password" id="password">
			</li>
			<li>
				<button type="submit" name="login">
					login
				</button>
			</li>
		</ul>
	</form>
	<ul>
		<li>
			<a href="registrasi.php">Sign up</a>
		</li>
	</ul>
</body>
</html>
