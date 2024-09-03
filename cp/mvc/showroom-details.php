<?php

$user_id = $slug2;

?>

<?php


$qs = mysqli_query($con,"SELECT * FROM car_showrooms WHERE user_id=$user_id");
$rs = mysqli_fetch_assoc($qs);

$showroom_id = $rs['showroom_id'];
$user_id = $rs['user_id'];
$user_email = get_info("car_users","user_email","WHERE user_id=".$rs["user_id"]);

$showroom_name = $rs['showroom_name'];
$showroom_slug = $rs['showroom_slug'];
$showroom_address = $rs['showroom_address'];

$location_id = $rs['location_id'];
$location_name = get_info("car_locations","location_name","WHERE location_id=".$rs["location_id"]);

$showroom_phones = $rs['showroom_phones'];
$showroom_email = $rs['showroom_email'];
$showroom_url = $rs['showroom_url'];
$showroom_details = $rs['showroom_details'];
$showroom_hours = $rs['showroom_hours'];
$showroom_lat = $rs['showroom_lat'];
$showroom_long = $rs['showroom_long'];
$showroom_photo = $rs['showroom_photo'];
$update_date = $rs['update_date'];
$views = $rs['views'];
$status = $rs['status'];


?>


<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-12">
<br>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>/user-list/">User List</a></li>
     <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>/showroom-list/">Showroom List</a></li>
    <li class="breadcrumb-item active" aria-current="page">Showroom Details</li>
  </ol>
</nav>

<span style="float:right;">
<a class="btn btn-info btn-sm" href="<?php echo $cp_url; ?>/showroom-edit/<?php echo $user_id; ?>/">Edit</a>
<a class="btn btn-warning btn-sm" href="<?php echo $cp_url; ?>/showroom-photo/<?php echo $user_id; ?>/">Photo</a>
<a class="btn btn-dark btn-sm" href="<?php echo $cp_url; ?>/user-cars/<?php echo $user_id; ?>/" role="button">Car List</a>
</span>
<br><br>

	<div class="card">
	  <div class="card-header" align="center"><span class="badge badge-dark">Showroom Details</span></div>
	  <div class="card-body">
<table width="100%" class="table table-bordered">
<tbody>
	<tr>
		<td><b>Photo:</b></td>
    	<td align="center">
<?php
//photo
$photo = get_info("car_showrooms","showroom_photo", "WHERE user_id=$user_id");

if($photo!=""){
  echo "<img src='$cp_url/../images/users/$user_id/banners/$photo' class='img-responsive' style='width:25%; height:25%;'>";
}

else{
  echo "<img src='$cp_url/../images/tips/noimage.jpg' class='img-responsive' style='width:50%; height:50%;'>";
}

?>

    	</td>
	</tr>
	<tr>
		<td width="20%"><b>User ID & Email:</b></td>
		<td>(<?php echo $user_id; ?>) <?php echo $user_email; ?></td>
	</tr>
	<tr>
		<td width="20%"><b>Showroom ID:</b></td>
		<td><?php echo $showroom_id; ?></td>
	</tr>
	<tr>
		<td width="20%"><b>Name:</b></td>
		<td><?php echo $showroom_name; ?></td>
	</tr>
	<tr>
		<td width="20%"><b>Slug:</b></td>
		<td><?php echo $showroom_slug; ?></td>
	</tr>
	<tr>
		<td width="20%"><b>Address:</b></td>
		<td><?php echo $showroom_address; ?></td>
	</tr>
	<tr>
		<td width="20%"><b>City:</b></td>
		<td><?php echo $location_name; ?></td>
	</tr>
	<tr>
		<td width="20%"><b>Phone:</b></td>
		<td><?php echo $showroom_phones; ?></td>
	</tr>
	<tr>
		<td width="20%"><b>Email:</b></td>
		<td><?php echo $showroom_email; ?></td>
	</tr>
	<tr>
		<td width="20%"><b>URL:</b></td>
		<td><?php echo $showroom_url; ?></td>
	</tr>
	<tr>
		<td width="20%"><b>Details:</b></td>
		<td><?php echo nl2br($showroom_details); ?></td>
	</tr>
	<tr>
		<td width="20%"><b>Hours:</b></td>
		<td><?php echo nl2br($showroom_hours); ?></td>
	</tr>
	<tr>
		<td width="20%"><b>Lat:</b></td>
		<td><?php echo $showroom_lat; ?></td>
	</tr>
	<tr>
		<td width="20%"><b>Long:</b></td>
		<td><?php echo $showroom_long; ?></td>
	</tr>
	<tr>
		<td width="20%"><b>Date:</b></td>
		<td><?php echo $update_date; ?></td>
	</tr>
	<tr>
		<td width="20%"><b>Views:</b></td>
		<td><?php echo $views; ?></td>
	</tr>
	<tr>
		<td><b>Status:</b></td>
		<td><?php if($rs['status']==1){echo "<font color='green'>Active</font>";} else {echo "<font color='#B8860B'>Inactive</font>";} ?></td>
	</tr>
</tbody>
</table>

<br>

<a class="btn btn-info btn-sm" href="<?php echo $cp_url; ?>/showroom-edit/<?php echo $user_id; ?>/">Edit</a>
<a class="btn btn-warning btn-sm" href="<?php echo $cp_url; ?>/showroom-photo/<?php echo $user_id; ?>/">Photo</a>
<a class="btn btn-dark btn-sm" href="<?php echo $cp_url; ?>/user-cars/<?php echo $user_id; ?>/" role="button">Car List</a>

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