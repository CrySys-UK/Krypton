<?php
	class Article {
		public function fetch_all() {
			global $dbConn;
			
			$query = $dbConn->prepare("SELECT * FROM news ORDER BY id DESC");
			$query->execute();
			
			return $query->fetchAll();
		}
		
		public function fetch_data($article_id) {
			global $dbConn;
			
			$query = $dbConn->prepare("SELECT * FROM news WHERE id = ?");
			$query-> bindValue(1, $article_id);
			$query->execute();
			
			return $query->fetch();
		}
	}
?>