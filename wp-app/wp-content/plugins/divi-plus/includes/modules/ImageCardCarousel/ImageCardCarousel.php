<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.4
 */
class DIPL_ImageCardCarousel extends ET_Builder_Module {
	public $slug       = 'dipl_image_card_carousel';
	public $child_slug = 'dipl_image_card_carousel_item';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name             = esc_html__( 'DP Image Card Carousel', 'divi-plus' );
		$this->child_item_text  = esc_html__( 'Image Card', 'divi-plus' );
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
					'text'  => array(
						'title' => esc_html__( 'Text', 'divi-plus' ),
					),
					'text_settings' => array(
						'title' => esc_html__( 'Title & Content', 'divi-plus' ),
						'sub_toggles'   => array(
                            'title' => array(
                                'name' => 'Title',
                            ),
                            'content' => array(
                                'name' => 'Content',
                            ),
                        ),
                        'tabbed_subtoggles' => true,
					),
					'icon' => array(
						'title' => esc_html__( 'Icon', 'divi-plus' ),
					),
					'button' => array(
						'title' => esc_html__( 'Button', 'divi-plus' ),
					),
					'slider_styles' => array(
						'title'    => esc_html__( 'Slider', 'divi-plus' ),
					),
				),
			),
		);
	}


	public function get_advanced_fields_config() {
		return array(
			'fonts' => array(
				'title' => array(
					'label'          => esc_html__( 'Title', 'divi-plus' ),
					'font_size'      => array(
						'default_on_front' => '16px',
						'range_settings'   => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'    => true,
					),
					'line_height'    => array(
						'default_on_front' => '1.2em',
						'range_settings'   => array(
							'min'  => '0.1',
							'max'  => '10',
							'step' => '0.1',
						),
					),
					'letter_spacing' => array(
						'default_on_front' => '0px',
						'range_settings'   => array(
							'min'  => '0',
							'max'  => '10',
							'step' => '1',
						),
						'validate_unit'    => true,
					),
					'header_level'  => array(
						'default'   => 'h4',
					),
					'css'            => array(
						'main' => '%%order_class%% .dipl_image_card_title',
					),
					'tab_slug' => 'advanced',
					'toggle_slug' => 'text_settings',
					'sub_toggle' => 'title',
				),
				'content' => array(
					'label'          => esc_html__( 'Content', 'divi-plus' ),
					'font_size'      => array(
						'default_on_front' => '14px',
						'range_settings'   => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'    => true,
					),
					'line_height'    => array(
						'default_on_front' => '1.5em',
						'range_settings'   => array(
							'min'  => '0.1',
							'max'  => '10',
							'step' => '0.1',
						),
					),
					'letter_spacing' => array(
						'default_on_front' => '0px',
						'range_settings'   => array(
							'min'  => '0',
							'max'  => '10',
							'step' => '1',
						),
						'validate_unit'    => true,
					),
					'css'            => array(
						'main' => '%%order_class%% .dipl_image_card_content',
					),
					'tab_slug' => 'advanced',
					'toggle_slug' => 'text_settings',
					'sub_toggle' => 'content',
				),
			),
			'borders' => array(
				'default' => array(
					'css' => array(
						'main' => array(
							'border_radii'  => $this->main_css_element,
							'border_styles' => $this->main_css_element,
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
				'css' => array(
					'main' => $this->main_css_element,
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
			'margin_padding' => array(
				'css' => array(
					'main'      => $this->main_css_element,
					'important' => 'all',
				),
			),
			'text' => array(
				'css' => array(
					'main' => '%%order_class%%',
				),
				'options'               => array(
					'text_orientation'  => array(
						'default' => 'left',
						'default_on_front' => 'left',
					),
				),
			),
			'filters'        => false,
			'link_options'   => false,
		);

	}

	public function get_fields() {
		$et_accent_color = et_builder_accent_color();
		return array(
			'slide_effect' => array(
				'label'           => esc_html__( 'Carousel Effect', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'slide'     => esc_html__( 'Slide', 'divi-plus' ),
					'cube'      => esc_html__( 'Cube', 'divi-plus' ),
					'coverflow' => esc_html__( 'Coverflow', 'divi-plus' ),
					'flip'      => esc_html__( 'Flip', 'divi-plus' ),
				),
				'default'         => 'slide',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can choose the slide animation effect.', 'divi-plus' ),
			),
			'cards_per_slide' => array(
				'label'           => esc_html__( 'Number of Cards Per View', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'1' => esc_html__( '1', 'divi-plus' ),
					'2' => esc_html__( '2', 'divi-plus' ),
					'3' => esc_html__( '3', 'divi-plus' ),
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
				),
				'default'         => '3',
				'mobile_options'  => true,
				'show_if'         => array(
					'slide_effect' => array( 'slide', 'coverflow' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can choose the number of cards to display per slide.', 'divi-plus' ),
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
				),
				'default'         => '1',
				'mobile_options'  => true,
				'show_if'         => array(
					'slide_effect' => array( 'slide', 'coverflow' ),
				),
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
				'show_if'         => array(
					'slide_effect' => array( 'slide', 'coverflow' ),
				),
				'fixed_unit'	  => 'px',
				'default'         => '20px',
				'mobile_options'  => true,
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Move the slider or input the value to increse or decrease the space between slides.', 'divi-plus' ),
			),
			'enable_coverflow_shadow' => array(
				'label'            => esc_html__( 'Enable Slide Shadow', 'divi-plus' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'default'          => 'off',
				'show_if'          => array(
					'slide_effect' => 'coverflow',
				),
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Enable Slide Shadow For Coverflow Effect.', 'divi-plus' ),
			),
			'coverflow_shadow_color' => array(
				'label'        	   => esc_html__( 'Shadow Color', 'divi-plus' ),
				'type'         	   => 'color-alpha',
				'custom_color' 	   => true,
				'show_if'          => array(
					'slide_effect' => 'coverflow',
					'enable_coverflow_shadow' => 'on',
				),
				'default'      	   => '#ccc',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Here you can select color for the Shadow.', 'divi-plus' ),
			),
			'coverflow_rotate' => array(
				'label'            => esc_html__( 'Coverflow Rotate', 'divi-plus' ),
				'type'             => 'range',
				'option_category'  => 'font_option',
				'range_settings'   => array(
					'min'  => '1',
					'max'  => '360',
					'step' => '1',
				),
				'unitless'         => true,
				'show_if'          => array(
					'slide_effect' => 'coverflow',
				),
				'default'          => '40',
				'mobile_options'   => true,
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Coverflow Rotate Slide.', 'divi-plus' ),
			),
			'coverflow_depth' => array(
				'label'            => esc_html__( 'Coverflow Depth', 'divi-plus' ),
				'type'             => 'range',
				'option_category'  => 'font_option',
				'range_settings'   => array(
					'min'  => '1',
					'max'  => '1000',
					'step' => '1',
				),
				'unitless'         => true,
				'show_if'          => array(
					'slide_effect' => 'coverflow',
				),
				'default'          => '100',
				'mobile_options'   => true,
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Coverflow Depth Slide.', 'divi-plus' ),
			),
			'equalize_slides_height' => array(
				'label'            => esc_html__( 'Equalize Slides Height', 'divi-plus' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'default'          => 'off',
				'default_on_front' => 'off',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Choose whether or not equalize slides height.', 'divi-plus' ),
			),
			'slider_loop' => array(
				'label'            => esc_html__( 'Enable Loop', 'divi-plus' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'default'          => 'off',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Here you can enable loop for the slides.', 'divi-plus' ),
			),
			'autoplay' => array(
				'label'            => esc_html__( 'Autoplay', 'divi-plus' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'default'          => 'on',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'This controls the auto play of the card carousel.', 'divi-plus' ),
			),
			'autoplay_speed' => array(
				'label'            => esc_html__( 'Autoplay Delay', 'divi-plus' ),
				'type'             => 'text',
				'option_category'  => 'configuration',
				'default'          => '3000',
				'show_if'          => array(
					'autoplay' => 'on',
				),
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'This controls the time of the slide before the transition.', 'divi-plus' ),
			),
			'pause_on_hover' => array(
				'label'            => esc_html__( 'Pause On Hover', 'divi-plus' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'default'          => 'on',
				'show_if'          => array(
					'autoplay' => 'on',
				),
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Control for pausing slides on mouse hover.', 'divi-plus' ),
			),
			'slide_transition_duration' => array(
				'label'           => esc_html__( 'Transition Duration', 'divi-plus' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'default'         => '1000',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can specify the duration of transition for each slide in miliseconds.', 'divi-plus' ),
			),
			'show_arrow' => array(
				'label'            => esc_html__( 'Show Arrows', 'divi-plus' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'default'          => 'off',
				'default_on_front' => 'off',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Choose whether or not the previous & next arrows should be visible.', 'divi-plus' ),
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
			'show_arrow_on_hover' => array(
				'label'            => esc_html__( 'Show Arrows On Hover', 'divi-plus' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'show_if'          => array(
					'show_arrow' => 'on',
				),
				'default'          => 'off',
				'default_on_front' => 'off',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Choose whether or not the previous and next arrows should be visible.', 'divi-plus' ),
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
			'show_control_dot' => array(
				'label'            => esc_html__( 'Show Dots Pagination', 'divi-plus' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'default'          => 'off',
				'default_on_front' => 'off',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'This setting will turn on and off the pagination of the slider.', 'divi-plus' ),
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
			'arrow_font_size' => array(
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
				'default'         => '24px',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'slider_styles',
				'description'     => esc_html__( 'Here you can choose the arrow font size.', 'divi-plus' ),
			),
			'arrow_color' => array(
				'label'        => esc_html__( 'Arrow Color', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'show_if'      => array(
					'show_arrow' => 'on',
				),
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'slider_styles',
				'description'  => esc_html__( 'Here you can define color for the arrow', 'divi-plus' ),
			),
			'arrow_background_color' => array(
				'label'        => esc_html__( 'Arrow Background', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'show_if'      => array(
					'show_arrow' => 'on',
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
				'show_if' 		  => array(
					'show_arrow' => 'on',
				),
				'default'         => '0px',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'slider_styles',
				'description'     => esc_html__( 'Move the slider or input the value to increase or decrease the border size of the arrow background.', 'divi-plus' ),
			),
			'arrow_background_border_color' => array(
				'label'        => esc_html__( 'Arrow Background Border Color', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'show_if'      => array(
					'show_arrow' => 'on',
				),
				'hover'        => 'tabs',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'slider_styles',
				'description'  => esc_html__( 'Here you can choose a custom color to be used for the arrow border', 'divi-plus' ),
			),
			'control_dot_active_color' => array(
				'label'        	   => esc_html__( 'Active Dot Pagination Color', 'divi-plus' ),
				'type'         	   => 'color-alpha',
				'custom_color'     => true,
				'show_if'          => array(
					'show_control_dot' => 'on',
				),
				'default'      	   => '#000000',
				'tab_slug'     	   => 'advanced',
				'toggle_slug'  	   => 'slider_styles',
				'description'  	   => esc_html__( 'Here you can define color for the active pagination item.', 'divi-plus' ),
			),
			'control_dot_inactive_color' => array(
				'label'        	   => esc_html__( 'Inactive Dot Pagination Color', 'divi-plus' ),
				'type'         	   => 'color-alpha',
				'custom_color'     => true,
				'show_if'      	   => array(
					'show_control_dot' => 'on',
				),
				'default'      	   => '#cccccc',
				'tab_slug'     	   => 'advanced',
				'toggle_slug'  	   => 'slider_styles',
				'description'  	   => esc_html__( 'Here you can define color for the inactive pagination item.', 'divi-plus' ),
			),
			'icon_alignment' => array(
				'label'                 => esc_html__( 'Icon Alignment', 'divi-plus' ),
				'type'                  => 'text_align',
                'option_category'       => 'layout',
                'options'               => et_builder_get_text_orientation_options( array( 'justified' ) ),
                'mobile_options'		=> true,
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'icon',
				'description'           => esc_html__( 'Here you can choose where to place an icon on the image card.', 'divi-plus' ),
			),
			'icon_font_size' => array(
				'label'            => esc_html__( 'Icon Font Size', 'divi-plus' ),
				'type'             => 'range',
				'option_category'  => 'font_option',
				'range_settings'   => array(
					'min'  => '1',
					'max'  => '120',
					'step' => '1',
				),
				'mobile_options'   => true,
				'default'          => '32px',
				'default_on_front' => '32px',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'icon',
				'description'      => esc_html__( 'Control the size of the icon by increasing or decreasing the font size.', 'divi-plus' ),
			),
			'icon_color' => array(
				'label'          	 => esc_html__( 'Icon Color', 'divi-plus' ),
				'type'            	=> 'color-alpha',
				'hover'           	=> 'tabs',
				'mobile_options'  	=> true,
				'default'         	=> esc_attr( $et_accent_color ),
				'default_on_front'  => esc_attr( $et_accent_color ),
				'tab_slug'        	=> 'advanced',
				'toggle_slug'     	=> 'icon',
				'description'     	=> esc_html__( 'Here you can define a custom color for your icon.', 'divi-plus' ),
			),
			'slider_container_custom_padding'   => array(
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

	public function before_render() {
		global $dp_icc_parent_icon_font_size;
		$dp_icc_parent_icon_font_size = et_pb_responsive_options()->get_property_values( $this->props, 'icon_font_size' );

		$is_responsive = et_pb_responsive_options()->is_responsive_enabled( $this->props, 'cards_per_slide' );
		if ( ! $is_responsive ) {
			$cards_per_slide = $this->props['cards_per_slide'];
			if ( 'slide' === $this->props['slide_effect'] ) {
				$cards_per_slide_tablet = $cards_per_slide < 3 ? $cards_per_slide : 2;
				$cards_per_slide_mobile = 1;
			} else if ( 'coverflow' === $this->props['slide_effect'] ) {
				$cards_per_slide_tablet = 3;
				$cards_per_slide_mobile = 1;
			}
			if ( isset( $cards_per_slide_tablet ) && '' !== $cards_per_slide_tablet ) {
				$this->props['cards_per_slide_tablet'] = $cards_per_slide_tablet;
			}

			if ( isset( $cards_per_slide_mobile ) && '' !== $cards_per_slide_mobile ) {
				$this->props['cards_per_slide_phone'] = $cards_per_slide_mobile;
			}
		}
	}

	public function render( $attrs, $content, $render_slug ) {

		$slide_effect 							= $this->props['slide_effect'];
		$cards_per_slide						= $this->props['cards_per_slide'];
		$enable_coverflow_shadow 				= $this->props['enable_coverflow_shadow'];
		$coverflow_shadow_color 				= $this->props['coverflow_shadow_color'];
		$coverflow_rotate 						= $this->props['coverflow_rotate'];
		$coverflow_depth 						= $this->props['coverflow_depth'];
		$equalize_slides_height					= $this->props['equalize_slides_height'];
		$slider_loop 							= $this->props['slider_loop'];
		$autoplay 								= $this->props['autoplay'];
		$autoplay_speed 						= $this->props['autoplay_speed'];
		$pause_on_hover 						= $this->props['pause_on_hover'];
		$show_arrow 							= $this->props['show_arrow'];
		$show_arrow_on_hover 					= $this->props['show_arrow_on_hover'];
		$show_control_dot 						= $this->props['show_control_dot'];
		$control_dot_style 						= $this->props['control_dot_style'];
		$coverflow_shadow_color					= $this->props['coverflow_shadow_color'];
		$control_dot_active_color 				= $this->props['control_dot_active_color'];
		$control_dot_inactive_color 			= $this->props['control_dot_inactive_color'];
		$slide_transition_duration				= $this->props['slide_transition_duration'];
		$arrow_color							= $this->props['arrow_color'];
		$arrow_color_hover						= $this->get_hover_value( 'arrow_color' );
		$arrow_background_color         		= $this->props['arrow_background_color'];
		$arrow_background_color_hover 			= $this->get_hover_value( 'arrow_background_color' );
		$arrow_background_border_size   	 	= $this->props['arrow_background_border_size'];
		$arrow_background_border_color       	= $this->props['arrow_background_border_color'];
		$arrow_background_border_color_hover 	= $this->get_hover_value( 'arrow_background_border_color' );
		$arrows_position						= et_pb_responsive_options()->get_property_values( $this->props, 'arrows_position' );
		$arrows_position						= array_filter( $arrows_position );

		if ( $this->content && '' !== $this->content ) {

			wp_enqueue_script( 'elicus-swiper-script' );
			wp_enqueue_style( 'elicus-swiper-style' );
			wp_enqueue_style( 'dipl-swiper-style' );

			$carousel  = '<div class="dipl_swiper_wrapper">';
			$carousel .= '<div class="dipl_image_card_carousel_layout dipl_swiper_inner_wrap">';
			$carousel .= '<div class="swiper-container">';
			$carousel .= '<div class="swiper-wrapper">';
			$carousel .= $this->content;
			$carousel .= '</div> <!-- swiper-wrapper -->';
			$carousel .= '</div> <!-- swiper-container -->';

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
					wp_enqueue_script( 'dipl-image-card-carousel-custom', PLUGIN_PATH."includes/modules/ImageCardCarousel/dipl-image-card-carousel-custom.min.js", array('jquery'), '1.0.0', true );
					$arrows_position_data = '';
					foreach( $arrows_position as $device => $value ) {
						$arrows_position_data .= ' data-arrows_' . $device . '="' . $value . '"';
					}
				}

				$carousel .= sprintf(
					'<div class="dipl_swiper_navigation"%3$s>%1$s %2$s</div>',
					$next,
					$prev,
					! empty( $arrows_position ) ? $arrows_position_data : ''
				);
			}

			$carousel .= '</div> <!-- dipl_image_card_carousel_layout -->';

			if ( 'on' === $show_control_dot ) {
				$carousel .= sprintf(
					'<div class="dipl_swiper_pagination"><div class="swiper-pagination %1$s"></div></div>',
					esc_attr( $control_dot_style )
				);
			}

			$carousel .= '</div> <!-- dipl_swiper_wrapper -->';

			$script = $this->dipl_render_slider_script();

			$output = $carousel . $script;

			if( 'on' === $enable_coverflow_shadow ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-container-3d .swiper-slide-shadow-left',
						'declaration' => sprintf( 'background-image: linear-gradient(to left,%1$s,rgba(0,0,0,0));', esc_attr( $coverflow_shadow_color ) ),
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-container-3d .swiper-slide-shadow-right',
						'declaration' => sprintf( 'background-image: linear-gradient(to right,%1$s,rgba(0,0,0,0));', esc_attr( $coverflow_shadow_color ) ),
					)
				);
			} else {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-container-3d .swiper-slide-shadow-left, %%order_class%% .swiper-container-3d .swiper-slide-shadow-right',
						'declaration' => 'background-image: none;',
					)
				);
			}

			if ( 'on' === $show_control_dot ) {
				if ( $control_dot_inactive_color ) {
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

				if ( $control_dot_active_color ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .swiper-pagination-bullet.swiper-pagination-bullet-active',
							'declaration' => sprintf( 'background: %1$s;', esc_attr( $control_dot_active_color ) ),
						)
					);
				}

				if ( 'stretched_dot' === $control_dot_style && $slide_transition_duration ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .stretched_dot .swiper-pagination-bullet',
							'declaration' => sprintf( 'transition: all %1$sms ease;', intval( $slide_transition_duration ) ),
						)
					);
				}
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
							'declaration' => 'display: flex; align-items: center; height: 100%; font-family: "ETmodules"; content: attr(data-next_slide_arrow);',
						)
					);
				}

				if ( '' !== $this->props['previous_slide_arrow'] ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_swiper_navigation .swiper-button-prev::after',
							'declaration' => 'display: flex; align-items: center; height: 100%; font-family: "ETmodules"; content: attr(data-previous_slide_arrow);',
						)
					);
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

				if ( '' !== $arrow_background_border_color ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_swiper_navigation .swiper-button-prev, %%order_class%% .dipl_swiper_navigation .swiper-button-next',
							'declaration' => sprintf( 'border-color: %1$s;', esc_attr( $arrow_background_border_color ) ),
						)
					);
				}

				if ( '' !== $arrow_background_border_color_hover ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_swiper_navigation .swiper-button-prev:hover, %%order_class%% .dipl_swiper_navigation .swiper-button-next:hover',
							'declaration' => sprintf( 'border-color: %1$s;', esc_attr( $arrow_background_border_color_hover ) ),
						)
					);
				}
			}

			if ( 'on' === $equalize_slides_height ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_image_card_carousel_item',
						'declaration' => 'height: auto; margin-bottom: 0 !important;',
					)
				);

				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_image_card_carousel_item .et_pb_module_inner',
						'declaration' => 'height: 100%;',
					)
				);

				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_image_card_carousel_item .dipl_image_card_wrapper',
						'declaration' => 'display: flex; flex-direction: column; height: 100%;',
					)
				);

				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_image_card_carousel_item .dipl_image_card_content_wrapper',
						'declaration' => 'flex-grow: 1;',
					)
				);
			}

			$icon_font_size 	= et_pb_responsive_options()->get_property_values( $this->props, 'icon_font_size' );
			$icon_color     	= et_pb_responsive_options()->get_property_values( $this->props, 'icon_color' );
			et_pb_responsive_options()->generate_responsive_css( $icon_font_size, '%%order_class%% .dipl_image_card_icon', 'font-size', $render_slug, '', 'range' );
			et_pb_responsive_options()->generate_responsive_css( $icon_color, '%%order_class%% .dipl_image_card_icon', 'color', $render_slug, '', 'color' );
			$icon_color_hover    = $this->get_hover_value( 'icon_color' );
            if ( $icon_color_hover ) {
                self::set_style( $render_slug, array(
                    'selector'    => '%%order_class%% .dipl_image_card_icon:hover',
                    'declaration' => sprintf(
                        'color: %1$s;',
                        esc_attr( $icon_color_hover )
                    ),
                ) );
            } 

			/* Icon Alignment */
			$icon_alignment = et_pb_responsive_options()->get_property_values( $this->props, 'icon_alignment' );
	        if ( ! empty( array_filter( $icon_alignment ) ) ) {
	            et_pb_responsive_options()->generate_responsive_css( $icon_alignment, '%%order_class%% .dipl_image_card_icon_wrapper', 'text-align', $render_slug, '', 'type' );
	        }

		} else {
			$output  = '<div class="entry">';
			$output  = '<h1>' . esc_html__( 'No Result Found!', 'divi-plus' ) . '</h1>';
			$output .= '<p>' . esc_html__( 'The carousel you requested could not be found. Try changing your module settings or add some new cards.', 'divi-plus' ) . '</p>';
			$output .= '</div>';
		}

		$this->add_classname(
			array(
				$this->get_text_orientation_classname(),
			)
		);

		$this->process_advanced_margin_padding_css( $this, $render_slug, $this->margin_padding );
		
		return et_core_intentionally_unescaped( $output, 'html' );
	}

	/**
	 * This function dynamically creates script parameters according to the user settings
	 *
	 * @return string
	 * */
	public function dipl_render_slider_script() {
		$order_class     			= $this->get_module_order_class( 'dipl_image_card_carousel' );
		$slide_effect          		= esc_attr( $this->props['slide_effect'] );
		$show_arrow            		= esc_attr( $this->props['show_arrow'] );
		$show_control_dot          	= esc_attr( $this->props['show_control_dot'] );
		$loop                  		= esc_attr( $this->props['slider_loop'] );
		$autoplay              		= esc_attr( $this->props['autoplay'] );
		$autoplay_speed        		= intval( $this->props['autoplay_speed'] );
		$transition_duration  		= intval( $this->props['slide_transition_duration'] );
		$pause_on_hover        		= esc_attr( $this->props['pause_on_hover'] );
		$enable_coverflow_shadow 	= 'on' === $this->props['enable_coverflow_shadow'] ? 'true' : 'false';
		$coverflow_rotate 	   		= intval( $this->props['coverflow_rotate'] );
		$coverflow_depth 	   		= intval( $this->props['coverflow_depth'] );
		$cards_per_slide 			= et_pb_responsive_options()->get_property_values( $this->props, 'cards_per_slide', '', true );
		$space_between_slides 		= et_pb_responsive_options()->get_property_values( $this->props, 'space_between_slides', '', true );
		$slides_per_group 			= et_pb_responsive_options()->get_property_values( $this->props, 'slides_per_group', '', true );
		$dynamic_bullets		 	= 'on' === $this->props['enable_dynamic_dots'] && in_array( $this->props['control_dot_style'], array( 'solid_dot', 'transparent_dot', 'square_dot' ), true ) ? 'true' : 'false';

		$autoplay_speed      		= '' !== $autoplay_speed || 0 !== $autoplay_speed ? $autoplay_speed : 3000;
		$transition_duration 		= '' !== $transition_duration || 0 !== $transition_duration ? $transition_duration : 1000;
		$loop          				= 'on' === $loop ? 'true' : 'false';
		$arrows 					= 'false';
		$dots 						= 'false';
		$autoplaySlides				= 0;
		$cube 						= 'false';
		$coverflow 					= 'false';
		$slidesPerGroup 			= 1;
		$slidesPerGroupSkip			= 0;
		$slidesPerGroup 			= 1;
		$slidesPerGroupIpad			= 1;
		$slidesPerGroupMobile		= 1;
		$slidesPerGroupSkip			= 0;
		$slidesPerGroupSkipIpad		= 0;
		$slidesPerGroupSkipMobile	= 0;

		if ( in_array( $slide_effect, array( 'slide', 'coverflow' ), true ) ) {
			$cards_per_view        		= $cards_per_slide['desktop'];
			$cards_per_view_ipad   		= '' !== $cards_per_slide['tablet'] ? $cards_per_slide['tablet'] : $this->props['cards_per_slide_tablet'];
			$cards_per_view_mobile 		= '' !== $cards_per_slide['phone'] ? $cards_per_slide['phone'] : $this->props['cards_per_slide_phone'];
			$cards_space_between   		= $space_between_slides['desktop'];
			$cards_space_between_ipad  	= '' !== $space_between_slides['tablet'] ? $space_between_slides['tablet'] : $cards_space_between;
			$cards_space_between_mobile = '' !== $space_between_slides['phone'] ? $space_between_slides['phone'] : $cards_space_between_ipad;
			$slidesPerGroup 			= $slides_per_group['desktop'];
			$slidesPerGroupIpad			= '' !== $slides_per_group['tablet'] ? $slides_per_group['tablet'] : $slidesPerGroup;
			$slidesPerGroupMobile		= '' !== $slides_per_group['phone'] ? $slides_per_group['phone'] : $slidesPerGroupIpad;

			if ( $cards_per_view > $slidesPerGroup && 1 !== $slidesPerGroup ) {
				$slidesPerGroupSkip = $cards_per_view - $slidesPerGroup;
			}
			if ( $cards_per_view_ipad > $slidesPerGroupIpad && 1 !== $slidesPerGroupIpad ) {
				$slidesPerGroupSkipIpad = $cards_per_view_ipad - $slidesPerGroupIpad;
			}
			if ( $cards_per_view_mobile > $slidesPerGroupMobile && 1 !== $slidesPerGroupMobile ) {
				$slidesPerGroupSkipMobile = $cards_per_view_mobile - $slidesPerGroupMobile;
			}
		} else {
			$cards_per_view        		= 1;
			$cards_per_view_ipad   		= 1;
			$cards_per_view_mobile 		= 1;
			$cards_space_between   		= 0;
			$cards_space_between_ipad	= 0;
			$cards_space_between_mobile	= 0;
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

		if ( 'cube' === $slide_effect ) {
			$cube = '{
                        shadow: false,
                        slideShadows: false,
                    }';
		}

		if ( 'coverflow' === $slide_effect ) {
			$coverflow = '{
                            rotate: ' . $coverflow_rotate . ',
                            stretch: 0,
                            depth: ' . $coverflow_depth . ',
                            modifier: 1,
                            slideShadows : ' . $enable_coverflow_shadow . ',
                        }';
		}

		$script  = '<script type="text/javascript">';
		$script .= 'jQuery(function($) {';
        $script .= 'var ' . esc_attr( $order_class ) . '_swiper = new Swiper(\'.' . esc_attr( $order_class ) . ' .swiper-container\', {
                            slidesPerView: ' . $cards_per_view . ',
                            autoplay: ' . $autoplaySlides . ',
                            spaceBetween: ' . intval( $cards_space_between ) . ',
                            slidesPerGroup: ' . $slidesPerGroup . ',
                            slidesPerGroupSkip: ' . $slidesPerGroupSkip . ',
                            effect: "' . $slide_effect . '",
                            cubeEffect: ' . $cube . ',
                            coverflowEffect: ' . $coverflow . ',
                            speed: ' . $transition_duration . ',
                            loop: ' . $loop . ',
                            pagination: ' . $dots . ',
                            navigation: ' . $arrows . ',
                            grabCursor: \'true\',
                            breakpoints: {
                            	981: {
		                          	slidesPerView: ' . $cards_per_view . ',
		                          	spaceBetween: ' . intval( $cards_space_between ) . ',
                            		slidesPerGroup: ' . $slidesPerGroup . ',
                            		slidesPerGroupSkip: ' . $slidesPerGroupSkip . ',
		                        },
		                        768: {
		                          	slidesPerView: ' . $cards_per_view_ipad . ',
		                          	spaceBetween: ' . intval( $cards_space_between_ipad ) . ',
		                          	slidesPerGroup: ' . $slidesPerGroupIpad . ',
                            		slidesPerGroupSkip: ' . $slidesPerGroupSkipIpad . ',
		                        },
		                        0: {
		                          	slidesPerView: ' . $cards_per_view_mobile . ',
		                          	spaceBetween: ' . intval( $cards_space_between_mobile ) . ',
		                          	slidesPerGroup: ' . $slidesPerGroupMobile . ',
                            		slidesPerGroupSkip: ' . $slidesPerGroupSkipMobile . ',
		                        }
		                    },
                    });';

		if ( 'on' === $pause_on_hover && 'on' === $autoplay ) {
			$script .= 'jQuery(".' . esc_attr( $order_class ) . ' .swiper-container").on("mouseenter", function(e) {
							if ( typeof ' . esc_attr( $order_class ) . '_swiper.autoplay.stop === "function" ) {
								' . esc_attr( $order_class ) . '_swiper.autoplay.stop();
							}
                        });';
            $script .= 'jQuery(".' . esc_attr( $order_class ) . ' .swiper-container").on("mouseleave", function(e) {
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

}
$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
	$modules = explode( ',', $plugin_options['dipl-modules'] );
	if ( in_array( 'dipl_image_card_carousel', $modules, true ) ) {
		new DIPL_ImageCardCarousel();
	}
} else {
	new DIPL_ImageCardCarousel();
}