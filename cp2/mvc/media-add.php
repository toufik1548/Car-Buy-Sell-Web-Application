<div class="card">
  <div class="card-header" align="center"><span class="badge badge-light text-dark"><h3>&nbsp; Add Photo &nbsp;</h3></span></div>
  <div class="card-body">
<?php
if(isset($_POST['Submit']))
	{

$pic_path="../images/media/";
$tmp_name = $_FILES["file_name"]["tmp_name"];
$lname 	= $_FILES["file_name"]["name"];
$name	= time()."_".trim($lname);
move_uploaded_file($tmp_name, "$pic_path/$name");
$add_date = date("Y-m-d");
$file_type = $_FILES['file_name']['type'];
$file_size = $_FILES['file_name']['size'];


$query=mysqli_query($con,"INSERT INTO `car_media` (
`media_id` ,
`file_name` ,
`file_type` ,
`file_size` ,
`add_date`
)
VALUES (
NULL , '$name','$file_type','$file_size','$add_date'
)");

	
		if($query)	{

				echo "<div class=\"alert alert-success\" role=\"alert\">Record added successfully</div>";
						}//end of IF Submit
			else
					{
					echo "<div class=\"alert alert-danger\" role=\"alert\">Sorry, Failed to add Record</div>";
					} //end of else


	}// end of IF Submit
?>

<form name="form1" method="post" action="" enctype="multipart/form-data">
<table class="table table-striped table-bordered" width="75%">
	<tr>
		<td><b>File</b></td>
		<td><input name="file_name" type="file" id="file_name"></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="Submit" value="Upload" class="submit"></td>
	</tr>
</table>
</form>
</div>
</div>