<div class="container">
    <div class="row">
		<?php
		$qt = mysqli_query($con,"SELECT * FROM car_posts WHERE status=1 $cond $sort $limit");
		while($rt = mysqli_fetch_array($qt)){?>
		<a href="<?php echo $site_url; ?>/post/<?php echo $rt['post_id']; ?>/" class="p-title">
			<b>&#x272A; <?php echo $rt['post_title']; ?></b></a><br>
		<?php } ?>
</div>
</div>