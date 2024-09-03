<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
  
<div id="header_menu">
        <ul>
<div class="logo">
<li>
	<a href="<?php echo $site_url; ?>/">
		<img src="<?php echo $site_url; ?>/images/deshicar.logo.png" style="width: 90px;"  class="img-responsive">
	</a>
</li>
</div>


<div class="logo_menu">

<li style="padding-top: 14px;"><a href="<?php echo $site_url; ?>/">Home</a></li>



<?php if(!isset($_SESSION['sess_user_id'])){?>
           
<li style="padding-top: 14px;"><a href="<?php echo $site_url; ?>/login/">Login</a></li>  


<li style="padding-top: 14px;"> <a href="<?php echo $site_url; ?>/help/">Help</a></li>

           <?php } ?>

           <?php if(isset($_SESSION['sess_user_id'])){?>
            <li style="padding-top: 14px;"><a href="<?php echo $site_url; ?>/wishlist/">Wishlist <small>(<?php echo get_total("car_wishlist","wish_id","WHERE user_id=$sess_user_id AND status=1"); ?>)</small></a></li>


           <li style="padding-top: 14px;"><a href="<?php echo $site_url; ?>/dashboard/">Dashboard</a></li>

         
           <li style="padding-top: 14px;"><a href="<?php echo $site_url; ?>/logout.php">Logout</a></li>
</div>
<?php } ?>



        </ul>
</div>

     </div>
</nav>


