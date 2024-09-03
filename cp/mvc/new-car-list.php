<?php

if (isset($slug2) && $slug2>0){

$car_id=$slug2;

}

?>
<!-- Begin Page Content -->
<div class="container-fluid">
<br>

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>/">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">New Car List</li>
      </ol>
    </nav>
    
  <div class="card">
    <div class="card-header">
      <center>
        <span class="badge badge-pill badge-light">
          <h3>&nbsp; New Car List (<?php echo get_total("car_new", "car_id","");?>) &nbsp;</h3>
        </span>
      </center>
    </div>
    <div class="card-body">
<form class="form-inline mr-auto" method="POST" action="">

  <input class="form-control" type="text" placeholder="search by id / date / yom " aria-label="Search" name="search" 
  value="<?php if(isset($_POST['search'])){ echo $_POST['search'];}else{echo "";}?>" style="width:40%">
  &nbsp;&nbsp;&nbsp;&nbsp;
  <button class="btn btn-success btn-sm" type="submit">Search</button>

</form>
<br>

<table width="100%" class="table table-bordered mytable">
<tbody>
<tr>
  <th><center>ID</center></th>
  <th><center>Photo</center></th>
  <th><center>Brands</center></th>
  <th><center>Models</center></th>
  <th><center>Editions</center></th>
  <th><center>Price</center></th>
  <th><center>MF Year</center></th>
  <th><center>Add Date</center></th>
  <th><center>Actions</center></th>
</tr>

<?php

if(isset($_POST['search'])){
$search = $_POST['search'];
$query = "SELECT *  FROM car_new WHERE car_id LIKE '$search' OR add_date LIKE '$search' OR car_price LIKE '$search' OR car_yom LIKE '%$search%'";
}else{
$query = "SELECT *  FROM car_new ORDER BY car_id DESC LIMIT 10";
}


$q = mysqli_query($con,$query);
while($r=mysqli_fetch_assoc($q)){
?>


<tr>
  <td align="center" width="8%"><?php echo $r["car_id"]; ?></td>
  <td align="center" width="10%">
  
<?php
//photo
$photo = get_info("car_new_photos","photo_name", "WHERE car_id=".$r["car_id"]." ORDER BY photo_id ASC LIMIT 1");

if($photo!=""){
  echo "<img src='$cp_url/../images/new-cars/$photo' class='img-responsive' width='50' height='50'>";
}

else{
  echo "<img src='$cp_url/../images/new-cars/noimage.jpg' class='img-responsive' width='50' height='50'>";
}

?>

  </td>
  <td align="center"><?php echo get_info("car_brands","brand_name","WHERE brand_id=".$r["brand_id"]); ?></td>
  <td align="center"><?php echo get_info("car_models","model_name","WHERE model_id=".$r["model_id"]); ?></td>
  <td align="center"><?php echo get_info("car_editions","edition_title","WHERE edition_id=".$r["edition_id"]); ?></td>
  <td align="center" width="10%"><?php echo $r["car_price"]; ?></td>
  <td align="center" width="7%"><?php echo $r["car_yom"]; ?></td>
  <td align="center" width="10%"><?php echo $r["add_date"]; ?></td>
  <td align="center" width="20%">
    <a href="<?php echo $cp_url; ?>/new-car-photo/<?php echo $r["car_id"]; ?>/">
      <button type="button" class="btn btn-primary btn-sm">Photo</button></a>

    <a href="<?php echo $cp_url; ?>/new-car-details/<?php echo $r["car_id"]; ?>/">
      <button type="button" class="btn btn-secondary btn-sm">DETAILS</button></a>
      
    
    <a href="<?php echo $cp_url; ?>/new-car-edit/<?php echo $r["car_id"]; ?>/">
      <button type="button" class="btn btn-info btn-sm">EDIT</button></a>
  </td>
</tr>
</tbody>
<?php

}
?>
</table>

    </div>
    <!-- /.Card Body End -->
  </div>
  <!-- /.Card End -->
<br>
</div>
<!-- /.container-fluid -->