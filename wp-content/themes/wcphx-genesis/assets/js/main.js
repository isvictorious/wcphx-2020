/**
 * BDS Starter Theme entry point.
 *
 * @package bds-starter-theme\js
 * @author  Dan Brubaker
 * @license GPL-2.0+
 */

var BDSStarterTheme = ( function( $ ) {
	'use strict';

	/**
	 * Adjust site inner margin top to compensate for sticky header height.
	 */
	var moveContentBelowHeaderAndAdminBar = function() {
		var siteHeaderMarginTop = 0;
		var siteInnerMarginTop = 0;

		// Move content below header.
		if( $('.site-header').css('position') === 'fixed' ) {
			siteInnerMarginTop = $('.site-header').outerHeight();
		}

		$('.site-inner').css('margin-top', siteInnerMarginTop);

		// Move header below admin bar.
		if( $('#wpadminbar').css('position') === 'fixed' && $('.site-header').css('position') !== 'relative' ) {
			siteHeaderMarginTop = $('#wpadminbar').outerHeight();
		}

		$('.site-header').css('margin-top', siteHeaderMarginTop);
	},

	/**
	 * Initialize BDS Starter Theme.
	 *
	 * Internal functions to execute on full page load.
	 *
	 * @since 2.6.0
	 */
	load = function() {
		moveContentBelowHeaderAndAdminBar();

		$( window ).resize(function() {
			moveContentBelowHeaderAndAdminBar();
		});

		// Run after the Customizer updates.
		// 1.5s delay is to allow logo area reflow.
		if (typeof wp != "undefined" && typeof wp.customize != "undefined") {
			wp.customize.bind( 'change', function ( setting ) {
				setTimeout(function() {
					moveContentBelowHeaderAndAdminBar();
				  }, 1500);
			});
		}
	};

	// Expose the load and ready functions.
	return {
		load: load
	};

})( jQuery );

jQuery( window ).on( 'load', BDSStarterTheme.load );
