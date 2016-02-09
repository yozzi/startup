<?php

/************************** Modifier le numéro de version */

function startup_change_footer_version() {
    return 'Version ' . STARTUP_VERSION;
}

add_filter( 'update_footer', 'startup_change_footer_version', 9999 );

/************************** WordPress Admin change footer text */

function startup_remove_footer_admin () {
    echo STARTUP_FOOTER;
}

add_filter('admin_footer_text', 'startup_remove_footer_admin');