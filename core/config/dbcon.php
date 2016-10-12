<?php
	require "/core/config/config.php";
	
	try {
		$dbConn = new PDO("mysql:host=$server;dbname=$server_selDB;", $server_user, $server_password);
	} catch(PDOException $e) {
		die("Failed to Connect: " . $e->getMessage());
	}
?>