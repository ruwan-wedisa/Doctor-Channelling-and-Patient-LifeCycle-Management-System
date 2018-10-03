<?php



session_start();
require('db.php');
$uid=$_SESSION['userid'];
$contact = $_SESSION['tel'];
$nic = $_SESSION['nic'];
$address = $_SESSION['address'];
$contactHome = $_SESSION['telHome'];


$sql = "SELECT * FROM heightweightage WHERE id= '".$uid."' ";
$result = mysqli_query($conn, $sql);
$rows = mysqli_num_rows($result);

#For age smoking height & weight

if ($rows > 0) {
    while($row=mysqli_fetch_array($result)){

        $age =  $row['Age'];
        $height =  $row['height'];
        $weight =  $row['weight'];
        $date =$row['date'];


    }
}

#For Blood Group smoking alchohol & waterintake

$sql2 = "SELECT * FROM otherdetail WHERE id='".$uid."'";
$result = mysqli_query($conn, $sql2);
$rows = mysqli_num_rows($result);
if ($rows > 0) {
    while($row=mysqli_fetch_array($result)){

        $bloodGroup =  $row['bloodGroup'];
        $smoking =  $row['smoking'];
        $alchohol =  $row['alchohol'];
        $waterIntake =$row['waterIntake'];


        if($bloodGroup == 1){
            $bloodGroup = "A++";
        }
        else if($bloodGroup == 2){
            $bloodGroup = "A--";
        }
        else if($bloodGroup == 3){
            $bloodGroup = "B++";
        }
        else if($bloodGroup == 4){
            $bloodGroup = "B--";
        }
        else if($bloodGroup == 5){
            $bloodGroup = "O++";
        }
        else if($bloodGroup == 6){
            $bloodGroup = "O--";
        }
        else if($bloodGroup == 7){
            $bloodGroup = "AB++";
        }
        else if($bloodGroup == 8){
            $bloodGroup = "AB--";
        }
        else{
            echo "invalid Bloog Group";
        }


        if($smoking == 1){
            $smoking ="Yes";
        }
        else if($smoking == 0){
            $smoking ="No";
        }
        else{
            $smoking ="Not Specified";
        }


        if($alchohol == 1){
            $alchohol ="Yes";
        }
        else if($alchohol == 0){
            $alchohol ="No";
        }
        else{
            $alchohol ="Not Specified";
        }


    }
}

#For Cholostrol 
$sql3 = "SELECT * FROM cholostrol WHERE id= '".$uid."' ";
$result = mysqli_query($conn, $sql3);
$rows = mysqli_num_rows($result);

#For age smoking height & weight

if ($rows > 0) {
    while($row=mysqli_fetch_array($result)){

        $totalCholostrol =  $row['total'];
        $HDL =  $row['HDL'];
        $LDL =  $row['LDL'];
        $VLDL =$row['VLDL'];
        $VLDL =$row['VLDL'];
        $TRI =$row['TRI'];


    }
}
else{
    $glucose = "Not Specified";
    $totalCholostrol =  "Not Specified";
    $HDL = "Not Specified";
    $LDL =  "Not Specified";
    $VLDL ="Not Specified";
    $VLDL ="Not Specified";
    $TRI ="Not Specified";
}


#For FBSugar 
$sql4 = "SELECT * FROM fbsugar WHERE id= '".$uid."' ";
$result = mysqli_query($conn, $sql4);
$rows = mysqli_num_rows($result);


if ($rows > 0) {
    while($row=mysqli_fetch_array($result)){

        $glucose =  $row['glucose'];



    }
}
else{
    $glucose = "Not Specified";
}

#For RBSugar 
$sql5 = "SELECT * FROM rbsugar WHERE id= '".$uid."' ";
$result = mysqli_query($conn, $sql5);
$rows = mysqli_num_rows($result);


if ($rows > 0) {
    while($row=mysqli_fetch_array($result)){

        $RBglucose =  $row['glucose'];
        $afterBefore = $row['afterBefore'];

        if($afterBefore == 1){
            $afterBefore = "Before Meal" ;
        }
        else if($afterBefore == 0){
            $afterBefore = "After Meal" ;
        }
        else{
            $afterBefore = "Not Specified" ;
        }
    }

}
else{
    $afterBefore = "Not Specified";
    $RBglucose = "Not Specified";
}

#For Blood Pressure 
$sql6 = "SELECT * FROM bpressure WHERE id= '".$uid."' ";
$result = mysqli_query($conn, $sql6);
$rows = mysqli_num_rows($result);


if ($rows > 0) {
    while($row=mysqli_fetch_array($result)){

        $sys =  $row['systolic'];
        $dia = $row['diasolic'];


    }

}
else{
    $sys = "Not Specified";
    $dia = "Not Specified";
}



