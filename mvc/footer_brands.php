<?php
$qb = mysqli_query($con,"SELECT * FROM car_brands WHERE brand_id!=1 ORDER BY brand_name ASC");
while($rb= mysqli_fetch_assoc($qb)){
?>
<a href="<?php echo $site_url; ?>/brand/<?php echo $rb["brand_slug"]; ?>/" title="<?php echo $rb["brand_name"]; ?> cars price in Bangladesh"><small><?php echo $rb["brand_name"]; ?></small></a> 
<?php } ?>