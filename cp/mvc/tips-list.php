

<table width="100%" class="table table-bordered">
<tbody>
  <tr>
    <th><center>ID</center></th>
    <th><center>Photo</center></th>
    <th><center>Title</center></th>
    <th><center>Title <small style="color:green">(বাংলা)</small></center></th>
    <th><center>Date</center></th>
    <th><center>Status</center></th>
    <th><center>Actions</center></th>
  </tr>

<?php

$qt = mysqli_query($con,"SELECT * FROM car_tips ORDER BY tips_id DESC LIMIT 10");
while($rt=mysqli_fetch_assoc($qt))

{

?>

  <tr>
    <td><?php echo $rt["tips_id"]; ?></td>
    <td align="center" width="8%">
<?php
//photo
$photo = get_info("car_tips","tips_photo", "WHERE tips_id=".$rt["tips_id"]." ORDER BY tips_id ASC LIMIT 1");

if($photo!=""){
  echo "<img src='$cp_url/../images/tips/$photo' class='img-responsive' width='50' height='50'>";
}

else{
  echo "<img src='$cp_url/../images/tips/noimage.jpg' class='img-responsive' width='50' height='50'>";
}

?>

    </td>
    <td><?php echo $rt["tips_title"]; ?></td>
    <td><?php echo $rt["tips_title_bn"]; ?></td>
    <td><?php echo $rt["add_date"]; ?></td>
    <td><?php if($rt['status']==1){echo "<font color='green'>Active</font>";} else {echo "<font color='#B8860B'>Inactive</font>";} ?></td>
    <td width="20%">

		<a href="<?php echo $cp_url; ?>/tips-photo/<?php echo $rt["tips_id"]; ?>/">
	      <button type="button" class="btn btn-primary btn-sm">Photo</button>
	    </a>
	    <a class="btn btn-dark btn-sm" href="<?php echo $cp_url; ?>/tips-details/<?php echo $rt["tips_id"]; ?>/">
	    	Details
	    </a>
	    <a class="btn btn-info btn-sm" href="<?php echo $cp_url; ?>/tips-edit/<?php echo $rt["tips_id"]; ?>/">
	    	Edit
	    </a>
    </td>
  </tr>

<?php

}

?>
</tbody>
</table>