//INSERT DATA USING ADD NEW MODAL


//insert Cholostrol report data
if(isset($_POST['submit1'])){
    $date1 = $_POST['date'];
    $LDL1 = $_POST['LDL'];
    $HDL1 = $_POST['HDL'];
    $tri1 = $_POST['tri'];
    $VLDL1 = $_POST['VLDL'];
    $total1 = $_POST['total'];



    $q1="INSERT INTO `cholostrol` ( `id`, `date`, `total`, `HDL`, `LDL`, `VLDL`, `TRI`) VALUES ( '".$uid."', '".$date1."', '".$total1."', '".$HDL1."', '".$LDL1."', '".$VLDL1."', '".$tri1."')";

    if (mysqli_query($conn, $q1)) {

        header("location:myHealth.php");
    }
    else{

        echo "Error .";
    }

}


//insert Fasting Blood Sugar report data
if(isset($_POST['submit2'])){
    $date2 = $_POST['date'];
    $glucose1 = $_POST['glucose'];



    $q2="INSERT INTO `fbsugar` ( `id`, `date`, `glucose`) VALUES ( '".$uid."', '".$date2."', '".$glucose1."')";

    if (mysqli_query($conn, $q2)) {

        header("location:myHealth.php");
    }
    else{

        echo "Error .";
    }

}

//insert Random Blood Sugar report data
if(isset($_POST['submit3'])){
    $date2 = $_POST['date'];

    $afterBefore2 = $_POST['afterBefore'];





    $q3="INSERT INTO `rbsugar` ( `id`, `date`, `glucose`, `afterBefore`) VALUES ( '".$uid."', '".$date2."', '".$glucose1."','".$afterBefore2."')";

    if (mysqli_query($conn, $q3)) {

        header("location:myHealth.php");
    }
    else{

        echo "Error .";
    }

}

//insert Blood Pressure report data
if(isset($_POST['submit4'])){
    $date3 = $_POST['date'];
    $syst = $_POST['sys'];
    $dias = $_POST['dia'];



    $q4="INSERT INTO `bpressure` ( `id`, `date`, `systolic`, `diasolic`) VALUES ( '".$uid."', '".$date3."', '".$syst."','".$dias."')";

    if (mysqli_query($conn, $q4)) {

        header("location:myHealth.php");
    }
    else{

        echo "Error .";
    }

}

//insert Into Weight Details
if(isset($_POST['submit5'])){
    $date5 = $_POST['date'];
    $weight1 = $_POST['weight'];
    $height1 = $_POST['height'];
    $age1    = $_POST['age'];


    $q5="INSERT INTO `heightweightage` ( `id`, `date`, `height`, `weight`, `Age`) VALUES ( '".$uid."', '".$date5."', '".$height1."','".$weight1."','".$age1."')";

    if (mysqli_query($conn, $q5)) {

        header("location:myHealth.php");
    }
    else{

        echo "Error .";
    }

}

//insert Into Height Details
if(isset($_POST['submit6'])){
    $date5 = $_POST['date'];
    $weight1 = $_POST['weight'];
    $height1 = $_POST['height'];
    $age1    = $_POST['age'];


    $q5="INSERT INTO `heightweightage` ( `id`, `date`, `height`, `weight`, `Age`) VALUES ( '".$uid."', '".$date5."', '".$height1."','".$weight1."','".$age1."')";

    if (mysqli_query($conn, $q5)) {

        header("location:myHealth.php");
    }
    else{

        echo "Error .";
    }

}

//insert Allergy Details
if(isset($_POST['submit9'])){
    $date8 = $_POST['date'];
    $allergenType = $_POST['allergenType'];
    $reaction = $_POST['reaction'];
    $existingAllergen = $_POST['existingAllergy'];



    $q6="INSERT INTO `allergy`(`id`, `type`, `reaction`, `date`, `still_have`) VALUES ('".$uid."','".$allergenType."','".$reaction."','".$date8."','".$existingAllergen."')";

    if (mysqli_query($conn, $q6)) {

        header("location:myHealth.php");
    }
    else{

        echo "Error .";
    }

}



?>






