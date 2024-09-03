<?php

$tips_id = $slug2;

?>

<?php


$qt = mysqli_query($con,"SELECT * FROM car_tips WHERE tips_id=$tips_id");
$rt = mysqli_fetch_assoc($qt);

$tips_id = $rt['tips_id'];
$tips_title = $rt['tips_title'];
$tips_slug = $rt['tips_slug'];
$tips_details = $rt['tips_details'];
$tips_title_bn = $rt['tips_title_bn'];
$tips_details_bn = $rt['tips_details_bn'];
$tips_tags = $rt['tips_tags'];
$add_date = $rt['add_date'];
$status = $rt['status'];
?>


<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-12">
<br>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../">Home</a></li>
     <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>/tips/">Tips</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tips Details</li>
  </ol>
</nav>

	<div class="card">
	  <div class="card-header" align="center"><span class="badge badge-dark">Tips Details</span></div>
	  <div class="card-body">

<table width="100%" class="table table-bordered">
<tbody>
	<tr>
		<td><b>Photo:</b></td>
    <td align="center">
<?php
//photo
$photo = get_info("car_tips","tips_photo", "WHERE tips_id=".$rt["tips_id"]." ORDER BY tips_id ASC LIMIT 1");

if($photo!=""){
  echo "<img src='$cp_url/../images/tips/$photo' class='img-responsive' style='width:50%; height:50%;'>";
}

else{
  echo "<img src='$cp_url/../images/tips/noimage.jpg' class='img-responsive' style='width:50%; height:50%;'>";
}

?>

    </td>
	<tr>
		<td width="20%"><b>ID:</b></td>
		<td><?php echo $tips_id; ?></td>
	</tr>
	<tr>
		<td><b>Title:</b></td>
		<td><?php echo $tips_title; ?></td>
	</tr>
	<tr>
		<td><b>Slug:</b></td>
		<td><?php echo $tips_slug; ?></td>
	</tr>
	<tr>
		<td><b>Details:</b></td>
		<td><?php echo nl2br($tips_details); ?></td>
	</tr>
	<tr>
		<td><b>Title (বাংলা):</b></td>
		<td><?php echo $tips_title_bn; ?></td>
	</tr>
	<tr>
		<td><b>Details (বাংলা):</b></td>
		<td><?php echo nl2br($tips_details_bn); ?></td>
	</tr>
	<tr>
		<td><b>Tips Tag:</b></td>
		<td><?php echo $tips_tags; ?></td>
	</tr>
	<tr>
		<td><b>Date:</b></td>
		<td><?php echo $add_date; ?></td>
	</tr>
	<tr>
		<td><b>Status:</b></td>
		<td><?php if($rt['status']==1){echo "<font color='green'>Active</font>";} else {echo "<font color='#B8860B'>Inactive</font>";} ?></td>
	</tr>
</tbody>
</table>

<br>

<a href="<?php echo $cp_url; ?>/tips-edit/<?php echo $rt["tips_id"]; ?>/">
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