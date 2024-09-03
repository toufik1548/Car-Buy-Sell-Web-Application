<?php

$user_id = $slug2;

?>

<?php


$qp = mysqli_query($con,"SELECT * FROM car_persons WHERE user_id=$user_id");
$rp = mysqli_fetch_assoc($qp);

$person_id = $rp['person_id'];
$user_id = $rp['user_id'];
$user_email = get_info("car_users","user_email","WHERE user_id=".$rp["user_id"]);

$person_name = $rp['person_name'];
$person_address = $rp['person_address'];

$location_id = $rp['location_id'];
$location_name = get_info("car_locations","location_name","WHERE location_id=".$rp["location_id"]);

$person_phone = $rp['person_phone'];
$update_date = $rp['update_date'];

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
     <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>/person-list/">Person List</a></li>
    <li class="breadcrumb-item active" aria-current="page">Person Details</li>
  </ol>
</nav>

<span style="float:right;">
<a class="btn btn-info btn-sm" href="<?php echo $cp_url; ?>/person-edit/<?php echo $user_id; ?>/">Edit</a>
<a class="btn btn-dark btn-sm" href="<?php echo $cp_url; ?>/user-cars/<?php echo $user_id; ?>/" role="button">Car List</a>
</span>
<br><br>

	<div class="card">
	  <div class="card-header" align="center"><span class="badge badge-dark">Person Details</span></div>
	  <div class="card-body">
<table width="100%" class="table table-bordered">
<tbody>
	<tr>
		<td width="20%"><b>User ID & Email:</b></td>
		<td>(<?php echo $user_id; ?>) <?php echo $user_email; ?></td>
	</tr>
	<tr>
		<td width="20%"><b>Person ID:</b></td>
		<td><?php echo $person_id; ?></td>
	</tr>
	<tr>
		<td width="20%"><b>Name:</b></td>
		<td><?php echo $person_name; ?></td>
	</tr>
	<tr>
		<td width="20%"><b>Address:</b></td>
		<td><?php echo $person_address; ?></td>
	</tr>
	<tr>
		<td width="20%"><b>City:</b></td>
		<td><?php echo $location_name; ?></td>
	</tr>
	<tr>
		<td width="20%"><b>Phone:</b></td>
		<td><?php echo $person_phone; ?></td>
	</tr>
	<tr>
		<td width="20%"><b>Date:</b></td>
		<td><?php echo $update_date; ?></td>
	</tr>
</tbody>
</table>

<br>

<a class="btn btn-info btn-sm" href="<?php echo $cp_url; ?>/person-edit/<?php echo $user_id; ?>/">Edit</a>
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