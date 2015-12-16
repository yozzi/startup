<?php

/************************** Modifier TinyMCE */

// Utiliser l'éditeur WYSIWYG par défaut
function startup_default_editor() {
    if (!current_user_can('manage_options')) {
        $r = 'tinymce'; // html or tinymce
        return $r;
    }
}

add_filter( 'wp_default_editor', 'startup_default_editor' );

// Utiliser l'éditeur HTML par défaut pour l'admin
function startup_admin_default_editor() {
    if (current_user_can('manage_options')) {
        $r = 'html'; // html or tinymce
        return $r;
    }
}

add_filter( 'wp_default_editor', 'startup_admin_default_editor' );