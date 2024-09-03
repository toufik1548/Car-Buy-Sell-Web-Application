<?php
ob_start();
session_start();
define('APPPATH', dirname(__FILE__).'/');
include("configs/config.php"); 
include("configs/functions.php"); 
include("configs/router.php"); 


// Define $user_email and $user_password
$user_email		=		$_POST['user_email'];
$user_password	=		$_POST['user_password'];
$user_password	=		md5($user_password);


$sql = "SELECT * FROM `car_users` WHERE `user_email`='$user_email' AND `user_password`='$user_password' AND `status`='1'";

$result = mysqli_query($con,$sql) or trigger_error(mysqli_error($con));


// Mysql_num_row is counting table row
$count	=	mysqli_num_rows($result);
$rid	=	mysqli_fetch_assoc($result);


//If result matched $user_email and $user_password, table row must be 1 row
if($count==1){
	$user_id = $rid['user_id'];
	//user login log
	mysqli_query($con,"INSERT INTO `car_users_login_logs` (`log_id`, `user_id`) VALUES (NULL, $user_id)"); 

	//Register $user_email, $user_id and redirect to file "index.php"
	$_SESSION['sess_user_id'] = $user_id;
	//if(isset($_SESSION)) {echo "OK";}

	header("location:$site_url/dashboard/");
	}else{
	$_SESSION['login_error'] = "1";
	header("location:$site_url/login/");
	}

ob_end_flush();
?>