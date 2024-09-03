<?php
if(!isset($_SESSION)) 
{
  session_start();
}


include("configs/config.php"); 
include("configs/functions.php"); 
include("configs/router.php"); 



//logged users data
if(isset($_SESSION['sess_user_id'])){

$sess_user_id = $_SESSION['sess_user_id'];
$sess_user_name=get_info("car_users","user_name","WHERE user_id=$sess_user_id");
$sess_location_id=get_info("car_users","location_id","WHERE user_id=$sess_user_id");

}
?>

<!DOCTYPE HTML>
<html lang="en-US">
   
   <head>
      <?php include('head.php'); ?>
      <?php //include('g_ads_auto.php'); ?>
      <?php include('g_tags.php'); ?>
   </head>

   

<body onload="initialize()" onunload="GUnload()">

<div class="top-menu">
  <?php include('header.php'); ?>
  <br><br><br>
</div>


<div class="container"> 
            <?php //include 'breadcrumb.php'; ?>
              <?php include('include.php'); ?>               
            </div>
         </div>
</div>


<?php if(isset($slug) && $slug!=""){include("footer.php");} ?>
   </body>
</html>