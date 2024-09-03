<?php
$user_id = $slug2;

// Allowed image properties
$imgset = array(
    'type' => array('bmp', 'gif', 'jpg', 'jpeg', 'png', 'webp'),  // Allowed file types
);

$showroom_slug = get_info("car_showrooms", "showroom_slug", "WHERE user_id='$user_id'");

if (isset($_POST['upload'])) {
    // File handling
    $file_name = $_FILES["file_name"]["name"];
    $tmp_name = $_FILES["file_name"]["tmp_name"];
    $file_size = $_FILES["file_name"]["size"];
    $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    // Validate image properties
    if (!in_array($file_type, $imgset['type'])) {
        // Display error message for invalid image
        echo "<div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            <b>Invalid Image! Please check image properties.</b>
        </div>";
    } else {
        // Move uploaded file
        $filename = $showroom_slug . "-" . $file_name;
        $image_path_original = "../images/showrooms/" . $filename;
        move_uploaded_file($tmp_name, $image_path_original);

        // Convert the uploaded image to JPG format
        $image = imagecreatefromstring(file_get_contents($image_path_original));
        $resized_image = imagescale($image, 1000, 500);

        // Save the resized image as JPG with a maximum file size of 500 KB
        $image_path_resized = "../images/showrooms/" . $filename . ".jpg";
        imagejpeg($resized_image, $image_path_resized, 90); // Set JPEG quality to 90

        // Check if the resized image meets the size requirement
        $resized_file_size = filesize($image_path_resized);
        $max_file_size_kb = 500;

        if ($resized_file_size > $max_file_size_kb * 1024) {
            // Resize the image with a lower quality setting if it still exceeds the limit
            imagejpeg($resized_image, $image_path_resized, 70); // Set JPEG quality to 70

            // Update file size after the second attempt
            $resized_file_size = filesize($image_path_resized);
        }

        // Free up memory
        imagedestroy($image);
        imagedestroy($resized_image);

        // Concatenate the string
        $filenameWithExtension = $filename . ".jpg";

        // Update database using prepared statement to prevent SQL injection
        $stmt = $con->prepare("UPDATE `car_showrooms` SET `showroom_photo` = ? WHERE `car_showrooms`.`user_id` = ?");
        $stmt->bind_param("si", $filenameWithExtension, $user_id);
        $q = $stmt->execute();
        $stmt->close();

        // Thumbnail handling
        $source_pic = $image_path_resized; // Use the resized image as the source for the thumbnail
        $destination_folder = "../images/showrooms/thumb/";
        $destination_pic = $destination_folder . $filename . ".jpg";

        // Ensure the destination folder exists, create it if not
        if (!file_exists($destination_folder)) {
            mkdir($destination_folder, 0777, true);
        }

        // Generate and save the thumbnail
        $max_thumb_width = 200;
        $max_thumb_height = 200;

        list($width, $height) = getimagesize($source_pic);
        $x_ratio = $max_thumb_width / $width;
        $y_ratio = $max_thumb_height / $height;

        if (($width <= $max_thumb_width) && ($height <= $max_thumb_height)) {
            $tn_width = $width;
            $tn_height = $height;
        } elseif (($x_ratio * $height) < $max_thumb_height) {
            $tn_height = ceil($x_ratio * $height);
            $tn_width = $max_thumb_width;
        } else {
            $tn_width = ceil($y_ratio * $width);
            $tn_height = $max_thumb_height;
        }

        $src = imagecreatefromstring(file_get_contents($source_pic));
        $tmp = imagecreatetruecolor($tn_width, $tn_height);
        imagecopyresampled($tmp, $src, 0, 0, 0, 0, $tn_width, $tn_height, $width, $height);
        imagejpeg($tmp, $destination_pic, 100);
        imagedestroy($src);
        imagedestroy($tmp);

        // Display success or error message
        if ($q) {
            echo "<div class='alert alert-primary alert-dismissible' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                <b>Photo Uploaded Successfully!</b>
            </div>";
        } else {
            echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                <b>Wrong or mismatch!</b>
            </div>";
        }
    }
}
?>




<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <br>

            <!-- PHOTO UPLOAD -->
            <div class="card">
                <div class="card-header" align="center"><h3 class="badge text-dark">Showroom Photo</h3></div>
                <div class="card-body">

                    <font size="4">Showroom Name:</font> <font size="5"><b><?php echo get_info("car_showrooms", "showroom_name", "WHERE user_id=$user_id"); ?></b></font>
                    <img src="<?php echo $site_url; ?>/images/showrooms/<?php echo get_info("car_showrooms", "showroom_photo", "WHERE user_id='$user_id'"); ?>" width='50' height='50'>
                    <br><br>

                    <table class="table table-striped table-bordered">
                        <tbody>
                            <tr>
                                <td width="20%">
                                    <font size="3">Upload Photo:</font>
                                </td>
                                <td>
                                    <form name="form1" method="POST" enctype="multipart/form-data" action="">
                                        <input name="file_name" type="file" id="file_name">
                                        <input type="submit" name="upload" value="Upload Image">
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <!--./card-body\-->
            </div>
            <!--./card\-->
        </div>
        <!--./col-lg-12\-->
    </div>
    <!--./row\-->
</div>
<!--./container\-->
<br>








