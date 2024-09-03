
<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-12">
<br>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../">Home</a></li>
     <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>/tips/">Tips</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Tips</li>
  </ol>
</nav>

	<div class="card">
	  <div class="card-header" align="center"><span class="badge badge-dark">Add Tips</span></div>
	  <div class="card-body">


<?php

if(isset($_POST['tips_title']) && $_POST['tips_title']!=''){$Tips_Title=$_POST['tips_title'];}else{$Tips_Title="";}
if(isset($_POST['tips_title_bn']) && $_POST['tips_title_bn']!=''){$Tips_Title_Bn=$_POST['tips_title_bn'];}else{$Tips_Title_Bn="";}
if(isset($_POST['tips_details']) && $_POST['tips_details']!=''){$Tips_Details=$_POST['tips_details'];}else{$Tips_Details="";}
if(isset($_POST['tips_details_bn']) && $_POST['tips_details_bn']!=''){$Tips_Details_Bn=$_POST['tips_details_bn'];}else{$Tips_Details_Bn="";}
if(isset($_POST['tips_tags']) && $_POST['tips_tags']!=''){$Tips_Tags=$_POST['tips_tags'];}else{$Tips_Tags="";}

?>

<?php

if(isset($_POST['action'])&&$_POST['action']=="Submit")
{

    $tips_title   = addslashes($_POST['tips_title']);
    $tips_slug    = dv_slug($tips_title);
    $tips_title_bn    = trim($_POST['tips_title_bn']);
    $tips_details = addslashes($_POST['tips_details']);
    $tips_details_bn= addslashes($_POST['tips_details_bn']);
    $tips_tags    = trim($_POST['tips_tags']);

    $lfile_name=$_FILES["file_name"]["name"];
    $tips_photo  = trim($lfile_name);
    
    $add_date   = date('Y-m-d');
    $views      = 1;
    $views_bn   = 1;
    $status     = 1;

//Display error msg

  $err=array();
  if($tips_title=='')
    { $err[]="Please Enter Title";}
  if($tips_title_bn=='')
    { $err[]="Please Enter Title <small style='color:green'>(বাংলা)</small>";}
  if($tips_details=='')
    { $err[]="Please Enter Details";}
  if($tips_details_bn=='')
    { $err[]="Please Enter Details <small style='color:green'>(বাংলা)</small>";}

  $n= count($err);


if($n>0)
  {
  echo "<div class=err_msg><ol>";

  for($i=0;$i<$n;$i++)
      { echo "".$err[$i]."<br>"; }
  echo "</ol></div>";

  }
else
  {


$q=mysqli_query($con,"INSERT INTO `car_tips` (
  `tips_id`, 
  `tips_title`, 
  `tips_slug`, 
  `tips_details`, 
  `tips_title_bn`, 
  `tips_details_bn`, 
  `tips_photo`, 
  `tips_tags`, 
  `add_date`, 
  `views`, 
  `views_bn`, 
  `status`) 

VALUES (
  NULL, 
  '$tips_title', 
  '$tips_slug', 
  '$tips_details', 
  '$tips_title_bn', 
  '$tips_details_bn', 
  '$tips_photo', 
  '$tips_tags', 
  '$add_date', 
  '1', 
  '1', 
  '1');");




if($q)
{


//       UPLOAD IMAGE

static $ads_filename;

$pic_path="../images/tips";


$tmp_name = $_FILES["file_name"]["tmp_name"];
$lname  = $_FILES["file_name"]["name"];
$name = trim($lname);
move_uploaded_file($tmp_name, "$pic_path/$name");


echo "<div class='alert alert-info alert-dismissible' role='alert'>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  <b>Tips Added Successfully!</b>
</div>";


$Tips_Title="";
$Tips_Title_Bn="";
$Tips_Details="";
$Tips_Details_Bn="";
$Tips_Tags="";

}
else
{
echo "<div class='alert alert-danger alert-dismissible' role='alert'>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  Sorry!!! Failed to add record! Please Try Again...
</div>";
}


}//end if no err

}//end while
?>



    <form name="form1" method="post" action="" enctype="multipart/form-data">
    <table class="table table-striped table-bordered">
      <tbody>
        <tr>
          <td width="20%">Title</td>
          <td><input name="tips_title" type="text" class="form-control" placeholder="enter title" value="<?php echo $Tips_Title; ?>"></td>
        </tr>
        <tr>
          <td>Details</td>
          <td><textarea name="tips_details" class="form-control" rows="8" placeholder="enter description"><?php echo $Tips_Details; ?></textarea></td>
        </tr>
        <tr>
          <td width="20%">Title <small style="color:green">(বাংলা)</small></td>
          <td><input name="tips_title_bn" type="text" class="form-control" placeholder="বাংলায় টাইটেল টি লিখুন" value="<?php echo $Tips_Title_Bn; ?>"></td>
        </tr>
        <tr>
          <td>Details <small style="color:green">(বাংলা)</small></td>
          <td><textarea name="tips_details_bn" class="form-control" rows="8" placeholder="বাংলায় ডিটেইলস লিখুন"><?php echo $Tips_Details_Bn; ?></textarea></td>
        </tr>
        <tr>
          <td width="20%">Tags</td>
          <td><textarea name="tips_tags" class="form-control" rows="3" placeholder="enter tags"><?php echo $Tips_Tags; ?></textarea></td>
        </tr>
        <tr>
          <td>Photo</td>
          <td><input name="file_name" type="file" id="file_name"></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" name="action" value="Submit" class="btn btn-danger btn-block" style="width:200px"></td>
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