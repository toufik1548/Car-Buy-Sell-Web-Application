	<?php 

if($slug == "brand")
	{
	$brand_id = get_info("car_brands","brand_id","WHERE brand_slug='".$slug2."'");
	$brand_name = get_info("car_brands","brand_name","WHERE brand_id=".$brand_id);


	$title			=	"$brand_name car price in Bangladesh. $brand_name reconditioned car price in Dhaka. DeshiCar.com";
	$description 	=	"$brand_name cars price in Bangladesh. $brand_name used/second hand cars list. Get a complete price list of $brand_name cars, read expert reviews, specs, see images, & dealers at DeshiCar.com";
	$keywords		=	"$brand_name car price, used car, second hand car, car price";
	}
elseif($slug == "model")
	{
	$model_id = get_info("car_models","model_id","WHERE model_slug='".$slug2."'");
	$model_name = get_info("car_models","model_name","WHERE model_id='".$model_id."'");
	$brand_id = get_info("car_models","brand_id","WHERE model_id='".$model_id."'");
	$brand_name = get_info("car_brands","brand_name","WHERE brand_id=".$brand_id);


	$title			=	"$brand_name $model_name car price in Bangladesh. DeshiCar.com";
	$description 	=	"$brand_name $model_name cars price in Bangladesh. $model_name used/second hand cars list. Get a complete price list of $brand_name $model_name cars, read expert reviews, specs, see images, & dealers at DeshiCar.com";
	$keywords		=	"$brand_name car price, $model_name used car, second hand car, car price";
	}
elseif($slug == "showroom")
	{
	$showroom_id = get_info("car_showrooms","showroom_id","WHERE showroom_slug='".$slug2."'");
	$showroom_name = get_info("car_showrooms","showroom_name","WHERE showroom_id=$showroom_id");
	$showroom_photo = get_info("car_showrooms","showroom_photo","WHERE showroom_id=$showroom_id");
	$user_id = get_info("car_showrooms","user_id","WHERE showroom_id=$showroom_id");

	$title			=	"$showroom_name. Car Showroom Bangladesh. Bangladesh car showroom website, Recondition car dealer. DeshiCar.com";
	$description 	=	"$showroom_name car Bangladesh. Bangladesh car showroom website, Recondition car showroom. Deshicar.com";
	$keywords		=	"$showroom_name, car dealer, car showroom, deshicar.com";

	$og_title	=	$title;
	$og_description = $description; 
	$og_image= $site_url."/images/showrooms/".$showroom_photo;

	}

elseif($slug == "location")
	{

	$location_id = get_info("car_locations","location_id","WHERE location_slug='".$slug2."'");
	$location_name = get_info("car_locations","location_name","WHERE location_id=".$location_id);
	
	$parent_location_id = get_info("car_locations","parent_id","WHERE location_slug='".$slug2."'");
	$parent_location_name = get_info("car_locations","location_name","WHERE location_id=".$parent_location_id);

			if($parent_location_id==0){
				//dhaka
			$title			=	"Used car $location_name. DeshiCar.com";
			$description 	=	"Used cars $location_name, Bangladesh. Car price in $location_name. Car Dealers/Showrooms at $location_name, Bangladesh. DeshiCar.com";
			$keywords		=	"$location_name, car price, car dealer, car showrooms, used car, second hand car, car price, deshicar.com";
			}else{
				//uttara,dhaka
				$title			=	"Used car $location_name, $parent_location_name. DeshiCar.com";
			$description 	=	"Used cars $location_name,$parent_location_name Bangladesh. Car price in $location_name. Car Dealers/Showrooms at $location_name, Bangladesh. DeshiCar.com";
			$keywords		=	"$location_name,$parent_location_name car price, car dealer, car showrooms, used car, second hand car, car price, deshicar.com";
			}


	$og_title	=	$title;
	$og_description = $description; 
	$og_image=$site_url."/images/deshicar.logo.jpg";
	}
	
elseif($slug == "used-car")
	{
	$car_id = get_info("car_used","car_id","WHERE car_slug='".$slug2."'");
	$car_name = get_info("car_used","car_name","WHERE car_id=".$car_id);
	$brand_id = get_info("car_used","brand_id","WHERE car_id=".$car_id);
	$brand_name = get_info("car_brands","brand_name","WHERE brand_id=".$brand_id);
	$user_id = get_info("car_used","user_id","WHERE car_id=".$car_id);
	$car_photo = get_info("car_used_photo","photo_name","WHERE car_id=$car_id ORDER BY photo_id ASC LIMIT 1");

	$title			=	"$car_name car price in Bangladesh. Used car price. DeshiCar.com";
	$description 	=	"$car_name price in Bangladesh. $brand_name car showrooms Bangladesh. DeshiCar.com";
	$keywords		=	"$car_name, car price, used cars, car showrooms, car dealers";


	$og_title	=	$title;
	$og_description = $description; 
	$og_image= "$site_url/images/products/$car_photo";

	}

