<?php
if (isset($_POST['getData'])) {
    //$conn = new mysqli('localhost', 'root', '', 'deshicar');
    include("../configs/config.php"); 
    include("../configs/functions.php"); 

    //$start = $conn->real_escape_string($_POST['start']);
    //$limit = $conn->real_escape_string($_POST['limit']);
    $start = strip_tags($_POST['start']);
    $limit = strip_tags($_POST['limit']);


    //$sql = $conn->query("SELECT car_name FROM car_used WHERE add_date LIKE '2023%' LIMIT $start, $limit");
    $qs = mysqli_query($con,"SELECT * FROM car_used WHERE status=1 ORDER BY car_id DESC LIMIT $start, $limit");
    $n = mysqli_num_rows($qs);

    if ($n > 0) {
        $response = "";
        while ($rs = mysqli_fetch_array($qs)) {

    $car_id=$rs['car_id'];
    $user_id=$rs['user_id'];
    $user_type_id = get_info("car_users","type_id","WHERE user_id=$user_id");
    $location_id=$rs['location_id'];
    $car_name=$rs['car_name'];
    $car_slug=$rs['car_slug'];
    $condition_id=$rs['condition_id'];
    $condition_name=get_info('car_conditions','condition_name',"WHERE condition_id=$condition_id");
    $brand_id=$rs['brand_id'];
    $brand_name=get_info('car_brands','brand_name',"WHERE brand_id=$brand_id");
    $engine_cc=$rs['engine_cc'];
    $km_run=$rs['km_run'];
    $car_price=number_format_bd($rs['car_price']);
    $car_price_negotiable=$rs['car_price_negotiable'];
    if($car_price_negotiable==1){$price_nego="<small> (negotiable) </small>";}else{$price_nego="";}
    $add_date=$rs['add_date'];
    $car_photo = get_info("car_used_photo","photo_name","WHERE car_id=$car_id ORDER BY photo_id ASC LIMIT 1");
    $seller_name = get_info('car_persons','person_name',"WHERE user_id=$user_id");

    $parent_id=get_info('car_locations','parent_id',"WHERE location_id=$location_id");
    $location_name=get_info('car_locations','location_name',"WHERE location_id=$location_id");
    $parent_location=get_info('car_locations','location_name',"WHERE location_id=$parent_id");


$response .= '
        <div class="row" style=" margin: 0 2px 10px 2px; padding: 2px; border: 1px solid #ccc; background: #fefefe;">

        <div class="col-sm-2">
        <a href="'.$site_url.'/used-car/'.$car_slug.'/">
        <img class="thumbnail" style="width:100%;" src="'.$site_url.'/images/users/'.$user_id.'/'.$car_photo.'">
        </a></div>

        <div class="col-sm-8">

    		<h2>
            <a href="'.$site_url.'/used-car/'.$car_slug.'/" class="p-title" >
            '.$car_name.'</a></h2>
             Added by: '.$seller_name.'<br>



                From: '.$location_name.', '.$parent_location.'
                <br><br>

                Condition: '.$condition_name.'<br>
                Brand: '.$brand_name.'<br>
                Engine cc: '.$engine_cc.'<br>
                KM Run: '.$km_run.'<br>
                Date: '.$add_date.'

            </div>




            <div class="col-sm-2">
            <b>Price: Tk '.$car_price.'</b><br>'.$price_nego.'<br><br>
            <a href="'.$site_url.'/used-car/'.$car_slug.'/"><button class="btn btn-success btn-block">Details</button></a>
            </div>


</div>      
</div>
            ';
        }


        exit($response);
    } else {
        exit('reachedMax');
    }
}
?>

