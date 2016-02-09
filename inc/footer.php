<?php

/************************** Modifier le numéro de version */

function startup_change_footer_version() {
    global $startup_version;
    return 'Version ' . $startup_version;
}

if ( $startup_version ) {
    add_filter( 'update_footer', 'startup_change_footer_version', 9999 );
}

/************************** WordPress Admin change footer text */

function startup_remove_footer_admin () {
    global $startup_footer;
    echo $startup_footer;
}
if ( $startup_footer ) {
    add_filter('admin_footer_text', 'startup_remove_footer_admin');
}