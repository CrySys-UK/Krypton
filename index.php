<?php
require 'global.php';

	$template->Show($template->SetParams());
	$template->rawParams();

	if (!isset($_GET['page']))
	{
		header("Location: ?page=index");
	}
	else{}

?>
