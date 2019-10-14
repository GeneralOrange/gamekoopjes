<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gamekoopjes
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<title><?php echo get_bloginfo( 'name' ); ?> - <?php echo get_bloginfo( 'description' ); ?></title>

	<?php
		//Favicon
		echo get_favicon();

		//Landingpage redirection
		landing_page_redirect();
		
		//Load wp head
		wp_head();

		//Localize bdi
		wp_localize_script('gamekoopjes-js', 'background', [
			'controller' => bdi('background-controller.png'),
			'controller_2' => bdi('background-controller-2.png')
		]);
		
		
	?>

	<?php if ( get_field( 'google_tagmanager_id', 'option' ) ) { ?>
	<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','<?php the_field( 'google_tagmanager_id', 'option' ); ?>');</script>
	<!-- End Google Tag Manager -->
	<?php } ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
<div id="page" class="site">

	<header id="masthead" class="site-header">
		<?php
			get_template_part('template-parts/components/header/navigation');
		?>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
