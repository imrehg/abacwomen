<?php
/**
 * Template Name: Front Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="entry-page-image">
						<?php the_post_thumbnail(); ?>
					</div><!-- .entry-page-image -->
				<?php endif; ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
		<div id="feeds">
			<div class="frontpage featured col span_1_of_2">
				<?php
				wp_reset_query();
				$args = array(
					'posts_per_page'   => 1,
					'offset'           => 0,
					'category'         => '',
					'orderby'          => 'post_date',
					'order'            => 'DESC',
					'post_status'      => 'publish',
					'tax_query' => array(
						array(
							'taxonomy' => 'post_tag',
							'field' => 'slug',
							'terms' => 'frontpage'
						)
					),
				);
				$news_posts = get_posts( $args );
				?>
				<h1 class="stream-title">Women's World</h1>
				<ul class="stream">
					<?php foreach ( $news_posts as $post ) : setup_postdata( $post ); ?>
						<?php get_template_part( 'content', 'world' ); ?>
					<?php endforeach; ?>
				</ul>
				<?php
				wp_reset_postdata();
				wp_reset_query();
				?>
			</div><!-- .frontpage.featured -->

			<div class="frontpage news col span_1_of_2">
				<?php
				wp_reset_query();
				$args = array(
					'posts_per_page'   => 8,
					'offset'           => 0,
					'category'         => '',
					'orderby'          => 'post_date',
					'order'            => 'DESC',
					'post_status'      => 'publish',
				);
				$news_posts = get_posts( $args );
				?>
				<h1 class="stream-title"><a href="/news/">News</a></h1>
				<ul class="stream">
					<?php foreach ( $news_posts as $post ) : setup_postdata( $post ); ?>
						<?php get_template_part( 'content', 'news' ); ?>
					<?php endforeach; ?>
				</ul>
				<?php
				wp_reset_postdata();
				wp_reset_query();
				?>

				<div class="search">
					<h1>Search this website</h1>
					<?php get_search_form( ); ?>
				</div>
			</div><!-- .frontpage.news -->
		</div><!-- #feeds -->
	</div><!-- #primary -->

<?php get_sidebar( 'front' ); ?>
<?php get_footer(); ?>
