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
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body {
                font-family: Arial, Helvetica, sans-serif;
            }

            * {
                box-sizing: border-box;
            }

            /* Style inputs */
            input[type=text], select, textarea {
                width: 100%;
                padding: 12px;
                border: 1px solid #ccc;
                margin-top: 6px;
                margin-bottom: 16px;
                resize: vertical;
            }

            input[type=submit] {
                background-color: #4CAF50;
                color: white;
                padding: 12px 20px;
                border: none;
                cursor: pointer;
            }

            input[type=submit]:hover {
                background-color: #45a049;
            }

            /* Style the container/contact section */
            .container {
                border-radius: 5px;
                background-color: #f2f2f2;
                padding: 10px;
            }

            /* Create two columns that float next to eachother */
            .column {
                float: left;
                width: 50%;
                margin-top: 6px;
                padding: 20px;
            }

            /* Clear floats after the columns */
            .row:after {
                content: "";
                display: table;
                clear: both;
            }

            /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
            @media screen and (max-width: 600px) {
                .column, input[type=submit] {
                    width: 100%;
                    margin-top: 0;
                }
            }	
        </style>
    </head>
    <body>	
        <div id="container">
            <?php include 'header_after_log.php'; ?>
        </div>
        <div class="container">
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

            if (isset($_POST["submit"])) {
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $phoneno = $_POST['phoneno'];
                $region = $_POST['region'];
                $subject = $_POST['subject'];

                $sql = "INSERT INTO contact(firstname, lastname, phoneno, region,subject)
VALUES ('" . $firstname . "','" . $lastname . "','" . $phoneno . "', '" . $region . "', '" . $subject . "')";

                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
            ?> 

            <div class="container">
                <br><br>
                <div style="text-align:center">
                    <h2>Contact Us</h2>
                    <p>    </p>
                </div>
                <div class="row">
                    <div class="column">
                        <div id="map" style="width:100%;height:500px"></div>
                    </div>
                    <div class="column">
                        <form action="contact.php" method="post">
                            <label for="fname">First Name</label>
                            <input type="text" id="fname" name="firstname" placeholder="Your name..">
                            <label for="lname">Last Name</label>
                            <input type="text" id="lname" name="lastname" placeholder="Your last name..">
                            <label for="lname">Phone No</label>
                            <input type="text" id="phoneno" name="phoneno" placeholder="Your phone no..">
                            <label for="region">Region</label>
                            <select id="region" name="region"  placeholder="Select your region..">
                                <option value="centralProvince">Central Province</option>
                                <option value="westernProvince">Western Province</option>
                                <option value="northernProvince">Northern Province</option>
                                <option value="southernProvince">Southern Province</option>
                                <option value="easternProvince">Eastern Province</option>
                                <option value="northWesternProvince">North Western Province</option>
                                <option value="northCentralProvince">North Central Province </option>
                                <option value="uvaProvince">Uva Province</option>
                                <option value="sabaragamuwaProvince">Sabaragamuwa Province</option>
                            </select>
                            <label for="subject">Subject</label>
                            <textarea id="subject" name="subject" placeholder="Write something.." style="height:170px"></textarea>


                            <button class="btn btn-primary" name="submit" type="submit">Submit</button>

                        </form>
                    </div>
                </div>
            </div>

        </div>


        <script>
            // Initialize google maps
            function myMap() {
                var myCenter = new google.maps.LatLng(6.9820, 81.0762);
                var mapCanvas = document.getElementById("map");
                var mapOptions = {center: myCenter, zoom: 12};
                var map = new google.maps.Map(mapCanvas, mapOptions);
                var marker = new google.maps.Marker({position: myCenter});
                marker.setMap(map);
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPpMs8_gwsBp3EjT4ZhXw-BuszQA6N6Jw&callback=myMap"></script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPpMs8_gwsBp3EjT4ZhXw-BuszQA6N6Jw&callback=initMap">
        </script>

    </body>
</html>
