<?php 
	include ('/header.php');
?>
<div class="container">
	<form action="index.php" method="POST">
		<div class="form-group">
			<label>Username</label>
			<input type="text" class="form-control" name="log_password" maxlength="24" placeholder="Username">
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" class="form-control" name="log_password" placeholder="Password">
		</div>
		<input type="submit" name="submit" value="Sign In" class="btn btn-success pull-right"></input>
	</form>
</div>