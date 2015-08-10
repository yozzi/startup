<?php
/************************** Commenté car on utilise le plugin User Role Editor pour plus d'efficacité
/************************** Ajouter rôles et capacités */

//Commenté car besoin d'executer une seule fois car enregistré ds BDD
//Retirer les rôles inutilisés

//remove_role('editor');
//remove_role('author');
//remove_role('contributor');
//remove_role('subscriber');

//add_role('owner', 'Site Owner', array('read'));

//Commenté car besoin d'executer une seule fois car enregistré ds BDD
//Référence : http://codex.wordpress.org/Roles_and_Capabilities

//$role->add_cap( 'edit_pages' );
//$role->add_cap( 'publish_pages' );
//$role->add_cap( 'delete_pages' );
//$role->add_cap( 'edit_published_pages' );
//$role->add_cap( 'edit_others_pages' );
//$role->add_cap( 'delete_published_pages' );
//$role->add_cap( 'delete_others_pages' );

//$role->remove_cap( 'edit_pages' );
//$role->remove_cap( 'publish_pages' );
//$role->remove_cap( 'delete_pages' );
//$role->remove_cap( 'edit_published_pages' );
//$role->remove_cap( 'edit_others_pages' );
//$role->remove_cap( 'delete_published_pages' );
//$role->remove_cap( 'delete_others_pages' );

//$role->add_cap( 'edit_files' );
//$role->add_cap( 'upload_files' );

//$role->remove_cap( 'edit_files' );
//$role->remove_cap( 'upload_files' );

//Option Menus Dynamiques
//$role->add_cap( 'edit_theme_options' );
//$role->remove_cap( 'edit_theme_options' );
?>