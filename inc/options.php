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

//Menu dynamique

function startup_menu(){
if( current_user_can( 'edit_theme_options' ) ) {
add_menu_page( 'StartUp Menu dynamique', 'Menu', 'read', 'nav-menus.php', '', '' );
} else {
add_menu_page( 'StartUp Menu dynamique', 'Menu', 'read', 'startup-menu', 'startup_menu_init', '' );
}
}

function startup_menu_init(){
echo "
<div class='wrap'>
<h2>Menu dynamique</h2>
<ul class='yozz_list'>
<li>Vous souhaitez ajouter des pages, des sections ou des liens à votre menu principal?</li>
<li>Vous voulez pouvoir réagencer ce menu selon vos besoins?</li>
</ul>
<p>Contactez-nous pour activer l'option <strong>Menu Dynamique</strong></p>
<a class='button-primary' href='http://yozz.net/#contact-anchor' title='yozz.net'>Contactez yozz.net</a>
</div>";
}

add_action('admin_menu', 'startup_menu');

function add_menu_icon_menu(){

?>
<style>
#toplevel_page_startup-menu a{
color: #555;
}
#toplevel_page_startup-menu .dashicons-admin-generic::before {
content: "\f333";
color: #555 !important;
}
#toplevel_page_nav-menus .dashicons-admin-generic::before {
content: "\f333";
}
</style>
<?php
}

add_action( 'admin_head', 'add_menu_icon_menu' );

//Slider

function startup_slider(){
add_menu_page( 'StartUp Slider', 'Slider', 'read', 'startup-slider', 'startup_slider_init' );
}

function startup_slider_init(){
echo "
<div class='wrap'>
<h2>Slider</h2>
Vous souhaitez avoir un diaporama dynamique et moderne sur votre page d'accueil?<br />
Notre Slider vous propose les fonctionnalités suivantes :
<ul class='yozz_list'>
<li>Diapos illimitées</li>
<li>Redimensionnement automatique des images</li>
<li>Message en surimpression</li>
<li>Fonctionnalités sur mesure disponibles</li>
</ul>

<p>Contactez-nous pour activer l'option <strong>Slider</strong></p>
<a class='button-primary' href='http://yozz.net/#contact-anchor' title='yozz.net'>Contactez yozz.net</a>

<h2>Quelques exemples :</h2>
<ul class='yozz_list'>
<li><a href='http://entretiens-menagers.com' target='_blank'>http://entretiens-menagers.com</a></li>
<li><a href='http://www.recreatheque.qc.ca' target='_blank'>http://www.recreatheque.qc.ca</a></li>

</ul>
</div>

";
}

//add_action('admin_menu', 'startup_slider');


function add_menu_icon_slider(){
?>

<style>
#toplevel_page_startup-slider a{
color: #555;
}
#toplevel_page_startup-slider .dashicons-admin-generic::before {
content: "\f235";
color: #555 !important;
}
</style>

<?php
}
//add_action( 'admin_head', 'add_menu_icon_slider' );

//Images libres

function startup_images(){
add_menu_page( 'StartUp Images', 'Images libres', 'read', 'startup-images', 'startup_images_init' );
}

function startup_images_init(){

if ( is_plugin_active( 'pixabay-images/pixabay-images.php' ) ) {
echo "
<div class='wrap'>
<h2>Images libres</h2>
Le plugin est activé		     </div>

";

}else{

echo "
<div class='wrap'>
<h2>Images libres</h2>
Vous souhaitez pouvoir ajouter librement des images libres de droits à votre blog ou à vos pages, sliders et autres types de contenus?<br />
Notre options Images Dynamiques vous propose les fonctionnalités suivantes :
<ul class='yozz_list'>
<li>Plus de 350 000 photos</li>
<li>Faites vos recherches d'images directement depuis votre éditeur StartUp</li>
<li>Toutes les images sont libres de droits, pour utilisation personnelle ET commerciale</li>
<li>Ne vous souciez-pas des crédits photos</li>
<li>Choisissez vos images dans toutes sortes de domaines :<br />
Affaires/Finance, 
Alimentation/Boisson, 
Animaux, 
Architecture/Bâtiments, 
Arrières plans/Textures, 
Beauté/Mode, 
Industrie/Artisanat, 
Informatique/Communication, 
Lieux/Monuments, 
Musique, 
Nature/Paysages, 
Personnes, 
Religion, 
Santé/Médical, 
Science, 
Sports, 
Transport/Trafic, 
Voyages/Vacances, 
Éducation, 
Émotions</li>
</ul>

<p>Contactez-nous pour activer l'option <strong>Images libres</strong></p>
<a class='button-primary' href='http://yozz.net/#contact-anchor' title='yozz.net'>Contactez yozz.net</a>

<h2>Quelques exemples :</h2>
<img src='" . plugins_url( '../img/examples/images_libres01.jpg', __FILE__ ) . "' >
<img src='" . plugins_url( '../img/examples/images_libres02.jpg', __FILE__ ) . "' >
<img src='" . plugins_url( '../img/examples/images_libres03.jpg', __FILE__ ) . "' >
<img src='" . plugins_url( '../img/examples/images_libres04.jpg', __FILE__ ) . "' >
<img src='" . plugins_url( '../img/examples/images_libres05.jpg', __FILE__ ) . "' >
<img src='" . plugins_url( '../img/examples/images_libres06.jpg', __FILE__ ) . "' >
</div>

";
}
}

