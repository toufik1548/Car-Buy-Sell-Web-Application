<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-12">
<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Brands</li>
  </ol>
</nav>

<a class="btn btn-primary" href="<?php echo $cp_url; ?>/brand-add/" role="button">Add New Brand</a>
<br><br>

<div class="card">
  <div class="card-header" align="center"><span class="badge badge-light"><h3>&nbsp; Brands (<?php echo get_total("car_brands", "brand_id","WHERE status=1");?>)&nbsp;</h3></span></div>
  <div class="card-body">

<table class="table table-striped table-bordered" width="100%">

	<tr>
		<th><center>Brand ID</center></th>
		<th><center>Photo</center></th>
		<th><center>Name</center></th>
    <th><center>Total Models</center></th>
		<th><center>Actions</center></th>
	</tr>

<?php 
$qb = mysqli_query($con,"SELECT * FROM car_brands WHERE brand_name!='All' ORDER BY brand_name ASC");
while($rb=mysqli_fetch_assoc($qb)){
 ?>
<tr>
	<td align="center" width="10%"><?php echo $rb['brand_id']; ?></td>
	<td align="center" ><img src="../../images/brands/logo/<?php echo $rb['brand_logo']; ?>" width="100"></td>
	<td><?php echo $rb['brand_name']; ?></td>
  <td align="center" width="10%"><?php echo get_total("car_models", "model_id","WHERE brand_id=".$rb["brand_id"]);?></td>
	<td align="center">

<a class="btn btn-info btn-sm" href="<?php echo $cp_url; ?>/brand-edit/<?php echo $rb['brand_id']; ?>" role="button">Edit</a>

<a class="btn btn-success btn-sm" href="<?php echo $cp_url; ?>/models/<?php echo $rb['brand_id']; ?>" role="button">Models</a>
</td></tr>
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