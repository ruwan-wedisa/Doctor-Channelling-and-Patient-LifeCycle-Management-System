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
        <div class="container">
            <hr>
            <br>
            <div class="row">
                <div class="col-md-8 col-lg-8">
                    <form id="AddDoctorForm" class="needs-validation"  action="doctorRegistration.php" method="POST" novalidate>
                        <h3 class="text text-primary" style="text-align: center">Add a Doctor</h3><br>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01"><strong>First name</strong></label>
                                <input type="text" class="form-control" name="firstName" id="validationCustom01" placeholder="First name" value="" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom02"><strong>Last name</strong></label>
                                <input type="text" class="form-control" name="lastName" id="validationCustom02" placeholder="Last name" value="" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom02"><strong>Select Specialization</strong></label>
                                <div class="input-group">
                                    <select class="form-control" name="specialty" id="exampleFormControlSelect1" id="validationCustom03" >
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
                                        $sql = "SELECT * FROM specialty";
                                        $result = mysqli_query($conn, $sql);

                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                <option><?php echo $row["specialty"]; ?></option>
                                                <?php
                                            }
                                        } else {
                                            echo "0 results";
                                        }

                                        mysqli_close($conn);
                                        ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please choose a Specialization.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Email.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Username</label>
                                <input type="text" class="form-control" name="userName" id="validationCustom01" placeholder="Username"  required>
                                <div class="invalid-feedback">
                                    Please provide a valid Username.
                                </div>                                    
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="inputPassword4">Password</label>
                                <input type="password" class="form-control" name="password" id="inputPassword4" placeholder="Password" data-toggle="password" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Password.
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="validationCustom03"><strong>Address Line 1</strong></label>
                                <input type="text" class="form-control" name="addressLine1" id="validationCustom03" placeholder="Address Line 1" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Address.
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="validationCustom03"><strong>Address Line 2</strong></label>
                                <input type="text" class="form-control" name="addressLine2" id="validationCustom03" placeholder="Address Line 2" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Address.
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="validationCustom03"><strong>city</strong></label>
                                <input type="text" class="form-control" name="city" id="validationCustom03" placeholder="city" required>
                                <div class="invalid-feedback">
                                    Please provide a valid city.
                                </div>
                            </div>
                        </div>
                         <div class="form-row">
                            <div class="col-md-12">
                                <label for="validationCustom03"><strong>NIC Number</strong></label>
                                <input type="text" class="form-control" name="NIC" id="validationCustom03" placeholder="NIC Number" required>
                                <div class="invalid-feedback">
                                    Please provide a valid NIC Number.
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="validationCustom03"><strong>Contact Number</strong></label>
                                <input type="number" class="form-control" name="telNo" id="validationCustom03" placeholder="Contact Number" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Contact Number.
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="validationCustom03"><strong>Base Hospital</strong></label>
                                <input type="text" class="form-control" name="baseHospital" id="validationCustom03" placeholder="Base Hospital" required>
                                <div class="invalid-feedback">
                                    Please provide doctor's name of the Base hospital.
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="validationCustom03"><strong>Home Tel Number</strong></label>
                                <input type="number" class="form-control" name="telHome" id="validationCustom03" placeholder="Home Phone Number" required>
                                <div class="invalid-feedback">
                                    Please enter valid phone number.
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="validationCustom03"><strong>Channeling Room Number</strong></label>
                                <input type="number" class="form-control" name="channelRoomNo" id="validationCustom03" placeholder="Channeling Room Number" required>
                                <div class="invalid-feedback">
                                    Please enter valid room number.
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="validationCustom03"><strong>Doctor Fee</strong></label>
                                <input type="number" class="form-control" name="priceForChannel" id="validationCustom03" placeholder="Docotor Fee" required>
                                <div class="invalid-feedback">
                                    Please enter valid room number.
                                </div>
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-primary" type="submit" name="submit">Save Details</button>
                    </form>                   
                </div>
                <div class="col-md-4 col-lg-4">
                    <img id="dctrimg" src="img/doctor.png">
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
