<?php 
	require_once ('/core/functions/fnc_gtNews.php');
	
	$article = new Article;
	$articles = $article->fetch_all();
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Krypton News</h2>
			<?php foreach ($articles as $article) { ?>
			
            <h3><?php echo $article['title'] ?></h3>
            <p><?php echo $article['body'] ?></p>
            <br>
            <hr/>
			<?php } ?>
		</div>
    </div>
</div>
