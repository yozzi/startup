<?php
/*
Plugin Name: StartUp
Description: Le plugin pour les fonctions de base de StartUp Reloaded
Author: Yann Caplain
Version: 1.2.2
Text Domain: startup
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

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

require('inc/help.php');

require('inc/wall.php');
?>