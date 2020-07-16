<?php 
	require 'functions.php';
	$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Halaman Admin</title>
    <meta name="description" content="Dasar PHP" />
    <meta name="keywords" content="Dasar Pemerograman PHP" />
    <meta name="author" content="iseplutpi" />
    <link rel="shortcut icon" href="../icon/favicon.ico">
    <link rel="apple-touch-icon" sizes="57x57" href="../icon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../icon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../icon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../icon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../icon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../icon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../icon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../icon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../icon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="../icon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../icon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../icon/favicon-16x16.png">
    <link rel="manifest" href="../icon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="../icon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
	<link rel="stylesheet" href="">
	<style>
		.header {
			font-size: 15px;
			margin: 3px;
			font-weight: bold;
			background-color: rgba(30, 190, 165, .96);
			text-align: center;
			vertical-align: middle;
			color: white; 
			height: 50px;  
		}
		.header:hover{
			background-color:rgba(10, 170, 145, .96);
		}
		a{
			color: black;
			text-decoration: none;
		}
	</style>
</head>
<body>
	<div class="header"><h1>Daftar Mahasiswa</h1></div>
	<br>
	<a href="tambah.php">Tambah Data mahasiswa</a>
	<div style="clear: both;"></div>
	<br>
	<table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>No.</th>
			<th>Aksi</th>
			<th>Gambar</th>
			<th>NPM</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Jurusan</th>
		</tr>
		<?php $nomor = 1; ?>
		<?php foreach ($mahasiswa as $row): ?>
		<tr>
			<td><?php echo $nomor; $nomor++; ?></td>
			<td>
				<a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a> | 
				<a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin');">Hapus</a>
			</td>
			<td><img src="img/<?= $row["gambar"]; ?>" alt="" width="50" height="50"></td>
			<td><?= $row["npm"]; ?></td>
			<td><?= $row["nama"]; ?></td>
			<td><?= $row["email"]; ?></td>
			<td><?= $row["jurusan"]; ?></td>
		</tr>
	<?php endforeach ?>
	</table>
</body>
</html>	
