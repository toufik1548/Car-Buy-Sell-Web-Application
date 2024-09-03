<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-12">
<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>">Home</a></li>

    <li class="breadcrumb-item active" aria-current="page">Users</li>
  </ol>
</nav>

<a class="btn btn-primary btn-sm" href="<?php echo $cp_url; ?>/user-add/" role="button">Add New User</a>
<br><br>

<div class="card">
  <div class="card-header" align="center"><span class="badge badge-light"><h3>&nbsp; Users (<?php echo get_total("car_users", "user_id","");?>) &nbsp;</h3></span></div>
  <div class="card-body">

<table class="table table-striped table-bordered" width="100%">
<?php
$aaj = date("Y-m-d");
$qu = mysqli_query($con,"SELECT * FROM car_users WHERE add_date='$aaj' ORDER BY user_id DESC");
while($ru=mysqli_fetch_assoc($qu)){
?>
<tr>
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

<a class="btn btn-danger btn-sm" href="<?php echo $cp_url; ?>/user-status-edit/<?php echo $ru["user_id"]; ?>/" role="button">Status</a>
<?php if($ru["type_id"]==1){?>

<?php 
$person_id = get_info("car_persons","person_id","WHERE user_id=".$ru["user_id"]);

if($person_id==""){ ?>
<a class="btn btn-info btn-sm" href="<?php echo $cp_url; ?>/user-edit/<?php echo $ru["user_id"]; ?>/" role="button">Edit</a>
<a class="btn btn-dark btn-sm" href="<?php echo $cp_url; ?>/person-add/<?php echo $ru["user_id"]; ?>/" role="button">Add Person Details</a>
<?php } ?>

<?php if($person_id!=""){ ?>
<a class="btn btn-secondary btn-sm" href="<?php echo $cp_url; ?>/person-details/<?php echo $ru["user_id"]; ?>/" role="button">Person Details</a>
<?php } ?>

<?php }elseif($ru["type_id"]==2){?>

<?php
$showroom_id = get_info("car_showrooms","showroom_id","WHERE user_id=".$ru["user_id"]);

if($showroom_id==""){ ?>
<a class="btn btn-info btn-sm" href="<?php echo $cp_url; ?>/user-edit/<?php echo $ru["user_id"]; ?>/" role="button">Edit</a>
<a class="btn btn-primary btn-sm" href="<?php echo $cp_url; ?>/showroom-add/<?php echo $ru["user_id"]; ?>/" role="button">Add Showroom</a>
<?php } ?>

<?php if($showroom_id!=""){ ?>
<a class="btn btn-success btn-sm" href="<?php echo $cp_url; ?>/showroom-details/<?php echo $ru["user_id"]; ?>/" role="button">Showroom Details</a>
<?php } ?>

<?php } ?>
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