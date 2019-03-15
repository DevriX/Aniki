<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Aniki
 */

$default_thumbnail_url = get_template_directory_uri()."/assets/images/default-image.jpg";

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry entry--feature' ); ?>>
	<div class="entry-content entry-content--slider">	
		<header class="entry-header">
			<?php 
				$categories = get_the_category();
				$separator = " ";
				$output = '';
			?>
			<div class="entry-category-wrapper">
				<?php 
				if ( ! empty( $categories ) ) {
					foreach( $categories as $category ) {
						$output .= '<a class="entry-category" href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'aniki' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
					}
					echo trim( $output );
					}
				?>
			</div>
			<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			?>
			<div class="entry-meta">
				<span class="entry-comments">
					<?php comments_number( 'No comments', '1 Comment', '% Comments' ); ?>
				</span>

			</div>
		</header><!-- .entry-header -->	
		<div class="content-line">
			<?php

				echo $trimmed = wp_trim_words( get_the_content(), 30, null ); ?>

				<div class="entry-footer">
					<a class="more-link" href="<?php echo the_permalink(); ?>">Read more <i class="fa fa-long-arrow-right"></i></a>	
				</div><!-- .entry-footer -->

				<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aniki' ),
					'after'  => '</div>',
				) );
			
			?>
		</div>
	</div><!-- .entry-content -->
	<?php if ( has_post_thumbnail() ): ?>
			<div class="entry-thumbnail--slider" style="background-image: url(<?php the_post_thumbnail_url('full'); ?>);"></div> 
	<?php else: ?>
			<div class="entry-thumbnail--slider" style="background-image: url(<?php echo $default_thumbnail_url; ?>);"></div>
	<?php endif; ?>		
</article><!-- #post-## -->

