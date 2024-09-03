<div id="title">Filter Results</div>
	<div id="area">

<?php 
if(isset($_POST['action'])){ ?>



<?php
	$location_id 	= $_POST['loc_id'];
	$brand_id 		= $_POST['brand_id'];
	$price_min		= addslashes(trim($_POST['price_min']));
	$price_max		= addslashes(trim($_POST['price_max']));
	$sort			= $_POST['sort'];

	$user_ip 	=	getenv("REMOTE_ADDR");	// user ip
	$add_date 	= date('Y-m-d');

	//echo $add_date; 

mysqli_query($con,"INSERT INTO `used_car_filters` (`filter_id`, `location_id`, `brand_id`, `price_min`, `price_max`, `user_ip`, `add_date`) VALUES (NULL, '$location_id', '$brand_id', '$price_min', '$price_max', '$user_ip', '$add_date');");




//location

if($location_id==0){$locations=" location_id > 0";}elseif($location_id>0){

$locations = "";
$ql = mysqli_query($con,"SELECT location_id FROM car_locations WHERE parent_id=$location_id");
while($rl=mysqli_fetch_assoc($ql)){
$locations .= "location_id=".$rl['location_id']." OR ";
}
$locations = substr($locations, 0, -3);

}


//brand
if($brand_id==0){$brand="";}else{$brand="AND brand_id=$brand_id";}


//price
$price="AND car_price between $price_min AND $price_max";

if($sort=="price_min_max"){$sort = "ORDER BY car_price ASC";}
elseif($sort=="price_max_min"){$sort = "ORDER BY car_price DESC";}

?>


<?php
$cond="$brand $price AND ($locations)";
$sort="$sort";
$limit="LIMIT 200";
include("used-car-list.php");
 ?>

<?php } ?>

</div>
