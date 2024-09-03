<?php

$model_id=$slug2;

?>
<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-12">
<br>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>/brands/">Brands</a></li>
    <li class="breadcrumb-item active" aria-current="page">Model Edit</li>
  </ol>
</nav>

<div class="card">
  <div class="card-header" align="center"><span class="badge badge-light"><h3>&nbsp; Edit Model &nbsp;</h3></span></div>
  <div class="card-body">


<?php

if(isset($_POST['Submit']))

	{
		$brand_id =	$_POST['brand_id'];
		$model_name	=	$_POST['model_name'];

		if (!isset($_POST["status"])) { $status=0; }
		else { $status=$_POST['status']; }

//Display error msg
	$err=array();
	if($model_name=='')
		{ $err[]="Please enter name";}
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
	$query=mysqli_query($con,"UPDATE car_models SET brand_id='$brand_id',model_name='$model_name',status =	'$status' 
	WHERE
    model_id= '$model_id'");

	if($query)	{

		echo "<div class=\"alert alert-success\" role=\"alert\"><b>Model Updated Successfully!</b></div>";

				}//end of IF Submit
	else
			{

			echo "<div class=\"alert alert-danger\" role=\"alert\">Sorry!! Failed To Update!</div>";

			}

	}//end of else if no err
	}// end of IF Submit

?>





<?php

	$query=mysqli_query($con,"SELECT * FROM car_models where model_id='$model_id'");

	$rm = mysqli_fetch_array($query);
?>



<form name="form1" method="post" action="">
<table class="table table-striped table-bordered" width="100%">

<tr>
	<td width="15%" class="td"><b>Brand</b></td>
	<td width="300">
<select name="brand_id">
<?php
$qb = mysqli_query($con,"SELECT * FROM car_brands ORDER BY brand_name ASC");
while($rb=mysqli_fetch_assoc($qb)){?>
<option value="<?php echo $rb["brand_id"]; ?>" 
	<?php if($rb['brand_id']==$rm["brand_id"]){echo " Selected";}?>><?php echo $rb["brand_name"]; ?></option>
<?php 
}
?>
</select>
	</td>
</tr>

<tr>
	<td width="200" class="td"><b>Model Name</b></td>
	<td width="300"><input name="model_name" type="text" value="<?php echo $rm['model_name']; ?>" class="form-control" width="100%"></td>
</tr>

<tr>
	<td width="150" class="td"><b>Publish</b></td>
	<td><input type="checkbox" name="status"value="1" <?php if($rm['status']==1){ echo "checked"; } ?>></td>
	</tr>

<tr>
    <td width="200">&nbsp;</td>
    <td width="300"><input type="submit" name="Submit" value="UPDATE" class="btn btn-primary btn-sm" style="width:200px"></td>
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