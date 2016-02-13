<?php

function startup_wall(){
    $wall = startup_get_option( 'wall' );
    if ( $wall ){
        add_menu_page( 'StartUp Wall', 'Wall', 'read', 'startup-wall', 'startup_wall_init', '', 0 );
    }
}

function startup_wall_init(){
    $current_user = wp_get_current_user(); //grid_thumb
    $img  = wp_get_attachment_image_src( get_user_meta( $current_user->ID, '_startup_user_avatar_id', 1 ), 'grid_thumb' );
    if ( !$img ) {
        $upload = true;
        $img[0] =  plugins_url( '../img/profile.png', __FILE__ );
    }
    $bio  = get_user_meta( $current_user->ID, '_startup_user_user_text_field', true );
    //    echo 'Username: ' . $current_user->user_login . '<br />';
    //    echo 'User email: ' . $current_user->user_email . '<br />';
    //    echo 'User first name: ' . $current_user->user_firstname . '<br />';
    //    echo 'User last name: ' . $current_user->user_lastname . '<br />';
    //    echo 'User display name: ' . $current_user->display_name . '<br />';
    //    echo 'User ID: ' . $current_user->ID . '<br />';
    //    print_r($current_user);
 ?>

<div class='wrap'>

<div id="poststuff">

		<div id="post-body" class="metabox-holder columns-2">

			<!-- main content -->
			<div id="post-body-content">

				<div class="meta-box-sortables ui-sortable">

					<div class="postbox">
                        
                        <div class="hero">
                            <canvas class="hero_background" width="200" height="200" id="heroCanvas"></canvas>
                            <div>
                                <img src="<?php echo $img[0] ?>" alt="Avatar" class="img-circle avatar" />
                                <?php if ( $upload == true ) { ?>                           
                                    <a href="<?php echo admin_url() ?>/profile.php#cmb2-metabox-_startup_user_edit" title="<?php _e( 'Upload profile picture' ); ?>" class="hero_upload"><span class="dashicons dashicons-camera"></span></a>
                                <?php } ?>
                            </div>
                            <div class="hero_name">
                                <?php if ( $current_user->user_firstname || $current_user->user_lastname ) { ?>
                                    <h1><?php echo $current_user->user_firstname . ' ' . $current_user->user_lastname ?></h1>
                                <?php } else { ?>
                                    <a class="button-primary" href="<?php echo admin_url() ?>/profile.php" title="<?php _e( 'Tell us your name' ); ?>"><?php _e( 'Tell us your name' ); ?></a>
                                <?php } ?>
                            </div>
                        </div>
                        
                        


						<div class="inside">
                            
                            <?php if ( $bio ) { ?>
                                <p><?php echo $bio ?></p>
                            <div style="text-align:right"><a class="button-secondary" href="<?php echo admin_url() ?>/profile.php" title="<?php _e( 'Edit' ); ?>"><?php _e( 'Edit' ); ?></a></div>
                            <?php } ?>
                            
						</div>
						<!-- .inside -->

					</div>
					<!-- .postbox -->

				</div>
				<!-- .meta-box-sortables .ui-sortable -->

			</div>
			<!-- post-body-content -->

			<!-- sidebar -->
			<div id="postbox-container-1" class="postbox-container">

				<div class="meta-box-sortables">

					<div class="postbox">

						<h3><span><?php esc_attr_e(
									'Sidebar Content Header', 'wp_admin_style'
								); ?></span></h3>

						<div class="inside">
							<p><?php esc_attr_e(
									'Everything you see here, from the documentation to the code itself, was created by and for the community. WordPress is an Open Source project, which means there are hundreds of people all over the world working on it. (More than most commercial platforms.) It also means you are free to use it for anything from your cat’s home page to a Fortune 500 web site without paying anyone a license fee and a number of other important freedoms.',
									'wp_admin_style'
								); ?></p>
						</div>
						<!-- .inside -->

					</div>
					<!-- .postbox -->

				</div>
				<!-- .meta-box-sortables -->

			</div>
			<!-- #postbox-container-1 .postbox-container -->

		</div>
		<!-- #post-body .metabox-holder .columns-2 -->

		<br class="clear">
	</div>
	<!-- #poststuff -->    
    
</div>

<script type="text/javascript">
    var BLUR_RADIUS = 100;

    var canvas = document.getElementById("heroCanvas");
    var canvasContext = canvas.getContext('2d');

    var canvasBackground = new Image();
    canvasBackground.src = "<?php echo $img[0] ?>";

    var drawBlur = function() {
        var w = canvas.width;
        var h = canvas.height;
        canvasContext.drawImage(canvasBackground, 0, 0, w, h);
        stackBlurCanvasRGBA('heroCanvas', 0, 0, w, h, BLUR_RADIUS);
    };

    canvasBackground.onload = function() {
        drawBlur();
    }
</script>
<?php }
    
add_action('admin_menu', 'startup_wall');

function startup_add_menu_icon_wall(){ ?>
    <style>
        #toplevel_page_startup-wall .dashicons-admin-generic::before {
            font-family:  FontAwesome !important;
            content: '\f192';
        }
    </style>
<?php }

add_action( 'admin_head', 'startup_add_menu_icon_wall' );