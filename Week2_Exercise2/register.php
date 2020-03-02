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

		<!--Register Page Title-->
		<h1 class="registerTitle">New User Registration Form</h1>
		<!--Create Account Form-->
		<form action="createaccount.php" method="post" enctype="multipart/form-data" class="registerForm">
			<!--Profile Picture Part-->
			<div class="registerLeft">
				<p>
					Profile Picture:
				</p>
				<input type="file" name="file" id="fileInput"  onChange="preview(this)" required="required">
				<div id="dropContainer">
					<img src="" id="previewimg"/>
					<p>
						Drop Here/Click
					</p>
				</div>
				<!--error infomation from createaccount.php-->
				<?php if(!empty($_SESSION["error"])) { ?>
<div class="loginError"><?php echo $_SESSION["error"];
					$_SESSION["error"] = NULL;
 ?></div>
<?php } ?>
			</div>
			<!--User Detail Part-->
			<div class="registerRight">
				<p class="boxGuide">
					Username:
				</p>
				<input class="box" type="text" name="username" required="required">
				<br>
				<p class="boxGuide">
					Password:
				</p>
				<input class="box" type="password" name="password" required="required">
				<br>
				<p class="boxGuide">
					Email:
				</p>
				<input class="box" type="text" name="email" required="required">
				<br>
				<p class="boxGuide">
					Nickname:
				</p>
				<input class="box" type="text" name="nickname" required="required">
				<br>
				<input type="submit" name="submit" value="submit" class="Submit">
				<p>
					<a href="login.php">
						Return to website login
					</a>
				</p>
			</div>
		</form>

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