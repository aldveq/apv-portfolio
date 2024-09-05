<?php
/**
 * Block Contact Form Info Template
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
$apv_contact_overline       = $args['data']['apv_contact_overline'];
$apv_contact_heading        = $args['data']['apv_contact_heading'];
$apv_contact_body_content   = $args['data']['apv_contact_body_content'];
$apv_contact_info           = $args['data']['apv_contact_info'];
$apv_contact_form_shortcode = $args['data']['apv_contact_form_shortcode'];
$apv_contact_block_id       = ! empty( $args['data']['apv_contact_block_id'] ) ? $args['data']['apv_contact_block_id'] : '';
$block_attributes           = $args['block_attributes'];
$block_classname_attribute  = is_array( $block_attributes ) && array_key_exists( 'className', $block_attributes ) ? $block_attributes['className'] : '';
?>
<section 
	class="section-contact mil-section mil-op-space-90 <?php echo esc_attr( $block_classname_attribute ); ?>"
	data-name="<?php echo esc_attr( $apv_contact_block_id ); ?>"
>

	<div class="mil-bg-item" style="bottom: -5%; right: 0; transform: rotate(-25deg)"></div>

	<div class="container">
		<?php
		if ( ! empty( $apv_contact_overline ) ) :
			?>
			<p class="mil-upper mil-mb-30">
			<?php
				echo wp_kses(
					APVPortfolioUtilities::highlight_text_with_accent_color( $apv_contact_overline ),
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
		if ( ! empty( $apv_contact_heading ) ) :
			?>
			<h2 class="mil-up mil-mb-30"><?php echo esc_html( $apv_contact_heading ); ?></h2>
			<?php
		endif;
		?>
		<?php
		if ( ! empty( $apv_contact_body_content ) ) :
			$apv_contact_body_formatted_content = APVPortfolioUtilities::get_formatted_paragraphs( $apv_contact_body_content, 'mil-left-offset mil-mb-60' );
			echo wp_kses_post( $apv_contact_body_formatted_content );
		endif;
		?>

		<div class="row justify-content-between">
			<div class="col-lg-4">
				<?php
				if ( is_array( $apv_contact_info ) && count( $apv_contact_info ) > 0 ) :
					foreach ( $apv_contact_info as $single_contact_info ) :
						switch ( $single_contact_info['contact_info'] ) :
							case 'emails':
								$emails_contact_info = carbon_get_theme_option( 'apv_emails_data' );
								if ( is_array( $emails_contact_info ) && count( $emails_contact_info ) > 0 ) :
									?>
									<div class="mil-contact-card mil-mb-30">
										<p class="mil-upper mil-mb-30">Email</p>
										<p>
											<?php
											foreach ( $emails_contact_info as $se_contact_info ) :
												?>
												<a href="mailto:<?php echo esc_attr( $se_contact_info['apv_primary_email'] ); ?>">
													<?php echo esc_html( $se_contact_info['apv_primary_email_label'] ); ?>
												</a>
												<br>
												<?php
											endforeach;
											?>
										</p>
									</div>
									<?php
								endif;
								break;
							case 'phones':
								$phones_contact_info = carbon_get_theme_option( 'apv_phones_data' );
								if ( is_array( $phones_contact_info ) && count( $phones_contact_info ) > 0 ) :
									?>
									<div class="mil-contact-card mil-mb-30">
										<p class="mil-upper mil-mb-30">Phone</p>
										<p>
											<?php
											foreach ( $phones_contact_info as $sp_contact_info ) :
												?>
												<a href="tel:<?php echo esc_attr( $sp_contact_info['apv_primary_phone'] ); ?>">
													<?php echo esc_html( $sp_contact_info['apv_primary_phone_label'] ); ?>
												</a>
												<br>
												<?php
											endforeach;
											?>
										</p>
									</div>
									<?php
								endif;
								break;
							default:
								$address_contact_info = carbon_get_theme_option( 'apv_label_address' );
								if ( ! empty( $address_contact_info ) ) :
									?>
									<div class="mil-contact-card mil-mb-30">
										<p class="mil-upper mil-mb-30">Address</p>
										<?php
											echo wp_kses_post( wpautop( $address_contact_info, true ) );
										?>
									</div>
									<?php
								endif;
								break;
						endswitch;
					endforeach;
				endif;
				?>
			</div>
			<div class="col-lg-7">
				<?php
				if ( ! empty( $apv_contact_form_shortcode ) ) :
					echo do_shortcode( $apv_contact_form_shortcode );
				endif;
				?>
			</div>
		</div>
	</div>
</section>
