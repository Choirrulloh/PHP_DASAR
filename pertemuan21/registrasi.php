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
	<title>Registrasi</title>
	<?= $headerWap; ?>
</head>
<body>
	
	<div class="form-group"><h1>Registrasi</h1></div>
	<div class="containerTambahData">
		<form action="" method="post">
			<div class="form-group">
				<label for="username">Username: </label>
				<input type="text" name="username" id="username">
			</div>
			<div class="form-group">
				<label for="password">Password: </label>
				<input type="password" name="password" id="password">
			</div>
				<div class="form-group">
				<label for="password2">Ulangi Password: </label>
				<input type="password" name="password2" id="password2">
			</div>

			<div class="clear"><br></div>
			<button type="submit" name="register" id="register" hidden="hidden"></button>
			<div class="form-group">
				<div class="tombol kuning" id="custom-register">Register</div>
				<a href="index.php"><div class="tombol hijau">Kembali</div></a>
			</div>
			<script type="text/javascript">
				const relalSubmitBtn = document.getElementById('register');
				const costumSubmitBtn = document.getElementById('custom-register');
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
