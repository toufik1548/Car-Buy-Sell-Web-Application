

 <script>
    function showUser_brand(str) {
      if (str == "") {
        document.getElementById("model").innerHTML = "";
        return;
      } else {
        if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp = new XMLHttpRequest();
        } else {
          // code for IE6, IE5
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("model").innerHTML = this.responseText;
          }
        };
        xmlhttp.open("GET","https://www.deshicar.com/cp/mvc/get_model.php?brand="+str,true);
        xmlhttp.send();
      }
    }
    
      
    
    </script>

<div class="container border">
  <br>

    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>/">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add New Car</li>
    </ol>
    </nav>

  <div class="card">
    <div class="card-header">
      <center><span class="badge badge-pill badge-light"><h3>&nbsp; Add New Car &nbsp;</h3></span></center>
      </div>
      <div class="card-body">


<?php

//FOR DATA STORE
if(isset($_POST['car_name']) && $_POST['car_name']!=''){$Car_Name=$_POST['car_name'];}else{$Car_Name="";}
if(isset($_POST['car_yom']) && $_POST['car_yom']!=''){$Car_Yom=$_POST['car_yom'];}else{$Car_Yom="";}
if(isset($_POST['engine_type']) && $_POST['engine_type']!=''){$Engine_Type=$_POST['engine_type'];}else{$Engine_Type="";}
if(isset($_POST['engine_cc']) && $_POST['engine_cc']!=''){$Engine_Cc=$_POST['engine_cc'];}else{$Engine_Cc="";}
if(isset($_POST['engine_max_power']) && $_POST['engine_max_power']!=''){$Engine_Max_Power=$_POST['engine_max_power'];}else{$Engine_Max_Power="";}
if(isset($_POST['engine_max_torque']) && $_POST['engine_max_torque']!=''){$Engine_Max_Torque=$_POST['engine_max_torque'];}else{$Engine_Max_Torque="";}
if(isset($_POST['engine_cylinders']) && $_POST['engine_cylinders']!=''){$Engine_Cylinders=$_POST['engine_cylinders'];}else{$Engine_Cylinders="";}
if(isset($_POST['engine_cylinder_valves']) && $_POST['engine_cylinder_valves']!=''){$Engine_Cylinder_Valves=$_POST['engine_cylinder_valves'];}else{$Engine_Cylinder_Valves="";}
if(isset($_POST['engine_valve_configs']) && $_POST['engine_valve_configs']!=''){$Engine_Valve_Configs=$_POST['engine_valve_configs'];}else{$Engine_Valve_Configs="";}
if(isset($_POST['engine_fuel_supply_system']) && $_POST['engine_fuel_supply_system']!=''){$Engine_Fuel_Supply_System=$_POST['engine_fuel_supply_system'];}else{$Engine_Fuel_Supply_System="";}
if(isset($_POST['engine_gearbox']) && $_POST['engine_gearbox']!=''){$Engine_Gearbox=$_POST['engine_gearbox'];}else{$Engine_Gearbox="";}
if(isset($_POST['engine_drive']) && $_POST['engine_drive']!=''){$Engine_Drive=$_POST['engine_drive'];}else{$Engine_Drive="";}
if(isset($_POST['engine_compression_ratio']) && $_POST['engine_compression_ratio']!=''){$Engine_Compression_Ratio=$_POST['engine_compression_ratio'];}else{$Engine_Compression_Ratio="";}
if(isset($_POST['engine_bore_stroke']) && $_POST['engine_bore_stroke']!=''){$Engine_Bore_Stroke=$_POST['engine_bore_stroke'];}else{$Engine_Bore_Stroke="";}
if(isset($_POST['fuel_tank_capacity']) && $_POST['fuel_tank_capacity']!=''){$Fuel_Tank_Capacity=$_POST['fuel_tank_capacity'];}else{$Fuel_Tank_Capacity="";}
if(isset($_POST['fuel_mileage_city']) && $_POST['fuel_mileage_city']!=''){$Fuel_Mileage_City=$_POST['fuel_mileage_city'];}else{$Fuel_Mileage_City="";}
if(isset($_POST['fuel_mileage_highway']) && $_POST['fuel_mileage_highway']!=''){$Fuel_Mileage_Highway=$_POST['fuel_mileage_highway'];}else{$Fuel_Mileage_Highway="";}
if(isset($_POST['performance_topspeed']) && $_POST['performance_topspeed']!=''){$Performance_Topspeed=$_POST['performance_topspeed'];}else{$Performance_Topspeed="";}
if(isset($_POST['performance_acceleration_60']) && $_POST['performance_acceleration_60']!=''){$Performance_Acceleration_60=$_POST['performance_acceleration_60'];}else{$Performance_Acceleration_60="";}
if(isset($_POST['performance_acceleration_100']) && $_POST['performance_acceleration_100']!=''){$Performance_Acceleration_100=$_POST['performance_acceleration_100'];}else{$Performance_Acceleration_100="";}
if(isset($_POST['suspension_front']) && $_POST['suspension_front']!=''){$Suspension_Front=$_POST['suspension_front'];}else{$Suspension_Front="";}
if(isset($_POST['suspension_rear']) && $_POST['suspension_rear']!=''){$Suspension_Rear=$_POST['suspension_rear'];}else{$Suspension_Rear="";}
if(isset($_POST['breaks_front']) && $_POST['breaks_front']!=''){$Breaks_Front=$_POST['breaks_front'];}else{$Breaks_Front="";}
if(isset($_POST['breaks_rear']) && $_POST['breaks_rear']!=''){$Breaks_Rear=$_POST['breaks_rear'];}else{$Breaks_Rear="";}
if(isset($_POST['steering']) && $_POST['steering']!=''){$Steering=$_POST['steering'];}else{$Steering="";}
if(isset($_POST['body_length']) && $_POST['body_length']!=''){$Body_Length=$_POST['body_length'];}else{$Body_Length="";}
if(isset($_POST['body_width']) && $_POST['body_width']!=''){$Body_Width=$_POST['body_width'];}else{$Body_Width="";}
if(isset($_POST['body_height']) && $_POST['body_height']!=''){$Body_Height=$_POST['body_height'];}else{$Body_Height="";}
if(isset($_POST['body_colors']) && $_POST['body_colors']!=''){$Body_Colors=$_POST['body_colors'];}else{$Body_Colors="";}
if(isset($_POST['body_doors']) && $_POST['body_doors']!=''){$Body_Doors=$_POST['body_doors'];}else{$Body_Doors="";}
if(isset($_POST['body_seats']) && $_POST['body_seats']!=''){$Body_Seats=$_POST['body_seats'];}else{$Body_Seats="";}
if(isset($_POST['body_boot_space']) && $_POST['body_boot_space']!=''){$Body_Boot_Space=$_POST['body_boot_space'];}else{$Body_Boot_Space="";}
if(isset($_POST['body_ground_clearance']) && $_POST['body_ground_clearance']!=''){$Body_Ground_Clearance=$_POST['body_ground_clearance'];}else{$Body_Ground_Clearance="";}
if(isset($_POST['body_tyres']) && $_POST['body_tyres']!=''){$Body_Tyres=$_POST['body_tyres'];}else{$Body_Tyres="";}
if(isset($_POST['body_wheels']) && $_POST['body_wheels']!=''){$Body_Wheels=$_POST['body_wheels'];}else{$Body_Wheels="";}
if(isset($_POST['body_wheelbase']) && $_POST['body_wheelbase']!=''){$Body_Wheelbase=$_POST['body_wheelbase'];}else{$Body_Wheelbase="";}
if(isset($_POST['comfort']) && $_POST['comfort']!=''){$Comfort=$_POST['comfort'];}else{$Comfort="";}
if(isset($_POST['interior']) && $_POST['interior']!=''){$Interior=$_POST['interior'];}else{$Interior="";}
if(isset($_POST['exterior']) && $_POST['exterior']!=''){$Exterior=$_POST['exterior'];}else{$Exterior="";}
if(isset($_POST['safety']) && $_POST['safety']!=''){$Safety=$_POST['safety'];}else{$Safety="";}
if(isset($_POST['entertainments']) && $_POST['entertainments']!=''){$Entertainments=$_POST['entertainments'];}else{$Entertainments="";}
if(isset($_POST['communications']) && $_POST['communications']!=''){$Communications=$_POST['communications'];}else{$Communications="";}
if(isset($_POST['car_price']) && $_POST['car_price']!=''){$Car_Price=$_POST['car_price'];}else{$Car_Price="";}




