<?php
/**
 * @Packge     : lorahost Companion
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

if( !defined( 'WPINC' ) ){
    die;
}

/*************************
    Define Constant
*************************/

// Define version constant
if( ! defined( 'LORAHOST_COMPANION_VERSION' ) ) {
    define( 'LORAHOST_COMPANION_VERSION', '1.0' );
}

// Define dir path constant
if( ! defined( 'LORAHOST_COMPANION_DIR_PATH' ) ) {
    define( 'LORAHOST_COMPANION_DIR_PATH', get_parent_theme_file_path().'/inc/lorahost-companion/' );
}

// Define inc dir path constant
if( ! defined( 'LORAHOST_COMPANION_INC_DIR_PATH' ) ) {
    define( 'LORAHOST_COMPANION_INC_DIR_PATH', LORAHOST_COMPANION_DIR_PATH . 'inc/' );
}

// Define sidebar widgets dir path constant
if( ! defined( 'LORAHOST_COMPANION_SW_DIR_PATH' ) ) {
    define( 'LORAHOST_COMPANION_SW_DIR_PATH', LORAHOST_COMPANION_INC_DIR_PATH . 'sidebar-widgets/' );
}

// Define elementor widgets dir path constant
if( ! defined( 'LORAHOST_COMPANION_EW_DIR_PATH' ) ) {
    define( 'LORAHOST_COMPANION_EW_DIR_PATH', LORAHOST_COMPANION_INC_DIR_PATH . 'elementor-widgets/' );
}

// Define demo data dir path constant
if( ! defined( 'LORAHOST_COMPANION_DEMO_DIR_PATH' ) ) {
    define( 'LORAHOST_COMPANION_DEMO_DIR_PATH', LORAHOST_COMPANION_INC_DIR_PATH . 'demo-data/' );
}

// Define plugin dir url constant
if( ! defined( 'LORAHOST_THEME_DIR_URL' ) ) {
    define( 'LORAHOST_THEME_DIR_URL', get_template_directory_uri() );
}

// Define inc dir url constant
if( ! defined( 'LORAHOST_COMPANION_DIR_URL' ) ) {
    define( 'LORAHOST_COMPANION_DIR_URL', LORAHOST_THEME_DIR_URL . '/inc/lorahost-companion/' );
}

// Define inc dir url constant
if( ! defined( 'LORAHOST_COMPANION_INC_DIR_URL' ) ) {
    define( 'LORAHOST_COMPANION_INC_DIR_URL', LORAHOST_COMPANION_DIR_URL . 'inc/' );
}

// Define elementor-widgets dir url constant
if( ! defined( 'LORAHOST_COMPANION_META_DIR_URL' ) ) {
    define( 'LORAHOST_COMPANION_META_DIR_URL', LORAHOST_COMPANION_INC_DIR_URL . 'lorahost-meta/' );
}

// Define elementor-widgets dir url constant
if( ! defined( 'LORAHOST_COMPANION_EW_DIR_URL' ) ) {
    define( 'LORAHOST_COMPANION_EW_DIR_URL', LORAHOST_COMPANION_INC_DIR_URL . 'elementor-widgets/' );
}

// Define elementor-widgets dir url constant
if( ! defined( 'LORAHOST_COMPANION_DEMO_DIR_URL' ) ) {
    define( 'LORAHOST_COMPANION_DEMO_DIR_URL', LORAHOST_COMPANION_INC_DIR_URL . 'demo-data/' );
}

