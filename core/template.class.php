<?php
	namespace Krypton;
	
	class Template
	{
		private $assignedValues = array();
		private $partialBuffer;
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
		//The assigned Parameters {url} etc.
		function SetParams()
		{
			global $_CONFIG;
			$this->Assign('url', $_CONFIG['site']['url']); //{url} Site URL
			$this->Assign('tpl', $_CONFIG['site']['template']); //{tpl} Skin Name
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