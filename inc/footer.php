<?php

/************************** Modifier le numéro de version */

function startup_change_footer_version() {
    $product_version = startup_get_option( 'product_version' );
    if ( !$product_version ){
        $product_version = '1.0';
    }
    return 'Version ' . $product_version;
}
    
add_filter( 'update_footer', 'startup_change_footer_version', 9999 );

/************************** WordPress Admin change footer text */

function startup_remove_footer_admin () {
    $product_footer = startup_get_option( 'product_footer' );
    if ( !$product_footer ){
        $product_footer = 'Vous utilisez l\'application <a href="http://startup.yozz.net" target="_blank">StartUp</a> développée par <a href="http://yozz.net" target="_blank">yozz.net</a>';
    }
    echo $product_footer;
}

add_filter('admin_footer_text', 'startup_remove_footer_admin');