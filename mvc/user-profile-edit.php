<div id="title">Update your information</div>
<div id="area">

<?php if(isset($_SESSION['sess_user_id'])){ $sess_user_id=$_SESSION['sess_user_id']; ?>



<?php

if(isset($_POST['action']) && $_POST['action']=="Update"){

$person_name = $_POST['person_name'];
 $person_address = $_POST['person_address'];
 $location_id=$_POST['location_id'];
 $person_phone = $_POST['person_phone'];
 $update_date = date('Y-m-d');

   
 $q = mysqli_query($con,"UPDATE car_persons SET person_name='$person_name',person_address='$person_address',location_id=$location_id, person_phone='$person_phone',update_date='$update_date' WHERE user_id='$sess_user_id'");


 if($q){echo'<div class="alert alert-success" role="alert">Information updated successfuly</div>';}





}

?>








<?php
$q = mysqli_query($con,"SELECT * FROM car_persons WHERE user_id='$sess_user_id'");

while($r=mysqli_fetch_array($q)){?>





<form method="post" action="">

<div class="form-group">
<label for="user_name">Your Full Name</label>
<input class="form-control" type="text" name="person_name" placeholder="Your full name" value="<?php echo $r['person_name']; ?>" id="person_name" maxlength="100" required><br>
</div>


<div class="form-group">
<label for="person_address">Your Full Address</label>
<input class="form-control" type="text" name="person_address" placeholder="Your full address" value="<?php echo $r['person_address']; ?>" id="person_address" maxlength="200" required><br>
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
<label for="person_phone">Your phone</label>
<input class="form-control" type="text" name="person_phone" placeholder="Your Phone" value="<?php echo $r['person_phone']; ?>" id="person_address" maxlength="50" required><br>
</div>


<div class="form-group">
<input type="submit" name="action" value="Update"  class="btn btn-primary btn-lg btn-block">
</div>


</form>



<?php } 

}//end check session
else{echo '<div class="alert alert-success" role="alert">You are not logged in</div>';}
?>


</div>




