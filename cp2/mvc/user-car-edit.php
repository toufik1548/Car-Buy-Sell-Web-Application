<?php

$user_id = $slug2;

$q = mysqli_query($con, "SELECT * FROM `car_users` WHERE user_id= '$user_id'");

// Check if the query was successful before fetching the result
if ($q) {
    $r = mysqli_fetch_assoc($q);

    $user_name      = $r["user_name"];
    $user_address   = $r["user_address"];
    $location_id    = $r["location_id"];
    $user_mobile    = $r["user_mobile"];
    $user_email     = $r["user_email"];

    if (isset($_POST["submit"])) {
        $user_name      = $_POST['user_name'];
        $user_address   = $_POST['user_address'];
        $location_id    = $_POST['location_id'];
        $user_mobile    = $_POST['user_mobile'];
        $user_email     = $_POST['user_email'];


        if ($user_email !== $r['user_email']) {

            $checkEmailQuery = mysqli_query($con, "SELECT user_id FROM car_users WHERE user_email = '$user_email'");
            if (mysqli_num_rows($checkEmailQuery) > 0) {
                echo "<div class=\"alert alert-danger\" role=\"alert\">Sorry!! Email already exists!</div>";
                exit; // Stop further execution to prevent the update query from being executed
            }
        }

        // Check if the 'status' checkbox is set
        $status = isset($_POST['status']) ? 1 : 0;

        // Display error message
        $err = array();
        if ($user_name == '') {
            $err[] = "Please enter name";
        }
        $n = count($err);
        if ($n > 0) {
            echo "<div class=err_msg><ol>";
            for ($i = 0; $i < $n; $i++) {
                echo "<li>" . $err[$i] . "</li>";
            }
            echo "</ol></div>";
        } else {
            $query = mysqli_query($con, "UPDATE car_users SET user_name='$user_name',user_address='$user_address',location_id='$location_id',user_mobile='$user_mobile', user_email='$user_email',status='$status' WHERE user_id= '$user_id'");

            if ($query) {
                echo "<div class=\"alert alert-success\" role=\"alert\"><b>User Updated Successfully!</b></div>";
            } else {
                echo "<div class=\"alert alert-danger\" role=\"alert\">Sorry!! Failed To Update!</div>";
            }
        }
    }
}
?>

<div class='border p-3 m-2'>
    <h3>User Car Edit</h3>
</div>

<div id="area">
    <form method="POST" action="">
		<div class="form-group">
		<label for="user_name">Name</label>
		<input type="text" name="user_name" class="form-control" placeholder="আপনার নাম লিখুন" maxlength="100" value="<?php echo $user_name; ?>" required>
		</div>

		<div class="form-group">
		<label for="user_address">Address</label>
		<input type="text" name="user_address" class="form-control" placeholder="আপনার ঠিকানা লিখুন" maxlength="100" value="<?php echo $user_address; ?>" required>
		</div>

		<div class="form-group">
		<label for="user_name">Your Location</label>
		<select name="location_id" class="form-control">
			<option value="0">Select your location</option>
		<?php
		$new = mysqli_query($con,"SELECT * FROM car_locations WHERE status=1 AND parent_id=0 ORDER BY location_name ASC");
		while($rl=mysqli_fetch_assoc($new)){
			$parent_id = $rl["location_id"];
		echo " <optgroup label='".$rl['location_name']."'>";
		$qls = mysqli_query($con,"SELECT * FROM car_locations WHERE status=1 AND parent_id=$parent_id ORDER BY location_name ASC");
		while($rls=mysqli_fetch_assoc($qls)){
		?>

		<option value="<?php echo $rls['location_id']; ?>" <?php if(isset($r['location_id']) && $r['location_id']==$rls['location_id']){echo " Selected";} ?>>
		<?php echo $rl['location_name']; ?> - <?php echo $rls['location_name']; ?>
			
		</option>
		<?php }?>
		</optgroup>
		<?php } ?>
		</select>
		<br>
		</div>

		<div class="form-group">
		<label for="user_mobile">Phone ( আপনার 11 ডিজিটের মোবাইল নম্বরটি লিখুল + 88 ছাড়া 0 দিয়ে শুরু করুন 01234567891 )</label>
		<input type="text" name="user_mobile" class="form-control" placeholder="আপনার মোবাইল নম্বর লিখুন" maxlength="11" value="<?php echo $user_mobile; ?>" required>
		</div>

		<div class="form-group">
		<label for="email">Email</label>
		<input type="email" name="user_email" class="form-control" placeholder="আপনার ইমেইল লিখুন" maxlength="100" value="<?php echo $user_email; ?>" required>
		</div>

		<div class="form-group">
		<label for="email">Publish</label>
		<input type="checkbox" name="status" id="status" value="1" <?php if($r['status']==1){ echo "checked"; } ?>>
		</div>

        <center>
            <button type="submit" name="submit" value="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
        </center>
    </form>
</div>

