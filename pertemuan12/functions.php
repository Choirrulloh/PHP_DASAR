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
		$gambar = htmlspecialchars($data["gambar"]);
		$email = htmlspecialchars($data["email"]);

		$query = "INSERT INTO mahasiswa VALUES ('','$nama','$npm','$email','$jurusan','$gambar')";
		mysqli_query($conn,$query);

		return mysqli_affected_rows($conn);
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
		$gambar = htmlspecialchars($data["gambar"]);
		$email = htmlspecialchars($data["email"]);

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
