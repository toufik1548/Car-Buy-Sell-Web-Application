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
     <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>/person-list/">Person List</a></li>
    <li class="breadcrumb-item active" aria-current="page">Person Edit</li>
  </ol>
</nav>

	<div class="card">
	  <div class="card-header" align="center"><span class="badge badge-dark">Edit Person</span></div>
	  <div class="card-body">

<?php

if (isset($_POST["update"])) {

$person_name=addslashes($_POST["person_name"]);
$person_address=addslashes($_POST["person_address"]);
$location_id=$_POST["location_id"];
$person_phone=addslashes($_POST["person_phone"]);
$update_date = date('Y-m-d');

$q=mysqli_query($con, 
  "UPDATE `car_persons` SET 
  person_name='$person_name',
  person_address='$person_address',
  location_id='$location_id',
  person_phone='$person_phone',
  update_date='$update_date'
  WHERE user_id=$user_id");


if($q){
  echo "<div class='alert alert-info alert-dismissible' role='alert'>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  <b>Person Updated Successfully!</b>
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
$q = mysqli_query($con,"SELECT *  FROM car_persons WHERE user_id=$user_id");
$r=mysqli_fetch_assoc($q);

?>

<form name="form1" method="POST" action="">
<table class="table table-striped table-bordered">
<tbody>
<tr>
  <td width="15%">Name</td>
  <td>
  <input type="text" name="person_name" class="form-control" value="<?php echo $r['person_name']; ?>">
  </td>
</tr>
<tr>
  <td>Address</td>
  <td>
  <input type="text" name="person_address" class="form-control" value="<?php echo $r['person_address']; ?>">
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
  <td>Phone</td>
  <td>
    <input type="text" name="person_phone" class="form-control" value="<?php echo $r['person_phone']; ?>">
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