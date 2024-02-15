<?php 


function register_user(){

}




function get_user_posts(){
	require('./includes/connection.php');
	
	$user_id = $_SESSION['id'];

	$query = "SELECT * FROM posts WHERE author_id=$user_id";
	$result = mysqli_query($conn, $query);

	if($result){
		//query ran
		$post_count = mysqli_num_rows($result);

		if($post_count == 0){
			echo "<div class='alert alert-warning'>There are no post created yet</div>";
		}else{

			echo "<div class='alert alert-info'>You have {$post_count} post(s)</div>";
			//display the posts 
			echo "<table class='table table-bordered'>
					<tr>
						<td><strong>Post Title</strong></td>
						<td><strong>Created date</strong></td>
						<td><strong>Settings</strong></td>
					</tr>";
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
					$post_id = $row['post_id'];
					$post_title = $row['post_title'];
					$created_date = $row['created_date'];
					$status = $row['status'];

					if($status == 0){
						$visibility_info = "Make public";
						$status_info = 'Private';
					}
					if($status == 1){
						$visibility_info = 'Make private';
						$status_info = "Public";
					}

					echo "<tr>
							<td><a href='view_my_post.php?pid=".$post_id."'>{$post_title} </a><span class='badge badge-primary'><small>{$status_info}</small></span></td>
							<td>{$created_date}</td>
							<td>
							<a href='' class='btn btn-sm btn-warning'>{$visibility_info}</a>
							<a href='' class='btn btn-sm btn-warning'>Update</a>
							<a href='' class='btn btn-sm btn-danger'>Delete</a>
							</td>
						</tr>";



			}

			echo "</table>";
			
		}
	}else{
		echo "Internal error: We could not run your query...".mysqli_error($conn);
	}

}


function get_post_content($post_id){
	require('./includes/connection.php');

	$query = "SELECT * FROM posts WHERE post_id=$post_id";
	$result = mysqli_query($conn, $query);
	if($result){

		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

				$post_id = $row['post_id'];
				$post_body = $row['post_body'];
				$post_title = $row['post_title'];
				$post_description = $row['post_description'];
				$author_id = $row['author_id'];
				$created_date = $row['created_date'];
				$status = $row['status'];

				if($status == 1){
					$status_info = "Visible to everyone";
				}
				if($status == 0){
					$status_info = "Not Visible to everyone";
				}



		}


		echo "<h3>{$post_title}</h3>
			<hr>
			{$post_body}
			<hr>
			<span><small>Created on {$created_date}</small> | <i class='glyphicon glyphicon-globe'></i> {$status_info}</span>



			";



	}else{
		echo "Error: could not get post body: ".mysqli_error($conn);
	}



}

function get_all_posts(){
	require('./includes/connection.php');
	$query = "SELECT flm_users.*, posts.post_id AS the_post_id, posts.post_title, posts.post_body, posts.post_description, posts.author_id, posts.created_date, posts.status, likes_count.* FROM flm_users LEFT JOIN posts ON flm_users.id=posts.author_id LEFT JOIN likes_count ON likes_count.post_id=posts.post_id WHERE posts.status=1";

	$result = mysqli_query($conn, $query);
	if($result){
		$post_count = mysqli_num_rows($result);
		//echo $post_count;

	

		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			$post_id = $row['the_post_id'];
				$post_body = $row['post_body'];
				$post_title = $row['post_title'];
				$post_author_firstname = $row['firstname'];
				$post_author_lastname = $row['lastname'];
				$post_description = $row['post_description'];
				$author_id = $row['author_id'];
				$created_date = $row['created_date'];
				$likes_count = $row['counts'];



				$status = $row['status'];

				if(!isset($_SESSION['username'])){
					$like_button = NULL;
				}else{
					$like_button = "<a href='#' class='btn btn-sm btn-primary' onclick='return like_post($post_id)' id='post_like_id_".$post_id."'>
					<i class='glyphicon glyphicon-heart'></i> 
					{$likes_count}
					Likes</a>";
				}

			echo "<div class='well'>
					
					<div>
					<h4>{$post_title}</h4>
					<small>{$post_author_firstname}, {$post_author_lastname}</small>
					</div>

					<hr>
					<div>
						{$post_body}
						<hr>
						<span><small>Posted on {$created_date}</small> 

		
						<small style='float: right;'>
							<span id='like_loading_".$post_id."'></span>
						{$like_button}</small> 

						</span>
					</div>
						




				</div>";
		}

	}else{
		echo 'Error: '.mysqli_error($conn);
	}


}

