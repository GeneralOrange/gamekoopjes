<?php
/**
 * Template Name: Game overview
 *
 * @package gamekoopjes
 * @since v1.0
 */


get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();
            
            ?>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1 class="page-title"><?= get_the_title(); ?></h1>
                    </div>
                </div>
            </div>
            <?php

			get_template_part( 'template-parts/components/game-grid' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
