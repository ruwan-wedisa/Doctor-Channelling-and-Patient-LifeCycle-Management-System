<?php
include('../db.php');

session_start();
$uid=$_SESSION['sid'];

?>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "echannelling";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$patientName = $_POST['patientName'];
$phonNo = $_POST['contactNum'];
$docName = $_POST['doctorName'];
$date = $_POST['date'];
$time = $_POST['time'];
$roomNum = $_POST['roomNum'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "INSERT INTO patientsbooking (patientName,contactNum,doctorName,dateBooked,time,roomNum) VALUES ('" . $patientName . "','$phonNo','" . $docName . "','$date','$time','$roomNum')";
    if (mysqli_query($conn, $sql)) {
        include ( "NexmoMessage.php" );

        $nexmo_sms = new NexmoMessage('19edf2b9', 'GxyEBUQ1eKTxfJsb');

        $info = $nexmo_sms->sendText("94$phonNo", 'MyApp', "Ayubovan $patientName Your appoinmnet with Dr.$docName on $date at $time in Room $roomNum is confirmed. Imzi Hospital ");

        echo $nexmo_sms->displayOverview($info);
    } else {
        echo mysqli_error($conn);
    }
}
?>