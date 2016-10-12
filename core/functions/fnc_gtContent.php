<?php
	//Fetch Admin Access Items
	class ContentAdmin {
		public function fetch_all() {
			global $dbConn;
			
			$sql = $dbConn->prepare("SELECT * FROM content WHERE admin_access = 1");
			
			$sql->execute();
			
			return $sql->fetchAll();
		}
	}
	
	//Fetch Teacher Access Items
	class ContentTeacher {
		public function fetch_all() {
			global $dbConn;
			
			$sql = $dbConn->prepare("SELECT * FROM content WHERE teacher_access = 1");
			
			$sql->execute();
			
			return $sql->fetchAll();
		}
	}
	
	//Fetch Student Access Items
	class ContentStudent {
		public function fetch_all() {
			global $dbConn;
			
			$sql = $dbConn->prepare("SELECT * FROM content WHERE student_access = 1");
			
			$sql->execute();
			
			return $sql->fetchAll();
		}
	}
?>