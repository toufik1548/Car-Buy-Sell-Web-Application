<a href="<?php echo $cp_url; ?>/temp-agents/">Agents</a>
<h1>Showrooms</h1>

<?php
if(isset($_POST['Submit']))
	{

		$showroom_name			=	addslashes(trim($_POST['showroom_name']));
		$showroom_address		=	addslashes(trim($_POST['showroom_address']));
		$location_id				=	$_POST['location_id'];
		$showroom_mobile		=	trim($_POST['showroom_mobile']);
		$showroom_phones		= $_POST['showroom_phones'];
		$showroom_email			=	trim($_POST['showroom_email']);
		$showroom_url				=	trim($_POST['showroom_url']);
		$showroom_facebook	=	trim($_POST['showroom_facebook']);
		$add_date						=	date("Y-m-d");
		$status							=	1;

//Display error msg

	$err=array();

	if($showroom_name=='')
		{ $err[]="Please type name";}
	if($showroom_address=='')
		{ $err[]="Please type address";}
		if($location_id==0)
		{ $err[]="Please select location";}
		if($showroom_mobile=='')
		{ $err[]="Please type 11 digit mobile number";}
	$n=	count($err);


if($n>0)
	{
	echo "<div class=\"alert alert-danger\" role=\"alert\"><ol>";

	for($i=0;$i<$n;$i++)
			{ echo "<li>".$err[$i]."</li>"; }
	echo "</ol></div>";

	}
else
	{


	$query=mysqli_query($con,"INSERT INTO `temp_showrooms` (
`showroom_id` ,
`showroom_name` ,
`showroom_address` ,
`location_id` ,
`showroom_mobile` ,
`showroom_phones` ,
`showroom_email` ,
`showroom_url` ,
`showroom_facebook` ,
`add_date` ,
`status`
)
VALUES (
NULL , '$showroom_name','$showroom_address','$location_id','$showroom_mobile','$showroom_phones','$showroom_email','$showroom_url','$showroom_facebook','$add_date','$status'
)");

	
		if($query)	{


									//SMS Sent Start
									    $contact = $showroom_mobile;
									    $url = "https://sms.notify.info.bd/sms/api/SendSMS";
									    $api_key = "94F7CAD5206D4F1681ED8B0E5347653";
									    $sender_id = $sms_sender_number; //"8809610991236";//"8809610991236";

									    $text = "Dear $showroom_name, \n\n Sell your car fast and easy at www.deshicar.com";

									    $full_url1 = "$url?api_key=$api_key&sender_id=$sender_id&contact=$contact&text=$text";
									    $full_url2 = "$url?api_key=$api_key&sender_id=$sender_id&contact=$site_sms&text=$text";

									    
									    //$full_url2 = "$url?api_key=$api_key&sender_id=$sender_id&contact=$seller_mobile&text=$text2";


									for($a=1;$a<=2;$a++){
									    echo "<iframe src=\"${'full_url'.$a}\" style=\"border:0px solid red; height:0px; width: 0xp;\" title=\"Iframe Example\"></iframe>";   
									}

									//SMS Sent End


				echo "<div class=\"alert alert-success\" role=\"alert\">Record added successfully</div>";
						}//end of IF Submit
			else
					{
					echo "<div class=\"alert alert-danger\" role=\"alert\">Sorry, Failed to add Record</div>";
					} //end of else

	}//end of else if no err
	}// end of IF Submit
?>




  <form name="form1" method="post" action="" enctype="multipart/form-data">

  <table class="table table-striped table-bordered" width="100%">


    <tr>
      <td class="td" width="15%"><b>Name</b></td>
      <td><input name="showroom_name" type="text" class="form-control" width="100%" required=""></td>
    </tr>

    <tr>
      <td class="td" width="15%"><b>Address</b></td>
      <td><input name="showroom_address" type="text" class="form-control" width="100%" required=""></td>
    </tr>

    <tr>
      <td class="td" width="15%"><b>Location</b></td>
      <td>
<select name="location_id">
	<option value="0">Location</option>
<?php
$ql = mysqli_query($con,"SELECT * FROM car_locations WHERE parent_id=0 ORDER BY location_name ASC");
while($rl=mysqli_fetch_assoc($ql)){
?>
<option value="<?php echo $rl["location_id"]; ?>"
<?php if(isset($_POST["location_id"]) && $_POST["location_id"]==$rl["location_id"]){echo " selected";}?>
	><?php echo $rl["location_name"]; ?></option>
<?php } ?>
</select>
      </td>
    </tr>

    <tr>
      <td class="td" width="15%"><b>Mobile-11 Digits</b></td>
      <td><input name="showroom_mobile" type="text" class="form-control" width="100%" maxlength="11" required></td>
    </tr>

    <tr>
      <td class="td" width="15%"><b>Phones</b></td>
      <td><input name="showroom_phones" type="text" class="form-control" width="100%"></td>
    </tr>

    <tr>
      <td class="td" width="15%"><b>Email</b></td>
      <td><input name="showroom_email" type="email" class="form-control" width="100%"></td>
    </tr>
    <tr>
      <td class="td" width="15%"><b>Web</b></td>
      <td><input name="showroom_url" type="text" class="form-control" width="100%"></td>
    </tr>
        <tr>
      <td class="td" width="15%"><b>Facebook</b></td>
      <td><input name="showroom_facebook" type="text" class="form-control" width="100%"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="SUBMIT" class="btn btn-primary btn-sm" style="width:200px"></td>
    </tr>

  </table>

  </form>
<?php echo get_total("temp_showrooms","showroom_id", ""); ?>
<table class="table">
	<tr>
		<td>Name</td><td>Address</td><td>Location</td><td>Mobile</td><td>Email</td><td>Add Date</td>
	</tr>
<?php 
$q = mysqli_query($con,"SELECT * FROM temp_showrooms ORDER BY showroom_id DESC LIMIT 20");
while($r = mysqli_fetch_assoc($q)){
?>
	<tr>
		<td><?php echo $r["showroom_name"]; ?></td><td><?php echo $r["showroom_address"]; ?></td><td><?php echo get_info("car_locations","location_name","WHERE location_id=".$r["location_id"]); ?></td><td><?php echo $r["showroom_mobile"]; ?></td><td><?php echo $r["showroom_email"]; ?></td><td><?php echo $r["add_date"]; ?></td>
	</tr>
<?php } ?>
</table>