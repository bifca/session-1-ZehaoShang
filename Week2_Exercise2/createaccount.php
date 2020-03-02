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
        header("location: register.php");
        $_SESSION["error"] = "Your upload image file is invalid! Try again.";
    } else {
        echo "File Name: " . $_FILES["file"]["name"] . "<br>";
        echo "File Type: " . $_FILES["file"]["type"] . "<br>";
        echo "File Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
        echo "Temporary storage location for files: " . $_FILES["file"]["tmp_name"] . "<br>";
        // Determine whether the upload directory exists for this file
        if (file_exists("img/profilePicture/" . $_FILES["file"]["name"])) {
            echo $_FILES["file"]["name"] . " has uploaded!!!";
        } else {
            // If not, upload it to the upload directory
            move_uploaded_file($_FILES["file"]["tmp_name"], "img/profilePicture/" . $_FILES["file"]["name"]);
            echo "File is stored in: " . "Github/session-1-ZehaoShang/Week2_Exercise2/img/profilePicture/" . $_FILES["file"]["name"];
        }
        // Exchang New Picture to Old
        $imgSrc = "img/profilePicture/" . $_FILES["file"]["name"];
        echo $imgSrc;
        $createaccount = "INSERT INTO `admin`(`username`,`password`,`email`,`nickname`,`imgSrc`) VALUE ('" . $_POST["username"] . "','" . md5($_POST["password"]) . "','" . $_POST["email"] . "','" . $_POST["nickname"] . "','" . $imgSrc . "')";
        //If it is successful it will redirect you to the home page.
        if (mysqli_query($connection, $createaccount)) {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Auto Login after Register
                $myusername = mysqli_real_escape_string($connection, $_POST['username']);
                $mypassword = mysqli_real_escape_string($connection, md5($_POST['password']));
                $login = "SELECT id, nickname, manage, imgSrc FROM admin WHERE username='$myusername' and password='$mypassword'";
                $result = mysqli_query($connection, $login);
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $count = mysqli_num_rows($result);
                // If result matched $myusername and $mypassword, table row must be 1 row
                if ($count == 1) {
                    //session_register("myusername");
                    $_SESSION['login_user'] = $myusername;
                    $_SESSION['userName'] = $row["nickname"];
                    $_SESSION['userID'] = $row["id"];
                    $_SESSION['managePower'] = $row["manage"];
                    $_SESSION['imgSrc'] = $row["imgSrc"];
                    header("location: index.php");
                }
            }
        }
        //Error Info for Connection
        else {
            header("location: register.php");
            $_SESSION["error"] = "Sorry, Can't Connect with Sever!";
        }
    }
} else {
    //Error Info for Upload Image
    header("location: register.php");
    $_SESSION["error"] = "Your upload image file is invalid! Try again.";
};
?>
