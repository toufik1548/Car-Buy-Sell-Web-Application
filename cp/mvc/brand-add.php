<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-12">
<br>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>/brands/">Brands</a></li>
    <li class="breadcrumb-item active" aria-current="page">Brand Add</li>
  </ol>
</nav>

<div class="card">
  <div class="card-header" align="center"><span class="badge badge-light"><h3>&nbsp; Add Brand &nbsp;</h3></span></div>
  <div class="card-body">

<?php
if(isset($_POST['Submit']))
	{

		$brand_name		=	$_POST['brand_name'];
		$brand_slug		=	dv_slug($brand_name);
		$views				=	1;
		$status				=	1;

$pic_path="../images/brands/logo/";
$tmp_name = $_FILES["file_name"]["tmp_name"];
$lname 	= $_FILES["file_name"]["name"];
$name	= trim($lname);
move_uploaded_file($tmp_name, "$pic_path/$name");

//Display error msg

	$err=array();

	if($brand_name=='')
		{ $err[]="Please Name";}

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


	$query=mysqli_query($con,"INSERT INTO `car_brands` (
`brand_id` ,
`brand_name` ,
`brand_slug` ,
`brand_logo` ,
`views` ,
`status`
)
VALUES (
NULL , '$brand_name','$brand_slug','$name', '1', '1'
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
      <td class="td" width="15%"><b>Brand Name</b></td>
      <td><input name="brand_name" type="text" id="brand_name" class="form-control" width="100%"></td>
    </tr>


    <tr>
      <td class="td"><b>Logo</b></td>
      <td><input name="file_name" type="file" id="file_name"></td>
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