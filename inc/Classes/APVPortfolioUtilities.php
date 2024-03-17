<?php
/**
 * Class APV Portfolio Utilities
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

if ( ! class_exists( 'APVPortfolioUtilities' ) ) :
	/**
	 * Class APV Portfolio Utilities
	 *
	 * @category Themes
	 * @package  APV_Portfolio
	 * @author   Aldo Paz Velasquez <aldveq80@gmail.com>
	 * @license  GPL-2.0-or-later https://www.gnu.org/licenses/gpl-2.0.txt
	 * @link     https://developer.wordpress.org/plugins/plugin-basics/
	 * @see      APV Portfolio Singleton
	 */
	class APVPortfolioUtilities extends APVPortfolioSingleton {

		/**
		 * Get Menu Id by Location
		 *
		 * @param string $menu_location Menu Location.
		 *
		 * @return string Menu Id
		 */
		private static function get_menu_id_by_location( $menu_location ) {
			$locations = get_nav_menu_locations();
			$menu_id   = $locations[ $menu_location ];
			return $menu_id;
		}

		/**
		 * Get Menu Items by Location
		 *
		 * @param string $menu_location Menu Location.
		 *
		 * @return array Menu Items by Location
		 */
		public static function get_menu_items_by_location( $menu_location ) {
			global $post;
			$global_slug         = $post->post_name;
			$formatted_nav_items = array();
			$navigation_id       = self::get_menu_id_by_location( $menu_location );
			$navigation_items    = wp_get_nav_menu_items( $navigation_id );

			foreach ( $navigation_items as $nav_item ) :
				array_push(
					$formatted_nav_items,
					array(
						'title'     => $nav_item->title,
						'url'       => $nav_item->url,
						'is_active' => sanitize_title( $nav_item->title ) === $global_slug ? true : false,
					)
				);
			endforeach;

			return $formatted_nav_items;
		}
	}
endif;
