<?php
include('../db.php');

session_start();
$uid=$_SESSION['sid'];


?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        <style>
            body {font-family: Arial, Helvetica, sans-serif;}
            * {-webkit-box-sizing: border-box}

            /* Full-width input fields */
            input[type=text], input[type=password] {
                width: 100%;
                padding: 15px;
                margin: 5px 0 22px 0;
                display: inline-block;
                border: none;
                background: #f1f1f1;
            }

            input[type=text]:focus, input[type=password]:focus {
                background-color: #ddd;
                outline: none;
            }

            hr {
                border: 1px solid #f1f1f1;
                margin-bottom: 25px;
            }

            /* Set a style for all buttons */
            button {
                background-color: #4CAF50;
                color: white;
                padding: 14px 0px;
                margin: 0px 0;
                border: none;
                cursor: pointer;
                width: 100%;
                opacity: 0.9;
            }

            button:hover {
                opacity:1;
            }

            /* Extra styles for the cancel button */
            .cancelbtn {
                padding: 14px 20px;
                background-color: #f44336;
            }

            /* Float cancel and signup buttons and add an equal width */
            .cancelbtn, .signupbtn {
                float: left;
                width: 50%;
            }

            /* Add padding to container elements */
            .container {
                padding: 25px;
            }


            /* Change styles for cancel button and signup button on extra small screens */
        </style>
    </head>
    <body>
        <div id="container">
            <?php include 'header_after_log.php'; ?>
        </div>

        <!--  <div class="w3-display-container w3-content img-responsive"  style="max-width:1500px; height:500px">
                  
          <img src="images/b.jpg" alt="Table" class="w3-opacity-max" style="max-width:1500px; height:500px">
          </div>-->
        <br><br><br>
        <div class="container " style="padding-left: 250px;padding-right: 250px;">
            <form action="searchPatiens.php"  method="post">
                <div class="container " style="padding-left: 150px;padding-right: 150px;" >
                    <h1 class=" w3-padding" style="text-align: center">Search the Patients!</h1>
                    <hr>
                    <input type="text" placeholder="Enter the Patient's name" name="search" >
                    <button type="submit" class="btn-info">Search</button>
                </div>
            </form>
            <form action="patientHealth.php" method="post">
                <?php
                include 'db.php';
                if (isset($_POST['search'])) {
                    $searchq = $_POST['search'];
                    $searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);

                    $query = "SELECT * FROM patient WHERE patientName LIKE '%$searchq%'  ";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_num_rows($result);

                    if($row>0){
                        while ($row = mysqli_fetch_array($result)) {
                            $name = $row['patientName'];
                            $telNo = $row['telNo'];
                            $patienId = $row['id'];
                        }
                    }

                   else{

                       $name ="No Patient by that user name";
                       $telNo ="No Patient by that user name";
                    }

                    ?>
                    <input type="text" name="name" value="<?php echo $name; ?>" >
                    <input type="text" name="telNo" value="<?php echo $telNo; ?>" >
                    <input type="hidden" name="patientID" value="<?php echo $patienId; ?>">
                    <button type="submit" class="btn btn-dark" name="searchPatient" >Viwe Patient Health</button>
                    <?php
                }

                ?>


            </form>
        </div>
    </body>
    <div class="navbar-fixed-bottom" style="padding-top:60px">
        <?php include 'footer.php'; ?>
    </div>
</html>
