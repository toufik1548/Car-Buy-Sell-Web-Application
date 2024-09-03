<?php
if(isset($_POST['Submit']))
	{

		$model_name		=	$_POST['model_name'];
		$status				=	1;



//Display error msg

	$err=array();

	if($model_name=='')
		{ $err[]="Please Enter Name";}

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


	$query=mysqli_query($con,"INSERT INTO `car_models` (
`model_id` ,
`brand_id` ,
`model_name` ,
`status`
)
VALUES (
NULL , '$brand_id','$model_name','1'
)");

	
		if($query)	{
				echo "<div class=\"alert alert-success\" role=\"alert\">Record added successfully</div>";
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
  <td width="15%"><b>Model Name</b></td>
  <td><input name="model_name" type="text" class="form-control" width="100%"></td>
  <td width="10%"><input type="submit" name="Submit" value="SUBMIT" class="btn btn-primary btn-sm"></td>
</tr>
</table>
</form>