function like_post($post_id, $user_id){
	require('./includes/connection.php');

	//check if the user has liked this post before .. 
	$check_feedback = check_liked_post_by_this_user($post_id, $user_id);

	if($check_feedback == 1){
		//this user has liked this post before ..
		//delete from posts_likes..
		//substract from likes_count 
		
		$query = "DELETE FROM posts_likes WHERE post_id=$post_id AND like_author_id=$user_id";
		$result = mysqli_query($conn, $query);
		if($result){
			//
			$select_query = "SELECT * FROM likes_count WHERE post_id=$post_id";
			$select_result = mysqli_query($conn, $select_query);

			if($select_result){
				$row = mysqli_fetch_array($select_result, MYSQLI_ASSOC);
				$count = $row['counts'];

				$count = $count - 1;
				$query = "UPDATE likes_count SET counts = $count WHERE post_id=$post_id";
				$result = mysqli_query($conn, $query);
				if($result){
					//return the actual counts of likes .. 
					$current_likes_counts = get_current_likes_count($post_id);
					return $current_likes_counts;

				}else{
					//error
				}


			}
		}else{
			//error
			//
		}
		



	}
	else{
		//this user has not liked this post before 
		$feedback = check_if_post_is_liked_by_others($post_id);
		if($feedback == 'not liked before'){
			//insert query ...
			$query = "INSERT INTO likes_count (post_id, counts) VALUES($post_id, 1)";
			$result = mysqli_query($conn, $query);
			if($result){
				$query = "INSERT INTO posts_likes(post_id, like_author_id, date_created) VALUES($post_id, $user_id, NOW())";
				$result = mysqli_query($conn, $query);

				if($result){
					$current_likes_counts = get_current_likes_count($post_id);
					return $current_likes_counts;
				}else{
					//error ..
				}
			}


		}

		if($feedback >= 0){
			//update query .. 
			$select_query = "SELECT * FROM likes_count WHERE post_id=$post_id";
			$select_result = mysqli_query($conn, $select_query);
			if($select_result){
				$row = mysqli_fetch_array($select_result, MYSQLI_ASSOC);
				$count = $row['counts'];

				$count = $count + 1;

				$query = "UPDATE likes_count SET counts = $count WHERE post_id=$post_id";
				$result = mysqli_query($conn, $query);
				if($result){
					$query = "INSERT INTO posts_likes(post_id, like_author_id, date_created) VALUES($post_id, $user_id, NOW())";
					$result = mysqli_query($conn, $query);
					if($result){
						//
						$get_current_likes_count = get_current_likes_count($post_id);

						return $get_current_likes_count;
					}else{
						//error 
						//There wa 
					}
				}


				
			}
			
		}


	}



	

}

function get_current_likes_count($post_id){
	require('./includes/connection.php');

	$query = "SELECT counts FROM likes_count WHERE post_id=$post_id";
	$result = mysqli_query($conn, $query);
	if($result){

		$counts = mysqli_fetch_array($result, MYSQLI_ASSOC)['counts'];

		return $counts;

	}

}


function check_liked_post_by_this_user($post_id, $user_id){
	require('./includes/connection.php');

	$query = "SELECT * FROM posts_likes WHERE post_id=$post_id AND like_author_id=$user_id";
	$result = mysqli_query($conn, $query);
	if($result){
		if(mysqli_num_rows($result) >= 1){
			//there is a match ..
			return 1;
			



		}else{
			//not matched ..
			return 0;
			
		}
		

	}else{
		return "Could not check likes :".mysqli_error($conn);
	}

}

function check_if_post_is_liked_by_others($post_id){
	require('./includes/connection.php');
	$query = "SELECT * FROM likes_count WHERE post_id=$post_id";
	$result = mysqli_query($conn, $query);
	if($result){
		if(mysqli_num_rows($result) >= 1){
			//there is a match ..
			//check the counts ..
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
				$counts = $row['counts'];
			

			return $counts;

			
		}else{
			//post has never been liked 
			return 'not liked before';
		}

	}else{
		//error 
		
	}


}


