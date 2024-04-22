<?php
/**
 * Block Image Content Cta Template
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
$apv_image_content_cta_image         = $args['data']['apv_image_content_cta_image'];
$apv_image_content_cta_overline      = $args['data']['apv_image_content_cta_overline'];
$apv_image_content_cta_heading       = $args['data']['apv_image_content_cta_heading'];
$apv_image_content_cta_body_content  = $args['data']['apv_image_content_cta_body_content'];
$apv_image_content_cta_title         = $args['data']['apv_image_content_cta_title'];
$apv_image_content_cta_url           = $args['data']['apv_image_content_cta_url'];
$apv_image_content_cta_target        = $args['data']['apv_image_content_cta_target'];
$apv_image_content_cta_download_file = $args['data']['apv_image_content_cta_download_file'];
$block_attributes                    = $args['block_attributes'];
$block_classname_attribute           = is_array( $block_attributes ) && array_key_exists( 'className', $block_attributes ) ? $block_attributes['className'] : '';
$block_name                          = is_array( $block_attributes ) && array_key_exists( 'metadata', $block_attributes ) ? $block_attributes['metadata']['name'] : '';
?>
<section 
	class="mil-section mil-op-space-90 <?php echo esc_attr( $block_classname_attribute ); ?>"
	data-name="<?php echo esc_attr( $block_name ); ?>"
>
	<div class="mil-bg-item mil-bg-item-large" style="top: -25%; right: 15%; transform: rotate(-35deg)"></div>

	<div class="container">
		<div class="row justify-content-between align-items-center">
			<div class="col-xl-4">
				<?php
				if ( ! empty( $apv_image_content_cta_image ) ) :
					?>
					<div class="mil-about-person mil-mb-30">
					<?php
						echo wp_get_attachment_image(
							$apv_image_content_cta_image,
							'image-content-cta-size',
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
			</div>

			<div class="col-xl-7">
				<div class="row">
					<div class="col-xl-12">
						<?php
						if ( ! empty( $apv_image_content_cta_overline ) ) :
							?>
							<p class="mil-upper mil-mb-30">
								<?php
									echo wp_kses(
										APVPortfolioUtilities::highlight_text_with_accent_color( $apv_image_content_cta_overline ),
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
						if ( ! empty( $apv_image_content_cta_heading ) ) :
							?>
							<h2 class="mil-up mil-mb-60"><?php echo esc_html( $apv_image_content_cta_heading ); ?></h2>
							<?php
						endif;
						?>
						<?php
						if ( ! empty( $apv_image_content_cta_body_content ) ) :
							echo wp_kses_post( wpautop( $apv_image_content_cta_body_content, true ) );
						endif;
						?>

						<?php
						if ( ! empty( $apv_image_content_cta_url ) ) :
							?>
							<div class="mil-buttons-frame">
								<a 
									href="<?php echo esc_url( $apv_image_content_cta_url ); ?>" 
									class="mil-button"
									target="<?php echo esc_attr( $apv_image_content_cta_target ); ?>"
									<?php echo $apv_image_content_cta_download_file ? esc_html( 'download' ) : ''; ?>
								>
									<?php echo esc_html( $apv_image_content_cta_title ); ?>
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

</section>