add_action('admin_menu', 'startup_images');

function add_menu_icon_images(){
if ( is_plugin_active( 'pixabay-images/pixabay-images.php' ) ) {
?>

<style>

#toplevel_page_startup-images .dashicons-admin-generic::before {
content: "\f161";
}
</style>

<?php }else{ ?>

<style>
#toplevel_page_startup-images a{
color: #555;
}
#toplevel_page_startup-images .dashicons-admin-generic::before {
content: "\f161";
color: #555 !important;
}
</style>

<?php

}
}
add_action( 'admin_head', 'add_menu_icon_images' );

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

//Google Maps

function startup_maps(){
add_menu_page( 'StartUp Maps', 'Google Maps', 'read', 'startup-maps', 'startup_maps_init' );
}

function startup_maps_init(){
echo "
<div class='wrap'>
<h2>Google Maps</h2>
<p>Vous souhaitez afficher votre position sur une carte Google Maps interactive afin que vos clients puissent vous trouver plus facilement?</p>
<p>Contactez-nous pour activer l'option <strong>Google Maps</strong></p>
<a class='button-primary' href='http://yozz.net/#contact-anchor' title='yozz.net'>Contactez yozz.net</a>
</div>
";
}

add_action('admin_menu', 'startup_maps');

function add_menu_icon_maps(){
?>

<style>
#toplevel_page_startup-maps a{
color: #555;
}
#toplevel_page_startup-maps .dashicons-admin-generic::before {
content: "\f231";
color: #555 !important;
}
</style>

<?php
}
add_action( 'admin_head', 'add_menu_icon_maps' );

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


//Shop

function startup_shop(){
add_menu_page( 'StartUp Shop', 'Shop', 'read', 'startup-shop', 'startup_shop_init' );
}

function startup_shop_init(){
echo "
<div class='wrap'>
<h2>Shop</h2>
<p>Vous souhaitez faire de votre site web un outil de vente efficace, adapté à votre commerce?<br />Contactez-nous afin de connaître les possibilités de boutiques en ligne offertes par yozz.net</p>
<a class='button-primary' href='http://yozz.net/#contact-anchor' title='yozz.net'>Contactez yozz.net</a>
<p>Nous avons une solution adaptée à vos besoins et à votre budget.</p>
</div>
";
}

add_action('admin_menu', 'startup_shop');

function add_menu_icon_shop(){
?>

<style>
#toplevel_page_startup-shop a{
color: #555;
}
#toplevel_page_startup-shop .dashicons-admin-generic::before {
content: "\f174";
color: #555 !important;
}
</style>

<?php
}
add_action( 'admin_head', 'add_menu_icon_shop' );

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

//Cloud

function startup_cloud(){
add_menu_page( 'StartUp Cloud', 'Cloud', 'read', 'startup-cloud', 'startup_cloud_init' );
}

function startup_cloud_init(){
echo "
<div class='wrap'>
<h2>Cloud</h2>
<p>Vous êtes une entreprise (Institution, PMI/PME, travaileur autonome) et vous avez besoin d'un outil efficace pour :  
<ul class='yozz_list'>
<li>Gérer votre équipe</li>
<li>Consulter vos courriels sur tous vos appreils (mobile, tablette...)</li>
<li>Organiser votre emploi du temps</li>
<li>Partager des photos / fichiers</li>
<li>Optimiser votre façon de travailler</li>
<li>Être certain qu'aucun de vos documents ne peut être perdu, ou effacé</li>
</ul>
<p>Nous sommes les spécialistes des technologies de communication pour entreprises. Contactez-nous pour mettre en place une stratégie <strong>Cloud</strong>.<br />
</p>
<a class='button-primary' href='http://yozz.net/#contact-anchor' title='yozz.net'>Contactez yozz.net</a>
</div>
";
}

add_action('admin_menu', 'startup_cloud');

function add_menu_icon_cloud(){
?>

<style>
#toplevel_page_startup-cloud a{
color: #555;
}

#toplevel_page_startup-cloud .dashicons-admin-generic::before {
content: "\f176";
color: #555 !important;
}
</style>

<?php
}
add_action( 'admin_head', 'add_menu_icon_cloud' );
?>