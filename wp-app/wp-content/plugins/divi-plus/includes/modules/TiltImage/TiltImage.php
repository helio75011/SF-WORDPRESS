<?php
/**
 * @author    Elicus <hello@elicus.com>
 * @link      https://www.elicus.com/
 * @copyright 2021 Elicus Technologies Private Limited
 * @version   1.9.4
 */
class DIPL_TiltImage extends ET_Builder_Module {

	public $slug       = 'dipl_tilt_image';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name             = esc_html__( 'DP Tilt Image', 'divi-plus' );
		$this->main_css_element = '%%order_class%%';
	}

	public function get_settings_modal_toggles() {
		return array(
			'general'  => array(
				'toggles' => array(
					'tilt_image'   => array(
						'title'    => esc_html__( 'Tilt Image', 'divi-plus' ),
						'priority' => 1,
					),
					'tilt_content' => array(
						'title'    => esc_html__( 'Content', 'divi-plus' ),
						'priority' => 2,
					),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'tilt_setting'    => array(
						'title'    => esc_html__( 'Tilt Setting', 'divi-plus' ),
						'priority' => 1,
					),
					'overlay'         => array(
						'title'    => esc_html__( 'Overlay', 'divi-plus' ),
						'priority' => 2,
					),
					'icon_styling'    => array(
						'title'    => esc_html__( 'Icon Styling', 'divi-plus' ),
						'priority' => 3,
					),
					'content_styling' => array(
						'title'    => esc_html__( 'Content Styling', 'divi-plus' ),
						'priority' => 4,
					),
					'button'          => array(
						'title'    => esc_html__( 'Button', 'divi-plus' ),
						'priority' => 5,
					),
					'title'           => array(
						'title'    => esc_html__( 'Title', 'divi-plus' ),
						'priority' => 6,
					),
					'desc'            => array(
						'title'             => esc_html__( 'Description', 'divi-plus' ),
						'tabbed_subtoggles' => true,
						'bb_icons_support'  => true,
						'sub_toggles'       => array(
							'p'     => array(
								'name' => 'P',
								'icon' => 'text-left',
							),
							'a'     => array(
								'name' => 'A',
								'icon' => 'text-link',
							),
							'ul'    => array(
								'name' => 'UL',
								'icon' => 'list',
							),
							'ol'    => array(
								'name' => 'OL',
								'icon' => 'numbered-list',
							),
							'quote' => array(
								'name' => 'QUOTE',
								'icon' => 'text-quote',
							),
						),
						'priority'          => 7,
					),
				),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts'                       => array(
				'title'      => array(
					'label'          => esc_html__( 'Title', 'divi-plus' ),
					'font_size'      => array(
						'default'        => '18px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height'    => array(
						'default'        => '1.5em',
						'range_settings' => array(
							'min'  => '0.1',
							'max'  => '10',
							'step' => '0.1',
						),
					),
					'letter_spacing' => array(
						'default'        => '0px',
						'range_settings' => array(
							'min'  => '0',
							'max'  => '10',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'header_level'   => array(
						'default' => 'h4',
					),
					'css'            => array(
						'main'  => "{$this->main_css_element} .dipl_tilt_content_wrapper .dipl_tilt_title",
						'hover' => "{$this->main_css_element} .dipl_tilt_content_wrapper .dipl_tilt_title:hover",
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'title',
				),
				'desc_text'  => array(
					'label'          => esc_html__( 'Description', 'divi-plus' ),
					'font_size'      => array(
						'default'        => '14px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height'    => array(
						'default'        => '1.5',
						'range_settings' => array(
							'min'  => '0.1',
							'max'  => '10',
							'step' => '0.1',
						),
					),
					'letter_spacing' => array(
						'default'        => '0px',
						'range_settings' => array(
							'min'  => '0',
							'max'  => '10',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'css'            => array(
						'main' => "{$this->main_css_element} .dipl_tilt_content_wrapper .dipl_tilt_desc, {$this->main_css_element} .dipl_tilt_content_wrapper .dipl_tilt_desc p",
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'desc',
					'sub_toggle'     => 'p',
				),
				'desc_link'  => array(
					'label'          => esc_html__( 'Description Link', 'divi-plus' ),
					'font_size'      => array(
						'default'        => '14px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height'    => array(
						'default'        => '1.5',
						'range_settings' => array(
							'min'  => '0.1',
							'max'  => '10',
							'step' => '0.1',
						),
					),
					'letter_spacing' => array(
						'default'        => '0px',
						'range_settings' => array(
							'min'  => '0',
							'max'  => '10',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'css'            => array(
						'main' => "{$this->main_css_element} .dipl_tilt_content_wrapper .dipl_tilt_desc a",
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'desc',
					'sub_toggle'     => 'a',
				),
				'desc_ul'    => array(
					'label'          => esc_html__( 'Description Unordered List', 'divi-plus' ),
					'font_size'      => array(
						'default'        => '14px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height'    => array(
						'default'        => '1.5',
						'range_settings' => array(
							'min'  => '0.1',
							'max'  => '10',
							'step' => '0.1',
						),
					),
					'letter_spacing' => array(
						'default'        => '0px',
						'range_settings' => array(
							'min'  => '0',
							'max'  => '10',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'css'            => array(
						'main' => "{$this->main_css_element} .dipl_tilt_content_wrapper .dipl_tilt_desc ul li",
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'desc',
					'sub_toggle'     => 'ul',
				),
				'desc_ol'    => array(
					'label'          => esc_html__( 'Description Ordered List', 'divi-plus' ),
					'font_size'      => array(
						'default'        => '14px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height'    => array(
						'default'        => '1.5',
						'range_settings' => array(
							'min'  => '0.1',
							'max'  => '10',
							'step' => '0.1',
						),
					),
					'letter_spacing' => array(
						'default'        => '0px',
						'range_settings' => array(
							'min'  => '0',
							'max'  => '10',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'css'            => array(
						'main' => "{$this->main_css_element} .dipl_tilt_content_wrapper .dipl_tilt_desc ol li",
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'desc',
					'sub_toggle'     => 'ol',
				),
				'desc_quote' => array(
					'label'          => esc_html__( 'Description Blockquote', 'divi-plus' ),
					'font_size'      => array(
						'default'        => '14px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height'    => array(
						'default'        => '1.5',
						'range_settings' => array(
							'min'  => '0.1',
							'max'  => '10',
							'step' => '0.1',
						),
					),
					'letter_spacing' => array(
						'default'        => '0px',
						'range_settings' => array(
							'min'  => '0',
							'max'  => '10',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'css'            => array(
						'main' => "{$this->main_css_element} .dipl_tilt_content_wrapper .dipl_tilt_desc blockquote",
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'desc',
					'sub_toggle'     => 'quote',
				),
			),
			'button'                      => array(
				'button' => array(
					'label'           => esc_html__( 'Button', 'divi-plus' ),
					'css'             => array(
						'main'      => "{$this->main_css_element} .dipl_tilt_image_button",
						'alignment' => "{$this->main_css_element} .dipl_tilt_image_button_wrapper",
					),
					'margin_padding'  => array(
						'css' => array(
							'margin'    => "{$this->main_css_element} .dipl_tilt_image_button_wrapper",
							'padding'   => "{$this->main_css_element} .dipl_tilt_image_button",
							'important' => 'all',
						),
					),
					'box_shadow'      => false,
					'depends_on'      => array( 'show_button' ),
					'depends_show_if' => 'on',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'button',
				),
			),
			'margin_padding'              => array(
				'css' => array(
					'margin'    => "{$this->main_css_element}",
					'padding'   => "{$this->main_css_element}",
					'important' => 'all',
				),
			),
			'tilt_content_margin_padding' => array(
				'content' => array(
					'margin_padding' => array(
						'css' => array(
							'use_margin' => false,
							'padding'    => '%%order_class%% .dipl_tilt_content_wrapper',
							'important'  => 'all',
						),
					),
				),
			),
			'max_width'                   => array(
				'css' => array(
					'main'             => "{$this->main_css_element}",
					'module_alignment' => "{$this->main_css_element}",
				),
			),
			'borders'                     => array(
				'default' => array(
					'css' => array(
						'main' => array(
							'border_styles' => "{$this->main_css_element}, {$this->main_css_element} .dipl_tilt_image_inner_wrapper img",
							'border_radii'  => "{$this->main_css_element}, {$this->main_css_element} .dipl_tilt_image_inner_wrapper img",
						),
					),
				),
			),
			'box_shadow'                  => array(
				'default' => array(
					'css' => array(
						'main' => "{$this->main_css_element}",
					),
				),
			),
			'text'                        => false,
			'text_shadow'                 => false,
			'background'                  => array(
				'use_background_video' => false,
			),
		);
	}

	public function get_fields() {
		$et_accent_color = et_builder_accent_color();

		return array(
			'image'                       => array(
				'label'              => esc_html__( 'Tilt Image', 'divi-plus' ),
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'upload_button_text' => esc_attr__( 'Upload an image', 'divi-plus' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'divi-plus' ),
				'update_text'        => esc_attr__( 'Set As Image', 'divi-plus' ),
				'affects'            => array(
					'alt',
				),
				'dynamic_content'    => 'image',
				'tab_slug'           => 'general',
				'toggle_slug'        => 'tilt_image',
				'description'        => esc_html__( 'Here you can upload an image to display, or type in the URL to the image you would like to display.', 'divi-plus' ),
			),
			'alt'                         => array(
				'label'           => esc_html__( 'Image Alt', 'divi-plus' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'depends_on'      => array(
					'image',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'tilt_image',
				'description'     => esc_html__( 'Here you can input the text to be used for the image as HTML ALT text.', 'divi-plus' ),
			),
			'title'                       => array(
				'label'           => esc_html__( 'Title', 'divi-plus' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'dynamic_content' => 'text',
				'mobile_options'  => true,
				'tab_slug'        => 'general',
				'toggle_slug'     => 'tilt_content',
				'description'     => esc_html__( 'Here you can input the text to be used for the title.', 'divi-plus' ),
			),
			'content'                     => array(
				'label'           => esc_html__( 'Description', 'divi-plus' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'mobile_options'  => true,
				'dynamic_content' => 'text',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'tilt_content',
				'description'     => esc_html__( 'Here you can define the content.', 'divi-plus' ),
			),
			'use_icon'                    => array(
				'label'           => esc_html__( 'Use Icon', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'options'         => array(
					'off' => esc_html__( 'Off', 'divi-plus' ),
					'on'  => esc_html__( 'On', 'divi-plus' ),
				),
				'default'         => 'off',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'tilt_content',
				'description'     => esc_html__( 'Here you can enable/disable icon.', 'divi-plus' ),
			),
			'icon'                        => array(
				'label'           => esc_html__( 'Icon', 'divi-plus' ),
				'type'            => 'select_icon',
				'option_category' => 'basic_option',
				'class'           => array( 'et-pb-font-icon' ),
				'show_if'         => array(
					'use_icon' => 'on',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'tilt_content',
				'description'     => esc_html__( 'Here you can choose an icon to display', 'divi-plus' ),
			),
			'show_button'                 => array(
				'label'            => esc_html__( 'Show Button', 'divi-plus' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'basic_option',
				'options'          => array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'affects'          => array(
					'custom_button',
				),
				'default'          => 'off',
				'default_on_front' => 'off',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'tilt_content',
				'description'      => esc_html__( 'Here you can choose whether or not use the button.', 'divi-plus' ),
			),
			'button_text'                 => array(
				'label'            => esc_html__( 'Button Text', 'divi-plus' ),
				'type'             => 'text',
				'option_category'  => 'basic_option',
				'show_if'          => array(
					'show_button' => 'on',
				),
				'default'          => esc_html__( 'Read More', 'divi-plus' ),
				'default_on_front' => esc_html__( 'Read More', 'divi-plus' ),
				'mobile_options'   => true,
				'tab_slug'         => 'general',
				'toggle_slug'      => 'tilt_content',
				'description'      => esc_html__( 'Here you can input the text to be used for the Button.', 'divi-plus' ),
			),
			'button_url'                  => array(
				'label'           => esc_html__( 'Button URL', 'divi-plus' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'show_if'         => array(
					'show_button' => 'on',
				),
				'dynamic_content' => 'url',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'tilt_content',
				'description'     => esc_html__( 'Here you can input the URL that you want to open when the user clicks on the button.', 'divi-plus' ),
			),
			'button_url_new_window'       => array(
				'label'           => esc_html__( 'Button Target', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'basic_option',
				'options'         => array(
					'off' => esc_html__( 'In The Same Window', 'divi-plus' ),
					'on'  => esc_html__( 'In The New Tab', 'divi-plus' ),
				),
				'show_if'         => array(
					'show_button' => 'on',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'tilt_content',
				'description'     => esc_html__( 'Here you can choose whether or not your link opens in a new window', 'divi-plus' ),
			),
			'tilt_max'                    => array(
				'label'            => esc_html__( 'Max Rotation', 'divi-plus' ),
				'type'             => 'range',
				'option_category'  => 'basic_option',
				'range_settings'   => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),
				'unitless'         => true,
				'default'          => '20',
				'default_on_front' => '20',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'tilt_setting',
				'description'      => esc_html__( 'Here you can input Max Tilt Rotation value.', 'divi-plus' ),
			),
			'tilt_perspective'            => array(
				'label'            => esc_html__( 'Perspective', 'divi-plus' ),
				'type'             => 'range',
				'option_category'  => 'basic_option',
				'range_settings'   => array(
					'min'  => '100',
					'max'  => '2000',
					'step' => '1',
				),
				'unitless'         => true,
				'default'          => '1000',
				'default_on_front' => '1000',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'tilt_setting',
				'description'      => esc_html__( 'Here you can input perspective value. Lower the value will result in a more intensive 3D effect than a higher value', 'divi-plus' ),
			),
			'tilt_scale'                  => array(
				'label'            => esc_html__( 'Scale on Hover', 'divi-plus' ),
				'type'             => 'range',
				'option_category'  => 'basic_option',
				'range_settings'   => array(
					'min'  => '1',
					'max'  => '3',
					'step' => '0.1',
				),
				'unitless'         => true,
				'default'          => '1',
				'default_on_front' => '1',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'tilt_setting',
				'description'      => esc_html__( 'Setting this option will scale tilt element on hover.', 'divi-plus' ),
			),
			'tilt_speed'                  => array(
				'label'            => esc_html__( 'Speed', 'divi-plus' ),
				'type'             => 'range',
				'option_category'  => 'basic_option',
				'range_settings'   => array(
					'min'  => '10',
					'max'  => '1000',
					'step' => '1',
				),
				'unitless'         => true,
				'default'          => '300',
				'default_on_front' => '300',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'tilt_setting',
				'description'      => esc_html__( 'Here you can select speed of the enter/exit transition.', 'divi-plus' ),
			),
			'tilt_mobile'                 => array(
				'label'            => esc_html__( 'Disable on Mobile', 'divi-plus' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'Off', 'divi-plus' ),
					'on'  => esc_html__( 'On', 'divi-plus' ),
				),
				'default'          => 'off',
				'default_on_front' => 'off',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'tilt_setting',
				'description'      => esc_html__( 'Here you can disable the Tilt effect on mobile devices.', 'divi-plus' ),
			),
			'use_glare'                   => array(
				'label'            => esc_html__( 'Use Glare', 'divi-plus' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'basic_option',
				'options'          => array(
					'off' => esc_html__( 'Off', 'divi-plus' ),
					'on'  => esc_html__( 'On', 'divi-plus' ),
				),
				'default'          => 'off',
				'default_on_front' => 'off',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'tilt_setting',
				'description'      => esc_html__( 'Here you can enable/disable glare effect.', 'divi-plus' ),
			),
			'tilt_max_glare'              => array(
				'label'            => esc_html__( 'Max Glare', 'divi-plus' ),
				'type'             => 'range',
				'option_category'  => 'basic_option',
				'range_settings'   => array(
					'min'  => '0.1',
					'max'  => '1',
					'step' => '0.1',
				),
				'show_if'          => array(
					'use_glare' => 'on',
				),
				'unitless'         => true,
				'default'          => '1',
				'default_on_front' => '1',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'tilt_setting',
				'description'      => esc_html__( 'Here you can select max glare effect value.', 'divi-plus' ),
			),
			'use_3d_effect'               => array(
				'label'            => esc_html__( 'Use 3D Effect', 'divi-plus' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'basic_option',
				'options'          => array(
					'off' => esc_html__( 'Off', 'divi-plus' ),
					'on'  => esc_html__( 'On', 'divi-plus' ),
				),
				'default'          => 'off',
				'default_on_front' => 'off',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'tilt_setting',
				'description'      => esc_html__( 'Here you can enable/disable tilt parallax effect.', 'divi-plus' ),
			),
			'tilt_3d_value'               => array(
				'label'            => esc_html__( '3D Effect', 'divi-plus' ),
				'type'             => 'range',
				'option_category'  => 'basic_option',
				'range_settings'   => array(
					'min'  => '10',
					'max'  => '100',
					'step' => '1',
				),
				'show_if'          => array(
					'use_3d_effect' => 'on',
				),
				'default'          => '30px',
				'default_on_front' => '30px',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'tilt_setting',
				'description'      => esc_html__( 'Here you can select a value to view content in 3D effect.', 'divi-plus' ),
			),
			'use_disable_axis'            => array(
				'label'            => esc_html__( 'Use Disable X/Y axis', 'divi-plus' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'basic_option',
				'options'          => array(
					'off' => esc_html__( 'Off', 'divi-plus' ),
					'on'  => esc_html__( 'On', 'divi-plus' ),
				),
				'default'          => 'off',
				'default_on_front' => 'off',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'tilt_setting',
				'description'      => esc_html__( 'Here you can enable/disable .', 'divi-plus' ),
			),
			'tilt_disable_axis'           => array(
				'label'            => esc_html__( 'Disable X/Y axis', 'divi-plus' ),
				'type'             => 'select',
				'option_category'  => 'basic_option',
				'options'          => array(
					'x' => esc_html__( 'X axis', 'divi-plus' ),
					'y' => esc_html__( 'Y axis', 'divi-plus' ),
				),
				'show_if'          => array(
					'use_disable_axis' => 'on',
				),
				'default'          => 'y',
				'default_on_front' => 'y',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'tilt_setting',
				'description'      => esc_html__( 'Setting this option will disable the X/Y-Axis on the tilt element.', 'divi-plus' ),
			),
			'use_overlay'                 => array(
				'label'           => esc_html__( 'Image Overlay', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'layout',
				'options'         => array(
					'off' => esc_html__( 'Off', 'divi-plus' ),
					'on'  => esc_html__( 'On', 'divi-plus' ),
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'overlay',
				'description'     => esc_html__( 'If enabled, an overlay color will be displayed over the image', 'divi-plus' ),
			),
			'overlay_color'               => array(
				'label'          => esc_html__( 'Overlay Color', 'divi-plus' ),
				'type'           => 'color-alpha',
				'custom_color'   => true,
				'show_if'        => array(
					'use_overlay' => 'on',
				),
				'hover'          => 'tabs',
				'mobile_options' => true,
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'overlay',
				'description'    => esc_html__( 'Here you can define a overlay color.', 'divi-plus' ),
			),
			'icon_color'                  => array(
				'label'            => esc_html__( 'Icon Color', 'divi-plus' ),
				'type'             => 'color-alpha',
				'custom_color'     => true,
				'show_if'          => array(
					'use_icon' => 'on',
				),
				'hover'            => 'tabs',
				'mobile_options'   => true,
				'default'          => esc_attr( $et_accent_color ),
				'default_on_front' => esc_attr( $et_accent_color ),
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'icon_styling',
				'description'      => esc_html__( 'Here you can define a color for the icon', 'divi-plus' ),
			),
			'use_icon_font_size'          => array(
				'label'            => esc_html__( 'Use Icon Font Size', 'divi-plus' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'font_option',
				'options'          => array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'show_if'          => array(
					'use_icon' => 'on',
				),
				'default'          => 'off',
				'default_on_front' => 'off',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'icon_styling',
				'description'      => esc_html__( 'Here you can enable/disable the custom font size.', 'divi-plus' ),
			),
			'icon_font_size'              => array(
				'label'            => esc_html__( 'Icon Font Size', 'divi-plus' ),
				'type'             => 'range',
				'option_category'  => 'font_option',
				'range_settings'   => array(
					'min'  => '1',
					'max'  => '120',
					'step' => '1',
				),
				'show_if'          => array(
					'use_icon'           => 'on',
					'use_icon_font_size' => 'on',
				),
				'mobile_options'   => true,
				'default'          => '32px',
				'default_on_front' => '32px',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'icon_styling',
				'description'      => esc_html__( 'Control the size of the icon by increasing or decreasing the font size.', 'divi-plus' ),
			),
			'content_alignment'           => array(
				'label'            => esc_html__( 'Content Alignment', 'divi-plus' ),
				'type'             => 'select',
				'option_category'  => 'basic_option',
				'options'          => array(
					'top_left'      => esc_html__( 'Top Left', 'divi-plus' ),
					'top_center'    => esc_html__( 'Top Center', 'divi-plus' ),
					'top_right'     => esc_html__( 'Top Right', 'divi-plus' ),
					'center_left'   => esc_html__( 'Center Left', 'divi-plus' ),
					'center'        => esc_html__( 'Center', 'divi-plus' ),
					'center_right'  => esc_html__( 'Center Right', 'divi-plus' ),
					'bottom_left'   => esc_html__( 'Bottom Left', 'divi-plus' ),
					'bottom_center' => esc_html__( 'Bottom Center', 'divi-plus' ),
					'bottom_right'  => esc_html__( 'Bottom Right', 'divi-plus' ),
				),
				'default'          => 'center',
				'default_on_front' => 'center',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'content_styling',
				'description'      => esc_html__( 'Here you can select the content alignment.', 'divi-plus' ),
			),
			'content_on_hover'            => array(
				'label'            => esc_html__( 'Content on Hover', 'divi-plus' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'basic_option',
				'options'          => array(
					'off' => esc_html__( 'Off', 'divi-plus' ),
					'on'  => esc_html__( 'On', 'divi-plus' ),
				),
				'mobile_options'   => true,
				'default'          => 'off',
				'default_on_front' => 'off',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'content_styling',
				'description'      => esc_html__( 'If enabled, content will show only on hover.', 'divi-plus' ),
			),
			'content_animation_direction' => array(
				'label'            => esc_html__( 'Content Animation', 'divi-plus' ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
					'top'    => esc_html__( 'Top To Bottom', 'divi-plus' ),
					'left'   => esc_html__( 'Left To Right', 'divi-plus' ),
					'right'  => esc_html__( 'Right To Left', 'divi-plus' ),
					'bottom' => esc_html__( 'Bottom To Top', 'divi-plus' ),
					'off'    => esc_html__( 'No Animation', 'divi-plus' ),
				),
				'show_if'          => array(
					'content_on_hover' => 'on',
				),
				'default'          => 'off',
				'default_on_front' => 'off',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'content_styling',
				'description'      => esc_html__( 'This controls the direction of the lazy-loading tilt image content animation.', 'divi-plus' ),
			),
			'content_custom_padding'      => array(
				'label'            => esc_html__( 'Content Padding', 'divi-plus' ),
				'type'             => 'custom_padding',
				'option_category'  => 'layout',
				'mobile_options'   => true,
				'hover'            => false,
				'default'          => '20px|20px|20px|20px|true|true',
				'default_on_front' => '20px|20px|20px|20px|true|true',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'margin_padding',
				'description'      => esc_html__( 'Padding adds extra space to the inside of the element, increasing the distance between the edge of the element and its inner contents.', 'divi-plus' ),
			),
		);
	}

	public function render( $attrs, $content, $render_slug ) {
		$multi_view                  = et_pb_multi_view_options( $this );
		$image                       = esc_attr( $this->props['image'] );
		$alt                         = esc_attr( $this->props['alt'] );
		$title                       = esc_attr( $this->props['title'] );
		$content                     = esc_attr( $this->props['content'] );
		$use_icon                    = esc_attr( $this->props['use_icon'] );
		$icon                        = esc_attr( $this->props['icon'] );
		$show_button                 = esc_attr( $this->props['show_button'] );
		$button_text                 = esc_attr( $this->props['button_text'] );
		$button_url                  = esc_attr( $this->props['button_url'] );
		$button_url_new_window       = esc_attr( $this->props['button_url_new_window'] );
		$tilt_max                    = esc_attr( $this->props['tilt_max'] );
		$tilt_perspective            = esc_attr( $this->props['tilt_perspective'] );
		$tilt_scale                  = esc_attr( $this->props['tilt_scale'] );
		$tilt_speed                  = esc_attr( $this->props['tilt_speed'] );
		$tilt_mobile                 = esc_attr( $this->props['tilt_mobile'] );
		$use_glare                   = esc_attr( $this->props['use_glare'] );
		$tilt_max_glare              = esc_attr( $this->props['tilt_max_glare'] );
		$use_3d_effect               = esc_attr( $this->props['use_3d_effect'] );
		$tilt_3d_value               = esc_attr( $this->props['tilt_3d_value'] );
		$use_disable_axis            = esc_attr( $this->props['use_disable_axis'] );
		$tilt_disable_axis           = esc_attr( $this->props['tilt_disable_axis'] );
		$use_overlay                 = esc_attr( $this->props['use_overlay'] );
		$overlay_color               = et_pb_responsive_options()->get_property_values( $this->props, 'overlay_color' );
		$overlay_color_hover         = esc_attr( $this->get_hover_value( 'overlay_color' ) );
		$icon_color                  = et_pb_responsive_options()->get_property_values( $this->props, 'icon_color' );
		$icon_color_hover            = esc_attr( $this->get_hover_value( 'icon_color' ) );
		$use_icon_font_size          = esc_attr( $this->props['use_icon_font_size'] );
		$icon_font_size              = et_pb_responsive_options()->get_property_values( $this->props, 'icon_font_size' );
		$content_alignment           = esc_attr( $this->props['content_alignment'] );
		$content_on_hover            = esc_attr( $this->props['content_on_hover'] );
		$content_animation_direction = esc_attr( $this->props['content_animation_direction'] );
		$header_level                = $this->props['title_level'];
		$processed_header_level      = et_pb_process_header_level( $header_level, 'h4' );
		$processed_header_level      = esc_html( $processed_header_level );

		//Image
		if ( '' !== $image ) {
			$image = $multi_view->render_element(
				array(
					'tag'      => 'img',
					'attrs'    => array(
						'src' => '{{image}}',
						'alt' => $alt,
					),
					'required' => 'image',
				)
			);
		}

		//Title
		if ( '' !== $title ) {
			$title = $multi_view->render_element(
				array(
					'tag'     => $processed_header_level,
					'content' => '{{title}}',
					'attrs'   => array(
						'class' => 'dipl_tilt_title',
					),
				)
			);
		}

		//Description
		if ( '' !== $content ) {
			$content = $multi_view->render_element(
				array(
					'tag'     => 'div',
					'content' => '{{content}}',
					'attrs'   => array(
						'class' => 'dipl_tilt_desc',
					),
				)
			);
		}

		//Icon
		if ( 'on' === $use_icon ) {
			$icon_output = $multi_view->render_element(
				array(
					'content' => '{{icon}}',
					'attrs'   => array(
						'class' => 'dipl_tilt_icon et-pb-icon',
					),
				)
			);

			if ( ! empty( array_filter( $icon_color ) ) ) {
				et_pb_responsive_options()->generate_responsive_css( $icon_color, '%%order_class%% .dipl_tilt_icon.et-pb-icon', 'color', $render_slug, '', 'color' );
			}

			if ( isset( $icon_color_hover ) ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%%:hover .dipl_tilt_icon.et-pb-icon',
						'declaration' => sprintf(
							'color: %1$s;',
							$icon_color_hover
						),
					)
				);
			}

			if ( class_exists( 'ET_Builder_Module_Helper_Style_Processor' ) && method_exists( 'ET_Builder_Module_Helper_Style_Processor', 'process_extended_icon' ) ) {
                $this->generate_styles(
                    array(
                        'utility_arg'    => 'icon_font_family',
                        'render_slug'    => $render_slug,
                        'base_attr_name' => 'icon',
                        'important'      => true,
                        'selector'       => '%%order_class%% .dipl_tilt_icon',
                        'processor'      => array(
                            'ET_Builder_Module_Helper_Style_Processor',
                            'process_extended_icon',
                        ),
                    )
                );
            }

			if ( 'on' === $use_icon_font_size ) {
				if ( ! empty( array_filter( $icon_font_size ) ) ) {
					et_pb_responsive_options()->generate_responsive_css( $icon_font_size, '%%order_class%% .dipl_tilt_icon.et-pb-icon', 'font-size', $render_slug, '', 'font' );
				}
			}
		}

		//Button
		if ( 'on' === $show_button ) {
			$button = $this->render_button(
				array(
					'display_button'      => ( '' !== $this->props['button_url'] && 'off' !== $this->props['show_button'] ) ? true : false,
					'button_classname'    => array( 'dipl_tilt_image_button' ),
					'button_custom'       => isset( $this->props['custom_button'] ) ? esc_attr( $this->props['custom_button'] ) : 'off',
					'button_rel'          => isset( $this->props['button_rel'] ) ? esc_attr( $this->props['button_rel'] ) : '',
					'button_text'         => $button_text,
					'button_text_escaped' => true,
					'button_url'          => esc_url( $this->props['button_url'] ),
					'custom_icon'         => isset( $this->props['button_icon'] ) ? $this->props['button_icon'] : '',
					'has_wrapper'         => false,
					'url_new_window'      => esc_attr( $this->props['button_url_new_window'] ),
					'multi_view_data'     => $multi_view->render_attrs(
						array(
							'content'        => '{{button_text}}',
							'hover_selector' => '%%order_class%%',
							'visibility'     => array(
								'button_text' => '__not_empty',
							),
						)
					),
				)
			);
		}

		//Overlay Color
		if ( 'on' === $use_overlay ) {
			if ( ! empty( array_filter( $overlay_color ) ) ) {
				et_pb_responsive_options()->generate_responsive_css( $overlay_color, '%%order_class%% .dipl_tilt_image_inner_wrapper:before', 'background-color', $render_slug, '', 'background-color' );
			}

			if ( isset( $overlay_color_hover ) ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%%:hover .dipl_tilt_image_inner_wrapper:before',
						'declaration' => sprintf(
							'background-color: %1$s;',
							$overlay_color_hover
						),
					)
				);
			}
		}

		//3D effect
		if ( 'on' === $use_3d_effect ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl_tilt_image_wrapper, %%order_class%% .dipl_tilt_image_inner_wrapper',
					'declaration' => 'transform-style: preserve-3d;',
				)
			);
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl_tilt_image_inner_wrapper .dipl_tilt_content_wrapper',
					'declaration' => sprintf(
						'transform: translateZ(%1$s);',
						$tilt_3d_value
					),
				)
			);
		}

		//Tilt content
		$tilt_content = sprintf(
			'<div class="dipl_tilt_image_inner_wrapper">
				%1$s
				<div class="dipl_tilt_content_wrapper et_pb_animation_%6$s">
					%2$s
					%3$s
					%4$s
					%5$s
				</div>
			</div>',
			$image,
			( isset( $icon_output ) && '' !== $icon_output ) ? $icon_output : '',
			( '' !== $title ) ? $title : '',
			( '' !== $content ) ? $content : '',
			( isset( $button ) && '' !== $button ) ? '<div class="dipl_tilt_image_button_wrapper">' . $button . '</div>' : '',
			$content_animation_direction
		);

		//Tilt attributes
		$tilt_attr = sprintf(
			'data-tilt data-tilt-max="%1$s" data-tilt-perspective="%2$s" data-tilt-scale="%3$s" data-tilt-speed="%4$s" data-tilt-mobile-disable="%5$s" %6$s%7$s',
			$tilt_max,
			$tilt_perspective,
			$tilt_scale,
			$tilt_speed,
			$tilt_mobile,
			( 'on' === $use_glare ? esc_attr( " data-tilt-glare=true data-tilt-max-glare=$tilt_max_glare" ) : '' ),
			( 'on' === $use_disable_axis ? esc_attr( " data-tilt-axis=$tilt_disable_axis" ) : '' )
		);

		//Enqueue Tilt Script
		wp_enqueue_script( 'elicus-tilt-script' );
		wp_enqueue_script( 'dipl-tilt-image-custom', PLUGIN_PATH."includes/modules/TiltImage/dipl-tilt-image-custom.min.js", array('jquery'), '1.0.0', true );
		$file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        wp_enqueue_style( 'dipl-tilt-image-style', PLUGIN_PATH . 'includes/modules/TiltImage/' . $file . '.min.css', array(), '1.0.0' );

		$this->process_advanced_margin_padding_css( $this, $render_slug, $this->margin_padding );

		//Output
		$output = sprintf(
			'<div class="dipl_tilt_image_wrapper %1$s %2$s" %4$s>
				%3$s
			</div>',
			( 'on' === $content_on_hover ? 'dipl_tilt_content_on_hover' : '' ),
			( '' !== $content_alignment ? 'dipl_tilt_align_' . $content_alignment : '' ),
			$tilt_content,
			$tilt_attr
		);

		return et_core_intentionally_unescaped( $output, 'html' );
	}

	/**
	 * Filter multi view value.
	 *
	 * @since 3.27.1
	 *
	 * @see ET_Builder_Module_Helper_MultiViewOptions::filter_value
	 *
	 * @param mixed                                     $raw_value Props raw value.
	 * @param array                                     $args {
	 *                                         Context data.
	 *
	 *     @type string $context      Context param: content, attrs, visibility, classes.
	 *     @type string $name         Module options props name.
	 *     @type string $mode         Current data mode: desktop, hover, tablet, phone.
	 *     @type string $attr_key     Attribute key for attrs context data. Example: src, class, etc.
	 *     @type string $attr_sub_key Attribute sub key that availabe when passing attrs value as array such as styes. Example: padding-top, margin-botton, etc.
	 * }
	 * @param ET_Builder_Module_Helper_MultiViewOptions $multi_view Multiview object instance.
	 *
	 * @return mixed
	 */
	public function multi_view_filter_value( $raw_value, $args, $multi_view ) {
		$name = isset( $args['name'] ) ? $args['name'] : '';
		$mode = isset( $args['mode'] ) ? $args['mode'] : '';

		if ( $raw_value && 'icon' === $name ) {
			$processed_value = html_entity_decode( et_pb_process_font_icon( $raw_value ) );
			if ( '%%1%%' === $raw_value ) {
				$processed_value = '"';
			}

			return $processed_value;
		}

		$fields_need_escape = array(
			'button_text',
		);

		if ( $raw_value && in_array( $name, $fields_need_escape, true ) ) {
			return $this->_esc_attr( $multi_view->get_name_by_mode( $name, $mode ), 'none', $raw_value );
		}

		return $raw_value;
	}

	public function process_advanced_margin_padding_css( $module, $function_name, $margin_padding ) {
		$utils           = ET_Core_Data_Utils::instance();
		$all_values      = $module->props;
		$advanced_fields = $module->advanced_fields;

		// Disable if module doesn't set advanced_fields property and has no VB support.
		if ( ! $module->has_vb_support() && ! $module->has_advanced_fields ) {
			return;
		}

		$allowed_advanced_fields = array( 'tilt_content_margin_padding' );
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
	if ( in_array( 'dipl_tilt_image', $modules, true ) ) {
		new DIPL_TiltImage();
	}
} else {
	new DIPL_TiltImage();
}
