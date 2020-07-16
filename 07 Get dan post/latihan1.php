<?php 
/*variable superglobal
$_GET
$_POST
$_REQUEST
$_SESSION
$_COOKIE
$_SERVER
$_ENV
*/
 ?>
 <?php 
$mahasiswa = [
	[
		"nama" => "Isep Lutpi Nur", 
		"npm" => "2113191079",
		"jurusan" => "Teknik Informatika",
		"email" => "iseplutpinur7@gmail.com",
		"gambar" => "foto.jpg"
	],
	[
		"nama" => "Otong surotong", 
		"npm" => "2113901088",
		"jurusan" => "Teknik Memasak",
		"email" => "otong@gmail.com",
		"gambar" => "Picture1.png"
	],
	[
		"nama" => "Ucup surotong", 
		"npm" => "2113901033",
		"jurusan" => "Teknik Menjahit",
		"email" => "Ucos@gmail.com",
		"gambar" => "Picture1.jpg"
	],
	[
		"nama" => "domi", 
		"npm" => "2113909979",
		"jurusan" => "Teknik Memasak",
		"email" => "domi@gmail.com",
		"gambar" => "Picture2.png"
	],
	[
		"nama" => "tatang suratna", 
		"npm" => "2555901079",
		"jurusan" => "Teknik Memasak",
		"email" => "tatang@gmail.com",
		"gambar" => "Picture2.jpg"
	]
];
?>
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
			margin: 5px 10px 10px 5px;
			width: 50px;
			height: 50px;
			border-radius: 9px;
		}
		.list{
			width: 300px;
			height: 60px;
			background-color: #4CAF50;
			float: left;
			text-align: left;
			margin: 5px;
			font-size: 30px;
			line-height: 10px;
			text-decoration: none;
			color: white;
		}
		.menuUtama{
		width: 90%;
		margin: auto;
		align-items: center;
		}
		.list:hover{
			background-color: white;
			color: black;
			transition: .3s;
		}
	</style>
</head>
<body>
	<div class="header">Metode Request</div>
	<br>
<?php foreach ($mahasiswa as $mhs) : ?>
	<a href="latihan2.php?nama=<?php echo $mhs["nama"]; ?>&gambar=<?php echo $mhs["gambar"]; ?>&npm=<?php echo $mhs["npm"]; ?>&jurusan=<?php echo $mhs["jurusan"]; ?>&email=<?php echo $mhs["email"]; ?>">
	<div class="list">
		<img src="img/<?= $mhs["gambar"]; ?>" id="profile" />
		<ul>
			<?= $mhs["nama"];?>
		</ul>
	</div></a>
<?php endforeach ?>

</body>
</html>

