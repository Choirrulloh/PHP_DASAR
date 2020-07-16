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
	<title>Ubah data</title>
	<?= $headerWap; ?>
</head>
<body>
	<div class="form-group"><h1>Ubah Data Mahasiswa</h1></div>
	<div class="containerTambahData">	
	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
		<input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">
			<div class="form-group">
				<label for="npm">Nomor Pokok Mahasiswa: </label>
				<input type="text" name="npm" id="npm" required="" value="<?= $mhs["npm"]; ?>">
			</div>
			<div class="form-group">
				<label for="nama">Nama: </label>
				<input type="text" name="nama" id="nama" required="" value="<?= $mhs["nama"]; ?>">
			</div>
			<div class="form-group">
				<label for="jurusan">Jurusan: </label>
				<input type="text" name="jurusan" id="jurusan" required="" value="<?= $mhs["jurusan"]; ?>">
			</div>
			<div class="form-group">
				<label for="email">Email: </label>
				<input type="text" name="email" id="email" required="" value="<?= $mhs["email"]; ?>">
			</div>
			<div class="form-group">
				<label for="gambar">Profile: </label><br>
				<img style="width: 100px; height: 100px;" src="img/<?= $mhs["gambar"]; ?>" alt=""><br>
				<input type="file" name="gambar" id="gambar" hidden="hidden">

				<button type="button" id="custom-button">Chose a file</button>

				<span id="custom-text">Pilih foto dengan format jpeg, jpg, atau png</span>
				<script type="text/javascript">
					const relalFileBtn = document.getElementById('gambar');
					const costumBtn = document.getElementById('custom-button');
					const costumText = document.getElementById('custom-text');
					costumBtn.addEventListener("click", function(){
						relalFileBtn.click();
					})
					relalFileBtn.addEventListener("change",function(){
						if (relalFileBtn.value) {
							costumText.innerHTML = relalFileBtn.value;
						}else {
							costumText.innerHTML = "Tidak ada file jpeg, jpg, atau png";
						}
					})
				</script>
			</div>


			<div class="clear"><br></div>
			<button type="submit" name="submit" id="sumit" hidden="hidden"></button>
			<div class="form-group">
				<div class="tombol kuning" id="custom-tambah">Tambah Data</div>
				<a href="index.php"><div class="tombol hijau">Kembali</div></a>
			</div>
			<script type="text/javascript">
				const relalSubmitBtn = document.getElementById('sumit');
				const costumSubmitBtn = document.getElementById('custom-tambah');
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
