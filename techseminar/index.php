<?php require('sqlconnect.php'); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Upload/Download Seminars</title>
<link href="body.css" rel="stylesheet" type="text/css">
<link href="jquery.Jcrop.min.css" type="text/css">
</head>
<!---------------Body ----------->
<body>
<div id="inner_body">
  <header>
    <?php include('header.php');?>
  </header>
  <section>
    <input type="hidden" id="seminar_subject" value="csea" />
    <div class="div_content">
      <?php
if(isset($_SESSION['username'],$_SESSION['login_string'],$_SESSION['accountype']))
{
			echo showUsers($dbc);
}
else if(isset($_SESSION['username'],$_SESSION['login_string']))
{
			 echo showOptionlist('csea');
		 	echo seminarTopics('csea',$dbc);
  }
		else
		{
			echo showseminartopics('csea',$dbc);
		}?>
    </div>
  </section>
  <footer>
    <?php include('footer.php');?>
  </footer>
  <!------Hidden divs------------->
  <div id="view_div" class="subdivblanket"></div>
  <!----------------Upload------->
  <div id="upload_div" class="subdivblanket">
    <div class="close_login"></div>
    <h2>Upload File</h2>
    <hr id="line">
    <form id="uploadseminar" action="" method="post" enctype="multipart/form-data">
      <p>
        <input type="file" name="file" id="file" required />
      </p>
      <p>
        <input type="hidden" name="sem_subject" id="sem_subject" />
      </p>
      <p>
        <input type="hidden" name="pass_pattern" id="pass_pattern"/>
      </p>
      <p><strong>Select a option to choose a Graphical password</strong><br/>
        <br/>
        <select required id="upload_imagepass" name="upload_imagepass">
          <option value=""></option>
          <option value="pattern1">Circle Image Password</option>
          <option value="pattern2">Numerical graphical password</option>
          <option value="pattern3">Grid based Image Password</option>
        </select>
      <div id="upattern1" class="password_patterns">
        <input type="hidden" id="unextvalue" />
        <input type="hidden" id="upreviousvalue" />
        <input type="hidden" id="ucurrentvalue" />
        <p><strong>Draw a circle on any part of the image given below . Remember the area where you have drawn the circle on the image.</strong></p>
        <p><strong>Note :- While downloading the file please draw a small circle within the part you had selected while uploading the file</strong></p>
        <img src="images/pat5.jpg" id="uimage_pattern1" alt="Select four points in the image as your graphical password" />
        <p>
          <input type="hidden" required   class="selcoordinates" id="x1" name="x1" />
          </label>
          <input type="hidden" required class="selcoordinates" size="4" id="y1" name="y1" />
          </label>
          <input type="hidden" required class="selcoordinates"  id="x2" name="x2" />
          </label>
          <input type="hidden" required class="selcoordinates" id="y2" name="y2" />
          </label>
          <input type="hidden" required class="selcoordinates" id="w" name="w" />
          </label>
          <input type="hidden" required class="selcoordinates" id="h" name="h" />
          </label>
        </p>
        <?php /*<p class="coordinates" id="ucoordinate1"><label>First set Of Coordinates :- </label> <input type="text" class="selcoordinates"   readonly id="uselleft1"  size="5" />&nbsp;&nbsp;<input type="text" readonly class="selcoordinates"    id="useltop1" size="5" /> </p>
  <p class="coordinates" id="ucoordinate2"><label>Second set Of Coordinates :- </label> <input type="text" class="selcoordinates"   readonly id="uselleft2"  size="5" />&nbsp;&nbsp;<input type="text" readonly class="selcoordinates"    id="useltop2" size="5" /></p>
   <p class="coordinates" id="ucoordinate3"><label>Third set Of Coordinates :- </label> <input type="text" class="selcoordinates"   readonly id="uselleft3"  size="5" />&nbsp;&nbsp;<input type="text" readonly class="selcoordinates"    id="useltop3" size="5" /></p>
    <p class="coordinates" id="ucoordinate4"><label>Fourth set Of Coordinates :- </label> <input type="text" class="selcoordinates"   readonly id="uselleft4"  size="5" />&nbsp;&nbsp;<input type="text" readonly class="selcoordinates"    id="useltop4" size="5" /></p>
    
    <p><button id="unextbutton" class="tsbut">Next Coordinate </button>&nbsp;&nbsp;&nbsp;&nbsp;<button class="tsbut"  id="upreviousbutton">Previous Coordinate</button></p> */?>
      </div>
      <div id="upattern2" class="password_patterns">
        <div id="password" class="numpass1"><ul></ul></div>
        <p><strong>Click on the numerical keypad below to generate a exact 8-length numerical graphical password</strong></p>
        <div id="pass" class="numpass">
          <ul>
            <li><img  src="images/orange-number-1-filled-48.png"  /></li>
            <li><img src="images/orange-number-2-filled-48.png"  /></li>
            <li><img src="images/orange-number-3-filled-48.png"  /></li>
            <br/>
            <li><img src="images/orange-number-4-filled-48.png"  /></li>
            <li><img src="images/orange-number-5-filled-48.png"  /></li>
            <li><img src="images/orange-number-6-filled-48.png"  /></li>
            <br/>
            <li><img src="images/orange-number-7-filled-48.png"  /></li>
            <li><img src="images/orange-number-8-filled-48.png"  /></li>
            <li><img src="images/orange-number-9-filled-48.png"  /></li>
          </ul>
        </div>
      </div>
      <div id="upattern3" class="password_patterns">
        <p><strong style="text-transform:none">Click on the cells in the grid image to generate a exact 8-length  graphical password.<br>
          Please do remember the order in which you are selecting the cells</strong></p>
        <div id="drawTable" style="background:url(images/pat2.jpg);width:800px; height:400px"></div>
      </div>
      <p id="uploadsubmit">
        <input type="submit" value="Upload" class="submit" />
      </p>
    </form>
    <h4 id='loading' >Uploading.. Please Wait</h4>
  </div>
  
  <!--------Download --------------------->
  <div id="download_div" class="subdivblanket">
    <div class="close_login"></div>
    <h2>Download File</h2>
    <hr id="line">
    <p><strong>File Name :-<span id="filename"></span> </strong></p>
    <form id="downloadseminar" action="" method="post" enctype="multipart/form-data">
      <p><strong>Choose the Graphical Pattern and Password</strong><br/>
        <br/>
        <select required id="download_imagepass" name="download_imagepass">
          <option value=""></option>
          <option value="pattern1">Circle Image Password</option>
          <option value="pattern2">Numerical Graphical password</option>
          <option value="pattern3">Grid based Image Password</option>
        </select>
      <p>
        <input type="hidden" id="fileid" name="fileid" />
      </p>
      <p>
        <input type="hidden" name="down_pattern" id="down_pattern"/>
      <div id="dpattern1" class="password_patterns">
        <input type="hidden" id="dnextvalue" />
        <input type="hidden" id="dpreviousvalue" />
        <input type="hidden" id="dcurrentvalue" />
        <img src="images/pat5.jpg" id="dimage_pattern1" alt="Select four points in the image as your graphical password" height="400" width="800"/>
        <?php ?>
      </div>
      <div id="dpattern2" class="password_patterns">
        <div id="password" class="numpass1"><ul></ul></div>
        <p><strong>Click on the numerical keypad below to generate a exact 8-length numerical graphical password</strong></p>
        <div id="pass" class="numpass">
          <ul>
            <li><img  src="images/orange-number-1-filled-48.png"  /></li>
            <li><img src="images/orange-number-2-filled-48.png"  /></li>
            <li><img src="images/orange-number-3-filled-48.png"  /></li>
            <br/>
            <li><img src="images/orange-number-4-filled-48.png"  /></li>
            <li><img src="images/orange-number-5-filled-48.png"  /></li>
            <li><img src="images/orange-number-6-filled-48.png"  /></li>
            <br/>
            <li><img src="images/orange-number-7-filled-48.png"  /></li>
            <li><img src="images/orange-number-8-filled-48.png"  /></li>
            <li><img src="images/orange-number-9-filled-48.png"  /></li>
          </ul>
        </div>
      </div>
      <div id="dpattern3" class="password_patterns">
        <div id="downdrawTable" style="background:url(images/pat2.jpg);width:800px; height:400px"></div>
      </div>
      <p id="download_submit">
        <input type="submit" value="Check Credentials" id="checkdownload" class="submit" />
      </p>
    </form>
    <h4 id='loading' >Downloading.. Please Wait</h4>
    <span id="downloadhref" ></span>
  </div>
