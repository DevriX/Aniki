;( function( $ ) {
	// var container = document.getElementById( 'site-navigation' );
	var dropdownToggle = $( '<button />', {
			'class': 'dropdown-toggle',
			'aria-expanded': false
		} ).append( $( '<span />', {
			'class': 'screen-reader-text',
			text: "expand child menu"
		} ) );

		$("#site-navigation").find( '.menu-item-has-children > a' ).after( dropdownToggle );

		// Toggle buttons and submenu items with active children menu items.
		$("#site-navigation").find( '.current-menu-ancestor > button' ).addClass( 'toggled-on' );
		$("#site-navigation").find( '.current-menu-ancestor > .sub-menu' ).addClass( 'toggled-on' );

		// Add menu items with submenus to aria-haspopup="true".
		$("#site-navigation").find( '.menu-item-has-children' ).attr( 'aria-haspopup', 'true' );

		$("#site-navigation").find( '.dropdown-toggle' ).click( function( e ) {
			var _this = $( this )

			e.preventDefault();
			_this.toggleClass( 'toggled-on' );
			_this.next( '.children, .sub-menu' ).toggleClass( 'toggled-on' );

			// jscs:disable
			_this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
		} );

	$('button.menu-toggle').on('click', function() {
		if ( $('#site-navigation').hasClass('toggled') ) {
			$('#site-navigation').removeClass('toggled');
			$(this).attr( 'aria-expanded', 'false' );
			$('.menu-primary-container').attr('aria-expanded', 'false');
			$('.menu-primary-container').css('display', 'none');
		} else {
			$('#site-navigation').addClass('toggled');
			$(this).attr( 'aria-expanded', 'true' );
			$('.menu-primary-container').attr('aria-expanded', 'true');
			$('.menu-primary-container').css('display', 'block');
		}
	});
} )( jQuery );