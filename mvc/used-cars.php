<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo $site_url; ?>/">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Used Cars</li>
  </ol>
</nav>

<div id="title"><i class="fa fa-car" style='color:#A02021'></i> Used Cars</div>
<div id="area">
	<?php 
$ncars=get_total("car_used","car_id", "status=1"); 
$soldcars=get_total("car_used","car_id", "status=2");

echo "<h2 align=center>".number_format($ncars)." cars available</h2>";
echo "<center><small>Sold $soldcars Cars</small></center>";
?>
<center><a href="<?php echo site_url('signup',"signup"); ?>" class="btn btn-warning btn-sm active" role="button" aria-pressed="true">Post your ad</a></center>

<?php 
$cond = "";
$sort = "ORDER BY car_id DESC";
$limit = "LIMIT 50";
include("used-car-list.php"); ?>
</div>

<!--CAR SHOWROOMS START-->
<div id="title"><i class="fa fa-car" style='color:#A02021'></i> 
	<a href="<?php echo $site_url; ?>/showrooms/">Car Showrooms </a>
	<span style="float: right; margin-right:5px;">
	<span class="label label-warning">
		<a href="<?php echo $site_url; ?>/showrooms/">View All</a>
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
	<a href="<?php echo $site_url; ?>/showrooms/" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">All Showrooms</a>
</p>
</div>
<!--CAR SHOWROOMS END-->