if (isset($_POST["submit"])) {

$brand_id=$_POST["brand_id"];
$model_id=$_POST["model_id"];
$edition_id=$_POST["edition_id"];
$car_yom=addslashes($_POST["car_yom"]);
if($car_yom==""){$car_yom="0";}else{$car_yom=$car_yom;}
$car_name=addslashes($_POST["car_name"]);
$car_slug=slug($car_name)."-".time();
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
$car_price=$_POST['car_price'];
if($car_price==""){$car_price="0";}else{$car_price=$car_price;}
$add_date = date('Y-m-d');


$lfile_name=$_FILES["file_name"]["name"];
$photo_name	=	trim($lfile_name);

$pic_path="../images/new-cars";
$tmp_name = $_FILES["file_name"]["tmp_name"];
$lname 	= $_FILES["file_name"]["name"];
$name	= trim($lname);
move_uploaded_file($tmp_name, "$pic_path/$name");


//Display error msg
$err=array();
if($car_name=='')
	{ $err[]="<font color='red'>*** Please Enter New <b>Car Name</b> (Important for Slug)</font>";}
if($photo_name=='')
	{ $err[]="<font color='red'>*** Please Enter New <b>Car Photo</b></font>";}
if($fuel_id==0)
	{ $err[]="<font color='red'>*** Please Select <b>Fuel Type</b></font>";}
if($type_id==0)
	{ $err[]="<font color='red'>*** Please Select <b>Body Type</b></font>";}
$n=	count($err);


if($n>0)
	{
	echo "<div class=err_msg><ol>";

	for($i=0;$i<$n;$i++)
			{ echo "".$err[$i]."<br>"; }
	echo "</ol></div>";

	}

else
	{

$q=mysqli_query($con, 
  "INSERT INTO `car_new` (
  	`car_id`, 
  	`brand_id`, 
  	`model_id`,   
    `edition_id`,
    `car_name`,   
    `car_slug`, 
  	`car_yom`, 
  	`engine_type`, 
  	`engine_cc`, 
  	`engine_max_power`, 
  	`engine_max_torque`, 
  	`engine_cylinders`, 
  	`engine_cylinder_valves`, 
  	`engine_valve_configs`, 
  	`engine_fuel_supply_system`, 
  	`trans_id`, 
  	`engine_gearbox`, 
  	`engine_drive`, 
  	`engine_compression_ratio`, 
  	`engine_bore_stroke`, 
  	`fuel_id`, 
  	`fuel_tank_capacity`, 
  	`fuel_mileage_city`, 
  	`fuel_mileage_highway`, 
  	`performance_topspeed`, 
  	`performance_acceleration_60`, 
  	`performance_acceleration_100`, 
  	`suspension_front`, 
  	`suspension_rear`, 
  	`breaks_front`, 
  	`breaks_rear`, 
  	`steering`,  
    `type_id`, 
  	`body_length`, 
  	`body_width`, 
  	`body_height`, 
  	`body_colors`, 
  	`body_doors`, 
  	`body_seats`, 
  	`body_boot_space`, 
  	`body_ground_clearance`,  
    `body_tyres`,  
    `body_wheels`, 
  	`body_wheelbase`, 
  	`comfort`, 
  	`interior`, 
  	`exterior`, 
  	`safety`, 
  	`entertainments`, 
  	`communications`,  
    `car_price`, 
  	`add_date`, 
  	`views`, 
  	`status`)

  	 VALUES (
  	 	NULL, 
  	 	'$brand_id', 
  	 	'$model_id',  
      '$edition_id', 
  	 	'$car_name',   
      '$car_slug',  
      '$car_yom', 
  	 	'$engine_type', 
  	 	'$engine_cc', 
  	 	'$engine_max_power', 
  	 	'$engine_max_torque', 
  	 	'$engine_cylinders', 
  	 	'$engine_cylinder_valves', 
  	 	'$engine_valve_configs', 
  	 	'$engine_fuel_supply_system', 
  	 	'$trans_id', 
  	 	'$engine_gearbox', 
  	 	'$engine_drive', 
  	 	'$engine_compression_ratio', 
  	 	'$engine_bore_stroke', 
  	 	'$fuel_id', 
  	 	'$fuel_tank_capacity', 
  	 	'$fuel_mileage_city', 
  	 	'$fuel_mileage_highway', 
  	 	'$performance_topspeed', 
  	 	'$performance_acceleration_60', 
  	 	'$performance_acceleration_100', 
  	 	'$suspension_front', 
  	 	'$suspension_rear', 
  	 	'$breaks_front', 
  	 	'$breaks_rear',  
      '$steering', 
  	 	'$type_id', 
  	 	'$body_length', 
  	 	'$body_width', 
  	 	'$body_height', 
  	 	'$body_colors', 
  	 	'$body_doors', 
  	 	'$body_seats', 
  	 	'$body_boot_space', 
  	 	'$body_ground_clearance',  
      '$body_tyres',  
      '$body_wheels', 
  	 	'$body_wheelbase', 
  	 	'$comfort', 
  	 	'$interior', 
  	 	'$exterior', 
  	 	'$safety', 
  	 	'$entertainments', 
  	 	'$communications',  
      '$car_price', 
  	 	'$add_date', 
  	 	'1', 
  	 	'1');");


if($q){


$car_id = mysqli_insert_id($con);

mysqli_query($con,"INSERT INTO `car_new_photos` (
`photo_id` ,
`car_id` ,
`photo_name`,
`status`
)
VALUES (
NULL , 
'$car_id', 
'$photo_name',
'1')");


  echo "<div class='alert alert-success alert-dismissible' role='alert'>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  <b>New Car Added Successfully!</b><br><br>
  <a href='$cp_url/new-car-photo/$car_id/'  type=\"button\" class=\"btn btn-warning btn-sm\">Add More Photo</a>
</div>";


//FOR DATA CLEAR
$Car_Name="";
$Car_Yom="";
$Engine_Type="";
$BikerName="";
$Engine_Cc="";
$Engine_Max_Power="";
$Engine_Max_Torque="";
$Engine_Cylinders="";
$Engine_Cylinder_Valves="";
$Engine_Valve_Configs="";
$Engine_Fuel_Supply_System="";
$Engine_Gearbox="";
$Engine_Drive="";
$Engine_Compression_Ratio="";
$Engine_Bore_Stroke="";
$Fuel_Tank_Capacity="";
$Fuel_Mileage_City="";
$Fuel_Mileage_Highway="";
$Performance_Topspeed="";
$Performance_Acceleration_60="";
$Performance_Acceleration_100="";
$Suspension_Front="";
$Suspension_Rear="";
$Breaks_Front="";
$Breaks_Rear="";
$Steering="";
$Body_Length="";
$Body_Width="";
$Body_Height="";
$Body_Colors="";
$Body_Doors="";
$Body_Seats="";
$Body_Boot_Space="";
$Body_Ground_Clearance="";
$Body_Tyres="";
$Body_Wheels="";
$Body_Wheelbase="";
$Comfort="";
$Interior="";
$Exterior="";
$Safety="";
$Entertainments="";
$Communications="";
$Car_Price="";

}


else{ 
  echo "<div class='alert alert-danger alert-dismissible' role='alert'>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  <b>Wrong or mismatch!</b>
</div>";
}


}//end of else if no err

}// end of IF Submit

