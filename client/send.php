<?php

if(!empty($_POST)){
    $url = "http://localhost/url/shorten.php";
    $xmlcontent = "<?xml version='1.0'?><data><user><username>".$_POST['username']."</username><password>".$_POST['password']."</password></user><url><long>".$_POST['url']."</long></url></data>";

    $data = do_post_request($url, $xmlcontent);
    print_r($data);
    if($data->status == 1){
        echo "<h1>Your short url: <a href='http://localhost/url/". $data->url->short . "'>http://localhost/url/". $data->url->short . "</a></h1>";
    } else {
        echo "<h1>Error: ". $data->error ."</h1>";
    }

}


function do_post_request($url, $data, $optional_headers = null)
{
    $params = array('http' => array(
        'method' => 'POST',
        'content' => $data
    ));
    if ($optional_headers !== null) {
        $params['http']['header'] = $optional_headers;
    }
    $ctx = stream_context_create($params);
    $fp = @fopen($url, 'rb', false, $ctx);
    if (!$fp) {
        throw new Exception("Problem with $url, $php_errormsg");
    }
    $response = @stream_get_contents($fp);
    if ($response === false) {
        throw new Exception("Problem reading data from $url, $php_errormsg");
    }
    return simplexml_load_string($response);
}