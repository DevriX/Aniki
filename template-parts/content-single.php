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
			} ?>
			<div class="entry-meta">
				<?php
				$categories = get_the_category();
				$separator = ', ';
				$output = '';
				?>
				<span class="entry-category">
					<?php
					if ( ! empty( $categories ) ) {
						$output .= '<i class="fa fa-folder-open"></i> ';
						foreach( $categories as $category ) {
							$output .= '<a class="entry-category" href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'aniki' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
						}
						echo trim( $output, $separator );
						}
					?>
				</span>
				<?php
				$posttags = get_the_tags();
				$separator = ', ';
				$output = '';
				?>
				<span class="entry-tags">
					<?php
						if ( $posttags ) {
						$output .= '<i class="fa fa-tag"></i> ';
						foreach($posttags as $single_tag) {
							$output .= '<a class="entry-category" href="' . esc_url( get_tag_link( $single_tag->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts with %s', 'aniki' ), $single_tag->name ) ) . '">' . esc_html( $single_tag->name ) . '</a>' . $separator;
						}
						echo trim( $output, $separator );
						}
					?>
				</span>

				<span class="entry-comments">
					<i class="fa fa-comments"></i> <?php comments_number( 'no comments', 'one comment', '% comments' ); ?>
				</span>

			</div>

		<?php if ( 'post' === get_post_type() ) : ?>
		<!-- <div class='entry-meta'> -->
			<?php // aniki_posted_on(); ?>
		<!-- </div> -->
		<!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php if ( has_post_thumbnail() ) :
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
			if ( $image[1] <= 729 ) :
		?>
			<div class="entry-thumbnail small-thumbnail" style="background-image: url(<?php the_post_thumbnail_url('full'); ?>);" ></div>
		<?php else : ?>
			<div class="entry-thumbnail" >
				<?php the_post_thumbnail( 'full' ); ?>
			</div>
		<?php endif; endif; ?>
		<div class="content-line">
			<?php the_content(); ?>
		</div>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