<!DOCTYPE html>
<html><head>
    <title>E channelling</title>


    <script src="../src/js/jquery/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../src/css/bootstrap41/bootstrap.min.css">
    <link href="../src/css/font/fontawesome-free-5.0.12/web-fonts-with-css/css/fontawesome-all.css" rel="stylesheet">
    <link rel="stylesheet" href="../src/w3.css">
    <link rel="stylesheet" href="../src/font-awesome.min.css">
    <link rel="stylesheet" href="../src/web-fonts-with-css/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../src/css/bootstrap41/bootstrap.min.css">
    <script src="../src/js/jquery/331/jquery.min.js"></script>
    <script src="../src/js/popper.min.js"></script>
    <script src="../src/js/bootstrap41/bootstrap.min.js"></script>


    <script type="text/javascript" src="../src/moment.min.js"></script>



    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />


    <script defer src="../src/js/fontAwesome5/all.js" integrity="sha384-Voup2lBiiyZYkRto2XWqbzxHXwzcm4A5RfdfG6466bu5LqjwwrjXCMBQBLMWh7qR" crossorigin="anonymous"></script>
    <style>#div_color {
            background-color: #E3E3E3;
        }

    </style>
</head>
<body>
<div id="container">
    <?php include 'header_after_log.php'; ?>
</div>

<!-- first Details Blood group height weight age BMI  -->
<div class="w3-container w3-padding" id="div_color">
    <br><br><br><br>
    <div class="w3-container w3-padding" >
        <h1 align="center"><strong>My Health</strong></h1>
        <hr>
    </div>
    <br>
    <div class="row" style="padding-left:140px;padding-bottom:30px">

        <div class="col-lg-2">
            <div class="w3-text">

                <h1><?php  echo $age; ?></h1>
                <span>Age(Years)</span>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="w3-text">

                <h1><?php  echo $height; ?></h1>
                <span>Height(cm)</span>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="w3-text">
                <h1><?php  echo $weight; ?></h1>
                <span>Weight(kg)</span>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="w3-text">
                <h1><?php

                    $total = $weight / (($height/100) * ($height/100)) ;
                    echo number_format((float)$total, 2, '.', '');;
                    ?></h1>
                <span>BMI <kbd class="bg-danger"><strong>(overweight)</strong></kbd></span>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="w3-text">
                <h1><kbd class="bg-danger"><?php  echo $bloodGroup; ?></kbd></h1>
                <span>Blood Group</span>
            </div>
        </div>
    </div>


</div>
<!-- Smoking alchohol water intake  -->
<div class="row" style="padding-left:350px;padding-top:50px;padding-right:350px">
    <div class="col-lg-4" style="width:50px">
        <i class="fas fa-smoking fa-2x" ></i>

        <h5 style="padding-top:10px"> Smoking</h5>
        <span><?php  echo $smoking; ?></span>
    </div>
    <div class="col-lg-4" style="width:50px"><i class="fas fa-beer fa-2x" ></i>
        <h5 style="padding-top:10px">Alcohol</h5>
        <span><?php  echo $alchohol; ?></span>
    </div>
    <div class="col-lg-4" style="width:50px"><i class="fas fa-heart fa-2x" ></i>
        <h5 style="padding-top:10px">Water Intake</h5>
        <span><?php  echo $waterIntake; ?> Liters</span>
    </div>

</div>
<hr>
<!-- Contact Details  -->
<div class="row" style="padding-left:350px;padding-top:50px;padding-right:350px;padding-bottom:35px;">
    <div class="col-lg-3" style="width:50px">
        <i class="fas fa-phone-square fa-lg" ></i>
        <span style="padding-top:10px"><?php  echo $contact; ?></span><br>
        <p><b>Contact(Mobile)</b></p>
    </div>
    <div class="col-lg-3" style="width:50px"><i class="fas fa-home fa-lg" ></i>
        <span style="padding-top:10px"><?php  echo $contactHome; ?></span><br>
        <p><b>Contact(Home)</b></p>
    </div>
    <div class="col-lg-3" style="width:50px"><i class="fas fa-user fa-lg" ></i>
        <span style="padding-top:10px"><?php  echo $nic; ?></span><br>
        <p><b>NIC</b></p>
    </div>
    <div class="col-lg-3" style="width:50px"><i class="fas fa-map-marker fa-lg" ></i>
        <span style="padding-top:10px"><?php  echo $address; ?>
                </span><p><b>Address</b></p>
    </div>

</div>

<hr>
<div class="w3-container w3-padding" id="div_color">
    <h2>Medical Test Profile</h2>
</div>
<hr>

<!-- add new Modal For Cholostrol -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header w3-light-blue">
                <p class="modal-title" style="font-size:25px"><strong>Enter your CHOLESTEROL report data</strong></p>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form method="post" id="form" action="myHealth.php">
                <!-- Modal body -->
                <div class="modal-body">


                    <div class="form-group">


                        <label for="cholostorol-name" class="form-control-label">Date:</label>
                        <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                            <input type="text" id="date" name="date" placeholder="MM/DD/YYYY"  class="form-control datetimepicker-input" data-target="#datetimepicker1" required/>
                            <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>


                    </div>


                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">LDL:</label>
                        <input type="text" class="w3-input w3-border" id="recipient-name"  name="LDL">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label" >HDL:</label>
                        <input type="text" class="w3-input w3-border" id="recipient-name" name="HDL">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label" >Triglicerides:</label>
                        <input type="text" class="w3-input w3-border" id="recipient-name" name="tri">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label" >VLDL-Cholesterol:</label>
                        <input type="text" class="w3-input w3-border" id="recipient-name" name="VLDL">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label" >Total Cholesterol *:</label>
                        <input type="text" class="w3-input w3-border" id="recipient-name"  name="total" required>
                    </div>




                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit1" >Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- add new Modal For Fasting Blood Sugar -->
