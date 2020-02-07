<?php

// Register Custom Post Type
function icr_service_post_type()
{

  $labels = array(
    'name'                  => _x('Services', 'Post Type General Name', 'icreon_genesis'),
    'singular_name'         => _x('Service', 'Post Type Singular Name', 'icreon_genesis'),
    'menu_name'             => __('Services', 'icreon_genesis'),
    'name_admin_bar'        => __('Service', 'icreon_genesis'),
    'archives'              => __('Service Archives', 'icreon_genesis'),
    'attributes'            => __('Service Attributes', 'icreon_genesis'),
    'parent_item_colon'     => __('Parent Service:', 'icreon_genesis'),
    'all_items'             => __('All Services', 'icreon_genesis'),
    'add_new_item'          => __('Add New Service', 'icreon_genesis'),
    'add_new'               => __('Add New', 'icreon_genesis'),
    'new_item'              => __('New Service', 'icreon_genesis'),
    'edit_item'             => __('Edit Service', 'icreon_genesis'),
    'update_item'           => __('Update Service', 'icreon_genesis'),
    'view_item'             => __('View Service', 'icreon_genesis'),
    'view_items'            => __('View Services', 'icreon_genesis'),
    'search_items'          => __('Search Service', 'icreon_genesis'),
    'not_found'             => __('Not found', 'icreon_genesis'),
    'not_found_in_trash'    => __('Not found in Trash', 'icreon_genesis'),
    'featured_image'        => __('Featured Image', 'icreon_genesis'),
    'set_featured_image'    => __('Set featured image', 'icreon_genesis'),
    'remove_featured_image' => __('Remove featured image', 'icreon_genesis'),
    'use_featured_image'    => __('Use as featured image', 'icreon_genesis'),
    'insert_into_item'      => __('Insert into service', 'icreon_genesis'),
    'uploaded_to_this_item' => __('Uploaded to this service', 'icreon_genesis'),
    'items_list'            => __('Services list', 'icreon_genesis'),
    'items_list_navigation' => __('Services list navigation', 'icreon_genesis'),
    'filter_items_list'     => __('Filter services list', 'icreon_genesis'),
  );
  $rewrite = array(
    'slug'                  => 'services',
    'with_front'            => true,
    'pages'                 => true,
    'feeds'                 => true,
  );
  $args = array(
    'label'                 => __('Service', 'icreon_genesis'),
    'description'           => __('Site services.', 'icreon_genesis'),
    'labels'                => $labels,
    'supports'              => array('title', 'editor', 'thumbnail', 'revisions', 'page-attributes'),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-cart',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => 'services',
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'rewrite'               => $rewrite,
    'capability_type'       => 'page',
    'show_in_rest'          => 'true',
  );
  register_post_type('service', $args);
}
add_action('init', 'icr_service_post_type', 0);
