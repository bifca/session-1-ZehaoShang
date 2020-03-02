<?php
if(isset($_SESSION['managePower'])){
	$managePower=TRUE;
}else{
	$managePower=FALSE;
};
//Require Eagles Information
$queryBlog = "SELECT * FROM `blog` ORDER BY `date` DESC";
$Blog = mysqli_query($connection, $queryBlog);
//END: Require Eagles Information
?>

<!-- Content container -->
<div class="container">
	<h2 class="text-center pt-3">Blog</h2>
	<?php
		if($managePower){
			echo '<a class="blogCreateBtn" href="blogCreateForm.php"><i class="fa fa-upload"></i> New+</a>';
		};
	?>
	<div class="row">
		<?php
		//Carousel Video
		if (mysqli_num_rows($Blog) > 0) {
			while ($row = mysqli_fetch_assoc($Blog)) {
				$blogID = $row["blogID"];
				$blogImageSrc = $row["src"];
				$blogTitle = $row["title"];
				$blogDate = $row["date"];
				$blogContent = $row["textContent"];

				echo '<section class="col-12 col-sm-6 col-lg-4">';
					echo '<img class="w-100 my-3" src="' . $blogImageSrc . '" alt="Image"/>';
					echo '<h4>' . $blogTitle . '</h4>';
					echo '<p class="date">' . $blogDate . ' - Dota Team
			</p>';
					echo '<pre id="textarea">'. $blogContent .'</pre>';
					if($managePower){
						echo '<a class="blogDeleteBtn" href="blogDelete.php?id='.$blogID.'""><i class="fa fa-trash"></i> Delete</a>';
						echo '<a class="blogEditBtn" href="blogEditForm.php?id='.$blogID.'"><i class="fa fa-cog cogAni"></i>Edit</a>';
					};
				echo '</section>';

			};
		} else {
			//Faild load messages
			echo "<p>Can't Load Blog From Server</p>";
		}
		?>
		

	</div>
	<!-- row -->
</div>
<!-- END:Content container -->