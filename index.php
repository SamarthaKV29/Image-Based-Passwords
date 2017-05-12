<!DOCTYPE html>

<html>
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type">

	<title>Flow</title>
	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700' rel='stylesheet' type='text/css'>
	<link href="css/jquery-ui.css" rel="stylesheet" type="text/css">
	<link href="css/slider.css" rel="stylesheet" type="text/css">

</head>

<body>
	<header>
		<?php require("header.php"); ?>
    <div class="hidden">
			<?php require("basicDemo.php"); ?>
		</div>

	</header>


	<div id="outer">
		<div class="Mainsection" id="main">
			<p class="pre-heading">Based on Captcha as Graphic Passwords IEEE&nbsp;Paper</p>


			<h1 class="main-heading">Image Based Password Authentication</h1>


			<p class="main-subtitle">A new secuity primitive based on&nbsp;hard AI&nbsp;problems</p>
		</div>


		<div class="section" id="basic">
		<h1 class="side-heading">Basic Image Password</h1>


		<p class="side-subtitle">This is a basic type of Image based passwords which is derived from <strong>CaRP</strong> which is a combination of both an Image and a password. Nowadays, this is becoming obsolete. Here we can see that the user selects a specified number of images as a password, which will be used while logging in.</p>
		<img alt="Image Passwords" class="side-image" height="480" src="IMG/g.png" width="600">
		</div>


		<div class="section" id="circle">
		<h1 class="side-heading">Circle Selections</h1>


		<p class="side-subtitle">In this type, we use Jcrop to have the user select a circle on an image, while uploading the file. Later, while downloading, the user selects a smaller circle inside the previous selected area to authenticate.</p>
		<img alt="Image Passwords" class="side-image" height="300" src="IMG/Cupld.png" style="margin-left:50px;" width="400"> <img alt="Image Passwords" class="side-image" height="300" src="IMG/Cdwnld.png" width="400"></div>


		<div class="section" id="numeric">
		<h1 class="side-heading">Number pattern</h1>


		<p class="side-subtitle">In this type, we use number buttons to input the password.</p>
		<img alt="Image Passwords" class="side-image" height="300" src="IMG/Cupld.png" style="margin-left:50px;" width="400"> <img alt="Image Passwords" class="side-image" height="300" src="IMG/Cdwnld.png" width="400"></div>


		<div class="section" id="grid">
		<h1 class="side-heading">Grid Image Password</h1>


		<p class="side-subtitle">In this type, we plot a grid over an image where the user has to select a pattern of grid cells while uploading. Later, he must use the same pattern on the grid to access the file uploaded.</p>
		<img alt="Image Passwords" class="side-image" height="300" src="img/gridimg.png" width="400">
		</div>
	</div>


	<footer>
		<?php require("footer.php");?>
	</footer>
  <script src="js/jquery.min.js" type="text/javascript">
	</script>
	<script src="js/jquery-2.1.3.js" type="text/javascript">
	</script>
	<script src="js/jquery-ui.js" type="text/javascript">
	</script>
	<script src="js/jcanvas.min.js" type="text/javascript">
	</script>
	<script src="js/jquery.ui.draggable.snap2.js" type="text/javascript">
	</script>
	<script src="js/test.js" type="text/javascript">
	</script>
</body>
</html>
