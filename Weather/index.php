<?php
//Connect with Database
Require 'config.php';

	if (isset($_SESSION['userName'])) {
		$userName = $_SESSION['userName'];
	};
	if (isset($_SESSION['userID'])) {
		$userID = $_SESSION['userID'];
	};
	
//GET Query
	
	if (isset($_GET["city"])) {
		$query = $_GET["city"];
	} else {
		$query = "New York, USA";
	};
	if (isset($_GET["unit"])) {
		$units = $_GET["unit"];
	} else {
		$units = "metric";
	};
	
//	Require API Setting
	require "OpenWeatherAPI.php";
	require "BingImagesAPI.php";
	require "BingNewsAPI.php";
?>

<!DOCTYPE html>
<html>

	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Title of Webpage -->
		<link href="img/weather.ico" rel="icon" type="image/x-ico">
		<title>Weather</title>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<!-- Icomoon Icon Fonts-->
		<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="css/styles.css" />
	</head>

	<body>
		<!--Main Function: Weather Checker-->
		<?php
		//Current Weather
		echo '<div class="weatherBg" style="background-image: url(';
		$imageOrder = 0;
		foreach ($ImagesResults->value as $imagesValue){
			$imageOrder++;
			if($imageOrder == 1){
				echo $imagesValue->contentUrl;
			}
		}
		echo ');">';
			echo '<div class="blur"></div>';
			echo '<div class="row">';
				echo '<div class="col-md-6 order-md-2 text-right">';
					echo '<div class="row formRow">';
					echo '<div class="col-md-12 col-6 order-md-2 text-left text-md-right">';
						echo '<form action="searchCity.php" name="searchCity" method="post" class="d-inline-block searchForm"><input type="text" name="city" required="required" value="" placeholder="City,Country" class="searchInput"/><i class="fa fa-search searchBtn" onclick="searchCity.submit()"></i></form>';
					echo '</div>';
					echo '<div class="col-md-12 col-6">';
						if (isset($_SESSION['userName'])) {
							echo '<a class="logBtn" href="logout.php?city='.$query.'">Hi,'.$userName.'|Logout</a>';
						}else{
							echo '<a class="logBtn" href="login.php?city='.$query.'">Please Login!</a>';
						};
					echo '</div>';
					echo '</div>';
				echo '</div>';
				echo '<div class="col-md-6">';
					echo '<div class="dropdown">';
						if (isset($_SESSION['userName'])) {
							$queryContent = "SELECT * FROM `likedCity` WHERE UserId = '" . $userID . "' AND cityName = '".$query."'";
							$content = mysqli_query($connection, $queryContent);
							if (mysqli_num_rows($content)==1) {
								echo '<a href="dislike.php?city='.$query.'&userID='.$userID.'"><i class="fa fa-heart likeBtn"></i></a>';
							}else{
								echo '<a href="like.php?city='.$query.'&userID='.$userID.'"><i class="fa fa-heart-o likeBtn"></i></a>';
							}
						}else{
							echo '<a href="login.php?city='.$query.'"><i class="fa fa-heart-o likeBtn"></i></a>';
						};
	  					echo'<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$currentWeather->name.'&nbsp'.$currentWeather->sys->country.'</button>
	  						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
	  						if (isset($_SESSION['userName'])) {
								$queryContent = "SELECT * FROM `likedCity` WHERE UserId = '" . $userID . "'";
								$content = mysqli_query($connection, $queryContent);
								if (mysqli_num_rows($content) > 0) {
									while ($row = mysqli_fetch_assoc($content)) {
										$cityName = $row["cityName"];
										echo '<a class="dropdown-item" href="index.php?city='.$cityName.'&unit=metric">'.$cityName.'</a>';
									}
								}else{
									echo '<a class="dropdown-item">Did not add any city!</a>';
								};
							}else{
								echo '<a class="dropdown-item">Please Login!</a>';
							};
							    
	  					echo'</div>
						  </div>';
				echo '</div>';
			echo '</div>';
			
