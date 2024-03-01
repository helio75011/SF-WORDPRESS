<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.4
 */
class DIPL_FAQPageSchema extends ET_Builder_Module {

	public $slug       = 'dipl_faq_page_schema';
	public $child_slug = 'dipl_faq_page_schema_item';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name             = esc_html__( 'DP FAQPage Schema', 'divi-plus' );
		$this->main_css_element = '%%order_class%%';
	}

	public function get_settings_modal_toggles() {
		return array(
			'advanced' => array(
				'toggles' => array(
					'faq_layout_settings'            => array(
						'title'    => esc_html__( 'Layout', 'divi-plus' ),
						'priority' => 1,
					),
					'icon_settings'                  => array(
						'title'             => esc_html__( 'Icon', 'divi-plus' ),
						'priority'          => 2,
						'tabbed_subtoggles' => true,
						'sub_toggles'       => array(
							'closed_state_icon' => array(
								'name' => 'Closed State',
							),
							'open_state_icon'   => array(
								'name' => 'Open State',
							),
						),
					),
					'question_answer_styling'        => array(
						'title'    => esc_html__( 'FAQ Styling', 'divi-plus' ),
						'priority' => 3,
					),
					'faq_heading_settings'           => array(
						'title'    => esc_html__( 'FAQ Heading', 'divi-plus' ),
						'priority' => 4,
					),
					'question_heading_settings'      => array(
						'title'             => esc_html__( 'Question Text', 'divi-plus' ),
						'priority'          => 5,
						'tabbed_subtoggles' => true,
						'sub_toggles'       => array(
							'closed_state_text' => array(
								'name' => 'Closed State',
							),
							'open_state_text'   => array(
								'name' => 'Open State',
							),
						),
					),
					'answer_text_settings'           => array(
						'title'             => esc_html__( 'Answer Text', 'divi-plus' ),
						'priority'          => 6,
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
					'global_question_answer_padding' => array(
						'title'    => esc_html__( 'Question Answer Spacing', 'divi-plus' ),
						'priority' => 7,
					),
				),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts'                          => array(
				'faq_heading'         => array(
					'label'          => esc_html__( 'FAQ Heading', 'divi-plus' ),
					'font_size'      => array(
						'default'        => '24px',
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
						'default' => 'h2',
					),
					'css'            => array(
						'main' => '%%order_class%% .dipl_faq_title h1, %%order_class%% .dipl_faq_title h2, %%order_class%% .dipl_faq_title h3, %%order_class%% .dipl_faq_title h4, %%order_class%% .dipl_faq_title h5, %%order_class%% .dipl_faq_title h6',
					),
					'toggle_slug'    => 'faq_heading_settings',
				),
				'faq_question_closed' => array(
					'label'          => esc_html__( 'Closed State', 'divi-plus' ),
					'font_size'      => array(
						'default'        => '24px',
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
						'main' => '%%order_class%% .dipl_question_wrapper h1, %%order_class%% .dipl_question_wrapper h2, %%order_class%% .dipl_question_wrapper h3, %%order_class%% .dipl_question_wrapper h4, %%order_class%% .dipl_question_wrapper h5, %%order_class%% .dipl_question_wrapper h6',
					),
					'toggle_slug'    => 'question_heading_settings',
					'sub_toggle'     => 'closed_state_text',
				),
				'faq_question_open'   => array(
					'label'          => esc_html__( 'Open State', 'divi-plus' ),
					'font_size'      => array(
						'default'        => '24px',
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
						'main' => '%%order_class%% .dipl_faq_page_schema_item.dipl_active .dipl_question_wrapper h1, %%order_class%% .dipl_faq_page_schema_item.dipl_active .dipl_question_wrapper h2, %%order_class%% .dipl_faq_page_schema_item.dipl_active  .dipl_question_wrapper h3, %%order_class%% .dipl_faq_page_schema_item.dipl_active .dipl_question_wrapper h4, %%order_class%% .dipl_faq_page_schema_item.dipl_active .dipl_question_wrapper h5, %%order_class%% .dipl_faq_page_schema_item.dipl_active .dipl_question_wrapper h6',
					),
					'toggle_slug'    => 'question_heading_settings',
					'sub_toggle'     => 'open_state_text',
				),
				'faq_answer_text'     => array(
					'label'          => esc_html__( 'Text', 'divi-plus' ),
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
						'main' => '%%order_class%% .dipl_answer_wrapper, %%order_class%% .dipl_answer_wrapper p',
					),
					'toggle_slug'    => 'answer_text_settings',
					'sub_toggle'     => 'p',
				),
				'faq_answer_link'     => array(
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
						'main' => '%%order_class%% .dipl_answer_wrapper a',
					),
					'toggle_slug'    => 'answer_text_settings',
					'sub_toggle'     => 'a',
				),
				'faq_answer_ul'       => array(
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
						'main' => '%%order_class%% .dipl_answer_wrapper ul li',
					),
					'toggle_slug'    => 'answer_text_settings',
					'sub_toggle'     => 'ul',
				),
				'faq_answer_ol'       => array(
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
						'main' => '%%order_class%% .dipl_answer_wrapper ol li',
					),
					'toggle_slug'    => 'answer_text_settings',
					'sub_toggle'     => 'ol',
				),
				'faq_answer_quote'    => array(
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
						'main' => '%%order_class%% .dipl_answer_wrapper blockquote',
					),
					'toggle_slug'    => 'answer_text_settings',
					'sub_toggle'     => 'quote',
				),
			),
			'box_shadow'                     => array(
				'default' => array(
					'css' => array(
						'main' => '%%order_class%%',
					),
				),
			),
			'margin_padding'                 => array(
				'css' => array(
					'main'      => '%%order_class%%',
					'important' => 'all',
				),
			),
			'global_question_answer_padding' => array(
				'global_question' => array(
					'label'          => 'Question Padding',
					'margin_padding' => array(
						'css' => array(
							'main' => '%%order_class%% .dipl_faq_page_schema_item .dipl_question_wrapper',
						),
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'global_question_answer_padding',
				),
				'global_answer'   => array(
					'label'          => 'Answer Padding',
					'margin_padding' => array(
						'css' => array(
							'main' => '%%order_class%% .dipl_faq_page_schema_item .dipl_answer_wrapper',
						),
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'global_question_answer_padding',
				),
			),
			'borders'                        => array(
				'default' => array(
					'css'      => array(
						'main' => array(
							'border_radii'  => "{$this->main_css_element} .dipl_faq_page_schema_item",
							'border_styles' => "{$this->main_css_element} .dipl_faq_page_schema_item",
						),
					),
					'defaults' => array(
						'border_radii'  => 'on||||',
						'border_styles' => array(
							'width' => '1px',
							'color' => '#d9d9d9',
							'style' => 'solid',
						),
					),
				),
			),
			'background'                     => array(
				'use_background_video' => false,
				'options'              => array(
					'parallax' => array( 'type' => 'skip' ),
				),
			),
			'text'                           => false,
		);
	}

	public function get_fields() {

		$et_accent_color = et_builder_accent_color();
		return array(
			'title'                          => array(
				'label'           => esc_html__( 'Title', 'divi-plus' ),
				'type'            => 'text',
				'dynamic_content' => 'text',
				'option_category' => 'basic_option',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can input the text to be used for the title of the FAQPage Schema.', 'divi-plus' ),
			),
			'schema_layout'                  => array(
				'label'           => esc_html__( 'Layout', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'dipl_faq_accordion' => esc_html__( 'Accordion Layout', 'divi-plus' ),
					'dipl_faq_grid'      => esc_html__( 'Grid Layout', 'divi-plus' ),
				),
				'default'         => 'dipl_faq_accordion',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'faq_layout_settings',
				'description'     => esc_html__( 'Here you can select the FAQPage Schema layout.', 'divi-plus' ),
			),
			'first_item_active' => array(
				'label'           => esc_html__( 'Make First Accordion Item Active', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'default'         => 'off',
				'show_if'         => array(
					'schema_layout' => 'dipl_faq_accordion',
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'faq_layout_settings',
				'description'     => esc_html__( 'Here you can set the first accordion item active.', 'divi-plus' ),
			),
			'number_of_column'               => array(
				'label'           => esc_html__( 'Columns', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'1' => esc_html__( '1', 'divi-plus' ),
					'2' => esc_html__( '2', 'divi-plus' ),
					'3' => esc_html__( '3', 'divi-plus' ),
					'4' => esc_html__( '4', 'divi-plus' ),
				),
				'default'         => '1',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'faq_layout_settings',
				'description'     => esc_html__( 'Here you can select in how many columns you want to display the contents of FAQPage Schema.', 'divi-plus' ),
			),
			'use_masonry'                    => array(
				'label'           => esc_html__( 'Use Masonry', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'default'         => 'off',
				'show_if'         => array(
					'schema_layout' => 'dipl_faq_grid',
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'faq_layout_settings',
				'description'     => esc_html__( 'Here you can select whether or not to display Grid FAQs in Masonry design appearance.', 'divi-plus' ),
			),
			'closed_toggle_icon'             => array(
				'label'           => esc_html__( 'Select Icon', 'divi-plus' ),
				'type'            => 'select_icon',
				'option_category' => 'basic_option',
				'class'           => array(
					'et-pb-font-icon',
				),
				'show_if'         => array(
					'schema_layout' => 'dipl_faq_accordion',
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'icon_settings',
				'sub_toggle'      => 'closed_state_icon',
				'description'     => esc_html__( 'Here you can select a custom icon to be used for the Accordion layout in Closed State of the FAQPage Schema.', 'divi-plus' ),
			),
			'closed_icon_color'              => array(
				'label'        => esc_html__( 'Icon Color', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'show_if'      => array(
					'schema_layout' => 'dipl_faq_accordion',
				),
				'default'      => '#ccc',
				'hover'        => 'tabs',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'icon_settings',
				'sub_toggle'   => 'closed_state_icon',
				'description'  => esc_html__( 'Here you can select custom color to be used for the Icon of the Accordion layout in Closed State.', 'divi-plus' ),
			),
			'closed_use_icon_font_size'      => array(
				'label'           => esc_html__( 'Use Icon Font Size', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'show_if'         => array(
					'schema_layout' => 'dipl_faq_accordion',
				),
				'default'         => 'off',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'icon_settings',
				'sub_toggle'      => 'closed_state_icon',
				'description'     => esc_html__( 'Here you can choose whether or not to use custom size for the Icon of the Accordion layout in Closed State.', 'divi-plus' ),
			),
			'closed_icon_font_size'          => array(
				'label'           => esc_html__( 'Icon Font Size', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'font_option',
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '120',
					'step' => '1',
				),
				'show_if'         => array(
					'schema_layout'             => 'dipl_faq_accordion',
					'closed_use_icon_font_size' => 'on',
				),
				'mobile_options'  => true,
				'default'         => '16px',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'icon_settings',
				'sub_toggle'      => 'closed_state_icon',
				'description'     => esc_html__( 'Move the slider or input the values to increase/decrease Icon size of the Accordion layout in Closed State.', 'divi-plus' ),
			),
			'open_toggle_icon'               => array(
				'label'           => esc_html__( 'Select Icon', 'divi-plus' ),
				'type'            => 'select_icon',
				'option_category' => 'basic_option',
				'class'           => array(
					'et-pb-font-icon',
				),
				'show_if'         => array(
					'schema_layout' => 'dipl_faq_accordion',
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'icon_settings',
				'sub_toggle'      => 'open_state_icon',
				'description'     => esc_html__( 'Here you can select a custom icon to be used for the Accordion layout in Open State of the FAQPage Schema.', 'divi-plus' ),
			),
			'open_icon_color'                => array(
				'label'        => esc_html__( 'Icon Color', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'show_if'      => array(
					'schema_layout' => 'dipl_faq_accordion',
				),
				'hover'        => 'tabs',
				'default'      => '#ccc',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'icon_settings',
				'sub_toggle'   => 'open_state_icon',
				'description'  => esc_html__( 'Here you can select custom color to be used for the Icon of the Accordion layout in Open State.', 'divi-plus' ),
			),
			'open_use_icon_font_size'        => array(
				'label'           => esc_html__( 'Use Icon Font Size', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'show_if'         => array(
					'schema_layout' => 'dipl_faq_accordion',
				),
				'default'         => 'off',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'icon_settings',
				'sub_toggle'      => 'open_state_icon',
				'description'     => esc_html__( 'Here you can choose whether or not to use custom size for the Icon of the Accordion layout in Open State.', 'divi-plus' ),
			),
			'open_icon_font_size'            => array(
				'label'           => esc_html__( 'Icon Font Size', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'font_option',
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '120',
					'step' => '1',
				),
				'show_if'         => array(
					'schema_layout'           => 'dipl_faq_accordion',
					'open_use_icon_font_size' => 'on',
				),
				'mobile_options'  => true,
				'default'         => '16px',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'icon_settings',
				'sub_toggle'      => 'open_state_icon',
				'description'     => esc_html__( 'Move the slider or input the values to increase/decrease Icon size of the Accordion layout in Open State.', 'divi-plus' ),
			),
			'closed_toggle_bg_color'         => array(
				'label'        => esc_html__( 'Question Background', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'hover'        => 'tabs',
				'default'      => '#f4f4f4',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'question_answer_styling',
				'description'  => esc_html__( 'Here you can select the custom color to be used for the Question field Background of the FAQ.', 'divi-plus' ),
			),
			'open_toggle_bg_color'           => array(
				'label'        => esc_html__( 'Answer Background', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'hover'        => 'tabs',
				'default'      => '#fff',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'question_answer_styling',
				'description'  => esc_html__( 'Here you can select the custom color to be used for the Answer field Background of the FAQ.', 'divi-plus' ),
			),
			'global_question_custom_padding' => array(
				'label'           => esc_html__( 'Question Padding', 'divi-plus' ),
				'type'            => 'custom_padding',
				'option_category' => 'layout',
				'mobile_options'  => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'global_question_answer_padding',
				'description'     => esc_html__( 'Padding adds extra space to the inside of the element, increasing the distance between the edge of the element and its inner contents.', 'divi-plus' ),
			),
			'global_answer_custom_padding'   => array(
				'label'           => esc_html__( 'Answer Padding', 'divi-plus' ),
				'type'            => 'custom_padding',
				'option_category' => 'layout',
				'mobile_options'  => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'global_question_answer_padding',
				'description'     => esc_html__( 'Padding adds extra space to the inside of the element, increasing the distance between the edge of the element and its inner contents.', 'divi-plus' ),
			),
		);
	}


	public function render( $attrs, $content, $render_slug ) {

		$title                     = esc_attr( $this->props['title'] );
		$schema_layout             = esc_attr( $this->props['schema_layout'] ) ? esc_attr( $this->props['schema_layout'] ) : 'dipl_faq_accordion';
		$first_item_active  	   = esc_attr( $this->props['first_item_active'] );
		$number_of_column          = esc_attr( $this->props['number_of_column'] );
		$use_masonry               = esc_attr( $this->props['use_masonry'] );
		$closed_toggle_icon        = esc_attr( $this->props['closed_toggle_icon'] );
		$closed_use_icon_font_size = esc_attr( $this->props['closed_use_icon_font_size'] );
		$closed_icon_color         = et_pb_responsive_options()->get_property_values( $this->props, 'closed_icon_color' );
		$open_toggle_icon          = esc_attr( $this->props['open_toggle_icon'] );
		$open_use_icon_font_size   = esc_attr( $this->props['open_use_icon_font_size'] );
		$open_icon_font_size       = esc_attr( $this->props['open_icon_font_size'] );

		wp_enqueue_script( 'dipl-faq-page-schema-custom', PLUGIN_PATH . 'includes/modules/FAQPageSchema/dipl-faq-page-schema-custom.min.js', array( 'jquery' ), '1.0.0', true );
		$file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        wp_enqueue_style( 'dipl-faq-page-schema-style', PLUGIN_PATH . 'includes/modules/FAQPageSchema/' . $file . '.min.css', array(), '1.0.0' );

		if ( '' !== $closed_toggle_icon && 'dipl_faq_accordion' === $schema_layout ) {
			$closed_toggle_icon = str_replace( '&#x', '\\', esc_attr( et_pb_process_font_icon( $closed_toggle_icon ) ) );
			$closed_toggle_icon = str_replace( ';', '', $closed_toggle_icon );
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl_faq_accordion .dipl_question_wrapper::after',
					'declaration' => sprintf( 'content: "%1$s";', $closed_toggle_icon ),
				)
			);

			if ( class_exists( 'ET_Builder_Module_Helper_Style_Processor' ) && method_exists( 'ET_Builder_Module_Helper_Style_Processor', 'process_extended_icon' ) ) {
                $this->generate_styles(
                    array(
                        'utility_arg'    => 'icon_font_family',
                        'render_slug'    => $render_slug,
                        'base_attr_name' => 'closed_toggle_icon',
                        'important'      => true,
                        'selector'       => '%%order_class%% .dipl_faq_accordion .dipl_question_wrapper::after',
                        'processor'      => array(
                            'ET_Builder_Module_Helper_Style_Processor',
                            'process_extended_icon',
                        ),
                    )
                );
            }

			if ( ! empty( $closed_icon_color ) ) {
				et_pb_responsive_options()->generate_responsive_css( $closed_icon_color, '%%order_class%% .dipl_faq_accordion .dipl_question_wrapper::after', 'color', $render_slug, '!important;', 'color' );

				$closed_icon_color_hover = $this->get_hover_value( 'closed_icon_color' );
				if ( '' !== $closed_icon_color_hover ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_faq_accordion .dipl_question_wrapper::after:hover',
							'declaration' => sprintf(
								'color: %1$s !important;',
								esc_attr( $closed_icon_color_hover )
							),
						)
					);
				}
			}

			if ( 'on' === $closed_use_icon_font_size ) {
				$closed_icon_font_size_values = et_pb_responsive_options()->get_property_values( $this->props, 'closed_icon_font_size' );
				if ( ! empty( array_filter( $closed_icon_font_size_values ) ) ) {
					et_pb_responsive_options()->generate_responsive_css( $closed_icon_font_size_values, '%%order_class%% .dipl_faq_accordion .dipl_question_wrapper::after', 'font-size', $render_slug, '', 'type' );
				}
			}
		}

		if ( '' !== $open_toggle_icon && 'dipl_faq_accordion' === $schema_layout ) {
			$open_toggle_icon = str_replace( '&#x', '\\', esc_attr( et_pb_process_font_icon( $open_toggle_icon ) ) );
			$open_toggle_icon = str_replace( ';', '', $open_toggle_icon );
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl_faq_accordion .dipl_faq_page_schema_item.dipl_active .dipl_question_wrapper::after',
					'declaration' => sprintf( 'content: "%1$s";', esc_attr( et_pb_process_font_icon( $open_toggle_icon ) ) ),
				)
			);

			if ( class_exists( 'ET_Builder_Module_Helper_Style_Processor' ) && method_exists( 'ET_Builder_Module_Helper_Style_Processor', 'process_extended_icon' ) ) {
                $this->generate_styles(
                    array(
                        'utility_arg'    => 'icon_font_family',
                        'render_slug'    => $render_slug,
                        'base_attr_name' => 'open_toggle_icon',
                        'important'      => true,
                        'selector'       => '%%order_class%% .dipl_faq_accordion .dipl_faq_page_schema_item.dipl_active .dipl_question_wrapper::after',
                        'processor'      => array(
                            'ET_Builder_Module_Helper_Style_Processor',
                            'process_extended_icon',
                        ),
                    )
                );
            }

			$open_icon_color = et_pb_responsive_options()->get_property_values( $this->props, 'open_icon_color' );
			et_pb_responsive_options()->generate_responsive_css( $open_icon_color, '%%order_class%% .dipl_faq_accordion .dipl_faq_page_schema_item.dipl_active .dipl_question_wrapper::after', 'color', $render_slug, '!important;', 'color' );

			$open_icon_color_hover = $this->get_hover_value( 'open_icon_color' );
			if ( '' !== $open_icon_color_hover ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_faq_accordion .dipl_faq_page_schema_item.dipl_active .dipl_question_wrapper::after:hover',
						'declaration' => sprintf(
							'color: %1$s !important;',
							esc_attr( $open_icon_color_hover )
						),
					)
				);
			}

			if ( 'on' === $open_use_icon_font_size ) {
				$open_icon_font_size_values = et_pb_responsive_options()->get_property_values( $this->props, 'open_icon_font_size' );
				if ( ! empty( array_filter( $open_icon_font_size_values ) ) ) {
					et_pb_responsive_options()->generate_responsive_css( $open_icon_font_size_values, '%%order_class%% .dipl_faq_accordion .dipl_faq_page_schema_item.dipl_active .dipl_question_wrapper::after', 'font-size', $render_slug, '', 'type' );
				}
			}
		}

		$closed_toggle_bg_color = et_pb_responsive_options()->get_property_values( $this->props, 'closed_toggle_bg_color' );
		et_pb_responsive_options()->generate_responsive_css( $closed_toggle_bg_color, '%%order_class%% .dipl_faq_accordion .dipl_question_wrapper', 'background-color', $render_slug, '!important;', 'background-color' );
		et_pb_responsive_options()->generate_responsive_css( $closed_toggle_bg_color, '%%order_class%% .dipl_faq_grid .dipl_question_wrapper', 'background-color', $render_slug, '!important;', 'color' );

		$closed_toggle_bg_color_hover = $this->get_hover_value( 'closed_toggle_bg_color' );
		if ( '' !== $closed_toggle_bg_color_hover ) {
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl_faq_accordion .dipl_question_wrapper:hover',
					'declaration' => sprintf(
						'background-color: %1$s !important;',
						esc_attr( $closed_toggle_bg_color_hover )
					),
				)
			);
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl_faq_grid .dipl_question_wrapper:hover',
					'declaration' => sprintf(
						'background-color: %1$s !important;',
						esc_attr( $closed_toggle_bg_color_hover )
					),
				)
			);
		}

		$open_toggle_bg_color = et_pb_responsive_options()->get_property_values( $this->props, 'open_toggle_bg_color' );
		et_pb_responsive_options()->generate_responsive_css( $open_toggle_bg_color, '%%order_class%% .dipl_answer_wrapper', 'background-color', $render_slug, '!important;', 'color' );
		et_pb_responsive_options()->generate_responsive_css( $open_toggle_bg_color, '%%order_class%% .dipl_faq_accordion .dipl_faq_page_schema_item.dipl_active .dipl_question_wrapper', 'background-color', $render_slug, '!important;', 'color' );
		et_pb_responsive_options()->generate_responsive_css( $open_toggle_bg_color, '%%order_class%% .dipl_faq_grid .dipl_answer_wrapper', 'background-color', $render_slug, '!important;', 'color' );

		$open_toggle_bg_color_hover = $this->get_hover_value( 'open_toggle_bg_color' );
		if ( '' !== $open_toggle_bg_color_hover ) {
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl_faq_accordion .dipl_answer_wrapper:hover',
					'declaration' => sprintf(
						'background-color: %1$s !important;',
						esc_attr( $open_toggle_bg_color_hover )
					),
				)
			);
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl_faq_accordion .dipl_faq_page_schema_item.dipl_active .dipl_question_wrapper:hover',
					'declaration' => sprintf(
						'background-color: %1$s !important;',
						esc_attr( $open_toggle_bg_color_hover )
					),
				)
			);
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl_faq_grid .dipl_answer_wrapper:hover',
					'declaration' => sprintf(
						'background-color: %1$s !important;',
						esc_attr( $open_toggle_bg_color_hover )
					),
				)
			);
		}

		if ( '' !== $title ) {
			$title_header_level = esc_attr( $this->props['faq_heading_level'] ) ? esc_attr( $this->props['faq_heading_level'] ) : 'h2';
			$title              = sprintf( '<div class="dipl_faq_title"><%2$s>%1$s</%2$s></div>', $title, $title_header_level );
		} else {
			$title = '';
		}

		if ( 'on' === $use_masonry && 'dipl_faq_grid' === $schema_layout ) {
			wp_enqueue_script( 'elicus-isotope-script' );
		}

		$this->process_advanced_css( $this, $render_slug, $this->margin_padding );

		return sprintf(
			'%1$s<div class="dipl_faq_wrapper %3$s dipl_faq_col_%4$s %5$s"%6$s itemscope itemtype="https://schema.org/FAQPage">%2$s</div>',
			$title,
			'' !== $this->content ? $this->content : '',
			$schema_layout,
			$number_of_column,
			( 'on' === $use_masonry && 'dipl_faq_grid' === $schema_layout ) ? 'dipl_faq_masonry_container' : '',
			'dipl_faq_accordion' === $schema_layout && 'on' === $first_item_active ? ' data-first_item_active="on"' : ''
		);
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

	public function process_advanced_css( $module, $function_name, $margin_padding ) {
		$utils           = ET_Core_Data_Utils::instance();
		$all_values      = $module->props;
		$advanced_fields = $module->advanced_fields;
		if ( ! $module->has_vb_support() && ! $module->has_advanced_fields ) {
			return;
		}
		$allowed_advanced_fields = array( 'form_field', 'button', 'global_question_answer_padding' );
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

	public function add_new_child_text() {
		return esc_html__( 'Add New FAQ', 'et_builder' );
	}
}
$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
	$modules = explode( ',', $plugin_options['dipl-modules'] );
	if ( in_array( 'dipl_faq_page_schema', $modules ) ) {
		new DIPL_FAQPageSchema();
	}
} else {
	new DIPL_FAQPageSchema();
}
