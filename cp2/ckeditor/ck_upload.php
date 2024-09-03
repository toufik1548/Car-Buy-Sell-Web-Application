<?php

$file_upload_name  =  $_FILES['upload']['name'];

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define file upload path
$upload_dir = array(
    'img' => '../../images/media/'
);

// Allowed image properties
$imgset = array(
    'maxsize' => 5000,
    'maxwidth' => 3000,
    'maxheight' => 3000,
    'minwidth' => 10,
    'minheight' => 10,
    'type' => array('bmp', 'gif', 'jpg', 'jpeg', 'png', 'webp'),
);

// If 0, will OVERWRITE the existing file
define('RENAME_F', 1);

// Function to set filename
function setFName($p, $fn, $ex, $i)
{
    if (RENAME_F == 1 && file_exists($p . $fn . $ex)) {
        return setFName($p, $fn . '_' . ($i + 1), $ex, ($i + 1));
    } else {
        return $fn . $ex;
    }
}

$re = '';

if (isset($_FILES['upload']) && strlen($file_upload_name) > 1) {
    define('F_NAME', preg_replace('/\.(.+?)$/i', '', basename($file_upload_name)));

    //file insert into media table
    include("ck_upload_media.php");

    // Get filename without extension
    $sepext = explode('.', strtolower($file_upload_name));
    $type = end($sepext); /** gets extension **/

    // Upload directory
    $uploadPath = $upload_dir['img'];

    // Validate file type
    if (in_array($type, $imgset['type'])) {
        // Image width and height
        list($width, $height) = getimagesize($_FILES['upload']['tmp_name']);

        if (isset($width) && isset($height)) {
            if ($width > $imgset['maxwidth'] || $height > $imgset['maxheight']) {
                $re .= '\\n Width x Height = ' . $width . ' x ' . $height . ' \\n The maximum Width x Height must be: ' . $imgset['maxwidth'] . ' x ' . $imgset['maxheight'];
            }

            if ($width < $imgset['minwidth'] || $height < $imgset['minheight']) {
                $re .= '\\n Width x Height = ' . $width . ' x ' . $height . '\\n The minimum Width x Height must be: ' . $imgset['minwidth'] . ' x ' . $imgset['minheight'];
            }

            if ($_FILES['upload']['size'] > $imgset['maxsize'] * 1000) {
                $re .= '\\n Maximum file size must be: ' . $imgset['maxsize'] . ' KB.';
            }
        }
    } else {
        $re .= 'The file: ' . $file_upload_name . ' has not the allowed extension type.';
    }

    // File upload path
    $f_name = setFName($_SERVER['DOCUMENT_ROOT'] . '/' . $uploadPath, time() . "_" . F_NAME, ".$type", 0);
    $uploadpath = $uploadPath . '/' . time() . "_" . $f_name;

    // If no errors, upload the image, else, output the errors
    if ($re == '') {
        if (move_uploaded_file($_FILES['upload']['tmp_name'], $uploadpath)) {
            $CKEditorFuncNum = $_GET['CKEditorFuncNum'];

            $url = $site_url."/images/media" . '/' . time() . "_" . $f_name;

            $msg = F_NAME . '.' . $type . ' successfully uploaded: \\n- Size: ' . number_format($_FILES['upload']['size'] / 1024, 2, '.', '') . ' KB';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
        } else {
            $re = '<script>console.log("Unable to upload the file")</script>';
        }
    } else {
        $re = '<script>console.log("' . $re . '")</script>';
    }
}

// Render HTML output
@header('Content-type: text/html; charset=utf-8');
echo $re;
?>
