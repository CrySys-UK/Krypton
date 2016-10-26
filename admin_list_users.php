<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

	require (__DIR__.'/core/init.php');
	require_once (__DIR__.'/core/functions/fnc_chkLogged.php');
	require_once (__DIR__.'/core/functions/fnc_chkAdmin.php');
	
	//Page
	require (__DIR__.'/header.php');
	require (__DIR__.'/listusers.php');
	require (__DIR__.'/footer.php');
?>
