<?php

include_once 'db_connect.php';
include_once 'paging.php';				

if (isset($_SESSION['rights']) && $_SESSION['rights'] <= 3){
	//puts query results in result variable
		$query    = "SELECT * FROM pages ORDER BY date DESC LIMIT ".$page.", 6";
	}
	else
	{
		$query    = "SELECT * FROM pages WHERE Private='0' ORDER BY date DESC LIMIT ".$page.", 6";
	}

include_once 'json_print.php';
?>