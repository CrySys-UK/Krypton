<?php
	$sql = "SELECT rank FROM users WHERE id = :user_id";
	$record = $dbConn->prepare($sql);
	
	$record->bindParam(':user_id', $_SESSION['user_id']);
	$record->execute();
	
	$rank = $record->fetch(PDO::FETCH_ASSOC);
	
	if(!is_array($rank) || $rank['rank'] < 2) {
		header("Location: $server_url/");
	}
?>
