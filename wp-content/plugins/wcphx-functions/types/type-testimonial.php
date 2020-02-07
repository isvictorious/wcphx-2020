<?php

// Register Custom Post Type
function wcphx_testimonial_post_type()
{

	$labels = array(
		'name'                  => _x('Testimonials', 'Post Type General Name', 'sai_functions'),
		'singular_name'         => _x('Testimonial', 'Post Type Singular Name', 'sai_functions'),
		'menu_name'             => __('Testimonials', 'sai_functions'),
		'name_admin_bar'        => __('Testimonial', 'sai_functions'),
		'archives'              => __('Testimonial Archives', 'sai_functions'),
		'attributes'            => __('Testimonial Attributes', 'sai_functions'),
		'parent_item_colon'     => __('Parent Testimonial:', 'sai_functions'),
		'all_items'             => __('All Testimonials', 'sai_functions'),
		'add_new_item'          => __('Add New Testimonial', 'sai_functions'),
		'add_new'               => __('Add New', 'sai_functions'),
		'new_item'              => __('New Testimonial', 'sai_functions'),
		'edit_item'             => __('Edit Testimonial', 'sai_functions'),
		'update_item'           => __('Update Testimonial', 'sai_functions'),
		'view_item'             => __('View Testimonial', 'sai_functions'),
		'view_items'            => __('View Testimonials', 'sai_functions'),
		'search_items'          => __('Search Testimonial', 'sai_functions'),
		'not_found'             => __('Not found', 'sai_functions'),
		'not_found_in_trash'    => __('Not found in Trash', 'sai_functions'),
		'featured_image'        => __('Featured Image', 'sai_functions'),
		'set_featured_image'    => __('Set featured image', 'sai_functions'),
		'remove_featured_image' => __('Remove featured image', 'sai_functions'),
		'use_featured_image'    => __('Use as featured image', 'sai_functions'),
		'insert_into_item'      => __('Insert into Testimonial', 'sai_functions'),
		'uploaded_to_this_item' => __('Uploaded to this Testimonial', 'sai_functions'),
		'items_list'            => __('Testimonials list', 'sai_functions'),
		'items_list_navigation' => __('Testimonials list navigation', 'sai_functions'),
		'filter_items_list'     => __('Filter Testimonials list', 'sai_functions'),
	);
	$args = array(
		'label'                 => __('Testimonial', 'sai_functions'),
		'description'           => __('Testimonial information page.', 'sai_functions'),
		'labels'                => $labels,
		'supports'              => array('title', 'thumbnail'),
		'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 12,
		'menu_icon'             => 'dashicons-awards',
		'show_in_admin_bar'     => false,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => false,
		'capability_type'       => 'post',
	);
	register_post_type('testimonial', $args);
}
add_action('init', 'wcphx_testimonial_post_type', 0);





/**
 * Testimonial CPT updates messages.
 *
 * @param array $messages Existing post update messages.
 *
 * @return array Amended testimonial CPT notices
 * 
 * @link https://www.sitepoint.com/wordpress-custom-post-types-notices-taxonomies/
 */
function wcphx_testimonial_notices( $messages ) {
    $post             = get_post();
    $post_type        = get_post_type( $post );
    $post_type_object = get_post_type_object( $post_type );

    $messages['testimonial'] = array(
        0  => '', // Unused. Messages start at index 1.
        1  => __( 'Testimonial updated.', 'textdomain' ),
        2  => __( 'Custom field updated.', 'textdomain' ),
        3  => __( 'Custom field deleted.', 'textdomain' ),
        4  => __( 'Testimonial updated.', 'textdomain' ),
        5  => isset( $_GET['revision'] ) ? sprintf( __( 'Testimonial restored to revision from %s', 'textdomain' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
        6  => __( 'Testimonial published.', 'textdomain' ),
        7  => __( 'Testimonial saved.', 'textdomain' ),
        8  => __( 'Testimonial submitted.', 'textdomain' ),
        9  => sprintf(
            __( 'Testimonial scheduled for: <strong>%1$s</strong>.', 'textdomain' ),
            date_i18n( __( 'M j, Y @ G:i', 'textdomain' ), strtotime( $post->post_date ) )
        ),
        10 => __( 'Testimonial draft updated.', 'textdomain' )
    );

    if ( $post_type_object->publicly_queryable ) {
        $permalink = get_permalink( $post->ID );

        $view_link = sprintf( ' <a href="%s">%s</a>', esc_url( $permalink ), __( 'View testimonial', 'textdomain' ) );
        $messages[ $post_type ][1] .= $view_link;
        $messages[ $post_type ][6] .= $view_link;
        $messages[ $post_type ][9] .= $view_link;

        $preview_permalink = add_query_arg( 'preview', 'true', $permalink );
        $preview_link      = sprintf( ' <a target="_blank" href="%s">%s</a>', esc_url( $preview_permalink ), __( 'Preview testimonial', 'textdomain' ) );
        $messages[ $post_type ][8] .= $preview_link;
        $messages[ $post_type ][10] .= $preview_link;
    }

    return $messages;
}
add_filter( 'post_updated_messages', 'wcphx_testimonial_notices' );
