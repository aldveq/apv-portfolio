<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package APV_Portfolio
 */

// Variables & Classes Imports.
use APVPortfolio\Classes\APVPortfolioUtilities;

$apv_header_brand_text     = carbon_get_theme_option( 'apv_header_brand_text' );
$apv_footer_copyright_text = carbon_get_theme_option( 'apv_footer_copyright_text' );
$apv_socials_data          = carbon_get_theme_option( 'socials_data' );
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class( 'mil-custom-scroll' ); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'apv-portfolio' ); ?></a>

	<!-- frame -->
	<div class="mil-frame">

		<!-- top panel -->
		<header class="mil-top-panel mil-tp-2">
			<div class="mil-tp-frame">
				<?php
				if ( ! empty( $apv_header_brand_text ) ) :
					?>
					<a href="<?php echo esc_url( home_url() ); ?>" class="mil-logo">
						<span><?php echo esc_html( $apv_header_brand_text ); ?></span>
					</a>
					<?php
				endif;
				?>

				<?php
					$primary_menu_items = APVPortfolioUtilities::get_menu_items_by_location( 'primary-menu' );

				if ( is_array( $primary_menu_items ) && count( $primary_menu_items ) > 0 ) :
					?>
					<nav>
						<ul>
						<?php
						foreach ( $primary_menu_items as $primary_nav_item ) :
							?>
								<li class="<?php echo $primary_nav_item['is_active'] ? esc_attr( 'mil-active' ) : ''; ?>">
									<a href="<?php echo esc_url( $primary_nav_item['url'] ); ?>" target="_self"><?php echo esc_html( $primary_nav_item['title'] ); ?></a>
								</li>
							<?php
								endforeach;
						?>
						</ul>
					</nav>
					<?php
					endif;
				?>
				<div class="mil-menu-btn">
					<span></span>
				</div>
			</div>

			<?php
			if ( is_array( $apv_socials_data ) && count( $apv_socials_data ) > 0 ) :
				?>
				<div class="mil-social">
					<ul>
						<?php
						foreach ( $apv_socials_data as $social ) :
							?>
							<li>
								<a 
									href="<?php echo esc_url( $social['social_url'] ); ?>"
									target="_blank" 
									class="social-icon"
								>
									<i class="<?php echo esc_attr( $social['social_icon']['class'] ); ?>"></i>
								</a>
							</li>
							<?php
						endforeach;
						?>
					</ul>
				</div>
				<?php
				endif;
			?>
		</header>
		<!-- top panel end -->

		<!-- footer -->
		<?php
		if ( ! empty( $apv_footer_copyright_text ) ) :
			?>
			<div class="mil-footer">
				<p class="mil-upper mil-upper-sm">
					<?php
						echo wp_kses(
							do_shortcode(
								APVPortfolioUtilities::highlight_text_with_accent_color( $apv_footer_copyright_text )
							),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						);
					?>
				</p>
			</div>
			<?php
		endif;
		?>
		<!-- footer end -->

	</div>
	<!-- frame end -->
