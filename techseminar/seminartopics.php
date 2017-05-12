<?php 
if(isset($_POST['option'],$_POST['subject']))
{
	session_start();
	$option=$_POST['option'];
	$subject=$_POST['subject'];
	$userid=$_SESSION['userid'];
	
	if($option == 'mine')
	{
		require('sqlconnect.php');
		$q="SELECT uploadid,filename from uploaddetails WHERE subject='$subject' and uploadid in(select uploadid from  fileupload WHERE userid='$userid') ORDER BY filename ASC";
		$r=@mysqli_query($dbc,$q);
		if(@mysqli_num_rows($r) > 0)
		{
			echo "<h3 id=seminarheader>Seminar Topics <hr/></h3>";
			echo "<div id=seminarSel>";
			$currentLetter=null;
			while($row_fetch=@mysqli_fetch_array($r))
			{
				foreach(explode(",",$row_fetch[1]) as $list )
				{
				
					ucfirst($list);
					$firstletter=substr($list,0,1);
					
					if($firstletter!== $currentLetter)
					{
						echo "<br>".ucfirst($firstletter)."<br>--<br>";
						$currentLetter=$firstletter;
					}
					//$seminar=pathinfo($row_fetch[1],PATHINFO_FILENAME);
					$seminar=$row_fetch[1];
					$seminar=ucwords(strtolower($seminar));
				
					echo "<span class=loginlogseminar_click id='$row_fetch[0]'>";  echo $seminar;  echo "</span>";
				}
				echo "<br>";
			}
			echo "</div>";
		}
		else
		{
			echo '<h3 align="center">No seminar topics have been uploaded</h3>';
		}
		
	}
	else if($option == 'others')
	{
		require('sqlconnect.php');
		$q="SELECT uploadid,filename from uploaddetails WHERE subject='$subject' and uploadid in(select uploadid from  fileupload WHERE userid !='$userid') ORDER BY filename ASC	";
		$r=@mysqli_query($dbc,$q);
		if(@mysqli_num_rows($r) > 0)
		{
			echo "<h3 id=seminarheader>Seminar Topics<hr/></h3>";
			echo "<div id=seminarSel>";
			$currentLetter=null;
			while($row_fetch=@mysqli_fetch_array($r))
			{
				foreach(explode(",",$row_fetch[1]) as $list )
				{
				
					ucfirst($list);
					$firstletter=substr($list,0,1);
					
					if($firstletter!== $currentLetter)
					{
						echo "<br>".ucfirst($firstletter)."<br>--<br>";
						$currentLetter=$firstletter;
					}
					$seminar=pathinfo($row_fetch[1],PATHINFO_FILENAME);
					$seminar=ucwords(strtolower($seminar));
				
					echo "<span class=loginlogseminar_click id='$row_fetch[0]'>";  echo $seminar;  echo "</span>";
				}
				echo "<br>";
			}
			echo "</div>";
		}
		else
		{
			echo '<h3 align="center">No seminar topics have been uploaded</h3>';
		}
		
	}
	else
	{
		require('sqlconnect.php');
		$q="SELECT uploadid,filename from uploaddetails WHERE subject='$subject' ORDER BY filename ASC	";
		$r=@mysqli_query($dbc,$q);
		if(@mysqli_num_rows($r) > 0)
		{
			echo "<h3 id=seminarheader>Seminar Topics<hr/></h3>";
			echo "<div id=seminarSel>";
			$currentLetter=null;
			while($row_fetch=@mysqli_fetch_array($r))
			{
				foreach(explode(",",$row_fetch[1]) as $list )
				{
				
					ucfirst($list);
					$firstletter=substr($list,0,1);
					
					if($firstletter!== $currentLetter)
					{
						echo "<br>".ucfirst($firstletter)."<br>--<br>";
						$currentLetter=$firstletter;
					}
					$seminar=pathinfo($row_fetch[1],PATHINFO_FILENAME);
					$seminar=ucwords(strtolower($seminar));
				
					echo "<span class=loginlogseminar_click id='$row_fetch[0]'>";  echo $seminar;  echo "</span>";
				}
				echo "<br>";
			}
			echo "</div>";
		}
		else
		{
			echo '<h3 align="center">No seminar topics have been uploaded</h3>';
		}
	}
	
	
}
else
{
	echo 'Invalid Form Submission';
	
}