<?php
/**
 * The template used for displaying Women's World on the frontpage (front-page.php).
 *
 * @package abacwomen
 */
?>

<article id="post-<?php the_ID(); ?>">
        <a href="<?php the_permalink(); ?>">
        <?php if ( has_post_thumbnail() ) {
              the_post_thumbnail('frontpage');
             } else {
              echo  '<img src="' . get_stylesheet_directory_uri() . '/images/world.jpg">';
             }
        ?>
        </a>

	<?php the_title( sprintf( '<header class="stream-header"><h2 class="stream-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2></header>' ); ?>

</article><!-- #post-## -->

