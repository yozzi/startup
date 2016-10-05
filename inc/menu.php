<?php

/************************** Rediriger vers une autre page au login */

function startup_login_redirect( $redirect_to, $request, $user ) {
    $dashboard = startup_get_option( 'dashboard' );
    $wall = startup_get_option( 'wall' );
    $blog = startup_get_option( 'blog' );
    
    if ( !$dashboard ){
        if ( $wall ){
            return admin_url( 'admin.php?page=startup-wall' );
        } else {
            if ( $blog ) {
                return admin_url( 'edit.php' );
            } else {
                return admin_url( 'edit.php?post_type=page' );
            }
        }
    }
}

add_filter( 'login_redirect', 'startup_login_redirect', 10, 3 );

/************************** Rediriger vers une autre page quand on va sur /wp-admin */

function startup_dashboard_redirect(){
    $dashboard = startup_get_option( 'dashboard' );
    $wall = startup_get_option( 'wall' );
    $blog = startup_get_option( 'blog' );
    
    if ( !$dashboard ){
        if ( $wall ){
            wp_redirect(admin_url('admin.php?page=startup-wall'));
        } else {
            if ( $blog ) {
                wp_redirect(admin_url('edit.php'));
            } else {
                wp_redirect(admin_url('edit.php?post_type=page'));
            }
        }
    }
}
add_action('load-index.php','startup_dashboard_redirect');

/************************** Retirer des éléments du menu */

function startup_remove_admin_menus (){
    //Retirer ICI des éléments pour tout les utilisateurs
    //Retirer le premier separateur
    global $menu;
    unset($menu[4]);
    
    //Retirer le menu Tableau de bord
    $dashboard = startup_get_option( 'dashboard' );
    if ( !$dashboard ){
        remove_menu_page('index.php'); // Dashboard tab
    }
    
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

add_action('admin_menu', 'startup_remove_admin_menus');


// Retirer le blog par page options
function startup_post_remove () {
    $blog = startup_get_option( 'blog' );
    if ( !$blog ) {
        remove_menu_page('edit.php');
    }
}    

add_action('admin_menu', 'startup_post_remove');   //adding action for triggering function call

/************************** Renommer des éléments du menu */

//function startup_edit_admin_menus() {
//    global $menu;
//    $menu[5][0] = 'Blog'; // Change Posts to Blog
//}
//
//add_action( 'admin_menu', 'startup_edit_admin_menus' );

/************************** Réorganiser le menu */
//Pour que les pages appraîssent avant les post

//function startup_custom_menu_order($menu_ord) {
//    if (!current_user_can('manage_options')) {
//        if (!$menu_ord) return true;
//        return array('edit.php?post_type=page', 'edit.php');
//    }
//}

//add_filter('custom_menu_order', 'startup_custom_menu_order');

//add_filter('menu_order', 'startup_custom_menu_order');





/************************** Ajouter une page avec la liste de tous les shortcodes */
if(is_admin())
{
	// Create the Paulund toolbar
	$shortcodes = new View_All_Available_Shortcodes();
}

/**
 * View all available shrotcodes on an admin page
 *
 * @author
 **/
class View_All_Available_Shortcodes
{
	public function __construct()
	{
		$this->Admin();
	}
	/**
	 * Create the admin area
	 */
	public function Admin(){
		add_action( 'admin_menu', array(&$this,'Admin_Menu') );
	}

	/**
	 * Function for the admin menu to create a menu item in the settings tree
	 */
	public function Admin_Menu(){
		add_submenu_page(
			'options-general.php',
			'View All Shortcodes',
			'View All Shortcodes',
			'manage_options',
			'view-all-shortcodes',
			array(&$this,'Display_Admin_Page'));
	}

	/**
	 * Display the admin page
	 */
	public function Display_Admin_Page(){
		global $shortcode_tags;

        ?>
        <div class="wrap">
        	<div id="icon-options-general" class="icon32"><br></div>
			<h2>View All Available Shortcodes</h2>
			<div class="section panel">
				<p>This page will display all of the available shortcodes that you can use on your WordPress blog.</p>
        	<table class="widefat importers">
        		<tr><td><strong>Shortcodes</strong></td></tr>
        <?php

	        foreach($shortcode_tags as $code => $function)
	        {
	        	?>
	        		<tr><td>[<?php echo $code; ?>]</td></tr>
	        	<?php
	        }
	    ?>

			</table>
			</div>
		</div>
		<?php
	}
} // END class View_All_Available_Shortcodes