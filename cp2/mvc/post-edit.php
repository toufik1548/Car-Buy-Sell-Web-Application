
<?php

if (isset($slug2) && $slug2>0){

$post_id=$slug2;

}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fas fa-edit"></i>&nbsp; Post Edit</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>/">Home</a></li>
              <li class="breadcrumb-item active">Post Edit</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">

        <div class="card">
          <div class="card-body">



<?php

if (isset($_POST["update"])) {
$category_id    = $_POST["category_id"];
$post_title     = trim(addslashes($_POST["post_title"]));
$post_summary   = trim(addslashes($_POST["post_summary"]));
$post_details   = trim(addslashes($_POST["post_details"]));

$post_tags      = trim(addslashes($_POST["post_tags"]));
$status         = $_POST["status"];

$q=mysqli_query($con, 
  "UPDATE `car_posts` SET 
  category_id   ='$category_id',
  post_title    ='$post_title',
  post_summary  ='$post_summary',
  post_details  ='$post_details',
  post_tags     ='$post_tags',
  status        ='$status'

  WHERE post_id = $post_id");


if($q){
  echo "<div class='alert alert-success alert-dismissible' role='alert'>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  <b>Post Updated Successfully!</b>
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
$q = mysqli_query($con,"SELECT * FROM car_posts WHERE post_id=$post_id");
$r=mysqli_fetch_assoc($q);
$post_id=$r['post_id'];
?>

<form action="" method="post" enctype="multipart/form-data" class="table">
  <font color="red">*</font> Required fields<br><br>
<table class="table table-striped table-bordered">

  <tr>
      <td>Categories<font color="red"></font></td>
      <td>
          <select class="form-control" name="category_id" class="selectpicker test">
              <option value=0>Select Categories</option>
              <?php
              $q2 = mysqli_query($con, "SELECT * FROM car_post_categories WHERE status=1");
              while ($r2 = mysqli_fetch_array($q2)) {
              ?>
                  <option value="<?php echo $r2['category_id']; ?>" 
                    <?php 
                    if(isset($r['category_id']) && $r['category_id']==$r2['category_id']){
                        echo " selected";
                    }
                    ?>
                  ><?php echo $r2['category_name']; ?></option>
              <?php } // end child ?>
          </select>
      </td>
  </tr>



  <tr>
    <td><b>Post Title</b></td>
    <td><input name="post_title" type="text" class="form-control" value="<?php echo $r['post_title'];?>"></td>
  </tr>


  <tr>
    <td><b>Post Summary</b></td>
    <td><input name="post_summary" type="text" class="form-control" value="<?php echo $r['post_summary'];?>"></td>
  </tr>


  <tr>
    <td><b>Post Details</b></td>
    <td><textarea rows="5" class="form-control" name="post_details" id="post_details"> <?php echo $r['post_details'];?></textarea>
     </td>
  </tr>


  <tr>
    <td><b>Post Tags</b></td>
    <td><input name="post_tags" type="text" class="form-control" value="<?php echo $r['post_tags'];?>"></td>
  </tr>

  <tr>
        <td width="20%">
          <font size="3">Status</font>
        </td>
        <td>
          <input type="radio" name="status" value="1" <?php if($r['status']==1){echo " checked";}?>> <font color="green"><b>Active</b></font> 
          <input type="radio" name="status" value="0" <?php if($r['status']==0){echo " checked";}?>> <font color="#B8860B"><b>Inactive</b></font> 
        </td>
      </tr>

  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="update" value="Submit" class="btn btn-primary" style="width: 200px"></td>
  </tr>
</table>

</form> 

          </div><!--./card-body\-->
        </div><!--./card\-->

<br>
<!-- FOR SUPER ADMIN START-->
<?php if($logged_level_id==0){ ?>
<a href="<?php echo $cp_url; ?>/post-add/">
  <button type="button" class="btn btn-primary btn-sm">Add</button>
</a>

<a href="<?php echo $cp_url; ?>/post-list/">
  <button type="button" class="btn btn-secondary btn-sm">List</button>
</a>




<?php } ?>
<!-- FOR SUPER ADMIN END-->



      </div><!-- /.container-fluid -->
    </section><!-- /.content -->

</div><!-- /.content -->