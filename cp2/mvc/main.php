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

$logged_admin_id    = $_SESSION['sess_admin_id'];
$logged_admin_name  = $_SESSION['sess_admin_name'];
$logged_level_id    = $_SESSION['sess_level_id'];
   
?>

<!DOCTYPE html>
<html lang="en">
<?php include("head.php"); ?>
    <body class="sb-nav-fixed">

        <?php include("nav_top.php"); ?>
        
        <div id="layoutSidenav">
            
            <?php include("nav_left.php"); ?>
        
            <?php include("includes.php"); ?>
        </div>

        <script src="<?php echo $cp_url; ?>/ckeditor/ckeditor.js"></script>
        <script>
            // Replace the <textarea> with a CKEditor
            CKEDITOR.replace('post_details',{
                filebrowserUploadUrl: '<?php echo $cp_url; ?>/ckeditor/ck_upload.php',
                filebrowserUploadMethod: 'form'
            });
            CKEDITOR.config.extraPlugins = 'colorbutton';
        </script>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo $cp_url; ?>/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo $cp_url; ?>/assets/demo/chart-area-demo.js"></script>
        <script src="<?php echo $cp_url; ?>/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo $cp_url; ?>/js/datatables-simple-demo.js"></script>
    </body>
</html>