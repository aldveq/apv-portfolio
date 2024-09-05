<?php
/**
 * Block Experience Template
 *
 * PHP version 8
 *
 * @category Themes
 * @package  APV_Portfolio
 * @author   Aldo Paz Velasquez <aldveq80@gmail.com>
 * @license  GPL-2.0-or-later http://www.gnu.org/licenses/gpl-2.0.txt
 * @link     https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

use APVPortfolio\Classes\APVPortfolioUtilities;

// Variables.
$apv_experience_overline     = $args['data']['apv_experience_overline'];
$apv_experience_heading      = $args['data']['apv_experience_heading'];
$apv_experience_body_content = $args['data']['apv_experience_body_content'];
$apv_experience_data         = $args['data']['apv_experience_data'];
$apv_experience_block_id     = ! empty( $args['data']['apv_experience_block_id'] ) ? $args['data']['apv_experience_block_id'] : '';
$block_attributes            = $args['block_attributes'];
$block_classname_attribute   = is_array( $block_attributes ) && array_key_exists( 'className', $block_attributes ) ? $block_attributes['className'] : '';
?>
<section 
	class="mil-section mil-op-space-90 section-experience <?php echo esc_attr( $block_classname_attribute ); ?>"
	data-name="<?php echo esc_attr( $apv_experience_block_id ); ?>"
>
	<div class="mil-bg-item" style="top: 0; right: 15%; transform: rotate(-25deg)"></div>
	<div class="mil-bg-item" style="bottom: 15%; left: -5%; transform: rotate(-25deg)"></div>

	<div class="container">
		<?php
		if ( ! empty( $apv_experience_overline ) ) :
			?>
			<p class="mil-upper mil-mb-30">
			<?php
				echo wp_kses(
					APVPortfolioUtilities::highlight_text_with_accent_color( $apv_experience_overline ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				);
			?>
			</p>
			<?php
		endif;
		?>
		<?php
		if ( ! empty( $apv_experience_heading ) ) :
			?>
			<h2 class="mil-up mil-mb-60"><?php echo esc_html( $apv_experience_heading ); ?></h2>
			<?php
		endif;
		?>

		<div class="row">
			<div class="col-lg-6 mil-mb-60">
				<?php
				if ( ! empty( $apv_experience_body_content ) ) :
					echo wp_kses_post( wpautop( $apv_experience_body_content, true ) );
				endif;
				?>
			</div>
			<div class="col-lg-6">

				<div class="mil-timeline-nav-2">
					<div class="mil-timeline-2-pagination mil-upper mil-mb-30" id="milTimeline2Pagination"></div>
					<div class="mil-slider-nav mil-mb-30">
						<div class="mil-prev mil-timeline-2-prev">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
								<polyline points="9 18 15 12 9 6"></polyline>
							</svg>
						</div>
						<div class="mil-next mil-timeline-2-next">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
								<polyline points="9 18 15 12 9 6"></polyline>
							</svg>
						</div>
					</div>
				</div>

			</div>
			<div class="mil-divider"></div>
			<div class="col-xl-12">
				<?php
				if ( is_array( $apv_experience_data ) && count( $apv_experience_data ) > 0 ) :
					?>
					<div class="swiper-container mil-timeline-slider-2">
						<div class="swiper-wrapper">		
							<?php
							foreach ( $apv_experience_data as $experience_data ) :
								?>
								<div class="swiper-slide">
									<div class="mil-icon-box mil-type-2 mil-mb-30">
										<div class="mil-box-text">
											<p class="mil-upper mil-text-lg mil-mb-15"><?php echo esc_attr( $experience_data['agency'] ); ?></p>
											<p class="mil-upper mil-mb-30">
												<?php
													echo wp_kses(
														APVPortfolioUtilities::highlight_text_with_accent_color( $experience_data['period'] ),
														array(
															'span' => array(
																'class' => array(),
															),
														)
													);
												?>
											</p>
											<?php
												echo wp_kses_post( wpautop( $experience_data['job_description'], true ) );
											?>
										</div>
									</div>
								</div>
								<?php
							endforeach;
							?>
						</div>
					</div>
					<?php
				endif;
				?>
			</div>
		</div>
	</div>
</section>
