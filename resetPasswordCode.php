
<?php

require('db.php');

if(isset($_POST['reset'])){
    $un = $_POST['username'];

    $query = "SELECT * FROM userLogin WHERE userName='".$un."' " ;
    $result = mysqli_query($conn, $query);
    $rows = mysqli_num_rows($result);

    if ($rows > 0) {

        $result =  mysqli_query($conn,"select * from userLogin where username = '".$un."'");

        while($row=mysqli_fetch_array($result)){
            $pw = $row['password'];
            $resultcategory = $row['userCategory'];
            $id = $row['id'];

            function random_password($length = 10) {
                $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
                $password = substr(str_shuffle($chars), 0, $length);
                return $password;
            }

            $randompass = random_password(10);
            $encryptpass = md5($randompass);

            $query2 = "UPDATE userLogin SET password='".$encryptpass."' WHERE userName='".$un."' ";

            if(mysqli_query($conn, $query2)){


                //If admin
                if($resultcategory==1){
                    $queryAdmin = mysqli_query($conn,"SELECT email FROM admin WHERE id='".$id."'");
                    while($row=mysqli_fetch_array($queryAdmin)){
                        $email =  $row['email'];
                        $subject = 'Reset Your Password E-channelling!!';

                        $from = 'UVA Hospital PVT LTD';

                        // To send HTML mail, the Content-type header must be set

                        $headers  = 'MIME-Version: 1.0' . "\r\n";

                        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";


                        // Create email headers

                        $headers .= 'From: '.$from."\r\n".

                            'Reply-To: '.$from."\r\n" .

                            'X-Mailer: PHP/' . phpversion();


                        // Compose a simple HTML email message

                        $message = '<html><body>';

                        $message .= '<h1 style="color:#f40;">Hi</h1>';

                        $message .= '<p style="color:#080;font-size:18px;">Your New Password is<u style="color: #0f0f0f"> '.$randompass.'</u></p>';

                        $message .= '</body></html>';


                        if(mail($email, $subject, $message, $headers)){
                            echo "<div id='myModal1' class='modal fade' role='dialog' data-backdrop='static'>
						  <div class='modal-dialog'>
						
							<!-- Modal content-->
							<div class='modal-content'>
							  <div class='modal-header bg-success text-white'>
								
								
								<h4 class='modal-title'>Password Reset Successfull</h4>
								<button type='button' class='close' data-dismiss='modal'>&times;</button>
							  </div>
							  <div class='modal-body'>
								<p>Your New Password has been sent to your E-mail..!</p>
							  </div>
							  <div class='modal-footer'>
								<a href='login_Form.php '  class='btn btn-danger'> Close</button></a>
							  </div>
							</div>
						
						  </div>
						</div> ";
                        }else{

                            echo "<div id='myModal1' class='modal fade' role='dialog' data-backdrop='static'>
						  <div class='modal-dialog'>
						
							<!-- Modal content-->
							<div class='modal-content'>
							  <div class='modal-header bg-danger text-white'>
								
								
								<h4 class='modal-title'>Reset Unsuccessfull</h4>
								<button type='button' class='close' data-dismiss='modal'>&times;</button>
							  </div>
							  <div class='modal-body'>
								<p>Fail to Update Password!!..</p>
							  </div>
							  <div class='modal-footer'>
								<a href='login_Form.php '  class='btn btn-danger'> Close</button></a>
							  </div>
							</div>
						
						  </div>
						</div> ";
                        }

                    }

                }



                //If doctor
                else if($resultcategory == 2){
                    $querydoctor = mysqli_query($conn,"SELECT email FROM doctor WHERE id='".$id."'");
                    while($row2=mysqli_fetch_array($querydoctor)){
                        $email =  $row['email'];
                        $subject = 'Reset Your Password E-channelling!!';

                        $from = 'UVA Hospital PVT LTD';

                        // To send HTML mail, the Content-type header must be set

                        $headers  = 'MIME-Version: 1.0' . "\r\n";

                        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";


                        // Create email headers

                        $headers .= 'From: '.$from."\r\n".

                            'Reply-To: '.$from."\r\n" .

                            'X-Mailer: PHP/' . phpversion();


                        // Compose a simple HTML email message

                        $message = '<html><body>';

                        $message .= '<h1 style="color:#f40;">Hi</h1>';

                        $message .= '<p style="color:#080;font-size:18px;">Your New Password is<u style="color: #0f0f0f"> '.$randompass.'</u></p>';

                        $message .= '</body></html>';


                        if(mail($email, $subject, $message, $headers)){
                            echo "<div id='myModal1' class='modal fade' role='dialog' data-backdrop='static'>
						  <div class='modal-dialog'>
						
							<!-- Modal content-->
							<div class='modal-content'>
							  <div class='modal-header bg-success text-white'>
								
								
								<h4 class='modal-title'>Password Reset Successfull</h4>
								<button type='button' class='close' data-dismiss='modal'>&times;</button>
							  </div>
							  <div class='modal-body'>
								<p>Your New Password has been sent to your E-mail..!</p>
							  </div>
							  <div class='modal-footer'>
								<a href='login_Form.php '  class='btn btn-danger'> Close</button></a>
							  </div>
							</div>
						
						  </div>
						</div> ";
                        }else{

                            echo "<div id='myModal1' class='modal fade' role='dialog' data-backdrop='static'>
						  <div class='modal-dialog'>
						
							<!-- Modal content-->
							<div class='modal-content'>
							  <div class='modal-header bg-danger text-white'>
								
								
								<h4 class='modal-title'>Reset Unsuccessfull</h4>
								<button type='button' class='close' data-dismiss='modal'>&times;</button>
							  </div>
							  <div class='modal-body'>
								<p>Fail to Update Password!!..</p>
							  </div>
							  <div class='modal-footer'>
								<a href='login_Form.php '  class='btn btn-danger'> Close</button></a>
							  </div>
							</div>
						
						  </div>
						</div> ";
                        }

                    }

                }






                //If receptionist
                else if($resultcategory==3){
                    $queryrecep = mysqli_query($conn,"SELECT email FROM receptionist WHERE id='".$id."'");
                    while($row=mysqli_fetch_array($queryrecep)){
                        $email =  $row['email'];
                        $subject = 'Reset Your Password E-channelling!!';

                        $from = 'UVA Hospital PVT LTD';

                        // To send HTML mail, the Content-type header must be set

                        $headers  = 'MIME-Version: 1.0' . "\r\n";

                        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";


                        // Create email headers

                        $headers .= 'From: '.$from."\r\n".

                            'Reply-To: '.$from."\r\n" .

                            'X-Mailer: PHP/' . phpversion();


                        // Compose a simple HTML email message

                        $message = '<html><body>';

                        $message .= '<h1 style="color:#f40;">Hi</h1>';

                        $message .= '<p style="color:#080;font-size:18px;">Your New Password is<u style="color: #0f0f0f"> '.$randompass.'</u></p>';

                        $message .= '</body></html>';


                        if(mail($email, $subject, $message, $headers)){

                            echo "<div id='myModal1' class='modal fade' role='dialog' data-backdrop='static'>
						  <div class='modal-dialog'>
						
							<!-- Modal content-->
							<div class='modal-content'>
							  <div class='modal-header bg-success text-white'>
								
								
								<h4 class='modal-title'>Password Reset  Successfull</h4>
								<button type='button' class='close' data-dismiss='modal'>&times;</button>
							  </div>
							  <div class='modal-body'>
								<p>Your New Password has been sent to your E-mail..!</p>
							  </div>
							  <div class='modal-footer'>
								<a href='login_Form.php '  class='btn btn-danger'> Close</button></a>
							  </div>
							</div>
						
						  </div>
						</div> ";
                        }else{

                            echo "<div id='myModal1' class='modal fade' role='dialog' data-backdrop='static'>
						  <div class='modal-dialog'>
						
							<!-- Modal content-->
							<div class='modal-content'>
							  <div class='modal-header bg-danger text-white'>
								
								
								<h4 class='modal-title'>Reset Unsuccessfull</h4>
								<button type='button' class='close' data-dismiss='modal'>&times;</button>
							  </div>
							  <div class='modal-body'>
								<p>Fail to Update Password!!..</p>
							  </div>
							  <div class='modal-footer'>
								<a href='login_Form.php '  class='btn btn-danger'> Close</button></a>
							  </div>
							</div>
						
						  </div>
						</div> ";
                        }

                    }

                }



                //If patient
                else if($resultcategory==4){
                    $queryrPatient = mysqli_query($conn,"SELECT email FROM patient WHERE id='".$id."'");
                    while($row=mysqli_fetch_array($queryrPatient)){
                        $email =  $row['email'];


                        $subject = 'Reset Your Password E-channelling!!';

                        $from = 'UVA Hospital PVT LTD';

                        // To send HTML mail, the Content-type header must be set

                        $headers  = 'MIME-Version: 1.0' . "\r\n";

                        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";


                        // Create email headers

                        $headers .= 'From: '.$from."\r\n".

                            'Reply-To: '.$from."\r\n" .

                            'X-Mailer: PHP/' . phpversion();


                        // Compose a simple HTML email message

                        $message = '<html><body>';

                        $message .= '<h1 style="color:#f40;">Hi</h1>';

                        $message .= '<p style="color:#080;font-size:18px;">Your New Password is<u style="color: #0f0f0f"> '.$randompass.'</u></p>';

                        $message .= '</body></html>';


                        if(mail($email, $subject, $message, $headers)){

                            echo "<div id='myModal1' class='modal fade' role='dialog' data-backdrop='static'>
						  <div class='modal-dialog'>
						
							<!-- Modal content-->
							<div class='modal-content'>
							  <div class='modal-header bg-success text-white'>
								
								
								<h4 class='modal-title'>Password Reset Successfull</h4>
								<button type='button' class='close' data-dismiss='modal'>&times;</button>
							  </div>
							  <div class='modal-body'>
								<p>Your New Password has been sent to your E-mail..!</p>
							  </div>
							  <div class='modal-footer'>
								<a href='login_Form.php '  class='btn btn-danger'> Close</button></a>
							  </div>
							</div>
						
						  </div>
						</div> ";
                        }else{

                            echo "<div id='myModal1' class='modal fade' role='dialog' data-backdrop='static'>
						  <div class='modal-dialog'>
						
							<!-- Modal content-->
							<div class='modal-content'>
							  <div class='modal-header bg-danger text-white'>
								
								
								<h4 class='modal-title'>Reset Unsuccessfull</h4>
								<button type='button' class='close' data-dismiss='modal'>&times;</button>
							  </div>
							  <div class='modal-body'>
								<p>Fail to Update Password!!..</p>
							  </div>
							  <div class='modal-footer'>
								<a href='login_Form.php '  class='btn btn-danger'> Close</button></a>
							  </div>
							</div>
						
						  </div>
						</div> ";
                        }

                    }

                }









            }


        }
    }



}






?>


<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>|Wiyaluwa Zonal Education Office|</title>
    <link href="src/css/bootstrap.min.css" rel="stylesheet"/>

    <style>
        .custom{
            width:65%;

            margin:0 auto;
            min-width:350px;

        }
    </style>

</head>
<body>
<div id="container">
    <?php include 'header.php'; ?>

    <div class="panel panel-default custom">
        <div class="panel-heading" >
            <h1 class="panel-title">Find Your Account </h1>

        </div>
        <div class="panel-body">

        </div>
    </div>

</div>



<div class="navbar-fixed-bottom">
    <?php include 'footer.php'; ?>
</div>
<script type="text/javascript"  src="src/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="src/js/bootstrap.min.js"></script>
<script> $(document).ready(function () {
        // Show the Modal on load
        $('#myModal1').modal('show');
    });</script>


</body>
</html>





