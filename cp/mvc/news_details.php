<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo $site_url; ?>/">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo $site_url; ?>/news/">News</a></li>
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
<span style="float: right;"><a href="<?php echo $site_url; ?>/news-bn/<?php echo $rn['news_slug']; ?>/" title="Bangla Version"><button type="button" class="btn btn-primary btn-sm">Bangla Version</button></a></span>


<h1 align="center"><?php echo $rn["news_title"]; ?></h1>

<center>
<?php
//photo
$photo = get_info("car_news","news_photo", "WHERE news_id=".$rn["news_id"]." ORDER BY news_id ASC LIMIT 1");

if($photo!=""){
  echo "<img src='$site_url/images/news/$photo' class='img-responsive' style='width:50%; height:50%;'>";
}

else{
  echo "<img src='$site_url/images/news/noimage.jpg' class='img-responsive' width='50%' height='50%'>";
}

?>
</center>
<br>

<?php echo nl2br($rn["news_details"]); ?>
</div>