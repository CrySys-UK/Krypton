<?php
	require_once ('/core/init.php');
	require_once ('/core/functions/fnc_chkUser.php');
?>

    <head>
        <meta charset="utf-8">
        <title>Krypton</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link href="krypton.css" rel="stylesheet">
    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static" role=" navigation ">
            <div class="container ">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header ">
                    <button type="button " class="navbar-toggle " data-toggle="collapse " data-target="#bs-example-navbar-collapse-1 ">
                        <span class="sr-only ">Toggle navigation</span>
                        <span class="icon-bar "></span>
                        <span class="icon-bar "></span>
                        <span class="icon-bar "></span>
                    </button>
                    <a class="navbar-brand " href="<?php echo $server_url?># ">Krypton</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1 ">
                    <ul class="nav navbar-nav ">
                        <li>
                            <a href="<?php echo $server_url?>/index.php">Home</a>
                        </li>
                        <li>
                            <a href="<?php echo $server_url?>/upcomingpage.php">Upcoming</a>
                        </li>
                    </ul>
                    <?php	if(isset($_SESSION['user_id'])) {
				
				?>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle currentuser" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <?php echo $username ?> <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo $server_url?>/update_user_account.php">Account Settings</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="<?php echo $server_url?>/logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                        <?php
				} else {}?>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <div class="alert alert-info">
            <strong>Heads up!</strong> This alert needs your attention, but it's not super important.
        </div>
