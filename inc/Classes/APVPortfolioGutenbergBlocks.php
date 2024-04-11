<?php
/**
 * Class APV Portfolio Gutenberg Blocks
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

use Carbon_Fields\Block;
use Carbon_Fields\Field;

if ( ! class_exists( 'APVPortfolioGutenbergBlocks' ) ) :
	/**
	 * Class APV Portfolio Gutenberg Blocks
	 *
	 * @category Themes
	 * @package  APV_Portfolio
	 * @author   Aldo Paz Velasquez <aldveq80@gmail.com>
	 * @license  GPL-2.0-or-later https://www.gnu.org/licenses/gpl-2.0.txt
	 * @link     https://developer.wordpress.org/plugins/plugin-basics/
	 * @see      APV Portfolio Singleton
	 */
	class APVPortfolioGutenbergBlocks extends APVPortfolioSingleton {

		/**
		 *  APV Portfolio Gutenberg Blocks Construct function
		 */
		protected function __construct() {
			add_action( 'carbon_fields_register_fields', array( $this, 'apv_register_gutenberg_blocks' ) );
		}

		/**
		 * Register Gutenberg Blocks
		 *
		 * @return void
		 */
		public function apv_register_gutenberg_blocks() {
			// Hero Slider Block - Start.
			Block::make( __( 'Hero Slider Block', 'apv-portfolio' ) )
			->add_fields(
				array(
					Field::make( 'image', 'apv_hero_image', __( 'Image', 'apv-portfolio' ) ),
					Field::make( 'text', 'apv_hero_overline', __( 'Overline', 'apv-portfolio' ) )
						->help_text( __( 'Wrap text in __* to distinguish it with the global accent color. Example: The wrapped text has a __*different color*__.', 'apv-portfolio' ) ),
					Field::make( 'text', 'apv_hero_heading', __( 'Heading', 'apv-portfolio' ) ),
					Field::make( 'rich_text', 'apv_hero_body_content', __( 'Body Content', 'apv-portfolio' ) )
						->set_settings(
							array(
								'media_buttons' => false,
							)
						),
					Field::make( 'complex', 'apv_hero_ctas', __( 'Ctas' ) )
						->set_layout( 'tabbed-horizontal' )
						->set_max( 2 )
						->add_fields(
							array(
								Field::make( 'text', 'title', __( 'Title', 'apv-portfolio' ) )
									->set_width( 25 ),
								Field::make( 'text', 'url', __( 'URL', 'apv-portfolio' ) )
									->set_width( 25 ),
								Field::make( 'checkbox', 'target', __( 'Open in new tab?', 'apv-portfolio' ) )
									->set_width( 25 ),
								Field::make( 'checkbox', 'secondary_style', __( 'Secondary style?', 'apv-portfolio' ) )
									->set_width( 25 ),
							)
						),
				)
			)
			->set_description( __( 'Hero Slider Block', 'apv-portfolio' ) )
			->set_category( 'apv-blocks', __( 'APV Blocks', 'apv-portfolio' ) )
			->set_icon( 'cover-image' )
			->set_keywords( array( __( 'Hero', 'apv-portfolio' ) ) )
			->set_render_callback(
				function ( $fields, $attributes ) {
					get_template_part(
						'template-parts/blocks/block',
						'hero',
						array(
							'hero_data'        => $fields,
							'block_attributes' => $attributes,
						)
					);
				}
			);
			// Hero Slider Block - End.
		}
	}
endif;
