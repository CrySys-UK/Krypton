<?php
	require (__DIR__.'/core/init.php');
	require_once (__DIR__.'/core/functions/fnc_chkLogged.php');
	require_once (__DIR__.'/core/functions/fnc_chkUser.php');
	require_once (__DIR__.'/core/functions/fnc_chkTeacher.php');
	require_once (__DIR__.'/core/functions/fnc_chkNews.php');
	include (__DIR__.'/includes/header.php');
	
	$message = '';
	
	if(!empty($_POST['title']) && !empty($_POST['body'])) :
		
		$sql = "UPDATE news SET title = :title, body = :body WHERE id = :gid";
		$stmt = $dbConn->prepare($sql);
		
		$stmt->bindParam(':title', $_POST['title']);
		$stmt->bindParam(':body', $_POST['body']);
		$stmt->bindParam(':gid', $_GET['id']);
		
	if( $stmt->execute() ):
		$message = '<div class="alert alert-success" role="alert"><b>Success!</b> News has been Updated!</div>';
	else:
		$message = '<div class="alert alert-danger" role="alert"><b>Error!</b> News has not been Updated!</div>';
	endif;
	
	endif;
?>
<div class="container">
	<?php echo $message ?>
	<form action="edit_newspage.php?id=<?php echo $_GET['id']?>" method="POST">
		<div class="form-group">
			<label>Title</label>
			<input type="text" class="form-control" name="title" value="<?php echo $title?>" placeholder="Article Title">
		</div>
		<div class="form-group">
			<textarea type="text" class="form-control" name="body"></textarea>
		</div>
		<input class="btn btn-success pull-right" type="submit" value="Update News Article"></input>
	</form>
</div>
<script>
	CKEDITOR.replace('body').setData(value);
</script>
<?php
	include '/includes/footer.php';
?>