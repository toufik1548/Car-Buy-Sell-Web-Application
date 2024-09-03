
<div class="container">
    <div class="row">
<?php
$qt = mysqli_query($con,"SELECT * FROM car_posts WHERE status=1 $condition $sort $limit");
while($rt = mysqli_fetch_assoc($qt)){?>


<div class="col-sm-2">
<a href="<?php echo $site_url; ?>/post/<?php echo $rt['post_id']; ?>/">	
<img class="img-fluid img-thumbnail rounded float-left" style="width:100%; height:auto;" src="<?php echo $site_url; ?>/images/media/<?php echo $rt['post_photo']; ?>" alt="<?php echo $rt['post_title']; ?>" style="width:158px; height:88px;">
</a>
</div>

<div class="col-sm-9">
<a href="<?php echo $site_url; ?>/post/<?php echo $rt['post_id']; ?>/" class="p-title">
	<b><?php echo $rt['post_title']; ?></b></a>&nbsp;&nbsp;&nbsp;&nbsp;
	<span class="fa fa-calendar"></span>&nbsp; <?php echo $rt['add_datetime']; ?><br><br>

	<?php echo substr(stripslashes(strip_tags($rt['post_details'])),0,750); ?>...


	
</a><br><br>
</div>
<?php } ?>
</div>
</div><br><br>