<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gamekoopjes
 */

?>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="entry-header">
                    <?php
                    if ( is_singular() ) :
                        the_title( '<h1 class="entry-title">', '</h1>' );
                    else :
                        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                    endif;

                    if ( 'post' === get_post_type() ) :
                        ?>
                        <div class="entry-meta">
                            <?php
                            gamekoopjes_posted_on();
                            gamekoopjes_posted_by();
                            ?>
                        </div><!-- .entry-meta -->
                    <?php endif; ?>
                </div><!-- .entry-header -->

                <div class="entry-content">
                    <?php
                    the_content( sprintf(
                        wp_kses(
                            /* translators: %s: Name of current post. Only visible to screen readers */
                            __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'gamekoopjes' ),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        get_the_title()
                    ) );

                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gamekoopjes' ),
                        'after'  => '</div>',
                    ) );
                    ?>
                </div><!-- .entry-content -->
                <div class="entry-offers">
                    <?php
                        echo get_game_offers($post->ID);
                    ?>
                </div>
                <div class="entry-media">
                    <?php echo get_game_media($post->ID); ?>
                </div>
            </article>
        </div>
        <div class="col-md-4">
            <?php
                get_sidebar();
                gamekoopjes_post_thumbnail();
            ?>
        </div>
    </div>
</div>
