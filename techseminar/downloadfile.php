<?php
if(isset($_POST['fileid'],$_POST['down_pattern']))
{
	$fileid=$_POST['fileid'];
	$pass=$_POST['down_pattern'];
	$selpattern=$_POST['download_imagepass'];
	require('sqlconnect.php');
	
	if($selpattern == 'pattern1')
	{
		$q="SELECT filename,password FROM uploaddetails WHERE patternoption='$selpattern' and uploadid='$fileid'";
		$r=@mysqli_query($dbc,$q);
		if(@mysqli_num_rows($r) == 1)
		{
			$row=@mysqli_fetch_array($r);
			$scoor=explode(",",$row[1]);
			$gcoor=explode(",",$pass);
			if($gcoor[0] >= $scoor[0] && $gcoor[2] <= $scoor[2] &&  $gcoor[1] >= $scoor[1] && $gcoor[3] <= $scoor[3])
			{
			echo "Credentials have succeeded.Please click the link to download the file <a href=download.php?download_file=".$row[0].">".$row[0]."</a>";
			@mysqli_close($dbc);
			}
			else
			{
				echo '0';
				@mysqli_close($dbc);
				
			}
		}
		else
		{
				echo '0';
				@mysqli_close($dbc);
		}
	}
	else
	{
		$q="SELECT filename FROM uploaddetails WHERE patternoption='$selpattern' and uploadid='$fileid' and password='$pass'";
		$r=@mysqli_query($dbc,$q);
		if(@mysqli_num_rows($r) == 1)
		{
			$row=@mysqli_fetch_array($r);
			echo "Credentials have succeeded.Please click the link to download the file <a href=download.php?download_file=".$row[0].">".$row[0]."</a>";
			@mysqli_close($dbc);
	
		}
		else
		{
			echo '0';
			@mysqli_close($dbc);
		}
	}
		
}
else
{
	echo'Invalid form submission';
}
