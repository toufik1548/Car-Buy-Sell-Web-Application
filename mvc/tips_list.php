<style>
  .img-thumbnail{
    width:165px;
    height:115px;
  }
</style>


<div class="container">
    <div class="row">
<?php
$qt = mysqli_query($con,"SELECT * FROM car_tips WHERE status=1 $condition $sort $limit");
while($rt = mysqli_fetch_assoc($qt)){?>


<div class="col-sm-2">
<a href="<?php echo $site_url; ?>/tips-bn/<?php echo $rt['tips_slug']; ?>/">	
<img class="img-fluid img-thumbnail rounded float-left"  style="width:100%; height:auto;" src="<?php echo $site_url; ?>/images/tips/<?php echo $rt['tips_photo']; ?>" alt="<?php echo $rt['tips_title_bn']; ?>">
</a>
</div>

<div class="col-sm-9">
<a href="<?php echo $site_url; ?>/tips-bn/<?php echo $rt['tips_slug']; ?>/" class="p-title">
	<b><?php echo $rt['tips_title_bn']; ?></b></a>&nbsp;&nbsp;&nbsp;&nbsp;
	<span class="fa fa-calendar"></span>&nbsp; <?php echo $rt['add_date']; ?><br><br>

	<?php echo substr(stripslashes(strip_tags($rt['tips_details_bn'])),0,750); ?>...


	<a href="<?php echo $site_url; ?>/tips-bn/<?php echo $rt['tips_slug']; ?>/"><span class="label label-primary">Bangla</span></a>
	<a href="<?php echo $site_url; ?>/tips-en/<?php echo $rt['tips_slug']; ?>/"><span class="label label-success">English</span></a>
</a><br><br>
</div>
<?php } ?>
</div>
</div><br><br>