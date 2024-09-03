<?php

$tips_id=$slug2;

?>

<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-12">

<br>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../">Home</a></li>
     <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>/tips/">Tips</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tips Photo</li>
  </ol>
</nav>

<!-- PHOTO UPLOAD -->
<?php
if(isset($_POST['upload'])){

    $file_name        = $_FILES["file_name"]["name"];

    $image_path = "../images/tips";
    $tmp_name = $_FILES["file_name"]["tmp_name"];
    $name = $_FILES["file_name"]["name"];

    $r=move_uploaded_file($tmp_name, "$image_path/$name");

$q=mysqli_query($con,"UPDATE `car_tips` SET `tips_photo` = '$name' WHERE `car_tips`.`tips_id` = $tips_id");

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
$tips_id	=	$_POST['tips_id'];
$tips_photo	=	$_POST['tips_photo'];

$q=mysqli_query($con,"UPDATE car_tips SET tips_photo='' WHERE tips_id=$tips_id");
unlink("../images/tips/".$tips_photo);


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
  <div class="card-header" align="center"><span class="badge badge-dark">Tips Photo</span></div>
  <div class="card-body">



  <table class="table table-striped table-bordered">
    <tbody>

  <tr>
    <td width="20%">
      <font size="3">Upload Photo:</font>
    </td>
    <td>
<?php
$tips_photo = get_info("car_tips","tips_photo","WHERE tips_id=$tips_id");
if($tips_photo!=""){?>

<form name="form1" method="POST" enctype="multipart/form-data" action="">
<img src="$cp_url/../../../../images/tips/<?php echo $tips_photo;?>" width="80px" height="80px">
<input type="hidden" name="tips_id" value="<?php echo $tips_id; ?>">
<input type="hidden" name="tips_photo" value="<?php echo $tips_photo; ?>">
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