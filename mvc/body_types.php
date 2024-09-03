<div id="title">Body Types</div>
<div id="area">

<div class="row">

<?php
$qt = mysqli_query($con,"SELECT * FROM car_types WHERE status=1 ORDER BY type_name ASC");
while($rt=mysqli_fetch_assoc($qt)){
?>

<div class="col-xs-6 col-md-4 col-lg-2">
		<a href="<?php echo $site_url; ?>/body-type/<?php echo $rt["type_slug"]; ?>/"  class="thumbnail"><center>
		<img class="img-responsive" src="<?php echo $site_url; ?>/images/body-type/<?php echo $rt["type_photo"]; ?>"border="0" width="150">
		<div id="brand_logo_name"><?php echo $rt["type_name"]; ?></div>
		</center></a>
</div>	



<?php } ?>
</div>

</div>