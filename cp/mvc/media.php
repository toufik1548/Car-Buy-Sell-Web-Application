<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-12">
<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Media</li>
  </ol>
</nav>


<?php include("media-add.php"); ?>

<br>

<div class="card">
  <div class="card-header" align="center"><span class="badge badge-light"><h3>&nbsp; Photos (<?php echo get_total("car_media", "media_id","");?>) &nbsp;</h3></span></div>
  <div class="card-body">

<table class="table table-striped table-bordered" width="100%">
	<tr>
		<th><center>Photo</center></th>
		<th><center>File Name/Code</center></th>
		<th><center>Type</center></th>
		<th><center>Size KB</center></th>
		<th><center>Date</center></th>
		<th><center>Actions</center></th>
	</tr>
<?php
$qm = mysqli_query($con,"SELECT * FROM car_media ORDER BY media_id DESC LIMIT 10");
while($rm=mysqli_fetch_assoc($qm)){?>

<tr>
	<td width="15%" align="center">
		<img src="../../images/media/<?php echo $rm["file_name"]; ?>" height="50" class="img-responsive">
	</td>
	<td width="45%">
<input type="text" value='<?php echo $rm["file_name"]; ?>' style="width:450px"><br>
		<input type="text" value='
<a href="https://www.deshicar.com/images/media/<?php echo $rm["file_name"]; ?>" title="<?php echo $rm["file_name"]; ?>" target="_blank">
<img src="https://www.deshicar.com/images/media/<?php echo $rm["file_name"]; ?>" alt="<?php echo $rm["file_name"]; ?>" class="img-responsive" style="display: block; margin: 0 auto;" width="500"></a>
		' style="width:450px">
		
	</td>
	<td align="center">
		<?php echo $rm["file_type"]; ?>
	</td>
	<td align="center">
		<?php echo ceil($rm["file_size"]/1024); ?>
	</td>
	<td align="center">
		<?php echo $rm["add_date"]; ?>
	</td>
	<td align="center">
	<!--<a class="btn btn-danger btn-sm" href="#" role="button">Delete</a>-->
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