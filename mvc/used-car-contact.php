 <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  View Number
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
  
<b>Seller Mobile Number Request</b>


      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

<div class="alert alert-success" role="alert">
  <b>সেলার এর ফোন নম্বরটি আপনার এসএমএস এ প্রেরন করা হবে</b>
</div>


  <!-- This is Insert Query Start -->

            <?php
if(isset($_POST['action'])&&$_POST['action']=="Submit")
{

$request_id = trim(addslashes($_POST["request_id"])); 
$car_id = trim(addslashes($_POST["car_id"]));
$buyer_name = addslashes($_POST['buyer_name']);
$buyer_mobile = addslashes($_POST['buyer_mobile']);
$add_date = date('Y-m-d');
//Display error msg

  $err=array();
  if($buyer_name=='')
    { $err[]="<font color='red'>*** Please Enter  Your <b>Name</b></font>";}
   

  if($buyer_mobile=='')
    { $err[]="<font color='red'>*** Please enter your <b>Mobile Number</b>.</font>";}
if(strlen($buyer_mobile)<11) 
    { $err[]="<font color='red'>*** Mobile number should be 11 Digit.</font>";}

  if( substr($buyer_mobile, 0, 1) !=0   || substr($buyer_mobile, 0, 1) =="+" || substr($buyer_mobile, 0, 1) =="8")

      { $err[]="<font color='red'>*** Mobile number should be Start With <b> 0 </b>.</font>";}

  $n= count($err);


if($n>0)
  {
  echo "<div class=err_msg><ol>";

  for($i=0;$i<$n;$i++)
      { echo "".$err[$i]."<br>"; }
  echo "</ol></div>";

  }
else
  {
$q=mysqli_query($con,"INSERT INTO `car_contact_request` (
  `request_id`, 
  `car_id`, 
  `buyer_name`,
  `buyer_mobile`,
     `add_date`) 

VALUES (
  NULL, 
  '$car_id', 
  '$buyer_name',
  '$buyer_mobile',
  '$add_date');");

if($q)
{

echo "<div class='alert alert-success alert-dismissible' role='alert'>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  <b>Successfully Submited ! Please check your Mobile SMS</b>
</div>";



//SMS Sent Start


$seller_mobile=get_info('car_users','user_mobile',"WHERE user_id=$user_id");
    $contact = $buyer_mobile;
    $url = "https://sms.notify.info.bd/sms/api/SendSMS";
    $api_key = "94F7CAD5206D4F1681ED8B0E5347653";
    $sender_id = $sms_sender_number; //"8809601001019";//"8809610991236";

    $text = "Seller name: $seller_name \n\n Seller Phone: $seller_mobile \n \n Thanks \n\n www.deshicar.com";
    $text2 = "Your car want to buy Mr. $buyer_name $buyer_mobile  \n \n www.deshicar.com";

    $full_url1 = "$url?api_key=$api_key&sender_id=$sender_id&contact=$contact&text=$text";
    $full_url2 = "$url?api_key=$api_key&sender_id=$sender_id&contact=$seller_mobile&text=$text2";


for($a=1;$a<3;$a++){
    echo "<iframe src=\"${'full_url'.$a}\" style=\"border:0px solid red; height:0px; width: 0xp;\" title=\"Iframe Example\"></iframe>";   
}




//SMS Sent End



}
else
{
echo "<div class='alert alert-danger alert-dismissible' role='alert'>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  Sorry!!! Failed To Your Request! Please Try Again...
</div>";
}

}//end if no err

}//end while
?>

<script>
function validateForm() {
  let x = document.forms["myForm"]["buyer_name"].value;
  let n = document.forms["myForm"]["buyer_mobile"].value;

  let y=n.length;
let z=n.charAt(0);

  
  if (x == "") {
    alert("Name must be filled out");
    return false;
  }
  
  if (y != 11) {
    alert("Mobile number must be 11 Digit");
    return false;
  }
 
    if (z != 0) {
    alert("Mobile number start with number 0");
    return false;
  }
  
  
}
</script>




<form method="post" action=" " name="myForm" onsubmit="return validateForm()" >



   <div class="form-group">
      <label for="buyer_name">Your Name<small style="color:red">*</small></label>
    <input type="text" name="buyer_name" class="form-control" placeholder=" Write Your Name In English  " maxlength="100">
</div>

<input type="hidden" name="car_id" value=" <?php echo $car_id ?> ">

<div class="form-group">
<label for="buyer_mobile">Mobile Number<small style="color:red">*</small></label>
<input type="text" name="buyer_mobile" class="form-control" placeholder="Write Your Mobile Number ( Only 11 Digit WithOut +88) " maxlength="11">
</div>
  <input type="submit"  name="action" value="Submit" class="btn-primary">
</form>




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>