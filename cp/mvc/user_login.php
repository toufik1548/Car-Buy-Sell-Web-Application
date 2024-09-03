
<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-12">
<br>


<div class="card">
  <div class="card-body">


    <table width="100%" class="table table-bordered mytable">
    <tbody>
    <tr>
    <th><center>Name</center></th>
    <th><center>Login Datetime</center></th>
    </tr>

    <?php
    $q = mysqli_query($con,"SELECT * FROM car_users_login_logs ORDER BY log_id DESC LIMIT 5");
    while($r=mysqli_fetch_assoc($q)){
    ?>


    <tr>
    <td align="center" width="10%"><?php echo get_info("car_users","user_name","WHERE user_id=".$r["user_id"]); ?></td>
    <td align="center" width="10%"><?php echo $r["login_datetime"]; ?></td>
    </tr>
    </tbody>
    <?php

    }
    ?>
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