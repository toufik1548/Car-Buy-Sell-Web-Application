<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo $site_url; ?>/">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">New Cars</li>
  </ol>
</nav>

<!-- NEW CAR START -->
<div id="title"><i class="fa fa-car" style='color:#A02021'></i> New Cars</div>
<div id="area">
	<?php 
$ncars=get_total("car_new","car_id", "status=1"); 
echo "<h2 align=center>".number_format($ncars)." cars available</h2>";
?>


<?php 
$cond = "";
$sort = "ORDER BY car_id DESC";
$limit = "LIMIT 50";
include("new-car-list.php"); ?>
</div>
<!-- NEW CAR END -->