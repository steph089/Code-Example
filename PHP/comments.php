<?php
include_once 'db_connect.php';

	if ( !isset($_GET["blog_id"]) || !is_numeric($_GET["blog_id"]) )
	 {	$blog_id = 0;	}
	else
	 {	$blog_id = $_GET["blog_id"]}

	if (isset($_SESSION['rights']) && $_SESSION['rights'] <= 3){
		$query    = "SELECT * FROM comments Where blog_id='". $blog_id."'";
	}
	else
	{$query    = "SELECT * FROM comments Where blog_id='". $blog_id."'";}

include_once 'json_print.php';
?>