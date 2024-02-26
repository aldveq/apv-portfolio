/*global jQuery*/

jQuery(document).ready(function ($) {
	"use strict";

	$(window).on("scroll", function () {
		var scroll = $(window).scrollTop();

		if (scroll >= 30) {
			$(".mil-top-panel").addClass("mil-active");
		} else {
			$(".mil-top-panel").removeClass("mil-active");
		}
	});

	$('.mil-menu-btn').on('click', function () {
		$('.mil-menu-btn , .mil-top-panel nav').toggleClass('mil-active');
	});
});
