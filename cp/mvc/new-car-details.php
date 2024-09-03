<?php

$car_id = $slug2;

?>

<?php


$qc = mysqli_query($con,"SELECT * FROM car_new WHERE car_id=$car_id");
$rc = mysqli_fetch_assoc($qc);

$car_id = $rc['car_id'];
$car_name = $rc['car_name'];

$brand_id = $rc['brand_id'];
$brand_name = get_info("car_brands","brand_name","WHERE brand_id=".$rc["brand_id"]);

$model_id = $rc['model_id'];
$model_name = get_info("car_models","model_name","WHERE model_id=".$rc["model_id"]);

$edition_id = $rc['edition_id'];
$edition_title = get_info("car_editions","edition_title","WHERE edition_id=".$rc["edition_id"]);

$car_yom = $rc['car_yom'];
$engine_type = $rc['engine_type'];
$engine_cc = $rc['engine_cc'];
$engine_max_power = $rc['engine_max_power'];
$engine_max_torque = $rc['engine_max_torque'];
$engine_cylinders = $rc['engine_cylinders'];
$engine_cylinder_valves = $rc['engine_cylinder_valves'];
$engine_valve_configs = $rc['engine_valve_configs'];
$engine_fuel_supply_system = $rc['engine_fuel_supply_system'];

$trans_id = $rc['trans_id'];
$trans_name = get_info("car_transmissions","trans_name","WHERE trans_id=".$rc["trans_id"]);

$engine_gearbox = $rc['engine_gearbox'];
$engine_drive = $rc['engine_drive'];
$engine_compression_ratio = $rc['engine_compression_ratio'];
$engine_bore_stroke = $rc['engine_bore_stroke'];

$fuel_id = $rc['fuel_id'];
$fuel_name = get_info("car_fuels","fuel_name","WHERE fuel_id=".$rc["fuel_id"]);

$fuel_tank_capacity = $rc['fuel_tank_capacity'];
$fuel_mileage_city = $rc['fuel_mileage_city'];
$fuel_mileage_highway = $rc['fuel_mileage_highway'];
$performance_topspeed = $rc['performance_topspeed'];
$performance_acceleration_60 = $rc['performance_acceleration_60'];
$performance_acceleration_100 = $rc['performance_acceleration_100'];
$suspension_front = $rc['suspension_front'];
$suspension_rear = $rc['suspension_rear'];
$breaks_front = $rc['breaks_front'];
$breaks_rear = $rc['breaks_rear'];
$steering = $rc['steering'];

$type_id = $rc['type_id'];
$type_name = get_info("car_types","type_name","WHERE type_id=".$rc["type_id"]);

$body_length = $rc['body_length'];
$body_width = $rc['body_width'];
$body_height = $rc['body_height'];
$body_colors = $rc['body_colors'];
$body_doors = $rc['body_doors'];
$body_seats = $rc['body_seats'];
$body_boot_space = $rc['body_boot_space'];
$body_ground_clearance = $rc['body_ground_clearance'];
$body_tyres = $rc['body_tyres'];
$body_wheels = $rc['body_wheels'];
$body_wheelbase = $rc['body_wheelbase'];
$comfort = $rc['comfort'];
$interior = $rc['interior'];
$exterior = $rc['exterior'];
$safety = $rc['safety'];
$entertainments = $rc['entertainments'];
$communications = $rc['communications'];
$car_price = $rc['car_price'];
$add_date = $rc['add_date'];

?>

<div class="container border">
<br>

	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>/">Dashboard</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>/new-car-list/">New Car List</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Details</li>
	  </ol>
	</nav>
	
	<div class="card">
		<div class="card-header">
	    	<center>
		    	<span class="badge badge-pill badge-light">
		    	<h3>&nbsp; <?php echo $car_name; ?> Details &nbsp; </h3>
		    	</span>
	    	</center>
	  	</div>
	  	<div class="card-body" >

<table width="100%" class="table table-bordered">
<tbody>
	<tr>
		<td width="30%"><b>Car Photo:</b></td>
		<td align="center">
<?php
//photo
$photo = get_info("car_new_photos","photo_name", "WHERE car_id=".$rc["car_id"]." ORDER BY photo_id ASC LIMIT 1");

