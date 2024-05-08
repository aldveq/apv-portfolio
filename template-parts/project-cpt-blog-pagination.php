<?php
/**
 * Template part for displaying the pagination for project archives, blog pages & taxonomy pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package APV_Portfolio
 */

the_posts_pagination(
	array(
		'mid_size'  => 2,
		'prev_text' => __( 'Prev', 'apv-portfolio' ),
		'next_text' => __( 'Next', 'apv-portfolio' ),
		'end_size'  => 2,
		'class'     => 'mil-pagination-panel',
	)
);
