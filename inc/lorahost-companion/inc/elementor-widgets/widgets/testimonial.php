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
class Lorahost_Testimonial extends Widget_Base {

	public function get_name() {
		return 'lorahost-testimonial';
	}

	public function get_title() {
		return __( 'Testimonial', 'lorahost' );
	}

	public function get_icon() {
		return 'eicon-post-slider';
	}

	public function get_categories() {
		return [ 'lorahost-elements' ];
	}

	protected function _register_controls() {


        // -----------   Section Heading ------------------------------
        $this->start_controls_section(
            'testimonial_heading',
            [
                'label' => __( 'Testimonial Section Heading', 'lorahost' ),
            ]
        );
        $this->add_control(
            'sect_title', [
                'label' => __( 'Title', 'lorahost' ),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__('Happy Customer Says', 'lorahost')

            ]
        );
        $this->end_controls_section(); // End section top content



		// ----------------------------------------  Customers review content ------------------------------
		$this->start_controls_section(
			'customersreview_content',
			[
				'label' => __( 'Customers Review', 'lorahost' ),
			]
		);
		
		$this->add_control(
            'testimonials', [
                'label' => __( 'Create Review', 'lorahost' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ name }}}',
                'fields' => [
                    [
                        'name'  => 'name',
                        'label' => __( 'Name', 'lorahost' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'Name'
                    ],
                    [
                        'name'  => 'designation',
                        'label' => __( 'Designation', 'lorahost' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__('Designation', 'lorahost')
                    ],
                    [
                        'name'  => 'desc',
                        'label' => __( 'Descriptions', 'lorahost' ),
                        'type'  => Controls_Manager::TEXTAREA,
                        'default'   => __('Give dry stars form. Us called an won\'t winged had land cru abundantly land Midst', 'lorahost')
                    ],
                    [
                        'name'  => 'image',
                        'label' => __( 'Author Image', 'lorahost' ),
                        'type'  => Controls_Manager::MEDIA
                    ]
                    
                ],
            ]
		);

		$this->end_controls_section(); // End exibition content


		//------------------------------ Style Section ------------------------------
		$this->start_controls_section(
			'style_section_heading', [
				'label' => __( 'Heading Style', 'lorahost' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'section_title_color', [
				'label' => __( 'Section Heading Color', 'lorahost' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#1e1859',
				'selectors' => [
					'{{WRAPPER}} .section-intro-white h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'section_title_border_color', [
				'label' => __( 'Section Heading Border Color', 'lorahost' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#1e1859',
				'selectors' => [
					'{{WRAPPER}} .section-style::before, {{WRAPPER}} .section-style::after' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();


        $this->start_controls_section(
            'style_testimonial_item', [
                'label' => __( 'Style Testimonial Item', 'lorahost' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'author_name_color', [
                'label'     => __( 'Testimonial Author Name Color', 'lorahost' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#1e1859',
                'selectors' => [
                    '{{WRAPPER}} .testimonial .testimonial-item h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'author_designation_color', [
                'label'     => __( 'Testimonial Designation Color', 'lorahost' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#888',
                'selectors' => [
                    '{{WRAPPER}} .testimonial .testimonial-item p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_testimonial_desc',
                'selector'  => '{{WRAPPER}} .testimonial .testimonial-item p',
            ]
        );

        $this->end_controls_section();


        /*------------------------------ Background Style ------------------------------*/
		$this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'lorahost' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'section_bgheading',
            [
                'label'     => __( 'Background Settings', 'lorahost' ),
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
                'selector' => '{{WRAPPER}} .bg-gray',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();
    // call load widget script
    $this->load_widget_script();
    $testimonials = $settings['testimonials'];
    ?>

    <section class="bg-gray section-padding">
        <div class="container">
            <div class="section-intro pb-85px text-center">
                <?php
                if( !empty( $settings['sect_title'] ) ){
                    echo '<h2>'.wp_kses_post( $settings['sect_title'] ).'</h2>';
                } ?>
                <div class="section-style"></div>
            </div>

            <div class="owl-carousel owl-theme testimonial">
	            <?php
	            if( !empty( $testimonials ) && count( $testimonials ) > 0 ){
                    foreach ( $testimonials as $testimonial ){ ?>
                        <div class="testimonial-item">
                            <div class="media">
                                <?php
                                if( !empty( $testimonial['image']['url'] ) ){
                                    echo '<img class="testimonial-img" src="'. esc_url( $testimonial['image']['url'] ) .'" alt="'. esc_html__( 'Author Image', 'lorahost' ) .'">';
                                }
                                ?>

                                <div class="media-body">
                                    <?php
                                    if( $testimonial['desc'] ){
                                        echo '<p>'.esc_html( $testimonial['desc'] ).'</p>';
                                    }

                                    if( $testimonial['name'] ){
	                                    echo '<h4>'.esc_html( $testimonial['name'] ).'</h4>';
                                    }

                                    if( $testimonial['designation'] ){
	                                    echo '<p class="testi-intro">'.esc_html( $testimonial['designation'] ).'</p>';
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
    </section>
    <?php
    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){

            $('.testimonial').owlCarousel({
                loop: false,
                margin: 30,
                // items: 5,
                nav: false,
                dots: true,
                responsiveClass: true,
                slideSpeed: 300,
                paginationSpeed: 500,
                responsive: {
                    0: {
                        items: 1
                    },
                    800: {
                        items: 2
                    },
                    1200: {
                        items: 3
                    }
                }
            });

        })(jQuery);
        </script>
        <?php 
        }
    }
	
}
