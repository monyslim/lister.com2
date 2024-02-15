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
					<a href='posts.php' class='btn btn-sm btn-primary'> My Posts</a>
					<a href='' class='btn btn-sm btn-danger' onclick='return openUpdate()'> Update username and password</a>
					<a href='logout.php' class='btn btn-sm btn-primary'> Log out</a>
					</div>
					</div>
					<hr>
					
					<?php require('includes/form-processor.php'); ?>
					
					<form action='' method='POST' class='form' enctype="multipart/form-data">
						<div class='form-group'>
							<label>First name</label>
							<input type='text' name='firstname' value="<?php echo $_SESSION['firstname']; ?>" class='form-control'>
						</div>

						<div class='form-group'>
							<label>Last name</label>
							<input type='text' name='lastname' value="<?php echo $_SESSION['lastname'];?>" class='form-control'>

								<input type='hidden' name='username' value="<?php echo $_SESSION['username'];?>" class='form-control'>
						</div>



						<div class='form-group'>
							<input type='submit' name='update_names' value='Update names' class='btn btn-md btn-warning'>
						</div>
					</form>




				</div>
			</div>

		</div>


</div>

 

<script src='js/scripts.js'></script>
</body>
</html>