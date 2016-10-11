<?php 
	include ('/header.php');
?>



    <div class="container">
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
                        <input type="text" class="form-control" name="Username" placeholder="Username" required="" autofocus="" />
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon" id="sizing-addon1">
                            <i class="fa fa-lock"></i>
                        </span>
                        <input type="password" class="form-control" name="Password" placeholder="Password" required="" />
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" name="Submit" value="Entrar" type="Submit">Login</button>
                </form>
            </div>
        </div>
    </div>
