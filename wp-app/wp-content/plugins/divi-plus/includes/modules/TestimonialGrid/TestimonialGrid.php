<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2022 Elicus Technologies Private Limited
 * @version     1.9.5
 */
class DIPL_TestimonialGrid extends ET_Builder_Module {
	public $slug       = 'dipl_testimonial_grid';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	/**
	 * Track if the module is currently rendering to prevent unnecessary rendering and recursion.
	 *
	 * @var bool
	 */
	protected static $rendering = false;

	public function init() {
		$this->name             = esc_html__( 'DP Testimonial Grid', 'divi-plus' );
		$this->main_css_element = '%%order_class%%';
	}

	public function get_settings_modal_toggles() {
		return array(
			'general'  => array(
				'toggles' => array(
					'main_content'    => array(
						'title'    => esc_html__( 'Content', 'divi-plus' ),
						'priority' => 1,
					),
					'display_setting' => array(
						'title'    => esc_html__( 'Display', 'divi-plus' ),
						'priority' => 3,
					),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'text'  => array(
						'title' => esc_html__( 'Text', 'divi-plus' ),
					),
					'body_text' => array(
						'title' => esc_html__( 'Body', 'divi-plus' ),
					),
					'author_text' => array(
						'title'             => esc_html__( 'Author', 'divi-plus' ),
						'sub_toggles'       => array(
							'author_name' => array(
								'name' => 'Name',
							),
							'author_designation' => array(
								'name' => 'Designation',
							),
							'author_company' => array(
								'name' => 'Company',
							),
						),
						'tabbed_subtoggles' => true,
					),
					'rating'      => array(
						'title'    => esc_html__( 'Star Rating', 'divi-plus' ),
					),
					'quote_icon'  => array(
						'title'             => esc_html__( 'Quote Icon', 'divi-plus' ),
						'tabbed_subtoggles' => true,
						'sub_toggles'       => array(
							'quote_icon_opening' => array(
								'name' => 'Opening Quote Icon',
							),
							'quote_icon_closing' => array(
								'name' => 'Closing Quote Icon',
							),
						),
					),
					'meta_settings' => array(
						'title' => esc_html__( 'Meta', 'divi-plus' ),
					),
				),
			),
		);
	}


