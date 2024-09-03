
<?php

	$con = mysqli_connect("localhost", "deshicar_deshicar", "dc@2019*com","deshicar_deshicar");
	
	if (mysqli_connect_errno())
	{
	  die ("Failed to connect to MySQL: " . mysqli_connect_error());
	}
	?>



<?php
	$brand = $_GET['brand'];
 ?>



<select name="model_id">
<option>Select Model</option>
 <?php
 $qv=mysqli_query($con,"SELECT * FROM car_models WHERE brand_id=$brand ORDER BY model_name ASC");
 while($rv=mysqli_fetch_array($qv)){
 ?>
<option value="<?php echo $rv['model_id']; ?>"><?php echo $rv['model_name']; ?></option>
<?php } ?>
</select>

