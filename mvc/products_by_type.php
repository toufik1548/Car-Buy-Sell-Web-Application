<div id="title"><?php echo $type_name; ?> used cars</div>
<div id="area">
<?php 
$cond = " AND type_id=$type_id";
$sort = "ORDER BY car_id DESC";
$limit = "LIMIT 100";
include("used_cars.php"); ?>
</div>