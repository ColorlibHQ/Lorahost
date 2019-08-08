<?php
namespace lorahostelementor\Widgets;

use Elementor\Group_Control_Background;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
//use Elementor\Scheme_Color;
//use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
//use Elementor\Group_Control_Text_Shadow;
//use Elementor\Group_Control_Background;



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

class Lorahost_Newsletter extends Widget_Base {

	public function get_name() {
		return 'lorahost-newsletter';
	}

	public function get_title() {
		return __( 'Newsletter', 'lorahost' );
	}

	public function get_icon() {
		return 'eicon-mailchimp';
	}

	public function get_categories() {
		return [ 'lorahost-elements' ];
	}

	protected function _register_controls() {




		// ----------------------------------------  Newsletter Heading ------------------------------
		$this->start_controls_section(
			'newsletter_section',
			[
				'label' => __( 'Newsletter Heading', 'lorahost' ),
			]
		);
		$this->add_control(
			'section_title', [
				'label' => __( 'Section Title', 'lorahost' ),
				'type'  => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Subscribe To Get Our Newsletter', 'lorahost' )

			]
		);
		$this->add_control(
			'section_subtitle', [
				'label' => __( 'Section Sub-Title', 'lorahost' ),
				'type'  => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_html__( 'Man greater image shall land air winged place seas replenish whose winged great fifth fruitful. Set days sea over morning.', 'lorahost' )

			]
		);

		$this->end_controls_section(); // End Section Heading

		// ----------------------------------------  Newsletter Heading ------------------------------
		$this->start_controls_section(
			'newsletter_input_feild',
			[
				'label' => __( 'Newsletter Input Settings', 'lorahost' ),
			]
		);
		$this->add_control(
			'action_url', [
				'label' => __( 'Newsletter Action URL', 'lorahost' ),
				'type'  => Controls_Manager::URL,
				'label_block' => true

			]
		);
		$this->add_control(
			'input_placeholder', [
				'label' => __( 'Input Placeholder', 'lorahost' ),
				'type'  => Controls_Manager::TEXT,
				'label_block' => true,
				'default'   => esc_html__( 'Enter Your Email', 'lorahost' )

			]
		);
		$this->add_control(
			'submit_btn_label', [
				'label' => __( 'Submit Button label', 'lorahost' ),
				'type'  => Controls_Manager::TEXT,
				'label_block' => true,
				'default'   => esc_html__( 'Subscribe', 'lorahost' )

			]
		);


		$this->end_controls_section();

		//------------------------------ Style title ------------------------------
		$this->start_controls_section(
			'style_textcolor', [
				'label' => __( 'Style Heading Title', 'lorahost' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'title_color', [
				'label'     => __( 'Title Color', 'lorahost' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#1e1859',
				'selectors' => [
					'{{WRAPPER}} .section-intro h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name'      => 'typography_title',
				'selector'  => '{{WRAPPER}} .section-intro h2',
			]
		);
		$this->add_control(
			'subtitle_color', [
				'label'     => __( 'Sub-Title Color', 'lorahost' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#888888',
				'selectors' => [
					'{{WRAPPER}} .section-intro p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name'      => 'typography_subtitle',
				'selector'  => '{{WRAPPER}} .section-intro p',
			]
		);
		$this->add_control(
			'btn_label_color', [
				'label'     => __( 'Button label Color', 'lorahost' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#fff',
				'selectors' => [
					'{{WRAPPER}} button.button' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_bg',
			[
				'label'     => __( 'Button Background', 'lorahost' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'btn_bg_color',
				'label' => __( 'Background', 'lorahost' ),
				'types' => [ 'gradient' ],
				'selector' => '{{WRAPPER}} .form-subscribe .button',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings();
		$action_url = ! empty( $settings['action_url'] ) ? $settings['action_url'] : '#';
		$placeholder = !empty( $settings['input_placeholder'] ) ? $settings['input_placeholder'] : 'Enter Your Email';
		$psubmit_label = !empty( $settings['submit_btn_label'] ) ? $settings['submit_btn_label'] : 'Subscribe';
		?>
		<section class="bg-gray section-padding">
			<div class="container">
				<div class="section-intro pb-5 mb-xl-2 text-center">
					<?php
					if( !empty( $settings['section_title'] ) ){
						echo '<h2 class="mb-4">'. esc_html( $settings['section_title'] ) .'</h2>';
					}
					if( !empty( $settings['section_subtitle'] ) ){
						echo '<p>'. esc_html( $settings['section_subtitle'] ) .'</p>';
					}
					?>
				</div>

				<form class="form-subscribe" action="<?php echo esc_url( $action_url ) ?>" method="post">
					<div class="input-group align-items-center">
						<label for="newsletter_label"></label>
						<input type="email" name="EMAIL" id="newsletter_label" class="form-control" placeholder="<?php echo esc_html( $placeholder ) ?>" required>
						<div class="input-group-append">
							<button class="button button-shadow2" type="submit"><?php echo esc_html( $psubmit_label ) ?></button>
						</div>
					</div>
				</form>
			</div>
		</section>
		<?php
	}

}
