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
		 *  APV Portfolio Utilities Construct function
		 */
		protected function __construct() {
			add_action( 'init', array( $this, 'apv_setup_shortcode_current_year' ) );
		}

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
			$formatted_nav_items = array();
			$navigation_id       = self::get_menu_id_by_location( $menu_location );
			$navigation_items    = wp_get_nav_menu_items( $navigation_id );
			$nav_item_active     = false;
			$nav_current_item    = '';

			if ( is_page() ) : // All pages.
				global $post;
				$nav_current_item = sanitize_title( $post->post_name );
			endif;

			if ( is_archive( 'projects' ) ) : // Projects Archive.
				$nav_current_item = sanitize_title( get_queried_object()->name );
			endif;

			if ( is_singular( 'projects' ) ) :
				global $post;
				$nav_current_item = sanitize_title( $post->post_type );
			endif;

			if ( is_tax( 'projects-category' ) ) : // Current Project Taxonomy.
				$post_id   = get_the_ID(); // Get current post ID.
				$post_type = get_post_type( $post_id ); // Get the post type of the current post.

				if ( ! empty( $post_type ) ) :
					$nav_current_item = $post_type;
				endif;

			endif;

			if ( is_home() ) : // Blog posts page.
				$nav_current_item = sanitize_title( get_queried_object()->post_name );
			endif;

			if ( is_category() ) :
				$nav_current_item = 'blog';
			endif;

			foreach ( $navigation_items as $nav_item ) :
				$nav_item_active = sanitize_title( $nav_item->title ) === $nav_current_item ? true : false;

				array_push(
					$formatted_nav_items,
					array(
						'title'     => $nav_item->title,
						'url'       => $nav_item->url,
						'is_active' => $nav_item_active,
					)
				);
			endforeach;

			return $formatted_nav_items;
		}

		/**
		 * Rgb to Hex | Hex to Rgb Function
		 *
		 * @param string $color Color.
		 * @return string $result Color result.
		 */
		public static function rgb2hex2rgb( $color ) {
			if ( empty( $color ) ) {
				return false;
			}
			$color  = trim( $color );
			$result = false;

			if ( preg_match( '/^[0-9ABCDEFabcdef\#]+$/i', $color ) ) {
				$hex = str_replace( '#', '', $color );
				if ( ! $hex ) {
					return false;
				}
				$result = array();

				if ( strlen( $hex ) === 3 ) :
					$result['r'] = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
					$result['g'] = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
					$result['b'] = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
				else :
					$result['r'] = hexdec( substr( $hex, 0, 2 ) );
					$result['g'] = hexdec( substr( $hex, 2, 2 ) );
					$result['b'] = hexdec( substr( $hex, 4, 2 ) );
				endif;

				return $result['r'] . ',' . $result['g'] . ',' . $result['b'];

			} elseif ( preg_match( '/^[0-9]+(,| |.)+[0-9]+(,| |.)+[0-9]+$/i', $color ) ) {

				$rgbstr  = str_replace( array( ',', ' ', '.' ), ':', $color );
				$rgbarr  = explode( ':', $rgbstr );
				$result  = '#';
				$result .= str_pad( dechex( $rgbarr[0] ), 2, '0', STR_PAD_LEFT );
				$result .= str_pad( dechex( $rgbarr[1] ), 2, '0', STR_PAD_LEFT );
				$result .= str_pad( dechex( $rgbarr[2] ), 2, '0', STR_PAD_LEFT );
				$result  = strtoupper( $result );

			} else {
				$result = false;
			}

			return $result;
		}

		/**
		 * Setup Shortcode for Current Year
		 *
		 * @return void
		 */
		public function apv_setup_shortcode_current_year() {
			add_shortcode( 'year', array( $this, 'shortcode_get_current_year' ) );
		}

		/**
		 * Current year shortcode
		 *
		 * @return string Year
		 */
		public static function shortcode_get_current_year() {
			return current_time( 'Y' );
		}

		/**
		 * Highlight Text With Primary Color
		 *
		 * @param string $text Text.
		 *
		 * @return string
		 */
		public static function highlight_text_with_accent_color( $text ) {
			return preg_replace(
				'~__\*(.*?)\*__~s',
				'<span class="mil-accent">$1</span>',
				$text
			);
		}

		/**
		 * Formatted Paragraphs
		 *
		 * @param string $content Paragraphs content.
		 * @param string $classnames CSS classnames.
		 * @return string
		 */
		public static function get_formatted_paragraphs( $content, $classnames ) {
			$formatted_content            = wpautop( $content );
			$formatted_content_with_class = str_replace( '<p>', '<p class="' . $classnames . '">', $formatted_content );
			return $formatted_content_with_class;
		}

		/**
		 * Getting Taxonomies Data
		 *
		 * @param array $taxonomy_array Taxonomy array.
		 * @return string $formatted_tax_array Formatted taxonomies.
		 */
		public static function get_taxonomies_data( $taxonomy_array ) {
			if ( ! is_array( $taxonomy_array ) && count( $taxonomy_array ) === 0 ) :
				return;
			endif;

			$formatted_tax_array = array();

			foreach ( $taxonomy_array as $tax_data ) {
				$formatted_tax_array[] = '<a href="' . esc_url( get_term_link( $tax_data->term_id ) ) . '" target="_self">' . esc_html( $tax_data->name ) . '</a>';
			}

			$formatted_tax_array = implode( ', ', $formatted_tax_array );
			return $formatted_tax_array;
		}
	}
endif;
