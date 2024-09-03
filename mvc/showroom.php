<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo $site_url; ?>/">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo $site_url; ?>/showrooms/">Showrooms</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $showroom_name; ?></li>
  </ol>
</nav>


<?php
//views update
mysqli_query($con,"UPDATE car_showrooms SET views=views+1 WHERE showroom_id=$showroom_id");

$qs = mysqli_query($con,"SELECT * FROM car_showrooms WHERE showroom_id = $showroom_id AND status=1");
$rs = mysqli_fetch_assoc($qs);
$user_id = $rs["user_id"];
$location_id = get_info("car_users","location_id","WHERE user_id=".$user_id);
?>


<img src="<?php echo $site_url; ?>/images/showrooms/<?php echo $rs['showroom_photo']; ?>" class="img-responsive" width="1140" height="570">
<div id="title"><?php echo $rs['showroom_name']; ?><span style="float: right;"><?php include("fb_share.php"); ?></span></div>
<div id="area">
	<center>
	<h1><?php echo $rs['showroom_name']; ?></h1>
	<?php echo get_info("car_locations","location_name","WHERE location_id=".$location_id); ?>, <?php echo get_info("car_locations","location_name","WHERE location_id=".get_info("car_locations","parent_id","WHERE location_id=".$location_id)); ?>, Bangladesh<br>
	<?php include("showroom_contact.php"); ?>
	<br>
	<small><?php echo get_total("car_used","car_id","WHERE status=1 AND user_id=$user_id");?> cars available</small>
	</center>
</div>

<br>

<div id="title">All cars from <?php echo $showroom_name; ?></div>
<div id="area">
<?php 
$cond = " AND user_id=$user_id";
$sort = "ORDER BY car_id DESC";
$limit = "";
include("used-car-list.php"); ?>
</div>