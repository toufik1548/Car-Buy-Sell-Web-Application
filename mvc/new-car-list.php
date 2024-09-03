<div class="list-group">

<div id="bikes">
<?php
//$cond $sort $limit
$qnc = mysqli_query($con,"SELECT * FROM car_new WHERE status=1 $cond $sort $limit");
$nnc = mysqli_num_rows($qnc);

if($nnc==0){
	echo "<div class=\"alert alert-warning\">
<b>Sorry!</b><br>
No records found.
</div>";
}


while($rnc=mysqli_fetch_array($qnc)){

	$car_id=$rnc['car_id'];
	$car_name=$rnc['car_name'];
	$car_slug=$rnc['car_slug'];
	$brand_id=$rnc['brand_id'];
	$model_id=$rnc['model_id'];
	$engine_cc=$rnc['engine_cc'];
	$car_price=$rnc['car_price'];
	$car_yom=$rnc['car_yom'];


?>






<table class="table table-bordered table-responsive table-hover" style="width:100%; padding:0px; margin:0px;">


<tr class="tr-hover">

<td style="">

<?php
$qp = mysqli_query($con,"SELECT photo_name FROM car_new_photos WHERE car_id='$car_id' ORDER BY photo_id ASC LIMIT 1");
$rp=mysqli_fetch_array($qp);
$np=mysqli_num_rows($qp);
if($np==0){$car_photo = $site_url."/images/no_bike_photo.jpg"; }
	else{$car_photo = $site_url."/images/new-cars/".$rp['photo_name']; }

?>



<div class="col-sm-2" style="border:0px solid black;">
	<a href="<?php echo $site_url; ?>/new-car/<?php echo  $rnc['car_slug']; ?>/">
<img class="thumbnail" style="width:100%;" src="<?php echo $car_photo; ?>">
</a>
</div>




<div id="" class="col-sm-8" style="border:0px solid blue;">

<h2>
<a href="<?php echo $site_url; ?>/new-car/<?php echo $rnc['car_slug']; ?>/" class="p-title">
<?php echo $car_name; ?>
</a>
</h2>

Brand: <?php echo get_info('car_brands','brand_name',"WHERE brand_id=$brand_id");?><br>
Model: <?php echo get_info('car_models','model_name',"WHERE model_id=$model_id");?><br>
<br>

<?php if($engine_cc!=""){?>
Engine cc: <?php echo $engine_cc; ?><br>
<?php } ?>

<?php if($car_yom>0){?>
Year of MF: <?php echo $car_yom; ?>
<?php } ?>

</div>


<div class="col-sm-2" style="border:0px solid red; padding:0px;">


<br>

<a href="<?php echo $site_url; ?>/new-car/<?php echo $rnc['car_slug']; ?>/"><button class="btn btn-success btn-block">Details</button></a>
	
</div>
</td>

</tr>
</table>
<br>





<?php }//end while used_bikes ?>

</div>


</div>