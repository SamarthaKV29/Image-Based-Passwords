<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Flow</title>

<link href="demos.css" rel="stylesheet" type="text/css"/>

</head>

<body>
<div id="divLock">
<div class="blanket">
	<div class="lock">
  	<center><label>Select any 4 images to UNLOCK-></label></center>
    <div class="imageholder"><?php

		function printIMG(){
			$loc = rand(0, 3);
			$imgArr = array();
			$imgloc = array("/lock1/", "/lock2/", "/lock3/", "/lock4/");
		//Directory Selector
			$handle = opendir(dirname("./").$imgloc[$loc]);
			$path = dirname("./").$imgloc[$loc];
			//echo $path;
			$i=1;
			while($file = readdir($handle)){
			if($file != "." && $file != ".." && strstr($file, ".png") || strstr($file, ".jpg")){
				$imgArr[$i] = "<div class='regImgs'><img id='pic".$i."' src='".$path.$file."' width='75px' height='75px' /></div>";
				echo $imgArr[$i++];

				}
			}

		}
		printIMG();
    	?>
    </div>
  </div>
</div>
</div>
<script src="jquery.min.js" type="text/javascript"></script>
<script src="jquery-2.1.3.js" type="text/javascript"></script>
<script type="text/javascript" src="jquery-ui.js"></script>
<script src="jcanvas.min.js" type="text/javascript"></script>
<script src="basicDemo.js" type="text/javascript"></script>
</body>
</html>
