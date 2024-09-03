
<div class="list-group">

<div id="bikes">
<?php
//$cond $sort $limit
$quc = mysqli_query($con,"SELECT * FROM car_used WHERE status=1 $cond $sort $limit");
$nuc = mysqli_num_rows($quc);

if($nuc==0){
	echo "<div class=\"alert alert-warning\">
<b>Sorry!</b><br>
No records found.
</div>";
}


while($ruc=mysqli_fetch_array($quc)){

	$car_id=$ruc['car_id'];
	$user_id=$ruc['user_id'];
	$user_type_id = get_info("car_users","type_id","WHERE user_id=$user_id");
	$location_id=$ruc['location_id'];
	$car_name=$ruc['car_name'];
	$car_slug=$ruc['car_slug'];
	$brand_id=$ruc['brand_id'];
	$engine_cc=$ruc['engine_cc'];
	$km_run=$ruc['km_run'];
	$car_price=$ruc['car_price'];


?>






<table class="table table-bordered table-responsive table-hover" style="width:100%; padding:0px; margin:0px;">


<tr class="tr-hover">

<td style="">

<?php
$qp = mysqli_query($con,"SELECT photo_name FROM car_used_photo WHERE car_id='$car_id' ORDER BY photo_id ASC LIMIT 1");
$rp=mysqli_fetch_array($qp);
$np=mysqli_num_rows($qp);
if($np==0){$car_photo = $site_url."/images/no_bike_photo.jpg"; }
	else{$car_photo = $site_url."/images/users/".$user_id."/".$rp['photo_name']; }

?>



<div class="col-sm-2" style="border:0px solid black;">
	<a href="<?php echo $site_url; ?>/used-car/<?php echo  $ruc['car_slug']; ?>/">
<img class="thumbnail" style="width:100%;" src="<?php echo $car_photo; ?>">
</a>
</div>




<div id="" class="col-sm-8" style="border:0px solid blue;">
<h2><?php echo $car_name; ?></h2>


Added by: <?php 
if($user_type_id==1){
echo get_info('car_users','user_name',"WHERE user_id=$user_id");
}else{
	$showroom_slug = get_info('car_showrooms','showroom_slug',"WHERE user_id=$user_id");
	echo "<a href='$site_url/showroom/$showroom_slug/'>";
echo get_info('car_showrooms','showroom_name',"WHERE user_id=$user_id");
echo "</a>";
}
?><br>

From: <?php $parent_id=get_info('car_locations','parent_id',"WHERE location_id=$location_id");?>
<?php echo get_info('car_locations','location_name',"WHERE location_id=$location_id");?>, <?php echo get_info('car_locations','location_name',"WHERE location_id=$parent_id");?>
<br><br>




Brand: <?php echo get_info('car_brands','brand_name',"WHERE brand_id=$brand_id");?><br>
Engine cc: <?php echo $engine_cc; ?><br>
KM Run: <?php echo $km_run; ?>

</div>


<div class="col-sm-2" style="border:0px solid red; padding:0px;">

<b>Price: <?php echo number_format_bd($car_price,2); ?>.00</b>
<br><br>

<a href="<?php echo $site_url; ?>/used-car/<?php echo $ruc['car_slug']; ?>/"><button class="btn btn-success btn-block">Details</button></a>
	
</div>
</td>

</tr>
</table>
<br>





<?php }//end while used_bikes ?>

</div>


</div>