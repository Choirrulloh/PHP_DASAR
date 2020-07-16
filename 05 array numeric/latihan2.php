<?php 
/* pertemuan 5 array
*/
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>pertemuan 5 array</title>
    <meta name="description" content="Dasar PHP" />
    <meta name="keywords" content="Dasar Pemerograman PHP" />
    <meta name="author" content="iseplutpi" />
    <link rel="shortcut icon" href="../icon/favicon.ico">
    <link rel="apple-touch-icon" sizes="57x57" href="../icon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../icon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../icon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../icon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../icon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../icon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../icon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../icon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../icon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="../icon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../icon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../icon/favicon-16x16.png">
    <link rel="manifest" href="../icon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="../icon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
	<link rel="stylesheet" href="">
	<style>
		.pertama{
			width: 100px;
			height: 50px;
			background-color: #4CAF50;
			color: white;
			line-height: 50px;
			float: left;
			text-align: center;
			margin: 3px;
		}
		.pertama:hover{
			background-color: #050;
			border-radius: 1px;
		}
		body{
			background: #eee;
		}
		.header {
			padding: 16px 0;
			font-size: 30px;
			font-weight: bold;
			background-color: rgba(30, 190, 165, .96);
			text-align: center;
			vertical-align: middle;
			color: white;   
		}
		.clear{
			clear: both;
		}
	</style>
</head>
<body>
	<div class="header">Array Dengan for function biasa</div>
	<?php 
	$larik = ["Isep", "Lutpi", "Nur", 112, 909,"kau","Dia","aku"];
	?>
	<!-- fungsi count untuk menghitung jumlah array otomatis -->
	<?php for ($i=0; $i <count($larik); $i++) :?>
		<div class="pertama"><?php echo $larik[$i]; ?></div>
	<?php endfor ?>
	<div class="clear"></div>
	<?php foreach ($larik as $k) :?>
		<div class="pertama"><?php echo $k; ?></div>
	<?php endforeach ?>
</body>
</html>	
