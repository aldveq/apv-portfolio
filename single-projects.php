<?php
/**
 * The template for displaying the single view for projects
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package APV_Portfolio
 */

use APVPortfolio\Classes\APVPortfolioUtilities;

get_header( 'secondary' );

// Variables.
$single_project_tax_data    = get_the_taxonomies();
$single_project_client_name = carbon_get_post_meta( get_the_ID(), 'project_cpt_client_name' );
$single_project_demo_link   = carbon_get_post_meta( get_the_ID(), 'project_cpt_demo_link' );
$single_project_repo_link   = carbon_get_post_meta( get_the_ID(), 'project_cpt_repo_link' );
$single_project_description = carbon_get_post_meta( get_the_ID(), 'project_cpt_description' );
?>

<div>
	<div class="mil-page single-projects-page-container">
		<div class="container">
			<div class="mil-top-banner mil-text-center">
				<p class="mil-upper mil-mb-30 single-projects-page-container__tax-data"><?php echo wp_kses_post( $single_project_tax_data['projects-category'] ); ?></p>
				<h2 class="mil-up mil-mb-60"><?php echo esc_html( get_the_title() ); ?></h2>
				<?php
				if ( has_excerpt( get_the_ID() ) ) :
					?>
							<p><?php echo esc_html( get_the_excerpt( get_the_ID() ) ); ?></p>
						<?php
					endif;
				?>
			</div>

			<div class="mil-project mil-mb-60">

				<div class="mil-divider"></div>

				<div class="row justify-content-between mil-mb-60">
					<div class="col-lg-8">

						<div class="mil-mb-60"></div>
						
						<div class="mil-cover mil-mb-30">
							<?php
								echo wp_get_attachment_image(
									get_post_thumbnail_id( get_the_ID() ),
									'project-featured-image-single',
									false,
									array(
										'load' => 'lazy',
									)
								);
								?>
						</div>

						<?php
						if ( ! empty( $single_project_description ) ) :
							$single_project_description_formatted = APVPortfolioUtilities::get_formatted_paragraphs(
								$single_project_description,
								'mil-mb-30'
							);

							echo wp_kses_post( $single_project_description_formatted );
						endif;
						?>
					</div>
					<div class="col-lg-4">

						<div class="mil-timeline-nav">
							<div class="mil-mb-30">
								<p class="mil-upper mil-mb-10">Date: <span class="mil-text-sm fw-normal"><?php echo esc_html( get_the_time( 'j F Y', get_the_ID() ) ); ?></span></p>
							</div>
							
							<?php
							if ( ! empty( $single_project_client_name ) ) :
								?>
								<div class="mil-mb-30">
									<p class="mil-upper mil-mb-10">Client Name: <span class="mil-text-sm fw-normal"><?php echo esc_html( $single_project_client_name ); ?></span></p>
								</div>
								<?php
							endif;
							?>

							<?php
							if ( ! empty( $single_project_demo_link ) ) :
								?>
								<div class="mil-mb-30">
									<a 
										href="<?php echo esc_url( $single_project_demo_link ); ?>"
										target="_blank"
										class="mil-upper mil-mb-10 external-link"
									>
										Demo
										<i class="fas fa-external-link-alt"></i>
									</a>
								</div>
								<?php
							endif;
							?>

							<?php
							if ( ! empty( $single_project_repo_link ) ) :
								?>
								<div>
									<a 
										href="<?php echo esc_url( $single_project_repo_link ); ?>"
										target="_blank"
										class="mil-upper mil-mb-10 external-link"
									>
										Repository
										<i class="fas fa-external-link-alt"></i>
									</a>
								</div>
								<?php
							endif;
							?>
						</div>

					</div>
				</div>
			</div>

			<div class="mil-pagination-panel">
				<?php
					the_post_navigation(
						array(
							'class'     => 'single-projects-page-container__post-nav',
							'next_text' => '<div class="mil-button mil-mb-30">Next Project</div>',
							'prev_text' => '<div class="mil-button mil-type-2 mil-mb-30">Previous Project</div>',
						)
					);
					?>
			</div>

		</div>
	</div>
</div>

<?php
get_footer( 'secondary' );
