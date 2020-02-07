<?php
/*
Plugin Name: WCPHX Functions
Plugin URI: https://github.com/isvictorious/wcphx-2020
Description: Project specific functions plugin for this site
Version: 0.1.0
Author: Victor Ramirez
Author URI: https://www.isvictorious.com
Text Domain: wcphx-functions
Domain Path: /languages
*/


define('PLUGIN_DIR', dirname(__FILE__) . '/'); 

include "types/type-case-study.php";
include "types/type-promotion.php";
include "types/type-service.php";
include "types/type-testimonial.php";


/**
 * Disable Default Dashboard Widgets, Yoast, Gravity Forms
 *
 * @link https://digwp.com/2014/02/disable-default-dashboard-widgets/
 *
 */
function wcphx_disable_default_dashboard_widgets() {
	global $wp_meta_boxes;
	// wp..
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
	// bbpress
	unset($wp_meta_boxes['dashboard']['normal']['core']['bbp-dashboard-right-now']);
	// yoast seo
	unset($wp_meta_boxes['dashboard']['normal']['core']['yoast_db_widget']);
	// gravity forms
	unset($wp_meta_boxes['dashboard']['normal']['core']['rg_forms_dashboard']);
}
add_action('wp_dashboard_setup', 'wcphx_disable_default_dashboard_widgets', 999);


/**
 * Add or Remove links from the Admin Bar
 *
 * @link https://digwp.com/2011/04/admin-bar-tricks/#add-remove-links
 * 
 * @link https://www.isitwp.com/remove-wordpress-logo-admin-bar/
 * 
 * @link https://wordpress.stackexchange.com/questions/200296/how-to-remove-customize-from-admin-menu-bar-after-wp-4-3/201646
 * 
 */
function wcphx_admin_bar_render() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu( 'comments' ); // remove comments
	$wp_admin_bar->remove_menu( 'wp-logo' ); // remove WordPress menu
	$wp_admin_bar->remove_menu( 'updates' ); // remove updates
	$wp_admin_bar->remove_menu( 'new-content' ); // remove add new
	$wp_admin_bar->remove_menu( 'customize' ); // remove customizer
}
add_action( 'wp_before_admin_bar_render', 'wcphx_admin_bar_render' );


/**
 * Remove the Howdy Text in WordPress
 *
 * @link https://wpintensity.com/change-howdy-text-wordpress/
 *
 */
function wcphx_remove_howdy( $wp_admin_bar ) {
    $my_account=$wp_admin_bar->get_node('my-account');
    $newtitle = str_replace( 'Howdy,', '', $my_account->title );
    $wp_admin_bar->add_node( array(
        'id' => 'my-account',
        'title' => $newtitle,
    ) );
}
add_filter( 'admin_bar_menu', 'wcphx_remove_howdy',25 );


/**
 * Remove Admin > Customize Menu from Appearance
 * 
 * @link https://wordpress.stackexchange.com/questions/319306/hide-theme-options-and-customize-admin-menu
 */
add_action( 'admin_menu', function() {
    global $current_user;
    $current_user = wp_get_current_user();
    $user_name = $current_user->user_login;

        //check condition for the user means show menu for this user
        if(is_admin() &&  $user_name != 'USERNAME') {
            //We need this because the submenu's link (key from the array too) will always be generated with the current SERVER_URI in mind.
            $customizer_url = add_query_arg( 'return', urlencode( remove_query_arg( wp_removable_query_args(), wp_unslash( $_SERVER['REQUEST_URI'] ) ) ), 'customize.php' );
            remove_submenu_page( 'themes.php', $customizer_url );
   }
}, 999 );


/**
 * Hides WPForms dashboard widget in WordPress admin
 *
 * @link https://wpforms.com/developers/how-to-disable-wpforms-dashboard-widget/
 *
 */
add_filter( 'wpforms_admin_dashboardwidget', '__return_false' );


/**
 * How to Hide the "News from Modern Tribe" Dashboard Widget
 *
 * @link https://plugintests.com/plugins/the-events-calendar/tips
 *
 */
function wcphx_hide_events_calendar_dashboard_widgets() {
	$screen = get_current_screen();
	if ( !$screen ) {
		return;
	}

	//Remove the "News from Modern Tribe" widget.
	remove_meta_box('tribe_dashboard_widget', 'dashboard', 'normal');
}
add_action('wp_dashboard_setup', 'wcphx_hide_events_calendar_dashboard_widgets', 20);


/**
 * Removes Events from WP Admin Bar
 *
 * @link https://support.theeventscalendar.com/971956-Remove-events-from-the-WordPress-admin-bar
 * 
 * @link https://support.theeventscalendar.com/869262-Disable-the-events-menu-on-the-dashboard-for-non-admins
 *
 */
define('TRIBE_DISABLE_TOOLBAR_ITEMS', true);
