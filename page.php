<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Aniki
 */

get_header(); ?>
	<section class="section-fullwidth section-main">
		<div class="row">
			<?php if ( is_active_sidebar( 'sidebar-1' ) ):?>
				<div class="columns small-12 medium-8">
			<?php else: ?>
				<div class="columns small-12 medium-12">
			<?php endif ?>
				<div id="primary" class="content-area">
					<main id="main" class="site-main">
						<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>
					</main>
					<!-- #main -->
				</div>
				<!-- #primary -->
			</div>
			<!-- .columns medium-8 -->
			<?php if ( is_active_sidebar( 'sidebar-1' ) ):?>
				<div class="columns small-12 medium-4">
					<?php get_sidebar(); ?>
				</div>
			<?php endif ?>
			<!-- .columns medium-4 -->
		</div>
		<!-- .row -->
	</section>
	<!-- .section-fullwidth section-main -->
	<?php
get_footer();
