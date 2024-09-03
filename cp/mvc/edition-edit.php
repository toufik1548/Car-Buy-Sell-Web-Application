<?php

$edition_id=$slug2;

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
    <!--<li class="breadcrumb-item"><a href="<?php //echo $cp_url; ?>/editions/<?php //echo get_info("car_models","model_id","WHERE status=1"); ?>">Model</a></li>-->
    <li class="breadcrumb-item active" aria-current="page">Edition Edit</li>
  </ol>
</nav>

<div class="card">
  <div class="card-header" align="center"><span class="badge badge-light"><h3>&nbsp; Edit Edition &nbsp;</h3></span></div>
  <div class="card-body">


<?php

if(isset($_POST['Submit']))

	{
		$model_id =	$_POST['model_id'];
		$edition_title	=	$_POST['edition_title'];

		if (!isset($_POST["status"])) { $status=0; }
		else { $status=$_POST['status']; }

//Display error msg
	$err=array();
	if($edition_title=='')
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
	$query=mysqli_query($con,"UPDATE car_editions SET model_id='$model_id',edition_title='$edition_title',status =	'$status' 
	WHERE
    edition_id= '$edition_id'");

	if($query)	{

		echo "<div class=\"alert alert-success\" role=\"alert\"><b>Edition Updated Successfully!</b></div>";

				}//end of IF Submit
	else
			{

			echo "<div class=\"alert alert-danger\" role=\"alert\">Sorry!! Failed To Update!</div>";

			}

	}//end of else if no err
	}// end of IF Submit

?>





<?php

	$query=mysqli_query($con,"SELECT * FROM car_editions where edition_id='$edition_id'");

	$rm = mysqli_fetch_array($query);
?>



<form name="form1" method="post" action="">
<table class="table table-striped table-bordered" width="100%">

<tr>
<td width="15%" class="td"><b>Model</b></td>
	<td width="300">
<select name="model_id">
<?php
$qb = mysqli_query($con,"SELECT * FROM car_models ORDER BY model_name ASC");
while($rb=mysqli_fetch_assoc($qb)){?>
<option value="<?php echo $rb["model_id"]; ?>" 
	<?php if($rb['model_id']==$rm["model_id"]){echo " Selected";}?>><?php echo $rb["model_name"]; ?></option>
<?php 
}
?>
</select>
	</td>
</tr>

<tr>
	<td width="200" class="td"><b>Model Name</b></td>
	<td width="300"><input name="edition_title" type="text" value="<?php echo $rm['edition_title']; ?>" class="form-control" width="100%"></td>
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