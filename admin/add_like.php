<?php session_start();
include('db.php');
    ?>
<!doctype html>
<html>
<head>
	<title>Article</title>
	  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
<link href="css/bootstrap.css" rel="stylesheet"/>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/like.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>


</head>
<script>src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script type="text/javascript">


$(document).ready(function(){
    $("button").click(function(){
		$("text").toggle();
    });
});
</script>

<script>
$(document).ready(function(){
	// Delete 
     // Delete 
     $('.delete').click(function(){
	  var comment = prompt("Enter the comment : ", "");
      var el = this;
      var id = this.id;
      var splitid = id.split("_");
    
      // Delete id
      var deleteid = splitid[1];
     
     $.ajax({    //display insert data
        type: "POST",
        url: "reply.php",
        data: "id=" + deleteid + "&comment=" +comment,             
        success: function(response){    
            alert("Reply Completed");
        }
    });
	
     });
});
</script>



<body background="images/Abstract.jpg">
<div id="container">
    <?php include 'header_after_log.php'; ?>
</div>


<?php
$_SESSION['userid'];
$userid=$_SESSION['userid'];
	
if(isset($_POST['btnSave'])){
		$comment=$_POST['comment'];

		if(empty($comment)){
		$errorMsg='Please enter your comment';
		}
			

if(isset($errorMsg)){
?>
<div id='myModal1' class='modal fade' role='dialog'>
						  <div class='modal-dialog'>
						
							<!-- Modal content-->
							<div class='modal-content'>
						
							  <div class='modal-body'>
								<p><?php echo $errorMsg; ?></p>
							  </div>
							
							</div>
						
						  </div>
						</div>
<?php
}


	if (!isset($errorMsg)) {
		
		$sql=mysqli_query($conn,"insert into comments (id,comment) values('$userid','$comment')");
		

?>
<div id='myModal1' class='modal fade' role='dialog'>
						  <div class='modal-dialog'>
						
							<!-- Modal content-->
							<div class='modal-content'>
							  
							  <div class='modal-body'>
								<p>Thank you for your comment.</p>
							  </div>
							  
							</div>
						
						  </div>
						</div>
<?php
}
 header('refresh:4;add_like.php');
}

?>




	<?php
$query=mysqli_query($conn,"select COUNT(comment_id ) from comments");

	$comrow = mysqli_fetch_row($query);
			$comments=$comrow[0];			

?>
<br>


		
		
		
		<br>
		<br>

		
<div class="container">

<hr>
<p style="font-size: 24px">Doctor  Ask  Forum</p><span style="margin-left:150px;"></span>
        <p><b><?php echo $comments;?>comments</b></p>
<hr>
<br>

<div class="table-responsive">
<table class="table table-striped" align='center' width='70%'>

<?php
$query=mysqli_query($conn,"Select * from comments,userlogin where comments.id=userlogin.id");

if(mysqli_num_rows($query)){
	while($row = mysqli_fetch_assoc($query)){
		?>
		
		<?php
		if($row['userCategory']==1){
		$msg="Admin /";
		}
			
		elseif($row['userCategory']==2){
		$msg="Dr.";
		}
		elseif($row['userCategory']==3){
		$msg="Receptionalist /";
		}
		elseif($row['userCategory']==4){
		$msg="Patient(Mr/Mrs) /";
		}
		
		
		?>
		
<thead><th style="color:#0f0f0f;background:rgba(25,20,0,0.2);"><b><?php echo $msg?> <nbsp;> <?php echo $row['userName']?></b></p> </th><th></th></thead>
<tr><td style="align:center;"><p class="text-info "><b>Comment:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp<?php echo $row['comment']?><b></p></td>

	
<?php 
$id = $row['comment_id'];
?>
                      
</tr>
<tr><td style="color:grey;"><p><b>Reply:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['reply']?> <b></p> </td>
		<td><br><br><br><br><br></td>
</tr>

  <?php
}
}
?> 

<?php if(isset($_POST['btnsav'])){

$reply=$_POST['reply'];
$query1=mysqli_query($conn,"Select comment_id from comments");
echo "happy";
if(mysqli_num_rows($query1)){
	while($row = mysqli_fetch_assoc($query1)){
		$comment_id=$row['comment_id'];
	
$sql2="update comments set reply='$reply' where comment_id=$comment_id";
}
}
}?>

</table>
</div>


<br><br>


	<table border="0" width="400"  cellspacing="0" cellpadding="0" align="center">
	<tr>
	<th>
<form action="add_like.php" method="post">
<input type="text" name="comment" style="width:9cm;height:3cm;">
<br><br>
<button type="submit" name="btnSave" class="btn btn-primary btn-group-justified" style="width:9cm;">Submit comment
</button>
</form>
</th>
</tr>

    </table>
<br>
<br>
<br>
<br>
</div>
</body>

<script type="text/javascript"  src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script> $(document).ready(function () {
                // Show the Modal on load
                $('#myModal1').modal('show');
});</script>


