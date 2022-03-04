<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Aniki
 */

$aniki_default_thumbnail_url = get_template_directory_uri() . '/assets/images/default-image.jpg';

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry entry--feature' ); ?>>
	<div class="entry-content entry-content--slider">	
		<header class="entry-header">
			<?php
				$aniki_categories = get_the_category();
				$aniki_separator  = ' ';
				$aniki_output     = '';
			?>
			<div class="entry-category-wrapper">
				<?php
				if ( ! empty( $aniki_categories ) ) {
					foreach ( $aniki_categories as $aniki_category ) {
						$aniki_output .= '<a class="entry-category" href="' . esc_url( get_category_link( $aniki_category->term_id ) ) . '" alt="' . esc_attr(
							sprintf(
								/* translators: shows only on featured posts */
								__( 'View all posts in %s', 'aniki' ),
								$aniki_category->name
							)
						) . '">' . esc_html( $aniki_category->name ) . '</a>' . $aniki_separator;
					}
					echo trim( $aniki_output );
				}
				?>
			</div>
			<?php
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			?>
			<div class="entry-meta">
				<span class="entry-comments">
					<?php comments_number( __( 'No comments', 'aniki' ), __( '1 Comment', 'aniki' ), __( '% Comments', 'aniki' ) ); ?>
				</span>

			</div>
		</header><!-- .entry-header -->	
		<div class="content-line">
			<?php
			echo $aniki_trimmed_excerpt = the_excerpt();

				add_filter(
					'excerpt_length',
					function( $aniki_excerpt_length ) {
						return 30;
					}
				);
				?>

				<div class="entry-footer">
					<a class="more-link" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read more', 'aniki' ); ?><i class="far fa-long-arrow-right"></i></a>
				</div><!-- .entry-footer -->


				<?php
				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aniki' ),
						'after'  => '</div>',
					)
				);
				?>
		</div>
	</div><!-- .entry-content -->
	<?php if ( has_post_thumbnail() ) : ?>
			<div class="entry-thumbnail--slider" style="background-image: url(<?php the_post_thumbnail_url( 'full' ); ?>);"></div>
	<?php else : ?>
			<div class="entry-thumbnail--slider" style="background-image: url(<?php echo esc_url( $aniki_default_thumbnail_url ); ?>);"></div>
	<?php endif; ?>
</article><!-- #post-## -->
