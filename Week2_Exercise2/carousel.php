<?php
if(isset($_SESSION['managePower'])){
	$managePower=TRUE;
}else{
	$managePower=FALSE;
};
//Require Carousel Media
$queryCarouselMedia = "SELECT * FROM `carouselMedia` ORDER BY `mediaID` ASC";
$CarouselMedia = mysqli_query($connection, $queryCarouselMedia);
//END: Require Carousel Video

//Count the row number of Carousel
$queryCarouselNum = "SELECT * FROM `carouselMedia`";
$CarouselNum = mysqli_num_rows(mysqli_query($connection, $queryCarouselNum));
//END: Count the row number of Carousel
?>

<!--Creat Swiper Carousel Container-->
<div class="container-fluid noPadding">
	<div id="carouselExampleIndicators" class="carousel slide">
		<?php
		if($managePower){
			echo '<a class="addImgBtn" href="carouselCreateForm.php"><i class="fa fa-upload"></i> New+</a>';
		};
		?>
		<ol class="carousel-indicators">
			<?php
			for ($IndicatorsNum = 0; $IndicatorsNum <= ($CarouselNum - 1); $IndicatorsNum++) {
				echo '<li data-target="#carouselExampleIndicators" data-slide-to="' . $IndicatorsNum . '"';
				if ($IndicatorsNum == 0) {
					echo 'class="active"';
				};
				echo '></li>';
			}
			?>
		</ol>

		<div class="carousel-inner">
			<?php
			//Carousel Video
			if (mysqli_num_rows($CarouselMedia) > 0) {
				while ($row = mysqli_fetch_assoc($CarouselMedia)) {
					$Order=$row["mediaID"];
					$Type = $row["type"];
					$Src = $row["src"];
					if ($Type=="video") {
						echo '<div class="carousel-item ';
						if($Order==1){
							echo'active';
						};
						echo'">';
						echo '<video src="' . $Src . '" muted="muted" autoplay="autoplay" loop="loop"  class="d-block w-100"/>Load failed.</video>';
						echo '</div>';
					}elseif($Type=="image"){
						echo '<div class="carousel-item ';
						if($Order==1){
							echo'active';
						};
						echo'">';
						echo '<img src="' . $Src . '" class="d-block w-100"/>';
						echo '</div>';
					};
				};
			} else {
				//Faild load messages
				echo "<p>Can load Carousel Media From Server</p>";
			}
			//END: Carousel Video
			?>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</div>
<!--END:Creat Swiper Carousel Container-->
