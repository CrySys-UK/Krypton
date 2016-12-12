<?php
	namespace Krypton;

	class Template
	{
		private $assignedValues = array();
		private $rawBuffer;
		private $tpl;
		//Construct Function (First steps, checks if exists)
		function __construct($_path = '')
		{
			if(!empty($_path))
			{
				if(file_exists($_path))
				{
					ob_start();
					include($_path);
					$this->tpl .= ob_get_contents();
					ob_end_clean();
				}
				else
				{
					echo "Krypton Template System Error: File not found! PATH = ".$_path;
				}
			}

		}
		//Add Template Pieces
		//(Basically import raw PHP	// I'm confident there is a bettter way but for now #YOLO)
		function rawObject($_searchString, $_path)
		{
			if(!empty($_searchString))
			{
				if(file_exists($_path))
				{
					ob_start();
					include($_path);
					$this->rawBuffer .= ob_get_contents();
					ob_end_clean();

					$this->tpl = str_ireplace('%'.strtoupper($_searchString).'%', $this->rawBuffer, $this->tpl);
					$this->rawBuffer = '';
				}
			}
		}

		//The assigned Parameters {url} etc.
		function SetParams()
		{
			global $_CONFIG, $user;
			$this->Assign('url', $_CONFIG['site']['url']); //{URL} Site URL
			$this->Assign('tpl', $_CONFIG['site']['template']); //{TPL} Skin Name
			if(isset($_SESSION['user']['id']))
			{
			$this->Assign('username', $user->getUserInfo('username', $_SESSION['user']['id'])); //{USERNAME} prints the username
			}
		}
		function rawParams()
		{
			$this->rawObject('grid', RAW_PATH.'/grid.php', array());
		}
		//This function takes the set params and turns them into an actual function
		function Assign($_searchString, $_replaceString)
		{
			if(!empty($_searchString))
			{
				$this->assignedValues[strtoupper($_searchString)] = $_replaceString;
			}
		}
		//Combines everything and echo's the template
		function Show()
		{
			if(count($this->assignedValues) > 0)
			{
				foreach ($this->assignedValues as $key => $value)
				{
					$this->tpl = str_ireplace('{'.$key.'}', $value, $this->tpl);
				}
			}
			echo $this->tpl;
		}
	}

?>
