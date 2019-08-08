<?php
namespace lorahostelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
// use Elementor\Scheme_Color;
// use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
// use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * lorahost elementor Team Member section widget.
 *
 * @since 1.0
 */
class Lorahost_Features extends Widget_Base {

	public function get_name() {
		return 'lorahost-features';
	}

	public function get_title() {
		return __( 'Features', 'lorahost' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return [ 'lorahost-elements' ];
	}

	protected function _register_controls() {


		// ----------------------------------------   Features content ------------------------------
		$this->start_controls_section(
			'features_section_heading',
			[
				'label' => __( 'Features Section Heading', 'lorahost' ),
			]
		);
		$this->add_control(
			'section_heading', [
				'label' => __( 'Title Color', 'lorahost' ),
				'type'  => Controls_Manager::TEXT,
                'label_block'   => true
			]
		);
		$this->end_controls_section(); // End features content


		$this->start_controls_section(
			'features_block',
			[
				'label' => __( 'Features', 'lorahost' ),
			]
		);
		$this->add_control(
            'features_content', [
                'label' => __( 'Create Features', 'lorahost' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ title }}}',
                'fields' => [
                    [
                        'name'  => 'title',
                        'label' => __( 'Title', 'lorahost' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __('Learn Online Courses', 'lorahost')
                    ],
	                [
		                'name'  => 'desc',
		                'label' => __( 'Description', 'lorahost' ),
		                'type'  => Controls_Manager::TEXTAREA
	                ],
                    [
                        'name'  => 'feature_img',
                        'label' => __( 'Feature Icon', 'lorahost' ),
                        'type'  => Controls_Manager::MEDIA
                    ],
                    
                ],
            ]
        );


		$this->end_controls_section(); // End features content


        //------------------------------ Style Section Title ------------------------------
        $this->start_controls_section(
            'style_section_heading', [
                'label' => __( 'Feature Title Style', 'lorahost' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control(
            'section_title_color', [
                'label' => __( 'Title Color', 'lorahost' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#1e1859',
                'selectors' => [
                    '{{WRAPPER}} .card-feature h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_sec_title',
                'selector'  => '{{WRAPPER}} .card-feature h3',
            ]
        );
        $this->add_control(
            'section_subtitle_color', [
                'label' => __( 'Sub-title Color', 'lorahost' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#888',
                'selectors' => [
                    '{{WRAPPER}} .card-feature p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_sec_subtitle',
                'selector'  => '{{WRAPPER}} .card-feature p',
            ]
        );
		$this->add_control(
			'feature_item_bg', [
				'label' => __( 'Feature Item Background', 'lorahost' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#f9f9ff',
				'selectors' => [
					'{{WRAPPER}} .card-feature-bg' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'feature_hover_item_bg', [
				'label' => __( 'Feature Hover Item Background', 'lorahost' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .card-feature-bg:hover' => 'background: {{VALUE}};',
				],
			]
		);

        $this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings();
    $features = $settings['features_content'];

    ?>

        <section class="section-margin">
            <div class="container">
                <?php
                if( !empty( $settings['section_heading'] ) ){ ?>
                    <div class="section-intro pb-85px text-center">
                        <h2><?php echo esc_html( $settings['section_heading'] ) ?></h2>
                        <div class="section-style"></div>
                    </div>
                    <?php
                }
                ?>
                <div class="row">
                    <?php
                    if( is_array( $features ) && count( $features ) > 0 ){
                        foreach ( $features as $feature ){
                            if( !empty( $feature['feature_img']['url'] ) ){ ?>
                                <div class="col-md-6 col-lg-4">
                                    <div class="card-feature card-feature-bg text-center">
                                        <div class="feature-icon">
                                            <?php
                                            if( !empty( $feature['feature_img']['url'] ) ){
                                                echo '<img src="'.esc_url( $feature['feature_img']['url'] ).'" alt="'. esc_html__('Feature image', 'lorahost') .'" >';
                                            }
                                            ?>
                                        </div>
                                        <?php
                                        if( !empty( $feature['title'] ) ){
                                            echo '<h3>'. esc_html( $feature['title'] ) .'</h3>';
                                        }
                                        if( !empty( $feature['title'] ) ){
                                            echo '<p>'. esc_html( $feature['desc'] ) .'</p>';
                                        }
                                        ?>
                                    </div>
                                </div>
                                <?php
                            }
                            else{ ?>
                                <div class="col-md-6 col-lg-4">
                                    <div class="card-feature card-feature-content">
	                                    <?php
	                                    if( !empty( $feature['title'] ) ){
		                                    echo '<h2>'. esc_html( $feature['title'] ) .'</h2>';
	                                    }
	                                    if( !empty( $feature['title'] ) ){
		                                    echo '<p>'. esc_html( $feature['desc'] ) .'</p>';
	                                    }
	                                    ?>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    }
                    ?>

                </div>
            </div>
        </section>


    <?php

    }

	
}
