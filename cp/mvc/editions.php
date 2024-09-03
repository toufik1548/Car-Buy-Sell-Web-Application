
<?php
$model_id = $slug2;
$model_name=get_info("car_models","model_name","WHERE model_id=$model_id");
$brand_name=get_info("car_brands","brand_name","WHERE brand_id=$slug2");
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
     <!--<li class="breadcrumb-item"><a href="<?php //echo $cp_url; ?>/models/<?php //echo get_info("car_brands","brand_id","WHERE brand_id=$brand_id"); ?>">Models</a></li>-->
    <li class="breadcrumb-item active" aria-current="page"><?php echo $model_name; ?> Editions</li>
  </ol>
</nav>


<?php include("editions-add.php"); ?>

<div class="card">
  <div class="card-header" align="center"><span class="badge badge-light"><h3>&nbsp; <?php echo $model_name; ?> Editions (<?php echo get_total("car_editions", "edition_id","WHERE model_id=$model_id");?>)&nbsp;</h3></span></div>
  <div class="card-body">

<table class="table table-striped table-bordered" width="100%">
	<tr>
		<th><center>Editions ID</center></th>
		<th><center>Editions Name</center></th>
		<th><center>Actions</center></th>
	</tr>

<?php 
$qe = mysqli_query($con,"SELECT * FROM car_editions WHERE model_id=$model_id ORDER BY edition_title ASC");
while($re=mysqli_fetch_assoc($qe)){
 ?>

	<tr>
		<td align="center" width="15%"><?php echo $re['edition_id']; ?></td>
		<td><?php echo $re['edition_title']; ?></td>
		<td align="center" width="15%">
		<a class="btn btn-info btn-sm" href="<?php echo $cp_url; ?>/edition-edit/<?php echo $re['edition_id']; ?>" role="button">Edit</a>
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