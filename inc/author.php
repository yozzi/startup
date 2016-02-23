<?php

if ( is_plugin_active('startup-cpt-team/startup-cpt-team.php') ) {

    /************************** Author Shortcode */

    function startup_author_shortcode( $atts ) {

        // Attributes
        $atts = shortcode_atts(array(
                'bg' => '#f5f5f5',
                'id' => '',
            ), $atts);

        // Code
            ob_start();
            require get_template_directory() . '/template-parts/content-author.php';
            return ob_get_clean();    
    }
    add_shortcode( 'author', 'startup_author_shortcode' );

    // Shortcode UI
    /**
     * Detection de Shortcake. Identique dans tous les plugins.
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

    function startup_author_shortcode_ui() {

        shortcode_ui_register_for_shortcode(
            'author',
            array(
                'label' => esc_html__( 'Author', 'startup' ),
                'listItemImage' => 'dashicons-id',
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
        add_action( 'init', 'startup_author_shortcode_ui');
    }

}