<?php
/**
 * Block Image Content Cta Alt Template
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

// Block Variables.
$apv_image_content_cta_alt_image         = $args['data']['apv_image_content_cta_alt_image'];
$apv_image_content_cta_alt_overline      = $args['data']['apv_image_content_cta_alt_overline'];
$apv_image_content_cta_alt_heading       = $args['data']['apv_image_content_cta_alt_heading'];
$apv_image_content_cta_alt_body_content  = $args['data']['apv_image_content_cta_alt_body_content'];
$apv_image_content_cta_alt_title         = $args['data']['apv_image_content_cta_alt_title'];
$apv_image_content_cta_alt_url           = $args['data']['apv_image_content_cta_alt_url'];
$apv_image_content_cta_alt_target        = $args['data']['apv_image_content_cta_alt_target'];
$apv_image_content_cta_alt_download_file = $args['data']['apv_image_content_cta_alt_download_file'];
$apv_image_content_cta_alt_block_id      = ! empty( $args['data']['apv_image_content_cta_alt_block_id'] ) ? $args['data']['apv_image_content_cta_alt_block_id'] : '';
$block_attributes                        = $args['block_attributes'];
$block_classname_attribute               = is_array( $block_attributes ) && array_key_exists( 'className', $block_attributes ) ? $block_attributes['className'] : '';
?>
<section 
	class="section-image-content-cta-alt mil-section mil-op-space-90 <?php echo esc_attr( $block_classname_attribute ); ?>"
	data-name="<?php echo esc_attr( $apv_image_content_cta_alt_block_id ); ?>"
>

	<div class="mil-bg-item mil-bg-item-large" style="top: -20%; left: 15%; transform: rotate(-35deg)"></div>
	<div class="mil-bg-item" style="top: 25%; right: 0; transform: rotate(-25deg)"></div>

	<div class="container">
		<div class="row justify-content-between align-items-center">
			<div class="col-xl-12">

				<div class="row">
					<div class="col-xl-12">

						<div class="mil-text-center">
							<?php
							if ( ! empty( $apv_image_content_cta_alt_image ) ) :
								?>
								<div class="mil-about-person-2 mil-mb-30">
								<?php
									echo wp_get_attachment_image(
										$apv_image_content_cta_alt_image,
										'full',
										false,
										array(
											'class' => 'mil-avatar',
											'load'  => 'lazy',
										)
									)
								?>
								</div>
								<?php
							endif;
							?>

							<?php
							if ( ! empty( $apv_image_content_cta_alt_overline ) ) :
								?>
								<p class="mil-upper mil-mb-30">
									<?php
										echo wp_kses(
											APVPortfolioUtilities::highlight_text_with_accent_color( $apv_image_content_cta_alt_overline ),
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
							if ( ! empty( $apv_image_content_cta_alt_heading ) ) :
								?>
								<h2 class="mil-up mil-mb-30"><?php echo esc_html( $apv_image_content_cta_alt_heading ); ?></h2>
								<?php
							endif;
							?>

							<div class="row justify-content-center">
								<div class="col-xl-8">

									<div class="mil-text-center">
										<?php
										if ( ! empty( $apv_image_content_cta_alt_body_content ) ) :
											$apv_image_content_cta_alt_body_formatted_content = APVPortfolioUtilities::get_formatted_paragraphs( $apv_image_content_cta_alt_body_content, 'mil-mb-30' );
											echo wp_kses_post( $apv_image_content_cta_alt_body_formatted_content );
										endif;
										?>

										<?php
										if ( ! empty( $apv_image_content_cta_alt_url ) ) :
											?>
											<div class="mil-buttons-frame justify-content-center">
												<a 
													href="<?php echo esc_url( $apv_image_content_cta_alt_url ); ?>" 
													class="mil-button"
													target="<?php echo esc_attr( $apv_image_content_cta_alt_target ); ?>"
													<?php echo $apv_image_content_cta_alt_download_file ? esc_html( 'download' ) : ''; ?>
												>
													<?php echo esc_html( $apv_image_content_cta_alt_title ); ?>
												</a>
											</div>
											<?php
										endif;
										?>
									</div>

								</div>
							</div>
						</div>

					</div>

				</div>

			</div>
		</div>
	</div>
</section>
