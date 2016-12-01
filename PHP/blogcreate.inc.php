<?php
if ($_POST["password"] = "secretpassword")
{
	if ( isset($_POST["text"]))
	    {
		include_once 'db_connect.php';

		// Sanitize and validate the data passed in
		 $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);	
		 $title = str_replace("'","`",$title);
		 $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
		 $private = filter_input(INPUT_POST, 'private', FILTER_SANITIZE_NUMBER_INT);
		 $Poster = filter_input(INPUT_POST, 'poster', FILTER_SANITIZE_STRING);
		 $text = str_replace("'","`",$_POST["text"]);
		 $video = filter_input(INPUT_POST, 'video', FILTER_SANITIZE_STRING);
		 
		print $type;

			//IMAGE UPLOADING HERE
				
			
								$target_dir = "../images/".$type."/";
								$uploadOk = 1;
								$target_file = $target_dir . basename($_FILES["photo"]["name"]);
								$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
								
						// Check if image file is a actual image or fake image
						if(isset($_POST["submit"])) {
									$check = getimagesize($_FILES["photo"]["tmp_name"]);
									if($check !== false) {
										echo "File is an image - " . $check["mime"] . ".";
										$uploadOk = 1;
									} else {
										echo "File is not an image.";
										$uploadOk = 0;
									}
								
								// Check if file already exists
								if (file_exists($target_file)) {
									echo "Sorry, file already exists.";
									$uploadOk = 0;
								}
								// Check file size
								if ($_FILES["photo"]["size"] > 5000000) {
									echo "Sorry, your file is too large.";
									$uploadOk = 0;
								}
								
								if ($type == 'pictures'){
								// Allow certain file formats
								if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
								&& $imageFileType != "gif" ) {
								echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed in the pictures screen.";
								$uploadOk = 0;
								}}
								
								
								// Check if $uploadOk is set to 0 by an error
								if ($uploadOk == 0) {
									echo "Sorry, your file was not uploaded.";
								// if everything is ok, try to upload file
								} else {
									if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
										echo "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.";
									} else {
										echo "Sorry, there was an error uploading your file.";
									}
								}
						}	
			//END FILE UPLOAD	
	
		
		if ( $type != "videos")	{
			//then we run the SQL
			//19 characters before picture name
			$query = "INSERT INTO `blog`.`".$type."` ( `Title`, `Poster`, `Picture`, `Text`, `Date`, `Views`, `Private`) VALUES ('". $title." ', '".$Poster."' , '".substr($target_file,19)."','".$text."', CURRENT_TIMESTAMP, 0,'".$private."');";
		}else{
				$query = "INSERT INTO `blog`.`".$type."` ( `Title`, `Poster`, `Picture`, `Text`, `Date`, `Views`, `Private`,`youtube_id`) VALUES ('". $title." ', '".$Poster."' , '".substr($target_file,19)."','".$text."', CURRENT_TIMESTAMP, 0,'".$private."','".$video."');";
			}				
		if(mysqli_query($mysqli, $query)){
			echo "Records added successfully.";
			header('Location: #');
		}else{
			 echo "Unable to execute sql, Error:. " . mysqli_error($mysqli);
		}

	}else{
		print 'Failed: No Text';
		}

}else{
	print 'Failed: Incorrect Password';
}	
?>