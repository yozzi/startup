<?php

/************************** Members Shortcode */

function startup_members_shortcode( $atts ) {

    // Attributes
    $atts = shortcode_atts(array(
            'bg' => '',
            'id' => '',
        ), $atts);

    // Code
        ob_start();
        require get_template_directory() . '/template-parts/content-members.php';
        return ob_get_clean();    
}
add_shortcode( 'member', 'startup_members_shortcode' );

// Shortcode UI
/**
 * Detecion de Shortcake. Identique dans tous les plugins.
 */
if ( !function_exists( 'shortcode_ui_detection' ) ) {
    function shortcode_ui_detection() {
        if ( !function_exists( 'shortcode_ui_register_for_shortcode' ) ) {
            add_action( 'admin_notices', 'shortcode_ui_notice' );
        }
    }

    function shortcode_ui_notice() {
        if ( current_user_can( 'activate_plugins' ) ) {
            echo '<div class="error message"><p>' . __( 'Shortcake plugin must be active to use fast shortcodes.', 'startup' ) . '</p></div>';
        }
    }

    add_action( 'init', 'shortcode_ui_detection' );
}

function startup_member_shortcode_ui() {

    shortcode_ui_register_for_shortcode(
        'member',
        array(
            'label' => esc_html__( 'Members', 'startup' ),
            'listItemImage' => 'dashicons-admin-users',
            'attrs' => array(
                array(
                    'label' => esc_html__( 'Background', 'startup' ),
                    'attr'  => 'bg',
                    'type'  => 'color',
                ),
            array(
                    'label' => esc_html__( 'ID', 'startup' ),
                    'attr'  => 'id',
					'type' => 'post_select',
					'query' => array( 'post_type' => 'team' ),
					'multiple' => false,
                ),
            ),
        )
    );
};

if ( function_exists( 'shortcode_ui_register_for_shortcode' ) ) {
    add_action( 'init', 'startup_member_shortcode_ui');
}