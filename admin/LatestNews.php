<!DOCTYPE html>
<?php 
require_once('db.php');
session_start();
?>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>	
.button{

	opacity:1;
	
	
}
img {
    position: absolute;
    left: 0px;
    top: 0px;
    z-index: -1;
}
</style>
<body bgcolor="#F0F0F0">
<div id="container">
            <?php include 'header.php'; ?>
        </div>

  
  <br><br><br><br><br><br><br>
<table border="0" width="400"  cellspacing="0" cellpadding="0" align="center">
	<tr>
	<th>
<form action="LatestNews.php" method="post">
<input type="text" name="comment" style="width:9cm;height:3cm;">
<br><br>
<button type="submit" name="btnSave" class="btn btn-primary btn-group-justified" style="width:9cm;">Submit News
</button>
</form>
</th>
</tr>
</table>
  <?php
  if(isset($_POST['btnSave'])){
          $comment = $_POST['comment'];
	$query = "INSERT INTO latestnewsupdate(message)VALUES('$comment')";
	$result= mysqli_query($conn,$query);
	if($result){}
          else{
            echo $connection->error;
          }}
	?>
	
	
	
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div class="navbar-fixed-bottom">
 <?php include 'footer.php'; ?>
</div>
</body>
</html>	