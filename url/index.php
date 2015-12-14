<?php
include 'db.php';
include 'shortener.php';
include 'service.php';
use Shortener\Service;
use Shortener\Database;

$service = new Service();

    $result = $service->redirectToLong();
    if(!empty($result)){
        header('Location: '.$result['long_url']);
        die();
    } else {
        echo "<h1> NO URL FOUND </h1>";
    }


//$xml="xml version='1.0'
//<data>
//    <user>
//        <username>liudas</username>
//        <password>asas</password>
//    </user>
//    <url>
//        <long>http://dailycard.lt</long>
//    </url>
//</data>";


//
//$db = new Database();
//$short_url = explode('/', $_SERVER['REQUEST_URI']);
//$result = $db->fetch_url($short_url[2]);

