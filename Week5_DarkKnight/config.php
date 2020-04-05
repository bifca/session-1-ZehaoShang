<?php
$severname = "localhost";
$username = "root";
$password = "";
$dbname = "DarkKnight";
//Creat connection
$connection = mysqli_connect($severname, $username, $password, $dbname);
//Check connection
if (!$connection) {
	die("Connection failed: Can't connect with server. Try Later!" . mysqli_connect_error());
}
?>