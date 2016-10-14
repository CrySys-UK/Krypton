<?php
	require '/core/init.php';
	require_once ('/core/functions/fnc_chkLogged.php');
	require_once ('/core/functions/fnc_chkTeacher.php');
	include '/includes/header.php';
	
	$message = '';
	
	if (!empty($_POST['ins_bold']) && !empty($_POST['ins_text'])) :
	
	$sql = "INSERT INTO announcements (bold, text, type, active, posted_by) VALUES (:bold, :text, :type, 1, :uid)";
	$stmt = $dbConn->prepare($sql);
	
	$stmt->bindParam(':bold', $_POST['ins_bold']);
	$stmt->bindParam(':text', $_POST['ins_text']);
	$stmt->bindParam(':type', $_POST['ins_type']);
	$stmt->bindParam(':uid', $_SESSION['user_id']);
	
	if( $stmt->execute() ):
		$message = '<div class="alert alert-success" role="alert"><b>Success!</b> Announcement has been added!</div>';
	else:
		$message = '<div class="alert alert-danger" role="alert"><b>Error!</b> Announcement has not been added!</div>';
	endif;
	
	endif;
?>
<div class="container">
	<?php echo $message ?>
	<form action="teacher_announcement.php" method="POST">
		<div class="form-group">
			<label>Bold Text</label>
			<input type="text" class="form-control" name="ins_bold" maxlength="24" placeholder="Urgent Announement!">
		</div>
		<div class="form-group">
			<label>Message</label>
			<input type="text" class="form-control" name="ins_text" placeholder="Can all personel please.....">
		</div>
		<div class="form-check">
		  <label class="form-check-label">
			<input class="form-check-input" type="radio" name="ins_type" value="alert-success" checked>
			Success
		  </label>
		  <label class="form-check-label">
			<input class="form-check-input" type="radio" name="ins_type" value="alert-danger">
			Danger
		  </label>
		  <label class="form-check-label">
			<input class="form-check-input" type="radio" name="ins_type" value="alert-info">
			Info
		  </label>
		  <label class="form-check-label">
			<input class="form-check-input" type="radio" name="ins_type" value="alert-warning">
			Warning
		  </label>
		</div>
		<input class="btn btn-success pull-right" type="submit" value="Register"></input>
	</form>
</div>
<?php
	include '/includes/footer.php';
?>