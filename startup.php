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

/************************** Help */

function startup_help(){
    add_menu_page( 'StartUp Help', 'Help', 'read', 'startup-help', 'startup_help_init' );
}

function startup_help_init(){
    require('inc/help.php');
}

add_action('admin_menu', 'startup_help');

/************************** Wall */

function startup_wall(){
    add_menu_page( 'StartUp Wall', 'Wall', 'read', 'startup-wall', 'startup_wall_init', '', 0 );
}

function startup_wall_init(){
    require('inc/wall.php');
}

add_action('admin_menu', 'startup_wall');

function startup_add_menu_icon_wall(){ ?>
    <style>
        #toplevel_page_startup-wall .dashicons-admin-generic::before {
            font-family:  FontAwesome !important;
            content: '\f192';
        }
    </style>
<?php }

add_action( 'admin_head', 'startup_add_menu_icon_wall' );
?>