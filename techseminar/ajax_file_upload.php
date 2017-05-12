<?php
session_start();

if(isset($_FILES["file"]["type"]))
{
	
	//$validextensions = array("vnd.openxmlformats-officedocument.presentationml.presentation", "jpg", "png");
///$validextensions = array("vnd.openxmlformats-officedocument.presentationml.presentation");
$temporary = explode(".", $_FILES["file"]["name"]);
$file_extension = end($temporary);
//if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
//if ((($_FILES["file"]["type"] == "application/vnd.openxmlformats-officedocument.presentationml.presentation")
//) && ($_FILES["file"]["size"] < 10000000000)//Approx. 100kb files can be uploaded.
//&& in_array($file_extension, $validextensions)) {
//if ($_FILES["file"]["error"] > 0)
//{
//echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
//}

	if (file_exists("upload/" . $_FILES["file"]["name"]))
	 {
		echo $_FILES["file"]["name"] . " file already exists.";
	}
	else
	{
		$filename=$_FILES["file"]["name"];
		$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
		$targetPath = "upload/".$_FILES['file']['name']; // Target path where file is to be stored
		
		$subject=$_POST['sem_subject'];
		$patternsel=$_POST['upload_imagepass'];
		$patternpass=$_POST['pass_pattern'];
		$userid=$_SESSION['userid'];
		require('sqlconnect.php');
		$q="INSERT INTO `uploaddetails`(`filename`, `subject`, `patternoption`, `password`) VALUES ('$filename','$subject','$patternsel','$patternpass')";
		$r=@mysqli_query($dbc,$q);
		if($q)
		{
			$_SESSION['uploadid']=mysqli_insert_id($dbc);
			$uploadid=$_SESSION['uploadid'];
			$a="INSERT INTO `fileupload`(`uploadid`, `userid`) VALUES ('$uploadid','$userid')";
			$b=@mysqli_query($dbc,$a);
			if($b)
			
				move_uploaded_file($sourcePath,$targetPath) ;
			
			// Moving Uploaded file
			echo "Seminar Presentation Uploaded Successfully...!!";
			
		}
		else
		{
			echo 'File upload failed';
		}
		
	@mysqli_close($dbcc);
		
		
		
		 
	}

}

?>