if($photo!=""){
  echo "<img src='$cp_url/../images/new-cars/$photo' class='img-responsive' style='width:50%; height:50%;'>";
}

else{
  echo "<img src='$cp_url/../images/new-cars/noimage.jpg' class='img-responsive' width='50%' height='50%'>";
}

?>

    </td>
	</tr>
	<tr>
		<td><b>Car ID:</b></td>
		<td><?php echo $car_id; ?></td>
	</tr>
	<tr>
		<td><b>Add Date:</b></td>
		<td><?php echo $add_date; ?></td>
	</tr>
	<tr>
		<td><b>Brand:</b></td>
		<td><?php echo $brand_name; ?></td>
	</tr>
	<tr>
		<td><b>Model:</b></td>
		<td><?php echo $model_name; ?></td>
	</tr>
	<tr>
		<td><b>Edition:</b></td>
		<td><?php echo $edition_title; ?></td>
	</tr>
	<tr>
		<td><b>Year of MF:</b></td>
		<td><?php echo $car_yom; ?></td>
	</tr>
	<tr>
		<td><b>Price:</b></td>
		<td><?php echo number_format("$car_price"); ?> TK</td>
	</tr>
	<tr>
    	<td colspan="2" align="center"><font size="4" color="red"><strong>Engine and Transmission</strong></font></td>
  	</tr>
	<tr>
		<td><b>Engine Type:</b></td>
		<td><?php echo $engine_type; ?></td>
	</tr>
	<tr>
		<td><b>Engine CC:</b></td>
		<td><?php echo $engine_cc; ?></td>
	</tr>
	<tr>
		<td><b>Engine Max Power:</b></td>
		<td><?php echo $engine_max_power; ?></td>
	</tr>
	<tr>
		<td><b>Engine Max Torque:</b></td>
		<td><?php echo $engine_max_torque; ?></td>
	</tr>
	<tr>
		<td><b>Engine Cylinders:</b></td>
		<td><?php echo $engine_cylinders; ?></td>
	</tr>
	<tr>
		<td><b>Engine Cylinder Valves:</b></td>
		<td><?php echo $engine_cylinder_valves; ?></td>
	</tr>
	<tr>
		<td><b>Engine Valve Configs:</b></td>
		<td><?php echo $engine_valve_configs; ?></td>
	</tr>
	<tr>
		<td><b>Engine Fuel Supply System:</b></td>
		<td><?php echo $engine_fuel_supply_system; ?></td>
	</tr>
	<tr>
		<td><b>Transmissions:</b></td>
		<td><?php echo $trans_name; ?></td>
	</tr>
	<tr>
		<td><b>Engine Gearbox:</b></td>
		<td><?php echo $engine_gearbox; ?></td>
	</tr>
	<tr>
		<td><b>Engine Drive:</b></td>
		<td><?php echo $engine_drive; ?></td>
	</tr>
	<tr>
		<td><b>Engine Compression Ratio:</b></td>
		<td><?php echo $engine_compression_ratio; ?></td>
	</tr>
	<tr>
		<td><b>Engine Bore Stroke:</b></td>
		<td><?php echo $engine_bore_stroke; ?></td>
	</tr>
	<tr>
    	<td colspan="2" align="center"><font size="4" color="red"><strong>Fuel</strong></font></td>
  	</tr>
	<tr>
		<td><b>Fuel:</b></td>
		<td><?php echo $fuel_name; ?></td>
	</tr>
	<tr>
		<td><b>Fuel Tank Capacity:</b></td>
		<td><?php echo $fuel_tank_capacity; ?></td>
	</tr>
	<tr>
		<td><b>Fuel Mileage City:</b></td>
		<td><?php echo $fuel_mileage_city; ?></td>
	</tr>
	<tr>
		<td><b>Fuel Mileage Highway:</b></td>
		<td><?php echo $fuel_mileage_highway; ?></td>
	</tr>
	<tr>
    	<td colspan="2" align="center"><font size="4" color="red"><strong>Performance</strong></font></td>
  	</tr>
	<tr>
		<td><b>Performance Topspeed:</b></td>
		<td><?php echo $performance_topspeed; ?></td>
	</tr>
	<tr>
		<td><b>Performance Acceleration (60):</b></td>
		<td><?php echo $performance_acceleration_60; ?></td>
	</tr>
	<tr>
		<td><b>Performance Acceleration (100):</b></td>
		<td><?php echo $performance_acceleration_100; ?></td>
	</tr>
	<tr>
    	<td colspan="2" align="center"><font size="4" color="red"><strong>Suspensions</strong></font></td>
  	</tr>
	<tr>
		<td><b>Suspension Front:</b></td>
		<td><?php echo $suspension_front; ?></td>
	</tr>
	<tr>
		<td><b>Suspension Rear:</b></td>
		<td><?php echo $suspension_rear; ?></td>
	</tr>
	<tr>
    	<td colspan="2" align="center"><font size="4" color="red"><strong>Breaks</strong></font></td>
  	</tr>
	<tr>
		<td><b>Breaks Front:</b></td>
		<td><?php echo $breaks_front; ?></td>
	</tr>
	<tr>
		<td><b>Breaks Rear:</b></td>
		<td><?php echo $breaks_rear; ?></td>
	</tr>
	<tr>
    	<td colspan="2" align="center"><font size="4" color="red"><strong>Steering</strong></font></td>
  	</tr>
	<tr>
		<td><b>Steering:</b></td>
		<td><?php echo nl2br($steering); ?></td>
	</tr>
	<tr>
    	<td colspan="2" align="center"><font size="4" color="red"><strong>Body</strong></font></td>
  	</tr>
	<tr>
		<td><b>Body Type:</b></td>
		<td><?php echo $type_name; ?></td>
	</tr>
	<tr>
		<td><b>Body Length:</b></td>
		<td><?php echo $body_length; ?></td>
	</tr>
	<tr>
		<td><b>Body Width:</b></td>
		<td><?php echo $body_width; ?></td>
	</tr>
	<tr>
		<td><b>Body Height:</b></td>
		<td><?php echo $body_height; ?></td>
	</tr>
	<tr>
		<td><b>Body Colors:</b></td>
		<td><?php echo $body_colors; ?></td>
	</tr>
	<tr>
		<td><b>Body Doors:</b></td>
		<td><?php echo $body_doors; ?></td>
	</tr>
	<tr>
		<td><b>Body Seats:</b></td>
		<td><?php echo $body_seats; ?></td>
	</tr>
	<tr>
		<td><b>Body Boot Space:</b></td>
		<td><?php echo $body_boot_space; ?></td>
	</tr>
	<tr>
		<td><b>Body Ground Clearance:</b></td>
		<td><?php echo $body_ground_clearance; ?></td>
	</tr>
	<tr>
		<td><b>Body Tyre Size:</b></td>
		<td><?php echo $body_tyres; ?></td>
	</tr>
	<tr>
		<td><b>Body Wheel Size:</b></td>
		<td><?php echo $body_wheels; ?></td>
	</tr>
	<tr>
		<td><b>Body Wheelbase:</b></td>
		<td><?php echo $body_wheelbase; ?></td>
	</tr>
	<tr>
    	<td colspan="2" align="center"><font size="4" color="red"><strong>Others</strong></font></td>
  	</tr>
	<tr>
		<td><b>Comfort:</b></td>
		<td><?php echo nl2br($comfort); ?></td>
	</tr>
	<tr>
		<td><b>Interior:</b></td>
		<td><?php echo nl2br($interior); ?></td>
	</tr>
	<tr>
		<td><b>Exterior:</b></td>
		<td><?php echo nl2br($exterior); ?></td>
	</tr>
	<tr>
		<td><b>Safety:</b></td>
		<td><?php echo nl2br($safety); ?></td>
	</tr>
	<tr>
		<td><b>Entertainments:</b></td>
		<td><?php echo nl2br($entertainments); ?></td>
	</tr>
	<tr>
		<td><b>Communications:</b></td>
		<td><?php echo nl2br($communications); ?></td>
	</tr>
</tbody>
</table>
<br>

<a href="<?php echo $cp_url; ?>/new-car-edit/<?php echo $car_id; ?>/">
      <button type="button" class="btn btn-info btn-sm">EDIT</button></a>

  		</div>
		<!-- /.Card Body End -->
	</div>
	<!-- /.Card End -->
<br><center><a title="Back to Top" href="#top"><button type="button" class="btn btn-dark btn-sm">Back To Top</button></a></center><br>
  
</div>
<!-- /.Container End -->