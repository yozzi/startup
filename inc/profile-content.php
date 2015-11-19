<div class='wrap'>
    <h2><?php _e( 'Profile', 'startup' ) ?></h2>
    <h3><?php _e( 'Sub Section', 'startup' ) ?></h3>
    
    
    

<?php 
    $current_user = wp_get_current_user();
//    echo 'Username: ' . $current_user->user_login . '<br />';
//    echo 'User email: ' . $current_user->user_email . '<br />';
//    echo 'User first name: ' . $current_user->user_firstname . '<br />';
//    echo 'User last name: ' . $current_user->user_lastname . '<br />';
//    echo 'User display name: ' . $current_user->display_name . '<br />';
//    echo 'User ID: ' . $current_user->ID . '<br />';
//    print_r($current_user);
        
    $img  = get_user_meta( $current_user->ID, '_startup_user_avatar', true );
    echo $img;
    ?>
    
    
</div>