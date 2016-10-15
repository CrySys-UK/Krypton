<?php
	require '/core/init.php';
	require_once ('/core/functions/fnc_chkLogged.php');
	
	//Page
	include '/includes/header.php';
?>

    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h1>Article Title</h1>
                <span><strong>Author</strong>   <small>Date Published</small></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                <p>content here</p>
            </div>
        </div>
    </div>

    <?php
	include '/includes/footer.php';
?>
