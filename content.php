<?php
	require('/core/functions/fnc_gtContent.php');
	require('/core/functions/fnc_chkUser.php');
	
	if($contentAdmin = 0 && $contentStudent = 0 && $contentTeacher = 0) {
		
	} else {
	
	$contentAdmin = new ContentAdmin;
	$contentAdmins = $contentAdmin->fetch_all();

	$contentTeacher = new ContentTeacher;
	$contentTeachers = $contentTeacher->fetch_all();
	
	$contentStudent = new ContentStudent;
	$contentStudents = $contentStudent->fetch_all();
	}
?>
    <!-- Page Content -->

    <div class="container ">

        <!-- Page Heading -->
        <div class="row ">
            <div class="col-lg-12 ">
                <h1 class="page-header ">Welcome
                    <small>Here's your content</small>
                </h1>
            </div>
        </div>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Student</a></li>
            <?php if (!isset($users) || $users['rank'] > 1) {?>
                <li><a data-toggle="tab" href="#teacher">Teacher</a></li>
                <?php } else {}?>
                    <?php if (!isset($users) || $users['rank'] > 2) {?>
                        <li><a data-toggle="tab" href="#admin">Administrator</a></li>
                        <?php } else {}?>
        </ul>

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <div class="row ">
                    <?php foreach ($contentStudents as $contentStudent) { ?>
                        <div class="col-md-3 portfolio-item ">
                            <a href="<?php echo $server_url?>/<?php echo $contentStudent['link']?>">
					<img class="img-responsive gridimage " src="<?php echo $contentStudent['img']?>" alt=" " title="<?php echo $contentStudent['title']?>">
				</a>
                            <span class="gridtext">
                                <?php echo $contentStudent['title']?>
                            </span>
                        </div>
                        <?php } ?>
                </div>
            </div>
            <div id="teacher" class="tab-pane fade">
                <div class="row ">
                    <?php foreach ($contentTeachers as $contentTeacher) { ?>
                        <div class="col-md-3 portfolio-item ">
                            <a href="<?php echo $server_url?>/<?php echo $contentTeacher['link']?>">
					<img class="img-responsive gridimage" src="<?php echo $contentTeacher['img']?>" alt=" " title="<?php echo $contentTeacher['title']?>">
				</a>
                            <span class="gridtext">
                                <?php echo $contentTeacher['title']?>
                            </span>
                        </div>
                        <?php }?>
                </div>
            </div>

            <div id="admin" class="tab-pane fade">
                <div class="row ">
                    <?php foreach ($contentAdmins as $contentAdmin) { ?>
                        <div class="col-md-3 portfolio-item ">
                            <a href="<?php echo $server_url?>/<?php echo $contentAdmin['link']?>">
					<img class="img-responsive gridimage" src="<?php echo $contentAdmin['img']?>" alt=" " title="<?php echo $contentAdmin['title']?>">
				</a>
                            <span class="gridtext">
                                <?php echo $contentAdmin['title']?>
                            </span>
                        </div>
                        <?php } ?>
                </div>
            </div>
            <!-- /.row -->
