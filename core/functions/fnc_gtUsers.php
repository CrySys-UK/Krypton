<?php
	class ListUser {
		public function fetch_all() {
			global $dbConn;
			
			$query = $dbConn->prepare("SELECT * FROM users");
			$query->execute();
			
			return $query->fetchAll();
		}
		
		public function fetch_data($user_id) {
			global $dbConn;
			
			$query = $dbConn->prepare("SELECT * FROM news WHERE id = ?");
			$query-> bindValue(1, $user_id);
			$query->execute();
			
			return $query->fetch();
		}
	}
?>