<?php
/**
 * Class APV Portfolio Singleton Pattern Class
 *
 * Singleton class which implements Singleton pattern
 * in any class in which this class is used.
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

if ( ! class_exists( 'APVPortfolioSingleton' ) ) :
	/**
	 * Class APV Portfolio Singleton Pattern Class
	 *
	 * @category Themes
	 * @package  APV_Portfolio
	 * @author   Aldo Paz Velasquez <aldveq80@gmail.com>
	 * @license  GPL-2.0-or-later https://www.gnu.org/licenses/gpl-2.0.txt
	 * @link     https://developer.wordpress.org/plugins/plugin-basics/
	 */
	class APVPortfolioSingleton {


		/**
		 * Protected class constructor to prevent direct object creation
		 *
		 * This is meant to be overridden in the classes which implement
		 * this class. This is ideal for doing stuff that you only want to
		 * do once, such as hooking into actions and filters, etc.
		 */
		protected function __construct() {
		}

		/**
		 * Prevent object cloning
		 */
		final protected function __clone() {
		}

		/**
		 * This method returns new or existing Singleton instance
		 * of the class for which it is called. This method is set
		 * as final intentionally, it is not meant to be overridden.
		 *
		 * @return object Singleton instance of the class.
		 */
		final public static function get_instance() {

			/**
			 * Collection of instance.
			 *
			 * @var array
			 */
			static $instance = array();

			/**
			 * If this class is implemented in a class which has multiple
			 * sub-classes then static::$_instance will be overwritten with the most recent
			 * sub-class instance. Thanks to late static binding
			 * we use get_called_class() to grab the called class name, and store
			 * a key=>value pair for each `classname => instance` in self::$_instance
			 * for each sub-class.
			 */
			$called_class = get_called_class();

			if ( ! isset( $instance[ $called_class ] ) ) {
				$instance[ $called_class ] = new $called_class();
			}

			return $instance[ $called_class ];
		}
	} // End class
endif;
