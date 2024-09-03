<?php if(isset($_SESSION['sess_user_id'])){ $sess_user_id=$_SESSION['sess_user_id']; ?>


<?php

if($sess_user_name=="" && $sess_user_type_id==1){?>
<meta http-equiv="refresh" content="0;url=<?php echo site_url(); ?>/profile-edit/"/>
<?php }
elseif($sess_user_name=="" && $sess_user_type_id==2){?>
<meta http-equiv="refresh" content="0;url=<?php echo site_url(); ?>/user-showroom-edit/"/>
<?php } ?>


<div id="title">Welcome <?php  echo $sess_user_name; ?>!</div>

<div id="area">


<div class="alert alert-info">
If you do not found your email at <b>INBOX</b>, Please check your <b>Bulk/Spam</b> folder and make it <b>Not Spam</b><br>
আমাদের থেকে পাঠানো ইমেইল আপনার <b>INBOX</b> না পেলে <b>SPAM</b> ও চেক করুন এবং ইমেইলটিকে <b>Not Spam</b> হিসেবে সেট করুন।
</div>

<div class="alert alert-success">
<?php if($sess_user_type_id==1){?>
	<b>যে কোন সমস্যা/প্রয়োজনে ইমেইল করুন info@deshicar.com অথবা ফোন করুন 01313959037 (সকাল ১১টা থেকে বিকাল ৫টা)</b>
<?php }elseif($sess_user_type_id==2){ ?>
<b>যে কোন সমস্যা/প্রয়োজনে ইমেইল করুন info@deshicar.com অথবা ফোন করুন 01313959037 (সকাল ১১টা থেকে বিকাল ৫টা)</b>
<?php } ?>
</div>


<?php if($sess_user_name!=""){ ?>
<a href="<?php echo $site_url; ?>/user-car-add"><button class="btn btn-lg btn-danger"> <b> + Add Car +</b> </button></a>
&nbsp;
<?php } ?>

<!--
<?php
if($sess_user_type_id==1){?>
<a href="<?php echo $site_url; ?>/user-profile-edit/"><button class="btn btn-lg btn-primary"><b>Edit Profile</b></button></a>
<?php }elseif($sess_user_type_id==2){?>
<a href="<?php echo $site_url; ?>/user-showroom-edit/"><button class="btn btn-lg btn-primary"><b>Edit Showroom Profile</b></button></a>
<?php } ?>
-->

&nbsp;
<a href="<?php echo $site_url; ?>/user-change-password/"><button class="btn btn-lg btn-primary"><b>Change Password</b></button></a>
<!--
&nbsp;
<a href="<?php echo $site_url; ?>/user-reminder/"><button class="btn btn-lg btn-primary"><b>Reminder</b></button></a>
&nbsp;
<a href="<?php echo $site_url; ?>/user-reminder-update/"><button class="btn btn-lg btn-primary"><b>Edit Reminder</b></button></a>
-->
</div>

<?php include("user_cars.php"); ?>
<?php //include("send_email_cars.php");?>

<?php }else{echo '<div class="alert alert-success" role="alert">You are not logged in</div>';} ?>