<?php
include('../db.php');

session_start();
$uid=$_SESSION['sid'];


?>
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

        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $userName = $_POST['userName'];
        $password2 = $_POST['password'];
        $addressLine1 = $_POST['addressLine1'];
        $addressLine2 = $_POST['addressLine2'];
        $city = $_POST['city'];
        $NIC = $_POST['NIC'];
        $telNo = $_POST['telNo'];
        $telHome = $_POST['telHome'];
        $categoryNum = 3;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $sql = "INSERT INTO receptionist(recName,address,NIC,telNo,email,telHome) VALUES ('" . $firstName . " " . $lastName . "','" . $addressLine1 . " " . $addressLine2 . " " . $city . "','" . $NIC . "',' $telNo','" . $email . "','$telHome')";

            if (mysqli_query($conn, $sql)) {
                $sql2 = "INSERT INTO userlogin (userName,password,userCategory) VALUES('" . $userName . " ','" . $password2 . "', '$categoryNum' )";
                if (!mysqli_query($conn, $sql2)) {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <strong>Insertion Failed</strong>&nbsp;<a href="addReceptionist.php">Try Again</a>
                        <?php echo $_SERVER. error_log();?>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="alert alert-success" role="alert">
                        <strong>Successfully Inserted</strong>&nbsp;<a href="index.php">Back to Home</a>
                    </div>
                    <?php
                }
            }
        }else{
            echo 'error';
        }
        mysqli_close($conn);
        ?>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>