?>


<form name="form1" method="POST" enctype="multipart/form-data" action="">


<?php
if(isset($_POST['action'])){  
//echo  $_POST['brand_id'];
 }
?>

  <table class="table table-striped table-bordered" id="mytable">
    <tbody>
      <tr>
        <td width="26%">
          <font size="3" color="#484848"><b>Car Name</b> <small style="color:red">*</small></font>
        </td>
        <td>
          <input type="text" name="car_name" class="form-control" id="text" placeholder="" value="<?php echo $Car_Name; ?>" style="width: 100%" maxlength="250" required>    
          <small id="small"></small>
        </td>
      </tr>
      <tr>
        <td><font size="3" color="#484848"><b>Brand</b></font></td>    
        <td>
            
            <select name="brand_id" id="brand" onchange="showUser_brand(this.value)" style="width:200px">
            <option select="selected">Select Brand</option>
            <?php 
            $qt = mysqli_query($con,"SELECT * FROM `car_brands` WHERE `status`='1' ORDER BY brand_name ASC");
            while($rest = mysqli_fetch_array($qt))
            {
            ?>
            <option value="<?php echo $rest['brand_id']; ?>"        
            <?php if(isset($_POST['brand_id']) && $_POST['brand_id']==$rest['brand_id']) {echo "selected";} ?>>

             <?php echo ($rest['brand_name']); ?></option>
            
            <?php 
            }
            ?>

            </select>
            </td>
        
      </tr>   
      <tr>
        <td><font size="3" color="#484848"><b>Model</b></font></td>
        <td>
            

            <select name="model_id" id="model" style="width:200px">
              <option selected="selected">Select Brand First</option>
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
  $qf = mysqli_query($con,"SELECT edition_id,edition_title FROM car_editions ORDER BY edition_title ASC");
  while($rf=mysqli_fetch_assoc($qf)){?>
<option value="<?php echo $rf['edition_id']; ?>"
<?php if(isset($_POST['edition_id']) && $_POST['edition_id']==$rf['edition_id']){echo "Selected";}?>
  ><?php echo $rf['edition_title']; ?></option>
  <?php } ?>
