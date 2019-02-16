<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 
include('./jwt/JwtClass.php'); 
 
$jwt = new JwtClass();
//echo $jwt->jwt_encode();
//echo $jwt->jwt_decode();
//print_r($decoded);
 
 
 
/* 
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"http://localhost/editor/workspace/wordpress/wp-login.php");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,"log=root&pwd=admin");

// In real life you should use something like:
// curl_setopt($ch, CURLOPT_POSTFIELDS, 
//          http_build_query(array('postvar1' => 'value1')));

// Receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec($ch);

curl_close ($ch);

// Further processing ...
echo print_r($server_output);
*/
require_once("../../../wp-load.php");

$username = "root";
$password = 'admin';
$auth = wp_authenticate_username_password($user, $username, $password);

if (is_wp_error($auth)) {

echo 'not authenticated';

} else {

echo 'authenticated';

}
/*
$username = "root";
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
*/
?>
  
 
 

 