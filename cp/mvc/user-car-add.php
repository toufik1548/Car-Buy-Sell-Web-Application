<?php
$user_id 	= $slug2;
$location_id = get_info("car_showrooms","location_id","WHERE user_id=$user_id");
?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>/users/">Users</a></li>
    <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>/user-cars/<?php echo $user_id; ?>/">User Cars</a></li>    
    <li class="breadcrumb-item active" aria-current="page">Car Add</li>
  </ol>
</nav>


<h3>Add Car</h3>
<?php
if(isset($_POST['Submit']) && $_POST['Submit']=='Submit')
	{

		$car_name		=	$_POST['car_name'];
		$car_slug		=	dv_slug($car_name)."-".time();
		$brand_id		=	$_POST['brand_id'];
		$model_id		=	$_POST['model_id'];
		$model_year		=	$_POST['model_year'];
		$reg_year		=	$_POST['reg_year'];
		$condition_id	=	$_POST['condition_id'];
		$trans_id	=	$_POST['trans_id'];
		$type_id	=	$_POST['type_id'];
		$fuel_id	=	$_POST['fuel_id'];
		$engine_cc	=	$_POST['engine_cc'];
		$km_run		=	$_POST['km_run'];

		$car_details		=	addslashes($_POST['car_details']);
		$car_price		=	$_POST['car_price'];
		
if (!isset($_POST["car_price_negotiable"])) { $car_price_negotiable=0; }
		else { $car_price_negotiable=$_POST['car_price_negotiable']; }

		$add_date			=	date('Y-m-d');
		$update_date		=	date('Y-m-d');
		$views				=	1;
		$status				=	1;

/*
$pic_path="../images/brands/logo/";
$tmp_name = $_FILES["file_name"]["tmp_name"];
$lname 	= $_FILES["file_name"]["name"];
$name	= trim($lname);
move_uploaded_file($tmp_name, "$pic_path/$name");
*/
//Display error msg

	$err=array();

	if($car_name=='')
		{ $err[]="Please Enter Car Name";}
if($brand_id=='0')
		{ $err[]="Please Select Brand";}
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


	$query=mysqli_query($con,"INSERT INTO `car_used` (
`car_id` ,
`user_id` ,
`location_id` ,
`car_name` ,
`car_slug` ,
`brand_id` ,
`model_id` ,
`model_year` ,
`reg_year` ,
`condition_id` ,
`trans_id` ,
`type_id` ,
`fuel_id` ,
`engine_cc` ,
`km_run` ,
`car_details` ,
`car_price` ,
`car_price_negotiable` ,
`add_date` ,
`update_date` ,
`views` ,
`status`
)
VALUES (
NULL , '$user_id','$location_id','$car_name','$car_slug','$brand_id','$model_id','$model_year','$reg_year','$condition_id','$trans_id','$type_id','$fuel_id','$engine_cc','$km_run','$car_details','$car_price','$car_price_negotiable','$add_date','$update_date','1', '1'
)");

	
		if($query)	{
$car_id = mysqli_insert_id($con);

				echo "<div class=\"alert alert-success\" role=\"alert\">Record added successfully<br>
				<a href='$cp_url/user-car-photo-add/$car_id/'>Add Photo</a>
				</div>";
						}//end of IF Submit
			else
					{
					echo "<div class=\"alert alert-danger\" role=\"alert\">Sorry, Failed to add Record</div>";
					} //end of else

	}//end of else if no err
	}// end of IF Submit
?>




  <form name="form1" method="post" action="" enctype="multipart/form-data">

  <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0" class="table">

<tr>
      <td class="td">Brand</td>
      <td>
<select name="brand_id" onchange="this.form.submit()">
	<option value="0">Select Brand</option>
	<?php
	$qb = mysqli_query($con,"SELECT brand_id,brand_name FROM car_brands ORDER BY brand_name ASC");
	while($rb=mysqli_fetch_assoc($qb)){?>
<option value="<?php echo $rb['brand_id']; ?>"
<?php if(isset($_POST['brand_id']) && $_POST['brand_id']==$rb['brand_id']){echo "Selected";}?>
	><?php echo $rb['brand_name']; ?></option>
	<?php } ?>
</select>
      </td>
    </tr>

    <tr>
      <td class="td">Model</td>
      <td>
<select name="model_id">
	<option value="0">Select Model</option>
<?php 

