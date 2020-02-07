<?php

// Register Custom Post Type
function wcphx_services_post_type()
{

	$labels = array(
		'name'                  => _x('Services', 'Post Type General Name', 'sai_functions'),
		'singular_name'         => _x('Service', 'Post Type Singular Name', 'sai_functions'),
		'menu_name'             => __('Services', 'sai_functions'),
		'name_admin_bar'        => __('Service', 'sai_functions'),
		'archives'              => __('Service Archives', 'sai_functions'),
		'attributes'            => __('Service Attributes', 'sai_functions'),
		'parent_item_colon'     => __('Parent Service:', 'sai_functions'),
		'all_items'             => __('All Services', 'sai_functions'),
		'add_new_item'          => __('Add New Service', 'sai_functions'),
		'add_new'               => __('Add New', 'sai_functions'),
		'new_item'              => __('New Service', 'sai_functions'),
		'edit_item'             => __('Edit Service', 'sai_functions'),
		'update_item'           => __('Update Service', 'sai_functions'),
		'view_item'             => __('View Service', 'sai_functions'),
		'view_items'            => __('View Services', 'sai_functions'),
		'search_items'          => __('Search services', 'sai_functions'),
		'not_found'             => __('No services found', 'sai_functions'),
		'not_found_in_trash'    => __('No services found in Trash', 'sai_functions'),
		'featured_image'        => __('Featured Image', 'sai_functions'),
		'set_featured_image'    => __('Set featured image', 'sai_functions'),
		'remove_featured_image' => __('Remove featured image', 'sai_functions'),
		'use_featured_image'    => __('Use as featured image', 'sai_functions'),
		'insert_into_item'      => __('Insert into item', 'sai_functions'),
		'uploaded_to_this_item' => __('Uploaded to this item', 'sai_functions'),
		'items_list'            => __('Services list', 'sai_functions'),
		'items_list_navigation' => __('Services list navigation', 'sai_functions'),
		'filter_items_list'     => __('Filter resources list', 'sai_functions'),
	);
	$rewrite = array(
		'slug'                  => 'services',
		'with_front'            => false,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __('Service', 'sai_functions'),
		'description'           => __('Service information pages.', 'sai_functions'),
		'labels'                => $labels,
		'supports'              => array('title', 'editor', 'thumbnail', 'page-attributes'),
		'taxonomies'            => array(),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 12,
		'menu_icon'             => 'dashicons-businesswoman',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
		'show_in_rest' => true,
	);
	register_post_type('service', $args);
}
add_action('init', 'wcphx_services_post_type', 0);
