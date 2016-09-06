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

//Action links
function startup_action_links( $links ) {
   $links[] = '<a href="'. esc_url( get_admin_url(null, 'options-general.php?page=startup_options') ) .'">Settings</a>';
   $links[] = '<a href="https://github.com/yozzi" target="_blank">GitHub</a>';
   return $links;
}

add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'startup_action_links' );

//Include this to check if a plugin is activated with is_plugin_active
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

//require('inc/updater.php');

//require('inc/options.php');

require('inc/settings.php');

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

require('inc/author.php');

require('inc/display.php');

require('inc/conf.php');

require('inc/help.php');

require('inc/wall.php');

// Slug columns
Class WPAdminSlugColumn {

	/**
	* This is the constructor for WPAdminSlugColumn Class
	*
	* @return void
	*/
	public function __construct() {
		add_filter( 'manage_posts_columns', array( $this, 'SAC_posts' ) );
		add_action( 'manage_posts_custom_column', array( $this, 'SAC_posts_data' ), 10, 2);
		add_filter( 'manage_pages_columns', array( $this, 'SAC_pages' ) );
		add_action( 'manage_pages_custom_column', array( $this, 'SAC_pages_data' ), 10, 2);
	}

	/**
	* Adds slug to Posts column with option
	*
	* @return void
	*/
	public function SAC_posts( $defaults ) {
		$defaults['SAC_Slug'] = __( 'Post Slug' );
		return $defaults;
	}

	public function SAC_posts_data( $column_name, $id ) {
		if ( $column_name == 'SAC_Slug' ) {
			$post_slug = get_post( $id )->post_name;
			echo $post_slug;
		}
	}

	/**
	* Adds slug to Pages column with option
	*
	* @return void
	*/
	public function SAC_pages( $defaults ) {
		$defaults['SAC_Slug'] = __( 'Page Slug' );
		return $defaults;
	}

	public function SAC_pages_data( $column_name, $id ) {
		if ( $column_name == 'SAC_Slug' ) {
			$page_slug = get_page( $id )->post_name;
			echo $page_slug;
		}
	}

}

$WPAdminSlugColumn = new WPAdminSlugColumn();
?>