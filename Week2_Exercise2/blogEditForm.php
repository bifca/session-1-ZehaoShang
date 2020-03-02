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
		<?php

		$blogId = $_GET["id"];
		$queryUserDetail = "SELECT * FROM `blog` WHERE `blogID` = $blogId";
		$blogInfo = mysqli_query($connection, $queryUserDetail);
		if (mysqli_num_rows($blogInfo) > 0) {
			while ($row = mysqli_fetch_assoc($blogInfo)) {
				$blogID = $row["blogID"];
				$blogImg = $row["src"];
				$blogTitle = $row["title"];
				$blogDate = $row["date"];
				$blogContent = $row["textContent"];
			}
		};
		?>

		<!--blog Edit Page Title-->
		<h1 class="blogEditTitle">Blog Edit Form</h1>
		<!--Edit User blog Detail-->
		<form action="blogEdit.php" method="post" enctype="multipart/form-data" class="blogEditForm">
			<!--blog Picture Part-->
			<div class="blogEditLeft">
				<p>
					Blog Picture:
				</p>
				<input type="file" name="file" id="fileInput"  onChange="preview(this)">
				<div id="dropContainer">
					<img src="<?php echo $blogImg; ?>" id="previewimg" style="display: inline-block;"/>
					<p>
						Drop Here/Click
					</p>
				</div>
				<input type="text" name="blogID" value="<?php echo $blogID; ?>" style="display: none;">
				<!--error infomation from blogEdit.php-->
				<?php if(!empty($_SESSION["blogEditError"])) { ?>
<div class="loginError"><?php echo $_SESSION["blogEditError"]; $_SESSION["blogEditError"] = NULL;?></div><?php } ?>
			</div>
			<!--User Detail Part-->
			<div class="blogEditRight">
				<p class="boxGuide">
					Title:
				</p>
				<input class="box" type="text" name="title" value="<?php echo $blogTitle; ?>">
				<br>
				<p class="boxGuide">
					Date:
				</p>
				<input class="box" type="date" name="date" required="required" value="<?php echo $blogDate; ?>">
				<br>
				<p class="boxGuide">
					Content:
				</p>
				<textarea rows="5" cols="20" class="box" type="textarea" name="content"><?php echo $blogContent; ?></textarea>
				<br>
				<input type="submit" value="Change" class="Submit">
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