<?php
/**
* Template Name: Hive State
*
*/

?>

<body <?php body_class(); ?>>
<?php
if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
}
else {
	do_action( 'wp_body_open' );
}
?>
<div class="container">
<?php do_action( 'wp_theme_boilerplate/theme_hook/site/header/before' ); ?>
<header class="site-header">
<?php do_action( 'wp_theme_boilerplate/theme_hook/site/header' ); ?>
</header>
<?php do_action( 'wp_theme_boilerplate/theme_hook/site/header/after' ); ?>

<?php do_action( 'wp_theme_boilerplate/theme_hook/site/content/before' ); ?>
<div class="site-content">
<div class="primary">
<div class="content-container">

TEST TES TES

<?php
do_action( 'wp_theme_boilerplate/theme_hook/content/prepend' );
while ( have_posts() ) :
	the_post();
	do_action( 'wp_theme_boilerplate/theme_hook/content/page/prepend' );
	get_template_part( 'templates/content/page' );
	do_action( 'wp_theme_boilerplate/theme_hook/content/page/append' );
endwhile;
do_action( 'wp_theme_boilerplate/theme_hook/content/append' );
?>
</div>
</div>
<?php get_template_part( 'templates/sidebar/sidebar' ); ?>
</div>
<?php do_action( 'wp_theme_boilerplate/theme_hook/site/content/after' ); ?>

<?php do_action( 'wp_theme_boilerplate/theme_hook/site/footer/before' ); ?>
<footer class="site-footer">
<?php do_action( 'wp_theme_boilerplate/theme_hook/site/footer' ); ?>
</footer>
<?php do_action( 'wp_theme_boilerplate/theme_hook/site/footer/after' ); ?>
</div>
<?php wp_footer(); ?>
</body>