<?php

if (isset($slug2) && $slug2>0){

$tips_id=$slug2;

}

?>
<br>
<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-12">

<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-light">
    <li class="breadcrumb-item"><a href="../">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>/tips/">Tips</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tips Edit</li>
  </ol>
</nav>

	<div class="card">
	  <div class="card-header" align="center"><span class="badge badge-dark">Edit Tips</span></div>
	  <div class="card-body">

<?php

if (isset($_POST["update"])) {

$tips_title=addslashes($_POST["tips_title"]);
$tips_slug=addslashes($_POST["tips_slug"]);
$tips_details=addslashes($_POST["tips_details"]);
$tips_title_bn=addslashes($_POST["tips_title_bn"]);
$tips_details_bn=addslashes($_POST["tips_details_bn"]);
$tips_tags=addslashes($_POST["tips_tags"]);
$status=addslashes($_POST["status"]);

$q=mysqli_query($con, 
  "UPDATE `car_tips` SET 
  tips_title='$tips_title',
  tips_slug='$tips_slug',
  tips_details='$tips_details',
  tips_title_bn='$tips_title_bn',
  tips_details_bn='$tips_details_bn',
  tips_tags='$tips_tags',
  status='$status'
  WHERE tips_id=$tips_id");


if($q){
  echo "<div class='alert alert-info alert-dismissible' role='alert'>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  <b>Tips Updated Successfully!</b>
</div>";

}
else{ 
  echo "<div class='alert alert-warning alert-dismissible' role='alert'>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  Wrong or mismatch!
</div>";
}

}
?>


<?php
$q = mysqli_query($con,"SELECT *  FROM car_tips WHERE tips_id=$tips_id");
$r=mysqli_fetch_assoc($q);

?>

<form name="form1" method="POST" action="">
  <table class="table table-striped table-bordered">
    <tbody>
      <tr>
        <td width="12%">
          <font size="3">Title</font>
        </td>
        <td>
          <input type="text" name="tips_title" class="form-control" id="text" placeholder="" value="<?php echo $r['tips_title'];?>" style="width: 100%">
        </td>
      </tr>
      <tr>
        <td>
          <font size="3">Slug</font>
        </td>
        <td>
          <input type="text" name="tips_slug" class="form-control" id="text" placeholder="" value="<?php echo $r['tips_slug'];?>" style="width: 100%">
        </td>
      </tr>
      <tr>
        <td>Details</td>
        <td><textarea name="tips_details" rows="15" class="form-control"><?php echo $r['tips_details'];?></textarea></td>
      </tr>
      <tr>
      <td>
          <font size="3">Title (বাংলা)</font>
        </td>
        <td>
          <input type="text" name="tips_title_bn" class="form-control" id="text" placeholder="" value="<?php echo $r['tips_title_bn'];?>" style="width: 100%">
        </td>
      </tr>
      <tr>
        <td>Details (বাংলা)</td>
        <td><textarea name="tips_details_bn" rows="15" class="form-control"><?php echo $r['tips_details_bn'];?></textarea></td>
      </tr>
      <tr>
        <td>Tag</td>
        <td><textarea name="tips_tags" rows="3" class="form-control"><?php echo $r['tips_tags'];?></textarea></td>
      </tr>
      <tr>
        <td width="20%">
          <font size="3">Status</font>
        </td>
        <td>
          <input type="radio" name="status" value="1" <?php if($r['status']==1){echo " checked";}?>> <font color="green">Active</font> 
          <input type="radio" name="status" value="0" <?php if($r['status']==0){echo " checked";}?>> <font color="#B8860B">Inactive</font> 
        </td>
      </tr>
      <tr>
        <td colspan="2" align="center">
          <button type="submit" name="update" value="Submit" class="btn btn-primary btn-block" style="width: 200px">Update</button>
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