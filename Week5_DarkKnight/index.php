<?php
require 'config.php';
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
		<div class="container-fluid noPadding" style="position: relative;">
			<img src="img/2.jpg" width="100%" onselectstart="return false" ondragstart="return false"/>
			<p class="Title">
				Dark Knight
			</p>
			<p class="titleSpan">
				It's not who I am underneath,
				<br/>
				but what I do that defines me.
			</p>
		</div>
		<div class="container filmDiv">
				<?php
				$sql = "SELECT * FROM films";
				$result = mysqli_query($connection, $sql);
				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
						echo '<div class="row justify-content-center" style="margin-bottom:60px;">';
							echo '<h3 class="filmName">'.$row['filmName'].'</h3>
							  <div class="col-md-6 col-lg-3 text-center">';
									echo'<a href="filmDetail.php?id='.$row['imdbID'].'"><img src="'.$row['poster'].'" class="filmPost"/></a>
							  </div>
							  <div class="col-md-6">';
									$api_key = "917b32a0";
									$curl = curl_init();
									curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
									curl_setopt($curl, CURLOPT_URL, "http://www.omdbapi.com/?apikey=df1323af&i=".$row['imdbID']);
									$filmInfo = json_decode(curl_exec($curl));
							echo '<p class="polt">'.$filmInfo->Plot.'</p>';
							echo '<p><strong>Year: </strong>'.$filmInfo->Year.'</p>';
							echo '<p><strong>Runtime: </strong>'.$filmInfo->Runtime.'</p>';
							echo '<p><strong>imdbRating: </strong>'.$filmInfo->imdbRating.'</p>';
							echo '<p><strong>imdbID: </strong>'.$filmInfo->imdbID.'</p>';
							echo '<a href="filmDetail.php?id='.$row['imdbID'].'">More Detail >>></a>
							  </div></div>';
					}
				}
				?>
				<!-- row -->
			</div>
			<!-- content container -->

			<!-- jQuery and Bootstrap JS -->
			<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
			<script type="text/javascript" src="js/bootstrap.min.js"></script>
			<!-- My JS -->
			<script type="text/javascript" src="js/script.js"></script>
	</body>

</html>