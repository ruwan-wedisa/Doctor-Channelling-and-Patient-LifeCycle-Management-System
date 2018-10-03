<?php
include('db.php');

session_start();

$userid = $_SESSION['userid'];


?>
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
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "echannelling";

// Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
// If upload button is clicked ...
// Get image name
        if (isset($_POST["submit"])) {
            $patientId = $_REQUEST['id'];
            $date = $_POST['date'];
            $category = $_POST['category'];
            $target_dir = "labReport/";
            $imageName = $_FILES["image"]["name"];
            $target_file = $target_dir . basename($imageName);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image


            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check !== false) {
                //echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }

// Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }
// Check file size
            if ($_FILES["image"]["size"] > 10000000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
// Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
// Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $sql = "INSERT into labreport(patienId, date, reportCategory, fileName) VALUES ('" . $patientId . "','" . $date . "', '" . $category . "','" . $imageName . "')";
                    //$result = mysqli_query($conn, $sql);
                    if (mysqli_query($conn, $sql)) {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            <strong>Successfully Uploaded</strong>&nbsp;<a href="labReport.php?id=<?php echo $patientId;?>">Back to Reports</a>
                        </div>
                        <?php
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
        ?>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>