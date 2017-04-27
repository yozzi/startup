<?php

if (strpos(wp_get_theme(), 'StartUp') !== false) {
    
    /************************** Blog Shortcode */

    function startup_blog_shortcode( $atts ) {

        // Attributes
        $atts = shortcode_atts(array(
                'bg' => ''
            ), $atts);

        // Code
        ob_start();
        if ( function_exists( 'startup_reloaded_setup' ) || function_exists( 'startup_revolution_setup' ) ) {
            require get_template_directory() . '/template-parts/content-blog.php';
        } else {
            echo 'You should install <a href="https://github.com/yozzi/startup-reloaded" target="_blank">StartUp Reloaded</a> or <a href="https://github.com/yozzi/startup-revolution" target="_blank">StartUp Revolution</a> theme to make things happen...';
        }
        return ob_get_clean();    
    }
    add_shortcode( 'blog', 'startup_blog_shortcode' );
    
    /************************** Sticky posts Shortcode */

    function startup_sticky_shortcode( $atts ) {

        // Attributes
        $atts = shortcode_atts(array(
                'bg' => ''
            ), $atts);

        // Code
        ob_start();
        if ( function_exists( 'startup_reloaded_setup' ) || function_exists( 'startup_revolution_setup' ) ) {
            require get_template_directory() . '/template-parts/content-sticky.php';
        } else {
            echo 'You should install <a href="https://github.com/yozzi/startup-reloaded" target="_blank">StartUp Reloaded</a> or <a href="https://github.com/yozzi/startup-revolution" target="_blank">StartUp Revolution</a> theme to make things happen...';
        }
        return ob_get_clean();    
    }
    add_shortcode( 'sticky', 'startup_sticky_shortcode' );

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

    function startup_blog_shortcode_ui() {

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
    
     function startup_sticky_shortcode_ui() {

        shortcode_ui_register_for_shortcode(
            'sticky',
            array(
                'label' => esc_html__( 'Sticky', 'startup' ),
                'listItemImage' => 'dashicons-sticky',
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
        add_action( 'init', 'startup_blog_shortcode_ui');
        add_action( 'init', 'startup_sticky_shortcode_ui');
    }
}