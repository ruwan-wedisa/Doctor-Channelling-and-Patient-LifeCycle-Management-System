<?php

include("db.php");


 if(isset($_POST['sheduleSubmit'])){
 	$docId = $_POST["docName"];
 	$docType = $_POST["docType"];

	$day="";
 	if($docType == "Annualy"){
 		//$day = $_POST["month"]."/".$_POST["day"];
 	}
 	if($docType == "Monthly"){
 		$day = $_POST["day"];
 	}
 	if($docType == "Weekly"){
 		$day = $_POST["day"];
 	}if($docType == "Sepecial"){
 		$day = $_POST["exactDate"];
 	}if($docType == "Daily"){
 		$day ="*";
	}

 	mysqli_query($conn,"insert into doctor_shedule(doctorId,sheduleType,day) values('".$docId."','".$docType."','".$day."')");

 	echo "Successfull. <br/> <a href='set_doctor_shedule.php'>Go Back</a>";
 }

?>
