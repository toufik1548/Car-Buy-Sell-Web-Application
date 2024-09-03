<div id="title">Recover Password</div>
<div id="area">


<div class="alert alert-info">
If you do not found your email at <b>INBOX</b>, Please check your <b>Bulk/Spam</b> folder and make it <b>Not Spam</b><br>
নতুন পাসওয়ার্ডটি আপনার ইমেইলে পাঠানো হবে। পাঠানো ইমেইল আপনার <b>INBOX</b> না পেলে <b>SPAM</b> ও চেক করুন এবং ইমেইলটিকে <b>Not Spam</b> হিসেবে সেট করুন।
</div>
<br>

<?php

if(isset($_POST['action'])&&$_POST['action']=="Recover Password")
{
//$sec =& load_class('Security');
$user_email		=	$_POST['user_email'];


//Display error msg

$err=array();
if($user_email=='')
{ $err[]="Please enter your user email";}
$n=	count($err);
if($n>0)
{
echo "<div class=\"alert alert-info\"><ol>";
for($i=0;$i<$n;$i++)
{ echo "<li>".$err[$i]."</li>"; }
echo "</ol></div>";

}
else
{


$q1		=	mysqli_query($con,"SELECT * FROM car_users WHERE user_email='$user_email' AND status=1");
$r1		=	mysqli_num_rows($q1);
if($r1==1){


$raw_password	=	rand(111111,999999);	//generating random password number
$user_password 	=	md5($raw_password);

$q2		=	mysqli_query($con,"UPDATE car_users SET user_password ='$user_password' WHERE user_email='$user_email'");

//New Password
$to 		=	$user_email;
$subject	=	"Your password has been changed";
$mail_body	=	"
Dear,

Your password has been changed.
Your New Password: ".$raw_password."

Thanks
Deshicar.com
http://www.deshicar.com

";

$header = "From: Deshicar.com<info@deshicar.com>\r\n";

$header .= "Reply-To: info@deshicar.com\r\n"."X-Mailer: PHP/".phpversion();

mail($to, $subject, $mail_body, $header);

if($q2)

{
echo "<div class=\"alert alert-success\">Your password has been reset. Please check your email for your new password</div>"; }
}
else
{
echo "<div class=\"alert alert-info\">Your email address is not exist! or wrong email address</div>";
}




}//end of else if no err

}// end of IF Submit



?>















<form method="POST" action="">

<div class="form-group">
<label for="email">Your Email</label>
<input type="email" name="user_email" class="form-control" maxlength="100" id="email" required>
</div>


<button type="submit" name="action" value="Recover Password" class="btn btn-primary btn-lg btn-block">Recover Password</button>


</div>