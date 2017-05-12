<?php 
session_start();
if(isset($_SESSION['username'],$_SESSION['login_string'],$_SESSION['accountype'],$_GET['activate']))
{
	require('sqlconnect.php');
	$user=$_GET['activate'];
	$q="UPDATE register SET active='0' WHERE userid='$user'";
	$r=@mysqli_query($dbc,$q);
	$t="UPDATE loginstaus SET notimes='0' WHERE userid='$user'";
	$y=@mysqli_query($dbc,$t);
	echo"<br><br><h1 align=center>User account has been activated";
	mysqli_close($dbc);
	
}
else if(isset($_SESSION['username'],$_SESSION['login_string'],$_SESSION['accountype'],$_GET['deactivate']))
{
	require('sqlconnect.php');
	$user=$_GET['deactivate'];
	$q="UPDATE register SET active='1' WHERE userid='$user'";
	$r=@mysqli_query($dbc,$q);
	$t="UPDATE loginstaus SET notimes='3' WHERE userid='$user'";
	$y=@mysqli_query($dbc,$t);
	echo"<br><br><h1 align=center>User account has been deactivated";
	mysqli_close($dbc);
}
else
{
	echo "<h4>Access Denied"; 
}
