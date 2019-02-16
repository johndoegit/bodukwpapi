<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once './jwt/src/BeforeValidException.php';
include_once './jwt/src/ExpiredException.php';
include_once './jwt/src/SignatureInvalidException.php';
include_once './jwt/src/JWT.php';
use \Firebase\JWT\JWT;


class JwtClass {

const key = "rewtre@$#WTEGDFBtrjhgew23rwetrhgnfger3436574yerhgs(*&^dfsfs";

 
public function jwt_encode(){
	
		$token = array(
	    "user_id" => "001",
	    "user_email" => "001",
	    "time" => time(),
	    "REMOTE_ADDR" => $_SERVER['REMOTE_ADDR'],
	    "SERVER_ADDR" => $_SERVER['SERVER_ADDR'],
	    "REQUEST_TIME" => $_SERVER['REQUEST_TIME']
	);
	
	$jwt = JWT::encode($token, self::key);
	$decoded = JWT::decode($jwt, self::key, array('HS256'));

//print_r($decoded);
 
return print_r($jwt, true);
//echo '<br>';
//echo print_r($decoded->user_id);	
}

public function jwt_decode(){
	
		$token = array(
	    "user_id" => "001",
	    "user_email" => "001",
	    "time" => time(),
	    "REMOTE_ADDR" => $_SERVER['REMOTE_ADDR'],
	    "SERVER_ADDR" => $_SERVER['SERVER_ADDR'],
	    "REQUEST_TIME" => $_SERVER['REQUEST_TIME']
	);
	
	$jwt = JWT::encode($token, self::key);
	$decoded = JWT::decode($jwt, self::key, array('HS256'));

return print_r($decoded);
 
///return print_r($jwt, true);
//echo '<br>';
//echo print_r($decoded->user_id);	
}

	
	
	
	
}



?>
 
 