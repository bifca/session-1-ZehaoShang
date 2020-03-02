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
		<h1 class="blogEditTitle">Blog Create Form</h1>
		<!--Edit User blog Detail-->
		<form action="blogCreate.php" method="post" enctype="multipart/form-data" class="blogEditForm">
			<!--blog Picture Part-->
			<div class="blogEditLeft">
				<p>
					Blog Picture:
				</p>
				<input type="file" required="required" name="file" id="fileInput"  onChange="preview(this)">
				<div id="dropContainer">
					<img src="" id="previewimg" style="display: inline-block;"/>
					<p>
						Drop Here/Click
					</p>
				</div>
				<!--error infomation from blogCreate.php-->
				<?php if(!empty($_SESSION["blogCreateError"])) { ?>
<div class="loginError"><?php echo $_SESSION["blogCreateError"]; $_SESSION["blogCreateError"] = NULL;?></div><?php } ?>
			</div>
			<!--User Detail Part-->
			<div class="blogEditRight">
				<p class="boxGuide">
					Title:
				</p>
				<input class="box" type="text" name="title" required="required">
				<br>
				<p class="boxGuide">
					Date:
				</p>
				<input class="box" type="date" name="date" required="required">
				<br>
				<p class="boxGuide">
					Content:
				</p>
				<textarea rows="5" cols="20" class="box" type="textarea" name="content" required="required"></textarea>
				<br>
				<input type="submit" value="Create" class="Submit">
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