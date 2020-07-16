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
	function registrasi($data){
		global $conn;
		$username = strtolower(stripcslashes($data["username"]));
		$password = mysqli_real_escape_string($conn,$data["password"]);
		$password2 = mysqli_real_escape_string($conn,$data["password2"]);

		// cek konfirmasi pasword
		if ($password !== $password2) {
		echo "
			<script>
				alert('Password tidak sesuai');
				document.location.href='registrasi.php';
			</script>
		";
		return false;
		}

		// cek username ya sudah ada atau belum
		$result = mysqli_query($conn,"SELECT username FROM users WHERE username = '$username'");
		if (mysqli_fetch_assoc($result)) {
			echo "
				<script>
					alert('Username telah digunakan');
					document.location.href='registrasi.php';
				</script>
			";
			return false;
		}



		// enkripsi password
		$password = password_hash($password, PASSWORD_DEFAULT);
		// tambah kan paswoerd yang sudah di enkripsi ke tabel


		mysqli_query($conn,"INSERT INTO users VALUES('','$username','$password')");
		return mysqli_affected_rows($conn);
	}

	$headerWap ="
		<meta charset=\"utf-8\">
		<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
		<meta name=\"description\" content=\"Dasar PHP\" />
		<meta name=\"keywords\" content=\"Dasar Pemerograman PHP\" />
		<meta name=\"author\" content=\"iseplutpi\" />
		<link rel=\"shortcut icon\" href=\"../icon/favicon.ico\">
		<link rel=\"apple-touch-icon\" sizes=\"57x57\" href=\"icon/apple-icon-57x57.png\">
		<link rel=\"apple-touch-icon\" sizes=\"60x60\" href=\"icon/apple-icon-60x60.png\">
		<link rel=\"apple-touch-icon\" sizes=\"72x72\" href=\"icon/apple-icon-72x72.png\">
		<link rel=\"apple-touch-icon\" sizes=\"76x76\" href=\"icon/apple-icon-76x76.png\">
		<link rel=\"apple-touch-icon\" sizes=\"114x114\" href=\"icon/apple-icon-114x114.png\">
		<link rel=\"apple-touch-icon\" sizes=\"120x120\" href=\"icon/apple-icon-120x120.png\">
		<link rel=\"apple-touch-icon\" sizes=\"144x144\" href=\"icon/apple-icon-144x144.png\">
		<link rel=\"apple-touch-icon\" sizes=\"152x152\" href=\"icon/apple-icon-152x152.png\">
		<link rel=\"apple-touch-icon\" sizes=\"180x180\" href=\"icon/apple-icon-180x180.png\">
		<link rel=\"icon\" type=\"image/png\" sizes=\"192x192\"  href=\"icon/android-icon-192x192.png\">
		<link rel=\"icon\" type=\"image/png\" sizes=\"32x32\" href=\"icon/favicon-32x32.png\">
		<link rel=\"icon\" type=\"image/png\" sizes=\"96x96\" href=\"icon/favicon-96x96.png\">
		<link rel=\"icon\" type=\"image/png\" sizes=\"16x16\" href=\"icon/favicon-16x16.png\">
		<link rel=\"manifest\" href=\"icon/manifest.json\">
		<meta name=\"msapplication-TileColor\" content=\"#ffffff\">
		<meta name=\"msapplication-TileImage\" content=\"icon/ms-icon-144x144.png\">
		<meta name=\"theme-color\" content=\"#ffffff\">
		<link rel=\"stylesheet\" href=\"css/style.css\">
	";
	$footerWap = "
		<p style=\"text-align: center; margin: 50px; color: #222;\" >&copy; 2020 All Rights Reserved. Made with by <a href=\"index.php\"  style=\"text-decoration: none; color: #111;\" >Isep Lutpi Nur</a></p>
	"
?>
