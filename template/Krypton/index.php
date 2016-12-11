<!DOCTYPE html>
<HTML>
    <HEAD>
        <meta charset="utf-8">
        <title>Krypton</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link href="{URL}/template/{TPL}/css/krypton.css" rel="stylesheet">
        <script src="//cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>
    </HEAD>

    <BODY>

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
                    <a class="navbar-brand " href="{URL}">Krypton</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1 ">
                    <ul class="nav navbar-nav ">
                        <li>
                            <a href="{URL}/index.php">Home</a>
                        </li>
                        <li>
                            <a href="{URL}/upcomingpage.php">Upcoming</a>
                        </li>
                    </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle currentuser" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
								{username}<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{URL}/update_user_account.php">Account Settings</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="{URL}/logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
</HTML>