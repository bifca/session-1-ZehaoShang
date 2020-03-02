<!--Require Database Connection-->
<?php
if (isset($_SESSION['userName'])) {
	$login_username = $_SESSION['userName'];
};
if (isset($_SESSION['imgSrc'])) {
	$imgSrc = $_SESSION['imgSrc'];
};
?>

<div class="container-fluid fixed-top text-md-center top-nav py-2">
	<a href="index.php">
		<img src="img/logo.png" />
	</a>
	<div class="topnav-right dropdownHover">
		<?php

		if (isset($login_username)) {
			if (isset($imgSrc)) {
				echo '<div class="profilePicDiv"><img class="profilePic" style="width:30px;" src="' . $imgSrc . '"></div>';
			};
			echo '<a href="profile.php" onclick="return false;">
							 <p class="dropdownBtn">' . $login_username . '&nbsp;<i class="fa fa-caret-down"></i></p>
						 </a>';
			echo '<ul class="dropdown">
						 		   <li><a href="profile.php"><p>My Profile</p></a></li>
						 		   <li><a href="logout.php"><p>Logout</p></a></li>
						 	   </ul>';
		} else {
			echo '<a href="login.php">
							 <p>LOGIN</p>
						 </a>';
		}
		?>
	</div>
</div>