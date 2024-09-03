<br>
<div class="row">

<?php
$qs = mysqli_query($con,"SELECT * FROM car_showrooms WHERE status=1 AND showroom_photo != '' $cond $sort $limit");
while($rs=mysqli_fetch_assoc($qs)){
?>

<div class="col-xs-6 col-md-4 col-lg-2">
		<a href="<?php echo $site_url; ?>/showroom/<?php echo $rs["showroom_slug"]; ?>/"  class="thumbnail"><center>
		<img class="img-responsive" src="<?php echo $site_url; ?>/images/showrooms/thumb/<?php echo $rs["showroom_photo"]; ?>"border="0"  style="width:150px; height:75px;">
		<div id="brand_logo_name" class="p-title" style="height: 45px;"><?php echo $rs["showroom_name"]; ?></div>
		</center></a>
</div>	



<?php } ?>
</div>
<br>