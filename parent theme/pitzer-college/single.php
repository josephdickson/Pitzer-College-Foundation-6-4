<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Pitzer_College
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="grid-container">
				<div class="grid-x">
					<div class="small-12 medium-8 large-9 cell">

						<?php
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content', get_post_type() );

							the_post_navigation();

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
						?>

					</div><!-- .cell -->
					<div class="small-12 medium-4 large-3 cell">
						<?php get_sidebar(); ?>
					</div><!-- .cell -->
				</div><!-- .grid-x -->
			</div><!-- .grid-container -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
