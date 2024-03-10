/*global jQuery*/

jQuery( document ).ready( function( $ ) {
	'use strict';

	$( '.mil-filter a' ).on( 'click', function() {
		$( '.mil-filter .mil-current' ).removeClass( 'mil-current' );
		$( this ).addClass( 'mil-current' );

		const selector = $( this ).data( 'filter' );

		$( '.mil-portfolio-grid' ).isotope( {
			filter: selector,
		} );

		return false;
	} );

	$( '.mil-portfolio-grid' ).isotope( {
		itemSelector: '.mil-grid-item',
		transitionDuration: '0.5s',
		masonry: {
			columnWidth: '.grid-sizer',
		},
	} );
} );
