/*global jQuery*/

jQuery( document ).ready( function( $ ) {
	'use strict';

	/**
	  Image Popup
	 */
	$( '.mfp-image' ).magnificPopup();

	/*
		Gallery popup
	*/
	$( '.mfp-gallery' ).on( 'click', function() {
		const gallery = $( this ).attr( 'href' );

		$( gallery ).magnificPopup( {
			delegate: 'a',
			type: 'image',
			closeOnContentClick: false,
			mainClass: 'mfp-fade',
			removalDelay: 160,
			fixedContentPos: false,
			gallery: {
				enabled: true,
			},
		} ).magnificPopup( 'open' );

		return false;
	} );
} );