<div class="modal fade" id="myModal2">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header w3-light-blue">
                <p class="modal-title" style="font-size:25px"><strong>Enter your FASTING BLOOD SUGAR report data</strong></p>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <form method="post" id="form2" action="myHealth.php">
                <div class="modal-body">




                    <div class="form-group">


                            <label for="name-date" class="form-control-label">Date:</label>
                            <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                                <input type="text" id="date" name="date" placeholder="MM/DD/YYYY"  class="form-control datetimepicker-input" data-target="#datetimepicker2" required/>
                                <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>


                    </div>




                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">GLUCOSE(mg/dL):</label>
                        <input type="text" name="glucose" class="w3-input w3-border" id="recipient-name">
                    </div>


                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit2" >Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- add new Modal For Random Blood Sugar -->
<div class="modal fade" id="myModal3">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header w3-light-blue">
                <p class="modal-title" style="font-size:25px"><strong>Enter your RANDOM BLOOD SUGAR report data</strong></p>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <form method="post" id="form3" action="myHealth.php">
                <div class="modal-body" >


                    <div class="form-group">


                        <label for="cholostorol-name" class="form-control-label">Date:</label>
                        <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                            <input type="text" id="date" name="date" placeholder="MM/DD/YYYY"  class="form-control datetimepicker-input" data-target="#datetimepicker3" required/>
                            <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>


                    </div>


                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">GLUCOSE(mg/dL):</label>
                        <input type="text" class="w3-input w3-border" id="recipient-name" name="glucose">
                    </div>

                    <div class="form-group">
                        <label>Meals</label>
                        <select class="w3-input w3-border" name="afterBefore" style="background-color:#f1f1f1">
                            <option value="1">Before Meal</option>
                            <option value="0">After Meal</option>

                        </select>

                    </div>


                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit3" >Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- add new Modal For Blood Pressure -->

<div class="modal fade" id="myModal4">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header w3-light-blue">
                <p class="modal-title" style="font-size:25px"><strong>Enter your BLOOD PRESSURE report data</strong></p>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <form method="post" id="form4" action="myHealth.php">
                <div class="modal-body">


                    <div class="form-group">


                        <label for="cholostorol-name" class="form-control-label">Date:</label>
                        <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                            <input type="text" id="date" name="date" placeholder="MM/DD/YYYY"  class="form-control datetimepicker-input" data-target="#datetimepicker4" required/>
                            <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>


                    </div>


                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Blood Pressure (Systolic) / mmHg:</label>
                        <input type="text" class="w3-input w3-border" name="sys" id="recipient-name">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Blood Pressure (Diastolic) / mmHg :</label>
                        <input type="text" class="w3-input w3-border" name="dia" id="recipient-name">
                    </div>




                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit4">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- add new Modal For Weight -->

<div class="modal fade" id="myModal5">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header w3-light-blue">
                <p class="modal-title" style="font-size:25px"><strong>Enter your WEIGHT</strong></p>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <form method="post" id="form5" action="myHealth.php">
                <div class="modal-body">


                    <div class="form-group">


                        <label for="cholostorol-name" class="form-control-label">Date:</label>
                        <div class="input-group date" id="datetimepicker5" data-target-input="nearest">
                            <input type="text" id="date" name="date" placeholder="MM/DD/YYYY"  class="form-control datetimepicker-input" data-target="#datetimepicker5" required/>
                            <div class="input-group-append" data-target="#datetimepicker5" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>


                    </div>


                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">WEIGHT</label>
                        <input type="text" class="w3-input w3-border" value="<?php echo $weight?>"  name="weight">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">HEIGHT</label>
                        <input type="text" class="w3-input w3-border" value="<?php echo $height?>"  name="height">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">AGE</label>
                        <input type="text" class="w3-input w3-border" value="<?php echo $age?>"  name="age">
                    </div>





                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit5">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- add new Modal For Height -->

