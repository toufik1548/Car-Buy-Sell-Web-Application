<h3>Change your password</h3>

<div class="alert alert-danger">
  <strong>Change Password!</strong><br>Please use strong password. Do not use '123' or 'abc' type password
</div>

<?php

if(isset($_POST['update_password']))
{
	$input = array();
	$old_password 		= trim($_POST['old_password']);
	$password			= trim($_POST['password']);
	$password2			= trim($_POST['password2']);
	$md5_password 	= md5($password);
	//Display error msg
	$err = array();

	if($old_password == '')
		{ $err[]="Please enter your current password";}
	if(get_total('car_admins', 'admin_id', "WHERE admin_id='$logged_admin_id' AND admin_password='".md5($old_password)."'") != 1)
		{ $err[]="Your current password does not match!";}
	if($password == '')
		{ $err[]="Please enter your new password";}
	if($password2 == '')
		{ $err[]="Please confirm your new password";}
	if($password != $password2)
		{ $err[]="Your confirmation password does not match!";}
	
	$n =	count($err);

	if($n>0)
	{
		$msg = "<div class=\"alert alert-danger\" role=\"alert\"><ol>";
		for($i=0;$i<$n;$i++)
			{ $msg .= "<li>".$err[$i]."</li>"; }
		$msg .= "</ol></div>";
		$_SESSION['msg'] = $msg;
	}
		
	else
	{
		$q = mysqli_query($con, "UPDATE car_admins SET admin_password='".$md5_password."' WHERE admin_id=$logged_admin_id");
								
		if($q)
		{
			$_SESSION['msg'] = "<div class=\"alert alert-success\" role=\"alert\">Password updated successfully.</div>";
		}
		else
		{
			$_SESSION['msg'] = "<div class=\"alert alert-danger\" role=\"alert\">Sorry! Failed to change password</div>";
		}
	}
}
?>


	<?php
		if(isset($_SESSION['msg']))
		{
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
	?>




			
				
				<!-- /.tab-pane -->
				<div id="password">
				
					<br>
					<!-- form -->
					<form class="form-horizontal" action="" method="POST" id="form">
						
						<?php $data = array('label' => 'Old Password' ,'field' => 'old_password' ,'type' => 'password', 'required' => true);?>
						<div class="form-group<?php if($data['required'])echo ' required';?>">
							<label for="input_<?php echo $data['field'] ?>" class="col-sm-3 control-label"><?php echo $data['label'] ?></label>
							<div class="col-sm-6">
								<input type="<?php echo $data['type'] ?>" name="<?php echo $data['field'] ?>" maxlength="15"placeholder="<?php echo $data['label'] ?>" id="input_<?php echo $data['field'] ?>" class="form-control"<?php if($data['required'])echo ' required';?>>
							</div>
						</div>
						
						<?php $data = array('label' => 'New Password' ,'field' => 'password' ,'type' => 'password', 'required' => true);?>
						<div class="form-group<?php if($data['required'])echo ' required';?>">
							<label for="input_<?php echo $data['field'] ?>" class="col-sm-3 control-label"><?php echo $data['label'] ?></label>
							<div class="col-sm-6">
								<input type="<?php echo $data['type'] ?>" name="<?php echo $data['field'] ?>" maxlength="15" placeholder="<?php echo $data['label'] ?>" id="input_<?php echo $data['field'] ?>" class="form-control"<?php if($data['required'])echo ' required';?>>
							</div>
						</div>
						
						<?php $data = array('label' => 'Re-type Password' ,'field' => 'password2' ,'type' => 'password', 'required' => true);?>
						<div class="form-group<?php if($data['required'])echo ' required';?>">
							<label for="input_<?php echo $data['field'] ?>" class="col-sm-3 control-label"><?php echo $data['label'] ?></label>
							<div class="col-sm-6">
								<input type="<?php echo $data['type'] ?>" name="<?php echo $data['field'] ?>" maxlength="15" placeholder="<?php echo $data['label'] ?>" id="input_<?php echo $data['field'] ?>" class="form-control"<?php if($data['required'])echo ' required';?>>
							</div>
						</div>

					
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-9">
							<button type="submit" name="update_password" class="btn btn-primary">Submit</button>
							
							</div>
						</div>
							
					</form>
					<!-- /.form -->
				</div>
				<!-- /.tab-pane -->

