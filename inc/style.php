<?php

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