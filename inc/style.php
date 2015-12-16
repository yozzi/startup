<?php

/************************** Pour l'utilisateur */

function startup_custom_admin_head() {
	if( !current_user_can( 'manage_options' ) ) {
        echo '<style type="text/css">';
        include '/../css/startup_admin.css';
        echo '</style>';
    }
}

add_action('admin_head', 'startup_custom_admin_head');

/************************** Pour tout le monde */

function startup_custom_admin_head_everyone() {
    echo '<style type="text/css">';
    include '/../css/startup_admin_everyone.css';
    echo '</style>';
}

add_action('admin_head', 'startup_custom_admin_head_everyone');

/************************** Font Awesome in the Backend */

function startup_font_awesome(){ ?>
    <style>
         @font-face {
             font-family: FontAwesome;
             src: url(<?php echo plugins_url( 'startup/lib/font-awesome/fonts/fontawesome-webfont.woff' ) ?>);
         }
    </style>
<?php }

add_action( 'admin_head', 'startup_font_awesome' );