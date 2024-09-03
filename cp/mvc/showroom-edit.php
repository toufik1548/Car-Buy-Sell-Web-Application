<?php

if (isset($slug2) && $slug2>0){

$user_id=$slug2;

}

?>
<br>
<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-12">

<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-light">
    <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>/user-list/">User List</a></li>
     <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>/showroom-list/">Showroom List</a></li>
    <li class="breadcrumb-item active" aria-current="page">Showroom Edit</li>
  </ol>
</nav>

	<div class="card">
	  <div class="card-header" align="center"><span class="badge badge-dark">Edit Showroom</span></div>
	  <div class="card-body">

<?php

if (isset($_POST["update"])) {

$showroom_name=addslashes($_POST["showroom_name"]);
$showroom_slug=addslashes($_POST["showroom_slug"]);
$showroom_address=addslashes($_POST["showroom_address"]);
$location_id=$_POST["location_id"];
$showroom_phones=addslashes($_POST["showroom_phones"]);
$showroom_email=addslashes($_POST["showroom_email"]);
$showroom_url=addslashes($_POST["showroom_url"]);
$showroom_details=addslashes($_POST["showroom_details"]);
$showroom_hours=addslashes($_POST["showroom_hours"]);
$showroom_lat=addslashes($_POST["showroom_lat"]);
$showroom_long=addslashes($_POST["showroom_long"]);
$update_date = date('Y-m-d');
$status=$_POST["status"];

$q=mysqli_query($con, 
  "UPDATE `car_showrooms` SET 
  showroom_name='$showroom_name',
  showroom_slug='$showroom_slug',
  showroom_address='$showroom_address',
  location_id='$location_id',
  showroom_phones='$showroom_phones',
  showroom_email='$showroom_email',
  showroom_url='$showroom_url',
  showroom_details='$showroom_details',
  showroom_hours='$showroom_hours',
  showroom_lat='$showroom_lat',
  showroom_long='$showroom_long',
  update_date='$update_date',
  status='$status'
  WHERE user_id=$user_id");


if($q){
  echo "<div class='alert alert-info alert-dismissible' role='alert'>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  <b>Showroom Updated Successfully!</b>
</div>";

}
else{ 
  echo "<div class='alert alert-warning alert-dismissible' role='alert'>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  Wrong or mismatch!
</div>";
}

}
?>


<?php
$q = mysqli_query($con,"SELECT *  FROM car_showrooms WHERE user_id=$user_id");
$r=mysqli_fetch_assoc($q);

?>

<form name="form1" method="POST" action="">
<table class="table table-striped table-bordered">
<tbody>
<tr>
  <td width="15%">Showroom</td>
  <td>
  <input type="text" name="showroom_name" class="form-control" value="<?php echo $r['showroom_name']; ?>">
  </td>
</tr>
<tr>
  <td>Slug</td>
  <td>
  <input type="text" name="showroom_slug" class="form-control" value="<?php echo $r['showroom_slug']; ?>">
  </td>
</tr>
<tr>
  <td>Address</td>
  <td>
  <input type="text" name="showroom_address" class="form-control" value="<?php echo $r['showroom_address']; ?>">
  </td>
</tr>

<tr>
  <td>Location</td>
  <td>
<select class="form-control" name="location_id">
  <option value="0">Select Location</option>
  <?php
$ql = mysqli_query($con,"SELECT * FROM car_locations WHERE parent_id=0 AND location_id!=1 ORDER BY location_name ASC");
while($rl=mysqli_fetch_assoc($ql)){
  ?>
<?php 

$parent_id = $rl["location_id"];
?>
 <optgroup label="<?php echo $rl["location_name"]; ?>">
<?php
$qls = mysqli_query($con,"SELECT * FROM car_locations WHERE parent_id=$parent_id  ORDER BY location_name ASC");
while($rls=mysqli_fetch_assoc($qls)){?>
<option value="<?php echo $rls["location_id"]; ?>" 
  <?php if($r['location_id']==$rls["location_id"]){echo " Selected";}?>><?php echo $rls["location_name"]; ?></option>
<?php 
}
?>
</optgroup>
<?php
  } 
?>
</select>

  </td>
</tr>

<tr>
  <td>Phones</td>
  <td>
    <input type="text" name="showroom_phones" class="form-control" value="<?php echo $r['showroom_phones']; ?>">
  </td>
</tr>
<tr>
  <td>Email</td><td>
  <input type="text" name="showroom_email" class="form-control" value="<?php echo $r['showroom_email']; ?>">
  </td>
</tr>
<tr>
  <td>Website</td>
  <td>
  <input type="text" name="showroom_url" class="form-control" value="<?php echo $r['showroom_url']; ?>">
  </td>
</tr>
<tr>
  <td>Details</td>
  <td>
  <textarea name="showroom_details" class="form-control"><?php echo $r['showroom_details']; ?></textarea>
  </td>
</tr>

<tr>
  <td>Open Hour</td>
  <td>
  <textarea name="showroom_hours" class="form-control"><?php echo $r['showroom_hours']; ?></textarea>
  </td>
</tr>

<tr>
  <td>Map Lat</td>
  <td>
  <input name="showroom_lat" type="text" class="form-control" value="<?php echo $r['showroom_lat']; ?>">
  </td>
</tr>
<tr>
  <td>Map Long</td>
  <td>
  <input name="showroom_long" type="text" class="form-control" value="<?php echo $r['showroom_long']; ?>">
  </td>
</tr>
<tr>
  <td width="20%">
    <font size="3">Status</font>
  </td>
  <td>
    <input type="radio" name="status" value="1" <?php if($r['status']==1){echo " checked";}?>> <font color="green">Active</font> 
    <input type="radio" name="status" value="0" <?php if($r['status']==0){echo " checked";}?>> <font color="#B8860B">Inactive</font> 
  </td>
</tr>
<tr>
  <td colspan="2" align="center">
    <button type="submit" name="update" value="Submit" class="btn btn-primary btn-block" style="width: 200px">Update</button>
  </td>
</tr>
</tbody>
</table>	  
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