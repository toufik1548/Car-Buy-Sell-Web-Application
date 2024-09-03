<?php include("search_form.php"); ?>
<?php
	$item = router();
	$slug = uri_segment(slug_position());

							/*brands*/

	if($item == "brand"){include("brand.php");}
	elseif($item =="page"  && $slug== "brands"){include("brands.php");}

							/*showroom*/
	if($item == "showroom"){include("showroom.php");}
	elseif($item == "usedc" && $slug=="showrooms"){include("showrooms.php");}

							/*news*/
	elseif($item == "usedc" && $slug== "news"){include("news.php");}
	elseif($item == "news-en"){include("news_details.php");}
	elseif($item == "news-bn"){include("news_details_bn.php");}

							/*tips*/
	elseif($item == "usedc" && $slug== "tips"){include("tips.php");}
	elseif($item == "tips-en"){include("tips_details.php");}
	elseif($item == "tips-bn"){include("tips_details_bn.php");}

						/*new car*/
	elseif($item == "newc" && $slug== "new"){include("new.php");}
	elseif($item == "new-car"){include("new-car.php");}

						/*used car*/
	elseif($item =="used"){include("used.php");}
	elseif($item == "used-car"){include("used_car.php");}
	elseif($item == "page" && $slug== "car-add"){include("user_car_add.php");}
	elseif($item == "car-photo-upload"){include("user_car_photo_upload.php");}
	elseif($item == "car-edit"){include("user_car_edit.php");}
	elseif($item == "car-status-edit"){include("user_car_status_edit.php");}

						/*compare*/
	elseif($item == "page" && $slug== "compare"){include("compare.php");}
	elseif($item == "compares"){include("compare_by_features.php");}
	elseif($item == "specs"){include("new-car.php");}

	elseif($item == "page" && $slug== "login"){include("login.php");}
	elseif($item == "page" && $slug== "signup"){include("signup.php");}
	elseif($item == "page" && $slug== "logout"){include("logout.php");}
	elseif($item == "page" && $slug== "password-recovery"){include("password_recovery.php");}
	elseif($item == "page" && $slug== "dashboard"){include("user_dashboard.php");}
	elseif($item == "page" && $slug== "user-showroom-edit"){include("user_showroom_edit.php");}
	elseif($item == "page" && $slug== "profile-edit"){include("user_profile_edit.php");}
	elseif($item == "page" && $slug== "change-password"){include("user_change_password.php");}
		elseif($item == "page" && $slug== "help-center"){include("help_center.php");}

	elseif($item == "page" && $slug=="sitemap"){include("sitemap.php");}
	
	else{include("welcome.php");}
?>