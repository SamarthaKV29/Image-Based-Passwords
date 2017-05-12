<!DOCTYPE html>

<html>
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type">

	<title>Flow</title>
	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700' rel='stylesheet' type='text/css'>
	<link href="css/jquery-ui.css" rel="stylesheet" type="text/css">
	<link href="css/demos.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div class='blanket'>
	</div>


	<center>
		<div id="inner">
			<div id="divlogin">
				<a class="tab1" id="login">CHECK</a>

				<div class="container">
					<label>Select 4 images -&gt;</label>

					<div class="imageholder">
						<?php
						        function printIMG(){
						            $imgArr = array();
						        //Directory Selector
						            $handle = opendir(dirname("./").'/one/');
						            $path = dirname("./").'/one/';
						            $i=1;
						            while($file = readdir($handle)){
						            if($file != "." && $file != ".." && strstr($file, ".png") || strstr($file, ".jpg")){
						                $imgArr[$i] =
						                "<div class='regImgs'><img id='pic".$i."' src='./one/".$file."' width='75px' height='75px'  />
						                <canvas id='pic".$i++."' class='imgMask'></canvas></div>";
						                echo $imgArr[$i];
						                }
						            }
						        }
						        printIMG();
						        ?>
					</div>
				</div>
			</div>


			<div style="clear:both;">
			</div>
		</div>
		<script src="js/jquery.min.js" type="text/javascript">
		</script>
		<script src="js/jquery-2.1.3.js" type="text/javascript">
		</script>
		<script src="js/jquery-ui.js" type="text/javascript">
		</script>
		<script src="js/jcanvas.min.js" type="text/javascript">
		</script>
		<script src="js/basicDemo.js" type="text/javascript">
		</script>
	</center>
</body>
</html>
