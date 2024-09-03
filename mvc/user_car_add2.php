
<script>
		function showUser_brand(str) {
			if (str == "") {
				document.getElementById("model").innerHTML = "";
				return;
			} else {
				if (window.XMLHttpRequest) {
					// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp = new XMLHttpRequest();
				} else {
					// code for IE6, IE5
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("model").innerHTML = this.responseText;
					}
				};
				xmlhttp.open("GET","https://www.deshicar.com/mvc/get_model.php?brand="+str,true);
				xmlhttp.send();
			}
		}
		
			
		
		</script>



<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo $site_url; ?>/">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo $site_url; ?>/dashboard/">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add car</li>
  </ol>
</nav>


<div id="title">Add car</div>
<div id="area">

<!--<div class="alert alert-danger">
<h2>ছবি পরে যুক্ত করতে হবে</h2>
</div>-->


<?php
//if(isset($_POST['model_id'])) {$model_id=$_POST['model_id=0'];}else{$model_id=""]);
if(isset($_POST['car_name'])){$CarName=$_POST['car_name'];}else{$CarName="";}
if(isset($_POST['car_details'])){$CarDetails=$_POST['car_details'];}else{$CarDetails="";}
if(isset($_POST['model_year'])){$ModelYear=$_POST['model_year'];}else{$ModelYear="";}
if(isset($_POST['reg_year'])){$RegYear=$_POST['reg_year'];}else{$RegYear="";}
if(isset($_POST['engine_cc'])){$EngineCC=$_POST['engine_cc'];}else{$EngineCC="";}
if(isset($_POST['km_run'])){$KMRUN=$_POST['km_run'];}else{$KMRUN="";}
if(isset($_POST['car_price'])){$CarPrice=$_POST['car_price'];}else{$CarPrice="";}


if(isset($_POST['Submit']) && $_POST['Submit']=='Submit')
	{

		$car_name		=	$_POST['car_name'];
		$car_slug		=	slug($car_name)."-".time();
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


$lfile_name=$_FILES["file_name"]["name"];
$photo_name	=	trim($lfile_name);

$pic_path="./images/users/$sess_user_id";
$tmp_name = $_FILES["file_name"]["tmp_name"];
$lname 	= $_FILES["file_name"]["name"];
$name	= trim($lname);
move_uploaded_file($tmp_name, "$pic_path/$name");

//Display error msg

	$err=array();

if($car_name=='')
		{ $err[]="Please Enter Car Name";}
if($brand_id=='0')
		{ $err[]="Please Select Brand";}
if($model_id=='0')
		{ $err[]="Please Select Model";}
if($type_id=='0')
		{ $err[]="Please Select Body Type";}
if($fuel_id=='0')
		{ $err[]="Please Select Fuel Type";}
if($engine_cc=='')
		{ $err[]="Please Enter Engine CC";}
if($car_price=='' OR $car_price==0)
		{ $err[]="Please Enter Car Price";}
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
NULL , '$sess_user_id','$sess_location_id','$car_name','$car_slug','$brand_id','$model_id','$model_year','$reg_year','$condition_id','$trans_id','$type_id','$fuel_id','$engine_cc','$km_run','$car_details','$car_price','$car_price_negotiable','$add_date','$update_date','1', '1'
)");

	
		if($query)	{
$car_id = mysqli_insert_id($con);

mysqli_query($con,"INSERT INTO `car_used_photo` (
`photo_id` ,
`car_id` ,
`photo_name`
)
VALUES (
NULL , 
'$car_id', 
'$photo_name')");


				echo "<div class=\"alert alert-success\" role=\"alert\">Your Car Added Successfully!<br><br>
				<a href='$site_url/car-photo-upload/$car_id/'  type=\"button\" class=\"btn btn-primary btn-lg\">Add More Photo</a>
				</div>";

$CarName="";
$CarDetails="";
$ModelYear="";
$RegYear="";
$EngineCC="";
$KMRUN="";
$CarPrice="";
				
						}//end of IF Submit



			else
					{
					echo "<div class=\"alert alert-danger\" role=\"alert\">Sorry, Failed to add Record</div>";
					} //end of else

	}//end of else if no err
	}// end of IF Submit


?>




<form name="form1" method="post" action="" enctype="multipart/form-data">


<div class="form-group">
<label for="car_name">Brand</label><br>				
				<select name="brand_id" id="brand" onchange="showUser_brand(this.value)">
				<option select="selected">Select Brand</option>
				<?php 
				$qt = mysqli_query($con,"SELECT * FROM `car_brands` WHERE `status`='1' ORDER BY brand_name ASC");
				while($rest = mysqli_fetch_array($qt))
				{
				?>
				<option value="<?php echo $rest['brand_id']; ?>" 				
				<?php //if(isset($_POST['brand_id']) && $_POST['brand_id']==$rest['brand_id']) {echo "selected";} ?>>

				 <?php echo ($rest['brand_name']); ?></option>
				
				<?php 
				}
				?>

				</select>
