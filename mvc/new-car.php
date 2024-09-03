<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo $site_url; ?>/" class="b-title">Home</a></li>

    <li class="breadcrumb-item active" aria-current="page"><?php echo $car_name; ?></li>
  </ol>
</nav>


<div id="title"><?php echo $car_name; ?></div>
<div id="area">

<?php

//update views
mysqli_query($con,"UPDATE car_new SET views=views+1 WHERE car_id=$car_id");


$q1 = mysqli_query($con,"SELECT * FROM car_new WHERE car_id=$car_id");
$r1=mysqli_fetch_array($q1);


$car_id=$r1['car_id'];
$car_name=$r1['car_name'];

$brand_id = $r1['brand_id'];
$brand_name = get_info("car_brands","brand_name","WHERE brand_id=".$r1["brand_id"]);

$model_id = $r1['model_id'];
$model_name = get_info("car_models","model_name","WHERE model_id=".$r1["model_id"]);

$edition_id = $r1['edition_id'];
$edition_title = get_info("car_editions","edition_title","WHERE edition_id=".$r1["edition_id"]);

$car_yom=$r1['car_yom'];
$engine_type=$r1['engine_type'];
$engine_cc=$r1['engine_cc'];
$engine_max_power=$r1['engine_max_power'];
$engine_max_torque=$r1['engine_max_torque'];
$engine_cylinders=$r1['engine_cylinders'];
$engine_cylinder_valves=$r1['engine_cylinder_valves'];
$engine_valve_configs=$r1['engine_valve_configs'];
$engine_fuel_supply_system=$r1['engine_fuel_supply_system'];

$trans_id=$r1['trans_id'];
$trans_name = get_info("car_transmissions","trans_name","WHERE trans_id=".$r1["trans_id"]);

$engine_gearbox=$r1['engine_gearbox'];
$engine_drive=$r1['engine_drive'];
$engine_compression_ratio=$r1['engine_compression_ratio'];
$engine_bore_stroke=$r1['engine_bore_stroke'];

$fuel_id=$r1['fuel_id'];
$fuel_name = get_info("car_fuels","fuel_name","WHERE fuel_id=".$r1["fuel_id"]);

$fuel_tank_capacity=$r1['fuel_tank_capacity'];
$fuel_mileage_city=$r1['fuel_mileage_city'];
$fuel_mileage_highway=$r1['fuel_mileage_highway'];

$performance_topspeed=$r1['performance_topspeed'];
$performance_acceleration_60=$r1['performance_acceleration_60'];
$performance_acceleration_100=$r1['performance_acceleration_100'];

$suspension_front=$r1['suspension_front'];
$suspension_rear=$r1['suspension_rear'];
$breaks_front=$r1['breaks_front'];
$breaks_rear=$r1['breaks_rear'];
$steering=$r1['steering'];

$type_id=$r1['type_id'];
$type_name = get_info("car_types","type_name","WHERE type_id=".$r1["type_id"]);

$body_length=$r1['body_length'];
$body_width=$r1['body_width'];
$body_height=$r1['body_height'];
$body_colors=$r1['body_colors'];
$body_doors=$r1['body_doors'];
$body_seats=$r1['body_seats'];
$body_boot_space=$r1['body_boot_space'];
$body_ground_clearance=$r1['body_ground_clearance'];
$body_tyres=$r1['body_tyres'];
$body_wheels=$r1['body_wheels'];
$body_wheelbase=$r1['body_wheelbase'];

$comfort=$r1['comfort'];
$interior=$r1['interior'];
$exterior=$r1['exterior'];
$safety=$r1['safety'];
$entertainments=$r1['entertainments'];
$communications=$r1['communications'];

$car_price=$r1['car_price'];
$add_date=$r1['add_date'];
$views=$r1['views'];
$status=$r1['status'];
?>

