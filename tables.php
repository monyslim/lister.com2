<?php
/**
 * Create users tables
 */

function createUsersTable(){

	require "includes/connection.php";

	$sql = "CREATE TABLE IF NOT EXISTS `flm_users`(

		`id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
		`firstname` VARCHAR(300) NOT NULL,
		`lastname` VARCHAR(300) NOT NULL,
		`username` VARCHAR(300) UNIQUE NOT NULL,
		`password` VARCHAR(300) NOT NULL,
		`date_created` TIMESTAMP
	)";

	$result = mysqli_query($conn, $sql);

	if($result){
		echo "Users table created successfully <br>";
	}else{

		echo "Could not create the users table: ".mysqli_error($conn);
		return null;

	}


}


/**
 * Creates the Posts table
 * @return [type] [description]
 */
function createPostsTable(){
	require "includes/connection.php";

	$sql = "CREATE TABLE IF NOT EXISTS `posts`(
		`post_id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
		`author_id` INT NOT NULL,
		`post_title` TEXT NOT NULL,
		`post_body` LONGTEXT NOT NULL,
		`post_description` TEXT NULL,
		`created_date` TIMESTAMP,
		`status` BOOLEAN DEFAULT false

	)";

	$result = mysqli_query($conn, $sql);

	if($result){
		echo "Posts table created <br>";
		return null;
	}
	else{
		echo "Error creating posts table: ".mysqli_error($conn);
	}


}


function createLikesCountTable(){
	require "includes/connection.php";

	$sql = "CREATE TABLE IF NOT EXISTS `likes_count`(

		`id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
		`post_id` INT NOT NULL,
		`counts` INT
	)";

	$result = mysqli_query($conn, $sql);

	if($result){
		echo "Likes count table created <br>";
		return null;
	}
	else{
		echo "Error creating likes count table: ".mysqli_error($conn);
		return null;
	}

}

function createPostLikesTable(){
	require "includes/connection.php";

	$sql = "CREATE TABLE IF NOT EXISTS `posts_likes`(

		`id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
		`post_id` INT NOT NULL,
		`like_author_id` INT NOT NULL,
		`date_created` TIMESTAMP
	)";

	$result = mysqli_query($conn, $sql);

	if($result){
		echo "Post likes table created <br>";
		return null;
	}
	else{
		echo "Error creating post likes table: ".mysqli_error($conn);
		return null;
	}
}

createPostLikesTable();
createLikesCountTable();
createPostsTable();
createUsersTable();