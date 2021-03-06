<?php
/**
 * CMB2 Plugin Options
 * @version 0.1.0
 */
class startup_Admin {

	/**
 	 * Option key, and option page slug
 	 * @var string
 	 */
	private $key = 'startup_options';

	/**
 	 * Options page metabox id
 	 * @var string
 	 */
	private $metabox_id = 'startup_option_metabox';

	/**
	 * Options Page title
	 * @var string
	 */
	protected $title = '';

	/**
	 * Options Page hook
	 * @var string
	 */
	protected $options_page = '';

	/**
	 * Holds an instance of the object
	 *
	 * @var startup_Admin
	 **/
	private static $instance = null;

	/**
	 * Constructor
	 * @since 0.1.0
	 */
	private function __construct() {
		// Set our title
		$this->title = __( 'StartUp', 'startup' );
	}

	/**
	 * Returns the running object
	 *
	 * @return startup_Admin
	 **/
	public static function get_instance() {
		if( is_null( self::$instance ) ) {
			self::$instance = new startup_Admin();
			self::$instance->hooks();
		}
		return self::$instance;
	}

	/**
	 * Initiate our hooks
	 * @since 0.1.0
	 */
	public function hooks() {
		add_action( 'admin_init', array( $this, 'init' ) );
		add_action( 'admin_menu', array( $this, 'add_options_page' ) );
		add_action( 'cmb2_admin_init', array( $this, 'add_options_page_metabox' ) );
	}


	/**
	 * Register our setting to WP
	 * @since  0.1.0
	 */
	public function init() {
		register_setting( $this->key, $this->key );
	}

	/**
	 * Add menu options page
	 * @since 0.1.0
	 */
	public function add_options_page() {
		$this->options_page = add_options_page( $this->title, $this->title, 'manage_options', $this->key, array( $this, 'admin_page_display' ) );

		// Include CMB CSS in the head to avoid FOUC
		add_action( "admin_print_styles-{$this->options_page}", array( 'CMB2_hookup', 'enqueue_cmb_css' ) );
	}

	/**
	 * Admin page markup. Mostly handled by CMB2
	 * @since  0.1.0
	 */
	public function admin_page_display() {
		?>
		<div class="wrap cmb2-options-page <?php echo $this->key; ?>">
			<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
			<?php cmb2_metabox_form( $this->metabox_id, $this->key ); ?>
		</div>
		<?php
	}

