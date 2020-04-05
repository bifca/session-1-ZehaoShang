<?php
require 'config.php';
if (isset($_GET["id"])) {
	$imdbID = $_GET["id"];
}
$api_key = "917b32a0";
$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_URL, "http://www.omdbapi.com/?apikey=df1323af&plot=full&i=" . $imdbID);
$filmInfo = json_decode(curl_exec($curl));
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<link href="img/batman.ico" rel="icon" type="image/x-ico">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Title of Webpage -->
		<title>Dark Knight</title>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/styles.css" />
	</head>

	<body>
		<div class="container-fluid text-center noPadding">
			<a href="index.php"><img src="img/logo.jpg" class="logo"/></a>
		</div>

		<div class="container filmDiv">
				<?php
				$sql = "SELECT * FROM films WHERE imdbID = '".$imdbID."'";
				$result = mysqli_query($connection, $sql);
				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
						echo '<div class="row justify-content-center" style="margin-bottom:60px;">';
							echo '<h3 class="filmName">'.$row['filmName'].'</h3>
							  <div class="col-md-8 col-lg-4 text-center">';
									echo'<img src="'.$row['poster'].'" class="filmPost"/>
							  </div>
							  <div class="col-lg-8 col-xl-6">';
							echo '<p class="polt">'.$filmInfo->Plot.'</p>';
							echo '<p><strong>Director: </strong>'.$filmInfo->Director.'</p>';
							echo '<p><strong>Actors: </strong>'.$filmInfo->Actors.'</p>';
							echo '<p><strong>Year: </strong>'.$filmInfo->Year.'</p>';
							echo '<p><strong>Runtime: </strong>'.$filmInfo->Runtime.'</p>';
							echo '<p><strong>imdbRating: </strong>'.$filmInfo->imdbRating.'</p>';
							echo '<p><strong>imdbID: </strong>'.$filmInfo->imdbID.'</p>';
							echo '<p><strong>BoxOffice: </strong>'.$filmInfo->BoxOffice.'</p>';
						echo '<a href="index.php">Back to Homepage >>></a>
						</div>
						</div>';
						echo '<div class="row justify-content-center" style="margin-bottom:60px;">
								  <video controls>
								  	  <source src="'.$row['trailer'].'" type="video/mp4">Your browser does not support the video
								  </video>
							  </div>';
					}
				}
				?>
				<!-- row -->
		</div>
		
		
			<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
			<script type="text/javascript" src="js/bootstrap.min.js"></script>
			<!-- My JS -->
			<script type="text/javascript" src="js/script.js"></script>
	</body>

</html>