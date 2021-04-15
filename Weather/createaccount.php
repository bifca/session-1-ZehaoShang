<?php
include('config.php');
if(!$connection){
	die("Connection Failed");
}

$createaccount = "INSERT INTO `admin`(`username`,`password`,`nickname`) VALUE ('" . $_POST["username"] . "','" . md5($_POST["password"]) . "','" . $_POST["nickname"] . "')";

//If it is successful it will redirect you to the home page.
if (mysqli_query($connection, $createaccount)) {
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		// Auto Login after Register
		$myusername = mysqli_real_escape_string($connection, $_POST['username']);
		$mypassword = mysqli_real_escape_string($connection, md5($_POST['password']));

		$login = "SELECT * FROM admin WHERE username='$myusername' and password='$mypassword'";
		$result = mysqli_query($connection, $login);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$count = mysqli_num_rows($result);

		// If result matched $myusername and $mypassword, table row must be 1 row
		if ($count == 1) {
			//session_register("myusername");
			$_SESSION['login_user'] = $myusername;
			$_SESSION['userName'] = $row["nickname"];
			$_SESSION['userID'] = $row["id"];
			header("location: index.php?city=".$_GET["city"]);
		}
	}
}
//Error Info for Connection
else {
	header("location: register.php?city=".$_GET["city"]);
    	$_SESSION["error"] = "Sorry, Can't Connect with Sever!";
}

?>