	/**
	 * Add the options metabox to the array of metaboxes
	 * @since  0.1.0
	 */
	function add_options_page_metabox() {

		// hook in our save notices
		add_action( "cmb2_save_options-page_fields_{$this->metabox_id}", array( $this, 'settings_notices' ), 10, 2 );

		$cmb = new_cmb2_box( array(
			'id'         => $this->metabox_id,
			'hookup'     => false,
			'cmb_styles' => false,
			'show_on'    => array(
				// These are important, don't remove
				'key'   => 'options-page',
				'value' => array( $this->key, )
			),
		) );

		// Set our CMB2 fields
        
        $cmb->add_field( array(
			'desc' => __( 'Cleaner admin', 'startup' ),
			'id'   => 'cleaner',
			'type' => 'checkbox',
		) );
        
        $cmb->add_field( array(
			'desc' => __( 'Product logo for login screen 320x180 for best results.', 'startup' ),
			'id'   => 'product_logo',
			'type' => 'file',
		) );
        
        $cmb->add_field( array(
			'desc' => __( 'Product logo for admin bar if different. Optimal size is 24x24 or 48x48 for retina support.', 'startup' ),
			'id'   => 'product_logo_top',
			'type' => 'file',
		) );
        
        $cmb->add_field( array(
			'desc' => __( 'Full logo. Optimal size is 166x60 or 332x120 for retina support. Cleaner admin must be turned on.', 'startup' ),
			'id'   => 'product_logo_full',
			'type' => 'checkbox',
		) );
        
        $cmb->add_field( array(
			'desc' => __( 'Product menu item', 'startup' ),
			'id'   => 'product_menu',
			'type' => 'checkbox',
		) );
        
		$cmb->add_field( array(
			'desc' => __( 'Product name', 'startup' ),
			'id'   => 'product_name',
			'type' => 'text',
		) );
        
        $cmb->add_field( array(
			'desc' => __( 'Product url', 'startup' ),
			'id'   => 'product_url',
			'type' => 'text',
		) );
        
        $cmb->add_field( array(
			'desc' => __( 'Product version', 'startup' ),
			'id'   => 'product_version',
			'type' => 'text',
		) );
        
        $cmb->add_field( array(
			'desc' => __( 'Product footer', 'startup' ),
			'id'   => 'product_footer',
			'type' => 'text',
		) );
        
        $cmb->add_field( array(
			'desc' => __( 'Use dashboard', 'startup' ),
			'id'   => 'dashboard',
			'type' => 'checkbox',
		) );
        
        $cmb->add_field( array(
			'desc' => __( 'Use blog', 'startup' ),
			'id'   => 'blog',
			'type' => 'checkbox',
		) );
        
        $cmb->add_field( array(
			'desc' => __( 'Use wall', 'startup' ),
			'id'   => 'wall',
			'type' => 'checkbox',
		) );
        
        $cmb->add_field( array(
			'desc' => __( 'Show help page', 'startup' ),
			'id'   => 'help',
			'type' => 'checkbox',
		) );
        
        $cmb->add_field( array(
			'desc' => __( 'Show notices', 'startup' ),
			'id'   => 'notices',
			'type' => 'checkbox',
		) );
        
        $cmb->add_field( array(
			'desc' => __( 'Help notice', 'startup' ),
			'id'   => 'notice_help',
			'type' => 'text',
		) );
        
        $cmb->add_field( array(
			'desc' => __( 'ID columns', 'startup' ),
			'id'   => 'id_columns',
			'type' => 'checkbox',
		) );
        
        $cmb->add_field( array(
			'desc' => __( 'Login screen slideshow', 'startup' ),
			'id'   => 'login_slideshow',
			'type' => 'checkbox',
		) );
        
        $cmb->add_field( array(
			'desc' => __( 'Login screen background or slideshow overlay color', 'startup' ),
			'id'   => 'login_overlay',
			'default' => '#ff4500',
            'type' => 'colorpicker',
		) );
        
        $cmb->add_field( array(
			'desc' => __( 'Login screen slideshow overlay opacity (0-1)', 'startup' ),
			'id'   => 'login_opacity',
			'default' => '0.85',
            'type' => 'text_small',
		) );
        
        $cmb->add_field( array(
			'desc' => __( 'Choose an image for the login screen slideshow.', 'startup' ),
			'id'   => 'login_01',
			'type' => 'file',
		) );
        
        $cmb->add_field( array(
			'desc' => __( 'Choose another one.', 'startup' ),
			'id'   => 'login_02',
			'type' => 'file',
		) );
        
        $cmb->add_field( array(
			'desc' => __( 'Choose one more.', 'startup' ),
			'id'   => 'login_03',
			'type' => 'file',
		) );
        
        $cmb->add_field( array(
			'id'   => 'login_04',
			'type' => 'file',
		) );
        
        $cmb->add_field( array(
			'id'   => 'login_05',
			'type' => 'file',
		) );
        
//        $cmb->add_field( array(
//			'desc' => __( 'Force admin color scheme', 'startup' ),
//			'id'   => 'color',
//			'type'             => 'select',
//            'show_option_none' => true,
//            'default'          => '',
//            'options'          => array(
//                'fresh' => __( 'Fresh', 'startup' ),
//                'light' => __( 'Light', 'startup' ),
//                'blue' => __( 'Blue', 'startup' ),
//                'coffee' => __( 'Coffee', 'startup' ),
//                'ectoplasm' => __( 'Ectoplasm', 'startup' ),
//                'midnight' => __( 'Midnight', 'startup' ),
//                'ocean' => __( 'Ocean', 'startup' ),
//                'sunrise' => __( 'Sunrise', 'startup' ),
//            ),
//		) );


	}

	/**
	 * Register settings notices for display
	 *
	 * @since  0.1.0
	 * @param  int   $object_id Option key
	 * @param  array $updated   Array of updated fields
	 * @return void
	 */
	public function settings_notices( $object_id, $updated ) {
		if ( $object_id !== $this->key || empty( $updated ) ) {
			return;
		}

		add_settings_error( $this->key . '-notices', '', __( 'Settings updated.', 'startup' ), 'updated' );
		settings_errors( $this->key . '-notices' );
	}

	/**
	 * Public getter method for retrieving protected/private variables
	 * @since  0.1.0
	 * @param  string  $field Field to retrieve
	 * @return mixed          Field value or exception is thrown
	 */
	public function __get( $field ) {
		// Allowed fields to retrieve
		if ( in_array( $field, array( 'key', 'metabox_id', 'title', 'options_page' ), true ) ) {
			return $this->{$field};
		}

		throw new Exception( 'Invalid property: ' . $field );
	}

}

/**
 * Helper function to get/return the startup_Admin object
 * @since  0.1.0
 * @return startup_Admin object
 */
function startup_admin() {
	return startup_Admin::get_instance();
}

/**
 * Wrapper function around cmb2_get_option
 * @since  0.1.0
 * @param  string  $key Options array key
 * @return mixed        Option value
 */
function startup_get_option( $key = '' ) {
	return cmb2_get_option( startup_admin()->key, $key );
}

// Get it started
startup_admin();