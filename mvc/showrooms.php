<div id="title"><i class="fa fa-car" style='color:#A02021'></i> Car Showrooms</div>
<div id="area">
<span style="float:right; padding-right:10px;"><?php include("fb_share.php"); ?></span><br><br>
<?php 
$cond = "";
$sort = "ORDER BY showroom_name ASC";
$limit = "LIMIT 100";
include("showroom_list.php"); ?>

</div
