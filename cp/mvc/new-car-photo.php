<div class="container border">
<br>
			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>/">Dashboard</a></li>
			    <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>/new-car-list/">New Car List</a></li>
			    <li class="breadcrumb-item active" aria-current="page">Add car photo</li>
			  </ol>
			</nav>
	<div class="card">
		<div class="card-header">
	    	<center>
		    	<span class="badge badge-pill badge-secondary">
		    	&nbsp; Add car photo &nbsp; 
		    	</span>
	    	</center>
	  	</div>
	  	<div class="card-body" >





<div id="area">



<?php

	//$slug_position = slug_position();
	//$slug = uri_segment($slug_position[0]);

$car_id = $slug2;

//$car_id = get_info("car_new","car_id","WHERE car_id=$car_id");
$car_name = get_info("car_new","car_name","WHERE car_id=$car_id");
//$user_id=$sess_user_id;


///delete photo
if(isset($_POST['delete_photo']))
{
$photo_id	=	$_POST['photo_id'];
$photo_name	=	$_POST['photo_name'];
mysqli_query($con,"DELETE FROM car_new_photos WHERE photo_id=$photo_id");
unlink("../images/new-cars/".$_POST['photo_name']);
}






if(isset($_POST['action'])&&$_POST['action']=="Submit")
{

$lfile_name=$_FILES["file_name"]["name"];
$file_type = $_FILES['file_name']['type']; //returns the mimetype
$allowed = array("image/jpeg", "image/gif", "image/png");
if(!in_array($file_type, $allowed)) {
  $error_message = "<div class=\"alert alert-danger\" role=\"alert\">Only Photo (jpg, gif, and png) files are allowed.</div>";
  echo $error_message;

echo "<a class=\"btn btn-primary\" href=\"$cp_url/car-photo-upload/$slug\" role=\"button\">Try Again</a>";


  exit();
}

$photo_name	=	time()."_".trim($lfile_name);

//Display error msg

	$err=array();
	if($lfile_name=='')
		{ $err[]="Please Select Photo";}
	
	$n=	count($err);


if($n>0)
	{
	echo "<div class=\"alert alert-danger\" role=\"alert\"><ol>";

	for($i=0;$i<$n;$i++)
			{ echo "".$err[$i]."<br>"; }
	echo "</ol></div>";

	}
else
	{


$q=mysqli_query($con,
	"INSERT INTO `car_new_photos` (
		`photo_id`, 
		`car_id`, 
		`photo_name`, 
		`status`) 
	VALUES (
		NULL, 
		'$car_id', 
		'$photo_name', 
		'1');");


if($q)
{
//       UPLOAD IMAGE

static $ads_filename;

$pic_path="../images/new-cars";


$tmp_name = $_FILES["file_name"]["tmp_name"];
$lname 	= $_FILES["file_name"]["name"];
$name	= $photo_name;



move_uploaded_file($tmp_name, "$pic_path/$name");

// image resize

	$source_pic = "$pic_path/$name";
	
	$max_width_big = 2000;
	$max_height_big = 2000;

	//$src = imagecreatefromjpeg($source_pic);


$size=getimagesize($source_pic);
$img_mime=$size["mime"];

if($img_mime=="image/jpeg")
	{ $src = imagecreatefromjpeg($source_pic); }
elseif($img_mime=="image/gif")
	{ $src = imagecreatefromgif($source_pic); }
elseif($img_mime=="image/png")
	{ $src = imagecreatefrompng($source_pic); }



	list($width,$height)=getimagesize($source_pic);

	
	$x_ratio = $max_width_big / $width;
	$y_ratio = $max_height_big / $height;

	if( ($width <= $max_width_big) && ($height <= $max_height_big) ){
		$tn_width_big = $width;
		$tn_height_big = $height;
		}elseif (($x_ratio * $height) < $max_height_big){
			$tn_height_big = ceil($x_ratio * $height);
			$tn_width_big = $max_width_big;
		}else{
			$tn_width_big = ceil($y_ratio * $width);
			$tn_height_big = $max_height_big;
	}

	
	
	$tmp_big=imagecreatetruecolor($tn_width_big,$tn_height_big);
	imagecopyresampled($tmp_big,$src,0,0,0,0,$tn_width_big, $tn_height_big,$width,$height);

	imagejpeg($tmp_big,$source_pic,100);
	imagedestroy($src);
	imagedestroy($tmp_big);	
	
	
	
	/*
//// thumb
	$max_width = 150;
	$max_height = 150;	

$size=getimagesize($source_pic);
$img_mime=$size["mime"];

if($img_mime=="image/jpeg")
	{ $src1 = imagecreatefromjpeg($source_pic); }
elseif($img_mime=="image/gif")
	{ $src1 = imagecreatefromgif($source_pic); }
elseif($img_mime=="image/png")
	{ $src1 = imagecreatefrompng($source_pic); }

list($width1,$height1)=getimagesize($source_pic);		
	
	$x_ratio1 = $max_width / $width1;
	$y_ratio1 = $max_height / $height1;

	if( ($width1 <= $max_width) && ($height1 <= $max_height) ){
		$tn_width = $width1;
		$tn_height = $height1;
		}elseif (($x_ratio1 * $height1) < $max_height){
			$tn_height = ceil($x_ratio1 * $height1);
			$tn_width = $max_width;
		}else{
			$tn_width = ceil($y_ratio1 * $width1);
			$tn_height = $max_height;
	}

	$tmp=imagecreatetruecolor($tn_width,$tn_height);
	imagecopyresampled($tmp,$src1,0,0,0,0,$tn_width, $tn_height,$width1,$height1);

	imagejpeg($tmp,$destination_pic,100);
	imagedestroy($src1);
	imagedestroy($tmp);

*/
	
echo "<div class=\"alert alert-success\" role=\"alert\">Photo Uploaded Successfully</div>";

}
else
{
echo "<div class=\"alert alert-danger\" role=\"alert\">Sorry Failed To Add Photo, Please Try Again</div>";
}


}//end if no err

}//end while
?>

<?php if($car_name!=""){ ?>

<h2><?php echo $car_name; ?></h2>


<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
  
  	<?php
				$cell=8;
				$break=0;
				$q2		=	mysqli_query($con,"SELECT * FROM car_new_photos WHERE  car_id = $car_id ORDER BY photo_id ASC ") or die("Getting records");
				while($r2	=	mysqli_fetch_array($q2))
						{
						?>
					<td>
<img src="../../../images/new-cars/<?php echo $r2['photo_name']; ?>" width="80"><br>
<form method="POST" action="">
<input type="hidden" name="photo_id" value="<?php echo $r2['photo_id']; ?>">
<input type="hidden" name="photo_name" value="<?php echo $r2['photo_name']; ?>">
<input type="submit" name="delete_photo" value="Delete">
</form>
					</td>
						<?php	
				$break++;
				if ($break== $cell){ echo "</tr><tr><td height=5></td></tr>\n"; $break=0; }

				}
				?>
</table>
<br/>
<form action="" method="post" enctype="multipart/form-data" class="table">
<table width="600" border="0" cellspacing="10" cellpadding="0" align=center>


  <tr>
    <td>Picture</td>
    <td><input name="file_name" type="file" id="file_name"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="action" value="Submit"></td>
  </tr>
</table>

</form>
<?php } ?>
</div>

    </div>
    <!-- /.Card Body End -->
  </div>
  <!-- /.Card End -->
<br>
</div>
<!-- /.container-fluid -->