<?php 
	session_start();
	if (!isset($_SESSION["login"])) {
		header("Location: login.php");
		exit;
	}
	require 'functions.php';

	// pagination
	// konfigurasi

	// menghitung total data cara 1
	// $result = mysqli_query($conn, "SELECT * FROM mahasiswa");
	// $jumlahTotalData = mysqli_num_rows($result);
	// var_dump($jumlahTotalData);

	// menghitung total data cara 2
	// $jumlahTotalData = count(query("SELECT * FROM mahasiswa"));
	// var_dump($jumlahTotalData);

	// pembagi pecahan
	// round(val); dibulatkan ke nilai terdekat
	// floor(value); dibulatkan ke nilai bawah
	// ceil(value); dibulatkan ke atas

	$jumlahDataPerhalaman = 5;
	$jumlahData = count(query("SELECT * FROM mahasiswa"));
	$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
	$halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;

	// Menentukan awal data
	// jumlahDataPerhalaman = 5;
	// halaman =1 awal data = 0
	// halaman =2 awal data = 4
	// halaman =3 awal data = 9
	// halaman =4 awal data = 14
	// halaman =5 awal data = 19
	$awalData = ($jumlahDataPerhalaman * $halamanAktif) - $halamanAktif;


	$mahasiswa = query("SELECT * FROM mahasiswa");
	if (isset($_POST["cari"])) { //tombol cari berdasarkan name
		$mahasiswa = cari($_POST["keyword"]);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
	<?= $headerWap; ?>
</head>
<body>

<!-- 	<div class="header"><h1>Daftar Mahasiswa</h1></div>
	<br>
	<a  href="logout.php">Logout</a> | <a href="cetak.php">Cetak</a>
	<br>
	<br>
	<br>
	<a href="tambah.php">Tambah Data mahasiswa</a>
	<br>
	<br> -->

<div class="header">Data Mahasiswa</div>
	<br>
	<div style="clear: both;"></div>
	<div class="navbar">
		<a href="logout.php">Log Out</a>
		<a href="cetak.php" target="_blank">Print</a>
		<a href="tambah.php">Tambah Mahasiswa</a>
		<form action="" method="post" id="pencarian">
			<input type="text" name="keyword" placeholder="Search..." autocomplete="off">
			<button type="submit" name="cari">Cari</button>
		</form>
	<div style="clear: both;"></div>
	</div>
	<div style="clear: both;"></div>
	<br>
	<table id="tabel">
		<tr>
			<th>No.</th>
			<th>Gambar</th>
			<th>NPM</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Jurusan</th>
			<th>Aksi</th>
		</tr>
		<?php $nomor = 1; ?>
		<?php foreach($mahasiswa as $row): ?>
		<tr>
			<td id="nomor"><?php echo $nomor; $nomor++; ?></td>
			<td><img src="img/<?= $row["gambar"]; ?>" id="profile"></td>
			<td><?= $row["npm"]; ?></td>
			<td align="left"><?= $row["nama"]; ?></td>
			<td align="left"><?= $row["email"]; ?></td>
			<td align="left"><?= $row["jurusan"]; ?></td>
			<td>
				<a href="ubah.php?id=<?= $row["id"]; ?>"><div class="kuning tombol tombol2">Ubah</div></a>
				<a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin');"><div class="merah tombol tombol2">Hapus</div></a>
			</td>
		</tr>
	<?php endforeach ?>
	</table>
	<div class="clear"></div>
	<?= $footerWap; ?>
</body>
</html>	
