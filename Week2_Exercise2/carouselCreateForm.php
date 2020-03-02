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

	<body id="nodrag">
		<!--Require Database Connection-->
		<?php
		require 'config.php';
		?>
		<!--END: Require Database Connection-->

		<!--Top Navigation-->
		<?php
		include 'topNav.php';
		?>
		<!--END:Top Navigation-->
		

		<!--blog Edit Page Title-->
		<h1 class="blogEditTitle">Carousel Create Form</h1>
		<!--Edit User blog Detail-->
		<form action="carouselCreate.php" method="post" enctype="multipart/form-data" class="blogEditForm">
			<!--blog Picture Part-->
			<div class="blogEditLeft">
				<p>
					Carousel Picture:
				</p>
				<input type="file" required="required" name="file" id="fileInput"  onChange="preview(this)">
				<div id="dropContainer" style="width: 100%;">
					<img src="" id="previewimg" style="display: inline-block;"/>
					<p>
						Drop Here/Click
					</p>
				</div>
				<!--error infomation from blogCreate.php-->
				<?php if(!empty($_SESSION["carouselCreateError"])) { ?>
<div class="loginError"><?php echo $_SESSION["carouselCreateError"]; $_SESSION["carouselCreateError"] = NULL;?></div><?php } ?>
				<input type="submit" value="Upload" class="Submit">
			</div>
		</form>
		<!--Edit User blog Detail-->

		<!--JavaScript-->
		<!-- jQuery and Bootstrap JS -->
		<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<!-- My JS -->
		<script type="text/javascript" src="js/script.js"></script>

		<script src="js/uploadImage.js" type="text/javascript" charset="utf-8"></script>
		<!--END: JavaScript-->
	</body>

</html>