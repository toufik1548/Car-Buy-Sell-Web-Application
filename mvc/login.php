<div id="title">Log in</div>


<div class="alert alert-danger" role="alert">
<b>লগিন করতে সমস্যা হলে বা যে কোনো প্রয়োজনে আমাদের ফেসবুক পেজে মেসেজ দিন। ফেসবুক পেজ লিংক <a href="https://www.facebook.com/deshicar/" class="p-title">fb.com/Deshicar</a> অথবা ফোন করুন 01313959037 (সকাল ১১টা থেকে বিকাল ৫টা)</b>
</div>


<style type="text/css">
  .signup{
    text-align: center;
    background: #ff00007a !important;
  }
  .signup a{
    color: #fff;
    font-weight: 800;
    text-decoration: none;
    font-size: 14px;
  }
</style>
<div id="area2" class="login_form_j">
<?php if(isset($_SESSION['login_error']) && $_SESSION['login_error']==1){?>
<div class="alert alert-warning">
<b>Login Failed!</b><br>
Your email or password is not matched.
</div>
<?php } ?>

<form method="POST" action="<?php echo $site_url;?>/checklogin.php">

<div class="form-group">
<label for="email">Email</label>
<input type="email" name="user_email" class="form-control" id="email" required>
</div>

<div class="form-group">
<label for="pass">Password ( রেজিষ্টেশনের সময় যে পাসওয়ার্ড দিয়েছেন ) </label>
<input type="password" name="user_password" maxlength="20" class="form-control" id="pass" required>
</div>
<div class="btnsub">
  <button type="submit" class="btn btn-primary btn-lg">Login</button>
</div>


</form>
<br>

<div class="btnsub">
  <a href="<?php echo $site_url; ?>/password-recovery/">Forgotten password?</a>
</div>

<div class="newaccount">
  <a href="<?php echo $site_url; ?>/signup/">Create New Account</a>
</div>



<style type="text/css">
  .btnsub {
    text-align: center;
}
.btnsub a{
  color: blue;
}
.newaccount{
   text-align: center;
}
.newaccount a {
    padding: 15px 25px;
    background: #42b72a;
    border-radius: 10px;
    font-weight: 600;
    text-align: center;
    text-decoration: none;
}
.newaccount a:hover{
  color: #fff;
}
#area2 {
    border-top: 0px solid #000;
    border-bottom: 1px solid #aaa;
    background-color: #fff;
    margin-bottom: 20px;
    padding: 50px 330px;
    margin-top: 0;
    text-align: left;
}
.newaccount {
    text-align: center;
    margin-top: 40px;
    margin-bottom: 40px;
}

@media (max-width: 767.98px) { 

#area2{
  padding: 15px 25px;
}
}
</style>



</div>





