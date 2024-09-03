<?php
//add to wishlist
if(isset($_POST['submit_wish'])){
	$car_id = $_POST['car_id'];
	$add_date = date("Y-m-d");
	$qw = mysqli_query($con,"INSERT INTO `car_wishlist` (`wish_id`, `user_id`, `car_id`, `add_date`, `status`) VALUES (NULL, '$sess_user_id', '$car_id', '$add_date', '1')");
	if($qw){echo "<div class=\"alert alert-success\" role=\"alert\">
  Car added to your wishlist successfully
</div>";}
}
?>

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
    $condition_id=$ruc['condition_id'];
    $condition_name=get_info('car_conditions','condition_name',"WHERE condition_id=$condition_id");
	$engine_cc=$ruc['engine_cc'];
	$km_run=$ruc['km_run'];
	$car_price=$ruc['car_price'];
	$car_price_negotiable=$ruc['car_price_negotiable'];
	$add_date=$ruc['add_date'];

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

<h2>
<a href="<?php echo $site_url; ?>/used-car/<?php echo $ruc['car_slug']; ?>/" class="p-title" >
<?php echo $car_name; ?>
</a>
</h2>


Added by: <?php 
if($user_type_id==1){
echo get_info('car_persons','person_name',"WHERE user_id=$user_id");
}else{
	$showroom_slug = get_info('car_showrooms','showroom_slug',"WHERE user_id=$user_id");
	echo "<a href='$site_url/showroom/$showroom_slug/' class='p-title'>";
echo get_info('car_showrooms','showroom_name',"WHERE user_id=$user_id");
echo "</a>";
}
?><br>



From: <?php $parent_id=get_info('car_locations','parent_id',"WHERE location_id=$location_id");?>
<?php echo get_info('car_locations','location_name',"WHERE location_id=$location_id");?>, <?php echo get_info('car_locations','location_name',"WHERE location_id=$parent_id");?>
<br><br>




Condition: <?php echo $condition_name; ?><br>
Brand: <?php echo get_info('car_brands','brand_name',"WHERE brand_id=$brand_id");?><br>
Engine cc: <?php echo $engine_cc; ?><br>
KM Run: 

 <?php if($km_run==0){
echo "N/A";}else{
echo number_format($km_run);} ?>



<br>
Date: <?php echo $add_date; ?>

</div>


<div class="col-sm-2" style="border:0px solid red; padding:0px;">


<font style="font-weight: bold;color:red; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left:15px;">Price: <?php echo number_format_bd($car_price); ?></font><br><font style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left:15px;">
(<?php if($car_price_negotiable==0){
echo "fixed";}
else{
echo "negotiable";} ?>)
</font>
<br><br>

<a href="<?php echo $site_url; ?>/used-car/<?php echo $ruc['car_slug']; ?>/"><button class="btn btn-success btn-block">Details</button></a>
<br>


<!-- wishlist button -->
<?php if(isset($sess_user_id)){?>
<form method="POST" action="">
<input type="hidden" name="car_id" value="<?php echo $car_id; ?>">
<button type="submit" name="submit_wish" class="btn btn-danger btn-block">&#9829; Save to Wishlist &#9829;</button>
</form>
<?php }else{?>
<a href="<?php echo $site_url; ?>/login/"><button class="btn btn-danger btn-block">&#9829; Save to Wishlist &#9829;</button></a>
<?php } ?>
	



</div>
</td>

</tr>
</table>
<br>





<?php }//end while used_bikes ?>

<style type="text/css">
	#bikes .col-sm-2 {
    padding: 0;
}
</style>
</div>


</div>