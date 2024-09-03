<style>
  .img-thumbnail{
    width:165px;
    height:115px;
  }
</style>


<div class="container">
   

<?php
$qt = mysqli_query($con,"SELECT * FROM car_posts WHERE status=1 $cond $sort $limit");
while($rt = mysqli_fetch_array($qt)){?>
 <div class="row">
<div class="col-sm-2">
<a href="<?php echo $site_url; ?>/post/<?php echo $rt['post_id']; ?>/">	
<img class="img-fluid img-thumbnail rounded float-left"  style="width:100%; height:auto;" src="<?php echo $site_url; ?>/images/media/thumb/<?php echo $rt['post_photo']; ?>" alt="<?php echo $rt['post_title']; ?>">
</a>
</div>

<div class="col-sm-9">
<a href="<?php echo $site_url; ?>/post/<?php echo $rt['post_id']; ?>/" class="p-title">
	<b><?php echo $rt['post_title']; ?></b></a><br>
	<span class="fa fa-calendar"></span>&nbsp; <small><?php echo $rt['add_date']; ?></small><br><br>

	<?php echo stripslashes(strip_tags($rt['post_summary'])); ?>


	<a href="<?php echo $site_url; ?>/post/<?php echo $rt['post_id']; ?>/"><span class="label label-primary">Details</span></a>
</div>
</div>
<br>
<?php } ?>
</div>