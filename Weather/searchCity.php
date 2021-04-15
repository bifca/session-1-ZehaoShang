<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$query = $_POST["city"];
	$units = 'metric';
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
		header("location: index.php?city=" . $_POST["city"] . "&unit=" .$units);
	}else{
		$error='<p style="color:red;text-align:center;margin-top:100px;">Wrong City or Country Name</p>';
		echo $error;
		echo '<a href= "index.php"><p style="text-align:center;margin-top:20px;">Come back and Try again!</p></a>';
	};
	

	
};
?>