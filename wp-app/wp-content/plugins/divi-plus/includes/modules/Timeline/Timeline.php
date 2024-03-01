<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.4
 */
class DIPL_Timeline extends ET_Builder_Module {

	public $slug       = 'dipl_timeline';
	public $child_slug = 'dipl_timeline_item';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name = esc_html__( 'DP Timeline', 'divi-plus' );
	}

	public function get_settings_modal_toggles() {
		return array(
			'advanced' => array(
				'toggles' => array(
					'timeline_layout'                  => array(
						'title'    => esc_html__( 'Timeline Layout', 'divi-plus' ),
						'priority' => 1,
					),
					'timeline_icon_styling'            => array(
						'title'             => esc_html__( 'Timeline Icon/Image Styling', 'divi-plus' ),
						'priority'          => 2,
						'tabbed_subtoggles' => true,
						'sub_toggles'       => array(
							'timeline_item_icon'  => array(
								'name' => 'Icon',
							),
							'timeline_item_image' => array(
								'name' => 'Image',
							),
						),
					),
					'timeline_bar_styling'             => array(
						'title'    => esc_html__( 'Timeline Stem Styling', 'divi-plus' ),
						'priority' => 2,
					),
					'global_timeline_item_styling'     => array(
						'title'             => esc_html__( 'Timeline Item Styling', 'divi-plus' ),
						'priority'          => 3,
						'tabbed_subtoggles' => true,
						'sub_toggles'       => array(
							'timeline_item_background' => array(
								'name' => 'Background',
							),
							'timeline_item_padding'    => array(
								'name' => 'Padding',
							),
						),
					),
					'global_timeline_heading_settings' => array(
						'title'    => esc_html__( 'Timeline Heading', 'divi-plus' ),
						'priority' => 4,
					),
					'global_timeline_text_settings'    => array(
						'title'             => esc_html__( 'Timeline Text', 'divi-plus' ),
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
					'global_timeline_date_settings'    => array(
						'title'    => esc_html__( 'Date', 'divi-plus' ),
						'priority' => 4,
					),
				),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts'            => array(
				'global_timeline_header' => array(
					'label'          => esc_html__( 'Heading', 'divi-plus' ),
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
						'main' => '%%order_class%% .dipl_item_content h1, %%order_class%% .dipl_item_content h2, %%order_class%% .dipl_item_content h3, %%order_class%% .dipl_item_content h4, %%order_class%% .dipl_item_content h5, %%order_class%% .dipl_item_content h6, %%order_class%% .dipl_item_content .dipl_icon_wrapper',
					),
					'toggle_slug'    => 'global_timeline_heading_settings',
				),
				'global_timeline_text'   => array(
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
						'main' => '%%order_class%% .dipl_item_content .dipl_item_desc, %%order_class%% .dipl_item_content .dipl_item_desc p',
					),
					'toggle_slug'    => 'global_timeline_text_settings',
					'sub_toggle'     => 'p',
				),
				'global_timeline_link'   => array(
					'label'           => esc_html__( 'Link', 'divi-plus' ),
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
						'main' => '%%order_class%% .dipl_item_content .dipl_item_desc a',
					),
					'hide_text_align' => true,
					'toggle_slug'     => 'global_timeline_text_settings',
					'sub_toggle'      => 'a',
				),
				'global_timeline_ul'     => array(
					'label'           => esc_html__( 'Unordered List', 'divi-plus' ),
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
						'main' => '%%order_class%% .dipl_item_content .dipl_item_desc ul li',
					),
					'hide_text_align' => true,
					'toggle_slug'     => 'global_timeline_text_settings',
					'sub_toggle'      => 'ul',
				),
				'global_timeline_ol'     => array(
					'label'           => esc_html__( 'Ordered List', 'divi-plus' ),
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
						'main' => '%%order_class%% .dipl_item_content .dipl_item_desc ol li',
					),
					'hide_text_align' => true,
					'toggle_slug'     => 'global_timeline_text_settings',
					'sub_toggle'      => 'ol',
				),
				'global_timeline_quote'  => array(
					'label'           => esc_html__( 'Blockquote', 'divi-plus' ),
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
						'main' => '%%order_class%% .dipl_item_content .dipl_item_desc blockquote',
					),
					'hide_text_align' => true,
					'toggle_slug'     => 'global_timeline_text_settings',
					'sub_toggle'      => 'quote',
				),
				'global_timeline_date'   => array(
					'label'          => esc_html__( 'Date', 'divi-plus' ),
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
						'main' => '%%order_class%% .dipl_item_time',
					),
					'toggle_slug'    => 'global_timeline_date_settings',
				),
			),
			'box_shadow'       => array(
				'default' => array(
					'css' => array(
						'main' => '%%order_class%%',
					),
				),
			),
			'margin_padding'   => array(
				'css' => array(
					'main'      => '%%order_class%%',
					'important' => 'all',
				),
			),
			'timeline_padding' => array(
				'timeline' => array(
					'label'          => 'Timeline Padding',
					'margin_padding' => array(
						'css' => array(
							'main'      => '%%order_class%% .dipl_item_content_inner',
							'important' => 'all',
						),
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'global_timeline_item_styling',
					'sub_toggle'     => 'timeline_item_padding',
				),
			),
			'text'             => false,
		);
	}

	public function get_fields() {

		$dipl_timeline_fields = array(
			'select_timeline_layout'                     => array(
				'label'           => esc_html__( 'Select Layout', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'dipl_icon_tree' => esc_html__( 'Icon Tree', 'divi-plus' ),
					'dipl_date_tree' => esc_html__( 'Date Tree', 'divi-plus' ),
				),
				'default'         => 'dipl_icon_tree',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'timeline_layout',
				'description'     => esc_html__( 'Here you can choose the layout for the timeline.', 'divi-plus' ),
			),
			'select_timeline_layout_option'              => array(
				'label'           => esc_html__( 'Select Option', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'dipl_timeline_alternate' => esc_html__( 'Alternate', 'divi-plus' ),
					'dipl_timeline_right'     => esc_html__( 'Content Right', 'divi-plus' ),
					'dipl_timeline_left'      => esc_html__( 'Content Left', 'divi-plus' ),
				),
				'default'         => 'dipl_timeline_alternate',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'timeline_layout',
				'description'     => esc_html__( 'Here you can choose the placement style of the timeline content.', 'divi-plus' ),
			),
			'global_timeline_icon_color'                 => array(
				'label'       => esc_html__( 'Icon Color', 'divi-plus' ),
				'type'        => 'color-alpha',
				'default'     => '#000',
				'hover'       => 'tabs',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'timeline_icon_styling',
				'sub_toggle'  => 'timeline_item_icon',
				'description' => esc_html__( 'Here you can choose a custom color to be used for the timeline icon when not scrolled.', 'divi-plus' ),
			),
			'global_icon_fill_color'                     => array(
				'label'       => esc_html__( 'Icon Fill Color(On Scroll)', 'divi-plus' ),
				'type'        => 'color-alpha',
				'default'     => '#eee',
				'show_if'     => array(
					'select_timeline_layout' => 'dipl_icon_tree',
				),
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'timeline_icon_styling',
				'sub_toggle'  => 'timeline_item_icon',
				'description' => esc_html__( 'Here you can choose a custom color to be used for the timeline icon after scrolled', 'divi-plus' ),
			),
			'global_timeline_icon_font_size'             => array(
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
				'toggle_slug'     => 'timeline_icon_styling',
				'sub_toggle'      => 'timeline_item_icon',
				'description'     => esc_html__( 'Here you can increase or decrease the size of the timeline icon by moving the slider or entering the value.', 'divi-plus' ),
			),
			'global_icon_shape'                          => array(
				'label'           => esc_html__( 'Icon Shape', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'none'       => esc_html__( 'None', 'divi-plus' ),
					'use_square' => esc_html__( 'Square', 'divi-plus' ),
					'use_circle' => esc_html__( 'Circle', 'divi-plus' ),
				),
				'default'         => 'none',
				'mobile_options'  => false,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'timeline_icon_styling',
				'sub_toggle'      => 'timeline_item_icon',
				'description'     => esc_html__( 'Here you can choose the shape to be used for the timeline icon.', 'divi-plus' ),
			),
			'global_icon_shape_color'                    => array(
				'label'        => esc_html__( 'Icon Shape Background', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'show_if_not'  => array(
					'global_icon_shape' => 'none',
				),
				'default'      => '#eee',
				'hover'        => 'tabs',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'timeline_icon_styling',
				'sub_toggle'   => 'timeline_item_icon',
				'description'  => esc_html__( 'Here you can select a custom color to be used for the icon shape background when not scrolled.', 'divi-plus' ),
			),
			'global_icon_shape_fill_color'               => array(
				'label'        => esc_html__( 'Icon Shape Background Fill Color(On Scroll)', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'show_if'      => array(
					'select_timeline_layout' => 'dipl_icon_tree',
				),
				'show_if_not'  => array(
					'global_icon_shape' => 'none',
				),
				'default'      => '#000',
				'hover'        => 'tabs',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'timeline_icon_styling',
				'sub_toggle'   => 'timeline_item_icon',
				'description'  => esc_html__( 'Here you can select a custom color to be used for the icon shape background after scrolled.', 'divi-plus' ),
			),
			'global_icon_use_shape_border'               => array(
				'label'           => esc_html__( 'Icon Shape Border', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'layout',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'show_if_not'     => array(
					'global_icon_shape' => 'none',
				),
				'default'         => 'off',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'timeline_icon_styling',
				'sub_toggle'      => 'timeline_item_icon',
				'description'     => esc_html__( 'Here you can choose whether or not to use border on the icon shape.', 'divi-plus' ),
			),
			'global_icon_shape_border_color'             => array(
				'label'        => esc_html__( 'Icon Shape Border Color', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'show_if_not'  => array(
					'global_icon_shape' => 'none',
				),
				'show_if'      => array(
					'global_icon_use_shape_border' => 'on',
				),
				'default'      => '#eee',
				'hover'        => 'tabs',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'timeline_icon_styling',
				'sub_toggle'   => 'timeline_item_icon',
				'description'  => esc_html__( 'Here you can choose a custom color to be used for the icon shape border when not scrolled.', 'divi-plus' ),
			),
			'global_icon_shape_border_fill_color'        => array(
				'label'        => esc_html__( 'Icon Shape Border Fill Color(On Scroll)', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'show_if_not'  => array(
					'global_icon_shape' => 'none',
				),
				'show_if'      => array(
					'global_icon_use_shape_border' => 'on',
					'select_timeline_layout'       => 'dipl_icon_tree',
				),
				'default'      => '#000',
				'hover'        => 'tabs',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'timeline_icon_styling',
				'sub_toggle'   => 'timeline_item_icon',
				'description'  => esc_html__( 'Here you can choose a custom color to be used for the icon shape border after scrolled.', 'divi-plus' ),
			),
			'global_icon_shape_border_size'              => array(
				'label'           => esc_html__( 'Icon Shape Border Size', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),
				'show_if_not'     => array(
					'global_icon_shape' => 'none',
				),
				'show_if'         => array(
					'global_icon_use_shape_border' => 'on',
				),
				'mobile_options'  => false,
				'default'         => '2px',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'timeline_icon_styling',
				'sub_toggle'      => 'timeline_item_icon',
				'description'     => esc_html__( 'Here you can increase or decrease the size of the timeline icon shape border by moving the slider or entering the value.', 'divi-plus' ),
			),
			'global_item_image_size'                     => array(
				'label'           => esc_html__( 'Image Size', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'range_settings'  => array(
					'min'  => '16',
					'max'  => '300',
					'step' => '1',
				),
				'show_if'         => array(
					'select_timeline_layout' => 'dipl_icon_tree',
				),
				'mobile_options'  => true,
				'default'         => '32px',
				'fixed_unit'      => 'px',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'timeline_icon_styling',
				'sub_toggle'      => 'timeline_item_image',
				'description'     => esc_html__( 'Here you can increase or decrease the size of the timeline image by moving the slider or entering the value.', 'divi-plus' ),
			),
			'global_date_tree_image_size'                     => array(
				'label'           => esc_html__( 'Image Size', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'range_settings'  => array(
					'min'  => '16',
					'max'  => '2000',
					'step' => '1',
				),
				'show_if'         => array(
					'select_timeline_layout' => 'dipl_date_tree',
				),
				'mobile_options'  => true,
				'default'         => '32px',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'timeline_icon_styling',
				'sub_toggle'      => 'timeline_item_image',
				'description'     => esc_html__( 'Here you can increase or decrease the size of the timeline image by moving the slider or entering the value.', 'divi-plus' ),
			),
			'image_alignment' => array(
                'label'                 => esc_html__( 'Image Alignment', 'divi-plus' ),
                'type'                  => 'text_align',
                'option_category'       => 'layout',
                'options'               => et_builder_get_text_orientation_options( array( 'justified' ) ),
                'mobile_options'        => true,
                'show_if'         => array(
					'select_timeline_layout' => 'dipl_date_tree',
				),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'timeline_icon_styling',
				'sub_toggle'      => 'timeline_item_image',
                'description'           => esc_html__( 'Here you can choose the alignment of the image in the left, right, or center of the module.', 'divi-plus' ),
            ),
			'timeline_bar_size'                          => array(
				'label'           => esc_html__( 'Timeline Stem Width', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '10',
					'step' => '1',
				),
				'mobile_options'  => false,
				'default'         => '2px',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'timeline_bar_styling',
				'description'     => esc_html__( 'Here you can increase or decrease the thickness of the timeline stem by moving the slider or entering the value.', 'divi-plus' ),
			),
			'timeline_bar_color'                         => array(
				'label'       => esc_html__( 'Stem Color', 'divi-plus' ),
				'type'        => 'color-alpha',
				'default'     => '#eee',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'timeline_bar_styling',
				'description' => esc_html__( 'Here you can choose a custom color to be used for the timiline stem when not scrolled.', 'divi-plus' ),
			),
			'timeline_bar_fill_color'                    => array(
				'label'       => esc_html__( 'Stem Fill Color(On Scroll)', 'divi-plus' ),
				'type'        => 'color-alpha',
				'default'     => '#000',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'timeline_bar_styling',
				'description' => esc_html__( 'Here you can choose a custom color to be used for the timiline stem after scrolled.', 'divi-plus' ),
			),
			'timeline_bar_shape_border_size'             => array(
				'label'           => esc_html__( 'Stem Shape Border', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '60',
					'step' => '1',
				),
				'show_if'         => array(
					'select_timeline_layout' => 'dipl_date_tree',
				),
				'mobile_options'  => false,
				'default'         => '8px',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'timeline_bar_styling',
				'description'     => esc_html__( 'Here you can choose whether or not to use a border on the timeline stem shape.', 'divi-plus' ),
			),
			'timeline_bar_shape_color'                   => array(
				'label'       => esc_html__( 'Stem Shape Color', 'divi-plus' ),
				'type'        => 'color-alpha',
				'default'     => '#fff',
				'show_if'     => array(
					'select_timeline_layout' => 'dipl_date_tree',
				),
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'timeline_bar_styling',
				'description' => esc_html__( 'Here you can choose a custom color to be used for the shape of the timeline stem when not scrolled.', 'divi-plus' ),
			),
			'timeline_bar_shape_fill_color'              => array(
				'label'       => esc_html__( 'Stem Shape Fill Color(On Scroll)', 'divi-plus' ),
				'type'        => 'color-alpha',
				'default'     => '#eee',
				'show_if'     => array(
					'select_timeline_layout' => 'dipl_date_tree',
				),
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'timeline_bar_styling',
				'description' => esc_html__( 'Here you can choose a custom color to be used for the shape of the timeline stem after scrolled.', 'divi-plus' ),
			),
			'timeline_bar_shape_border_color'            => array(
				'label'       => esc_html__( 'Stem Shape Border Color', 'divi-plus' ),
				'type'        => 'color-alpha',
				'default'     => '#eee',
				'show_if'     => array(
					'select_timeline_layout' => 'dipl_date_tree',
				),
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'timeline_bar_styling',
				'description' => esc_html__( 'Here you can choose a custom color to be used for the shape border of the timeline stem when not scrolled.', 'divi-plus' ),
			),
			'timeline_bar_shape_border_fill_color'       => array(
				'label'       => esc_html__( 'Stem Shape Border Fill Color(On Scroll)', 'divi-plus' ),
				'type'        => 'color-alpha',
				'default'     => '#000',
				'show_if'     => array(
					'select_timeline_layout' => 'dipl_date_tree',
				),
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'timeline_bar_styling',
				'description' => esc_html__( 'Here you can choose a custom color to be used for the shape border of the timeline stem after scrolled.', 'divi-plus' ),
			),
			'timeline_custom_padding'                    => array(
				'label'           => esc_html__( 'Timeline Padding', 'divi-plus' ),
				'type'            => 'custom_padding',
				'option_category' => 'layout',
				'mobile_options'  => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'global_timeline_item_styling',
				'sub_toggle'      => 'timeline_item_padding',
				'description'     => esc_html__( 'Padding adds extra space to the inside of the element, increasing the distance between the edge of the element and its inner contents.', 'divi-plus' ),
			),
			'global_timeline_background_color'           => array(
				'label'             => esc_html__( 'Timeline Background', 'divi-plus' ),
				'type'              => 'background-field',
				'base_name'         => 'global_timeline_background',
				'context'           => 'global_timeline_background_color',
				'option_category'   => 'button',
				'custom_color'      => true,
				'background_fields' => $this->generate_background_options( 'global_timeline_background', 'button', 'advanced', 'global_timeline_item_styling', 'global_timeline_background_color' ),
				'mobile_options'    => true,
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'global_timeline_item_styling',
				'sub_toggle'        => 'timeline_item_background',
				'description'       => esc_html__( 'Customize the background style of the tooltip by adjusting the background color, gradient, and image.', 'divi-plus' ),
			),
		);

		$dipl_timeline_fields = array_merge( $dipl_timeline_fields, $this->generate_background_options( 'global_timeline_background', 'skip', 'advanced', 'global_timeline_item_styling', 'global_timeline_background_color' ) );

		return $dipl_timeline_fields;
	}

	public function before_render() {
		global $dipl_timeline_layout;
		$dipl_timeline_layout = $this->props['select_timeline_layout'];
	}

	public function render( $attrs, $content, $render_slug ) {

		$select_timeline_layout                    = esc_attr( $this->props['select_timeline_layout'] );
		$select_timeline_layout_option             = esc_attr( $this->props['select_timeline_layout_option'] );
		$global_timeline_icon_color                = esc_attr( $this->props['global_timeline_icon_color'] );
		$global_timeline_icon_color_hover          = esc_attr( $this->get_hover_value( 'global_timeline_icon_color' ) );
		$global_timeline_icon_font_size            = esc_attr( $this->props['global_timeline_icon_font_size'] );
		$global_icon_shape                         = esc_attr( $this->props['global_icon_shape'] );
		$global_icon_shape_color                   = esc_attr( $this->props['global_icon_shape_color'] );
		$global_icon_shape_color_hover             = esc_attr( $this->get_hover_value( 'global_icon_shape_color' ) );
		$global_icon_shape_fill_color              = esc_attr( $this->props['global_icon_shape_fill_color'] );
		$global_icon_shape_fill_color_hover        = esc_attr( $this->get_hover_value( 'global_icon_shape_color' ) );
		$global_icon_use_shape_border              = esc_attr( $this->props['global_icon_use_shape_border'] );
		$global_icon_shape_border_color            = esc_attr( $this->props['global_icon_shape_border_color'] );
		$global_icon_shape_border_color_hover      = esc_attr( $this->get_hover_value( 'global_icon_shape_border_color' ) );
		$global_icon_shape_border_fill_color       = esc_attr( $this->props['global_icon_shape_border_fill_color'] );
		$global_icon_shape_border_fill_color_hover = esc_attr( $this->get_hover_value( 'global_icon_shape_border_fill_color' ) );
		$global_icon_shape_border_size             = esc_attr( $this->props['global_icon_shape_border_size'] );
		$global_item_image_size                    = et_pb_responsive_options()->get_property_values( $this->props, 'global_item_image_size' );
		$global_date_tree_image_size 			   = et_pb_responsive_options()->get_property_values( $this->props, 'global_date_tree_image_size' );
		$image_alignment_values  	 			   = et_pb_responsive_options()->get_property_values( $this->props, 'image_alignment' );
		$timeline_bar_color                        = esc_attr( $this->props['timeline_bar_color'] );
		$timeline_bar_size                         = esc_attr( $this->props['timeline_bar_size'] );
		$timeline_bar_fill_color                   = esc_attr( $this->props['timeline_bar_fill_color'] );
		$timeline_bar_shape_border_size            = esc_attr( $this->props['timeline_bar_shape_border_size'] );
		$timeline_bar_shape_color                  = esc_attr( $this->props['timeline_bar_shape_color'] );
		$timeline_bar_shape_fill_color             = esc_attr( $this->props['timeline_bar_shape_fill_color'] );
		$timeline_bar_shape_border_color           = esc_attr( $this->props['timeline_bar_shape_border_color'] );
		$timeline_bar_shape_border_fill_color      = esc_attr( $this->props['timeline_bar_shape_border_fill_color'] );
		$global_icon_fill_color                    = esc_attr( $this->props['global_icon_fill_color'] );

		wp_enqueue_script( 'dipl-timeline-custom', PLUGIN_PATH."includes/modules/Timeline/dipl-timeline-custom.min.js", array('jquery'), '1.0.0', true );
		$file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        wp_enqueue_style( 'dipl-timeline-style', PLUGIN_PATH . 'includes/modules/Timeline/' . $file . '.min.css', array(), '1.0.0' );

		foreach( $image_alignment_values as &$align ) {
			$align = str_replace( array( 'left', 'right' ), array( 'flex-start', 'flex-end' ), $align);
		}
	
		$options = array( 'dipl_item_content_inner' => 'global_timeline_background' );

		if ( '' !== $global_timeline_icon_font_size ) {
			$font_size_values = et_pb_responsive_options()->get_property_values( $this->props, 'global_timeline_icon_font_size' );
			et_pb_responsive_options()->generate_responsive_css( $font_size_values, '%%order_class%% .dipl_item_icon.et-pb-icon', 'font-size', $render_slug, '', 'type' );

			if ( 'dipl_icon_tree' === $select_timeline_layout ) {
				$icon_shape_border_size = ( '' !== $global_icon_shape_border_size ) ? intval( $global_icon_shape_border_size ) : 0;

				$font_size_values['tablet'] = ( '' !== $font_size_values['tablet'] ) ? $font_size_values['tablet'] : $font_size_values['desktop'];
				$font_size_values['phone'] = ( '' !== $font_size_values['phone'] ) ? $font_size_values['phone'] : $font_size_values['desktop'];
				$global_item_image_size_desktop = ( '' !== $global_item_image_size['desktop'] ) ? $global_item_image_size['desktop'] : $global_item_image_size['desktop'];
				$global_item_image_size_tablet = ( '' !== $global_item_image_size['tablet'] ) ? $global_item_image_size['tablet'] : $global_item_image_size['desktop'];
				$global_item_image_size_phone = ( '' !== $global_item_image_size['phone'] ) ? $global_item_image_size['phone'] : $global_item_image_size['desktop'];

				if ( 'none' === $global_icon_shape ) {
					$circle_icon_desktop = intval( $font_size_values['desktop'] ) . 'px';
					$circle_icon_tablet  = intval( $font_size_values['tablet'] ) . 'px';
					$circle_icon_phone   = intval( $font_size_values['phone'] ) . 'px';
				} else {
					$circle_icon_desktop = ( intval( $font_size_values['desktop'] ) + ( 2 * intval( $icon_shape_border_size ) ) + 20 ) . 'px';
					$circle_icon_tablet  = ( intval( $font_size_values['tablet'] ) + ( 2 * intval( $icon_shape_border_size ) ) + 20 ) . 'px';
					$circle_icon_phone   = ( intval( $font_size_values['phone'] ) + ( 2 * intval( $icon_shape_border_size ) ) + 20 ) . 'px';
				}

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_item_circle',
						'declaration' => sprintf( 'width: %1$s;', esc_html( $circle_icon_desktop ) ),
					)
				);
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_item_circle',
						'declaration' => sprintf( 'width: %1$s;', esc_html( $circle_icon_tablet ) ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_item_circle',
						'declaration' => sprintf( 'width: %1$s;', esc_html( $circle_icon_phone ) ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_item_circle',
						'declaration' => sprintf( 'height: %1$s;', esc_html( $circle_icon_desktop ) ),
					)
				);
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_item_circle',
						'declaration' => sprintf( 'height: %1$s;', esc_html( $circle_icon_tablet ) ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_item_circle',
						'declaration' => sprintf( 'height: %1$s;', esc_html( $circle_icon_phone ) ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);

				if ( floatval( $global_item_image_size_desktop ) > floatval( $circle_icon_desktop ) ) {
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_timeline_left .dipl_stem_center, %%order_class%% .dipl_timeline_right .dipl_stem_center',
							'declaration' => sprintf( 'width: %1$s;', esc_html( $global_item_image_size_desktop ) ),
						)
					);
					if ( 'dipl_timeline_right' === $select_timeline_layout_option ) {
						ET_Builder_Element::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% .dipl_timeline_right .dipl_stem_wrapper, %%order_class%% .dipl_timeline_right .dipl_stem_center',
								'declaration' => sprintf( 'left: %1$spx;', esc_html( floatval( $global_item_image_size_desktop ) / 2 ) ),
							)
						);
					}
					if ( 'dipl_timeline_left' === $select_timeline_layout_option ) {
						ET_Builder_Element::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% .dipl_timeline_left .dipl_stem_wrapper, %%order_class%% .dipl_timeline_left .dipl_stem_center',
								'declaration' => sprintf( 'right: %1$spx;', esc_html( floatval( $global_item_image_size_desktop ) / 2 ) ),
							)
						);
					}
				} else {
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_timeline_left .dipl_stem_center, %%order_class%% .dipl_timeline_right .dipl_stem_center',
							'declaration' => sprintf( 'width: %1$s;', esc_html( $circle_icon_desktop ) ),
						)
					);
					if ( 'dipl_timeline_right' === $select_timeline_layout_option ) {
						ET_Builder_Element::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% .dipl_timeline_right .dipl_stem_wrapper, %%order_class%% .dipl_timeline_right .dipl_stem_center',
								'declaration' => sprintf( 'left: %1$spx;', esc_html( floatval( $circle_icon_desktop ) / 2 ) ),
							)
						);
					}
					if ( 'dipl_timeline_left' === $select_timeline_layout_option ) {
						ET_Builder_Element::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% .dipl_timeline_left .dipl_stem_wrapper, %%order_class%% .dipl_timeline_left .dipl_stem_center',
								'declaration' => sprintf( 'right: %1$spx;', esc_html( floatval( $circle_icon_desktop ) / 2 ) ),
							)
						);
					}
				}

				if ( floatval( $global_item_image_size_tablet ) > floatval( $circle_icon_tablet ) ) {
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_stem_center',
							'declaration' => sprintf( 'width: %1$s;', esc_html( $global_item_image_size_tablet ) ),
							'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
						)
					);
					if ( 'dipl_timeline_right' === $select_timeline_layout_option ) {
						ET_Builder_Element::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% .dipl_stem_wrapper',
								'declaration' => sprintf( 'left: %1$spx;', esc_html( floatval( $global_item_image_size_tablet ) / 2 ) ),
								'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
							)
						);
					}
					if ( 'dipl_timeline_left' === $select_timeline_layout_option ) {
						ET_Builder_Element::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% .dipl_stem_wrapper',
								'declaration' => sprintf( 'right: %1$spx;', esc_html( floatval( $global_item_image_size_tablet ) / 2 ) ),
								'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
							)
						);
					}
				} else {
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_stem_center',
							'declaration' => sprintf( 'width: %1$s;', esc_html( $circle_icon_tablet ) ),
							'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
						)
					);
					if ( 'dipl_timeline_right' === $select_timeline_layout_option ) {
						ET_Builder_Element::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% .dipl_stem_wrapper',
								'declaration' => sprintf( 'left: %1$spx;', esc_html( floatval( $circle_icon_tablet ) / 2 ) ),
								'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
							)
						);
					}
					if ( 'dipl_timeline_left' === $select_timeline_layout_option ) {
						ET_Builder_Element::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% .dipl_stem_wrapper',
								'declaration' => sprintf( 'right: %1$spx;', esc_html( floatval( $circle_icon_tablet ) / 2 ) ),
								'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
							)
						);
					}
				}

				if ( floatval( $global_item_image_size_phone ) > floatval( $circle_icon_phone ) ) {
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_stem_center',
							'declaration' => sprintf( 'width: %1$s;', esc_html( $global_item_image_size_phone ) ),
							'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
						)
					);
					if ( 'dipl_timeline_right' === $select_timeline_layout_option ) {
						ET_Builder_Element::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% .dipl_stem_wrapper',
								'declaration' => sprintf( 'left: %1$spx;', esc_html( floatval( $global_item_image_size_phone ) / 2 ) ),
								'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
							)
						);
					}
					if ( 'dipl_timeline_left' === $select_timeline_layout_option ) {
						ET_Builder_Element::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% .dipl_stem_wrapper',
								'declaration' => sprintf( 'right: %1$spx;', esc_html( floatval( $global_item_image_size_phone ) / 2 ) ),
								'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
							)
						);
					}
					if ( 'dipl_timeline_alternate' === $select_timeline_layout_option ) {
						ET_Builder_Element::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% .dipl_stem_wrapper',
								'declaration' => sprintf( 'left: %1$spx;', esc_html( floatval( $global_item_image_size_phone ) / 2 ) ),
								'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
							)
						);
					}
				} else {
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_stem_center',
							'declaration' => sprintf( 'width: %1$s;', esc_html( $circle_icon_phone ) ),
							'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
						)
					);
					if ( 'dipl_timeline_right' === $select_timeline_layout_option ) {
						ET_Builder_Element::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% .dipl_stem_wrapper',
								'declaration' => sprintf( 'left: %1$spx;', esc_html( floatval( $circle_icon_phone ) / 2 ) ),
								'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
							)
						);
					}
					if ( 'dipl_timeline_left' === $select_timeline_layout_option ) {
						ET_Builder_Element::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% .dipl_stem_wrapper',
								'declaration' => sprintf( 'right: %1$spx;', esc_html( floatval( $circle_icon_phone ) / 2 ) ),
								'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
							)
						);
					}
					if ( 'dipl_timeline_alternate' === $select_timeline_layout_option ) {
						ET_Builder_Element::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% .dipl_stem_wrapper',
								'declaration' => sprintf( 'left: %1$spx;', esc_html( floatval( $circle_icon_phone ) / 2 ) ),
								'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
							)
						);
					}
				}
			}
		}

		if ( ! empty( array_filter( $global_item_image_size ) ) ) {
			et_pb_responsive_options()->generate_responsive_css( $global_item_image_size, '%%order_class%% .dipl_icon_tree .dipl_image_wrapper img', 'width', $render_slug, '', 'type' );
		}

		if ( ! empty( array_filter( $global_date_tree_image_size ) ) ) {
			et_pb_responsive_options()->generate_responsive_css( $global_date_tree_image_size, '%%order_class%% .dipl_date_tree .dipl_image_wrapper img', 'width', $render_slug, '', 'type' );
		}

		if ( ! empty( array_filter( $image_alignment_values ) ) && 'dipl_date_tree' === $select_timeline_layout ) {
			et_pb_responsive_options()->generate_responsive_css( $image_alignment_values, '%%order_class%% .dipl_image_wrapper', 'justify-content', $render_slug, '!important', 'type' );
		}

		if ( '' !== $global_timeline_icon_color ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl_item_icon.et-pb-icon',
					'declaration' => sprintf( 'color: %1$s;', esc_html( $global_timeline_icon_color ) ),
				)
			);
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl_item_icon.dipl_item_circle',
					'declaration' => sprintf( 'border-color: %1$s;', esc_html( $global_timeline_icon_color ) ),
				)
			);
		}

		if ( isset( $global_timeline_icon_color_hover ) ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl_item_icon.et-pb-icon:hover',
					'declaration' => sprintf( 'color: %1$s;', esc_html( $global_timeline_icon_color_hover ) ),
				)
			);
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl_item_icon.dipl_item_circle:hover',
					'declaration' => sprintf( 'border-color: %1$s;', esc_html( $global_timeline_icon_color_hover ) ),
				)
			);
		}

		if ( '' !== $global_icon_fill_color ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl_item_icon.et-pb-icon.dipl_icon_fill',
					'declaration' => sprintf( 'color: %1$s;', $global_icon_fill_color ),
				)
			);
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl_item_icon.dipl_item_circle.dipl_icon_fill',
					'declaration' => sprintf( 'border-color: %1$s;', esc_html( $global_icon_fill_color ) ),
				)
			);
		}

		if ( 'none' !== $global_icon_shape ) {
			if ( 'use_circle' === $global_icon_shape ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_item_icon',
						'declaration' => 'border-radius: 50%;',
					)
				);
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_item_icon',
						'declaration' => 'padding: 10px;',
					)
				);
			} else {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_item_icon',
						'declaration' => 'border-radius: 0;',
					)
				);
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_item_icon',
						'declaration' => 'padding: 10px;',
					)
				);
			}

			if ( '' !== $global_icon_shape_color ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .et-pb-icon.dipl_item_icon',
						'declaration' => sprintf( 'background-color: %1$s;', esc_html( $global_icon_shape_color ) ),
					)
				);
			}
			if ( isset( $global_icon_shape_color_hover ) ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .et-pb-icon.dipl_item_icon:hover',
						'declaration' => sprintf( 'background-color: %1$s;', esc_html( $global_icon_shape_color_hover ) ),
					)
				);
			}
			if ( '' !== $global_icon_shape_fill_color ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_item_icon.dipl_icon_fill',
						'declaration' => sprintf( 'background-color: %1$s;', esc_html( $global_icon_shape_fill_color ) ),
					)
				);
			}
			if ( isset( $global_icon_shape_fill_color_hover ) ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_item_icon.dipl_icon_fill:hover',
						'declaration' => sprintf( 'background-color: %1$s;', esc_html( $global_icon_shape_fill_color_hover ) ),
					)
				);
			}
			if ( 'on' === $global_icon_use_shape_border ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_item_icon.et-pb-icon',
						'declaration' => 'border-style: solid;',
					)
				);
				if ( '' !== $global_icon_shape_border_color ) {
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_item_icon',
							'declaration' => sprintf( 'border-color: %1$s;', esc_html( $global_icon_shape_border_color ) ),
						)
					);
				}
				if ( isset( $global_icon_shape_border_color_hover ) ) {
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_item_icon:hover',
							'declaration' => sprintf( 'border-color: %1$s;', esc_html( $global_icon_shape_border_color_hover ) ),
						)
					);
				}
				if ( '' !== $global_icon_shape_border_fill_color ) {
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_item_icon.dipl_icon_fill',
							'declaration' => sprintf( 'border-color: %1$s;', esc_html( $global_icon_shape_border_fill_color ) ),
						)
					);
				}
				if ( isset( $global_icon_shape_border_fill_color_hover ) ) {
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_item_icon.dipl_icon_fill:hover',
							'declaration' => sprintf( 'border-color: %1$s;', esc_html( $global_icon_shape_border_fill_color_hover ) ),
						)
					);
				}
				if ( '' !== $global_icon_shape_border_size ) {
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_item_icon',
							'declaration' => sprintf( 'border-width: %1$s;', esc_html( $global_icon_shape_border_size ) ),
						)
					);
				}
			}
		}

		if ( '' !== $timeline_bar_size ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl_stem_wrapper',
					'declaration' => sprintf( 'width: %1$s;', esc_html( $timeline_bar_size ) ),
				)
			);

			if ( '' !== $timeline_bar_color ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_stem_wrapper',
						'declaration' => sprintf( 'background: %1$s;', esc_html( $timeline_bar_color ) ),
					)
				);
			}

			if ( '' !== $timeline_bar_fill_color ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_stem',
						'declaration' => sprintf( 'background: %1$s;', esc_html( $timeline_bar_fill_color ) ),
					)
				);
			}
		}

		if ( 'dipl_date_tree' === $select_timeline_layout ) {
			if ( '' !== $timeline_bar_shape_border_size ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_time_wrapper',
						'declaration' => sprintf( 'border-width: %1$s;', esc_html( $timeline_bar_shape_border_size ) ),
					)
				);
			}

			if ( '' !== $timeline_bar_shape_color ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_time_wrapper',
						'declaration' => sprintf( 'background-color: %1$s;', esc_html( $timeline_bar_shape_color ) ),
					)
				);
			}

			if ( '' !== $timeline_bar_shape_fill_color ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_time_wrapper.dipl_border_fill',
						'declaration' => sprintf( 'background-color: %1$s;', esc_html( $timeline_bar_shape_fill_color ) ),
					)
				);
			}

			if ( '' !== $timeline_bar_shape_border_color ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_time_wrapper',
						'declaration' => sprintf( 'border-color: %1$s;', esc_html( $timeline_bar_shape_border_color ) ),
					)
				);
			}

			if ( '' !== $timeline_bar_shape_border_fill_color ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_time_wrapper.dipl_border_fill',
						'declaration' => sprintf( 'border-color: %1$s;', esc_html( $timeline_bar_shape_border_fill_color ) ),
					)
				);
			}
		}

		$this->process_advanced_css( $this, $render_slug, $this->margin_padding );
		if ( isset( $options ) ) {
			$this->process_custom_background( $render_slug, $options );
		}

		return sprintf(
			'<div class="%2$s"><div class="dipl_timeline_wrapper">
                            %1$s
                        </div><div class="%2$s_stem %3$s_stem"><div class="dipl_stem_wrapper"><div class="dipl_stem"></div></div></div></div>',
			$this->content,
			$select_timeline_layout_option,
			$select_timeline_layout
		);
	}

	public function process_advanced_css( $module, $function_name, $margin_padding ) {
		$utils           = ET_Core_Data_Utils::instance();
		$all_values      = $module->props;
		$advanced_fields = $module->advanced_fields;
		if ( ! $module->has_vb_support() && ! $module->has_advanced_fields ) {
			return;
		}
		$allowed_advanced_fields = array( 'form_field', 'button', 'timeline_padding' );
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

			$css_element           = $this->main_css_element . " .{$element}";
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
						'declaration' => rtrim( $background_style ),
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
		return esc_html__( 'Add New Timeline Item', 'divi-plus' );
	}
}
$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
	$modules = explode( ',', $plugin_options['dipl-modules'] );
	if ( in_array( 'dipl_timeline', $modules ) ) {
		new DIPL_Timeline();
	}
} else {
	new DIPL_Timeline();
}
