<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Car Photo Add</li>
  </ol>
</nav>



<h3>Car Photo Add</h3>



<?php

$car_id = $slug2;
$user_id=get_info("car_used","user_id","WHERE car_id=$car_id");

///delete photo
if(isset($_POST['delete_photo']))
{
$photo_id	=	$_POST['photo_id'];
$photo_name	=	$_POST['photo_name'];
mysqli_query($con,"DELETE FROM car_used_photo WHERE photo_id=$photo_id");
unlink("../images/users/".$user_id."/".$_POST['photo_name']);
}






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


$q=mysqli_query($con,"INSERT INTO `car_used_photo` (
`photo_id` ,
`car_id` ,
`photo_name`
)
VALUES (
NULL , '$car_id', '$photo_name')");


if($q)
{
//       UPLOAD IMAGE

static $ads_filename;

$pic_path="../images/users/$user_id";


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

<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
  
  	<?php
				$cell=8;
				$break=0;
				$q2		=	mysqli_query($con,"SELECT * FROM car_used_photo WHERE  car_id = $car_id ORDER BY photo_id ASC ") or die("Getting records");
				while($r2	=	mysqli_fetch_array($q2))
						{
						?>
					<td>
<img src="../../../images/users/<?php echo $user_id; ?>/<?php echo $r2['photo_name']; ?>" width="80"><br>
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

</div>