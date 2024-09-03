<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-12">
<br>

<br>
<div class="card">
  <div class="card-header" align="center">Used Search</div>
  <div class="card-body">




<table class="table table-striped table-bordered" width="100%">
<tr>
  <th><center>Search IP</center></th>
  <th><center>Location</center></th>
  <th><center>Search Word</center></th>
  <th><center>Date</center></th>
</tr>


<?php
$aaj = date("Y-m-d");
  $sq = mysqli_query($con,"SELECT * FROM `car_search` where add_date='$aaj'");
  while($row=mysqli_fetch_assoc($sq)){
    $location=$row['location_id'];
    if($location==0){
      $nul="Null";
    }
    else{
      $q = mysqli_query($con,"SELECT * FROM `car_locations` WHERE location_id=$location");
    $r=mysqli_fetch_assoc($q);
    }
  ?>


<tr>
    <td><?php echo $row['search_ip']; ?></td>
    <td><?php if($location==0){ echo "";}else{ echo $r['location_name'];} ?></td>
    <td><?php echo $row['search_word']; ?></td>
    <td><?php echo $row['add_date']; ?></td>
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