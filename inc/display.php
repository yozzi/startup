<?php

/************************** Retirer le panneau "Options de l'écran" */

function startup_panneau_options() {
    if ( !current_user_can( 'manage_options' ) )
        add_filter('screen_options_show_screen', '__return_false');
}

add_action( 'plugins_loaded', 'startup_panneau_options' );

/************************** Désactiver le glisser déposer des boîtes */
//Commenté car empêche le bon fonctionnement de beaucoup de choses

//function startup_disable_drag_metabox() {
//    if (!current_user_can('manage_options')) {
//        wp_deregister_script('postbox');
//    }
//}
//
//add_action( 'admin_init', 'startup_disable_drag_metabox' );

/************************** Retirer le lien vers l'aide */

function startup_remove_help_tabs($old_help, $screen_id, $screen){
    $screen->remove_help_tabs();
    return $old_help;
}

add_filter( 'contextual_help', 'startup_remove_help_tabs', 999, 3 );