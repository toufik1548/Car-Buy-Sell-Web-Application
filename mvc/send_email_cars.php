<!--<div id="title">Links</div>
<div id="area">-->
<?php

//echo $s_e_car_id;

$q = mysqli_query($con,"SELECT * FROM car_used WHERE car_id = $s_e_car_id AND status=1");
$r=mysqli_fetch_array($q);
$used_car_id	=	$r['car_id'];
$brand_id 	 	=	$r['brand_id'];
$location_id 	=	$r['location_id']; 
$car_price   	=	$r['car_price']; 
$type_id 	 	=	$r['type_id']; 
$km_run 	 	=	$r['km_run']; 

$location_parent_id = get_info("car_locations","parent_id","WHERE location_id=$location_id");
//echo "//".$location_parent_id."//";
//echo $user_id;
?>


<?php

$car_id_c="AND car_id=$used_car_id";

$cond="$car_id_c";
$sort="";
$limit="";

//include("links.php"); 

?>

<!--</div>-->


<!--<div id="title">Search</div>
<div id="area">-->
<?php	
$buffer_ui=array();
$q = mysqli_query($con,"SELECT * FROM car_reminder WHERE status=1");
while($r=mysqli_fetch_array($q)){
	$reminder_id 	=	$r['reminder_id'];
	$user_id 		= 	$r['user_id']; 
	$b_id	 		= 	$r['brand_ids'];
	$l_id  			= 	$r['location_ids']; 
	$min_car_price 	=	$r['min_price'];
	$max_car_price 	=	$r['max_price'];
	$r_type_id 		= 	$r['type_id'];


	$brands = explode(',',$b_id);
	$ti =	count($brands);
//echo "..".$ti."..";
	$brand = "";
	for($i=0;$i<$ti;$i++){
	
		$brand = $brands[$i];
		if($brand==10){
			$r_brand=$brand;
			//echo $reminder_id."<br>";
			$b_u_id		=	$user_id;

		}
	}

	$loca = explode(',',$l_id);
	$tlo    =	count($loca);
//	echo "<br>..".$tlo."..<br>";
	$location = "";
	for($i=0;$i<$tlo;$i++){
		$location = $loca[$i];
		if($location==4){
			$r_location=$location;
			$location_u_id		=	$user_id;
		}
		
	}

//	if(($min_car_price<=$car_price)&&($max_car_price>=$car_price)){

	if($min_car_price<=$car_price){

	$price_min		=	$min_car_price;
//	$price_max		=	$max_car_price;
	$price_min_u_id		=	$user_id;
	//echo $price_min_u_id;	
	}

	if($max_car_price>=$car_price){
	$price_max		=	$max_car_price;
	$price_max_u_id		=	$user_id;
	}
	if($r_type_id==$type_id){

		$rr_type_id		=	$type_id;
		$type_u_id		=	$user_id;

	}

	 
	if (($user_id==$b_u_id)&&($user_id==$location_u_id)&&($user_id==$price_min_u_id)&&($user_id==$price_max_u_id)&&($user_id==$type_u_id)) {
	
		$buffer_ui[]=$user_id;
	/*	echo "<br>brands:".$r_brand;
		echo "<br>p-l:".$r_location;
		echo "<br>p-m:".$price_min;
		echo "<br>p-max:".$price_max;
		echo "<br>t:".$rr_type_id;*/
	}

}
//echo $car_price;
$buffer_ui=implode(',', $buffer_ui);
$buffer_ui=explode(',', $buffer_ui);

$t_ui    =	count($buffer_ui);

//echo "<br>".$buffer_ui[1];

$buffer_un=array();

$qu=mysqli_query($con,"SELECT * FROM car_users WHERE status=1");
while ($ru=mysqli_fetch_array($qu)) {
	$user_id=$ru['user_id'];
	$user_email=$ru['user_email'];
	for($i=0;$i<$t_ui;$i++){
			if($buffer_ui[$i]==$user_id){
				$buffer_un[]=$user_email;
				//echo $user_email;
			}
		}


}
$buffer_un=implode(',', $buffer_un);
$buffer_une=explode(',', $buffer_un);
$tn=count($buffer_une);
//echo $buffer_une[1];
?>


<?php

if ($tn>=1){


//$to      = $buffer_un; // Send email to our user
for($n=0;$n<$tn;$n++){
$to = $buffer_une[$n];
/*echo "<br>".$to;
}*/

$subject = 'Deshicar.com'; // Give the email a subject 


$message .="<div style='background-color:#ddd; border:1px solid #AAB1BB;padding:5px;border-radius:5px;'>";
$message .="<div style='text-align: center;font-weight: 700;font-size: 25px; padding-bottom:10px;color:#AE201C;'>Deshicar.com</div>";
$message .="<div style='background-color:#fff;padding:10px 10px 1px 10px;border-radius:5px;'>";
$message .="<div style='border:1px solid #C8D8E8; background-color:#CBE5FE; border-radius:5px; padding:10px;margin-bottom:10px;'>
Dear Customer, <br>
Your preferable car is available now at deshicar.com. To get details. Please visit following links:<br><br>";
$quc = mysqli_query($con,"SELECT * FROM car_used WHERE status=1 $cond $sort $limit");
while($ruc=mysqli_fetch_array($quc)){
	$e_location_id=$ruc['location_id'];
	$e_parent_id=get_info("car_locations","parent_id","WHERE location_id=$e_location_id");
$message .= "
	<table>
		<tr>
			<td><b>Click here: </b></td>
			<td><b>:</b></td>
			<td><a href=".$site_url."/used-car/".$ruc['car_slug'].">".$ruc['car_name']."</a></td>
		</tr>
	</table>
";
$message .="<br><br>Deshicar Team";
}
$message .="</div></div></div>";
                     
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: Deshicar.com used car<info@deshicar.com>";
$headers .= "Reply-To: info@deshicar.com\r\n"."X-Mailer: PHP/" . phpversion();


mail($to, $subject, $message, $headers); // Send our email

//CLEAR DATA FOR USER
$e_user_email="";

	}//end for loop
}

else{ 
  echo "<div id='title'>Not send email!</div>";
}
?>