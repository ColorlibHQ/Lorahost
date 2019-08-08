<?php 
// Copy right text
$url = 'https://colorlib.com/';
$copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'lorahost' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );

?>

<div class="footer-bottom row align-items-center text-center text-lg-left">
    <p class="footer-text m-0 col-lg-8 col-md-12">
        <?php echo wp_kses_post( lorahost_opt( 'lorahost-copyright-text-settings', $copyText ) ); ?>
    </p>

        <?php
        if( has_nav_menu('social-menu') ){
	        $args = array(
		        'theme_location' => 'social-menu',
		        'container'      => '',
		        'depth'          => 1,
		        'menu_class'     => 'col-lg-4 col-md-12 text-center text-lg-right footer-social',
		        'fallback_cb'    => 'lorahost_social_navwalker::fallback',
		        'walker'         => new lorahost_social_navwalker(),
	        );
	        wp_nav_menu( $args );

        }

        ?>
</div>


