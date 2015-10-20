<?php 
/************************** Créer les pages pour chaque option */

/* Class Référence   
<h1>Hello World!</h1>
<h2>Hello World!</h2>
<h3>Hello World!</h3>
<input class='button-primary' type='submit' name='principal' value='principal' id='submitbutton' />
<input type='submit' value='secondaire' class='button-secondary' />
<a class='button-secondary' href='#' title='lien'>lien</a>
<div id='icon-options-general' class='icon32'><h1>Hello World!</h1></div>
*/


/************************** Blog */

function startup_reloaded_blog(){
    if( !current_user_can( 'publish_posts' ) ) {
        add_menu_page( 'StartUp Blog', 'Blog', 'read', 'startup-blog', 'startup_reloaded_blog_init', '' );
    }
}

function startup_reloaded_blog_init(){
    echo "
        <div class='wrap'>
            <h2>Blog</h2>
            <p>
                <ul class='yozz_list'>
                    <li>Vous souhaitez ajouter des pages, des sections ou des liens à votre menu principal?</li>
                    <li>Vous voulez pouvoir réagencer ce menu selon vos besoins?</li>
                </ul>
            </p>
            <p>Contactez-nous pour activer l'option <strong>Menu Dynamique</strong></p>
            <a class='button-primary' href='http://yozz.net/#contact-anchor' title='yozz.net'>Contactez yozz.net</a>
        </div>
    ";
}

add_action('admin_menu', 'startup_reloaded_blog');

function startup_reloaded_add_menu_icon_blog(){ ?>
    <style>
        #toplevel_page_startup-blog a{
            color: #555;
        }
        #toplevel_page_startup-blog .dashicons-admin-generic::before {
            content: "\f109";
            color: #555 !important;
        }
    </style>
<?php }

add_action( 'admin_head', 'startup_reloaded_add_menu_icon_blog' );

/************************** Comments */

function startup_reloaded_com(){
    if ( !current_user_can( 'moderate_comments' )){
        add_menu_page( 'StartUp Commentaires', 'Commentaires', 'read', 'startup-com', 'startup_reloaded_com_init' );
    }
}

function startup_com_init(){
    echo "
        <div class='wrap'>
            <h2>Commentaires</h2>
            <p>Vous souhaitez pouvoir offrir à vos visiteurs la possibilité de commenter vos articles?
                <ul class='yozz_list'>
                    <li>Nombreuses options d'administration</li>
                    <li>Filtre anti-spam</li>
                    <li>Notification par email</li>
                </ul>
            </p>
            <p>Contactez-nous pour activer l'option <strong>Commentaires</strong></p>
            <a class='button-primary' href='http://yozz.net/#contact-anchor' title='yozz.net'>Contactez yozz.net</a>
        </div>
    ";
}

add_action('admin_menu', 'startup_reloaded_com');

function startup_reloaded_add_menu_icon_com(){ ?>
    <style>
        #toplevel_page_startup-com a{
            color: #555;
        }
        #toplevel_page_startup-com .dashicons-admin-generic::before {
            content: "\f101";
            color: #555 !important;
        }
        #toplevel_page_edit-comments .dashicons-admin-generic::before {
            content: "\f101";
        }
    </style>
<?php }

add_action( 'admin_head', 'startup_reloaded_add_menu_icon_com' );

/************************** Multilingue */

function startup_reloaded_multi(){
    add_menu_page( 'StartUp Multilingue', 'Multilingue', 'read', 'startup-multi', 'startup_reloaded_multi_init' );
}

function startup_reloaded_multi_init(){
    echo "
        <div class='wrap'>
            <h2>Multilingue</h2>
            <p>Vous visez une clientèle multilingue et vous avez besoin d'un site français/anglais, français/espagnol, ou toute autre combinaison de langues pour promouvoir votre activité à travers le monde d'un façon simple et intuitive?</p>
            <p>Contactez-nous pour activer l'option <strong>Multilingue</strong></p>
            <a class='button-primary' href='http://yozz.net/#contact-anchor' title='yozz.net'>Contactez yozz.net</a>
            <p>Nous proposons également des solutions de traduction automatique!</p>
        </div>
    ";
}

add_action('admin_menu', 'startup_reloaded_multi');

function startup_reloaded_add_menu_icon_multi(){ ?>
    <style>
        #toplevel_page_startup-multi a{
            color: #555;
        }
        #toplevel_page_startup-multi .dashicons-admin-generic::before {
            content: "\f130";
            color: #555 !important;
        }
    </style>
<?php }

add_action( 'admin_head', 'startup_reloaded_add_menu_icon_multi' );

/************************** Stats */

function startup_reloaded_stats(){
    add_menu_page( 'StartUp Stats', 'Statistiques', 'read', 'startup-stats', 'startup_reloaded_stats_init' );
}

function startup_reloaded_stats_init(){
    echo "
        <div class='wrap'>
            <h2>Statistiques</h2>
            <p>Vous avez compris l'importance de votre visibilité sur le web et vous souhaitez disposer d'un outil performant afin de :
                <ul class='yozz_list'>
                    <li>Consulter le nombre de visiteurs</li>
                    <li>Consulter le nombre de pages vues</li>
                    <li>Savoir d'ou vient votre traffic</li>
                    <li>Connaitre votre classement dans les principaux moteurs de recherches</li>
                    <li>Connaitre la part de visites depuis des terminaux mobiles</li>
                </ul>
            </p>
            <p>Contactez-nous pour activer l'option <strong>Google Analytics</strong></p>
            <a class='button-primary' href='http://yozz.net/#contact-anchor' title='yozz.net'>Contactez yozz.net</a>
        </div>
    ";
}

add_action('admin_menu', 'startup_reloaded_stats');

function startup_reloaded_add_menu_icon_stats(){ ?>
    <style>
        #toplevel_page_startup-stats a{
            color: #555;
        }
        #toplevel_page_startup-stats .dashicons-admin-generic::before {
            content: "\f185";
            color: #555 !important;
        }
    </style>
<?php }

add_action( 'admin_head', 'startup_reloaded_add_menu_icon_stats' );