</select> 
          <small id="small"></small>
        </td>
      </tr>
      <tr>
        <td>
          <font size="3" color="#484848"><b>Year of Manufacture</b></font>
        </td>
        <td>
          <input type="text" name="car_yom" class="form-control" id="text" placeholder="" value="<?php echo $Car_Yom; ?>" style="width: 100%" maxlength="4">    
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
          <input type="text" name="engine_type" class="form-control" id="text" placeholder="" value="<?php echo $Engine_Type; ?>" style="width: 100%" maxlength="100">    
          <small id="small"></small>
        </td>
      </tr>
      <tr>
        <td>
          <font size="3" color="#484848"><b>Engine CC</b></font>
        </td>
        <td>
          <input type="text" name="engine_cc" class="form-control" id="text" placeholder="" value="<?php echo $Engine_Cc; ?>" style="width: 100%" maxlength="8">    
          <small id="small"></small>
        </td>
      </tr>
      <tr>
        <td>
          <font size="3" color="#484848"><b>Engine Max Power</b></font>
        </td>
        <td>
          <input type="text" name="engine_max_power" class="form-control" id="text" placeholder="" value="<?php echo $Engine_Max_Power; ?>" style="width: 100%" maxlength="100">    
          <small id="small"></small>
        </td>
      </tr>
      <tr>
        <td>
          <font size="3" color="#484848"><b>Engine Max Torque</b></font>
        </td>
        <td>
          <input type="text" name="engine_max_torque" class="form-control" id="text" placeholder="" value="<?php echo $Engine_Max_Torque; ?>" style="width: 100%" maxlength="100">    
          <small id="small"></small>
        </td>
      </tr>
      <tr>
        <td>
          <font size="3" color="#484848"><b>Engine Cylinder</b></font>
        </td>
        <td>
          <input type="text" name="engine_cylinders" class="form-control" id="text" placeholder="" value="<?php echo $Engine_Cylinders; ?>" style="width: 100%" maxlength="100">    
          <small id="small"></small>
        </td>
      </tr>
      <tr>
        <td>
          <font size="3" color="#484848"><b>Engine Cylinder Valves</b></font>
        </td>
        <td>
          <input type="text" name="engine_cylinder_valves" class="form-control" id="text" placeholder="" value="<?php echo $Engine_Cylinder_Valves; ?>" style="width: 100%" maxlength="100">    
          <small id="small"></small>
        </td>
      </tr>
      <tr>
        <td>
          <font size="3" color="#484848"><b>Engine Valve Configs</b></font>
        </td>
        <td>
          <input type="text" name="engine_valve_configs" class="form-control" id="text" placeholder="" value="<?php echo $Engine_Valve_Configs; ?>" style="width: 100%" maxlength="100">    
          <small id="small"></small>
        </td>
      </tr>
      <tr>
        <td>
          <font size="3" color="#484848"><b>Engine Fuel Supply System</b></font>
        </td>
        <td>
          <input type="text" name="engine_fuel_supply_system" class="form-control" id="text" placeholder="" value="<?php echo $Engine_Fuel_Supply_System; ?>" style="width: 100%" maxlength="100">    
          <small id="small"></small>
        </td>
      </tr>
      <tr>
        <td>
          <font size="3" color="#484848"><b>Engine Transmission</b></font>
        </td>
        <td>
