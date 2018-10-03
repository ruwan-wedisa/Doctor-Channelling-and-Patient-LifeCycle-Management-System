<?php 
include('db.php');
?>
<?php
  if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$Address = $_POST['address'];
		$NIC_number = $_POST['nic'];
		$telephoneM = $_POST['tpm'];
		$telephoneH = $_POST['tph'];
		$email = $_POST['email'];
		$User_Name = $_POST['un'];
		$password = $_POST['pw'];
		$userCategory = 4;

        $encrypt = md5($password);
		
		$query="INSERT INTO userlogin (userName,password,userCategory) VALUES('".$User_Name."','".$encrypt."','".$userCategory."')";
		
	
	$query3 = "SELECT * FROM userlogin WHERE userName='".$User_Name."'";
				$result = mysqli_query($conn, $query3);
    			$rowss = mysqli_num_rows($result);
//Check if there are no duplicate Primary keys				
if($rowss >0){
				echo "<div id='myModal1' class='modal fade' role='dialog'>
					  <div class='modal-dialog'>
					
						<!-- Modal content-->
						<div class='modal-content'>
						  <div class='modal-header bg-danger text-white'>
							
							
							<h4 class='modal-title'>'".$User_Name."' is already Registed. </h4>
							<button type='button' class='close' data-dismiss='modal'>&times;</button>
						  </div>
						  <div class='modal-body'>
							<p>Try Again with Different UserName!!.</p>
						  </div>
						  <div class='modal-footer'>
							<button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
						  </div>
						</div>
					
					  </div>
					</div> ";
	
}else{
	//execute insert userLogin						
    if (mysqli_query($conn, $query)) {
		$queryNew = mysqli_query($conn,"SELECT max(id) from userlogin" );  
		//get that id and Save other details
		while($row=mysqli_fetch_array($queryNew)){
					$lastid = $row['max(id)'];		
					$query2= "INSERT INTO patient(id,patientName,address,NIC,telNo,telHome,email) VALUES('".$lastid."','".$name."','".$Address."','".$NIC_number."','".$telephoneM."','".$telephoneH."','".$email."')";
					
					//insert in patient Table
					
					if(mysqli_query($conn, $query2)){
					echo "<div id='myModal1' class='modal fade' role='dialog'>
					  <div class='modal-dialog'>
					
						<!-- Modal content-->
						<div class='modal-content'>
						  <div class='modal-header bg-success text-white'>
							
							
							<h4 class='modal-title'>Success</h4>
							<button type='button' class='close' data-dismiss='modal'>&times;</button>
						  </div>
						  <div class='modal-body'>
							<p>Successfully Registered Patient!!.</p>
						  </div>
						  <div class='modal-footer'>
							<button type='button' class='btn btn-success' data-dismiss='modal'>Close</button>
						  </div>
						</div>
					
					  </div>
					</div> ";
					}
					
					else{
						echo "<div id='myModal1' class='modal fade' role='dialog'>
					  <div class='modal-dialog'>
					
						<!-- Modal content-->
						<div class='modal-content'>
						  <div class='modal-header bg-danger text-white'>
							
							
							<h4 class='modal-title'>Register Failed!</h4>
							<button type='button' class='close' data-dismiss='modal'>&times;</button>
						  </div>
						  <div class='modal-body'>
							<p>Try Again!!.</p>
						  </div>
						  <div class='modal-footer'>
							<button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
						  </div>
						</div>
					
					  </div>
					</div> ";	
						
						
					}
					
					
			}
		} 
	
	}
		
		
	
            
   mysqli_close($conn);
  }
 ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="src/css/bootstrap337/bootstrap.min.css">
 
      <link rel="stylesheet" href="src/web-fonts-with-css/css/fontawesome-all.css">
	<link rel="stylesheet" href="src/web-fonts-with-css/css/fontawesome-all.min.css"> 
     <link rel="stylesheet" href="src/w3.css">

  
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
  <form method="post" action="register_patient.php" id="form" style="border:5px solid #ccc" class="w3-padding">
  <h1 class="w3-blue w3-padding">Welcome!!! Register Patients Here</h1>	
  <hr>
  		<div class="form-group">
    		<label>Name</label>
        	<input type="text" name="name" class="w3-input w3-border" placeholder="Type Your Name Here" 
            data-validation="required">
    	</div>
    
    	<div class="form-group" >
    		<label>Address</label>
        	<textarea class="w3-input w3-border" name="address" placeholder="Type Your Address Here"
            data-validation="required" style="background-color:#f1f1f1"
            ></textarea>
    	</div>
        
        <div class="form-group">
    		<label>NIC number</label>
        	<input type="text" class="w3-input w3-border" name="nic"    
            data-validation="length" data-validation-length="10-10"  
            data-validation-error-msg="Invalid NIC Number"              
            placeholder="eg:93XXXXXXXv">
    	</div>
        
        <div class="form-group">
    		<label>Telephone Number(mobile)</label>
        	<input type="text" class="w3-input w3-border"  name="tpm" 
                 data-validation="length" data-validation-length="9-10" 
                 data-validation-error-msg="Telephone Number has to be a 10 numbers"
             placeholder="Type your telephone Number">
    	</div>
        
        <div class="form-group">
    		<label>Telephone Number(home)</label>
        	<input type="text" class="w3-input w3-border"  name="tph" 
                 data-validation="length" data-validation-length="9-10" 
                 data-validation-error-msg="Telephone Number has to be a 10 numbers"
             placeholder="Type your telephone Number">
    	</div>
        
        <div class="form-group">
    		<label>Email</label>
        	<input type="email" class="w3-input w3-border"   name="email" placeholder="Enter your e-mail address" data-validation="email" style="background-color:#f1f1f1">
    	</div>
        
        <div class="form-group">
    		<label>User Name</label>
        	<input type="text" class="w3-input w3-border"  name="un" placeholder="Enter UserName" data-validation="required">
    	</div>
        
    	<div class="form-group">
    		<label>Password</label>
        	<input type="password"  name="pw" class="w3-input w3-border" data-validation="length alphanumeric" 
		 data-validation-length="8-16" >
    	</div>
    
        
   <div class="clearfix">
      <button type="reset" class="cancelbtn">Cancel</button>
      <button type="submit" name="submit" class="signupbtn" >Sign Up</button>
    </div>
  </form>

 
 </div>

</body>
 <script type="text/javascript"  src="src/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="src/js/bootstrap.min.js"></script>
<script src="src/js/jquery.form-validator.min.js"></script>

    <script>
  $.validate({
    lang: 'en'
  });
</script>
<script type="text/javascript" src="src/js/date/bootstrap-datepicker.min.js"></script>

<script> $(document).ready(function () {
                // Show the Modal on load
                $('#myModal1').modal('show');
});</script>
 <?php include 'footer.php'; ?>

</html>
