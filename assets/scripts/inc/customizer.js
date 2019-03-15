/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

jQuery( document ).ready( function ( $ ) {
	'use strict';

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );

	// Welcome message.
	wp.customize( 'aniki_welcome_message_setting', function( value ) {
		value.bind( function( to ) {
			$( '.welcome-message' ).text( to );
		} );
	} );

	wp.customize( 'aniki_grayscale_filter_setting', function( value ) {
		value.bind( function(to) {
			console.log(to);
			if ( 'true' === to ) {
				$( '.entry .entry-content .entry-thumbnail' ).css({
					'filter': 'grayscale(100%)',
					'-webkit-filter': 'grayscale(100%)'
				});
			} else {
				$( '.entry .entry-content .entry-thumbnail' ).css({
					'filter': 'none',
					'-webkit-filter': 'none'
				});
			}
		});
	} );
	
} );
