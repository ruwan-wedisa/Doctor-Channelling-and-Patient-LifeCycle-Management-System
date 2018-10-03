<?php
include('../db.php');

session_start();
$uid=$_SESSION['sid'];


?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>| ABC E-Channel |</title>
        <link rel="stylesheet" href="src/w3.css">
        <link rel="stylesheet" href="src/latin_font.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="src/web-fonts-with-css/css/fontawesome-all.css">
        <link rel="stylesheet" href="src/web-fonts-with-css/css/fontawesome-all.min.css">    
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> 
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display|Raleway" rel="stylesheet">
        <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="css/adminStyle.css">
        <link rel="stylesheet" href="css/doctorPageStyle.css">

    </head>
    <body>

        <div id="container">
            <?php include 'header_after_log.php'; ?>
        </div>
        <br>
        <div class="container">
            <hr>
            <br>
            <div class="row">
                <div class="col-md-8 col-lg-8">
                    <form id="AddDoctorForm" class="needs-validation"  action="confirmChanneling.php" method="POST" novalidate>
                        <h3 class="text text-primary" style="text-align: center">New Channeling</h3><br>
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="validationCustom03"><strong>Patient's  Name</strong></label>
                                <input type="text" class="form-control" name="patientName" id="validationCustom03" placeholder="Patient's Name" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Name.
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="validationCustom03"><strong>Patient's  Contact Number</strong></label>
                                <input type="text" class="form-control" name="contactNum" id="validationCustom03" placeholder="Patient's Contact Number" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Contact Number.
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="validationCustom02"><strong>Select Doctor's Name</strong></label>
                                <div class="input-group">
                                    <select class="form-control" name="doctorName" id="exampleFormControlSelect1" id="validationCustom03" >
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
                                        $sql = "SELECT * FROM doctor";
                                        $result = mysqli_query($conn, $sql);

                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                <option><?php echo $row["docName"]; ?></option>
                                                <?php
                                            }
                                        } else {
                                            echo "0 results";
                                        }

                                        mysqli_close($conn);
                                        ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please choose a Doctor's Name.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="validationCustom03"><strong>Date</strong></label>
                                <input type="date" class="form-control" name="date" id="validationCustom03" value="<?php echo!empty($errors) ? $_POST["date"] : date("Y-m-d"); ?>" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Date.
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="validationCustom03"><strong>Time</strong></label>
                                <input type="time" class="form-control" name="time" id="validationCustom03" required>
                                <div class="invalid-feedback">
                                    Please provide a valid time.
                                </div>
                            </div>
                        </div> 
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="validationCustom03"><strong>Room Number</strong></label>
                                <input type="number" class="form-control" name="roomNum" id="validationCustom03" placeholder="Room Number" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Room Number.
                                </div>
                            </div>
                        </div>

                        <br>
                        <button class="btn btn-primary" type="submit" name="submit">Confirm</button>
                    </form>                    
                </div>
                <div class="col-md-4 col-lg-4">
                    <img id="dctrimg" src="img/chennel.png">
                </div>
            </div>
        </div>

    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
    <script type="text/javascript">
        $("#password").password('toggle');
    </script>

</body>
</html>


