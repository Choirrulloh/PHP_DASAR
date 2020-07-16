<?php 
/* pertemuan 2 PHP Dasar

	1 Sintaks PHP
		penuliasan sintaks PHP
		1. PHP didalam HTML
			<!DOCTYPE html>
			<html>
			<head>
				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<title></title>
				<link rel="stylesheet" href="">
			</head>
			<body>
				<h1><?php echo"Hello Mantan"; ?></h1>
			</body>
		</html>	
		2. HTML didalam PHP
		<?php echo "<h1>Hello Mantan</h1>" ?>
	2 standar output
	3 echo, print
	4 print_r();
	5 var-dump();
	6 operator arinmatika
	7 boolean false = kosong, boolean true = 1;
	8 penggabung string /concatenation/ concat = (.)
	9 operator assigment =, +=, -=, *=, /=, %=;
	10 operator perbandingan < <= == => >
	11 operator identitas ===, !==
	12 operator logika and && or || not !
*/

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Isep Lutpi Nur</title>
    <meta name="description" content="Isep Lutpi Nur - CV/Resume" />
    <meta name="keywords" content="Isep Lutpi Nur" />
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
</head>
<body>
	<h1><?php 
		$nama = "Isep Lutpi Nur";
		echo"Hello $nama<br>";
		$nilai = 4;
		if ($nilai%2 == 0) {
			echo "Genap";
		}else{
			echo"Ganjil";
		}
	?></h1>
</body>
</html>	
