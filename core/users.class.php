<?php
	namespace Krypton;

	class User
	{
		private $DBH;
		//Check if the user is logged in via $_SESSION's
		function isLogged()
		{
			global $_SESSION;
			
			if(isset($_SESSION['user_id']))
			{
				return true;
			}
			else 
			{
				return false;
			}
		}
		//Checks if logged in = true, sends the corrent redirects
		function isLoggedRedirect()
		{
			if($this->isLogged() == false && $_GET['page'] != 'login')
			{
				header("Location: ?page=login");
			}
			else if ($this->isLogged() == true && $_GET['page'] = 'login')
			{
				header("Location: ?page=index");
			}
		}
		//Begin Login Process
		function Login()
		{
			global $mysql;
			if(!empty($_POST['log_username']) && !empty($_POST['log_password']))
			{
				$sql = "SELECT * FROM users WHERE username = :username";
				$user_record = $mysql->Connect->prepare($sql);
				
				$user_record->bindParam(':username', $_POST['log_username']);
				$user_record->execute();
				
				$result = $user_record->fetch(\PDO::FETCH_ASSOC);
				
				if(count($result) > 0 && password_verify($_POST['log_password'], $result['password'])) 
				{
					
					$_SESSION['user_id'] = $result['id'];
					header("Location: ?page=index");
				} else 
				{
					
				}
			}
		}
		//Begin Logout Process
		
		//Begin Register Process
		
		//Begin Account Update
		
	}

?>