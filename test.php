<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="jquery-ui.css" rel="stylesheet" type="text/css"/>
<link href="slider.css" rel="stylesheet" type="text/css" />
<title>Test</title>
</head>
<body >
<div id="outer">
<center><strong><h1>Slider Image Password </h1></strong></center>
<?php 
	header('Content-Type: text/html');
	$i = 1;
	$handle = opendir(dirname(realpath(__FILE__)).'/otherIMG/');
	$path = dirname(realpath(__FILE__)).'/otherIMG/';
	echo "<div id='sliderH'>";
	echo "<table class='slider' id='slider' border='0'><tr>";
	$noF = 0;
	while($file = readdir($handle))if($file != "." && $file != ".." && strstr($file, ".png") || strstr($file, ".jpg")){
			$noF++;
			$imgArr[$i] = "<td>
			<div  class=\"insideWrapper\" >
				<img id='pic".$i."' class='non' src='/otherIMG/".$file."' border='0' width=\"128\" height=\"128\"/>
				<canvas id='pic".$i."' class=\"imgMask\" width=\"128\" height=\"128\"></canvas>
			</div>
			</td>";
			$i++;
			} 
	
	for($i=1; $i < count($imgArr); $i++){
		echo $imgArr[$i];
	}
	
	
	echo "</tr></table><div class=\"spacer\" style=\"clear: both;\"></div>";
?>
<input class='btn submit' value='Check' type='button' onclick='checkP();'/>

</div>
</div>

<script src="jquery.min.js" type="text/javascript"></script>
<script src="jcanvas.min.js" type="text/javascript"></script>
<script type="text/javascript" src="jquery-ui.js"></script>
<script src="test.js" type="text/javascript"></script>
<script src="jquery.ui.draggable.snap2.js" type="text/javascript"></script>
</body>

</html>