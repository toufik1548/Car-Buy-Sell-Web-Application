<?php
ob_start();
session_start();
define('APPPATH', dirname(__FILE__).'/');
include("configs/config.php");
include("configs/functions.php");


if(isset($_POST['action'])&&$_POST['action']=="Submit")
{

	//FOR USER TABLE
	$user_email = addslashes($_POST['user_email']);
	$user_password = $_POST['user_password'];
	$user_password_md5 = md5($_POST['user_password']);
	$add_date=date('Y-m-d');

	//FOR PERSON TABLE
	$person_name = addslashes($_POST['person_name']);
  $user_name = $person_name;
	$person_address = addslashes($_POST['person_address']);
  $user_address = $person_address;
	$location_id=$_POST["location_id"];
	$person_phone = addslashes(trim($_POST['person_phone']));
  $user_mobile = $person_phone;
	$update_date=date('Y-m-d');



//Display error msg

  $err=array();

  //REQUIRED ERROR FOR USER TABLE
  if($user_email=='')
    { $err[]="<font color='red'>*** Please enter your <b>Email</b>.</font>";}
  if($user_password=='')
    { $err[]="<font color='red'>*** Please enter your <b>Password</b>.</font>";}

  //REQUIRED ERROR FOR PERSON TABLE
  if($person_name=='')
    { $err[]="<font color='red'>*** Please enter your <b>Name</b>.</font>";}
  if($person_address=='')
    { $err[]="<font color='red'>*** Please enter your <b>Address</b>.</font>";}
  if($location_id==0)
    { $err[]="<font color='red'>*** Please select your <b>Location</b>.</font>";}
  
  if($person_phone=='')
    { $err[]="<font color='red'>*** Please enter your <b>Mobile Number</b>.</font>";}
if(strlen($person_phone)<11) 
  	{ $err[]="<font color='red'>*** Mobile number should be 11 Digit.</font>";}

  if( substr($person_phone, 0, 1) !=0   || substr($person_phone, 0, 1) =="+" || substr($person_phone, 0, 1) =="8")

  		{ $err[]="<font color='red'>*** Mobile number should be Start With <b> 0 </b>.</font>";}
 


  $n= count($err);


if($n>0)
  {
  echo "<div class=err_msg><ol>";

  for($i=0;$i<$n;$i++)
      { echo "".$err[$i]."<br>"; }
  echo "</ol></div>";

  }
else
  {

//getting records if user already exist 
$old = get_total("car_users","user_id","WHERE user_email='$user_email'");
$old = get_total("car_persons","user_id","WHERE person_phone='$person_phone'");
if($old==1){
$_SESSION['sess_old'] = 1;
header("location: $site_url/signup/");
exit();
}


if($old==1){
$_SESSION['sess_mobile'] = 1;
header("location: $site_url/signup/");
exit();
}

//echo $old;
//if($old==1){
//echo "<font color='red'><b>You have already an account!</b></font> <a href='$site_url/login/'><b>Click here to Login your account.</b></a><br><br>";
//}

//if no old records found
if($old==0){
$new=mysqli_query($con,"INSERT INTO `car_users` (
	`user_id`, 
  `user_name`, 
  `user_address`, 
  `location_id`, 
  `user_mobile`, 
	`user_email`, 
	`user_password`, 
	`add_date`, 
	`status`) 

VALUES (
	NULL, 
  '$user_name', 
  '$user_address', 
  '$location_id', 
  '$user_mobile', 
	'$user_email', 
	'$user_password_md5', 
	'$add_date', 
	'1');") or die(mysqli_error());


if ($new){

//TO GET USER ID
$user_id = mysqli_insert_id($con); 

//QUERY FOR PAYMENTS
mysqli_query($con, 
  "INSERT INTO `car_persons` (
  	`person_id`, 
  	`user_id`, 
  	`person_name`, 
  	`person_address`, 
  	`location_id`, 
  	`person_phone`, 
  	`update_date`) 

VALUES (
	NULL, 
	'$user_id', 
	'$person_name', 
	'$person_address', 
	'$location_id', 
	'$person_phone', 
	'$update_date');");


$to      = $user_email; // Send email to our user
$subject = 'Successfully Signup | Deshicar.com'; // Give the email a subject 
$message = "
<pre>
Dear $person_name,

Thanks for signing up at Deshicar.com!

Your account has been created, you can login with the following credentials. 

 
------------------------
Login email: ".$user_email."
Login password: ".$user_password."
------------------------

 Thanks

 Deshicar.com
</pre>
"; // Our message
                     
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: Deshicar.com used car<info@deshicar.com>";
$headers .= "Reply-To: $to\r\n"."X-Mailer: PHP/".phpversion();

mail($to, $subject, $message, $headers); // Send our email


//REDIRECT TO CAR ADD PAGE START
$sql = "SELECT * FROM `car_users` WHERE user_id='$user_id'";

$result = mysqli_query($con,$sql) or trigger_error(mysqli_error($con));


// Mysql_num_row is counting table row
$count  = mysqli_num_rows($result);
$rid  = mysqli_fetch_array($result);

if($count==1)
  {
  
    $_SESSION['sess_user_id'] = $rid['user_id'];
    header("location: $site_url/user-car-add/");

  }
//REDIRECT TO CAR ADD PAGE END


//CLEAR DATA FOR PERSON
$Person_Name="";
$Person_Address="";
$Person_Phone="";

//CLEAR DATA FOR USER
$User_Email="";

}

else{ 
  echo "<div class='alert alert-danger alert-dismissible' role='alert'>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  <b>Wrong or mismatch!</b>
</div>";
}

}



}

}
ob_end_flush();
?>