<div class="modal fade" id="myModal6">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header w3-light-blue">
                <p class="modal-title" style="font-size:25px"><strong>Enter your HEIGHT</strong></p>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <form method="post" id="form6" action="myHealth.php">
                <div class="modal-body">


                    <div class="form-group">


                        <label for="cholostorol-name" class="form-control-label">Date:</label>
                        <div class="input-group date" id="datetimepicker6" data-target-input="nearest">
                            <input type="text" id="date" name="date" placeholder="MM/DD/YYYY"  class="form-control datetimepicker-input" data-target="#datetimepicker6" required/>
                            <div class="input-group-append" data-target="#datetimepicker6" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>


                    </div>


                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">WEIGHT</label>
                        <input type="text" class="w3-input w3-border" value="<?php echo $weight?>" name="weight">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">HEIGHT</label>
                        <input type="text" class="w3-input w3-border" value="<?php echo $height?>"  name="height">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">AGE</label>
                        <input type="text" class="w3-input w3-border" value="<?php echo $age?>" name="age">
                    </div>





                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit6" >Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- add new Modal For My prescriptions -->
<div class="modal fade" id="myModal7">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header w3-light-blue">
                <p class="modal-title" style="font-size:25px"><strong>Upload Your Prescription</strong></p>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <form method="post" id="form7" action="uploadDocumentTargetPatient.php"  enctype="multipart/form-data">
                <div class="modal-body">


                    <div class="form-group">


                        <label for="cholostorol-name" class="form-control-label">Date:</label>
                        <div class="input-group date" id="datetimepicker7" data-target-input="nearest">
                            <input type="text" id="date" name="date" placeholder="MM/DD/YYYY"  class="form-control datetimepicker-input" data-target="#datetimepicker7" required/>
                            <div class="input-group-append" data-target="#datetimepicker7" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>


                    </div>


                    <div class="w3-container">
                        <div class="container">

                            <div class="form-group">
                                <label for="exampleInputFile" class="text text-info"><p style="text-decoration: none;font-size: 28px"><b>Select Your Prescription as a <strong class="text text-danger">PDF</strong> document to upload</b></p></label>
                                <input type="file" name="fileToUpload" id="fileToUpload">
                            </div>


                        </div>
                    </div>




                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit8">Upload &nbsp; <i class="fas fa-upload"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- add new Modal For My Allergy -->
<div class="modal fade" id="myModal8">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header w3-light-blue">
                <p class="modal-title" style="font-size:25px"><strong>Add New Allergy</strong></p>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <form method="post" id="form8" action="myHealth.php">
                <div class="modal-body" >


                    <div class="form-group">


                        <label for="cholostorol-name" class="form-control-label">Date:</label>
                        <div class="input-group date" id="datetimepicker8" data-target-input="nearest">
                            <input type="text" id="date" name="date" placeholder="MM/DD/YYYY"  class="form-control datetimepicker-input" data-target="#datetimepicker8" required/>
                            <div class="input-group-append" data-target="#datetimepicker8" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>


                    </div>


                    <div class="form-group">
                        <label>Allergen</label>
                        <select class="w3-input w3-border" name="allergenType" style="background-color:#f1f1f1">
                            <option value="0">Cats</option>
                            <option value="1">Dogs</option>
                            <option value="2">Wasps</option>
                            <option value="3">Bees</option>
                            <option value="4">Snakes</option>

                            <option disabled>──────────</option>

                            <option value="5">Pollen</option>
                            <option value="6">Dust</option>
                            <option value="7">Fumes-Joss Sticks</option>
                            <option value="8">Camphour</option>

                            <option disabled>──────────</option>

                            <option value="9">Panadol</option>
                            <option value="10">Antiserums-Tetanus</option>
                            <option value="11">Antiserums-Diphtheria</option>
                            <option value="12">Dextran</option>
                            <option value="13">Latex</option>
                            <option value="14">Antibiotics</option>

                            <option disabled>──────────</option>

                            <option value="15">Carrot</option>
                            <option value="16">Chilli</option>
                            <option value="17">Nuts : Peanuts,Cashew</option>
                            <option value="18">Shellfish:Prawns</option>
                            <option value="19">Shellfish:Shrimp</option>
                            <option value="20">Shellfish:Lobster</option>
                            <option value="21">Dairy Producs</option>
                            <option value="22">Eggs</option>
                            <option value="23">Citrus food: Tomatto</option>
                            <option value="24">Citrus food: Mango</option>
                            <option value="25">Citrus food: Stawberry</option>

                        </select>

                    </div>

                    <div class="form-group">
                        <label>Reaction</label>
                        <select class="w3-input w3-border" name="reaction" style="background-color:#f1f1f1">
                            <option value="0">Pain</option>
                            <option value="1">Headache</option>
                            <option value="2">Vomiting</option>
                            <option value="3">Fever</option>

                        </select>

                    </div>

                    <div class="form-group">
                        <label>Still Existing</label>
                        <select class="w3-input w3-border" name="existingAllergy" style="background-color:#f1f1f1">
                            <option value="1">Yes</option>
                            <option value="0">No</option>

                        </select>

                    </div>


                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit9" >Save</button>
                </div>
            </form>
        </div>
    </div>