<select name="trans_id" style="width:150px">
	<?php
	$qt = mysqli_query($con,"SELECT trans_id,trans_name FROM car_transmissions ORDER BY trans_name ASC");
	while($rt=mysqli_fetch_assoc($qt)){?>
<option value="<?php echo $rt['trans_id']; ?>"
<?php if(isset($_POST['trans_id']) && $_POST['trans_id']==$rt['trans_id']){echo "Selected";}?>
	><?php echo $rt['trans_name']; ?></option>
	<?php } ?>
</select>
          <small id="small"></small>
        </td>
      </tr>
      <tr>
        <td>
          <font size="3" color="#484848"><b>Engine Gearbox</b></font>
        </td>
        <td>
          <input type="text" name="engine_gearbox" class="form-control" id="text" placeholder="" value="<?php echo $Engine_Gearbox; ?>" style="width: 100%" maxlength="100">    
          <small id="small"></small>
        </td>
      </tr>
      <tr>
        <td>
          <font size="3" color="#484848"><b>Engine Drive Type</b></font>
        </td>
        <td>
          <input type="text" name="engine_drive" class="form-control" id="text" placeholder="" value="<?php echo $Engine_Drive; ?>" style="width: 100%" maxlength="100">    
          <small id="small"></small>
        </td>
      </tr>
      <tr>
        <td>
          <font size="3" color="#484848"><b>Engine Compression Ratio</b></font>
        </td>
        <td>
          <input type="text" name="engine_compression_ratio" class="form-control" id="text" placeholder="" value="<?php echo $Engine_Compression_Ratio; ?>" style="width: 100%" maxlength="20">    
          <small id="small"></small>
        </td>
      </tr>
      <tr>
        <td>
          <font size="3" color="#484848"><b>Engine Bore Stroke</b></font>
        </td>
        <td>
          <input type="text" name="engine_bore_stroke" class="form-control" id="text" placeholder="" value="<?php echo $Engine_Bore_Stroke; ?>" style="width: 100%" maxlength="20">    
          <small id="small"></small>
        </td>
      </tr>

