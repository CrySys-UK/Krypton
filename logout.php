<?php
	require_once (__DIR__.'/core/config/config.php');
	
	session_start();

	session_unset();

	session_destroy();

header("Location: $server_url/login.php");

?>