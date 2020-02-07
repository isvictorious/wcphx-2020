<?php

// Register Custom Post Type
function icr_case_study_post_type()
{

  $labels = array(
    'name'                  => _x('Case Studies', 'Post Type General Name', 'icreon_genesis'),
    'singular_name'         => _x('Case Study', 'Post Type Singular Name', 'icreon_genesis'),
    'menu_name'             => __('Case Studies', 'icreon_genesis'),
    'name_admin_bar'        => __('Case Study', 'icreon_genesis'),
    'archives'              => __('Case Study Archives', 'icreon_genesis'),
    'attributes'            => __('Case Study Attributes', 'icreon_genesis'),
    'parent_item_colon'     => __('Parent Case Study:', 'icreon_genesis'),
    'all_items'             => __('All Case Studies', 'icreon_genesis'),
    'add_new_item'          => __('Add New Case Study', 'icreon_genesis'),
    'add_new'               => __('Add New', 'icreon_genesis'),
    'new_item'              => __('New Case Study', 'icreon_genesis'),
    'edit_item'             => __('Edit Case Study', 'icreon_genesis'),
    'update_item'           => __('Update Case Study', 'icreon_genesis'),
    'view_item'             => __('View Case Study', 'icreon_genesis'),
    'view_items'            => __('View Case Studies', 'icreon_genesis'),
    'search_items'          => __('Search Case Study', 'icreon_genesis'),
    'not_found'             => __('Not found', 'icreon_genesis'),
    'not_found_in_trash'    => __('Not found in Trash', 'icreon_genesis'),
    'featured_image'        => __('Featured Image', 'icreon_genesis'),
    'set_featured_image'    => __('Set featured image', 'icreon_genesis'),
    'remove_featured_image' => __('Remove featured image', 'icreon_genesis'),
    'use_featured_image'    => __('Use as featured image', 'icreon_genesis'),
    'insert_into_item'      => __('Insert into case study', 'icreon_genesis'),
    'uploaded_to_this_item' => __('Uploaded to this case study', 'icreon_genesis'),
    'items_list'            => __('Case Studies list', 'icreon_genesis'),
    'items_list_navigation' => __('Case Studies list navigation', 'icreon_genesis'),
    'filter_items_list'     => __('Filter case studies list', 'icreon_genesis'),
  );
  $rewrite = array(
    'slug'                  => 'case-studies',
    'with_front'            => true,
    'pages'                 => true,
    'feeds'                 => true,
  );
  $args = array(
    'label'                 => __('Case Study', 'icreon_genesis'),
    'description'           => __('Site case studies.', 'icreon_genesis'),
    'labels'                => $labels,
    'supports'              => array('title', 'editor', 'thumbnail', 'revisions', 'page-attributes'),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 12,
    'menu_icon'             => 'dashicons-media-interactive',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => 'case-studies',
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'rewrite'               => $rewrite,
    'capability_type'       => 'page',
    'show_in_rest'          => 'true',
  );
  register_post_type('case-study', $args);
}
add_action('init', 'icr_case_study_post_type', 0);