<?php if($status!=0){ ?>




<div id="bike_details">

<div class="col-sm-12">

<center><h3>Car Informtion</h3></center>
<center>
<?php
//photo
$photo = get_info("car_new_photos","photo_name", "WHERE car_id=".$r1["car_id"]." ORDER BY photo_id ASC LIMIT 1");

if($photo!=""){
  echo "<img src='$site_url/images/new-cars/$photo' class='img-responsive'>";
}

else{
  echo "<img src='$site_url/images/new-cars/noimage.jpg' class='img-responsive'>";
}

?>
</center>
<br>


  <div class="card card-bordered">
    <div class="card-header text-center bg-primary"><h3><?php echo $car_name; ?></h3></div>
    <div class="card-body">
      <table class="table table-striped table-bordered">
        <tbody>

<?php if($brand_name!=""){?>
        <tr>
          <td width="35%" style="color: #2F4F4F">Brand</td>
          <td><?php echo $brand_name; ?></td>
        </tr>
<?php } ?>

<?php if($model_name!=""){?>
        <tr>
          <td style="color: #2F4F4F">Model</td>
          <td><?php echo $model_name; ?></td>
        </tr>
<?php } ?>

<?php if($edition_title!=""){?>
        <tr>
          <td style="color: #2F4F4F">Edition</td>
          <td><?php echo $edition_title; ?></td>
        </tr>
<?php } ?>

<?php if($car_price>0){?>
        <tr>
          <td style="color: #2F4F4F">Car Price</td>
          <td><?php echo number_format_bd($car_price,2); ?>.00</td>
        </tr>
<?php } ?>

<?php if($car_price>0){?>
        <tr>
          <td style="color: #2F4F4F">Year Of MF</td>
          <td><?php echo $car_yom; ?></td>
        </tr>
<?php } ?>

        </tbody>
      </table>
    </div>
  </div>

<br>

  <div class="card card-bordered">
    <div class="card-header text-center bg-primary"><h3>Engine and Transmission</h3></div>
    <div class="card-body">
      <table class="table table-striped table-bordered">
        <tbody>

<?php if($engine_type!=""){?>   
        <tr>
          <td width="35%" style="color: #2F4F4F">Engine Type</td>
          <td><?php echo $engine_type; ?></td>
        </tr>
<?php } ?>

<?php if($engine_cc!=""){?>
        <tr>
          <td style="color: #2F4F4F">Engine CC</td>
          <td><?php echo $engine_cc; ?></td>
        </tr>
<?php } ?>

<?php if($engine_max_power!=""){?>
        <tr>
          <td style="color: #2F4F4F">Engine Max Power</td>
          <td><?php echo $engine_max_power; ?></td>
        </tr>
<?php } ?>

<?php if($engine_max_torque!=""){?>
        <tr>
          <td style="color: #2F4F4F">Engine Max Torque</td>
          <td><?php echo $engine_max_torque; ?></td>
        </tr>
<?php } ?>
        
<?php if($engine_cylinders!=""){?>
        <tr>
          <td style="color: #2F4F4F">Engine Cylinder</td>
          <td><?php echo $engine_cylinders; ?></td>
        </tr>
<?php } ?>

<?php if($engine_cylinder_valves!=""){?>
        <tr>
          <td style="color: #2F4F4F">Engine Cylinder Valves</td>
          <td><?php echo $engine_cylinder_valves; ?></td>
        </tr>
<?php } ?>

<?php if($engine_valve_configs!=""){?>
        <tr>
          <td style="color: #2F4F4F">Engine Valve Configs</td>
          <td><?php echo $engine_valve_configs; ?></td>
        </tr>
<?php } ?>

<?php if($engine_fuel_supply_system!=""){?>
        <tr>
          <td style="color: #2F4F4F">Engine Fuel Supply System</td>
          <td><?php echo $engine_fuel_supply_system; ?></td>
        </tr>
<?php } ?>

<?php if($trans_name!=""){?>
        <tr>
          <td style="color: #2F4F4F">Engine Transmission</td>
          <td><?php echo $trans_name; ?></td>
        </tr>
<?php } ?>

<?php if($engine_gearbox!=""){?>
        <tr>
          <td style="color: #2F4F4F">Engine Gearbox</td>
          <td><?php echo $engine_gearbox; ?></td>
        </tr>
<?php } ?>

<?php if($engine_drive!=""){?>
        <tr>
          <td style="color: #2F4F4F">Engine Drive</td>
          <td><?php echo $engine_drive; ?></td>
        </tr>
<?php } ?>

<?php if($engine_compression_ratio!=""){?>
        <tr>
          <td style="color: #2F4F4F">Engine Compression Ratio</td>
          <td><?php echo $engine_compression_ratio; ?></td>
        </tr>
<?php } ?>

<?php if($engine_bore_stroke!=""){?>
        <tr>
          <td style="color: #2F4F4F">Engine Bore Stroke</td>
          <td><?php echo $engine_bore_stroke; ?></td>
        </tr>
<?php } ?>  

        </tbody>
      </table>
    </div>
  </div>

<br>

  <div class="card card-bordered">
    <div class="card-header text-center bg-primary"><h3>Fuel</h3></div>
    <div class="card-body">
      <table class="table table-striped table-bordered">
        <tbody>

<?php if($fuel_name!=""){?>
        <tr>
          <td width="35%" style="color: #2F4F4F">Fuel</td>
          <td><?php echo $fuel_name; ?></td>
        </tr>
<?php } ?>

<?php if($fuel_tank_capacity!=""){?>
        <tr>
          <td style="color: #2F4F4F">Fuel Tank Capacity</td>
          <td><?php echo $fuel_tank_capacity; ?></td>
        </tr>
<?php } ?>

<?php if($fuel_mileage_city!=""){?>
        <tr>
          <td style="color: #2F4F4F">Fuel Mileage City</td>
          <td><?php echo $fuel_mileage_city; ?></td>
        </tr>
<?php } ?>

<?php if($fuel_mileage_highway!=""){?>
        <tr>
          <td style="color: #2F4F4F">Fuel Mileage Highway</td>
          <td><?php echo $fuel_mileage_highway; ?></td>
        </tr>
<?php } ?>

        </tbody>
      </table>
    </div>
  </div>

<br>

  <div class="card card-bordered">
    <div class="card-header text-center bg-primary"><h3>Performance</h3></div>
    <div class="card-body">
      <table class="table table-striped table-bordered">
        <tbody>

<?php if($performance_topspeed!=""){?>
        <tr>
          <td width="35%" style="color: #2F4F4F">Performance Topspeed</td>
          <td><?php echo $performance_topspeed; ?></td>
        </tr>
<?php } ?>

<?php if($performance_acceleration_60!=""){?>
        <tr>
          <td style="color: #2F4F4F">Performance Acceleration (60)</td>
          <td><?php echo $performance_acceleration_60; ?></td>
        </tr>
<?php } ?>

<?php if($performance_acceleration_100!=""){?>
        <tr>
          <td style="color: #2F4F4F">Performance Acceleration (100)</td>
          <td><?php echo $performance_acceleration_100; ?></td>
        </tr>
<?php } ?>

        </tbody>
      </table>
    </div>
  </div>

<br>

  <div class="card card-bordered">
    <div class="card-header text-center bg-primary"><h3>Suspension</h3></div>
    <div class="card-body">
      <table class="table table-striped table-bordered">
        <tbody>

<?php if($suspension_front!=""){?>
        <tr>
          <td width="35%" style="color: #2F4F4F">Suspension Front</td>
          <td><?php echo $suspension_front; ?></td>
        </tr>
<?php } ?>

<?php if($suspension_rear!=""){?>
        <tr>
          <td style="color: #2F4F4F">Suspension Rear</td>
          <td><?php echo $suspension_rear; ?></td>
        </tr>
<?php } ?>

        </tbody>
      </table>
    </div>
  </div>

<br>

  <div class="card card-bordered">
    <div class="card-header text-center bg-primary"><h3>Breaks</h3></div>
    <div class="card-body">
      <table class="table table-striped table-bordered">
        <tbody>

<?php if($breaks_front!=""){?>
        <tr>
          <td width="35%" style="color: #2F4F4F">Breaks Front</td>
          <td><?php echo $breaks_front; ?></td>
        </tr>
<?php } ?>

<?php if($breaks_rear!=""){?>
        <tr>
          <td style="color: #2F4F4F">Breaks Rear</td>
          <td><?php echo $breaks_rear; ?></td>
        </tr>
<?php } ?>

        </tbody>
      </table>
    </div>
  </div>

<br>

  <div class="card card-bordered">
    <div class="card-header text-center bg-primary"><h3>Steering</h3></div>
    <div class="card-body">
      <table class="table table-striped table-bordered">
        <tbody>

<?php if($steering!=""){?>
        <tr>
          <td width="35%" style="color: #2F4F4F">Steering</td>
          <td><?php echo $steering; ?></td>
        </tr>
<?php } ?>

        </tbody>
      </table>
    </div>
  </div>

<br>

  <div class="card card-bordered">
    <div class="card-header text-center bg-primary"><h3>Body</h3></div>
    <div class="card-body">
      <table class="table table-striped table-bordered">
        <tbody>

<?php if($type_name!=""){?>
        <tr>
          <td width="35%" style="color: #2F4F4F">Body Type</td>
          <td><?php echo $type_name; ?></td>
        </tr>
<?php } ?>

<?php if($body_length!=""){?>
        <tr>
          <td width="35%" style="color: #2F4F4F">Body Length</td>
          <td><?php echo $body_length; ?></td>
        </tr>
<?php } ?>

<?php if($body_width!=""){?>
        <tr>
          <td width="35%" style="color: #2F4F4F">Body Width</td>
          <td><?php echo $body_width; ?></td>
        </tr>
<?php } ?>

<?php if($body_height!=""){?>
        <tr>
          <td width="35%" style="color: #2F4F4F">Body Height</td>
          <td><?php echo $body_height; ?></td>
        </tr>
<?php } ?>

<?php if($body_colors!=""){?>
        <tr>
          <td width="35%" style="color: #2F4F4F">Body Colors</td>
          <td><?php echo $body_colors; ?></td>
        </tr>
<?php } ?>

<?php if($body_doors!=""){?>
        <tr>
          <td width="35%" style="color: #2F4F4F">Body Doors</td>
          <td><?php echo $body_doors; ?></td>
        </tr>
<?php } ?>

<?php if($body_seats!=""){?>
        <tr>
          <td width="35%" style="color: #2F4F4F">Body Seats</td>
          <td><?php echo $body_seats; ?></td>
        </tr>
<?php } ?>

<?php if($body_boot_space!=""){?>
        <tr>
          <td width="35%" style="color: #2F4F4F">Body Boot Space</td>
          <td><?php echo $body_boot_space; ?></td>
        </tr>
<?php } ?>

<?php if($body_ground_clearance!=""){?>
        <tr>
          <td width="35%" style="color: #2F4F4F">Body Ground Clearance</td>
          <td><?php echo $body_ground_clearance; ?></td>
        </tr>
<?php } ?>

<?php if($body_tyres!=""){?>
        <tr>
          <td width="35%" style="color: #2F4F4F">Body Tyre Size</td>
          <td><?php echo $body_tyres; ?></td>
        </tr>
<?php } ?>

<?php if($body_wheels!=""){?>
        <tr>
          <td width="35%" style="color: #2F4F4F">Body Wheel Size</td>
          <td><?php echo $body_wheels; ?></td>
        </tr>
<?php } ?>

<?php if($body_wheelbase!=""){?>
        <tr>
          <td width="35%" style="color: #2F4F4F">Body Wheelbase</td>
          <td><?php echo $body_wheelbase; ?></td>
        </tr>
<?php } ?>

        </tbody>
      </table>
    </div>
  </div>


<br>

  <div class="card card-bordered">
    <div class="card-header text-center bg-primary"><h3>Others</h3></div>
    <div class="card-body">
      <table class="table table-striped table-bordered">
        <tbody>

<?php if($comfort!=""){?> 
        <tr>
          <td width="35%" style="color: #2F4F4F">Comfort</td>
          <td><?php echo nl2br($comfort); ?></td>
        </tr>
<?php } ?>

<?php if($interior!=""){?> 
        <tr>
          <td width="35%" style="color: #2F4F4F">Interior</td>
          <td><?php echo nl2br($interior); ?></td>
        </tr>
<?php } ?>

<?php if($exterior!=""){?> 
        <tr>
          <td width="35%" style="color: #2F4F4F">Exterior</td>
          <td><?php echo nl2br($exterior); ?></td>
        </tr>
<?php } ?>

<?php if($safety!=""){?> 
        <tr>
          <td width="35%" style="color: #2F4F4F">Safety</td>
          <td><?php echo nl2br($safety); ?></td>
        </tr>
<?php } ?>

<?php if($entertainments!=""){?> 
        <tr>
          <td width="35%" style="color: #2F4F4F">Entertainments</td>
          <td><?php echo nl2br($entertainments); ?></td>
        </tr>
<?php } ?>

<?php if($communications!=""){?> 
        <tr>
          <td width="35%" style="color: #2F4F4F">Communications</td>
          <td><?php echo nl2br($communications); ?></td>
        </tr>
<?php } ?>

        </tbody>
      </table>
    </div>
  </div>

</div>

<div class="clearfix"></div>

<?php include("g_ads.php"); ?>
<hr>

<div class="col-sm-12">

</div>



<div class="col-sm-12">
<h3>More Photos</h3>
<?php
$q2		=	mysqli_query($con,"SELECT * FROM car_new_photos WHERE car_id = $car_id ORDER BY photo_id ASC ") or die("Getting records");
while($r2	=	mysqli_fetch_array($q2))
{ ?>
<img src="<?php echo $site_url; ?>/images/new-cars/<?php echo $r2['photo_name']; ?>" width="350" class="img-responsive img-thumbnail">
<?php } ?>
</div>


<div class="clearfix"></div>


</div>

<?php } //if status!=0 ?>


</div>


<hr>
<?php include("g_ads.php"); ?>
<hr>


<div id="title">You can also choose</div>
<br>
<?php

$cond = "";
$sort = "ORDER BY car_id DESC";
$limit = "LIMIT 10";
include("new-car-list.php");
?>