<?php 
	session_start();
	if (!isset($_SESSION["login"])) {
		header("Location: login.php");
		exit;
	}
	require 'functions.php';
	$mahasiswa = query("SELECT * FROM mahasiswa");
 
	// Cetak Pdf Menggunakan MPDF
	require_once '../../../vendor/autoload.php';
	$mpdf = new Mpdf\Mpdf();
	$html ='
		<!DOCTYPE html>
		<html>
		<head>
			<title>Daftar Mahasiswa</title>
			' . $headerWap . '
		</head>
		<body>
		<h1 style="text-align: center;">Daftar Mahasiswa</h1>	
			<table id="tabel">
				<tr>
					<th>No.</th>
					<th>Gambar</th>
					<th>NPM</th>
					<th>Nama</th>
					<th>Email</th>
					<th>Jurusan</th>
				</tr>
	';
	$number = 0;
	foreach($mahasiswa as $row){
		$html .='
		<tr>
			<td style="text-align: center;">'.++$number.'</td>
			<td><img src="img/'.$row["gambar"].'" id="profile"></td>
			<td>'.$row["npm"].'</td>
			<td>'.$row["nama"].'</td>
			<td>'.$row["email"].'</td>
			<td>'.$row["jurusan"].'</td>
		</tr>
		';		
	}
	$html .= '
			</table>
		</body>
		</html>
	';
	$mpdf -> WriteHTML($html);
	$mpdf -> Output('Daftar mahasiswa.pdf,', 'I');
 ?>
