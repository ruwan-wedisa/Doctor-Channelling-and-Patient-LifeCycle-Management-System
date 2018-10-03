<?php 
  include("db.php");
$query1 ="SELECT * FROM time_shedule WHERE Display=1";
$result_set1 = mysqli_query($conn, $query1);
?>
<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<body  bgcolor="#CCCCCC">
<div id="container">
            <?php include 'header.php'; ?>
        </div>
<div class="w3-container">
<br><br><br>
  <h2>Dr. Ruwan Pathirana</h2>

  <table class="w3-table-all">
    <thead>
      <tr class="w3-red">
        <th>Date</th>
        <th>Time</th>
        <th>Booking</th>
      </tr>
    </thead>
	<tbody>
					<form action="time.php" method="POST" >
	<?php
        if($result_set1){
          while($record1 = mysqli_fetch_assoc($result_set1)){
        ?>
<tr>
<td>
        <?php
        echo $record1['Date'];	  
          ?>
</td>
<td>
        <?php
        echo $record1['Time'];	  
          ?>
</td>
<td>
      <?php
       $sid=$record1['TNo'];
      ?>
<input type="checkbox" name="book[]" value="<?php echo $sid; ?>"/>
</td>
</tr>                       
        <?php                                   
      }}
      else{
        echo $connection->error;
      }
        ?>

<tr>
<td></td>
<td></td>
<td><input type='submit'  name='submit1' Value='Booking' class='btn btn-info btn-md'/></td> 
</tr>
				</form>
	</tbody>
  </table>
</body>



<?php
if(isset($_POST['submit1'])){
  if(!empty($_POST['book'])) {
foreach($_POST['book'] as $selected) {
  $ID = $selected;
   $sql2 = "UPDATE time_shedule SET Display=0 WHERE TNo=$ID";
   $result_set2 = mysqli_query($conn, $sql2);

   if($result_set2){
    echo "<script type='text/javascript'>alert('Your Booking Completed')</script>";
    echo "<script>setTimeout(function(){window.location.href='time.php'},1000);</script>";
  } else {
    echo "Error deleting record: " . $conn->error;
  }
}
}}
?>
</html> 