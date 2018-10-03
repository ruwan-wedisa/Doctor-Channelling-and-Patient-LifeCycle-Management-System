<?php
	include("db.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Set Doctor Shedule</title>
    <link rel="stylesheet" href="src/w3.css">
      <script src="src/js/jquery/331/jquery.min.js"></script>
  <script src="src/js/popper.min.js"></script>
  <script src="src/js/bootstrap41/bootstrap.min.js"></script>
  <link rel="stylesheet" href="src/css/bootstrap41/bootstrap.min.css">
</head>
<body onload="load()">
<div id="container">
            <?php include 'header.php'; ?>
        </div>
<?php
$selDoctor = mysqli_query($conn,"select * from doctor");
?>

<br><br><br><br>
<div class="w3-display-container offset-4 w3-large">
<form action="submit_doctor_shedule.php" method="POST" class="w3-container w3-center  w3-light-grey w3-text-blue w3-margin " style="width:500px;">
	<p>
	<label>Select Doctor</label>
	<?php
		if(mysqli_num_rows($selDoctor)>0){
	?>
	<select name="docName">
		<?php while($row = mysqli_fetch_row($selDoctor)){ ?>
			<option value="<?php echo $row[0]; ?>" ><?php echo $row[1]; ?> </option>
		<?php } ?>
	</select>
	<?php } ?>
	</p>
    <p>
	<div class="w3-container">
	<label>Select Doctor Shedule Type</label>
	<select name="docType" id="docType" onchange="changeType()">
		<option value="Annualy">Annualy</option>
		<option value="Monthly">Monthly</option>
		<option value="Weekly">Weekly</option>
		<option value="Daily">Daily</option>
		<option value="Sepecial">Sepecial</option>
	</select>
	</div>
	<p id="shedule">
		
	</p>
	<p>
		<input type="submit" name="sheduleSubmit">
	</p>
</form>
</div>
</body>

<script type="text/javascript">
	function load(){
		var type = document.getElementById("docType").value;
		var shed = "";
		if(type == "Annualy"){
			shed = "<label> Select Month </label>";
			shed +="<select name='month'>"
			for(i=1;i<=12;i++){
				shed+="<option value="+i+">"+i+"</option>";
			}
			shed += "</select><br>";
			shed += "select day";
			shed +="<select name='days'>"
			for(i=1;i<=31;i++){
				shed+="<option value="+i+">"+i+"</option>";
			}
			shed += "</select>";
		}
		if(type == "Monthly"){
			shed = "<label> Select Day </label>";
			shed += "select day";
			shed +="<select name='day'>"
			for(i=1;i<=31;i++){
				shed+="<option value="+i+">"+i+"</option>";
			}
			shed += "</select>";
		}
		if(type == "Weekly"){
			shed = "<label> Select Day </label>";
			shed += "select day";
			shed +="<select name='day'>"
			shed +="<option value='Monday'>Monday</option>";
			shed +="<option value='Tuesday'>Tuesday</option>";
			shed +="<option value='Wednesday'>Wednesday</option>";
			shed +="<option value='Thursday'>Thursday</option>";
			shed +="<option value='Friday'>Friday</option>";
			shed +="<option value='Saturday'>Saturday</option>";
			shed +="<option value='Sunday'>Sunday</option>";
			shed += "</select>";
		}
		if(type == "Sepecial"){
			shed = "<label> Select Date </label>";
			shed += "<input type='date' name='exactDate'/>";
		}
		document.getElementById("shedule").innerHTML = shed;
	}

	function changeType(){
		var type = document.getElementById("docType").value;
		var shed = "";
		if(type == "Annualy"){
			shed = "<label> Select Month </label>";
			shed +="<select name='month'>"
			for(i=1;i<=12;i++){
				shed+="<option value="+i+">"+i+"</option>";
			}
			shed += "</select><br>";
			shed += "select day";
			shed +="<select name='day'>"
			for(i=1;i<=31;i++){
				shed+="<option value="+i+">"+i+"</option>";
			}
			shed += "</select>";
		}
		if(type == "Monthly"){
			shed = "<label> Select Day </label>";
			shed += "select day";
			shed +="<select name='day'>"
			for(i=1;i<=31;i++){
				shed+="<option value="+i+">"+i+"</option>";
			}
			shed += "</select>";
		}
		if(type == "Weekly"){
			shed = "<label> Select Day </label>";
			shed += "select day";
			shed +="<select name='day'>"
			shed +="<option value='Monday'>Monday</option>";
			shed +="<option value='Tuesday'>Tuesday</option>";
			shed +="<option value='Wednesday'>Wednesday</option>";
			shed +="<option value='Thursday'>Thursday</option>";
			shed +="<option value='Friday'>Friday</option>";
			shed +="<option value='Saturday'>Saturday</option>";
			shed +="<option value='Sunday'>Sunday</option>";
			shed += "</select>";
		}
		if(type == "Sepecial"){
			shed = "<label> Select Date </label>";
			shed += "<input type='date' name='exactDate'/>";
		}

		document.getElementById("shedule").innerHTML = shed;
	}
</script>
<br><br><br><br><br><br>
<div class="navbar-fixed-bottom">
 <?php include 'footer.php'; ?>
</div>
</html>