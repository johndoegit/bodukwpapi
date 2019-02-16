<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 
include('./jwt/JwtClass.php'); 
 
$jwt = new JwtClass();



// //check username and password
// $check_user = $jwt->jwt_login_check('root','admin');

// //login user
// if($check_user == 1){
// 	echo $jwt->jwt_login('root');	
// }else{
// 	echo 'wrong username or password';
// }
 
//logout user 
//$jwt->jwt_logout();
 
 

 

 
 