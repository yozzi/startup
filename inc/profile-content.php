<?php 
    $current_user = wp_get_current_user();
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
                        </div>
                        
                        <?php 

                            $img  = get_user_meta( $current_user->ID, '_startup_user_avatar', true );

                            if ( $img ) { ?>
                                <img src="<?php echo $img ?>" alt="Avatar" class="img-circle avatar" />
                            <?php }

                        ?>

						<h3><span><?php esc_attr_e( 'Main Content Header', 'wp_admin_style' ); ?></span></h3>

						<div class="inside">
							<p><?php esc_attr_e(
									'WordPress started in 2003 with a single bit of code to enhance the typography of everyday writing and with fewer users than you can count on your fingers and toes. Since then it has grown to be the largest self-hosted blogging tool in the world, used on millions of sites and seen by tens of millions of people every day.',
									'wp_admin_style'
								); ?></p>
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
      canvasBackground.src = "<?php echo $img ?>";

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