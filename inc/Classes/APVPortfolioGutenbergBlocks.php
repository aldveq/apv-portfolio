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
						Field::make( 'complex', 'apv_hero_ctas', __( 'Ctas', 'apv-portfolio' ) )
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
						Field::make( 'text', 'apv_hero_block_id', __( 'Block Id', 'apv-portfolio' ) ),
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
			// Image, Content, Cta Block - Start.
			Block::make( __( 'Image, Content, Cta Block', 'apv-portfolio' ) )
				->add_fields(
					array(
						Field::make( 'image', 'apv_image_content_cta_image', __( 'Image', 'apv-portfolio' ) ),
						Field::make( 'text', 'apv_image_content_cta_overline', __( 'Overline', 'apv-portfolio' ) )
							->help_text( __( 'Wrap text in __* to distinguish it with the global accent color. Example: The wrapped text has a __*different color*__.', 'apv-portfolio' ) ),
						Field::make( 'text', 'apv_image_content_cta_heading', __( 'Heading', 'apv-portfolio' ) ),
						Field::make( 'rich_text', 'apv_image_content_cta_body_content', __( 'Body Content', 'apv-portfolio' ) )
							->set_settings(
								array(
									'media_buttons' => false,
								)
							),
						Field::make( 'text', 'apv_image_content_cta_title', __( 'Title', 'apv-portfolio' ) )
							->set_width( 25 ),
						Field::make( 'text', 'apv_image_content_cta_url', __( 'URL', 'apv-portfolio' ) )
							->set_width( 25 ),
						Field::make( 'checkbox', 'apv_image_content_cta_target', __( 'Open in new tab?', 'apv-portfolio' ) )
							->set_width( 25 ),
						Field::make( 'checkbox', 'apv_image_content_cta_download_file', __( 'Download file?', 'apv-portfolio' ) )
							->set_width( 25 ),
						Field::make( 'text', 'apv_image_content_cta_block_id', __( 'Block Id', 'apv-portfolio' ) ),
					)
				)
				->set_description( __( 'Image, Content, Cta Block', 'apv-portfolio' ) )
				->set_category( 'apv-blocks', __( 'APV Blocks', 'apv-portfolio' ) )
				->set_icon( 'align-pull-left' )
				->set_keywords( array( __( 'Image', 'apv-portfolio' ), __( 'Content', 'apv-portfolio' ), __( 'CTA', 'apv-portfolio' ) ) )
				->set_render_callback(
					function ( $fields, $attributes ) {
						get_template_part(
							'template-parts/blocks/block',
							'image-content-cta',
							array(
								'data'             => $fields,
								'block_attributes' => $attributes,
							)
						);
					}
				);
			// Image, Content, Cta Block - End.
			// Image, Content, Cta Block Alt - Start.
			Block::make( __( 'Image, Content, Cta Block Alt', 'apv-portfolio' ) )
				->add_fields(
					array(
						Field::make( 'image', 'apv_image_content_cta_alt_image', __( 'Image', 'apv-portfolio' ) ),
						Field::make( 'text', 'apv_image_content_cta_alt_overline', __( 'Overline', 'apv-portfolio' ) )
							->help_text( __( 'Wrap text in __* to distinguish it with the global accent color. Example: The wrapped text has a __*different color*__.', 'apv-portfolio' ) ),
						Field::make( 'text', 'apv_image_content_cta_alt_heading', __( 'Heading', 'apv-portfolio' ) ),
						Field::make( 'rich_text', 'apv_image_content_cta_alt_body_content', __( 'Body Content', 'apv-portfolio' ) )
							->set_settings(
								array(
									'media_buttons' => false,
								)
							),
						Field::make( 'text', 'apv_image_content_cta_alt_title', __( 'Title', 'apv-portfolio' ) )
							->set_width( 25 ),
						Field::make( 'text', 'apv_image_content_cta_alt_url', __( 'URL', 'apv-portfolio' ) )
							->set_width( 25 ),
						Field::make( 'checkbox', 'apv_image_content_cta_alt_target', __( 'Open in new tab?', 'apv-portfolio' ) )
							->set_width( 25 ),
						Field::make( 'checkbox', 'apv_image_content_cta_alt_download_file', __( 'Download file?', 'apv-portfolio' ) )
							->set_width( 25 ),
						Field::make( 'text', 'apv_image_content_cta_alt_block_id', __( 'Block Id', 'apv-portfolio' ) ),
					)
				)
				->set_description( __( 'Image, Content, Cta Block Alt', 'apv-portfolio' ) )
				->set_category( 'apv-blocks', __( 'APV Blocks', 'apv-portfolio' ) )
				->set_icon( 'align-pull-left' )
				->set_keywords( array( __( 'Image', 'apv-portfolio' ), __( 'Content', 'apv-portfolio' ), __( 'CTA', 'apv-portfolio' ) ) )
				->set_render_callback(
					function ( $fields, $attributes ) {
						get_template_part(
							'template-parts/blocks/block',
							'image-content-cta-alt',
							array(
								'data'             => $fields,
								'block_attributes' => $attributes,
							)
						);
					}
				);
			// Image, Content, Cta Block Alt - End.
			// Skills Block - Start.
			Block::make( __( 'Skills Block', 'apv-portfolio' ) )
				->add_fields(
					array(
						Field::make( 'text', 'apv_skills_overline', __( 'Overline', 'apv-portfolio' ) )
							->help_text( __( 'Wrap text in __* to distinguish it with the global accent color. Example: The wrapped text has a __*different color*__.', 'apv-portfolio' ) ),
						Field::make( 'text', 'apv_skills_heading', __( 'Heading', 'apv-portfolio' ) ),
						Field::make( 'complex', 'apv_skills_data', __( 'Skills' ) )
							->set_layout( 'tabbed-horizontal' )
							->add_fields(
								array(
									Field::make( 'icon', 'skill_icon', __( 'Icon', 'apv-portfolio' ) )
										->set_width( 33 )
										->add_fontawesome_options(),
									Field::make( 'text', 'text', __( 'Text', 'apv-portfolio' ) )
										->set_width( 33 ),
									Field::make( 'text', 'percentage', __( 'Percentage', 'apv-portfolio' ) )
										->set_width( 33 ),
								)
							),
						Field::make( 'text', 'apv_skills_block_id', __( 'Block Id', 'apv-portfolio' ) ),
					)
				)
				->set_description( __( 'Skills Block', 'apv-portfolio' ) )
				->set_category( 'apv-blocks', __( 'APV Blocks', 'apv-portfolio' ) )
				->set_icon( 'chart-line' )
				->set_keywords( array( __( 'Skill', 'apv-portfolio' ), __( 'Ability', 'apv-portfolio' ) ) )
				->set_render_callback(
					function ( $fields, $attributes ) {
						get_template_part(
							'template-parts/blocks/block',
							'skills',
							array(
								'data'             => $fields,
								'block_attributes' => $attributes,
							)
						);
					}
				);
			// Skills Block - End.
			// Experience Block - Start.
			Block::make( __( 'Experience Block', 'apv-portfolio' ) )
				->add_fields(
					array(
						Field::make( 'text', 'apv_experience_overline', __( 'Overline', 'apv-portfolio' ) )
							->help_text( __( 'Wrap text in __* to distinguish it with the global accent color. Example: The wrapped text has a __*different color*__.', 'apv-portfolio' ) ),
						Field::make( 'text', 'apv_experience_heading', __( 'Heading', 'apv-portfolio' ) ),
						Field::make( 'rich_text', 'apv_experience_body_content', __( 'Body Content', 'apv-portfolio' ) )
							->set_settings(
								array(
									'media_buttons' => false,
								)
							),
						Field::make( 'complex', 'apv_experience_data', __( 'Skills' ) )
							->set_layout( 'tabbed-horizontal' )
							->add_fields(
								array(
									Field::make( 'text', 'agency', __( 'Agency/Company', 'apv-portfolio' ) )
										->set_width( 33 ),
									Field::make( 'text', 'period', __( 'Period', 'apv-portfolio' ) )
										->set_width( 33 ),
									Field::make( 'rich_text', 'job_description', __( 'Job Description', 'apv-portfolio' ) )
										->set_width( 33 )
										->set_settings(
											array(
												'media_buttons' => false,
											)
										),
								)
							),
						Field::make( 'text', 'apv_experience_block_id', __( 'Block Id', 'apv-portfolio' ) ),
					)
				)
				->set_description( __( 'Experience Block', 'apv-portfolio' ) )
				->set_category( 'apv-blocks', __( 'APV Blocks', 'apv-portfolio' ) )
				->set_icon( 'businessman' )
				->set_keywords( array( __( 'Experience', 'apv-portfolio' ), __( 'Jobs', 'apv-portfolio' ) ) )
				->set_render_callback(
					function ( $fields, $attributes ) {
						get_template_part(
							'template-parts/blocks/block',
							'experience',
							array(
								'data'             => $fields,
								'block_attributes' => $attributes,
							)
						);
					}
				);
			// Experience Block - End.
			// Education Block - Start.
			Block::make( __( 'Education Block', 'apv-portfolio' ) )
				->add_fields(
					array(
						Field::make( 'text', 'apv_education_overline', __( 'Overline', 'apv-portfolio' ) )
							->help_text( __( 'Wrap text in __* to distinguish it with the global accent color. Example: The wrapped text has a __*different color*__.', 'apv-portfolio' ) ),
						Field::make( 'text', 'apv_education_heading', __( 'Heading', 'apv-portfolio' ) ),
						Field::make( 'rich_text', 'apv_education_body_content', __( 'Body Content', 'apv-portfolio' ) )
							->set_settings(
								array(
									'media_buttons' => false,
								)
							),
						Field::make( 'complex', 'apv_education_data', __( 'Education' ) )
							->set_layout( 'tabbed-horizontal' )
							->add_fields(
								array(
									Field::make( 'text', 'link', __( 'Link', 'apv-portfolio' ) )
										->set_width( 50 ),
									Field::make( 'text', 'title', __( 'Title', 'apv-portfolio' ) )
										->set_width( 50 ),
									Field::make( 'text', 'period', __( 'Period', 'apv-portfolio' ) )
										->set_width( 50 )
										->help_text( __( 'Wrap text in __* to distinguish it with the global accent color. Example: The wrapped text has a __*different color*__.', 'apv-portfolio' ) ),
									Field::make( 'rich_text', 'description', __( 'Description', 'apv-portfolio' ) )
										->set_width( 50 )
										->set_settings(
											array(
												'media_buttons' => false,
											)
										),
								)
							),
						Field::make( 'text', 'apv_education_block_id', __( 'Block Id', 'apv-portfolio' ) ),
					)
				)
				->set_description( __( 'Education Block', 'apv-portfolio' ) )
				->set_category( 'apv-blocks', __( 'APV Blocks', 'apv-portfolio' ) )
				->set_icon( 'awards' )
				->set_keywords( array( __( 'Education', 'apv-portfolio' ), __( 'Titles', 'apv-portfolio' ) ) )
				->set_render_callback(
					function ( $fields, $attributes ) {
						get_template_part(
							'template-parts/blocks/block',
							'education',
							array(
								'data'             => $fields,
								'block_attributes' => $attributes,
							)
						);
					}
				);
			// Education Block - End.
			// Contact Block - Start.
			Block::make( __( 'Contact Block', 'apv-portfolio' ) )
				->add_fields(
					array(
						Field::make( 'text', 'apv_contact_overline', __( 'Overline', 'apv-portfolio' ) )
							->help_text( __( 'Wrap text in __* to distinguish it with the global accent color. Example: The wrapped text has a __*different color*__.', 'apv-portfolio' ) ),
						Field::make( 'text', 'apv_contact_heading', __( 'Heading', 'apv-portfolio' ) ),
						Field::make( 'rich_text', 'apv_contact_body_content', __( 'Body Content', 'apv-portfolio' ) )
							->set_settings(
								array(
									'media_buttons' => false,
								)
							),
						Field::make( 'complex', 'apv_contact_info', __( 'Contact Info', 'apv-portfolio' ) )
							->set_layout( 'tabbed-horizontal' )
							->set_max( 3 )
							->add_fields(
								array(
									Field::make( 'select', 'contact_info', __( 'Choose Contact Info', 'apv-portfolio' ) )
										->set_options(
											array(
												'phones'  => __( 'Phones', 'apv-portfolio' ),
												'address' => __( 'Address', 'apv-portfolio' ),
												'emails'  => __( 'Emails', 'apv-portfolio' ),
											)
										)
										->set_default_value( 'phones' ),
								)
							),
						Field::make( 'text', 'apv_contact_form_shortcode', __( 'Contact Form Shortcode', 'apv-portfolio' ) ),
					)
				)
				->set_description( __( 'Contact Block', 'apv-portfolio' ) )
				->set_category( 'apv-blocks', __( 'APV Blocks', 'apv-portfolio' ) )
				->set_icon( 'forms' )
				->set_keywords( array( __( 'Contact Form', 'apv-portfolio' ), __( 'Contact Info', 'apv-portfolio' ) ) )
				->set_render_callback(
					function ( $fields, $attributes ) {
						get_template_part(
							'template-parts/blocks/block',
							'contact-form-info',
							array(
								'data'             => $fields,
								'block_attributes' => $attributes,
							)
						);
					}
				);
			// Contact Block - End.
		}
	}
endif;
