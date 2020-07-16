<?php 
session_start();
require 'functions.php';
// set cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
	$id = $_COOKIE['id'];
	$key =$_COOKIE['key'];

	// ambil username berdasarkan id
	$result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
	$row = mysqli_fetch_assoc($result);

	if ($key === hash('sha256', $row['username'])) {
		$_SESSION["login"] = true;
	}

}

if (isset($_SESSION["login"])) {
	header("Location: index.php");
	exit;
}
if (isset($_POST["login"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
	if (mysqli_num_rows($result) === 1) {
		
		$row = mysqli_fetch_assoc($result);

		if (password_verify($password, $row["password"])) {
			$_SESSION["login"] = true;
		
			// cek cookie
			if (isset($_POST['remember'])) {
				setcookie('id', $row['id'], time()+60);
				setcookie('key', hash('sha256', $row['username']), time()+60);
			}

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
	<title>Admin</title>
    <meta name="description" content="Dasar PHP" />
    <meta name="keywords" content="Dasar Pemerograman PHP" />
    <meta name="author" content="iseplutpi" />
    <link rel="shortcut icon" href="../../icon/favicon.ico">
    <link rel="apple-touch-icon" sizes="57x57" href="../../icon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../../icon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../../icon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../../icon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../../icon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../../icon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../../icon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../../icon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../../icon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="../../icon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../../icon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../icon/favicon-16x16.png">
    <link rel="manifest" href="../../icon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="../../icon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
	<link rel="stylesheet" type="text/css" href="css/style.css" />
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
				<input type="checkbox" name="remember"> Remember
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
