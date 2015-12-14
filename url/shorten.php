<?php
include 'db.php';
include 'shortener.php';
include 'service.php';
use Shortener\Service;

$service = new Service();
$xml = trim(file_get_contents('php://input'));
if($xml){
    $service->handle_request($xml);
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