elseif($slug == "new-car")
	{
	$car_id = get_info("car_new","car_id","WHERE car_slug='".$slug2."'");
	$car_name = get_info("car_new","car_name","WHERE car_id=".$car_id);
	$brand_id = get_info("car_new","brand_id","WHERE car_id=".$car_id);
	$brand_name = get_info("car_brands","brand_name","WHERE brand_id=".$brand_id);
	$user_id = get_info("car_used","user_id","WHERE car_id=".$car_id);
	$car_photo = get_info("car_new_photos","photo_name","WHERE car_id=$car_id ORDER BY photo_id ASC LIMIT 1");

	$title			=	"$car_name price in Bangladesh. Car price in Bangladesh. $brand_name car Dealers. DeshiCar.com";
	$description 	=	"$car_name price in Bangladesh. $brand_name car showrooms Bangladesh. DeshiCar.com";
	$keywords		=	"$car_name, car price, used cars, car showrooms, car dealers";

	$og_title	=	$title;
	$og_description = $description; 
	$og_image= "$site_url/images/users/$user_id/$car_photo";

	}
elseif($slug == "compare")
	{
	$slugs = explode("-vs-", $slug2);
	$car_slug1=$slugs[0];
	$car_id1 = get_info("car_used","car_id","WHERE car_slug='".$car_slug1."'");
	$car_name1 = get_info("car_used","car_name","WHERE car_id=".$car_id1);
	$car_slug2=$slugs[1];
	$car_id2 = get_info("car_used","car_id","WHERE car_slug='".$car_slug2."'");
	$car_name2 = get_info("car_used","car_name","WHERE car_id=".$car_id2);
	$car_photo = get_info("car_used_photo","photo_name","WHERE car_id=$car_id1 ORDER BY photo_id ASC LIMIT 1");

	$title			=	"$car_name1 Vs $car_name2 Used car price in Bangladesh ".date("Y");
	$description 	=	"$car_name1 Vs $car_name2 comparison. DeshiCar.com";
	$keywords		=	"$car_name1 Vs $car_name2. compare cars, comparison, DeshiCar.com";


	$og_title	=	$title;
	$og_description = $description; 
	$og_image= "$site_url/images/products/$car_photo";

	}
elseif($slug == "post")
	{
	$post_title = get_info('car_posts','post_title',"WHERE post_id='".$slug2."'");
	$post_summary = get_info('car_posts','post_summary',"WHERE post_id='".$slug2."'");
	$post_photo = get_info('car_posts','post_photo',"WHERE post_id='".$slug2."'");
	
	$title			=	$post_title;
	$description 	=	$post_summary;
	$keywords		=	$post_title." car news, car price bd";

	$og_title	=	$title;
	$og_description = $description; 
	$og_image= "$site_url/images/media/$post_photo";	
	}	
elseif($slug == "tags")
	{
		if($slug2=="toyota-car-under-10-lakh-in-bangladesh"){
		$title			=	"Toyota car under 10 Lakh in Bangladesh";
		$description 	=	"Toyota used cars price under 10 lakh taka in Bangladesh";
		$keywords		=	"toyota car price, car price under 10 lakh taka, car price below ten lakh taka, deshicar.com";
		}

	$og_title	=	$title;
	$og_description = $description; 
	$og_image=$site_url."/images/deshicar.logo.jpg";
	}
else{
	$title			=	"Used car price in Bangladesh ".date("Y").". DeshiCar.com";
	$description 	=	"Thinking of buying a car? At DeshiCar.com, buy new and used cars, search by filter and preferences, compare cars, read latest news and updates.";
	$keywords		=	"used cars, sell cars, bikroy, recondition cars";
	$og_title	=	$title;
	$og_description = $description; 
	$og_image=$site_url."/images/deshicar.logo.jpg";	
	} 

	?>


	<title><?php echo $title; ?></title>
	
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $description; ?>" />
	<meta name="keywords" content="<?php echo $keywords; ?>" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta name="Googlebot" content="all" />
	<meta http-equiv="imagetoolbar" content="no" />
	<meta name="robots" content="index, follow" />
	<meta name="copyright" content="Copyright &copy; Deshicar.com" />
	<meta name="owner" content="Deshicar.com" />
	<meta name="author" content="Deshicar.com" />
	<meta name="revisit-after" content="1 days" />
	<meta name="Rating" content="General" />
	<meta name="distribution" content="Global" />


<?php if(isset($og_title)){?>
<meta property="og:title" content="<?php echo $og_title; ?>" />
<?php } ?>

<?php if(isset($og_description)){?>
<meta property="og:description" content="<?php echo $og_description; ?>"/>
<?php } ?>

<?php if(isset($og_image)){?>
<meta property="og:image" content="<?php echo $og_image; ?>"/>
<?php } ?>

  

    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="<?php echo $site_url; ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $site_url; ?>/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $site_url; ?>/css/style.css">


	<!-- jQuery library -->
	<script src="<?php echo $site_url; ?>/js/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="<?php echo $site_url; ?>/js/bootstrap.min.js"></script>

	<link href="<?php echo $site_url; ?>/images/favicon.ico" rel='icon' type='image/x-icon'/>