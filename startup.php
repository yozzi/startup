<?php
/*
Plugin Name: StartUp
Description: Le plugin pour les fonctions de base de StartUp Reloaded
Author: Yann Caplain
Version: 1.2.2
Text Domain: startup
*/

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

//GitHub Plugin Updater
function startup_reloaded_plugin_updater() {
	include_once 'lib/updater.php';
	//define( 'WP_GITHUB_FORCE_UPDATE', true );
	if ( is_admin() ) {
		$config = array(
			'slug' => plugin_basename( __FILE__ ),
			'proper_folder_name' => 'startup',
			'api_url' => 'https://api.github.com/repos/yozzi/startup',
			'raw_url' => 'https://raw.github.com/yozzi/startup/master',
			'github_url' => 'https://github.com/yozzi/startup',
			'zip_url' => 'https://github.com/yozzi/startup/archive/master.zip',
			'sslverify' => true,
			'requires' => '3.0',
			'tested' => '3.3',
			'readme' => 'README.md',
			'access_token' => '',
		);
		new WP_GitHub_Updater( $config );
	}
}

//add_action( 'init', 'startup_reloaded_plugin_updater' );

/************************** Includes */

//Pubs pour les options
//require('inc/options.php');

function startup_reloaded_includes() {
    if( !current_user_can( 'manage_options' ) ) {
        require('inc/help.php');
    }
}

add_action('admin_head', 'startup_reloaded_includes');


/************************** Style de la page de connexion */
if (!is_plugin_active('theme-my-login/theme-my-login.php')){
    function startup_reloaded_custom_login_style() {
        echo '<style type="text/css">';
        include 'css/startup_login.css';
        echo '</style>';
    }

add_action('login_head', 'startup_reloaded_custom_login_style');
}

/************************** Style de la zone admin */

function startup_reloaded_custom_admin_head() {
	if( !current_user_can( 'manage_options' ) ) {
        echo '<style type="text/css">';
        include 'css/startup_admin.css';
        echo '</style>';
    }
}

add_action('admin_head', 'startup_reloaded_custom_admin_head');

/************************** Style de la zone admin pour tout le monde */

function startup_reloaded_custom_admin_head_everyone() {
    echo '<style type="text/css">';
    include 'css/startup_admin_everyone.css';
    echo '</style>';
}

add_action('admin_head', 'startup_reloaded_custom_admin_head_everyone');

/************************** Rediriger vers une autre page au login */

function startup_reloaded_login_redirect( $redirect_to, $request, $user ) {
    //if ( is_array( $user->roles ) ) {
        //if ( in_array( 'owner', $user->roles ) ) {
            return admin_url( 'edit.php?post_type=page' );
       // } else {
       //     return admin_url();
       //}
    //}
}

add_filter( 'login_redirect', 'startup_reloaded_login_redirect', 10, 3 );

/************************** Retirer des éléments du menu */

function startup_reloaded_remove_admin_menus (){
    //Retirer ICI des éléments pour tout les utilisateurs
    //Retirer le premier separateur
    global $menu;
    unset($menu[4]);
    
    //Retirer le menu Tableau de bord
    remove_menu_page('index.php'); // Dashboard tab
    
    if( current_user_can( 'manage_options' ) ) {
        //Retirer ICI des éléments pour l'administrateur
        
    } else {
        //Retirer ici des éléments en fonction des capacités et rôles

        if ( function_exists('remove_menu_page') ) {

            //Posts, automatique avec URE
            if ( !current_user_can( 'publish_posts' ) ){
                remove_menu_page('edit.php'); // Posts
            }
            
            // Sous-menu Post Tags
            remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag');

            //Pour référence, automatique avec URE
            //remove_menu_page('edit.php?post_type=page'); // Pages

            // Sous-menu Ajouter Page, automatique avec URE
            if ( !current_user_can( 'publish_pages' ) ){
                remove_submenu_page('edit.php?post_type=page', 'post-new.php?post_type=page');
            }

            //remove_menu_page('upload.php'); // Media
            //remove_menu_page('link-manager.php'); // Links
            
            // Comments, automatique avec URE
            if ( !current_user_can( 'moderate_comments' ) ){
                remove_menu_page('edit-comments.php');
            }
            
            remove_menu_page('themes.php'); // Appearance
            //remove_submenu_page( 'themes.php', 'customize.php' ); // Sous-menu Personnaliser, MARCHE PAS!
            //remove_submenu_page( 'themes.php', 'widgets.php' ); // Sous-menu Widgets
            //remove_menu_page('plugins.php'); // Plugins
            //remove_menu_page('users.php'); // Users
            remove_menu_page('tools.php'); // Tools
            //remove_menu_page('options-general.php'); // Settings
            remove_menu_page('profile.php'); // Profile
            remove_menu_page('wpcf7'); // Contact
        }
    }
}

