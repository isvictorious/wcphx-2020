<?php
/**
 * Loads up all the theme files.
 *
 * @package BrubakerDesignServices\BDSStarterTheme
 * @since   1.0.0
 * @author  Dan Brubaker
 * @link    https://brubakerservices.org/
 * @license GPL-2.0+
 */

namespace BrubakerDesignServices\BDSStarterTheme;

load_files();
/**
 * Loads non-admin files
 *
 * @since 1.0.0
 *
 * @return void
 */
function load_files() {
	$filenames = array(
		'setup.php',
		'load-assets.php',

		'components/woocommerce/setup.php',
		'components/woocommerce/archive-product.php',
		'components/woocommerce/single-product.php',

		'components/navigation.php',
	);

	load_specified_files( $filenames );
}



/**
 * Load each of the specified files
 *
 * @since 1.0.0
 *
 * @param array  $filenames Names of the files.
 * @param string $folder_root Location of the files.
 *
 * @return void
 */
function load_specified_files( array $filenames, $folder_root = '' ) {
	$folder_root = $folder_root ?: CHILD_THEME_DIR . '/includes/';

	foreach ( $filenames as $filename ) {
		include $folder_root . $filename;
	}
}
