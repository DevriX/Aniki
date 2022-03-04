<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Aniki
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
	<header class="entry-header">
		<div class="entry-date">
			<?php the_time( 'jS F Y' ); ?>
		</div><!-- .entry-date -->
		<?php

		if ( is_single() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} else {
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}
		?>
			<div class="entry-meta">
				<?php
				$aniki_categories = get_the_category();
				$aniki_separator  = ', ';
				$aniki_output     = '';
				?>
				<span class="entry-category">
					<?php
					if ( ! empty( $aniki_categories ) ) {
						$aniki_output .= '<i class="far fa-folder-open"></i> ';
						foreach ( $aniki_categories as $aniki_category ) {
							$aniki_output .= '<a class="entry-category" href="' . esc_url( get_category_link( $aniki_category->term_id ) ) . '" alt="' . esc_attr(
								sprintf(
									/* translators: shows on single post */
									__( 'View all posts in %s', 'aniki' ),
									$aniki_category->name
								)
							) . '">' . esc_html( $aniki_category->name ) . '</a>' . $aniki_separator;
						}
						echo trim( $aniki_output, $aniki_separator );
					}
					?>
				</span>
				<?php
				$aniki_posttags  = get_the_tags();
				$aniki_separator = ', ';
				$aniki_output    = '';
				?>
				<span class="entry-tags">
					<?php
					if ( $aniki_posttags ) {
						$aniki_output .= '<i class="far fa-tag"></i> ';
						foreach ( $aniki_posttags as $aniki_single_tag ) {
							$aniki_output .= '<a class="entry-category" href="' . esc_url( get_tag_link( $aniki_single_tag->term_id ) ) . '" alt="' . esc_attr(
								sprintf(
									/* translators: shows on single post */
									__( 'View all posts with %s', 'aniki' ),
									$aniki_single_tag->name
								)
							) . '">' . esc_html( $aniki_single_tag->name ) . '</a>' . $aniki_separator;
						}
						echo trim( $aniki_output, $aniki_separator );
					}
					?>
				</span>

				<span class="entry-comments">
					<i class="far fa-comments"></i> <?php comments_number( __( 'No comments', 'aniki' ), __( '1 Comment', 'aniki' ), __( '% Comments', 'aniki' ) ); ?>
				</span>

			</div>

		<?php if ( 'post' === get_post_type() ) : ?>
		<!-- <div class='entry-meta'> -->
			<?php // aniki_posted_on(); ?>
		<!-- </div> -->
		<!-- .entry-meta -->
			<?php
		endif;
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		if ( has_post_thumbnail() ) :
			$aniki_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
			if ( $aniki_image[1] <= 729 ) :
				?>
			<div class="entry-thumbnail small-thumbnail" style="background-image: url(<?php the_post_thumbnail_url( 'thumbnail' ); ?>);" ></div>
		<?php else : ?>
			<div class="entry-thumbnail" >
				<?php the_post_thumbnail( 'full' ); ?>
			</div>
			<?php
		endif;
endif;
		?>
		<div class="content-line">
			<?php the_content(); ?>
		</div>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
