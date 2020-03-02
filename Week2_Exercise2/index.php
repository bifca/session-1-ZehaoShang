<!DOCTYPE html>
<html lang="zh">

	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
  		<link href="img/favicon.ico" rel="icon" type="image/x-ico">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Title of Webpage -->
		<title>Dota2 Blog</title>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<!-- Icomoon Icon Fonts-->
		<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="css/styles.css" />
	</head>

	<body>
		<!--Require Database Connection-->
		<?php
		require 'config.php';
		?>
		<!--END: Require Database Connection-->
		
		<!--Top Navigation-->
		<?php
		include 'topNav.php';
//		include 'lock.php';
		?>
		<!--END:Top Navigation-->

		<!--Home Content-->
		<?php
			//Carousel Part
			include 'carousel.php';
			//END: Carousel Part

			//Classic Songs Part
			include 'blog.php';
			//END: Classic Songs Part
		?>
		
		<!--Close Database Connection-->
		<?php
		mysqli_close($connection);
		?>
		<!--END: Close Database Connection-->

		<!-- jQuery and Bootstrap JS -->
		<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<!-- My JS -->
		<script type="text/javascript" src="js/script.js"></script>
	</body>

</html>