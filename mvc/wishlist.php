<h4 align="center">Wishlist</h4>

<?php
$ids = "";
$qc  = mysqli_query($con,"SELECT car_id FROM car_wishlist WHERE user_id=$sess_user_id AND status=1");
while($rc = mysqli_fetch_assoc($qc)){
	$ids .= "car_id=".$rc['car_id']." OR ";
}
$car_ids = substr($ids, 0, -3);
?>

<?php
$cond = " AND ($car_ids)";
$sort = "ORDER BY car_id DESC";
$limit = "LIMIT 10";
include("wishlist_cars.php");
?>