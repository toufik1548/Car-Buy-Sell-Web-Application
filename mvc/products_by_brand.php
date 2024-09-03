<div id="title"><?php echo $brand_name; ?> used cars</div>
<div id="area">
<?php 
$cond = " AND brand_id=$brand_id";
$sort = "ORDER BY car_id DESC";
$limit = "LIMIT 100";
include("used_cars.php"); ?>
</div>