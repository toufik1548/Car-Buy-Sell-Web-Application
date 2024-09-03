

<table width="100%" class="table table-bordered">
<tbody>
  <tr>
    <th><center>ID</center></th>
    <th><center>Title</center></th>
    <th><center>Title <small style="color:green">(বাংলা)</small></center></th>
    <th><center>Date</center></th>
    <th><center>Status</center></th>
    <th><center>Actions</center></th>
  </tr>

<?php

$qt = mysqli_query($con,"SELECT * FROM car_news ORDER BY news_id DESC LIMIT 10");
while($rt=mysqli_fetch_assoc($qt))

{

?>

  <tr>
    <td><?php echo $rt["news_id"]; ?></td>
    <td><?php echo $rt["news_title"]; ?></td>
    <td><?php echo $rt["news_title_bn"]; ?></td>
    <td><?php echo $rt["add_date"]; ?></td>
    <td><?php if($rt['status']==1){echo "<font color='green'>Active</font>";} else {echo "<font color='#B8860B'>Inactive</font>";} ?></td>
    <td width="20%">

		<a href="<?php echo $cp_url; ?>/news-photo/<?php echo $rt["news_id"]; ?>/">
	      <button type="button" class="btn btn-primary btn-sm">Photo</button>
	    </a>
	    <a class="btn btn-dark btn-sm" href="<?php echo $cp_url; ?>/news-details/<?php echo $rt["news_id"]; ?>/">
	    	Details
	    </a>
	    <a class="btn btn-info btn-sm" href="<?php echo $cp_url; ?>/news-edit/<?php echo $rt["news_id"]; ?>/">
	    	Edit
	    </a>
    </td>
  </tr>

<?php

}

?>
</tbody>
</table>