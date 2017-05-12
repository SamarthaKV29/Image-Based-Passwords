<?php define ('DB_USER','root');
define ('DB_PASSWORD','');
define ('DB_HOST','localhost');
define ('DB_NAME','techseminar');
define("SECURE", FALSE);    // FOR DEVELOPMENT ONLY!!!!
$dbc = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) OR 
die('could not connect to mysql:'.mysqli_connect_error());
?>
