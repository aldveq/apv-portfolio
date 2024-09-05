<?php
/**
 * Block Education Template
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
$apv_education_overline     = $args['data']['apv_education_overline'];
$apv_education_heading      = $args['data']['apv_education_heading'];
$apv_education_body_content = $args['data']['apv_education_body_content'];
$apv_education_data         = $args['data']['apv_education_data'];
$apv_education_block_id     = ! empty( $args['data']['apv_education_block_id'] ) ? $args['data']['apv_education_block_id'] : '';
$block_attributes           = $args['block_attributes'];
$block_classname_attribute  = is_array( $block_attributes ) && array_key_exists( 'className', $block_attributes ) ? $block_attributes['className'] : '';
?>
<section 
	class="section-education mil-section mil-op-space-90 <?php echo esc_attr( $block_classname_attribute ); ?>"
	data-name="<?php echo esc_attr( $apv_education_block_id ); ?>"
>

	<div class="mil-bg-item" style="bottom: 0%; left: 25%; transform: rotate(-25deg)"></div>

	<div class="container">
		<div class="row justify-content-between">
			<div class="col-xl-5 mil-mb-60">

				<div class="mil-text-right-adapt mil-mb-30">
					<?php
					if ( ! empty( $apv_education_overline ) ) :
						?>
						<p class="mil-upper mil-mb-30">
							<?php
								echo wp_kses(
									APVPortfolioUtilities::highlight_text_with_accent_color( $apv_education_overline ),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								)
							?>
						</p>
						<?php
					endif;
					?>
					<?php
					if ( ! empty( $apv_education_heading ) ) :
						?>
						<h2 class="mil-up mil-mb-60"><?php echo esc_html( $apv_education_heading ); ?></h2>
						<?php
					endif;
					?>
					<?php
					if ( ! empty( $apv_education_body_content ) ) :
						echo wp_kses_post( wpautop( $apv_education_body_content, true ) );
					endif;
					?>
				</div>

				<div class="mil-timeline-nav-2">
					<div class="mil-timeline-2-pagination mil-upper mil-mb-30" id="milTimelineEduPagination"></div>
					<div class="mil-slider-nav mil-mb-30">
						<div class="mil-prev mil-timeline-edu-prev">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
								<polyline points="9 18 15 12 9 6"></polyline>
							</svg>
						</div>
						<div class="mil-next mil-timeline-edu-next">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
								<polyline points="9 18 15 12 9 6"></polyline>
							</svg>
						</div>
					</div>
				</div>

			</div>
			<div class="col-xl-6">
				<?php
				if ( is_array( $apv_education_data ) && count( $apv_education_data ) > 0 ) :
					?>
					<div class="swiper swiper-education-block-init">
						<div class="swiper-wrapper">
						<?php
						foreach ( $apv_education_data as $e_data_value ) :
							?>
							<div class="swiper-slide">
								<div class="mil-icon-box">
									<?php
									if ( ! empty( $e_data_value['link'] ) ) :
										?>
										<div class="mil-text-icon">
											<a 
												href="<?php echo esc_url( $e_data_value['link'] ); ?>"
												target="_blank"
											>
												<i class="fas fa-external-link-alt"></i>
											</a>
										</div>
										<?php
									endif;
									?>
									<div class="mil-box-text">
										<?php
										if ( ! empty( $e_data_value['title'] ) ) :
											?>
											<p class="mil-upper mil-text-lg mil-mb-10"><?php echo esc_html( $e_data_value['title'] ); ?></p>
											<?php
										endif;
										?>
										<?php
										if ( ! empty( $e_data_value['period'] ) ) :
											?>
											<p class="mil-upper mil-upper-sm mil-mb-30">
											<?php
												echo wp_kses(
													APVPortfolioUtilities::highlight_text_with_accent_color( $e_data_value['period'] ),
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
										if ( ! empty( $e_data_value['description'] ) ) :
											echo wp_kses_post( wpautop( $e_data_value['description'] ) );
										endif;
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
