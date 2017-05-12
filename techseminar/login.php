<?php 
if(isset($_POST['username'],$_POST['password'],$_POST['gp']) )
{
	require('phpfunctions.php');
	$username=sanitize($_POST['username']);
	$password=sanitize($_POST['password']);
	$gp=$_POST['gp'];
	require('sqlconnect.php');
	session_start();
	$tm="SELECT userid from register WHERE username='$username' LIMIT 1";
	$mt=@mysqli_query($dbc,$tm);
	if(@mysqli_num_rows($mt) == 1)
	{
		$row_user=@mysqli_fetch_array($mt);
		$ty="SELECT notimes from loginstaus WHERE userid='$row_user[0]' LIMIT 1";
		$yt=@mysqli_query($dbc,$ty);
		$row_login=@mysqli_fetch_array($yt);
		if($row_login[0] < '3')
		{
			$stmt=$dbc->prepare("SELECT username,userid,accountype from register WHERE username=? and password=? and gpassword=? LIMIT 1");
			$stmt->bind_param('sss',$username,$password,$gp);// Bind "$username $password $gp" to parameter.
			$stmt->execute();    				// Execute the prepared query.
			$stmt->store_result(); // get variables from result.
			$stmt->bind_result($user,$userid,$accounttype);
			$stmt->fetch();
			if ($stmt->num_rows == 1)
			{
				$user_browser = $_SERVER['HTTP_USER_AGENT'];// XSS protection as we might print this value
            	$username = preg_replace("/[^a-zA-Z0-9_\-]+/", "",  $user);
            	$_SESSION['username'] = $username;
				$_SESSION['userid']=$userid;
				$_SESSION['login_string'] = hash('sha512',$password . $user_browser);
				if($accounttype == '1')
				{
					$_SESSION['accountype']=$accounttype;
				}
				else
				{
				}
				$l="UPDATE loginstaus SET notimes='0' WHERE userid='$userid'";
				$m=@mysqli_query($dbc,$l); 
				echo 'VALID';
			}
			else
			{
				$x="SELECT notimes FROM loginstaus WHERE userid='$row_user[0]'";
				$y=@mysqli_query($dbc,$x);
				$row_update=@mysqli_fetch_array($y);
				$logintimes=$row_update[0];
				$logintimes++;
				if($logintimes == '3')
				{
					$l="UPDATE loginstaus SET notimes='$logintimes' WHERE userid='$row_user[0]'";
					$m=@mysqli_query($dbc,$l);
					$kl="UPDATE register SET active ='1' WHERE userid='$row_user[0]'";
					$lk=@mysqli_query($dbc,$kl);
				}
				else
				{
					$l="UPDATE loginstaus SET notimes='$logintimes' WHERE userid='$row_user[0]'";
					$m=@mysqli_query($dbc,$l);
				}
				echo 'INVALID';
			}
		}
		else
		{
			echo 'BLOCKED';
		}
	}
	else
	{
			echo "USERINVALID";
	}
}
else
{
	echo 'Invalid Form submission';
}