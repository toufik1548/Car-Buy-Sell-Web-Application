<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo $site_url; ?>/" class="b-title">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo $site_url; ?>/dashboard/" class="b-title">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Showroom</li>
  </ol>
</nav>


<div id="title">Update Showroom Information</div>
<div id="area">

<?php if(isset($_SESSION['sess_user_id'])){ $sess_user_id=$_SESSION['sess_user_id']; ?>



<?php

if(isset($_POST['action']) && $_POST['action']=="Update"){
 $showroom_name = $_POST['showroom_name'];
 $showroom_slug = slug($showroom_name);
 $showroom_address = $_POST['showroom_address'];
 $location_id=$_POST['location_id'];
 $showroom_phones = $_POST['showroom_phones'];
 $showroom_email = $_POST['showroom_email'];
 $showroom_url = $_POST['showroom_url'];

 $showroom_details = $_POST['showroom_details'];
 $showroom_hours = $_POST['showroom_hours'];
 $update_date = date('Y-m-d');
 

 

    
 $q = mysqli_query($con,"UPDATE car_showrooms SET showroom_name='$showroom_name',showroom_slug='$showroom_slug',showroom_address='$showroom_address'
 	,location_id=$location_id,showroom_phones='$showroom_phones'
 	,showroom_email='$showroom_email'
 	,showroom_url='$showroom_url',showroom_details='$showroom_details'
 	,showroom_hours='$showroom_hours'
 	,update_date='$update_date' WHERE user_id='$sess_user_id'");


 if($q){echo'<div class="alert alert-success" role="alert">Information Updated Successfuly</div>';}

}

?>


<?php
$q = mysqli_query($con,"SELECT * FROM car_showrooms WHERE user_id='$sess_user_id'");

while($r=mysqli_fetch_array($q)){?>



<form method="post" action="">

<div class="form-group">
<label for="showroom_name">Your Showroom Name</label>
<input class="form-control" type="text" name="showroom_name" placeholder="ABC Cars" value="<?php echo $r['showroom_name']; ?>" id="showroom_name" maxlength="100" required><br>
</div>


<div class="form-group">
<label for="showroom_address">Showroom Address</label>
<input name="showroom_address" type="text" class="form-control" id="showroom_address" value="<?php echo $r['showroom_address']; ?>" size="60" required="required">
</div>


<div class="form-group">
<label for="location_id">Your Location</label>
<select name="location_id" class="form-control">
	<option value="0">Select your location</option>
<?php
$ql = mysqli_query($con,"SELECT * FROM car_locations WHERE status=1 AND parent_id=0 ORDER BY location_name ASC");
while($rl=mysqli_fetch_assoc($ql)){
	$parent_id = $rl["location_id"];
echo " <optgroup label='".$rl['location_name']."'>";
$qls = mysqli_query($con,"SELECT * FROM car_locations WHERE status=1 AND parent_id=$parent_id ORDER BY location_name ASC");
while($rls=mysqli_fetch_assoc($qls)){
?>

<option value="<?php echo $rls['location_id']; ?>" <?php if($rls['location_id']==$r['location_id']){echo " Selected";} ?>>
<?php echo $rl['location_name']; ?> - <?php echo $rls['location_name']; ?>
	
</option>
}
<?php }?>
</optgroup>
<?php } ?>
</select>
<br>
</div>



<div class="form-group">
<label for="showroom_phones">Showroom Phones</label>
<input class="form-control" type="text" name="showroom_phones" placeholder="017xxxxxxxx, 018xxxxxxxx" value="<?php echo $r['showroom_phones']; ?>" id="showroom_phones" maxlength="100" required><br>
</div>


<div class="form-group">
<label for="showroom_email">Showroom Email</label>
<input class="form-control" type="email" name="showroom_email" placeholder="abc@xyz.com" value="<?php echo $r['showroom_email']; ?>" id="showroom_email" maxlength="100"><br>
</div>

<div class="form-group">
<label for="showroom_url">Showroom Website</label>
<input class="form-control" type="text" name="showroom_url" placeholder="www.xyz.com" value="<?php echo $r['showroom_url']; ?>" id="showroom_url" maxlength="100"><br>
</div>


<div class="form-group">
<label for="showroom_details">Showroom Details</label>
<textarea name="showroom_details" class="form-control" rows="5" cols="60" id="showroom_details"><?php echo $r['showroom_details']; ?></textarea>
</div>


<div class="form-group">
<label for="showroom_hours">Showroom Hours</label>
<textarea name="showroom_hours" class="form-control" rows="5" cols="60" id="showroom_hours"><?php echo $r['showroom_hours']; ?></textarea>
</div>

<div class="form-group">
<input type="submit" name="action" value="Update"  class="btn btn-primary btn-lg btn-block">
</div>


</form>



<?php 
}
}//end check session
else{echo '<div class="alert alert-success" role="alert">You are not logged in</div>';}
?>


</div>




