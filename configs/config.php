<?php

	$host		=	"localhost"; 			// Host name
	$username	=	"root"; 		// Mysql username
	$password	=	""; 				// Mysql password
	$db_name	=	"deshicar"; 	// Database name

	$site_url	=	"https://localhost/deshicar";
	$site_nick	=	"DeshiCar.com";
	$site_sms 	= 	"01711626539";
	$sms_sender_number = "8809610991236";


// Connect to the database server and select databse.
	$con = mysqli_connect("$host", "$username", "$password","$db_name");
	
	if (mysqli_connect_errno())
	{
	  die ("Failed to connect to MySQL: " . mysqli_connect_error());
	}
mysqli_query($con,"SET CHARACTER SET utf8mb4");
mysqli_query($con,"SET SESSION collation_connection ='utf8mb4_general_ci'");
/*mysqli_query($con,"SET CHARACTER SET utf8");
mysqli_query($con,"SET SESSION collation_connection ='utf8_general_ci'");*/

?>