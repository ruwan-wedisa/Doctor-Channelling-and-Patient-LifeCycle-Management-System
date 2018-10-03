<?php
require('db.php');


if (isset($_POST['login'])) {
    $email = $_POST['username'];
    $password = $_POST['password'];
    $encryptpassword = md5($password);
	$sql = "SELECT * FROM userlogin WHERE username='".$email."' and password='".$encryptpassword."'";
	
	$result = mysqli_query($conn, $sql);
    $rows = mysqli_num_rows($result);
	
	if ($rows > 0) {
		
		$result =  mysqli_query($conn,"select * from userLogin where username = '".$email."'");
		
		while($row=mysqli_fetch_array($result)){
			$resultcategory = $row['userCategory'];
			$uid =$row['id'];
			$pw = $row['password'];
			$result2 = mysqli_query($conn,"select * from admin WHERE id='".$uid."'");
			$result3 = mysqli_query($conn,"select * from doctor WHERE id='".$uid."'");
			$result4 = mysqli_query($conn,"select * from receptionist WHERE id='".$uid."'");
			$result5 = mysqli_query($conn,"select * from patient WHERE id='".$uid."'");
			
			//echo $resultcategory;
			//echo $uid;

            //Check wheather user is Admin
			if($resultcategory == 1){
				echo $uid;
				$query = "SELECT * FROM otherdetail WHERE id='".$uid."'";
				$result = mysqli_query($conn, $query);
    			$rowss = mysqli_num_rows($result);

                //If there is initial data for adminuser
				if($rowss >0){
				
					session_start();
					$_SESSION['sid']=$resultcategory;
					$_SESSION['userid'] = $uid;
					$_SESSION['userPassword'] = $pw;
					
					
					header('location:admin/index.php');
						while($row=mysqli_fetch_array($result2)){
							session_start();
							$adminName = $row['adminName'];
							$address = $row['address'];
							$email = $row['email'];
							$tel = $row['telNo'];
							$nic = $row['NIC'];
							$telHome = $row['telHome'];
							
							
							$_SESSION['name']=$adminName;
							$_SESSION['address']=$address;
							$_SESSION['email']=$email;
							$_SESSION['tel']=$tel;
							$_SESSION['nic']=$nic;
							$_SESSION['telHome']=$telHome;
						}
						
				}
                //if user admin logs first time
				else{
					session_start();
					$_SESSION['sid']=$resultcategory;
					$_SESSION['userid'] = $uid;
					$_SESSION['userPassword'] = $pw;
				
				
					header('location:admin/firstLog.php');
					while($row=mysqli_fetch_array($result2)){
						session_start();

                        $adminName = $row['adminName'];
						$address = $row['address'];
						$email = $row['email'];
						$tel = $row['telNo'];
						$nic = $row['NIC'];
						$telHome = $row['telHome'];
						
						

                        $_SESSION['name']=$adminName;
						$_SESSION['address']=$address;
						$_SESSION['email']=$email;
						$_SESSION['tel']=$tel;
						$_SESSION['nic']=$nic;
						$_SESSION['telHome']=$telHome;	
					}
				}
			
			}

			//Check wheather user is doctor
            if($resultcategory == 2){
                echo $uid;
                $query = "SELECT * FROM otherdetail WHERE id='".$uid."'";
                $result = mysqli_query($conn, $query);
                $rowss = mysqli_num_rows($result);

                //If there is initial data for doctor user
                if($rowss >0){

                    session_start();
                    $_SESSION['sid']=$resultcategory;
                    $_SESSION['userid'] = $uid;
                    $_SESSION['userPassword'] = $pw;


                    header('location:doctor/index.php');
                    while($row=mysqli_fetch_array($result3)){
                        session_start();

                        $docName = $row['docName'];
                        $address = $row['address'];
                        $email = $row['email'];
                        $tel = $row['telNo'];
                        $nic = $row['NIC'];
                        $telHome = $row['telHome'];


                        $_SESSION['name']=$docName;
                        $_SESSION['address']=$address;
                        $_SESSION['email']=$email;
                        $_SESSION['tel']=$tel;
                        $_SESSION['nic']=$nic;
                        $_SESSION['telHome']=$telHome;
                    }

                }

                //if user logs first time as doctor user
                else{
                    session_start();
                    $_SESSION['sid']=$resultcategory;
                    $_SESSION['userid'] = $uid;
                    $_SESSION['userPassword'] = $pw;


                    header('location:doctor/firstLog.php');
                    while($row=mysqli_fetch_array($result3)){
                        session_start();
                        $docName = $row['docName'];
                        $address = $row['address'];
                        $email = $row['email'];
                        $tel = $row['telNo'];
                        $nic = $row['NIC'];
                        $telHome = $row['telHome'];


                        $_SESSION['name']=$docName;
                        $_SESSION['address']=$address;
                        $_SESSION['email']=$email;
                        $_SESSION['tel']=$tel;
                        $_SESSION['nic']=$nic;
                        $_SESSION['telHome']=$telHome;
                    }
                }

            }

            //Check wheather user is receptionist
            if($resultcategory == 3){
                echo $uid;
                $query = "SELECT * FROM otherdetail WHERE id='".$uid."'";
                $result = mysqli_query($conn, $query);
                $rowss = mysqli_num_rows($result);

                //If there is initial data for receptionist user
                if($rowss >0){

                    session_start();
                    $_SESSION['sid']=$resultcategory;
                    $_SESSION['userid'] = $uid;
                    $_SESSION['userPassword'] = $pw;


                    header('location:receptionist/index.php');
                    while($row=mysqli_fetch_array($result4)){
                        session_start();

                        $recName = $row['recName'];
                        $address = $row['address'];
                        $email = $row['email'];
                        $tel = $row['telNo'];
                        $nic = $row['NIC'];
                        $telHome = $row['telHome'];


                        $_SESSION['name']=$recName;
                        $_SESSION['address']=$address;
                        $_SESSION['email']=$email;
                        $_SESSION['tel']=$tel;
                        $_SESSION['nic']=$nic;
                        $_SESSION['telHome']=$telHome;
                    }

                }
                //If receptionist user logs firsttime
                else{
                    session_start();
                    $_SESSION['sid']=$resultcategory;
                    $_SESSION['userid'] = $uid;
                    $_SESSION['userPassword'] = $pw;


                    header('location:receptionist/firstLog.php');
                    while($row=mysqli_fetch_array($result4)){
                        session_start();
                        $recName = $row['recName'];
                        $address = $row['address'];
                        $email = $row['email'];
                        $tel = $row['telNo'];
                        $nic = $row['NIC'];
                        $telHome = $row['telHome'];


                        $_SESSION['name']=$recName;
                        $_SESSION['address']=$address;
                        $_SESSION['email']=$email;
                        $_SESSION['tel']=$tel;
                        $_SESSION['nic']=$nic;
                        $_SESSION['telHome']=$telHome;
                    }
                }

            }

            //Check wheather user is patient
			if($resultcategory == 4){
				echo "Hiiiiiiiiiii";
				$query = "SELECT * FROM otherdetail WHERE id='".$uid."'";
				$result = mysqli_query($conn, $query);
    			$rowss = mysqli_num_rows($result);

    			//if patient user has initial data
				if($rowss >0){
				
					session_start();
					$_SESSION['sid4']=$resultcategory;
					$_SESSION['userid'] = $uid;
					$_SESSION['userPassword'] = $pw;
					
					header('location:patient/index.php');
						while($row=mysqli_fetch_array($result5)){
							session_start();
							$patientName = $row['patientName'];
							$address = $row['address'];
							$email = $row['email'];
							$tel = $row['telNo'];
							$telHom = $row['telHome'];
							$nic = $row['NIC'];

							
							$_SESSION['name']=$patientName;
							$_SESSION['address']=$address;
							$_SESSION['email']=$email;
							$_SESSION['tel']=$tel;
							$_SESSION['telHome']=$telHom;	
							$_SESSION['nic']=$nic;
				
						}
				}
                //if patient user logs first time
				else{
						//echo "Hiiiiiiiiiii";
						session_start();
						$_SESSION['sid4']=$resultcategory;
						$_SESSION['userid'] = $uid;
						$_SESSION['userPassword'] = $pw;
					
					header('location:patient/firstLog.php');
						while($row=mysqli_fetch_array($result5)){
							session_start();
							$patientName = $row['patientName'];
							$address = $row['address'];
							$email = $row['email'];
							$tel = $row['telNo'];
							$telHom = $row['telHome'];
							$nic = $row['NIC'];
							
							$_SESSION['name']=$patientName;
							$_SESSION['address']=$address;
							$_SESSION['email']=$email;
							$_SESSION['tel']=$tel;
							$_SESSION['telHome']=$telHom;
							$_SESSION['nic']=$nic;
							
						}
					}
		
			
				
		
		}
		}
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
        <p>Incorrrect Password!!..Try Again.</p>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-success' data-dismiss='modal'>Close</button>
      </div>
    </div>

  </div>
</div> ";
        
    }  
	
	
		
	}






