
<?php
session_start();
require('db.php');

?>
<?php
if(isset($_POST['submit'])) {
    $date = $_POST['date'];


    echo "
            <div class='container' align='right'><b><br><br><br>Channellings For '".$date."' </b></div>";
}
?>

<!DOCTYPE html>
<html>
<head>
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


    <style>

        .responstable {
            margin: 1em 0;
            width: 100%;
            overflow: hidden;
            background: #FFF;
            color: #024457;
            border-radius: 10px;
            border: 1px solid #1172ff;
        }
        .responstable tr {
            border: 1px solid #D9E4E6;
        }
        .responstable tr:nth-child(odd) {
            background-color: #EAF3F3;
        }
        .responstable th {
            display: none;
            border: 1px solid #FFF;

            color: #FFF;
            padding: 1em;
        }
        .responstable th:first-child {
            display: table-cell;
            text-align: center;
        }
        .responstable th:nth-child(2) {
            display: table-cell;
        }
        .responstable th:nth-child(2) span {
            display: none;
        }
        .responstable th:nth-child(2):after {
            content: attr(data-th);
        }
        @media (min-width: 480px) {
            .responstable th:nth-child(2) span {
                display: block;
            }
            .responstable th:nth-child(2):after {
                display: none;
            }
        }
        .responstable td {
            display: block;
            word-wrap: break-word;
            max-width: 7em;
        }
        .responstable td:first-child {
            display: table-cell;
            text-align: center;
            border-right: 1px solid #D9E4E6;
        }

        }
        .responstable th, .responstable td {
            text-align: left;
            margin: .5em 1em;
        }
        @media (min-width: 480px) {
            .responstable th, .responstable td {
                display: table-cell;
                padding: 1em;
            }
        }

        body {

            font-family: Arial, sans-serif;


        }

        h1 {
            font-family: Verdana;
            font-weight: normal;
            color: #024457;
        }
        h1 span {
            color: #167F92;
        }
        td { white-space:pre }

        #div_color {
            background-color: #E3E3E3;
        }


    </style>
</head>
<body>
<br><br>

    <?php include 'header_after_log.php'; ?>

<hr class="">
<div class="container target">

    <form method="post" id="form2" action="todayBookings.php">
        <div class="row">

            <div class="form-group col-sm-6">


                <label for="name-date" class="form-control-label"><strong>Enter Today Date for Display Channelled Patients:</strong></label>
                <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                    <input type="text" id="date" name="date" placeholder="MM/DD/YYYY"  class="form-control datetimepicker-input" data-target="#datetimepicker1" required/>
                    <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>


            </div>
            <div class="form-group col-sm-6 align-content-sm-center">
                <label for="name-date"  class="form-control-label  "><strong>.</strong></label>
                <br><button type="submit" class="btn btn-primary col-sm-2 " name="submit" >Search</button>
            </div>

        </div>
    </form>



    <div class="row">


        <!--/col-3 right colm eka meka pre tag dala tiyenne-->
        <div class="col-sm-6" style="" contenteditable="false">

            <table class="responstable">

                <tr>

                    <th colspan="4" style=" background-color: #167F92;">Payed Patients </th>

                </tr>
                <tr>

                    <th style=" background-color: #167F92;">Ref ID </th>
                    <th style=" background-color: #167F92;">Name</th>
                    <th style=" background-color: #167F92;">Doctor Name</th>
                    <th style=" background-color: #167F92;">Phone</th>


                </tr>
                <?php

                $dates = @$date ?: '2025-08-06';

                //get data from paied patients data
                $q1=mysqli_query($conn,"select * from payedpatients WHERE dateBooked='".$dates."'
                "
                );
                if(mysqli_num_rows($q1)>0){
                while($row = mysqli_fetch_row($q1)){

                // $day =  substr($row[2], 3,2);

                ?>

                <tr>
                    <td><?php echo $row[1]; ?></td>
                    <td><?php echo $row[2]; ?></td>
                    <td><?php echo $row[8]; ?></td>
                    <td><?php echo $row[3]; ?></td>
                </tr>

                    <?php }}
                    else{
                        ?>

                        <td colspan="4" style="text-align: left">
                            NO RESULTS FOUND .
                        </td>


                        <?php
                    }?>



            </table>

        </div>









        <div class="col-sm-6" style="" contenteditable="false">

            <table class="responstable">

                <tr>

                    <th colspan="4" style=" background-color: #167F92;"> Other Chanelled Patients  </th>

                </tr>
                <tr>

                    <th style=" background-color: #167F92;">Ref ID </th>
                    <th style=" background-color: #167F92;">Name</th>
                    <th style=" background-color: #167F92;">Doctor Name</th>
                    <th style=" background-color: #167F92;">Phone</th>


                </tr>

                <?php
                //get data from otherbooked data
                $q2=mysqli_query($conn,"select * from patientsbooking WHERE  dateBooked='".$dates."'
                "
                );
                if(mysqli_num_rows($q2)>0){
                    while($row2 = mysqli_fetch_row($q2)){

                        // $day =  substr($row[2], 3,2);

                        ?>


                        <tr>
                            <td><?php echo $row2[0]; ?></td>
                            <td><?php echo $row2[2]; ?></td>
                            <td><?php echo $row2[4]; ?></td>
                            <td><?php echo $row2[3]; ?></td>
                        </tr>



                    <?php }}
                else{
                    ?>


                    <td colspan="4">
                        NO RESULTS FOUND.
                    </td>




                    <?php
                }?>


            </table>

        </div>
    </div>

</body>


<br><br><br>




</html>

<script type="text/javascript">
    var dateToday = new Date();

    $(function() {

        $( "#datetimepicker1" ).datetimepicker({

            numberOfMonths: 3,
            showButtonPanel: true,
            //minDate: dateToday,
            format: 'YYYY-MM-DD'

        });
    });

</script>