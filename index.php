<?php
	require '/core/init.php';
if(!isset($_SESSION['user_id'])) {
	header("Location: /login.php");
}
	include 'header.php';
	include 'content.php';
	include 'footer.php';
?>
