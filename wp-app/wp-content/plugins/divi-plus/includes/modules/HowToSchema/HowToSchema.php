<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.4
 */
class DIPL_HowToSchema extends ET_Builder_Module {

	public $slug       = 'dipl_how_to_schema';
	public $child_slug = 'dipl_how_to_schema_item';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name = esc_html__( 'DP How To Schema', 'divi-plus' );
	}

	public function get_settings_modal_toggles() {
		return array(
			'general'  => array(
				'toggles' => array(
					'howto_content'      => array(
						'title'    => esc_html__( 'Content', 'divi-plus' ),
						'priority' => 1,
					),
					'tools_and_supplies' => array(
						'title'             => esc_html__( 'Tools & Supplies', 'divi-plus' ),
						'priority'          => 2,
						'tabbed_subtoggles' => true,
						'sub_toggles'       => array(
							'tools'    => array(
								'name' => 'Tools',
							),
							'supplies' => array(
								'name' => 'Supplies',
							),
						),
					),
					'time_and_cost'      => array(
						'title'             => esc_html__( 'Time & Cost', 'divi-plus' ),
						'priority'          => 3,
						'tabbed_subtoggles' => true,
						'sub_toggles'       => array(
							'time' => array(
								'name' => 'Time',
							),
							'cost' => array(
								'name' => 'Cost',
							),
						),
					),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'how_to_heading_settings'     => array(
						'title'    => esc_html__( 'How to Heading', 'divi-plus' ),
						'priority' => 1,
					),
					'how_to_text_settings'        => array(
						'title'             => esc_html__( 'How to Description', 'divi-plus' ),
						'priority'          => 2,
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
					'step_text_settings'          => array(
						'title'             => esc_html__( 'Step Text', 'divi-plus' ),
						'priority'          => 2,
						'tabbed_subtoggles' => true,
						'sub_toggles'       => array(
							'heading'     => array(
								'name' => esc_html__( 'Heading', 'divi-plus' ),
							),
							'sub-heading' => array(
								'name' => esc_html__( 'Sub Heading', 'divi-plus' ),
							),
							'content'     => array(
								'name' => esc_html__( 'Content', 'divi-plus' ),
							),
						),
					),
					'time_text_settings'          => array(
						'title'             => esc_html__( 'Time Text', 'divi-plus' ),
						'priority'          => 3,
						'tabbed_subtoggles' => true,
						'sub_toggles'       => array(
							'heading' => array(
								'name' => esc_html__( 'Title', 'divi-plus' ),
							),
							'content' => array(
								'name' => esc_html__( 'Content', 'divi-plus' ),
							),
						),
					),
					'cost_text_settings'          => array(
						'title'             => esc_html__( 'Cost Text', 'divi-plus' ),
						'priority'          => 4,
						'tabbed_subtoggles' => true,
						'sub_toggles'       => array(
							'heading' => array(
								'name' => esc_html__( 'Title', 'divi-plus' ),
							),
							'content' => array(
								'name' => esc_html__( 'Content', 'divi-plus' ),
							),
						),
					),
					'tools_and_supplies_settings' => array(
						'title'             => esc_html__( 'Tools & Supplies Text', 'divi-plus' ),
						'priority'          => 5,
						'tabbed_subtoggles' => true,
						'sub_toggles'       => array(
							'heading' => array(
								'name' => esc_html__( 'Title', 'divi-plus' ),
							),
							'content' => array(
								'name' => esc_html__( 'Content', 'divi-plus' ),
							),
						),
					),

				),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts'          => array(
				'how_to_heading'             => array(
					'label'          => esc_html__( 'How to Heading', 'divi-plus' ),
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
						'main' => '%%order_class%% .dipl_how_to_title h1, %%order_class%% .dipl_how_to_title h2, %%order_class%% .dipl_how_to_title h3, %%order_class%% .dipl_how_to_title h4, %%order_class%% .dipl_how_to_title h5, %%order_class%% .dipl_how_to_title h6m ',
					),
					'toggle_slug'    => 'how_to_heading_settings',
				),
				'how_to_desc_text'           => array(
					'label'          => esc_html__( 'How to Description', 'divi-plus' ),
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
						'main' => '%%order_class%% .dipl_how_to_desc, %%order_class%% .dipl_how_to_desc p',
					),
					'toggle_slug'    => 'how_to_text_settings',
					'sub_toggle'     => 'p',
				),
				'how_to_desc_link'           => array(
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
						'main' => '%%order_class%% .dipl_how_to_desc a',
					),
					'toggle_slug'    => 'how_to_text_settings',
					'sub_toggle'     => 'a',
				),
				'how_to_desc_ul'             => array(
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
						'main' => '%%order_class%% .dipl_how_to_desc ul li',
					),
					'toggle_slug'    => 'how_to_text_settings',
					'sub_toggle'     => 'ul',
				),
				'how_to_desc_ol'             => array(
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
						'main' => '%%order_class%% .dipl_how_to_desc ol li',
					),
					'toggle_slug'    => 'how_to_text_settings',
					'sub_toggle'     => 'ol',
				),
				'how_to_desc_quote'          => array(
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
						'main' => '%%order_class%% .dipl_how_to_desc blockquote',
					),
					'toggle_slug'    => 'how_to_text_settings',
					'sub_toggle'     => 'quote',
				),
				'step_main_heading'          => array(
					'label'          => esc_html__( 'Main Heading', 'divi-plus' ),
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
					'header_level'   => array(
						'default' => 'h3',
					),
					'css'            => array(
						'main' => '%%order_class%% .dipl_how_to_step_title h1, %%order_class%% .dipl_how_to_step_title h2, %%order_class%% .dipl_how_to_step_title h3, %%order_class%% .dipl_how_to_step_title h4, %%order_class%% .dipl_how_to_step_title h5, %%order_class%% .dipl_how_to_step_title h6',
					),
					'toggle_slug'    => 'step_text_settings',
					'sub_toggle'     => 'heading',
				),
				'step_heading'               => array(
					'label'          => esc_html__( 'Sub-Heading', 'divi-plus' ),
					'font_size'      => array(
						'default'        => '20px',
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
						'main' => '%%order_class%% .dipl_step_title h1, %%order_class%% .dipl_step_title h2, %%order_class%% .dipl_step_title h3, %%order_class%% .dipl_step_title h4, %%order_class%% .dipl_step_title h5, %%order_class%% .dipl_step_title h6',
					),
					'toggle_slug'    => 'step_text_settings',
					'sub_toggle'     => 'sub-heading',
				),
				'step_text'                  => array(
					'label'          => esc_html__( 'Step Text', 'divi-plus' ),
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
						'main' => '%%order_class%% .dipl_step_desc, %%order_class%% .dipl_step_desc p',
					),
					'toggle_slug'    => 'step_text_settings',
					'sub_toggle'     => 'content',
				),
				'time_heading'               => array(
					'label'           => esc_html__( 'Time Heading', 'divi-plus' ),
					'font_size'       => array(
						'default'        => '20px',
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
					'header_level'    => array(
						'default' => 'h4',
					),
					'hide_text_align' => true,
					'css'             => array(
						'main' => '%%order_class%% .dipl_how_to_time_wrapper .dipl_how_to_time_title h1, %%order_class%% .dipl_how_to_time_wrapper .dipl_how_to_time_title h2, %%order_class%% .dipl_how_to_time_wrapper .dipl_how_to_time_title h3, %%order_class%% .dipl_how_to_time_wrapper .dipl_how_to_time_title h4, %%order_class%% .dipl_how_to_time_wrapper .dipl_how_to_time_title h5, %%order_class%% .dipl_how_to_time_wrapper .dipl_how_to_time_title h6',
					),
					'toggle_slug'     => 'time_text_settings',
					'sub_toggle'      => 'heading',
				),
				'time_content'               => array(
					'label'          => esc_html__( 'Time Text', 'divi-plus' ),
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
						'main' => '%%order_class%% .dipl_how_to_time_wrapper .dipl_how_to_time',
					),
					'toggle_slug'    => 'time_text_settings',
					'sub_toggle'     => 'content',
				),
				'cost_heading'               => array(
					'label'           => esc_html__( 'Cost Heading', 'divi-plus' ),
					'font_size'       => array(
						'default'        => '20px',
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
					'header_level'    => array(
						'default' => 'h4',
					),
					'css'             => array(
						'main' => '%%order_class%% .dipl_how_to_cost_title h1, %%order_class%% .dipl_how_to_cost_title h2, %%order_class%% .dipl_how_to_cost_title h3, %%order_class%% .dipl_how_to_cost_title h4, %%order_class%% .dipl_how_to_cost_title h5, %%order_class%% .dipl_how_to_cost_title h6',
					),
					'hide_text_align' => true,
					'toggle_slug'     => 'cost_text_settings',
					'sub_toggle'      => 'heading',
				),
				'cost_content'               => array(
					'label'          => esc_html__( 'Cost Text', 'divi-plus' ),
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
						'main' => '%%order_class%% .dipl_how_to_cost',
					),
					'toggle_slug'    => 'cost_text_settings',
					'sub_toggle'     => 'content',
				),
				'tools_and_supplies_heading' => array(
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
					'header_level'   => array(
						'default' => 'h3',
					),
					'css'            => array(
						'main' => '%%order_class%% .dipl_how_to_tools_supplies_title h1, %%order_class%% .dipl_how_to_tools_supplies_title h2, %%order_class%% .dipl_how_to_tools_supplies_title h3, %%order_class%% .dipl_how_to_tools_supplies_title h4, %%order_class%% .dipl_how_to_tools_supplies_title h5, %%order_class%% .dipl_how_to_tools_supplies_title h6',
					),
					'toggle_slug'    => 'tools_and_supplies_settings',
					'sub_toggle'     => 'heading',
				),
				'tools_and_supplies_content' => array(
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
						'main' => '%%order_class%% .dipl_how_to_tools_supplies',
					),
					'toggle_slug'    => 'tools_and_supplies_settings',
					'sub_toggle'     => 'content',
				),
			),
			'box_shadow'     => array(
				'default' => array(
					'css' => array(
						'main' => '%%order_class%%',
					),
				),
			),
			'margin_padding' => array(
				'css' => array(
					'main'      => '%%order_class%%',
					'important' => 'all',
				),
			),
			'text'           => false,
		);
	}

	public function get_fields() {

		$et_accent_color = et_builder_accent_color();
		return array(
			'title'           => array(
				'label'           => esc_html__( 'Title', 'divi-plus' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'howto_content',
				'description'     => esc_html__( 'Here you can input the text to be used for the title of How To Schema.', 'divi-plus' ),
			),
			'how_to_content'  => array(
				'label'           => esc_html__( 'Content', 'divi-plus' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'howto_content',
				'description'     => esc_html__( 'Here you can input the text to be used for the content of How To Schema.', 'divi-plus' ),
			),
			'howto_image'     => array(
				'label'              => esc_html__( 'Image', 'divi-plus' ),
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'upload_button_text' => esc_attr__( 'Upload an image', 'divi-plus' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'divi-plus' ),
				'update_text'        => esc_attr__( 'Set As Image', 'divi-plus' ),
				'tab_slug'           => 'general',
				'toggle_slug'        => 'howto_content',
				'description'        => esc_html__( 'Here you can upload the image to be used for the How To Schema.', 'divi-plus' ),
			),
			'step_main_title' => array(
				'label'           => esc_html__( 'Step Title', 'divi-plus' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'howto_content',
				'description'     => esc_html__( 'Here you can input the text to be used for the step title of How To Schema.', 'divi-plus' ),
			),
			'show_tools'      => array(
				'label'           => esc_html__( 'Show Tools', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'layout',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'default'         => 'off',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'tools_and_supplies',
				'sub_toggle'      => 'tools',
				'description'     => esc_html__( 'Here you can choose whether or not to display tools on How To Schema.', 'divi-plus' ),
			),
			'tools_title'     => array(
				'label'           => esc_html__( 'Tools Title', 'divi-plus' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'show_if'         => array(
					'show_tools' => 'on',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'tools_and_supplies',
				'sub_toggle'      => 'tools',
				'description'     => esc_html__( 'Here you can input the text to be used for the tools title of How To Schema.', 'divi-plus' ),
			),
			'tools_items'     => array(
				'label'           => esc_html__( 'Tools', 'divi-plus' ),
				'type'            => 'sortable_list',
				'option_category' => 'basic_option',
				'tab_slug'        => 'general',
				'show_if'         => array(
					'show_tools' => 'on',
				),
				'toggle_slug'     => 'tools_and_supplies',
				'sub_toggle'      => 'tools',
				'right_actions'   => 'move|link|copy|delete',
				'description'     => esc_html__( 'Here you can input the name of the tools that would come in use while following the steps.', 'divi-plus' ),
			),
			'show_supplies'   => array(
				'label'           => esc_html__( 'Show Supplies', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'layout',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'default'         => 'off',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'tools_and_supplies',
				'sub_toggle'      => 'supplies',
				'description'     => esc_html__( 'Here you can choose whether or not to display supplies on How To Schema.', 'divi-plus' ),
			),
			'supplies_title'  => array(
				'label'           => esc_html__( 'Supplies Title', 'divi-plus' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'show_if'         => array(
					'show_supplies' => 'on',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'tools_and_supplies',
				'sub_toggle'      => 'supplies',
				'description'     => esc_html__( 'Here you can input the text to be used for the supplies title of How To Schema.', 'divi-plus' ),
			),
			'supplies_items'  => array(
				'label'           => esc_html__( 'Supplies', 'divi-plus' ),
				'type'            => 'sortable_list',
				'option_category' => 'basic_option',
				'show_if'         => array(
					'show_supplies' => 'on',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'tools_and_supplies',
				'sub_toggle'      => 'supplies',
				'right_actions'   => 'move|link|copy|delete',
				'description'     => esc_html__( 'Here you can input the name of the supplies that would be consumed while following the steps.', 'divi-plus' ),
			),
			'show_time'       => array(
				'label'           => esc_html__( 'Show Time', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'layout',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'default'         => 'off',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'time_and_cost',
				'sub_toggle'      => 'time',
				'description'     => esc_html__( 'Here you can choose whether or not to display time on How To Schema', 'divi-plus' ),
			),
			'time_title'      => array(
				'label'           => esc_html__( 'Time Title', 'divi-plus' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'show_if'         => array(
					'show_time' => 'on',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'time_and_cost',
				'sub_toggle'      => 'time',
				'description'     => esc_html__( 'Here you can input the text to be used for the time title of the How To Schema.', 'divi-plus' ),
			),
			'add_time'        => array(
				'label'           => esc_html__( 'Time', 'divi-plus' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'show_if'         => array(
					'show_time' => 'on',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'time_and_cost',
				'sub_toggle'      => 'time',
				'description'     => esc_html__( 'Here you can input the value used to be used for the time.', 'divi-plus' ),
			),
			'time_unit'       => array(
				'label'           => esc_html__( 'Select Time Unit', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'Second' => esc_html( 'Second' ),
					'Minute' => esc_html( 'Minute' ),
					'Hour'   => esc_html( 'Hour' ),
					'Day'    => esc_html( 'Day' ),
					'Week'   => esc_html( 'Week' ),
					'Month'  => esc_html( 'Month' ),
					'Year'   => esc_html( 'Year' ),
				),
				'default'         => 'Minute',
				'show_if'         => array(
					'show_time' => 'on',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'time_and_cost',
				'sub_toggle'      => 'time',
				'description'     => esc_html__( 'Here you can select the time unit to be used for the time of How To Schema.', 'divi-plus' ),
			),
			'show_cost'       => array(
				'label'           => esc_html__( 'Show Cost', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'layout',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'default'         => 'off',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'time_and_cost',
				'sub_toggle'      => 'cost',
				'description'     => esc_html__( 'Here you can choose whether or not to display cost on How To Schema.', 'divi-plus' ),
			),
			'cost_title'      => array(
				'label'           => esc_html__( 'Cost Title', 'divi-plus' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'show_if'         => array(
					'show_cost' => 'on',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'time_and_cost',
				'sub_toggle'      => 'cost',
				'description'     => esc_html__( 'Here you can input the text to be used for the cost of How To Schema.', 'divi-plus' ),
			),
			'add_cost'        => array(
				'label'           => esc_html__( 'Cost', 'divi-plus' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'show_if'         => array(
					'show_cost' => 'on',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'time_and_cost',
				'sub_toggle'      => 'cost',
				'description'     => esc_html__( 'Here you can input the valur to be used for the cost of How To Schema.', 'divi-plus' ),
			),
		);
	}


	public function render( $attrs, $content, $render_slug ) {

		$title           = esc_attr( $this->props['title'] );
		$how_to_content  = $this->props['how_to_content'];
		$howto_image     = esc_attr( $this->props['howto_image'] );
		$step_main_title = esc_attr( $this->props['step_main_title'] );
		$show_tools      = esc_attr( $this->props['show_tools'] );
		$tools_title     = esc_attr( $this->props['tools_title'] );
		$tools_items     = $this->props['tools_items'];
		$show_supplies   = esc_attr( $this->props['show_supplies'] );
		$supplies_title  = esc_attr( $this->props['supplies_title'] );
		$supplies_items  = $this->props['supplies_items'];
		$show_time       = esc_attr( $this->props['show_time'] );
		$time_unit       = esc_attr( $this->props['time_unit'] );
		$time_title      = esc_attr( $this->props['time_title'] );
		$add_time        = intval( esc_attr( $this->props['add_time'] ) );
		$show_cost       = esc_attr( $this->props['show_cost'] );
		$cost_title      = esc_attr( $this->props['cost_title'] );
		$add_cost        = esc_attr( $this->props['add_cost'] );
		$cost            = '';
		$tools           = '';
		$supplies        = '';
		$time            = '';
		$time_text_align = 'dipl_time_text_left';
		$cost_text_align = 'dipl_cost_text_left';
		$option_search   = array( '&#91;', '&#93;' );
		$option_replace  = array( '[', ']' );

		if ( 'center' === $this->props['cost_content_text_align'] ) {
			$cost_text_align = 'dipl_cost_text_center';
		} elseif ( 'right' === $this->props['cost_content_text_align'] ) {
			$cost_text_align = 'dipl_cost_text_right';
		}

		if ( 'center' === $this->props['time_content_text_align'] ) {
			$time_text_align = 'dipl_time_text_center';
		} elseif ( 'right' === $this->props['time_content_text_align'] ) {
			$time_text_align = 'dipl_time_text_right';
		}

		if ( '' !== $title ) {
			$title_header_level = esc_attr( $this->props['how_to_heading_level'] ) ? esc_attr( $this->props['how_to_heading_level'] ) : 'h2';
			$title              = sprintf( '<div class="dipl_how_to_title" itemprop="name"><%2$s>%1$s</%2$s></div>', $title, $title_header_level );
		} else {
			$title = '';
		}

		if ( '' !== $how_to_content ) {
			$how_to_content = sprintf( '<div class="dipl_how_to_desc" itemprop="description">%1$s</div>', $how_to_content );
		} else {
			$how_to_content = '';
		}

		if ( '' !== $step_main_title ) {
			$step_header_level = esc_attr( $this->props['step_main_heading_level'] ) ? esc_attr( $this->props['step_main_heading_level'] ) : 'h3';
			$step_main_title   = sprintf( '<div class="dipl_how_to_step_title"><%2$s>%1$s</%2$s></div>', $step_main_title, $step_header_level );
		} else {
			$step_main_title = '';
		}

		if ( 'on' === $show_tools ) {
			if ( '' !== $tools_title ) {
				$tools_supplies_header_level = esc_attr( $this->props['tools_and_supplies_heading_level'] ) ? esc_attr( $this->props['tools_and_supplies_heading_level'] ) : 'h3';
				$tools_title                 = sprintf( '<div class="dipl_how_to_tools_supplies_title"><%2$s>%1$s</%2$s></div>', $tools_title, $tools_supplies_header_level );
			} else {
				$tools_title = '';
			}
			if ( '' !== $tools_items ) {
				$tools       = '';
				$tools_items = str_replace( $option_search, $option_replace, $tools_items );
				$tools_items = json_decode( $tools_items );
				foreach ( $tools_items as $tool_option ) {
					$tool_option_val = esc_attr( wp_strip_all_tags( $tool_option->value ) );
					if ( '' !== $tool_option_val ) {
						$tools .= sprintf( '<div class="dipl_how_to_tools_supplies" itemprop="tool" itemtype="http://schema.org/HowToTool">%1$s</div>', $tool_option_val );
					}
				}
			}

			if ( '' !== $tools_title || '' !== $tools ) {
				$tools = sprintf( '<div class="dipl_tools_wrapper">%1$s%2$s</div>', $tools_title, $tools );
			}
		}

		if ( 'on' === $show_supplies ) {
			if ( '' !== $supplies_title ) {
				$tools_supplies_header_level = esc_attr( $this->props['tools_and_supplies_heading_level'] ) ? esc_attr( $this->props['tools_and_supplies_heading_level'] ) : 'h3';
				$supplies_title              = sprintf( '<div class="dipl_how_to_tools_supplies_title"><%2$s>%1$s</%2$s></div>', $supplies_title, $tools_supplies_header_level );
			} else {
				$supplies_title = '';
			}
			if ( '' !== $supplies_items ) {
				$supplies       = '';
				$supply_options = str_replace( $option_search, $option_replace, $supplies_items );
				$supply_options = json_decode( $supply_options );
				foreach ( $supply_options as $supply_option ) {
					$supply_option_val = esc_attr( wp_strip_all_tags( $supply_option->value ) );
					if ( '' !== $supply_option_val ) {
						$supplies .= sprintf( '<div class="dipl_how_to_tools_supplies" itemprop="supply" itemtype="http://schema.org/HowToSupply">%1$s</div>', $supply_option_val );
					}
				}
			}

			if ( '' !== $supplies_title || '' !== $supplies ) {
				$supplies = sprintf( '<div class="dipl_supplies_wrapper">%1$s%2$s</div>', $supplies_title, $supplies );
			}
		}

		if ( 'on' === $show_time ) {
			if ( '' !== $time_title ) {
				$time_header_level = esc_attr( $this->props['time_heading_level'] ) ? esc_attr( $this->props['time_heading_level'] ) : 'h4';
				$time_title        = sprintf( '<div class="dipl_how_to_time_title"><%2$s>%1$s</%2$s></div>', $time_title, $time_header_level );
			} else {
				$time_title = '';
			}
			if ( '' !== $add_time ) {
				$time_unit    = ( $add_time > 1 ) ? $time_unit . 's' : $time_unit;
				$time_content = ( 'Minute' === $time_unit ? 'PT' : 'P' ) . $add_time . str_split( $time_unit )[0];
				$time         = sprintf( '<div class="dipl_how_to_time" itemprop="totalTime" content="%3$s">%1$s %2$s</div>', $add_time, $time_unit, $time_content );
			}

			if ( '' !== $time_title || '' !== $time ) {
				$time = sprintf( '<div class="dipl_how_to_time_wrapper %3$s">%1$s%2$s</div>', $time_title, $time, $time_text_align );
			}
		}

		if ( 'on' === $show_cost ) {
			if ( '' !== $cost_title ) {
				$cost_header_level = esc_attr( $this->props['cost_heading_level'] ) ? esc_attr( $this->props['cost_heading_level'] ) : 'h4';
				$cost_title        = sprintf( '<div class="dipl_how_to_cost_title"><%2$s>%1$s</%2$s></div>', $cost_title, $cost_header_level );
			} else {
				$cost_title = '';
			}

			if ( '' !== $add_cost ) {
				$cost = sprintf( '<div class="dipl_how_to_cost" itemprop="estimatedCost">%1$s</div>', $add_cost );
			}

			if ( '' !== $cost_title || '' !== $cost ) {
				$cost = sprintf( '<div class="dipl_how_to_cost_wrapper %3$s">%1$s%2$s</div>', $cost_title, $cost, $cost_text_align );
			}
		}

		if ( '' !== $this->content ) {
			$step_content = sprintf( '<div class="dipl_how_to_step_wrapper">%1$s</div>', $this->content );
		} else {
			$step_content = '';
		}

		if ( '' !== $howto_image ) {
			$howto_image = sprintf( '<div class="dipl_how_to_image_wrapper"><img itemprop="image" src="%1$s"/></div>', $howto_image );
		} else {
			$howto_image = '';
		}

		$file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        wp_enqueue_style( 'dipl-how-to-schema-style', PLUGIN_PATH . 'includes/modules/HowToSchema/' . $file . '.min.css', array(), '1.0.0' );

		return sprintf( '<div class="dipl_how_to_wrapper" itemscope itemtype="http://schema.org/HowTo">%1$s %2$s %3$s %4$s %5$s %6$s %7$s %8$s %9$s</div>', $title, $howto_image, $time, $cost, $how_to_content, $tools, $supplies, $step_main_title, $step_content );
	}

	public function add_new_child_text() {
		return esc_html__( 'Add New Step', 'et_builder' );
	}
}
$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
    $modules = explode( ',', $plugin_options['dipl-modules'] );
    if ( in_array( 'dipl_how_to_schema', $modules ) ) {
        new DIPL_HowToSchema();
    }
} else {
    new DIPL_HowToSchema();
}