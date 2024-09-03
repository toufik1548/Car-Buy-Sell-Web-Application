<div id="title">Cars at <?php echo $location_name; ?></div>
<div id="area">
<?php
$parent_id = get_info("car_locations","parent_id","WHERE location_id=$location_id");
if($parent_id==0)
{
	$cnd = "";
		$qp = mysqli_query($con,"SELECT location_id FROM car_locations WHERE parent_id=$location_id");
		while($rp=mysqli_fetch_assoc($qp)){
$cnd .= "location_id=".$rp['location_id']." OR ";
		}
$cnd = substr($cnd,0,-3);
$cond = " AND ($cnd)";

}else{
$cond = " AND location_id=$location_id";
}

$sort = "ORDER BY car_id DESC";
$limit = "LIMIT 100";
include("used_cars.php"); ?>
</div>