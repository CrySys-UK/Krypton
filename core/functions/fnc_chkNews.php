<?php
	$sql = "SELECT * FROM news WHERE id = :gid";
	$return = $dbConn->prepare($sql);
	
	$return->bindParam(':gid', $_GET['id']);
	$return->execute();
	
	$article = $return->fetch(PDO::FETCH_ASSOC);
	
	$gid = $article['id'];
	$title = $article['title'];
	$body = $article['body'];
?>