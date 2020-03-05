<?php
	session_start();
//	$_GET["unit"];
	if (isset($_GET["city"])) {
		$query = $_GET["city"];
	} else {
		$query = "Gushi,cn";
	};
	if (isset($_GET["unit"])) {
		$units = $_GET["unit"];
	} else {
		$units = "metric";
	};
//	$query = "Gushi,cn";
//	$units = "metric";
	
	//Connect and communicate with OpenWeather API.
		//Forecast Weather
	$api_key = "2db3d04bbc8fa973d3b4444cb2dfe6f9";
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_URL, "http://api.openweathermap.org/data/2.5/forecast?units=".$units."&q=".$query."&appid=".$api_key);
	$forecastWeather = json_decode(curl_exec($curl));
		//Current Weather
	$curl2 = curl_init();
	curl_setopt($curl2, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl2, CURLOPT_URL, "http://api.openweathermap.org/data/2.5/weather?units=".$units."&q=".$query."&appid=".$api_key);
	$currentWeather = json_decode(curl_exec($curl2));
?>
<!DOCTYPE html>
<html lang="zh">

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
		
		<?php
		//Current Weather
		echo '<div class="container show_case">';
			echo '<div class="row">';
				echo '<a href="index.php?city=' . $query . '&unit='. $units.'" class="homeBtn"><h2>'.$currentWeather->name.'&nbsp'.$currentWeather->sys->country.'</h2></a>';
				echo '<a class="changeBtn" href="changeCityForm.php">Change City</a>';
			echo '</div>';
			echo '<div class="row">';
				echo '<div class="col-sm-6">';
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
					echo '<p>Wind Direction:&nbsp'.$currentWeather->wind->deg.' &nbspDegrees(meteorological)</p>';
				echo '</div>';
			echo '</div>';
			echo '<div class="row"><p class="forecastTitle">5 Day / 3 Hour Forecast</p></div>';
			echo '<div class="row hoursWeather border-top border-secondary">';
				$i = 0;
				foreach ($forecastWeather->list as $value){
					if ($i>2){
						echo '<div class="d-inline-block text-center col-lg-2 col-md-3 col-sm-4 col-6 p-10">';
							$weatherIcon=$value->weather[0]->icon;
							echo '<img src="http://openweathermap.org/img/wn/'.$weatherIcon.'@2x.png"/><br/>';
							echo '<p class="forecastTime">'.$value->dt_txt.'</p>';
							echo $value->weather[0]->main.'&nbsp&nbsp&nbsp&nbsp'.$value->main->temp.'&nbsp';
							if($units == "metric"){
								echo '°C';
							} else{
								echo '°F';
							};
							echo '<br/>';
						echo '</div>';
					};
					$i++;
				};
			echo '</div>';
		echo '</div>';
		
		
		//Forecast Weather
		?> 

<!-- jQuery and Bootstrap JS -->
		<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
	</body>

</html>