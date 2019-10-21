<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package gamekoopjes
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function gamekoopjes_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'gamekoopjes_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function gamekoopjes_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'gamekoopjes_pingback_header' );


/**
 * Added by General Orange
 */


/**
 * Gets custom logo
 */

function get_logo() {
	//Init output
	$output = '';

	//Get logo data from backend
	$logo = get_field('site_logo', 'option');
	$alt_logo = get_field('alt_site_logo', 'option');

	//If we land on landingpage change the logo
	if(is_page_template('page-templates/landing-page.php') && $alt_logo):
		$logo = $alt_logo;
	endif;

	//Create html markup if logo exists in backend
	if($logo):
		$output .= '<a href="'.get_site_url().'">';

		$output .= '<img class="img-fluid lazyload site_logo" data-src="'.$logo['url'].'" alt="'.$logo['alt'].'">';

		$output .= '</a>';
	endif;
	//Return output
	return $output;
}

function get_favicon() {
	$output = '';

	$favicon = get_field( 'favicon', 'option' );
		if ($favicon):
			//Use the custom logo from the backend
			$output .= '<link rel="shortcut icon" href="'.$favicon['url'].'" >';
		endif;

	return $output;
}

function landing_page_redirect(){
	//Get pages with landing page template attached
	$lpages = get_pages([
		'meta_key' => '_wp_page_template',
		'meta_value' => 'page-templates/landing-page.php'
	]);

	//Init variable
	$dpages = [];

	//Loop through found pages
	foreach($lpages as $item):
		//Get ACF field
		$redirect = get_field('force_site_redirection', $item);

		//Check ACF field
		if($redirect):
			$dpages[] = $item;
		endif;

	endforeach;

	$current_page = get_the_permalink($post->ID);

	//Only get first record since there should only be 1 redirecting
	if($dpages[0]):
		$link = get_the_permalink($dpages[0]);

		if($current_page !== $link):
			//Handle redirect
			wp_redirect($link, 307);
		endif;
	endif;
}

//Before default image
function bdi($extend = NULL) {
	return get_bloginfo('stylesheet_directory').'/assets/dist/images/'.$extend;
}


add_filter( 'gform_submit_button_1', 'gk_change_form_button', 10, 2 );
function gk_change_form_button( $button, $form ) {
    return "<button class='subscribe_box__button' id='gform_submit_button_{$form['id']}'><span>Inschrijven</span></button>";
}