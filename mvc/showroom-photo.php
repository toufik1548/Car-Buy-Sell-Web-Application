<?php

$user_id = $slug2;

?>

<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-12">

<br>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>">Home</a></li>
     <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>/showroom-list/">Showroom List</a></li>
    <li class="breadcrumb-item active" aria-current="page">Showroom Photo</li>
  </ol>
</nav>

<!-- PHOTO UPLOAD -->
<?php
if(isset($_POST['upload'])){

    $file_name        = $_FILES["file_name"]["name"];
//$photo_name = time()."_".trim($lfile_name);

    $image_path = "../images/users/$user_id/banners";
    $tmp_name = $_FILES["file_name"]["tmp_name"];
    $name = $_FILES["file_name"]["name"];

    $r=move_uploaded_file($tmp_name, "$image_path/$name");

$q=mysqli_query($con,"UPDATE `car_showrooms` SET `showroom_photo` = '$name' WHERE `car_showrooms`.`user_id` = $user_id");

if($q){
  echo "<br><div class='alert alert-primary alert-dismissible' role='alert'>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  <b>Photo Uploaded Successfully!</b>
</div>";

}
else{ 
  echo "<div class='alert alert-danger alert-dismissible' role='alert'>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  <b>Wrong or mismatch!</b>
</div>";
}

}
?>

<!-- PHOTO DELETE-->
<?php
if(isset($_POST['delete_photo']))
{
$showroom_id	=	$_POST['showroom_id'];
//$user_id  = $_POST['user_id'];
$showroom_photo	=	$_POST['showroom_photo'];

$q=mysqli_query($con,"UPDATE `car_showrooms` SET `showroom_photo` = '' WHERE `car_showrooms`.`user_id` = $user_id");
unlink("../images/users/$user_id/banners/".$showroom_photo);


if($q){
  echo "<br><div class='alert alert-primary alert-dismissible' role='alert'>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  <b>Photo deleted successfully!</b>
</div>";

}
else{ 
  echo "<div class='alert alert-danger alert-dismissible' role='alert'>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  <b>Wrong or mismatch!</b>
</div>";
}

}
?>

<div class="card">
  <div class="card-header" align="center"><span class="badge badge-dark">Showroom Photo</span></div>
  <div class="card-body">

<font size="4">Showroom Name:</font> <font size="5"><b><?php echo get_info("car_showrooms","showroom_name","WHERE user_id=$user_id"); ?></b></font>
<br><br>

  <table class="table table-striped table-bordered">
    <tbody>

  <tr>
    <td width="20%">
      <font size="3">Upload Photo:</font>
    </td>
    <td>
<?php
$showroom_photo = get_info("car_showrooms","showroom_photo","WHERE user_id=$user_id");
if($showroom_photo!=""){?>

<form name="form1" method="POST" enctype="multipart/form-data" action="">
<img src="$cp_url/../../../../images/users/<?php echo $user_id; ?>/banners/<?php echo $showroom_photo; ?>" width="80px" height="80px">
<input type="hidden" name="showroom_id" value="<?php echo $user_id; ?>">
<input type="hidden" name="showroom_photo" value="<?php echo $showroom_photo; ?>">
<button  type="submit" name="delete_photo" value="Delete" class="btn btn-danger btn-sm">Delete Photo</button>
</form>

<?php }else{?>

<form name="form1" method="POST" enctype="multipart/form-data" action="">
<input name="file_name" type="file" id="file_name">
<input type="submit" name="upload" value="Upload Image">
</form>

<?php } ?>



    </td>
  </tr>
  
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