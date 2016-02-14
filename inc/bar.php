<?php

/************************** Retirer des éléments de la barre */

function startup_remove_admin_bar_links() {
    global $wp_admin_bar, $current_user;

    // To remove WordPress logo and related submenu items
    $wp_admin_bar->remove_menu('wp-logo');
    $wp_admin_bar->remove_menu('about');
    $wp_admin_bar->remove_menu('wporg');
    $wp_admin_bar->remove_menu('documentation');
    $wp_admin_bar->remove_menu('support-forums');
    $wp_admin_bar->remove_menu('feedback');

    // To remove Site name/View Site submenu and Edit menu from front end
    //$wp_admin_bar->remove_menu('site-name');
    $wp_admin_bar->remove_menu('view-site');
    $wp_admin_bar->remove_menu('edit');

    // To remove Update Icon/Menu
    $wp_admin_bar->remove_menu('updates');

    // To remove Comments Icon/Menu
    $wp_admin_bar->remove_menu('comments');

    // To remove ' New ' Menu
    $wp_admin_bar->remove_menu('new-content');

    // To remove ' Howdy,user ' Menu completely and Search field from front end
    //$wp_admin_bar->remove_menu('top-secondary');
    $wp_admin_bar->remove_menu('search'); 

    // To remove ' Howdy,user ' subMenus 
    //$wp_admin_bar->remove_menu('user-actions');
    $wp_admin_bar->remove_menu('user-info');
    //$wp_admin_bar->remove_menu('edit-profile');   
    //$wp_admin_bar->remove_menu('logout');

    // To remove the user details tab   
    //$wp_admin_bar->remove_menu('my-account');
}

add_action( 'wp_before_admin_bar_render', 'startup_remove_admin_bar_links' );

/************************** Modifier le message "Howdy, " */

function startup_replace_howdy( $wp_admin_bar ) {
    $my_account=$wp_admin_bar->get_node('my-account');
    $newtitle = str_replace( 'Salutations,', 'Vous êtes connecté en tant que', $my_account->title );            
    $wp_admin_bar->add_node(
        array(
            'id' => 'my-account',
            'title' => $newtitle,
        )
    );
}

add_filter( 'admin_bar_menu', 'startup_replace_howdy',25 );

/************************** Retirer la barre d'admin sur frontend */

function startup_retirer_barre() {
    if ( !current_user_can( 'manage_options' ) ) {
        add_filter('show_admin_bar', '__return_false');
    }
}

add_action( 'plugins_loaded', 'startup_retirer_barre' );

/************************** Ajouter lien yozz.net */

function startup_admin_bar_new_item() {
    global $wp_admin_bar;
    $product_name = startup_get_option( 'product_name' );
    $product_url = startup_get_option( 'product_url' );
    if ( !$product_name ){
        $product_name = 'StartUp / yozz.net';
    }
    if ( !$product_url ){
        $product_url = 'http://startup.yozz.net';
    }   
    $wp_admin_bar->add_menu(
        array(
            'id' => 'wp-admin-bar-startup',
            'title' => $product_name,
            'href' => $product_url
        )
    );
}

add_action('wp_before_admin_bar_render', 'startup_admin_bar_new_item', 10);