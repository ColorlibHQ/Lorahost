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

/**
 * Footer Area
 *
 * @Footer
 * @Back To Top Button
 *
 * @Hook lorahost_footer
 *
 * @Hooked  lorahost_footer_area 10
 * @Hooked  lorahost_back_to_top 20
 *
 */

do_action( 'lorahost_footer' );

wp_footer(); 
?>
</body>
</html>