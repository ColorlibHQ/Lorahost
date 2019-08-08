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
 * lorahost elementor about us section widget.
 *
 * @since 1.0
 */
class Lorahost_Banner extends Widget_Base {

	public function get_name() {
		return 'lorahost-banner';
	}

	public function get_title() {
		return __( 'Banner', 'lorahost' );
	}

	public function get_icon() {
		return 'eicon-banner';
	}

	public function get_categories() {
		return [ 'lorahost-elements' ];
	}

	protected function _register_controls() {


        // ----------------------------------------  content ------------------------------
        $this->start_controls_section(
            'banner_content',
            [
                'label' => __( 'Banner Section Content', 'lorahost' ),
            ]
        );
        $this->add_control(
            'banner_title',
            [
                'label'         => esc_html__( 'Title ', 'lorahost' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => esc_html__( 'POWERFUL WEB HOSTING', 'lorahost' ),
                'label_block'   => true
            ]
        );
        $this->add_control(
            'banner_subtitle',
            [
                'label'         => esc_html__( 'Sub Title ', 'lorahost' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => esc_html__( 'SMART COMPANY WITH PERFECT SPACE', 'lorahost' ),
                'label_block'   => true
            ]
        );
        $this->add_control(
            'banner_desc',
            [
                'label'         => esc_html__( 'Description', 'lorahost' ),
                'type'          => Controls_Manager::TEXTAREA,
                'default'       => esc_html__( 'Form male saying she\'d so every fifth winged after spirit male land moving won\'t seasons fish In shall given fifth edition', 'lorahost' ),
                'label_block'   => true
            ]
        );
        $this->add_control(
            'banner_btnlabel',
            [
                'label'         => esc_html__( 'Button Label', 'lorahost' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'Get Started', 'lorahost' )
            ]
        );
        $this->add_control(
            'banner_btnurl',
            [
                'label'         => esc_html__( 'Button URL', 'lorahost' ),
                'type'          => Controls_Manager::URL,
                'show_external' => false
            ]
        );

        $this->end_controls_section(); // End content




        //------------------------------ Style title ------------------------------
        $this->start_controls_section(
            'style_textcolor', [
                'label' => __( 'Style Content', 'lorahost' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_titleone', [
                'label'     => __( 'Title Color', 'lorahost' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .hero-banner h1' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_title',
                'selector'  => '{{WRAPPER}} .hero-banner h1',
            ]
        );
        $this->add_control(
            'subtitle_color', [
                'label'     => __( 'Sub Title Color', 'lorahost' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .hero-banner p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_subtitle',
                'selector'  => '{{WRAPPER}} .hero-banner p',
            ]
        );
        $this->add_control(
            'desc_color', [
                'label'     => __( 'Description Color', 'lorahost' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .hero-banner p.hero-subtitle' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_description',
                'selector'  => '{{WRAPPER}} .hero-banner p.hero-subtitle',
            ]
        );
		$this->add_control(
			'btn_label_color', [
				'label'     => __( 'Button Label Color', 'lorahost' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#fff',
				'selectors' => [
					'{{WRAPPER}} .banner_content .primary_btn' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_hover_label_color', [
				'label'     => __( 'Button Hover Label Color', 'lorahost' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#fff',
				'selectors' => [
					'{{WRAPPER}} .banner_content .primary_btn:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_bg',
			[
				'label' => __( 'Button background Color', 'lorahost' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'btn_bg_color',
				'label' => __( 'Background', 'lorahost' ),
				'types' => [ 'gradient' ],
				'selector' => '{{WRAPPER}} .banner_content .primary_btn',
			]
		);
		$this->add_control(
			'btn_hover_bg',
			[
				'label' => __( 'Button Hover background Color', 'lorahost' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'btn_hoverbg_color',
				'label' => __( 'Background', 'lorahost' ),
				'types' => [ 'gradient' ],
				'selector' => '{{WRAPPER}} .banner_content .primary_btn:hover',
			]
		);


        $this->end_controls_section();

        //------------------------------ Style button ------------------------------
        $this->start_controls_section(
            'style_btn', [
                'label' => __( 'Style Background', 'lorahost' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'banner_bg',
				'label' => __( 'Background', 'lorahost' ),
				'types' => [ 'classic' ],
				'selector' => '{{WRAPPER}} .hero-banner',
			]
		);


        $this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings();

    $social_profile = $settings['socialprofiles'];

    ?>
    <section class="hero-banner text-center">
        <div class="container">
	        <?php
	        // Banner Sub Title
	        if( ! empty( $settings['banner_subtitle'] ) ) {
		        echo '<p class="text-uppercase">'. esc_html( $settings['banner_subtitle'] ) .'</p>';
	        }
	        // Banner Title
	        if( ! empty( $settings['banner_title'] ) ) {
		        echo lorahost_heading_tag(
			        array(
				        'tag'   => 'h1',
				        'text'  => $settings['banner_title'],

			        )
		        );
	        }
	        // Banner Description
	        if( ! empty( $settings['banner_desc'] ) ) {
		        echo '<p class="hero-subtitle">'. wp_kses_post( $settings['banner_desc'] ) .'</p>';
	        }

	        if( !empty( $settings['banner_btnlabel'] ) ){
		        echo '<a class="button button-outline" href="'. $settings['banner_btnurl']['url'] .'">'. esc_html( $settings['banner_btnlabel'] ) .'</a>';
	        }
	        ?>

        </div>
    </section>


    <?php
    }
}