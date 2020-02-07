<?php

// Register Custom Post Type
function icr_client_post_type()
{

  $labels = array(
    'name'                  => _x('Clients', 'Post Type General Name', 'icreon_genesis'),
    'singular_name'         => _x('Client', 'Post Type Singular Name', 'icreon_genesis'),
    'menu_name'             => __('Clients', 'icreon_genesis'),
    'name_admin_bar'        => __('Client', 'icreon_genesis'),
    'archives'              => __('Client Archives', 'icreon_genesis'),
    'attributes'            => __('Client Attributes', 'icreon_genesis'),
    'parent_item_colon'     => __('Parent Client:', 'icreon_genesis'),
    'all_items'             => __('All Clients', 'icreon_genesis'),
    'add_new_item'          => __('Add New Client', 'icreon_genesis'),
    'add_new'               => __('Add New', 'icreon_genesis'),
    'new_item'              => __('New Client', 'icreon_genesis'),
    'edit_item'             => __('Edit Client', 'icreon_genesis'),
    'update_item'           => __('Update Client', 'icreon_genesis'),
    'view_item'             => __('View Client', 'icreon_genesis'),
    'view_items'            => __('View Clients', 'icreon_genesis'),
    'search_items'          => __('Search Client', 'icreon_genesis'),
    'not_found'             => __('Not found', 'icreon_genesis'),
    'not_found_in_trash'    => __('Not found in Trash', 'icreon_genesis'),
    'featured_image'        => __('Featured Image', 'icreon_genesis'),
    'set_featured_image'    => __('Set featured image', 'icreon_genesis'),
    'remove_featured_image' => __('Remove featured image', 'icreon_genesis'),
    'use_featured_image'    => __('Use as featured image', 'icreon_genesis'),
    'insert_into_item'      => __('Insert into client', 'icreon_genesis'),
    'uploaded_to_this_item' => __('Uploaded to this client', 'icreon_genesis'),
    'items_list'            => __('Clients list', 'icreon_genesis'),
    'items_list_navigation' => __('Clients list navigation', 'icreon_genesis'),
    'filter_items_list'     => __('Filter clients list', 'icreon_genesis'),
  );
  $rewrite = array(
    'slug'                  => 'clients',
    'with_front'            => true,
    'pages'                 => true,
    'feeds'                 => true,
  );
  $args = array(
    'label'                 => __('Client', 'icreon_genesis'),
    'description'           => __('Site clients.', 'icreon_genesis'),
    'labels'                => $labels,
    'supports'              => array('title', 'editor', 'thumbnail', 'revisions', 'page-attributes'),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-admin-users',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => 'clients',
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'rewrite'               => $rewrite,
    'capability_type'       => 'page',
    'show_in_rest'          => 'true',
  );
  register_post_type('client', $args);
}
add_action('init', 'icr_client_post_type', 0);