</div>






<div class="w3-row-padding">
    <div class="w3-half w3-padding">

        <div class="w3-card-4">

            <header class="w3-container w3-white">

                <h1>Cholesterol </h1>

            </header>
            <hr>
            <div class="w3-container">
                <div class="row">
                    <div class="col-lg-6">
                        <span style="color:red">
                        <h2 style="font-size:40px;"><?php  echo $totalCholostrol; ?></h2>
                        total(mg/dL)</span>
                    </div>
                    <div class="col-lg-3">
                        <h5><?php  echo $HDL; ?></h5>
                        HDL(mg/dL)
                    </div>
                    <div class="col-lg-3">
                        <h5><?php  echo $LDL; ?></h5>
                        LDL(mg/dL)
                    </div>
                </div>

            </div>
            <hr>
            <div class="w3-row w3-padding">
                <footer class="w3-container w3-white">
                    <a href="cholostrolChart.php"><h5>View History</h5></a>
                    <button class="w3-button w3-red w3-round-large w3-hover-blue w3-right w3-padding"  data-toggle="modal" data-target="#myModal">Add New</button>
                </footer>
            </div>
        </div>

    </div>

    <div class="w3-half w3-padding">

        <div class="w3-card-4">

            <header class="w3-container w3-white">
                <h1>Fasting Blood Sugar</h1>
            </header>
            <hr>
            <div class="w3-container">
                <div class="row">
                    <div class="col-lg-6">
                        <span style="color:red">
                        <h2 style="font-size:40px;"><?php  echo $glucose; ?></h2>
                        GLUCOSE(mg/dL)</span>
                    </div>
                </div>

            </div>
            <hr>
            <div class="w3-row w3-padding">
                <footer class="w3-container w3-white">
                    <a href="fastingBloodSugarChart.php"><h5>View History</h5></a>
                    <button class="w3-button w3-red w3-round-large w3-hover-blue w3-right w3-padding" data-toggle="modal" data-target="#myModal2">Add New</button>
                </footer>
            </div>

        </div>

    </div>
</div>
<br><br><br>
<div class="w3-row-padding">
    <div class="w3-half w3-padding ">

        <div class="w3-card-4">

            <header class="w3-container w3-white">
                <h1>Random Blood Sugar</h1>
            </header>
            <hr>
            <div class="w3-container">
                <div class="row">
                    <div class="col-lg-8">
                        <span style="color:red">
                        <h2 style="font-size:40px;"><?php  echo $RBglucose; ?></h2>
                        GLUCOSE(mg/dL)</span>
                    </div>
                    <div class="col-lg-4 w3-padding">
                        <br>
                        <h4><strong style="color:blue"><?php  echo $afterBefore; ?></strong></h4>
                    </div>

                </div>


            </div>
            <hr>
            <div class="w3-row w3-padding">
                <footer class="w3-container w3-white">
                    <a href="randomBloodSugarChart.php"><h5>View History</h5></a>
                    <button class="w3-button w3-red w3-round-large w3-hover-blue w3-right w3-padding"  data-toggle="modal" data-target="#myModal3">Add New</button>
                </footer>
            </div>

        </div>

    </div>

    <div class="w3-half w3-padding">

        <div class="w3-card-4">

            <header class="w3-container w3-white">
                <h1>Blood Pressure</h1>
            </header>
            <hr>
            <div class="w3-container">
                <div class="row">
                    <div class="col-lg-6">
                        <span style="color:red">
                        <h2 style="font-size:40px;"><?php  echo $sys; ?></h2>
                        Systolic(mmHg)</span>
                    </div>
                    <div class="col-lg-6">
                        <span style="color:red">
                        <h2 style="font-size:40px;"><?php  echo $dia; ?></h2>
                        Diastolic(mmHg)</span>
                    </div>
                </div>

            </div>
            <br><hr>
            <div class="w3-row w3-padding">
                <footer class="w3-container w3-white">
                    <a href="bloodPressure.php"><h5>View History</h5></a>
                    <button class="w3-button w3-red w3-round-large w3-hover-blue w3-right w3-padding" data-toggle="modal" data-target="#myModal4">Add New</button>
                </footer>
            </div>

        </div>

    </div>
