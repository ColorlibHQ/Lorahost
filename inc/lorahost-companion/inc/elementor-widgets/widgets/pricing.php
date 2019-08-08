<?php
namespace lorahostelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
//use Elementor\Scheme_Color;
//use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
//use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



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
class Lorahost_Pricing extends Widget_Base {

	public function get_name() {
		return 'lorahost-pricing';
	}

	public function get_title() {
		return __( 'Pricing', 'lorahost' );
	}

	public function get_icon() {
		return 'eicon-price-table';
	}

	public function get_categories() {
		return [ 'lorahost-elements' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'pricing_block',
			[
				'label' => __( 'Pricing', 'lorahost' ),
			]
		);
		$this->add_control(
			'section_title', [
				'label' => __( 'Section Title', 'lorahost' ),
				'type'  => Controls_Manager::TEXT,
				'label_block'   => true,
				'default' => esc_html__( 'Popular Pricing Package', 'lorahost' ),
			]
		);

		$this->end_controls_section();

		// ----------------------------------------   Pricing content ------------------------------
		$this->start_controls_section(
			'pricing_block',
			[
				'label' => __( 'Pricing', 'lorahost' ),
			]
		);
		$this->add_control(
            'pricing_content', [
                'label' => __( 'Create Pricing', 'lorahost' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ title }}}',
                'fields' => [
                    [
                        'name'  => 'title',
                        'label' => __( 'Package Title', 'lorahost' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__('Normal', 'lorahost')
                    ],
	                [
		                'name'  => 'sub_title',
		                'label' => __( 'Sub Title', 'lorahost' ),
		                'type'  => Controls_Manager::TEXT,
		                'label_block' => true,
		                'default' => esc_html__('Attend only first day', 'lorahost')
	                ],
                    [
		                'name'  => 'price',
		                'label' => __( 'Price', 'lorahost' ),
		                'type'  => Controls_Manager::TEXT,
		                'default' => esc_html__('45.80', 'lorahost')
	                ],
	                [
		                'name'  => 'feature_list',
		                'label' => __( 'Feature List', 'lorahost' ),
		                'type'  => Controls_Manager::WYSIWYG,
                        'default' => __('<ul>
                                        <li>Unlimited of Website</li>
                                        <li>Unlimited Disk Space</li>
                                        <li>Unlimited Bandwidth</li>
                                        <li>24/7/365 Support</li>
                                        <li>Unlimited Email Accounts</li>
                                        <li>99.9% Service Uptime</li>
                                    </ul>', 'lorahost')
	                ],
                    [
                        'name'  => 'btn_label',
                        'label' => __( 'Button Label', 'lorahost' ),
                        'type'  => Controls_Manager::TEXT,
                        'default' => esc_html__('Select Plan', 'lorahost')
                    ],
                    [
                        'name'  => 'btn_url',
                        'label' => __( 'Button URL', 'lorahost' ),
                        'type'  => Controls_Manager::URL
                    ],
                    
                ],
            ]
        );


		$this->end_controls_section(); // End pricing content

		//------------------------------ Style Section Title ------------------------------
		$this->start_controls_section(
			'style_section_heading', [
				'label' => __( 'Pricing Table Style', 'lorahost' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'section_title_color', [
				'label' => __( 'Section Heading Color', 'lorahost' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .section-intro-white h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'section_title_border_color', [
				'label' => __( 'Section Heading Border Color', 'lorahost' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .section-style::before, {{WRAPPER}} .section-style::after' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section(); // End pricing content


        /*------------- Pricing Item Style --------------*/
        $this->start_controls_section(
            'pricing_item_style', [
                'label' => __( 'Pricing Table Style', 'lorahost' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control(
            'price_item_title_color', [
                'label' => __( 'Title Color', 'lorahost' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#1d2441',
                'selectors' => [
                    '{{WRAPPER}} .card-pricing__header h4' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .card-pricing__header p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_sec_subtitle',
                'selector'  => '{{WRAPPER}} .card-pricing__header p',
            ]
        );
        $this->add_control(
            'price_color', [
                'label' => __( 'Price Label Color', 'lorahost' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#1d2441',
                'selectors' => [
                    '{{WRAPPER}} .card-pricing__price' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'feature_list_color', [
                'label' => __( 'Feature List Color', 'lorahost' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#888',
                'selectors' => [
                    '{{WRAPPER}} .card-pricing ul li' => 'color: {{VALUE}};',
                ],
            ]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name'      => 'typography_feature_list',
				'selector'  => '{{WRAPPER}} .card-pricing ul li',
			]
		);
        $this->add_control(
            'btn_color', [
                'label' => __( 'Button Color', 'lorahost' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#1e1859',
                'selectors' => [
                    '{{WRAPPER}} .card-pricing .button' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'item_hover_btn_color', [
                'label' => __( 'Item Hover Button Color', 'lorahost' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .card-pricing:hover .button' => 'color: {{VALUE}};',
                ],
            ]
        );
		$this->add_control(
			'btn_hover_label',
			[
				'label'     => __( 'Button Hover Background', 'lorahost' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'btn_bg',
				'label' => __( 'Background', 'lorahost' ),
				'types' => [ 'gradient' ],
				'selector' => '{{WRAPPER}} .card-pricing:hover .button',
			]
		);


        $this->end_controls_section();

        //------------------------- Style Section Background ------------------------------
        $this->start_controls_section(
            'style_section_bg', [
                'label' => __( 'Section Background', 'lorahost' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
		$this->add_control(
			'section_bgimg',
			[
				'label'     => __( 'Section Background Image', 'lorahost' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'sectionbg',
				'label' => __( 'Background', 'lorahost' ),
				'types' => [ 'classic' ],
				'selector' => '{{WRAPPER}} .priceTable-bg',
			]
		);
		$this->add_control(
			'overlay_switcher',
			[
				'label'     => __( 'Overlay Seitch', 'lorahost' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'lorahost' ),
				'label_off' => __( 'Hide', 'lorahost' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'overlay_heading',
			[
				'label'     => __( 'Section Background Overlay', 'lorahost' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'overlay_switcher' => 'yes'
				]
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'sectionbg_overlay',
				'label' => __( 'Background', 'lorahost' ),
				'types' => [ 'gradient' ],
				'selector' => '{{WRAPPER}} .priceTable-bg::after',
                'condition' => [
                     'overlay_switcher' => 'yes'
                ]
			]
		);

        $this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings();
    $pricing = $settings['pricing_content'];
    $overlay = $settings['overlay_switcher'] == 'yes' ? 'bgoverlay' : '';
    ?>

        <section class="section-padding priceTable-bg <?php echo esc_attr( $overlay ) ?>">
            <div class="container">
                <div class="section-intro-white pb-85px text-center">
                    <?php
                    if( !empty( $settings['section_title'] ) ){
                        echo '<h2>'. esc_html( $settings['section_title'] ) .'</h2>';
                    }
                    ?>

                    <div class="section-style"></div>
                </div>

                <div class="priceTable-relative">
                    <div class="priceTable-wrapper">
                        <div class="row">
	                        <?php
	                        if( is_array( $pricing ) && count( $pricing ) > 0 ){
		                        foreach ( $pricing as $item ){ ?>
                                    <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
                                        <div class="card text-center card-pricing">
                                            <div class="card-pricing__header">
                                                <?php
                                                // Title
                                                if( !empty( $item['title'] ) ){
                                                    echo '<h4>'. esc_html( $item['title'] ) .'</h4>';
                                                }

                                                // Sob Title
                                                if( !empty( $item['sub_title'] ) ){
                                                    echo '<p>'. esc_html( $item['sub_title'] ) .'</p>';
                                                }

                                                // Price
                                                if( !empty( $item['price'] ) ){
                                                    echo '<h1 class="card-pricing__price"><span>$</span>'. esc_html( $item['price'] ) .'</h1>';
                                                }

                                                ?>
                                            </div>
                                            <?php
                                            // Feature list
                                            if( !empty( $item['feature_list'] ) ){
                                                echo wp_kses_post( $item['feature_list'] );
                                            }
                                            ?>
                                            <div class="card-pricing__footer">
	                                            <?php
	                                            // Button
	                                            if( !empty( $item['btn_label'] ) ){
		                                            echo '<a href="'. esc_url( $item['btn_url']['url'] ) .'"><button class="button">'. esc_html( $item['btn_label'] ) .'</button></a>';
	                                            }
	                                            ?>

                                            </div>
                                        </div>
                                    </div>
                                    <?php
		                        }
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
