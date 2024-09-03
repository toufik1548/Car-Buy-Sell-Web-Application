<h1><?php echo $car_name1; ?> Vs <?php echo $car_name2; ?></h1>

<div id="title">Car Comparison</div>

<div id="area">
<?php
//carinfo 1
$q1 = mysqli_query($con,"SELECT * FROM car_used WHERE car_id=$car_id1");
$r1 = mysqli_fetch_assoc($q1);
$car_name1 = $r1["car_name"];
$car_slug1 = $r1["car_slug"];
$brand_id1 = $r1["brand_id"];
$brand_name1=get_info("car_brands","brand_name","WHERE brand_id=$brand_id1");
$model_id1 = $r1["model_id"];
$model_name1=get_info("car_models","model_name","WHERE model_id=$model_id1");
$model_year1= $r1["model_year"];
$reg_year1= $r1["reg_year"];
$condition_id1 = $r1["condition_id"];
$condition_name1=get_info("car_conditions","condition_name","WHERE condition_id=$condition_id1");
$condition_id1 = $r1["condition_id"];
$condition_name1=get_info("car_conditions","condition_name","WHERE condition_id=$condition_id1");
$fuel_id1 = $r1["fuel_id"];
$fuel_name1=get_info("car_fuels","fuel_name","WHERE fuel_id=$fuel_id1");
$engine_cc1 = $r1["engine_cc"];
$km_run1 = $r1["km_run"];
$car_price1 = $r1["car_price"];
$car_photo1=get_info("car_used_photo","photo_name","WHERE car_id=$car_id1 ORDER BY photo_id ASC LIMIT 1");


//carinfo 2
$q2 = mysqli_query($con,"SELECT * FROM car_used WHERE car_id=$car_id2");
$r2 = mysqli_fetch_assoc($q2);
$car_name2 = $r2["car_name"];
$car_slug2 = $r2["car_slug"];
$brand_id2 = $r2["brand_id"];
$brand_name2=get_info("car_brands","brand_name","WHERE brand_id=$brand_id2");
$model_id2 = $r2["model_id"];
$model_name2=get_info("car_models","model_name","WHERE model_id=$model_id2");
$model_year2= $r2["model_year"];
$reg_year2= $r2["reg_year"];
$condition_id2 = $r2["condition_id"];
$condition_name2=get_info("car_conditions","condition_name","WHERE condition_id=$condition_id2");
$fuel_id2 = $r2["fuel_id"];
$fuel_name2=get_info("car_fuels","fuel_name","WHERE fuel_id=$fuel_id2");
$engine_cc2 = $r2["engine_cc"];
$km_run2 = $r2["km_run"];
$car_price2 = $r2["car_price"];
$car_photo2=get_info("car_used_photo","photo_name","WHERE car_id=$car_id2 ORDER BY photo_id ASC LIMIT 1");
?>

<table class="table">
<tr><td align="right"><img width="200" src="<?php echo $site_url;?>/images/products/<?php echo $car_photo1; ?>" class="img-responsive"></td><td align="center">&nbsp;</td><td align="left"><img width="200" src="<?php echo $site_url;?>/images/products/<?php echo $car_photo2; ?>" class="img-responsive"></td></tr>
<tr><td align="right"><?php echo $car_name1; ?></td><td align="center" bgcolor="#ddd">Name</td><td align="left"><?php echo $car_name2; ?></td></tr>
<tr><td align="right"><?php echo $brand_name1; ?></td><td align="center" bgcolor="#ddd">Brand</td><td align="left"><?php echo $brand_name2; ?></td></tr>
<tr><td align="right"><?php echo $model_name1; ?></td><td align="center" bgcolor="#ddd">Model</td><td align="left"><?php echo $model_name2; ?></td></tr>
<tr><td align="right"><?php echo $model_year1; ?></td><td align="center" bgcolor="#ddd">Model Year</td><td align="left"><?php echo $model_year2; ?></td></tr>
<tr><td align="right"><?php echo $reg_year1; ?></td><td align="center" bgcolor="#ddd">Reg. Year</td><td align="left"><?php echo $reg_year2; ?></td></tr>
<tr><td align="right"><?php echo $condition_name1; ?></td><td align="center" bgcolor="#ddd">Condition</td><td align="left"><?php echo $condition_name2; ?></td></tr>
<tr><td align="right"><?php echo $fuel_name1; ?></td><td align="center" bgcolor="#ddd">Fuel</td><td align="left"><?php echo $fuel_name2; ?></td></tr>
<tr><td align="right"><?php echo $engine_cc1; ?>cc</td><td align="center" bgcolor="#ddd">Engine</td><td align="left"><?php echo $engine_cc2; ?>cc</td></tr>
<tr><td align="right"><?php echo $km_run1; ?></td><td align="center" bgcolor="#ddd">KM Run</td><td align="left"><?php echo $km_run2; ?></td></tr>
<tr><td align="right">Tk <?php echo $car_price1; ?></td><td align="center" bgcolor="#ddd">Price</td><td align="left">Tk <?php echo $car_price2; ?></td></tr>
<tr><td align="right"><a href="<?php echo $site_url; ?>/used-car/<?php echo $car_slug1; ?>/"><button class="btn btn-success btn-block">Details</button></a></td><td align="center">&nbsp;</td><td align="left"><a href="<?php echo $site_url; ?>/used-car/<?php echo $car_slug2; ?>/"><button class="btn btn-success btn-block">Details</button></a></td></tr>
</table>
</div>


<!--RELATED USED CAR-->
<div id="title">You can also choose</div>

<div id="area">
<?php
$cond = " AND (model_id=$model_id1 OR model_id=$model_id2)";
$sort = "ORDER BY car_id DESC";
$limit = "LIMIT 100";
include("used-car-list.php");
?>
</div>