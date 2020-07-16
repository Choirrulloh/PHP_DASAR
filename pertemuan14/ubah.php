<?php
	require 'functions.php';
	// ambil data di id
	$id = $_GET["id"];
	// cek tombol submit sudah di tekan atau belum
	$mhs = query("SELECT * FROM mahasiswa WHERE id=$id")[0];
	if (isset($_POST["submit"])) {
		// cek data telah berhasil diubah atau tidak
		if (ubah($_POST) > 0){
			echo "
				<script>
					alert('Data berhasil diubah');
					document.location.href='index.php';
				</script>
			";
		}else{
			echo "
			<script>
				alert('Data gagal diubah silahkan hubungi developer');
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
	<title>Ubah data</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<h1>Ubah data mahasiswa</h1>
	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
		<input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">
		<ul>
			<li>
				<label for="npm">NPM: </label>
				<input type="text" name="npm" id="npm" required="" value="<?= $mhs["npm"]; ?>">
			</li>
			<li>
				<label for="nama">Nama: </label>
				<input type="text" name="nama" id="nama" required="" value="<?= $mhs["nama"]; ?>">
			</li>
			<li>
				<label for="jurusan">Jurusan: </label>
				<input type="text" name="jurusan" id="jurusan" required="" value="<?= $mhs["jurusan"]; ?>">
			</li>
			<li>
				<label for="gambar">Gambar: </label><br>
				<img style="width: 100px; height: 100px;" src="img/<?= $mhs["gambar"]; ?>" alt=""><br>
				<input type="file" name="gambar" id="gambar">
			</li>
			<li>
				<label for="email">Email: </label>
				<input type="text" name="email" id="email" required="" value="<?= $mhs["email"]; ?>">
			</li>
			<li>
				<button type="submit" name="submit">
					Ubah Data!
				</button>
			</li>
		</ul>
		
	</form>
</body>
</html>
