<?php


/**
 * Restrict blocks for promotions post type
 *
 * @param [type] $allowed_blocks
 * @param [type] $post
 * @return void
 * 
 * @link https://rudrastyh.com/gutenberg/remove-default-blocks.html
 */
function wcphx_promotion_allowed_blocks( $allowed_blocks, $post ) {
 
	if( $post->post_type === 'promotion' ) {
		$allowed_blocks = array(
			'core/paragraph',
			'core/image',
			'core/heading',
			// 'core/gallery',
			// 'core/list',
			// 'core/quote',
			// 'core/audio',
			// 'core/cover',
			// 'core/columns',
			'core/video',
			// 'core/table',
			// 'core/verse',
			// 'core/code',
			// 'core/freeform',
			// 'core/html',
			// 'core/preformatted',
			// 'core/pullquote',
			// 'core/button',
			// 'core/text-columns',
			// 'core/media-text',
			// 'core/more',
			// 'core/nextpage',
			// 'core/separator',
			// 'core/spacer',
			// 'core/shortcode',
			// 'core/archives',
			// 'core/categories',
			// 'core/latest-comments',
			// 'core/latest-posts',
			// 'core/calendar',
			// 'core/rss',
			// 'core/search',
			// 'core/tag-cloud',
			// 'core/embed',
			// 'core-embed/twitter',
			// 'core-embed/youtube',
			// 'core-embed/facebook',
			// 'core-embed/instagram',
			// 'core-embed/wordpress',
			// 'core-embed/soundcloud',
			// 'core-embed/spotify',
			// 'core-embed/flickr',
			// 'core-embed/vimeo',
			// 'core-embed/animoto',
			// 'core-embed/cloudup',
			// 'core-embed/collegehumor',
			// 'core-embed/dailymotion',
			// 'core-embed/funnyordie',
			// 'core-embed/hulu',
			// 'core-embed/imgur',
			// 'core-embed/issuu',
			// 'core-embed/kickstarter',
			// 'core-embed/meetup-com',
			// 'core-embed/mixcloud',
			// 'core-embed/photobucket',
			// 'core-embed/polldaddy',
			// 'core-embed/reddit',
			// 'core-embed/reverbnation',
			// 'core-embed/screencast',
			// 'core-embed/scribd',
			// 'core-embed/slideshare',
			// 'core-embed/smugmug',
			// 'core-embed/speaker',
			// 'core-embed/ted',
			// 'core-embed/tumblr',
			// 'core-embed/videopress',
			// 'core-embed/wordpress-tv'
		);
	}
 
 
	return $allowed_blocks;
}
add_filter( 'allowed_block_types', 'wcphx_promotion_allowed_blocks', 10, 2 );



// Register Custom Post Type
function wcphx_promotion_post_type()
{

  $labels = array(
    'name'                  => _x('Promotions', 'Post Type General Name', 'icreon_genesis'),
    'singular_name'         => _x('Promotion', 'Post Type Singular Name', 'icreon_genesis'),
    'menu_name'             => __('Promotions', 'icreon_genesis'),
    'name_admin_bar'        => __('Promotion', 'icreon_genesis'),
    'archives'              => __('Promotion Archives', 'icreon_genesis'),
    'attributes'            => __('Promotion Attributes', 'icreon_genesis'),
    'parent_item_colon'     => __('Parent Promotion:', 'icreon_genesis'),
    'all_items'             => __('All Promotions', 'icreon_genesis'),
    'add_new_item'          => __('Add New Promotion', 'icreon_genesis'),
    'add_new'               => __('Add New', 'icreon_genesis'),
    'new_item'              => __('New Promotion', 'icreon_genesis'),
    'edit_item'             => __('Edit Promotion', 'icreon_genesis'),
    'update_item'           => __('Update Promotion', 'icreon_genesis'),
    'view_item'             => __('View Promotion', 'icreon_genesis'),
    'view_items'            => __('View Promotions', 'icreon_genesis'),
    'search_items'          => __('Search Promotion', 'icreon_genesis'),
    'not_found'             => __('Not found', 'icreon_genesis'),
    'not_found_in_trash'    => __('Not found in Trash', 'icreon_genesis'),
    'featured_image'        => __('Featured Image', 'icreon_genesis'),
    'set_featured_image'    => __('Set featured image', 'icreon_genesis'),
    'remove_featured_image' => __('Remove featured image', 'icreon_genesis'),
    'use_featured_image'    => __('Use as featured image', 'icreon_genesis'),
    'insert_into_item'      => __('Insert into promotion', 'icreon_genesis'),
    'uploaded_to_this_item' => __('Uploaded to this promotion', 'icreon_genesis'),
    'items_list'            => __('Promotions list', 'icreon_genesis'),
    'items_list_navigation' => __('Promotions list navigation', 'icreon_genesis'),
    'filter_items_list'     => __('Filter promotions list', 'icreon_genesis'),
  );
  $rewrite = array(
    'slug'                  => 'go',
    'with_front'            => true,
    'pages'                 => true,
    'feeds'                 => true,
  );
  $args = array(
    'label'                 => __('Promotion', 'icreon_genesis'),
    'description'           => __('Site promotions.', 'icreon_genesis'),
    'labels'                => $labels,
    'supports'              => array('title', 'editor', 'thumbnail', 'revisions', 'page-attributes'),
		'hierarchical'          => false,
		// 'capabilities' => array(
		// 	'read_post'					=> 'read_promotion',
		// 	'read_private_posts' 		=> 'read_private_promotions',
		// 	'edit_post'					=> 'edit_promotion',
		// 	'edit_posts'				=> 'edit_promotions',
		// ),
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 12,
    'menu_icon'             => 'dashicons-megaphone',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => false,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'rewrite'               => $rewrite,
    'capability_type'       => 'page',
    'show_in_rest'          => 'true',
  );
  register_post_type('promotion', $args);
}
add_action('init', 'wcphx_promotion_post_type', 0);


