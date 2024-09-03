<?php

$news_id = $slug2;

?>

<?php


$qn = mysqli_query($con,"SELECT * FROM car_news WHERE news_id=$news_id");
$rn = mysqli_fetch_assoc($qn);

$news_id = $rn['news_id'];
$news_title = $rn['news_title'];
$news_slug = $rn['news_slug'];
$news_details = $rn['news_details'];
$news_title_bn = $rn['news_title_bn'];
$news_details_bn = $rn['news_details_bn'];
$news_photo = $rn['news_photo'];
$news_tags = $rn['news_tags'];
$add_date = $rn['add_date'];
$status = $rn['status'];
?>

<br>
<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-12">

<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-light">
    <li class="breadcrumb-item"><a href="../">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>/news/">News</a></li>
    <li class="breadcrumb-item active" aria-current="page">News Details</li>
  </ol>
</nav>

	<div class="card">
	  <div class="card-header" align="center"><span class="badge badge-light"><h3>News Details</h3></span></div>
	  <div class="card-body">

<table width="100%" class="table table-bordered">
<tbody>
	<tr>
		<td><b>Photo:</b></td>
    <td align="center">
<?php
//photo
$photo = get_info("car_news","news_photo", "WHERE news_id=".$rn["news_id"]." ORDER BY news_id ASC LIMIT 1");

if($photo!=""){
  echo "<img src='$cp_url/../images/news/$photo' class='img-responsive' style='width:50%; height:50%;'>";
}

else{
  echo "<img src='$cp_url/../images/news/noimage.jpg' class='img-responsive' width='50' height='50'>";
}

?>

    </td>
	</tr>
	<tr>
		<td width="20%"><b>ID:</b></td>
		<td><?php echo $news_id; ?></td>
	</tr>
	<tr>
		<td><b>Title:</b> <small>(English)</small></td>
		<td><?php echo $news_title; ?></td>
	</tr>
	<tr>
		<td><b>Slug:</b></td>
		<td><?php echo $news_slug; ?></td>
	</tr>
	<tr>
		<td><b>Details:</b> <small>(English)</small></td>
		<td><?php echo nl2br($news_details); ?></td>
	</tr>
	<tr>
		<td><b>Title:</b> <small>(বাংলা)</small></td>
		<td><?php echo $news_title_bn; ?></td>
	</tr>
	<tr>
		<td><b>Details:</b> <small>(বাংলা)</small></td>
		<td><?php echo nl2br($news_details_bn); ?></td>
	</tr>
	<tr>
		<td><b>Tips Tag:</b></td>
		<td><?php echo $news_tags; ?></td>
	</tr>
	<tr>
		<td><b>Date:</b></td>
		<td><?php echo $add_date; ?></td>
	</tr>
	<tr>
		<td><b>Status:</b></td>
		<td><?php if($rn['status']==1){echo "<font color='green'>Active</font>";} else {echo "<font color='#B8860B'>Inactive</font>";} ?></td>
	</tr>
</tbody>
</table>

<br>

<a href="<?php echo $cp_url; ?>/news-edit/<?php echo $rn["news_id"]; ?>/">
	<button type="button" class="btn btn-info btn-sm">Edit</button>
</a>

      </div>
      <!--./card-body\-->
    </div>
    <!--./card\-->
    </div>
    <!--./col-lg-12\-->
  </div>
  <!--./row\-->
</div>
<!--./container\-->
<br>