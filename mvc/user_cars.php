<?php
$active_cars = get_total("car_used","car_id","WHERE status=1 AND user_id=$sess_user_id");
$sold_cars = get_total("car_used","car_id","WHERE status=2 AND user_id=$sess_user_id");
$inactive_cars = get_total("car_used","car_id","WHERE status=0 AND user_id=$sess_user_id");
?>
<div id="title">My Cars (Active:<?php echo $active_cars; ?>) (Sold:<?php echo $sold_cars; ?>) (Cancel:<?php echo $inactive_cars; ?> )</div>
<div id="area">



<table class="table table-responsive table-bordered">

<?php
$q1 = mysqli_query($con,"SELECT * FROM car_used WHERE user_id='$sess_user_id' AND status=1 ORDER BY car_id DESC");

while($r1=mysqli_fetch_array($q1)){
$car_id 	= 	$r1['car_id'];
$car_name 	= 	$r1['car_name'];
$car_slug 	= 	$r1['car_slug'];
$add_date 	=	$r1['add_date'];
$car_price 	=	$r1['car_price'];
$views 		=	$r1['views'];
$status 	=	$r1['status'];
?>

<tr>
<td>

<?php
//bike photo
$photo = get_info("car_used_photo","photo_name", "WHERE car_id=$car_id ORDER BY photo_id ASC LIMIT 1");
if($photo!=""){echo "<img src='$site_url/images/products/$photo' class='img-responsive' width='150'>";}else{echo "<img src='$site_url/images/no_bike_photo_thumb.jpg' width='150' class='img-responsive'>";}
?>

<b><?php echo $car_name; ?></b><br>
Price: <?php echo number_format($car_price); ?><br>
<?php echo $add_date; ?><br>
Views: <?php echo $views; ?><br>
<a href="<?php echo $site_url; ?>/used-car/<?php echo $car_slug;?>/" target="_blank">View Website</a>
</td>



<td>
<a href="<?php echo $site_url; ?>/user-car-edit/<?php echo $car_id; ?>"/>
<button class="btn btn-warning btn-block"><b>-+- Edit Car Info -+-</b></button></a>
<br>
<a href="<?php echo $site_url; ?>/user-car-photo-upload/<?php echo $car_id; ?>"/>
<button class="btn btn-success btn-block"><b>+++ Add Car Photo +++</b></button></a>
<br>
<a href="<?php echo $site_url; ?>/user-car-status-edit/<?php echo $car_id; ?>"/>
<button class="btn btn-danger btn-block"><b>-+- Sold/Close -+-</b></button></a>
</td>
</tr>


<?php } ?>




</table>



<table class="table table-responsive table-bordered">

<?php
$q1 = mysqli_query($con,"SELECT * FROM car_used WHERE user_id='$sess_user_id' AND status=2 ORDER BY car_id DESC");

while($r1=mysqli_fetch_array($q1)){
$car_id 	= 	$r1['car_id'];
$car_name 	= 	$r1['car_name'];
$add_date 	=	$r1['add_date'];
$car_price 	=	$r1['car_price'];
$status 	=	$r1['status'];
?>

<tr>
<td>

<?php
//bike photo
$photo = get_info("car_used_photo","photo_name", "WHERE car_id=$car_id ORDER BY photo_id ASC LIMIT 1");
if($photo!=""){echo "<img src='$site_url/images/products/$photo' class='img-responsive' width='150'>";}else{echo "<img src='$site_url/images/no_bike_photo_thumb.jpg' width='150' class='img-responsive'>";}
?>

<b><?php echo $car_name; ?></b><br>
Price: <?php echo number_format($car_price); ?><br>
<?php echo $add_date; ?>

</td>



<td>
<button class="btn btn-success btn-block"><b>আপনার গাড়িটি বিক্রয় হয়ে গিয়েছে</b></button>

</td>
</tr>


<?php } ?>




</table>



<table class="table table-responsive table-bordered">

<?php
$q1 = mysqli_query($con,"SELECT * FROM car_used WHERE user_id='$sess_user_id' AND status=3 ORDER BY car_id DESC");

while($r1=mysqli_fetch_array($q1)){
$car_id 	= 	$r1['car_id'];
$car_name 	= 	$r1['car_name'];
$add_date 	=	$r1['add_date'];
$car_price 	=	$r1['car_price'];
$status 	=	$r1['status'];
?>

<tr>
<td>

<?php
//bike photo
$photo = get_info("car_used_photo","photo_name", "WHERE car_id=$car_id ORDER BY photo_id ASC LIMIT 1");
if($photo!=""){echo "<img src='$site_url/images/products/$photo' class='img-responsive' width='150'>";}else{echo "<img src='$site_url/images/no_bike_photo_thumb.jpg' width='150' class='img-responsive'>";}
?>

<b><?php echo $car_name; ?></b><br>
Price: <?php echo number_format($car_price); ?><br>
<?php echo $add_date; ?>

</td>



<td>
<button class="btn btn-danger btn-block"><b>আপনার গাড়িটি লিস্ট থেকে ডিলিট করে দিয়েছেন</b></button>

</td>
</tr>


<?php } ?>




</table>

</div>