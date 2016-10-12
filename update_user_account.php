<?php
	include ('/includes/header.php');
	require_once ('/core/init.php');
	require_once ('/core/functions/fnc_chkLogged.php');

	
	$message = '';
	$message2 = '';
	
	if (!empty($_POST['reg_email']) && !empty($_POST['reg_first_name']) && !empty($_POST['reg_last_name']) && !empty($_POST['reg_dob'])):
	
	$sql = "UPDATE users SET email = :email, first_name = :first_name, last_name = :last_name, dob = :dob WHERE id = $uid";
	$stmt = $dbConn->prepare($sql);
	
	$stmt->bindParam(':email', $_POST['reg_email']);
	$stmt->bindParam(':first_name', $_POST['reg_first_name']);
	$stmt->bindParam(':last_name', $_POST['reg_last_name']);
	$stmt->bindParam(':dob', $_POST['reg_dob']);
		
		if( $stmt->execute() ):
			$message = '<div class="alert alert-success" role="alert"><b>Success!</b> Your details have been updated!</div>';
		else:
			$message = '<div class="alert alert-danger" role="alert"><b>Error!</b> Something wen\'t wrong, try again later!</div>';
		endif;
	
	endif;
	
	if (!empty($_POST['old_password']) && !empty($_POST['reg_password']) && !empty($_POST['con-reg_password'])):
	
	$sql2 = "UPDATE users SET password = :new_pw WHERE id = $uid";
	$stmt2 = $dbConn->prepare($sql2);
	
	$stmt2->bindParam(':new_pw', password_hash($_POST['reg_password'], PASSWORD_BCRYPT));
	
		if(password_verify($_POST['old_password'], $users['password'])) {
				if( $stmt2->execute() ):
			$message2 = '<div class="alert alert-success" role="alert"><b>Success!</b> Your details have been updated!</div>';
		else:
			$message2 = '<div class="alert alert-danger" role="alert"><b>Error!</b> Something wen\'t wrong, try again later!</div>';
		endif;
		} else {
			$message2 = '<div class="alert alert-danger" role="alert"><b>Error!</b> Your old Password does not match our records!</div>';
		}
	endif;
?>
<div class="container">
	<?php echo $message ?>
	<form action="update_user_account.php" method="POST">
		<div class="form-group">
			<label>Email</label>
			<input type="email" class="form-control" value="<?php echo $email ?>" name="reg_email" placeholder="Email Address">
		</div>
		<div class="form-group">
			<label>First Name</label>
			<input type="text" class="form-control" name="reg_first_name" value="<?php echo $fname ?>" placeholder="First Name">
		</div>
		<div class="form-group">
			<label>Surname</label>
			<input type="text" class="form-control" name="reg_last_name" value="<?php echo $surname ?>" placeholder="Surname">
		</div>
		<div class="form-group">
		  <label>Date of Birth</label>
		  <div class="form-group">
			<input class="form-control" type="date" value="<?php echo $dob ?>" name="reg_dob">
		  </div>
		</div>
		<input class="btn btn-success pull-right" type="submit" value="Update Info"></input>
	</form>
</div>
	<div class="container">
	<?php echo $message2 ?>
	<form action="update_user_account.php" method="POST">
		<div class="form-group">
			<label>Current Password</label>
			<input type="password" class="form-control" name="old_password" placeholder="Password">
		</div>
		<div class="form-group">
			<label>New Password</label>
			<input type="password" class="form-control" name="reg_password" placeholder="Password">
		</div>
		<div class="form-group">
			<label>Confirm Password</label>
			<input type="password" class="form-control" name="con-reg_password" placeholder="Password">
		</div>
		<input class="btn btn-success pull-right" type="submit" value="Change Password"></input>
	</form>
<?php
	include 'footer.php';
?>