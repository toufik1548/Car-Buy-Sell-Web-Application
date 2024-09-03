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

<h1><?php echo $car_name; ?></h1>


<div id="title"><?php echo $car_name; ?></div>
<div id="area">

<?php

//update views
mysqli_query($con,"UPDATE car_used SET views=views+1 WHERE car_id=$car_id");


$q1 = mysqli_query($con,"SELECT * FROM car_used WHERE car_id=$car_id");
$r1=mysqli_fetch_array($q1);


$user_id=$r1['user_id'];
$seller_name = get_info('car_users','user_name',"WHERE user_id=$user_id");
$location_id=$r1['location_id'];
$car_name=$r1['car_name'];
$brand_id=$r1['brand_id'];
$brand_slug=get_info("car_brands","brand_slug","WHERE brand_id=".$r1['brand_id']);
$model_id=$r1['model_id'];
$model_name = get_info("car_models","model_name","WHERE model_id=$model_id");
$model_slug = get_info("car_models","model_slug","WHERE model_id=$model_id");
$model_year=$r1['model_year'];
$reg_year=$r1['reg_year'];
$condition_id=$r1['condition_id'];
$condition_name = get_info("car_conditions","condition_name","WHERE condition_id=$condition_id");
$trans_id=$r1['trans_id'];
$engine_cc=$r1['engine_cc'];
$km_run=$r1['km_run'];
$car_details=$r1['car_details'];
$car_youtube=str_replace("https://youtu.be", "https://www.youtube.com/embed", $r1['car_youtube']);
$car_price=$r1['car_price'];
$car_price_negotiable=$r1['car_price_negotiable'];
$type_id=$r1['type_id'];
$fuel_id=$r1['fuel_id'];
$add_date=$r1['add_date'];
$update_date=$r1['update_date'];
$views=$r1['views'];
$status=$r1['status'];
?>


<?php
//make it sold if it is 6 months old
$today = date("Y-m-d");
$diff = strtotime($today) - strtotime($add_date); 
$diff_days = abs(round($diff / 86400)); 
if($diff_days>120){mysqli_query($con,"UPDATE car_used SET status=2 WHERE car_id=$car_id");}
?>

