<?php
/**
 * The template for displaying the project taxonomy page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package APV_Portfolio
 */

get_header( 'secondary' );
?>
<div>
	<div class="mil-page">

		<div class="mil-bg-item" style="top: 3%; right: 15%; transform: rotate(-45deg)"></div>

		<?php
			get_template_part(
				'template-parts/intro-content',
				null,
				array(
					'overline' => carbon_get_theme_option( 'apv_project_archive_overline' ),
					'heading'  => carbon_get_theme_option( 'apv_project_archive_heading' ),
					'content'  => carbon_get_theme_option( 'apv_project_archive_content' ),
				)
			);
			?>

		<?php get_template_part( 'template-parts/cpt-projects/category-filter' ); ?>

		<?php
		if ( have_posts() ) :
			?>
			<div class="container">

				<div class="mil-portfolio-grid mil-mb-30">

					<div class="grid-sizer"></div>

					<?php
						/* Start the Loop */
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/cpt-projects/project-grid-item' );
					endwhile;
					?>
				</div>

				<?php get_template_part( 'template-parts/project-cpt-blog-pagination' ); ?>
			</div>
			<?php
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>

	</div>
</div>

<?php
get_footer( 'secondary' );
