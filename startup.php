<?php
/*
Plugin Name: StartUp
Description: Le plugin pour les fonctions de base de StartUp
Author: Yann Caplain
Version: 1
*/

/************************** Includes */

require('inc/roles.php');
require('inc/activate.php');
require('inc/options.php');
require('inc/help.php');


/************************** Style de la page de connexion */

function yozz_custom_login_style() {
    echo '<style type="text/css">';
    include 'css/startup_admin_login.css';
    echo '</style>';
}

add_action('login_head', 'yozz_custom_login_style');

/************************** Style de la zone admin */

function yozz_custom_admin_head() {
	if( !current_user_can( 'manage_options' ) ) {
        echo '<style type="text/css">';
        include 'css/startup_admin.css';
        echo '</style>';
    }
}

add_action('admin_head', 'yozz_custom_admin_head');

/************************** Style de la zone admin pour tout le monde */

function yozz_custom_admin_head_everyone() {
    echo '<style type="text/css">';
    include 'css/startup_admin_everyone.css';
    echo '</style>';
}

add_action('admin_head', 'yozz_custom_admin_head_everyone');

/************************** Rediriger vers une autre page au login */

function yozz_login_redirect( $redirect_to, $request, $user )
{
if ( is_array( $user->roles ) ) {
if ( in_array( 'owner', $user->roles ) ) {
return admin_url( 'edit.php?post_type=page' );
} else {
return admin_url();
}
}
}
add_filter( 'login_redirect', 'yozz_login_redirect', 10, 3 );

/************************** Retirer des éléments du menu */

