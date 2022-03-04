jQuery( document ).ready( function ( $ ) {
	'use strict';
	/*
	|--------------------------------------------------------------------------
	| Developer mode
	|--------------------------------------------------------------------------
	|
	| Set to true - it will allow printing in the console. Alsways check for this
	| variables when running tests so you dont forget about certain console.logs.
	| Id needed for development testing this variable should be used.
	|
	*/
	var devMode = function() {
		return true;
	};

	// Disable console.log for production site.
	if ( ! devMode() ) {
		console.log = function() {};
	}

	// Grab viewport width
	var viewportWidth = $(".site-header").width();
	var menuWidth = $(".main-navigation").width();
	var logoWidth = $(".site-branding").width();


	// The first 100 is a buffer
	if (100 + logoWidth + menuWidth >= viewportWidth) {
		$("body").addClass("long-menu");
	}

	if ($(window).width() < 640) {
		var $menuItems = $('.main-navigation .menu .menu-item');
		if ($menuItems.length > 0) {
			var $lastMenuItem = $($menuItems[$menuItems.length - 1]);
			var $toggleButton = $('.menu-toggle');
	
			$lastMenuItem.on('keydown', function (e) {
				var isTabPressed = e.key === 'Tab' || e.keyCode === 9;
	
				if (!isTabPressed) {
					return;
				};
	
				if (!e.shiftKey) {
					e.preventDefault();
					$toggleButton.focus();
				};
	
			});
	
			$toggleButton.on('keydown', function (e) {
				var isTabPressed = e.key === 'Tab' || e.keyCode === 9;
	
				if (!isTabPressed) {
					return;
				};
	
				if (e.shiftKey) {
					e.preventDefault();
					$lastMenuItem.find('a').focus();
				};
			});
		}
	}
});
