<?php

include_once './src/BeforeValidException.php';
include_once './src/ExpiredException.php';
include_once './src/SignatureInvalidException.php';
include_once './src/JWT.php';
use \Firebase\JWT\JWT;




$key = "reytruyjfgdfsgdbfnjrtyersgdreytu64756345234213254365yhetrgR#!$#@%#$^%&$^%*URTJHFBF#R@$#%$";

$token = array(
    "user_id" => "001",
    "user_email" => "001",
    "time" => time(),
    "REMOTE_ADDR" => $_SERVER['REMOTE_ADDR'],
    "SERVER_ADDR" => $_SERVER['SERVER_ADDR'],
    "REQUEST_TIME" => $_SERVER['REQUEST_TIME']
);

 
$jwt = JWT::encode($token, $key);
$decoded = JWT::decode($jwt, $key, array('HS256'));
 
//print_r($decoded);
 
echo print_r($jwt, true);
echo '<br>';
echo print_r($decoded->user_id);
 
?>