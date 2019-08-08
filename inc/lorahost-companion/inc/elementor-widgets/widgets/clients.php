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

class Lorahost_Clients extends Widget_Base {

	public function get_name() {
		return 'lorahost-clients';
	}

	public function get_title() {
		return __( 'Clients', 'lorahost' );
	}

	public function get_icon() {
		return 'eicon-logo';
	}

	public function get_categories() {
		return [ 'lorahost-elements' ];
	}

	protected function _register_controls() {
        


        
		// ----------------------------------------  Clients content ------------------------------
		$this->start_controls_section(
			'client_logo',
			[
				'label' => __( 'Client Logo', 'lorahost' ),
			]
        );
		$this->add_control(
			'section_title', [
				'label' => __( 'Section Title', 'lorahost' ),
				'type'  => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => esc_html__( 'Trusted by 12,0000+ happy customer worldwide', 'lorahost' )

			]
		);
		$this->add_control(
			'logo_carousel', [
				'label' => __( 'Logo Carousel', 'lorahost' ),
				'type'  => Controls_Manager::GALLERY

			]
		);

		$this->end_controls_section(); // End Sponsor Company Logo

		//------------------------------ Style title ------------------------------
		$this->start_controls_section(
			'style_textcolor', [
				'label' => __( 'Style Title', 'lorahost' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'title_color', [
				'label'     => __( 'Title Color', 'lorahost' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#888888',
				'selectors' => [
					'{{WRAPPER}} .client-logo-title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name'      => 'typography_title',
				'selector'  => '{{WRAPPER}} .client-logo-title',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
    $this->load_widget_script();
    $settings = $this->get_settings();
    $logo_carousel = $settings['logo_carousel'];
    ?>

        <section class="client-logos">
            <div class="container">
                <div class="text-center">
                    <?php
                    if( !empty( $settings['section_title'] ) ){
                        echo '<h3 class="client-logo-title">'. esc_html( $settings['section_title'] ) .'</h3>';
                    }
                    ?>

                </div>
                <div class="owl-carousel owl-theme logo-carousel">

	                <?php
	                if( !empty( $logo_carousel ) && count( $logo_carousel ) > 0 ){
		                foreach ( $logo_carousel as $logo ) { ?>
                            <div class="logo-carousel-item">
                                <?php echo '<img class="img-fluid" src="'. esc_url( $logo['url'] ) .'" alt="'. esc_html__('Client Logo', 'lorahost') .'">'; ?>
                            </div>
			                <?php
		                }
	                }
	                ?>

                </div>
            </div>
        </section>


    <?php

    }
    // Js function support
	public function load_widget_script(){
		if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
			?>
            <script>
                ( function( $ ){

                    $('.logo-carousel').owlCarousel({
                        loop: false,
                        margin: 30,
                        items: 2,
                        nav: false,
                        dots: false,
                        responsiveClass: true,
                        slideSpeed: 300,
                        responsive: {
                            590: {
                                items: 3
                            },
                            1000: {
                                items: 4
                            },
                            1200: {
                                items: 5
                            }
                        }
                    });

                })(jQuery);
            </script>
			<?php
		}
	}
	
}
