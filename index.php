<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


	require_once(__DIR__.'/core/init.php');
	require_once(__DIR__.'/core/functions/fnc_chkLogged.php');
	
	//Page
	include (__DIR__.'/header.php');
	include (__DIR__.'/content.php');
	include (__DIR__.'/footer.php');
?>
