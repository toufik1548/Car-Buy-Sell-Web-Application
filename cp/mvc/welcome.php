<!--FOR ADNMIN LEVEL ID ONE START-->
<?php if($logged_admin_id==1){?>
<br>
<div class="container">
  <div class="row">
    <div class="col-lg-12">

	<div class="card">
	  <div class="card-header" align="center"><span class="badge badge-dark">Dashboard</span></div>
	  <div class="card-body">

<?php echo "Welcome To Dashboard"; ?>

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

<?php

include("db_backup.php");
include("buyer-request.php"); 
include("user_login.php");

?>
<?php } ?>
<?php if($logged_admin_id==2){include("temp_showroom_add.php");}?>