</div>
<br><br><br>
<div class="w3-row-padding">
    <div class="w3-half w3-padding">

        <div class="w3-card-4">

            <header class="w3-container w3-white">
                <h1>Weight</h1>
            </header>
            <hr>
            <div class="w3-container">
                <div class="row">
                    <div class="col-lg-6">
                        <span style="color:red">
                        <h2 style="font-size:50px;"><?php  echo $weight; ?></h2>
                        Kilo Grams(Kg)</span>
                    </div>

                </div>

            </div>
            <hr>
            <div class="w3-row w3-padding">
                <footer class="w3-container w3-white">

                    <a href="weight.php"><h5>View History</h5></a>
                    <button class="w3-button w3-red w3-round-large w3-hover-blue w3-right w3-padding" data-toggle="modal" data-target="#myModal5">Add New</button>
                </footer>
            </div>

        </div>

    </div>

    <div class="w3-half w3-padding">

        <div class="w3-card-4">

            <header class="w3-container w3-white">
                <h1>Height</h1>
            </header>
            <hr>
            <div class="w3-container">
                <div class="row">
                    <div class="col-lg-6">
                        <span style="color:red">
                        <h2 style="font-size:50px;"><?php  echo $height; ?></h2>
                        Centi Meters(cm)</span>
                    </div>
                </div>

            </div><hr>
            <div class="w3-row w3-padding">
                <footer class="w3-container w3-white">
                    <a href="height.php"><h5>View History</h5></a>
                    <button class="w3-button w3-red w3-round-large w3-hover-blue w3-right w3-padding" data-toggle="modal" data-target="#myModal6">Add New</button>
                </footer>
            </div>

        </div>

    </div>
</div>

<hr>
<div class="w3-container w3-padding" id="div_color">
    <h2>My Prescriptions</h2>
    <button class="w3-button w3-red w3-round-large w3-hover-blue w3-right w3-padding" data-toggle="modal" data-target="#myModal7">Add New</button>
</div>
<hr>


<div id="dowloadUpload">

    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" style="margin-top:10px">

        <div class="panel panel-primary">

            <div class="panel panel-primary">
                <div class="container">
                    <table class="table" >
                        <?php

                        $sql7 = "SELECT * FROM uploadedprescriptions WHERE uid='".$uid."' ";
                        $result3 = mysqli_query($conn, $sql7);
                        $rows = mysqli_num_rows($result3);
                        if($rows>0) {
                            while ($row = mysqli_fetch_array($result3)) {

                                $id = $row['id'];
                                $name = $row["name"];
                                $date9 = $row['date'];

                                // Array containing sample image file names
                                $images = array();
                                // Loop through array to create image gallery

                                echo "<tr>";
                                echo "<td>";
                                echo "<i class=\"far fa-file-pdf fa-3x\" ></i> &nbsp;";
                                echo '<a href="downloadPDF.php?file=' . urlencode($row["name"]) . '">' . $row["name"] . '</a>';
                                echo "</td>";

                                echo "<td>";
                                echo $date9;
                                echo "</td>";

                                echo "<td align='right'  >";
                                echo "<div class='float-xl-right row' >";

                                echo "<a class='btn btn-primary btn-xs' href='downloadPDF.php?file=" . urlencode($row["name"]) . "'>Download  &nbsp; <span class='glyphicon glyphicon-download-alt'> </a>";
                                echo "<form id=\"delete\" method=\"post\" action=\"deletePrescriptions.php?ID=$id\">";

                                echo " &nbsp;<input type=\"submit\" class=\"w3-button w3-red w3-round-large w3-padding\" name=\"delete\" value=\"Delete\">";
                                echo "</form>";
                                 echo "</div>";
                                echo "</td>";
                                echo "</tr>";

                            }
                        }
                        else{
                            echo "<div class=\"container\" align=\"center\">You don't have any prescriptions</div>";
                        }
                        ?>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

</div>


</div>
<hr>

<!--Get Allergy Data -->
<div class="w3-container w3-padding" id="div_color">
    <h2>My Allergies</h2>
    <button class="w3-button w3-red w3-round-large w3-hover-blue w3-right w3-padding" data-toggle="modal" data-target="#myModal8">Add New</button>
</div>
<hr>



<?php




