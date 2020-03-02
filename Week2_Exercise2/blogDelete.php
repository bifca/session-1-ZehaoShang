<?php

//Get the SQL Server Configuration File
include 'config.php';

if(!$connection){
	die("Connection Failed");
}
$blogDelete = "DELETE FROM `blog` WHERE `blogID`='".$_GET["id"]."'";

//If it is successful it will redirect you to the home page. 
if (mysqli_query($connection, $blogDelete)){
header("Location: index.php");
}
//If it fails, it will tell you it has failed.
else{
	echo "Delete failed".$blogDelete."<br>".mysqli_error($connection);

}

?>