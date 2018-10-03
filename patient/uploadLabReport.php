<?php
include('db.php');

session_start();

$userid = $_SESSION['userid'];


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
        <br><br>
        <div class="container">
            <hr>
            <br>            
            <div class="row">
                <div class="col-md-8 col-lg-8">
                    <form id="AddDoctorForm" class="needs-validation"  action="uploadLabReportFinal.php?id=<?php echo $_REQUEST['id']?>" method="POST" enctype="multipart/form-data" novalidate>
                        <h3 class="text text-primary" style="text-align: center">Upload Here Your Lab Report</h3>
                        <h6 class="text text-muted" style="text-align: center">Only Upload PDF or Image File</h6><br>
                        <div class="form-row">
                            <div class="col-md-12 mb-6">
                                <label for="validationCustom02"><strong>Select the type of your report</strong></label>
                                <div class="input-group">
                                    <select class="form-control" name="category" id="exampleFormControlSelect1" id="validationCustom03" >
                                        <option value="1">Cholesterol</option>
                                        <option value="2">Blood Sugar</option>
                                        <option value="3">Cancer Tumor</option>
                                        <option value="4">Blood Pressure</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please choose a Specialization.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-6">
                                <label for="validationCustom03"><strong>Date of Your Report</strong></label>
                                <input type="date" class="form-control" name="date" id="validationCustom03" value="<?php echo!empty($errors) ? $_POST["date"] : date("Y-m-d"); ?>" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Date.
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="validationCustom03"><strong>Select your report file to upload</strong></label>
                                <input type="file" class="form-control" name="image" id="validationCustom03" required>
                                <div class="invalid-feedback">
                                    Please select a valid file.
                                </div>
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-primary" type="submit" name="submit">Upload</button>
                    </form>                   
                </div>
                <div class="col-md-4 col-lg-4">
                    <img id="dctrimg" src="img/report.jpg">
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
