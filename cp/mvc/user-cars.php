<?php
$user_id 	= $slug2;
?>
<br>
<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-12">


	<div class="card">
	  <div class="card-header" align="center"><span class="badge badge-dark">Car List</span></div>
	  <div class="card-body">

<table width="100%" class="table table-bordered">
  <tr>
    <th><center>Photo</center></th>
    <th><center>Name</center></th>
    <th><center>Date</center></th>
    <th><center>Status</center></th>
    <th><center>Actions</center></th>
  </tr>
<?php
$qc = mysqli_query($con,"SELECT * FROM car_used WHERE user_id=$user_id ORDER BY car_id DESC LIMIT 50");
while($rc=mysqli_fetch_assoc($qc)){?>
<tr>
	<td align="center">
	<?php
	$photo = get_info("car_used_photo","photo_name","WHERE car_id=".$rc['car_id']." ORDER BY photo_id ASC LIMIT 1");
	?>
	<?php if($photo !=""){?>
	<img src="../../../images/users/<?php echo $user_id; ?>/<?php echo $photo; ?>" width="80"><?php } ?>
	</td>
	<td><?php echo $rc['car_name']; ?></td>
	<td align="center"><?php echo $rc['add_date']; ?></td>
    <td align="center"><?php if($rc['status']==1){echo "<font color='green'>Active</font>";} else {echo "<font color='#B8860B'>Inactive</font>";} ?></td>
    <td align="center">Edit - 
		<a class="btn btn-warning btn-sm" href="<?php echo $cp_url; ?>/user-car-photo-add/<?php echo $rc['car_id']; ?>/">Add photo</a>
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