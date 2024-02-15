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
			<div class='col-md-6 col-md-offset-3'>
				<div class='well'>
					<div>
					<strong>Welcome <?php echo "{$_SESSION['firstname']}!"; ?> </strong>
					<div id='update_id'>
					<a href='posts.php' class='btn btn-sm btn-primary'>My Posts</a>
					</div>
					</div>
					<hr>
						
						<?php include('includes/form-processor.php'); ?>

					<form action='' method='POST' class='form'>
						<div class='form-group'>
							<textarea placeholder="Post title" name='post_title' class='form-control'></textarea>
						</div>

						<div class='form-group'>
							<textarea placeholder="Post content" name='post_body' class='form-control' rows='12'></textarea>
						</div>	

						<div class='form-group'>
							<select class='form-control' name='post_status'>
									<option value='1'> Make post public</option>
									<option value='0'> Make post private</option>
							</select>
						</div>	

						<div class='form-group'>
							<button type='reset' class='btn btn-md btn-danger'>
								<i class="glyphicon glyphicon-remove"></i>
								Clear
							</button>
							<button type='submit' name='create_post' class='btn btn-md btn-success'>
								<i class="glyphicon glyphicon-ok"></i>
								Post
							</button>


						</div>										
							
	

					</form>
					

				




				</div>
			</div>

		</div>


</div>

 
<script type="text/javascript" src="thirdparties/ckeditor/ckeditor.js"></script>
<script src='js/scripts.js'></script>

<script>
	CKEDITOR.replace('post_body');
</script>
</body>
</html>