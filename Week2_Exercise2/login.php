<?php
// Require Database Connection
require 'config.php';
// END: Require Database Connection

// Login Function
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Get username and password from the form
	$myusername = mysqli_real_escape_string($connection, $_POST['username']);
	//MD5 Password Encryption
	$mypassword = mysqli_real_escape_string($connection, md5($_POST['password']));
	// END: Get username and password from the form

	// Check User Date From Datebase
	$login = "SELECT id, nickname, manage, imgSrc FROM admin WHERE username='$myusername' and password='$mypassword'";
	$result = mysqli_query($connection, $login);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$count = mysqli_num_rows($result);

	// The Account Must be Only One
	if ($count == 1) {
		// Store User Info
		$_SESSION['login_user'] = $myusername;
		$_SESSION['userName'] = $row["nickname"];
		$_SESSION['userID'] = $row["id"];
		$_SESSION['managePower'] = $row["manage"];
		$_SESSION['imgSrc'] = $row["imgSrc"];
		header("location: index.php");
	} else {
		$error = "Your Login Name or Password is invalid";
	}
}
// END: Check User Date From Datebase

// END:Login Function
?>

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
		<!--Top Navigation-->
		<?php
		include 'topNav.php';
		?>
		<!--END:Top Navigation-->
		<div class="loginTopMargin">

			<p class="administratorAccount">
				Demo Administrator Account -> UserName: <span class="bold">manager</span> /  Password: <span class="bold">manager</span>
			</p>
			<div class="loginCenter">
				<div class="loginTitle">
					<b>Login</b>
				</div>
				<div class="loginFormDiv">
					<form action="" method="post">
						<p class="boxGuide">UserName:</p>
						<input type="text" name="username" class="box" required="required"/>
						<br />
						<br />
						<p class="boxGuide">Password:</p>
						<input type="password" name="password" class="box" required="required"/>
						<br/>
						<br />
						<input class="Submit" type="submit" value=" Submit "/>
						<br />

					</form>
					<a href="register.php">
						Register an acount
					</a>
					<?php if(!empty($error)) { ?>
<div class="loginError"><?php echo $error; ?></div>
<?php } ?>
				</div>
			</div>

			<!--JavaScript-->
			<!-- jQuery and Bootstrap JS -->
		<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<!-- My JS -->
		<script type="text/javascript" src="js/script.js"></script>
			<!--END: JavaScript-->
	</body>
</html>
