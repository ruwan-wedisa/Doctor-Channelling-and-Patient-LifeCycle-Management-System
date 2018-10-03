
<?php
include("db.php");
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Doctor Channelling</title>
        <link href="src/css/bootstrap.min.css" rel="stylesheet"/>

        <link href="css/style.css" rel="stylesheet"/>
        <style>
        .custom{
  				width:50%;
				
  				margin:0 auto;
  				min-width:350px;
				
                }
		</style>
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
    <div>
        <?php include 'navbarHome.php'; ?>
    </div>

    <div class="w3-display-container w3-content img-responsive"  style="max-width:1500px; height:500px">
		
        <img src="images/b.jpg" alt="Table" class="w3-opacity-max" style="max-width:1500px; height:585px">
        <br><br><br><br>
        	<div class="panel panel-primary custom"  >
  				<div class="panel-heading " >
    				<h1 class="panel-title">Reset Your Password</h1>
                    
  				</div>
  				<div class="panel-body">
                	<form class="form"  action="resetPasswordCode.php" method="post" name="form">
    				<div class="form-group">

                            
                            <label>Enter Your USER NAME:</label></br>
                			<input type="text"  class="form-control" name="username" placeholder= "Enter your Email Address"  required/></br>


            				

                            <input type="submit" name="reset" class="btn btn-primary btn-md" value="Reset">
                            <a href="login_Form.php"  class="btn btn-danger btn-md"> Cancel</a>
                            
            			
        			</div>
                    </form>
  				</div>
			</div>    
            </div>








    </body>
</html>
<script type="text/javascript"  src="src/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="src/js/bootstrap.min.js"></script>



<?php include 'footer.php'; ?>