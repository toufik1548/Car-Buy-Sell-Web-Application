<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-12">
<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>/user-list/">User List</a></li>
    <li class="breadcrumb-item active" aria-current="page">Person List</li>
  </ol>
</nav>

<div class="card">
  <div class="card-header" align="center"><span class="badge badge-light"><h3>&nbsp; Person List (<?php echo get_total("car_persons", "person_id","");?>) &nbsp;</h3></span></div>
  <div class="card-body">

<table class="table table-striped table-bordered" width="100%">

  <tr>
    <th><center>ID</center></th>
    <th><center>Name</center></th>
    <th><center>Email</center></th>
    <th><center>Actions</center></th>
  </tr>

<?php
$qp = mysqli_query($con,"SELECT * FROM car_persons ORDER BY person_id DESC");
while($rp=mysqli_fetch_assoc($qp)){
?>
<tr>
	<td align="center"><?php echo $rp["person_id"]; ?></td>
  <td><?php echo $rp["person_name"]; ?></td>
	<td><?php echo get_info("car_users","user_email","WHERE user_id=".$rp["user_id"]); ?></td>
  <td align="center">
    <a class="btn btn-secondary btn-sm" href="<?php echo $cp_url; ?>/person-details/<?php echo $rp["user_id"]; ?>/">Details</a>
    <a class="btn btn-info btn-sm" href="<?php echo $cp_url; ?>/person-edit/<?php echo $rp["user_id"]; ?>/">Edit</a>
    <a class="btn btn-dark btn-sm" href="<?php echo $cp_url; ?>/user-cars/<?php echo $rp["user_id"]; ?>/" role="button">Car List</a>
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