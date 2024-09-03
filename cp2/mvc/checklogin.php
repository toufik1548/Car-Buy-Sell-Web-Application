<?php
include_once("../configs/config.php");

if(isset($_POST['signin']))
{
	$username_email_phone	= $_POST['username'];
	$password		 	= md5($_POST['password']);
	

	//Display error msg
	$err = array();
	
	if($username_email_phone == '')
		{ $err[]="Please enter email";}
	if($_POST['password'] == '')
		{ $err[]="Please enter password";}
	
	

	$n =	count($err);

	if($n>0)
	{
		$msg = "<ol>";
		
		for($i=0;$i<$n;$i++)
				{ $msg .= "<li>".$err[$i]."</li>"; }
		$msg .= "</ol>";
		$_SESSION['msg'] = $msg;
	
	}
		
	else
	{
		$ql = mysqli_query($con,"SELECT admin_id,admin_name,level_id FROM car_admins WHERE admin_email='$username_email_phone' AND admin_password='$password' AND status=1");
		$qn = mysqli_num_rows($ql);
		$qr = mysqli_fetch_array($ql);
		$sid = $qr['admin_id'];
		$admin_name = $qr['admin_name'];
		$level_id = $qr['level_id'];

		if($qn == 1)
		{
			session_start();
			$_SESSION['sess_admin_id'] = $sid;
			$_SESSION['sess_admin_name'] = $admin_name;
			$_SESSION['sess_level_id'] = $level_id;
			
			header('Location: ../');
			exit();
		}
		else
		{
			session_start();
			$_SESSION['msg'] = 'Wrong username or password';
			header('Location: ../');
			exit();
		}
	}
}
?>