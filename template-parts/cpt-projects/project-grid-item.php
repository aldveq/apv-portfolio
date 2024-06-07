<?php
/**
 * Template part for displaying the project grid item
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package APV_Portfolio
 */

use APVPortfolio\Classes\APVPortfolioUtilities;

$project_term_by_post = get_the_terms( get_the_ID(), 'projects-category' );
?>
	<div class="mil-grid-item">

		<div class="mil-portfolio-item mil-square-item mil-mb-60">
			<div class="mil-cover">
				<a 
					href="<?php echo esc_url( get_the_permalink( get_the_ID() ) ); ?>" 
					class="img-permalink"
					target="_self"
				>
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
				</a>
			</div>
			<div class="mil-project-descr">
				<p class="mil-upper mil-accent mil-mb-15">
					<?php
						$project_term_by_post_formatted_string = APVPortfolioUtilities::get_taxonomies_data( $project_term_by_post );

					if ( ! empty( $project_term_by_post_formatted_string ) ) :
						echo wp_kses_post( $project_term_by_post_formatted_string );
						endif;
					?>
				</p>
				<h4 class="mil-up">
					<a 
						href="<?php echo esc_url( get_the_permalink( get_the_ID() ) ); ?>"
						target="_self"
					>
						<?php echo esc_html( the_title() ); ?>
					</a>
				</h4>
			</div>
		</div>

	</div>
<?php