$sql8 = "SELECT * FROM allergy WHERE id='".$uid."'";
$result4 = mysqli_query($conn, $sql8);
$rowss = mysqli_num_rows($result4);
$rowcount = 0;
if($rows>0) {
    while ($row = mysqli_fetch_array($result4)) {
        if($rowcount>0 AND $rowcount%3 == 0){

            echo "</div>";
            echo "<br><br>";
        }
        $type = $row["type"];
        $date10 = $row['date'];
        $reaction1 = $row['reaction'];
        $stillHave = $row['still_have'];


//Type
        if ($type ==1){
            $type ="Dogs";
        }
        elseif ($type ==2){
            $type ="Wasps";
        }
        elseif ($type ==3){
            $type ="Bees";
        }
        elseif ($type ==4){
            $type ="Snakes";
        }
        elseif ($type ==5){
            $type ="Pollen";
        }
        elseif ($type ==6){
            $type ="Dust";
        }
        elseif ($type ==7){
            $type ="Fumes-Joss Sticks";
        }
        elseif ($type ==8){
            $type ="Camphour";
        }
        elseif ($type ==9){
            $type ="Panadol";
        }
        elseif ($type ==10){
            $type ="Antiserums-Tetanus";
        }
        elseif ($type ==11){
            $type ="Antiserums-Diphtheria";
        }
        elseif ($type ==12){
            $type ="Dextran";
        }
        elseif ($type ==13){
            $type ="Latex";
        }
        elseif ($type ==14){
            $type ="Antibiotics";
        }
        elseif ($type ==15){
            $type ="Carrot";
        }
        elseif ($type ==16){
            $type ="Chilli";
        }
        elseif ($type ==17){
            $type ="Nuts : Peanuts,Cashew";
        }
        elseif ($type ==18){
            $type ="Shellfish:Prawns";
        }
        elseif ($type ==19){
            $type ="Shellfish:Shrimp";
        }
        elseif ($type ==20){
            $type ="Shellfish:Lobster";
        }
        elseif ($type ==21){
            $type ="Dairy Producs";
        }
        elseif ($type ==22){
            $type ="Eggs";
        }
        elseif ($type ==23){
            $type ="Citrus food: Tomatto";
        }
        elseif ($type ==24){
            $type ="Citrus food: Mango";
        }
        elseif ($type ==25){
            $type ="Citrus food: Stawberry";
        }
        else{
            $type ="Not Specified";
        }

//Reaction
        if($reaction1 == 0){
            $reaction1 ="Pain";
        }
        elseif ($reaction1==1){
            $reaction1 ="Headache";
        }
        elseif ($reaction1==2){
            $reaction1 ="Vomiting";
        }
        elseif ($reaction1==3){
            $reaction1 ="Fever";
        }
        else{
            $reaction1 ="Not Specified";
        }
//still Have
        if ($stillHave == 1){
            $stillHave ="Yes";
        }
        elseif ($stillHave ==0){
            $stillHave ="No";
        }
        else{
            $stillHave ="Not Specified";
        }



        if ($rowcount% 3 == 0 ) {

            echo "
<div class=\" w3-row-padding\">";

        }

        echo "

    
    <div class=\"w3-quarter  w3-card-4 w3-light-gray w3-margin\">

        <header class=\"w3-container w3-light-blue\">
            <h3> $type</h3>
</header>

<div class=\"w3-container \">
    <p><b>Reaction: $reaction1</b></p>
    <hr>
    <i class=\"fas fa-allergies fa-3x\" ></i>


    <p>$date10</p>
</div>



</div>

 ";

        $rowcount++;

    }
}
else{
    echo "<div class=\"container\" align=\"center\">You don't have any allergies</div>";
}



?>
</div>

<hr>
<br>
<div class="navbar-fixed-bottom">
    <?php include 'footer.php'; ?>
</div>



<!-- Include Date Range Picker -->
<script type="text/javascript" src="../src/js/date/bootstrap-datepicker.min.js"></script>

<script type="text/javascript">
    var dateToday = new Date();

    $(function() {

        $( "#datetimepicker1" ).datetimepicker({

            numberOfMonths: 3,
            showButtonPanel: true,
            // minDate: dateToday,
            format: 'YYYY-MM-DD'

        });
        $( "#datetimepicker2" ).datetimepicker({

            numberOfMonths: 3,
            showButtonPanel: true,

            format: 'YYYY-MM-DD'

        });
        $( "#datetimepicker3" ).datetimepicker({

            numberOfMonths: 3,
            showButtonPanel: true,

            format: 'YYYY-MM-DD'

        });
        $( "#datetimepicker4" ).datetimepicker({

            numberOfMonths: 3,
            showButtonPanel: true,

            format: 'YYYY-MM-DD'

        });
        $( "#datetimepicker5" ).datetimepicker({

            numberOfMonths: 3,
            showButtonPanel: true,

            format: 'YYYY-MM-DD'

        });
        $( "#datetimepicker6" ).datetimepicker({

            numberOfMonths: 3,
            showButtonPanel: true,

            format: 'YYYY-MM-DD'

        });
        $( "#datetimepicker7" ).datetimepicker({

            numberOfMonths: 3,
            showButtonPanel: true,

            format: 'YYYY-MM-DD'

        });
        $( "#datetimepicker8" ).datetimepicker({

            numberOfMonths: 3,
            showButtonPanel: true,

            format: 'YYYY-MM-DD'

        });
    });

</script>
</body>
</html> 