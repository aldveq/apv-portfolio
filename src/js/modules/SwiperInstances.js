/*global Swiper*/

'use strict';

new Swiper('.mil-timeline-slider', {
	slidesPerView: 1,
	spaceBetween: 30,
	speed: 800,
	parallax: true,
	navigation: {
		prevEl: '.mil-timeline-prev',
		nextEl: '.mil-timeline-next',
	},
	pagination: {
		el: '.mil-timeline-pagination',
		type: 'fraction',
		clickable: true,
	},
	breakpoints: {
		992: {
			slidesPerView: 2,
		},
	},
});

new Swiper('.mil-timeline-slider-2', {
	slidesPerView: 1,
	spaceBetween: 30,
	speed: 800,
	parallax: true,
	grabCursor: true,
	navigation: {
		prevEl: '.mil-timeline-2-prev',
		nextEl: '.mil-timeline-2-next',
	},
	pagination: {
		el: '#milTimeline2Pagination',
		type: 'fraction',
		clickable: true,
	},
	breakpoints: {
		992: {
			slidesPerView: 3,
		},
	},
});

new Swiper('.swiper-education-block-init', {
	slidesPerView: 1,
	spaceBetween: 10,
	speed: 800,
	parallax: true,
	grabCursor: true,
	grid: {
		rows: 2,
	},
	navigation: {
		prevEl: '.mil-timeline-edu-prev',
		nextEl: '.mil-timeline-edu-next',
	},
	pagination: {
		el: '#milTimelineEduPagination',
		type: 'fraction',
		clickable: true,
	},
});

new Swiper('.mil-reviews-slider', {
	slidesPerView: 1,
	spaceBetween: 30,
	speed: 800,
	parallax: true,
	navigation: {
		prevEl: '.mil-reviews-prev',
		nextEl: '.mil-reviews-next',
	},
	pagination: {
		el: '.mil-reviews-pagination',
		type: 'fraction',
		clickable: true,
	},
});
