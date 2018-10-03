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
            * {box-sizing: border-box}

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
                padding: 14px 20px;
                margin: 8px 0;
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
        <div class="container">
            <form action="searchPatient.php" style="border:5px solid #ccc" method="post">
                <div class="container" >
                    <h1 class="w3-blue w3-padding" style="text-align: center">Search the Patients!</h1>
                    <hr>
                    <input type="text" placeholder="Enter the Patient's name" name="search" >
                    <button type="submit" class="btn-info">Search</button>
                </div>
            </form>
            <form action="sendMsg.php" method="post">
                <?php



                if (isset($_POST['search'])) {
                    $searchq = $_POST['search'];
                    $searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);

                    $query = mysql_query("SELECT * FROM patient WHERE patientName LIKE '%$searchq%'  ") or die("could not search");
                    $count = mysql_num_rows($query);

                    if ($count == 0) {
                        $output = 'There was no search result';
                    } else {
                        while ($row = mysql_fetch_array($query)) {
                            $name = $row['patientName'];
                            $telNo = $row['telNo'];
                        }
                    }
                    ?>
                <input type="text" name="name" value="<?php echo $name; ?>" >
                    <input type="text" name="telNo" value="<?php echo $telNo; ?>" >
                    <button type="submit" name="submit" value="Submit" class="btn-dark">Send Message</button>
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
