<?php
/**
 * Genesis Sample.
 *
 * A template to force full-width layout, remove breadcrumbs, and remove the page title.
 *
 * Template Name: No Sidebar
 * Template Post Type: post, page, service, program, resource
 *
 * @package Genesis Sample
 * @author StudioPress
 * @license GPL-2.0-or-later
 * @link https://www.studiopress.com/
 */
//* Force content-sidebar layout setting
add_filter('genesis_pre_get_option_site_layout', '__genesis_return_full_width_content');
// Removes the breadcrumbs.
remove_action('genesis_before_loop', 'genesis_do_breadcrumbs');
//* Add custom body class to the head
// add_filter('body_class', 'tnu_body_class');
function tnu_body_class($classes)
{
  $classes[] = 'fullwidth-layout';
  return $classes;
}

// Runs the Genesis loop.
genesis();