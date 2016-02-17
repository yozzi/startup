<?php

/************************** Style de la page login */

function startup_custom_login_head() {
    if ( wp_get_theme() == 'StartUp Reloaded' ) {
        $overlay = of_get_option( 'login_overlay' );
        echo '<style type="text/css">';
        echo '.vegas-overlay{';
        echo 'background:' . $overlay . '!important;';
        echo '}';
        echo '</style>';
    }
    
    $logo = startup_get_option( 'product_logo' );
    if ( $logo ){
        echo '<style type="text/css">';
        echo 'h1 a {';
        echo 'background-image: url(' . $logo . ') !important;';
        echo '}';
        echo '</style>';
    } else {
        echo '<style type="text/css">';
        echo 'h1 a {';
        echo 'background-image: url(' . plugins_url() . '/startup/img/startup_logo.png) !important;';
        echo '}';
        echo '</style>';
    }
}
if ( !is_plugin_active('theme-my-login/theme-my-login.php')) {
    add_action('login_head', 'startup_custom_login_head');
}
// Add code to footer

// Login Vegas background
function startup_footer_scripts() {
    $login_01 = '';
    $login_02 = '';
    $login_03 = '';
    $login_04 = '';
    $login_05 = '';
    if ( wp_get_theme() == 'StartUp Reloaded' ) {
        $login_01 = of_get_option( 'login_01' );
        $login_02 = of_get_option( 'login_02' );
        $login_03 = of_get_option( 'login_03' );
        $login_04 = of_get_option( 'login_04' );
        $login_05 = of_get_option( 'login_05' );
    }
    
    if ( $login_01 | $login_02 | $login_03 | $login_04 | $login_05 ) {
?>
    <script type="text/javascript">
        jQuery(function() {
            jQuery('body').vegas({
                slides: [
                    <?php if( $login_01 ) { ?>{ src: '<?php echo $login_01 ?>' },<?php } ?>
                    <?php if( $login_02 ) { ?>{ src: '<?php echo $login_02 ?>' },<?php } ?>
                    <?php if( $login_03 ) { ?>{ src: '<?php echo $login_03 ?>' },<?php } ?>
                    <?php if( $login_04 ) { ?>{ src: '<?php echo $login_04 ?>' },<?php } ?>
                    <?php if( $login_05 ) { ?>{ src: '<?php echo $login_05 ?>' },<?php } ?>
                ],
                overlay: true
            });
        });
    </script>
<?php } else { ?>
    <script type="text/javascript">
        jQuery(function() {
            jQuery('body').vegas({
                slides: [
                    { src: '<?php echo plugins_url( '/../img/login/01.jpg', __FILE__ ) ?>' },
                    { src: '<?php echo plugins_url( '/../img/login/02.jpg', __FILE__ ) ?>' },
                    { src: '<?php echo plugins_url( '/../img/login/03.jpg', __FILE__ ) ?>' },
                ],
                overlay: true
            });
        });
    </script>     
<?php }
                                                                     
}
if ( !is_plugin_active('theme-my-login/theme-my-login.php')) {
    add_action( 'login_footer', 'startup_footer_scripts' );
}