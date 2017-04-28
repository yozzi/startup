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
    $cleaner = startup_get_option( 'cleaner' );
    
    if ( $logo_top ) { $logo = $logo_top;};
        if ( $logo ){
            if ( $logo_full && $cleaner ){ ?>
                <style>
                    #wp-admin-bar-site-name{
                        width: 180px;
                        overflow:hidden;
                        background-color: #fff !important;
                    }
                    
                    #wp-admin-bar-site-name:hover a{
                        background-color: #fff !important;
                    }
                    
                    #wp-admin-bar-site-name .ab-item {
                        background-image: url(<?php echo $logo ?>) !important;
                        background-position: center !important;
                        background-size: contain !important;
                        padding-left: 166px !important;
                        padding-right: 0 !important;
                        height: 60px !important;
                        margin: 2px 7px !important;
                    }

                    #wp-admin-bar-site-name .ab-item:hover {
                        background-image: url(<?php echo $logo ?>) !important;
                        padding-left: 166px !important;
                    }
                </style>
            <?php } else { ?>
                <style>
                     #wp-admin-bar-site-name .ab-item {
                        background-image: url(<?php echo $logo ?>) !important;
                        background-position: 6px center !important;
                        padding-left: 36px !important;
                    }

                    #wp-admin-bar-site-name .ab-item:hover {
                        background-image: url(<?php echo $logo ?>) !important;
                        padding-left: 36px !important;
                    }
                </style>
                   
                <?php if ( $cleaner ){ ?>

                    <style>
                         #wp-admin-bar-site-name .ab-item {
                            background-position: 10px center !important;
                            padding-left: 45px !important;
                        }

                        #wp-admin-bar-site-name .ab-item:hover {
                            padding-left: 45px !important;
                        }
                    </style>
                <?php } ?>
                
            <?php }
        }
    }

add_action( 'admin_head', 'startup_css' );