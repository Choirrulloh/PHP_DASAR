
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>POST</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php if (isset($_POST["submit"])) : ?>
		<h1>Selamat Datang, <?php echo $_POST["nama"]; ?></h1> <br>
	<?php endif ?>
		<form action="" method="post">
		Masukan Nama:
		<input type="text" name="nama">
		<br>
		<button type="submit" name="submit">Kirim</button>
	</form>
</body>
</html>
