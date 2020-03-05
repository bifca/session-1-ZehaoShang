<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	header("location: index.php?city=" . $_POST["city"] . "&unit=" . $_POST["unit"]);
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