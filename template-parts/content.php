<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package APV_Portfolio
 */

use APVPortfolio\Classes\APVPortfolioUtilities;

// Variables.
$single_post_tax_data                  = get_the_category();
$single_post_tax_data_formatted_string = APVPortfolioUtilities::get_taxonomies_data( $single_post_tax_data );
?>

<div>
	<div class="mil-page">
		<div class="mil-publication">
			
			<div class="mil-bg-item" style="bottom: -2%; left: 5%;"></div>

			<div class="container">

				<div class="row justify-content-between">
					<div class="col-lg-5">

						<?php
						if ( ! empty( $single_post_tax_data_formatted_string ) ) :
							?>
							<p class="mil-upper mil-mb-30 mil-publication__tax-data">
							<?php
								echo wp_kses_post( $single_post_tax_data_formatted_string );
							?>
							</p>
							<?php
						endif;
						?>
						<h2 class="mil-up mil-mb-60"><?php echo esc_html( get_the_title( get_the_ID() ) ); ?></h2>
						<div class="mil-post-cover mil-mb-60">
							<?php
								echo wp_get_attachment_image(
									get_post_thumbnail_id( get_the_ID() ),
									'blog_post_featured_image',
									false,
									array( 'loading' => 'lazy' )
								);
								?>
						</div>
					</div>
					<div class="col-lg-6">

						<div class="mil-mb-90 mil-publication__content-wrapper">
							<?php
								echo wp_kses_post( wpautop( get_the_content( get_the_ID() ), true ) );
							?>
						</div>

					</div>
				</div>

				<div class="mil-pagination-panel mil-publication__pagination-panel">
					<?php
					the_post_navigation(
						array(
							'next_text' => '<div class="mil-button mil-mb-30">Next Post</div>',
							'prev_text' => '<div class="mil-button mil-type-2 mil-mb-30">Previous Post</div>',
						)
					);
					?>
				</div>
			</div>
		</div>
	</div>
</div>
