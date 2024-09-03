<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-12">
<br>


<div class="card">
  <div class="card-header" align="center"><span class="badge badge-light"><h3>&nbsp; Person List (<?php echo get_total("car_persons", "person_id","");?>) &nbsp;</h3></span></div>
  <div class="card-body">

      <form method="POST" action="">
      <input type="text" name="person_search" placeholder="Name OR phone number OR User ID">
      <input type="Submit" name="Submit" value="Submit">
    </form>
    <?php
        if(isset($_POST['Submit'])){
          $person_search = trim($_POST['person_search']);
          $cond = "WHERE user_id='$person_search' OR person_name LIKE '%$person_search%' OR person_phone LIKE '%$person_search%'";
        }else{
          $cond = "ORDER BY person_id DESC LIMIT 20";
        }
    ?>

<table class="table table-striped table-bordered" width="100%">

  <tr>
    <th><center>User ID</center></th>
    <th><center>Add Date</center></th>
    <th><center>Name</center></th>
    <th><center>Email</center></th>
    <th><center>Mobile</center></th>
    <th><center>Actions</center></th>
  </tr>

<?php
$qp = mysqli_query($con,"SELECT * FROM car_persons $cond");
while($rp=mysqli_fetch_assoc($qp)){
?>
<tr>
	<td align="center"><?php echo $rp["user_id"]; ?></td>
  <td><?php echo $rp["update_date"]; ?></td>
  <td><?php echo $rp["person_name"]; ?></td>
	<td><?php echo get_info("car_users","user_email","WHERE user_id=".$rp["user_id"]); ?></td>
  <td><?php echo $rp["person_phone"]; ?></td>
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