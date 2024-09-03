<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-12">
<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>">Home</a></li>

    <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
  </ol>
</nav>

<table class="table">
	<tr>
	<td>Car</td>
	<td>User</td>
	<td>Date</td>
</tr>
<?php
$qw = mysqli_query($con,"SELECT * FROM car_wishlist ORDER BY wish_id DESC LIMIT 20");
while($rw = mysqli_fetch_assoc($qw)){ ?>
<tr>
	<td><?php echo get_info("car_used","car_name","WHERE car_id=".$rw['car_id']); ?></td>
	<td><?php echo get_info("car_persons","person_name","WHERE user_id=".$rw['user_id']); ?></td>
	<td><?php echo $rw['add_date']; ?></td>
</tr>
<?php
}

?>
</table>