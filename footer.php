<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gamekoopjes
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<?php if ( get_field( 'google_analytics_id', 'option' ) ) { ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php the_field( 'google_analytics_id', 'option' ); ?>"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', '<?php the_field( 'google_analytics_id', 'option' ); ?>');
    </script>
<?php } ?>

</body>
</html>
