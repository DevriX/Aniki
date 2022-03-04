<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
					if ( have_posts() ) : ?>
							<header class="page-header">
								<h1 class="page-title"><?php printf(
								/* translators: Shows the search results */
								esc_html__( 'Search Results for: %s', 'aniki' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
							</header>
							<!-- .page-header -->
							<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'template-parts/content', '');

						endwhile;

						the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; ?>
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
