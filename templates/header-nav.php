
<header class="header_area <?php echo lorahost_header_class(); ?>">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container box_1620">
                <?php
                // Header Logo
                    echo lorahost_theme_logo( 'navbar-brand logo_h' );
                ?>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <?php
                    //
                    if( has_nav_menu( 'primary-menu' ) ) {
                        $args = array(
                            'theme_location' => 'primary-menu',
                            'container'      => '',
                            'depth'          => 2,
                            'menu_class'     => 'nav navbar-nav menu_nav justify-content-end',
                            'fallback_cb'    => 'lorahost_bootstrap_navwalker::fallback',
                            'walker'         => new lorahost_bootstrap_navwalker(),
                        );  
                        wp_nav_menu( $args );
                    }

                    $liveChat = lorahost_opt( 'lorahost_header_live_chat_btn_label' );
                    $cta_btn  = lorahost_opt( 'lorahost_header_CallToAction' );

                    if( !empty( $liveChat ) || !empty( $cta_btn )  ) {
	                    ?>
                        <div class="nav-right text-center text-lg-right py-4 py-lg-0">
		                    <?php
		                    if ( ! empty( $liveChat ) ) {
			                    echo '<a id="cliv_chat_btn" class="button button-link mr-4" href="#"><span class="align-middle"><i class="ti-comments"></i></span> ' . esc_html( $liveChat ) . ' </a>';
		                    }

		                    if ( ! empty( $cta_btn ) ) {
			                    echo '<a class="button button-outline button-small" href="' . esc_url( lorahost_opt( 'lorahost_header_cta_url' ) ) . '">' . esc_html( $cta_btn ) . '</a>';
		                    }
		                    ?>

                        </div>
	                    <?php
                    } ?>
                </div>
            </div>
        </nav>
    </div>
</header>

