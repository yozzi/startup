<?php

function startup_plugin_updater() {
	include_once '../lib/updater.php';
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

add_action( 'init', 'startup_plugin_updater' );