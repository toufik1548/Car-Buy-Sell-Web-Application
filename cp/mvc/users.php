<a class="btn btn-primary btn-sm" href="<?php echo $cp_url; ?>/user-add/" role="button">Add New User</a>
<br><br>

<div class="card">
  <div class="card-header" align="center"><span class="badge badge-light"><h3>&nbsp; Users (<?php echo get_total("car_users", "user_id","");?>) &nbsp;</h3></span></div>
  <div class="card-body">

    <form method="POST" action="">
      <input type="text" name="user_search" placeholder="userid or email">
      <input type="Submit" name="submit" value="Submit">
    </form>

<?php
if(isset($_POST['submit'])){
  $user_search = trim($_POST['user_search']);

  $cond = "WHERE user_id='$user_search' OR user_email LIKE '%$user_search%'";
}else{
  $cond = "ORDER BY user_id DESC LIMIT 20";
}
?>



<table class="table table-striped table-bordered" width="100%">
<?php
$qu = mysqli_query($con,"SELECT * FROM car_users $cond");
while($ru=mysqli_fetch_assoc($qu)){
?>
<tr>
  <td><?php echo $ru["user_id"]; ?></td>


	<td><?php echo $ru["add_date"]; ?></td>
	<td>
<?php 
if($ru["type_id"]==1){
echo get_info("car_persons","person_name","WHERE user_id=".$ru["user_id"]);
}elseif($ru["type_id"]==2){
echo get_info("car_showrooms","showroom_name","WHERE user_id=".$ru["user_id"]);
}


	?>

	</td>
	<td><?php echo $ru["user_email"]; ?></td>
	<td><?php echo get_info("car_users_types","type_name","WHERE type_id=".$ru["type_id"]); ?></td>
	<td><?php echo get_info("car_users_status","status_name","WHERE status_id=".$ru["status"]); ?></td>

<td>

<?php if($ru["type_id"]==1){?>
<a class="btn btn-secondary btn-sm" href="<?php echo $cp_url; ?>/user-details-person/<?php echo $ru["user_id"]; ?>/" role="button">Person Details</a>
<?php }elseif($ru["type_id"]==2){?>

<a class="btn btn-dark btn-sm" href="<?php echo $cp_url; ?>/user-details-showroom/<?php echo $ru["user_id"]; ?>/" role="button">Showroom Details</a>

<a class="btn btn-warning btn-sm" href="<?php echo $cp_url; ?>/user-details-showroom-photo/<?php echo $ru["user_id"]; ?>/" role="button">Banner</a>

<?php } ?>

<a class="btn btn-danger btn-sm" href="<?php echo $cp_url; ?>/user-cars/<?php echo $ru["user_id"]; ?>/" role="button">Car List</a>
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