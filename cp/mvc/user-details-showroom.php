<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>/users/">Users</a></li>
    <li class="breadcrumb-item active" aria-current="page">Showroom Details</li>
  </ol>
</nav>


<h3>Showroom Details</h3>

<?php
$user_id = $slug2;

if(isset($_POST['submit'])){
	$showroom_name = addslashes($_POST['showroom_name']);
	$showroom_slug = $_POST['showroom_slug'];
	$showroom_address = addslashes($_POST['showroom_address']);
	$location_id = $_POST['location_id'];
	$showroom_phones = $_POST['showroom_phones'];
	$showroom_email = $_POST['showroom_email'];
	$showroom_url = $_POST['showroom_url'];
	$showroom_details = addslashes($_POST['showroom_details']);
	$showroom_hours = addslashes($_POST['showroom_hours']);
	$showroom_lat = $_POST['showroom_lat'];
	$showroom_long = $_POST['showroom_long'];
	$showroom_photo = $_POST['showroom_photo'];
	if(isset($_POST['status']) && $_POST['status']==1){$status = $_POST['status'];}else{$status=0;}


	$qs = mysqli_query($con,"UPDATE car_showrooms SET
		showroom_name='$showroom_name',
		showroom_slug='$showroom_slug',
		showroom_address='$showroom_address',
		location_id=$location_id,
		showroom_phones='$showroom_phones',
		showroom_email='$showroom_email',
		showroom_url='$showroom_url',
		showroom_details='$showroom_details',
		showroom_hours='$showroom_hours',
		showroom_lat='$showroom_lat',
		showroom_long='$showroom_long',
		showroom_photo='$showroom_photo',
		status='$status'
		WHERE user_id=$user_id
		");

if($qs){echo "<div class=\"alert alert-success\" role=\"alert\">Record updated successfully</div>";
}else{
echo "<div class=\"alert alert-danger\" role=\"alert\">Sorry, Record update failed!</div>";
}


}



$qs = mysqli_query($con,"SELECT * FROM car_showrooms WHERE user_id=$user_id");
$rs = mysqli_fetch_assoc($qs);
?>

<form method="POST" action="">
<table class="table">
<tr><td width="150">Showroom</td><td>
	<input type="text" name="showroom_name" value="<?php echo $rs['showroom_name']; ?>"></td></tr>
<tr><td>Slug</td><td>
	<input type="text" name="showroom_slug" value="<?php echo $rs['showroom_slug']; ?>"></td></tr>
<tr><td>Address</td><td>
	<input type="text" name="showroom_address" value="<?php echo $rs['showroom_address']; ?>"></td></tr>

<tr><td>Location</td><td>
<select name="location_id">
	<option value="0">Select Location</option>
	<?php
$ql = mysqli_query($con,"SELECT * FROM car_locations WHERE parent_id=0 AND location_id!=1 ORDER BY location_name ASC");
while($rl=mysqli_fetch_assoc($ql)){
	?>
<?php 

$parent_id = $rl["location_id"];
?>
 <optgroup label="<?php echo $rl["location_name"]; ?>">
<?php
$qls = mysqli_query($con,"SELECT * FROM car_locations WHERE parent_id=$parent_id  ORDER BY location_name ASC");
while($rls=mysqli_fetch_assoc($qls)){?>
<option value="<?php echo $rls["location_id"]; ?>" 
	<?php if($rs['location_id']==$rls["location_id"]){echo " Selected";}?>><?php echo $rls["location_name"]; ?></option>
<?php 
}
?>
</optgroup>
<?php
	} 
?>


</select>


</td></tr>





<tr><td>Phones</td><td>
	<input type="text" name="showroom_phones" value="<?php echo $rs['showroom_phones']; ?>"></td></tr>
<tr><td>Email</td><td>
	<input type="text" name="showroom_email" value="<?php echo $rs['showroom_email']; ?>"></td></tr>
<tr><td>Website</td><td>
	<input type="text" name="showroom_url" value="<?php echo $rs['showroom_url']; ?>"></td></tr>
<tr><td>Details</td><td>
	<textarea name="showroom_details"><?php echo $rs['showroom_details']; ?></textarea></td></tr>

<tr><td>Open Hours</td><td>
	<textarea name="showroom_hours"><?php echo $rs['showroom_hours']; ?></textarea></td></tr>

<tr><td>Map Lat</td><td>
	<input name="showroom_lat" type="text" value="<?php echo $rs['showroom_lat']; ?>"></td></tr>
<tr><td>Map Long</td><td>
	<input name="showroom_long" type="text" value="<?php echo $rs['showroom_long']; ?>"></td></tr>
<tr><td>Photo</td><td>
	<input name="showroom_photo" type="text" value="<?php echo $rs['showroom_photo']; ?>"></td></tr>
<tr><td>Publish</td><td>
	<input type="checkbox" name="status" value="1" <?php if($rs['status']==1){ echo "checked"; } ?>></td></tr>

<tr><td></td><td>
<input type="submit" name="submit" value="Submit">
	</td></tr>
</table>
</form>

