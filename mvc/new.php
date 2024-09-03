<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo $site_url; ?>/" class="b-title">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">New Cars</li>
  </ol>
</nav>

<!-- NEW CAR START -->
<div id="title"><i class="fa fa-car" style='color:#A02021'></i> New Cars</div>
<div id="area"><span style="float:right; padding-right:10px;"><?php include("fb_share.php"); ?></span><br>
	<?php 
$ncars=get_total("car_new","car_id", "WHERE status=1"); 
echo "<h2 align=center>".number_format($ncars)." cars available</h2>";
?>


<?php 
$cond = "";
$sort = "ORDER BY car_id DESC";
$limit = "LIMIT 50";
include("new-car-list.php"); ?>
</div>
<!-- NEW CAR END -->


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
$limit = "LIMIT 10";
include("used-car-list.php"); ?>
</div>
<!-- USED CAR END -->

<!--CAR SHOWROOMS START-->
<div id="title"><i class="fa fa-car" style='color:#A02021'></i> 
	<a href="<?php echo $site_url; ?>/showrooms/">Car Showrooms </a>
	<span style="float: right; margin-right:5px;">
	<span class="label label-warning">
		<a href="<?php echo $site_url; ?>/info/showrooms/">View All</a>
	</span>
	</span>
</div>
<div id="area">
<?php 
$cond = "";
$sort = "ORDER BY rand()";
$limit = "LIMIT 6";
include("showroom_list.php"); ?>

<p align="center">
	<a href="<?php echo $site_url; ?>/info/showrooms/" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">All Showrooms</a>
</p>
</div>
<!--CAR SHOWROOMS END-->