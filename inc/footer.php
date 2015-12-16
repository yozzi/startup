<?php

/************************** Modifier le numéro de version */

function startup_change_footer_version() {
    return 'Version 1.0';
}

add_filter( 'update_footer', 'startup_change_footer_version', 9999 );

/************************** WordPress Admin change footer text */

function startup_remove_footer_admin () {
    echo 'Vous utilisez l\'application <a href="http://startup.yozz.net" target="_blank">StartUp</a> développée par <a href="http://yozz.net" target="_blank">yozz.net</a>';
}

add_filter('admin_footer_text', 'startup_remove_footer_admin');