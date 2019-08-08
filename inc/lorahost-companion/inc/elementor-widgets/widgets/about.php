<?php
namespace lorahostelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 *
 * lorahost elementor section widget.
 *
 * @since 1.0
 */
class Lorahost_About extends Widget_Base {

	public function get_name() {
		return 'lorahost-about';
	}

	public function get_title() {
		return __( 'About', 'lorahost' );
	}

	public function get_icon() {
		return 'eicon-post-info';
	}

	public function get_categories() {
		return [ 'lorahost-elements' ];
	}

	protected function _register_controls() {

        
		// ----------------------------------------  About content ------------------------------
		$this->start_controls_section(
			'about_sec',
			[
				'label' => __( 'About', 'lorahost' ),
			]
        );

        $this->add_control(
            'about_content',
            [
                'label'         => esc_html__( 'Content', 'lorahost' ),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true
            ]
        );

        $this->add_control(
            'feature_img',
            [
                'label'         => esc_html__( 'About Feature Image', 'lorahost' ),
                'type'          => Controls_Manager::MEDIA,
                'label_block'   => true,
            ]
        );

        $this->end_controls_section(); // End about content
        

	}

	protected function render() {
    $settings = $this->get_settings();

    ?>
    <section class="section-margin">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-5 mb-lg-0">
                    <?php
                    if( !empty( $settings['about_content'] ) ){
                        echo wp_kses_post( $settings['about_content'] );
                    }
                    ?>
                </div>
                <div class="col-lg-7">
                    <div class="text-center">
                        <?php
                        if( !empty( $settings['feature_img']['url'] ) ){
                            echo '<img class="img-fluid" src="'. esc_url(  $settings['feature_img']['url'] ) .'" alt="'. esc_html__('about feature image', 'lorahost') .'">';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php

    }

}