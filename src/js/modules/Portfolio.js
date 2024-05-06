/*global jQuery*/

jQuery( document ).ready( function( $ ) {
	'use strict';

	$( '.mil-portfolio-grid' ).isotope( {
		itemSelector: '.mil-grid-item',
		transitionDuration: '0.5s',
		masonry: {
			columnWidth: '.grid-sizer',
		},
	} );
} );
