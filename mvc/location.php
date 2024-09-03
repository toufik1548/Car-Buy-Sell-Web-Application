<div class="container-fluid">
<?php

$qb = mysqli_query($con,"SELECT * FROM car_locations WHERE status=1 AND location_id=$location_id");
$rb = mysqli_fetch_assoc($qb);

//$views=$rb['views'];
$location_id = $rb['location_id'];
$location_name = $rb['location_name'];
$location_slug = $rb['location_slug'];
$parent_id = $rb['parent_id'];

?>

<h1>Used cars at 
	<?php 

	if($parent_location_id==0){
				//dhaka
			echo $location_name;

	}else{
				//uttara,dhaka
				echo $location_name.", ".$parent_location_name;
			}
	?>
</h1>



<div id="main-area">
<br>

<?php
//if location is parent and have sub location
if($parent_location_id==0){
		$location="";
			$ql = mysqli_query($con,"SELECT location_id FROM car_locations WHERE parent_id=$location_id");
			while ($rl=mysqli_fetch_assoc($ql)) {
			$location.= " location_id=".$rl["location_id"]." OR ";
			}
		$locations=" AND (".substr($location, 0, -3).")";	

}else{
		$locations = " AND location_id=$location_id";
}

?>

<?php
$cond = $locations;
$sort = "";
$limit = "LIMIT 200";
include("used-car-list.php");
?>
</div>

</div>
<!--/.container-fluid\-->