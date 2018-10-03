<?php 
include('../db.php');

	session_start();
	$uid=$_SESSION['sid'];
	if($uid==3){
		
	}
	else{
	header("location:../login_Form.php")	;
	}
	
?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="src/w3.css">
    <link rel="stylesheet" href="src/latin_font.css">
    <link rel="stylesheet" href="src/web-fonts-with-css/css/fontawesome-all.css">
    <link rel="stylesheet" href="src/web-fonts-with-css/css/fontawesome-all.min.css">

    <link rel="stylesheet" href="../src/css/bootstrap41/bootstrap.min.css">

    <script src="../src/js/jquery/331/jquery.min.js"></script>
    <script src="../src/js/popper.min.js"></script>
    <script src="../src/js/bootstrap41/bootstrap.min.js"></script>

    <script type="text/javascript" src="../src/moment.min.js"></script>



    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />

    <style>
        img {
            position: absolute;
            left: 0px;
            top: 0px;
            z-index: -1;
        }
    </style>
</head>

<body>

<div id="container">
    <?php include 'header_after_log.php'; ?>
</div>


<div class="w3-display-container w3-content img-responsive"  style="max-width:1500px; height:500px">

    <img src="images/b.jpg" alt="Table" class="w3-opacity-max" style="max-width:1500px; height:500px">

    <div class="container">
        <!-- Button to Open the Modal -->


        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header w3-light-blue">
                        <p class="modal-title" style="font-size:28px">You need to <strong>Login</strong> As Patient</p>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body w3-padding"><p class="w3-text" style="font-size:17px">
                            You can <a href="logout.php"><strong>Login Here</strong></a> Or
                            If you are new user <a href="register_patient.php"><strong>Sign Up</strong></a> Here.</p>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <br><br><br><br>
    <div class="w3-display-container row justify-content-md-center w3-padding w3-margin-top">
        <br><br><br><br><br>
        <form action="search_Doc_QuickMenu.php"  method="post" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin " style="width:500px;">
            <h2 class="w3-center">Channel Your Doctor</h2>
            <div class="w3-row w3-section">
                <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user-md"></i></div>
                <div class="w3-rest">
                    <input class="form-control" id="name" name="name" placeholder="Doctor's Name" type="text"/>
                </div>
            </div>

            <div class="w3-row w3-section">
                <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-stethoscope custom"></i></div>
                <div class="w3-rest">
                    <!-- <input class="form-control" id="spec" name="spec" placeholder="Specialization" type="text"/> -->
                    <select name="spec" class="w3-select w3-border" required >
                        <option value="">Specialization</option>
                        <?php
                        $specList = mysqli_query($conn,"select distinct speciality from doctor");
                        while($spec = mysqli_fetch_row($specList)){
                            if($spec[0] == 1){
                                $spec[0] = "Mental";
                            }
                            elseif ($spec[0] == 2){
                                $spec[0] = "Dental";
                            }
                            elseif ($spec[0] == 3){
                                $spec[0] = "VOG";
                            }

                            ?>
                            <option value="<?php echo $spec[0]; ?>"><?php echo $spec[0]; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>


            <div class="w3-row w3-section">
                <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-calendar"></i></div>

                <div class="row">



                    <div class="input-group date" id="datetimepicker6" data-target-input="nearest">
                        <input type="text" id="date" name="date" placeholder="MM/DD/YYYY"  class="form-control datetimepicker-input" data-target="#datetimepicker6" required/>
                        <div class="input-group-append" data-target="#datetimepicker6" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>




                </div>
            </div>










            <button type="submit" class="w3-btn w3-block w3-section w3-blue w3-ripple w3-padding" name="search">Search</button>
        </form>
    </div>
</div>
</div>
<br>
<header class="w3-container">
    <h5 align="center"><b><i class="fa fa-dashboard"></i>Patient Life Cycle Management</b></h5>
</header>

<div class="w3-row-padding w3-margin-bottom">
    <a data-toggle="modal" href="#myModal">
        <div class="w3-quarter w3-padding">
            <div class="w3-container w3-card w3-red w3-padding-16">
                <div class="w3-left"><i class="fa fa-medkit custom w3-xxxlarge"></i></div>
                <div class="w3-right">
                    <h3>52</h3>
                </div>
                <div class="w3-clear"></div>
                <h4>Prescriptions</h4>
            </div>
        </div>
    </a>
    <a href="view_medicaltips.php">
        <div class="w3-quarter w3-padding">
            <div class="w3-container w3-card w3-blue w3-padding-16">
                <div class="w3-left"><i class="fa fa-user-md custom w3-xxxlarge"></i></div>
                <div class="w3-right">
                    <h3>99</h3>
                </div>
                <div class="w3-clear"></div>
                <h4>Medical tips</h4>
            </div>
        </div>
    </a>
    <a  href="myHealth.php">
        <div class="w3-quarter w3-padding">
            <div class="w3-container w3-card w3-teal w3-padding-16">
                <div class="w3-left"><i class="fa fa-heartbeat custom w3-xxxlarge"></i></div>
                <div class="w3-right">
                    <h3>23</h3>
                </div>
                <div class="w3-clear"></div>
                <h4>My Health</h4>
            </div>
        </div>
    </a>



    <a data-toggle="modal" href="#myModal">
        <div class="w3-quarter w3-padding">
            <div class="w3-container w3-card w3-orange w3-text-white w3-padding-16">
                <div class="w3-left"><i class="fa fa-hospital custom w3-xxxlarge"></i></div>
                <div class="w3-right">
                    <h3>50</h3>
                </div>
                <div class="w3-clear"></div>
                <h4>Lab Report</h4>
            </div>
        </div>
    </a>
</div>

<br><br>
<!-- Footer -->
<div class="navbar-fixed-bottom">
    <?php include 'footer.php'; ?>
</div>

<!-- End page content -->







<!-- Include Date Range Picker -->
<script type="text/javascript" src="../src/js/date/bootstrap-datepicker.min.js"></script>




<script type="text/javascript">
    var dateToday = new Date();

    $(function() {

        $( "#datetimepicker6" ).datetimepicker({

            numberOfMonths: 3,
            showButtonPanel: true,
            minDate: dateToday,
            format: 'L'
        });
    });

</script>


</body>
</html> 


