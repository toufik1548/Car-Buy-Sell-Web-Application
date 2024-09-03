<?php

if(isset($_SESSION['sess_old']) && $_SESSION['sess_old']==1){
echo "<div class='alert alert-danger' role='alert'>You have already account using your email. Please <a href='$site_url/login/' style='color:blue'>Login</a></div>";
}


if(isset($_SESSION['sess_mobile']) && $_SESSION['sess_mobile']==1){
echo "<div class='alert alert-danger' role='alert'>You have already account using your Phone. Please <a href='$site_url/login/' style='color:blue'>Login</a></div>";
}
?>

<div id="title">Create a new account (নতুন একটি একাউন্ট খুলুন)</div>
<div id="area">


<form method="POST" action="<?php echo $site_url;?>/checksignup.php">


<div class="form-group">
<label for="person_name">Name<small style="color:red">*</small></label>
<input type="text" name="person_name" class="form-control" placeholder="আপনার নাম লিখুন" maxlength="100" required>
</div>

<div class="form-group">
<label for="person_address">Address<small style="color:red">*</small></label>
<input type="text" name="person_address" class="form-control" placeholder="আপনার ঠিকানা লিখুন" maxlength="100" required>
</div>

<div class="form-group">
<label for="person_name">Your Location<small style="color:red">*</small></label>
<select name="location_id" class="form-control">
	<option value="0">Select your location</option>
<?php
$new = mysqli_query($con,"SELECT * FROM car_locations WHERE status=1 AND parent_id=0 ORDER BY location_name ASC");
while($r=mysqli_fetch_assoc($new)){
	$parent_id = $r["location_id"];
echo " <optgroup label='".$r['location_name']."'>";
$qls = mysqli_query($con,"SELECT * FROM car_locations WHERE status=1 AND parent_id=$parent_id ORDER BY location_name ASC");
while($rls=mysqli_fetch_assoc($qls)){
?>

<option value="<?php echo $rls['location_id']; ?>" <?php if($rls['location_id']==$r['location_id']){echo " Selected";} ?>>
<?php echo $r['location_name']; ?> - <?php echo $rls['location_name']; ?>
	
</option>
}
<?php }?>
</optgroup>
<?php } ?>
</select>
<br>
</div>

<div class="form-group">
<label for="person_phone">Phone<small style="color:red">*</small> ( আপনার 11 ডিজিটের মোবাইল নম্বরটি লিখুল + 88 ছাড়া 0 দিয়ে শুরু করুন 01234567891 )<small style="color:red">*</small></label>
<input type="text" name="person_phone" class="form-control" placeholder="আপনার মোবাইল নম্বর লিখুন" maxlength="11" required>
</div>

<div class="form-group">
<label for="email">Email<small style="color:red">*</small></label>
<input type="email" name="user_email" class="form-control" placeholder="আপনার ইমেইল লিখুন" maxlength="100" required>
</div>


<div class="form-group">
<label for="user_password">Password<small style="color:red">*</small></label>
(আপনার ফেসবুক অথবা ইমেইল এর পাসওয়ার্ড দিবেন না। 123 নয় বরং নিরাপত্তার স্বার্থে জটিল পাসওয়ার্ড ব্যবহার করুন।)
<input type="password" name="user_password" class="form-control" placeholder="নতুন একটি পাসওয়ার্ড দিন।" maxlength="20" required>
</div>




<center>
<button type="submit" name="action" value="Submit" class="btn btn-primary btn-lg btn-block">Submit</button>
</center>

</form>




<br><br>
<p align="center">
<b>Already have an account?</b><br>
<a href="<?php echo $site_url; ?>/login/" class="btn btn-warning btn-sm active" role="button" aria-pressed="true" style="width:200px;">Login Now</a>
</p>

</div>