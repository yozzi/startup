<?php

//Désactiver les notifications de mise-à-jour de WordPress pour les non-admin
function startup_hide_update_notice_to_all_but_admin_users() {
    if (!current_user_can('update_core')) {
        remove_action( 'admin_notices', 'update_nag', 3 );
    }
}

add_action( 'admin_head', 'startup_hide_update_notice_to_all_but_admin_users', 1 );

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

// Slug columns
Class WPAdminSlugColumn {

	/**
	* This is the constructor for WPAdminSlugColumn Class
	*
	* @return void
	*/
	public function __construct() {
		add_filter( 'manage_posts_columns', array( $this, 'SAC_posts' ) );
		add_action( 'manage_posts_custom_column', array( $this, 'SAC_posts_data' ), 10, 2);
		add_filter( 'manage_pages_columns', array( $this, 'SAC_pages' ) );
		add_action( 'manage_pages_custom_column', array( $this, 'SAC_pages_data' ), 10, 2);
	}

	/**
	* Adds slug to Posts column with option
	*
	* @return void
	*/
	public function SAC_posts( $defaults ) {
		$defaults['SAC_Slug'] = __( 'Post Slug' );
		return $defaults;
	}

	public function SAC_posts_data( $column_name, $id ) {
		if ( $column_name == 'SAC_Slug' ) {
			$post_slug = get_post( $id )->post_name;
			echo $post_slug;
		}
	}

	/**
	* Adds slug to Pages column with option
	*
	* @return void
	*/
	public function SAC_pages( $defaults ) {
		$defaults['SAC_Slug'] = __( 'Page Slug' );
		return $defaults;
	}

	public function SAC_pages_data( $column_name, $id ) {
		if ( $column_name == 'SAC_Slug' ) {
			$page_slug = get_page( $id )->post_name;
			echo $page_slug;
		}
	}

}

$WPAdminSlugColumn = new WPAdminSlugColumn();

/************************** Ajouter un lien All Settings pour l'admin */

//function startup_all_settings_link() {
//    add_options_page(__('All Settings'), __('Adv. Settings'), 'administrator', 'options.php');
//}
//
//add_action('admin_menu', 'startup_all_settings_link');

/************************** Forcer le choix des couleurs */
//function change_admin_color($result) {
//    $color = startup_get_option( 'color' );
//    if ( $color ){
//        return $color;
//    }
//}
//    
//add_filter('get_user_option_admin_color', 'change_admin_color');