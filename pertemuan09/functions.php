<?php 
	// koneksi ke database
	$conn = mysqli_connect("localhost","root","","wpu_phpdasar");

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
?>
