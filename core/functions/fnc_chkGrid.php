<?php

	$sql = "SELECT * FROM content WHERE id = :grid_id";
	$return = $dbConn->prepare($sql);
	
	$return->bindParam(':grid_id', $_GET['id']);
	$return->execute();
	
	$Grid = $return->fetch(PDO::FETCH_ASSOC);
	
	$gid = $Grid['id'];
	$title = $Grid['title'];
	$link = $Grid['link'];
	$aa = $Grid['admin_access'];
	$ta = $Grid['teacher_access'];
	$sa = $Grid['student_access'];
	$img = $Grid['img'];

?>