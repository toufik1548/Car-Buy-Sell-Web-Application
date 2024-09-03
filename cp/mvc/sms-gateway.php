<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-12">
<br>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../">Home</a></li>
  
    <li class="breadcrumb-item active" aria-current="page">Sms Gateway</li>
  </ol>
</nav>


<div class="card">
  <div class="card-header" align="center"><span class="badge badge-light"><h3>&nbsp; Sms Gateway  &nbsp;</h3></span></div>
  <div class="card-body">

<?php

//sms basic info
$url = "https://sms.notify.info.bd/sms/api/SendSMS";
$api_key = "94F7CAD5206D4F1681ED8B0E5347653";
$sender_id = $sms_sender_number;

if(isset($_POST["Submit"])){
	$phones = trim($_POST["phones"]);
	$phones = explode(",", $phones);
	$sms_text = $_POST["sms_text"];
	
	foreach ($phones as $phone) {
	$contact=trim($phone);
echo "<iframe src=\"$url?api_key=$api_key&sender_id=$sender_id&contact=$contact&text=$sms_text\" style=\"border:0px solid red; height:0px; width: 0xp;\" title=\"Iframe Example\"></iframe>";

	}//end foreach 
}//end submit

?>









  <form method="POST" action="">
  <table class="table table-striped table-bordered" width="100%">

  	<input type=hidden name=api_key value="94F7CAD5206D4F1681ED8B0E5347653">
<!-- OLD 8809610991236 -->
<!-- New 8809601001019 -->
<input type=hidden name=sender_id value="<?php echo $sms_sender_number; ?>">

    <tr>
      <td class="td" width="300"><b>Mobile Number</b><br>
      mobile numbers using comma separated (Example: 01700000000, 01711111111)</td>
      <td><textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="01700000000, 01711111111" name="phones"></textarea></td>
    </tr>

    <tr>
      <td class="td"><b>Message</b></td>
      <td>

      	<textarea maxlength="160" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter text here..." name="sms_text">Dear, Submit free car sale ad post at www.deshicar.com</textarea>
 

      </td>
    </tr>

    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="SUBMIT" class="btn btn-primary btn-sm" style="width:200px"></td>
    </tr>

  </table>

  </form>

      </div>
      <!--./card-body\-->
    </div>
    <!--./card\-->
	
    </div>
    <!--./col-lg-12\-->
  </div>
  <!--./row\-->
</div>
<!--./container\-->
<br>