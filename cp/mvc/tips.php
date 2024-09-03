<br>
<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-12">

<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-light">
    <li class="breadcrumb-item"><a href="../">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tips</li>
  </ol>
</nav>

<a class="btn btn-primary" href="<?php echo $cp_url; ?>/tips-add/" role="button">Add Tips</a><br><br>

	<div class="card">
	  <div class="card-header" align="center"><span class="badge badge-light"><h3>&nbsp; Tips List (<?php echo get_total("car_tips", "tips_id","");?>) &nbsp;</h3></span></div>
	  <div class="card-body">

<?php include("tips-list.php"); ?>

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