<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$query = $_POST["city"];
	$units = $_POST["unit"];
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
	
	if (empty($currentWeather->message) AND ($forecastWeather->message == 0)){
		header("location: index.php?city=" . $_POST["city"] . "&unit=" . $_POST["unit"]);
	}else{
		$error='<p style="color:red;">Wrong City or Country Name</p>';
	};
	

	
};
?>

<!DOCTYPE html>
<html lang="zh">

	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Title of Webpage -->
		<link href="img/weather.ico" rel="icon" type="image/x-ico">
		<title>Change City</title>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<!-- Icomoon Icon Fonts-->
		<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="css/styles.css" />
	</head>

	<body>

		<form action="" method="post" class="text-center d-inline-block changeForm">
			<h5>
				Change City & Temperature Unit
			</h5>
			City:
			<input list="citys" type="text" name="city" required="required" value="" placeholder="City,Country(English)"/>
			<datalist id="citys">
			<option value="Gushi,China"><option value="Wuhan,China"><option value="Shanghai,China"><option value="Beijing,China"><option value="Tokyo,Japan"><option value="London,UK"><option value="Birmingham,UK"><option value="New York,USA"><option value="Los Angeles,USA"><option value="Sydney,Australia">
			</datalist>
			<?php if(!empty($error)){echo $error;};?>
			<br>
			<p>
				Temperature Unit Format:
			</p>
			<input type="radio" name="unit" value="metric" checked>
			Metric (°C)
			<input type="radio" name="unit" value="imperial">
			Imperial (°F)
			<br>
			<input type="submit" value="Change" class="submitBtn btn btn-warning"/>
		</form>

		<!-- jQuery and Bootstrap JS -->
		<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
	</body>

</html>