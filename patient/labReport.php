<!DOCTYPE html>
<?php
include('db.php');

session_start();

$userid = $_SESSION['userid'];


?>
<?php
$submitedId = $_REQUEST['id'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "echannelling";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql2 = "SELECT * FROM labreport WHERE reportCategory= 1 AND patienId='$userid' ORDER BY id DESC ";
$result = mysqli_query($conn, $sql2);
$sql3 = "SELECT * FROM labreport WHERE reportCategory= 2 AND patienId='$userid' ORDER BY id DESC";
$result3 = mysqli_query($conn, $sql3);
$sql4 = "SELECT * FROM labreport WHERE reportCategory= 3 AND patienId='$userid' ORDER BY id DESC";
$result4 = mysqli_query($conn, $sql4);
$sql5 = "SELECT * FROM labreport WHERE reportCategory= 4 AND patienId='$userid'  ORDER BY id DESC";
$result5 = mysqli_query($conn, $sql5);
?>
<html>
    <head>
        <title>W3.CSS</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="../src/font-awesome.min.css">
        <link rel="stylesheet" href="../src/web-fonts-with-css/css/fontawesome-all.min.css">    
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script defer src="https://use.fontawesome.com/releases/v5.0.12/js/all.js" integrity="sha384-Voup2lBiiyZYkRto2XWqbzxHXwzcm4A5RfdfG6466bu5LqjwwrjXCMBQBLMWh7qR" crossorigin="anonymous"></script>
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
            <?php include 'header_after_log.php'; ?>
        </div>
        <div class="w3-container w3-padding" id="div_color">
            <br><br><br><br>
            <div class="w3-container w3-padding" >
                <h1 align="center"><strong>My Lab Reports</strong></h1>
                <hr>
            </div>
            <div class="text-center">
                <a href="uploadLabReport.php?id=<?php echo $userid ?>"><button type="button" class="btn btn-lg btn-info">Upload My Reports</button></a>
            </div>
            <br>
        </div>  
        <div class="w3-row-padding">
            <div class="w3-half w3-padding">

                <div class="w3-card-4">

                    <header class="w3-container w3-white">
                        <h1>Cholesterol</h1>
                    </header>
                    <table class="text">
                        <tr>
                            <th>
                            </th>
                            <th>
                            </th>
                            <th>
                            </th>
                        </tr>
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);
                            $id = $row['id'];
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>";
                                echo "&nbsp;&nbsp;&nbsp;&nbsp;<img src = 'img/icon.svg' class = 'iconlarge activityicon' role = 'presentation'>";
                                echo '<a href="dowloadLabReport.php?file=' . urlencode($row["fileName"]) . '">&nbsp;' . $row["fileName"] . '</a> &nbsp;&nbsp;&nbsp;';
                                echo "</td>";
                                echo "<td>";
                                echo "<span>" . $row['date'] . "</span> &nbsp&nbsp";
                                echo "</td>";
                                echo "<td>";
                                echo "<a class='btn btn-success btn-xs' href='dowloadLabReport.php?file=" . urlencode($row["fileName"]) . "'>Download  &nbsp;</a>";
                                echo "</td>";
                                echo "<td>";
                                echo "<a class='btn btn-danger btn-xs' href='deleteLabReport.php?id=" . ($row["id"]) . "'>Delete</a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "0 results";
                        }
                        ?>  
                    </table>
                    <footer class="w3-container w3-white">
                        <br>
                        <h5>Health is the greatest gift</h5>
                    </footer>
                </div>

            </div>

            <div class="w3-half w3-padding">

                <div class="w3-card-4">

                    <header class="w3-container w3-white">
                        <h1>Blood Sugar</h1>
                    </header>
                    <table class="text">
                        <tr>
                            <th>
                            </th>
                            <th>
                            </th>
                            <th>
                            </th>
                        </tr>
                        <?php
                        if (mysqli_num_rows($result3) > 0) {
                            $row = mysqli_fetch_assoc($result3);
                            $id = $row['id'];
                            while ($row = mysqli_fetch_assoc($result3)) {
                                echo "<tr>";
                                echo "<td>";
                                echo "&nbsp;&nbsp;&nbsp;&nbsp;<img src = 'img/icon.svg' class = 'iconlarge activityicon' role = 'presentation'>";
                                echo '<a href="dowloadLabReport.php?file=' . urlencode($row["fileName"]) . '">&nbsp;' . $row["fileName"] . '</a> &nbsp;&nbsp;&nbsp;';
                                echo "</td>";
                                echo "<td>";
                                echo "<span>" . $row['date'] . "</span> &nbsp&nbsp";
                                echo "</td>";
                                echo "<td>";
                                echo "<a class='btn btn-success btn-xs' href='dowloadLabReport.php?file=" . urlencode($row["fileName"]) . "'>Download  &nbsp;</a>";
                                echo "</td>";
                                echo "<td>";
                                echo "<a class='btn btn-danger btn-xs' href='deleteLabReport.php?id=" . ($row["id"]) . "'>Delete</a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "0 results";
                        }
                        ?>  
                    </table>
                    <footer class="w3-container w3-white">
                        <br>
                        <h5>Your body deserves the best.</h5>
                    </footer>

                </div>

            </div>
        </div>
        <br><br><br>
        <div class="w3-row-padding">
            <div class="w3-half w3-padding">

                <div class="w3-card-4">

                    <header class="w3-container w3-white">
                        <h1>Cancer Tumor</h1>
                    </header>
                    <table class="text">
                        <tr>
                            <th>
                            </th>
                            <th>
                            </th>
                            <th>
                            </th>
                        </tr>
                        <?php
                        if (mysqli_num_rows($result4) > 0) {
                            $row = mysqli_fetch_assoc($result4);
                            $id = $row['id'];
                            while ($row = mysqli_fetch_assoc($result4)) {
                                echo "<tr>";
                                echo "<td>";
                                echo "&nbsp;&nbsp;&nbsp;&nbsp;<img src = 'img/icon.svg' class = 'iconlarge activityicon' role = 'presentation'>";
                                echo '<a href="dowloadLabReport.php?file=' . urlencode($row["fileName"]) . '">&nbsp;' . $row["fileName"] . '</a> &nbsp;&nbsp;&nbsp;';
                                echo "</td>";
                                echo "<td>";
                                echo "<span>" . $row['date'] . "</span> &nbsp&nbsp";
                                echo "</td>";
                                echo "<td>";
                                echo "<a class='btn btn-success btn-xs' href='dowloadLabReport.php?file=" . urlencode($row["fileName"]) . "'>Download  &nbsp;</a>";
                                echo "</td>";
                                echo "<td>";
                                echo "<a class='btn btn-danger btn-xs' href='deleteLabReport.php?id=" . ($row["id"]) . "'>Delete</a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "0 results";
                        }
                        ?>  
                    </table>
                    <footer class="w3-container w3-white">
                        <br>
                        <h5>A healthy mind does not speak ill of others.</h5>
                    </footer>

                </div>

            </div>

            <div class="w3-half w3-padding">

                <div class="w3-card-4">

                    <header class="w3-container w3-white">
                        <h1>Blood Pressure</h1>
                    </header>
                    <table class="text">
                        <tr>
                            <th>
                            </th>
                            <th>
                            </th>
                            <th>
                            </th>
                        </tr>
                        <?php
                        if (mysqli_num_rows($result5) > 0) {
                            $row = mysqli_fetch_assoc($result5);
                            $id = $row['id'];
                            while ($row = mysqli_fetch_assoc($result5)) {
                                echo "<tr>";
                                echo "<td>";
                                echo "&nbsp;&nbsp;&nbsp;&nbsp;<img src = 'img/icon.svg' class = 'iconlarge activityicon' role = 'presentation'>";
                                echo '<a href="dowloadLabReport.php?file=' . urlencode($row["fileName"]) . '">&nbsp;' . $row["fileName"] . '</a> &nbsp;&nbsp;&nbsp;';
                                echo "</td>";
                                echo "<td>";
                                echo "<span>" . $row['date'] . "</span> &nbsp&nbsp";
                                echo "</td>";
                                echo "<td>";
                                echo "<a class='btn btn-success btn-xs' href='dowloadLabReport.php?file=" . urlencode($row["fileName"]) . "'>Download  &nbsp;</a>";
                                echo "</td>";
                                echo "<td>";
                                echo "<a class='btn btn-danger btn-xs' href='deleteLabReport.php?id=" . ($row["id"]) . "'>Delete</a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "0 results";
                        }
                        ?>  
                    </table>
                    <footer class="w3-container w3-white">
                        <br>
                        <h5>A fool does not care about his health</h5>
                    </footer>

                </div>

            </div>
        </div>
        <br><br><br>
        <hr>

        <br>
        <div class="navbar-fixed-bottom">
            <?php include 'footer.php'; ?>
        </div>
    </body>
</html> 