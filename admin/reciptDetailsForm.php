<?php
include("db.php");
session_start();
?>
<?php
/**
 * Created by PhpStorm.
 * User: ruwan.wedisa
 * Date: 6/1/2018
 * Time: 9:03 AM
 */

$timeSlotNum = $_REQUEST['timeslot'];
$id=$_REQUEST['ID'];
$dayBooked = $_REQUEST['dayBooked'];
$name = $_REQUEST['Name'];
$date = $_REQUEST['Date'];


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel = "stylesheet" href = "src/w3.css">
    <link rel="stylesheet" href="src/css/bootstrap41/bootstrap.min.css">
    <link href="src/css/font/fontawesome-free-5.0.12/web-fonts-with-css/css/fontawesome-all.css" rel="stylesheet">
    <link rel="stylesheet" href="src/w3.css">
    <link rel="stylesheet" href="src/font-awesome.min.css">
    <link rel="stylesheet" href="src/web-fonts-with-css/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="src/css/bootstrap41/bootstrap.min.css">
    <script src="src/js/jquery/331/jquery.min.js"></script>
    <script src="src/js/popper.min.js"></script>
    <script src="src/js/bootstrap41/bootstrap.min.js"></script>

    <style>#div_color {
            background-color: #E3E3E3;
        }

    </style>
</head>
<body>
<div id="container">
    <?php include 'header.php'; ?>
</div>
<br><br><br>
<div class="w3-container w3-padding" >
    <h2> <span><i class="fas fa-user-md fa-2x"></i>&nbsp;  Dr.<?php echo $name?></span></h2>



</div>
<div class="w3-container w3-padding" >


    <p style="color: #ff435b">Date:<?php echo $date?>&nbsp;&nbsp;</p>


</div>
<br>
<div class="w3-container w3-padding" id="div_color">
    <h2>Enter Your Details</h2>

</div>
<br>
<div class="w3-container  w3-margin " >
    <form class = "w3-container w3-card-8" method="post" action="reciptDetails.php?ID=<?php echo $id?>&timeslot=<?php echo $timeSlotNum?>&dayBooked=<?php echo $dayBooked?>&Date=<?php echo $date?>">
        <div class = "w3-group">
            <label class = "w3-label"><b>Full Name</b></label>
            <input class = "w3-input" name="name" type = "text" style = "width:90%" data-validation="required">

        </div>

        <div class = "w3-group">
            <label class = "w3-label"><b>Phone</b></label>
            <input class = "w3-input" name="pn" style = "width:90%"
                   data-validation="length" data-validation-length="8-9"
                   data-validation-error-msg="Telephone Number has to be a 9 numbers eg:71XXXXXXX"
                   placeholder="Type your telephone Number   eg:71XXXXXXX"
            >

        </div>

        <div class = "w3-group">
            <label class = "w3-label"><b>NIC</b></label>
            <input class = "w3-input" name="nic" style = "width:90%"
                   data-validation="length" data-validation-length="10-10"
                   data-validation-error-msg="Invalid NIC Number"
                   placeholder="eg:93XXXXXXXv"
            >

        </div>

        <div class = "w3-group">
            <label class = "w3-label"><b>Email</b></label>
            <input class = "w3-input" name="email" type = "text" style = "width:90%"
                   data-validation="email"
            >

        </div>

        <button type="submit"  class="w3-button w3-block w3-quarter w3-red w3-section w3-ripple w3-padding" name="detailsSubmit">Continue</button>



    </form>
</div>
</body>
</div>
<br><br><br><br>

<?php include 'footer.php'; ?>


</body>
</html>
<script type="text/javascript"  src="src/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="src/js/bootstrap.min.js"></script>
<script src="src/js/jquery.form-validator.min.js"></script>

<script>
    $.validate({
        lang: 'en'
    });
</script>