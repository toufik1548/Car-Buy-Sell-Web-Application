<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo $site_url; ?>/" class="b-title">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $tips_title_bn; ?></li>
  </ol>
</nav>



<div id="title"><?php echo $tips_title; ?></div>
<div id="area">
<?php
//views update
mysqli_query($con,"UPDATE car_tips SET views_bn=views_bn+1 WHERE tips_id=$tips_id");
$qt = mysqli_query($con,"SELECT * FROM car_tips WHERE tips_id=$tips_id");
$rt = mysqli_fetch_assoc($qt);
?>
<span class="fa fa-calendar"></span> &nbsp;<?php echo $rt["add_date"]; ?>
&nbsp;&nbsp; Views: <?php echo $rt["views_bn"]; ?>
<span style="float: right;"><a href="<?php echo $site_url; ?>/tips-en/<?php echo $rt['tips_slug']; ?>/" title="English Version"><button type="button" class="btn btn-success btn-sm">English Version</button></a></span>

<h1 align="center"><font size="5"><?php echo $rt["tips_title_bn"]; ?></font></h1>

<center>
<?php
//photo
$photo = get_info("car_tips","tips_photo", "WHERE tips_id=".$rt["tips_id"]." ORDER BY tips_id ASC LIMIT 1");

if($photo!=""){
  echo "<img src='$site_url/images/tips/$photo' class='img-responsive' style='width:80%; height:70%;'>";
}

else{
  echo "<img src='$site_url/images/tips/noimage.jpg' class='img-responsive' style='width:80%; height:70%;'>";
}

?>
</center>
<br>
<center><?php include("fb_share.php"); ?></center><br>
<?php echo nl2br($rt["tips_details_bn"]); ?>
</div>


<!-- CAR TIPS START -->
<div id="title">
<i class="fa fa-car" style='color:#A02021'></i> 
		<a href="<?php echo $site_url; ?>/info/tips/">More Tips</a>
	<span style="float: right; margin-right:5px;">
	<span class="label label-warning">
		<a href="<?php echo $site_url; ?>/info/tips/">View All</a>
	</span>
	</span>
</div>
<div id="area">
<?php 
$cartips=get_total("car_tips","tips_id", "WHERE status=1"); 
echo "<h5 align=center>(".number_format($cartips)." Tips available)</h5>";
?>
<br>
<?php
$condition = "";
$sort = "ORDER BY rand()";
$limit = "LIMIT 5";
include("tips_list.php");
?>

</div>
<!-- CAR TIPS END -->


<!-- CAR NEWS START -->
<div id="title">
<i class="fa fa-car" style='color:#A02021'></i> 
		<a href="<?php echo $site_url; ?>/info/news/">Car News</a>
	<span style="float: right; margin-right:5px;">
	<span class="label label-warning">
		<a href="<?php echo $site_url; ?>/info/news/">View All</a>
	</span>
	</span>
</div>
<div id="area">
<?php 
$carnews=get_total("car_news","news_id", "WHERE status=1"); 
echo "<h5 align=center>(".number_format($carnews)." News available)</h5>";
?>
<br>
<?php
$condition = "";
$sort = "ORDER BY rand()";
$limit = "LIMIT 5";
include("news_list.php");
?>
</div>
<!-- CAR NEWS END -->

<!-- USED CAR START -->
<div id="title">
<i class="fa fa-car" style='color:#A02021'></i> 
	<a href="<?php echo $site_url; ?>/info/used/">Used Cars</a>
	<span style="float: right; margin-right:5px;">
	<span class="label label-warning">
		<a href="<?php echo $site_url; ?>/info/used/">View All</a>
	</span>
	</span>
</div>
<div id="area">
	<?php 
$usedcars=get_total("car_used","car_id", "WHERE status=1"); 
echo "<h5 align=center>(".number_format($usedcars)." cars available)</h5>";
?>


<?php 
$cond = "";
$sort = "ORDER BY rand()";
$limit = "LIMIT 5";
include("used-car-list.php"); ?>
</div>
<!-- USED CAR END -->

<!-- NEW CAR START -->
<div id="title">
<i class="fa fa-car" style='color:#A02021'></i> 
	<a href="<?php echo $site_url; ?>/info/new/">New Cars</a>
	<span style="float: right; margin-right:5px;">
	<span class="label label-warning">
		<a href="<?php echo $site_url; ?>/info/new/">View All</a>
	</span>
	</span>
</div>
<div id="area">
	<?php 
$ncars=get_total("car_new","car_id", "WHERE status=1"); 
echo "<h5 align=center>(".number_format($ncars)." cars available)</h5>";
?>


<?php 
$cond = "";
$sort = "ORDER BY rand()";
$limit = "LIMIT 5";
include("new-car-list.php"); ?>
</div>
<!-- NEW CAR END -->