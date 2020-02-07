<?php
/**
 * Load assets handler.
 *
 * @package BrubakerDesignServices\BDSStarterTheme
 * @since   1.0.0
 * @author  Dan Brubaker
 * @link    https://brubakerservices.org/
 * @license GPL-2.0+
 */

namespace BrubakerDesignServices\BDSStarterTheme;

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_assets' );
/**
 * Enqueue Scripts and Styles
 *
 * @since 1.0.0
 *
 * @return void
 */
function enqueue_assets() {

	wp_enqueue_style(
		genesis_get_theme_handle() . '-fonts',
		'//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700|Roboto+Slab:400,700',
		array(),
		genesis_get_theme_version()
	);

	wp_enqueue_style( 'dashicons' );

	wp_enqueue_style( 'font-awesome', 'https://use.fontawesome.com/releases/v5.6.3/css/all.css', array(), genesis_get_theme_version() );

	wp_enqueue_style(
		genesis_get_theme_handle() . '-main',
		CHILD_URL . '/assets/css/main.css',
		array(),
		genesis_get_theme_version()
	);

	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	wp_enqueue_script(
		'genesis-sample-responsive-menu',
		CHILD_URL . '/assets/js/responsive-menus.js',
		array( 'jquery' ),
		genesis_get_theme_version(),
		true
	);

	wp_localize_script(
		'genesis-sample-responsive-menu',
		'genesis_responsive_menu',
		genesis_sample_responsive_menu_settings()
	);

	wp_enqueue_script(
		genesis_get_theme_handle() . '-scripts',
		CHILD_URL . '/assets/js/main.js',
		array( 'jquery' ),
		genesis_get_theme_version(),
		true
	);

}

add_action( 'admin_enqueue_scripts', __NAMESPACE__ . '\enqueue_admin_assets' );
/**
 * Enqueue Admin Scripts and Styles
 *
 * @since 1.0.0
 *
 * @return void
 */
function enqueue_admin_assets() {

	wp_enqueue_style(
		genesis_get_theme_handle() . '-admin-styles',
		CHILD_URL . '/assets/css/admin.css',
		array(),
		genesis_get_theme_version()
	);
}
