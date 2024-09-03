<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-12">
<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>/user-list/">User List</a></li>
    <li class="breadcrumb-item active" aria-current="page">Showroom List</li>
  </ol>
</nav>

<div class="card">
  <div class="card-header" align="center"><span class="badge badge-light"><h3>&nbsp; Showrooms (<?php echo get_total("car_showrooms", "showroom_id","");?>) &nbsp;</h3></span></div>
  <div class="card-body">

<table class="table table-striped table-bordered" width="100%">

  <tr>
    <th><center>ID</center></th>
    <th><center>Name</center></th>
    <th><center>Email</center></th>
    <th><center>Views</center></th>
    <th><center>Status</center></th>
    <th><center>Actions</center></th>
  </tr>

<?php
$qs = mysqli_query($con,"SELECT * FROM car_showrooms ORDER BY showroom_id DESC");
while($rs=mysqli_fetch_assoc($qs)){
?>
<tr>
	<td align="center"><?php echo $rs["showroom_id"]; ?></td>
  <td><?php echo $rs["showroom_name"]; ?></td>
	<td><?php echo get_info("car_users","user_email","WHERE user_id=".$rs["user_id"]); ?></td>
  <td align="center"><?php echo $rs["views"]; ?></td>
  <td align="center"><?php if($rs['status']==1){echo "<font color='green'>Active</font>";} else {echo "<font color='#B8860B'>Inactive</font>";} ?></td> 
	<td align="center">
    <a href="<?php echo $cp_url; ?>/showroom-photo/<?php echo $rs["user_id"]; ?>/"><button type="button" class="btn btn-warning btn-sm">Photo</button></a>
    <a class="btn btn-secondary btn-sm" href="<?php echo $cp_url; ?>/showroom-details/<?php echo $rs["user_id"]; ?>/">Details</a>
    <a class="btn btn-info btn-sm" href="<?php echo $cp_url; ?>/showroom-edit/<?php echo $rs["user_id"]; ?>/">Edit</a>
    <a class="btn btn-dark btn-sm" href="<?php echo $cp_url; ?>/user-cars/<?php echo $rs["user_id"]; ?>/" role="button">Car List</a>
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