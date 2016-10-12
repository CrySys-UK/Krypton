<?php
	if (!isset($_SESSION['user_id'])) {
		header("Location: $server_url/login.php");
	}
?>