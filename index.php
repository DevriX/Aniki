<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Aniki
 */

get_header(); ?>
	<section class="section-fullwidth section-main">

		<!-- Get customizer settings for welcomes message -->
		<?php if ( get_theme_mod( 'aniki_welcome_message_setting') ) : ?>
			<?php $aniki_welcome_message_setting =  get_theme_mod( 'aniki_welcome_message_setting' ); ?>
			<div class="row">
				<div class="columns small-12">
					<div class="welcome-message">
						<?php echo $aniki_welcome_message_setting; ?>
					</div><!-- .welcome-message -->
				</div>
			</div><!-- .row -->
		<?php endif ?>
		<!-- End welcome message -->
		
		<div class="row">
			<div class="columns small-12">
				<div id="primary" class="content-area">
					<main id="main" class="site-main">

						<?php
							// WP_Query arguments
							$args = array (
								'post_status'	=> array( 'publish' ),
								'paged'			=> $paged,
							);

							// The Query
							$aniki_index_query = new WP_Query( $args );

							if ( $aniki_index_query->have_posts() ) :

								if ( is_home() && ! is_front_page() ) : ?>

									<header class="page-heading">
										<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
									</header>

								<?php

								endif;

								/* Start the Loop */
								while ( $aniki_index_query->have_posts() ) :
									$aniki_index_query->the_post();
									get_template_part( 'template-parts/content', '' );
								endwhile;

								the_posts_navigation();

							else :
								get_template_part( 'template-parts/content', 'none' );
							endif;

							// Restore original Post Data
							wp_reset_postdata();

							?>
					</main>
					<!-- #main -->
				</div>
				<!-- #primary -->
			</div>
		</div>
		<!-- .row -->
	</section>
	<!-- .section-fullwidth section-main -->
	<?php
get_footer();
