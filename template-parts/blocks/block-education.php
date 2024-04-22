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
$block_attributes           = $args['block_attributes'];
$block_classname_attribute  = is_array( $block_attributes ) && array_key_exists( 'className', $block_attributes ) ? $block_attributes['className'] : '';
$block_name                 = is_array( $block_attributes ) && array_key_exists( 'metadata', $block_attributes ) ? $block_attributes['metadata']['name'] : '';
?>
<section 
	class="section-education mil-section mil-op-space-90 <?php echo esc_attr( $block_classname_attribute ); ?>"
	data-name="<?php echo esc_attr( $block_name ); ?>"
>

	<div class="mil-bg-item" style="bottom: 0%; left: 25%; transform: rotate(-25deg)"></div>

	<div class="container">
		<div class="row justify-content-between">
			<div class="col-xl-5 mil-mb-60">

				<div class="mil-text-right-adapt">
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

			</div>
			<div class="col-xl-6">
				<?php
				if ( is_array( $apv_education_data ) && count( $apv_education_data ) > 0 ) :
					foreach ( $apv_education_data as $e_data_key => $e_data_value ) :
						?>
						<div class="mil-icon-box <?php echo ( count( $apv_education_data ) - 1 ) !== $e_data_key ? esc_attr( 'mil-mb-40' ) : ''; ?>">
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
						<?php
					endforeach;
				endif;
				?>
			</div>
		</div>
	</div>
</section>
