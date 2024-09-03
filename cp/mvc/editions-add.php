<?php
if(isset($_POST['Submit']))
	{

		$edition_title		=	$_POST['edition_title'];
		$status				=	1;



//Display error msg

	$err=array();

	if($edition_title=='')
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


	$query=mysqli_query($con,"INSERT INTO `car_editions` (
`edition_id` ,
`model_id` ,
`edition_title` ,
`status`
)
VALUES (
NULL , '$model_id','$edition_title','1'
)");

	
		if($query)	{
				echo "<div class=\"alert alert-success\" role=\"alert\"><b>Edition Added Successfully!</b></div>";
						}//end of IF Submit
			else
					{
					echo "<div class=\"alert alert-danger\" role=\"alert\">Sorry, Failed to add Record!</div>";
					} //end of else

	}//end of else if no err
	}// end of IF Submit
?>




  <form name="form1" method="post" action="" enctype="multipart/form-data">
<table class="table table-striped table-bordered" width="100%">
<tr>
  <td width="15%"><b>Edition Title</b></td>
  <td><input name="edition_title" type="text" class="form-control" width="100%"></td>
  <td width="10%"><input type="submit" name="Submit" value="SUBMIT" class="btn btn-primary btn-sm"></td>
</tr>
</table>
</form>