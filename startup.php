<?php
/*
Plugin Name: StartUp
Description: Le plugin pour les fonctions de base de StartUp Reloaded
Author: Yann Caplain
Version: 1.0.0
Text Domain: startup
Domain Path: /languages
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

//Include this to check if a plugin is activated with is_plugin_active
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

// Settings
define("STARTUP_VERSION", "1.0");
define("STARTUP_FOOTER", "Vous utilisez l'application <a href=\"http://startup.yozz.net\" target=\"_blank\">StartUp</a> développée par <a href=\"http://yozz.net\" target=\"_blank\">yozz.net</a>");

//require('inc/updater.php');

//require('inc/options.php');

require('inc/notices.php');

require('inc/login.php');

require('inc/style.php');

require('inc/enqueues.php');

require('inc/menu.php');

require('inc/bar.php');

require('inc/footer.php');

require('inc/tinymce.php');

require('inc/profile.php');

require('inc/blog.php');

require('inc/display.php');

require('inc/settings.php');

//require('inc/help.php');

//require('inc/wall.php');
?>