<?php

/**
 * Plugin Name: bodukwpapi
 * Plugin URI:  
 * Version:     1.1.4 
 * Description: NO!
 * Author:      BODUK
 * Author URI:  
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: boduk
 */

require __DIR__ . '/functions.php';

add_action( 'plugins_loaded', 'bodukwpapi_bootstrap' );