	public function get_advanced_fields_config() {
		return array(
			'fonts' => array(
				'body' => array(
					'label' => esc_html__( 'Body', 'divi-plus' ),
					'font_size' => array(
						'default' => '18px',
						'range_settings' => array(
							'min'  => '10',
							'max'  => '100',
							'step' => '1',
						),
					),
					'text_orientation' => array(
						'default' => 'center',
					),
					'line_height' => array(
						'default' => '1.7',
						'range_settings' => array(
							'min'  => '0.1',
							'max'  => '10',
							'step' => '0.1',
						),
					),
					'letter_spacing' => array(
						'range_settings' => array(
							'min'  => '0.1',
							'max'  => '10',
							'step' => '0.1',
						),
					),
					'hide_text_align'  => true,
					'css' => array(
						'main' => "{$this->main_css_element} .dipl_testimonial_desc, {$this->main_css_element} .dipl_testimonial_desc p",
					),
					'tab_slug' => 'advanced',
					'toggle_slug' => 'body_text',
				),
				'author' => array(
					'label' => esc_html__( 'Author', 'divi-plus' ),
					'font_size' => array(
						'default'        => '16px',
						'range_settings' => array(
							'min'  => '8',
							'max'  => '100',
							'step' => '1',
						),
					),
					'line_height' => array(
						'default' => '1.7',
						'range_settings' => array(
							'min'  => '0.1',
							'max'  => '10',
							'step' => '0.1',
						),
					),
					'letter_spacing' => array(
						'range_settings' => array(
							'min'  => '0.1',
							'max'  => '10',
							'step' => '0.1',
						),
					),
					'hide_text_align' => true,
					'css'             => array(
						'main'        => "{$this->main_css_element} .dipl_testimonial_author_name",
						'important'   => 'all',
					),
					'toggle_slug'     => 'author_text',
					'sub_toggle'      => 'author_name',
				),
				'designation' => array(
					'label'           => esc_html__( 'Designation', 'divi-plus' ),
					'font_size'       => array(
						'default'        => '14px',
						'range_settings' => array(
							'min'  => '8',
							'max'  => '100',
							'step' => '1',
						),
					),
					'line_height'     => array(
						'default'        => '1.7',
						'range_settings' => array(
							'min'  => '0.1',
							'max'  => '10',
							'step' => '0.1',
						),
					),
					'letter_spacing'  => array(
						'default'        => '0',
						'range_settings' => array(
							'min'  => '0.1',
							'max'  => '10',
							'step' => '0.1',
						),
					),
					'hide_text_align' => true,
					'css'             => array(
						'main'        => "{$this->main_css_element} .dipl_testimonial_author_designation",
					),
					'toggle_slug'     => 'author_text',
					'sub_toggle'      => 'author_designation',
				),
				'company' => array(
					'label'           => esc_html__( 'Company', 'divi-plus' ),
					'font_size'       => array(
						'default'        => '14px',
						'range_settings' => array(
							'min'  => '8',
							'max'  => '100',
							'step' => '1',
						),
					),
					'line_height'     => array(
						'default'        => '1.7',
						'range_settings' => array(
							'min'  => '0.1',
							'max'  => '10',
							'step' => '0.1',
						),
					),
					'letter_spacing'  => array(
						'default'        => '0',
						'range_settings' => array(
							'min'  => '0.1',
							'max'  => '10',
							'step' => '0.1',
						),
					),
					'hide_text_align' => true,
					'css'             => array(
						'main'        => "{$this->main_css_element} .dipl_testimonial_author_company, {$this->main_css_element} .dipl_testimonial_author_company a",
					),
					'toggle_slug'     => 'author_text',
					'sub_toggle'      => 'author_company',
				),
			),
			'borders' => array(
				'testimonial_card' => array(
					'label_prefix'    => esc_html__( 'Single Testimonial', 'divi-plus' ),
					'css' => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dipl_single_testimonial_card',
							'border_styles' => '%%order_class%% .dipl_single_testimonial_card',
							'important' => 'all',
						),
					),
				),
				'author_image' => array(
					'label_prefix'    => esc_html__( 'Author Image', 'divi-plus' ),
					'css'             => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dipl_testimonial_author_image img',
							'border_styles' => '%%order_class%% .dipl_testimonial_author_image img',
							'important' => 'all',
						),
					),
					'depends_show_if' => 'on',
					'depends_on'	  => array( 'show_author_image' ),
				),
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
				'testimonial_card' => array(
					'label'       => esc_html__( 'Single Testimonial Box Shadow', 'divi-plus' ),
					'css'         => array(
						'main' => "%%order_class%% .dipl_single_testimonial_card",
						'important' => 'all',
					),
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'box_shadow',
				),
				'default' => array(
					'css' => array(
						'main' => $this->main_css_element,
						'important' => 'all',
					),
				),
			),
			'testimonial_margin_padding' => array(
				'testimonial_card' => array(
					'margin_padding' => array(
						'css' => array(
							'use_margin' => false,
							'padding'   => "{$this->main_css_element} .dipl_single_testimonial_card",
							'important' => 'all',
						),
					),
				),
			),
			'background' => array(
				'css' => array(
					'main' => $this->main_css_element,
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
						'default' => 'center',
						'default_on_front' => 'center',
					),
				),
			),
			'filters'        => false,
			'link_options'   => false,
		);

	}

	public function get_fields() {
		return array_merge(
			array(
				'testimonial_layout' => array(
					'label'            => esc_html__( 'Testimonials Layout', 'divi-plus' ),
					'type'             => 'select',
					'option_category'  => 'layout',
					'options'          => array(
						'layout1' => esc_html__( 'Layout 1', 'divi-plus' ),
						'layout2' => esc_html__( 'Layout 2', 'divi-plus' ),
					),
					'default'          => 'layout1',
					'tab_slug'         => 'general',
					'toggle_slug'      => 'main_content',
					'description'      => esc_html__( 'Here you can select the layout for the testimonials.', 'divi-plus' ),
					'computed_affects' => array(
						'__testimonial_data',
					),
				),
				'testimonial_number' => array(
					'label'            => esc_html__( 'Number of Testimonials', 'divi-plus' ),
					'type'             => 'text',
					'option_category'  => 'configuration',
					'default'          => 10,
					'tab_slug'         => 'general',
					'toggle_slug'      => 'main_content',
					'description'      => esc_html__( 'Here you can specify the total number of testimonials to display.', 'divi-plus' ),
					'computed_affects' => array(
						'__testimonial_data',
					),
				),
				'testimonial_order' => array(
					'label'            => esc_html__( 'Order', 'divi-plus' ),
					'type'             => 'select',
					'option_category'  => 'configuration',
					'options'          => array(
						'DESC' => esc_html__( 'DESC', 'divi-plus' ),
						'ASC'  => esc_html__( 'ASC', 'divi-plus' ),
					),
					'default'          => 'DESC',
					'tab_slug'         => 'general',
					'toggle_slug'      => 'main_content',
					'description'      => esc_html__( 'Here you can specify the sorting order for the testimonials.', 'divi-plus' ),
					'computed_affects' => array(
						'__testimonial_data',
					),
				),
				'testimonial_order_by' => array(
					'label'            => esc_html__( 'Order by', 'divi-plus' ),
					'type'             => 'select',
					'option_category'  => 'configuration',
					'options'          => array(
						'date'     	=> esc_html__( 'Date', 'divi-plus' ),
						'modified'	=> esc_html__( 'Modified Date', 'divi-plus' ),
						'title'    	=> esc_html__( 'Title', 'divi-plus' ),
						'name'     	=> esc_html__( 'Slug', 'divi-plus' ),
						'ID'       	=> esc_html__( 'ID', 'divi-plus' ),
						'rand'     	=> esc_html__( 'Random', 'divi-plus' ),
						'none'     	=> esc_html__( 'None', 'divi-plus' ),
					),
					'default'          => 'date',
					'tab_slug'         => 'general',
					'toggle_slug'      => 'main_content',
					'description'      => esc_html__( 'Here you can specify the order in which the testimonials will be displayed.', 'divi-plus' ),
					'computed_affects' => array(
						'__testimonial_data',
					),
				),
				'include_categories' => array(
					'label'            => esc_html__( 'Include Categories', 'divi-plus' ),
					'type'             => 'categories',
					'renderer_options' => array(
						'use_terms' => true,
						'term_name' => 'dipl-testimonial-category',
						'field_name' => 'et_pb_include_dipl_testimonial_category',
					),
					'tab_slug'         => 'general',
					'toggle_slug'      => 'main_content',
					'description'      => esc_html__( 'Select Categories. If no category is selected, testimonials from all categories will be displayed.', 'divi-plus' ),
					'computed_affects' => array(
						'__testimonial_data',
					),
				),
				'no_result_text' => array(
					'label'            => esc_html__( 'No Result Text', 'divi-plus' ),
					'type'             => 'text',
					'option_category'  => 'configuration',
					'default'		   => esc_html__( 'The testimonials you requested could not be found. Try changing your module settings or create some new testimonials.', 'divi-plus' ),
					'tab_slug'         => 'general',
					'toggle_slug'      => 'main_content',
					'description'      => esc_html__( 'Here you can define custom no result text.', 'divi-plus' ),
				),
				'number_of_columns' => array(
	                'label'             => esc_html__( 'Number Of Columns', 'divi-plus' ),
	                'type'              => 'select',
	                'option_category'   => 'configuration',
	                'options'           => array(
	                    '1'         => esc_html( '1' ),
	                    '2'         => esc_html( '2' ),
	                    '3'         => esc_html( '3' ),
	                ),
	                'default'           => '2',
	                'tab_slug'          => 'general',
	                'toggle_slug'       => 'display_setting',
	                'description'       => esc_html__( 'Here you can select the number of columns to display testimonials.', 'divi-plus' ),
	                'computed_affects' => array(
						'__testimonial_data',
					),
	            ),
	            'use_masonry' => array(
					'label'            => esc_html__( 'Enable Masonry', 'divi-plus' ),
					'type'             => 'yes_no_button',
					'option_category'  => 'configuration',
					'options'          => array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'default'          => 'off',
					'tab_slug'         => 'general',
					'toggle_slug'      => 'display_setting',
					'description'      => esc_html__( 'Enable Masonry for testimonials.', 'divi-plus' ),
					'computed_affects' => array(
						'__testimonial_data',
					),
				),
				'show_rating' => array(
					'label'           => esc_html__( 'Show Rating', 'divi-plus' ),
					'type'            => 'yes_no_button',
					'option_category' => 'configuration',
					'options'         => array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'default'         => 'on',
					'tab_slug'        => 'general',
					'toggle_slug'     => 'display_setting',
					'description'     => esc_html__( 'Choose whether or not the rating should be visible.', 'divi-plus' ),
					'computed_affects' => array(
						'__testimonial_data',
					),
				),
				'show_author_image' => array(
					'label'           => esc_html__( 'Show Author Image', 'divi-plus' ),
					'type'            => 'yes_no_button',
					'option_category' => 'configuration',
					'options'         => array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'default'         => 'on',
					'tab_slug'        => 'general',
					'toggle_slug'     => 'display_setting',
					'description'     => esc_html__( 'Choose whether or not the author image should be visible.', 'divi-plus' ),
					'computed_affects' => array(
						'__testimonial_data',
					),
				),
				'use_gravatar' => array(
					'label'            => esc_html__( 'Use Gravatar', 'divi-plus' ),
					'type'             => 'yes_no_button',
					'option_category'  => 'configuration',
					'options'          => array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'default'          => 'off',
					'show_if'          => array(
						'show_author_image' => 'on',
					),
					'tab_slug'         => 'general',
					'toggle_slug'      => 'display_setting',
					'description'      => esc_html__( 'Use Gravatar if author image is not uploaded.', 'divi-plus' ),
					'computed_affects' => array(
						'__testimonial_data',
					),
				),
				'show_author_designation' => array(
					'label'           => esc_html__( 'Show Designation', 'divi-plus' ),
					'type'            => 'yes_no_button',
					'option_category' => 'configuration',
					'options'         => array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'default'         => 'on',
					'tab_slug'        => 'general',
					'toggle_slug'     => 'display_setting',
					'description'     => esc_html__( 'Choose whether or not the designation should be visible.', 'divi-plus' ),
					'computed_affects' => array(
						'__testimonial_data',
					),
				),
				'show_author_company_name' => array(
					'label'           => esc_html__( 'Show Company Name', 'divi-plus' ),
					'type'            => 'yes_no_button',
					'option_category' => 'configuration',
					'options'         => array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'default'         => 'on',
					'tab_slug'        => 'general',
					'toggle_slug'     => 'display_setting',
					'description'     => esc_html__( 'Choose whether or not the company name should be visible.', 'divi-plus' ),
					'computed_affects' => array(
						'__testimonial_data',
					),
				),
				'testimonial_card_bg_color' => array(
	                'label'                 => esc_html__( 'Single Testimonial Background', 'divi-plus' ),
	                'type'                  => 'background-field',
	                'base_name'             => 'testimonial_card_bg',
	                'context'               => 'testimonial_card_bg_color',
	                'option_category'       => 'button',
	                'custom_color'          => true,
	                'background_fields'     => $this->generate_background_options( 'testimonial_card_bg', 'button', 'general', 'background', 'testimonial_card_bg_color' ),
	                'hover'                 => 'tabs',
	                'tab_slug'              => 'general',
	                'toggle_slug'           => 'background',
	                'description'           => esc_html__( 'Customize the background style of the testimonial card by adjusting the background color, gradient, and image.', 'divi-plus' ),
	            ),
				'meta_separator_color' => array(
					'label'        => esc_html__( 'Meta Separator Color', 'divi-plus' ),
					'type'         => 'color-alpha',
					'custom_color' => true,
					'show_if'      => array(
						'testimonial_layout' => 'layout1',
					),
					'default'      => '#dddddd',
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'meta_settings',
					'description'  => esc_html__( 'Here you can specify color for the meta separator.', 'divi-plus' ),
				),
				'show_opening_quote_icon' => array(
					'label'           => esc_html__( 'Show Opening Quote Icon', 'divi-plus' ),
					'type'            => 'yes_no_button',
					'option_category' => 'configuration',
					'options'         => array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'default'         => 'on',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'quote_icon',
					'sub_toggle'      => 'quote_icon_opening',
					'description'     => esc_html__( 'Choose whether or not the opening quote icon should be visible.', 'divi-plus' ),
					'computed_affects' => array(
						'__testimonial_data',
					),
				),
				'opening_quote_icon_size' => array(
					'label'           => esc_html__( 'Quote Icon Size', 'divi-plus' ),
					'type'            => 'range',
					'option_category' => 'font_option',
					'range_settings'  => array(
						'min'  => '1',
						'max'  => '350',
						'step' => '1',
					),
					'mobile_options'  => true,
					'show_if'         => array(
						'show_opening_quote_icon' => 'on',
					),
					'default'         => '56px',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'quote_icon',
					'sub_toggle'      => 'quote_icon_opening',
					'description'     => esc_html__( 'Here you can choose size of the quote icon.', 'divi-plus' ),
				),
				'opening_quote_icon_color' => array(
					'label'        => esc_html__( 'Quote Icon Color', 'divi-plus' ),
					'type'         => 'color-alpha',
					'custom_color' => true,
					'show_if'      => array(
						'show_opening_quote_icon' => 'on',
					),
					'default'      => 'rgba(0,0,0,0.2)',
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'quote_icon',
					'sub_toggle'   => 'quote_icon_opening',
					'description'  => esc_html__( 'Here you can define color for the quote icon', 'divi-plus' ),
				),
				'custom_position_opening_quote_icon' => array(
					'label'           => esc_html__( 'Enable Custom Position For Quote Icon', 'divi-plus' ),
					'type'            => 'yes_no_button',
					'option_category' => 'configuration',
					'options'         => array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'show_if'         => array(
						'show_opening_quote_icon' => 'on',
					),
					'default'         => 'off',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'quote_icon',
					'sub_toggle'      => 'quote_icon_opening',
					'description'     => esc_html__( 'Choose whether to use the custom position of quote icon.', 'divi-plus' ),
				),
				'opening_quote_icon_position_top' => array(
					'label'           => esc_html__( 'Quote Icon Position From Top', 'divi-plus' ),
					'type'            => 'range',
					'option_category' => 'font_option',
					'range_settings'  => array(
						'min'  => '0',
						'max'  => '100',
						'step' => '1',
					),
					'allowed_units'   => array( '%', 'px', ),
					'mobile_options'  => true,
					'show_if'         => array(
						'show_opening_quote_icon'            => 'on',
						'custom_position_opening_quote_icon' => 'on',
					),
					'default'         => '0',
					'default_unit'	  => '%',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'quote_icon',
					'sub_toggle'      => 'quote_icon_opening',
					'description'     => esc_html__( 'Here you can choose the quote icon position from top.', 'divi-plus' ),
				),
				'opening_quote_icon_position' => array(
					'label'           => esc_html__( 'Quote Icon Position', 'divi-plus' ),
					'type'            => 'select',
					'option_category' => 'layout',
					'options'         => array(
						'left'   => esc_html__( 'Left', 'divi-plus' ),
						'center' => esc_html__( 'Center', 'divi-plus' ),
						'right'  => esc_html__( 'Right', 'divi-plus' ),
					),
					'show_if'         => array(
						'show_opening_quote_icon'            => 'on',
						'custom_position_opening_quote_icon' => 'on',
					),
					'default'         => 'left',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'quote_icon',
					'description'     => esc_html__( 'opening quote icon position', 'divi-plus' ),
					'sub_toggle'      => 'quote_icon_opening',
				),
				'show_closing_quote_icon' => array(
					'label'           => esc_html__( 'Show Closing Quote Icon', 'divi-plus' ),
					'type'            => 'yes_no_button',
					'option_category' => 'configuration',
					'options'         => array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'default'         => 'off',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'quote_icon',
					'sub_toggle'      => 'quote_icon_closing',
					'description'     => esc_html__( 'Choose whether or not the quote icon should be visible.', 'divi-plus' ),
					'computed_affects' => array(
						'__testimonial_data',
					),
				),
				'closing_quote_icon_size' => array(
					'label'           => esc_html__( 'Quote Icon Size', 'divi-plus' ),
					'type'            => 'range',
					'option_category' => 'font_option',
					'range_settings'  => array(
						'min'  => '1',
						'max'  => '350',
						'step' => '1',
					),
					'mobile_options'  => true,
					'show_if'         => array(
						'show_closing_quote_icon' => 'on',
					),
					'default'         => '56px',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'quote_icon',
					'sub_toggle'      => 'quote_icon_closing',
					'description'     => esc_html__( 'Here you can choose size of the quote icon.', 'divi-plus' ),
				),
				'closing_quote_icon_color' => array(
					'label'        => esc_html__( 'Quote Icon Color', 'divi-plus' ),
					'type'         => 'color-alpha',
					'custom_color' => true,
					'show_if'      => array(
						'show_closing_quote_icon' => 'on',
					),
					'default'      => 'rgba(0,0,0,0.2)',
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'quote_icon',
					'sub_toggle'   => 'quote_icon_closing',
					'description'  => esc_html__( 'Here you can define color for the quote icon', 'divi-plus' ),
				),
				'custom_position_closing_quote_icon' => array(
					'label'           => esc_html__( 'Enable Custom Position For Quote Icon', 'divi-plus' ),
					'type'            => 'yes_no_button',
					'option_category' => 'configuration',
					'options'         => array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'show_if'         => array(
						'show_closing_quote_icon' => 'on',
					),
					'default'         => 'off',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'quote_icon',
					'sub_toggle'      => 'quote_icon_closing',
					'description'     => esc_html__( 'Choose whether or not the quote icon should be visible.', 'divi-plus' ),
				),
				'closing_quote_icon_position_bottom' => array(
					'label'           => esc_html__( 'Quote Icon Position From Bottom', 'divi-plus' ),
					'type'            => 'range',
					'option_category' => 'font_option',
					'range_settings'  => array(
						'min'  => '0',
						'max'  => '100',
						'step' => '1',
					),
					'allowed_units'   => array( '%', 'px', ),
					'mobile_options'  => true,
					'show_if'         => array(
						'show_closing_quote_icon'            => 'on',
						'custom_position_closing_quote_icon' => 'on',
					),
					'default'         => '0',
					'default_unit'    => '%',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'quote_icon',
					'sub_toggle'      => 'quote_icon_closing',
					'description'     => esc_html__( 'Here you can choose the quote icon size from top.', 'divi-plus' ),
				),
				'closing_quote_icon_position' => array(
					'label'           => esc_html__( 'Quote Icon Position', 'divi-plus' ),
					'type'            => 'select',
					'option_category' => 'layout',
					'options'         => array(
						'left'   => esc_html__( 'Left', 'divi-plus' ),
						'center' => esc_html__( 'Center', 'divi-plus' ),
						'right'  => esc_html__( 'Right', 'divi-plus' ),
					),
					'show_if'         => array(
						'show_closing_quote_icon'            => 'on',
						'custom_position_closing_quote_icon' => 'on',
					),
					'default'         => 'right',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'quote_icon',
					'sub_toggle'      => 'quote_icon_closing',
					'description'     => esc_html__( 'cloing quote icon position', 'divi-plus' ),
				),
				'star_font_size' => array(
					'label'           => esc_html__( 'Star Font Size', 'divi-plus' ),
					'type'            => 'range',
					'option_category' => 'layout',
					'range_settings'  => array(
						'min'  => '10',
						'max'  => '100',
						'step' => '1',
					),
					'show_if'         => array(
						'show_rating' => 'on',
					),
					'default'         => '24px',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'rating',
					'description'     => esc_html__( 'Here you can choose the star font size.', 'divi-plus' ),
				),
				'filled_star_color' => array(
					'label'        => esc_html__( 'Filled Star Color', 'divi-plus' ),
					'type'         => 'color-alpha',
					'custom_color' => true,
					'show_if'      => array(
						'show_rating' => 'on',
					),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'rating',
					'description'  => esc_html__( 'Here you can define color for the rated star.', 'divi-plus' ),
				),
				'empty_star_color' => array(
					'label'        => esc_html__( 'Empty Star Color', 'divi-plus' ),
					'type'         => 'color-alpha',
					'custom_color' => true,
					'show_if'      => array(
						'show_rating' => 'on',
					),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'rating',
					'description'  => esc_html__( 'Here you can define color for the unrated star.', 'divi-plus' ),
				),
				'testimonial_card_custom_padding' => array(
	                'label'                 => esc_html__( 'Testimonial Padding', 'divi-plus' ),
	                'type'                  => 'custom_padding',
	                'option_category'       => 'layout',
	                'mobile_options'        => true,
	                'hover'                 => false,
	                'tab_slug'              => 'advanced',
	                'toggle_slug'           => 'margin_padding',
	                'description'           => esc_html__( 'Padding adds extra space to the inside of the element, increasing the distance between the edge of the element and its inner contents.', 'divi-plus' ),
	            ),
				'__testimonial_data'                 => array(
					'type'                => 'computed',
					'computed_callback'   => array( 'DIPL_TestimonialGrid', 'get_testimonial_data' ),
					'computed_depends_on' => array(
						'testimonial_layout',
						'testimonial_number',
						'testimonial_order',
						'testimonial_order_by',
						'include_categories',
						'number_of_columns',
						'use_masonry',
						'show_author_image',
						'use_gravatar',
						'show_author_designation',
						'show_author_company_name',
						'show_opening_quote_icon',
						'show_closing_quote_icon',
						'show_rating',
					),
				),
			),
			$this->generate_background_options( 'testimonial_card_bg', 'skip', 'general', 'background', 'testimonial_card_bg_color' )
		);
	}

	/**
	 * This function return values to react for front end builder.
	 *
	 * @param array arguments to get testimonial data
	 * @return array
	 * */
	public static function get_testimonial_data( $args = array(), $conditional_tags = array(), $current_page = array() ) {
		if ( self::$rendering ) {
			// We are trying to render a Blog module while a Blog module is already being rendered
			// which means we have most probably hit an infinite recursion. While not necessarily
			// the case, rendering a post which renders a Blog module which renders a post
			// which renders a Blog module is not a sensible use-case.
			return '';
		}

		$defaults = array(
			'testimonial_layout' => 'layout1',
			'testimonial_number' => '10',
			'testimonial_order' => 'DESC',
			'testimonial_order_by' => 'date',
			'include_categories' => '',
			'number_of_columns' => '2',
			'use_masonry' => 'off',
			'show_author_image' => 'on',
			'use_gravatar' => 'off',
			'show_author_designation' => 'on',
			'show_author_company_name' => 'on',
			'show_opening_quote_icon' => 'on',
			'show_closing_quote_icon' => 'off',
			'show_rating' => 'on',
		);

		$args = wp_parse_args( $args, $defaults );

		foreach ( $defaults as $key => $default ) {
			${$key} = sanitize_text_field( et_()->array_get( $args, $key, $default ) );
		}

		$testimonial_number = ( 0 === $testimonial_number ) ? -1 : (int) $testimonial_number;

		$args = array(
			'post_type'      => 'dipl-testimonial',
			'posts_per_page' => intval( $testimonial_number ),
			'post_status'    => 'publish',
			'orderby'        => $testimonial_order_by,
			'order'          => $testimonial_order,
		);

		if ( is_user_logged_in() ) {
			$args['post_status'] = array(
				'publish',
				'private',
			);
		}

		if ( $include_categories && '' !== $include_categories ) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'dipl-testimonial-category',
					'field'    => 'term_id',
					'terms'    => array_map( 'intval', explode( ',', $include_categories ) ),
					'operator' => 'IN',
				),
			);
		}

		$query = new WP_Query( $args );

		self::$rendering = true;

		if ( $query->have_posts() ) {

			$number_of_columns 	= intval( $number_of_columns );
			$column_class 		= " dipl_testimonial_cols_{$number_of_columns}";

			$testimonials = '<div class="dipl_testimonial_layout ' . $testimonial_layout . $column_class . '">';

			if ( 'on' === $use_masonry ) {
				$testimonials .= '<div class="dipl_testimonial_isotope_container">';
			}

			while ( $query->have_posts() ) {
				$query->the_post();
				$testimonial_id = intval( get_the_ID() );

				/* Get Star Rating */
				$rating = floatval( get_post_meta( $testimonial_id, 'dipl_testimonial_author_rating', true ) );
				if ( 'on' === $show_rating && $rating > 0 ) {
					$stars = '';
					
					for ( $i = 1; $i <= absint( $rating ); $i++ ) {
		                $stars .= '<span class="dipl_testimonial_star dipl_testimonial_filled_star"></span>';
		            }
		            if ( $rating != absint( $rating ) ) {
		                $stars .= '<span class="dipl_testimonial_star dipl_testimonial_half_filled_star"></span>';
		                $unfilled_stars  = 5 - absint( $rating ) - 1;
		            } else {
		                $unfilled_stars  = 5 - absint( $rating );
		            }
		            for ( $i = 1; $i <= $unfilled_stars; $i++ ) {
		                $stars .= '<span class="dipl_testimonial_star dipl_testimonial_empty_star"></span>';
		            }

					$testimonial_rating = sprintf(
						'<div class="dipl_testimonial_rating">
							<span itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
								<span class="dipl_testimonial_rating_value" itemprop="ratingValue">%1$s</span>
								%2$s
							</span>
						</div>',
						$rating,
						$stars
					);
				}

				/* Get Author Image */
				if ( 'on' === $show_author_image ) {
					if ( has_post_thumbnail( $testimonial_id ) ) {
						$image = get_the_post_thumbnail( $testimonial_id, 'thumbnail' );
					} else if ( 'on' === $use_gravatar ) {
						$author_email = sanitize_email( get_post_meta( $testimonial_id, 'dipl_testimonial_author_email', true ) );
						if ( '' !== $author_email ) {
							$image = get_avatar( $author_email, '100' );
							if ( ! $image ) {
								$image = '<img src="' . esc_url( plugins_url( 'assets/mystery-person.jpg', dirname( __DIR__ ) ) ) . '" class="dipl_testimonial_mystery_person" />';	
							}
						} else {
							$image = '<img src="' . esc_url( plugins_url( 'assets/mystery-person.jpg', dirname( __DIR__ ) ) ) . '" class="dipl_testimonial_mystery_person" />';
						}
					} else {
						$image = '<img src="' . esc_url( plugins_url( 'assets/mystery-person.jpg', dirname( __DIR__ ) ) ) . '" class="dipl_testimonial_mystery_person" />';
					}

					$author_image = sprintf(
						'<div class="dipl_testimonial_author_image">%1$s</div>',
						et_core_intentionally_unescaped( $image, 'html' )
					);
				}

				/* Get Author Name */
				$name = get_post_meta( $testimonial_id, 'dipl_testimonial_author_name', true );
				if ( '' !== $name ) {
					$author_name = sprintf(
						'<div class="dipl_testimonial_author_name">%1$s</div>',
						esc_html( $name )
					);
				} else {
					$author_name = '';
				}

				/* Get Author Designation */
				if ( 'on' === $show_author_designation ) {
					$desgination = get_post_meta( $testimonial_id, 'dipl_testimonial_author_designation', true );
					if ( '' !== $desgination ) {
						$author_designation = sprintf(
							'<div class="dipl_testimonial_author_designation">%1$s</div>',
							esc_html( $desgination )
						);
					} else {
						$author_designation = '';
					}
				}

				/* Get Company Details */
				if ( 'on' === $show_author_company_name ) {
					$company_name 	= get_post_meta( $testimonial_id, 'dipl_testimonial_author_company', true );
					$company_url  	= get_post_meta( $testimonial_id, 'dipl_testimonial_author_company_url', true );
					$author_company = '';
					if ( '' !== $company_url && '' !== $company_name ) {
						$author_company = sprintf(
							'<div class="dipl_testimonial_author_company">
								<a href="%1$s" target="_blank" rel="nofollow">%2$s</a>
							</div>',
							esc_url( $company_url ),
							esc_html( $company_name )
						);
					} elseif ( '' !== $company_name ) {
						$author_company = sprintf(
							'<div class="dipl_testimonial_author_company">
								%1$s
							</div>',
							esc_html( $company_name )
						);
					}
				}

				$testimonials .= '<div class="dipl_testimonial_isotope_item">';

				include plugin_dir_path( __FILE__ ) . 'layouts/' . sanitize_file_name( $testimonial_layout ) . '.php';

				$testimonials .= '</div>';
			}

			wp_reset_postdata();

			if ( 'on' === $use_masonry ) {
				$testimonials .= '</div>';
			}

			$testimonials .= '</div>';

			$output = $testimonials;

		} else {
			$output = '';
		}

		self::$rendering = false;

		return et_core_intentionally_unescaped( $output, 'html' );
	}

	public function render( $attrs, $content, $render_slug ) {

		if ( self::$rendering ) {
			// We are trying to render a Blog module while a Blog module is already being rendered
			// which means we have most probably hit an infinite recursion. While not necessarily
			// the case, rendering a post which renders a Blog module which renders a post
			// which renders a Blog module is not a sensible use-case.
			return '';
		}

		$testimonial_layout 				= $this->props['testimonial_layout'];
		$testimonial_number 				= $this->props['testimonial_number'];
		$testimonial_order 					= $this->props['testimonial_order'];
		$testimonial_order_by				= $this->props['testimonial_order_by'];
		$include_categories 				= $this->props['include_categories'];
		$no_result_text						= $this->props['no_result_text'];
		$number_of_columns 					= $this->props['number_of_columns'];
		$use_masonry						= $this->props['use_masonry'];
		$show_author_image					= $this->props['show_author_image'];
		$use_gravatar 						= $this->props['use_gravatar'];
		$show_author_designation			= $this->props['show_author_designation'];
		$show_author_company_name			= $this->props['show_author_company_name'];
		$testimonial_card_bg_color  		= $this->props['testimonial_card_bg_color'];
		$meta_separator_color 				= $this->props['meta_separator_color'];
		$show_opening_quote_icon 			= $this->props['show_opening_quote_icon'];
		$opening_quote_icon_size 			= $this->props['opening_quote_icon_size'];
		$opening_quote_icon_color 			= $this->props['opening_quote_icon_color'];
		$custom_position_opening_quote_icon = $this->props['custom_position_opening_quote_icon'];
		$opening_quote_icon_position 		= $this->props['opening_quote_icon_position'];
		$show_closing_quote_icon 			= $this->props['show_closing_quote_icon'];
		$closing_quote_icon_size 			= $this->props['closing_quote_icon_size'];
		$closing_quote_icon_color 			= $this->props['closing_quote_icon_color'];
		$custom_position_closing_quote_icon = $this->props['custom_position_closing_quote_icon'];
		$closing_quote_icon_position 		= $this->props['closing_quote_icon_position'];
		$show_rating						= $this->props['show_rating'];
		$star_font_size 					= $this->props['star_font_size'];
		$filled_star_color 					= $this->props['filled_star_color'];
		$empty_star_color 					= $this->props['empty_star_color'];

		$testimonial_number = ( 0 === $testimonial_number ) ? -1 : (int) $testimonial_number;
		wp_enqueue_script( 'dipl-testimonial-grid-custom', PLUGIN_PATH . 'includes/modules/TestimonialGrid/dipl-testimonial-grid-custom.min.js', array('jquery'), '1.0.0', true );
		$file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        wp_enqueue_style( 'dipl-testimonial-grid-style', PLUGIN_PATH . 'includes/modules/TestimonialGrid/' . $file . '.min.css', array(), '1.0.0' );

		$args = array(
			'post_type'      => 'dipl-testimonial',
			'posts_per_page' => intval( $testimonial_number ),
			'post_status'    => 'publish',
			'orderby'        => 'date',
			'order'          => 'DESC',
		);

		if ( is_user_logged_in() ) {
			$args['post_status'] = array(
				'publish',
				'private',
			);
		}

		if ( $include_categories && '' !== $include_categories ) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'dipl-testimonial-category',
					'field'    => 'term_id',
					'terms'    => array_map( 'intval', explode( ',', $include_categories ) ),
					'operator' => 'IN',
				),
			);
		}

		if ( '' !== $testimonial_order_by ) {
			$args['orderby'] = sanitize_text_field( $testimonial_order_by );
		}

		if ( '' !== $testimonial_order ) {
			$args['order'] = sanitize_text_field( $testimonial_order );
		}

		if ( '1' !== $number_of_columns && 'on' === $use_masonry ) {
			wp_enqueue_script( 'elicus-isotope-script' );
		}

		$query = new WP_Query( $args );

		self::$rendering = true;

		if ( $query->have_posts() ) {

			$number_of_columns 	= intval( $number_of_columns );
			$column_class 		= " dipl_testimonial_cols_{$number_of_columns}";

			$testimonials = '<div class="dipl_testimonial_layout ' . $testimonial_layout . $column_class . '">';

			if ( 'on' === $use_masonry ) {
				$testimonials .= '<div class="dipl_testimonial_isotope_container">';
			}

			while ( $query->have_posts() ) {
				$query->the_post();
				$testimonial_id = esc_attr( get_the_ID() );

				/*Get Star Rating*/
				$rating = floatval( get_post_meta( $testimonial_id, 'dipl_testimonial_author_rating', true ) );
				if ( 'on' === $show_rating && $rating > 0 ) {
					$stars = '';
					
					for ( $i = 1; $i <= absint( $rating ); $i++ ) {
		                $stars .= '<span class="dipl_testimonial_star dipl_testimonial_filled_star"></span>';
		            }
		            if ( $rating != absint( $rating ) ) {
		                $stars .= '<span class="dipl_testimonial_star dipl_testimonial_half_filled_star"></span>';
		                $unfilled_stars  = 5 - absint( $rating ) - 1;
		            } else {
		                $unfilled_stars  = 5 - absint( $rating );
		            }
		            for ( $i = 1; $i <= $unfilled_stars; $i++ ) {
		                $stars .= '<span class="dipl_testimonial_star dipl_testimonial_empty_star"></span>';
		            }

					$testimonial_rating = sprintf(
						'<div class="dipl_testimonial_rating">
							<span itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
								<span class="dipl_testimonial_rating_value" itemprop="ratingValue">%1$s</span>
								%2$s
							</span>
						</div>',
						$rating,
						$stars
					);
					
				}

				/* Get Author Image */
				if ( 'on' === $show_author_image ) {
					if ( has_post_thumbnail( $testimonial_id ) ) {
						$image = get_the_post_thumbnail( $testimonial_id, 'thumbnail' );
					} else if ( 'on' === $use_gravatar ) {
						$author_email = sanitize_email( get_post_meta( $testimonial_id, 'dipl_testimonial_author_email', true ) );
						if ( '' !== $author_email ) {
							$image = get_avatar( $author_email, '100' );
							if ( ! $image ) {
								$image = '<img src="' . esc_url( plugins_url( 'assets/mystery-person.jpg', dirname( __DIR__ ) ) ) . '" class="dipl_testimonial_mystery_person" />';	
							}
						} else {
							$image = '<img src="' . esc_url( plugins_url( 'assets/mystery-person.jpg', dirname( __DIR__ ) ) ) . '" class="dipl_testimonial_mystery_person" />';
						}
					} else {
						$image = '<img src="' . esc_url( plugins_url( 'assets/mystery-person.jpg', dirname( __DIR__ ) ) ) . '" class="dipl_testimonial_mystery_person" />';
					}

					$author_image = sprintf(
						'<div class="dipl_testimonial_author_image">%1$s</div>',
						et_core_intentionally_unescaped( $image, 'html' )
					);
				}

				//* Get Author Name */
				$name = get_post_meta( $testimonial_id, 'dipl_testimonial_author_name', true );
				if ( '' !== $name ) {
					$author_name = sprintf(
						'<div class="dipl_testimonial_author_name">%1$s</div>',
						esc_html( $name )
					);
				} else {
					$author_name = '';
				}

				/* Get Author Designation */
				if ( 'on' === $show_author_designation ) {
					$desgination = get_post_meta( $testimonial_id, 'dipl_testimonial_author_designation', true );
					if ( '' !== $desgination ) {
						$author_designation = sprintf(
							'<div class="dipl_testimonial_author_designation">%1$s</div>',
							esc_html( $desgination )
						);
					} else {
						$author_designation = '';
					}
				}

				/* Get Company Details */
				if ( 'on' === $show_author_company_name ) {
					$company_name 	= get_post_meta( $testimonial_id, 'dipl_testimonial_author_company', true );
					$company_url  	= get_post_meta( $testimonial_id, 'dipl_testimonial_author_company_url', true );
					$author_company = '';
					if ( '' !== $company_url && '' !== $company_name ) {
						$author_company = sprintf(
							'<div class="dipl_testimonial_author_company">
								<a href="%1$s" target="_blank" rel="nofollow">%2$s</a>
							</div>',
							esc_url( $company_url ),
							esc_html( $company_name )
						);
					} elseif ( '' !== $company_name ) {
						$author_company = sprintf(
							'<div class="dipl_testimonial_author_company">
								%1$s
							</div>',
							esc_html( $company_name )
						);
					}
				}

				$testimonials .= '<div class="dipl_testimonial_isotope_item">';

				include plugin_dir_path( __FILE__ ) . 'layouts/' . sanitize_file_name( $testimonial_layout ) . '.php';

				$testimonials .= '</div>';
			}

			wp_reset_postdata();

			if ( 'on' === $use_masonry ) {
				$testimonials .= '</div>';
			}

			$testimonials .= '</div>';

			$output = $testimonials;

			if ( 'layout1' === $testimonial_layout ) {
				if ( $meta_separator_color ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .layout1 .dipl_testimonial_meta',
							'declaration' => sprintf( 'border-top-color: %1$s;', esc_attr( $meta_separator_color ) ),
						)
					);
				}
			}

			if ( 'on' === $show_rating ) {
				if ( $filled_star_color ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_testimonial_rating .dipl_testimonial_filled_star, %%order_class%% .dipl_testimonial_rating .dipl_testimonial_half_filled_star',
							'declaration' => sprintf( 'color: %1$s;', esc_html( $filled_star_color ) ),
						)
					);
				}

				if ( $empty_star_color ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_testimonial_rating .dipl_testimonial_empty_star',
							'declaration' => sprintf( 'color: %1$s;', esc_html( $empty_star_color ) ),
						)
					);
				}

				$star_font_size = et_pb_responsive_options()->get_property_values( $this->props, 'star_font_size' );
				et_pb_responsive_options()->generate_responsive_css( $star_font_size, '%%order_class%% .dipl_testimonial_rating .dipl_testimonial_star', 'font-size', $render_slug, '', 'range' );
			}

			if ( 'on' === $show_opening_quote_icon ) {
				if ( $opening_quote_icon_color ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_testimonial_opening_quote_icon',
							'declaration' => sprintf( 'color: %1$s;', esc_attr( $opening_quote_icon_color ) ),
						)
					);
				}

				if ( 'on' === $custom_position_opening_quote_icon ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_testimonial_opening_quote_icon',
							'declaration' => 'position: absolute;',
						)
					);

					$opening_quote_icon_position_top = et_pb_responsive_options()->get_property_values( $this->props, 'opening_quote_icon_position_top' );

					if ( ! empty ( $opening_quote_icon_position_top ) ) {
						et_pb_responsive_options()->generate_responsive_css( $opening_quote_icon_position_top, '%%order_class%% .dipl_testimonial_opening_quote_icon', 'top', $render_slug, '', 'range' );
					}
					
					if ( 'left' === $opening_quote_icon_position ) {
						self::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% .dipl_testimonial_opening_quote_icon',
								'declaration' => 'left: 0;',
							)
						);
					}

					if ( 'right' === $opening_quote_icon_position ) {
						self::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% .dipl_testimonial_opening_quote_icon',
								'declaration' => 'right: 0;',
							)
						);
					}

					if ( 'center' === $opening_quote_icon_position ) {
						self::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% .dipl_testimonial_opening_quote_icon',
								'declaration' => 'left: 50%; -webkit-transform: translateX(-50%); transform: translateX(-50%);',
							)
						);
					}
				}

				$opening_quote_icon_size = et_pb_responsive_options()->get_property_values( $this->props, 'opening_quote_icon_size' );
				et_pb_responsive_options()->generate_responsive_css( $opening_quote_icon_size, '%%order_class%% .dipl_testimonial_opening_quote_icon', 'font-size', $render_slug, '', 'range' );
			}

			if ( 'on' === $show_closing_quote_icon ) {
				if ( $closing_quote_icon_color ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_testimonial_closing_quote_icon',
							'declaration' => sprintf( 'color: %1$s;', esc_attr( $closing_quote_icon_color ) ),
						)
					);
				}

				if ( 'on' === $custom_position_closing_quote_icon ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_testimonial_closing_quote_icon',
							'declaration' => 'position: absolute;',
						)
					);

					$closing_quote_icon_position_bottom = et_pb_responsive_options()->get_property_values( $this->props, 'closing_quote_icon_position_bottom' );

					if ( ! empty ( $closing_quote_icon_position_bottom ) ) {
						et_pb_responsive_options()->generate_responsive_css( $closing_quote_icon_position_bottom, '%%order_class%% .dipl_testimonial_closing_quote_icon', 'bottom', $render_slug, '', 'range' );
					}

					if ( 'left' === $closing_quote_icon_position ) {
						self::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% .dipl_testimonial_closing_quote_icon',
								'declaration' => 'left: 0;',
							)
						);
					}

					if ( 'right' === $closing_quote_icon_position ) {
						self::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% .dipl_testimonial_closing_quote_icon',
								'declaration' => 'right: 0;',
							)
						);
					}

					if ( 'center' === $closing_quote_icon_position ) {
						self::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% .dipl_testimonial_closing_quote_icon',
								'declaration' => 'left: 50%; -webkit-transform: translateX(-50%); transform: translateX(-50%);',
							)
						);
					}
				}

				$closing_quote_icon_size = et_pb_responsive_options()->get_property_values( $this->props, 'closing_quote_icon_size' );
				et_pb_responsive_options()->generate_responsive_css( $closing_quote_icon_size, '%%order_class%% .dipl_testimonial_closing_quote_icon', 'font-size', $render_slug, '', 'range' );
			}

			$options = array(
				'normal' => array(
					'testimonial_card_bg' => "{$this->main_css_element} .dipl_single_testimonial_card",
				),
			);

			$this->process_custom_background( $render_slug, $options );
			$this->process_advanced_margin_padding_css( $this, $render_slug, $this->margin_padding );

		} else {
			$output = '<div class="entry">' . esc_html( $no_result_text ) . '</div>';
		}

		$this->add_classname(
			array(
				$this->get_text_orientation_classname(),
			)
		);

		self::$rendering = false;

		return et_core_intentionally_unescaped( $output, 'html' );
	}

	public function process_advanced_margin_padding_css( $module, $function_name, $margin_padding ) {
		$utils           = ET_Core_Data_Utils::instance();
		$all_values      = $module->props;
		$advanced_fields = $module->advanced_fields;

		// Disable if module doesn't set advanced_fields property and has no VB support.
		if ( ! $module->has_vb_support() && ! $module->has_advanced_fields ) {
			return;
		}

		$allowed_advanced_fields = array( 'testimonial_margin_padding' );
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

	public function process_custom_background( $function_name, $options ) {

		$normal_fields = $options['normal'];

		foreach ( $normal_fields as $option_name => $element ) {

			$css_element           = $element;
			$css_element_processed = $element;

			if ( is_array( $element ) ) {
				$css_element_processed = implode( ', ', $element );
			}

			// Place to store processed background. It will be compared with the smaller device
			// background processed value to avoid rendering the same styles.
			$processed_background_color = '';
			$processed_background_image = '';
			$processed_background_blend = '';

			// Store background images status because the process is extensive.
			$background_image_status = array(
				'desktop' => false,
				'tablet'  => false,
				'phone'   => false,
			);

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
				if ( ! $is_desktop && ! et_pb_responsive_options()->is_responsive_enabled( $this->props, "{$option_name}_color" ) ) {
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

		if ( isset( $options['hover'] ) ) {
			$hover_fields = $options['hover'];
		} else {
			$hover_fields = $options['normal'];
			foreach ( $hover_fields as &$value ) {
				$value = $value . ':hover';
			}
		}

		foreach ( $hover_fields as $option_name => $element ) {

			$css_element           = $element;
			$css_element_processed = $element;

			if ( is_array( $element ) ) {
				$css_element_processed = implode( ', ', $element );
			}

			// Background Hover.
			if ( et_builder_is_hover_enabled( "{$option_name}_color", $this->props ) ) {

				$background_base_name    = $option_name;
				$background_prefix       = "{$option_name}_";
				$background_images_hover = array();
				$background_hover_style  = '';

				$has_background_color_gradient_hover         = false;
				$has_background_image_hover                  = false;
				$has_background_gradient_and_image_hover     = false;
				$is_background_color_gradient_hover_disabled = false;
				$is_background_image_hover_disabled          = false;

				$background_color_gradient_overlays_image_desktop = et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_overlays_image", 'off', true );

				$gradient_properties_desktop = array(
					'type'             => et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_type", '', true ),
					'direction'        => et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_direction", '', true ),
					'radial_direction' => et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_direction_radial", '', true ),
					'color_start'      => et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_start", '', true ),
					'color_end'        => et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_end", '', true ),
					'start_position'   => et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_start_position", '', true ),
					'end_position'     => et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_end_position", '', true ),
				);

				$background_color_gradient_overlays_image_hover = 'off';

				// Background Gradient Hover.
				// This part is little bit different compared to other hover implementation. In
				// this case, hover is enabled on the background field, not on the each of those
				// fields. So, built in function get_value() doesn't work in this case.
				// Temporarily, we need to fetch the the value from get_raw_value().
				$use_background_color_gradient_hover = et_pb_responsive_options()->get_inheritance_background_value( $this->props, "{$background_prefix}use_color_gradient", 'hover', $background_base_name, $this->fields_unprocessed );

				if ( 'on' === $use_background_color_gradient_hover ) {
					// Desktop value as default.
					$background_color_gradient_type_desktop             = ET_Builder_Element::$_->array_get( $gradient_properties_desktop, 'type', '' );
					$background_color_gradient_direction_desktop        = ET_Builder_Element::$_->array_get( $gradient_properties_desktop, 'direction', '' );
					$background_color_gradient_radial_direction_desktop = ET_Builder_Element::$_->array_get( $gradient_properties_desktop, 'radial_direction', '' );
					$background_color_gradient_color_start_desktop      = ET_Builder_Element::$_->array_get( $gradient_properties_desktop, 'color_start', '' );
					$background_color_gradient_color_end_desktop        = ET_Builder_Element::$_->array_get( $gradient_properties_desktop, 'color_end', '' );
					$background_color_gradient_start_position_desktop   = ET_Builder_Element::$_->array_get( $gradient_properties_desktop, 'start_position', '' );
					$background_color_gradient_end_position_desktop     = ET_Builder_Element::$_->array_get( $gradient_properties_desktop, 'end_position', '' );

					// Hover value.
					$background_color_gradient_type_hover             = et_pb_hover_options()->get_raw_value( "{$background_prefix}color_gradient_type", $this->props, $background_color_gradient_type_desktop );
					$background_color_gradient_direction_hover        = et_pb_hover_options()->get_raw_value( "{$background_prefix}color_gradient_direction", $this->props, $background_color_gradient_direction_desktop );
					$background_color_gradient_direction_radial_hover = et_pb_hover_options()->get_raw_value( "{$background_prefix}color_gradient_direction_radial", $this->props, $background_color_gradient_radial_direction_desktop );
					$background_color_gradient_start_hover            = et_pb_hover_options()->get_raw_value( "{$background_prefix}color_gradient_start", $this->props, $background_color_gradient_color_start_desktop );
					$background_color_gradient_end_hover              = et_pb_hover_options()->get_raw_value( "{$background_prefix}color_gradient_end", $this->props, $background_color_gradient_color_end_desktop );
					$background_color_gradient_start_position_hover   = et_pb_hover_options()->get_raw_value( "{$background_prefix}color_gradient_start_position", $this->props, $background_color_gradient_start_position_desktop );
					$background_color_gradient_end_position_hover     = et_pb_hover_options()->get_raw_value( "{$background_prefix}color_gradient_end_position", $this->props, $background_color_gradient_end_position_desktop );
					$background_color_gradient_overlays_image_hover   = et_pb_hover_options()->get_raw_value( "{$background_prefix}color_gradient_overlays_image", $this->props, $background_color_gradient_overlays_image_desktop );

					$has_background_color_gradient_hover = true;

					$gradient_values_hover = array(
						'type'             => '' !== $background_color_gradient_type_hover ? $background_color_gradient_type_hover : $background_color_gradient_type_desktop,
						'direction'        => '' !== $background_color_gradient_direction_hover ? $background_color_gradient_direction_hover : $background_color_gradient_direction_desktop,
						'radial_direction' => '' !== $background_color_gradient_direction_radial_hover ? $background_color_gradient_direction_radial_hover : $background_color_gradient_radial_direction_desktop,
						'color_start'      => '' !== $background_color_gradient_start_hover ? $background_color_gradient_start_hover : $background_color_gradient_color_start_desktop,
						'color_end'        => '' !== $background_color_gradient_end_hover ? $background_color_gradient_end_hover : $background_color_gradient_color_end_desktop,
						'start_position'   => '' !== $background_color_gradient_start_position_hover ? $background_color_gradient_start_position_hover : $background_color_gradient_start_position_desktop,
						'end_position'     => '' !== $background_color_gradient_end_position_hover ? $background_color_gradient_end_position_hover : $background_color_gradient_end_position_desktop,
					);

					$background_images_hover[] = $this->get_gradient( $gradient_values_hover );
				} elseif ( 'off' === $use_background_color_gradient_hover ) {
					$is_background_color_gradient_hover_disabled = true;
				}

				// Background Image Hover.
				// This part is little bit different compared to other hover implementation. In
				// this case, hover is enabled on the background field, not on the each of those
				// fields. So, built in function get_value() doesn't work in this case.
				// Temporarily, we need to fetch the the value from get_raw_value().
				$background_image_hover = et_pb_responsive_options()->get_inheritance_background_value( $this->props, "{$background_prefix}image", 'hover', $background_base_name, $this->fields_unprocessed );
				$parallax_hover         = et_pb_hover_options()->get_raw_value( "{$background_prefix}parallax", $this->props );

				if ( '' !== $background_image_hover && null !== $background_image_hover && 'on' !== $parallax_hover ) {
					// Flag to inform BG Color if current module has Image.
					$has_background_image_hover = true;

					// Size.
					$background_size_hover   = et_pb_hover_options()->get_raw_value( "{$background_prefix}size", $this->props );
					$background_size_desktop = ET_Builder_Element::$_->array_get( $this->props, "{$background_prefix}size", '' );
					$is_same_background_size = $background_size_hover === $background_size_desktop;
					if ( empty( $background_size_hover ) && ! empty( $background_size_desktop ) ) {
						$background_size_hover = $background_size_desktop;
					}

					if ( ! empty( $background_size_hover ) && ! $is_same_background_size ) {
						$background_hover_style .= sprintf(
							'background-size: %1$s; ',
							esc_html( $background_size_hover )
						);
					}

					// Position.
					$background_position_hover   = et_pb_hover_options()->get_raw_value( "{$background_prefix}position", $this->props );
					$background_position_desktop = ET_Builder_Element::$_->array_get( $this->props, "{$background_prefix}position", '' );
					$is_same_background_position = $background_position_hover === $background_position_desktop;
					if ( empty( $background_position_hover ) && ! empty( $background_position_desktop ) ) {
						$background_position_hover = $background_position_desktop;
					}

					if ( ! empty( $background_position_hover ) && ! $is_same_background_position ) {
						$background_hover_style .= sprintf(
							'background-position: %1$s; ',
							esc_html( str_replace( '_', ' ', $background_position_hover ) )
						);
					}

					// Repeat.
					$background_repeat_hover   = et_pb_hover_options()->get_raw_value( "{$background_prefix}repeat", $this->props );
					$background_repeat_desktop = ET_Builder_Element::$_->array_get( $this->props, "{$background_prefix}repeat", '' );
					$is_same_background_repeat = $background_repeat_hover === $background_repeat_desktop;
					if ( empty( $background_repeat_hover ) && ! empty( $background_repeat_desktop ) ) {
						$background_repeat_hover = $background_repeat_desktop;
					}

					if ( ! empty( $background_repeat_hover ) && ! $is_same_background_repeat ) {
						$background_hover_style .= sprintf(
							'background-repeat: %1$s; ',
							esc_html( $background_repeat_hover )
						);
					}

					// Blend.
					$background_blend_hover   = et_pb_hover_options()->get_raw_value( "{$background_prefix}blend", $this->props );
					$background_blend_default = ET_Builder_Element::$_->array_get( $this->fields_unprocessed, "{$background_prefix}blend.default", '' );
					$background_blend_desktop = ET_Builder_Element::$_->array_get( $this->props, "{$background_prefix}blend", '' );
					$is_same_background_blend = $background_blend_hover === $background_blend_desktop;
					if ( empty( $background_blend_hover ) && ! empty( $background_blend_desktop ) ) {
						$background_blend_hover = $background_blend_desktop;
					}

					if ( ! empty( $background_blend_hover ) ) {
						if ( ! $is_same_background_blend ) {
							$background_hover_style .= sprintf(
								'background-blend-mode: %1$s; ',
								esc_html( $background_blend_hover )
							);
						}

						// Force background-color: initial.
						if ( $has_background_color_gradient_hover && $has_background_image_hover && $background_blend_hover !== $background_blend_default ) {
							$has_background_gradient_and_image_hover = true;
							$background_hover_style                 .= 'background-color: initial !important;';
						}
					}

					// Only append background image when the image exists.
					$background_images_hover[] = sprintf( 'url(%1$s)', esc_html( $background_image_hover ) );
				} elseif ( '' === $background_image_hover ) {
					$is_background_image_hover_disabled = true;
				}

				if ( ! empty( $background_images_hover ) ) {
					// The browsers stack the images in the opposite order to what you'd expect.
					if ( 'on' !== $background_color_gradient_overlays_image_hover ) {
						$background_images_hover = array_reverse( $background_images_hover );
					}

					$background_hover_style .= sprintf(
						'background-image: %1$s !important;',
						esc_html( join( ', ', $background_images_hover ) )
					);
				} elseif ( $is_background_color_gradient_hover_disabled && $is_background_image_hover_disabled ) {
					$background_hover_style .= 'background-image: initial !important;';
				}

				// Background Color Hover.
				if ( ! $has_background_gradient_and_image_hover ) {
					$background_color_hover = et_pb_responsive_options()->get_inheritance_background_value( $this->props, "{$background_prefix}color", 'hover', $background_base_name, $this->fields_unprocessed );
					$background_color_hover = '' !== $background_color_hover ? $background_color_hover : 'transparent';

					if ( '' !== $background_color_hover ) {
						$background_hover_style .= sprintf(
							'background-color: %1$s !important; ',
							esc_html( $background_color_hover )
						);
					}
				}

				// Print background hover gradient and image styles.
				if ( '' !== $background_hover_style ) {
					$background_hover_style_attrs = array(
						'selector'    => $css_element_processed,
						'declaration' => rtrim( $background_hover_style ),
						'priority'    => $this->_style_priority,
					);

					ET_Builder_Element::set_style( $function_name, $background_hover_style_attrs );
				}
			}
		}
	}
}
$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
	$modules = explode( ',', $plugin_options['dipl-modules'] );
	if ( in_array( 'dipl_testimonial_grid', $modules, true ) ) {
		new DIPL_TestimonialGrid();
	}
} else {
	new DIPL_TestimonialGrid();
}