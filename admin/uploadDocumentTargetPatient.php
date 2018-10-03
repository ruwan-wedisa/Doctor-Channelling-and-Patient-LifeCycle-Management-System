<?php

session_start();
require('db.php');
$uid=$_SESSION['userid'];

echo $uid;
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>| Upload |</title>
        <link href="src/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="src/css/style.css" rel="stylesheet"/>
    </head>
    <body>
        <br>
        <?php
        require('db.php');
        $target_dir = "uploadDocumentsToWebsite/";
        echo $target_dir;
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        $Filename = basename($_FILES["fileToUpload"]["name"]);
		
        $file_type = $_FILES["fileToUpload"]["type"];

// Check if file is a actual or fake
        if (isset($_POST["submit8"])) {
            $date8 = $_POST['date'];
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                //echo "It's not a valid file - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else if ($file_type == "application/pdf") {
                //echo " " . basename($_FILES['fileToUpload']['name']) . " is uploaded";
            } else {
                $uploadOk = 0;
            }
        }
// Allow certain file formats
        if ($imageFileType != "pdf") {
            echo " <h4><strong>Sorry,</strong> Only <strong class='text text-danger'>PDF</strong> files are allowed to Upload.<h4> ";
            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "<h3 class='text text-danger'>Your file was not uploaded.<h3> ";
            echo "<a href='height.php'class='btn btn-info'>Try again</a>";
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo " " . basename($_FILES["fileToUpload"]["name"]) . " <h3 class='text text-success'> has been successfully uploaded.</h3>";
				
                $query ="INSERT INTO `uploadedprescriptions`( `uid`, `name`, `date`) VALUES('".$uid."','".$Filename."','".$date8."')";
                mysqli_query($conn, $query);

                header("location:myHealth.php");

            } else {
                echo " Sorry, there was an error uploading your file.";
            }
        }
        ?>
    </body>
</html>