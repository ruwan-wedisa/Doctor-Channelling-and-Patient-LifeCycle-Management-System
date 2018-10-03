<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../src/css/bootstrap4/bootstrap.min.css">
  <script src="../src/js/jquery/331/jquery.min.js"></script>
  <script src="../src/js/bootstrap337/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../src/w3.css">
  
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}

hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}

/* Set a style for all buttons */
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

/* Add padding to container elements */
.container {
    padding: 25px;
}


/* Change styles for cancel button and signup button on extra small screens */
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
 <div class="container">
<form action="/action_page.php" style="border:5px solid #ccc">
  <div class="container" >
    <h1 class="w3-blue w3-padding">Welcome!</h1>
    
    <hr>
    
    
	<label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" >
    
    <label for="nic"><b>NIC Number</b></label>
    <input type="text" placeholder="Enter NIC number" name="nic" >
    
    <label for="phone_number"><b>Telephone</b></label>
    <input type="text" placeholder="Enter Telephone Number" name="tp" >
    
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
    
    <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>
    
    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn">Sign Up</button>
    </div>
  </div>
</form>
 </div>

</body>
<div class="navbar-fixed-bottom" style="padding-top:60px">
 <?php include 'footer.php'; ?>
</div>
</html>
