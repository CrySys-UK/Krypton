<?php
	class GetAnnouncement {
		public function fetch_all() {
			global $dbConn;
			
			$sql = $dbConn->prepare("SELECT * FROM announcements WHERE active = 1 ORDER BY id DESC LIMIT 1");
			
			$sql->execute();
			
			return $sql->fetchAll();
		}
	}

?>