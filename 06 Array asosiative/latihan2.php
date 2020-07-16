<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Latihan1</title>
	<link rel="stylesheet" href="">
	<style>
		body{
			background-color: #eeeeee;
		}
		.header{
			background-color: rgba(30, 190, 165, .96);
			width: 80%;
			height: 60px;
			font-size: 30px;
			color: white;
			text-align: center;
			line-height: 60px;
			margin: auto;
			border-radius: 10px;

		}
		.header:hover{
			background-color: #bbb;
			transition: 3s;
			color: black;

		}
		.kotak{
			width: 50px;
			height: 50px;
			background-color: #BADA55;
			color: white;
			text-align: center;
			line-height: 50px;
			margin: 3px;
			float: left;
			transition: 1s;
		}
		.kotak:hover{
			transform: rotate(360deg);
			border-radius: 50%;
			background-color: #AAAAAA;
		}
		.clear{
			clear: both;
		}
		#profile{
			float:left;
			margin: 10px 30px 10px 10px;
			width: 100px;
			height: 100px;
			border-radius: 3px;
		}
		.pertama{
			width: 350px;
			height: 120px;
			background-color: #4CAF50;
			color: white;
			float: left;
			text-align: left;
			margin: 5px;
		}
		.menuUtama{
		width: 90%;
		margin: auto;
		align-items: center;
		}
		div .pertama:hover{
			background-color: white;
			color: black;
			transition: 1s;
		}
	</style>
</head>
<body>
	<div class="header">Daftar Mahasiswa</div>
<?php 
$mahasiswa = [
	[
		"nama" => "Isep Lutpi Nur", 
		"npm" => "2113191079",
		"jurusan" => "Teknik Informatika",
		"email" => "email",
		"gambar" => "foto.jpg"
	],
	[
		"nama" => "Otong surotong", 
		"npm" => "2113901079",
		"jurusan" => "Teknik Memasak",
		"email" => "email",
		"gambar" => "Picture1.png"
	],
	[
		"nama" => "Otong surotong", 
		"npm" => "2113901079",
		"jurusan" => "Teknik Memasak",
		"email" => "email",
		"gambar" => "Picture1.jpg"
	],
	[
		"nama" => "Otong surotong", 
		"npm" => "2113901079",
		"jurusan" => "Teknik Memasak",
		"email" => "email",
		"gambar" => "Picture2.png"
	],
	[
		"nama" => "Otong surotong", 
		"npm" => "2113901079",
		"jurusan" => "Teknik Memasak",
		"email" => "email",
		"gambar" => "Picture2.jpg"
	]
];
?>

	<div class="clear"></div>
	<br>
	<div class="clear"></div>

	<div class="menuUtama">
		<?php foreach ($mahasiswa as $mhs) :?>
		<div class="pertama">
			<img src="img/<?= $mhs["gambar"]; ?>" id="profile" />
			<ul>
				<li>Nama: <?= $mhs["nama"];?></li>
				<li>NPM: <?= $mhs["npm"];?></li>
				<li>Jurusan: <?= $mhs["jurusan"];?></li>
				<li>Email: <?= $mhs["email"];?></li>
			</ul>
		</div>
		<?php endforeach ?>
	</div>

</body>
</html>

