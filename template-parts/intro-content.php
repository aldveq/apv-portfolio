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
$intro_content_overline = $args['overline'];
$intro_content_heading  = $args['heading'];
$intro_content          = $args['content'];
?>

<div class="container">
	<div class="mil-top-banner">
		<?php
		if ( ! empty( $intro_content_overline ) ) :
			?>
			<p class="mil-upper mil-mb-30">
			<?php
				echo wp_kses(
					APVPortfolioUtilities::highlight_text_with_accent_color( $intro_content_overline ),
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
		if ( ! empty( $intro_content_heading ) ) :
			?>
			<h2 class="mil-up mil-mb-30"><?php echo esc_html( $intro_content_heading ); ?></h2>
			<?php
		endif;
		?>

		<?php
		if ( ! empty( $intro_content ) ) :
			$intro_content_formatted = APVPortfolioUtilities::get_formatted_paragraphs(
				$intro_content,
				'mil-left-offset'
			);
			echo wp_kses_post( $intro_content_formatted );
		endif;
		?>
	</div>
</div>
