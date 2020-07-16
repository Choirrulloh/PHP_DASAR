<?php 
	require '../functions.php';
	// ambil data atau query
	$mahasiswa = query("SELECT * FROM mahasiswa");

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
	<div class="navbar"><a href="#">Daftar Mahasiswa</a> <a href="">Tambah Mahasiswa</a></div>

	<div class="clear"></div>
	<br><br>
	<table class="tabel">
		<tr class="title">
			<td>No.</td>
			<td>Gambar</td>
			<td>NPM</td>
			<td>Nama</td>
			<td>Email</td>
			<td>Jurusan</td>
			<td>Aksi</td>
		</tr>
		<?php $nomor = 1; ?>
		<?php foreach($mahasiswa as $row): ?>
			<?php if ($nomor%2 == 0) :?>
			<tr id="genap">
			<?php else: ?>
			<tr id="ganjil">
			<?php endif ?>
		
			<td id="nomor"><?php echo $nomor; $nomor++; ?></td>
			<td><img src="../img/<?= $row["gambar"]; ?>" id="profile"></td>
			<td><?= $row["npm"]; ?></td>
			<td align="left"><?= $row["nama"]; ?></td>
			<td align="left"><?= $row["email"]; ?></td>
			<td align="left"><?= $row["jurusan"]; ?></td>
			<td>
				<a href=""><div class="kuning tombol tombol2">Ubah</div></a>
				<a href=""><div class="merah tombol tombol2">Hapus</div></a>
			</td>
		</tr>
	<?php endforeach ?>
	</table>
</body>
</html>	
