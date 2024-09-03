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
    <li class="breadcrumb-item active" aria-current="page">User Edit</li>
  </ol>
</nav>

	<div class="card">
	  <div class="card-header" align="center"><span class="badge badge-dark">Edit User</span></div>
	  <div class="card-body">

<?php

if (isset($_POST["update"])) {

$type_id=$_POST["type_id"];
$user_email=addslashes($_POST["user_email"]);
$status=$_POST["status"];

$q=mysqli_query($con, 
  "UPDATE `car_users` SET 
  type_id='$type_id',
  user_email='$user_email',
  status='$status'
  WHERE user_id=$user_id");


if($q){
  echo "<div class='alert alert-info alert-dismissible' role='alert'>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  <b>User Updated Successfully!</b>
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
$q = mysqli_query($con,"SELECT *  FROM car_users WHERE user_id=$user_id");
$r=mysqli_fetch_assoc($q);

?>

<form name="form1" method="POST" action="">
<table class="table table-striped table-bordered">
<tbody>
<tr>
  <td width="15%">Email</td>
  <td>
  <input type="text" name="user_email" class="form-control" value="<?php echo $r['user_email']; ?>">
  </td>
</tr>
<tr>
  <td>Type</td>
  <td>
<select name="type_id" style="width:200px">
  <option value="0">Select Location</option>
  <?php
  $qt = mysqli_query($con,"SELECT type_id,type_name FROM car_users_types ORDER BY type_id ASC");
  while($rt=mysqli_fetch_assoc($qt)){?>
<option value="<?php echo $rt['type_id']; ?>"
<?php if($r['type_id']==$rt['type_id']){echo "Selected";}?>
  ><?php echo $rt['type_name']; ?></option>
  <?php } ?>
</select>
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