?>







<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="src/css/bootstrap337/bootstrap.min.css">
 
      <link rel="stylesheet" href="src/web-fonts-with-css/css/fontawesome-all.css">
	<link rel="stylesheet" href="src/web-fonts-with-css/css/fontawesome-all.min.css"> 
     <link rel="stylesheet" href="src/w3.css">



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
             
            <?php include 'navbarHome.php'; ?>
        
        </div>
        <div class="w3-display-container w3-content img-responsive"  style="max-width:1500px; height:500px">
		
        <img src="images/b.jpg" alt="Table" class="w3-opacity-max" style="max-width:1500px; height:585px">
        
        
  
 
<div class="w3-container w3-half w3-margin-top w3-display-middle" style="padding-top:70px ; padding-left:80px ;  padding-right:80px">
<header class="w3-container w3-blue" align="center">
  <h1>Login</h1>
</header>

<form class="w3-container w3-card-4 w3-white " method="post" name="login" >

            <div class="w3-row w3-section">
            <label>User Name</label>
              <div class="input-group">
					<span class="input-group-addon">
						<i class="fas fa-user"></i>
					</span> 
                	<input type="text"  class="w3-input w3-border" name="username" placeholder="Username" required="required"   autofocus/>
              </div>
            </div>
<div class="w3-row w3-section ">
			<label>Password</label>
              <div class="input-group">
					<span class="input-group-addon">
						
                        <i class="fas fa-key"></i>
					</span>
                            
                	<input type="password" class="w3-input w3-border " name="password" placeholder="Password" required="required"  autofocus/>
              </div>
            </div>


<div class="w3-row w3-section w3 w3-text-black" ><div class=""> Forgot passoword? </div>
</div>

    <div class="w3-row w3-section w3"><div class=""><div class="panel-footer">
    								
                   					 No Worries, <a href="reset_pw.php" style="text-decoration:underline">Click Here</a> to get New password or <a href="register_patient.php" style="text-decoration:underline">Create an Account</a>
                    
  									</div></div></div>

  <button type="submit" class="w3-button w3-block w3-half w3-blue w3-section w3-ripple w3-padding" name="login">Login</button>
  <button class="w3-button w3-block w3-half w3-section w3-red  w3-ripple w3-padding">Cancel</button>

</form>

</div>
</div>
<br><br><br><br>

 <?php include 'footer.php'; ?>


</body>
 <script type="text/javascript"  src="src/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="src/js/bootstrap.min.js"></script>
        <script> $(document).ready(function () {
                // Show the Modal on load
                $('#myModal1').modal('show');
});</script>
</html>

