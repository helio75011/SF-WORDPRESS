<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.4
 */
class DIPL_LogoSlider extends ET_Builder_Module {

	public $slug       = 'dipl_logo_slider';
	public $child_slug = 'dipl_logo_slider_item';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name = esc_html__( 'DP Logo Slider', 'divi-plus' );
		$this->main_css_element = '%%order_class%%';
	}

	public function get_settings_modal_toggles() {
		return array(
			'general'  => array(
				'toggles' => array(
					'main_content' => array(
						'title' => esc_html__( 'Slider', 'divi-plus' ),
					),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'slider_styles' => array(
						'title' => esc_html__( 'Slider', 'divi-plus' ),
					),
					'slider_image' => array(
						'title' => esc_html__( 'Logo', 'divi-plus' ),
					),
				),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts'                 => false,
			'text'                  => false,
			'link_options'          => false,
			'borders' => array(
				'default' => array(
					'css' => array(
						'main' => array(
							'border_styles' => '%%order_class%%',
							'border_radii'  => '%%order_class%%',
						),
						'important' => 'all',
					),
				),
			),
			'custom_margin_padding' => array(
				'css' => array(
					'main'      => '%%order_class%%',
					'important' => 'all',
				),
			),
			'slider_margin_padding' => array(
				'slider_container' => array(
					'margin_padding' => array(
						'css' => array(
							'use_margin' => false,
							'padding'   => "{$this->main_css_element} .swiper-container",
							'important' => 'all',
						),
					),
				),
				'arrows' => array(
					'margin_padding' => array(
						'css' => array(
							'use_margin' => false,
							'padding'    => "{$this->main_css_element} .swiper-button-next::after, {$this->main_css_element} .swiper-button-prev::after",
							'important'  => 'all',
						),
					),
				),
			),
		);
	}

	public function get_fields() {

		return array(
			'logo_per_slide'               => array(
				'label'           => esc_html__( 'Number of Logo Per View', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'1'  => esc_html__( '1', 'divi-plus' ),
					'2'  => esc_html__( '2', 'divi-plus' ),
					'3'  => esc_html__( '3', 'divi-plus' ),
					'4'  => esc_html__( '4', 'divi-plus' ),
					'5'  => esc_html__( '5', 'divi-plus' ),
					'6'  => esc_html__( '6', 'divi-plus' ),
					'7'  => esc_html__( '7', 'divi-plus' ),
					'8'  => esc_html__( '8', 'divi-plus' ),
					'9'  => esc_html__( '9', 'divi-plus' ),
					'10' => esc_html__( '10', 'divi-plus' ),
					'11' => esc_html__( '11', 'divi-plus' ),
					'12' => esc_html__( '12', 'divi-plus' ),
					'13' => esc_html__( '13', 'divi-plus' ),
					'14' => esc_html__( '14', 'divi-plus' ),
					'15' => esc_html__( '15', 'divi-plus' ),
					'16' => esc_html__( '16', 'divi-plus' ),
					'17' => esc_html__( '17', 'divi-plus' ),
					'18' => esc_html__( '18', 'divi-plus' ),
					'19' => esc_html__( '19', 'divi-plus' ),
					'20' => esc_html__( '20', 'divi-plus' ),
				),
				'default'         => '6',
				'mobile_options'  => true,
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can choose the number of logos you want to display per slide.', 'divi-plus' ),
			),
			'slides_per_group' => array(
				'label'           => esc_html__( 'Number of Slides Per Group', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'1'  => esc_html__( '1', 'divi-plus' ),
					'2'  => esc_html__( '2', 'divi-plus' ),
					'3'  => esc_html__( '3', 'divi-plus' ),
					'4' => esc_html__( '4', 'divi-plus' ),
					'5' => esc_html__( '5', 'divi-plus' ),
					'6' => esc_html__( '6', 'divi-plus' ),
					'7' => esc_html__( '7', 'divi-plus' ),
					'8' => esc_html__( '8', 'divi-plus' ),
					'9' => esc_html__( '9', 'divi-plus' ),
					'10' => esc_html__( '10', 'divi-plus' ),
					'11' => esc_html__( '11', 'divi-plus' ),
					'12' => esc_html__( '12', 'divi-plus' ),
					'13' => esc_html__( '13', 'divi-plus' ),
					'14' => esc_html__( '14', 'divi-plus' ),
					'15' => esc_html__( '15', 'divi-plus' ),
					'16' => esc_html__( '16', 'divi-plus' ),
					'17' => esc_html__( '17', 'divi-plus' ),
					'18' => esc_html__( '18', 'divi-plus' ),
					'19' => esc_html__( '19', 'divi-plus' ),
					'20' => esc_html__( '20', 'divi-plus' ),
				),
				'default'         => '1',
				'mobile_options'  => true,
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can choose the number of slides per group to slide by.', 'divi-plus' ),
			),
			'space_between_slides' => array(
				'label'           => esc_html__( 'Space between Slides', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'range_settings'  => array(
					'min'  => '10',
					'max'  => '100',
					'step' => '1',
				),
				'fixed_unit'	  => 'px',
				'default'         => '15px',
				'mobile_options'  => true,
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Move the slider or input the value to increse or decrease the space between slides.', 'divi-plus' ),
			),
			'slider_loop'                  => array(
				'label'           => esc_html__( 'Enable Loop', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'default'         => 'off',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can choose whether or not to enable loop for the logo slider.', 'divi-plus' ),
			),
			'autoplay'                     => array(
				'label'           => esc_html__( 'Autoplay', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'default'         => 'on',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can choose whether or not to autoplay logo slider.', 'divi-plus' ),
			),
			'autoplay_speed'               => array(
				'label'           => esc_html__( 'Autoplay Delay', 'divi-plus' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'default'         => '3000',
				'show_if'         => array(
					'autoplay' => 'on',
				),
				'show_if_not'     => array(
					'autoplay' => 'off',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can input the value to delay autoplay after a complete transition of the logo slider.', 'divi-plus' ),
			),
			'pause_on_hover'               => array(
				'label'           => esc_html__( 'Pause On Hover', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'default'         => 'on',
				'show_if'         => array(
					'autoplay' => 'on',
				),
				'show_if_not'     => array(
					'autoplay' => 'off',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can choose whether or not to pause slides on mouse hover.', 'divi-plus' ),
			),
			'transition_duration'          => array(
				'label'           => esc_html__( 'Transition Duration', 'divi-plus' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'default'         => '1000',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can input the value to delay each slide in a transition.', 'divi-plus' ),
			),
			'show_arrow'                   => array(
				'label'           => esc_html__( 'Show Arrows', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'default'         => 'on',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can choose whether or not to display previous & next arrow on the slider.', 'divi-plus' ),
			),
			'previous_slide_arrow' => array(
				'label'           => esc_html__( 'Previous Arrow', 'divi-plus' ),
				'type'            => 'select_icon',
				'option_category' => 'basic_option',
				'class'           => array(
					'et-pb-font-icon',
				),
				'show_if'         => array(
					'show_arrow' => 'on',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can select the icon to be used for the previous slide navigation.', 'divi-plus' ),
			),
			'next_slide_arrow' => array(
				'label'           => esc_html__( 'Next Arrow', 'divi-plus' ),
				'type'            => 'select_icon',
				'option_category' => 'basic_option',
				'class'           => array(
					'et-pb-font-icon',
				),
				'show_if'         => array(
					'show_arrow' => 'on',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can select the icon to be used for the next slide navigation.', 'divi-plus' ),
			),
			'show_arrow_on_hover'          => array(
				'label'           => esc_html__( 'Show Arrows Only On Hover', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'show_if'         => array(
					'show_arrow' => 'on',
				),
				'default'         => 'off',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can choose whether or not to display previous and next arrow on hover.', 'divi-plus' ),
			),
			'arrows_position' => array(
				'label'           => esc_html__( 'Arrows Position', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'inside' 		=> esc_html__( 'Inside', 'divi-plus' ),
					'outside'		=> esc_html__( 'Outside', 'divi-plus' ),
					'top_left'      => esc_html__( 'Top Left', 'divi-plus' ),
					'top_right'     => esc_html__( 'Top Right', 'divi-plus' ),
					'top_center'    => esc_html__( 'Top Center', 'divi-plus' ),
					'bottom_left'   => esc_html__( 'Bottom Left', 'divi-plus' ),
					'bottom_right'  => esc_html__( 'Bottom Right', 'divi-plus' ),
					'bottom_center' => esc_html__( 'Bottom Center', 'divi-plus' ),
				),
				'default'         => 'inside',
				'mobile_options'  => true,
				'show_if'         => array(
					'show_arrow' => 'on',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can choose the arrows position.', 'divi-plus' ),
			),
			'show_control_dot'             => array(
				'label'           => esc_html__( 'Show Dots Pagination', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'default'         => 'on',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you choose whether or not to display pagination on the logo slider.', 'divi-plus' ),
			),
			'control_dot_style' => array(
				'label'            => esc_html__( 'Dots Pagination Style', 'divi-plus' ),
				'type'             => 'select',
				'option_category'  => 'layout',
				'options'          => array(
					'solid_dot'       => esc_html__( 'Solid Dot', 'divi-plus' ),
					'transparent_dot' => esc_html__( 'Transparent Dot', 'divi-plus' ),
					'stretched_dot'   => esc_html__( 'Stretched Dot', 'divi-plus' ),
					'line'            => esc_html__( 'Line', 'divi-plus' ),
					'rounded_line'    => esc_html__( 'Rounded Line', 'divi-plus' ),
					'square_dot'      => esc_html__( 'Squared Dot', 'divi-plus' ),
				),
				'show_if'          => array(
					'show_control_dot' => 'on',
				),
				'default'          => 'solid_dot',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'control dot style', 'divi-plus' ),
			),
			'enable_dynamic_dots' => array(
				'label'            => esc_html__( 'Enable Dynamic Dots', 'divi-plus' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'default'          => 'off',
				'show_if'          => array(
					'show_control_dot' => 'on',
					'control_dot_style' => array(
						'solid_dot',
						'transparent_dot',
						'square_dot'
					),
				),
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'This setting will turn on and off the dynamic pagination of the slider.', 'divi-plus' ),
			),
			'slide_image_width'            => array(
				'label'           => esc_html__( 'Logo Width', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'range_settings'  => array(
					'min'  => '100',
					'max'  => '500',
					'step' => '1',
				),
				'default'         => '150px',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'slider_image',
				'description'     => esc_html__( 'Move the slider or input the value to increase or decrease width of the logo.', 'divi-plus' ),
			),
			'slide_image_height'           => array(
				'label'           => esc_html__( 'Logo Container Height', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'range_settings'  => array(
					'min'  => '100',
					'max'  => '500',
					'step' => '1',
				),
				'default'         => '150px',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'slider_image',
				'description'     => esc_html__( 'Move the slider or input the value to increase or decrease height of the logo container.', 'divi-plus' ),
			),
			'slide_alignment'              => array(
				'label'           => esc_html__( 'Logo Alignment', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'top'    => esc_html__( 'Top', 'divi-plus' ),
					'center' => esc_html__( 'Center', 'divi-plus' ),
					'bottom' => esc_html__( 'Bottom', 'divi-plus' ),
				),
				'default'         => 'center',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'slider_image',
				'description'     => esc_html__( 'Here you can place logo images at top, center, and bottom of the slider.', 'divi-plus' ),
			),
			'arrows_custom_padding' => array(
                'label'                 => esc_html__( 'Arrows Padding', 'divi-plus' ),
                'type'                  => 'custom_padding',
                'option_category'       => 'layout',
                'show_if'         		=> array(
					'show_arrow' => 'on',
				),
				'default'				=> '5px|10px|5px|10px|true|true',
                'default_on_front'		=> '5px|10px|5px|10px|true|true',
                'mobile_options'        => true,
                'hover'                 => false,
                'tab_slug'              => 'advanced',
                'toggle_slug'           => 'slider_styles',
                'description'           => esc_html__( 'Padding adds extra space to the inside of the element, increasing the distance between the edge of the element and its inner contents.', 'divi-plus' ),
            ),
			'arrow_font_size'              => array(
				'label'           => esc_html__( 'Arrow Font Size', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'range_settings'  => array(
					'min'  => '10',
					'max'  => '100',
					'step' => '1',
				),
				'show_if'         => array(
					'show_arrow' => 'on',
				),
				'mobile_options'  => true,
				'default'         => '18px',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'slider_styles',
				'description'     => esc_html__( 'Move the slider or input the value to increse or decrease the size of arrows.', 'divi-plus' ),
			),
			'arrow_color'                  => array(
				'label'        => esc_html__( 'Arrow Color', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'show_if'      => array(
					'show_arrow' => 'on',
				),
				'default'      => '#007aff',
				'hover'        => 'tabs',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'slider_styles',
				'description'  => esc_html__( 'Here you can choose a custom color to be used for arrows.', 'divi-plus' ),
			),
			'use_arrow_background'         => array(
				'label'           => esc_html__( 'Use Arrow Background', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'show_if'         => array(
					'show_arrow' => 'on',
				),
				'default'         => 'off',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'slider_styles',
				'description'     => esc_html__( 'Here you can choose whehter or not to apply background on arrows.', 'divi-plus' ),
			),
			'arrow_background_color'       => array(
				'label'        => esc_html__( 'Arrow Background', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'show_if'      => array(
					'show_arrow'           => 'on',
					'use_arrow_background' => 'on',
				),
				'hover'        => 'tabs',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'slider_styles',
				'description'  => esc_html__( 'Here you can choose a custom color to be used for the shape background of arrows.', 'divi-plus' ),
			),
			'arrow_background_border_size' => array(
				'label'           => esc_html__( 'Arrow Background Border', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '10',
					'step' => '1',
				),
				'show_if'         => array(
					'show_arrow'           => 'on',
					'use_arrow_background' => 'on',
				),
				'default'         => '0px',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'slider_styles',
				'description'     => esc_html__( 'Move the slider or input the value to increase or decrease the border size of the arrow background.', 'divi-plus' ),
			),
			'arrow_shape_border_color'     => array(
				'label'        => esc_html__( 'Arrow Background Border Color', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'show_if'      => array(
					'show_arrow'           => 'on',
					'use_arrow_background' => 'on',
				),
				'hover'        => 'tabs',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'slider_styles',
				'description'  => esc_html__( 'Here you can choose a custom color to be used for the arrow border', 'divi-plus' ),
			),
			'control_dot_active_color'     => array(
				'label'        => esc_html__( 'Active Dot Pagination Color', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'show_if'      => array(
					'show_control_dot' => 'on',
				),
				'default'      => '#000000',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'slider_styles',
				'description'  => esc_html__( 'Here you can choose a custom color to be used for the pagination of an active item.', 'divi-plus' ),
			),
			'control_dot_inactive_color'   => array(
				'label'        => esc_html__( 'Inactive Dot Pagination Color', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'show_if'      => array(
					'show_control_dot' => 'on',
				),
				'default'      => '#007aff',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'slider_styles',
				'description'  => esc_html__( 'Here you can choose a custom color to be used for the pagination of inactive items.', 'divi-plus' ),
			),
			'slider_container_custom_padding' => array(
				'label'            => esc_html__( 'Slider Container Padding', 'divi-plus' ),
				'type'             => 'custom_padding',
				'option_category'  => 'layout',
				'mobile_options'   => true,
				'hover'            => false,
				'default'          => '',
				'default_on_front' => '',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'margin_padding',
				'description'      => esc_html__( 'Padding adds extra space to the inside of the element, increasing the distance between the edge of the element and its inner contents.', 'divi-plus' ),
			),
		);
	}

	public function render( $attrs, $content, $render_slug ) {

		$show_arrow                     = esc_attr( $this->props['show_arrow'] );
		$show_arrow_on_hover            = esc_attr( $this->props['show_arrow_on_hover'] );
		$arrow_color                    = esc_attr( $this->props['arrow_color'] );
		$arrow_color_hover              = esc_attr( $this->get_hover_value( 'arrow_color' ) );
		$use_arrow_background           = esc_attr( $this->props['use_arrow_background'] );
		$arrow_background_color         = esc_attr( $this->props['arrow_background_color'] );
		$arrow_background_color_hover   = esc_attr( $this->get_hover_value( 'arrow_background_color' ) );
		$arrow_background_border_size   = esc_attr( $this->props['arrow_background_border_size'] );
		$arrow_shape_border_color       = esc_attr( $this->props['arrow_shape_border_color'] );
		$arrow_shape_border_color_hover = esc_attr( $this->get_hover_value( 'arrow_shape_border_color' ) );
		$show_control_dot               = esc_attr( $this->props['show_control_dot'] );
		$control_dot_style				= esc_attr( $this->props['control_dot_style'] );
		$control_dot_active_color       = esc_attr( $this->props['control_dot_active_color'] );
		$control_dot_inactive_color     = esc_attr( $this->props['control_dot_inactive_color'] );
		$slide_alignment                = esc_attr( $this->props['slide_alignment'] ) ? esc_attr( $this->props['slide_alignment'] ) : 'center';
		$slide_image_width              = esc_attr( $this->props['slide_image_width'] );
		$slide_image_height             = esc_attr( $this->props['slide_image_height'] );
		$transition_duration			= esc_attr( $this->props['transition_duration'] );
		$order_class                    = $this->get_module_order_class( $render_slug );
		$order_number                   = esc_attr( preg_replace( '/[^0-9]/', '', esc_attr( $order_class ) ) );
		$arrows_position				= et_pb_responsive_options()->get_property_values( $this->props, 'arrows_position' );
		$arrows_position				= array_filter( $arrows_position );

		wp_enqueue_script( 'elicus-swiper-script' );
		wp_enqueue_style( 'elicus-swiper-style' );
		wp_enqueue_style( 'dipl-swiper-style' );
		$file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        wp_enqueue_style( 'dipl-logo-slider-style', PLUGIN_PATH . 'includes/modules/LogoSlider/' . $file . '.min.css', array(), '1.0.0' );

		if ( '' !== $slide_image_width ) {
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-slide img',
					'declaration' => sprintf( 'width: %1$s;', esc_attr( $slide_image_width ) ),
				)
			);
		}

		if ( '' !== $slide_image_height ) {
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-slide',
					'declaration' => sprintf( 'min-height: %1$s;', esc_attr( $slide_image_height ) ),
				)
			);
		}

		if ( 'on' === $show_arrow ) {
			if ( $arrow_color ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_swiper_navigation .swiper-button-prev, %%order_class%% .dipl_swiper_navigation .swiper-button-next',
						'declaration' => sprintf( 'color: %1$s;', esc_attr( $arrow_color ) ),
					)
				);
			}

			if ( $arrow_color_hover ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_swiper_navigation .swiper-button-prev:hover, %%order_class%% .dipl_swiper_navigation .swiper-button-next:hover',
						'declaration' => sprintf( 'color: %1$s;', esc_attr( $arrow_color_hover ) ),
					)
				);
			}

			$arrow_font_size = et_pb_responsive_options()->get_property_values( $this->props, 'arrow_font_size' );
			if ( ! empty( array_filter( $arrow_font_size ) ) ) {
				et_pb_responsive_options()->generate_responsive_css( $arrow_font_size, '%%order_class%% .dipl_swiper_navigation .swiper-button-prev, %%order_class%% .dipl_swiper_navigation .swiper-button-next', 'font-size', $render_slug, '', 'range' );
			}

			if ( '' !== $this->props['next_slide_arrow'] ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_swiper_navigation .swiper-button-next::after',
						'declaration' => 'display: flex; align-items: center; height: 100%; content: attr(data-next_slide_arrow);',
					)
				);
				if ( class_exists( 'ET_Builder_Module_Helper_Style_Processor' ) && method_exists( 'ET_Builder_Module_Helper_Style_Processor', 'process_extended_icon' ) ) {
					$this->generate_styles(
						array(
							'utility_arg'    => 'icon_font_family',
							'render_slug'    => $render_slug,
							'base_attr_name' => 'next_slide_arrow',
							'important'      => true,
							'selector'       => '%%order_class%% .dipl_swiper_navigation .swiper-button-next::after',
							'processor'      => array(
								'ET_Builder_Module_Helper_Style_Processor',
								'process_extended_icon',
							),
						)
					);
				} else {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_swiper_navigation .swiper-button-next::after',
							'declaration' => 'font-family: "ETmodules";',
						)
					);
				}
			}

			if ( '' !== $this->props['previous_slide_arrow'] ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_swiper_navigation .swiper-button-prev::after',
						'declaration' => 'display: flex; align-items: center; height: 100%; content: attr(data-previous_slide_arrow);',
					)
				);
				if ( class_exists( 'ET_Builder_Module_Helper_Style_Processor' ) && method_exists( 'ET_Builder_Module_Helper_Style_Processor', 'process_extended_icon' ) ) {
					$this->generate_styles(
						array(
							'utility_arg'    => 'icon_font_family',
							'render_slug'    => $render_slug,
							'base_attr_name' => 'previous_slide_arrow',
							'important'      => true,
							'selector'       => '%%order_class%% .dipl_swiper_navigation .swiper-button-prev::after',
							'processor'      => array(
								'ET_Builder_Module_Helper_Style_Processor',
								'process_extended_icon',
							),
						)
					);
				} else {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_swiper_navigation .swiper-button-prev::after',
							'declaration' => 'font-family: "ETmodules";',
						)
					);
				}
			}

			if ( 'on' === $show_arrow_on_hover ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_swiper_navigation .swiper-button-prev',
						'declaration' => 'visibility: hidden; opacity: 0; transition: all 300ms ease;',
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_swiper_navigation .swiper-button-next',
						'declaration' => 'visibility: hidden; opacity: 0; transition: all 300ms ease;',
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%%:hover .dipl_swiper_navigation .swiper-button-prev, %%order_class%%:hover .dipl_swiper_navigation .swiper-button-next',
						'declaration' => 'visibility: visible; opacity: 1;',
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%%:hover .dipl_swiper_navigation .swiper-button-prev.swiper-button-disabled, %%order_class%%:hover .dipl_swiper_navigation .swiper-button-next.swiper-button-disabled',
						'declaration' => 'opacity: 0.35;',
					)
				);
				
				/* Outside Slider */
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_arrows_outside .swiper-button-prev',
						'declaration' => 'left: 50px;',
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_arrows_outside .swiper-button-next',
						'declaration' => 'right: 50px;',
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%%:hover .dipl_arrows_outside .swiper-button-prev',
						'declaration' => 'left: 0;',
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%%:hover .dipl_arrows_outside .swiper-button-next',
						'declaration' => 'right: 0;',
					)
				);
				/* Inside Slider */
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_arrows_inside .swiper-button-prev',
						'declaration' => 'left: -50px;',
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_arrows_inside .swiper-button-next',
						'declaration' => 'right: -50px;',
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%%:hover .dipl_arrows_inside .swiper-button-prev',
						'declaration' => 'left: 0;',
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%%:hover .dipl_arrows_inside .swiper-button-next',
						'declaration' => 'right: 0;',
					)
				);

			}

			if ( 'on' === $use_arrow_background ) {
				if ( '' !== $arrow_background_color ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_swiper_navigation .swiper-button-prev, %%order_class%% .dipl_swiper_navigation .swiper-button-next',
							'declaration' => sprintf( 'background: %1$s;', esc_attr( $arrow_background_color ) ),
						)
					);
				}

				if ( '' !== $arrow_background_color_hover ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_swiper_navigation .swiper-button-prev:hover, %%order_class%% .dipl_swiper_navigation .swiper-button-next:hover',
							'declaration' => sprintf( 'background: %1$s;', esc_attr( $arrow_background_color_hover ) ),
						)
					);
				}

				if ( '' !== $arrow_background_border_size ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_swiper_navigation .swiper-button-prev, %%order_class%% .dipl_swiper_navigation .swiper-button-next',
							'declaration' => sprintf( 'border-width: %1$s;', esc_attr( $arrow_background_border_size ) ),
						)
					);
				}

				if ( '' !== $arrow_shape_border_color ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_swiper_navigation .swiper-button-prev, %%order_class%% .dipl_swiper_navigation .swiper-button-next',
							'declaration' => sprintf( 'border-color: %1$s;', esc_attr( $arrow_shape_border_color ) ),
						)
					);
				}

				if ( '' !== $arrow_shape_border_color_hover ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_swiper_navigation .swiper-button-prev:hover, %%order_class%% .dipl_swiper_navigation .swiper-button-next:hover',
							'declaration' => sprintf( 'border-color: %1$s;', esc_attr( $arrow_shape_border_color_hover ) ),
						)
					);
				}
			}
		}

		if ( 'on' === $show_control_dot ) {
			if ( '' !== $control_dot_inactive_color ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-pagination-bullet',
						'declaration' => sprintf( 'background: %1$s;', esc_attr( $control_dot_inactive_color ) ),
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .transparent_dot .swiper-pagination-bullet',
						'declaration' => sprintf( 'border-color: %1$s;', esc_attr( $control_dot_inactive_color ) ),
					)
				);
			}

			if ( '' !== $control_dot_active_color ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-pagination-bullet.swiper-pagination-bullet-active',
						'declaration' => sprintf( 'background: %1$s;', esc_attr( $control_dot_active_color ) ),
					)
				);
			}

			if ( 'stretched_dot' === $control_dot_style && $transition_duration ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .stretched_dot .swiper-pagination-bullet',
						'declaration' => sprintf( 'transition: all %1$sms ease;', intval( $transition_duration ) ),
					)
				);
			}
		}

		$output  = '<div class="dipl_swiper_wrapper">';
		$output .= sprintf(
			'<div class="dipl_logo_slider_wrapper dipl_swiper_inner_wrap dipl_slide_%1$s">',
			$slide_alignment
		);

		$output .= '<div class="swiper-container">';
		$output .= '<div class="swiper-wrapper">';
		$output .= $this->content;
		$output .= '</div> <!-- swiper-wrapper -->';
		$output .= '</div> <!-- swiper-container -->';
		
		if ( 'on' === $show_arrow ) {
			$next = sprintf(
				'<div class="swiper-button-next"%1$s></div>',
				'' !== $this->props['next_slide_arrow'] ?
				sprintf(
					' data-next_slide_arrow="%1$s"',
					esc_attr( et_pb_process_font_icon( $this->props['next_slide_arrow'] ) )
				) :
				''
			);

			$prev = sprintf(
				'<div class="swiper-button-prev"%1$s></div>',
				'' !== $this->props['previous_slide_arrow'] ?
				sprintf(
					' data-previous_slide_arrow="%1$s"',
					esc_attr( et_pb_process_font_icon( $this->props['previous_slide_arrow'] ) )
				) :
				''
			);

			if ( ! empty( $arrows_position ) ) {
				wp_enqueue_script( 'dipl-logo-slider-custom', PLUGIN_PATH."includes/modules/LogoSlider/dipl-logo-slider-custom.min.js", array('jquery'), '1.0.0', true );
				$arrows_position_data = '';
				foreach( $arrows_position as $device => $value ) {
					$arrows_position_data .= ' data-arrows_' . $device . '="' . $value . '"';
				}
			}

			$output .= sprintf(
				'<div class="dipl_swiper_navigation"%3$s>%1$s %2$s</div>',
				$next,
				$prev,
				! empty( $arrows_position ) ? $arrows_position_data : ''
			);
		}

		$output .= '</div> <!-- dipl_logo_slider_wrapper -->';

		if ( 'on' === $show_control_dot ) {
			$output .= sprintf(
				'<div class="dipl_swiper_pagination"><div class="swiper-pagination %1$s"></div></div>',
				esc_attr( $control_dot_style )
			);
		}

		$output .= '</div> <!--- dipl_swiper_wrapper -->';
		
		$output .= $this->dipl_render_slider_script();

		$this->process_advanced_margin_padding_css( $this, $render_slug, $this->margin_padding );

		return $output;
	}

	public function before_render() {
		$is_responsive = et_pb_responsive_options()->is_responsive_enabled( $this->props, 'logo_per_slide' );
		if ( ! $is_responsive ) {
			$logo_per_slide = $this->props['logo_per_slide'];
			$logo_per_slide_tablet = $logo_per_slide < 4 ? $logo_per_slide : 3;
			$logo_per_slide_mobile = 1;
			if ( isset( $logo_per_slide_tablet ) && '' !== $logo_per_slide_tablet ) {
				$this->props['logo_per_slide_tablet'] = $logo_per_slide_tablet;
			}

			if ( isset( $logo_per_slide_mobile ) && '' !== $logo_per_slide_mobile ) {
				$this->props['logo_per_slide_phone'] = $logo_per_slide_mobile;
			}
		}
	}

	/**
	 * This function dynamically creates script parameters according to the user settings
	 *
	 * @return string
	 * */
	public function dipl_render_slider_script() {
		$order_class     		= $this->get_module_order_class( 'dipl_logo_slider' );
		$show_arrow            	= esc_attr( $this->props['show_arrow'] );
		$show_control_dot       = esc_attr( $this->props['show_control_dot'] );
		$loop                  	= esc_attr( $this->props['slider_loop'] );
		$autoplay              	= esc_attr( $this->props['autoplay'] );
		$autoplay_speed        	= intval( $this->props['autoplay_speed'] );
		$transition_duration  	= intval( $this->props['transition_duration'] );
		$pause_on_hover        	= esc_attr( $this->props['pause_on_hover'] );
		$logo_per_slide 		= et_pb_responsive_options()->get_property_values( $this->props, 'logo_per_slide', '', true );
		$space_between_slides 	= et_pb_responsive_options()->get_property_values( $this->props, 'space_between_slides', '', true );
		$slides_per_group 		= et_pb_responsive_options()->get_property_values( $this->props, 'slides_per_group', '', true );
		$dynamic_bullets		= 'on' === $this->props['enable_dynamic_dots'] && in_array( $this->props['control_dot_style'], array( 'solid_dot', 'transparent_dot', 'square_dot' ), true ) ? 'true' : 'false';

		$autoplay_speed      		= '' !== $autoplay_speed || 0 !== $autoplay_speed ? $autoplay_speed : 3000;
		$transition_duration 		= '' !== $transition_duration || 0 !== $transition_duration ? $transition_duration : 1000;
		$loop          				= 'on' === $loop ? 'true' : 'false';
		$arrows 					= 'false';
		$dots 						= 'false';
		$autoplaySlides				= 0;
		$slidesPerGroup 			= 1;
		$slidesPerGroupIpad			= 1;
		$slidesPerGroupMobile		= 1;
		$slidesPerGroupSkip			= 0;
		$slidesPerGroupSkipIpad		= 0;
		$slidesPerGroupSkipMobile	= 0;

		$logo_per_view        		= $logo_per_slide['desktop'];
		$logo_per_view_ipad   		= '' !== $logo_per_slide['tablet'] ? $logo_per_slide['tablet'] : $this->props['logo_per_slide_tablet'];
		$logo_per_view_mobile 		= '' !== $logo_per_slide['phone'] ? $logo_per_slide['phone'] : $this->props['logo_per_slide_phone'];
		$logo_space_between   		= $space_between_slides['desktop'];
		$logo_space_between_ipad   	= '' !== $space_between_slides['tablet'] ? $space_between_slides['tablet'] : $logo_space_between;
		$logo_space_between_mobile  = '' !== $space_between_slides['phone'] ? $space_between_slides['phone'] : $logo_space_between_ipad;
		$slidesPerGroup 			= $slides_per_group['desktop'];
		$slidesPerGroupIpad			= '' !== $slides_per_group['tablet'] ? $slides_per_group['tablet'] : $slidesPerGroup;
		$slidesPerGroupMobile		= '' !== $slides_per_group['phone'] ? $slides_per_group['phone'] : $slidesPerGroupIpad;

		if ( $logo_per_view > $slidesPerGroup && 1 !== $slidesPerGroup ) {
			$slidesPerGroupSkip = $logo_per_view - $slidesPerGroup;
		}
		if ( $logo_per_view_ipad > $slidesPerGroupIpad && 1 !== $slidesPerGroupIpad ) {
			$slidesPerGroupSkipIpad = $logo_per_view_ipad - $slidesPerGroupIpad;
		}
		if ( $logo_per_view_mobile > $slidesPerGroupMobile && 1 !== $slidesPerGroupMobile ) {
			$slidesPerGroupSkipMobile = $logo_per_view_mobile - $slidesPerGroupMobile;
		}

		if ( 'on' === $show_arrow ) {
			$arrows = "{    
                            nextEl: '." . esc_attr( $order_class ) . " .swiper-button-next',
                            prevEl: '." . esc_attr( $order_class ) . " .swiper-button-prev',
                    }";
		}

		if ( 'on' === $show_control_dot ) {
			$dots = "{
                        el: '." . esc_attr( $order_class ) . " .swiper-pagination',
                        dynamicBullets: " . $dynamic_bullets . ",
                        clickable: true,
                    }";
		}

		if ( 'on' === $autoplay ) {
			if ( 'on' === $pause_on_hover ) {
				$autoplaySlides = '{
                                delay:' . $autoplay_speed . ',
                                disableOnInteraction: true,
                            }';
			} else {
				$autoplaySlides = '{
                                delay:' . $autoplay_speed . ',
                                disableOnInteraction: false,
                            }';
			}
		}

		$script  = '<script>';
		$script .= 'jQuery(function($) {';
		$script .= 'var ' . esc_attr( $order_class ) . '_swiper = new Swiper(\'.' . esc_attr( $order_class ) . ' .swiper-container\', {
                            slidesPerView: ' . $logo_per_view . ',
                            slidesPerGroup: ' . $slidesPerGroup . ',
                            slidesPerGroupSkip: ' . $slidesPerGroupSkip . ',
                            autoplay: ' . $autoplaySlides . ',
                            spaceBetween: ' . intval( $logo_space_between ) . ',
                            speed: ' . $transition_duration . ',
                            loop: ' . $loop . ',
                            pagination: ' . $dots . ',
                            navigation: ' . $arrows . ',
                            grabCursor: \'true\',
                            breakpoints: {
                            	981: {
		                          	slidesPerView: ' . $logo_per_view . ',
		                          	spaceBetween: ' . intval( $logo_space_between ) . ',
                            		slidesPerGroup: ' . $slidesPerGroup . ',
                            		slidesPerGroupSkip: ' . $slidesPerGroupSkip . ',
		                        },
		                        768: {
		                          	slidesPerView: ' . $logo_per_view_ipad . ',
		                          	spaceBetween: ' . intval( $logo_space_between_ipad ) . ',
		                          	slidesPerGroup: ' . $slidesPerGroupIpad . ',
                            		slidesPerGroupSkip: ' . $slidesPerGroupSkipIpad . ',
		                        },
		                        0: {
		                          	slidesPerView: ' . $logo_per_view_mobile . ',
		                          	spaceBetween: ' . intval( $logo_space_between_mobile ) . ',
		                          	slidesPerGroup: ' . $slidesPerGroupMobile . ',
                            		slidesPerGroupSkip: ' . $slidesPerGroupSkipMobile . ',
		                        }
		                    },
                    });';

		if ( 'on' === $pause_on_hover && 'on' === $autoplay ) {
			$script .= '$(".' . esc_attr( $order_class ) . ' .swiper-container").on("mouseenter", function(e) {
							if ( typeof ' . esc_attr( $order_class ) . '_swiper.autoplay.stop === "function" ) {
								' . esc_attr( $order_class ) . '_swiper.autoplay.stop();
							}
                        });';
            $script .= '$(".' . esc_attr( $order_class ) . ' .swiper-container").on("mouseleave", function(e) {
        					if ( typeof ' . esc_attr( $order_class ) . '_swiper.autoplay.start === "function" ) {
                            	' . esc_attr( $order_class ) . '_swiper.autoplay.start();
                            }
                        });';
		}

		if ( 'true' !== $loop ) {
			$script .=  esc_attr( $order_class ) . '_swiper.on(\'reachEnd\', function(){
                            ' . esc_attr( $order_class ) . '_swiper.autoplay = false;
                        });';
		}

		$script .= '});</script>';

		return $script;
	}

	public function process_advanced_margin_padding_css( $module, $function_name, $margin_padding ) {
		$utils           = ET_Core_Data_Utils::instance();
		$all_values      = $module->props;
		$advanced_fields = $module->advanced_fields;

		// Disable if module doesn't set advanced_fields property and has no VB support.
		if ( ! $module->has_vb_support() && ! $module->has_advanced_fields ) {
			return;
		}

		$allowed_advanced_fields = array( 'slider_margin_padding' );
		foreach ( $allowed_advanced_fields as $advanced_field ) {
			if ( ! empty( $advanced_fields[ $advanced_field ] ) ) {
				foreach ( $advanced_fields[ $advanced_field ] as $label => $form_field ) {
					$margin_key  = "{$label}_custom_margin";
					$padding_key = "{$label}_custom_padding";
					if ( '' !== $utils->array_get( $all_values, $margin_key, '' ) || '' !== $utils->array_get( $all_values, $padding_key, '' ) ) {
						$settings = $utils->array_get( $form_field, 'margin_padding', array() );
						// Ensure main selector exists.
						$form_field_margin_padding_css = $utils->array_get( $settings, 'css.main', '' );
						if ( empty( $form_field_margin_padding_css ) ) {
							$utils->array_set( $settings, 'css.main', $utils->array_get( $form_field, 'css.main', '' ) );
						}

						$margin_padding->update_styles( $module, $label, $settings, $function_name, $advanced_field );
					}
				}
			}
		}
	}

	public function add_new_child_text() {
		return esc_html__( 'Add New Logo', 'divi-plus' );
	}
}

$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
    $modules = explode( ',', $plugin_options['dipl-modules'] );
    if ( in_array( 'dipl_logo_slider', $modules ) ) {
        new DIPL_LogoSlider();
    }
} else {
    new DIPL_LogoSlider();
}