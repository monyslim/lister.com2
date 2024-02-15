<?php 
session_start();

if(isset($_SESSION['username'])){

echo 

		"Welcome, {$_SESSION['firstname']} {$_SESSION['lastname']} 

		<a href='profile.php'>Update Profile</a> | 
		<a href='posts.php'>My Posts</a>
		<hr>

		<a href='logout.php'>Log out</a>

		";
}else{
	header('location: login.php');
}
