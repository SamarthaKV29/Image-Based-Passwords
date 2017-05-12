<?php

if(isset($_POST['username'],$_POST['password'],$_POST['email']) )
{
	require('phpfunctions.php');
	$username=sanitize($_POST['username']);
	$password=sanitize($_POST['password']);
	$email=sanitize($_POST['email']);
	$gp=$_POST['gp'];
	
	require('sqlconnect.php');
	$q="INSERT INTO `register`(`username`, `password`, `email`, `gpassword`) VALUES ('$username','$password','$email','$gp')";
	$r=@mysqli_query($dbc,$q);
	if($r)
	{
		$_SESSION['userid']=mysqli_insert_id($dbc);
			$userid=$_SESSION['userid'];
			$a="INSERT INTO `loginstaus`(`userid`) VALUES ('$userid')";
			$b=@mysqli_query($dbc,$a);
			if($b)
			{
				echo 'Sign up Successful';
				mysqli_close($dbc);
			}
	}
	else
	{
		echo 'Sign up failed';
		mysqli_close($dbc);
	}
}
else
{
	echo 'Invalid Form submission';
}