if(isset($_POST['brand_id']) && $_POST['brand_id']>0){
$brand_id = $_POST['brand_id'];

$qm = mysqli_query($con,"SELECT * FROM car_models WHERE brand_id=$brand_id ORDER BY model_name ASC");
while($rm=mysqli_fetch_assoc($qm)){?>
<option value="<?php echo $rm["model_id"]; ?>" 
	<?php if(isset($_POST["model_id"]) && $rm['model_id']==$_POST["model_id"]){echo " Selected";}?>><?php echo $rm["model_name"]; ?></option>
<?php 
}}
?>
</select>
      </td>
    </tr>


    <tr>
      <td class="td">Car Name</td>
      <td><input name="car_name" type="text">      </td>
    </tr>


    

    <tr>
      <td class="td">Model Year</td>
      <td><input name="model_year" type="text" maxlength="4">      </td>
    </tr>

    <tr>
      <td class="td">Registration Year</td>
      <td><input name="reg_year" type="text" maxlength="4">      </td>
    </tr>


<tr>
      <td class="td">Condition</td>
      <td>
<select name="condition_id">
	<?php
	$qc = mysqli_query($con,"SELECT condition_id,condition_name FROM car_conditions ORDER BY condition_name DESC");
	while($rc=mysqli_fetch_assoc($qc)){?>
<option value="<?php echo $rc['condition_id']; ?>"
<?php if(isset($_POST['condition_id']) && $_POST['condition_id']==$rc['condition_id']){echo "Selected";}?>
	><?php echo $rc['condition_name']; ?></option>
	<?php } ?>
</select>
      </td>
    </tr>


<tr>
      <td class="td">Transmissions</td>
      <td>
<select name="trans_id">
	<?php
	$qt = mysqli_query($con,"SELECT trans_id,trans_name FROM car_transmissions ORDER BY trans_name ASC");
	while($rt=mysqli_fetch_assoc($qt)){?>
<option value="<?php echo $rt['trans_id']; ?>"
<?php if(isset($_POST['trans_id']) && $_POST['trans_id']==$rt['trans_id']){echo "Selected";}?>
	><?php echo $rt['trans_name']; ?></option>
	<?php } ?>
</select>
      </td>
    </tr>


<tr>
      <td class="td">Body Type</td>
      <td>
<select name="type_id">
	<option value="0">Select Body Type</option>
	<?php
	$qbt = mysqli_query($con,"SELECT type_id,type_name FROM car_types ORDER BY type_name ASC");
	while($rbt=mysqli_fetch_assoc($qbt)){?>
<option value="<?php echo $rbt['type_id']; ?>"
<?php if(isset($_POST['type_id']) && $_POST['type_id']==$rbt['type_id']){echo "Selected";}?>
	><?php echo $rbt['type_name']; ?></option>
	<?php } ?>
</select>
      </td>
    </tr>

<tr>
      <td class="td">Fuel</td>
      <td>
<select name="fuel_id">
	<option value="0">Select Fuel</option>
	<?php
	$qf = mysqli_query($con,"SELECT fuel_id,fuel_name FROM car_fuels ORDER BY fuel_name ASC");
	while($rf=mysqli_fetch_assoc($qf)){?>
<option value="<?php echo $rf['fuel_id']; ?>"
<?php if(isset($_POST['fuel_id']) && $_POST['fuel_id']==$rf['fuel_id']){echo "Selected";}?>
	><?php echo $rf['fuel_name']; ?></option>
	<?php } ?>
</select>
      </td>
    </tr>


    <tr>
      <td class="td">Engine CC</td>
      <td><input name="engine_cc" type="text">      </td>
    </tr>
    <tr>
      <td class="td">KM Run</td>
      <td><input name="km_run" type="text">      </td>
    </tr>

    <tr>
      <td class="td">Details</td>
      <td><textarea name="car_details"></textarea>      </td>
    </tr>

    <tr>
      <td class="td">Price ( প্রাইজটি 2550000 এই ভাবে , ছাড়া লিখুন )</td>
      <td><input name="car_price" type="text">      </td>
    </tr>

    <tr>
      <td class="td">Negotiable</td>
      <td><input type="checkbox" name="car_price_negotiable" value="1" <?php if(isset($_POST['car_price_negotiable']) && $_POST['car_price_negotiable']==1){ echo "checked"; } ?>>      </td>
    </tr>

    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Submit" class="submit"></td>
    </tr>

  </table>

  </form>

<p>&nbsp; </p>
<p>&nbsp; </p>
<p>&nbsp; </p>
</div>
