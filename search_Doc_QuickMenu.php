<?php
include("db.php");
session_start();
if (isset($_POST['search'])) {

    $name = $_POST['name'];
    $spec = $_POST['spec'];
    $date = $_POST['date'];



    if($spec == "Mental"){
        $spec = 1;
    }
    else if($spec == "Dental"){
        $spec = 2;
    }
    else if($spec == "VOG"){
        $spec = 3;
    }



}
?>

<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="src/w3.css">
<script src="src/js/jquery/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="src/js/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="src/js/bootstrap4/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="src/js/jquery/331/jquery.min.js"></script>
<link href="src/css/font/fontawesome-free-5.0.12/web-fonts-with-css/css/fontawesome-all.css" rel="stylesheet">
<link rel="stylesheet" href="src/w3.css">
<link rel="stylesheet" href="src/font-awesome.min.css">
<link rel="stylesheet" href="src/web-fonts-with-css/css/fontawesome-all.min.css">
<link rel="stylesheet" href="src/css/bootstrap4/bootstrap.min.css">
<script defer src="src/js/fontAwesome5/all.js" integrity="sha384-Voup2lBiiyZYkRto2XWqbzxHXwzcm4A5RfdfG6466bu5LqjwwrjXCMBQBLMWh7qR" crossorigin="anonymous"></script>

<body  bgcolor="#CCCCCC">
<div id="container">
    <?php include 'header.php'; ?>
</div>
<div class="w3-container">
    <br><br><br>
    <h2>Choose Your Doctor:</h2><p style="font-size: 18px">(for selected Month)</p>

        <?php

        $day =  substr($date, 3,2);
        $month =  substr($date, 0,2);
        $year =  substr($date, 6,4);
       // echo $year;

        $query1 ="SELECT * FROM doctor_shedule INNER JOIN doctor ON doctor_shedule.doctorId=doctor.id WHERE
  ( 
    ((doctor_shedule.day >= $day) AND
    (doctor.speciality = '$spec') ) OR

    ((doctor_shedule.sheduleType='Daily') AND (doctor.speciality = '$spec') )
     OR
    ((doctor.docName = '$name') AND (doctor_shedule.day >= $day))  
  )ORDER BY FIELD(doctor.docName, '$name') DESC, doctor.docName ASC,doctor_shedule.day ASC";
        $result_set1 = mysqli_query($conn, $query1);
        ?>
        <table class="w3-table-all">
            <thead>
            <tr class="w3-red">
                <th>Doctor Name</th>
                <th>Specialist on</th>
                <th>sheduleType</th>
                <th>Date</th>
                <th>Option</th>
            </tr>
            </thead>
            <?php

            if(mysqli_num_rows($result_set1)>0){
                while($record1 = mysqli_fetch_assoc($result_set1)){
                    if($record1['speciality']==2){
                        $record1['speciality']= "Dental";
                    }
                    else if($record1['speciality']==1){
                        $record1['speciality']= "Mental";
                    }
                    ?>
                    <tr>
                        <td><?php echo $record1['docName'] ?></td>
                        <td><?php echo  $record1['speciality'] ?></td>
                        <td><?php echo $record1['sheduleType'] ?></td>
                        <td>
                        <?php if($record1['day']==NULL){

                            echo $date;
                        }
                        else{

                            echo $month."/".$record1['day']."/".$year;
                            echo "</td>";

                        }


                        ?>






                        <td><a href="doc.php?ID=<?php echo  $record1['id'];?>&Day=<?php

                            if($record1['day']==NULL){

                                echo $date;
                            }
                            else{

                                echo $month."/".$record1['day']."/".$year;


                            }



                            ?>"><button class="w3-button w3-white w3-border w3-border-red w3-round-large" >Channel</button></td>
                    </tr>
                    <?php

                }}
                else{
                    echo "
                    
                    <tr>
                        <td colspan=\"4\">
                        NO RESULTS FOUND. PLEASE SEARTH ON ANOTHER DATE.
                        </td>
                    </tr>
        
                    ";

                }?>
        </table>

</div>
<br><br><br><br><br>
<div class="navbar-fixed-bottom">
    <?php include 'footer.php'; ?>
</div>
</body>




<script type="text/javascript">
    var dateToday = new Date();
    document.write(dateToday);
</script>
</html>