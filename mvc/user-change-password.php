<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo $site_url; ?>/" class="b-title">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo $site_url; ?>/dashboard/" class="b-title">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Change Password</li>
  </ol>
</nav>


<div id="title">Change Password</div>
<div id="area">		


<?php if(isset($_SESSION['sess_user_id'])){ $sess_user_id=$_SESSION['sess_user_id']; ?>


<?php

if(isset($_POST["change_password"]))
	{
		$sec =& load_class('Security');
		$user_password		=	$sec->escape($sec->xss_clean($_POST['user_password']));
		$user_password2		=	$sec->escape($sec->xss_clean($_POST['user_password2']));
		$md5_user_password	=	md5($user_password);

				
		if(($user_password!=$user_password2)||($user_password=="")){ echo '<div class="alert alert-warning">Sorry! Password missmatch.</div>'; }

		else {

			$q	=	mysqli_query($con,
					"UPDATE `car_users` SET 
					`user_password`='$md5_user_password' 
					WHERE user_id=$sess_user_id");

				if(!($q))	{	echo "<div class='alert alert-warning' role='alert'>
  Sorry! Failed to change your password.
</div>"; 	}
				else		{ 	echo "<div class='alert alert-success' role='alert'>
  Your Password has been changed successfully!
</div>"; 		}
		
			}
	}
?>



<form name="change_password" action="" method="post">



<div class="form-group">
<label for="user_password">New Password</label>
<input type="password" name="user_password" id="user_password" class="form-control" maxlength="20">
</div>


<div class="form-group">
<label for="user_password2">Re-Type Password</label>
<input type="password" name="user_password2" id="user_password2" class="form-control" maxlength="20">
</div>


<div class="form-group">
<input type="submit" name="change_password" value="Change" 
			 class="btn btn-primary btn-lg btn-block">
</div>


<?php }else{echo '<div class="alert alert-success" role="alert">You are not logged in</div>';} ?>

</div>