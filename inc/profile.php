<?php

// Profile Metaboxes
function startup_profile_meta() {
    
	// Start with an underscore to hide fields from custom fields list
	$prefix = '_startup_user_';

	$cmb_user = new_cmb2_box( array(
		'id'               => $prefix . 'edit',
		'title'            => __( 'User Profile Metabox', 'cmb2' ),
		'object_types'     => array( 'user' ), // Tells CMB2 to use user_meta vs post_meta
		'show_names'       => true,
		'new_user_section' => 'add-new-user', // where form will show on new user page. 'add-existing-user' is only other valid option.
	) );
	$cmb_user->add_field( array(
		'name'     => __( 'Extra Info', 'cmb2' ),
		'desc'     => __( 'field description (optional)', 'cmb2' ),
		'id'       => $prefix . 'extra_info',
		'type'     => 'title',
		'on_front' => false,
	) );
	$cmb_user->add_field( array(
		'name'    => __( 'Avatar', 'cmb2' ),
		'desc'    => __( 'field description (optional)', 'cmb2' ),
		'id'      => $prefix . 'avatar',
		'type'    => 'file',
	) );
	$cmb_user->add_field( array(
		'name' => __( 'Facebook URL', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'facebookurl',
		'type' => 'text_url',
	) );
	$cmb_user->add_field( array(
		'name' => __( 'Twitter URL', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'twitterurl',
		'type' => 'text_url',
	) );
	$cmb_user->add_field( array(
		'name' => __( 'Google+ URL', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'googleplusurl',
		'type' => 'text_url',
	) );
	$cmb_user->add_field( array(
		'name' => __( 'Linkedin URL', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'linkedinurl',
		'type' => 'text_url',
	) );
	$cmb_user->add_field( array(
		'name' => __( 'User Field', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'user_text_field',
		'type' => 'text',
	) );
}

add_action( 'cmb2_admin_init', 'startup_profile_meta' );

//Retirer des infos avec jQuery
function startup_hide_personal_options(){
    if (!current_user_can('manage_options')) {
        echo "
            <script type='text/javascript'>
                jQuery(document).ready(function(jQuery) {
                    jQuery('form#your-profile > h3').hide();
                    jQuery('form#your-profile .user-rich-editing-wrap').hide();
                    jQuery('form#your-profile .user-comment-shortcuts-wrap').hide();
                    jQuery('form#your-profile .user-admin-bar-front-wrap').hide();
                    jQuery('form#your-profile .user-user-login-wrap').hide();
                    jQuery('form#your-profile .user-first-name-wrap').hide();
                    jQuery('form#your-profile .user-last-name-wrap').hide();       
                    jQuery('form#your-profile .user-nickname-wrap').hide();
                    jQuery('form#your-profile .user-display-name-wrap').hide();
                    jQuery('form#your-profile .user-email-wrap').hide();
                    jQuery('form#your-profile .user-url-wrap').hide();
                    jQuery('form#your-profile .user-description-wrap').hide();
                    
                    //Pour référence
                    //jQuery('form#your-profile').show();
                });
            </script>
        ";
    }
}

add_action('admin_head','startup_hide_personal_options');

//Pour référence
//Ajouter les champs dans informations de contact
//function startup_extended_contact_info($user_contactmethods) {  
//    $user_contactmethods = array(
//        'building' => __('Building'),
//        'room' => __('Room'),
//        'phone' => __('Phone')
//    );  
//    return $user_contactmethods;
//}  
//
//add_filter('user_contactmethods', 'startup_extended_contact_info');

//Pour référence
//Retirer le choix de couleurs
//function startup_admin_del_color_options() {
//   global $_wp_admin_css_colors;
//   $_wp_admin_css_colors = 0;
//}

//add_action('admin_head', 'startup_admin_del_color_options');