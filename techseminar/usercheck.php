<?php
if(isset($_POST['username']))
{
	require('phpfunctions.php');
	$username=sanitize($_POST['username']);
	require('sqlconnect.php');
	$q="select username from register where username='$username'";
	$r=@mysqli_query($dbc,$q);
	if(@mysqli_num_rows($r) == 0)
	{
		echo 'VALID';
	}
	else
	{
		echo 'INVALID';
	}
	mysqli_close($dbc);
}
else
{
	echo 'Invalid form submission'; 
}