function yozz_remove_admin_menus (){
    if( current_user_can( 'manage_options' ) ) {
        //Retirer ICI des éléments pour l'administrateur
    } else {
        //Retirer ici des éléments en fonction des capacités et rôles

        if ( function_exists('remove_menu_page') ) {

            //Retirer le menu Tableau de bord
            remove_menu_page('index.php'); // Dashboard tab
        
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
//remove_menu_page('edit-comments.php'); // Comments
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
add_action('admin_menu', 'yozz_remove_admin_menus');

/************************** Renommer des éléments du menu */

function yozz_edit_admin_menus() {
global $menu;

$menu[5][0] = 'Blog'; // Change Posts to Blog
}
add_action( 'admin_menu', 'yozz_edit_admin_menus' );

/************************** Réorganiser le menu */
//Pour que les pages appraîssent avant les post

function yozz_custom_menu_order($menu_ord) {
if (!current_user_can('manage_options')) {
if (!$menu_ord) return true;
return array('edit.php?post_type=page', 'edit.php');
}
}
add_filter('custom_menu_order', 'yozz_custom_menu_order');
add_filter('menu_order', 'yozz_custom_menu_order');

/************************** Retirer des éléments de la barre */

function yozz_remove_admin_bar_links() {
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
add_action( 'wp_before_admin_bar_render', 'yozz_remove_admin_bar_links' );

/************************** Modifier le message "Howdy, " */

function yozz_replace_howdy( $wp_admin_bar ) {
$my_account=$wp_admin_bar->get_node('my-account');
$newtitle = str_replace( 'Salutations,', '', $my_account->title );            
$wp_admin_bar->add_node( array(
'id' => 'my-account',
'title' => $newtitle,
) );
}
add_filter( 'admin_bar_menu', 'yozz_replace_howdy',25 );

/************************** Retirer le panneau "Options de l'écran" */

function yozz_panneau_options() {
if ( !current_user_can( 'manage_options' ) )
add_filter('screen_options_show_screen', '__return_false');
}
add_action( 'plugins_loaded', 'yozz_panneau_options' );

/************************** Désactiver le glisser déposer des boîtes */
//Commenté car empêche le bon fonctionnement de beaucoup de choses

//function yozz_disable_drag_metabox() {
//if (!current_user_can('manage_options')) {
//wp_deregister_script('postbox');
//}
//}

//add_action( 'admin_init', 'yozz_disable_drag_metabox' );

/************************** Retirer le lien vers l'aide */

add_filter( 'contextual_help', 'yozz_remove_help_tabs', 999, 3 );
function yozz_remove_help_tabs($old_help, $screen_id, $screen){
$screen->remove_help_tabs();
return $old_help;
}

/************************** Retirer la barre d'admin sur le site*/

function yozz_retirer_barre() {
if ( !current_user_can( 'manage_options' ) )
add_filter('show_admin_bar', '__return_false');
}
add_action( 'plugins_loaded', 'yozz_retirer_barre' );

/************************** Ajouter lien yozz.net */

function yozz_admin_bar_new_item() {
global $wp_admin_bar;
$wp_admin_bar->add_menu(array(
'id' => 'wp-admin-bar-startup',
'title' => __('StartUp beta par yozz.net'),
'href' => 'http://yozz.net'
));
}
add_action('wp_before_admin_bar_render', 'yozz_admin_bar_new_item', 10);

/************************** Modifier le numéro de version */

function yozz_change_footer_version() {
return 'Version beta 0.3';
}
add_filter( 'update_footer', 'yozz_change_footer_version', 9999 );

/************************** WordPress Admin change footer text */

function yozz_remove_footer_admin () {
echo 'Vous utilisez l\'outil StartUp de <a href="http://yozz.net">yozz.net</a>';
}
add_filter('admin_footer_text', 'yozz_remove_footer_admin');

/************************** Ajouter un lien All Settings pour l'admin */

//function yozz_all_settings_link() {
//add_options_page(__('All Settings'), __('Adv. Settings'), 'administrator', 'options.php');
//}
//add_action('admin_menu', 'yozz_all_settings_link');

/************************** Modifier TinyMCE */

// Utiliser l'éditeur WYSIWYG par défaut
function yozz_default_editor() {
if (!current_user_can('manage_options')) {
$r = 'tinymce'; // html or tinymce
return $r;
}
}
add_filter( 'wp_default_editor', 'yozz_default_editor' );

// Utiliser l'éditeur HTML par défaut pour l'admin
function yozz_admin_default_editor() {
if (current_user_can('manage_options')) {
$r = 'html'; // html or tinymce
return $r;
}
}
add_filter( 'wp_default_editor', 'yozz_admin_default_editor' );

// J'ai désactivé tout ce qui suit car ça donne un bug sous la zone d'edition du contenu

//// Modifier les icones
//if (isset($wp_version)) {
//add_filter("mce_buttons", "yozz_extended_editor_mce_buttons", 0);
//add_filter("mce_buttons_2", "yozz_extended_editor_mce_buttons_2", 0);
//
////The first toolbar line
//function yozz_extended_editor_mce_buttons($buttons) {
//if (!current_user_can('manage_options')) {
//return array(
//"undo",
//"redo",
//"bold",
//"italic",
//"underline",
//"strikethrough",
//"bullist",
//"numlist",
//"separator",
//"charmap",
//"separator",
//"link",
//"unlink",
//"fullscreen");
//}
//}
//
////The second toolbar line
//function yozz_extended_editor_mce_buttons_2($buttons) {
//if (!current_user_can('manage_options')) {
//return array();
//}
//}
//
////The fullscreen bar
////Retirer tout
//function yozz_remove_dfe_buttons( $buttons ) {
//if (!current_user_can('manage_options')) {
//unset($buttons['0']); //Remove first separator
//unset($buttons['blockquote']); //Remove blockquote button
//unset($buttons['help']); //Remove help button
//unset($buttons['bold']);
//unset($buttons['italic']);
//unset($buttons['bullist']);
//unset($buttons['numlist']);
//unset($buttons['link']);
//unset($buttons['unlink']);
//return $buttons;
//}
//}
//add_filter( 'wp_fullscreen_buttons', 'yozz_remove_dfe_buttons' );
////Ajouter les mêmes boutons que pour le mode pas plein écran et dans le même ordre
//function yozz_add_dfe_buttons($buttons)
//{
//if (!current_user_can('manage_options')) {
////$buttons[] = 'separator'; //Add separator (optional)
//$buttons['undo'] = array(
//'title' => __('Undo'), //Button Title
//'onclick' => "tinyMCE.execCommand('undo');", //Command to excecute
//'both' => false //Show in visual mode. Set 'true' to show in both visual and HTML mode
//);
//$buttons['redo'] = array(
//'title' => __('Redo'),
//'onclick' => "tinyMCE.execCommand('redo');",
//'both' => false
//);
//$buttons['bold'] = array(
//'title' => __('Bold'),
//'onclick' => "tinyMCE.execCommand('bold');",
//'both' => false
//);
//$buttons['italic'] = array(
//'title' => __('Italic'),
//'onclick' => "tinyMCE.execCommand('italic');",
//'both' => false
//);
//$buttons['underline'] = array(
//'title' => __('Underline'),
//'onclick' => "tinyMCE.execCommand('underline');",
//'both' => false
//);
//$buttons['strikethrough'] = array(
//'title' => __('Strikethrough'),
//'onclick' => "tinyMCE.execCommand('strikethrough');",
//'both' => false 
//);
//$buttons['bullist'] = array(
//'title' => __('Bulleted list'),
//'onclick' => "tinyMCE.execCommand('bullist');",
//'both' => false
//);
//$buttons['numlist'] = array(
//'title' => __('Numbered list'),
//'onclick' => "tinyMCE.execCommand('numlist');",
//'both' => false
//);
//$buttons['charmap'] = array(
//'title' => __('Special character'),
//'onclick' => "tinyMCE.execCommand('charmap');",
//'both' => false
//);
//$buttons['link'] = array(
//'title' => __('Insert/edit link'),
//'onclick' => "tinyMCE.execCommand('link');",
//'both' => false
//);
//$buttons['unlink'] = array(
//'title' => __('Remove link'),
//'onclick' => "tinyMCE.execCommand('unlink');",
//'both' => false
//);
//return $buttons;
//}
//}
//add_filter( 'wp_fullscreen_buttons', 'yozz_add_dfe_buttons' );
//}
//
///************************** Modifier la page profil */
//
////Retirer des infos avec jQuery
//function yozz_hide_personal_options(){
//if (!current_user_can('manage_options')) {
//echo "<script type='text/javascript'>
//jQuery(document).ready(function(jQuery) {
//jQuery('form#your-profile > h3').hide();
//jQuery('form#your-profile > table').hide();
//jQuery('form#your-profile > table:last').show();
//jQuery('form#your-profile').show(); });
//</script>";
//}
//}

//add_action('admin_head','yozz_hide_personal_options');

//Ajouter les champs dans informations de contact
//function yozz_extended_contact_info($user_contactmethods) {  
//
//$user_contactmethods = array(
//'building' => __('Building'),
//'room' => __('Room'),
//'phone' => __('Phone')
//);  
//
//return $user_contactmethods;
//}  
//
//add_filter('user_contactmethods', 'yozz_extended_contact_info');

//Retirer le choix de couleurs

//function yozz_admin_del_color_options() {
//   global $_wp_admin_css_colors;
//   $_wp_admin_css_colors = 0;
//}
//
//add_action('admin_head', 'yozz_admin_del_color_options');

//Retirer la biographie

class yozz_hide_profile_bio_box
{
public static function start()
{
$action = ( IS_PROFILE_PAGE ? 'show' : 'edit' ) . '_user_profile';
add_action( $action, array ( __CLASS__, 'stop' ) );
ob_start();
}
public static function stop()
{
$html = ob_get_contents();
ob_end_clean();
$headline = __( IS_PROFILE_PAGE ? 'About Yourself' : 'About the user' );
$html = str_replace( '<h3>' . $headline . '</h3>', '', $html );
$html = preg_replace( '~<tr>\s*<th><label for="description".*</tr>~imsUu', '', $html );
print $html;
}
}
add_action( 'personal_options', array ( 'yozz_hide_profile_bio_box', 'start' ) );

//Désactiver les notifications de mise-à-jour de WordPress pour les non-admin
function yozz_hide_update_notice_to_all_but_admin_users()
{
    if (!current_user_can('update_core')) {
        remove_action( 'admin_notices', 'update_nag', 3 );
    }
}
add_action( 'admin_head', 'yozz_hide_update_notice_to_all_but_admin_users', 1 );
?>