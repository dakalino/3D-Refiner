<?php
	//DB connection info data
	//hosted on Namecheap.com through 3dprintsexpress.com
	$hosting = "localhost";
	$user = "cdprumeo_david";
	$pass = "Shibata7564";
	$db = "cdprumeo_kickstarter";

	//Connect to DB
	$conn = mysql_connect($hosting, $user, $pass);
	
	/*if ($conn)
		{
		echo "Connected to DB. <br><br>";
		}
	else
		{
		echo "Connection to DB failed. <br><br>";
		die('Could not connect: ' . mysql_error());
	}*/
	
	//DB selection
	mysql_select_db($db, $conn) or die(mysql_error()); 
	//echo "DB selection OK.<br><br>";
?>