<br>
<div class="row">

<?php
$qp = mysqli_query($con,"SELECT * FROM car_brands WHERE status=1 AND brand_id!=1 ORDER BY brand_name ASC");
while($rp=mysqli_fetch_assoc($qp)){
?>

<div class="col-xs-6 col-md-4 col-lg-2">
		<a href="<?php echo $site_url; ?>/brand/<?php echo $rp["brand_slug"]; ?>/"  class="thumbnail"><center>
		<img class="img-responsive" src="<?php echo $site_url; ?>/images/brands/logo/<?php echo $rp["brand_logo"]; ?>"border="0" width="150">
		<div id="brand_logo_name"><?php echo $rp["brand_name"]; ?></div>
		</center></a>
</div>	



<?php } ?>
</div>
<br>