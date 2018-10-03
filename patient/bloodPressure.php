<?php
session_start();
require('db.php');
$uid=$_SESSION['userid'];
?>

<?php
//Random Blood Sugar Chart Display
$sql = "SELECT DISTINCT * FROM bpressure WHERE id= '".$uid."' ORDER BY BPid DESC  LIMIT 5  ";
$result = mysqli_query($conn, $sql);
$rows = mysqli_num_rows($result);


if($rows > 0){


    while ($row = mysqli_fetch_array($result)) {


        $date = $row['date'];
        $sys[] = $row['systolic'];
        $dia[] = $row['diasolic'];


        $arrDate[] = $date;


    }

}

if($rows <= 5){

    while($rows <= 5){

        $sys[$rows] = $sys[0];
        $dia[$rows]= $dia[0];
        $arrDate[$rows] = $arrDate[0];

        $rows = $rows + 1;

    }

}

?>

<?php
if(isset($_POST['delete'])){

$query = "DELETE FROM bpressure order by BPid desc limit 1";
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
<style>#div_color {
    background-color: #E3E3E3;
}


</style>
</head>
<body>
<div id="container">
            <?php include 'header_after_log.php'; ?>
        </div>
<div class="w3-container w3-padding" >
			<br><br><br><br>
			<div class="w3-container w3-padding " >
				<h1 align="left"><strong>Random Blood Sugar</strong></h1>
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
                <h3><?php echo $arrDate[0];?></h3>
            </header>
        
            <div class="w3-container w3-padding">
                <div class="row w3-center">
                    <div class="col-lg-6">
                        <span style="color:red">
                        <h2 style="font-size:72px;"><?php echo $sys[0];?></h2>
                        Systolic(mmHg)</span>
                    </div>

                    <div class="col-lg-6">
                        <span style="color:red">
                        <h2 style="font-size:72px;"><?php echo $dia[0];?></h2>
                        Diasolic(mmHg)</span>
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



    var sysPressure1 = parseInt("<?php echo $sys[0]; ?>");
    var sysPressure2 = parseInt("<?php echo $sys[1]; ?>");
    var sysPressure3 = parseInt("<?php echo $sys[2]; ?>");
    var sysPressure4 = parseInt("<?php echo $sys[3]; ?>");
    var sysPressure5 = parseInt("<?php echo $sys[4]; ?>");

    var diaPressure1 = parseInt("<?php echo $dia[0]; ?>");
    var diaPressure2 = parseInt("<?php echo $dia[1]; ?>");
    var diaPressure3 = parseInt("<?php echo $dia[2]; ?>");
    var diaPressure4 = parseInt("<?php echo $dia[3]; ?>");
    var diaPressure5 = parseInt("<?php echo $dia[4]; ?>");

    var date1 = "<?php echo $arrDate[0];?>"
    var date2 = "<?php echo $arrDate[1];?>"
    var date3 = "<?php echo $arrDate[2];?>"
    var date4 = "<?php echo $arrDate[3];?>"
    var date5 = "<?php echo $arrDate[4];?>"





</script>

<script>
  new Morris.Area({
  // ID of the element in which to draw the chart.
  element: 'myfirstchart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  
  data: [
    { year: date1, a: sysPressure1,b:diaPressure1},
    { year: date2, a: sysPressure2,b:diaPressure2},
    { year: date3, a: sysPressure3 ,b:diaPressure3},
    { year: date4, a: sysPressure4 ,b:diaPressure4},
    { year: date5, a: sysPressure5 ,b:diaPressure5}
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'year',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['a','b'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Systolic','Diastolic']
});
</script>
<script type="text/javascript" src="src/js/jquery-3.2.1.min.js"></script>
<script>
function goBack() {
    window.history.back();
}
</script>
</html> 