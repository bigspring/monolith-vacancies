<?php
/*
 * Plugin Name: Monolith Vacancies
 * Version: 1.0
 * Plugin URI: https://github.com/bigspring/monolith-vacancies
 * Description: An add-on plugin for the Monolith Theme, designed to provide basic job vacancy listing functionality.
 * Author: BigSpring
 * Author URI: http://www.bigspring.co.uk
 * Requires at least: 4.0
 * Tested up to: 4.0
 *
 * Text Domain: monolith-vacancies
 * Domain Path: /lang/
 *
 * @package WordPress
 * @author BigSpring
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// Load plugin class files
require_once( 'includes/class-monolith-vacancies.php' );
require_once( 'includes/class-monolith-vacancies-settings.php' );

// Load plugin libraries
require_once( 'includes/lib/class-monolith-vacancies-admin-api.php' );
require_once( 'includes/lib/class-monolith-vacancies-post-type.php' );
require_once( 'includes/lib/class-monolith-vacancies-taxonomy.php' );

/**
 * Returns the main instance of Monolith_Vacancies to prevent the need to use globals.
 *
 * @since  1.0.0
 * @return object Monolith_Vacancies
 */
function Monolith_Vacancies () {
	$instance = Monolith_Vacancies::instance( __FILE__, '1.0.0' );

	if ( is_null( $instance->settings ) ) {
		$instance->settings = Monolith_Vacancies_Settings::instance( $instance );
	}

	return $instance;
}

Monolith_Vacancies();

/* Declare the custom post type */
Monolith_Vacancies()->register_post_type( 'job', __( 'Jobs', 'monolith-vacancies' ), __( 'Job', 'monolith-vacancies' ) );
