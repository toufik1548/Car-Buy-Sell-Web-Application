
<?php
$brand_id = $slug2;
$brand_name=get_info("car_brands","brand_name","WHERE brand_id=$brand_id");
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
    <li class="breadcrumb-item active" aria-current="page"><?php echo $brand_name; ?> Models</li>
  </ol>
</nav>

<?php include("model-add.php"); ?>

<div class="card">
  <div class="card-header" align="center"><span class="badge badge-light"><h3>&nbsp; <?php echo $brand_name; ?> Models (<?php echo get_total("car_models", "model_id","WHERE brand_id=$brand_id");?>)&nbsp;</h3></span></div>
  <div class="card-body">

<table class="table table-striped table-bordered" width="100%">
	<tr>
		<th><center>Model ID</center></th>
		<th><center>Model Name</center></th>
    <th><center>Total Editions</center></th>
		<th><center>Actions</center></th>
	</tr>

<?php 
$qm = mysqli_query($con,"SELECT * FROM car_models WHERE brand_id=$brand_id ORDER BY model_name ASC");
while($rm=mysqli_fetch_assoc($qm)){
 ?>

	<tr>
		<td align="center" width="15%"><?php echo $rm['model_id']; ?></td>
		<td><?php echo $rm['model_name']; ?></td>
  <td align="center" width="10%"><?php echo get_total("car_editions", "edition_id","WHERE model_id=".$rm["model_id"]);?></td>
		<td align="center" width="20%">
		<a class="btn btn-info btn-sm" href="<?php echo $cp_url; ?>/model-edit/<?php echo $rm['model_id']; ?>" role="button">Edit</a>
<a class="btn btn-success btn-sm" href="<?php echo $cp_url; ?>/editions/<?php echo $rm['model_id']; ?>" role="button">Editions</a>
		</td>
	</tr>
<?php } ?>
</table>

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