<?php if(isset($_POST['q'])){

	$q= strip_tags(trim($_POST['q']));
	$qq=": ".$q;
	$location_id = $_POST['location_id'];
	$user_ip 	 = getenv("REMOTE_ADDR");
	$add_date 	 = date('Y-m-d');



mysqli_query($con,"INSERT INTO `car_search` (`search_id`, `search_ip`, `location_id`, `search_word`, `add_date`) VALUES (NULL, '$user_ip', '$location_id', '$q', '$add_date');");

} 
?>
<div id="title">Search Result<?php if($qq==": "){echo "";} else{echo $qq;} ?></div>

<div id="area">

<?php

if($location_id==0){$locations=" location_id > 0";}elseif($location_id>0){

$locations = "";
$ql = mysqli_query($con,"SELECT location_id FROM car_locations WHERE parent_id=$location_id");
while($rl=mysqli_fetch_assoc($ql)){
$locations .= "location_id=".$rl['location_id']." OR ";
}
$locations = substr($locations, 0, -3);

}



$nw = get_total("car_used","car_id","WHERE car_name LIKE'%$q%'");

if($nw>0){$kword="car_name LIKE '%$q%'";}
else{
$sw = explode(" ", $q);
$kword="";
foreach ($sw as $word) {
	$kword .= "car_name LIKE '%$word%' OR ";
}
$kword = substr($kword, 0, -3);
}

$cond = " AND ($kword) AND ($locations)";
$sort = "ORDER BY car_id DESC";
$limit = "LIMIT 100";

include("used-car-list.php");
?>
</div>