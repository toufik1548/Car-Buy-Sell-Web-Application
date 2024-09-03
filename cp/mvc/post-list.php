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
            <h1 class="m-0 text-dark"><i class="far fa-plus-square"></i>&nbsp; Post List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>/">Home</a></li>
              <li class="breadcrumb-item active">Post List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->


    <section class="content">
      <div class="container-fluid">

        <div class="card">
            
          <div class="card-body">


<form class="form-inline mr-auto" method="POST" action="">

  <input class="form-control" type="text" placeholder="search by id / Post Title " aria-label="Search" name="search" 
  value="<?php if(isset($_POST['search'])){ echo $_POST['search'];}else{echo "";}?>" style="width:40%">
  &nbsp;&nbsp;&nbsp;&nbsp;
  <button class="btn btn-success btn-sm" type="submit">Search</button>
  
</form>
<br>
<table width="100%" class="table table-bordered">
<tbody>
  <tr class="table-primary">
    <th><center>ID</center></th>
    <th><center>Post Photo</center></th>
    <th><center>Post Title</center></th>
    <th><center>Actions</center></th>
  </tr>
            <?php
                $cond = "";
                $order  = "ORDER BY post_id DESC";
                $limit  = "LIMIT 12";
            ?>
 <?php
  if(isset($_POST['search'])){
$search = $_POST['search'];
$all = mysqli_query($con,"SELECT * FROM car_posts WHERE status=1 AND (post_id LIKE '$search' OR post_title LIKE '%$search%')");
}else{
  $all = mysqli_query($con, "SELECT * FROM car_posts WHERE status=1 $order"); 
}

   


   ?>
  <?php foreach ($all as $r) { ?>
  <tr>
    <td><?php echo  $r['post_id'];?></td>
   <td><img src="<?php echo $site_url; ?>/images/media/<?php echo $r['post_photo'];?>" width='50' height='50'> </td>
    <td><?php echo  $r['post_title'];?></td>

    <td align="center">

  




     

    <a href="<?php echo $cp_url; ?>/post-photo/<?php echo $r["post_id"]; ?>/">
    <button type="button" class="btn btn-warning btn-sm">Photo</button></a>
    
    <a href="<?php echo $cp_url; ?>/post-edit/<?php echo $r["post_id"]; ?>/">
    <button type="button" class="btn btn-info btn-sm">Edit</button></a>

    </td>
   </tr>
<?php }?>



</tbody>
</table>





  
</div>



          </div><!--./card-body\-->
        </div><!--./card\-->

      </section>


  </div>