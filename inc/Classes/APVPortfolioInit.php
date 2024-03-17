<?php
/**
 * Class APV Portfolio Init
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

if ( ! class_exists( 'APVPortfolioInit' ) ) :
	/**
	 * Class APV Portfolio Init
	 *
	 * @category Themes
	 * @package  APV_Portfolio
	 * @author   Aldo Paz Velasquez <aldveq80@gmail.com>
	 * @license  GPL-2.0-or-later https://www.gnu.org/licenses/gpl-2.0.txt
	 * @link     https://developer.wordpress.org/plugins/plugin-basics/
	 * @see      APV Portfolio Singleton
	 */
	class APVPortfolioInit extends APVPortfolioSingleton {

		/**
		 *  APV Portfolio Init Construct function
		 */
		protected function __construct() {
			$this->define_constants();

			// Loading Classes
			APVPortfolioUtilities::get_instance();

			add_action( 'after_setup_theme', array( $this, 'apv_portfolio_setup' ) );
			add_action( 'after_setup_theme', array( $this, 'apv_portfolio_content_width' ), 0 );
			add_action( 'widgets_init', array( $this, 'apv_portfolio_widgets_init' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'apv_portfolio_scripts' ) );

			// Remove emoji support.
			remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
			remove_action( 'wp_print_styles', 'print_emoji_styles' );

			// Remove rss feed links.
			remove_action( 'wp_head', 'feed_links_extra', 3 );
			remove_action( 'wp_head', 'feed_links', 2 );

			// Remove wp-embed.
			add_action(
				'wp_footer',
				function () {
					wp_dequeue_script( 'wp-embed' );
				}
			);

			add_action(
				'wp_enqueue_scripts',
				function () {
					// Remove block library css.
					wp_dequeue_style( 'wp-block-library' );

					// Remove comment reply JS.
					wp_dequeue_script( 'comment-reply' );
				}
			);
		}

		/**
		 * Define Constants function
		 *
		 * @return void
		 */
		public function define_constants() {
			if ( ! defined( '_S_VERSION' ) ) {
				// Replace the version number of the theme on each release.
				define( '_S_VERSION', '1.0.0' );
			}

			if ( ! defined( 'APV_PORTFOLIO_THEME_DIR' ) ) {
				define( 'APV_PORTFOLIO_THEME_DIR', get_template_directory_uri() );
			}
		}

		/**
		 * Sets up theme defaults and registers support for various WordPress features.
		 *
		 * Note that this function is hooked into the after_setup_theme hook, which
		 * runs before the init hook. The init hook is too late for some features, such
		 * as indicating support for post thumbnails.
		 */
		public function apv_portfolio_setup() {
			/*
			* Make theme available for translation.
			* Translations can be filed in the /languages/ directory.
			* If you're building a theme based on APV Portfolio, use a find and replace
			* to change 'apv-portfolio' to the name of your theme in all the template files.
			*/
			load_theme_textdomain( 'apv-portfolio', get_template_directory() . '/languages' );

			// Add default posts and comments RSS feed links to head.
			add_theme_support( 'automatic-feed-links' );

			/*
			* Let WordPress manage the document title.
			* By adding theme support, we declare that this theme does not use a
			* hard-coded <title> tag in the document head, and expect WordPress to
			* provide it for us.
			*/
			add_theme_support( 'title-tag' );

			/*
			* Enable support for Post Thumbnails on posts and pages.
			*
			* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
			*/
			add_theme_support( 'post-thumbnails' );

			// This theme uses wp_nav_menu() in one location.
			register_nav_menus(
				array(
					'primary-menu' => esc_html__( 'Primary Menu', 'apv-portfolio' ),
				)
			);

			/*
			* Switch default core markup for search form, comment form, and comments
			* to output valid HTML5.
			*/
			add_theme_support(
				'html5',
				array(
					'search-form',
					'comment-form',
					'comment-list',
					'gallery',
					'caption',
					'style',
					'script',
				)
			);

			// Set up the WordPress core custom background feature.
			add_theme_support(
				'custom-background',
				apply_filters(
					'apv_portfolio_custom_background_args',
					array(
						'default-color' => 'ffffff',
						'default-image' => '',
					)
				)
			);

			// Add theme support for selective refresh for widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );

			/**
			 * Add support for core custom logo.
			 *
			 * @link https://codex.wordpress.org/Theme_Logo
			 */
			add_theme_support(
				'custom-logo',
				array(
					'height'      => 250,
					'width'       => 250,
					'flex-width'  => true,
					'flex-height' => true,
				)
			);

			/**
			 * Adding cutom image sizings.
			 *
			 * @return void
			 */
			add_image_size( 'brand-size', 100, 22, false );
		}

		/**
		 * Set the content width in pixels, based on the theme's design and stylesheet.
		 *
		 * Priority 0 to make it available to lower priority callbacks.
		 *
		 * @global int $content_width
		 */
		public function apv_portfolio_content_width() {
			$GLOBALS['content_width'] = apply_filters( 'apv_portfolio_content_width', 640 );
		}

		/**
		 * Register widget area.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
		 */
		public function apv_portfolio_widgets_init() {
			register_sidebar(
				array(
					'name'          => esc_html__( 'Sidebar', 'apv-portfolio' ),
					'id'            => 'sidebar-1',
					'description'   => esc_html__( 'Add widgets here.', 'apv-portfolio' ),
					'before_widget' => '<section id="%1$s" class="widget %2$s">',
					'after_widget'  => '</section>',
					'before_title'  => '<h2 class="widget-title">',
					'after_title'   => '</h2>',
				)
			);
		}

		/**
		 * Enqueue scripts and styles.
		 */
		public function apv_portfolio_scripts() {
			// CSS Styles.
			wp_enqueue_style( 'apv-portfolio-google-font', 'https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap', array(), _S_VERSION, 'screen' );
			wp_enqueue_style( 'apv-portfolio-style', get_stylesheet_uri(), array(), _S_VERSION, 'screen' );
			wp_enqueue_style( 'apv-portfolio-bootstrap-grid', APV_PORTFOLIO_THEME_DIR . '/assets/css/bootstrap-grid.css', array(), _S_VERSION, 'screen' );
			wp_enqueue_style( 'apv-portfolio-swiper', APV_PORTFOLIO_THEME_DIR . '/assets/css/swiper.min.css', array(), _S_VERSION, 'screen' );
			wp_enqueue_style( 'apv-portfolio-magnific-popup', APV_PORTFOLIO_THEME_DIR . '/assets/css/magnific-popup.css', array(), _S_VERSION, 'screen' );
			wp_enqueue_style( 'apv-portfolio-fontawesome-all', APV_PORTFOLIO_THEME_DIR . '/assets/css/fontawesome-all.min.css', array(), _S_VERSION, 'screen' );
			wp_enqueue_style( 'apv-portfolio-main-sytle', APV_PORTFOLIO_THEME_DIR . '/build/index.css', array(), _S_VERSION, 'screen' );

			// JS Scripts.
			wp_enqueue_script( 'apv-portfolio-jquery-validate', APV_PORTFOLIO_THEME_DIR . '/assets/js/jquery.validate.min.js', array( 'jquery' ), _S_VERSION, true );
			wp_enqueue_script( 'apv-portfolio-magnific-popup', APV_PORTFOLIO_THEME_DIR . '/assets/js/magnific-popup.js', array( 'jquery' ), _S_VERSION, true );
			wp_enqueue_script( 'apv-portfolio-one-page', APV_PORTFOLIO_THEME_DIR . '/assets/js/onepage.js', array(), _S_VERSION, true );
			wp_enqueue_script( 'apv-portfolio-swiper', APV_PORTFOLIO_THEME_DIR . '/assets/js/swiper.min.js', array(), _S_VERSION, true );
			wp_enqueue_script( 'apv-portfolio-isotope', APV_PORTFOLIO_THEME_DIR . '/assets/js/isotope.min.js', array(), _S_VERSION, true );
			wp_enqueue_script( 'apv-portfolio-main', APV_PORTFOLIO_THEME_DIR . '/build/index.js', array( 'jquery' ), _S_VERSION, true );
		}
	}
endif;