//			Weather Infomation
			echo '<div class="row weatherInfo">';
				echo '<div class="col-sm-6 .offset-md-6">';
					echo '<p class="currentTitle">Current Weather</p>';
					echo '<p class="text-capitalize">'.$currentWeather->weather[0]->description.'</p>';
					$weatherIcon=$currentWeather->weather[0]->icon;
					echo '<div><img src="http://openweathermap.org/img/wn/'.$weatherIcon.'@2x.png"/><p class="d-inline-block temperature">'.$currentWeather->main->temp;
					if($units == "metric"){
						echo '°C</p></div>';
					} else{
						echo '°F</p></div>';
					};
				echo '</div>';
				echo '<div class="col-sm-6">';
					echo '<p>Sensible Temperature:&nbsp'.$currentWeather->main->feels_like;
					if($units == "metric"){
						echo '°C</p>';
					} else{
						echo '°F</p>';
					};
					echo '<p>Humidity:&nbsp'.$currentWeather->main->humidity.'%</p>';
					echo '<p>Atmospheric Pressure:&nbsp'.$currentWeather->main->pressure.'hPA</p>';
					echo '<p>Wind Speed:&nbsp'.$currentWeather->wind->speed.'M/s</p>';
					if (!empty($currentWeather->wind->deg)){
						echo '<p>Wind Direction:&nbsp'.$currentWeather->wind->deg.' &nbspDegrees(meteorological)</p>';
					}
				echo '</div>';
			echo '</div>';
			echo '<div class="row"><p class="forecastTitle">5 Day / 3 Hour Forecast</p></div>';
			
			//Forecast Weather
			echo '<div class="row hoursWeather">';
				$i = 0;
				foreach ($forecastWeather->list as $value){
					if ($i>2){
						echo '<div class="d-inline-block text-center col-lg-2 col-md-3 col-sm-4 col-6 p-10">';
							$weatherIcon=$value->weather[0]->icon;
							echo '<img src="http://openweathermap.org/img/wn/'.$weatherIcon.'@2x.png"/><br/>';
							echo '<p class="forecastTime">'.$value->dt_txt.'</p>';
							echo '<p>'.$value->weather[0]->main.'&nbsp&nbsp&nbsp&nbsp'.$value->main->temp.'&nbsp';
							if($units == "metric"){
								echo '°C</p>';
							} else{
								echo '°F</p>';
							};
							echo '<br/>';
						echo '</div>';
					};
					$i++;
				};

			echo '</div>';
		echo '</div>';
			?>
		<!--END: Main Function: Weather Checker-->
			
			<!--Other Functions-->
			<div class="functionBg">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
				  <li class="nav-item text-center">
				    <a class="nav-link active" id="Images-tab" data-toggle="tab" href="#Images" role="tab" aria-controls="Images" aria-selected="true">Images</a>
				  </li>
				  <li class="nav-item text-center">
				    <a class="nav-link" id="Map-tab" data-toggle="tab" href="#Map" role="tab" aria-controls="Map" aria-selected="false">Map</a>
				  </li>
				  <li class="nav-item text-center">
				    <a class="nav-link" id="News-tab" data-toggle="tab" href="#News" role="tab" aria-controls="News" aria-selected="false">Local News</a>
				  </li>
				</ul>
				<!--myTabContent-->
				<div class="tab-content" id="myTabContent">
				  <div class="tab-pane fade show active" id="Images" role="tabpanel" aria-labelledby="Images-tab">
				  	<!--Bing Images Search API-->
				  	<div class="row">
				  	<?php
						foreach ($ImagesResults->value as $imagesValue){
							echo '<div class="col-lg-3 col-md-4 col-sm-6 col-12"><div class="imagesDiv"><img class="Image" width="100%" src="'.$imagesValue->contentUrl.'"></div></div>';
						}
				  	?>
				  	</div>
				  	<!--END: Bing Images Search API-->
				  </div>
				  
				  <div class="tab-pane fade" id="Map" role="tabpanel" aria-labelledby="Map-tab">
				  	<!--Google Map API-->
				  	<div class="row"><iframe width="100%"  height="450"  frameborder="0" style="border:0"  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAa8r8JlzIzAWwuOdjpaL277apo7K2xoOE&language=en-UK&q=<?php echo $query;?>" allowfullscreen></iframe></div>
				  	<!--END: Google Map API-->
				  </div>
				  
				  <div class="tab-pane fade" id="News" role="tabpanel" aria-labelledby="News-tab">
				  	<!--Bing News Search API-->
				  	<?php
				  		echo '<div class="container NewsContainer">';
				  		foreach ($NewsResults->value as $value){
				  			echo '<div class="col-12">';
							echo '<a href="'.$value->url.'" target="_blank"><p class="NewsTitle">'.$value->name."</p></a>";
							echo '<p class="NewsContent">'.$value->description.'</p>';
				  			echo '</div>';
						}
				  	?>
				  	<!--END: Bing News Search API-->
				  </div>
				</div>
				<!--END: myTabContent-->
			</div>
			<!--EMD: Other Functions-->
			
			
		

<!-- jQuery and Bootstrap JS -->
		<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
		<script type="text/javascript" src="js/popper.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
	</body>

</html>