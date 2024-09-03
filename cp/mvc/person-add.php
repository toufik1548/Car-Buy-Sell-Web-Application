<?php

$user_id = $slug2;

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
    <li class="breadcrumb-item active" aria-current="page">Person Add</li>
  </ol>
</nav>


<div class="card">
  <div class="card-header" align="center"><span class="badge badge-light"><h3>&nbsp; Add showroom  &nbsp;</h3></span></div>
  <div class="card-body">
<?php

if(isset($_POST['person_name']) && $_POST['person_name']!=''){$Person_Name=$_POST['person_name'];}else{$Person_Name="";}
if(isset($_POST['person_address']) && $_POST['person_address']!=''){$Person_Address=$_POST['person_address'];}else{$Person_Address="";}
if(isset($_POST['person_phone']) && $_POST['person_phone']!=''){$Person_Phone=$_POST['person_phone'];}else{$Person_Phone="";}

?>

<?php

if(isset($_POST['action'])&&$_POST['action']=="Submit")
{

    $person_name = trim($_POST['person_name']);
    $person_address = trim($_POST['person_address']);
    $location_id = $_POST['location_id'];
    $person_phone = trim($_POST['person_phone']);

    $update_date = date('Y-m-d');
    //$status = 1;


//Display error msg

	$err=array();

  	if($person_name=='')
  		{ $err[]="Please Enter Name";}
  	if($location_id==0)
    { $err[]="<font color='red'>*** Please Select <b>City</b></font>";}

	$n=	count($err);


if($n>0)
	{
	echo "<div class=\"alert alert-danger\" role=\"alert\"><ol>";

	for($i=0;$i<$n;$i++)
			{ echo "<li>".$err[$i]."</li>"; }
	echo "</ol></div>";

	}
else
	{


$q=mysqli_query($con,"INSERT INTO `car_persons` (
  `person_id`, 
  `user_id`, 
  `person_name`, 
  `person_address`, 
  `location_id`, 
  `person_phone`, 
  `update_date`) 

VALUES (
  NULL, 
  '$user_id', 
  '$person_name', 
  '$person_address', 
  '$location_id', 
  '$person_phone', 
  '$update_date');");



if($q){

echo "<div class='alert alert-info alert-dismissible' role='alert'>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  <b>Showroom Added Successfully!</b>
</div>";


$Person_Name="";
$Person_Address="";
$Person_Phone="";

}
else
{
echo "<div class='alert alert-danger alert-dismissible' role='alert'>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  Sorry!!! Failed to add record! Please Try Again...
</div>";
}

	}//end of else if no err
	}// end of IF Submit
?>




<form name="form1" method="post" action="" enctype="multipart/form-data">
<table class="table table-striped table-bordered" width="100%">
<tr>
  <td width="20%">Person Name<font color='red'>*</font></td>
  <td>
  <input type="text" name="person_name" class="form-control" value="<?php echo $Person_Name; ?>" required>
  </td>
</tr>
<tr>
  <td>Address</td>
  <td>
  <input type="text" name="person_address" class="form-control" value="<?php echo $Person_Address; ?>">
  </td>
</tr>

<tr>
  <td>City<font color='red'>*</font></td>
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
  <?php if($rl['location_id']==$rls["location_id"]){echo " Selected";}?>><?php echo $rls["location_name"]; ?></option>
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
    <input type="text" name="person_phone" class="form-control" value="<?php echo $Person_Phone; ?>">
  </td>
</tr>
<tr>
  <td colspan="2" align="center"><input type="submit" name="action" value="Submit" class="btn btn-danger btn-block" style="width:200px"></td>
</tr>
</table>
</form>

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