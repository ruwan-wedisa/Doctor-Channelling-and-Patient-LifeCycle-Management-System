<?php
session_start();
require('db.php');
$uid=$_SESSION['userid'];
?>
<?php
  if(isset($_POST['submit'])){
		$age = $_POST['age'];
		$height = $_POST['height'];
		$weight = $_POST['weight'];
		$smoking = $_POST['smoke'];
		$alchohol = $_POST['alchohol'];
		$waterintake = $_POST['water'];
		$bloodGroup = $_POST['bloodGroup'];
		$today = date("Y/m/d");
		
		
		$q1="INSERT INTO otherdetail (id,bloodGroup,smoking,alchohol,waterintake) VALUES('".$uid."','".$bloodGroup."','".$smoking."','".$alchohol."','".$waterintake."')";
		
		$q2 ="INSERT INTO heightweightage(id,date,height,weight,Age) VALUES('".$uid."','".$today."','".$height."','".$weight."','".$age."')";
						
    if (mysqli_query($conn, $q1) && mysqli_query($conn, $q2)) {
		
					
	header("location:index.php");
	exit();
		
					}
					else {
        			echo "<div id='myModal1' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header bg-danger text-white'>
        
        
		<h4 class='modal-title'>Error</h4>
		<button type='button' class='close' data-dismiss='modal'>&times;</button>
      </div>
      <div class='modal-body'>
        <p>Register Failed!.</p>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-success' data-dismiss='modal'>Close</button>
      </div>
    </div>

  </div>
</div> ";
    				}
		

   mysqli_close($conn);
  }
 ?> 
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../src/css/bootstrap337/bootstrap.min.css">



  <link rel="stylesheet" href="../src/w3.css">
<style>


input[type=text],input[type=email] ,input[type=password] {
    width: 100%;
    padding: 19px;
    margin: 5px 0 22px 0;
    display: inline-block;
	background: #f1f1f1;
	
	
    
}
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}

button:hover {
    opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}

/* Add padding to container elements */
.container {
    padding: 25px ;padding-left:60px; padding-right:60px;
}


</style>
</head>
<body>
<div id="container">
            <?php include 'header.php'; ?>
</div>

      <!--  <div class="w3-display-container w3-content img-responsive"  style="max-width:1500px; height:500px">
		
        <img src="images/b.jpg" alt="Table" class="w3-opacity-max" style="max-width:1500px; height:500px">
        </div>-->
        <br><br><br>
  <div class="container custom">
  <form method="post" action="completeProfile.php" id="form" style="border:5px solid #ccc" class="w3-padding">
  <h1 class="w3-khaki w3-padding">Complete Your Profile Here</h1>	
  <hr>
		<div class="form-group">
    		<label>Age</label>
        	<input type="text" class="w3-input w3-border"   name="age" placeholder="Enter your Age" 
            data-validation="length" data-validation-length="1-100"  
            data-validation-error-msg="Invalid Age"       
             style="background-color:#f1f1f1">
    	</div>
        

        
        <div class="form-group">
    		<label>Height</label>
        	<input type="text" class="w3-input w3-border"  name="height" 
                 data-validation="required" 
                 data-validation-error-msg="Type Height in Numbers"
             placeholder="Height in Centimeters">
    	</div>
        
        <div class="form-group">
    		<label>Weight</label>
        	<input type="text" class="w3-input w3-border"  name="weight" 
                 data-validation="required" 
                 data-validation-error-msg="Type Weight in Numbers"
             placeholder="Weight in Kilo Grams">
    	</div>
        
        <div class="form-group">
    		<label>Smoking</label>
 	        <select class="w3-input w3-border" name="smoke" style="background-color:#f1f1f1">
            <option value="1">Yes</option>
            <option value="0">No</option>
    
       		</select>

    	</div>
        
		<div class="form-group" >
    		<label>Alchohol</label>
 	        <select class="w3-input w3-border" name="alchohol" style="background-color:#f1f1f1">
            <option value="1">Yes</option>
            <option value="0">No</option>
    
       		</select>
    	</div>
        
        <div class="form-group" >
    		<label>Blood Group</label>
 	        <select class="w3-input w3-border" name="bloodGroup" style="background-color:#f1f1f1">
            <option value="1">A--</option>
            <option value="2">A++</option>
            <option value="3">B--</option>
            <option value="4">B++</option>
            <option value="5">O--</option>
            <option value="6">O++</option>
            <option value="7">AB--</option>
            <option value="8">AB++</option>
    
       		</select>
    	</div>
        
        <div class="form-group" style="padding-top:7px">
    		<label>Water Intake</label>
        	<input type="text" class="w3-input w3-border"   name="water" placeholder="Enter Water Intake in Liters" 
            data-validation="length" data-validation-length="1-100"  
            data-validation-error-msg="Type in Liters"       
             style="background-color:#f1f1f1">
    	</div>
        

    
        
   <div class="clearfix">
      <button type="reset" class="cancelbtn">Cancel</button>
      <button type="submit" name="submit" class="signupbtn" >Submit</button>
    </div>
  </form>


 </div>
 <script type="text/javascript"  src="../src/js/jquery-3.2.1.min.js"></script>
 <script type="text/javascript" src="../src/js/bootstrap.min.js"></script>
<script src="../../zonel/adminPanal/js/jquery.form-validator.min.js"></script>

    <script>
  $.validate({
    lang: 'en'
  });
</script>


<script> $(document).ready(function () {
                // Show the Modal on load
                $('#myModal1').modal('show');
});</script>
</body>

 <?php include 'footer.php'; ?>

</html>
