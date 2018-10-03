<?php

require('db.php');
$name=$_SESSION['name'];

?>
<!DOCTYPE html>
<html>
<head>
<title>Doctor Channelling</title>
    
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="src/w3.css">
<link rel="stylesheet" href="src/latin_font.css">    

    <link rel="stylesheet" href="src/web-fonts-with-css/css/fontawesome-all.css">
	<link rel="stylesheet" href="src/web-fonts-with-css/css/fontawesome-all.min.css">
<link rel="stylesheet" href="../src/css/bootstrap4/bootstrap.min.css">
<link rel="stylesheet" href="src/web-fonts-with-css/css/fontawesome-all.min.css">     
 


<style>
body {font-family: "Times New Roman", Georgia, Serif;}
h1,h2,h3,h4,h5,h6 {
    font-family: "Playfair Display";
    letter-spacing: 5px;
}
</style>

<head>
<body>
<!-- Navbar -->
<div class="w3-top ">
  <div class="w3-bar w3-red w3-card w3-padding ">
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="index.php" class="w3-bar-item w3-button w3-padding-large">HOME</a>
    <a href="my_bookings.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">MY BOOKINGS</a>
    <a href="search_Doc.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">DOCTORS</a>
    <a href="searchPatiens.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">SEARCH PATIENT</a>
      <a href="add_like.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">FORUM</a>
    <div class="w3-dropdown-hover w3-hide-small">
      <button class="w3-padding-large w3-button" title="More">MORE <i class="fa fa-caret-down"></i></button>     
      <div class="w3-dropdown-content w3-bar-block w3-card-4">
        <a href="terms.php" class="w3-bar-item w3-button">Terms And Conditions</a>
        <a href="NewsFeed.php" class="w3-bar-item w3-button">News</a>
        <a href="About.php" class="w3-bar-item w3-button">About</a>
      </div>
    </div>
    
  <!--  <div class="w3-padding-large w3-hover-black w3-hide-small w3-right "><i class="fas fa-user-circle fa-2x "></i>&nbsp; <span class="w3-padding-16 ">Ruwan Wedisa</span></div>-->
    
    
						<!--<ul class="dropdown-menu">
                        <li><a href="#">Update Password</a></li>
                        <li><a href="#">Update Details</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="#">Log out</a></li>
                        
                    </ul>
						
						 </li>
     
 </ul> -->
 
 
<div class="w3-dropdown-hover w3-hide-small w3-hide-small w3-right">
		
      <button class=" w3-button"><i class="fas fa-user-circle fa-2x "></i>&nbsp; <?php echo $name ;?> <i class="fa fa-caret-down"></i></button>     
      <div class="w3-dropdown-content w3-bar-block w3-card-4">
        <a href="updatepassword.php" class="w3-bar-item w3-button">Update Password</a>
        <a href="My_account.php" class="w3-bar-item w3-button">Update Details</a>
        
        <a href="../logout.php" class="w3-bar-item w3-button">Log out</a>
      </div>
    </div>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 

</div>



</body>

</html>