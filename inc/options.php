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

//Blog

function startup_blog(){
if( !current_user_can( 'edit_posts' ) ) {
add_menu_page( 'StartUp Blog', 'Blog', 'read', 'startup-blog', 'startup_blog_init', '' );
}
}

function startup_blog_init(){
echo "
<div class='wrap'>
<h2>Blog</h2>
<ul class='yozz_list'>
<li>Vous souhaitez ajouter des pages, des sections ou des liens à votre menu principal?</li>
<li>Vous voulez pouvoir réagencer ce menu selon vos besoins?</li>
</ul>
<p>Contactez-nous pour activer l'option <strong>Menu Dynamique</strong></p>
<a class='button-primary' href='http://yozz.net/#contact-anchor' title='yozz.net'>Contactez yozz.net</a>
</div>";
}

add_action('admin_menu', 'startup_blog');

function add_menu_icon_blog(){

?>
<style>
#toplevel_page_startup-blog a{
color: #555;
}
#toplevel_page_startup-blog .dashicons-admin-generic::before {
content: "\f109";
color: #555 !important;
}
</style>
<?php
}

add_action( 'admin_head', 'add_menu_icon_blog' );

//Commentaires

function startup_com_init(){
echo "
<div class='wrap'>
<h2>Commentaires</h2>
Vous souhaitez pouvoir offrir à vos visiteurs la possibilité de commenter vos articles?
<ul class='yozz_list'>
<li>Nombreuses options d'administration</li>
<li>Filtre anti-spam</li>
<li>Notification par email</li>
</ul>

<p>Contactez-nous pour activer l'option <strong>Commentaires</strong></p>
<a class='button-primary' href='http://yozz.net/#contact-anchor' title='yozz.net'>Contactez yozz.net</a>



";
}

add_action('admin_menu', 'startup_com');


function add_menu_icon_com(){
?>

<style>
#toplevel_page_startup-com a{
color: #555;
}
#toplevel_page_startup-com .dashicons-admin-generic::before {
content: "\f122";
color: #555 !important;
}

#toplevel_page_edit-comments .dashicons-admin-generic::before {
content: "\f122";
}
</style>

<?php
}
add_action( 'admin_head', 'add_menu_icon_com' );

//Facebook

function startup_fb(){
add_menu_page( 'StartUp Facebook', 'Facebook', 'read', 'startup-fb', 'startup_fb_init' );
}

function startup_fb_init(){
echo "
<div class='wrap'>
<h2>Facebook</h2>
<p>Vous avez une page Facebook et vous aimeriez que les mises à jours, posts et autres activités de votre site web soient automatiquement envoyés à tous vos abonnés?</p>
<p>Contactez-nous pour activer l'option <strong>Facebook</strong></p>
<a class='button-primary' href='http://yozz.net/#contact-anchor' title='yozz.net'>Contactez yozz.net</a>
</div>
";
}

add_action('admin_menu', 'startup_fb');

function add_menu_icon_facebook(){
?>

<style>
#toplevel_page_startup-fb a{
color: #555;
}
#toplevel_page_startup-fb .dashicons-admin-generic::before {
content: "\f305";
color: #555 !important;
}
</style>

<?php
}
add_action( 'admin_head', 'add_menu_icon_facebook' );

//Twitter

function startup_tw(){
add_menu_page( 'StartUp Twitter', 'Twitter', 'read', 'startup-tw', 'startup_tw_init' );
}

function startup_tw_init(){
echo "
<div class='wrap'>
<h2>Twitter</h2>
<p>Vous avez un compte Twitter et vous aimeriez que les mises à jours, posts et autres activités de votre site web soient automatiquement envoyés à tous vos abonnés?</p>
<p>Contactez-nous pour activer l'option <strong>Twitter</strong></p>
<a class='button-primary' href='http://yozz.net/#contact-anchor' title='yozz.net'>Contactez yozz.net</a>
</div>
";
}

add_action('admin_menu', 'startup_tw');

function add_menu_icon_tw(){
?>

<style>
#toplevel_page_startup-tw a{
color: #555;
}
#toplevel_page_startup-tw .dashicons-admin-generic::before {
content: "\f301";
color: #555 !important;
}
</style>

<?php
}
add_action( 'admin_head', 'add_menu_icon_tw' );

//Multilingue

function startup_multi(){
add_menu_page( 'StartUp Multilingue', 'Multilingue', 'read', 'startup-multi', 'startup_multi_init' );
}

function startup_multi_init(){
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

add_action('admin_menu', 'startup_multi');

function add_menu_icon_multi(){
?>

<style>
#toplevel_page_startup-multi a{
color: #555;
}
#toplevel_page_startup-multi .dashicons-admin-generic::before {
content: "\f130";
color: #555 !important;
}
</style>

<?php
}
add_action( 'admin_head', 'add_menu_icon_multi' );

//Statistiques

function startup_stats(){
add_menu_page( 'StartUp Stats', 'Statistiques', 'read', 'startup-stats', 'startup_stats_init' );
}

function startup_stats_init(){
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
<p>Contactez-nous pour activer l'option <strong>Statisques</strong> ou l'option <strong>Google Analytics</strong></p>
<a class='button-primary' href='http://yozz.net/#contact-anchor' title='yozz.net'>Contactez yozz.net</a>
<p>Nous saurons vous guider dans le choix de votre solution de suivi web.</p>
</p>
</div>
";
}

add_action('admin_menu', 'startup_stats');

function add_menu_icon_stats(){
?>

<style>
#toplevel_page_startup-stats a{
color: #555;
}
#toplevel_page_startup-stats .dashicons-admin-generic::before {
content: "\f185";
color: #555 !important;
}
</style>

<?php
}
add_action( 'admin_head', 'add_menu_icon_stats' );