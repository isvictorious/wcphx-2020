<?php

// Register Custom Post Type
function icr_career_post_type()
{

  $labels = array(
    'name'                  => _x('Careers', 'Post Type General Name', 'icreon_genesis'),
    'singular_name'         => _x('Career', 'Post Type Singular Name', 'icreon_genesis'),
    'menu_name'             => __('Careers', 'icreon_genesis'),
    'name_admin_bar'        => __('Career', 'icreon_genesis'),
    'archives'              => __('Career Archives', 'icreon_genesis'),
    'attributes'            => __('Career Attributes', 'icreon_genesis'),
    'parent_item_colon'     => __('Parent Career:', 'icreon_genesis'),
    'all_items'             => __('All Careers', 'icreon_genesis'),
    'add_new_item'          => __('Add New Career', 'icreon_genesis'),
    'add_new'               => __('Add New', 'icreon_genesis'),
    'new_item'              => __('New Career', 'icreon_genesis'),
    'edit_item'             => __('Edit Career', 'icreon_genesis'),
    'update_item'           => __('Update Career', 'icreon_genesis'),
    'view_item'             => __('View Career', 'icreon_genesis'),
    'view_items'            => __('View Careers', 'icreon_genesis'),
    'search_items'          => __('Search Career', 'icreon_genesis'),
    'not_found'             => __('Not found', 'icreon_genesis'),
    'not_found_in_trash'    => __('Not found in Trash', 'icreon_genesis'),
    'featured_image'        => __('Featured Image', 'icreon_genesis'),
    'set_featured_image'    => __('Set featured image', 'icreon_genesis'),
    'remove_featured_image' => __('Remove featured image', 'icreon_genesis'),
    'use_featured_image'    => __('Use as featured image', 'icreon_genesis'),
    'insert_into_item'      => __('Insert into career', 'icreon_genesis'),
    'uploaded_to_this_item' => __('Uploaded to this career', 'icreon_genesis'),
    'items_list'            => __('Careers list', 'icreon_genesis'),
    'items_list_navigation' => __('Careers list navigation', 'icreon_genesis'),
    'filter_items_list'     => __('Filter careers list', 'icreon_genesis'),
  );
  $rewrite = array(
    'slug'                  => 'careers',
    'with_front'            => true,
    'pages'                 => true,
    'feeds'                 => true,
  );
  $args = array(
    'label'                 => __('Career', 'icreon_genesis'),
    'description'           => __('Site careers.', 'icreon_genesis'),
    'labels'                => $labels,
    'supports'              => array('title', 'editor', 'thumbnail', 'revisions', 'page-attributes'),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-welcome-learn-more',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => 'careers',
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'rewrite'               => $rewrite,
    'capability_type'       => 'page',
    'show_in_rest'          => 'true',
  );
  register_post_type('career', $args);
}
add_action('init', 'icr_career_post_type', 0);
