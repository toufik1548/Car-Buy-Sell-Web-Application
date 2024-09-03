<?php

$user_ip 		=	getenv("REMOTE_ADDR");	// user ip
$timestamp		=	time();
$url			=	htmlentities($_SERVER['PHP_SELF']);	//file path

$timeoutseconds = 	300;	// Timeout Value in Seconds
$timeout		=	$timestamp-$timeoutseconds;

mysqli_query($con,"INSERT INTO `visitors` (`user_ip` ,`timestamp` ,`url`) VALUES ('$user_ip', '$timestamp' , '$url')");
mysqli_query($con,"DELETE FROM `visitors` WHERE timestamp<$timeout");


//Getiing online vistiors


$results	=	mysqli_query($con,"SELECT DISTINCT user_ip FROM visitors");

$online  	=	mysqli_num_rows($results);

if ($online>=0){echo " Now ".$online." visitors online";}

?>