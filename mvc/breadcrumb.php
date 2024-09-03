<?php
if($item == "page")
  {
  $slug_position = slug_position();
  $slug = uri_segment($slug_position[0]);
  $page_title = get_info("shop_pages","page_title","page_slug='".$slug."'");
  
  $breadcrumb = "<ol class='breadcrumb'><li><a href='".site_url()."'>Home</a></li>";
  $breadcrumb .= "<li class='active'> $page_title</li>";
  $breadcrumb .= "</ol>";
  }
elseif($item == "category")
  {
   $slug_position = slug_position();
  $slug = uri_segment($slug_position[0]);
  $category_name = get_info("shop_categories","category_name","category_slug='".$slug."'");
  
  $breadcrumb = "<ol class='breadcrumb'><li><a href='".site_url()."'>Home</a></li>";
  $breadcrumb .= "<li class='active'> $category_name</li>";
  $breadcrumb .= "</ol>";
  }
elseif($item == "brand")
  {
   $slug_position = slug_position();
  $slug = uri_segment($slug_position[0]);
  $brand_name = get_info("car_brands","brand_name","brand_slug='".$slug."'");
  
  $breadcrumb = "<ol class='breadcrumb'><li><a href='".site_url()."'>Home</a></li>";
  $breadcrumb .= "<li class='active'> $brand_name</li>";
  $breadcrumb .= "</ol>";
  }  

elseif($item == "body-type")
  {
  $slug_position = slug_position();
  $slug = uri_segment($slug_position[0]);
  $type_name = get_info("car_types","type_name","type_slug='".$slug."'");
  
  $breadcrumb = "<ol class='breadcrumb'><li><a href='".site_url()."'>Home</a></li>";
  $breadcrumb .= "<li class='active'> $type_name</li>";
  $breadcrumb .= "</ol>";
  } 
  elseif($item == "search")
  {
   $slug_position = slug_position();
  $slug = uri_segment($slug_position[0]);
    
  $breadcrumb = "<ol class='breadcrumb'><li><a href='".site_url()."'>Home</a></li>";
  $breadcrumb .= "<li class='active'>Search</li>";
  $breadcrumb .= "</ol>";
  }

  elseif($item == "product")
  {
  $slug_position = slug_position();
  $slug = uri_segment($slug_position[0]);
  $product_name = get_info("shop_products","product_name","product_slug='".$slug."'");
  $category_name = get_info("shop_categories","category_name","category_id=".get_info("shop_products","category_id","product_slug='".$slug."'"));
  $category_slug = get_info("shop_categories","category_slug","category_id=".get_info("shop_products","category_id","product_slug='".$slug."'"));
  $brand_name = get_info("shop_brands","brand_name","brand_id=".get_info("shop_products","brand_id","product_slug='".$slug."'"));
  $brand_slug = get_info("shop_brands","brand_slug","brand_id=".get_info("shop_products","brand_id","product_slug='".$slug."'"));
  
  
  $breadcrumb = "<ol class='breadcrumb'><li><a href='".site_url()."'>Home</a></li>";
  $breadcrumb .= "<li><a href='".site_url()."/".$category_slug."'>$category_name</a></li>";
  $breadcrumb .= "<li><a href='".site_url()."/".$brand_slug."'> $brand_name</a></li>";
  $breadcrumb .= "<li class='active'> $product_name</li>";
  $breadcrumb .= "</ol>";
  } 

  elseif($item == "showroom")
  {
  $slug_position = slug_position();
  $slug = uri_segment($slug_position[0]);
  $showroom_id = get_info("shop_showrooms","showroom_id","showroom_slug='".$slug."'");
  $showroom_name = get_info("shop_showrooms","showroom_name","showroom_slug='".$slug."'");
 
  $breadcrumb = "<ol class='breadcrumb'><li><a href='".site_url()."'>Home</a></li>";
  $breadcrumb .= "<li><a href='".site_url()."/showrooms/'>Showrooms</a></li>";
  $breadcrumb .= "<li class='active'>$showroom_name</li>";
  $breadcrumb .= "</ol>";
  }


  echo isset($breadcrumb) ? $breadcrumb : '';
  ?>

