<?php 
	session_start();
	if (!isset($_SESSION["login"])) {
		header("Location: login.php");
		exit;
	}
	require 'functions.php';
	// cek tombol submit sudah di tekan atau belum
	if (isset($_POST["submit"])) {
		// cek data telah berhasil ditambahkan atau tidak
		if (tambah($_POST) > 0){
			echo "
				<script>
					alert('Data berhasil ditambahkan');
					document.location.href='index.php';
				</script>
			";
		}else{
			echo "
			<script>
				alert('Data gagal ditambahkan silahkan hubungi developer');
			</script>
			";
		}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Tambah data</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<h1>Tambah data mahasiswa</h1>
	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="npm">NPM: </label>
				<input type="text" name="npm" id="npm" required="">
			</li>
			<li>
				<label for="nama">Nama: </label>
				<input type="text" name="nama" id="nama" required="">
			</li>
			<li>
				<label for="jurusan">Jurusan: </label>
				<input type="text" name="jurusan" id="jurusan" required="">
			</li>
			<li>
				<label for="gambar">Gambar: </label>
				<input type="file" name="gambar" id="gambar">
			</li>
			<li>
				<label for="email">Email: </label>
				<input type="text" name="email" id="email" required="">
			</li>
			<li>
				<button type="submit" name="submit">
					Tambah Data!
				</button>
			</li>
		</ul>
		
	</form>
</body>
</html>
