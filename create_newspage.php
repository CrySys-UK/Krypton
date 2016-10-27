<?php
	require_once(__DIR__.'/core/init.php');
	require_once (__DIR__.'/core/functions/fnc_chkLogged.php');
	require_once (__DIR__.'/core/functions/fnc_chkUser.php');
	require_once (__DIR__.'/core/functions/fnc_chkTeacher.php');
	include (__DIR__.'/includes/header.php');
	
	$message = '';
	
	if(!empty($_POST['title']) && !empty($_POST['body'])) :
		
		$sql = "INSERT INTO news (title, body, author, author_name, posted) VALUES (:title, :body, :author, :authname, :date)";
		$stmt = $dbConn->prepare($sql);
		
		$stmt->bindParam(':title', $_POST['title']);
		$stmt->bindParam(':body', $_POST['body']);
		$stmt->bindParam(':author', $_SESSION['user_id']);
		$stmt->bindParam(':authname', $_POST['author_name']);
		$stmt->bindParam(':date', time());
		
	if( $stmt->execute() ):
		$message = '<div class="alert alert-success" role="alert"><b>Success!</b> News has been added!</div>';
	else:
		$message = '<div class="alert alert-danger" role="alert"><b>Error!</b> News has not been added!</div>';
	endif;
	
	endif;
?>
    <div class="container">
        <?php echo $message ?>
            <form action="create_newspage.php" method="POST">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Article Title">
                </div>
                <div class="form-group">
                    <textarea type="text" class="form-control" name="body"></textarea>
                </div>
                <div class="form-group">
                    <label>Posting as</label>
                    <input type="text" class="form-control" readonly name="author_name" value="<?php echo $users['last_name']?>, <?php echo $users['first_name']?>">
                </div>
                <input class="btn btn-success pull-right" type="submit" value="Add News Article"></input>
            </form>
    </div>
    <script>
        CKEDITOR.replace('body');

    </script>
    <?php
	include (__DIR__.'/footer.php');
?>
