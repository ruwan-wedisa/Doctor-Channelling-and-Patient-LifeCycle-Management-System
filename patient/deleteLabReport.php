<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "echannelling";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_REQUEST["id"])) {
    // Get parameters
    $delid = $_REQUEST["id"];
    $sql3 = "SELECT * FROM labreport WHERE id = '$delid'";
    $result = mysqli_query($conn, $sql3);
    $row = mysqli_fetch_assoc($result);
    $delFile = $row["fileName"];
    unlink("uploads/" . $delFile);
    $sql2 = "DELETE FROM labreport WHERE id = '$delid'";
    mysqli_query($conn, $sql2);
    header("Location: labReport.php");
}
?>