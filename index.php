<?php
require 'global.php';

	$template->Show($template->SetParams());
	$user->isLoggedRedirect();

	if (!isset($_GET['page'])) 
	{
		header("Location: ?page=index");
	} 
	else{}

?>