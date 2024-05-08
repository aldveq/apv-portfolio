<?php
/**
 * Template part for displaying the project grid item
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package APV_Portfolio
 */

$project_term_by_post = get_the_terms( get_the_ID(), 'projects-category' );
?>
	<div class="mil-grid-item">

		<a href="<?php echo esc_url( the_permalink() ); ?>" class="mil-portfolio-item mil-square-item mil-mb-60" target="_self">
			<div class="mil-cover">
				<?php
					echo wp_get_attachment_image(
						get_post_thumbnail_id( get_the_ID() ),
						'project-featured-image',
						false,
						array( 'load' => 'lazy' )
					);
					?>
				<div class="mil-hover-link">
					<i class="fas fa-link"></i>
				</div>
			</div>
			<div class="mil-project-descr">
				<p class="mil-upper mil-accent mil-mb-15"><?php echo esc_html( $project_term_by_post[0]->name ); ?></p>
				<h4 class="mil-up"><?php echo esc_html( the_title() ); ?></h4>
			</div>
		</a>

	</div>
<?php
