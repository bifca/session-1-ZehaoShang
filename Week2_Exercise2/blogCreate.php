<?php

include ('config.php');
if (!$connection) {
    die("Connection Failed");
}
// Image Extension
$allowedExts = array(
    "gif",
    "jpeg",
    "jpg",
    "png"
);
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/pjpeg") || ($_FILES["file"]["type"] == "image/x-png") || ($_FILES["file"]["type"] == "image/png")) && ($_FILES["file"]["size"] < 20480000) //Size limit by 20Mb
 && in_array($extension, $allowedExts)) {
    if ($_FILES["file"]["error"] > 0) {
        //Error Info for Upload Image
        header("location: blogCreateForm.php");
        $_SESSION["blogCreateError"] = "Your upload image file is invalid! Try again.";
    } else {
        echo "File Name: " . $_FILES["file"]["name"] . "<br>";
        echo "File Type: " . $_FILES["file"]["type"] . "<br>";
        echo "File Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
        echo "Temporary storage location for files: " . $_FILES["file"]["tmp_name"] . "<br>";
        // Determine whether the upload directory exists for this file
        if (file_exists("img/" . $_FILES["file"]["name"])) {
        		header("location: blogCreateForm.php");
            $_SESSION["blogCreateError"] =  $_FILES["file"]["name"] . " has uploaded!!!";
        } else {
            // If not, upload it to the upload directory
            move_uploaded_file($_FILES["file"]["tmp_name"], "img/" . $_FILES["file"]["name"]);
            echo "File is stored in: " . "Github/session-1-ZehaoShang/Week2_Exercise2/img" . $_FILES["file"]["name"];
			// Exchang New Picture to Old
	        $imgSrc = "img/" . $_FILES["file"]["name"];
	        echo $imgSrc;
	        
			$blogCreate = "INSERT INTO `blog`(`src`,`title`,`date`,`textContent`) VALUE ('" . $imgSrc . "','" . $_POST["title"] . "','" . $_POST["date"] . "','" . $_POST["content"] . "')";
	           //If it is successful it will redirect you to the home page.
	        if (mysqli_query($connection, $blogCreate)) {
	            header("Location: index.php");
	        }
	        //Error Info for Connection
	        else {
	            header("location: blogCreateForm.php");
	            $_SESSION["blogEditError"] = "Sorry, Can't Connect with Sever!";
	        }
        }
        
    }
} 
else {
    //Error Info for Upload Image
    header("location: blogCreateForm.php");
    $_SESSION["blogCreateError"] = "Your upload image file is invalid! Try again.";
};
?>
