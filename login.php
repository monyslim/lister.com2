<?php 
session_start();
if(isset($_SESSION['username'])){
	header('location: user.php');
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

<div class='container' style='margin-top: 100px;'>
	<!-- Navigation bar -->
		<?php include('includes/nav.include.php'); ?>

	<!-- End of Navigation --> 
		
		<div class='row'>
				
				<div class='col-md-3'>
					Cupidatat rem mauris aliquid platea vero! Esse conubia magnis, massa modi cupidatat pariatur cupiditate dolorem, accusantium. Exercitationem! Excepturi, iste, sagittis? Mollit numquam quos possimus. Rerum molestiae, similique ligula habitasse accusamus? Class! Posuere est provident taciti, suscipit mattis interdum sequi nisi, exercitation magnis, expedita leo. Necessitatibus, placerat blanditiis quos occaecati taciti dolor molestias etiam fugit ducimus, nostrud, exercitation, do eget iste saepe morbi pharetra perspiciatis sint alias elementum officia, proident donec sapien congue tempora morbi mus. Hymenaeos facilisi rhoncus cillum expedita, integer, at eget culpa, veritatis distinctio condimentum pharetra? Laudantium dui lobortis earum egestas. Senectus penatibus. Fuga, sapien nonummy, elementum, placeat.
				</div>

				<div class='col-md-3'>
					Cupidatat rem mauris aliquid platea vero! Esse conubia magnis, massa modi cupidatat pariatur cupiditate dolorem, accusantium. Exercitationem! Excepturi, iste, sagittis? Mollit numquam quos possimus. Rerum molestiae, similique ligula habitasse accusamus? Class! Posuere est provident taciti, suscipit mattis interdum sequi nisi, exercitation magnis, expedita leo. Necessitatibus, placerat blanditiis quos occaecati taciti dolor molestias etiam fugit ducimus, nostrud, exercitation, do eget iste saepe morbi pharetra perspiciatis sint alias elementum officia, proident donec sapien congue tempora morbi mus. Hymenaeos facilisi rhoncus cillum expedita, integer, at eget culpa, veritatis distinctio condimentum pharetra? Laudantium dui lobortis earum egestas. Senectus penatibus. Fuga, sapien nonummy, elementum, placeat.
				</div>

				<div class='col-md-6'>	
					<?php require('includes/form-processor.php'); ?>
					
					<h4> Sign in </h4>
					<hr>
					
					<form action='' method='POST' class='form'>
						
						<div class='form-group'>
							<label>Username</label>
							<input type='text' class='form-control' name='username'>

						</div>

						<div class='form-group'>
							<label>Password</label>
							<input type='password' class='form-control' name='password'>
						</div>

						<div class='form-group'>
							<input type='submit' name='login' class='btn btn-md btn-primary' value='Sign in!'>

						</div>
							<!-- Sign up button -->
						<label>Not a member?</label>
						<a href='index.php' class='btn btn-md btn-success'>Sign up</a>
						

					</form>
				</div>

		</div>


</div>

 


</body>
</html>


