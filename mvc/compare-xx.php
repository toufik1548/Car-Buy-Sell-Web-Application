<div id="title">Car Compare</div>
<div class="container-fluid">

<p>&nbsp;</p>



<center>
<img src="<?php echo $site_url; ?>/images/compare.jpg" height="130" class="img-fluid">
</center>
<br>


<?php
if(isset($_POST['car_id1'])){$car_id1=$_POST['car_id1'];}else{$car_id1="";}
if(isset($_POST['car_id2'])){$car_id2=$_POST['car_id2'];}else{$car_id2="";}
?>
<form method="post">
<table width="90%"  border="0" align="center" cellpadding="5" cellspacing="0">
 <tr>
	<td>
<b>Select Car</b>

<select name="car_id1" style="width: 120px;">
<option value=0>Select Car</option>
<?php
$q=mysqli_query($con,"SELECT * FROM car_new WHERE status = 1 ");
while($r=mysqli_fetch_array($q))
{
?>
<option value="<?php echo $r['car_id']; ?>" <?php $c1 = $r['car_id']; if($c1==$car_id1){ echo "Selected"; } ?>><?php echo $r['car_name']; ?></option>
<?php
}
?>
    </select>


	</td>
	<td align="right">
<b>Compare with</b>

<select name="car_id2" style="width: 120px;">
<option value=0>Select car</option>
<?php
$q=mysqli_query($con,"SELECT * FROM car_new WHERE status = 1");
while($r=mysqli_fetch_array($q))
{
?>
<option value="<?php echo $r['car_id']; $c2 = $r['car_id']; ?>" <?php if($c2==$car_id2){ echo "Selected"; } ?>><?php echo $r['car_name']; ?></option>



<?php
}
?>
    </select>


	</td></tr><tr><td>&nbsp;</td></tr><tr>
	<td align="center" colspan="2">
	<input type="submit" name="compare" value="Compare">
	</td>
</tr>

<tr><td height="30"></td></tr>
</table>
</form>





<?php
if(isset($_POST['compare']))
{
$car1 = $_POST['car_id1'];
$car2 = $_POST['car_id2'];


//Display error msg

	$err=array();
	if($car1==0)
		{ $err[]="Please Select A car";}
	if($car2==0)
		{ $err[]="Please Select Your Compare car";}
	if($car1==$car2)
		{ $err[]="Cannot Compare With Same Motorcycle";}

	$n=	count($err);


if($n>0)
	{
	echo "<div class=err_msg><ol>";

	for($i=0;$i<$n;$i++)
			{ echo "".$err[$i]."<br>"; }
	echo "</ol></div>";

	}
else
	{
	//$img1 	=	get_car_photo($car1);
	//$img2 	=	get_car_photo($car2);
	?>

<br>




    
<a href="<?php echo $site_url; ?>/compares/<?php echo get_info("car_new","car_slug","WHERE car_id=$car1"); ?>-vs-<?php echo get_info("car_new","car_slug","WHERE car_id=$car2"); ?>/" target="_blank">
<center>
<table>
	<tbody>
<tr><td>
<?php

//photo
$photo = get_info("car_new_photos","photo_name", "WHERE car_id=$car_id1");

if($photo!=""){
  echo "<img src='$site_url/images/new-cars/$photo' class='img-fluid img-responsive' width='400' height='200'>";
}
else{
   echo "<img src='$site_url/images/new-cars/noimage.jpg' class='img-fluid img-responsive' width='400' height='200'>";
}
?>
</td>
<td><h3><b>&nbsp;vs&nbsp; </b></h3></td>
<td>
<?php

//photo
$photo = $photo = get_info("car_new_photos","photo_name", "WHERE car_id=$car_id2");


if($photo!=""){
  echo "<img src='$site_url/images/new-cars/$photo' class='img-fluid img-responsive' width='400' height='200'>";
}

else{
  echo "<img src='$site_url/images/new-cars/noimage.jpg' class='img-fluid img-responsive' width='400' height='200'>";
}

?></td></tr>
</tbody>
</table>

    <b>Compare with <?php echo get_info("car_new","car_name","WHERE car_id=$car1"); ?> and <?php echo get_info("car_new","car_name","WHERE car_id=$car2"); ?></b><br><br>
    <b>Click Here</b>
    
</a>
</center>



   







<?php
	}
}
?>


<p>&nbsp;</p>

</div>



