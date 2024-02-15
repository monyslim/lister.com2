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
	<div class='container-fluid'>
		
		<!-- Navigation bar -->
		<?php include('includes/nav.include.php'); ?>

	<!-- End of Navigation --> 
	</div>

<div class='container'>
	
		<div class='row'>
				
				<div class='col-md-3'>
					Cupidatat rem mauris aliquid platea vero! Esse conubia magnis, massa modi cupidatat pariatur cupiditate dolorem, accusantium. Exercitationem! Excepturi, iste, sagittis? Mollit numquam quos possimus. Rerum molestiae, similique ligula habitasse accusamus? Class! Posuere est provident taciti, suscipit mattis interdum sequi nisi, exercitation magnis, expedita leo. Necessitatibus, placerat blanditiis quos occaecati taciti dolor molestias etiam fugit ducimus, nostrud, exercitation, do eget iste saepe morbi pharetra perspiciatis sint alias elementum officia, proident donec sapien congue tempora morbi mus. Hymenaeos facilisi rhoncus cillum expedita, integer, at eget culpa, veritatis distinctio condimentum pharetra? Laudantium dui lobortis earum egestas. Senectus penatibus. Fuga, sapien nonummy, elementum, placeat.
				</div>

				<div class='col-md-3'>
					Cupidatat rem mauris aliquid platea vero! Esse conubia magnis, massa modi cupidatat pariatur cupiditate dolorem, accusantium. Exercitationem! Excepturi, iste, sagittis? Mollit numquam quos possimus. Rerum molestiae, similique ligula habitasse accusamus? Class! Posuere est provident taciti, suscipit mattis interdum sequi nisi, exercitation magnis, expedita leo. Necessitatibus, placerat blanditiis quos occaecati taciti dolor molestias etiam fugit ducimus, nostrud, exercitation, do eget iste saepe morbi pharetra perspiciatis sint alias elementum officia, proident donec sapien congue tempora morbi mus. Hymenaeos facilisi rhoncus cillum expedita, integer, at eget culpa, veritatis distinctio condimentum pharetra? Laudantium dui lobortis earum egestas. Senectus penatibus. Fuga, sapien nonummy, elementum, placeat.
				</div>

				<div class='col-md-6'>	
					<?php require('includes/form-processor.php'); ?>
					<div id='load_forms_id'>
							Cupidatat rem mauris aliquid platea vero! Esse conubia magnis, massa modi cupidatat pariatur cupiditate dolorem, accusantium. Exercitationem! Excepturi, iste, sagittis? Mollit numquam quos possimus. Rerum molestiae, similique ligula habitasse accusamus? Class! Posuere est provident taciti, suscipit mattis interdum sequi nisi, exercitation magnis, expedita leo. Necessitatibus, placerat blanditiis quos occaecati taciti dolor molestias etiam fugit ducimus, nostrud, exercitation, do eget iste saepe morbi pharetra perspiciatis sint alias elementum officia, proident donec sapien congue tempora morbi mus. Hymenaeos facilisi rhoncus cillum expedita, integer, at eget culpa, veritatis distinctio condimentum pharetra? Laudantium dui lobortis earum egestas. Senectus penatibus. Fuga, sapien nonummy, elementum, placeat.
					</div>
						
				</div>

		</div>


</div>

 
</body>
<script src='thirdparties/jquery.js'></script>
<?php include('includes/scripts.include.php');?>
<script src='js/19-12.js'></script>
</html>