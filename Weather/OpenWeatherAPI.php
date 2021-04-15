<?php
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