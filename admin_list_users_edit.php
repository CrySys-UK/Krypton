<?php
	include ('/includes/header.php');
	require_once ('/core/init.php');
	require_once ('/core/functions/fnc_chkLogged.php');
	require_once ('/core/functions/fnc_chkAdmin.php');
	require_once ('/core/functions/fnc_gtUser.php');

	
	$message = '';
	
	if (!empty($_POST['reg_email']) && !empty($_POST['reg_first_name']) && !empty($_POST['reg_last_name']) && !empty($_POST['reg_dob'])):
	
	$sql = "UPDATE users SET username = :username, password = :password, email = :email, first_name = :first_name, last_name = :last_name, gender = :gender, dob = :dob, rank = :rank WHERE id = :gid";
	$stmt = $dbConn->prepare($sql);
	
	$stmt->bindParam(':username', $_POST['reg_username']);
	$stmt->bindParam(':password', password_hash($_POST['reg_password'], PASSWORD_BCRYPT));
	$stmt->bindParam(':email', $_POST['reg_email']);
	$stmt->bindParam(':first_name', $_POST['reg_first_name']);
	$stmt->bindParam(':last_name', $_POST['reg_last_name']);
	$stmt->bindParam(':gender', $_POST['reg_gender']);
	$stmt->bindParam(':dob', $_POST['reg_dob']);
	$stmt->bindParam(':rank', $_POST['reg_rank']);
	$stmt->bindParam(':gid', $_GET['id']);
		
		if( $stmt->execute() ):
			$message = '<div class="alert alert-success" role="alert"><b>Success!</b> The details have been updated!</div>';
		else:
			$message = '<div class="alert alert-danger" role="alert"><b>Error!</b> Something wen\'t wrong, try again later!</div>';
		endif;
	
	endif;
?>
<div class="container">
	<?php echo $message ?>
	<form action="admin_list_users_edit.php?id=<?php echo $_GET['id']?>" method="POST">
		<div class="form-group">
			<label>Username</label>
			<input type="text" class="form-control" autocomplete="off" name="reg_username" maxlength="24" value="<?php echo $username?>" placeholder="Username">
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" class="form-control" autocomplete="off" name="reg_password" value="<?php echo $password?>" placeholder="Password">
		</div>

		<div class="form-group">
			<label>Email</label>
			<input type="email" class="form-control" autocomplete="off" name="reg_email" value="<?php echo $email?>" placeholder="Email Address">
		</div>
		<div class="form-group">
			<label>First Name</label>
			<input type="text" class="form-control" autocomplete="off" name="reg_first_name" value="<?php echo $fname?>" placeholder="First Name">
		</div>
		<div class="form-group">
			<label>Surname</label>
			<input type="text" class="form-control" autocomplete="off" name="reg_last_name" value="<?php echo $surname?>" placeholder="Surname">
		</div>
		<div class="form-check">
		  <label class="form-check-label">
			<input class="form-check-input" type="radio" name="reg_gender" value="1" <?php echo ($gender==1 ? 'checked' : '');?>>
			Male
		  </label>
		  <label class="form-check-label">
			<input class="form-check-input" type="radio" name="reg_gender" value="2" <?php echo ($gender==2 ? 'checked' : '');?>>
			Female
		  </label>
		</div>
		<div class="form-group">
		  <label>Date of Birth</label>
		  <div class="form-group">
			<input class="form-control" type="date" value="<?php echo $dob?>" name="reg_dob">
		  </div>
		</div>
		<div class="form-check">
		  <label class="form-check-label">
			<input class="form-check-input" type="radio" name="reg_rank" value="1" <?php echo ($rank==1 ? 'checked' : '');?>>
			Student
		  </label>
		  <label class="form-check-label">
			<input class="form-check-input" type="radio" name="reg_rank" value="2" <?php echo ($rank==2 ? 'checked' : '');?>>
			Teacher
		  </label>
		  <label class="form-check-label">
			<input class="form-check-input" type="radio" name="reg_rank" value="3" <?php echo ($rank==3 ? 'checked' : '');?>>
			Administrator
		  </label>
		</div>
		<input class="btn btn-success pull-right" type="submit" value="Update User"></input>
	</form>
<?php
	include '/includes/footer.php';
?>