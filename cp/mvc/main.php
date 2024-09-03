<?php 
include("configs/config.php"); 
?>
<?php
session_start();

  if(!isset($_SESSION['sess_admin_id']))
    {
      header("location: $cp_url/login.php");
    }

include("configs/functions.php"); 
include("configs/router.php"); 

    $logged_admin_id 	= $_SESSION['sess_admin_id'];
    $logged_admin_name  = $_SESSION['sess_admin_name'];
    $logged_level_id  = $_SESSION['sess_level_id'];

   
?>

<!DOCTYPE html>
<html>
<html>
<head>
<title>CP ~ DeshiCar.com</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="<?php echo $cp_url.'/css/bootstrap.min.css'; ?>">
<link rel="stylesheet" href="<?php echo $cp_url.'/css/style.css'; ?>">


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</head>

<body>

<div class="container">

<table width="100%" border="0" align="center" bgcolor="#ccc">
  <tr>
    <td><?php include("header_menu.php"); ?></td>
  </tr>
  <tr>
       <td valign="top" bgcolor="#efefef"><?php include("includes.php"); ?></td>
  </tr>
</table>

<hr>
<center>&copy; DeshiCar.com</center>

</div>
<script src="<?php echo $cp_url; ?>/ckeditor/ckeditor.js"></script>
<script>
    // Replace the <textarea> with a CKEditor
    CKEDITOR.replace('post_details',{
        filebrowserUploadUrl: 'ckeditor/ck_upload.php',
        filebrowserUploadMethod: 'form'
    });
    CKEDITOR.config.extraPlugins = 'colorbutton';
    </script>

</body>
</html>