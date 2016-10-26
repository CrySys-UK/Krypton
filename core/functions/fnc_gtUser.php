<?php

	$sql = "SELECT id, username, password, email, first_name, last_name, gender, dob, rank FROM users WHERE id = :user_id";
	$return = $dbConn->prepare($sql);
	
	$return->bindParam(':user_id', $_GET['id']);
	$return->execute();
	
	$users = $return->fetch(PDO::FETCH_ASSOC);
	
	$uid = $users['id'];
	$username = $users['username'];
	$password = $users['password'];
	$email = $users['email'];
	$fname = $users['first_name'];
	$surname = $users['last_name'];
	$gender = $users['gender'];
	$dob = $users['dob'];
	$rank = $users['rank'];

?>