<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Aniki
 */

if ( ! function_exists( 'aniki_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function aniki_posted_on() {
	$aniki_time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$aniki_time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$aniki_time_string = sprintf( $aniki_time_string,
		esc_attr( get_the_date( 'S' ) ),
		esc_html( get_the_date( ) ),
		esc_attr( get_the_modified_date( 'S' ) ),
		esc_html( get_the_modified_date() )
	);
	$aniki_posted_on = sprintf(
		/* translators: used in top of post, specifies the date it is posted on */
		esc_html_x( 'Posted on %s', 'post date', 'aniki' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $aniki_time_string . '</a>'
	);

	$aniki_byline = sprintf(
		/* translators: used to show the author name */
		esc_html_x( 'by %s', 'post author', 'aniki' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . esc_html( $aniki_posted_on ) . '</span><span class="byline"> ' . esc_html( $aniki_byline ) . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'aniki_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function aniki_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		$aniki_categories_list = get_the_category_list( esc_html__( ', ', 'aniki' ) );
		if ( $aniki_categories_list && aniki_categorized_blog() ) {
			printf(
			/* translators: used between list items, there is a space after the comma */
			'<span class="cat-links">' . esc_html( 'Posted in %1$s', 'aniki' ) . '</span>', esc_html( $aniki_categories_list ) ); // WPCS: XSS OK.
		}

		$aniki_tags_list = get_the_tag_list( '', esc_html__( ', ', 'aniki' ) );
		if ( $aniki_tags_list ) {
			printf(
			/* translators: used between list items, there is a space after the comma */
			'<span class="tags-links">' . esc_html( 'Tagged %1$s', 'aniki' ) . '</span>', esc_html ( $aniki_tags_list ) ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'aniki' ), esc_html__( '1 Comment', 'aniki' ), esc_html__( '% Comments', 'aniki' ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'aniki' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function aniki_categorized_blog() {
	if ( false === ( $aniki_all_the_cool_cats = get_transient( 'aniki_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$aniki_all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$aniki_all_the_cool_cats = count( $aniki_all_the_cool_cats );

		set_transient( 'aniki_categories', $aniki_all_the_cool_cats );
	}

	if ( $aniki_all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so aniki_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so aniki_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in aniki_categorized_blog.
 */
function aniki_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'aniki_categories' );
}
add_action( 'edit_category', 'aniki_category_transient_flusher' );
add_action( 'save_post',     'aniki_category_transient_flusher' );
