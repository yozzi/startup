<?php

function startup_cleaner(){
   $cleaner = startup_get_option( 'cleaner' );
   if ( $cleaner ){ ?>
        <style>
            html, body {
                background:#fff;
            }
            @media screen and (min-width: 783px) {
                #wpbody {
                    margin-top: 34px;
                }
                
                .dashicons, .dashicons-before:before {
                    width: 32px;
                    height: 32px;
                    font-size: 32px;
                }
                #adminmenu div.wp-menu-image {
                    width: 45px;
                }
                div.wp-menu-image:before {
                    padding: 2px 0;
                }
            }
            #adminmenu {
                margin: 0;
            }
            
            #wpadminbar {
                height: 64px;
                border-bottom: 2px solid #fff;
            }
            
             #wpadminbar, #wpadminbar * {
                font-size: 13px;
                line-height: 64px;
            
            }
            #wpadminbar .quicklinks .ab-empty-item, #wpadminbar .quicklinks a, #wpadminbar .shortlink-input {
                height: 64px;
            }
            
            
            
            
            
            #adminmenu .wp-submenu-head, #adminmenu a.menu-top {
                font-size: 14px;
                font-weight: 400;
                line-height: 18px;
                padding: 15px 0;
                border-bottom: 1px solid rgba(255, 255, 255, 0.5);
            }
            
            #adminmenu > .wp-first-item{
                border-top: 1px solid rgba(255, 255, 255, 0.5);
            }
            

            #adminmenu li.wp-menu-separator {
                border-bottom: 9px solid rgba(255, 255, 255, 0.5);
                margin: 0;
                height: 0;
            }
        </style>
    <?php }
}

add_action( 'admin_head', 'startup_cleaner' );