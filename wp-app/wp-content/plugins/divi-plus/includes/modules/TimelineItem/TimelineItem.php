<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.4
 */
class DIPL_Timeline_Item extends ET_Builder_Module {

	public $slug       = 'dipl_timeline_item';
	public $type       = 'child';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name            = esc_html__( 'DP Timeline Item', 'divi-plus' );
		$this->plural          = esc_html__( 'DP Timeline Items', 'divi-plus' );
		$this->child_title_var = 'timeline_title';
	}

	public function get_settings_modal_toggles() {
		return array(
			'general'  => array(
				'toggles' => array(
					'timeline_content' => array(
						'title'    => esc_html__( 'Timeline Content', 'divi-plus' ),
						'priority' => 1,
					),
					'timeline_time'    => array(
						'title'    => esc_html__( 'Timeline Time', 'divi-plus' ),
						'priority' => 2,
					),
					'timeline_icon'    => array(
						'title'    => esc_html__( 'Timeline Icon/Image', 'divi-plus' ),
						'priority' => 3,
					),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'single_timeline_item_styling'     => array(
						'title'    => esc_html__( 'Timeline Item Background', 'divi-plus' ),
						'priority' => 1,
					),
					'single_timeline_icon_styling'     => array(
						'title'    => esc_html__( 'Timeline Item Icon', 'divi-plus' ),
						'priority' => 2,
					),
					'single_timeline_image_styling'    => array(
						'title'    => esc_html__( 'Timeline Item Image', 'divi-plus' ),
						'priority' => 3,
					),
					'single_timeline_heading_settings' => array(
						'title'    => esc_html__( 'Timeline Item Heading', 'divi-plus' ),
						'priority' => 4,
					),
					'single_timeline_text_settings'    => array(
						'title'             => esc_html__( 'Timeline Item Text', 'divi-plus' ),
						'priority'          => 5,
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
					'single_timeline_date_settings'    => array(
						'title'    => esc_html__( 'Timeline Date Text', 'divi-plus' ),
						'priority' => 6,
					),
				),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts'          => array(
				'global_timeline_header' => array(
					'label'          => esc_html__( 'Heading', 'divi-plus' ),
					'font_size'      => array(
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height'    => array(
						'range_settings' => array(
							'min'  => '0.1',
							'max'  => '10',
							'step' => '0.1',
						),
					),
					'letter_spacing' => array(
						'range_settings' => array(
							'min'  => '0',
							'max'  => '10',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'header_level'   => array(
						'default' => 'h3',
					),
					'css'            => array(
						'main' => '%%order_class%%.dipl_timeline_item .dipl_item_content h1, %%order_class%%.dipl_timeline_item .dipl_item_content h2, %%order_class%%.dipl_timeline_item .dipl_item_content h3, %%order_class%%.dipl_timeline_item .dipl_item_content h4, %%order_class%%.dipl_timeline_item .dipl_item_content h5, %%order_class%%.dipl_timeline_item .dipl_item_content h6',
					),
					'toggle_slug'    => 'single_timeline_heading_settings',
				),
				'global_timeline_text'   => array(
					'label'          => esc_html__( 'Text', 'divi-plus' ),
					'font_size'      => array(
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height'    => array(
						'range_settings' => array(
							'min'  => '0.1',
							'max'  => '10',
							'step' => '0.1',
						),
					),
					'letter_spacing' => array(
						'range_settings' => array(
							'min'  => '0',
							'max'  => '10',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'css'            => array(
						'main' => '%%order_class%%.dipl_timeline_item .dipl_item_content .dipl_item_desc, %%order_class%%.dipl_timeline_item .dipl_item_content .dipl_item_desc p',
					),
					'toggle_slug'    => 'single_timeline_text_settings',
					'sub_toggle'     => 'p',
				),
				'global_timeline_link'   => array(
					'label'           => esc_html__( 'Link', 'divi-plus' ),
					'font_size'       => array(
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height'     => array(
						'range_settings' => array(
							'min'  => '0.1',
							'max'  => '10',
							'step' => '0.1',
						),
					),
					'letter_spacing'  => array(
						'range_settings' => array(
							'min'  => '0',
							'max'  => '10',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'css'             => array(
						'main' => '%%order_class%%.dipl_timeline_item .dipl_item_content .dipl_item_desc  a',
					),
					'hide_text_align' => true,
					'toggle_slug'     => 'single_timeline_text_settings',
					'sub_toggle'      => 'a',
				),
				'global_timeline_ul'     => array(
					'label'           => esc_html__( 'Unordered List', 'divi-plus' ),
					'font_size'       => array(
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height'     => array(
						'range_settings' => array(
							'min'  => '0.1',
							'max'  => '10',
							'step' => '0.1',
						),
					),
					'letter_spacing'  => array(
						'range_settings' => array(
							'min'  => '0',
							'max'  => '10',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'css'             => array(
						'main' => '%%order_class%%.dipl_timeline_item .dipl_item_content .dipl_item_desc ul li',
					),
					'hide_text_align' => true,
					'toggle_slug'     => 'single_timeline_text_settings',
					'sub_toggle'      => 'ul',
				),
				'global_timeline_ol'     => array(
					'label'           => esc_html__( 'Ordered List', 'divi-plus' ),
					'font_size'       => array(
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height'     => array(
						'range_settings' => array(
							'min'  => '0.1',
							'max'  => '10',
							'step' => '0.1',
						),
					),
					'letter_spacing'  => array(
						'range_settings' => array(
							'min'  => '0',
							'max'  => '10',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'css'             => array(
						'main' => '%%order_class%%.dipl_timeline_item .dipl_item_content .dipl_item_desc ol li',
					),
					'hide_text_align' => true,
					'toggle_slug'     => 'single_timeline_text_settings',
					'sub_toggle'      => 'ol',
				),
				'global_timeline_quote'  => array(
					'label'           => esc_html__( 'Blockquote', 'divi-plus' ),
					'font_size'       => array(
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height'     => array(
						'range_settings' => array(
							'min'  => '0.1',
							'max'  => '10',
							'step' => '0.1',
						),
					),
					'letter_spacing'  => array(
						'range_settings' => array(
							'min'  => '0',
							'max'  => '10',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'css'             => array(
						'main' => '%%order_class%%.dipl_timeline_item .dipl_item_content .dipl_item_desc blockquote',
					),
					'hide_text_align' => true,
					'toggle_slug'     => 'single_timeline_text_settings',
					'sub_toggle'      => 'quote',
				),
				'global_timeline_date'   => array(
					'label'          => esc_html__( 'Date', 'divi-plus' ),
					'font_size'      => array(
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height'    => array(
						'range_settings' => array(
							'min'  => '0.1',
							'max'  => '10',
							'step' => '0.1',
						),
					),
					'letter_spacing' => array(
						'range_settings' => array(
							'min'  => '0',
							'max'  => '10',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'css'            => array(
						'main' => '%%order_class%%.dipl_timeline_item .dipl_item_time',
					),
					'toggle_slug'    => 'single_timeline_date_settings',
				),
			),
			'borders'        => array(
				'default' => array(
					'css' => array(
						'main' => array(
							'border_radii'  => '%%order_class%%.dipl_timeline_item .dipl_item_content_inner',
							'border_styles' => '%%order_class%%.dipl_timeline_item .dipl_item_content_inner',
						),
					),
				),
			),
			'box_shadow'     => array(
				'default' => array(
					'css' => array(
						'main' => '%%order_class%%.dipl_timeline_item .dipl_item_content',
					),
				),
			),
			'margin_padding' => array(
				'use_margin' => false,
				'css'        => array(
					'main'      => '%%order_class%%.dipl_timeline_item .dipl_item_content_inner',
					'important' => 'all',
				),
			),
			'background'     => array(
				'options'              => array(
					'parallax' => array( 'type' => 'skip' ),
				),
				'css'                  => array(
					'main' => '.dipl_timeline %%order_class%%.dipl_timeline_item .dipl_item_content_inner',
				),
				'use_background_video' => false,
			),
			'max_width'      => false,
			'height'         => false,
			'text'           => false,
			'transform'      => false,
		);
	}

	public function get_fields() {
		global $dipl_timeline_layout;

		$dipl_timeline_item_fields = array(
			'timeline_title'                 => array(
				'label'           => esc_html__( 'Timeline Title', 'divi-plus' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'timeline_content',
				'description'     => esc_html__( 'Here you can input the text for the timeline title.', 'divi-plus' ),
			),
			'content'                        => array(
				'label'           => esc_html__( 'Timeline Content', 'divi-plus' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'timeline_content',
				'description'     => esc_html__( 'Here you can input the text for the timeline content.', 'divi-plus' ),
			),
			'display_time'                   => array(
				'label'           => esc_html__( 'Display Time', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'layout',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'default'         => 'off',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'timeline_time',
				'description'     => esc_html__( 'Here you can choose whether or not to display time on the timeline.', 'divi-plus' ),
			),
			'time_input_method'              => array(
				'label'           => esc_html__( 'Time Input Method', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'custom_time' => esc_html__( 'Custom Time', 'divi-plus' ),
					'datepicker'  => esc_html__( 'Datepicker', 'divi-plus' ),
				),
				'default'         => 'custom_time',
				'show_if'         => array(
					'display_time' => 'on',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'timeline_time',
				'description'     => esc_html__( 'Here you can choose how you want to display time on the timeline.', 'divi-plus' ),
			),
			'timeline_custom_time'           => array(
				'label'           => esc_html__( 'Enter Custom Time', 'divi-plus' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'show_if'         => array(
					'display_time'      => 'on',
					'time_input_method' => 'custom_time',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'timeline_time',
				'description'     => esc_html__( 'Here you can input the custom time for the timeline.', 'divi-plus' ),
			),
			'timeline_date_picker'           => array(
				'label'           => esc_html__( 'Timeline Time', 'divi-plus' ),
				'type'            => 'date_picker',
				'option_category' => 'basic_option',
				'show_if'         => array(
					'display_time'      => 'on',
					'time_input_method' => 'datepicker',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'timeline_time',
				'description'     => esc_html__( 'Here you can choose the date and adjust the time for the timeline.', 'divi-plus' ),
			),
			'time_date_format'               => array(
				'label'           => esc_html__( 'Time Format', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'fjy'     => esc_html__( 'Month DD, YYYY', 'divi-plus' ),
					'lfjsy'   => esc_html__( 'Day, Month DD, YYYY', 'divi-plus' ),
					'mjy'     => esc_html__( 'MM DD, YYYY', 'divi-plus' ),
					'ymd'     => esc_html__( 'YYYY/MM/DD', 'divi-plus' ),
					'mdy'     => esc_html__( 'MM/DD/YYYY', 'divi-plus' ),
					'dmy'     => esc_html__( 'DD/MM/YYYY', 'divi-plus' ),
					'ymddash' => esc_html__( 'YYYY-MM-DD', 'divi-plus' ),
				),
				'default'         => 'FjY',
				'show_if'         => array(
					'display_time'      => 'on',
					'time_input_method' => 'datepicker',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'timeline_time',
				'description'     => esc_html__( 'Here you can choose the time format to be used for the timeline.', 'divi-plus' ),
			),
			'use_timeline_icon'              => array(
				'label'           => esc_html__( 'Use Icon', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'layout',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'default'         => 'off',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'timeline_icon',
				'description'     => esc_html__( 'Here you can choose whether or not to use icon on the timeline instead of image.', 'divi-plus' ),
			),
			'select_timeline_icon'           => array(
				'label'           => esc_html__( 'Select Icon', 'divi-plus' ),
				'type'            => 'select_icon',
				'option_category' => 'basic_option',
				'class'           => array(
					'et-pb-font-icon',
				),
				'show_if'         => array(
					'use_timeline_icon' => 'on',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'timeline_icon',
				'description'     => esc_html__( 'Here you can choose a custom icon for the timeline.', 'divi-plus' ),
			),
			'upload_timeline_image'          => array(
				'label'              => esc_html__( 'Upload Image', 'divi-plus' ),
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'upload_button_text' => esc_attr__( 'Upload an image', 'divi-plus' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'divi-plus' ),
				'update_text'        => esc_attr__( 'Set As Image', 'divi-plus' ),
				'show_if'            => array(
					'use_timeline_icon' => 'off',
				),
				'tab_slug'           => 'general',
				'toggle_slug'        => 'timeline_icon',
				'description'        => esc_html__( 'Here you can upload the image to be used for the timeline.', 'divi-plus' ),
			),
			'timeline_image_alt'           => array(
				'label'           => esc_html__( 'Image Alt Text', 'divi-plus' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'show_if'         => array(
					'use_timeline_icon' => 'off',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'timeline_icon',
				'description'     => esc_html__( 'Here you can input the alt text for timeline image.', 'divi-plus' ),
			),
			'single_timeline_icon_color'     => array(
				'label'       => esc_html__( 'Icon Color', 'divi-plus' ),
				'type'        => 'color-alpha',
				'show_if'     => array(
					'use_timeline_icon' => 'on',
				),
				'hover'       => 'tabs',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'single_timeline_icon_styling',
				'description' => esc_html__( 'Here you can choose a custom color to be used for the timeline icon.', 'divi-plus' ),
			),
			'single_icon_shape'              => array(
				'label'           => esc_html__( 'Icon Shape', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'none'       => esc_html__( 'None', 'divi-plus' ),
					'use_square' => esc_html__( 'Square', 'divi-plus' ),
					'use_circle' => esc_html__( 'Circle', 'divi-plus' ),
				),
				'default'         => 'none',
				'show_if'         => array(
					'use_timeline_icon' => 'on',
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'single_timeline_icon_styling',
				'description'     => esc_html__( 'Here you can choose a shape to be used for the timeline icon.', 'divi-plus' ),
			),
			'single_icon_shape_color'        => array(
				'label'        => esc_html__( 'Icon Shape Background', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'show_if'      => array(
					'use_timeline_icon' => 'on',
				),
				'show_if_not'  => array(
					'single_icon_shape' => 'none',
				),
				'hover'        => 'tabs',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'single_timeline_icon_styling',
				'description'  => esc_html__( 'Here you can choose a custom color to be used for the shape background of the timeline icon.', 'divi-plus' ),
			),
			'single_icon_use_shape_border'   => array(
				'label'           => esc_html__( 'Icon Shape Border', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'layout',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'show_if'         => array(
					'use_timeline_icon' => 'on',
				),
				'show_if_not'     => array(
					'single_icon_shape' => 'none',
				),
				'default'         => 'off',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'single_timeline_icon_styling',
				'description'     => esc_html__( 'Here you can choose whether or not to use border on the timeline icon shape.', 'divi-plus' ),
			),
			'single_icon_shape_border_color' => array(
				'label'        => esc_html__( 'Icon Shape Border Color', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'show_if_not'  => array(
					'single_icon_shape' => 'none',
				),
				'show_if'      => array(
					'single_icon_use_shape_border' => 'on',
					'use_timeline_icon'            => 'on',
				),
				'hover'        => 'tabs',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'single_timeline_icon_styling',
				'description'  => esc_html__( 'Here you can choose a custom color to be used for the shape border of the timeline icon.', 'divi-plus' ),
			),
			'single_icon_shape_border_size'  => array(
				'label'           => esc_html__( 'Icon Shape Border Size', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),
				'show_if_not'     => array(
					'single_icon_shape' => 'none',
				),
				'show_if'         => array(
					'single_icon_use_shape_border' => 'on',
					'use_timeline_icon'            => 'on',
				),
				'fixed_unit'      => 'px',
				'mobile_options'  => false,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'single_timeline_icon_styling',
				'description'     => esc_html__( 'Here you can increase or decrease the shape border size of the timeline icon.', 'divi-plus' ),
			),
			'global_item_image_size'         => array(
				'label'           => esc_html__( 'Image Size', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'range_settings'  => array(
					'min'  => '16',
					'max'  => '2000',
					'step' => '1',
				),
				'show_if'         => array(
					'use_timeline_icon'            => 'off',
					'parentModule:select_timeline_layout' => 'dipl_date_tree',
				),
				'mobile_options'  => true,
				'fixed_unit'      => 'px',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'single_timeline_image_styling',
				'description'     => esc_html__( 'Here you can increase or decrease the size of the timeline image by moving the slider or entering the value.', 'divi-plus' ),
			),
			'image_alignment'                => array(
				'label'           => esc_html__( 'Image Alignment', 'divi-plus' ),
				'type'            => 'text_align',
				'option_category' => 'layout',
				'options'         => et_builder_get_text_orientation_options( array( 'justified' ) ),
				'show_if'         => array(
					'use_timeline_icon'            => 'off',
					'parentModule:select_timeline_layout' => 'dipl_date_tree',
				),
				'mobile_options'  => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'single_timeline_image_styling',
				'description'     => esc_html__( 'Here you can choose the alignment of the image in the left, right, or center of the module.', 'divi-plus' ),
			),
			'__proceseed_time'               => array(
				'type'                => 'computed',
				'computed_callback'   => array( 'DIPL_Timeline_Item', 'dipl_timeline_time' ),
				'computed_depends_on' => array(
					'display_time',
					'time_input_method',
					'timeline_date_picker',
					'time_date_format',
				),
			),
		);

		return $dipl_timeline_item_fields;
	}

	public static function dipl_timeline_time( $args = array() ) {

		$defaults = array(
			'timeline_date_picker' => '',
			'time_date_format'     => '',
		);

		$timeline_date_picker           = $args['timeline_date_picker'];
		$time_date_format               = $args['time_date_format'];
		$timeline_date_picker_formatted = '';

		if ( '' !== $timeline_date_picker ) {
			if ( 'lfjsy' === $time_date_format ) {
				$timeline_date_picker_formatted = date_format( date_create( $timeline_date_picker ), 'l, F jS, Y' );
			} elseif ( 'mjy' === $time_date_format ) {
				$timeline_date_picker_formatted = date_format( date_create( $timeline_date_picker ), 'M j, Y' );
			} elseif ( 'ymd' === $time_date_format ) {
				$timeline_date_picker_formatted = date_format( date_create( $timeline_date_picker ), 'Y/m/d' );
			} elseif ( 'mdy' === $time_date_format ) {
				$timeline_date_picker_formatted = date_format( date_create( $timeline_date_picker ), 'm/d/Y' );
			} elseif ( 'dmy' === $time_date_format ) {
				$timeline_date_picker_formatted = date_format( date_create( $timeline_date_picker ), 'd/m/Y' );
			} elseif ( 'ymddash' === $time_date_format ) {
				$timeline_date_picker_formatted = date_format( date_create( $timeline_date_picker ), 'Y-m-d' );
			} else {
				$timeline_date_picker_formatted = date_format( date_create( $timeline_date_picker ), 'F j, Y' );
			}
		}

		return $timeline_date_picker_formatted;
	}

	public function render( $attrs, $content, $render_slug ) {

		global $dipl_timeline_layout;
		$timeline_title                   = esc_attr( $this->props['timeline_title'] );
		$use_timeline_icon                = esc_attr( $this->props['use_timeline_icon'] );
		$select_timeline_icon             = esc_attr( $this->props['select_timeline_icon'] );
		$upload_timeline_image            = esc_attr( $this->props['upload_timeline_image'] );
		$timeline_image_alt 			  = esc_attr( $this->props['timeline_image_alt'] );
		$display_time                     = esc_attr( $this->props['display_time'] );
		$time_input_method                = esc_attr( $this->props['time_input_method'] );
		$timeline_custom_time             = esc_attr( $this->props['timeline_custom_time'] );
		$timeline_date_picker             = esc_attr( $this->props['timeline_date_picker'] );
		$time_date_format                 = esc_attr( $this->props['time_date_format'] );
		$single_timeline_icon_color       = esc_attr( $this->props['single_timeline_icon_color'] );
		$single_timeline_icon_color_hover = esc_attr( $this->get_hover_value( 'single_timeline_icon_color' ) );
		$image_alignment_values           = et_pb_responsive_options()->get_property_values( $this->props, 'image_alignment' );
		$global_item_image_size           = et_pb_responsive_options()->get_property_values( $this->props, 'global_item_image_size' );
		$single_icon_shape                = esc_attr( $this->props['single_icon_shape'] );
		$single_icon_shape_color          = esc_attr( $this->props['single_icon_shape_color'] );
		$single_icon_use_shape_border     = esc_attr( $this->props['single_icon_use_shape_border'] );
		$single_icon_shape_border_color   = esc_attr( $this->props['single_icon_shape_border_color'] );
		$single_icon_shape_border_size    = esc_attr( intval( $this->props['single_icon_shape_border_size'] ) );
		$header_level                     = esc_attr( $this->props['global_timeline_header_level'] ) ? esc_attr( $this->props['global_timeline_header_level'] ) : 'h3';
		$timeline_date                    = '';
		$output                           = '';

		foreach ( $image_alignment_values as &$align ) {
			$align = str_replace( array( 'left', 'right' ), array( 'flex-start', 'flex-end' ), $align );
		}

		if ( ! empty( array_filter( $image_alignment_values ) ) && 'off' === $use_timeline_icon ) {
			et_pb_responsive_options()->generate_responsive_css( $image_alignment_values, '.dipl_timeline %%order_class%% .dipl_date_tree .dipl_image_wrapper', 'justify-content', $render_slug, '!important', 'type' );
		}

		if ( ! empty( array_filter( $global_item_image_size ) ) && 'off' === $use_timeline_icon ) {
			et_pb_responsive_options()->generate_responsive_css( $global_item_image_size, '.dipl_timeline %%order_class%% .dipl_image_wrapper img', 'width', $render_slug, '!important', 'type' );
		}

		if ( '' !== $select_timeline_icon ) {
			if ( class_exists( 'ET_Builder_Module_Helper_Style_Processor' ) && method_exists( 'ET_Builder_Module_Helper_Style_Processor', 'process_extended_icon' ) ) {
                $this->generate_styles(
                    array(
                        'utility_arg'    => 'icon_font_family',
                        'render_slug'    => $render_slug,
                        'base_attr_name' => 'select_timeline_icon',
                        'important'      => true,
                        'selector'       => '%%order_class%% .dipl_item_icon',
                        'processor'      => array(
                            'ET_Builder_Module_Helper_Style_Processor',
                            'process_extended_icon',
                        ),
                    )
                );
            }
		}

		if ( '' !== $single_timeline_icon_color ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dipl_timeline %%order_class%% .dipl_item_icon.et-pb-icon',
					'declaration' => sprintf( 'color: %1$s;', esc_html( $single_timeline_icon_color ) ),
				)
			);
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dipl_timeline %%order_class%% .dipl_item_icon.dipl_item_circle',
					'declaration' => sprintf( 'border-color: %1$s;', esc_html( $single_timeline_icon_color ) ),
				)
			);
		}

		if ( '' !== $single_timeline_icon_color_hover ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dipl_timeline %%order_class%% .dipl_item_icon.et-pb-icon:hover',
					'declaration' => sprintf( 'color: %1$s;', esc_html( $single_timeline_icon_color_hover ) ),
				)
			);
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dipl_timeline %%order_class%% .dipl_item_icon.dipl_item_circle:hover',
					'declaration' => sprintf( 'border-color: %1$s;', esc_html( $single_timeline_icon_color_hover ) ),
				)
			);
		}

		if ( 'none' !== $single_icon_shape ) {
			if ( 'use_circle' === $single_icon_shape ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '.dipl_timeline %%order_class%% .dipl_item_icon',
						'declaration' => 'border-radius: 50%;',
					)
				);
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '.dipl_timeline %%order_class%% .dipl_item_icon',
						'declaration' => 'padding: 10px;',
					)
				);
			} else {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '.dipl_timeline %%order_class%% .dipl_item_icon',
						'declaration' => 'border-radius: 0;',
					)
				);
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '.dipl_timeline %%order_class%% .dipl_item_icon',
						'declaration' => 'padding: 10px;',
					)
				);
			}

			if ( '' !== $single_icon_shape_color ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '.dipl_timeline %%order_class%% .dipl_item_icon',
						'declaration' => sprintf( 'background-color: %1$s;', esc_html( $single_icon_shape_color ) ),
					)
				);
			}
			if ( isset( $single_icon_shape_color_hover ) ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '.dipl_timeline %%order_class%% .dipl_item_icon:hover',
						'declaration' => sprintf( 'background-color: %1$s;', esc_html( $single_icon_shape_color_hover ) ),
					)
				);
			}
			if ( 'on' === $single_icon_use_shape_border ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '.dipl_timeline %%order_class%% .dipl_item_icon.et-pb-icon',
						'declaration' => 'border-style: solid;',
					)
				);
				if ( '' !== $single_icon_shape_border_color ) {
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '.dipl_timeline %%order_class%% .dipl_item_icon',
							'declaration' => sprintf( 'border-color: %1$s;', esc_html( $single_icon_shape_border_color ) ),
						)
					);
				}
				if ( isset( $single_icon_shape_border_color_hover ) ) {
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '.dipl_timeline %%order_class%% .dipl_item_icon:hover',
							'declaration' => sprintf( 'border-color: %1$s;', esc_html( $single_icon_shape_border_color_hover ) ),
						)
					);
				}
				if ( '' !== $single_icon_shape_border_size ) {
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '.dipl_timeline %%order_class%% .dipl_item_icon.et-pb-icon',
							'declaration' => sprintf( 'border-width: %1$spx;', esc_html( $single_icon_shape_border_size ) ),
						)
					);
				}
			}
		}

		if ( '' !== $this->content ) {
			$timeline_content = sprintf( '<div class="dipl_item_desc">%1$s</div>', $this->content );
		} else {
			$timeline_content = '';
		}

		if ( 'on' === $display_time ) {
			if ( 'datepicker' === $time_input_method && '' !== $timeline_date_picker ) {
				if ( 'lfjsy' === $time_date_format ) {
					$timeline_date_picker_formatted = date_format( date_create( $timeline_date_picker ), 'l, F jS, Y' );
				} elseif ( 'mjy' === $time_date_format ) {
					$timeline_date_picker_formatted = date_format( date_create( $timeline_date_picker ), 'M j, Y' );
				} elseif ( 'ymd' === $time_date_format ) {
					$timeline_date_picker_formatted = date_format( date_create( $timeline_date_picker ), 'Y/m/d' );
				} elseif ( 'mdy' === $time_date_format ) {
					$timeline_date_picker_formatted = date_format( date_create( $timeline_date_picker ), 'm/d/Y' );
				} elseif ( 'dmy' === $time_date_format ) {
					$timeline_date_picker_formatted = date_format( date_create( $timeline_date_picker ), 'd/m/Y' );
				} elseif ( 'ymddash' === $time_date_format ) {
					$timeline_date_picker_formatted = date_format( date_create( $timeline_date_picker ), 'Y-m-d' );
				} else {
					$timeline_date_picker_formatted = date_format( date_create( $timeline_date_picker ), 'F j, Y' );
				}
				$timeline_date = sprintf( '<div class="dipl_item_time">%1$s</div>', esc_attr( $timeline_date_picker_formatted ) );
			} elseif ( 'custom_time' === $time_input_method && '' !== $timeline_custom_time ) {
				$timeline_date = sprintf( '<div class="dipl_item_time">%1$s</div>', $timeline_custom_time );
			}
		}

		if ( '' !== $select_timeline_icon && 'on' === $use_timeline_icon ) {
			$timeline_icon = sprintf( '<div class="dipl_icon_wrapper"><span class="dipl_item_icon et-pb-icon">%1$s</span></div>', esc_attr( et_pb_process_font_icon( $select_timeline_icon ) ) );
		} elseif ( '' !== $upload_timeline_image ) {
			$timeline_icon = sprintf( '<div class="dipl_image_wrapper"><img alt="%2$s" src="%1$s"/></div>', esc_url( $upload_timeline_image ), esc_attr( $timeline_image_alt ) );
		} else {
			$timeline_icon = ( 'dipl_icon_tree' === $dipl_timeline_layout ) ? '<div class="dipl_icon_wrapper"><span class="dipl_item_icon dipl_item_circle"></span></div>' : '';
		}

		if ( 'dipl_icon_tree' === $dipl_timeline_layout ) {
			$output = sprintf(
				'<div class="dipl_icon_tree dipl_timeline_item_wrapper">        
                                <div class="dipl_stem_center">%3$s</div>
                                <div class="dipl_item_content">
                                	<div class="dipl_item_content_inner">
	                                    %5$s
	                                    <%4$s class="dipl_item_title">%1$s</%4$s>
	                                    %2$s
	                                  	<span class="dipl_triangle"></span>
	                                </div>
                                </div>
                                <div class="dipl_date_container"></div>
                            </div>',
				$timeline_title,
				$timeline_content,
				$timeline_icon,
				$header_level,
				$timeline_date
			);
		} elseif ( 'dipl_date_tree' === $dipl_timeline_layout ) {
			$output = sprintf(
				'<div class="dipl_date_tree dipl_timeline_item_wrapper">       
                                <div class="dipl_stem_center"><div class="dipl_time_wrapper">%5$s</div></div>
                                <div class="dipl_item_content">
                                	<div class="dipl_item_content_inner">
	                                    %3$s
	                                    <%4$s class="dipl_item_title">%1$s</%4$s>
	                                    %2$s
	                                    <span class="dipl_triangle"></span>
	                                </div>
                                </div>
                                <div class="dipl_date_container"></div>
                            </div>',
				$timeline_title,
				$timeline_content,
				$timeline_icon,
				$header_level,
				$timeline_date
			);
		}

		$file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        wp_enqueue_style( 'dipl-timeline-item-style', PLUGIN_PATH . 'includes/modules/TimelineItem/' . $file . '.min.css', array(), '1.0.0' );

		return $output;
	}

	protected function _render_module_wrapper( $output = '', $render_slug = '' ) {
		$wrapper_settings    = $this->get_wrapper_settings( $render_slug );
		$slug                = $render_slug;
		$outer_wrapper_attrs = $wrapper_settings['attrs'];      /**
		* Filters the HTML attributes for the module's outer wrapper. The dynamic portion of the
		* filter name, '$slug', corresponds to the module's slug.
		*
		* @since 3.23 Add support for responsive video background.
		* @since 3.1
		*
		* @param string[]           $outer_wrapper_attrs
		* @param ET_Builder_Element $module_instance
		*/
		$outer_wrapper_attrs = apply_filters( "et_builder_module_{$slug}_outer_wrapper_attrs", $outer_wrapper_attrs, $this );       return sprintf(
			'<div%1$s>
				%2$s
			</div>',
			et_html_attrs( $outer_wrapper_attrs ),
			$output
		);
	}
}
$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
	$modules = explode( ',', $plugin_options['dipl-modules'] );
	if ( in_array( 'dipl_timeline', $modules ) ) {
		new DIPL_Timeline_Item();
	}
} else {
	new DIPL_Timeline_Item();
}
