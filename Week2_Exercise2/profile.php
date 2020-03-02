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

	<body class="profilePosition">
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
		}
		?>
		
		<!--Show User Profile Detail-->
		<h1 class="profileTitle">User Profile</h1>
		<div class="profileLeft">
			<p>
				Profile Picture:
			</p>
	
			<img style="width: 200px;" src="<?php echo $imgSrc; ?>"/>
		</div>
		<div class="profileRight">
			<p>User Name: <?php echo $username; ?></p>
			<p>Email: <?php echo $email; ?></p>
			<p>Nickname: <?php echo $nickname; ?></p>
			<form action="profileEditForm.php" method="post" enctype="multipart/form-data">
			<input type="text" name="id" value="<?php echo $id; ?>" style="display: none;">
			<input type="submit" value="Edit" class="Submit">
			</form>
		</div>
		<!--END: Show User Profile Detail-->
		
		
		<!--JavaScript-->
		<!-- jQuery and Bootstrap JS -->
		<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<!-- My JS -->
		<script type="text/javascript" src="js/script.js"></script>
		<!--END: JavaScript-->
	</body>

</html>