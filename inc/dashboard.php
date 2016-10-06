<?php // Welcome widget
/**
 *	Adds hidden content to admin_footer, then shows with jQuery, and inserts after welcome panel
 *
 *	@author Ren Ventura <EngageWP.com>
 *	@see http://www.engagewp.com/how-to-create-full-width-dashboard-widget-wordpress
 */
add_action( 'admin_footer', 'rv_custom_dashboard_widget' );
function rv_custom_dashboard_widget() {
	// Bail if not viewing the main dashboard page
	if ( get_current_screen()->base !== 'dashboard' ) {
		return;
	}
	?>

	<div id="custom-id" class="welcome-panel" style="display: none;">
		<div class="welcome-panel-content">
			<h2>Welcome to WordPress!</h2>
			<p class="about-description">We’ve assembled some links to get you started:</p>
			<div class="welcome-panel-column-container">
				<div class="welcome-panel-column">
					<h3>Get Started</h3>
					<a class="button button-primary button-hero load-customize hide-if-no-customize" href="http://localhost:8888/uw-website/wp-admin/customize.php">Customize Your Site</a>
					<a class="button button-primary button-hero hide-if-customize" href="http://localhost:8888/uw-website/wp-admin/themes.php">Customize Your Site</a>
					<p class="hide-if-no-customize">or, <a href="http://localhost:8888/uw-website/wp-admin/themes.php">change your theme completely</a></p>
				</div>
				<div class="welcome-panel-column">
					<h3>Next Steps</h3>
					<ul>
						<li><a href="http://localhost:8888/uw-website/wp-admin/post.php?post=2557&amp;action=edit" class="welcome-icon welcome-edit-page">Edit your front page</a></li>
						<li><a href="http://localhost:8888/uw-website/wp-admin/post-new.php?post_type=page" class="welcome-icon welcome-add-page">Add additional pages</a></li>
						<li><a href="http://localhost:8888/uw-website/wp-admin/post-new.php" class="welcome-icon welcome-write-blog">Add a blog post</a></li>
						<li><a href="http://localhost:8888/uw-website/" class="welcome-icon welcome-view-site">View your site</a></li>
					</ul>
				</div>
				<div class="welcome-panel-column welcome-panel-last">
					<h3>More Actions</h3>
					<ul>
						<li><div class="welcome-icon welcome-widgets-menus">Manage <a href="http://localhost:8888/uw-website/wp-admin/widgets.php">widgets</a> or <a href="http://localhost:8888/uw-website/wp-admin/nav-menus.php">menus</a></div></li>
						<li><a href="http://localhost:8888/uw-website/wp-admin/options-discussion.php" class="welcome-icon welcome-comments">Turn comments on or off</a></li>
						<li><a href="https://codex.wordpress.org/First_Steps_With_WordPress" class="welcome-icon welcome-learn-more">Learn more about getting started</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<script>
		jQuery(document).ready(function($) {
			$('#welcome-panel').after($('#custom-id').show());
		});
	</script>
<?php }


// Custom widget
function register_my_dashboard_widget() {
	wp_add_dashboard_widget(
		'my_dashboard_widget',
		'My Dashboard Widget',
		'my_dashboard_widget_display'
	);
}

function my_dashboard_widget_display() {
    echo '<p>Put your instructions here</p>';
}

add_action( 'wp_dashboard_setup', 'register_my_dashboard_widget' );