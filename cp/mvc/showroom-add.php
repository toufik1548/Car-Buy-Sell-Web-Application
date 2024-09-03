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
    <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>/showroom-list/">Showroom List</a></li>
    <li class="breadcrumb-item active" aria-current="page">Showroom Add</li>
  </ol>
</nav>


<div class="card">
  <div class="card-header" align="center"><span class="badge badge-light"><h3>&nbsp; Add Showroom  &nbsp;</h3></span></div>
  <div class="card-body">
<?php

if(isset($_POST['showroom_name']) && $_POST['showroom_name']!=''){$Showroom_Name=$_POST['showroom_name'];}else{$Showroom_Name="";}

if(isset($_POST['showroom_address']) && $_POST['showroom_address']!=''){$Showroom_Address=$_POST['showroom_address'];}else{$Showroom_Address="";}

if(isset($_POST['showroom_phones']) && $_POST['showroom_phones']!=''){$Showroom_Phones=$_POST['showroom_phones'];}else{$Showroom_Phones="";}

if(isset($_POST['showroom_email']) && $_POST['showroom_email']!=''){$Showroom_Email=$_POST['showroom_email'];}else{$Showroom_Email="";}

if(isset($_POST['showroom_url']) && $_POST['showroom_url']!=''){$Showroom_Url=$_POST['showroom_url'];}else{$Showroom_Url="";}

if(isset($_POST['showroom_details']) && $_POST['showroom_details']!=''){$Showroom_Details=$_POST['showroom_details'];}else{$Showroom_Details="";}

if(isset($_POST['showroom_hours']) && $_POST['showroom_hours']!=''){$Showroom_Hours=$_POST['showroom_hours'];}else{$Showroom_Hours="";}

if(isset($_POST['showroom_lat']) && $_POST['showroom_lat']!=''){$Showroom_Lat=$_POST['showroom_lat'];}else{$Showroom_Lat="";}

if(isset($_POST['showroom_long']) && $_POST['showroom_long']!=''){$Showroom_Long=$_POST['showroom_long'];}else{$Showroom_Long="";}

?>

<?php

if(isset($_POST['action'])&&$_POST['action']=="Submit")
{

    $showroom_name = trim($_POST['showroom_name']);
    $showroom_slug = dv_slug($showroom_name);
    $showroom_address = trim($_POST['showroom_address']);
    $location_id = $_POST['location_id'];
    $showroom_phones = trim($_POST['showroom_phones']);
    $showroom_email = trim($_POST['showroom_email']);
    $showroom_url = trim($_POST['showroom_url']);
    $showroom_details = trim($_POST['showroom_details']);
    $showroom_hours = trim($_POST['showroom_hours']);
    $showroom_lat = trim($_POST['showroom_lat']);
    $showroom_long = trim($_POST['showroom_long']);
    
    $lfile_name=$_FILES["file_name"]["name"];
    $showroom_photo  = trim($lfile_name);

    $update_date = date('Y-m-d');
    $views = 1;
    $status = 1;


//Display error msg

	$err=array();

	if($showroom_name=='')
		{ $err[]="Please Enter Name";}
	if($showroom_photo=='')
		{ $err[]="Please Enter Name";}
  	if($location_id==0)
    { $err[]="<font color='red'>*** Please select <b>City</b></font>";}

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


$q=mysqli_query($con,"INSERT INTO `car_showrooms` (
	`showroom_id`, 
	`user_id`, 
	`showroom_name`, 
	`showroom_slug`, 
	`showroom_address`, 
	`location_id`, 
	`showroom_phones`, 
	`showroom_email`, 
	`showroom_url`, 
	`showroom_details`, 
	`showroom_hours`, 
	`showroom_lat`, 
	`showroom_long`, 
	`showroom_photo`, 
	`update_date`, 
	`views`, 
	`status`) 

VALUES (
	NULL, 
	'$user_id', 
	'$showroom_name', 
	'$showroom_slug', 
	'$showroom_address', 
	'$location_id', 
	'$showroom_phones', 
	'$showroom_email', 
	'$showroom_url', 
	'$showroom_details', 
	'$showroom_hours', 
	'$showroom_lat', 
	'$showroom_long', 
	'$showroom_photo', 
	'$update_date', 
	'1', 
	'1');");



if($q)
{


//       UPLOAD IMAGE

static $ads_filename;

$pic_path="../images/users/$user_id/banners";


$tmp_name = $_FILES["file_name"]["tmp_name"];
$lname  = $_FILES["file_name"]["name"];
$name = trim($lname);
move_uploaded_file($tmp_name, "$pic_path/$name");


echo "<div class='alert alert-info alert-dismissible' role='alert'>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  <b>Showroom Added Successfully!</b>
</div>";


$Showroom_Name="";
$Showroom_Address="";
$Showroom_Phones="";
$Showroom_Email="";
$Showroom_Url="";
$Showroom_Details="";
$Showroom_Hours="";
$Showroom_Lat="";
$Showroom_Long="";

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
  <td width="20%">Showroom Name<font color='red'>*</font></td>
  <td>
  <input type="text" name="showroom_name" class="form-control" value="<?php echo $Showroom_Name; ?>" required>
  </td>
</tr>
<tr>
  <td>Address</td>
  <td>
  <input type="text" name="showroom_address" class="form-control" value="<?php echo $Showroom_Address; ?>">
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
    <input type="text" name="showroom_phones" class="form-control" value="<?php echo $Showroom_Phones; ?>">
  </td>
</tr>
<tr>
  <td>Email</td><td>
  <input type="text" name="showroom_email" class="form-control" value="<?php echo $Showroom_Email; ?>">
  </td>
</tr>
<tr>
  <td>Website</td>
  <td>
  <input type="text" name="showroom_url" class="form-control" value="<?php echo $Showroom_Url; ?>">
  </td>
</tr>
<tr>
  <td>Details</td>
  <td>
  <textarea name="showroom_details" class="form-control"><?php echo $Showroom_Details; ?></textarea>
  </td>
</tr>

<tr>
  <td>Open Hour</td>
  <td>
  <textarea name="showroom_hours" class="form-control"><?php echo $Showroom_Hours; ?></textarea>
  </td>
</tr>

<tr>
  <td>Map Lat</td>
  <td>
  <input name="showroom_lat" type="text" class="form-control" value="<?php echo $Showroom_Lat; ?>">
  </td>
</tr>
<tr>
  <td>Map Long</td>
  <td>
  <input name="showroom_long" type="text" class="form-control" value="<?php echo $Showroom_Long; ?>">
  </td>
</tr>
<tr>
	<td>Photo<font color='red'>*</font></td>
	<td><input name="file_name" type="file" id="file_name" required></td>
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