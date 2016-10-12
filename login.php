<?php 
	include ('/header.php');	
	$message = '';	
	
if(isset($_SESSION['user_id'])) {
	header("Location: /index.php");
}
	
	if(!empty($_POST['log_username']) && !empty($_POST['log_password'])):
		
		$sql = "SELECT * FROM users WHERE username = :username";
		$user_record = $dbConn->prepare($sql);
		
		$user_record->bindParam(':username', $_POST['log_username']);
		$user_record->execute();
		
		$result = $user_record->fetch(PDO::FETCH_ASSOC);
		
		$message = '<div class="alert alert-danger" role="alert"><b>Error!</b> You must enter a Username and Password!</div>';
		
		if(count($result) > 0 && password_verify($_POST['log_password'], $result['password'])) {
			
			$_SESSION['user_id'] = $result['id'];
			header("Location: /");
		} else {
			
		$message = '<div class="alert alert-danger" role="alert"><b>Error!</b> Those credentials do not match our records!</div>';
		}
		
	endif;
?>



    <div class="container">
	<?php echo $message ?>
        <div class=".col-md-6">
            <div class="wrapper">
                <form action="" method="post" name="Login_Form" class="form-signin">
                    <h3 class="form-signin-heading text-center">
                        <img src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/d0f16745969491.5607bc041aaa9.png" alt=""/>
                    </h3>
                    <div class="input-group">
                        <span class="input-group-addon" id="sizing-addon1">
                            <i class="fa fa-user"></i>
                        </span>
                        <input type="text" class="form-control" name="log_username" placeholder="Username" required="" autofocus="" />
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon" id="sizing-addon1">
                            <i class="fa fa-lock"></i>
                        </span>
                        <input type="password" class="form-control" name="log_password" placeholder="Password" required="" />
                    </div>
                    <input class="btn btn-lg btn-primary btn-block" name="submit" value="Login" type="submit"></input>
                </form>
            </div>
        </div>
    </div>
