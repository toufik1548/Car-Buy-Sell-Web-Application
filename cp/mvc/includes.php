<?php
if(isset($slug) && $slug!="")
	{include($slug.".php");}
else{include("welcome.php");}

?>