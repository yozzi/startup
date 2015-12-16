<?php

function startup_scripts_admin() {
    wp_enqueue_script( 'stackblur', plugins_url( '../js/stackblur.min.js', __FILE__ ), array( ), '', false );
}

add_action( 'admin_enqueue_scripts', 'startup_scripts_admin' );

function startup_scripts_login() {
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'vegas', plugins_url( '../lib/vegas/vegas.min.js', __FILE__ ), array( ), '', true );
    wp_enqueue_style( 'vegas', plugins_url( '../lib/vegas/vegas.min.css', __FILE__ ) );
}

add_action( 'login_enqueue_scripts', 'startup_scripts_login' );