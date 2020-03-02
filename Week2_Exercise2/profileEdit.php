<?php

include 'config.php';
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
        header("location: profileEditForm.php");
        $_SESSION["profileEditError"] = "Your upload image file is invalid! Try again.";
    } else {
        echo "File Name: " . $_FILES["file"]["name"] . "<br>";
        echo "File Type: " . $_FILES["file"]["type"] . "<br>";
        echo "File Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
        echo "Temporary storage location for files: " . $_FILES["file"]["tmp_name"] . "<br>";
        // Determine whether the upload directory exists for this file
        if (file_exists("img/profilePicture/" . $_FILES["file"]["name"])) {
        		header("location: profileEditForm.php");
        		$_SESSION["profileEditError"] = $_FILES["file"]["name"]." has uploaded!!!";
        } else {
            // If not, upload it to the upload directory
            move_uploaded_file($_FILES["file"]["tmp_name"], "img/profilePicture/" . $_FILES["file"]["name"]);
            echo "File is stored in: " . "Github/session-1-ZehaoShang/Week2_Exercise2/img/profilePicture/" . $_FILES["file"]["name"];
			$imgSrc = "img/profilePicture/" . $_FILES["file"]["name"];
    echo $imgSrc;
    $_SESSION['userName'] = $_POST["nickname"];
    if (empty($_POST["password"])) {
        $profileUpdate = "UPDATE admin SET username='" . $_POST["username"] . "',email='" . $_POST["email"] . "',nickname='" . $_POST["nickname"] . "',imgSrc='" . $imgSrc . "' WHERE id='" . $_POST["id"] . "'";
        $_SESSION['imgSrc'] = $imgSrc;
    } else {
        $profileUpdate = "UPDATE admin SET username='" . $_POST["username"] . "',password='" . md5($_POST["password"]) . "',email='" . $_POST["email"] . "',nickname='" . $_POST["nickname"] . "',imgSrc='" . $imgSrc . "' WHERE id='" . $_POST["id"] . "'";
        $_SESSION['imgSrc'] = $imgSrc;
    };
    echo $profileUpdate;
    //If it is successful it will redirect you to the home page.
    if (mysqli_query($connection, $profileUpdate)) {
        header("Location: profile.php");
    }
    //If it fails, it will tell you it has failed.
    else {
        //Error Info for Upload Image
        header("location: profileEditForm.php");
        $_SESSION["profileEditError"] = "Your upload image file is invalid! Try again.";
    }
        }
    }
    
} 

elseif (empty($_FILES['file']['tmp_name'])) {
    $_SESSION['userName'] = $_POST["nickname"];
    if (empty($_POST["password"]) AND empty($_FILES['file']['tmp_name'])) {
        $profileUpdate = "UPDATE admin SET username='" . $_POST["username"] . "',email='" . $_POST["email"] . "',nickname='" . $_POST["nickname"] . "' WHERE id='" . $_POST["id"] . "'";
    } elseif (empty($_POST["password"])) {
        $profileUpdate = "UPDATE admin SET username='" . $_POST["username"] . "',email='" . $_POST["email"] . "',nickname='" . $_POST["nickname"] . "',imgSrc='" . $imgSrc . "' WHERE id='" . $_POST["id"] . "'";
        $_SESSION['imgSrc'] = $imgSrc;
    } elseif (empty($_FILES['file']['tmp_name'])) {
        $profileUpdate = "UPDATE admin SET username='" . $_POST["username"] . "',password='" . md5($_POST["password"]) . "',email='" . $_POST["email"] . "',nickname='" . $_POST["nickname"] . "' WHERE id='" . $_POST["id"] . "'";
    } else {
        $profileUpdate = "UPDATE admin SET username='" . $_POST["username"] . "',password='" . md5($_POST["password"]) . "',email='" . $_POST["email"] . "',nickname='" . $_POST["nickname"] . "',imgSrc='" . $imgSrc . "' WHERE id='" . $_POST["id"] . "'";
        $_SESSION['imgSrc'] = $imgSrc;
    };
    echo $profileUpdate;
    //If it is successful it will redirect you to the home page.
    if (mysqli_query($connection, $profileUpdate)) {
        header("Location: profile.php");
    }
    //If it fails, it will tell you it has failed.
    else {
        //Error Info for Upload Image
        header("location: profileEditForm.php");
        $_SESSION["profileEditError"] = "Your upload image file is invalid! Try again.";
    }
} else {
    header("location: profileEditForm.php");
    $_SESSION["profileEditError"] = "Your upload image file is invalid! Try again.";
}
?>
