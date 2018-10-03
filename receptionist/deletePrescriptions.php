<?php
session_start();
require('db.php');

?>
<?php
$id=$_REQUEST['ID'];
echo $id;
if(isset($_POST['delete'])){

$query = "DELETE FROM uploadedprescriptions WHERE  id='".$id."'";

if(mysqli_query($conn, $query)){
    header('location:myHealth.php');


}
else{
    echo "fail";
}

}



?>