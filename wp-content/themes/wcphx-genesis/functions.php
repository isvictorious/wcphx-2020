<?php
/**
 * Genesis Sample.
 *
 * This file adds functions to the Genesis Sample Theme.
 *
 * @package Genesis Sample
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://www.studiopress.com/
 */

// Starts the engine.
require_once get_template_directory() . '/lib/init.php';

// Sets up the Theme.
require_once get_stylesheet_directory() . '/lib/theme-defaults.php';

add_action( 'after_setup_theme', 'genesis_sample_localization_setup' );
/**
 * Sets localization (do not remove).
 *
 * @since 1.0.0
 */
function genesis_sample_localization_setup() {

	load_child_theme_textdomain( genesis_get_theme_handle(), get_stylesheet_directory() . '/languages' );

}

// Adds helper functions.
require_once get_stylesheet_directory() . '/lib/helper-functions.php';

// Adds image upload and color select to Customizer.
require_once get_stylesheet_directory() . '/lib/customize.php';

// Includes Customizer CSS.
require_once get_stylesheet_directory() . '/lib/output.php';

// Adds WooCommerce support.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-setup.php';

// Adds the required WooCommerce styles and Customizer CSS.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-output.php';

// Adds the Genesis Connect WooCommerce notice.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-notice.php';

add_action( 'after_setup_theme', 'genesis_child_gutenberg_support' );
/**
 * Adds Gutenberg opt-in features and styling.
 *
 * @since 2.7.0
 */
function genesis_child_gutenberg_support() { // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedFunctionFound -- using same in all child themes to allow action to be unhooked.
	require_once get_stylesheet_directory() . '/lib/gutenberg/init.php';
}

// Registers the responsive menus.
if ( function_exists( 'genesis_register_responsive_menus' ) ) {
	genesis_register_responsive_menus( genesis_get_config( 'responsive-menus' ) );
}

add_action( 'wp_enqueue_scripts', 'genesis_sample_enqueue_scripts_styles' );
/**
 * Enqueues scripts and styles.
 *
 * @since 1.0.0
 */
function genesis_sample_enqueue_scripts_styles() {

	$appearance = genesis_get_config( 'appearance' );

	wp_enqueue_style(
		genesis_get_theme_handle() . '-fonts',
		$appearance['fonts-url'],
		array(),
		genesis_get_theme_version()
	);

	wp_enqueue_style( 'dashicons' );

	if ( genesis_is_amp() ) {
		wp_enqueue_style(
			genesis_get_theme_handle() . '-amp',
			get_stylesheet_directory_uri() . '/lib/amp/amp.css',
			array( genesis_get_theme_handle() ),
			genesis_get_theme_version()
		);
	}

}

add_action( 'after_setup_theme', 'genesis_sample_theme_support', 9 );
/**
 * Add desired theme supports.
 *
 * See config file at `config/theme-supports.php`.
 *
 * @since 3.0.0
 */
function genesis_sample_theme_support() {

	$theme_supports = genesis_get_config( 'theme-supports' );

	foreach ( $theme_supports as $feature => $args ) {
		add_theme_support( $feature, $args );
	}

}

add_filter( 'genesis_seo_title', 'genesis_sample_header_title', 10, 3 );
/**
 * Removes the link from the hidden site title if a custom logo is in use.
 *
 * Without this filter, the site title is hidden with CSS when a custom logo
 * is in use, but the link it contains is still accessible by keyboard.
 *
 * @since 1.2.0
 *
 * @param string $title  The full title.
 * @param string $inside The content inside the title element.
 * @param string $wrap   The wrapping element name, such as h1.
 * @return string The site title with anchor removed if a custom logo is active.
 */
function genesis_sample_header_title( $title, $inside, $wrap ) {

	if ( has_custom_logo() ) {
		$inside = get_bloginfo( 'name' );
	}

	return sprintf( '<%1$s class="site-title">%2$s</%1$s>', $wrap, $inside );

}

