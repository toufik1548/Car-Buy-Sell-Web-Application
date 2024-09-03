<?php include("configs/config.php"); ?>
<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Login</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<link rel="stylesheet" href="<?php echo $cp_url.'/css/bootstrap.min.css' ?>">
<link rel="stylesheet" href="<?php echo $cp_url.'/css/style.css' ?>">
</head>

<body>
<br>
<div class="container">
<div id="login">
<center>
<table width="300" align="center"><tr><td align="center">
<br><img src="../images/deshicar.logo.jpg" width="150"><br>
<h3 align="center">Login</h3>


<?php
session_start();
if(isset($_SESSION['msg']))
{
	echo "<div class=\"alert alert-danger\" role=\"alert\">".$_SESSION['msg']."</div>";
	unset($_SESSION['msg']);
}
?>



<form method="post" action="mvc/checklogin.php">

<div class="form-group has-feedback">
	<input type="text" name="username" class="form-control" placeholder="Email address" maxlength="40" required>
	<span class="glyphicon glyphicon-user form-control-feedback"></span>
</div>

<div class="form-group has-feedback">
	<input type="password" name="password" class="form-control" placeholder="Password" maxlength="15" required>
	<span class="glyphicon glyphicon-lock form-control-feedback"></span>
</div>


		<button type="submit" name="signin" class="btn btn-primary btn-block">Sign In</button>


</form>




</td></tr></table>
</center>
<br>
</div>
</div>

</body>
</html>
