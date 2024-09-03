<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo $site_url; ?>/" class="b-title">Home</a></li>
    
    <li class="breadcrumb-item active" aria-current="page"><?php echo $car_name; ?></li>
  </ol>
</nav>


<?php
//add to wishlist
if(isset($_POST['submit_wish'])){
  $car_id = $_POST['car_id'];
  $add_date = date("Y-m-d");
  $qw = mysqli_query($con,"INSERT INTO `car_wishlist` (`wish_id`, `user_id`, `car_id`, `add_date`, `status`) VALUES (NULL, '$sess_user_id', '$car_id', '$add_date', '1')");
  if($qw){echo "<div class=\"alert alert-success\" role=\"alert\">
  Car added to your wishlist successfully
</div>";}
}
?>

<h1><?php echo $car_name; ?></h1>


<div id="title"><?php echo $car_name; ?></div>
<div id="area">

<?php

//update views
mysqli_query($con,"UPDATE car_used SET views=views+1 WHERE car_id=$car_id");


$q1 = mysqli_query($con,"SELECT * FROM car_used WHERE car_id=$car_id");
$r1=mysqli_fetch_array($q1);


$user_id=$r1['user_id'];
$location_id=$r1['location_id'];
$car_name=$r1['car_name'];
$brand_id=$r1['brand_id'];
$brand_slug=get_info("car_brands","brand_slug","WHERE brand_id=".$r1['brand_id']);
$model_id=$r1['model_id'];
$model_name = get_info("car_models","model_name","WHERE model_id=$model_id");
$model_slug = get_info("car_models","model_slug","WHERE model_id=$model_id");
$model_year=$r1['model_year'];
$reg_year=$r1['reg_year'];
$condition_id=$r1['condition_id'];
$condition_name = get_info("car_conditions","condition_name","WHERE condition_id=$condition_id");
$trans_id=$r1['trans_id'];
$engine_cc=$r1['engine_cc'];
$km_run=$r1['km_run'];
$car_details=$r1['car_details'];
$car_price=$r1['car_price'];
$car_price_negotiable=$r1['car_price_negotiable'];
$type_id=$r1['type_id'];
$fuel_id=$r1['fuel_id'];
$add_date=$r1['add_date'];
$update_date=$r1['update_date'];
$views=$r1['views'];
$status=$r1['status'];
?>

<?php if($status!=0){ ?>




<div id="bike_details">

<br>
<p align="center"><img src="<?php echo $site_url; ?>/images/disclaimer.jpg" class="img-responsive img-fluid img-rounded"></p>
<br><br>



<div class="col-sm-4">
	<?php
	$qp = mysqli_query($con,"SELECT photo_name FROM car_used_photo WHERE car_id='$car_id' ORDER BY photo_id ASC LIMIT 1");
	$rp=mysqli_fetch_array($qp);
	$np=mysqli_num_rows($qp);
	if($np==0){$car_photo = $site_url."/images/no_bike_photo.jpg"; }
	else{$car_photo = $site_url."/images/users/".$user_id."/".$rp['photo_name']; }
	?>
	<img width="800" src="<?php echo $car_photo; ?>" class="img-responsive">
	
	<center>
    <!-- <div class="ui-price-tag-photo">
             <a href="#More-Photos" id="">
    More Photo
      </a>
    </div> -->


    <div class="btn-group btn-group-justified">
    <a href="#" class="btn btn-primary" style="border-radius: 0;">
       <b>  <?php if($status==2){
echo "Sold Out";}else{
echo "<small>TK</small> ".number_format_bd($car_price);} ?></b>

    </a>
    <a href="#More-Photos" class="btn btn-success" style="border-radius:0">More Photo</a>
  </div>

  <!--   <div class="ui-price-tag"></div> -->
    <br>
    <?php include("fb_share.php"); ?></center><br>
</div>






<div class="col-sm-4">
<b><?php echo $car_name; ?></b>

<h3>Car Informtion</h3>
Brand: <a class="p-title" href="<?php echo $site_url; ?>/brand/<?php echo $brand_slug; ?>/"><u><?php echo get_info('car_brands','brand_name',"WHERE brand_id=$brand_id");?></u></a><br>
Model: <a href="<?php echo $site_url; ?>/model/<?php echo $model_slug ;?>/" class="p-title"><u><?php echo $model_name ;?></u></a><br>
Model Year: <?php echo $model_year;?><br>
Reg. Year: <?php echo $reg_year;?><br>
Condition: <?php echo get_info('car_conditions','condition_name',"WHERE condition_id=$condition_id");?><br>
Transmissions: <?php echo get_info('car_transmissions','trans_name',"WHERE trans_id=$trans_id");?><br>
Body Type: <?php echo get_info('car_types','type_name',"WHERE type_id=$type_id");?><br>
Fuel: <?php echo get_info('car_fuels','fuel_name',"WHERE fuel_id=$fuel_id");?><br>
Engine cc: <?php echo $engine_cc; ?>cc<br>
KM Run:
<?php if($km_run==0){
echo "N/A";}else{
echo number_format($km_run)."KM";} ?>

 <br>








</div>


<div class="col-sm-4">

<h3>Seller information</h3>
<?php
$type_id = get_info("car_users","type_id","WHERE user_id=$user_id");
if($type_id==1){?>

<b><?php echo get_info('car_persons','person_name',"WHERE user_id=$user_id");?></b></a><br>

Address: 
<?php
$sub_location_slug = get_info("car_locations","location_slug","WHERE location_id=$location_id");

$parent_id=get_info('car_locations','parent_id',"WHERE location_id=$location_id"); 
$location_slug= get_info("car_locations","location_slug","WHERE location_id=$parent_id");
?>



<a class="p-title" href="<?php echo $site_url; ?>/location/<?php echo $sub_location_slug; ?>/"><u><?php echo get_info('car_locations','location_name',"WHERE location_id=$location_id");?></u></a>, 

<a class="p-title" href="<?php echo $site_url; ?>/location/<?php echo $location_slug; ?>/">
<u><?php echo get_info('car_locations','location_name',"WHERE location_id=$parent_id");?></u>
</a>


<br>


<?php if($status==2){
echo "";}else{ ?>
 <b>Mobile Number:</b>  <?php //echo get_info("car_persons","person_phone","WHERE user_id=$user_id"); ?>
 <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  View Number
</button>
<?php } ?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
  
<b>Seller Nobile Number Request</b>


      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

<div class="alert alert-success" role="alert">
  <b>সেলার এর ফোন নম্বরটি আপনার এসএমএস এ প্রেরন করা হবে</b>
</div>


  <!-- This is Insert Query Start -->

            <?php
if(isset($_POST['action'])&&$_POST['action']=="Submit")
{

$request_id = trim(addslashes($_POST["request_id"])); 
$car_id = trim(addslashes($_POST["car_id"]));
$buyer_name = addslashes($_POST['buyer_name']);
$buyer_mobile = addslashes($_POST['buyer_mobile']);
$add_date = date('Y-m-d');
//Display error msg

  $err=array();
  if($buyer_name=='')
    { $err[]="<font color='red'>*** Please Enter  Your <b>Name</b></font>";}
   

  if($buyer_mobile=='')
    { $err[]="<font color='red'>*** Please enter your <b>Mobile Number</b>.</font>";}
if(strlen($buyer_mobile)<11) 
    { $err[]="<font color='red'>*** Mobile number should be 11 Digit.</font>";}

  if( substr($buyer_mobile, 0, 1) !=0   || substr($buyer_mobile, 0, 1) =="+" || substr($buyer_mobile, 0, 1) =="8")

      { $err[]="<font color='red'>*** Mobile number should be Start With <b> 0 </b>.</font>";}

  $n= count($err);


if($n>0)
  {
  echo "<div class=err_msg><ol>";

  for($i=0;$i<$n;$i++)
      { echo "".$err[$i]."<br>"; }
  echo "</ol></div>";

  }
else
  {
$q=mysqli_query($con,"INSERT INTO `car_used_buyer_request` (
  `request_id`, 
  `car_id`, 
  `buyer_name`,
  `buyer_mobile`,
     `add_date`) 

VALUES (
  NULL, 
  '$car_id', 
  '$buyer_name',
  '$buyer_mobile',
  '$add_date');");

if($q)
{

echo "<div class='alert alert-success alert-dismissible' role='alert'>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  <b> Your Data Successfully Submited !</b>
</div>";



//SMS Sent Start


$seller_mobile=get_info('car_persons','person_phone',"WHERE user_id=$user_id");
    $contact = $buyer_mobile;
    $url = "https://sms.notify.info.bd/sms/api/SendSMS";
    $api_key = "94F7CAD5206D4F1681ED8B0E5347653";
    $sender_id = "8809610991236";

    $text = "Seller mobile number $seller_mobile \n \n www.deshicar.com";
    $text2 = "Your car want to buy Mr. $buyer_name $buyer_mobile  \n \n www.deshicar.com";

    $full_url1 = "$url?api_key=$api_key&sender_id=$sender_id&contact=$contact&text=$text";

    
    $full_url2 = "$url?api_key=$api_key&sender_id=$sender_id&contact=$seller_mobile&text=$text2";


for($a=1;$a<3;$a++){
    echo "<iframe src=\"${'full_url'.$a}\" style=\"border:0px solid red; height:0px; width: 0xp;\" title=\"Iframe Example\"></iframe>";   
}




//SMS Sent End



}
else
{
echo "<div class='alert alert-danger alert-dismissible' role='alert'>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  Sorry!!! Failed To Your Request! Please Try Again...
</div>";
}

}//end if no err

}//end while
?>

<script>
function validateForm() {
  let x = document.forms["myForm"]["buyer_name"].value;
  let n = document.forms["myForm"]["buyer_mobile"].value;

  let y=n.length;
let z=n.charAt(0);

  
  if (x == "") {
    alert("Name must be filled out");
    return false;
  }
  
  if (y != 11) {
    alert("Mobile number must be 11 Digit");
    return false;
  }
 
    if (z != 0) {
    alert("Mobile number start with number 0");
    return false;
  }
  
  
}
</script>




<form method="post" action=" " name="myForm" onsubmit="return validateForm()" >



   <div class="form-group">
      <label for="buyer_name">Your Name<small style="color:red">*</small></label>
    <input type="text" name="buyer_name" class="form-control" placeholder=" Write Your Name In English  " maxlength="100">
</div>

<input type="hidden" name="car_id" value=" <?php echo $car_id ?> ">

<div class="form-group">
<label for="buyer_mobile">Mobile Number<small style="color:red">*</small></label>
<input type="text" name="buyer_mobile" class="form-control" placeholder="Write Your Mobile Number ( Only 11 Digit WithOut +88) " maxlength="11">
</div>
  <input type="submit"  name="action" value="Submit" class="btn-primary">
</form>




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>



<?php }elseif ($type_id==2) { ?>

Car Added by: <a class="p-title" href="<?php echo $site_url; ?>/showroom/<?php echo get_info('car_showrooms','showroom_slug',"WHERE user_id=$user_id");?>/"><?php echo get_info('car_showrooms','showroom_name',"WHERE user_id=$user_id");?></a><br>


Address: 
<?php
$sub_location_slug = get_info("car_locations","location_slug","WHERE location_id=$location_id");
?>
<a class="p-title" href="<?php echo $site_url; ?>/location/<?php echo $sub_location_slug; ?>/"><?php echo get_info('car_locations','location_name',"WHERE location_id=$location_id");?></a>, 

<?php 
$parent_id=get_info('car_locations','parent_id',"WHERE location_id=$location_id"); 
$location_slug= get_info("car_locations","location_slug","WHERE location_id=$parent_id");
?>
<a class="p-title" href="<?php echo $site_url; ?>/location/<?php echo $location_slug; ?>/">
<?php 
echo get_info('car_locations','location_name',"WHERE location_id=$parent_id");?></a><br>
Contact: <?php echo get_info('car_showrooms','showroom_phones',"WHERE user_id=$user_id");?>
<?php } ?>





<h3>Price and Status</h3>
Price: <?php echo number_format_bd($car_price); ?><br>
(<?php if($car_price_negotiable==0){
echo "fixed";}
else{
echo "negotiable";} ?>)
<br>
Listed on : <?php echo $add_date; ?><br>
Views: <?php echo $views; ?>

</div>




<div class="clearfix"></div>

<hr>

<div class="alert alert-warning">
  <strong>নিরাপত্তামুলক পরামর্শ</strong><br>
  <ul>
  <li>অচেনা/নিরিবিলি জায়গায় ক্রেতা/বিক্রেতার সাথে দেখা করবেন না</li>
  <li>গাড়ি নেয়ার আগে অভিজ্ঞ কাউকে দিয়ে পরীক্ষা করিয়ে নিন</li>
  <li>পন্য সঠিকভাবে বূঝে নিয়ে লেনদেন করুন</li>
  <li>সতর্ক থাকুন, নিরাপদে থাকুন</li>
  </ul>
</div>

<hr>
<?php include("g_ads.php"); ?>
<hr>

<div class="col-sm-12">
<h3>Details</h3>
<?php echo nl2br($car_details);?>



</div>

<div id="More-Photos"></div><br><br><br>

<div class="col-sm-12">

<!-- wishlist button -->
<span style="float: right;">
<?php if(isset($sess_user_id)){?>
<form method="POST" action="">
<input type="hidden" name="car_id" value="<?php echo $car_id; ?>">
<button type="submit" name="submit_wish" class="btn btn-danger btn-block">&#9829; Save to Wishlist &#9829;</button>
</form>
<?php }else{?>
<a href="<?php echo $site_url; ?>/login/"><button class="btn btn-danger btn-block">&#9829; Save to Wishlist &#9829;</button></a>
<?php } ?>
</span>


<h3>More Photos</h3>


<?php
$q2		=	mysqli_query($con,"SELECT * FROM car_used_photo WHERE car_id = $car_id ORDER BY photo_id ASC ") or die("Getting records");
while($r2	=	mysqli_fetch_array($q2))
{ ?>
<img src="<?php echo $site_url; ?>/images/users/<?php echo $user_id; ?>/<?php echo $r2['photo_name']; ?>" width="350" class="img-responsive img-thumbnail">
<?php } ?>
</div>


<div class="clearfix"></div>


</div>

<?php } //if status!=0 ?>


</div>


<hr>
<?php include("g_ads.php"); ?>
<hr>



<div id="title">News/Tips</div>
<div id="area">
<?php 
$cond = " AND (post_tags LIKE '%$brand_name%' OR post_tags LIKE '%$model_name%' OR post_tags LIKE '%$condition_name%')";
$sort = "ORDER BY post_id DESC";
$limit = "LIMIT 10";
include("post_links.php"); 
?>
</div>





<!--RELATED MORE USED CAR START-->
<div id="title">You can also choose</div>

<div id="area">
<?php
$price1 = $car_price - ($car_price*.2);
$price2 = $car_price + ($car_price*.2);
$engine_cc1 = $engine_cc - ($engine_cc*.2);
$engine_cc2 = $engine_cc + ($engine_cc*.2);

$cond = " AND car_price BETWEEN $price1 AND $price2 AND engine_cc BETWEEN $engine_cc1 AND $engine_cc2 AND (location_id=$location_id OR brand_id=$brand_id)";
$sort = "ORDER BY car_price ASC";
$limit = "LIMIT 100";
include("used-car-list.php");
?>
</div>
