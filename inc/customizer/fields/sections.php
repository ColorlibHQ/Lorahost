<?php 
/**
 * @Packge     : lorahost
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

// Block direct access
if( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}

/***********************************
 * Register customizer panels
 ***********************************/

$panels = array(
    /**
     * Theme Options Panel
     */
    array(
        'id'   => 'lorahost_options_panel',
        'args' => array(
            'priority'       => 0,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => esc_html__( 'Theme Options', 'lorahost' ),
        ),
    )
);


/***********************************
 * Register customizer sections
 ***********************************/


$sections = array(
    /**
     * General Section
     */
    array(
        'id'   => 'lorahost_general_options_section',
        'args' => array(
            'title'    => esc_html__( 'General', 'lorahost' ),
            'panel'    => 'lorahost_options_panel',
            'priority' => 1,
        ),
    ),
    /**
     * Header Section
     */
    array(
        'id'   => 'lorahost_headertop_options_section',
        'args' => array(
            'title'    => esc_html__( 'Header', 'lorahost' ),
            'panel'    => 'lorahost_options_panel',
            'priority' => 2,
        ),
    ),
    /**
     * Blog Section
     */
    array(
        'id'   => 'lorahost_blog_options_section',
        'args' => array(
            'title'    => esc_html__( 'Blog', 'lorahost' ),
            'panel'    => 'lorahost_options_panel',
            'priority' => 3,
        ),
    ),

	/**
	 * Page Section
	 */
	array(
		'id'   => 'lorahost_page_options_section',
		'args' => array(
			'title'    => esc_html__( 'page', 'lorahost' ),
			'panel'    => 'lorahost_options_panel',
			'priority' => 4,
		),
    ),
    

	/**
     * 404 Page Section
     */
    array(
        'id'   => 'lorahost_fof_options_section',
        'args' => array(
            'title'    => esc_html__( '404 Page', 'lorahost' ),
            'panel'    => 'lorahost_options_panel',
            'priority' => 7,
        ),
    ),
    /**
     * Footer Section
     */
    array(
        'id'   => 'lorahost_footer_options_section',
        'args' => array(
            'title'    => esc_html__( 'Footer', 'lorahost' ),
            'panel'    => 'lorahost_options_panel',
            'priority' => 8,
        ),
    ),

);


/***********************************
 * Add customizer elements
 ***********************************/
$collection = array(
    'panel'   => $panels,
    'section' => $sections,
);

Epsilon_Customizer::add_multiple( $collection );
