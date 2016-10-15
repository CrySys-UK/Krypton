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
			
            <h3><a href="<?php echo $server_url?>/article.php?id=<?php echo $article['id'] ?>"><?php echo $article['title'] ?></a></h3>
            <p><?php echo substr($article['body'], 0, 100)?>[...]</p>
			<br>
			<h5></h5>
            <hr/>
			<?php } ?>
		</div>
    </div>
</div>
