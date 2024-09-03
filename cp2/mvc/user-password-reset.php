<?php
$user_id 	= $slug2;

$q=mysqli_query($con,"SELECT * FROM `car_users` WHERE status=1 AND user_id= '$user_id'");
$r = mysqli_fetch_assoc($q);

$user_id 		= $r["user_id"];
$user_name 		= $r["user_name"];
$user_email 	= $r["user_email"];
$user_mobile 	= $r["user_mobile"];
?>


<?php
if (isset($_POST['update_password'])) {

    $user_password 					= trim($_POST['user_password']);
    $user_retype_password 			= trim($_POST['user_retype_password']);

	
		if($user_password!=$user_retype_password){
            echo "<script>alert('Passwords do not match. Please re-enter.');</script>";
        }else{
            $user_password_md5    = md5($user_password);

            $update_query = mysqli_query($con, "UPDATE `car_users` SET `user_password`='$user_password_md5' WHERE `status`=1 AND `user_id`='$user_id'");

	            if($update_query){
	                echo "<script>alert('Updated Successfully');</script>";
	            }else{
	                echo "<script>alert('Failed! Try Again');</script>";
	            } 
        }
}
?>

<div class='border p-3 m-2'><h3>User Password Reset</h3></div>

<table class="table">

    <tr>
      <th scope="row">User Id</th>
      <td><?php echo $user_id; ?></td>
    </tr>
    <tr>
      <th scope="row">User Name</th>
      <td><?php echo $user_name; ?></td>
    </tr>
    <tr>
      <th scope="row">User Email</th>
      <td><?php echo $user_email; ?></td>
    </tr>
    <tr>
      <th scope="row">User Mobile</th>
      <td><?php echo $user_mobile; ?></td>
    </tr>
    <tr>
      <th scope="row">Password Reset</th>
      <td>
      	
        <form class="form" role="form" method="POST" autocomplete="off">
			<span class="form-text small text-muted">The password must be 8-20 characters, and must <em>not</em> contain spaces.</span>
            <div class="form-group">
                <label for="user_password">New Password</label>
                <input type="password" class="form-control" id="user_password" name="user_password" maxlength="20" required="">
            </div>
            <div class="form-group">
                <label for="user_retype_password">Retype</label>
                <input type="password" class="form-control" id="user_retype_password" name="user_retype_password" maxlength="20" required="">
                <span class="form-text small text-muted">To confirm, type the new password again.</span>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-lg float-right" name="update_password">Save</button>
            </div>
        </form>

      </td>
    </tr>

</table>