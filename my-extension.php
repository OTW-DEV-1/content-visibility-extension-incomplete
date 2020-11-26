<?php
/*
* Plugin Name: Content Visibility
* Description: Content Visibility Advanced Tab
* Version: 1.0
* Author: Gerson Chávez
* Text Domain: elementor-test-extension
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

define( 'CONTENT_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
// plugin main classs
include( CONTENT_PLUGIN_DIR . 'inc/content-tab.php'); ?>