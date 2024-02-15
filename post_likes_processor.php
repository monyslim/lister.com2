<?php 
session_start();
if(isset($_POST['post_id'])){


	$post_id = $_POST['post_id'];


	require('includes/functions/functions.php');
	$user_id = $_SESSION['id'];
	$feedback = like_post($post_id, $user_id);

	echo $feedback;



}