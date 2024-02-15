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
			<div class='col-md-6 col-md-offset-3'>
				<div class='well'>
					<?php 
						session_start();
						if(isset($_SESSION['username'])){
							echo "<strong>Welcome {$_SESSION['firstname']}!</strong>
									<a href='posts.php' class='btn btn-sm btn-primary'>My Posts</a>
								";

						}else{
							echo "<strong>Welcome User! </strong>";
						}

					?>
					<div id='update_id'>
						<a href=''></a>
					</div>
					</div>
					<hr>
					



					<?php 
						require('includes/functions/functions.php');

						get_all_posts();

					?>
				
			</div>

		</div>


</div>

 
<?php include('includes/scripts.include.php'); ?>
</body>
</html>