
<?php
//$con = mysqli_connect("localhost", "root", "","deshicar");
include("../configs/config.php");
	?>



<?php
	$brand = $_GET['brand'];
 ?>



<select name="model_id">
<option value="0">Select Model</option>
 <?php
 $qv=mysqli_query($con,"SELECT * FROM car_models WHERE brand_id=$brand ORDER BY model_name ASC");
 while($rv=mysqli_fetch_array($qv)){
 ?>
<option value="<?php echo $rv['model_id']; ?>"
<?php if(isset($_POST['model_id']) && $_POST['model_id']==$rv['model_id']) {echo "Selected";} ?>>
	<?php echo $rv['model_name']; ?>
		
	</option>
<?php } ?>
</select>

