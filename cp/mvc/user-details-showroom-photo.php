<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>/users/">Users</a></li>
    <li class="breadcrumb-item active" aria-current="page">Showroom Photo</li>
  </ol>
</nav>


<h3>Showroom Photo</h3>

<?php
$user_id = $slug2;

echo "<h3>".get_info("car_showrooms","showroom_name","WHERE user_id=$user_id")."</h3> 1500x750 Pixels<br>";



if(isset($_POST['action'])&&$_POST['action']=="Submit")
{

$lfile_name=$_FILES["file_name"]["name"];
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


$q=mysqli_query($con,"UPDATE car_showrooms SET showroom_photo='$photo_name' WHERE user_id=$user_id");


if($q)
{
//       UPLOAD IMAGE

static $ads_filename;

$pic_path="../images/users/$user_id/banners";


$tmp_name = $_FILES["file_name"]["tmp_name"];
$lname 	= $_FILES["file_name"]["name"];
$name	= $photo_name;



move_uploaded_file($tmp_name, "$pic_path/$name");

// image resize

	$source_pic = "$pic_path/$name";
	
	$max_width_big = 1500;
	$max_height_big = 750;

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






<img src="../../../images/users/<?php echo $user_id; ?>/banners/<?php echo get_info("car_showrooms","showroom_photo","WHERE user_id=$user_id"); ?>" width="400">


<form action="" method="post" enctype="multipart/form-data">
	<input name="file_name" type="file" id="file_name">
	<input type="submit" name="action" value="Submit">
</form>



