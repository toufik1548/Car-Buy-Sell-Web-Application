<?php
$file_name = time()."_".$file_upload_name;
$add_date = date("Y-m-d");
$file_type = $_FILES['upload']['type'];
$file_size = $_FILES['upload']['size'];

// Check if the file was successfully uploaded
include("../configs/config.php");
mysqli_query($con, "INSERT INTO `car_media` (`media_id`, `file_name`, `file_type`, `file_size`, `add_date`)
    VALUES (NULL , '$file_name','$file_type','$file_size','$add_date')");
?>