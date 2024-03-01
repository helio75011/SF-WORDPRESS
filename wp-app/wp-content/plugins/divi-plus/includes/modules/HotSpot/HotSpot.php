<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.4
 */
class DIPL_HotSpot extends ET_Builder_Module {

	public $slug       = 'dipl_hotspot';
	public $child_slug = 'dipl_hotspot_item';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name = esc_html__( 'DP Hotspot', 'divi-plus' );
	}

	public function get_settings_modal_toggles() {
		return array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Hotspot Content', 'divi-plus' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'hostspot_settings'               => array(
						'title'    => esc_html__( 'Hotspot Setting', 'divi-plus' ),
						'priority' => 1,
					),
					'global_marker_styling'           => array(
						'title'    => esc_html__( 'Global Marker Styling', 'divi-plus' ),
						'priority' => 2,
					),
					'global_marker_icon_styling'      => array(
						'title'    => esc_html__( 'Global Marker Icon Styling', 'divi-plus' ),
						'priority' => 3,
					),
					'global_marker_image_styling'     => array(
						'title'    => esc_html__( 'Global Marker Image Styling', 'divi-plus' ),
						'priority' => 3,
					),
					'global_marker_text_settings'     => array(
						'title'    => esc_html__( 'Global Marker Text', 'divi-plus' ),
						'priority' => 4,
					),
					'global_tooltip_styling'          => array(
						'title'             => esc_html__( 'Global Tooltip Styling', 'divi-plus' ),
						'priority'          => 5,
						'tabbed_subtoggles' => true,
						'sub_toggles'       => array(
							'global_tooltip_general_tab' => array(
								'name' => 'General',
							),
							'global_tooltip_background_tab' => array(
								'name' => 'Background',
							),
						),
					),
					'global_tooltip_heading_settings' => array(
						'title'             => esc_html__( 'Tooltip Heading', 'divi-plus' ),
						'priority'          => 6,
						'tabbed_subtoggles' => true,
						'sub_toggles'       => array(
							'h1' => array(
								'name' => 'H1',
								'icon' => 'text-h1',
							),
							'h2' => array(
								'name' => 'H2',
								'icon' => 'text-h2',
							),
							'h3' => array(
								'name' => 'H3',
								'icon' => 'text-h3',
							),
							'h4' => array(
								'name' => 'H4',
								'icon' => 'text-h4',
							),
							'h5' => array(
								'name' => 'H5',
								'icon' => 'text-h5',
							),
							'h6' => array(
								'name' => 'H6',
								'icon' => 'text-h6',
							),
						),
					),
					'global_tooltip_text_settings'    => array(
						'title'             => esc_html__( 'Tooltip', 'divi-plus' ),
						'priority'          => 7,
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
					),
					'image_settings'                  => array(
						'title'    => esc_html__( 'Image', 'divi-plus' ),
						'priority' => 8,
					),
				),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts'           => array(
				'global_tooltip_header'   => array(
					'label'          => esc_html__( 'Heading', 'divi-plus' ),
					'font_size'      => array(
						'default'        => '30px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height'    => array(
						'default'        => '1em',
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
						'main' => '%%order_class%%_0.tooltipster-sidetip .tooltipster-content h1',
					),
					'toggle_slug'    => 'global_tooltip_heading_settings',
					'sub_toggle'     => 'h1',
				),
				'global_tooltip_header_2' => array(
					'label'          => esc_html__( 'Heading 2', 'divi-plus' ),
					'font_size'      => array(
						'default'        => '26px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height'    => array(
						'default'        => '1em',
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
						'main' => '%%order_class%%_0.tooltipster-sidetip .tooltipster-content h2',
					),
					'toggle_slug'    => 'global_tooltip_heading_settings',
					'sub_toggle'     => 'h2',
				),
				'global_tooltip_header_3' => array(
					'label'          => esc_html__( 'Heading 3', 'divi-plus' ),
					'font_size'      => array(
						'default'        => '22px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height'    => array(
						'default'        => '1em',
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
						'main' => '%%order_class%%_0.tooltipster-sidetip .tooltipster-content h3',
					),
					'toggle_slug'    => 'global_tooltip_heading_settings',
					'sub_toggle'     => 'h3',
				),
				'global_tooltip_header_4' => array(
					'label'          => esc_html__( 'Heading 4', 'divi-plus' ),
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
					'css'            => array(
						'main' => '%%order_class%%_0.tooltipster-sidetip .tooltipster-content h4',
					),
					'toggle_slug'    => 'global_tooltip_heading_settings',
					'sub_toggle'     => 'h4',
				),
				'global_tooltip_header_5' => array(
					'label'          => esc_html__( 'Heading 5', 'divi-plus' ),
					'font_size'      => array(
						'default'        => '16px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height'    => array(
						'default'        => '1em',
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
						'main' => '%%order_class%%_0.tooltipster-sidetip .tooltipster-content h5',
					),
					'toggle_slug'    => 'global_tooltip_heading_settings',
					'sub_toggle'     => 'h5',
				),
				'global_tooltip_header_6' => array(
					'label'          => esc_html__( 'Heading 6', 'divi-plus' ),
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
						'default'        => '1em',
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
						'main' => '%%order_class%%_0.tooltipster-sidetip .tooltipster-content h6',
					),
					'toggle_slug'    => 'global_tooltip_heading_settings',
					'sub_toggle'     => 'h6',
				),
				'global_tooltip_text'     => array(
					'label'           => esc_html__( 'Text', 'divi-plus' ),
					'font_size'       => array(
						'default'        => '18px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height'     => array(
						'default'        => '1.5em',
						'range_settings' => array(
							'min'  => '0.1',
							'max'  => '10',
							'step' => '0.1',
						),
					),
					'letter_spacing'  => array(
						'default'        => '0px',
						'range_settings' => array(
							'min'  => '0',
							'max'  => '10',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'css'             => array(
						'main' => '%%order_class%%_0.tooltipster-sidetip .tooltipster-content',
					),
					'toggle_slug'     => 'global_tooltip_text_settings',
					'sub_toggle'      => 'p',
					'hide_text_align' => true,
				),
				'global_tooltip_link'     => array(
					'label'          => esc_html__( 'Link', 'divi-plus' ),
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
					'css'            => array(
						'main' => '%%order_class%%_0.tooltipster-sidetip .tooltipster-content a',
					),
					'toggle_slug'    => 'global_tooltip_text_settings',
					'sub_toggle'     => 'a',
				),
				'global_tooltip_ul'       => array(
					'label'          => esc_html__( 'Unordered List', 'divi-plus' ),
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
					'css'            => array(
						'main' => '%%order_class%%_0.tooltipster-sidetip .tooltipster-content ul li',
					),
					'toggle_slug'    => 'global_tooltip_text_settings',
					'sub_toggle'     => 'ul',
				),
				'global_tooltip_ol'       => array(
					'label'          => esc_html__( 'Ordered List', 'divi-plus' ),
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
					'css'            => array(
						'main' => '%%order_class%%_0.tooltipster-sidetip .tooltipster-content ol li',
					),
					'toggle_slug'    => 'global_tooltip_text_settings',
					'sub_toggle'     => 'ol',
				),
				'global_tooltip_quote'    => array(
					'label'          => esc_html__( 'Blockquote', 'divi-plus' ),
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
					'css'            => array(
						'main' => '%%order_class%%_0.tooltipster-sidetip .tooltipster-content blockquote',
					),
					'toggle_slug'    => 'global_tooltip_text_settings',
					'sub_toggle'     => 'quote',
				),
				'global_marker_text'      => array(
					'label'          => esc_html__( 'Marker', 'divi-plus' ),
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
						'default'        => '1.7em',
						'range_settings' => array(
							'min'  => '0',
							'max'  => '5',
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
						'main' => '%%order_class%% .dipl_hotspot_wrapper .dipl_text_marker',
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'global_marker_text_settings',
				),
			),
			'borders'         => array(
				'global_marker_image_border' => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dipl_image_marker img',
							'border_styles' => '%%order_class%% .dipl_image_marker img',
						),
					),
					'label_prefix' => esc_html__( 'Marker Image', 'divi-plus' ),
					'toggle_slug'  => 'global_marker_image_styling',
				),
			),
			'box_shadow'      => array(
				'default' => array(
					'css' => array(
						'main' => '%%order_class%%',
					),
				),
			),
			'margin_padding'  => array(
				'css' => array(
					'main'      => '%%order_class%%',
					'important' => 'all',
				),
			),
			'hotspot_padding' => array(
				'tooltip' => array(
					'label'          => 'Tooltip Padding',
					'margin_padding' => array(
						'css' => array(
							'main'      => '%%order_class%%_0.tooltipster-sidetip .tooltipster-box .tooltipster-content',
							'important' => 'all',
						),
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'global_tooltip_styling',
				),
			),
			'text'            => false,
		);
	}

	public function get_fields() {

		$et_accent_color     = et_builder_accent_color();
		$dipl_hotspot_fields = array(
			'hotspot_image'                     => array(
				'label'              => esc_html__( 'Image', 'divi-plus' ),
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'upload_button_text' => esc_attr__( 'Upload an image', 'divi-plus' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'divi-plus' ),
				'update_text'        => esc_attr__( 'Set As Image', 'divi-plus' ),
				'dynamic_content' 	 => 'image',
				'tab_slug'           => 'general',
				'toggle_slug'        => 'main_content',
				'description'        => esc_html__( 'Here you can upload the image on which you want to display hotspots.', 'divi-plus' ),
			),
			'trigger_event'                     => array(
				'label'           => esc_html__( 'Show Tooltip On', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'basic_option',
				'options'         => array(
					'hover' => esc_html__( 'Hover', 'divi-plus' ),
					'click' => esc_html__( 'Click', 'divi-plus' ),
				),
				'default'         => 'hover',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'hostspot_settings',
				'description'     => esc_html__( 'Here you can select the option when to display toolpit content of the hotspot.', 'divi-plus' ),
			),
			'use_plusating_animation'           => array(
				'label'           => esc_html__( 'Use Pulse Animation', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'default'         => 'off',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'global_marker_styling',
				'description'     => esc_html__( 'Here you can choose whether or not to display plusating animation for the hotspot marker.', 'divi-plus' ),
			),
			'marker_shape'                      => array(
				'label'           => esc_html__( 'Marker Shape', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'none'       => esc_html__( 'None', 'divi-plus' ),
					'use_square' => esc_html__( 'Square', 'divi-plus' ),
					'use_circle' => esc_html__( 'Circle', 'divi-plus' ),
				),
				'default'         => 'none',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'global_marker_styling',
				'description'     => esc_html__( 'Here you can select the shape for each hotspot marker displayed on the image.', 'divi-plus' ),
			),
			'marker_shape_color'                => array(
				'label'        => esc_html__( 'Marker Shape Background', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'show_if_not'  => array(
					'marker_shape' => 'none',
				),
				'default'      => $et_accent_color,
				'hover'        => 'tabs',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'global_marker_styling',
				'description'  => esc_html__( 'Here you can select the custom background color for the icon shape.', 'divi-plus' ),
			),
			'marker_use_shape_border'           => array(
				'label'           => esc_html__( 'Display Marker Shape Border', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'layout',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'show_if_not'     => array(
					'marker_shape' => 'none',
				),
				'default'         => 'off',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'global_marker_styling',
				'description'     => esc_html__( 'Here you can choose whether or not to display border for the icon shape.', 'divi-plus' ),
			),
			'marker_shape_border_color'         => array(
				'label'        => esc_html__( 'Marker Shape Border Color', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'show_if_not'  => array(
					'marker_shape' => 'none',
				),
				'show_if'      => array(
					'marker_use_shape_border' => 'on',
				),
				'default'      => $et_accent_color,
				'hover'        => 'tabs',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'global_marker_styling',
				'description'  => esc_html__( 'Here you can select the custom border color for the icon shape.', 'divi-plus' ),
			),
			'marker_border_size'                => array(
				'label'           => esc_html__( 'Marker Shape Border Size', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),
				'show_if_not'     => array(
					'marker_shape' => 'none',
				),
				'show_if'         => array(
					'marker_use_shape_border' => 'on',
				),
				'mobile_options'  => true,
				'default'         => '2px',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'global_marker_styling',
				'description'     => esc_html__( 'Move the slider, or input the value to increase or decrease border size of the icon shape.', 'divi-plus' ),
			),
			'marker_icon_color'                 => array(
				'label'       => esc_html__( 'Icon Color', 'divi-plus' ),
				'type'        => 'color-alpha',
				'default'     => '#fff',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'global_marker_icon_styling',
				'description' => esc_html__( 'Here you can select the custom color for each of the hotspot marker icon displayed on the image.', 'divi-plus' ),
			),
			'marker_icon_font_size'             => array(
				'label'           => esc_html__( 'Icon Font Size', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'font_option',
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '120',
					'step' => '1',
				),
				'mobile_options'  => true,
				'default'         => '32px',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'global_marker_icon_styling',
				'description'     => esc_html__( 'Move the slider, or input the value to increase or decrease the icon size of each hotspot marker displayed on the image.', 'divi-plus' ),
			),
			'marker_image_size'                 => array(
				'label'           => esc_html__( 'Image Size', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'range_settings'  => array(
					'min'  => '32',
					'max'  => '600',
					'step' => '1',
				),
				'mobile_options'  => true,
				'default'         => '32px',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'global_marker_image_styling',
				'description'     => esc_html__( 'Move the slider, or input the value to increase or decrease the image size of each hotspot marker displayed on the image.', 'divi-plus' ),
			),
			'tooltip_entrance_animation'        => array(
				'label'           => esc_html__( 'Tooltip Entrance Animation', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'fade'  => esc_html__( 'Fade', 'divi-plus' ),
					'grow'  => esc_html__( 'Grow', 'divi-plus' ),
					'swing' => esc_html__( 'Swing', 'divi-plus' ),
					'slide' => esc_html__( 'Slide', 'divi-plus' ),
					'fall'  => esc_html__( 'Fall', 'divi-plus' ),
				),
				'default'         => 'fade',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'global_tooltip_styling',
				'sub_toggle'      => 'global_tooltip_general_tab',
				'description'     => esc_html__( 'Here you can select the animation effect to be used for the tooltip entrance.', 'divi-plus' ),
			),
			'global_animation_durartion'        => array(
				'label'          => esc_html__( 'Animation Duration', 'divi-plus' ),
				'type'           => 'range',
				'range_settings' => array(
					'min'  => '100',
					'max'  => '5000',
					'step' => '10',
				),
				'default'        => '350ms',
				'default_unit'   => 'ms',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'global_tooltip_styling',
				'sub_toggle'     => 'global_tooltip_general_tab',
				'description'    => esc_html__( 'Move the slider, or input the value to set the tooltip animation duration.', 'divi-plus' ),
			),
			'global_show_speech_bubble'         => array(
				'label'           => esc_html__( 'Show Speech Bubble', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'layout',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'default'         => 'on',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'global_tooltip_styling',
				'sub_toggle'      => 'global_tooltip_general_tab',
				'description'     => esc_html__( 'Here you can choose whether or not to display speech bubble.', 'divi-plus' ),
			),
			'global_tooltip_interactive'        => array(
				'label'           => esc_html__( 'Make Interactive Tooltip', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'layout',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'default'         => 'off',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'global_tooltip_styling',
				'sub_toggle'      => 'global_tooltip_general_tab',
				'description'     => esc_html__( 'Here you can choose whether or not to display interactive toolpit. This would provide users the possibility to interact with the content of the tooltip.', 'divi-plus' ),
			),
			'tooltip_width'                     => array(
				'label'          => esc_html__( 'Tooltip Width', 'divi-plus' ),
				'type'           => 'range',
				'range_settings' => array(
					'min'  => '1',
					'max'  => '1000',
					'step' => '1',
				),
				'mobile_options' => true,
				'default'        => '200px',
				'default_unit'   => 'px',
				'allowed_units'  => array( '%', 'em', 'rem', 'px', 'vh', 'vw', 'cm', 'mm', 'in', 'pt', 'pc', 'ex' ),
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'global_tooltip_styling',
				'sub_toggle'     => 'global_tooltip_general_tab',
				'description'    => esc_html__( 'Move the slider, or input the value to set the maximum width of the tooltip.', 'divi-plus' ),
			),
			'tooltip_custom_padding'            => array(
				'label'           => esc_html__( 'Tooltip Padding', 'divi-plus' ),
				'type'            => 'custom_padding',
				'option_category' => 'layout',
				'mobile_options'  => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'global_tooltip_styling',
				'sub_toggle'      => 'global_tooltip_general_tab',
				'description'     => esc_html__( 'Padding adds extra space to the inside of the element, increasing the distance between the edge of the element and its inner contents.', 'divi-plus' ),
			),
			'tooltip_background_color'          => array(
				'label'             => esc_html__( 'Tooltip Background', 'divi-plus' ),
				'type'              => 'background-field',
				'base_name'         => 'tooltip_background',
				'context'           => 'tooltip_background_color',
				'option_category'   => 'button',
				'custom_color'      => true,
				'background_fields' => $this->generate_background_options( 'tooltip_background', 'button', 'advanced', 'global_tooltip_styling', 'tooltip_background_color' ),
				'mobile_options'    => true,
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'global_tooltip_styling',
				'sub_toggle'        => 'global_tooltip_background_tab',
				'description'       => esc_html__( 'Adjust color, gradient, and image to customize the background style of the tooltip.' ),
			),
		);

		$dipl_hotspot_fields = array_merge( $dipl_hotspot_fields, $this->generate_background_options( 'tooltip_background', 'skip', 'advanced', 'global_tooltip_styling', 'tooltip_background_color' ) );

		return $dipl_hotspot_fields;
	}

	public function add_tooltip_dependencies() {
		wp_enqueue_script( 'elicus-tooltipster-script' );
		wp_enqueue_style( 'elicus-tooltipster-style' );
	}

	public function init_tooltip( $props ) {
		$order_class                = esc_attr( $this->get_module_order_class( 'dipl_hotspot' ) );
		$theme_class                = $order_class . '_0';
		$order_number               = str_replace( '_', '', str_replace( 'dipl_hotspot', '', $order_class ) );
		$element_id                 = '.dipl_hotspot_' . $order_number;
		$tooltip_entrance_animation = esc_attr( $props['tooltip_entrance_animation'] );
		$animation_durartion        = intval( esc_attr( $props['global_animation_durartion'] ) );
		$tooltip_width              = intval( esc_attr( $props['tooltip_width'] ) );
		$show_speech_bubble         = ( 'on' === esc_attr( $props['global_show_speech_bubble'] ) ) ? 'true' : 'false';
		$tooltip_interactive        = ( 'on' === esc_attr( $props['global_tooltip_interactive'] ) ) ? 'true' : 'false';

		return '<script type="text/javascript">
                jQuery(document).ready(function($){
                    $(\'.' . et_core_esc_previously( $order_class ) . '\').find(\'.dipl_marker\').each(function(){
                        $(this).tooltipster({
                            contentCloning: false,
                            trigger: "' . et_core_esc_previously( $props['trigger_event'] ) . '",
                            animation: "' . et_core_esc_previously( $tooltip_entrance_animation ) . '",
                            animationDuration: ' . et_core_esc_previously( $animation_durartion ) . ',
                            arrow: false,
                            interactive: ' . et_core_esc_previously( $tooltip_interactive ) . ',
                            maxWidth: ' . et_core_esc_previously( $tooltip_width ) . ',
                            theme: ["dipl_tooltip","' . et_core_esc_previously( $theme_class ) . '"],
                        });
                    });
                });
            </script>';
	}

	public function render( $attrs, $content, $render_slug ) {
		$hotspot_image                   = esc_attr( $this->props['hotspot_image'] );
		$use_plusating_animation         = esc_attr( $this->props['use_plusating_animation'] );
		$marker_shape                    = esc_attr( $this->props['marker_shape'] );
		$marker_shape_color              = esc_attr( $this->props['marker_shape_color'] );
		$marker_shape_color_hover        = esc_attr( $this->get_hover_value( 'marker_shape_color' ) );
		$marker_use_shape_border         = esc_attr( $this->props['marker_use_shape_border'] );
		$marker_shape_border_color       = esc_attr( $this->props['marker_shape_border_color'] );
		$marker_shape_border_color_hover = esc_attr( $this->get_hover_value( 'marker_shape_border_color' ) );
		$marker_border_size              = esc_attr( $this->props['marker_border_size'] );
		$marker_icon_color               = esc_attr( $this->props['marker_icon_color'] );
		$marker_icon_font_size           = et_pb_responsive_options()->get_property_values( $this->props, 'marker_icon_font_size' );
		$marker_image_size               = et_pb_responsive_options()->get_property_values( $this->props, 'marker_image_size' );
		$tooltip_width                   = esc_attr( $this->props['tooltip_width'] );
		$show_speech_bubble              = esc_attr( $this->props['global_show_speech_bubble'] );

		$this->add_tooltip_dependencies();

		$file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        wp_enqueue_style( 'dipl-hotspot-style', PLUGIN_PATH . 'includes/modules/HotSpot/' . $file . '.min.css', array(), '1.0.0' );

		$options = array( 'tooltipster-box' => 'tooltip_background' );

		if ( ! empty( array_filter( $marker_icon_font_size ) ) ) {
			et_pb_responsive_options()->generate_responsive_css( $marker_icon_font_size, '%%order_class%% .et-pb-icon', 'font-size', $render_slug, '', 'type' );
		}

		if ( ! empty( array_filter( $marker_image_size ) ) ) {
			et_pb_responsive_options()->generate_responsive_css( $marker_icon_font_size, '%%order_class%% .dipl_marker_wrapper img', 'width', $render_slug, '', 'type' );
		}

		if ( '' !== $marker_icon_color ) {
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .et-pb-icon',
					'declaration' => sprintf( 'color: %1$s;', esc_html( $marker_icon_color ) ),
				)
			);
		}

		if ( 'none' !== $marker_shape ) {
			if ( 'use_circle' === $marker_shape ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_hotspot_item',
						'declaration' => 'border-radius: 50%;',
					)
				);
			} else {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_hotspot_item',
						'declaration' => 'border-radius: 0;',
					)
				);
			}
			if ( '' !== $marker_shape_color ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_hotspot_item',
						'declaration' => sprintf( 'background-color: %1$s;', esc_html( $marker_shape_color ) ),
					)
				);
			}
			if ( isset( $marker_shape_color_hover ) ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_hotspot_item:hover',
						'declaration' => sprintf( 'background-color: %1$s;', esc_html( $marker_shape_color_hover ) ),
					)
				);
			}
			if ( 'on' === $marker_use_shape_border ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_hotspot_item',
						'declaration' => 'border-style: solid;',
					)
				);
				if ( '' !== $marker_shape_border_color ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_hotspot_item',
							'declaration' => sprintf( 'border-color: %1$s;', esc_html( $marker_shape_border_color ) ),
						)
					);
				}
				if ( isset( $marker_shape_border_color_hover ) ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_hotspot_item:hover',
							'declaration' => sprintf( 'border-color: %1$s;', esc_html( $marker_shape_border_color_hover ) ),
						)
					);
				}
				if ( '' !== $marker_border_size ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_hotspot_item',
							'declaration' => sprintf( 'border-width: %1$s;', esc_html( $marker_border_size ) ),
						)
					);
				}
			}
		}

		if ( 'on' === $show_speech_bubble ) {
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%_0.tooltipster-sidetip .tooltipster-box:before',
					'declaration' => 'content: "";',
				)
			);
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%_0.tooltipster-sidetip.tooltipster-top',
					'declaration' => 'padding-bottom:15px;',
				)
			);
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%_0.tooltipster-sidetip.tooltipster-bottom',
					'declaration' => 'padding-top:15px;',
				)
			);
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%_0.tooltipster-sidetip.tooltipster-right',
					'declaration' => 'padding-left:15px;',
				)
			);
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%_0.tooltipster-sidetip.tooltipster-left',
					'declaration' => 'padding-right:15px;',
				)
			);
		}

		$this->process_advanced_css( $this, $render_slug, $this->margin_padding );
		if ( isset( $options ) ) {
			$this->process_custom_background( $render_slug, $options );
		}

		$tooltip_script = $this->init_tooltip( $this->props );
		return sprintf(
			'<div class="dipl_hotspot_wrapper %3$s">
                            <div class="dipl_image_wrapper"><img src="%1$s"/></div>
                            %2$s
                        </div>%4$s',
			$hotspot_image,
			$this->content,
			( 'on' === $use_plusating_animation ? 'pulsating' : '' ),
			et_core_intentionally_unescaped( $tooltip_script, 'html' )
		);
	}

	public function process_advanced_css( $module, $function_name, $margin_padding ) {
		$utils           = ET_Core_Data_Utils::instance();
		$all_values      = $module->props;
		$advanced_fields = $module->advanced_fields;
		if ( ! $module->has_vb_support() && ! $module->has_advanced_fields ) {
			return;
		}
		$allowed_advanced_fields = array( 'form_field', 'button', 'hotspot_padding' );
		foreach ( $allowed_advanced_fields as $advanced_field ) {
			if ( ! empty( $advanced_fields[ $advanced_field ] ) ) {
				foreach ( $advanced_fields[ $advanced_field ] as $label => $form_field ) {
					$padding_key = "{$label}_custom_padding";
					if ( '' !== $utils->array_get( $all_values, $padding_key, '' ) ) {
						$settings                      = $utils->array_get( $form_field, 'margin_padding', array() );                // Ensure main selector exists.
						$form_field_margin_padding_css = $utils->array_get( $settings, 'css.main', '' );
						if ( empty( $form_field_margin_padding_css ) ) {
							$utils->array_set( $settings, 'css.main', $utils->array_get( $form_field, 'css.main', '' ) );
						}                        $margin_padding->update_styles( $module, $label, $settings, $function_name, $advanced_field );
					}
				}
			}
		}
	}

	public function process_custom_background( $function_name, $options ) {

		foreach ( $options as $element => $option_name ) {

			$css_element           = $this->main_css_element . "_0.tooltipster-sidetip .{$element}";
			$css_element_processed = $css_element;

			// Place to store processed background. It will be compared with the smaller device
			// background processed value to avoid rendering the same styles.
			$processed_background_color  = '';
			$processed_background_image  = '';
			$gradient_properties_desktop = '';
			$processed_background_blend  = '';

			// Store background images status because the process is extensive.
			$background_image_status = array(
				'desktop' => false,
				'tablet'  => false,
				'phone'   => false,
			);

			$background_color_gradient_overlays_image_desktop = 'off';

			// Background Options Styling.
			foreach ( et_pb_responsive_options()->get_modes() as $device ) {
				$background_base_name = $option_name;
				$background_prefix    = "{$option_name}_";
				$background_style     = '';
				$is_desktop           = 'desktop' === $device;
				$suffix               = ! $is_desktop ? "_{$device}" : '';

				$background_color_style = '';
				$background_image_style = '';
				$background_images      = array();

				$has_background_color_gradient         = false;
				$has_background_image                  = false;
				$has_background_gradient_and_image     = false;
				$is_background_color_gradient_disabled = false;
				$is_background_image_disabled          = false;

				$background_color_gradient_overlays_image = 'off';

				// Ensure responsive is active.
				if ( ! $is_desktop && ! et_pb_responsive_options()->is_responsive_enabled( $this->props, $option_name ) ) {
					continue;
				}

				// A. Background Gradient.
				$use_background_color_gradient = et_pb_responsive_options()->get_inheritance_background_value( $this->props, "{$background_prefix}use_color_gradient", $device, $background_base_name, $this->fields_unprocessed );

				if ( 'on' === $use_background_color_gradient ) {
					$background_color_gradient_overlays_image = et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_overlays_image{$suffix}", '', true );

					$gradient_properties = array(
						'type'             => et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_type{$suffix}", '', true ),
						'direction'        => et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_direction{$suffix}", '', true ),
						'radial_direction' => et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_direction_radial{$suffix}", '', true ),
						'color_start'      => et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_start{$suffix}", '', true ),
						'color_end'        => et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_end{$suffix}", '', true ),
						'start_position'   => et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_start_position{$suffix}", '', true ),
						'end_position'     => et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_end_position{$suffix}", '', true ),
					);

					// Will be used as hover default.
					if ( 'desktop' === $device ) {
						$gradient_properties_desktop                      = $gradient_properties;
						$background_color_gradient_overlays_image_desktop = $background_color_gradient_overlays_image;
					}

					// Save background gradient into background images list.
					$background_images[] = $this->get_gradient( $gradient_properties );

					// Flag to inform BG Color if current module has Gradient.
					$has_background_color_gradient = true;
				} elseif ( 'off' === $use_background_color_gradient ) {
					$is_background_color_gradient_disabled = true;
				}

				// B. Background Image.
				$background_image = et_pb_responsive_options()->get_inheritance_background_value( $this->props, "{$background_prefix}image", $device, $background_base_name, $this->fields_unprocessed );
				$parallax         = et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}parallax{$suffix}", 'off' );

				// BG image and parallax status.
				$is_background_image_active         = '' !== $background_image && 'on' !== $parallax;
				$background_image_status[ $device ] = $is_background_image_active;

				if ( $is_background_image_active ) {
					// Flag to inform BG Color if current module has Image.
					$has_background_image = true;

					// Check previous BG image status. Needed to get the correct value.
					$is_prev_background_image_active = true;
					if ( ! $is_desktop ) {
						$is_prev_background_image_active = 'tablet' === $device ? $background_image_status['desktop'] : $background_image_status['tablet'];
					}

					// Size.
					$background_size_default = ET_Builder_Element::$_->array_get( $this->fields_unprocessed, "{$background_prefix}size.default", '' );
					$background_size         = et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}size{$suffix}", $background_size_default, ! $is_prev_background_image_active );

					if ( '' !== $background_size ) {
						$background_style .= sprintf(
							'background-size: %1$s; ',
							esc_html( $background_size )
						);
					}

					// Position.
					$background_position_default = ET_Builder_Element::$_->array_get( $this->fields_unprocessed, "{$background_prefix}position.default", '' );
					$background_position         = et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}position{$suffix}", $background_position_default, ! $is_prev_background_image_active );

					if ( '' !== $background_position ) {
						$background_style .= sprintf(
							'background-position: %1$s; ',
							esc_html( str_replace( '_', ' ', $background_position ) )
						);
					}

					// Repeat.
					$background_repeat_default = ET_Builder_Element::$_->array_get( $this->fields_unprocessed, "{$background_prefix}repeat.default", '' );
					$background_repeat         = et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}repeat{$suffix}", $background_repeat_default, ! $is_prev_background_image_active );

					if ( '' !== $background_repeat ) {
						$background_style .= sprintf(
							'background-repeat: %1$s; ',
							esc_html( $background_repeat )
						);
					}

					// Blend.
					$background_blend_default = ET_Builder_Element::$_->array_get( $this->fields_unprocessed, "{$background_prefix}blend.default", '' );
					$background_blend         = et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}blend{$suffix}", $background_blend_default, ! $is_prev_background_image_active );
					$background_blend_inherit = et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}blend{$suffix}", '', true );

					if ( '' !== $background_blend_inherit ) {
						// Don't print the same image blend style.
						if ( '' !== $background_blend ) {
							$background_style .= sprintf(
								'background-blend-mode: %1$s; ',
								esc_html( $background_blend )
							);
						}

						// Reset - If background has image and gradient, force background-color: initial.
						if ( $has_background_color_gradient && $has_background_image && $background_blend_inherit !== $background_blend_default ) {
							$has_background_gradient_and_image = true;
							$background_color_style            = 'initial';
							$background_style                 .= 'background-color: initial; ';
						}

						$processed_background_blend = $background_blend;
					}

					// Only append background image when the image is exist.
					$background_images[] = sprintf( 'url(%1$s)', esc_html( $background_image ) );
				} elseif ( '' === $background_image ) {
					// Reset - If background image is disabled, ensure we reset prev background blend mode.
					if ( '' !== $processed_background_blend ) {
						$background_style          .= 'background-blend-mode: normal; ';
						$processed_background_blend = '';
					}

					$is_background_image_disabled = true;
				}

				if ( ! empty( $background_images ) ) {
					// The browsers stack the images in the opposite order to what you'd expect.
					if ( 'on' !== $background_color_gradient_overlays_image ) {
						$background_images = array_reverse( $background_images );
					}

					// Set background image styles only it's different compared to the larger device.
					$background_image_style = join( ', ', $background_images );
					if ( $processed_background_image !== $background_image_style ) {
						$background_style .= sprintf(
							'background-image: %1$s !important;',
							esc_html( $background_image_style )
						);
					}
				} elseif ( ! $is_desktop && $is_background_color_gradient_disabled && $is_background_image_disabled ) {
					// Reset - If background image and gradient are disabled, reset current background image.
					$background_image_style = 'initial';
					$background_style      .= 'background-image: initial !important;';
				}

				// Save processed background images.
				$processed_background_image = $background_image_style;

				// C. Background Color.
				if ( ! $has_background_gradient_and_image ) {
					// Background color `initial` was added by default to reset button background
					// color when user disable it on mobile preview mode. However, it should
					// be applied only when the background color is really disabled because user
					// may use theme customizer to setup global button background color. We also
					// need to ensure user still able to disable background color on mobile.
					$background_color_enable  = ET_Builder_Element::$_->array_get( $this->props, "{$background_prefix}enable_color{$suffix}", '' );
					$background_color_initial = 'off' === $background_color_enable && ! $is_desktop ? 'initial' : '';

					$background_color       = et_pb_responsive_options()->get_inheritance_background_value( $this->props, "{$background_prefix}color", $device, $background_base_name, $this->fields_unprocessed );
					$background_color       = '' !== $background_color ? $background_color : $background_color_initial;
					$background_color_style = $background_color;

					if ( '' !== $background_color && $processed_background_color !== $background_color ) {
						$background_style .= sprintf(
							'background-color: %1$s; ',
							esc_html( $background_color )
						);
					}
				}

				// Save processed background color.
				$processed_background_color = $background_color_style;

				// Print background gradient and image styles.
				if ( '' !== $background_style ) {
					$background_style_attrs = array(
						'selector'    => $css_element_processed,
						'declaration' => rtrim( $background_style ).' !important',
						'priority'    => $this->_style_priority,
					);

					// Add media query attribute to background style attrs.
					if ( 'desktop' !== $device ) {
						$current_media_query                   = 'tablet' === $device ? 'max_width_980' : 'max_width_767';
						$background_style_attrs['media_query'] = ET_Builder_Element::get_media_query( $current_media_query );
					}

					ET_Builder_Element::set_style( $function_name, $background_style_attrs );
				}
			}
		}
	}

	public function add_new_child_text() {
		return esc_html__( 'Add New Hotspot Marker', 'divi-plus' );
	}
}
$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
    $modules = explode( ',', $plugin_options['dipl-modules'] );
    if ( in_array( 'dipl_hot_spot', $modules ) ) {
        new DIPL_HotSpot();
    }
} else {
    new DIPL_HotSpot();
}