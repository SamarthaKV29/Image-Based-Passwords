<?php
define ('DB_USER','root');
define ('DB_PASSWORD','');
define ('DB_HOST','localhost');
define ('DB_NAME','techseminar');
$dbc = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) OR die("Unfortunately we do not have access to the database on this server. Hence the demo will be terminated here. Click <a href='http://www.cs.uml.edu/~svenkatr/work/Image-Based-Passwords'>here</a> to return.");
?>
