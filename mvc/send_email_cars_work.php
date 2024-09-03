<!--<div id="title">Links</div>
<div id="area">-->
<?php
$q = mysqli_query($con,"SELECT * FROM car_used WHERE user_id='$sess_user_id' AND status<4");
$r=mysqli_fetch_array($q);

$e_user_id=$r['user_id'];
$e_user_email  = get_info("car_users","user_email","WHERE user_id=$e_user_id");

?>


<?php
$car_price 	=array();
$engine_cc	=array();
$km_run		=array();
$q = mysqli_query($con,"SELECT * FROM car_used WHERE user_id='$sess_user_id' AND status<4");
while($r=mysqli_fetch_array($q)){
	$car_price[]=$r['car_price'];
	$engine_cc[]=$r['engine_cc'];
	$km_run[]	=$r['km_run'];
}
$car_price=implode(',', $car_price);
$car_price=explode(',', $car_price);
$max_car_price=max($car_price);
$min_car_price=min($car_price);


$engine_cc=implode(',', $engine_cc);
$engine_cc=explode(',', $engine_cc);
$max_engine_cc=max($engine_cc);
$min_engine_cc=min($engine_cc);


$km_run=implode(',', $km_run);
$km_run=explode(',', $km_run);
$max_km_run=max($km_run);
$min_km_run=min($km_run);


$q1 = mysqli_query($con,"SELECT * FROM car_used WHERE user_id='$sess_user_id' AND status<4");
$r1=mysqli_fetch_array($q1);

//while($r1=mysqli_fetch_array($q1)){
$car_id 		= 	$r1['car_id'];
$car_name 		= 	$r1['car_name'];
$add_date 		=	$r1['add_date'];
//$car_price 		=	$r1['car_price'];
$user_id 		= 	$r1['user_id'];

//

$location_id 	= 	$r1['location_id'];
 

$parent_id = get_info("car_locations","parent_id","WHERE location_id=$location_id");

$locations = "";
$ql = mysqli_query($con,"SELECT location_id FROM car_locations WHERE parent_id=$parent_id");
while($rl=mysqli_fetch_assoc($ql)){
$locations .= "location_id=".$rl['location_id']." OR ";
}
$locations = substr($locations, 0, -3);



$brand = "";
$ql = mysqli_query($con,"SELECT * FROM car_used WHERE user_id='$sess_user_id' AND status<4 GROUP BY brand_id");
while($rl=mysqli_fetch_assoc($ql)){
$brand .= "brand_id=".$rl['brand_id']." OR ";
}
$brand = substr($brand, 0, -3);




$price_min			=	$min_car_price;
$price_max			=	$max_car_price;



$price="AND car_price between $price_min AND $price_max";
$car_engine_cc="AND engine_cc between $min_engine_cc AND $max_engine_cc";
$car_km_run="AND km_run between $min_km_run AND $max_km_run";
$sort="ORDER BY car_price ASC";

//$cond="$brand $price AND ($locations)";
$user_id ="AND user_id !=$user_id";
$cond="AND ($brand) $user_id $price $car_engine_cc $car_km_run AND ($locations)";
$sort="$sort";
$limit="LIMIT 100";

//include("links.php"); 

?>

<!--</div>-->



<?php

if ($e_user_id==$sess_user_id){


$to      = $e_user_email; // Send email to our user
$subject = 'Deshicar.com'; // Give the email a subject 
/*$message = "
<pre>
 ".include("links.php")."
</pre>
";*/ // Our message

$message .="<div style='background-color:#ddd; border:1px solid #AAB1BB;padding:5px;border-radius:5px;'>";
$message .="<div style='text-align: center;font-weight: 700;font-size: 25px; padding-bottom:10px;color:#AE201C;'>Deshicar.com</div>";
$message .="<div style='background-color:#fff;padding:10px 10px 5px 10px;border-radius:5px;'>";
$quc = mysqli_query($con,"SELECT * FROM car_used WHERE status=1 $cond $sort $limit");
while($ruc=mysqli_fetch_array($quc)){
	$e_location_id=$ruc['location_id'];
	$e_parent_id=get_info("car_locations","parent_id","WHERE location_id=$e_location_id");
$message .= "<div style='border:1px solid #C8D8E8; background-color:#CBE5FE; border-radius:5px; padding:10px;margin-bottom:10px;'>
	<table>
		<tr>
			<td><b>Car name</b></td>
			<td><b>:</b></td>
			<td><a href=".$site_url."/used-car/".$ruc['car_slug'].">".$ruc['car_name']."</a></td>
		</tr>
		<tr>
			<td><b>Price</b></td>
			<td><b>:</b></td>
			<td>".number_format($ruc['car_price'],.2).".00tk</td>
		</tr>
		<tr>
			<td><b>Address</b></td>
			<td><b>:</b></td>
			<td> ".get_info("car_locations","location_name","WHERE location_id=$e_parent_id").", ".get_info("car_locations","location_name","WHERE location_id=$e_location_id")."</td>
		</tr>
	</table>
</div>";
}
$message .="</div></div>";
                     
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: Deshicar.com used car<info@deshicar.com>";
$headers .= "Reply-To: $to\r\n"."X-Mailer: PHP/" . phpversion();



/*$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
$headers .= "From: successive.testing@gmail.com" . "\r\n" .
"Reply-To: successive.testing@gmail.com" . "\r\n" .
"X-Mailer: PHP/" . phpversion();*/

mail($to, $subject, $message, $headers); // Send our email

//CLEAR DATA FOR USER
$e_user_email="";

}

else{ 
  echo "";
}


/*$message = "
<pre>
 ".include("links.php")."
</pre>
"; */

?>