// Adds image sizes.
add_image_size( 'sidebar-featured', 75, 75, true );
add_image_size( 'person', 250, 250, true );

// Removes header right widget area.
unregister_sidebar( 'header-right' );

// Removes secondary sidebar.
unregister_sidebar( 'sidebar-alt' );

// Removes site layouts.
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );

add_filter( 'genesis_customizer_theme_settings_config', 'genesis_sample_remove_customizer_settings' );
/**
 * Removes output of header and front page breadcrumb settings in the Customizer.
 *
 * @since 2.6.0
 *
 * @param array $config Original Customizer items.
 * @return array Filtered Customizer items.
 */
function genesis_sample_remove_customizer_settings( $config ) {

	unset( $config['genesis']['sections']['genesis_header'] );
	unset( $config['genesis']['sections']['genesis_breadcrumbs']['controls']['breadcrumb_front_page'] );
	return $config;

}

// Displays custom logo.
add_action( 'genesis_site_title', 'the_custom_logo', 0 );

// Repositions primary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 12 );

// Repositions the secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 10 );

add_filter( 'wp_nav_menu_args', 'genesis_sample_secondary_menu_args' );
/**
 * Reduces secondary navigation menu to one level depth.
 *
 * @since 2.2.3
 *
 * @param array $args Original menu options.
 * @return array Menu options with depth set to 1.
 */
function genesis_sample_secondary_menu_args( $args ) {

	if ( 'secondary' !== $args['theme_location'] ) {
		return $args;
	}

	$args['depth'] = 1;
	return $args;

}

add_filter( 'genesis_author_box_gravatar_size', 'genesis_sample_author_box_gravatar' );
/**
 * Modifies size of the Gravatar in the author box.
 *
 * @since 2.2.3
 *
 * @param int $size Original icon size.
 * @return int Modified icon size.
 */
function genesis_sample_author_box_gravatar( $size ) {

	return 90;

}

add_filter( 'genesis_comment_list_args', 'genesis_sample_comments_gravatar' );
/**
 * Modifies size of the Gravatar in the entry comments.
 *
 * @since 2.2.3
 *
 * @param array $args Gravatar settings.
 * @return array Gravatar settings with modified size.
 */
function genesis_sample_comments_gravatar( $args ) {

	$args['avatar_size'] = 60;
	return $args;

}


/* NEW STUFF
---------------------------------- */


/**
 * Modify the placeholder text in the editor
 *
 * @return void
 */
function icr_editor_placeholder() {
    $placeholder = 'Start writing or add a block with /';
    return $placeholder;
}
add_filter( 'write_your_story', 'icr_editor_placeholder' );


/**
 * Remove default Genesis Theme supports
 * 
 * @link https://studiopress.github.io/genesis/developer-features/theme-support/
 */
remove_theme_support( 'genesis-inpost-layouts' );
remove_theme_support( 'genesis-archive-layouts' );


/**
 * Remove Genesis Script Metabox from Editor
 * 
 * @link
 */

function icr_remove_genesis_scripts_box() {
  remove_meta_box('genesis_inpost_scripts_box', 'page', 'normal');
  remove_meta_box('genesis_inpost_scripts_box', 'post', 'normal');
}
add_action('admin_menu', 'icr_remove_genesis_scripts_box');


/**
 * Remove genesis options from posts & pages
 * 
 * @link http://url.com
 */
function icr_genesis_editor_init()
{
	remove_post_type_support('page', 'custom-fields');
	remove_post_type_support('page', 'genesis-seo');
	remove_post_type_support('page', 'genesis-scripts');
	remove_post_type_support('page', 'genesis-layouts');
	remove_post_type_support('page', 'genesis-breadcrumbs-toggle');
	remove_post_type_support('page', 'genesis-title-toggle');
	remove_post_type_support('page', 'genesis-singular-images');
	remove_post_type_support('post', 'custom-fields');
	remove_post_type_support('post', 'genesis-seo');
	remove_post_type_support('post', 'genesis-scripts');
	remove_post_type_support('post', 'genesis-layouts');
	remove_post_type_support('post', 'genesis-breadcrumbs-toggle');
	remove_post_type_support('post', 'genesis-title-toggle');
	remove_post_type_support('post', 'genesis-singular-images');
}
add_action('admin_init', 'icr_genesis_editor_init');


