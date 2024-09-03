<div class="container-fluid">

<center>
	<h1><?php echo $brand_name; ?> <?php echo $model_name; ?> price in Bangladesh</h1>
</center>


<div id="title"><?php echo $brand_name; ?> <?php echo $model_name; ?></div>
<div id="area">
<?php
$cond = " AND model_id=$model_id";
$sort = "ORDER BY car_name ASC";
$limit = "LIMIT 100";

include("used-car-list.php");

?>
</div>

