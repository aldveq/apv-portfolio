<?php
/**
 * Class APV Portfolio Carbon Fields Setup
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

if ( ! class_exists( 'APVPortfolioCBFSetup' ) ) :
	/**
	 * Class APV Portfolio Carbon Fields Setup
	 *
	 * @category Themes
	 * @package  APV_Portfolio
	 * @author   Aldo Paz Velasquez <aldveq80@gmail.com>
	 * @license  GPL-2.0-or-later https://www.gnu.org/licenses/gpl-2.0.txt
	 * @link     https://developer.wordpress.org/plugins/plugin-basics/
	 * @see      APV Portfolio Singleton
	 */
	class APVPortfolioCBFSetup extends APVPortfolioSingleton {

		/**
		 *  APV Portfolio CBF Setup Construct function
		 */
		protected function __construct() {
			add_action( 'after_setup_theme', array( $this, 'apv_portfolio_load_cbf_library' ) );
		}

		/**
		 * Loading Carbon Fields Library
		 *
		 * @return void
		 */
		public function apv_portfolio_load_cbf_library() {
			\Carbon_Fields\Carbon_Fields::boot();
		}
	}
endif;