add_action('admin_menu', 'startup_reloaded_remove_admin_menus');

/************************** Renommer des éléments du menu */

//function startup_reloaded_edit_admin_menus() {
//    global $menu;
//    $menu[5][0] = 'Blog'; // Change Posts to Blog
//}
//
//add_action( 'admin_menu', 'startup_reloaded_edit_admin_menus' );

/************************** Réorganiser le menu */
//Pour que les pages appraîssent avant les post

function startup_reloaded_custom_menu_order($menu_ord) {
    if (!current_user_can('manage_options')) {
        if (!$menu_ord) return true;
        return array('edit.php?post_type=page', 'edit.php');
    }
}

add_filter('custom_menu_order', 'startup_reloaded_custom_menu_order');

add_filter('menu_order', 'startup_reloaded_custom_menu_order');

/************************** Retirer des éléments de la barre */

function startup_reloaded_remove_admin_bar_links() {
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

add_action( 'wp_before_admin_bar_render', 'startup_reloaded_remove_admin_bar_links' );

/************************** Modifier le message "Howdy, " */

function startup_reloaded_replace_howdy( $wp_admin_bar ) {
    $my_account=$wp_admin_bar->get_node('my-account');
    $newtitle = str_replace( 'Salutations,', 'Vous êtes connecté en tant que', $my_account->title );            
    $wp_admin_bar->add_node(
        array(
            'id' => 'my-account',
            'title' => $newtitle,
        )
    );
}

add_filter( 'admin_bar_menu', 'startup_reloaded_replace_howdy',25 );

/************************** Retirer le panneau "Options de l'écran" */

function startup_reloaded_panneau_options() {
    if ( !current_user_can( 'manage_options' ) )
        add_filter('screen_options_show_screen', '__return_false');
}

add_action( 'plugins_loaded', 'startup_reloaded_panneau_options' );

/************************** Désactiver le glisser déposer des boîtes */
//Commenté car empêche le bon fonctionnement de beaucoup de choses

//function startup_reloaded_disable_drag_metabox() {
//    if (!current_user_can('manage_options')) {
//        wp_deregister_script('postbox');
//    }
//}
//
//add_action( 'admin_init', 'startup_reloaded_disable_drag_metabox' );

/************************** Retirer le lien vers l'aide */

function startup_reloaded_remove_help_tabs($old_help, $screen_id, $screen){
    $screen->remove_help_tabs();
    return $old_help;
}

add_filter( 'contextual_help', 'startup_reloaded_remove_help_tabs', 999, 3 );

/************************** Retirer la barre d'admin sur fontend */

function startup_reloaded_retirer_barre() {
    //if ( !current_user_can( 'manage_options' ) ) {
        add_filter('show_admin_bar', '__return_false');
    //}
}

add_action( 'plugins_loaded', 'startup_reloaded_retirer_barre' );

/************************** Ajouter lien yozz.net */

function startup_reloaded_admin_bar_new_item() {
    global $wp_admin_bar;
    $wp_admin_bar->add_menu(
        array(
            'id' => 'wp-admin-bar-startup',
            'title' => __('StartUp / yozz.net'),
            'href' => 'http://startup.yozz.net'
        )
    );
}

add_action('wp_before_admin_bar_render', 'startup_reloaded_admin_bar_new_item', 10);

/************************** Modifier le numéro de version */

function startup_reloaded_change_footer_version() {
    return 'Version 1.0';
}

add_filter( 'update_footer', 'startup_reloaded_change_footer_version', 9999 );

/************************** WordPress Admin change footer text */

function startup_reloaded_remove_footer_admin () {
    echo 'Vous utilisez l\'application <a href="http://startup.yozz.net" target="_blank">StartUp</a> développée par <a href="http://yozz.net" target="_blank">yozz.net</a>';
}

add_filter('admin_footer_text', 'startup_reloaded_remove_footer_admin');

/************************** Ajouter un lien All Settings pour l'admin */

//function startup_reloaded_all_settings_link() {
//    add_options_page(__('All Settings'), __('Adv. Settings'), 'administrator', 'options.php');
//}
//
//add_action('admin_menu', 'startup_reloaded_all_settings_link');

/************************** Modifier TinyMCE */

// Utiliser l'éditeur WYSIWYG par défaut
function startup_reloaded_default_editor() {
    if (!current_user_can('manage_options')) {
        $r = 'tinymce'; // html or tinymce
        return $r;
    }
}

add_filter( 'wp_default_editor', 'startup_reloaded_default_editor' );

// Utiliser l'éditeur HTML par défaut pour l'admin
function startup_reloaded_admin_default_editor() {
    if (current_user_can('manage_options')) {
        $r = 'html'; // html or tinymce
        return $r;
    }
}

add_filter( 'wp_default_editor', 'startup_reloaded_admin_default_editor' );

/************************** Modifier la page profil */

//Retirer des infos avec jQuery
function startup_reloaded_hide_personal_options(){
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

add_action('admin_head','startup_reloaded_hide_personal_options');

//Pour référence
//Ajouter les champs dans informations de contact
//function startup_reloaded_extended_contact_info($user_contactmethods) {  
//    $user_contactmethods = array(
//        'building' => __('Building'),
//        'room' => __('Room'),
//        'phone' => __('Phone')
//    );  
//    return $user_contactmethods;
//}  
//
//add_filter('user_contactmethods', 'startup_reloaded_extended_contact_info');

//Pour référence
//Retirer le choix de couleurs
//function startup_reloaded_admin_del_color_options() {
//   global $_wp_admin_css_colors;
//   $_wp_admin_css_colors = 0;
//}

//add_action('admin_head', 'startup_reloaded_admin_del_color_options');

//Désactiver les notifications de mise-à-jour de WordPress pour les non-admin
function startup_reloaded_hide_update_notice_to_all_but_admin_users() {
    if (!current_user_can('update_core')) {
        remove_action( 'admin_notices', 'update_nag', 3 );
    }
}

add_action( 'admin_head', 'startup_reloaded_hide_update_notice_to_all_but_admin_users', 1 );




/************************** Help */

function startup_reloaded_help(){
    add_menu_page( 'StartUp Help', 'Help', 'read', 'startup-help', 'startup_reloaded_help_init' );
}

function startup_reloaded_help_init(){
    require('inc/help-content.php');
}

add_action('admin_menu', 'startup_reloaded_help');

function startup_reloaded_add_menu_icon_help(){ ?>
    <style>
        #toplevel_page_startup-help .dashicons-admin-generic::before {
            content: "\f339";
            /*color: #555 !important;*/
        }
    </style>
<?php }

add_action( 'admin_head', 'startup_reloaded_add_menu_icon_help' );

/************************** Blog Shortcode */
function startup_reloaded_blog_shortcode( $atts ) {

	// Attributes
    $atts = shortcode_atts(array(
            'bg' => ''
        ), $atts);
    
	// Code
        ob_start();
        require get_template_directory() . '/template-parts/content-blog.php';
        return ob_get_clean();    
}
add_shortcode( 'blog', 'startup_reloaded_blog_shortcode' );

//Remove emoji
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

/************************** Simply Show IDs 1.3.3 */
// Prepend the new column to the columns array
function ssid_column($cols) {
	$cols['ssid'] = 'ID';
	return $cols;
}

// Echo the ID for the new column
function ssid_value($column_name, $id) {
	if ($column_name == 'ssid')
		echo $id;
}

function ssid_return_value($value, $column_name, $id) {
	if ($column_name == 'ssid')
		$value = $id;
	return $value;
}

// Output CSS for width of new column
function ssid_css() {
?>
<style type="text/css">
	#ssid { width: 50px; } /* Simply Show IDs */
</style>
<?php	
}

// Actions/Filters for various tables and the css output
function ssid_add() {
	add_action('admin_head', 'ssid_css');

	add_filter('manage_posts_columns', 'ssid_column');
	add_action('manage_posts_custom_column', 'ssid_value', 10, 2);

	add_filter('manage_pages_columns', 'ssid_column');
	add_action('manage_pages_custom_column', 'ssid_value', 10, 2);

	add_filter('manage_media_columns', 'ssid_column');
	add_action('manage_media_custom_column', 'ssid_value', 10, 2);

	add_filter('manage_link-manager_columns', 'ssid_column');
	add_action('manage_link_custom_column', 'ssid_value', 10, 2);

	add_action('manage_edit-link-categories_columns', 'ssid_column');
	add_filter('manage_link_categories_custom_column', 'ssid_return_value', 10, 3);

	foreach ( get_taxonomies() as $taxonomy ) {
		add_action("manage_edit-${taxonomy}_columns", 'ssid_column');			
		add_filter("manage_${taxonomy}_custom_column", 'ssid_return_value', 10, 3);
	}

	add_action('manage_users_columns', 'ssid_column');
	add_filter('manage_users_custom_column', 'ssid_return_value', 10, 3);

	add_action('manage_edit-comments_columns', 'ssid_column');
	add_action('manage_comments_custom_column', 'ssid_value', 10, 2);
}

add_action('admin_init', 'ssid_add');

?>
