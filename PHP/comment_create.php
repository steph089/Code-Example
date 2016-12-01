<?php
if ($_POST["username"])
{
	if ( isset($_POST["text"]))
	    {
		include_once 'db_connect.php';

		// Sanitize and validate the data passed in
		 $blog_id = filter_input(INPUT_POST, 'blog_id', FILTER_SANITIZE_NUMBER_INT);
		 $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);		
		 $text = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_STRING);	
		 	
		//then we run the SQL
	
		$query = "INSERT INTO `comments` (blog_id,username,text,created_dt) VALUES ('".$blog_id."','".$username."'".$text."',CURRENT_TIMESTAMP)";

		if(mysqli_query($mysqli, $query)){
			echo "Records added successfully.";
			header('Location: #');
		}else{
			 echo "Unable to execute sql, Error:. " . mysqli_error($mysqli);
		}

	}
	else{
		print 'Failed: No Text';
	}	
else{
	print 'Failed: No Username';
}	
?>