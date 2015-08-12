<?php
//Pour activer Articles (Blog) ET Pages (problème... Créer un custom post pour le blog et restreindre son accès. Désactiver complètement les articles standards)
//$role->add_cap( 'edit_posts' );
//$role->add_cap( 'delete_posts' );
//$role->add_cap( 'edit_published_posts' );
//$role->add_cap( 'publish_posts' );
//$role->add_cap( 'edit_others_posts' );
//$role->add_cap( 'delete_published_posts' );
//$role->add_cap( 'delete_others_posts' );
//$role->add_cap( 'manage_categories' );

//$role->remove_cap( 'edit_posts' );
//$role->remove_cap( 'delete_posts' );
//$role->remove_cap( 'edit_published_posts' );
//$role->remove_cap( 'publish_posts' );
//$role->remove_cap( 'edit_others_posts' );
//$role->remove_cap( 'delete_published_posts' );
//$role->remove_cap( 'delete_others_posts' );
//$role->remove_cap( 'manage_categories' );

//Pour activer Menu Dynamique
//$role->add_cap( 'edit_theme_options' );  //Activer (run once)
//$role->remove_cap( 'edit_theme_options' ); //Désactiver (run once)

//Pour activer Slider

//Pour activer Images libres
//Installer le plugin Pixabay Images
//https://wordpress.org/plugins/pixabay-images/
//Configurer les options : Français / 30 / Photos / All / Uncheck / Uncheck

//Pour activer Commentaires
function startup_com(){
//add_menu_page( 'StartUp Commentaires', 'Commentaires', 'read', 'edit-comments.php', '' ); //Activer
//add_menu_page( 'StartUp Commentaires', 'Commentaires', 'read', 'startup-com', 'startup_com_init' ); //Désactiver
}

//Pour activer Google Maps

//Pour activer Facebook

//Pour activer Twitter

//Pour activer Multilingue

//Pour activer Shop

//Pour activer Statistiques
?>