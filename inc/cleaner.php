<?php

function startup_cleaner(){
   $cleaner = startup_get_option( 'cleaner' );
   if ( $cleaner ){ ?>
        <style>
            html.wp-toolbar{
                padding-top: 66px;
            }
            
            @media screen and (max-width: 782px){
                html.wp-toolbar {
                    padding-top: 46px;
                }
            }
            @media screen and (max-width: 600px){
                html.wp-toolbar {
                    padding-top: 0;
                }
            }
            
            html, body {
                background:#fff;
            }
            @media screen and (min-width: 783px) {
                .dashicons, .dashicons-before:before {
                    width: 28px;
                    height: 28px;
                    font-size: 28px;
                }
                #adminmenu div.wp-menu-image {
                    width: 45px;
                }
                div.wp-menu-image:before {
                    padding: 2px 0;
                }
            }
            
            #wpcontent, #wpfooter {
                margin-left: 180px;
            }
            #adminmenu .wp-submenu {
                left: 180px;
            }
            #adminmenu {
                margin: 0;
            }
            
            #adminmenu, #adminmenu .wp-submenu, #adminmenuback, #adminmenuwrap {
                width: 180px;
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
            
            #wp-admin-bar-my-account>.ab-item:before {
                top: 18px;
            }
            #wp-admin-bar-site-name .ab-item {
                background-position: 0 20px !important;
            }
            #adminmenu li.wp-has-submenu.wp-not-current-submenu:hover:after {
                top: 24px;
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