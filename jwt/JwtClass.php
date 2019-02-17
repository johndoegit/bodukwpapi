<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

include_once './jwt/src/BeforeValidException.php';
include_once './jwt/src/ExpiredException.php';
include_once './jwt/src/SignatureInvalidException.php';
include_once './jwt/src/JWT.php';
require_once("../../../wp-load.php");
use \Firebase\JWT\JWT;


class JwtClass {

const key = "rewtre@$#WTEGDFBtrjhgew23rwetrhgnfger3436574yerhgs(*&^dfsfs";

 
public function jwt_encode($data){
	
	$token = $data;
	
	$jwt = JWT::encode($token, self::key);
	$decoded = JWT::decode($jwt, self::key, array('HS256'));

	//print_r($decoded);
	 
	return print_r($jwt, true);
	//echo '<br>';
	//echo print_r($decoded->user_id);	
}

public function jwt_decode($data){
	
 
	$decoded = JWT::decode($data, self::key, array('HS256'));

	if($decoded){
		return print_r($decoded);	
	}else{
		return 'error!';
	}
	
	 
	///return print_r($jwt, true);
	//echo '<br>';
	//echo print_r($decoded->user_id);	
}

public function jwt_login($username){
	
$user = get_user_by('login', $username );
// Redirect URL //
	if ( !is_wp_error( $user ) )
	{
	    wp_clear_auth_cookie();
	    wp_set_current_user ( $user->ID );
	    wp_set_auth_cookie  ( $user->ID );
	
	    //$redirect_to = user_admin_url();
	    //wp_safe_redirect( $redirect_to );
	    //exit();
	}	
}


public function jwt_login_check($username, $password){
	 
	$auth = wp_authenticate_username_password($user, $username, $password);

	if (is_wp_error($auth)) {
	
	return 0;
	
	} else {
	
	return 1;
		
		
	}
}

public function jwt_logout(){
	return wp_clear_auth_cookie();
}



}//END OF CLASS


 
 
 