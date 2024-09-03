<?php
include("../configs/config.php");
?>

<?php
if (isset($_POST['update_password'])) {

    $old_admin_password 			= md5(trim($_POST['old_admin_password']));
    $admin_password 				= trim($_POST['admin_password']);
    $admin_retype_password 			= trim($_POST['admin_retype_password']);

    $old_admin_password_db 			= get_info("car_admins","admin_password","WHERE admin_id=$logged_admin_id");

        if ($old_admin_password!=$old_admin_password_db) {
            echo "<div class='border p-3 m-2 bg-danger'><h3>Old Password Not Matched</h3></div>";
        }elseif($admin_password!=$admin_retype_password){
            echo "Passwords do not match. Please re-enter.";
        }else{
            $admin_password_md5    = md5($admin_password);

            $update_query = mysqli_query($con, "UPDATE `car_admins` SET `admin_password`='$admin_password_md5' WHERE `status`=1 AND `admin_id`='$logged_admin_id'");

	            if($update_query){
	                echo "<div class='border p-3 m-2 bg-info'><h3>Updated Successfully</h3></div>";
	            }else{
	                echo "<div class='border p-3 m-2 bg-danger'><h3>Failed! Try Again</h3></div>";
	            } 
        }
}
?>




<div class="card card-outline-secondary mt-2">
    <div class="card-header">
        <h3 class="mb-0">Change Password</h3>
    </div>
    <div class="card-body">
        <form class="form" role="form" method="POST" autocomplete="off">
            <div class="form-group">
                <label for="old_admin_password">Current Password</label>
                <input type="password" class="form-control" id="old_admin_password" name="old_admin_password" required="">
            </div>
            <div class="form-group">
                <label for="admin_password">New Password</label>
                <input type="password" class="form-control" id="admin_password" name="admin_password" required="">
                <span class="form-text small text-muted">
                        The password must be 8-20 characters, and must <em>not</em> contain spaces.
                    </span>
            </div>
            <div class="form-group">
                <label for="admin_retype_password">Verify</label>
                <input type="password" class="form-control" id="admin_retype_password" name="admin_retype_password" required="">
                <span class="form-text small text-muted">
                        To confirm, type the new password again.
                    </span>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-lg float-right" name="update_password">Save</button>
            </div>
        </form>
    </div>
</div>