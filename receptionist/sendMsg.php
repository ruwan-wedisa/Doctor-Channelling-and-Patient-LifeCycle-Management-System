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
            <?php include 'header.php'; ?>
        </div>

        <!--  <div class="w3-display-container w3-content img-responsive"  style="max-width:1500px; height:500px">
                  
          <img src="images/b.jpg" alt="Table" class="w3-opacity-max" style="max-width:1500px; height:500px">
          </div>-->
        <br><br><br>
        <div class="container">
            <form action = "sendMsg.php" style = "border:5px solid #ccc" method = "post">
                <?php
                mysql_connect("localhost", "root", "") or die("Could not connect");
                mysql_select_db("echannelling") or die("could not find Database");


                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $num = $_POST['telNo'];
                    ?>
                    <div class = "container" >
                        <h1 class = "w3-blue w3-padding" style = "text-align: center">Send the Message to the Patients!</h1>
                        <hr>
                        <input type = "text" name = "phoneNumber" value = "<?php echo $num; ?>" >
                        <input type = "text" placeholder = "Enter the Message" name = "message" value="">
                        <button type = "submit" name="submit" value="Submit" class = "btn-info">Send</button>
                    </div>
                </form>
                <?php
            }
            ?>
            <?php
            mysql_connect("localhost", "root", "") or die("Could not connect");
            mysql_select_db("echannelling") or die("could not find Database");

            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                
                $phonNo = $_POST['phoneNumber'];
                $message = $_POST['message'];
                
                include ( "NexmoMessage.php" );

                $nexmo_sms = new NexmoMessage('19edf2b9', 'GxyEBUQ1eKTxfJsb');

                $info = $nexmo_sms->sendText('+94'.$phonNo.'', 'MyApp', "'.$message.'");

                echo $nexmo_sms->displayOverview($info);
            }
            ?>
        </div>
    </body>
    <div class="navbar-fixed-bottom" style="padding-top:60px">
        <?php include 'footer.php'; ?>
    </div>
</html>
