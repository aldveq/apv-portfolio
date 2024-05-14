<?php
/**
 * Template part for displaying a blog card item
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package APV_Portfolio
 */

use APVPortfolio\Classes\APVPortfolioUtilities;

// Variables.
$blog_card_category                    = get_the_category( get_the_ID() );
$blog_card_categories_formatted_string = APVPortfolioUtilities::get_taxonomies_data( $blog_card_category );
?>
<div class="mil-blog-card mil-mb-60">
	<div class="mil-cover">
		<a href="<?php echo esc_url( get_the_permalink( get_the_ID() ) ); ?>" target="_self">
			<?php
				echo wp_get_attachment_image(
					get_post_thumbnail_id( get_the_ID() ),
					'blog_post_featured_image',
					false,
					array( 'loading' => 'lazy' )
				);
				?>
		</a>
		<div class="mil-date mil-upper">
			<?php echo esc_html( get_the_time( 'F j - Y', get_the_ID() ) ); ?>
		</div>
	</div>
	<div class="mil-title">
		<div>
			<p class="mil-upper mil-mb-30">
				<span class="mil-accent">
					<?php echo wp_kses_post( $blog_card_categories_formatted_string ); ?>
				</span>
			</p>
			<h3 class="mil-up mil-mb-30"><?php echo esc_html( get_the_title( get_the_ID() ) ); ?></h3>
		</div>
		<div>
			<a href="<?php echo esc_url( get_the_permalink( get_the_ID() ) ); ?>" target="_self" class="mil-button mil-type-2">Read more</a>
		</div>
	</div>
	<div class="mil-card-text">
	<?php
	if ( has_excerpt( get_the_ID() ) ) :
		?>
				<p><?php echo esc_html( get_the_excerpt( get_the_ID() ) ); ?></p>
			<?php
		else :
			?>
				<p>
					<?php
						echo wp_kses_post( wpautop( wp_trim_words( get_the_content( get_the_ID() ), 44 ), true ) );
					?>
				</p>
			<?php
		endif;
		?>
	</div>
</div>
