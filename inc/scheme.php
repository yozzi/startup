<?php
function startup_admin_color_scheme() {
  wp_admin_css_color( 'startup', __( 'StartUp' ),
    plugins_url() . '/startup/css/scheme.css',
    array( '#12bc9f', '#048c75', '#fff', '#bdfff4' )
  );
}
add_action('admin_init', 'startup_admin_color_scheme');

// Use as default
function startup_set_default_admin_color($user_id) {
  $args = array(
    'ID' => $user_id,
    'admin_color' => 'startup'
  );
  wp_update_user( $args );
}
add_action('user_register', 'startup_set_default_admin_color');