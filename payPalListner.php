<?php
/**
 * Created by PhpStorm.
 * User: ruwan.wedisa
 * Date: 6/8/2018
 * Time: 2:40 PM
 */
    if($_SERVER['REQUEST_METHOD'] != 'POST'){
        header('index.php');
        exit() ;
    }

    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,'https://ipnpb.sandbox.paypal.com/cgi-bin/webscr');
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
    curl_setopt($ch,CURLOPT_POST,1);
    curl_setopt($ch,CURLOPT_POSTFIELDS,"cmd=_notify-validate&" . http_build_query($_POST) );
    $response = curl_exec($ch);
    curl_close($ch);

    file_put_contents("test.txt", $response);



?>