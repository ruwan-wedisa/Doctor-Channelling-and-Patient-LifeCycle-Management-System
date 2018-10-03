<?php
include("db.php");
session_start();
$id=$_REQUEST['ID'];
$dateFromSession=$_REQUEST['Day'];
$day =  substr($dateFromSession, 3,2);
$month =  substr($dateFromSession, 0,2);
$year =  substr($dateFromSession, 6,4);
?>


<!DOCTYPE html>
<html>
    <head>
    <script
  src="https://code.jquery.com/jquery-2.2.4.js"
  integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
  crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
     
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
            background-color: #167F92;
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
<br>
<div id="container">
    <?php include 'headerToHome.php'; ?>
</div>
<hr class="">
<div class="container target">
    <div class="row">
        <div class="col-sm-10">
            <!-- methana kalin list karna doc name eka session walin ganna -->
            <?php


            $q="select * from doctor WHERE id='".$id."' ";

            $result = mysqli_query($conn, $q);
            $rows = mysqli_num_rows($result);
            if ($rows > 0) {

                while($row=mysqli_fetch_array($result)){
                    $name = $row['docName'];
                    $address = $row['address'];
                    $speciality =  $row['speciality'];
                    $hospital =  $row['hospital'];
                    $Role =  "Doctor";
                    $phone =$row['telHome'];
                    $Email =$row['email'];
                    $channelRoomNo =$row['channelRoomNo'];


                    if($speciality == 1){
                        $speciality = "Mental";
                    }
                    else if($speciality == 2){
                        $speciality = "Dental";
                    }
                    else if($speciality == 3){
                        $speciality = "VOG";
                    }

                    echo "<div class=\"container\" id=\"div_color\">";
                    echo "<h1>Dr. ";
                    echo $name;
                    echo "</h1>";
                    echo "<p style=\"font-size: 18px\">";
                    echo $address;
                    echo "</p>";
                    echo "</div>";
                }

            }



            ?>





        </div>
        <div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image" height="150px" class="img-circle img-responsive" src="images/download.jpg"></a>
            <!-- user kiyala page ekakata link kala oninam -->
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-3">
            <!--left col eka meka-->
            <ul class="list-group">
                <li class="list-group-item text-muted" contenteditable="false" STYLE="background: #f2f2f2;">Profile</li>
                <li class="list-group-item "><span class="pull-left"><strong class="">Speciality:</strong></span><?php echo $speciality;?></li>
                <li class="list-group-item "><span class="pull-left"><strong class="">Hospital:</strong></span> <?php echo $hospital;?></li>
                <li class="list-group-item"><span class="pull-left"><strong class="">Role: </strong></span> <?php  echo $Role;?></li>
            </ul>
            <br>
            <ul class="list-group">
                <li class="list-group-item text-muted" STYLE="background: #f2f2f2;">Contact Info: <i class="fa fa-dashboard fa-1x"></i>

                </li>
                <li class="list-group-item "><span class="pull-left"><strong class="">Mobile No:</strong></span> <?php echo $Role;?></li>
                <li class="list-group-item "><span class="pull-left"><strong class="">Email:</strong></span> <?php echo $Email;?></li>
                <li class="list-group-item "><span class="pull-left"><strong class="">Channel No:</strong></span> <?php echo $channelRoomNo;?></li>
                         
            </ul>
              
        </div>

        <!--/col-3 right colm eka meka pre tag dala tiyenne-->
        <div class="col-sm-9" style="" contenteditable="false">
             
        <table class="responstable">
  
            <tr>
                <th>No:  </th>
                <th  >Time Slot  &nbsp &nbsp &nbsp &nbsp &nbsp </th>
                <th> Channel  </th>
            </tr>
            <?php
                $q1=mysqli_query($conn,"select * from time_shedule WHERE 
                ((id='".$id."' AND status='1'  AND enable='1')) 
                OR
                ((id='".$id."') AND((bookedDate= NULL) OR (bookedDate <> '".$day."')))
                "
                );
                if(mysqli_num_rows($q1)>0){
                    while($row = mysqli_fetch_row($q1)){

                       // $day =  substr($row[2], 3,2);

            ?>
            <!-- database eke time kiyalay date kialay colm 2 k tiye 2kma varchar type -->
            <tr>
                <td><?php echo $row[1]; ?></td>
                <td>Date: <?php echo  $dateFromSession; ?><br>Time: <?php echo $row[2]; ?> </td>


                <td><a href="reciptDetailsForm.php?ID=<?php echo $id?>&timeslot=<?php echo $row[1]; ?>
                 &dayBooked=<?php echo $day?>
                &Name=<?php echo $name?>
                &Date=<?php echo $year."-".$month."-".$day?>
                "><button type="button" font-size="20px"class="btn btn-info">Book    &nbsp &nbsp   </button></a></td>
            </tr>
        <?php }}
        else{
            ?>
            <tr>
                <td colspan="3">
                    NO RESULTS FOUND. ALL CHANNELS ARE BOOKED.
                </td>
            </tr>

        <?php
        }?>
 
        </table>


        
           <script>
            $(document).ready(function(){
                $("button").click(function(){
                    //alert("Do You Wish To Channel This Doctor");
                    this.disabled=true;
                });
            });
           </script>  
              
        </div>
    </div>

</body>


<br><br><br>




</html>
