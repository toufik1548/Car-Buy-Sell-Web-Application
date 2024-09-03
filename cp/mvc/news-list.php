

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

$qn = mysqli_query($con,"SELECT * FROM car_news ORDER BY news_id DESC LIMIT 10");
while($rn=mysqli_fetch_assoc($qn))

{

?>

  <tr>
    <td><?php echo $rn["news_id"]; ?></td>
    <td align="center" width="8%">
<?php
//photo
$photo = get_info("car_news","news_photo", "WHERE news_id=".$rn["news_id"]." ORDER BY news_id ASC LIMIT 1");

if($photo!=""){
  echo "<img src='$cp_url/../images/news/$photo' class='img-responsive' width='50' height='50'>";
}

else{
  echo "<img src='$cp_url/../images/news/noimage.jpg' class='img-responsive' width='50' height='50'>";
}

?>

    </td>
    <td><?php echo $rn["news_title"]; ?></td>
    <td><?php echo $rn["news_title_bn"]; ?></td>
    <td><?php echo $rn["add_date"]; ?></td>
    <td><?php if($rn['status']==1){echo "<font color='green'>Active</font>";} else {echo "<font color='#B8860B'>Inactive</font>";} ?></td>
    <td width="20%">

		<a href="<?php echo $cp_url; ?>/news-photo/<?php echo $rn["news_id"]; ?>/">
	      <button type="button" class="btn btn-primary btn-sm">Photo</button>
	    </a>
	    <a class="btn btn-dark btn-sm" href="<?php echo $cp_url; ?>/news-details/<?php echo $rn["news_id"]; ?>/">
	    	Details
	    </a>
	    <a class="btn btn-info btn-sm" href="<?php echo $cp_url; ?>/news-edit/<?php echo $rn["news_id"]; ?>/">
	    	Edit
	    </a>
    </td>
  </tr>

<?php

}

?>
</tbody>
</table>