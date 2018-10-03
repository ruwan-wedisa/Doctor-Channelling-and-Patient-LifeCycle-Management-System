<?php
session_start();
require('db.php');
$uid=$_SESSION['userid'];
?>

<?php
//Fasting Blood Sugar Chart Display
$sql = "SELECT DISTINCT * FROM fbsugar WHERE id= '".$uid."' ORDER BY FBSid DESC  LIMIT 5  ";
$result = mysqli_query($conn, $sql);
$rows = mysqli_num_rows($result);


if($rows > 0){


    while ($row = mysqli_fetch_array($result)) {


        $date = $row['date'];
        $glucose = $row['glucose'];


        $arrGlucose[]  = $glucose;
        $arrDate[] = $date;

    }

}

if($rows <= 5){

    while($rows <= 5){

        $arrGlucose[$rows] = $arrGlucose[0];
        $arrDate[$rows] = $arrDate[0];
        $rows = $rows + 1;

    }

}

?>

<?php


if(isset($_POST['delete'])){

    $query = "DELETE FROM fbsugar order by FBSid desc limit 1";
    if(mysqli_query($conn, $query)){

    }
}



?>

<!DOCTYPE html>
<html>
<head>
    <title>W3.CSS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="../src/js/jquery/331/jquery.min.js"></script>
    <script src="../src/js/bootstrap337/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../src/w3.css">
    <link rel="stylesheet" href="../src/font-awesome.min.css">
    <link rel="stylesheet" href="../src/web-fonts-with-css/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../src/css/bootstrap4/bootstrap.min.css">
    <script defer src="../src/js/fontAwesome5/all.js" integrity="sha384-Voup2lBiiyZYkRto2XWqbzxHXwzcm4A5RfdfG6466bu5LqjwwrjXCMBQBLMWh7qR" crossorigin="anonymous"></script>

    <!--library to charts Moris-->
    <link rel="stylesheet" href="../src/css/moris/morris.css">
    <script src="../src/js/jquery/19/jquery.min.js"></script>
    <script src="../src/js/raphael-min.js"></script>
    <script src="../src/js/morris.min.js"></script>

</head>
<body>
<div id="container">
    <?php include 'header_after_log.php'; ?>
</div>
<div class="w3-container w3-padding" >
    <br><br><br><br>
    <div class="w3-container w3-padding " >
        <h1 align="left"><strong>Fasting Blood Sugar</strong></h1>
        <div class="row">
            <form id="delete" method="post" action="">
                &nbsp;&nbsp;
                <input type="submit" class="w3-button w3-red w3-round-large w3-padding" name="delete" value="Clear last entry">

            </form>
            &nbsp;
            <a href="myHealth.php"> <button class="w3-button w3-green w3-round-large w3-padding">Back</button></a>
        </div>

        <hr>

    </div>

    <div id="myfirstchart" style="height: 250px;"></div>
    <div class="w3-row-padding" style="padding-left:250px">
        <br><br><br>
        <div class="w3-threequarter w3-padding" >

            <div class="w3-card-4">

                <header class="w3-container w3-grey">
                    <h3><?php echo $arrDate[0]?></h3>
                </header>

                <div class="w3-container w3-padding">
                    <div class="row">
                        <div class="w3-container" >
                        <span style="color:red">
                        <h2 style="font-size:72px;"><?php echo $arrGlucose[0]?></h2>
                        GLUCOSE(mg/dL)</span>
                        </div>


                    </div>

                </div>


                <footer class="w3-container w3-grey">
                    <h5>Last Report Statistics</h5>
                </footer>

            </div>

        </div>


    </div>

</body>
<script>



    var totalVal1 = parseInt("<?php echo $arrGlucose[0]; ?>");
    var totalVal2 = parseInt("<?php echo $arrGlucose[1]; ?>");
    var totalVal3 = parseInt("<?php echo $arrGlucose[2]; ?>");
    var totalVal4 = parseInt("<?php echo $arrGlucose[3]; ?>");
    var totalVal5 = parseInt("<?php echo $arrGlucose[4]; ?>");

    var date1 = "<?php echo $arrDate[0];?>"
    var date2 = "<?php echo $arrDate[1];?>"
    var date3 = "<?php echo $arrDate[2];?>"
    var date4 = "<?php echo $arrDate[3];?>"
    var date5 = "<?php echo $arrDate[4];?>"



</script>
<script>
    new Morris.Line({
        // ID of the element in which to draw the chart.
        element: 'myfirstchart',
        // Chart data records -- each entry in this array corresponds to a point on
        // the chart.

        data: [
            { year: date1, Total_mg_dL: totalVal1},
            { year: date2, Total_mg_dL: totalVal2 },
            { year: date3, Total_mg_dL: totalVal3 },
            { year: date4, Total_mg_dL: totalVal4 },
            { year: date5, Total_mg_dL: totalVal5 }
        ],
        // The name of the data record attribute that contains x-values.
        xkey: 'year',
        // A list of names of data record attributes that contain y-values.
        ykeys: ['Total_mg_dL'],
        // Labels for the ykeys -- will be displayed when you hover over the
        // chart.
        labels: ['Value']
    });
</script>
<script type="text/javascript" src="src/js/jquery-3.2.1.min.js"></script>

</html> 