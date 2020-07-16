<?php 
	if(	!isset($_GET["nama"]) ||
		!isset($_GET["npm"]) ||
		!isset($_GET["jurusan"]) ||
		!isset($_GET["gambar"]) ||
		!isset($_GET["email"])
		){

		header("Location: latihan1.php");
		exit;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Detail Mahasiswa</title>
	<link rel="stylesheet" href="">
	<style>
		#icon_gambar{
			width: 100px;
			height: 100px;
		}
	</style>
</head>
<body>
	<ul>
		<img id="icon_gambar" src="img/<?php echo $_GET["gambar"]; ?>" alt="">
		<li>Nama: <?php echo $_GET["nama"]; ?></li>
		<li>NPM: <?php echo $_GET["npm"]; ?></li>
		<li>Jurusan: <?php echo $_GET["jurusan"]; ?></li>
		<li>email: <?php echo $_GET["email"]; ?></li>
	</ul>
	<a href="latihan1.php">Kembali ke halaman sebelumnya</a>
</body>
</html>
