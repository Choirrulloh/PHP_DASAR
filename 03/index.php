<?php 
/* pertemuan 3 Struktur Kendali
	1. Perulangan
		A. for
		B. while
		C. do. While
		D. foreach : perulangan khusus array
			<table margin="auto" border="1" cellspacing="0" cellpadding="10" >
				<?php for ($i=1; $i <=10 ; $i++) : ?>
					<tr>
						<?php for ($j=1; $j <=10 ; $j++) : ?>
							<td>
								<?= $i*$j ?>
							</td>
						<?php endfor; ?>
					</tr>
				<?php endfor; ?> 
			</table>
	2. Percabangan
		A. else if
			<?php 
				$x = 9;
				if ($x%2 ==0) {
					echo "genap";
				} else {
					echo "ganjil";
				}
				
			 ?>
		B. Switch
		C. Ternary
*/

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>pertemuan 3 Struktur Kendali</title>
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
		tr:hover {background-color: #ddd;}
		td:hover {background-color: #ccc;}
		#genap{
			background: #eee;
		}
		#genap:hover {background-color: #ddd;}
		table{
			border-collapse: collapse;
			width: 400px;
			margin: auto;
		}
		#genap, tr{
			border: 1px solid #ddd;
			padding: 8px;
		}
			border: 1px solid #ddd;
			padding: 8px;*/
	</style>
</head>
<body>

	<table margin="auto" border="0" cellspacing="0" cellpadding="10" >
		<?php for ($i=1; $i <=90 ; $i++) : ?>
			<?php if ($i%2 == 0) : ?>
			<tr>
			<?php else : ?>
			<tr id="genap" >
			<?php endif; ?>
				<?php for ($j=1; $j <=10 ; $j++) : ?>
					<td>
						<?= $i*$j ?>
					</td>
				<?php endfor; ?>
			</tr>
		<?php endfor; ?> 
	</table>
</table>
</body>
</html>	
