<?php
include('db.php');
session_start();
$uid=$_SESSION['userid'];
$pw =$_SESSION['userPassword'];
//echo $pw;
?>
<!doctype html>
<html lang="en">
<head>
    <title>director Message UPDATE</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="../src/css/bootstrap.min.css" rel="stylesheet">
    <link href="../src/w3.css">

    <style>
        .custom{
            width:45%;
            height::75%;
            margin-top: 10px;
            margin-bottom: 100px;
            margin-right: 150px;
            margin-left: 150px;
            min-width:350px;
        }

        #div_color {
            background-color: #E3E3E3;

        }
    </style>


</head>
<body>

<div id="container" >
    <?php include 'header.php'; ?>
</div>
<br><br><br>
<div class="container" style="margin-top: 25px;margin-left: 150px;" id="div_color">
    <h3 class="text-left"><strong>Update your Password</strong></h3>
</div>
<br>
<div class="container custom">
    <form method="post" action="updatepassword.php" id="form">

        <div class="form-group">
            <label>Enter Currunt Password:</label>
            <input type="password" name="cpw" class="w3-input w3-border" placeholder="Currunt password"
                   required>
        </div>

        <div class="form-group">
            <label>Enter New Password:</label>
            <input type="password" name="npw" class="w3-input w3-border" placeholder="New password"
                   data-validation="length alphanumeric"
                   data-validation-length="8-16">
        </div>

        <div class="form-group">
            <label>Confirm Password:</label>
            <input type="password" name="conpw" class="w3-input w3-border" placeholder="Confirm new password"
                   data-validation="length alphanumeric"
                   data-validation-length="8-16">
        </div>


        <div class="form-group">
            <input type="submit" name="submit" class="w3-button w3-blue" value="Submit">
        </div>
    </form>
</div>

<?php
if(isset($_POST['submit'])){
    $curr = $_POST['cpw'];
    $currunt = md5($curr);
    $ne = $_POST['npw'];
    $new = md5($ne);
    $confi = $_POST['conpw'];
    $confirm = md5($confi);


    //$encryptcpw =  md5($currunt);


    if($pw == $currunt){

        if($new==$confirm){
            $encryptnpw = md5($new);
            $query = "UPDATE userlogin SET password = '".$new."' WHERE id='".$uid."'";
            if(mysqli_query($conn, $query)){
                echo "<div id='myModal1' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header bg-success text-white'>
        
        
		<h4 class='modal-title'>Error</h4>
		<button type='button' class='close' data-dismiss='modal'>&times;</button>
      </div>
      <div class='modal-body'>
        <p>Successfully Updated Your Password!.</p>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-success' data-dismiss='modal'>Close</button>
      </div>
    </div>

  </div>
</div> ";

            }
        }
        else{
            echo "<div id='myModal1' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header bg-danger text-white'>
        
        
		<h4 class='modal-title'>Error</h4>
		<button type='button' class='close' data-dismiss='modal'>&times;</button>
      </div>
      <div class='modal-body'>
        <p>Your New Password and Confirm Password must be same.</p>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-success' data-dismiss='modal'>Close</button>
      </div>
    </div>

  </div>
</div> ";
        }
    }
    else
    {
        echo "<div id='myModal1' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header bg-danger text-white'>
        
        
		<h4 class='modal-title'>Error</h4>
		<button type='button' class='close' data-dismiss='modal'>&times;</button>
      </div>
      <div class='modal-body'>
        <p>Enter Your Currunt Password Correctly!</p>
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
</div>


<?php include 'footer.php'; ?>
<script src="../src/js/jquery-3.2.1.min.js"></script>
<script src="../src/js/jquery.form-validator.min.js"></script>
<script type="text/javascript" src="../src/js/bootstrap.min.js"></script>
<script> $(document).ready(function () {
        // Show the Modal on load
        $('#myModal1').modal('show');
    });
</script>

<script>
    $.validate({
        lang: 'en'
    });
</script>

<div class="navbar-fixed-bottom">

</div>
</body>
</html>

