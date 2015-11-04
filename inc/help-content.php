<div class='wrap'>
    <h2><?php _e( 'StartUp Help and Reference', 'startup' ) ?></h2>
    <h3><?php _e( 'Post Types', 'startup' ) ?></h3>
    <table class="widefat">
        <thead>
        <tr>
            <th class="row-title"><?php _e( 'Post Type', 'startup' ) ?></th>
            <th></th>
            <th><?php _e( 'Requirement', 'startup' ) ?></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="row-title">Slider</td>
            <td>manage the slides on the homepage</td>
            <td>StartUp Slider <?php if ( is_plugin_active('startup-cpt-slider/startup-cpt-slider.php')) { ?><span class="dashicons dashicons-yes"></span><?php } ?></td>
        </tr>
        <tr class="alternate">
            <td class="row-title">Home</td>
            <td>Manage sections for the homepage, can be used as a full block content or individually displayed by ID</td>
            <td>StartUp Home <?php if ( is_plugin_active('startup-cpt-home/startup-cpt-home.php')) { ?><span class="dashicons dashicons-yes"></span><?php } ?></td>
        </tr>
        <tr>
            <td class="row-title">Sections</td>
            <td>Great way to generate content sections with image, parallax or video background and buttons to include in other content such as pages</td>
            <td>StartUp Sections <?php if ( is_plugin_active('startup-cpt-sections/startup-cpt-sections.php')) { ?><span class="dashicons dashicons-yes"></span><?php } ?></td>
        </tr>
        <tr class="alternate">
            <td class="row-title">Blog</td>
            <td>Shuffle or Grid style</td>
            <td>Set style in Theme Options / Post Types</td>
        </tr>
        <tr>
            <td class="row-title">Milestones</td>
            <td>A way to communicate your goals and other numbers by infographics</td>
            <td>StartUp Milestones <?php if ( is_plugin_active('startup-cpt-milestones/startup-cpt-milestones.php')) { ?><span class="dashicons dashicons-yes"></span><?php } ?></td>
        </tr>
        <tr class="alternate">
            <td class="row-title">Services</td>
            <td>Show the services you offer woth a title, summary and icon</td>
            <td>StartUp Services <?php if ( is_plugin_active('startup-cpt-services/startup-cpt-services.php')) { ?><span class="dashicons dashicons-yes"></span><?php } ?></td>
        </tr>
        <tr>
            <td class="row-title">Pricing Table</td>
            <td>A pricing table, full of options</td>
            <td>StartUp Pricing Table <?php if ( is_plugin_active('startup-cpt-pricing-table/startup-cpt-pricing-table.php')) { ?><span class="dashicons dashicons-yes"></span><?php } ?></td>
        </tr>
        <tr class="alternate">
            <td class="row-title">Team</td>
            <td>Each team member can have his detail/contact card here</td>
            <td>StartUp Team <?php if ( is_plugin_active('startup-cpt-team/startup-cpt-team.php')) { ?><span class="dashicons dashicons-yes"></span><?php } ?></td>
        </tr>
        <tr>
            <td class="row-title">Projects</td>
            <td>A work in progress...</td>
            <td>StartUp Projects <?php if ( is_plugin_active('startup-cpt-projects/startup-cpt-projects.php')) { ?><span class="dashicons dashicons-yes"></span><?php } ?></td>
        </tr>
        <tr class="alternate">
            <td class="row-title">Testimonials</td>
            <td>Display customer testimonials in a slider way</td>
            <td>StartUp Testimonials <?php if ( is_plugin_active('startup-cpt-testimonials/startup-cpt-testimonials.php')) { ?><span class="dashicons dashicons-yes"></span><?php } ?></td>
        </tr>
        <tr>
            <td class="row-title">Products</td>
            <td>A work in progress...</td>
            <td>StartUp Products <?php if ( is_plugin_active('startup-cpt-products/startup-cpt-products.php')) { ?><span class="dashicons dashicons-yes"></span><?php } ?></td>
        </tr>
        <tr class="alternate">
            <td class="row-title">Portfolio</td>
            <td>Show your work with two different layouts</td>
            <td>StartUp Portfolio <?php if ( is_plugin_active('startup-cpt-portfolio/startup-cpt-portfolio.php')) { ?><span class="dashicons dashicons-yes"></span><?php } ?> and set style in Theme Options / Post Types</td>
        </tr>
        <tr>
            <td class="row-title">Menus</td>
            <td>A work in progress...</td>
            <td>StartUp Menus <?php if ( is_plugin_active('startup-cpt-menus/startup-cpt-menus.php')) { ?><span class="dashicons dashicons-yes"></span><?php } ?></td>
        </tr>
        <tr class="alternate">
            <td class="row-title">Rooms</td>
            <td>A work in progress...</td>
            <td>StartUp Rooms <?php if ( is_plugin_active('startup-cpt-rooms/startup-cpt-rooms.php')) { ?><span class="dashicons dashicons-yes"></span><?php } ?></td>
        </tr>
        <tr>
            <td class="row-title">Partners</td>
            <td>Display partner logos with link to their websites</td>
            <td>StartUp Partners <?php if ( is_plugin_active('startup-cpt-partners/startup-cpt-partners.php')) { ?><span class="dashicons dashicons-yes"></span><?php } ?></td>
        </tr>
        </tbody>
    </table>    
    <h3>Shortcodes</h3>
    <table class="widefat">
        <thead>
        <tr>
            <th class="row-title">Shortcode</th>
            <th>Displays</th>
            <th>Desktop layout</th>
            <th>Requirement</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="row-title">[home]</td>
            <td>Home Sections</td>
            <td>1 in first row, then 2 in a row</td>
            <td>StartUp Home <?php if ( is_plugin_active('startup-cpt-home/startup-cpt-home.php')) { ?><span class="dashicons dashicons-yes"></span><?php } ?></td>
        </tr>
        <tr class="alternate">
            <td class="row-title">[home id="xx"]</td>
            <td>Home Section by ID</td>
            <td></td>
            <td>StartUp Home <?php if ( is_plugin_active('startup-cpt-home/startup-cpt-home.php')) { ?><span class="dashicons dashicons-yes"></span><?php } ?></td>
        </tr>
        <tr>
            <td class="row-title">[section id="xx"]</td>
            <td>Section by ID</td>
            <td></td>
            <td>StartUp Sections <?php if ( is_plugin_active('startup-cpt-sections/startup-cpt-sections.php')) { ?><span class="dashicons dashicons-yes"></span><?php } ?></td>
        </tr>
        <tr class="alternate">
            <td class="row-title">[slider]</td>
            <td>Slider</td>
            <td></td>
            <td>StartUp Slider <?php if ( is_plugin_active('startup-cpt-slider/startup-cpt-slider.php')) { ?><span class="dashicons dashicons-yes"></span><?php } ?></td>
        </tr>
        <tr>
            <td class="row-title">[blog]</td>
            <td>Blog</td>
            <td>Shuffle or Grid style</td>
            <td>Set style in Theme Options / Post Types</td>
        </tr>
        <tr class="alternate">
            <td class="row-title">[milestones]</td>
            <td>Milestones</td>
            <td>4 in a row</td>
            <td>StartUp Milestones <?php if ( is_plugin_active('startup-cpt-milestones/startup-cpt-milestones.php')) { ?><span class="dashicons dashicons-yes"></span><?php } ?></td>
        </tr>
        <tr>
            <td class="row-title">[services]</td>
            <td>Services</td>
            <td>3 in a row</td>
            <td>StartUp Services <?php if ( is_plugin_active('startup-cpt-services/startup-cpt-services.php')) { ?><span class="dashicons dashicons-yes"></span><?php } ?></td>
        </tr>
        <tr class="alternate">
            <td class="row-title">[pricing]</td>
            <td>Pricing Table</td>
            <td>3 in a row</td>
            <td>StartUp Pricing Table <?php if ( is_plugin_active('startup-cpt-pricing-table/startup-cpt-pricing-table.php')) { ?><span class="dashicons dashicons-yes"></span><?php } ?></td>
        </tr>
        <tr>
            <td class="row-title">[team]</td>
            <td>Team</td>
            <td>4 in a row and in a carousel if more</td>
            <td>StartUp Team <?php if ( is_plugin_active('startup-cpt-team/startup-cpt-team.php')) { ?><span class="dashicons dashicons-yes"></span><?php } ?></td>
        </tr>
        <tr class="alternate">
            <td class="row-title">[projects]</td>
            <td>Projects</td>
            <td>3 in a row</td>
            <td>StartUp Projects <?php if ( is_plugin_active('startup-cpt-projects/startup-cpt-projects.php')) { ?><span class="dashicons dashicons-yes"></span><?php } ?></td>
        </tr>
        <tr>
            <td class="row-title">[testimonials]</td>
            <td>Testimonials</td>
            <td>1 by 1 in a carousel</td>
            <td>StartUp Testimonials <?php if ( is_plugin_active('startup-cpt-testimonials/startup-cpt-testimonials.php')) { ?><span class="dashicons dashicons-yes"></span><?php } ?></td>
        </tr>
        <tr class="alternate">
            <td class="row-title">[products]</td>
            <td>Products</td>
            <td>Shuffle style</td>
            <td>StartUp Products <?php if ( is_plugin_active('startup-cpt-products/startup-cpt-products.php')) { ?><span class="dashicons dashicons-yes"></span><?php } ?></td>
        </tr>
        <tr>
            <td class="row-title">[portfolio]</td>
            <td>Portfolio</td>
            <td>Shuffle or Grid style</td>
            <td>StartUp Portfolio <?php if ( is_plugin_active('startup-cpt-portfolio/startup-cpt-portfolio.php')) { ?><span class="dashicons dashicons-yes"></span><?php } ?> and set style in Theme Options / Post Types</td>
        </tr>
        <tr class="alternate">
            <td class="row-title">[partners]</td>
            <td>Partners</td>
            <td>4 in a row, in a carousel if more than 4</td>
            <td>StartUp Partners <?php if ( is_plugin_active('startup-cpt-partners/startup-cpt-partners.php')) { ?><span class="dashicons dashicons-yes"></span><?php } ?></td>
        </tr>
        </tbody>
    </table>
    <h3>Page Templates</h3>
    <table class="widefat">
        <thead>
        <tr>
            <th class="row-title">Template</th>
            <th>Displays</th>
            <th>Desktop layout</th>
            <th>Detail</th>
            <th>Requirement</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="row-title">Home</td>
            <td>Home Sections</td>
            <td>1 in first row, then 2 in a row</td>
            <td></td>
            <td>StartUp Home <?php if ( is_plugin_active('startup-cpt-home/startup-cpt-home.php')) { ?><span class="dashicons dashicons-yes"></span><?php } ?></td>
        </tr>
        <tr class="alternate">
            <td class="row-title">Blog</td>
            <td>Blog</td>
            <td>Shuffle or Grid style</td>
            <td>Auto-added to page with slug "blog"</td>
            <td>Set style in Theme Options / Post Types</td>
        </tr>
        <tr>
            <td class="row-title">Portfolio</td>
            <td>Portfolio</td>
            <td>Shuffle or Grid style</td>
            <td>Auto-added to page with slug "portfolio"</td>
            <td>StartUp Portfolio <?php if ( is_plugin_active('startup-cpt-portfolio/startup-cpt-portfolio.php')) { ?><span class="dashicons dashicons-yes"></span><?php } ?> andset style in Theme Options / Post Types</td>
        </tr>
        <tr class="alternate">
            <td class="row-title">Products</td>
            <td>Products</td>
            <td>Shuffle style</td>
            <td>Auto-added to page with slug "products"</td>
            <td>StartUp Products <?php if ( is_plugin_active('startup-cpt-products/startup-cpt-products.php')) { ?><span class="dashicons dashicons-yes"></span><?php } ?></td>
        </tr>
        <tr>
            <td class="row-title">Projects</td>
            <td>Projects</td>
            <td>3 in a row</td>
            <td>Auto-added to page with slug "projects"</td>
            <td>StartUp Projects <?php if ( is_plugin_active('startup-cpt-projects/startup-cpt-projects.php')) { ?><span class="dashicons dashicons-yes"></span><?php } ?></td>
        </tr>
        </tbody>
    </table>
</div>