<?php

function startup_scripts_admin() {
    wp_enqueue_script( 'stackblur', plugins_url( '../js/stackblur.min.js', __FILE__ ), array( ), '', false );
    wp_enqueue_style( 'startup-admin-everyone', plugins_url( '../css/startup_admin_everyone.css', __FILE__ ) );
    if( !current_user_can( 'manage_options' ) ) {
        wp_enqueue_style( 'startup-admin', plugins_url( '../css/startup_admin.css', __FILE__ ) );
    }
}

add_action( 'admin_enqueue_scripts', 'startup_scripts_admin' );

function startup_scripts_login() {
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'vegas', plugins_url( '../lib/vegas/vegas.min.js', __FILE__ ), array( ), '', true );
    wp_enqueue_style( 'vegas', plugins_url( '../lib/vegas/vegas.min.css', __FILE__ ) );
    if (!is_plugin_active('theme-my-login/theme-my-login.php')){
        wp_enqueue_style( 'startup-login', plugins_url( '../css/startup_login.css', __FILE__ ) );
    }
}

add_action( 'login_enqueue_scripts', 'startup_scripts_login' );