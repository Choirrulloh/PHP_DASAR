<?php
	// koneksi ke database
	$conn = mysqli_connect("localhost","root","","phpdasar");
 
	// ambil data atau query
	// ambil data (fetch) mahasiswa dari object result
	// mysqli_fetch_row(); array numeric
	// mysqli_fetch_assoc(); array assosiative
	// mysqli_fetch_array();
	// mysqli_fetch_object();
	// while($mhs = mysqli_fetch_assoc($result)){
	// 	var_dump($mhs["nama"]);
	// }
	function query($query){
		global $conn;
		$result = mysqli_query($conn, $query);
		$rows = [];
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}
		return $rows;
	}

	function tambah($data){
		global $conn;
		$npm = htmlspecialchars($data["npm"]);
		$nama = htmlspecialchars($data["nama"]);
		$jurusan = htmlspecialchars($data["jurusan"]);
		$email = htmlspecialchars($data["email"]);

		//upload gambar
		$gambar = upload();
		if (!$gambar){ // bisa juga pakai $gambar == false
			return false;
		}
		$query = "INSERT INTO mahasiswa VALUES ('','$nama','$npm','$email','$jurusan','$gambar')";
		mysqli_query($conn,$query);

		return mysqli_affected_rows($conn);
	}

	function upload(){
		$namaFile = $_FILES['gambar']['name'];
		$ukuranFile = $_FILES['gambar']['size'];
		$error = $_FILES['gambar']['error'];
		$tmp_Name = $_FILES['gambar']['tmp_name'];

		// cek apakah ada gambar yang di upload
		if ($error == 4) {
			echo "
				<script>
					alert('Pilih gambar terlebih dahulu');
					document.location.href='index.php';
				</script>
			";
			return false;
		}

		// cek apakah yang di uplooad tersebut gambar
		$ekteksiGambarValid = ['jpg','jpeg','png'];
		$ekteksiGambar = explode('.', $namaFile);
		$ekteksiGambar = strtolower(end($ekteksiGambar));
		// cek ektensi gambar
		if (!in_array($ekteksiGambar, $ekteksiGambarValid)) {
			echo "
				<script>
					alert('Yang anda upload bukan gambar');
					document.location.href='index.php';
				</script>
			";
			return false;
		}

		// cek ukuran gambar
		if ($ukuranFile > 1000000) {
			echo "
				<script>
					alert('Ukuran gambar terlalu besar');
					document.location.href='index.php';
				</script>
			";
			return false;
		}
		// lolos pengecekan gambar siap di upload
		// generate nama file baru
		$namaFileBaru = uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .= $ekteksiGambar;
		move_uploaded_file($tmp_Name, 'img/'.$namaFileBaru);
		return $namaFileBaru;
	}


	function hapus($id){
		global $conn;
		mysqli_query($conn,"DELETE FROM mahasiswa WHERE id = $id");
		return mysqli_affected_rows($conn);
	}

	function ubah($data){
		global $conn;
		$id = $data["id"];
		$npm = htmlspecialchars($data["npm"]);
		$nama = htmlspecialchars($data["nama"]);
		$jurusan = htmlspecialchars($data["jurusan"]);
		$email = htmlspecialchars($data["email"]);

		$gambarLama = htmlspecialchars($data["gambarLama"]);
		// cek apakah user pilih gambar baru atau tidak
		if ($_FILES['gambar']['error'] == 4) {
			$gambar = $gambarLama;
		}else{
			$gambar = upload();
		}

		$query = "UPDATE mahasiswa SET
				nama = '$nama',
				email = '$email',
				jurusan = '$jurusan',
				npm = '$npm',
				gambar = '$gambar'
				WHERE id = $id;
				";
		mysqli_query($conn,$query);

		return mysqli_affected_rows($conn);
	}

	function cari($keyword){
		$query = "SELECT * FROM mahasiswa
					WHERE
				nama LIKE '%$keyword%' OR
				npm LIKE '%$keyword%' OR
				jurusan LIKE '%$keyword%' OR
				email LIKE '%$keyword%'
				";
		return query($query);
	}
?>
