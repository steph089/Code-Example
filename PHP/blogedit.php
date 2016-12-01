<?php
if ($_POST["password"] = "goStephgo")
{
	if ( isset($_POST["text"]))
	    {
		include_once 'db_connect.php';

		// Sanitize and validate the data passed in
		 $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);	
		 $title = str_replace("'","`",$title);
		 $picture = filter_input(INPUT_POST, 'picture', FILTER_SANITIZE_NUMBER_INT);
		 $Poster = filter_input(INPUT_POST, 'poster', FILTER_SANITIZE_NUMBER_INT);
		 $text = str_replace("'","`",$_POST["text"]);
		 
		
		//then we run the SQL
	
		$query = "UPDATE `blog`.`pages` Set Title='".$title."' Poster='".$Poster."' Picture='".$picture.."' Text='".$text."' where id='".$id."'" ;

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
	print 'Failed: Incorrect Password';
}	
?>