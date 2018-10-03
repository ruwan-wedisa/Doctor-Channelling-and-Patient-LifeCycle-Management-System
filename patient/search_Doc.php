<?php
include("db.php");
session_start();
?>
<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="src/w3.css">
<script src="../src/js/jquery/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="../src/js/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="../src/js/bootstrap4/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="../src/js/jquery/331/jquery.min.js"></script>
<link href="../src/css/font/fontawesome-free-5.0.12/web-fonts-with-css/css/fontawesome-all.css" rel="stylesheet">
<link rel="stylesheet" href="src/w3.css">
<link rel="stylesheet" href="src/font-awesome.min.css">
<link rel="stylesheet" href="src/web-fonts-with-css/css/fontawesome-all.min.css">
<link rel="stylesheet" href="../src/css/bootstrap4/bootstrap.min.css">
<script defer src="../src/js/fontAwesome5/all.js" integrity="sha384-Voup2lBiiyZYkRto2XWqbzxHXwzcm4A5RfdfG6466bu5LqjwwrjXCMBQBLMWh7qR" crossorigin="anonymous"></script>

<body  bgcolor="#CCCCCC">
<div id="container">
    <?php include 'header_after_log.php'; ?>
</div>
<div class="w3-container">
    <br><br><br><br>
    <h2>Choose Your Doctor:</h2>
    <table class="w3-table-all">
        <thead>
        <tr class="w3-red">
            <th>Doctor Name</th>
            <th>Specialist on</th>
            <th>Option</th>
        </tr>
        </thead>
        <?php
        $q=mysqli_query($conn,"select DISTINCT * from doctor ");
        if(mysqli_num_rows($q)>0) {
            while ($row = mysqli_fetch_row($q)) {
                if($row[3] == 1){
                    $row[3]="Mental";
                }
                elseif ($row[3] == 2){
                    $row[3]="Dental";
                }
                elseif ($row[3]==3){
                    $row[3]="VOG";
                }


                ?>


                <tr>
                    <td><?php  echo $row[1];?></td>
                    <td><?php  echo $row[3];?></td>
                    <td><a href="index.php"><button class="w3-button w3-white w3-border w3-border-red w3-round-large" >Channel</button></td>


                </tr>




            <?php      }
        }
        ?>

    </table>
</div>
<br><br><br><br><br>
<div class="navbar-fixed-bottom">
    <?php include 'footer.php'; ?>
</div>
</body>




</html> 