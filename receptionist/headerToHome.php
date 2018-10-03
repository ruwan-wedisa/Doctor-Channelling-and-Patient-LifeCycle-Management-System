<!DOCTYPE html>
<html>
<head>
    <title>Doctor Channelling</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="src/w3.css">
    <link rel="stylesheet" href="src/latin_font.css">

    <script defer src="src/js/fontAwesome5/all.js" integrity="sha384-Voup2lBiiyZYkRto2XWqbzxHXwzcm4A5RfdfG6466bu5LqjwwrjXCMBQBLMWh7qR" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="src/web-fonts-with-css/css/fontawesome-all.min.css">


    <style>
        body {font-family: "Times New Roman", Georgia, Serif;}
        h1,h2,h3,h4,h5,h6 {
            font-family: "Playfair Display";
            letter-spacing: 5px;
        }
    </style>

    <head>
<body>
<!-- Navbar -->
<div class="w3-top">
    <div class="w3-bar w3-red w3-card">
        <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
        <a href="index.php" class="w3-bar-item w3-button w3-padding-large">HOME</a>
        <a href="login_Form.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">MY BOOKINGS</a>
        <a href="search_Doc.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">DOCTORS</a>
        <a href="#contact" class="w3-bar-item w3-button w3-padding-large w3-hide-small">CONTACT</a>
        <div class="w3-dropdown-hover w3-hide-small">
            <button class="w3-padding-large w3-button" title="More">MORE <i class="fa fa-caret-down"></i></button>
            <div class="w3-dropdown-content w3-bar-block w3-card-4">
                <a href="#" class="w3-bar-item w3-button">Terms And Conditions</a>
                <a href="#" class="w3-bar-item w3-button">News</a>
                <a href="#" class="w3-bar-item w3-button">About</a>
            </div>
        </div>

        <a href="#" onClick="goBack()" class="w3-padding-large w3-hover-black w3-hide-small w3-right"><i class="fas fa-arrow-circle-left fa-lg"></i> BACK</a>
    </div>
</div>
<script type="text/javascript" src="src/js/jquery-3.2.1.min.js"></script>
<script>
    function goBack() {
        //window.history.back();
        window.location.href='index.php';
    }
</script>
</body>

</html>