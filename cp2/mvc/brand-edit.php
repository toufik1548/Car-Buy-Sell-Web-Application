<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-12">
<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>/brands/">Brands</a></li>
    <li class="breadcrumb-item active" aria-current="page">Brand Edit</li>
  </ol>
</nav>

<div class="card">
  <div class="card-header" align="center"><span class="badge text-dark"><h3>&nbsp; Edit Brand &nbsp;</h3></span></div>
  <div class="card-body">


<?php

$brand_id=$slug2;

if(isset($_POST['Submit']))

	{

		$brand_name = $_POST['brand_name'];
		$brand_slug = $_POST['brand_slug'];
		$brand_logo = $_POST['brand_logo'];
		if (!isset($_POST["status"])) { $status=0; }
		else { $status=$_POST['status']; }

//Display error msg
	$err=array();
	if($brand_name=='')
		{ $err[]="Please enter name";}
	$n=	count($err);
if($n>0)
	{
	echo "<div class=err_msg><ol>";
	for($i=0;$i<$n;$i++)
			{ echo "<li>".$err[$i]."</li>"; }
	echo "</ol></div>";
	}
else
	{
	$query=mysqli_query($con,"UPDATE car_brands SET brand_name='$brand_name',brand_slug='$brand_slug',brand_logo='$brand_logo',status =	'$status' 
	WHERE
    brand_id= '$brand_id'");

	if($query)	{

		echo "<div class=\"alert alert-success\" role=\"alert\"><b>Brand Updated Successfully!</b></div>";

				}//end of IF Submit
	else
			{

			echo "<div class=\"alert alert-danger\" role=\"alert\">Sorry!! Failed To Update!</div>";

			}

	}//end of else if no err
	}// end of IF Submit

?>





<?php




	$query=mysqli_query($con,"SELECT * FROM car_brands where brand_id='$brand_id'");

	$result = mysqli_fetch_array($query);


?>

<form name="form1" method="post" action="">

<table class="table table-striped table-bordered" width="100%">

<tr>
	<td width="10%" class="td"><b>Name</b></td>
	<td><input name="brand_name" type="text" id="brand_name" value="<?php echo $result['brand_name']; ?>" class="form-control" width="100%"></td>
</tr>

<tr>
	<td class="td"><b>URL</b></td>
	<td><input name="brand_slug" type="text" value="<?php echo $result['brand_slug']; ?>" class="form-control" width="100%"></td>
</tr>

<tr>
	<td class="td"><b>Logo</b></td>
	<td><input name="brand_logo" type="text"  value="<?php echo $result['brand_logo']; ?>" class="form-control" width="100%"></td>
</tr>

<tr>
	<td class="td"><b>Publish</b></td>
	<td><input type="checkbox" name="status" id="status" value="1" <?php if($result['status']==1){ echo "checked"; } ?>></td>
</tr>

<tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="Submit" value="UPDATE" class="btn btn-primary btn-sm" style="width:200px"></td>
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