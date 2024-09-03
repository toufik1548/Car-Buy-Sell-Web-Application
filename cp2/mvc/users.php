

<div class="card mt-3">
  <div class="card-header" align="center">
    <span class="badge text-dark">
      <h3>&nbsp; Users (<?php echo get_total("car_users", "user_id", ""); ?>) &nbsp;</h3>
    </span>
  </div>
  <div class="card-body">

    <?php
    $cond = "";
    $user_search = "";

    if (isset($_POST['submit'])) {
      $user_search = trim($_POST['user_search']);
      $cond = "WHERE user_id='$user_search' OR user_email LIKE '%$user_search%' OR user_mobile LIKE '%$user_search%' OR user_name LIKE '%$user_search%'";
    }else{
      $cond = "ORDER BY user_id DESC LIMIT 20";
    }
    ?>

    <form method="POST" action="">
      <input type="text" name="user_search" placeholder="userid or email or name or phone no." value="<?php 

      //echo $user_search; 
      if (isset($_POST['submit'])) { echo trim($_POST['user_search']); }

      ?>">
      <input type="submit" name="submit" value="Submit">
    </form>

    <table class="table table-striped table-bordered" width="100%">
      <thead>
        <tr>
          <th><center>User ID</center></th>
          <th><center>Name</center></th>
          <th><center>Address</center></th>
          <th><center>Phone no.</center></th>
          <th><center>Email</center></th>
          <th><center>Date</center></th>
          <th><center>Status</center></th>
          <th><center>Action</center></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $qu = mysqli_query($con, "SELECT * FROM car_users $cond");
        while ($ru = mysqli_fetch_assoc($qu)) {
        ?>
          <tr>
            <td><?php echo $ru["user_id"]; ?></td>
            <td><?php echo $ru["user_name"]; ?></td>
            <td><?php echo $ru["user_address"]; ?></td>
            <td><?php echo $ru["user_mobile"]; ?></td>
            <td><?php echo $ru["user_email"]; ?></td>
            <td><?php echo $ru["add_date"]; ?></td>
            <td><?php echo get_info("car_users_status", "status_name", "WHERE status_id=" . $ru["status"]); ?></td>
            <td>
              <a class="btn btn-info btn-sm" href="<?php echo $cp_url; ?>/user-cars/<?php echo $ru["user_id"]; ?>/" role="button">Car List (<?php echo get_total("car_used","car_id","WHERE user_id=".$ru["user_id"]); ?>)</a>
              <a class="btn btn-warning btn-sm" href="<?php echo $cp_url; ?>/user-car-edit/<?php echo $ru["user_id"]; ?>/" role="button">User Edit</a>
              <a class="btn btn-danger btn-sm" href="<?php echo $cp_url; ?>/user-password-reset/<?php echo $ru["user_id"]; ?>/" role="button">Password Reset</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
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
