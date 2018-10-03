<?php
require_once('db.php');
?>
<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<head>
    <meta http-equiv="refresh" content="5">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="src/w3.css">
    <link rel="stylesheet" href="src/latin_font.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="src/web-fonts-with-css/css/fontawesome-all.css">
    <link rel="stylesheet" href="src/web-fonts-with-css/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>

    <style>
    * {box-sizing: border-box;}
    body {font-family: Verdana, sans-serif;}
    .mySlides {display: none;}
    img {vertical-align: middle;}


    .slideshow-container {
        max-width: 500px;
        position: relative;
        margin: 60;
    }





    .fade {
        -webkit-animation-name: fade;
        -webkit-animation-duration: 1.5s;
        animation-name: fade;
        animation-duration: 1.5s;
    }

    @-webkit-keyframes fade {
        from {opacity: .4}
        to {opacity: 1}
    }

    @keyframes fade {
        from {opacity: .4}
        to {opacity: 1}
    }

    @media only screen and (max-width: 300px) {
        .text {font-size: 11px}
    }

    .udayanga {
        background-color:rgba(25, 20, 0, 0.2);
        color: #0f0f0f;
        width: 500px;
        border: 1px solid black;
        padding: 25px;
        margin: 12px;
    }

    .udayanga2 {
        background-color:rgba(25, 0, 0, 0.2);
        color: #0f0f0f;
        width: 500px;
        border: 1px solid black;
        padding-top: 75px;
        padding:25px;
        margin: 12px;
    }




    .container img {vertical-align: middle;}

    .container .content {
        background: rgba(0, 0, 0, 0.5); /* Black background with transparency */
        color: #f1f1f1;
        padding-top: 15px;
        width: 100%;
        padding: 20px;
    }







</style>
</head>
<body>
<?php include 'header.php'; ?>
<body background="images/Abstract.jpg">





<br><br>


<table width="200">
    <tr>
        <th>
            <div class="udayanga">
                <div class="panel-body">
                    <div class="slideshow-container">

                        <?php
                        $query = "SELECT * FROM NEWS ORDER BY M_No ASC";
                        $result = mysqli_query($conn,$query);
                        if($result){
                            while($record = mysqli_fetch_assoc($result)){
                                ?>
                                <div class="mySlides1 fade">
                                    <h3>
                                        <?php
                                        echo $record['Message'];
                                        ?></h3>

                                </div>
                                <?php
                            }}
                        ?>
                    </div>
                </div>
                <br>

                <div style="text-align:center">
                    <span class="."></span>
                    <span class="."></span>

                </div>
            </div>




            <div class="udayanga2">
                <div class="content">
                    <div class="slideshow-container">

                        <?php
                        $query = "SELECT * FROM message1";
                        $result= mysqli_query($conn,$query);
                        if($result){
                            while($record = mysqli_fetch_assoc($result)){
                                ?>
                                <div class="mySlides2 fade">
                                    <h3>&nbsp;
                                        <?php
                                        echo $record['Message'];
                                        ?></h3>

                                </div>
                                <?php
                            }}
                        ?>
                    </div>
                </div>

                <div style="text-align:center">
                    <span class="."></span>
                    <span class="."></span>

                </div>
            </div>

        </th><th>
            <br><br>
            <div class="container">
                <div class="card" style="width:280px">
                    <img class="card-img-top" src="../images/man-comforting-distressed-woman.jpg" alt="Card image" style="width:100%">
                    <div class="card-body">
                        <p class="card-text"><h4>Agitation in dementia: Are drugs the best treatment?</h4><br>

                        Two common symptoms in people with dementia are agitation and psychosis.</p>

                    </div>
                </div>
                <br>
        </th>
        <th>
            <br><br>
            <div class="container">
                <div class="card" style="width:280px">
                    <img class="card-img-top" src="../images/download1.jpg" alt="Card image" style="width:85%">
                    <div class="card-body">
                        <p class="card-text"><h4>Starving kids in Africa need your help</h4><br>

                        Save the Children provides life-changing and lifesaving help. Join us to help starving children in Africa..</p>

                    </div>
                </div>
                <br>


        </th>
        <th>
            <br><br>

            <br>


        </th
    </tr>
</table>
<br>
<br>
<div class="container" align="left">
    <div class="content">
        <h1>Latest</h1>
        <p>
            <?php
            $query = "SELECT * FROM latestnewsupdate ORDER BY mg_No DESC  LIMIT 1";
            $result= mysqli_query($conn,$query);
            if($result){
                while($record = mysqli_fetch_assoc($result)){
                    echo $record['message'];
                }}?>
        </p>
    </div>
</div>






<script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides2");
        var dots = document.getElementsByClassName(".");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" deactive", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " deactive";
        setTimeout(showSlides,2000);
    }
</script>


<script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides1");
        var dots = document.getElementsByClassName(".");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        setTimeout(showSlides, 2000);
    }
</script>

























<br><br><br><br>
<br><br>
<div class="navbar-fixed-bottom">
    <?php include 'footer.php'; ?>
</div>
</body>
</html>	