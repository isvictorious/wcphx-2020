<?php
/**
 * Genesis Sample appearance settings.
 *
 * @package Genesis Sample
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://www.studiopress.com/
 */

$genesis_sample_default_colors = array(
	'link'   => '#0073e5',
	'accent' => '#0073e5',
);

$genesis_sample_link_color = get_theme_mod(
	'genesis_sample_link_color',
	$genesis_sample_default_colors['link']
);

$genesis_sample_accent_color = get_theme_mod(
	'genesis_sample_accent_color',
	$genesis_sample_default_colors['accent']
);

$genesis_sample_link_color_contrast   = genesis_sample_color_contrast( $genesis_sample_link_color );
$genesis_sample_link_color_brightness = genesis_sample_color_brightness( $genesis_sample_link_color, 35 );

return array(
	'fonts-url'            => 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,700&display=swap',
	'content-width'        => 1062,
	'button-bg'            => $genesis_sample_link_color,
	'button-color'         => $genesis_sample_link_color_contrast,
	'button-outline-hover' => $genesis_sample_link_color_brightness,
	'link-color'           => $genesis_sample_link_color,
	'default-colors'       => $genesis_sample_default_colors,
	'editor-color-palette' => array(
		array(
			'name'  => __( 'Custom color', 'genesis-sample' ), // Called “Link Color” in the Customizer options. Renamed because “Link Color” implies it can only be used for links.
			'slug'  => 'theme-primary',
			'color' => $genesis_sample_link_color,
		),
		array(
			'name'  => __( 'Accent color', 'genesis-sample' ),
			'slug'  => 'theme-secondary',
			'color' => $genesis_sample_accent_color,
    ),
    array(
      'name'  => __('Light Navy', 'ea_genesis_child'),
      'slug'  => 'light-navy',
      'color'  => '#104082',
    ),
    array(
      'name'  => __('Warm Purple', 'ea_genesis_child'),
      'slug'  => 'warm-purple',
      'color'  => '#59BACC',
    ),
    array(
      'name'  => __('Black', 'ea_genesis_child'),
      'slug'  => 'black',
      'color'  => '#000000',
    ),
    array(
      'name'  => __('Celadon', 'ea_genesis_child'),
      'slug'  => 'celadon',
      'color'  => '#BEF0BD',
    ),
	),
	'editor-font-sizes'    => array(
		array(
			'name' => __( 'Small', 'genesis-sample' ),
			'size' => 12,
			'slug' => 'small',
		),
		array(
			'name' => __( 'Normal', 'genesis-sample' ),
			'size' => 18,
			'slug' => 'normal',
		),
		array(
			'name' => __( 'Large', 'genesis-sample' ),
			'size' => 20,
			'slug' => 'large',
		),
		array(
			'name' => __( 'Larger', 'genesis-sample' ),
			'size' => 24,
			'slug' => 'larger',
		),
	),
);
