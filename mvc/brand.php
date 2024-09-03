<div class="container-fluid">
<?php
//update showroom views
mysqli_query($con,"UPDATE car_brands SET views=views+1 WHERE brand_id=$brand_id");

$qb = mysqli_query($con,"SELECT * FROM car_brands WHERE status=1 AND brand_id=$brand_id");
$rb = mysqli_fetch_assoc($qb);

//$views=$rb['views'];
$brand_id = $rb['brand_id'];
$brand_name = $rb['brand_name'];
$brand_slug = $rb['brand_slug'];
$brand_logo = $rb['brand_logo'];


?>




<center>
	<h1><?php echo $rb['brand_name']; ?> cars price in Bangladesh</h1>
	<?php
//photo
$photo = get_info("car_brands","brand_logo", "WHERE brand_id=".$brand_id."");

if($photo!=""){
	echo "<img src='$site_url/images/brands/logo/$photo' class='img-responsive'>";
}

else{
	echo "<img src='$site_url/images/brands/logo/noimage1.jpg' class='img-responsive'>";
}

?>
</center>


<div id="title"><?php echo $brand_name; ?> cars Bangladesh</div>
<div id="area">
<?php
$cond = " AND brand_id=$brand_id";
$sort = "ORDER BY car_name ASC";
$limit = "LIMIT 200";

include("used-car-list.php");

?>
</div>

<div id="title">News/Tips for <?php echo $brand_name; ?></div>
<div id="area">
<?php 
$cond = " AND (post_tags LIKE '%$brand_name%')";
$sort = "ORDER BY post_id DESC";
$limit = "LIMIT 10";
include("post_links.php"); 
?>
</div>