<!--Fuel-->
  <tr>
    <td colspan="2" align="center"><font size="5" color="red"><strong>Fuel</strong></font></td>
  </tr>
      <tr>
        <td>
          <font size="3" color="#484848"><b>Fuel Type</b> <small style="color:red">*</small></font>
        </td>
        <td>
<select name="fuel_id" style="width:200px">
	<option value="0">Select Fuel</option>
	<?php
	$qf = mysqli_query($con,"SELECT fuel_id,fuel_name FROM car_fuels ORDER BY fuel_name ASC");
	while($rf=mysqli_fetch_assoc($qf)){?>
<option value="<?php echo $rf['fuel_id']; ?>"
<?php if(isset($_POST['fuel_id']) && $_POST['fuel_id']==$rf['fuel_id']){echo "Selected";}?>
	><?php echo $rf['fuel_name']; ?></option>
	<?php } ?>
</select> 
          <small id="small"></small>
        </td>
      </tr>
      <tr>
        <td>
          <font size="3" color="#484848"><b>Fuel Tank Capacity (Litres)</b></font>
        </td>
        <td>
          <input type="text" name="fuel_tank_capacity" class="form-control" id="text" placeholder="" value="<?php echo $Fuel_Tank_Capacity; ?>" style="width: 100%" maxlength="10">    
          <small id="small"></small>
        </td>
      </tr>
      <tr>
        <td>
          <font size="3" color="#484848"><b>Fuel Mileage City</b></font>
        </td>
        <td>
          <input type="text" name="fuel_mileage_city" class="form-control" id="text" placeholder="" value="<?php echo $Fuel_Mileage_City; ?>" style="width: 100%" maxlength="10">    
          <small id="small"></small>
        </td>
      </tr>
      <tr>
        <td>
          <font size="3" color="#484848"><b>Fuel Mileage Highway</b></font>
        </td>
        <td>
          <input type="text" name="fuel_mileage_highway" class="form-control" id="text" placeholder="" value="<?php echo $Fuel_Mileage_Highway; ?>" style="width: 100%" maxlength="100">    
          <small id="small"></small>
        </td>
      </tr>

