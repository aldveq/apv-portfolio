<?php

/**
 * APV Portfolio functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package APV_Portfolio
 */

use APVPortfolio\Classes\APVPortfolioInit;

require_once dirname(__FILE__) . '/vendor/autoload.php';

APVPortfolioInit::get_instance();
