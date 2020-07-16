<?php 
session_start();
require 'functions.php';
// set cookie
// if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
// 	$id = $_COOKIE['id'];
// 	$key =$_COOKIE['key'];

// 	// ambil username berdasarkan id
// 	$result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
// 	$row = mysqli_fetch_assoc($result);

// 	if ($key === hash('sha256', $row['username'])) {
// 		$_SESSION["login"] = true;
// 	}
// }

// if (isset($_SESSION["login"])) {
// 	header("Location: index.php");
// 	exit;
// }
if (isset($_POST["login"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
	// var_dump(mysqli_num_rows($result));
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
	<title>Login</title>
	<?= $headerWap; ?>
</head>
<body>
	<div class="form-group"><h1>Login</h1></div>
	<div class="containerTambahData">

	<form action="" method="post">
			<div class="form-group">
				<label for="username">Username: </label>
				<input type="text" name="username" id="username">
				<?php if (isset($errorUser)): ?>
					<p style="color: red; font-style: italic;">Username <?= $_POST["username"]; ?> Tidak Tersedia</p>
				<?php endif ?>
			</div>
			<div class="form-group">
				<label for="password">Password: </label>
				<input type="password" name="password" id="password">
				<?php if (isset($errorPass)): ?>
					<p style="color: red; font-style: italic;">Password Salah</p>
				<?php endif ?>
			</div>
			<div class="form-group">
				<input type="checkbox" name="remember"> Remember
			</div>

			<div class="clear"><br></div>
			<button type="submit" name="login" id="login" hidden="hidden"></button>
			<div class="form-group">
				<div class="tombol kuning" id="custom-login">login</div>
				<a href="registrasi.php"><div class="tombol hijau">Registrasi</div></a>
			</div>
			<script type="text/javascript">
				const relalSubmitBtn = document.getElementById('login');
				const costumSubmitBtn = document.getElementById('custom-login');
				costumSubmitBtn.addEventListener("click", function(){
					relalSubmitBtn.click();
				})
			</script>
			<div class="clear"></div>
	</form>
	</div>
			<div class="clear"></div>
			<?= $footerWap; ?>
</body>
</html>
