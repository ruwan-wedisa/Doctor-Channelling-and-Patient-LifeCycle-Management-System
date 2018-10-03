<html>
    <head>
        <meta charset="UTF-8">
        <title>| ABC E-Channel |</title>
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
        <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="css/adminStyle.css">
        <link rel="stylesheet" href="css/doctorPageStyle.css">

    </head>
    <body>
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

$address = $_POST['address'];
$telNo = $_POST['telNo'];
$telHome = $_POST['telHome'];
$email = $_POST['email'];
$submit_id = $_REQUEST['id'];
if (isset($_POST['update'])) {
    $sql = "UPDATE receptionist SET address='" . $address . "',telNo='" . $telNo . "',email='" . $email . "',telHome='" . $telHome . "' WHERE id='" . $submit_id . "'";

    if ($conn->query($sql) === TRUE) {
        ?>
        <div class="alert alert-info" role="alert">
            <strong>Updated Successfully </strong>&nbsp;<a href="index.php">Go to Home</a>
        </div>
        <?php
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
