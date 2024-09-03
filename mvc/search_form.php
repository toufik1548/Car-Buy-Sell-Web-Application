
<div id="title">Search 
<span style="float: right; margin-right:5px;">
	<?php include'search_filter_form.php'; ?>
</span>
		
	</div>




<div id="area" style="padding-top:15px; padding-bottom:15px; background:#c0c0c0;">




	<center>



<form method="POST" action="<?php echo $site_url; ?>/search/">



<select name="location_id" style="width: 30%;" class="form-control">
	<option value="0" class="form-control" >All Bangladesh</option>
<?php
$ql = mysqli_query($con,"SELECT location_id,location_name FROM car_locations WHERE status=1 AND parent_id=0 AND location_name!='Bangladesh' ORDER BY location_name ASC");
while($rl=mysqli_fetch_assoc($ql)){?>
<option value="<?php echo $rl['location_id']; ?>"
<?php if(isset($_POST['location_id']) && $_POST['location_id']==$rl['location_id']){echo " Selected";}?>>

<?php echo $rl['location_name']; ?></option>
<?php } ?>
</select>

<span>

	<input type="text" name="q" maxlength="50" style="width: 40%;" class="form-control" value="<?php if(isset($_POST['q'])){echo $_POST['q'];}?>" placeholder="Type car name">
	<input class="btn btn-primary" type="Submit" name="submit" value="Search">
</form>

</span>
</center>




<style type="text/css">
	.form-control{
		display: inline-block !important;
	}
</style>

</div>

