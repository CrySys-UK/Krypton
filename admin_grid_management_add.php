<?php 
	require (__DIR__.'/core/init.php');
	require_once (__DIR__.'/core/functions/fnc_chkLogged.php');
	require_once (__DIR__.'/core/functions/fnc_chkAdmin.php');
	include (__DIR__.'/includes/header.php');
	
	$message = '';
	
	if (!empty($_POST['title']) && !empty($_POST['link']) && !empty($_POST['image'])) :
	
	$sql = "INSERT INTO content (title, link, admin_access, teacher_access, student_access, img) VALUES (:title, :link, :aa, :ta, :sa, :image)";
	$stmt = $dbConn->prepare($sql);
	
	$stmt->bindParam(':title', $_POST['title']);
	$stmt->bindParam(':link', $_POST['link']);
	$stmt->bindParam(':aa', $_POST['admin_access']);
	$stmt->bindParam(':ta', $_POST['teacher_access']);
	$stmt->bindParam(':sa', $_POST['student_access']);
	$stmt->bindParam(':image', $_POST['image']);
	
	if( $stmt->execute() ):
		$message = '<div class="alert alert-success" role="alert"><b>Success!</b> Grid Block has been added!</div>';
	else:
		$message = '<div class="alert alert-danger" role="alert"><b>Error!</b> Grid Block has not been added!</div>';
	endif;
	
	endif;
?>
<div class="container">
	<?php echo $message ?>
	<form action="admin_grid_management_add.php" method="POST">
		<div class="form-group">
			<label>Title</label>
			<input type="text" class="form-control" name="title" placeholder="Hover Title">
		</div>
		<div class="form-group">
			<label>Link</label>
			<input type="text" class="form-control" name="link" placeholder="Place your URL (REQUIRES HTTP://WWW)">
		</div>
		<div class="form-group">
			<label>Image</label>
			<input type="text" class="form-control" name="image" placeholder="Image URL">
		</div>
		<div class="form-check">
		  <label class="form-check-label">
			<input class="form-check-input" type="checkbox" name="admin_access" value="1" checked>
			Administrator Access
		  </label>
		  <label class="form-check-label">
			<input class="form-check-input" type="checkbox" name="teacher_access" value="1">
			Teacher Access
		  </label>
		  <label class="form-check-label">
			<input class="form-check-input" type="checkbox" name="student_access" value="1">
			Student Access
		  </label>
		</div>
		<input class="btn btn-success pull-right" type="submit" value="Add Grid Block"></input>
	</form>
</div>
<?php 	
	include ('/includes/footer.php');
?>