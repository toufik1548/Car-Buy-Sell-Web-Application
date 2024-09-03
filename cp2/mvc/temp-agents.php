<h3 class="border p-2 mt-2 text-center">Agents</h3>

<?php
if (isset($_POST['Submit'])) {
    // Assuming $con is your database connection
    $agent_name = mysqli_real_escape_string($con, trim($_POST['agent_name']));
    $agent_mobile = trim($_POST['agent_mobile']);
    $agent_facebook = trim($_POST['agent_facebook']);
    $add_date = date("Y-m-d");

    // Validate mobile number
    $agent_mobile_validation = mobile_validation($agent_mobile);

    // Display error msg
    $err = array();

    if (strlen($agent_mobile_validation) != 11) {
        $err[] = "Type 11 Digits Mobile Number";
    }

    if (substr($agent_mobile_validation, 0, 2) != "01") {
        $err[] = "Mobile number should start with 01";
    }

    if ($agent_name == '') {
        $err[] = "Please type name";
    }

    $n = count($err);

    if ($n > 0) {
        echo "<div class=\"alert alert-danger\" role=\"alert\"><ol>";
        foreach ($err as $error) {
            echo "<li>" . $error . "</li>";
        }
        echo "</ol></div>";
    } else {
        $query = mysqli_query($con, "INSERT INTO `temp_agents` (
            `agent_id`,
            `agent_name`,
            `agent_mobile`,
            `agent_facebook`,
            `add_date`
        )
        VALUES (
            NULL, '$agent_name', '$agent_mobile_validation', '$agent_facebook', '$add_date')");

        if ($query) {
            // SMS Sent Start
            $contact = $agent_mobile_validation;
            $url = "https://sms.notify.info.bd/sms/api/SendSMS";
            $api_key = "94F7CAD5206D4F1681ED8B0E5347653";
            $sender_id = $sms_sender_number; //"8809610991236";//"8809610991236";
            $text = "Dear $agent_name, \n\n Sell your car fast, easy and FREE at www.deshicar.com";
            $full_url = "$url?api_key=$api_key&sender_id=$sender_id&contact=$contact&text=$text";

            echo "<iframe src=\"$full_url\" style=\"border:0px solid red; height:0px; width: 0xp;\" title=\"Iframe Example\"></iframe>";

            // SMS Sent End

            echo "<div class=\"alert alert-success\" role=\"alert\">Record added successfully</div>";
        } else {
            echo "<div class=\"alert alert-danger\" role=\"alert\">Sorry, Failed to add Record</div>";
        }
    }
}
?>


<form name="form1" method="post" action="" enctype="multipart/form-data">

    <table class="table table-striped table-bordered" width="100%">

        <tr>
            <td class="td" width="15%"><b>Name</b></td>
            <td><input name="agent_name" type="text" class="form-control" width="100%" required=""></td>
        </tr>

        <tr>
            <td class="td" width="15%"><b>Mobile-11 Digits</b></td>
            <td><input name="agent_mobile" type="text" class="form-control" width="100%" maxlength="18" required></td>
        </tr>
        <tr>
            <td class="td" width="15%"><b>Facebook</b></td>
            <td><input name="agent_facebook" type="text" class="form-control" width="100%"></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="Submit" value="SUBMIT" class="btn btn-primary btn-sm" style="width:200px"></td>
        </tr>

    </table>

</form>

<?php echo get_total("temp_agents", "agent_id", ""); ?>

<table class="table">
    <tr>
        <td>Name</td><td>Mobile</td><td>Facebook</td><td>Add Date</td>
    </tr>
    <?php
    $q = mysqli_query($con, "SELECT * FROM temp_agents ORDER BY agent_id DESC LIMIT 20");
    while ($r = mysqli_fetch_assoc($q)) {
        ?>
        <tr>
            <td><?php echo $r["agent_name"]; ?></td><td><?php echo $r["agent_mobile"]; ?></td><td><?php echo $r["agent_facebook"]; ?></td><td><?php echo $r["add_date"]; ?></td>
        </tr>
    <?php } ?>
</table>