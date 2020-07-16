<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Latihan1</title>
	<link rel="stylesheet" href="">
	<style>
		body{
			background-color: #efefef;
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
	</style>
</head>
<body>
<?php 
$numbers = [[1,2,3],
			[4,5,6],
			[7,8,9]
];
?>

<?php foreach($numbers as $number) : ?>
	<?php foreach ($number as $numb) :?>
		<div class="kotak"><?php echo $numb ?></div>
	<?php endforeach ?>
	<div class="clear"></div>
<?php endforeach ?>

</body>
</html>

