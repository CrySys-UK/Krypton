<?php 
	include ('/header.php');
	require_once ('/core/config/dbcon.php');
	
	$message = '';
	
	if (!empty($_POST['reg_username']) && !empty($_POST['reg_password']) && !empty($_POST['reg_password']) && !empty($_POST['reg_email']) && !empty($_POST['reg_first_name']) && !empty($_POST['reg_last_name']) && !empty($_POST['reg_gender']) && !empty($_POST['reg_dob']) && !empty($_POST['reg_rank'])):
	
	$sql = "INSERT INTO users (username, password, email, first_name, last_name, gender, dob, rank) VALUES (:username, :password, :email, :first_name, :last_name, :gender, :dob, :rank)";
	$stmt = $dbConn->prepare($sql);
	
	$stmt->bindParam(':username', $_POST['reg_username']);
	$stmt->bindParam(':password', password_hash($_POST['reg_password'], PASSWORD_BCRYPT));
	$stmt->bindParam(':email', $_POST['reg_email']);
	$stmt->bindParam(':first_name', $_POST['reg_first_name']);
	$stmt->bindParam(':last_name', $_POST['reg_last_name']);
	$stmt->bindParam(':gender', $_POST['reg_gender']);
	$stmt->bindParam(':dob', $_POST['reg_dob']);
	$stmt->bindParam(':rank', $_POST['reg_rank']);
	
	if( $stmt->execute() ):
		$message = '<div class="alert alert-success" role="alert"><b>Success!</b>, User has been added!</div>';
	else:
		$message = '<div class="alert alert-danger" role="alert"><b>Error!</b>, User has not been added!</div>';
	endif;
		
	endif;
?>


    <div class="container">
        <?php echo $message ?>
            <form action="admin_register.php" method="POST">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="reg_username" maxlength="24" placeholder="Username">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="reg_password" placeholder="Password">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="reg_email" placeholder="Email Address">
                </div>
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" name="reg_first_name" placeholder="First Name">
                </div>
                <div class="form-group">
                    <label>Surname</label>
                    <input type="text" class="form-control" name="reg_last_name" placeholder="Surname">
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="reg_gender" value="1" checked> Male
                    </label>
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="reg_gender" value="2"> Female
                    </label>
                </div>
                <div class="form-group">
                    <label>Date of Birth</label>
                    <div class="form-group">
                        <input class="form-control" type="date" value="" name="reg_dob">
                    </div>
                </div>
                <input class="btn btn-success pull-right" type="submit" value="Register"></input>
            </form>
    </div>


    <!-- wiuhoiheafp -->


    <div class="container">
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <form method="POST" action="#" role="form">
                        <div class="form-group">
                            <h2>Create account</h2>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="reg_username" maxlength="24" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="signupName">First name</label>
                            <input id="first_name" type="text" maxlength="50" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="signupName">Last name</label>
                            <input id="last_name" type="text" maxlength="50" class="form-control">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="reg_gender" value="1" checked> Male
                            </label>
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="reg_gender" value="2"> Female
                            </label>
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="reg_gender" value="3"> Apache Attack Helicopter
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="signupEmail">Email</label>
                            <input id="email" type="email" maxlength="50" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="signupPassword">Password</label>
                            <input id="password" type="password" maxlength="25" class="form-control" placeholder="at least 6 characters" length="40">
                        </div>
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <div class="form-group">
                                <input class="form-control" type="date" value="" name="reg_dob">
                            </div>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="reg_rank" value="1" checked> Student
                            </label>
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="reg_rank" value="2"> Teacher
                            </label>
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="reg_rank" value="3"> Administrator
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="reg_rank" value=" 1 ">Student</label>
                        </div>
                        <div class="checkbox ">
                            <label>
                                <input type="checkbox " name="reg_rank" value="2">Teacher</label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="reg_rank" value=" 3 ">Admin</label>
                        </div>
                        <div class="form-group ">
                            <button id="submit " type="submit " class="btn btn-info btn-block ">Create Account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
