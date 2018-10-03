<?php
session_start();
require('db.php');
$uid=$_SESSION['userid'];
?>
<!DOCTYPE html>
<html><head>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="../src/js/bootstrap4/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="../src/js/bootstrap4/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="../src/js/bootstrap4/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
  <script src="../src/js/jquery/331/jquery.min.js"></script>
  
  <link rel="stylesheet" href="../src/w3.css">
      <link rel="stylesheet" href="../src/font-awesome.min.css">
	<link rel="stylesheet" href="../src/web-fonts-with-css/css/fontawesome-all.min.css">    
	<link rel="stylesheet" href="../src/css/bootstrap4/bootstrap.min.css">
	<script defer src="../src/js/fontAwesome5/all.js" integrity="sha384-Voup2lBiiyZYkRto2XWqbzxHXwzcm4A5RfdfG6466bu5LqjwwrjXCMBQBLMWh7qR" crossorigin="anonymous"></script>
<style>#div_color {
    background-color: #E3E3E3;
}
#mark{
	background-color: red;
}

</style>
</head>
<body>
<div id="container">
            <?php include 'header.php'; ?>
        </div>
<div class="w3-container w3-padding" id="div_color" >
			<br><br><br><br>
			<div class="w3-container w3-padding" >
				<h1 align="center" style="font-size:40px"><strong>Welcome to Echannelling.lk User Profile,</h1><br><p align="center" style="font-size:22px">
your personal assistant in keeping your health record tracked</strong></p>
				<hr>
			</div>
            <br>
			<div class="row">
          
				<div class="container w3-center" style="padding-bottom:85px">
					<a href="completeProfile.php"><button class="w3-btn w3-khaki w3-hover-blue w3-xxlarge">Complete Your Profile</button></a>
				</div>

			</div>
			

	</div>
    

	

<hr>

<br>

</body>
</html> 