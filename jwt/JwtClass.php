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
		return $decoded;	
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

public function get_post_image($id){
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'single-post-thumbnail' ); 
	return $image = $image[0];
}

public function get_all_post(){
	//global $wpdb;
	header('Content-Type: application/json');
	
	$query = new WP_Query('posts');
	
	/*
	POST FIELDS
	
   ID": 21,
  "post_author": "1",
  "post_date": "2019-02-17 02:46:33",
  "post_date_gmt": "2019-02-17 02:46:33",
  "post_content": "<!-- wp:paragraph -->\n<p>asfafsafasf</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>fas</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>fas</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>f</p>\n<!-- /wp:paragraph -->",
  "post_title": "afasfsafasf",
  "post_excerpt": "",
  "post_status": "publish",
  "comment_status": "open",
  "ping_status": "open",
  "post_password": "",
  "post_name": "afasfsafasf",
  "to_ping": "",
  "pinged": "",
  "post_modified": "2019-02-18 10:13:18",
  "post_modified_gmt": "2019-02-18 10:13:18",
  "post_content_filtered": "",
  "post_parent": 0,
  "guid": "http://localhost/editor/workspace/wordpress/?p=21",
  "menu_order": 0,
  "post_type": "post",
  "post_mime_type": "",
  "comment_count": "0",
  "filter": "raw"	
  
  
	*/
	$data = [];
	$loop = 0;
	foreach($query->posts as $val){
		
		 $data[$loop]['post_id'] = $val->ID;
		 $data[$loop]['post_title'] = $val->post_title;
		 $data[$loop]['post_content'] = $val->post_content;
		 $data[$loop]['post_image'] = self::get_post_image($val->ID);
		 $loop++;
	}
    return json_encode($data);
	
   //$value = [];
   //while($query->have_posts()){
   //   $query->the_post();

		 //if (has_post_thumbnail( ) ){
		 // $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
		 // $image = $image[0];
		 // $title = get_post_title($post->ID);
		 //}else{
		 // $image = '';	
		 // $title = '';
		 //}
		 
	  //$value['title'] = $title;
	  //$value['thumb'] = $image;	
	  	
	  
	  //}
	  //return print_r($value);
}




public function jwt_logout(){
	return wp_clear_auth_cookie();
}



}//END OF CLASS


 
 
 