</div>
		

				
<div class="form-group">
<label for="car_name">Model</label><br>
				<select name="model_id" id="model" >
					<option selected="selected">Select Brand First</option>
			</select>
</div>




<div class="form-group">
<label for="car_name">Car Name</label>
<input name="car_name" type="text" class="form-control" value="<?php echo $CarName; ?>" required>
</div>

<div class="form-group">
<label for="model_year">Model Year</label>
<input name="model_year" type="text" maxlength="4" class="form-control" value="<?php echo $ModelYear; ?>">
</div>


<div class="form-group">
<label for="reg_year">Registration Year</label>
<input name="reg_year" type="text" maxlength="4" class="form-control"  value="<?php echo $RegYear; ?>">
</div>



<div class="form-group">
<label for="condition_id">Condition</label>
<select name="condition_id" class="form-control">
	<?php
	$qc = mysqli_query($con,"SELECT condition_id,condition_name FROM car_conditions ORDER BY condition_name DESC");
	while($rc=mysqli_fetch_assoc($qc)){?>
<option value="<?php echo $rc['condition_id']; ?>"
<?php if(isset($_POST['condition_id']) && $_POST['condition_id']==$rc['condition_id']){echo "Selected";}?>
	><?php echo $rc['condition_name']; ?></option>
	<?php } ?>
</select>
</div>


<div class="form-group">
<label for="trans_id">Transmissions</label>

<select name="trans_id" class="form-control">
	<?php
	$qt = mysqli_query($con,"SELECT trans_id,trans_name FROM car_transmissions ORDER BY trans_name ASC");
	while($rt=mysqli_fetch_assoc($qt)){?>
<option value="<?php echo $rt['trans_id']; ?>"
<?php if(isset($_POST['trans_id']) && $_POST['trans_id']==$rt['trans_id']){echo "Selected";}?>
	><?php echo $rt['trans_name']; ?></option>
	<?php } ?>
</select>
</div>


<div class="form-group">
<label for="type_id">Body Type</label>

<select name="type_id" class="form-control">
	<option value="0">Select Body Type</option>
	<?php
	$qbt = mysqli_query($con,"SELECT type_id,type_name FROM car_types ORDER BY type_name ASC");
	while($rbt=mysqli_fetch_assoc($qbt)){?>
<option value="<?php echo $rbt['type_id']; ?>"
<?php if(isset($_POST['type_id']) && $_POST['type_id']==$rbt['type_id']){echo "Selected";}?>
	><?php echo $rbt['type_name']; ?></option>
	<?php } ?>
</select>
</div>


<div class="form-group">
<label for="fuel_id">Fuel</label>

<select name="fuel_id" class="form-control">
	<option value="0">Select Fuel</option>
	<?php
	$qf = mysqli_query($con,"SELECT fuel_id,fuel_name FROM car_fuels ORDER BY fuel_name ASC");
	while($rf=mysqli_fetch_assoc($qf)){?>
<option value="<?php echo $rf['fuel_id']; ?>"
<?php if(isset($_POST['fuel_id']) && $_POST['fuel_id']==$rf['fuel_id']){echo "Selected";}?>
	><?php echo $rf['fuel_name']; ?></option>
	<?php } ?>
</select>
</div>


<div class="form-group">
<label for="engine_cc">Engine CC</label>
<input name="engine_cc" type="text" maxlength="4" required class="form-control" value="<?php echo $EngineCC; ?>">
</div>

<div class="form-group">
<label for="km_run">KM Run</label>
<input name="km_run" type="text" maxlength="6" class="form-control"  value="<?php echo $KMRUN; ?>">
</div>

<div class="form-group">
<label for="car_details">Details</label>
<textarea name="car_details" class="form-control"><?php echo $CarDetails; ?></textarea>
</div>


<div class="form-group">
<label for="car_price">Price</label>
<input name="car_price" type="text" maxlength="8" class="form-control" value="<?php echo $CarPrice; ?>" required>
</div>

<div class="form-group">
<input type="checkbox" name="car_price_negotiable" value="1" <?php if(isset($_POST['car_price_negotiable']) && $_POST['car_price_negotiable']==1){ echo "checked"; } ?>> Price Negotiable
</div>

<div class="form-group">
<label for="file_name">Photo</label>
<input name="file_name" type="file" id="file_name" required>
</div>


<div class="form-group">
<input type="submit" name="Submit" value="Submit" class="submit" class="form-control">
</div>
  </form>


</div>
