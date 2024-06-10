<?php
/**
 * The template for the contact page
 *
 * Template Name: Contact
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package APV_Portfolio
 */

get_header();
?>
<section class="mil-onepage contact-page-wrapper">
	<?php
		the_content();
	?>
</section>
<?php
get_footer();
