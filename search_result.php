<?php 
echo "<a href='index.php'>Go home</a>";
if(isset($_GET['search']) && isset($_GET['item'])){

	require('includes/connection.php');


	$item = trim($_GET['item']);

	if(!empty($item)){
		//
		$query = "SELECT * FROM flm_users WHERE firstname LIKE '%$item%' || lastname LIKE '%$item%' || username LIKE '%$item%'";
		$result = mysqli_query($conn, $query);
		if($result){
			$count = mysqli_num_rows($result);
			
			if($count == 0){
				echo "<h3>No result found</h3>";
			}else{
				echo "
					<h3>Search Results. <small>There are {$count} user(s)</small></h3>
			<table>
					<tr>
						<td>
						User id
						</td>

						<td>First name </td>
						<td>Last name</td>
					</tr>";
			while($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)){
				$firstname = $rows['firstname'];
				$lastname = $rows['lastname'];
				$username = $rows['username'];
				$id = $rows['id'];


				echo "<tr>
						<td>{$id}</td>
						<td>{$firstname}</td>
						<td>{$lastname}</td>
					</tr>";


			}

		echo "</table>";
			}
		}else{
			//
			echo "Could not fetch results ...".mysqli_error($conn);
		}
	}else{
		header('location: index.php');
	}


}



?>