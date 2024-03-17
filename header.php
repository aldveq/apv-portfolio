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
					$header_brand_logo_id = get_theme_mod( 'custom_logo' );

				if ( ! empty( $header_brand_logo_id ) ) :
					?>
					<a href="index.html" class="mil-logo">
					<?php
						echo wp_get_attachment_image(
							$header_brand_logo_id,
							'brand-size',
							false,
							null
						);
					?>
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

			<div class="mil-social">
				<ul>
					<li>
						<a href="https://facebook.com" target="_blank" class="social-icon">
							<i class="fab fa-facebook"></i>
						</a>
					</li>
					<li>
						<a href="https://instagram.com" target="_blank" class="social-icon">
							<i class="fab fa-instagram"></i>
						</a>
					</li>
					<li>
						<a href="https://linkedin.com" target="_blank" class="social-icon">
							<i class="fab fa-linkedin-in"></i>
						</a>
					</li>
					<li>
						<a href="https://youtube.com" target="_blank" class="social-icon">
							<i class="fab fa-youtube"></i>
						</a>
					</li>
				</ul>
			</div>
		</header>
		<!-- top panel end -->

		<!-- footer -->
		<div class="mil-footer">
			<p class="mil-upper mil-upper-sm">© 2024 <span class="mil-accent">Treto.</span> All rights reserved.</p>
		</div>
		<!-- footer end -->

	</div>
	<!-- frame end -->
