<?php
	require (__DIR__.'/core/init.php');
	require_once ('/core/functions/fnc_chkLogged.php');
	require_once ('/core/functions/fnc_gtNews.php');
	include (__DIR__.'/header.php');
	
	$article = new Article;
	
	if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$art = $article->fetch_data($id);
	}
?>

    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h1><?php echo $art['title']?></h1>
                <span><strong>Author:</strong>  <?php echo $art['author_name'] ?> | <strong><small>Date Published:</strong> <?php echo date('jS F', $art['posted']); ?></small></span>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-10">
                <?php echo $art['body'] ?>
            </div>
        </div>
    </div>

    <?php
	include (__DIR__.'/footer.php');
?>
