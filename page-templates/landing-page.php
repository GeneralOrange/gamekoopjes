<?php
/**
 * Template Name: Landing Page
 *
 * @package gamekoopjes
 * @since v1.0
 */


get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php
            while ( have_posts() ) :
                the_post();
                get_template_part('template-parts/components/header/banner_content');
                
                get_template_part( 'template-parts/components/content/subscribe_box');

                get_template_part( 'template-parts/components/content/dual_text');

                get_template_part( 'template-parts/components/footer/landing_footer');

                // If comments are open or we have at least one comment, load up the comment template.
                // if ( comments_open() || get_comments_number() ) :
                // 	comments_template();
                // endif;

            endwhile; // End of the loop.
        ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
