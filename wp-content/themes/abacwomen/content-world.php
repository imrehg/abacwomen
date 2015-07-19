<?php
/**
 * The template used for displaying Women's World on the frontpage (front-page.php).
 *
 * @package abacwomen
 */
?>

<article id="post-<?php the_ID(); ?>">
	<?php the_title( sprintf( '<header class="stream-header"><h1 class="stream-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1></header>' ); ?>

        <a href="<?php the_permalink(); ?>">
        <?php if ( has_post_thumbnail() ) {
              the_post_thumbnail('frontpage');
             } else {
              echo  '<img src="' . get_stylesheet_directory_uri() . '/images/world.jpg">';
             }
        ?>
        </a>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
		<p><a class="more-link" href="<?php the_permalink(); ?>" rel="bookmark">
			<?php
				/* translators: %s: Name of page */
				printf( __( 'Read more %s', 'edin' ), the_title( '<span class="screen-reader-text">', '</span>', false ) );
			?>
		</a></p>
	</div><!-- .entry-summary -->

</article><!-- #post-## -->
