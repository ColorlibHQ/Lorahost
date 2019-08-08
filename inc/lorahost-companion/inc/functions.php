<?php 
/**
 * @Packge     : lorahost Companion
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

if( ! defined( 'WPINC' ) ) {
    die;
}

// Add Image Size
add_image_size( 'lorahost_360x310', 360, 355, true );
add_image_size( 'lorahost_portfolio_945x495', 945, 495, true );



// Instagram object Instance
function lorahost_instagram_instance() {
    
    $api = Wpzoom_Instagram_Widget_API::getInstance();

    return $api;
}

// Blog Section ================================
function lorahost_blog_section( $postnumber ) {
     
    $date_format = get_option( 'date_format' );

    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => esc_html( $postnumber ),
    );
    
    $query = new WP_Query( $args );
    
    if( $query->have_posts() ):
        while( $query->have_posts() ):
            $query->the_post();
            ?>
            <div class="col-lg-4 col-md-6">
                <div class="single-blog">
                    <?php
                    if( has_post_thumbnail() ) { ?>
                        <div class="thumb">
                            <?php
                            the_post_thumbnail( 'lorahost_360x310', array( 'class' => 'img-fluid' ) );
                            ?>
                        </div>
                        <?php
                    } ?>
                    <div class="short_details">
                        <div class="meta-top d-flex">
                            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
                                <i class="ti-user"></i><?php the_author(); ?>
                            </a>
                            <a href="<?php echo lorahost_blog_date_permalink() ?>"><i class="ti-calendar"></i><?php the_time( $date_format ) ?></a>
                        </div>
                        <a class="d-block" href="<?php the_permalink(); ?>">
                            <h4><?php the_title(); ?></h4>
                        </a>
                        <div class="text-wrap">
                            <p> <?php echo wp_trim_words( get_the_content(), 18, '' ) ?> </p>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="primary_btn2"><?php echo esc_html__('Learn More', 'lorahost'); ?></a>
                    </div>
                </div>
            </div>

            <?php
        endwhile;
        wp_reset_postdata();
    endif;
}


// Section Heading ===========================================
function lorahost_section_heading( $title = '', $subtitle = '' ) {
    if( $title || $subtitle ):
    ?>
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                <?php 
                    // Title
                    if( $title ){
                        echo lorahost_heading_tag(
                            array(
                                'tag'    => 'h1',
                                'class'  => 'mb-10',
                                'text'   => esc_html( $title ),
                            )
                        );
                    }
                    // Sub Title
                    if( $subtitle ){
                        echo lorahost_paragraph_tag(
                            array(
                                'text'  => esc_html( $subtitle ),
                            )
                        );
                    }
                    ?>
                </div>
            </div>
        </div>
    <?php
    endif;
}

// Set contact form 7 default form template
function lorahost_contact7_form_content( $template, $prop ) {
    
    if ( 'form' == $prop ) {

        $template =
            '<div class="row"><div class="col-12"><div class="form-group">[textarea* your-message id:message class:form-control class:w-100 rows:9 cols:30 placeholder "Message"]</div></div><div class="col-sm-6"><div class="form-group">[text* your-name id:name class:form-control placeholder "Enter your  name"]</div></div><div class="col-sm-6"><div class="form-group">[email* your-email id:email class:form-control placeholder "Enter your email"]</div></div><div class="col-12"><div class="form-group">[text your-subject id:subject class:form-control placeholder "Subject"]</div></div></div><div class="form-group mt-3">[submit class:button class:button-contactForm "Send Message"]</div>';

        return $template;

    } else {
    return $template;
    } 
}
add_filter( 'wpcf7_default_template', 'lorahost_contact7_form_content', 10, 2 );



// Post View set
function lorahost_set_post_views($postID) {
	$count_key = 'lorahost_post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
	}else{
		$count++;
		update_post_meta($postID, $count_key, $count);
	}
}



//Themify Icon
function lorahost_themify_icon(){
    return[
        'ti-home'       => 'Home',
        'ti-tablet'     => 'Tablet',
        'ti-email'      => 'Email',
        'ti-twitter'    => 'twitter',
        'ti-skype'      => 'skype',
        'ti-instagram'  => 'instagram',
        'ti-dribbble'   => 'dribbble',
        'ti-vimeo'      => 'vimeo',
    ];
}


// Remove "span" wraper into form6
add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    return $content;
});
