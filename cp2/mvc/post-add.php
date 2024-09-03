
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper pt-3">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><i class="far fa-plus-square"></i>&nbsp; Add Post</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">

                    <!-- Insert Query Start -->
                    <?php
                    if (isset($_POST['action']) && $_POST['action'] == "Submit") {

                        $category_id = trim(addslashes($_POST["category_id"]));
                        $post_title = trim(addslashes($_POST["post_title"]));
                        $post_summary = trim(addslashes($_POST["post_summary"]));
                        $post_details = trim(addslashes($_POST["post_details"]));
                        $post_tags = trim(addslashes($_POST["post_tags"]));

                        $lfile_name = $_FILES["file_name"]["name"];
                        $post_photo = time() . "_" . trim($lfile_name);

                        $add_date = date('Y-m-d');
                        $views = 0;
                        $status = 1;

                        // Display error msg
                        $err = array();
                        if ($post_title == '') {
                            $err[] = "<font color='red'>*** Please Enter Post Title <b>Name</b></font>";
                        }

                        $n = count($err);

                        if ($n > 0) {
                            echo "<div class=err_msg><ol>";

                            for ($i = 0; $i < $n; $i++) {
                                echo "" . $err[$i] . "<br>";
                            }
                            echo "</ol></div>";
                        } else {
                            $q = mysqli_query($con, "INSERT INTO `car_posts` (
                                `post_id`, 
                                `admin_id`, 
                                `category_id`, 
                                `post_title`,  
                                `post_summary`, 
                                `post_details`, 
                                `post_tags`, 
                                `post_photo`, 
                                `add_date`, 
                                `views`, 
                                `status`) 

                                VALUES (
                                NULL, 
                                '$logged_admin_id', 
                                '$category_id', 
                                '$post_title', 
                                '$post_summary', 
                                '$post_details', 
                                '$post_tags',
                                '$post_photo',
                                '$add_date',
                                '1', 
                                '1');");

                            if ($q) {

                                // UPLOAD IMAGE
                                static $ads_filename;
                                $pic_path = "../images/media/";
                                $tmp_name = $_FILES["file_name"]["tmp_name"];
                                $lname  = $_FILES["file_name"]["name"];
                                $name   = $post_photo; // from above

                                move_uploaded_file($tmp_name, "$pic_path/$name");

                                // image resize
                                $source_pic = "$pic_path/$name";
                                $destination_pic = "$pic_path/thumb/$name";

                                $max_width_big = 1000;
                                $max_height_big = 1000;

                                $size = getimagesize($source_pic);
                                $img_mime = $size["mime"];

                                if ($img_mime == "image/jpeg") {
                                    $src = imagecreatefromjpeg($source_pic);
                                } elseif ($img_mime == "image/gif") {
                                    $src = imagecreatefromgif($source_pic);
                                } elseif ($img_mime == "image/png") {
                                    $src = imagecreatefrompng($source_pic);
                                }

                                list($width, $height) = getimagesize($source_pic);

                                $x_ratio = $max_width_big / $width;
                                $y_ratio = $max_height_big / $height;

                                if (($width <= $max_width_big) && ($height <= $max_height_big)) {
                                    $tn_width_big = $width;
                                    $tn_height_big = $height;
                                } elseif (($x_ratio * $height) < $max_height_big) {
                                    $tn_height_big = ceil($x_ratio * $height);
                                    $tn_width_big = $max_width_big;
                                } else {
                                    $tn_width_big = ceil($y_ratio * $width);
                                    $tn_height_big = $max_height_big;
                                }

                                $tmp_big = imagecreatetruecolor($tn_width_big, $tn_height_big);
                                imagecopyresampled($tmp_big, $src, 0, 0, 0, 0, $tn_width_big, $tn_height_big, $width, $height);

                                imagejpeg($tmp_big, $source_pic, 100);
                                imagedestroy($src);
                                imagedestroy($tmp_big);

                                // thumb
                                $max_width = 300;
                                $max_height = 300;

                                $size = getimagesize($source_pic);
                                $img_mime = $size["mime"];

                                if ($img_mime == "image/jpeg") {
                                    $src1 = imagecreatefromjpeg($source_pic);
                                } elseif ($img_mime == "image/gif") {
                                    $src1 = imagecreatefromgif($source_pic);
                                } elseif ($img_mime == "image/png") {
                                    $src1 = imagecreatefrompng($source_pic);
                                }

                                list($width1, $height1) = getimagesize($source_pic);

                                $x_ratio1 = $max_width / $width1;
                                $y_ratio1 = $max_height / $height1;

                                if (($width1 <= $max_width) && ($height1 <= $max_height)) {
                                    $tn_width = $width1;
                                    $tn_height = $height1;
                                } elseif (($x_ratio1 * $height1) < $max_height) {
                                    $tn_height = ceil($x_ratio1 * $height1);
                                    $tn_width = $max_width;
                                } else {
                                    $tn_width = ceil($y_ratio1 * $width1);
                                    $tn_height = $max_height;
                                }

                                $tmp = imagecreatetruecolor($tn_width, $tn_height);
                                imagecopyresampled($tmp, $src1, 0, 0, 0, 0, $tn_width, $tn_height, $width1, $height1);

                                imagejpeg($tmp, $destination_pic, 100);
                                imagedestroy($src1);
                                imagedestroy($tmp);

                                echo "<div class='alert alert-success alert-dismissible' role='alert'>
                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                  <b>Post Added Successfully!</b>
                                </div>";
                            } else {
                                echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                  Sorry!!! Failed To Add Posts! Please Try Again...
                                </div>";
                            }
                        } // end if no err
                    } // end while
                    ?>

                    <form action="" method="post" enctype="multipart/form-data" class="table">
                        <font color="red">*</font> Required fields<br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <td>Categories<font color="red"></font></td>
                                <td>
                                    <select class="form-control" name="category_id" class="selectpicker test">
                                        <option value=0>Select Categories</option>
                                        <?php
                                        $q2 = mysqli_query($con, "SELECT * FROM car_post_categories WHERE status=1");
                                        while ($r2 = mysqli_fetch_array($q2)) {
                                        ?>
                                            <option value="<?php echo $r2['category_id']; ?>" 
                                                <?php 
                                                if(isset($_POST['category_id']) && $_POST['category_id']==$r2['category_id']){
                                                    echo " selected";
                                                }
                                                ?>
                                            >


                                                <?php echo $r2['category_name']; ?></option>
                                        <?php } // end child ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Post Title</b><font color="red">*</font></td>
                                <td><input name="post_title" type="text" class="form-control" value=""></td>
                            </tr>
                            <tr>
                                <td><b>Post Summary</b></td>
                                <td><input name="post_summary" type="text" class="form-control" value=""></td>
                            </tr>
                            <tr>
                                <td><b>Post Details</b></td>
                                <td><textarea rows="5" class="form-control" name="post_details" id="post_details"> </textarea></td>
                            </tr>
                            <tr>
                                <td><b>Post Tags</b></td>
                                <td><input name="post_tags" type="text" class="form-control" value=""></td>
                            </tr>
                            <tr>
                                <td class="td"><b>Post Photo</b></td>
                                <td><input name="file_name" type="file" id="file_name"></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td><input type="submit" name="action" value="Submit" class="btn btn-primary" style="width: 200px"></td>
                            </tr>
                        </table>
                    </form>
                </div><!-- ./card-body -->
            </div><!-- ./card -->
            <a href="<?php echo $cp_url; ?>/post-list/">
                <button type="button" class="btn btn-secondary btn-sm">List</button>
            </a>
            <br><br>
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
</div><!-- /.content -->
