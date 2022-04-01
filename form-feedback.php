<?php
/*
Plugin Name: Form Feedback  
Description: Small form feedback management plugin
Version: 1.0.0
Author: Francisco Bizi
Author Email: dev@gmail.com
License: MIT
*/
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
define('PLUGIN_FBP_DIR', plugin_dir_path(__FILE__));
define('PLUGIN_FBP_URL', plugin_dir_url(__FILE__));
require_once("vendor/autoload.php");

use FBF\Core;

/**
 *    Create table on activation hook event
 */
register_activation_hook(__FILE__, [(new Core()), 'fbf_install']);

/**
 *    Drop table on unnstall hook event
 */
register_uninstall_hook(__FILE__, [(new Core()), 'fbf_uninstall']);