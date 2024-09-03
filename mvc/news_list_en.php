<div class="container">
    <div class="row">
<?php
$qt = mysqli_query($con,"SELECT * FROM car_news WHERE status=1 $condition $sort $limit");
while($rt = mysqli_fetch_assoc($qt)){?>


<div class="col-sm-2">
<a href="<?php echo $site_url; ?>/news-en/<?php echo $rt['news_slug']; ?>/">	
<img class="img-fluid img-thumbnail rounded float-left" src="<?php echo $site_url; ?>/images/news/<?php echo $rt['news_photo']; ?>" alt="<?php echo $rt['news_title']; ?>"style="width:158px; height:88px;">
</a>
</div>

<div class="col-sm-9">
<a href="<?php echo $site_url; ?>/news-en/<?php echo $rt['news_slug']; ?>/">
	<b><?php echo $rt['news_title']; ?></b></a>&nbsp;&nbsp;&nbsp;&nbsp;
	<span class="fa fa-calendar"></span>&nbsp; <?php echo $rt['add_date']; ?><br><br>

	<?php echo substr(stripslashes(strip_tags($rt['news_details'])),0,350); ?>...


	<a href="<?php echo $site_url; ?>/news-en/<?php echo $rt['news_slug']; ?>/"><span class="label label-success">English</span></a>
	<a href="<?php echo $site_url; ?>/news-bn/<?php echo $rt['news_slug']; ?>/"><span class="label label-primary">Bangla</span></a>
</a><br><br>
</div>
<?php } ?>
</div>
</div><br><br>