<?php
//Config Part
$severname = "localhost";
$username = "root";
$password = "";
$dbname = "Dota2Blog";
//Creat connection
$connection = mysqli_connect($severname, $username, $password, $dbname);
//Check connection
if (!$connection) {
	die("Connection failed:" . mysqli_connect_error());
};
//END: Config Part
session_start();
?>
