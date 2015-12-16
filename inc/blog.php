<?php

if ( wp_get_theme() == 'StartUp Reloaded' ) {
    
    /************************** Blog Shortcode */

    function startup_blog_shortcode( $atts ) {

        // Attributes
        $atts = shortcode_atts(array(
                'bg' => ''
            ), $atts);

        // Code
            ob_start();
            require get_template_directory() . '/template-parts/content-blog.php';
            return ob_get_clean();    
    }
    add_shortcode( 'blog', 'startup_blog_shortcode' );

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
                echo '<div class="error message"><p>Shortcode UI plugin must be active to use fast shortcodes.</p></div>';
            }
        }

    add_action( 'init', 'shortcode_ui_detection' );
    }

    function startup_shortcode_ui() {

        shortcode_ui_register_for_shortcode(
            'blog',
            array(
                'label' => esc_html__( 'Blog', 'startup' ),
                'listItemImage' => 'dashicons-admin-post',
                'attrs' => array(
                    array(
                        'label' => esc_html__( 'Background', 'startup' ),
                        'attr'  => 'bg',
                        'type'  => 'color',
                    ),
                ),
            )
        );
    };

    if ( function_exists( 'shortcode_ui_register_for_shortcode' ) ) {
        add_action( 'init', 'startup_shortcode_ui');
    }
}