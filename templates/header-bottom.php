<?php 
	$id     = get_the_ID();
	$bgopt  = get_post_meta( absint( $id ), '_lorahost_builderpage_headerimg', true );

	$glob_class = ' global-banner';
	$setbgurl   = '';

	if ( $bgopt == 'featured' ) {
		$setbgurl   = get_the_post_thumbnail_url( absint( $id ) );
		$glob_class = '';
	}

	$headerBg     =  'style="background:url('.esc_url( get_header_image() ).')"';

	?>
    <section class="hero-banner hero-banner-sm text-center <?php echo esc_attr( $glob_class ) ?>" <?php if( !empty( get_header_image() ) ){ echo $headerBg; } ?>>
        <div class="container">
            <?php
            if ( is_archive() ) {
                the_archive_title('<h1 class="hero-title">', '</h1>');
            } elseif ( is_home() ) {
                echo '<h1 class="hero-title">'.esc_html__( 'Blog', 'lorahost' ).'</h1>';
            }
            elseif( is_singular('portfolio') ){
                the_title( '<h1 class="hero-title">', '</h1>' );
            }
            elseif( is_single() ){
                the_title( '<h1 class="hero-title">', '</h1>' );
            }
            elseif ( is_search() ) {
                echo '<h1 class="hero-title">'.esc_html__( 'Search Result', 'lorahost' ).'</h1>';
            } else {
                the_title( '<h1 class="hero-title">', '</h1>' );
            }
            
            ?>
            <nav aria-label="breadcrumb" class="banner-breadcrumb">
                <?php lorahost_breadcrumbs(); ?> 
            </nav>
        </div>
    </section>



