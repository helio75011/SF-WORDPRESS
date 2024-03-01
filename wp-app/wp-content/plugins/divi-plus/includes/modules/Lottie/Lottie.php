<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.4
 */
class DIPL_Lottie extends ET_Builder_Module {

	public $slug       = 'dipl_lottie';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name = esc_html__( 'DP Lottie', 'divi-plus' );
		$this->main_css_element = '%%order_class%%';
	}

	public function get_settings_modal_toggles() {
		return array(
			'general'  => array(
				'toggles' => array(
					'main_content' => array(
						'title' => esc_html__( 'Configuration', 'divi-plus' ),
					),
				),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'margin_padding' => array(
				'css' => array(
					'main'      => '%%order_class%%',
					'important' => 'all',
				),
			),
			'max_width' => array(
				'css' => array(
					'main'             => '%%order_class%%',
					'module_alignment' => '%%order_class%%',
				),
			),
			'borders' => array(
				'default' => array(
					'css' => array(
						'main' => array(
							'border_styles' => '%%order_class%%',
							'border_radii'  => '%%order_class%%',
						),
					),
				),
			),
			'box_shadow' => array(
				'default' => array(
					'css' => array(
						'main' => $this->main_css_element,
						'important' => 'all',
					),
				),
			),
			'background' => array(
				'use_background_video' => false,
				'options' => array(
					'parallax' => array( 'type' => 'skip' ),
				),
			),
			'text' => false,
			'fonts' => false,
			'filters' => false,
		);
	}

	public function get_fields() {
		return array(
			'url' => array(
				'label'              => esc_html__( 'Lottie JSON File', 'divi-plus' ),
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'data_type'          => 'json',
				'upload_button_text' => esc_attr__( 'Upload Lottie JSON file', 'divi-plus' ),
				'choose_text'        => esc_attr__( 'Choose Lottie JSON file', 'divi-plus' ),
				'update_text'        => esc_attr__( 'Set As Lottie JSON file', 'divi-plus' ),
				'tab_slug'			 => 'general',
				'toggle_slug'		 => 'main_content',
				'description'      	 => esc_html__( 'Upload lottie json file.', 'divi-plus' ),
			),
			'animation_trigger' => array(
				'label'            	 => esc_html__( 'Animation Trigger', 'divi-plus' ),
				'type'             	 => 'select',
				'option_category'  	 => 'configuration',
				'options'          	 => array(
					'autoplay' 	=> esc_html__( 'Autoplay', 'divi-plus' ),
					'hover'     => esc_html__( 'Hover', 'divi-plus' ),
					'click'     => esc_html__( 'Click', 'divi-plus' ),
				),
				'default' 			=> 'autoplay',
				'default_on_front' 	=> 'autoplay',
				'tab_slug'			 => 'general',
				'toggle_slug'		 => 'main_content',
				'description'      	=> esc_html__( 'Here you can choose the trigger for lottie animation.', 'divi-plus' ),
			),
			'direction' => array(
				'label'            	=> esc_html__( 'Direction', 'divi-plus' ),
				'type'             	=> 'select',
				'option_category'  	=> 'layout',
				'options'          	=> array(
					'1'  => esc_html__( 'Normal', 'divi-plus' ),
					'-1' => esc_html__( 'Reverse', 'divi-plus' ),
				),
				'default' 			=> '1',
				'default_on_front' 	=> '1',
				'tab_slug'			 => 'general',
				'toggle_slug'		 => 'main_content',
				'description'      	=> esc_html__( 'Set the direction of lottie animation.', 'divi-plus' ),
			),
			'loop' => array(
				'label'            	=> esc_html__( 'Loop', 'divi-plus' ),
				'type'             	=> 'yes_no_button',
				'option_category'  	=> 'configuration',
				'options'          	=> array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'default' 			=> 'on',
				'default_on_front' 	=> 'on',
				'tab_slug'			 => 'general',
				'toggle_slug'		 => 'main_content',
				'description'      	=> esc_html__( 'Enable or disable lottie animation in loop.', 'divi-plus' ),
			),
			'speed' => array(
				'label'            	=> esc_html__( 'Animation Speed', 'divi-plus' ),
				'type'             	=> 'range',
				'option_category'  	=> 'configuration',
				'range_settings'   	=> array(
					'min'  => '0.1',
					'max'  => '5',
					'step' => '0.1',
				),
				'unitless'         	=> true,
				'default' 			=> '1',
				'default_on_front' 	=> '1',
				'tab_slug'			 => 'general',
				'toggle_slug'		 => 'main_content',
				'description'      	=> esc_html__( 'The speed of the animation.', 'divi-plus' ),
			),
		);

	}


	public function render( $attrs, $content, $render_slug ) {

		$url				= $this->props['url'];
		$animation_trigger 	= $this->props['animation_trigger'];
		$direction			= $this->props['direction'];
		$loop				= $this->props['loop'];
		$speed				= $this->props['speed'];

		if ( '' !== $url ) {
			wp_enqueue_script( 'elicus-lottie-script' );
			wp_enqueue_script( 'dipl-lottie-custom', PLUGIN_PATH . 'includes/modules/Lottie/dipl-lottie-custom.min.js', array('jquery'), '1.0.0', true );

			$lottie_wrap = sprintf(
				'<div class="dipl_lottie_wrapper">
					<div class="dipl_lottie_params" data-url="%1$s" data-animation-trigger="%2$s" data-direction="%3$s" data-loop="%4$s" data-speed="%5$s" data-order-class="%6$s"></div>
				</div>',
				esc_url( $url ),
				esc_attr( $animation_trigger ),
				intval( $direction ),
				'on' === $loop ? 'true' : 'false',
				floatval( $speed ),
				esc_attr( $this->get_module_order_class( 'dipl_lottie' ) )
			);
		} else {
			$lottie_wrap = '';
		}
		
		return $lottie_wrap;
	}

}
$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
    $modules = explode( ',', $plugin_options['dipl-modules'] );
    if ( in_array( 'dipl_lottie', $modules ) ) {
        new DIPL_Lottie();
    }
} else {
    new DIPL_Lottie();
}