<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo $site_url; ?>/" class="b-title">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo $site_url; ?>/dashboard/" class="b-title">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Reminder</li>
  </ol>
</nav>

<div id="title">Reminder</div>

<div id="area">
<?php 
	if(isset($_POST['Submit']) && $_POST['Submit']=='Submit')
	{
		$user_id		= 	$sess_user_id;
		$brands 		= 	implode(", ",$_POST['brands']);
		$location_ids 	= 	implode(", ",$_POST['locations']);
		$a				=	$_POST['min_price'];
		$b				=	$_POST['max_price'];
		$km_run			=	$_POST['km_run'];
		$type_id		=	$_POST['type_id'];
		$add_date		= 	date("Y-m-d");


		if(($a<$b)&&($a!=$b)){
			$min_price  = $a;
			$max_price	= $b;
		}
		else{
			echo "<div class='alert alert-danger'><strong>Please check</strong> Minimum price and Maximum price.</div>";
		}


	$err=array();
	if($brands=='')
		{ $err[]="Please Select Car Brands";}
	if($location_ids=='')
		{ $err[]="Please Select Location";}
	if($min_price=='')
		{ $err[]="Please Enter Minimum Price";}
	if($max_price=='')
		{ $err[]="Please Enter Maximum Price";}
	if($type_id==0)
		{ $err[]="Please Enter Body Type";}

	$n=	count($err);

if($n>0)
	{
	echo "<div class=\"alert alert-danger\" role=\"alert\"><ol>";

	for($i=0;$i<$n;$i++)
			{ echo "<li>".$err[$i]."</li>"; }
	echo "</ol></div>";

	}
else
	{
$q=mysqli_query($con,"INSERT INTO `car_reminder` (`reminder_id`, `user_id`, `brand_ids`, `location_ids`, `min_price`, `max_price`, `km_run`, `type_id`, `add_date`, `status`) VALUES (NULL, '$user_id', '$brands', '$location_ids', '$min_price', '$max_price', '$km_run', '$type_id', '$add_date', '1')");

if($q){
	echo "<div class='alert alert-success'>
  <strong>Reminder</strong> submit successfulley.
</div>";
}
else{
	echo "<div class='alert alert-danger'>
  <strong>Reminder</strong> not submited.
</div>";
}

	}
	}
		
?>




<form action="" method="post">



<div class="form-group">
<label for="brand">Brands</label>

<div class="checkbox">
  	
  <?php     $b=mysqli_query($con,"SELECT * FROM car_brands WHERE brand_id !=1 AND status=1 ORDER BY brand_name ASC");
    while ($rb=mysqli_fetch_array($b)) { ?>

	<label style="width: 150px; text-align: justify-all;">
    	<input type="checkbox" name="brands[]" value="<?php echo $rb['brand_id']; ?>">
    <?php echo $rb['brand_name'];?>
	</label>

<?php } ?>
</div>
</div>

<div class="form-group">
<label for="location">Location</label>

<div class="checkbox">
  	
<?php     
$l=mysqli_query($con,"SELECT * FROM car_locations WHERE location_id!=1 AND parent_id=0 AND status=1 ORDER BY location_name ASC");
    while ($rl=mysqli_fetch_array($l)) { 
?>
	<label style="width: 150px; text-align: justify-all;">
	<input type="checkbox" name="locations[]" value="<?php echo $rl['location_id']; ?>">
    <?php echo $rl['location_name'];?>
	</label>
<?php } ?>

</div>

</div>	

<div class="form-group">
<label for="min_price">Minimum Price</label>
<input type="text" name="min_price" id="" class="form-control" maxlength="10">
</div>

<div class="form-group">
<label for="max_price">Maximum Price</label>
<input type="text" name="max_price" id="" class="form-control" maxlength="10">
</div>

<div class="form-group">
<label for="km_run">KM Run</label>
<input type="text" name="km_run" id="" class="form-control" maxlength="10">
</div>

<div class="form-group">
<label for="type_id">Body Type</label>

<select name="type_id" class="form-control">
	<option value="0">Select Body Type</option>
	<?php
	$q = mysqli_query($con,"SELECT type_id,type_name FROM car_types ORDER BY type_name ASC");
	while($r=mysqli_fetch_assoc($q)){?>
<option value="<?php echo $r['type_id']; ?>"
<?php if(isset($_POST['type_id']) && $_POST['type_id']==$r['type_id']){echo "Selected";}?>
	><?php echo $r['type_name']; ?></option>
	<?php } ?>
</select>
</div>

<div class="form-group">
<input type="submit" name="Submit" value="Submit" 
			 class="btn btn-primary btn-lg btn-block">
</div>

</form>

</div>	