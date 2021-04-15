<?php
require 'config.php';

	if (isset($_GET["city"])) {
		$cityName = $_GET["city"];
	};
	if (isset($_GET["userID"])) {
		$userID = $_GET["userID"];
	};

$dislike = "DELETE FROM `likedCity`  WHERE `cityName`= '".$cityName."' AND `userId`='".$userID."'";
//If it is successful it will redirect you to the home page. 
if (mysqli_query($connection, $dislike)){
header("Location: index.php?city=".$_GET['city']);
}
?>