<!-- Begin Page Content -->
<div class="container-fluid">
<br>

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>/">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>/new-car-list/">New Car List</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edit New Car</li>
    </ol>
  </nav>

  <div class="card">
    <div class="card-header">
      <center>
        <span class="badge badge-pill badge-light">
         <h3> &nbsp; Edit New Car &nbsp; </h3>
        </span>
      </center>
    </div>
    <div class="card-body">
<?php
$car_id=$slug2;

if (isset($_POST["update"])) {

$brand_id=$_POST["brand_id"];
$model_id=$_POST["model_id"];
$car_name=addslashes($_POST["car_name"]);
$car_yom=addslashes($_POST["car_yom"]);
$engine_type=addslashes($_POST["engine_type"]);
$engine_cc=addslashes($_POST["engine_cc"]);
$engine_max_power=addslashes($_POST["engine_max_power"]);
$engine_max_torque=addslashes($_POST["engine_max_torque"]);
$engine_cylinders=addslashes($_POST["engine_cylinders"]);
$engine_cylinder_valves=addslashes($_POST["engine_cylinder_valves"]);
$engine_valve_configs=addslashes($_POST["engine_valve_configs"]);
$engine_fuel_supply_system=addslashes($_POST["engine_fuel_supply_system"]);
$trans_id=$_POST["trans_id"];
$engine_gearbox=addslashes($_POST["engine_gearbox"]);
$engine_drive=addslashes($_POST["engine_drive"]);
$engine_compression_ratio=addslashes($_POST["engine_compression_ratio"]);
$engine_bore_stroke=addslashes($_POST["engine_bore_stroke"]);
$fuel_id=$_POST["fuel_id"];
$fuel_tank_capacity=addslashes($_POST["fuel_tank_capacity"]);
$fuel_mileage_city=addslashes($_POST["fuel_mileage_city"]);
$fuel_mileage_highway=addslashes($_POST["fuel_mileage_highway"]);
$performance_topspeed=addslashes($_POST["performance_topspeed"]);
$performance_acceleration_60=addslashes($_POST["performance_acceleration_60"]);
$performance_acceleration_100=addslashes($_POST["performance_acceleration_100"]);
$suspension_front=addslashes($_POST["suspension_front"]);
$suspension_rear=addslashes($_POST["suspension_rear"]);
$breaks_front=addslashes($_POST["breaks_front"]);
$breaks_rear=addslashes($_POST["breaks_rear"]);
$steering=addslashes($_POST["steering"]);
$type_id=$_POST["type_id"];
$body_length=addslashes($_POST["body_length"]);
$body_width=addslashes($_POST["body_width"]);
$body_height=addslashes($_POST["body_height"]);
$body_colors=addslashes($_POST["body_colors"]);
$body_doors=addslashes($_POST["body_doors"]);
$body_seats=addslashes($_POST["body_seats"]);
$body_boot_space=addslashes($_POST["body_boot_space"]);
$body_ground_clearance=addslashes($_POST["body_ground_clearance"]);
$body_tyres=addslashes($_POST["body_tyres"]);
$body_wheels=addslashes($_POST["body_wheels"]);
$body_wheelbase=addslashes($_POST["body_wheelbase"]);
$comfort=addslashes($_POST["comfort"]);
$interior=addslashes($_POST["interior"]);
$exterior=addslashes($_POST["exterior"]);
$safety=addslashes($_POST["safety"]);
$entertainments=addslashes($_POST["entertainments"]);
$communications=addslashes($_POST["communications"]);
$car_price=addslashes($_POST["car_price"]);
$status=addslashes($_POST["status"]);

$q=mysqli_query($con, 
  "UPDATE `car_new` SET 
  brand_id='$brand_id',
  model_id='$model_id',
  car_name='$car_name',
  car_yom='$car_yom',
  engine_type='$engine_type',
  engine_cc='$engine_cc',
  engine_max_power='$engine_max_power',
  engine_max_torque='$engine_max_torque',
  engine_cylinders='$engine_cylinders',
  engine_cylinder_valves='$engine_cylinder_valves',
  engine_valve_configs='$engine_valve_configs',
  engine_fuel_supply_system='$engine_fuel_supply_system',
  trans_id='$trans_id',
  engine_gearbox='$engine_gearbox',
  engine_drive='$engine_drive',
  engine_compression_ratio='$engine_compression_ratio',
  engine_bore_stroke='$engine_bore_stroke',
  fuel_id='$fuel_id',
  fuel_tank_capacity='$fuel_tank_capacity',
  fuel_mileage_city='$fuel_mileage_city',
  fuel_mileage_highway='$fuel_mileage_highway',
  performance_topspeed='$performance_topspeed',
  performance_acceleration_60='$performance_acceleration_60',
  performance_acceleration_100='$performance_acceleration_100',
  suspension_front='$suspension_front',
  suspension_rear='$suspension_rear',
  breaks_front='$breaks_front',
  breaks_rear='$breaks_rear',
  steering='$steering',
  type_id='$type_id',
  body_length='$body_length',
  body_width='$body_width',
  body_height='$body_height',
  body_colors='$body_colors',
  body_doors='$body_doors',
  body_seats='$body_seats',
  body_boot_space='$body_boot_space',
  body_ground_clearance='$body_ground_clearance',
  body_tyres='$body_tyres',
  body_wheels='$body_wheels',
  body_wheelbase='$body_wheelbase',
  comfort='$comfort',
  interior='$interior',
  exterior='$exterior',
  safety='$safety',
  entertainments='$entertainments',
  communications='$communications',
  car_price='$car_price',
  status='$status'
  WHERE car_id=$car_id");


if($q){
  echo "<div class='alert alert-success alert-dismissible' role='alert'>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  <b>New Car Updated Successfully!</b>
</div>";

}
else{ 
  echo "<div class='alert alert-danger alert-dismissible' role='alert'>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  <b>Wrong or mismatch!</b>
</div>";
}

}
?>


<?php
$q = mysqli_query($con,"SELECT *  FROM car_new WHERE car_id=$car_id");
$r=mysqli_fetch_assoc($q);

?>
<form name="form1" method="POST" action="">
  <table class="table table-striped table-bordered">
    <tbody>
  <tr>
    <td width="30%">
      <font size="3" color="#484848"><b>Car Name</b> <small style="color:red">*</small></font>
    </td>
    <td>
      <input type="text" name="car_name" class="form-control" id="text" placeholder="" value="<?php echo $r['car_name'];?>">
      <small id="small"></small>
    </td>
  </tr>
  <tr>
    <td>
      <font size="3" color="#484848"><b>Brand</b></font>
    </td>
    <td>
<select name="brand_id" style="width:200px">
  <option value="0">Select Brand</option>
  <?php
  $qb = mysqli_query($con,"SELECT brand_id,brand_name FROM car_brands ORDER BY brand_name ASC");
  while($rb=mysqli_fetch_assoc($qb)){?>
<option value="<?php echo $rb['brand_id']; ?>"
<?php if($r['brand_id']==$rb['brand_id']){echo "Selected";}?>
  ><?php echo $rb['brand_name']; ?></option>
  <?php } ?>
</select>
    </td>
  </tr>
  <tr>
    <td>
      <font size="3" color="#484848"><b>Model</b></font>
    </td>
    <td>
<select name="model_id" style="width:200px">
<?php
$qm = mysqli_query($con,"SELECT * FROM car_models ORDER BY model_name ASC");
while($rm=mysqli_fetch_assoc($qm)){?>
<option value="<?php echo $rm["model_id"]; ?>" 
  <?php if($r['model_id']==$rm["model_id"]){echo " Selected";}?>><?php echo $rm["model_name"]; ?></option>
<?php 
}
?>
</select>
    </td>
  </tr>
  <tr>
    <td>
      <font size="3" color="#484848"><b>Edition</b></font>
    </td>
    <td>
<select name="edition_id" style="width:200px">
  <option value="0">Select Edition</option>
  <?php
  $qe = mysqli_query($con,"SELECT edition_id,edition_title FROM car_editions ORDER BY edition_title ASC");
  while($re=mysqli_fetch_assoc($qe)){?>
<option value="<?php echo $re['edition_id']; ?>"
<?php if($r['edition_id']==$re['edition_id']){echo "Selected";}?>
  ><?php echo $re['edition_title']; ?></option>
  <?php } ?>
</select>
    </td>
  </tr>
  <tr>
    <td>
    <font size="3" color="#484848"><b>Year of Manufacture</b></font>
    </td>
    <td>
      <input type="text" name="car_yom" class="form-control" id="text" placeholder="" value="<?php echo $r['car_yom'];?>">
      <small id="small"></small>
    </td>
  </tr>

<!--Engine-->
  <tr>
    <td colspan="2" align="center"><font size="5" color="red"><strong>Engine and Transmission</strong></font></td>
  </tr>
  <tr>
    <td>
      <font size="3" color="#484848"><b>Engine Type</b></font>
    </td>
    <td>
      <input type="text" name="engine_type" class="form-control" id="text" placeholder="" value="<?php echo $r['engine_type'];?>">
      <small id="small"></small>
    </td>
  </tr>
  <tr>
    <td>
      <font size="3" color="#484848"><b>Engine CC</b></font>
    </td>
    <td>
      <input type="text" name="engine_cc" class="form-control" id="text" placeholder="" value="<?php echo $r['engine_cc'];?>">
      <small id="small"></small>
    </td>
  </tr>
  <tr>
    <td>
      <font size="3" color="#484848"><b>Engine Max Power</b></font>
    </td>
    <td>
      <input type="text" name="engine_max_power" class="form-control" id="text" placeholder="" value="<?php echo $r['engine_max_power'];?>">
      <small id="small"></small>
    </td>
  </tr>
  <tr>
    <td>
      <font size="3" color="#484848"><b>Engine Max Torque</b></font>
    </td>
    <td>
      <input type="text" name="engine_max_torque" class="form-control" id="text" placeholder="" value="<?php echo $r['engine_max_torque'];?>">
      <small id="small"></small>
    </td>
  </tr>
  <tr>
    <td>
      <font size="3" color="#484848"><b>Engine Cylinder</b></font>
    </td>
    <td>
      <input type="text" name="engine_cylinders" class="form-control" id="text" placeholder="" value="<?php echo $r['engine_cylinders'];?>">
      <small id="small"></small>
    </td>
  </tr>
  <tr>
    <td>
      <font size="3" color="#484848"><b>Engine Cylinder Valves</b></font>
    </td>
    <td>
      <input type="text" name="engine_cylinder_valves" class="form-control" id="text" placeholder="" value="<?php echo $r['engine_cylinder_valves'];?>">
      <small id="small"></small>
    </td>
  </tr>
  <tr>
    <td>
      <font size="3" color="#484848"><b>Engine Fuel Supply System</b></font>
    </td>
    <td>
      <input type="text" name="engine_valve_configs" class="form-control" id="text" placeholder="" value="<?php echo $r['engine_valve_configs'];?>">
      <small id="small"></small>
    </td>
  </tr>
  <tr>
    <td>
      <font size="3" color="#484848"><b>Engine Transmission</b></font>
    </td>
    <td>
      <input type="text" name="engine_fuel_supply_system" class="form-control" id="text" placeholder="" value="<?php echo $r['engine_fuel_supply_system'];?>">
      <small id="small"></small>
    </td>
  </tr>
  <tr>
    <td>
      <font size="3" color="#484848"><b>Engine Gearbox</b></font>
    </td>
    <td>
<select name="trans_id">
  <?php
  $qt = mysqli_query($con,"SELECT trans_id,trans_name FROM car_transmissions ORDER BY trans_name ASC");
  while($rt=mysqli_fetch_assoc($qt)){?>
<option value="<?php echo $rt['trans_id']; ?>"
<?php if($r['trans_id']==$rt['trans_id']){echo "Selected";}?>
  ><?php echo $rt['trans_name']; ?></option>
  <?php } ?>
</select>
    </td>
  </tr>
  <tr>
    <td>
      <font size="3" color="#484848"><b>Engine Gearbox</b></font>
    </td>
    <td>
      <input type="text" name="engine_gearbox" class="form-control" id="text" placeholder="" value="<?php echo $r['engine_gearbox'];?>">
      <small id="small"></small>
    </td>
  </tr>
  <tr>
    <td>
      <font size="3" color="#484848"><b>Engine Drive Type</b></font>
    </td>
    <td>
      <input type="text" name="engine_drive" class="form-control" id="text" placeholder="" value="<?php echo $r['engine_drive'];?>">
      <small id="small"></small>
    </td>
  </tr>
  <tr>
    <td>
      <font size="3" color="#484848"><b>Engine Compression Ratio</b></font>
    </td>
    <td>
      <input type="text" name="engine_compression_ratio" class="form-control" id="text" placeholder="" value="<?php echo $r['engine_compression_ratio'];?>">
      <small id="small"></small>
    </td>
  </tr>
  <tr>
    <td>
      <font size="3" color="#484848"><b>Engine Bore Stroke</b></font>
    </td>
    <td>
      <input type="text" name="engine_bore_stroke" class="form-control" id="text" placeholder="" value="<?php echo $r['engine_bore_stroke'];?>">
      <small id="small"></small>
    </td>
  </tr> 

<!--Fuel-->
  <tr>
    <td colspan="2" align="center"><font size="5" color="red"><strong>Fuel</strong></font></td>
  </tr>
  <tr>
    <td>
      <font size="3" color="#484848"><b>Fuel Type</b></font>
    </td>
    <td>
<select name="fuel_id">
  <option value="0">Select Fuel</option>
  <?php
  $qf = mysqli_query($con,"SELECT fuel_id,fuel_name FROM car_fuels ORDER BY fuel_name ASC");
  while($rf=mysqli_fetch_assoc($qf)){?>
<option value="<?php echo $rf['fuel_id']; ?>"
<?php if($r['fuel_id']==$rf['fuel_id']){echo "Selected";}?>
  ><?php echo $rf['fuel_name']; ?></option>
  <?php } ?>
</select>
    </td>
  </tr>
  <tr>
    <td>
      <font size="3" color="#484848"><b>Fuel Tank Capacity (Litres)</b></font>
    </td>
    <td>
      <input type="text" name="fuel_tank_capacity" class="form-control" id="text" placeholder="" value="<?php echo $r['fuel_tank_capacity'];?>">
      <small id="small"></small>
    </td>
  </tr>
  <tr>
    <td>
      <font size="3" color="#484848"><b>Fuel Mileage City</b></font>
    </td>
    <td>
      <input type="text" name="fuel_mileage_city" class="form-control" id="text" placeholder="" value="<?php echo $r['fuel_mileage_city'];?>">
      <small id="small"></small>
    </td>
  </tr>
  <tr>
    <td>
      <font size="3" color="#484848"><b>Fuel Mileage Highway</b></font>
    </td>
    <td>
      <input type="text" name="fuel_mileage_highway" class="form-control" id="text" placeholder="" value="<?php echo $r['fuel_mileage_highway'];?>">
      <small id="small"></small>
    </td>
  </tr> 

<!--Performance--> 
  <tr>
    <td colspan="2" align="center"><font size="5" color="red"><strong>Performance</strong></font></td>
  </tr>
  <tr>
  <tr>
    <td>
          <font size="3" color="#484848"><b>Performance Topspeed</b></font>
    </td>
    <td>
      <input type="text" name="performance_topspeed" class="form-control" id="text" placeholder="" value="<?php echo $r['performance_topspeed'];?>">
      <small id="small"></small>
    </td>
  </tr>
  <tr>
    <td>
          <font size="3" color="#484848"><b>Performance Acceleration (60)</b></font>
    </td>
    <td>
      <input type="text" name="performance_acceleration_60" class="form-control" id="text" placeholder="" value="<?php echo $r['performance_acceleration_60'];?>">
      <small id="small"></small>
    </td>
  </tr>
  <tr>
    <td>
          <font size="3" color="#484848"><b>Performance Acceleration (100)</b></font>
    </td>
    <td>
      <input type="text" name="performance_acceleration_100" class="form-control" id="text" placeholder="" value="<?php echo $r['performance_acceleration_100'];?>">
      <small id="small"></small>
    </td>
  </tr>

<!--Suspensions-->
  <tr>
    <td colspan="2" align="center"><font size="5" color="red"><strong>Suspensions</strong></font></td>
  </tr>
  <tr>
    <td>
          <font size="3" color="#484848"><b>Suspension Front</b></font>
    </td>
    <td>
      <input type="text" name="suspension_front" class="form-control" id="text" placeholder="" value="<?php echo $r['suspension_front'];?>">
      <small id="small"></small>
    </td>
  </tr>
  <tr>
    <td>
          <font size="3" color="#484848"><b>Suspension Rear</b></font>
    </td>
    <td>
      <input type="text" name="suspension_rear" class="form-control" id="text" placeholder="" value="<?php echo $r['suspension_rear'];?>">
      <small id="small"></small>
    </td>
  </tr>

<!--Breaks-->
  <tr>
    <td colspan="2" align="center"><font size="5" color="red"><strong>Brakes</strong></font></td>
  </tr>
  <tr>
    <td>
          <font size="3" color="#484848"><b>Breaks Front</b></font>
    </td>
    <td>
      <input type="text" name="breaks_front" class="form-control" id="text" placeholder="" value="<?php echo $r['breaks_front'];?>">
      <small id="small"></small>
    </td>
  </tr>
  <tr>
    <td>
          <font size="3" color="#484848"><b>Breaks Rear</b></font>
    </td>
    <td>
      <input type="text" name="breaks_rear" class="form-control" id="text" placeholder="" value="<?php echo $r['breaks_rear'];?>">
      <small id="small"></small>
    </td>
  </tr>

<!--Steering-->
  <tr>
    <td colspan="2" align="center"><font size="5" color="red"><strong>Steering</strong></font></td>
  </tr>
  <tr>
    <td>
          <font size="3" color="#484848"><b>Steering</b></font>
    </td>
    <td>
        <textarea name="steering" cols="50" rows="3" class="form-control" id="text"><?php echo $r['steering'];?></textarea>
        <small id="small"></small>
    </td>
  </tr>

<!--Body-->
  <tr>
    <td colspan="2" align="center"><font size="5" color="red"><strong>Body</strong></font></td>
  </tr>
  <tr>
    <td>
          <font size="3" color="#484848"><b>Body Type</b></font>
    </td>
    <td>
<select name="type_id">
  <option value="0">Select Body Type</option>
  <?php
  $qbt = mysqli_query($con,"SELECT type_id,type_name FROM car_types ORDER BY type_name ASC");
  while($rbt=mysqli_fetch_assoc($qbt)){?>
<option value="<?php echo $rbt['type_id']; ?>"
<?php if($r['type_id']==$rbt['type_id']){echo "Selected";}?>
  ><?php echo $rbt['type_name']; ?></option>
  <?php } ?>
</select>
    </td>
  </tr>
  <tr>
    <td>
      <font size="3" color="#484848"><b>Body Length</b></font>
    </td>
    <td>
      <input type="text" name="body_length" class="form-control" id="text" placeholder="" value="<?php echo $r['body_length'];?>">
      <small id="small"></small>
    </td>
  </tr>
  <tr>
    <td>
          <font size="3" color="#484848"><b>Body Width</b></font>
    </td>
    <td>
      <input type="text" name="body_width" class="form-control" id="text" placeholder="" value="<?php echo $r['body_width'];?>">
      <small id="small"></small>
    </td>
  </tr>
  <tr>
    <td>
          <font size="3" color="#484848"><b>Body Height</b></font>
    </td>
    <td>
      <input type="text" name="body_height" class="form-control" id="text" placeholder="" value="<?php echo $r['body_height'];?>">
      <small id="small"></small>
    </td>
  </tr>
  <tr>
    <td>
          <font size="3" color="#484848"><b>Body Colors</b></font>
    </td>
    <td>
      <input type="text" name="body_colors" class="form-control" id="text" placeholder="" value="<?php echo $r['body_colors'];?>">
      <small id="small"></small>
    </td>
  </tr>
  <tr>
    <td>
          <font size="3" color="#484848"><b>Body Doors</b></font>
    </td>
    <td>
      <input type="text" name="body_doors" class="form-control" id="text" placeholder="" value="<?php echo $r['body_doors'];?>"  maxlength="3">
      <small id="small">[Ex: 4]</small>
    </td>
  </tr>
  <tr>
    <td>
          <font size="3" color="#484848"><b>Body Seats</b></font>
    </td>
    <td>
      <input type="text" name="body_seats" class="form-control" id="text" placeholder="" value="<?php echo $r['body_seats'];?>"  maxlength="3">
      <small id="small">[Ex: 12]</small>
    </td>
  </tr>
  <tr>
    <td>
          <font size="3" color="#484848"><b>Body Boot Space</b></font>
    </td>
    <td>
      <input type="text" name="body_boot_space" class="form-control" id="text" placeholder="" value="<?php echo $r['body_boot_space'];?>"  maxlength="100">
      <small id="small"></small>
    </td>
  </tr>
  <tr>
    <td>
          <font size="3" color="#484848"><b>Body Ground Clearance</b></font>
    </td>
    <td>
      <input type="text" name="body_ground_clearance" class="form-control" id="text" placeholder="" value="<?php echo $r['body_ground_clearance'];?>"  maxlength="10">
      <small id="small"></small>
    </td>
  </tr>
  <tr>
    <td>
          <font size="3" color="#484848"><b>Body Tyre Size</b></font>
    </td>
    <td>
      <input type="text" name="body_tyres" class="form-control" id="text" placeholder="" value="<?php echo $r['body_tyres'];?>" maxlength="50">
      <small id="small"></small>
    </td>
  </tr>
  <tr>
    <td>
          <font size="3" color="#484848"><b>Body Wheel Size</b></font>
    </td>
    <td>
      <input type="text" name="body_wheels" class="form-control" id="text" placeholder="" value="<?php echo $r['body_wheels'];?>" maxlength="50">
      <small id="small"></small>
    </td>
  </tr>
  <tr>
    <td>
          <font size="3" color="#484848"><b>Body Wheelbase</b></font>
    </td>
    <td>
      <input type="text" name="body_wheelbase" class="form-control" id="text" placeholder="" value="<?php echo $r['body_wheelbase'];?>" maxlength="10">
      <small id="small"></small>
    </td>
  </tr>

<!--OTHERS-->
  <tr>
    <td colspan="2" align="center"><font size="5" color="red"><strong>Others</strong></font></td>
  </tr>
  <tr>
    <td>
          <font size="3" color="#484848"><b>Comfort</b></font>
    </td>
    <td>
        <textarea name="comfort" cols="50" rows="3" class="form-control" id="text"><?php echo $r['comfort'];?></textarea>
        <small id="small"></small>
    </td>
  </tr>
  <tr>
    <td>
          <font size="3" color="#484848"><b>Interior</b></font>
    </td>
    <td>
        <textarea name="interior" cols="50" rows="3" class="form-control" id="text"><?php echo $r['interior'];?></textarea>
        <small id="small"></small>
    </td>
  </tr>
  <tr>
    <td>
          <font size="3" color="#484848"><b>Exterior</b></font>
    </td>
    <td>
        <textarea name="exterior" cols="50" rows="3" class="form-control" id="text"><?php echo $r['exterior'];?></textarea>
        <small id="small"></small>
    </td>
  </tr>
  <tr>
    <td>
          <font size="3" color="#484848"><b>Safety</b></font>
    </td>
    <td>
        <textarea name="safety" cols="50" rows="3" class="form-control" id="text"><?php echo $r['safety'];?></textarea>
        <small id="small"></small>
    </td>
  </tr>
  <tr>
    <td>
          <font size="3" color="#484848"><b>Entertainments</b></font>
    </td>
    <td>
        <textarea name="entertainments" cols="50" rows="3" class="form-control" id="text"><?php echo $r['entertainments'];?></textarea>
        <small id="small"></small>
    </td>
  </tr>
  <tr>
    <td>
          <font size="3" color="#484848"><b>Communications</b></font>
    </td>
    <td>
        <textarea name="communications" cols="50" rows="3" class="form-control" id="text"><?php echo $r['communications'];?></textarea>
        <small id="small"></small>
    </td>
  </tr>
  <tr>
    <td>
          <font size="3" color="#484848"><b>Price</b></font>
    </td>
    <td>
        <textarea name="car_price" cols="50" rows="3" class="form-control" id="text"><?php echo $r['car_price'];?></textarea>
        <small id="small"></small>
    </td>
  </tr>

  <tr>
    <td>
      <font size="3" color="#484848"><b>Status</b></font>
    </td>
    <td>
      <input type="radio" name="status" value="1" <?php if($r['status']==1){echo " checked";}?>> <font color="green">Active</font> 
      <input type="radio" name="status" value="2" <?php if($r['status']==2){echo " checked";}?>> <font color="red">Inactive</font> 
    </td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td>
      <button type="submit" name="update" value="Submit" class="btn btn-primary btn-block" style="width: 200px">UPDATE</button>
    </tr>

</tbody>
  </table>
</form>

      </div>
    <!-- /.Card Body End -->
  </div>
  <!-- /.Card End -->
<br>
</div>
<!-- /.container-fluid -->