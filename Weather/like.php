<?php
require 'config.php';

	if (isset($_GET["city"])) {
		$cityName = $_GET["city"];
	};
	if (isset($_GET["userID"])) {
		$userID = $_GET["userID"];
	};

$like = "INSERT INTO `likedCity` (`cityName`, `userId`) VALUES ( '".$cityName."', '".$userID."')";
//If it is successful it will redirect you to the home page. 
if (mysqli_query($connection, $like)){
header("Location: index.php?city=".$_GET['city']);
}
?>