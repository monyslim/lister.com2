<?php 
session_start();
if(!isset($_SESSION['username'])){
	header('location: login.php');
	exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Lister App</title>
	<link rel='stylesheet' href='thirdparties/bootstrap/css/bootstrap.min.css'>
	<link rel='stylesheet' href='css/style.css'>
</head>
<body>
	<style>
		body{
			color: black;
		}
	</style>

<div class='container'>
	<!-- Navigation bar -->
		<?php include('includes/nav.include.php'); ?>

	<!-- End of Navigation --> 
		
		<div class='row'>
			
			<div class='adjust-10'></div>
			<div class='col-md-10 col-md-offset-1'>
				<div class='well'>
					<div>
					<strong>Welcome <?php echo "{$_SESSION['firstname']}!"; ?> </strong>
					<div id='update_id'>
					<a href='add_post.php' class='btn btn-sm btn-primary'> 
					<i class="glyphicon glyphicon-plus"></i>	
					Add new posts
				</a>
					</div>
					</div>
					<hr>
					



					<?php 
						require('includes/functions/functions.php');

						get_user_posts();

					?>
				




				</div>
			</div>

		</div>


</div>

 

<script src='js/scripts.js'></script>
</body>
</html>