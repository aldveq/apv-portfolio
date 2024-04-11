<?php
/**
 * Block Hero Template
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
$apv_hero_image            = $args['hero_data']['apv_hero_image'];
$apv_hero_overline         = $args['hero_data']['apv_hero_overline'];
$apv_hero_heading          = $args['hero_data']['apv_hero_heading'];
$apv_hero_body_content     = $args['hero_data']['apv_hero_body_content'];
$apv_hero_ctas             = $args['hero_data']['apv_hero_ctas'];
$block_attributes          = $args['block_attributes'];
$block_classname_attribute = is_array( $block_attributes ) && array_key_exists( 'className', $block_attributes ) ? $block_attributes['className'] : '';
?>

<div class="mil-section mil-banner mil-banner-right <?php echo esc_attr( $block_classname_attribute ); ?>">
	<div class="container-full">
		<div class="row no-gutters align-items-center justify-content-between">
			<div class="col-xl-7">
				<div class="mil-p-120-120">
					<div class="mil-banner-text" data-swiper-parallax-y="-600" data-swiper-parallax-duration="600">
						<div class="mil-bg-title-boxed" style="top: 0; left: -82%;"></div>
						<?php
						if ( ! empty( $apv_hero_overline ) ) :
							?>
								<p class="mil-upper mil-mb-30">
									<?php
										echo wp_kses(
											APVPortfolioUtilities::highlight_text_with_accent_color( $apv_hero_overline ),
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
						if ( ! empty( $apv_hero_heading ) ) :
							?>
								<h1 class="mil-up mil-mb-40"><?php echo esc_html( $apv_hero_heading ); ?></h1>
							<?php
						endif;
						?>
						<div class="mil-short mil-left-offset">
							<?php
							if ( ! empty( $apv_hero_body_content ) ) :
								echo wp_kses_post( wpautop( $apv_hero_body_content, true ) );
							endif;
							?>
							<?php
							if ( is_array( $apv_hero_ctas ) && count( $apv_hero_ctas ) > 0 ) :
								?>
								<div class="mil-buttons-frame">
									<?php
									foreach ( $apv_hero_ctas as $h_cta_data ) :
										?>
											<a 
												href="<?php echo esc_url( $h_cta_data['url'] ); ?>"
												class="mil-button <?php echo $h_cta_data['secondary_style'] ? esc_attr( 'mil-type-2' ) : ''; ?>"
												target="<?php echo $h_cta_data['target'] ? esc_attr( '_blank' ) : esc_attr( '_self' ); ?>"
											>
												<?php echo esc_html( $h_cta_data['title'] ); ?>
											</a>
										<?php
										endforeach;
									?>
								</div>
								<?php
							endif;
							?>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-5">
				<?php
				if ( ! empty( $apv_hero_image ) ) :
					echo wp_get_attachment_image(
						$apv_hero_image,
						'hero-image-size',
						false,
						array(
							'class' => 'mil-banner-image',
							'load'  => 'lazy',
						)
					);
				endif;
				?>
			</div>
		</div>
	</div>
</div>
