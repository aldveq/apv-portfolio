<?php
/**
 * Class APV Portfolio CPTs
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

if ( ! class_exists( 'APVPortfolioCPTS' ) ) :
	/**
	 * Class APV Portfolio CPTs
	 *
	 * @category Themes
	 * @package  APV_Portfolio
	 * @author   Aldo Paz Velasquez <aldveq80@gmail.com>
	 * @license  GPL-2.0-or-later https://www.gnu.org/licenses/gpl-2.0.txt
	 * @link     https://developer.wordpress.org/plugins/plugin-basics/
	 * @see      APV Portfolio Singleton
	 */
	class APVPortfolioCPTS extends APVPortfolioSingleton {

		/**
		 *  APV Portfolio CPTs Construct function
		 */
		protected function __construct() {
			add_action( 'init', array( $this, 'apv_project_cpt_register' ) );
			add_action( 'init', array( $this, 'apv_portfolio_taxonomies_register' ) );
			add_action( 'carbon_fields_register_fields', array( $this, 'apv_project_custom_fields_registration' ) );
		}

		/**
		 * Project CPT Registration
		 *
		 * @return void
		 */
		public function apv_project_cpt_register() {
			$labels = array(
				'name'                  => _x( 'Projects', 'Post type general name', 'apv-portfolio' ),
				'singular_name'         => _x( 'Project', 'Post type singular name', 'apv-portfolio' ),
				'menu_name'             => _x( 'Projects', 'Admin Menu text', 'apv-portfolio' ),
				'name_admin_bar'        => _x( 'Project', 'Add New on Toolbar', 'apv-portfolio' ),
				'add_new'               => __( 'Add New', 'apv-portfolio' ),
				'add_new_item'          => __( 'Add New Project', 'apv-portfolio' ),
				'new_item'              => __( 'New Project', 'apv-portfolio' ),
				'edit_item'             => __( 'Edit Project', 'apv-portfolio' ),
				'view_item'             => __( 'View Project', 'apv-portfolio' ),
				'all_items'             => __( 'All Projects', 'apv-portfolio' ),
				'search_items'          => __( 'Search Projects', 'apv-portfolio' ),
				'parent_item_colon'     => __( 'Parent Projects:', 'apv-portfolio' ),
				'not_found'             => __( 'No Projects found.', 'apv-portfolio' ),
				'not_found_in_trash'    => __( 'No Projects found in Trash.', 'apv-portfolio' ),
				'featured_image'        => _x( 'Project Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'apv-portfolio' ),
				'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'apv-portfolio' ),
				'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'apv-portfolio' ),
				'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'apv-portfolio' ),
				'archives'              => _x( 'Project archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'apv-portfolio' ),
				'insert_into_item'      => _x( 'Insert into project', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'apv-portfolio' ),
				'uploaded_to_this_item' => _x( 'Uploaded to this project', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'apv-portfolio' ),
				'filter_items_list'     => _x( 'Filter Projects list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'apv-portfolio' ),
				'items_list_navigation' => _x( 'Projects list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'apv-portfolio' ),
				'items_list'            => _x( 'Projects list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'apv-portfolio' ),
			);

			$args = array(
				'labels'             => $labels,
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'query_var'          => true,
				'rewrite'            => array( 'slug' => 'projects' ),
				'capability_type'    => 'post',
				'has_archive'        => true,
				'hierarchical'       => false,
				'menu_position'      => 20,
				'menu_icon'          => 'dashicons-portfolio',
				'taxonomies'         => array( 'categories' ),
				'show_in_rest'       => true,
				'rest_base'          => 'projects',
				'supports'           => array( 'title', 'thumbnail', 'excerpt' ),
				'map_meta_cap'       => true,
			);

			register_post_type( 'projects', $args );
		}

		/**
		 * Project CPT Taxonomy Registration
		 *
		 * @return void
		 */
		public function apv_portfolio_taxonomies_register() {

			$labels = array(
				'name'          => __( 'Categories' ),
				'singular_name' => __( 'Category' ),
			);

			$args = array(
				'label'                 => __( 'Categories' ),
				'labels'                => $labels,
				'public'                => true,
				'publicly_queryable'    => true,
				'hierarchical'          => true,
				'show_ui'               => true,
				'show_in_menu'          => true,
				'show_in_nav_menus'     => true,
				'query_var'             => true,
				'rewrite'               => array(
					'slug'       => 'projects-category',
					'with_front' => true,
				),
				'show_admin_column'     => false,
				'show_in_rest'          => true,
				'rest_base'             => 'projects-category',
				'rest_controller_class' => 'WP_REST_Terms_Controller',
				'show_in_quick_edit'    => false,
			);
			register_taxonomy( 'projects-category', array( 'projects' ), $args );
		}

		/**
		 * Project Post Type Fields Registration
		 *
		 * @return void
		 */
		public function apv_project_custom_fields_registration() {
			Container::make( 'post_meta', __( 'Professor Information', 'apv-portfolio' ) )
				->where( 'post_type', '=', 'projects' )
				->add_fields(
					array(
						Field::make( 'text', 'project_cpt_client_name', __( 'Client Name', 'apv-portfolio' ) )
							->set_width( 33 ),
						Field::make( 'text', 'project_cpt_demo_link', __( 'Demo Link', 'apv-portfolio' ) )
							->set_width( 33 ),
						Field::make( 'text', 'project_cpt_repo_link', __( 'Repo Link', 'apv-portfolio' ) )
							->set_width( 33 ),
						Field::make( 'rich_text', 'project_cpt_description', __( 'Description', 'apv-portfolio' ) )
							->set_settings(
								array(
									'media_buttons' => false,
								)
							),
					)
				);
		}
	}
endif;