<!--Performance--> 
  <tr>
    <td colspan="2" align="center"><font size="5" color="red"><strong>Performance</strong></font></td>
  </tr>
      <tr>
        <td>
          <font size="3" color="#484848"><b>Performance Topspeed</b></font>
        </td>
        <td>
          <input type="text" name="performance_topspeed" class="form-control" id="text" placeholder="" value="<?php echo $Performance_Topspeed; ?>" style="width: 100%" maxlength="20">    
          <small id="small"></small>
        </td>
      </tr>
      <tr>
        <td>
          <font size="3" color="#484848"><b>Performance Acceleration (60)</b></font>
        </td>
        <td>
          <input type="text" name="performance_acceleration_60" class="form-control" id="text" placeholder="" value="<?php echo $Performance_Acceleration_60; ?>" style="width: 100%" maxlength="100">    
          <small id="small"></small>
        </td>
      </tr>
      <tr>
        <td>
          <font size="3" color="#484848"><b>Performance Acceleration (100)</b></font>
        </td>
        <td>
          <input type="text" name="performance_acceleration_100" class="form-control" id="text" placeholder="" value="<?php echo $Performance_Acceleration_100; ?>" style="width: 100%" maxlength="100">    
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
          <input type="text" name="suspension_front" class="form-control" id="text" placeholder="" value="<?php echo $Suspension_Front; ?>" style="width: 100%" maxlength="100">    
          <small id="small"></small>
        </td>
      </tr>
      <tr>
        <td>
          <font size="3" color="#484848"><b>Suspension Rear</b></font>
        </td>
        <td>
          <input type="text" name="suspension_rear" class="form-control" id="text" placeholder="" value="<?php echo $Suspension_Rear; ?>" style="width: 100%" maxlength="100">    
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
          <input type="text" name="breaks_front" class="form-control" id="text" placeholder="" value="<?php echo $Breaks_Front; ?>" style="width: 100%" maxlength="100">    
          <small id="small"></small>
        </td>
      </tr>
      <tr>
        <td>
          <font size="3" color="#484848"><b>Breaks Rear</b></font>
        </td>
        <td>
          <input type="text" name="breaks_rear" class="form-control" id="text" placeholder="" value="<?php echo $Breaks_Rear; ?>" style="width: 100%" maxlength="100">    
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
          <textarea name="steering" cols="50" rows="3" class="form-control" id="text"><?php echo $Steering; ?></textarea>
	      <small id="small"></small>
        </td>
      </tr>

<!--Body-->
      <tr>
        <td colspan="2" align="center"><font size="5" color="red"><strong>Body</strong></font></td>
      </tr>
      <tr>
        <td>
          <font size="3" color="#484848"><b>Body Type</b> <small style="color:red">*</small></font>
        </td>
        <td>