<?php if($status!=0){ ?>




<div id="bike_details">

<br>
<!--
<p align="center"><img src="<?php echo $site_url; ?>/images/disclaimer.jpg" class="img-responsive img-fluid img-rounded"></p>
<br><br>
-->



<div class="col-sm-4">
	<?php
	$qp = mysqli_query($con,"SELECT photo_name FROM car_used_photo WHERE car_id='$car_id' ORDER BY photo_id ASC LIMIT 1");
	$rp=mysqli_fetch_array($qp);
	$np=mysqli_num_rows($qp);
	if($np==0){$car_photo = $site_url."/images/no_bike_photo.jpg"; }
	else{$car_photo = $site_url."/images/products/".$rp['photo_name']; }
	?>
	<img width="800" src="<?php echo $car_photo; ?>" class="img-responsive">
	
	<center>
    <!-- <div class="ui-price-tag-photo">
             <a href="#More-Photos" id="">
    More Photo
      </a>
    </div> -->


    <div class="btn-group btn-group-justified">
    <a href="#" class="btn btn-primary" style="border-radius: 0;">
       <b>  <?php if($status==2){
echo "Sold Out";}else{
echo "<small>TK</small> ".number_format_bd($car_price);} ?></b>

    </a>
    <a href="#More-Photos" class="btn btn-success" style="border-radius:0; font-weight: bold;">More Photo</a>
  </div>

  <!--   <div class="ui-price-tag"></div> -->
    <br>
    <?php include("fb_share.php"); ?></center><br>
</div>






<div class="col-sm-4">
<b><?php echo $car_name; ?></b>

<h3>Car Informtion</h3>
Brand: <a href="<?php echo $site_url; ?>/brand/<?php echo $brand_slug; ?>/"><?php echo get_info('car_brands','brand_name',"WHERE brand_id=$brand_id");?></a><br>
Model: <a href="<?php echo $site_url; ?>/model/<?php echo $model_slug ;?>/"><u><?php echo $model_name ;?></u></a><br>
Model Year: <?php echo $model_year;?><br>
Reg. Year: <?php echo $reg_year;?><br>
Condition: <?php echo get_info('car_conditions','condition_name',"WHERE condition_id=$condition_id");?><br>
Transmissions: <?php echo get_info('car_transmissions','trans_name',"WHERE trans_id=$trans_id");?><br>
Body Type: <?php echo get_info('car_types','type_name',"WHERE type_id=$type_id");?><br>
Fuel: <?php echo get_info('car_fuels','fuel_name',"WHERE fuel_id=$fuel_id");?><br>
Engine cc: <?php echo $engine_cc; ?>cc<br>
KM Run:
<?php if($km_run==0){
echo "N/A";}else{
echo number_format($km_run)."KM";} ?>

 <br>








</div>


<div class="col-sm-4">

<h3>Seller information</h3>
<b><?php echo $seller_name; ?></b> <br>

Address: 
<?php
$sub_location_slug = get_info("car_locations","location_slug","WHERE location_id=$location_id");

$parent_id=get_info('car_locations','parent_id',"WHERE location_id=$location_id"); 
$location_slug= get_info("car_locations","location_slug","WHERE location_id=$parent_id");
?>

<a href="<?php echo $site_url; ?>/location/<?php echo $sub_location_slug; ?>/"><u><?php echo get_info('car_locations','location_name',"WHERE location_id=$location_id");?></u></a>, 

<a href="<?php echo $site_url; ?>/location/<?php echo $location_slug; ?>/">
<u><?php echo get_info('car_locations','location_name',"WHERE location_id=$parent_id");?></u>
</a>
<br>


 <?php //echo get_info("car_persons","person_phone","WHERE user_id=$user_id"); ?>
<?php if($status==1){include("used-car-contact.php");} ?>

<?php 
$n = get_total("car_showrooms","showroom_id","WHERE user_id=$user_id");
if($n==1){ 

$showroom_slug = get_info("car_showrooms","showroom_slug","WHERE user_id=$user_id");
  echo "<a href='$site_url/showroom/$showroom_slug/' class='btn btn-success' style='margin: 5px;'>Visit Showroom</a>";}
?>
















<h3>Price and Status</h3>
Price: <?php echo number_format_bd($car_price); ?><br>
(<?php if($car_price_negotiable==0){
echo "fixed";}
else{
echo "negotiable";} ?>)
<br>
Listed on : <?php echo $add_date; ?><br>
Views: <?php echo $views; ?>

<center><img src="<?php echo $site_url; ?>/images/ads/ad.motosolution.jpg" class="img-responsive"></center>

</div>




<div class="clearfix"></div>

<hr>

<div class="alert alert-warning">
  <strong>নিরাপত্তামুলক পরামর্শ</strong><br>
  <ul>
  <li>পন্য কেনা-বেচার ক্ষেত্রে দেশীকার জড়িত নয় ও দায়বদ্ধ নয়, নিজ দায়ীত্বে পন্য কেনা-বেচা করুন।</li>
  <li>অচেনা/নিরিবিলি জায়গায় ক্রেতা/বিক্রেতার সাথে দেখা করবেন না</li>
  <li>গাড়ি নেয়ার আগে অভিজ্ঞ কাউকে দিয়ে পরীক্ষা করিয়ে নিন</li>
  <li>পন্য সঠিকভাবে বূঝে নিয়ে লেনদেন করুন</li>
  <li>সতর্ক থাকুন, নিরাপদে থাকুন</li>
  </ul>
</div>

<hr>
<?php include("g_ads.php"); ?>
<hr>

<div class="col-sm-12">
<h3>Details</h3>
<?php echo nl2br(mb_convert_encoding($car_details, "UTF-8", "auto"));?>



</div>

<div id="More-Photos"></div><br><br><br>

<div class="col-sm-12">

<!-- wishlist button -->
<span style="float: right;">
<?php if(isset($sess_user_id)){?>
<form method="POST" action="">
<input type="hidden" name="car_id" value="<?php echo $car_id; ?>">
<button type="submit" name="submit_wish" class="btn btn-danger btn-block">&#9829; Save to Wishlist &#9829;</button>
</form>
<?php }else{?>
<a href="<?php echo $site_url; ?>/login/"><button class="btn btn-danger btn-block">&#9829; Save to Wishlist &#9829;</button></a>
<?php } ?>
</span>


<h3>More Photos</h3>


<?php
$q2		=	mysqli_query($con,"SELECT * FROM car_used_photo WHERE car_id = $car_id ORDER BY photo_id ASC ") or die("Getting records");
while($r2	=	mysqli_fetch_array($q2))
{ ?>
<img src="<?php echo $site_url; ?>/images/products/<?php echo $r2['photo_name']; ?>" width="350" class="img-responsive img-thumbnail">
<?php } ?>
</div>


<div class="clearfix"></div>


</div>

<?php } //if status!=0 ?>


</div>




<!--RELATED Youtube Video-->
<?php if($car_youtube!=""){?>
<div id="title">Video of <?php echo $car_name; ?></div>
<div id="area">
<iframe width="100%" height="400" src="<?php echo $car_youtube; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
</div>
<?php } ?>




<div id="title">News/Tips</div>
<div id="area">
<?php 
$cond = " AND (post_tags LIKE '%$brand_name%' OR post_tags LIKE '%$model_name%' OR post_tags LIKE '%$condition_name%')";
$sort = "ORDER BY post_id DESC";
$limit = "LIMIT 10";
include("post_links.php"); 
?>
</div>



<!--RELATED MORE USED CAR START-->
<div id="title">More <?php echo $brand_name; ?> <?php echo $model_name ?></div>

<div id="area">
<?php
$cond = " AND car_id!=$car_id AND model_id=$model_id";
$limit = "LIMIT 20";
include("used-car-list.php");
?>
<center><a href="<?php echo $site_url; ?>/model/<?php echo $model_slug; ?>/"><button class="btn btn-warning">More <?php echo $brand_name; ?> <?php echo $model_name; ?></button></a></center>
</div>




<!--RELATED MORE USED CAR START-->
<div id="title">You can also choose</div>

<div id="area">
<?php
$price1 = $car_price - ($car_price*.2);
$price2 = $car_price + ($car_price*.2);
$engine_cc1 = $engine_cc - ($engine_cc*.2);
$engine_cc2 = $engine_cc + ($engine_cc*.2);

$cond = " AND car_id!=$car_id AND car_price BETWEEN $price1 AND $price2 AND engine_cc BETWEEN $engine_cc1 AND $engine_cc2 AND (location_id=$location_id OR brand_id=$brand_id)";
$sort = "ORDER BY car_price ASC";
$limit = "LIMIT 100";
include("used-car-list.php");
?>
</div>