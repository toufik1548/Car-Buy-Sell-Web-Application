<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo $site_url; ?>/">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">News</li>
  </ol>
</nav>

<div id="title"><i class="fa fa-car" style='color:#A02021'></i> Car News</div>

<div id="area">
<?php 
$carnews=get_total("car_news","news_id", "WHERE status=1"); 
echo "<h5 align=center>(".number_format($carnews)." News available)</h5>";
?>
<br>

<?php

$condition = "";
$sort = "ORDER BY news_id DESC";
$limit = "LIMIT 50";
include("news_list.php");

?>

</div>


<!-- CAR TIPS START -->
<div id="title">
<i class="fa fa-car" style='color:#A02021'></i> 
		<a href="<?php echo $site_url; ?>/info/tips/">Car Tips</a>
	<span style="float: right; margin-right:5px;">
	<span class="label label-warning">
		<a href="<?php echo $site_url; ?>/tips/">View All</a>
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

<!-- USED CAR START -->
<div id="title">
<i class="fa fa-car" style='color:#A02021'></i> 
	<a href="<?php echo $site_url; ?>/info/used/">Used Cars</a>
	<span style="float: right; margin-right:5px;">
	<span class="label label-warning">
		<a href="<?php echo $site_url; ?>/used/">View All</a>
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
		<a href="<?php echo $site_url; ?>/new/">View All</a>
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