/*global jQuery*/

jQuery( document ).ready( function( $ ) {
	'use strict';

	/**
	  Validate Form
	 */
	if ( $( '.cform' ).length ) {
		$( '#cform' ).validate( {
			rules: {
				name: {
					required: true,
				},
				tel: {
					required: true,
				},
				email: {
					required: true,
					email: true,
				},
				subject: {
					required: true,
				},
				message: {
					required: true,
				},
				checkmark: {
					required: true,
				},
			},
			success: 'valid',
			submitHandler() {
				$.ajax( {
					url: 'mailer/feedback.php',
					type: 'post',
					dataType: 'json',
					data: 'name=' + $( '#cform' ).find( 'input[name="name"]' ).val() + '&email=' + $( '#cform' ).find( 'input[name="email"]' ).val() + '&tel=' + $( '#cform' ).find( 'input[name="tel"]' ).val() + '&subject=' + $( '#cform' ).find( 'input[name="subject"]' ).val() + '&message=' + $( '#cform' ).find( 'textarea[name="message"]' ).val(),
					beforeSend() {

					},
					complete() {

					},
					success() {
						$( '#cform' ).fadeOut();
						$( '.alert-success' ).delay( 1000 ).fadeIn();
					},
				} );
			},
		} );
	}

	/**
	  Validate Form 2
	 */
	if ( $( '.cform-two' ).length ) {
		$( '#cform-two' ).validate( {
			rules: {
				name: {
					required: true,
				},
				email: {
					required: true,
					email: true,
				},
				message: {
					required: true,
				},
				checkmark: {
					required: true,
				},
			},
			success: 'valid',
			submitHandler() {
				$.ajax( {
					url: 'mailer/feedback-two.php',
					type: 'post',
					dataType: 'json',
					data: 'name=' + $( '#cform-two' ).find( 'input[name="name"]' ).val() + '&email=' + $( '#cform-two' ).find( 'input[name="email"]' ).val() + '&message=' + $( '#cform-two' ).find( 'textarea[name="message"]' ).val(),
					beforeSend() {

					},
					complete() {

					},
					success() {
						$( '#cform-two' ).fadeOut();
						$( '.alert-success' ).delay( 1000 ).fadeIn();
					},
				} );
			},
		} );
	}
} );
