<?php
/**
 * Block Skills Template
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
$apv_skills_overline       = $args['data']['apv_skills_overline'];
$apv_skills_heading        = $args['data']['apv_skills_heading'];
$apv_skills_data           = $args['data']['apv_skills_data'];
$apv_skills_block_id       = ! empty( $args['data']['apv_skills_block_id'] ) ? $args['data']['apv_skills_block_id'] : '';
$block_attributes          = $args['block_attributes'];
$block_classname_attribute = is_array( $block_attributes ) && array_key_exists( 'className', $block_attributes ) ? $block_attributes['className'] : '';
?>

<section 
	class="mil-section mil-op-space-90 <?php echo esc_attr( $block_classname_attribute ); ?>"
	data-name="<?php echo esc_attr( $apv_skills_block_id ); ?>"
>
	<div class="mil-bg-item" style="bottom: 15%; left: 7%;"></div>
	<div class="mil-bg-item mil-bg-item-large" style="top: -15%; right: 25%; transform: rotate(-35deg)"></div>

	<div class="container">
		<div>
			<?php
			if ( ! empty( $apv_skills_overline ) ) :
				?>
				<p class="mil-upper mil-mb-30">
				<?php
					echo wp_kses(
						APVPortfolioUtilities::highlight_text_with_accent_color( $apv_skills_overline ),
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
			if ( ! empty( $apv_skills_heading ) ) :
				?>
				<h2 class="mil-up mil-mb-60"><?php echo esc_html( $apv_skills_heading ); ?></h2>
				<?php
			endif;
			?>
		</div>
		<div class="row">
			<div class="col-xl-2"></div>
			<div class="col-xl-10">

				<?php
				if ( is_array( $apv_skills_data ) && count( $apv_skills_data ) > 0 ) :
					?>
					<div class="row">
						<?php
						foreach ( $apv_skills_data as $skill_key => $skill_data ) :
							?>
							<div class="col-xl-6 <?php echo ( count( $apv_skills_data ) - 1 ) !== $skill_key ? 'mil-mb-40' : ''; ?>">

								<div class="mil-text-row">
									<div class="mil-icon-box">
										<div class="mil-text-icon no-textured">
											<i class="fab fa-<?php echo esc_attr( $skill_data['skill_icon']['icon'] ); ?>"></i>
										</div>
									</div>
									<div class="mil-progress-inline">
										<span class="mil-upper"><?php echo esc_html( $skill_data['text'] ); ?></span>
										<div class="mil-progress-track">
											<div class="mil-progress" style="width: <?php echo esc_attr( $skill_data['percentage'] ); ?>%">
												<span class="mil-upper mil-upper-sm mil-accent"><?php echo esc_html( $skill_data['percentage'] ); ?>%</span>
											</div>
										</div>
									</div>
								</div>

							</div>
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
</section>
