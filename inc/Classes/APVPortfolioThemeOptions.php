<?php
/**
 * Class APV Portfolio Theme Options
 *
 * PHP version 8
 *
 * @category Themes
 * @package  APV_Portfolio
 * @author   Aldo Paz Velasquez <aldveq80@gmail.com>
 * @license  GPL-2.0-or-later http://www.gnu.org/licenses/gpl-2.0.txt
 * @link     https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

namespace APVPortfolio\Classes;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

if ( ! class_exists( 'APVPortfolioThemeOptions' ) ) :
	/**
	 * Class APV Portfolio Theme Options
	 *
	 * @category Themes
	 * @package  APV_Portfolio
	 * @author   Aldo Paz Velasquez <aldveq80@gmail.com>
	 * @license  GPL-2.0-or-later https://www.gnu.org/licenses/gpl-2.0.txt
	 * @link     https://developer.wordpress.org/plugins/plugin-basics/
	 * @see      APV Portfolio Singleton
	 */
	class APVPortfolioThemeOptions extends APVPortfolioSingleton {


		/**
		 *  APV Portfolio Theme Options Construct function
		 */
		protected function __construct() {
			add_action( 'carbon_fields_register_fields', array( $this, 'apv_portfolio_attach_theme_options' ) );
		}

		/**
		 * Theme Options Settings
		 *
		 * @return void
		 */
		public function apv_portfolio_attach_theme_options() {
			// Main Theme Options Settings.
			Container::make( 'theme_options', __( 'Theme Options', 'apv-portfolio' ) )
				->add_tab(
					__( 'Styles', 'apv-portfolio' ),
					array(
						Field::make( 'separator', 'separator_global_colors', __( 'Global Colors', 'apv-portfolio' ) ),
						Field::make( 'color', 'apv_accent_color', __( 'Accent', 'apv-portfolio' ) )
							->set_palette( array( '#fa4729' ) )
							->set_default_value( '#fa4729' )
							->set_width( 25 ),
						Field::make( 'color', 'apv_accent_light_color', __( 'Accent Light', 'apv-portfolio' ) )
							->set_palette( array( '#fa4729' ) )
							->set_default_value( '#fa4729' )
							->set_width( 25 )
							->help_text( __( 'This color will be applied with a 18% percentage of opacity.', 'apv-portfolio' ) ),
						Field::make( 'color', 'apv_light_color', __( 'Light', 'apv-portfolio' ) )
							->set_palette( array( '#ffffff' ) )
							->set_default_value( '#ffffff' )
							->set_width( 25 ),
						Field::make( 'color', 'apv_soft_color', __( 'Soft', 'apv-portfolio' ) )
							->set_palette( array( '#101010' ) )
							->set_default_value( '#101010' )
							->set_width( 25 )
							->help_text( __( 'This color will be applied with a 18% percentage of opacity.', 'apv-portfolio' ) ),
						Field::make( 'color', 'apv_gray_color', __( 'Gray', 'apv-portfolio' ) )
							->set_palette( array( '#202020' ) )
							->set_default_value( '#202020' )
							->set_width( 25 ),
						Field::make( 'color', 'apv_dark_color', __( 'Dark', 'apv-portfolio' ) )
							->set_palette( array( '#101010' ) )
							->set_default_value( '#101010' )
							->set_width( 25 ),
						Field::make( 'color', 'apv_black_color', __( 'Black', 'apv-portfolio' ) )
							->set_palette( array( '#010101' ) )
							->set_default_value( '#010101' )
							->set_width( 25 ),
						Field::make( 'hidden', 'apv_hidden_data', '' )
							->set_width( 25 ),
					)
				)
				->add_tab(
					__( 'Contact Information', 'apv-portfolio' ),
					array(
						Field::make( 'separator', 'separator_emails', __( 'Emails', 'apv-portfolio' ) ),
						Field::make( 'text', 'apv_primary_email_label', __( 'Primary Email Label', 'apv-portfolio' ) )
							->set_width( 50 ),
						Field::make( 'text', 'apv_primary_email', __( 'Primary Email', 'apv-portfolio' ) )
							->set_width( 50 ),
						Field::make( 'separator', 'separator_phones', __( 'Phones', 'apv-portfolio' ) ),
						Field::make( 'text', 'apv_primary_phone_label', __( 'Primary Phone Label', 'apv-portfolio' ) )
							->set_width( 50 ),
						Field::make( 'text', 'apv_primary_phone', __( 'Primary Phone', 'apv-portfolio' ) )
							->set_width( 50 ),
						Field::make( 'separator', 'separator_address', __( 'Address', 'apv-portfolio' ) ),
						Field::make( 'text', 'apv_label_address', __( 'Address', 'apv-portfolio' ) )
							->set_width( 50 ),
						Field::make( 'text', 'apv_address_link', __( 'Address URL', 'apv-portfolio' ) )
							->set_width( 50 )
							->help_text( __( 'Optional', 'apv-portfolio' ) ),
					)
				)
				->add_tab(
					__( 'Socials', 'apv-portfolio' ),
					array(
						Field::make( 'complex', 'socials_data', __( 'Socials', 'apv-portfolio' ) )
							->setup_labels(
								array(
									'singular_name' => __( 'Social', 'apv-portfolio' ),
									'plural_name'   => __( 'Socials', 'apv-portfolio' ),
								)
							)
							->set_layout( 'tabbed-vertical' )
							->set_max( 5 )
							->add_fields(
								array(
									Field::make( 'icon', 'social_icon', __( 'Icon', 'apv-portfolio' ) )
										->set_width( 50 )
										->add_fontawesome_options(),
									Field::make( 'text', 'social_url', __( 'URL', 'apv-portfolio' ) )
										->set_width( 50 ),
								)
							),
					)
				);
		}
	}
endif;
