<?php
	require('/core/init.php');
	require('/core/functions/fnc_chkAdmin.php');
	require('/core/functions/fnc_chkGrid.php');
	require('/includes/header.php');
	
	$message = '';
	$message2 = '';
	
	if (!empty($_POST['title']) && !empty($_POST['link']) && !empty($_POST['image'])) :
	
	$sql = "UPDATE content SET title = :title, link = :link, admin_access = :aa, teacher_access = :ta, student_access = :sa, img = :image WHERE id = :gid";
	$stmt = $dbConn->prepare($sql);
	
	$stmt->bindParam(':title', $_POST['title']);
	$stmt->bindParam(':link', $_POST['link']);
	$stmt->bindParam(':aa', $_POST['admin_access']);
	$stmt->bindParam(':ta', $_POST['teacher_access']);
	$stmt->bindParam(':sa', $_POST['student_access']);
	$stmt->bindParam(':image', $_POST['image']);
	$stmt->bindParam(':gid', $_GET['id']);
	
	if( $stmt->execute() ):
		$message = '<div class="alert alert-success" role="alert"><b>Success!</b> Grid Block has been upated!</div>';
	else:
		$message = '<div class="alert alert-danger" role="alert"><b>Error!</b> Grid Block has not been updated!</div>';
	endif;
	
	endif;
	
	if (!empty($_POST['password'])):
	
	$sql = "DELETE FROM content WHERE id = :gid";
	$stmt = $dbConn->prepare($sql);
	
	$stmt->bindParam(':gid', $_GET['id']);
	
		if(password_verify($_POST['password'], $users['password'])) {
		if( $stmt->execute() ):
			$message2 = '<div class="alert alert-success" role="alert"><b>Success!</b>Grid Block has been deleted!</div>';
		else:
			$message2 = '<div class="alert alert-danger" role="alert"><b>Error!</b> Grid Block has not been deleted!</div>';
		endif;
		} else {
			$message2 = '<div class="alert alert-danger" role="alert"><b>Error!</b> Your old Password does not match our records!</div>';
		}
	endif;
?>
<div class="container">
	<?php echo $message ?>
	<form action="admin_grid_management_edit.php?id=<?php echo $_GET['id']?>" method="POST">
		<div class="form-group">
			<label>Title</label>
			<input type="text" class="form-control" name="title" placeholder="Hover Title" value="<?php echo $title ?>">
		</div>
		<div class="form-group">
			<label>Link</label>
			<input type="text" class="form-control" name="link" placeholder="Place your URL (REQUIRES HTTP://WWW)" value="<?php echo $link ?>">
		</div>
		<div class="form-group">
			<label>Image</label>
			<input type="text" class="form-control" name="image" placeholder="Image URL" value="<?php echo $img ?>">
		</div>
		<div class="form-check">
		  <label class="form-check-label">
			<input class="form-check-input" type="checkbox" name="admin_access" value="1" <?php echo ($aa==1 ? 'checked' : '');?>>
			Administrator Access
		  </label>
		  <label class="form-check-label">
			<input class="form-check-input" type="checkbox" name="teacher_access" value="1" <?php echo ($ta==1 ? 'checked' : '');?>>
			Teacher Access
		  </label>
		  <label class="form-check-label">
			<input class="form-check-input" type="checkbox" name="student_access" value="1" <?php echo ($sa==1 ? 'checked' : '');?>>
			Student Access
		  </label>
		</div>
		<input class="btn btn-success pull-right" type="submit" value="Update Grid Block"></input>
	</form>
</div>
<br>
	<div class="container">
	<?php echo $message2 ?>
	<form action="admin_grid_management_edit.php?id=<?php echo $_GET['id']?>" method="POST">
		<div class="form-group">
			<label>Enter Password</label>
			<input type="password" class="form-control" name="password" placeholder="Password">
		</div>
		<input class="btn btn-danger pull-left" type="submit" value="Delete Grid Block"></input>
	</div>
	</form>
<?php
	require('/includes/footer.php');
?>