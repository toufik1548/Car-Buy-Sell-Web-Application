<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-12">
<br>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>/user-list/">User List</a></li>
    <li class="breadcrumb-item active" aria-current="page">User Add</li>
  </ol>
</nav>


<div class="card">
  <div class="card-header" align="center"><span class="badge badge-light"><h3>&nbsp; Add New User  &nbsp;</h3></span></div>
  <div class="card-body">


<?php

if(isset($_POST['user_email'])){$USEREMAIL = $_POST['user_email'];}else{$USEREMAIL="";}
if(isset($_POST['user_password'])){$USERPASSWORD = $_POST['user_password'];}else{$USERPASSWORD="";}




if(isset($_POST['Submit']))
	{

$type_id		=	$_POST['type_id'];
$user_email		=	trim($_POST['user_email']);
$user_password	=	md5(trim($_POST['user_password']));
$add_date		=	date("Y-m-d");
$status			=	1;


//Display error msg

	$err=array();

	if($type_id==0)
		{ $err[]="Please select user type";}
	if($user_email=='')
		{ $err[]="Please enter email";}
	if($user_password=='')
		{ $err[]="Please enter password";}
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


	$query=mysqli_query($con,"INSERT INTO `car_users` (
`user_id` ,
`type_id` ,
`user_email` ,
`user_password` ,
`add_date` ,
`status`
)
VALUES (
NULL , '$type_id','$user_email','$user_password', '$add_date', '$status'
)");

	
		if($query)	{

$user_id = mysqli_insert_id($con);

				echo "<div class=\"alert alert-success\" role=\"alert\">User Added Successfully!</div>";

$USEREMAIL="";
$USERPASSWORD="";

//making folder for user at images
mkdir("../images/users/".$user_id, 0700);
//making BANNER folder for showroom at images
mkdir("../images/users/".$user_id."/banners", 0700);

//inserting data for person
$update_date	=	date("Y-m-d");
if($type_id==1){
mysqli_query($con,"INSERT INTO car_persons(person_id,user_id,update_date) VALUES(NULL,$user_id,'$update_date')");
}
if($type_id==2){
mysqli_query($con,"INSERT INTO car_showrooms(showroom_id,user_id,update_date) VALUES(NULL,$user_id,'$update_date')");
}
						}//end of IF Submit
			else
					{
					echo "<div class=\"alert alert-danger\" role=\"alert\">Sorry, Failed to add Record</div>";
					} //end of else

	}//end of else if no err
	}// end of IF Submit
?>




  <form name="form1" method="post" action="" enctype="multipart/form-data">

  <table class="table table-striped table-bordered" width="100%">

    <tr>
      <td class="td" width="15%"><b>Type</b></td>
      <td>
<select name="type_id">
	<option value="0">Select user type</option>
<?php
$qt = mysqli_query($con, "SELECT type_id,type_name FROM car_users_types");
while($rt=mysqli_fetch_assoc($qt)){?>
<option value="<?php echo $rt["type_id"]; ?>"
<?php
if(isset($_POST['type_id']) && $_POST['type_id']==$rt["type_id"]){echo "Selected";}
?>
	><?php echo $rt["type_name"]; ?></option>
	<?php } ?>
</select>
      </td>
    </tr>

    <tr>
      <td class="td"><b>Email</b></td>
      <td><input name="user_email" type="email" value="<?php echo $USEREMAIL; ?>" class="form-control" width="100%"></td>
    </tr>

    <tr>
      <td class="td"><b>Password</b></td>
      <td><input name="user_password" type="text" value="<?php echo $USERPASSWORD; ?>" class="form-control" width="100%"></td>
    </tr>

    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="SUBMIT" class="btn btn-primary btn-sm" style="width:200px"></td>
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