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
});
