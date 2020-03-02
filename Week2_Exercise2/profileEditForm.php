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

		// Query Logined User Detail
		$userId = $_SESSION['userID'];
		$queryUserDetail = "SELECT id, username, password, email, nickname, imgSrc FROM admin WHERE id = $userId";
		$UserDetail = mysqli_query($connection, $queryUserDetail);
		if (mysqli_num_rows($UserDetail) > 0) {
			while ($row = mysqli_fetch_assoc($UserDetail)) {
				$id = $row["id"];
				$username = $row["username"];
				$password = $row["password"];
				$email = $row["email"];
				$nickname = $row["nickname"];
				$imgSrc = $row["imgSrc"];
			}
		};
		?>
		
		<!--Profile Edit Page Title-->
		<h1 class="profileEditTitle">Profile Edit Form</h1>
		<!--Edit User Profile Detail-->
		<form action="profileEdit.php" method="post" enctype="multipart/form-data" class="profileEditForm">
			<!--Profile Picture Part-->
			<div class="profileEditLeft">
				<p>
					Profile Picture:
				</p>
				<input type="file" name="file" id="fileInput"  onChange="preview(this)">
				<div id="dropContainer">
					<img src="<?php echo $imgSrc; ?>" id="previewimg" style="display: inline-block;"/>
					<p>
						Drop Here/Click
					</p>
				</div>
				<input type="text" name="id" value="<?php echo $id; ?>" style="display: none;">
				<!--error infomation from profileEdit.php-->
				<?php if(!empty($_SESSION["profileEditError"])) { ?>
	<div class="loginError"><?php echo $_SESSION["profileEditError"];$_SESSION["profileEditError"]=NULL; ?></div><?php } ?>
			</div>
			<!--User Detail Part-->
			<div class="profileEditRight">
				<p class="boxGuide">
					UserName:
				</p>
				<input class="box" type="text" name="username" value="<?php echo $username; ?>">
				<br>
				<p class="boxGuide">
					Password:
				</p>
				<input class="box" type="password" name="password">
				<br>
				<p class="boxGuide">
					Email:
				</p>
				<input class="box" type="text" name="email" value="<?php echo $email; ?>">
				<br>
				<p class="boxGuide">
					Nickname:
				</p>
				<input class="box" type="text" name="nickname" value="<?php echo $nickname; ?>">
				<br>
				<input type="submit" value="submit" class="Submit">
			</div>
		</form>
		<!--Edit User Profile Detail-->

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