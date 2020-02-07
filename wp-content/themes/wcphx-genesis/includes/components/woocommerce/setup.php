<?php
/**
 * WooCommerce Genesis Theme Compatibility.
 *
 * @see https://www.wpstud.io/3-ways-to-integrate-woocommerce-with-genesis/
 * @see https://docs.woocommerce.com/document/template-structure/
 *
 * @package BrubakerDesignServices\BDSStarterTheme
 * @since   2.0.0
 * @author  Dan Brubaker
 * @link    https://brubakerservices.org/
 * @license GPL-2.0+
 */

namespace BrubakerDesignServices\BDSStarterTheme;

/**
 * Remove WooCommerce styles.
 *
 * @see https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter(
	'woocommerce_enqueue_styles',
	function( $enqueue_styles ) {
		unset( $enqueue_styles['woocommerce-general'] );
		return $enqueue_styles;
	}
);

/**
 * Remove WooCommerce Sidebar.
 */
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

/**
 * Remove WooCommerce wrappers.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

/**
 * Add Genesis wrappers.
 */
add_action( 'woocommerce_before_main_content', __NAMESPACE__ . '\add_genesis_content_wrapper_start', 10 );
add_action( 'woocommerce_after_main_content', __NAMESPACE__ . '\add_genesis_content_wrapper_end', 10 );

/**
 * Output opening Genesis wrapper before WooCommerce loop.
 *
 * @return void
 */
function add_genesis_content_wrapper_start() {

	do_action( 'genesis_before_content_sidebar_wrap' );

	echo '<div class="content-sidebar-wrap" id="genesis-content">';

	do_action( 'genesis_before_content' );

	echo '<main class="content">';

	do_action( 'genesis_before_loop' );
}

/**
 * Output closing Genesis wrapper after WooCommerce loop.
 *
 * @return void
 */
function add_genesis_content_wrapper_end() {

	do_action( 'genesis_after_loop' );

	echo '</main>';

	do_action( 'genesis_after_content' );

	echo '</div>';

	do_action( 'genesis_after_content_sidebar_wrap' );
}

add_action( 'get_header', __NAMESPACE__ . '\remove_wc_breadcrumbs' );
/**
 * Remove WooCommerce breadcrumbs.
 *
 * @return void
 */
function remove_wc_breadcrumbs() {
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}
