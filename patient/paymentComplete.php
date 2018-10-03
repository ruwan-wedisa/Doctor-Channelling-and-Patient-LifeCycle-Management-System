<?php
include("db.php");
session_start();
$uid=$_SESSION['userid'];
$approved=$_REQUEST['approved'];
$timeslotID =$_REQUEST['timeslot'];
$dayBooked = $_REQUEST['dayBooked'];

$name=$_REQUEST['Name'];
$refid =$_REQUEST['refNo'];
$phone = $_REQUEST['phone'];
$nic=$_REQUEST['nic'];
$email =$_REQUEST['email'];
$amount = $_REQUEST['amount'];

$doctorName =$_REQUEST['DocName'];
$date =$_REQUEST['Date'];

$roomNo =$_REQUEST['RoomNo'];

?>
<?php

include ( "NexmoMessage.php" );

$nexmo_sms = new NexmoMessage('19edf2b9', 'GxyEBUQ1eKTxfJsb');

$info = $nexmo_sms->sendText("94$phone", 'MyApp', "Hi!. You have paid Rs $amount to channel Dr.$doctorName on $date.RefNo: $refid");

echo $nexmo_sms->displayOverview($info);


?>
<?php

$queryInsertPayedPatients="
INSERT INTO payedpatients(id, refNo, patientName, phone, nic, email, amount,dateBooked,doctorName) 
VALUES('".$uid."','".$refid."','".$name."','".$phone."','".$nic."','".$email."','".$amount."','".$date."','".$doctorName."')
";

if(mysqli_query($conn, $queryInsertPayedPatients)){
    echo "Paymet  Complete";
}
else{
    echo "err";
}

?>

<?php



$queryNew = "UPDATE time_shedule SET enable='0',bookedDate='".$dayBooked."' WHERE TNo='".$timeslotID."' ";
if(mysqli_query($conn, $queryNew) AND ($approved==true)){
    //echo "Paymet  Complete";
}
else{
   // echo "Something Went Wrong.Paymet NOT Complete";
}





//$query = "SELECT * FROM time_shedule WHERE TNo ='1' AND enable = '1' ";
//$result = mysqli_query($conn, $query);
//$rows = mysqli_num_rows($result);
//
//if($rows>0){
//    echo "Paymet NOT Complete";
//
//}
//else{
//    echo "Paymet  Complete";
//}


?>
<?php
    require __DIR__.'/../PayPal-PHP-SDK/autoload.php';
    //API
    $api = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                    'AW4AozIHJhHXJlGmKxiKOk8Y729xq6BfADawda6SgYSpgiAW6l7j9XXLrbvoXbNs7tEXbNYN6jScfnTM',
                    'EB9xgx6ROAMQZPr_SHk_sm5PS_smD5XjvxAJlWNzo8ayG1cYpIXv28lQ1LiC0PWqQxA8KQpII7jNkqHC'
            )
    );

    $api->setConfig([
            'mode' => 'sandbox',
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => false ,
            'log.FileName' =>'',
            'log.LogLevel' =>'FINE',
            'validation.level' =>'log'
    ])
?>

<!DOCTYPE html>
<html><head>
    <title>W3.CSS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="../src/js/bootstrap4/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="../src/js/bootstrap4/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="../src/js/bootstrap4/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="../src/js/jquery/331/jquery.min.js"></script>

    <link rel="stylesheet" href="../src/w3.css">
    <link rel="stylesheet" href="../src/font-awesome.min.css">
    <link rel="stylesheet" href="../src/web-fonts-with-css/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../src/css/bootstrap4/bootstrap.min.css">
    <script defer src="../src/js/fontAwesome5/all.js" integrity="sha384-Voup2lBiiyZYkRto2XWqbzxHXwzcm4A5RfdfG6466bu5LqjwwrjXCMBQBLMWh7qR" crossorigin="anonymous"></script>
    <style>#div_color {
            background-color: #E3E3E3;
        }
        #mark{
            background-color: red;
        }

    </style>
</head>
<body>
<div id="container">
    <?php include 'header.php'; ?>
</div>
<div class="w3-container w3-padding" id="div_color" >
    <br><br><br><br>
    <div class="w3-container w3-padding" >
        <p align="center" style="font-size:60px;color: darkblue"><strong>Thank You for your Payment</p><p align="center" style="font-size:22px;font-family: Tahoma">
            your transaction has been completed, and a receipt for your doctor reservation has been emailed to you. You may log into your account at
            <a href="https://developer.paypal.com/" >www.paypal.com/</a> to view details of this transaction.
            </strong></p>
        <hr>
    </div>
    <br>
    <div class="row">

        <div class="container w3-center" style="padding-bottom:85px">
            <a href="index.php"><button class="w3-btn w3-khaki w3-hover-blue w3-xxlarge">Back to Home</button></a>
        </div>

    </div>


</div>





<hr>

<br>

</body>
</html>