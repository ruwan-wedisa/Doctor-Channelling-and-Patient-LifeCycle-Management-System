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
        <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="css/doctorPageStyle.css">
    </head>
    <body>
        <?php include 'navBar.php'; ?>
        <div class="container">
            <div id="mainDesc" class="row">
                <div id="leftPart" class="col-md-6 col-lg-6">
                    
                </div>
                <div id="leftPart" class="col-md-6 col-lg-6">
                    <form>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Full Name</label>
                            <input type="text" class="form-control" id="text">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput2">Age</label>
                            <input type="text" class="form-control" id="text">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput2">Date of Birth</label>
                            <input type="date" class="form-control" id="date">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput2">Address</label>
                            <textarea type="text" class="form-control" id="text"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput2">Contact Number</label>
                            <input type="text" class="form-control" id="text">
                        </div>
                        
                        <button type="submit" class="btn btn-light">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>


