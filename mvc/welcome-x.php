<a href="<?php echo $site_url; ?>/info/login/"><img src="<?php echo $site_url; ?>/images/deshicar-banner.jpg" class="img-responsive img-fluid"></a>
<br>





<!-- USED CARS START -->
<div id="title">Recently Added Used Cars</div>
<div id="area">
	<?php 
$ncars=get_total("car_used","car_id", "WHERE status=1"); 
$soldcars=get_total("car_used","car_id", "WHERE status=2");

 echo "<h2 align=center>".number_format($ncars)." cars available</h2>";

//echo "<h2 align=center>Sold $soldcars Cars</h2>";

 echo "<center><small>Sold $soldcars Cars</small></center>";
?>
<center><a href="<?php echo $site_url; ?>/login/" class="btn btn-warning btn-sm active" role="button" aria-pressed="true">Post your ad</a></center>

<?php 
$cond = "";
$sort = "ORDER BY car_id DESC";
$limit = "LIMIT 50";
include("used-car-list.php"); 
?>

</div>


<div id="title">News/Tips</div>
<div id="area">
<?php 
$cond = "";
$sort = "ORDER BY post_id DESC";
$limit = "LIMIT 4";
include("post_list.php"); 
?>
</div>