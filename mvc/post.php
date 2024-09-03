<?php
$post_id=$slug2;
//views update
mysqli_query($con,"UPDATE car_posts SET views=views+1 WHERE post_id=$post_id");

$qn = mysqli_query($con,"SELECT * FROM car_posts WHERE post_id=$post_id");
$rn = mysqli_fetch_assoc($qn);
?>


<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo $site_url; ?>/" class="b-title">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $post_title; ?></li>
  </ol>
</nav>

<h1><?php echo $rn["post_title"]; ?></h1>

<div id="title"><?php echo $post_title; ?></div>
<div id="area">

<span class="fa fa-calendar"></span> &nbsp;<?php echo $rn["add_date"]; ?>
&nbsp;&nbsp; Views: <?php echo $rn["views"]; ?>
<center>
<?php
//photo
$photo = get_info("car_posts","post_photo", "WHERE post_id=$post_id");


if($photo!=""){
  echo "<img src='$site_url/images/media/$photo' class='img-responsive' style='width:80%; height:70%;'>";
}

else{
  echo "<img src='$site_url/images/media/noimage.jpg' class='img-responsive' width='50%' height='50%'>";
}

?>
</center>
<br>
<center><?php include("fb_share.php"); ?></center><br>
<?php echo $rn["post_details"]; ?>
</div>

<div id="title">More News/Tips</div>
<div id="area">
<?php 
$cond = "";
$sort = "ORDER BY post_id DESC";
$limit = "LIMIT 20";
include("post_links.php"); 
?>
</div>


<!--RELATED MORE USED CAR START-->
<div id="title">You can choose</div>

<div id="area">
<?php
$cond = "";
$sort = "ORDER BY car_id DESC";
$limit = "LIMIT 100";
include("used-car-list.php");
?>
</div>