<select name="type_id" class="form-control" style="width:200px">
  <option value="0">Select Body Type</option>
  <?php
  $qbt = mysqli_query($con,"SELECT type_id,type_name FROM car_types ORDER BY type_name ASC");
  while($rbt=mysqli_fetch_assoc($qbt)){?>
<option value="<?php echo $rbt['type_id']; ?>"
<?php if(isset($_POST['type_id']) && $_POST['type_id']==$rbt['type_id']){echo "Selected";}?>
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
          <input type="text" name="body_length" class="form-control" id="text" placeholder="" value="<?php echo $Body_Length; ?>" style="width: 100%" maxlength="10">    
          <small id="small"></small>
        </td>
      </tr>
      <tr>
        <td>
          <font size="3" color="#484848"><b>Body Width</b></font>
        </td>
        <td>
          <input type="text" name="body_width" class="form-control" id="text" placeholder="" value="<?php echo $Body_Width; ?>" style="width: 100%" maxlength="10">    
          <small id="small"></small>
        </td>
      </tr>
      <tr>
        <td>
          <font size="3" color="#484848"><b>Body Height</b></font>
        </td>
        <td>
          <input type="text" name="body_height" class="form-control" id="text" placeholder="" value="<?php echo $Body_Height; ?>" style="width: 100%" maxlength="10">    
          <small id="small"></small>
        </td>
      </tr>
      <tr>
        <td>
          <font size="3" color="#484848"><b>Body Colors</b></font>
        </td>
        <td>
          <input type="text" name="body_colors" class="form-control" id="text" placeholder="" value="<?php echo $Body_Colors; ?>" style="width: 100%" maxlength="100">    
          <small id="small"></small>
        </td>
      </tr>
      <tr>
        <td>
          <font size="3" color="#484848"><b>Body Doors</b></font>
        </td>
        <td>
          <input type="text" name="body_doors" class="form-control" id="text" placeholder="" value="<?php echo $Body_Doors; ?>" style="width: 100%" maxlength="3">    
          <small id="small"></small>
        </td>
      </tr>
      <tr>
        <td>
          <font size="3" color="#484848"><b>Body Seats</b></font>
        </td>
        <td>
          <input type="text" name="body_seats" class="form-control" id="text" placeholder="" value="<?php echo $Body_Seats; ?>" style="width: 100%" maxlength="3">    
          <small id="small"></small>
        </td>
      </tr>
      <tr>
        <td>
          <font size="3" color="#484848"><b>Body Boot Space</b></font>
        </td>
        <td>
          <input type="text" name="body_boot_space" class="form-control" id="text" placeholder="" value="<?php echo $Body_Boot_Space; ?>" style="width: 100%" maxlength="100">    
          <small id="small"></small>
        </td>
      </tr>
      <tr>
        <td>
          <font size="3" color="#484848"><b>Body Ground Clearance</b></font>
        </td>
        <td>
          <input type="text" name="body_ground_clearance" class="form-control" id="text" placeholder="" value="<?php echo $Body_Ground_Clearance; ?>" style="width: 100%" maxlength="10">    
          <small id="small"></small>
        </td>
      </tr>
      <tr>
        <td>
          <font size="3" color="#484848"><b>Body Tyre Size</b></font>
        </td>
        <td>
          <input type="text" name="body_tyres" class="form-control" id="text" placeholder="" value="<?php echo $Body_Tyres; ?>" style="width: 100%" maxlength="50">    
          <small id="small"></small>
        </td>
      </tr>
      <tr>
        <td>
          <font size="3" color="#484848"><b>Body Wheel Size</b></font>
        </td>
        <td>
          <input type="text" name="body_wheels" class="form-control" id="text" placeholder="" value="<?php echo $Body_Wheels; ?>" style="width: 100%" maxlength="50">    
          <small id="small"></small>
        </td>
      </tr>
      <tr>
        <td>
          <font size="3" color="#484848"><b>Body Wheelbase</b></font>
        </td>
        <td>
          <input type="text" name="body_wheelbase" class="form-control" id="text" placeholder="" value="<?php echo $Body_Wheelbase; ?>" style="width: 100%" maxlength="10">    
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
          <textarea name="comfort" cols="50" rows="3" class="form-control" id="text"><?php echo $Comfort; ?></textarea>
	      <small id="small"></small>
        </td>
      </tr>
      <tr>
        <td>
          <font size="3" color="#484848"><b>Interior</b></font>
        </td>
        <td>
          <textarea name="interior" cols="50" rows="3" class="form-control" id="text"><?php echo $Interior; ?></textarea>
	      <small id="small"></small>
        </td>
      </tr>
      <tr>
        <td>
          <font size="3" color="#484848"><b>Exterior</b></font>
        </td>
        <td>
          <textarea name="exterior" cols="50" rows="3" class="form-control" id="text"><?php echo $Exterior; ?></textarea>
	      <small id="small"></small>
        </td>
      </tr>
      <tr>
        <td>
          <font size="3" color="#484848"><b>Safety</b></font>
        </td>
        <td>
          <textarea name="safety" cols="50" rows="3" class="form-control" id="text"><?php echo $Safety; ?></textarea>
	      <small id="small"></small>
        </td>
      </tr>
      <tr>
        <td>
          <font size="3" color="#484848"><b>Entertainments</b></font>
        </td>
        <td>
          <textarea name="entertainments" cols="50" rows="3" class="form-control" id="text"><?php echo $Entertainments; ?></textarea>
	      <small id="small"></small>
        </td>
      </tr>
      <tr>
        <td>
          <font size="3" color="#484848"><b>Communications</b></font>
        </td>
        <td>
          <textarea name="communications" cols="50" rows="3" class="form-control" id="text"><?php echo $Communications; ?></textarea>
	      <small id="small"></small>
        </td>
      </tr>
      <tr>
        <td>
          <font size="3" color="#484848"><b>Price</b></font>
        </td>
        <td>
          <input type="text" name="car_price" class="form-control" id="text" placeholder="" value="<?php echo $Car_Price; ?>" style="width: 100%">    
          <small id="small">Ex: 3500000</small>
        </td>
      </tr>
      <tr>
		<td><font size="3" color="#484848"><b>Photo</b> <small style="color:red">*</small></font></td>
		<td><input name="file_name" type="file" id="file_name" required></td>
      </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td>
	      <button type="submit" name="submit" value="Submit" class="btn btn-primary btn-block" style="width: 200px">SUBMIT</button>
	    </td>
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
<!-- /.Container End -->