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

	if(!is_user_logged_in()):
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
	endif;
}

//Before default image
function bdi($extend = NULL) {
	return get_bloginfo('stylesheet_directory').'/assets/dist/images/'.$extend;
}

//Function for getting gameoffers
function get_game_offers($post_id = NULL){
	if($post_id === NULL):
		$post_id = get_the_ID();
	endif;

	$offers = get_field('game_offers', $post_id);
	$lowest_price = get_field('lowest_price', $post_id);

	$output = "";
	

	if($offers):
		$output .= "<div class='game-offers'>";
		foreach($offers as $item):
			if($item['enabled']):
				$best_deal = "";

				if($lowest_price && $lowest_price == $item['price']):
					$best_deal = 'best-deal';
				endif;
				
				$output .= <<< GAMESINGLE
					<div class='game-offers__single {$best_deal}'>
						<div class='game-offers__front'>
							<div class='game-offers__seller'>
								{$item['seller']}
							</div>
							<div class='game-offers__price'>
								{$item['price']} 
							</div>
						</div>
						<div class='game-offers__back'>
							<a href='{$item['affiliate_link']}' target='_blank' rel='nofollow' class='game-offers__button'>
								Koop nu
							</a>
						</div>
						
					</div>
				GAMESINGLE;
			endif;
		endforeach;
		$output .= '</div>';
	else:
		$output .= "Geen data om weer te geven";
	endif;

	return $output;
}

function get_game_media($post_id = NULL) {
	if($post_id === NULL):
		$post_id = get_the_ID();
	endif;

	$media = get_field('media', $post_id);

	$output = "<div class='game-media'>";

	if($media):
		foreach($media as $item):
			$image = $item['image'];
			$output .= <<< MEDIASINGLE
				<div class='game-media__single'>
					<img data-src='{$image['url']}' alt='{$image['title']}' class='lazyload game-media__image'>
				</div>
			MEDIASINGLE;
		endforeach;
	endif;

	$output .= "</div>";

	return $output;
}

//Function for getting games

function get_games($games = NULL){
	if($games):

		$output = '';
		foreach($games as $item):
			$game_link = get_the_permalink($item);
			$affiliate_link = get_field('game_offers', $item)[0]['affiliate_link'] ? get_field('game_offers', $item)[0]['affiliate_link'] : '#';

			$game_img = get_the_post_thumbnail_url($item);
			$game_price = get_field('lowest_price', $item);
			$categories = get_the_terms($item, 'gamescategorie');

			$game_cats = '';

			foreach($categories as $cat_item):
				$game_cats .= <<< GAMECAT
					<div class="game__cat--item">
						{$cat_item->name}
					</div>
				GAMECAT;
			endforeach;

			//var_dump($item);

			$output .= <<< SINGLEGAME
				<div class="col-lg-2">
					<div class="game">
						<img data-src="{$game_img}" alt="{$item->post_title}" class="lazyload img-fluid game__thumb">
						<div class="game__details">
							<div class="game__title">
								{$item->post_title}
							</div>
							<div class="game__price">
								{$game_price}
							</div>
							<div class="game__cat">
								{$game_cats}
							</div>
							<div class="game__links">
								<a class="game__button game__button--blue" href="{$game_link}">
									Meer info
								</a>
								<a class="game__button game__button--pink" href="{$affiliate_link}" rel="nofollow" target="_blank">
									Nu kopen
								</a>
							</div>
						</div>
					</div>
				</div>
			SINGLEGAME;

		endforeach;

		return $output;
	endif;

	return;
}


add_filter( 'gform_submit_button_1', 'gk_change_form_button', 10, 2 );
function gk_change_form_button( $button, $form ) {
    return "<button class='subscribe_box__button' id='gform_submit_button_{$form['id']}'><span>Inschrijven</span></button>";
}

// Register Custom Post Type games
function games_post_type() {
	$labels = array(
		'name'                  => 'Games',
		'singular_name'         => 'Game',
	);
	$args = array(
		'label'                 => 'Game',
		'description'           => 'Een overzicht van alle games.',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'page-attributes', 'thumbnail'),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-video-alt3',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'games', $args );
}
add_action( 'init', 'games_post_type', 0 );

// Register Custom Taxonomy for games
function categorie_games() {
	$labels = array(
		'name'                       => 'categorieen',
		'singular_name'              => 'Categorie',
		'menu_name'                  => 'Categorieen',
		'all_items'                  => 'Alle categorieen',
		'parent_item'                => 'Hoofd categorie',
		'parent_item_colon'          => 'Categorie item',
		'new_item_name'              => 'Nieuwe categorie',
		'add_new_item'               => 'Categorie toevoegen',
		'edit_item'                  => 'Categorie bewerken',
		'update_item'                => 'Categorie updaten',
		'view_item'                  => 'Bekijk categorie',
		'separate_items_with_commas' => 'Separate items with commas',
		'add_or_remove_items'        => 'Categorie toevoegen of verwijderen',
		'choose_from_most_used'      => 'Kiezen uit meest gebruikt',
		'popular_items'              => 'Populaire categorieen',
		'search_items'               => 'Zoek categorie',
		'not_found'                  => 'Niks gevonden',
		'no_terms'                   => 'Geen categorie',
		'items_list'                 => 'Categorie lijst',
		'items_list_navigation'      => 'Catagorie lijst navigatie',
	);
	$rewrite = array(
		'slug'                       => 'Games',
		'with_front'                 => false,
		'hierarchical'               => true,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'gamescategorie', array( 'games' ), $args );
}
add_action( 'init', 'categorie_games', 0 );

//Register wigdets
function register_footer_widgets(){
	register_sidebar(
		array(
		'name' => 'Footer 1',
		'id' => 'footer-1',
		'before_widget' => '<div class = "footerwidget_1">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
		)
	);
	register_sidebar(
		array(
		'name' => 'Footer 2',
		'id' => 'footer-2',
		'before_widget' => '<div class = "footerwidget_2">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
		)
	);
	register_sidebar(
		array(
		'name' => 'Footer 3',
		'id' => 'footer-3',
		'before_widget' => '<div class = "footerwidget_3">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
		)
	);
	register_sidebar(
		array(
		'name' => 'Footer 4',
		'id' => 'footer-4',
		'before_widget' => '<div class = "footerwidget_4">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
		)
	);
}

add_action('widgets_init', 'register_footer_widgets', 0);

