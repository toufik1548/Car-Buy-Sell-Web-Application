<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo $site_url; ?>/" class="b-title">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $news_title; ?></li>
  </ol>
</nav>



<div id="title"><?php echo $news_title; ?></div>
<div id="area">
<?php
//views update
mysqli_query($con,"UPDATE car_news SET views=views+1 WHERE news_id=$news_id");
$qn = mysqli_query($con,"SELECT * FROM car_news WHERE news_id=$news_id");
$rn = mysqli_fetch_assoc($qn);
?>
<span class="fa fa-calendar"></span> &nbsp;<?php echo $rn["add_date"]; ?>
&nbsp;&nbsp; Views: <?php echo $rn["views"]; ?>
<span style="float: right;"><a href="<?php echo $site_url; ?>/news-bn/<?php echo $rn['news_slug']; ?>/" title="Bangla Version"><button type="button" class="btn btn-success btn-sm">Bangla Version</button></a></span>


<h1 align="center"><font SIZE="5"><?php echo $rn["news_title"]; ?></font></h1>

<center>
<?php
//photo
$photo = get_info("car_news","news_photo", "WHERE news_id=".$rn["news_id"]." ORDER BY news_id ASC LIMIT 1");

if($photo!=""){
  echo "<img src='$site_url/images/news/$photo' class='img-responsive' style='width:80%; height:70%;'>";
}

else{
  echo "<img src='$site_url/images/news/noimage.jpg' class='img-responsive' width='50%' height='50%'>";
}

?>
</center>
<br>
<center><?php include("fb_share.php"); ?></center><br>
<?php echo nl2br($rn["news_details"]); ?>
</div>

<!-- CAR NEWS START -->
<div id="title">
<i class="fa fa-car" style='color:#A02021'></i> 
		<a href="<?php echo $site_url; ?>/info/news/">More News</a>
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
include("news_list_en.php");
?>
</div>
<!-- CAR NEWS END -->

<!-- CAR TIPS START -->
<div id="title">
<i class="fa fa-car" style='color:#A02021'></i> 
		<a href="<?php echo $site_url; ?>/info/tips/">Car Tips</a>
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
include("tips_list_en.php");
?>

</div>
<!-- CAR TIPS END -->

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