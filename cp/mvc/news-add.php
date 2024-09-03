
<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-12">
<br>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../">Home</a></li>
     <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>/news/">News</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add News</li>
  </ol>
</nav>

	<div class="card">
	  <div class="card-header" align="center"><span class="badge badge-dark">Add news</span></div>
	  <div class="card-body">


<?php

if(isset($_POST['news_title']) && $_POST['news_title']!=''){$news_Title=$_POST['news_title'];}else{$news_Title="";}
if(isset($_POST['news_title_bn']) && $_POST['news_title_bn']!=''){$news_Title_Bn=$_POST['news_title_bn'];}else{$news_Title_Bn="";}
if(isset($_POST['news_details']) && $_POST['news_details']!=''){$news_Details=$_POST['news_details'];}else{$news_Details="";}
if(isset($_POST['news_details_bn']) && $_POST['news_details_bn']!=''){$news_Details_Bn=$_POST['news_details_bn'];}else{$news_Details_Bn="";}
if(isset($_POST['news_tags']) && $_POST['news_tags']!=''){$news_Tags=$_POST['news_tags'];}else{$news_Tags="";}

?>

<?php

if(isset($_POST['action'])&&$_POST['action']=="Submit")
{

    $news_title   = addslashes($_POST['news_title']);
    $news_slug    = dv_slug($news_title);
    $news_title_bn    = trim($_POST['news_title_bn']);
    $news_details = addslashes($_POST['news_details']);
    $news_details_bn= addslashes($_POST['news_details_bn']);
    $news_tags    = trim($_POST['news_tags']);

    $lfile_name=$_FILES["file_name"]["name"];
    $news_photo  = trim($lfile_name);
    
    $add_date   = date('Y-m-d');
    $views      = 1;
    $views_bn   = 1;
    $status     = 1;

//Display error msg

  $err=array();
  if($news_title=='')
    { $err[]="Please Enter Title";}
  if($news_title_bn=='')
    { $err[]="Please Enter Title <small style='color:green'>(বাংলা)</small>";}
  if($news_details=='')
    { $err[]="Please Enter Details";}
  if($news_details_bn=='')
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


$q=mysqli_query($con,"INSERT INTO `car_news` (
  `news_id`, 
  `news_title`, 
  `news_slug`, 
  `news_details`, 
  `news_title_bn`, 
  `news_details_bn`, 
  `news_photo`, 
  `news_tags`, 
  `add_date`, 
  `views`, 
  `views_bn`, 
  `status`) 

VALUES (
  NULL, 
  '$news_title', 
  '$news_slug', 
  '$news_details', 
  '$news_title_bn', 
  '$news_details_bn', 
  '$news_photo', 
  '$news_tags', 
  '$add_date', 
  '1', 
  '1', 
  '1');");




if($q)
{


//       UPLOAD IMAGE

static $ads_filename;

$pic_path="../images/news";


$tmp_name = $_FILES["file_name"]["tmp_name"];
$lname  = $_FILES["file_name"]["name"];
$name = trim($lname);
move_uploaded_file($tmp_name, "$pic_path/$name");


echo "<div class='alert alert-info alert-dismissible' role='alert'>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  <b>News Added Successfully!</b>
</div>";


$news_Title="";
$news_Title_Bn="";
$news_Details="";
$news_Details_Bn="";
$news_Tags="";

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
          <td><input name="news_title" type="text" class="form-control" placeholder="enter title" value="<?php echo $news_Title; ?>"></td>
        </tr>
        <tr>
          <td>Details</td>
          <td><textarea name="news_details" class="form-control" rows="8" placeholder="enter description"><?php echo $news_Details; ?></textarea></td>
        </tr>
        <tr>
          <td width="20%">Title <small style="color:green">(বাংলা)</small></td>
          <td><input name="news_title_bn" type="text" class="form-control" placeholder="বাংলায় টাইটেল টি লিখুন" value="<?php echo $news_Title_Bn; ?>"></td>
        </tr>
        <tr>
          <td>Details <small style="color:green">(বাংলা)</small></td>
          <td><textarea name="news_details_bn" class="form-control" rows="8" placeholder="বাংলায় ডিটেইলস লিখুন"><?php echo $news_Details_Bn; ?></textarea></td>
        </tr>
        <tr>
          <td width="20%">Tags</td>
          <td><textarea name="news_tags" class="form-control" rows="3" placeholder="enter tags"><?php echo $news_Tags; ?></textarea></td>
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