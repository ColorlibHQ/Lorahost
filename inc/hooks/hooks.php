<?php 
/**
 * @Packge 	   : lorahost
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
// Block direct access
if( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
 *
 * Before Wrapper
 *
 * @Preloader
 *
 */
add_action( 'lorahost_preloader', 'lorahost_site_preloader', 10 );

/**
 * Header
 *
 * @Header Menu
 * @Header Bottom
 * 
 */

add_action( 'lorahost_header', 'lorahost_header_cb', 10 );

/**
 * Hook for footer
 *
 */
add_action( 'lorahost_footer', 'lorahost_footer_area', 10 );
add_action( 'lorahost_footer', 'lorahost_back_to_top', 20 );

/**
 * Hook for Blog, single, page, search, archive pages wrapper.
 */
add_action( 'lorahost_wrp_start', 'lorahost_wrp_start_cb', 10 );
add_action( 'lorahost_wrp_end', 'lorahost_wrp_end_cb', 10 );

/**
 * Hook for Page wrapper.
 */
add_action( 'lorahost_page_wrp_start', 'lorahost_page_wrp_start_cb', 10 );
add_action( 'lorahost_page_wrp_end', 'lorahost_page_wrp_end_cb', 10 );

/**
 * Hook for Blog, single, search, archive pages column.
 */
add_action( 'lorahost_blog_col_start', 'lorahost_blog_col_start_cb', 10 );
add_action( 'lorahost_blog_col_end', 'lorahost_blog_col_end_cb', 10 );

/**
 * Hook for Page column.
 */
add_action( 'lorahost_page_col_start', 'lorahost_page_col_start_cb', 10 );
add_action( 'lorahost_page_col_end', 'lorahost_page_col_end_cb', 10 );

/**
 * Hook for blog posts thumbnail.
 */
add_action( 'lorahost_blog_posts_thumb', 'lorahost_blog_posts_thumb_cb', 10 );
/**
 * Hook for blog posts Date Meta.
 */
add_action( 'lorahost_blog_post_date', 'lorahost_blog_post_date_cb', 10 );

/**
 * Hook for blog posts title.
 */
add_action( 'lorahost_blog_posts_title', 'lorahost_blog_posts_title_cb', 10 );

/**
 * Hook for blog posts meta.
 */
add_action( 'lorahost_blog_posts_meta', 'lorahost_blog_posts_meta_cb', 10 );

/**
 * Hook for blog posts bottom meta.
 */
add_action( 'lorahost_blog_posts_bottom_meta', 'lorahost_blog_posts_bottom_meta_cb', 10 );

/**
 * Hook for blog posts excerpt.
 */
add_action( 'lorahost_blog_posts_excerpt', 'lorahost_blog_posts_excerpt_cb', 10 );

/**
 * Hook for blog posts content.
 */
add_action( 'lorahost_blog_posts_content', 'lorahost_blog_posts_content_cb', 10 );

/**
 * Hook for blog sidebar.
 */
add_action( 'lorahost_blog_sidebar', 'lorahost_blog_sidebar_cb', 10 );

/**
 * Hook for page sidebar.
 */
add_action( 'lorahost_page_sidebar', 'lorahost_page_sidebar_cb', 10 );

/**
 * Hook for blog single post social share option.
 */
add_action( 'lorahost_blog_posts_share', 'lorahost_blog_posts_share_cb', 10 );

/**
 * Hook for blog single post meta category, tag, next - previous link and comments form.
 */
add_action( 'lorahost_blog_single_meta', 'lorahost_blog_single_meta_cb', 10 );

/**
 * Hook for blog single footer nav next - previous link and comments form.
 */
add_action( 'lorahost_blog_single_footer_nav', 'lorahost_blog_single_footer_nav_cb', 10 );

/**
 * Hook for page content.
 */
add_action( 'lorahost_page_content', 'lorahost_page_content_cb', 10 );


/**
 * Hook for 404 page.
 */
add_action( 'lorahost_fof', 'lorahost_fof_cb', 10 );
