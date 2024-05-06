<?php

/**
 * Template part for displaying the intro content of the project archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package APV_Portfolio
 */

use APVPortfolio\Classes\APVPortfolioUtilities;

// Variables.
$apv_project_archive_overline = carbon_get_theme_option( 'apv_project_archive_overline' );
$apv_project_archive_heading  = carbon_get_theme_option( 'apv_project_archive_heading' );
$apv_project_archive_content  = carbon_get_theme_option( 'apv_project_archive_content' );
?>

<div class="container">
	<div class="mil-top-banner">
		<?php
		if ( ! empty( $apv_project_archive_overline ) ) :
			?>
			<p class="mil-upper mil-mb-30">
			<?php
				echo wp_kses(
					APVPortfolioUtilities::highlight_text_with_accent_color( $apv_project_archive_overline ),
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
		if ( ! empty( $apv_project_archive_heading ) ) :
			?>
			<h2 class="mil-up mil-mb-30"><?php echo esc_html( $apv_project_archive_heading ); ?></h2>
			<?php
		endif;
		?>

		<?php
		if ( ! empty( $apv_project_archive_content ) ) :
			$apv_project_archive_content_formatted = APVPortfolioUtilities::get_formatted_paragraphs(
				$apv_project_archive_content,
				'mil-left-offset'
			);
			echo wp_kses_post( $apv_project_archive_content_formatted );
		endif;
		?>
	</div>
</div>
