<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-12">
<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>/user-list/">User List</a></li>
    <li class="breadcrumb-item active" aria-current="page">Temp Showroom List</li>
  </ol>
</nav>

<div class="card">
  <div class="card-header" align="center"><span class="badge badge-light"><h3>&nbsp; Temp Showrooms (<?php echo get_total("temp_showrooms", "showroom_id","");?>) &nbsp;</h3></span></div>
  <div class="card-body">

<table class="table table-striped table-bordered" width="100%">

  <tr>
    <th><center>ID</center></th>
    <th><center>Name</center></th>
    <th><center>Address</center></th>
    <th><center>Location</center></th>
    <th><center>Mobile</center></th>
  </tr>

<?php
$qs = mysqli_query($con,"SELECT * FROM temp_showrooms ORDER BY showroom_id DESC");
while($rs=mysqli_fetch_assoc($qs)){
?>
<tr>
	<td align="center"><?php echo $rs["showroom_id"]; ?></td>
  <td><?php echo $rs["showroom_name"]; ?></td>
  <td align="center"><?php echo $rs["showroom_address"]; ?></td>
  <td align="center"><?php echo get_info('car_locations','location_name',"WHERE location_id=".$rs["location_id"]);?></td>
  <td align="center"><?php echo $rs["showroom_mobile"]; ?></td>

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