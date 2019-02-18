<?php
header('Access-Control-Allow-Origin: *');
//header('Access-Control-Allow-Methods: GET, POST');  

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
 
include('./jwt/JwtClass.php'); 
 
$jwt = new JwtClass();
  
if(isset($_POST['decode'])){
	$jwt_token = $_POST['decode'];
	$user = $jwt->jwt_decode($jwt_token);
	if($user){
		$jwt->jwt_login($user->user);
	}
} 

if(isset($_POST['username']) && isset($_POST['password'])){
 
	$username = $_POST['username'];
	$password = $_POST['password'];
	$check_user = $jwt->jwt_login_check($username,$password);
	if($check_user === 1){
		 $jwt->jwt_login($username);
			$token = array(
		    "user" => $username,
		    "time" => time(),
		    "REMOTE_ADDR" => $_SERVER['REMOTE_ADDR'],
		    "SERVER_ADDR" => $_SERVER['SERVER_ADDR'],
		    "REQUEST_TIME" => $_SERVER['REQUEST_TIME']
		);
		echo $jwt->jwt_encode($token);
	}else{
		echo 'wrong username or password';
	}   
	
} 

//if(isset($_POST['get_post'])){
	//foreach($jwt->get_all_post() as $val){
	//	echo $val.'<br>';
	//}
//} 

echo $jwt->get_all_post();


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
 
 
//$jwt->jwt_decode('eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyIjoicm9vdCIsInRpbWUiOjE1NTAyNzkyMDUsIlJFTU9URV9BRERSIjoiOjoxIiwiU0VSVkVSX0FERFIiOiI6OjEiLCJSRVFVRVNUX1RJTUUiOiIxNTUwMjc5MjA1In0.SMH2jlxkU7_LHIK1nD3mswjA-q30ma2_lI7UaF8YtfU'); 
 
 


//$query = new WP_Query( array( 'author' => 1 ) );

//$query = new WP_Query( array( 'tag' => 'tag1' ) );
//print_r($query);


?>


 
 