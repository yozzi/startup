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

function startup_css(){
    $logo = startup_get_option( 'product_logo' );
    $logo_top = startup_get_option( 'product_logo_top' );
    $logo_full = startup_get_option( 'product_logo_full' );
    
    if ( $logo_top ) { $logo = $logo_top;};
        if ( $logo ){
            if ( $logo_full ){ ?>
                <style>
                    #wp-admin-bar-site-name{
                        width: 160px;
                        overflow:hidden;
                    }
                    
                    #wp-admin-bar-site-name .ab-item {
                        background-image: url(<?php echo $logo ?>) !important;
                        background-position: 0 !important;
                        background-size: 160px !important;
                        padding-left: 160px !important;
                    }

                    #wp-admin-bar-site-name .ab-item:hover {
                        background-image: url(<?php echo $logo ?>) !important;
                        padding-left: 160px !important;
                    }
                </style>
            <?php } else { ?>
                <style>
                     #wp-admin-bar-site-name .ab-item {
                        background-image: url(<?php echo $logo ?>) !important;
                        background-position: 5px !important;
                        padding-left: 35px !important;
                    }

                    #wp-admin-bar-site-name .ab-item:hover {
                        background-image: url(<?php echo $logo ?>) !important;
                        padding-left: 35px !important;
                    }
                </style>
            <?php }
        }
    }

add_action( 'admin_head', 'startup_css' );