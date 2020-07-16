<?php 
	// cek tombol submit sudah di tekan atau belum
	if (isset($_POST["submit"])) {
			// cek user name dan pasword
		if ($_POST["username"] == "root" && $_POST["password"] == "toor") {
			// jika benar redirect ke halaman admin
			header("Location: admin.php");
			exit;
		}else{
			// jika salah tampilkan kesalahan
			$error = true;
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
	<h1>Login</h1>
	<?php if(isset($error)):?>
		<p style="color: red; font-style: italic;">username / pasword salah</p>
	<?php endif ?>
	<form action="" method="post">
		<li>
			<label for="username">Username: </label>
			<input type="text" name="username" id="username">
		</li>
		<li>
			<label for="password">password: </label>
			<input type="password" name="password" id="password">
		</li>
		<li>
			<button type="submit" name="submit">Submit</button>
		</li>
	</form>

	
</body>
</html>
