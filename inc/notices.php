<?php

function startup_admin_notice(){
    $notices = startup_get_option( 'notices' );
    $help = startup_get_option( 'notice_help' );
    if( !current_user_can( 'manage_options' ) && $notices ) {
        if ( !$help ) {
            echo '<div class="error">
            <p>Besoin d\'assistance? Contactez-nous sur <a href="mailto:support@yozz.net" target="_blank">support@yozz.net</a>.</p>
            </div>';
        } else {
            echo '<div class="error">
            <p>' . $help . '</p>
            </div>';
        }
    }
}

add_action('admin_notices', 'startup_admin_notice');

// Notice avec option Cacher

//add_action('admin_notices', 'yozz_admin_notice');
// 
// function yozz_admin_notice() {
// 	global $current_user ;
//         $user_id = $current_user->ID;
//         /* Check that the user hasn't already clicked to ignore the message */
// 	if ( ! get_user_meta($user_id, 'example_ignore_notice') ) {
//        echo '<div class="error"><p>'; 
//         printf(__('Besoin d\'assistance? Contactez-nous sur <a href="mailto:support@yozz.net" target="_blank">support@yozz.net</a> et recevez une réponse rapidement. | <a href="%1$s">Cacher ce message</a>'), '?example_nag_ignore=0');
//         echo "</p></div>";
// 	}
// }
// 
// add_action('admin_init', 'yozz_nag_ignore');
// 
// function yozz_nag_ignore() {
// 	global $current_user;
//         $user_id = $current_user->ID;
//         /* If user clicks to ignore the notice, add that to their user meta */
//         if ( isset($_GET['example_nag_ignore']) && '0' == $_GET['example_nag_ignore'] ) {
//              add_user_meta($user_id, 'example_ignore_notice', 'true', true);
// 	}
// }