<?php
if($slug2=="toyota-car-under-10-lakh-in-bangladesh"){
$cond = " AND brand_id=10 AND car_price<=1000000";
$sort = "ORDER BY car_id DESC";
$limit = "";
}
?>

<h1><?php echo $title; ?></h1>

<div id="title"><?php echo $title; ?></div>
<div id="area">
<?php

include("used-car-list.php");

?>
</div>