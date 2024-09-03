<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo $site_url; ?>/">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo $site_url; ?>/dashboard/">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Sold/Close</li>
  </ol>
</nav>

<div id="title">Car Sold/Close</div>
<div id="area">


<div class="form-group">
<div class="alert alert-danger">
  <strong>Be careful!</strong> <br>You are going to sold/close/unpublish your car. Once you do that it wouldn't be possible to take it back.<br>
<strong>সাবধান!</strong> <br>আপনি আপনার বিজ্ঞাপনটি বন্ধ বা বিক্রি হয়ে গেছে হিসেবে চিহ্নিত করতে চলেছেন। একবার এটি সেট করলে পূনরায় ফেরত আনার সুযোগ নেই।
</div>

<?php



$car_id = $slug2;
$car_name = get_info("car_used","car_name","WHERE car_id=$car_id AND user_id=$sess_user_id");

if(isset($_POST['action']) && $_POST['action']=="Update"){

	$status 	= $_POST['status'];
	if($status==2 || $status==3){
		$q = mysqli_query($con,"UPDATE car_used SET status=$status WHERE car_id=$car_id AND status=1");
		if($q){echo'<div class="alert alert-success" role="alert">Updated successfuly</div>';}else{echo'<div class="alert alert-warning" role="alert">Sorry! Failed to update. Try again later</div>';}
	}
}

?>

<?php if($car_name!=""){ ?>

<form method="post" action="">


<br><br>
<input type="radio" name="status" value="2" 
<?php 
if(isset($_POST['status']) && $_POST['status']==2){echo "checked";}
?>
/> Sold </input>
<br><br>
<input type="radio" name="status" value="3" 
<?php 
if(isset($_POST['status']) && $_POST['status']==3){echo "checked";}
?>/> Close/Unpublish/Hide </input>


<br><br><br>

<input type="submit" name="action" value="Update"  class="btn btn-danger btn-lg btn-block">

</form>

<?php } ?>



</div>