</div>
</body>
<?php
function showOptionlist($subject){
	echo "<div class=option_list>";
  	echo "<ul>";
	echo "<li>";
	echo "<select class=seminaroptions id=".$subject."_seminaroptions >";
	echo "<option value=null>Select a option</option>";
    echo "<option value=mine>Show only my files</option>";
    echo "<option value=others>Show other files</option>";
    echo "<option selected  value=all>Show all files</option>";
    echo "</select>";
	echo "</li>";
    echo "<li>";
	echo "<button class=upload_seminar>Upload </button>";
	echo "</li>";
	echo "</ul>";
    echo "</div>";
	echo "<br>";
	echo "<div class=login_seminartopics id=".$subject."_topicdiv>";
	echo "</div>";
}
function showUsers($dbc)
{
	$q="SELECT username,email,active,userid FROM register WHERE accountype!='1'";
	$r=@mysqli_query($dbc,$q);
	if(@mysqli_num_rows($r) > 0)
	{
		echo "<h2>Registered Users</h2>";
		echo "<table id=usertable>";
		echo "<tr><th>Sl No</th><th>Username</th><th>Email</th><th>Account Status</th><th>Seminars Added</th></tr>";
		$i=1;
		while($row_fetch=@mysqli_fetch_array($r))
		{
			echo "<tr><td>".$i++."</td><td>".$row_fetch[0]."</td><td>".$row_fetch[1]."</td>";
			if($row_fetch[2] == '0')
			{
				echo "<td>Active&nbsp;<a href=loginstatus.php?deactivate=".$row_fetch[3].">Deactivate</a></td>";
			}
			else
			{
				echo "<td>Blocked&nbsp;<a href=loginstatus.php?activate=".$row_fetch[3].">Activate</a></td>";
				
			}
			echo "<td>";
			$a="SELECT count(uploadid) FROM fileupload WHERE userid='$row_fetch[3]'";
			$b=@mysqli_query($dbc,$a);
			if(@mysqli_num_rows($b) > 0)
			{
				$row_load=@mysqli_fetch_array($b);
				echo $row_load[0]."&nbsp;Seminar added";
				
					
			}
			else
			{
				echo "No seminar added";
			}
			echo "</td></tr>";
			
		}
		echo "</table>";
			
		
	}
	else
	{
		echo '<H3 align=center>No users have registered yet</h3>'; 
	}
	@mysqli_close($dbc);
}
function seminarTopics($subject,$dbc)
{
	
		$q="SELECT uploadid,filename from uploaddetails WHERE subject='$subject' ORDER BY filename";
		$r=@mysqli_query($dbc,$q);
		if(@mysqli_num_rows($r) > 0)
		{
			echo "<h3 id=seminarheader>Files Uploaded<hr/></h3>";
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
					$seminar=$row_fetch[1];//pathinfo($row_fetch[1],PATHINFO_FILENAME);
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
		
	
	@mysqli_close($dbc);
}

function showseminartopics($subject,$dbc)
{
	
	$t="SELECT `uploadid`, `filename` FROM `uploaddetails` WHERE subject='$subject' ORDER BY filename";
	$y=@mysqli_query($dbc,$t);
	if(@mysqli_num_rows($y) >0)
	{
		
		echo "<h3 id=seminarheader>Files Uploaded<hr/></h3>";
			echo "<div id=seminarSel>";
		$currentLetter=null;
		while($row_fetch=@mysqli_fetch_array($y))
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
				$seminar=$row_fetch[1];//pathinfo($row_fetch[1],PATHINFO_FILENAME);
				$seminar=ucwords(strtolower($seminar));
				
				echo "<span class=nologseminar_click >";  echo $seminar;  echo "</span>";
			}
			echo "<br>";
		
		}
		echo "</div>";
	}
	else
	{
		echo "<h3 align=center>No files have been uploaded</h3>";
	}
	
	@mysqli_close($dbc);
}

?>
<script src="respond.min.js"></script>
<script src="jquery-2.1.0.min.js"></script>
<script src="jquery.Jcrop.min.js"></script>
<script src="jquery.color.js"></script>
<script src="body.js"></script>
</html>
