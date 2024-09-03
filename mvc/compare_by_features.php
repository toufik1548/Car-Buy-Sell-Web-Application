<div id="title"><?php echo $car_name1; ?> vs <?php echo $car_name2; ?> features comparison</div>

<div class="container-fluid">

	<?php
//car1
$q1 = mysqli_query($con,"SELECT * FROM car_new WHERE car_id=$car_id1");
$r1 = mysqli_fetch_array($q1);

$brand_id1 		= $r1["brand_id"];
$brand_name1 	= get_info("car_brands","brand_name","WHERE brand_id=".$r1["brand_id"]);

$engine_type1 	= $r1["engine_type"];
$engine_cc1 	= $r1["engine_cc"];
$engine_max_power1= $r1["engine_max_power"];
$engine_max_torque1	= $r1["engine_max_torque"];

$body_length1 =$r1["body_length"];
$body_width1 =$r1["body_width"];
$body_height1 =$r1["body_height"];

$Fuel_tank_capacity1= $r1["Fuel_tank_capacity"];
$breaks_front1		= $r1["breaks_front"];
$breaks_rear1		= $r1["breaks_rear"];
$body_tyres1		= $r1["body_tyres"];
$suspension_front1 = $r1["suspension_front"];
$suspension_rear1= $r1["suspension_rear"];



//car2
$q2 = mysqli_query($con,"SELECT * FROM car_new WHERE car_id=$car_id2");
$r2 = mysqli_fetch_array($q2);

$brand_id2 		= $r2["brand_id"];
$brand_name2 	= get_info("car_brands","brand_name","WHERE brand_id=".$r2["brand_id"]);

$engine_type2 	= $r2["engine_type"];
$engine_cc2 	= $r2["engine_cc"];
$engine_max_power2= $r2["engine_max_power"];
$engine_max_torque2	= $r2["engine_max_torque"];

$body_length2 = $r2["body_length"];
$body_width2 = $r2["body_width"];
$body_h2 =$r2["body_height"];

$Fuel_tank_capacity2 = $r2["Fuel_tank_capacity"];
$breaks_front2	= $r2["breaks_front"];
$breaks_rear2 = $r2["breaks_rear"];
$body_tyres2 = $r2["body_tyres"];
$suspension_front2 = $r2["suspension_front"];
$suspension_rear2 = $r2["suspension_rear"];
?>


<h1 align="center"><?php echo $car_name1; ?> Vs <?php echo $car_name2; ?></h1>

<b><?php echo $car_name1; ?></b> vs <b><?php echo $car_name2; ?></b>: 



<table align="center" border="1" bordercolor="#ccc" cellpadding="5" cellspacing="5" width="100%" class="table-striped">

	<tr>
	<th width="125">&nbsp; Photos</th>
	<th>
<?php
//photo
$photo = get_info("car_new_photos","photo_name", "WHERE car_id=$car_id1");


if($photo!=""){
  echo "<img src='$site_url/images/new-cars/$photo' class='img-fluid img-responsive' width='400' height='150'>";
}

else{
  echo "<img src='$site_url/images/new-cars/noimage.jpg' class='img-fluid img-responsive' width='400' height='150'>";
}

?>
	</th>
	<th>
	<?php
//photo
$photo = $photo = get_info("car_new_photos","photo_name", "WHERE car_id=$car_id2");


if($photo!=""){
  echo "<img src='$site_url/images/new-cars/$photo' class='img-fluid img-responsive' width='400' height='150'>";
}

else{
  echo "<img src='$site_url/images/new-cars/noimage.jpg' class='img-fluid img-responsive' width='400' height='150'>";
}

?>
</th>

</tr>
<tr>
	<th height="30">Name</th>
	<td><b><?php echo $car_name1; ?></b></td>
	<td><b><?php echo $car_name2; ?></b></td>
</tr>
<tr>
	<th>Brand</th>
	<td><?php echo get_info("car_brands","brand_name","WHERE brand_id=$brand_id1"); ?></td>
	<td><?php echo get_info("car_brands","brand_name","WHERE brand_id=$brand_id2"); ?></td>
</tr>

<tr>
	<th>Engine Type</th>
	<td><?php echo $engine_type1; ?></td>
	<td><?php echo $engine_type2; ?></td>
</tr>

<tr>
	<th>Displacement(CC)</th>
	<td><?php echo $engine_cc1; ?></td>
	<td><?php echo $engine_cc2; ?></td>
</tr>

<tr>
	<th>MaxPower</th>
	<td><?php echo $engine_max_power1; ?></td>
	<td><?php echo $engine_max_power2; ?></td>
</tr>

<tr>
	<th>MaxTorque</th>
	<td><?php echo $engine_max_torque1; ?></td>
	<td><?php echo $engine_max_torque2; ?></td>
</tr>

<tr>
	<th>Body Length</th>
	<td><?php echo $body_length1; ?></td>
	<td><?php echo $body_length2; ?></td>
</tr>

<tr>
	<th>Body Width</th>
	<td><?php echo $body_width1; ?></td>
	<td><?php echo $body_width2; ?></td>
</tr>

<tr>
	<th>Body Height</th>
	<td><?php echo $body_height1; ?></td>
	<td><?php echo $body_h2; ?></td>
</tr>

<tr>
	<th>Brakes (F/R)</th>
	<td><?php echo $breaks_front1; ?> , <?php echo $breaks_rear1; ?></td>
	<td><?php echo $breaks_front2; ?> , <?php echo $breaks_rear2; ?></td>
</tr>

<tr>
	<th>Tires </th>
	<td><?php echo $body_tyres1; ?></td>
	<td><?php echo $body_tyres2; ?></td>
</tr>


<tr>
	<th>Suspensions (F/R)</th>
	<td><?php echo $suspension_front1; ?>, <?php echo $suspension_rear1; ?></td>
	<td><?php echo $suspension_front2; ?>, <?php echo $suspension_rear2; ?></td>
</tr>

</table>
<!--
<tr>
	<th>Full Features</th>
	<td><a href="<?php echo $site_url; ?>/specs/<?php echo $car_id1; ?>/" target="_blank">Click Here  for full specs</a></td>
	<td><a href="<?php echo $site_url; ?>/specs/<?php echo $car_id2; ?>/"  target="_blank">Click Here for full specs</a></td>
</tr>

-->
<br><br>
<p align="center">
<a href="<?php echo $site_url; ?>/info/compare/" title="New Compare"><img src="<?php echo $site_url; ?>/images/compare_button.jpg"></a></p>

</div>

<?php
/*
//adding compare records
$compare_ids = $car_id1.",".$car_id2;
$add_date = date("Y-m-d");
$update_time=date("Y-m-d H:i:s");

//compare logs
if($car_id1!='' AND $car_id2!=''){


$qq = mysqli_query($con, "SELECT compare_ids FROM car_compares WHERE compare_ids='$compare_ids'");
$nn = mysqli_num_rows($qq);
if($nn==0){mysqli_query($con,"INSERT INTO car_compares VALUES(NULL, '$compare_ids','$add_date','$update_time',1,1)");}
else{mysqli_query($con,"UPDATE car_compares SET views=views+1,update_time='$update_time' WHERE compare_ids='$compare_ids'");}
}
*/
?>
