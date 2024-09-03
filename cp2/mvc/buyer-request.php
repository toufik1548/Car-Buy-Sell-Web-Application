<h3 class="border p-2 mt-2 text-center">Buyer Request</h3>

<?php

if (isset($slug2) && $slug2>0){

$car_id=$slug2;

}

?>

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
  <th><center>Showroom</center></th>
  <th><center>Car</center></th>
  <th><center>Buyer Name</center></th>
  <th><center>Buyer Mobile</center></th>
  <th><center>Actions</center></th>
</tr>

<?php

if(isset($_POST['search'])){
$search = $_POST['search'];
$query = "SELECT *  FROM car_contact_request WHERE request_id LIKE '$search'";
}else{
$query = "SELECT *  FROM car_contact_request ORDER BY request_id DESC LIMIT 10";
}


$q = mysqli_query($con,$query);
while($r=mysqli_fetch_assoc($q)){
?>


<tr>
  <td align="center" width="7%">
    <?php if($r["showroom_id"]!=0){?>
      <?php echo get_info("car_showrooms","showroom_name","WHERE showroom_id=".$r["showroom_id"]); ?>
    <?php } ?>
    </td>

  <td align="center" width="7%">
    <?php if($r["car_id"]!=0){?>
    <a href="<?php echo $site_url;?>/used-car/<?php echo get_info("car_used","car_slug","WHERE car_id=".$r["car_id"]);?> " target="_blank">
      <?php echo get_info("car_used","car_name","WHERE car_id=".$r["car_id"]); ?>
    </a>
<?php } ?>
  </td>

<td align="center" width="10%"><?php echo $r["buyer_name"]; ?></td>
<td align="center" width="10%"><?php echo $r["buyer_mobile"]; ?></td>
<td align="center" width="10%"><?php echo $r["add_date"]; ?></td>


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