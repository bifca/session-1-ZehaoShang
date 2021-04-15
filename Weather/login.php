<?php
// Require Database Connection
require 'config.php';
// END: Require Database Connection

// Login Function
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Get username and password from the form
	$username = mysqli_real_escape_string($connection, $_POST['username']);
	//MD5 Password Encryption
	$password = mysqli_real_escape_string($connection, md5($_POST['password']));
	// END: Get username and password from the form

	// Check User Date From Datebase
	$login = "SELECT * FROM admin WHERE username='$username' and password='$password'";
	$result = mysqli_query($connection, $login);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$count = mysqli_num_rows($result);

	// The Account Must be Only One
	if ($count == 1) {
		// Store User Info
		$_SESSION['login_user'] = $username;
		$_SESSION['userName'] = $row["nickname"];
		$_SESSION['userID'] = $row["id"];
		header("location: index.php?city=".$_GET["city"]);
	} else {
		$error = "Your Login Name or Password is invalid";
	}
}
// END: Check User Date From Datebase

// END:Login Function
?>

<!DOCTYPE html>
<html>

	<head>
		<!--Unicode-->
		<meta charset="UTF-8">
		<!--Browser status bar title-->
		<title>Weather</title>
		<!--Responsive get the browser width-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!--keywords to help user search in Search Engine-->
		<meta name="keywords" content="Weather" />
		<!--<ico> left of title-->
		<link href="img/weather.ico" rel="icon" type="image/x-ico">
		<!-- Icomoon Icon Fonts-->
		<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<!--Bootstrap4-->
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
		<!--main-style-->
		<link href="css/formStyle.css" rel="stylesheet" type="text/css" media="all" />
	</head>
	<body>
		<div class="formPosition">

			<p class="administratorAccount">
				Demo Administrator Account -> UserName: <span class="bold">test</span> /  Password: <span class="bold">test</span>
			</p>
				<div class="loginTitle">
					<p>Login</p>
				</div>
				<div class="loginFormDiv">
					<form action="" method="post">
						<div class="form-group">
							<label>UserName:</label>
							<input class="form-control" type="text" name="username" required="required" placeholder="Enter Your Login Name"/>
						</div>
						<div class="form-group">
						<label>Password:</label>
						<input class="form-control" type="password" name="password" class="box" required="required"  placeholder="Enter Your Password"/>
						</div>
						
						<input class="btn btn-primary mb-2" type="submit" value=" Submit "/>

					</form>
					<a href="register.php?city=<?php echo $_GET['city'];?>">
						Register an acount
					</a>
					<?php if(!empty($error)) { ?>
<div class="Error"><?php echo $error; ?></div>
<?php } ?>
				</div>
		</div>

			<!--JavaScript-->
			<!--jQuery-->
			<script src="js/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8"></script>
			<!--Bootstrap JS-->
			<script src="js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
			<!--main javaScript-->
			<script src="js/main.js" type="text/javascript" charset="utf-8"></script>
			<!--END: JavaScript-->
	</body>
</html>