/**
 * Bill Erickson's be_archive_post class
 * Add column classes to CPTs on archives
 *
 * @link	
 * 
 * @param [type] $classes
 * @return void
 */
function icr_archive_post_class( $classes ) {
	global $wp_query;

	$post_types = array('client', 'service', 'industry' );

	if( !is_post_type_archive( $post_types ) ) {
		return $classes;
	}

	$classes[] = 'one-half';
	if( 0 == $wp_query->current_post % 2 )
		$classes[] = 'first';
	return $classes;
}
add_filter( 'post_class', 'icr_archive_post_class' );


/**
 * Remove Post Info, Post Meta from Archive Pages
 *
 * @link https://coolestguidesontheplanet.com/remove-post-info-and-meta-from-archives-in-genesis-theme-in-wordpress/
 */
function icr_archive_remove_post_meta() {

	$post_types = array('client', 'service', 'industry' );

	if ( is_post_type_archive( $post_types ) || is_singular( $post_types ) ) {
		remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
		remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
		}
}
add_action ( 'genesis_entry_header', 'icr_archive_remove_post_meta' );


/**
 * 
 * Move Featured Image Before Entry Title On Archive Pages
 * 
 * @link https://wpsites.net/web-design/move-featured-image-before-entry-title-on-archive-pages/
 * 
 */
remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
add_action( 'genesis_entry_header', 'genesis_do_post_image', 1 );


/**
 * Modify the Content Limit Read More Link on Archives
 * 
 * @link https://my.studiopress.com/documentation/snippets/post-excerpts/modify-the-content-limit-read-more-link/
 */
function icr_read_more_link() {
	// return '... <a class="more-link" href="' . get_permalink() . '">[Continue Reading]</a>';
	return '';
}
add_filter( 'get_the_content_more_link', 'icr_read_more_link' );


/**
 * Register custom sidebar per CPT
 * 
 * @link http://url.com
 */
// Register new sidebar for CPT service
genesis_register_sidebar(array(
	'id'          => 'service-sidebar',
	'name'        => 'Service Sidebar',
	'description' => 'This is the sidebar for service pages and archives.',
));

/**
 * Show custom sidebars in Primary Sidebar location for CPT singles and archives
 */
function icr_custom_type_sidebars() {

	if (is_singular('service') || is_post_type_archive('service')) { // for archives and single post pages
		// remove Primary Sidebar from the Primary Sidebar area
		remove_action('genesis_sidebar', 'genesis_do_sidebar');

		// show Blog Sidebar in Primary Sidebar area
		add_action('genesis_sidebar', function () {
			genesis_widget_area('service-sidebar');
		});
	}
}
add_action('genesis_after_header', 'icr_custom_type_sidebars');


/**
 * Limit Instant Images to Admins
 *
 * @link https://connekthq.com/plugins/instant-images/faqs/#6
 */
function icr_instant_images_user_role(){   
	// https://codex.wordpress.org/Roles_and_Capabilities	   
	return 'activate_plugins';
}
add_filter('instant_images_user_role', 'icr_instant_images_user_role');


/**
 * Disable image handling introduced in WP 5.3. We will use external service Smush.
 * 
 * @link https://make.wordpress.org/core/2019/10/09/introducing-handling-of-big-images-in-wordpress-5-3/
 * 
 */
add_filter( 'big_image_size_threshold', '__return_false' );


/**
 * Disable custom colors in Gutenberg editor
 * 
 * @link https://www.billerickson.net/wordpress-color-palette-button-styling-gutenberg/
 */
add_theme_support('disable-custom-colors');
