<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.4
 */
class DIPL_TabsItem extends ET_Builder_Module {

	public $slug           = 'dipl_tabs_item';
    public $type           = 'child';
    public $vb_support     = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name 						= esc_html__( 'DP Tabs Item', 'divi-plus' );
		$this->advanced_setting_title_text  = esc_html__( 'Tabs Item', 'divi-plus' );
        $this->child_title_var              = 'title';
		$this->main_css_element 			= '%%order_class%%';
	}
	
	public function get_settings_modal_toggles() {
		return array(
			'general'    => array(
				'toggles' => array(
					'main_content'   => array(
						'title'    => esc_html__( 'Tab Content', 'divi-plus' ),
						'priority' => 1,
					),
					'button'   => array(
						'title'    => esc_html__( 'Button', 'divi-plus' ),
						'priority' => 2,
					),
				),
			),
			'advanced'   => array(
				'toggles' => array(
					'icon_setting'   => array(
						'title'    => esc_html__( 'Icon/Image', 'divi-plus' ),
						'priority' => 1,
					),
					'tab_alignment'   => array(
						'title'    => esc_html__( 'Alignment', 'divi-plus' ),
						'priority' => 2,
					),
					'button'   => array(
						'title'    => esc_html__( 'Button', 'divi-plus' ),
						'priority' => 3,
					),
					'title_settings'   => array(
						'title'    => esc_html__( 'Tab Title', 'divi-plus' ),
						'priority' => 4,
						'tabbed_subtoggles' => true,
						'sub_toggles'       => array(
							'title' => array(
								'name' => 'Title',
							),
							'active_title' => array(
								'name' => 'Active Title',
							),
						),
					),
					'body'           => array(
						'title'             => esc_html__( 'Body', 'divi-plus' ),
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
				),
			),
		);
	}
	
	public function get_advanced_fields_config() {
		return array(
			'fonts'          => array(
				'title'  => array(
					'label'           => esc_html__( 'Tab', 'divi-plus' ),
					'options_priority' => array(
						'title_text_color' => 2,
					),
					'font_size'      => array(
						'default' => '18px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit' => true,
					),
					'line_height'     => array(
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
						'validate_unit' => true,
					),
					'css'             => array(
						'main'      => "{$this->main_css_element}_title .dipl_tab_title",
						'hover'     => "{$this->main_css_element}_title:hover .dipl_tab_title",
						'important' => 'all',
					),
					'hide_text_align' => true,
					'tab_slug'       => 'advanced',
                    'toggle_slug'    => 'title_settings',
					'sub_toggle'     => 'title',
				),
				'active_title'  => array(
					'label'           => esc_html__( 'Active Tab', 'divi-plus' ),
					'options_priority' => array(
						'active_title_text_color' => 2,
					),
					'font_size'      => array(
						'default' => '18px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit' => true,
					),
					'line_height'     => array(
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
						'validate_unit' => true,
					),
					'css'             => array(
						'main'      => "{$this->main_css_element}_title.dipl_active_tab .dipl_tab_title",
						'hover'     => "{$this->main_css_element}_title.dipl_active_tab:hover .dipl_tab_title",
						'important' => 'all',
					),
					'hide_text_align' => true,
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'title_settings',
					'sub_toggle'     => 'active_title',
				),
				'body_text'       => array(
					'label'          => esc_html__( 'Body', 'divi-plus' ),
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
						'main' => "{$this->main_css_element} .dipl_tab_desc, {$this->main_css_element} .dipl_tab_desc p",
						'important' => 'all',
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'body',
					'sub_toggle'     => 'p',
				),
				'body_text_link'  => array(
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
						'main' => "{$this->main_css_element} .dipl_tab_desc a",
						'important' => 'all',
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'body',
					'sub_toggle'     => 'a',
				),
				'body_text_ul'    => array(
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
						'main' => "{$this->main_css_element} .dipl_tab_desc ul li",
						'important' => 'all',
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'body',
					'sub_toggle'     => 'ul',
				),
				'body_text_ol'    => array(
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
						'main' => "{$this->main_css_element} .dipl_tab_desc ol li",
						'important' => 'all',
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'body',
					'sub_toggle'     => 'ol',
				),
				'body_text_quote' => array(
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
						'main' => "{$this->main_css_element} .dipl_tab_desc blockquote",
						'important' => 'all',
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'body',
					'sub_toggle'     => 'quote',
				),
			),		
			'button' => array(
			    'button' => array(
				    'label' => esc_html__( 'Button', 'divi-plus' ),
				    'css' => array(
						'main'      => "{$this->main_css_element} .et_pb_button",
						'alignment' => "{$this->main_css_element} .et_pb_button_wrapper",
						'important' => 'all',
					),
					'margin_padding'  => array(
						'css' => array(
							'margin'    => "{$this->main_css_element} .et_pb_button_wrapper",
							'padding'   => "{$this->main_css_element} .et_pb_button",
							'important' => 'all',
						),
					),
					'box_shadow'      	=> false,
					'use_alignment'   	=> true,
				    'depends_on'        => array( 'show_button' ),
		            'depends_show_if'   => 'on',
				    'tab_slug'          => 'advanced',
				    'toggle_slug'       => 'button',
			    ),
			),			
			'tab_margin_padding' => array( 
                'tab' => array(
                    'margin_padding' => array(
                        'css' => array(
							'margin'    => "{$this->main_css_element}_title",
							'padding'   => "{$this->main_css_element}_title .dipl_tabs_item_title_inner_wrap",
							'important' => 'all',
                        ),
                    ),
                ),
            ),
            'margin_padding' => array(
                'css' => array(
                    'margin'    => "{$this->main_css_element} .dipl_single_tab_content",
					'padding'    => "{$this->main_css_element} .dipl_single_tab_content",
                    'important' => 'all',
                ),
            ),
			'max_width' => array(
				'css' => array(
					'main'             => "{$this->main_css_element}",
					'module_alignment' => "{$this->main_css_element}",
				),
			),
			'borders' => array(
				'tab' => array(
					'label_prefix' => 'Title',
					'css'          => array(
						'main' => array(
							'border_radii'  => "{$this->main_css_element}_title",
							'border_styles' => "{$this->main_css_element}_title",
						),
						'important' => 'all',
					),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'border',
				),
				'default' => array(
					'css' => array(
						'main' => array(
							'border_radii'  => "{$this->main_css_element}",
							'border_styles' => "{$this->main_css_element}",
						),
					),
				),
			),
			'box_shadow'           => array(
				'tab' => array(
					'label'       => esc_html__( 'Title Box Shadow', 'divi-plus' ),
					'css'         => array(
						'main' => "{$this->main_css_element}_title",
						'important' => 'all',
					),
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'box_shadow',
				),
				'default' => array(
					'css' => array(
						'main'    => "{$this->main_css_element}",
					),
				),
			),
			'text' 			=> false,
			'text_shadow' 	=> false,
			'link_options'  => false,
			'background' 	=> array(
				'use_background_video' => false,
			),
		);
	}

	public function get_fields() {
		
		$et_accent_color = et_builder_accent_color();
		$args = array( 
					'post_type' => 'et_pb_layout',
    				'post_status' => 'publish', 
    				'posts_per_page' => -1
    			);
				
		$layouts    = array();
		$layouts[0] = esc_html__( 'Select Layout', 'divi-plus' );
		
		$query = new WP_Query($args);

		while ($query->have_posts()) {
		    $query->the_post();
		    
		    $post_id = get_the_ID();
		    $post_title = get_the_title();
		    $layouts[$post_id] = $post_title;
		}
		wp_reset_postdata();

		$fields = array(
			'content_type' => array(
                'label'                 => esc_html__( 'Content Type', 'divi-plus' ),
                'type'                  => 'select',
                'option_category'       => 'basic_option',
                'options'               => array(
                    'dipl_content_text'   		=> esc_html__( 'Text', 'divi-plus' ),
                    'dipl_content_layout'       => esc_html__( 'Layout', 'divi-plus' ),
                ),
                'default'               => 'dipl_content_text',
                'tab_slug'              => 'general',
                'toggle_slug'           => 'main_content',
                'description'           => esc_html__( 'Here you can choose the Content type.', 'divi-plus' ),
            ),	
			'select_content_layout' => array(
                'label'                 => esc_html__( 'Select Layout', 'divi-plus' ),
                'type'                  => 'select',
                'option_category'       => 'basic_option',
                'options'               => $layouts,
                'show_if'           => array(
					'content_type' => 'dipl_content_layout',
				),
                'default'               => '0',
                'tab_slug'              => 'general',
                'toggle_slug'           => 'main_content',
                'description'           => esc_html__( 'Here you can choose the layout saved in your Divi library to be used for the Content.', 'divi-plus' ),
            ),
			'title_type' => array(
				'label'           => esc_html__( 'Title Type', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'basic_option',
				'options'         => array(
					'text'  => esc_html__( 'Text', 'divi-plus' ),
					'text_icon'  => esc_html__( 'Text with Icon', 'divi-plus' ),
					'text_image' => esc_html__( 'Text with Image', 'divi-plus' ),
					'icon' 		 => esc_html__( 'Only Icon', 'divi-plus' ),
					'image' 	 => esc_html__( 'Only Image', 'divi-plus' ),
				),
				'default'         => 'text',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Choose the Title type to be used for the tabs.', 'divi-plus' ),
			),
			'title'               => array(
				'label'            => esc_html__( 'Title', 'divi-plus' ),
				'type'             => 'text',
				'option_category'  => 'basic_option',
				'show_if'           => array(
					'title_type' => array( 'text', 'text_icon', 'text_image' ),
				),
				'mobile_options'  => true,
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Here you can input the text to be used for the title.', 'divi-plus' ),
			),
			'tab_image'                  => array(
				'label'              => esc_html__( 'Image', 'divi-plus' ),
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'upload_button_text' => esc_attr__( 'Upload an image', 'divi-plus' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'divi-plus' ),
				'update_text'        => esc_attr__( 'Set As Image', 'divi-plus' ),
				'show_if'           => array(
					'title_type' => array( 'text_image', 'image' ),
				),
				'default'			 => 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTA4MCIgaGVpZ2h0PSI1NDAiIHZpZXdCb3g9IjAgMCAxMDgwIDU0MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICAgIDxnIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+CiAgICAgICAgPHBhdGggZmlsbD0iI0VCRUJFQiIgZD0iTTAgMGgxMDgwdjU0MEgweiIvPgogICAgICAgIDxwYXRoIGQ9Ik00NDUuNjQ5IDU0MGgtOTguOTk1TDE0NC42NDkgMzM3Ljk5NSAwIDQ4Mi42NDR2LTk4Ljk5NWwxMTYuMzY1LTExNi4zNjVjMTUuNjItMTUuNjIgNDAuOTQ3LTE1LjYyIDU2LjU2OCAwTDQ0NS42NSA1NDB6IiBmaWxsLW9wYWNpdHk9Ii4xIiBmaWxsPSIjMDAwIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz4KICAgICAgICA8Y2lyY2xlIGZpbGwtb3BhY2l0eT0iLjA1IiBmaWxsPSIjMDAwIiBjeD0iMzMxIiBjeT0iMTQ4IiByPSI3MCIvPgogICAgICAgIDxwYXRoIGQ9Ik0xMDgwIDM3OXYxMTMuMTM3TDcyOC4xNjIgMTQwLjMgMzI4LjQ2MiA1NDBIMjE1LjMyNEw2OTkuODc4IDU1LjQ0NmMxNS42Mi0xNS42MiA0MC45NDgtMTUuNjIgNTYuNTY4IDBMMTA4MCAzNzl6IiBmaWxsLW9wYWNpdHk9Ii4yIiBmaWxsPSIjMDAwIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz4KICAgIDwvZz4KPC9zdmc+Cg==',
				'tab_slug'           => 'general',
				'toggle_slug'        => 'main_content',
				'description'        => esc_html__( 'Here you can upload an image you would like to display.', 'divi-plus' ),
			),
			'icon' => array(
				'label'           => esc_html__( 'Icon', 'divi-plus' ),
				'type'            => 'select_icon',
				'option_category' => 'basic_option',
				'class'           => array( 'et-pb-font-icon' ),
				'show_if'          => array(
					'title_type' => array( 'text_icon', 'icon' ),
				),
				'default'		  => ET_BUILDER_PRODUCT_VERSION < '4.13.0' ? '%%34%%' : '&#x43;||divi||400',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can choose an icon to display.', 'divi-plus' ),
			),
			'content' => array(
				'label'           => esc_html__( 'Description', 'divi-plus' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'show_if_not'           => array(
					'content_type' => 'dipl_content_layout',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can define the content.', 'divi-plus' ),
			),
			'show_button' => array(
				'label'     		=> esc_html__( 'Show Button', 'divi-plus' ),
				'type'              => 'yes_no_button',
				'option_category'   => 'basic_option',
				'options'           => array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'affects' 			=> array(
					'custom_button',
				),
				'show_if'           => array(
					'content_type' => 'dipl_content_text',
				),				
				'default'           => 'off',
				'tab_slug'          => 'general',
				'toggle_slug'       => 'button',
				'description'       => esc_html__( 'Here you can choose whether or not use the button.', 'divi-plus' ),
			),
			'button_text' => array(
				'label'    			=> esc_html__( 'Button Text', 'divi-plus' ),
				'type'              => 'text',
				'option_category'   => 'basic_option',
				'show_if'           => array(
				    'show_button' => 'on',
				    'content_type' => 'dipl_content_text',
				),
				'default'			=> esc_html__( 'Learn More', 'divi-plus' ),
				'default_on_front'	=> esc_html__( 'Learn More', 'divi-plus' ),
				'tab_slug'          => 'general',
				'toggle_slug'       => 'button',
				'description'       => esc_html__( 'Here you can input the text to be used for the Read More Button.', 'divi-plus' ),
			),
			'button_url' => array(
				'label'           	=> esc_html__( 'Button Link URL', 'divi-plus' ),
				'type'            	=> 'text',
				'option_category' 	=> 'basic_option',
				'show_if'           => array(
				    'show_button' => 'on',
				    'content_type' => 'dipl_content_text',
				),
				'default'			=> '#',
				'tab_slug'          => 'general',
				'toggle_slug'     	=> 'button',
				'description'     	=> esc_html__( 'Here you can input the destination URL for the button to open when clicked.', 'divi-plus' ),
			),
			'button_url_new_window' => array(
				'label'            	=> esc_html__( 'Button Link Target', 'divi-plus' ),
				'type'             	=> 'select',
				'option_category'  	=> 'basic_option',
				'options'          	=>  array(
					'off' => esc_html__( 'In The Same Window', 'divi-plus' ),
					'on'  => esc_html__( 'In The New Tab', 'divi-plus' ),
				),
				'show_if'           => array(
				    'show_button' => 'on',
				    'content_type' => 'dipl_content_text',
				),
				'tab_slug'          => 'general',
				'toggle_slug'      	=> 'button',
				'description'      	=> esc_html__( 'Here you can choose whether or not your link opens in a new window', 'divi-plus' ),
			),
			'icon_color'              => array(
				'label'           => esc_html__( 'Icon Color', 'divi-plus' ),
				'type'            => 'color-alpha',
				'custom_color'    => true,
				'show_if'          => array(
					'title_type' => array( 'text_icon', 'icon' ),
				),
				'hover'           => 'tabs',
				'mobile_options'  => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'icon_setting',
				'description'     => esc_html__( 'Here you can define a color for the icon.', 'divi-plus' ),
			),
			'active_tab_icon_color'     => array(
				'label'          => esc_html__( 'Active Tab Icon Color', 'divi-plus' ),
				'type'           => 'color-alpha',
				'custom_color'   => true,
				'show_if'          => array(
					'title_type' => array( 'text_icon', 'icon' ),
				),
				'hover'          => 'tabs',
				'mobile_options' => true,
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'icon_setting',
				'description'    => esc_html__( 'Pick a color to use for tab icon within active tabs. You can assign a unique color to active tab icon to differentiate them from inactive tab icons.', 'divi-plus' ),
			),
			'icon_font_size'                  => array(		
				'label'            => esc_html__( 'Icon Font Size', 'divi-plus' ),
				'type'             => 'range',
				'option_category'  => 'font_option',
				'range_settings'   => array(
					'min'  => '1',
					'max'  => '120',
					'step' => '1',
				),
				'show_if'          => array(
					'title_type' => array( 'text_icon', 'icon' ),
				),
				'mobile_options'   => true,
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'icon_setting',
				'description'      => esc_html__( 'Control the size of the icon by increasing or decreasing the font size.', 'divi-plus' ),
			),
			'active_tab_background_color'   => array(
				'label'          => esc_html__( 'Active Tab Background Color', 'divi-plus' ),
				'type'           => 'color-alpha',
				'custom_color'   => true,
				'hover'          => 'tabs',
				'mobile_options' => true,
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'title_settings',
				'sub_toggle'     => 'active_title',
				'priority' 		 => 1,
				'description'    => esc_html__( 'Pick a color to be used for active tab backgrounds. You can assign a unique color to active tabs to differentiate them from inactive tabs.', 'divi-plus' ),
			),
			'tab_background_color' => array(
				'label'          => esc_html__( 'Tab Background Color', 'divi-plus' ),
				'type'           => 'color-alpha',
				'custom_color'   => true,
				'hover'          => 'tabs',
				'mobile_options' => true,
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'title_settings',
				'sub_toggle'     => 'title',
				'priority' 		 => 1,
				'description'    => esc_html__( 'Pick a color to be used for inactive tab backgrounds. You can assign a unique color to inactive tabs to differentiate them from active tabs.', 'divi-plus' ),
			),
			'image_width'     => array(
				'label'            => esc_html__( 'Image Width', 'divi-plus' ),
				'type'             => 'range',
				'option_category'  => 'layout',
				'range_settings'   => array(
					'min'  => '32',
					'max'  => '500',
					'step' => '1',
				),
				'mobile_options'   => true,
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'width',
				'description'      => esc_html__( 'Adjust the width of the image in the tab titles.', 'divi-plus' ),
			),
			'tab_custom_padding' => array(
				'label'                 => esc_html__( 'Title Padding', 'divi-plus' ),
				'type'                  => 'custom_padding',
				'option_category'       => 'layout',
				'mobile_options'        => true,
				'default'          		=> '10px|10px|10px|10px|true|true',
				'default_on_front' 		=> '10px|10px|10px|10px|true|true',
				'hover'                 => false,
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'margin_padding',
				'description'           => esc_html__( 'Padding adds extra space to the inside of the element, increasing the distance between the edge of the element and its inner contents.', 'divi-plus' ),
			),
			'tab_custom_margin' => array(
				'label'                 => esc_html__( 'Title Margin', 'divi-plus' ),
				'type'                  => 'custom_margin',
				'option_category'       => 'layout',
				'mobile_options'        => true,
				'hover'                 => false,
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'margin_padding',
				'description'           => esc_html__( 'Margin adds extra space to the outside of the element, increasing the distance between the element and other items on the page.', 'divi-plus' ),
			),
			'__content_layout'         => array(
				'type'                => 'computed',
				'computed_callback'   => array( 'DIPL_TabsItem', 'dipl_content_layout' ),
				'computed_depends_on' => array(
					'content_type',
					'select_content_layout'
				),
			),
		);
		return $fields;
	}
	
	public static function dipl_content_layout( $args = array() ) {
		$defaults = array(
			'content_type' => '',
			'select_content_layout' => '',
		);

		$args = wp_parse_args( $args, $defaults );

		$content_type 	= esc_attr( $args['content_type'] );
		$select_content_layout  = intval( esc_attr( $args['select_content_layout'] ) );

		if( 'dipl_content_layout' === $content_type && '' !== $select_content_layout && 0 !== $select_content_layout ) {
			$output = do_shortcode( get_the_content( null, false, $select_content_layout ) );
			$style  =  ET_Builder_Element::get_style();
    		$output .= '<style type="text/css" class="dipl_tabs_layout_styles">' . $style . ' </style>';
		} else {
			$output = '';
		}
		
		return $output;
	}
	

	public function render( $attrs, $content, $render_slug ) {
		global $dipl_tabs_item_titles, $dipl_tabs_item_order_class, $dipl_tabs_item_icon_alignment;

		$multi_view                 	= et_pb_multi_view_options( $this );
		$select_content_layout 			= (int)$this->props['select_content_layout'];
		$content_type 					= esc_attr( $this->props['content_type'] );
		$title_type 					= esc_attr( $this->props['title_type'] );
		$title                			= esc_attr( $this->props['title'] );
		$image           				= esc_attr( $this->props['tab_image'] );
		$icon                   		= esc_attr( $this->props['icon'] );
		$show_button        			= esc_attr( $this->props['show_button'] );		
		$button_text        			= esc_attr( $this->props['button_text'] );
		$button_url             		= esc_attr( $this->props['button_url'] );
		$button_url_new_window  		= esc_attr( $this->props['button_url_new_window'] );
		$active_tab_background_color	= esc_attr( $this->props['active_tab_background_color'] );
		$tab_background_color			= esc_attr( $this->props['tab_background_color'] );
		$image_width            		= esc_attr( $this->props['image_width'] );

		//Icon
		if ( 'icon' === $title_type || 'text_icon' === $title_type ) {
			if ( '' !== $icon ) {				
				$this->generate_styles(
					array(
						'base_attr_name' => 'icon_color',
						'selector'       => "{$this->main_css_element}_title .dipl_tabs_item_title_inner_wrap .dipl_tab_icon",
						'hover_selector' => "{$this->main_css_element}_title:hover .dipl_tabs_item_title_inner_wrap .dipl_tab_icon",
						'css_property'   => 'color',
						'important'	     => true,
						'priority'		 => 999,
						'render_slug'    => $render_slug,
						'type'           => 'color',
					)
				);

				$this->generate_styles(
					array(
						'base_attr_name' => 'active_tab_icon_color',
						'selector'       => "{$this->main_css_element}_title.dipl_active_tab .dipl_tabs_item_title_inner_wrap .dipl_tab_icon",
						'hover_selector' => "{$this->main_css_element}_title.dipl_active_tab:hover .dipl_tabs_item_title_inner_wrap .dipl_tab_icon",
						'css_property'   => 'color',
						'priority'		 => 1000,
						'render_slug'    => $render_slug,
						'type'           => 'color',
						'important'      => true,
					)
				);

				$this->generate_styles(
					array(
						'base_attr_name' => 'icon_font_size',
						'selector'       => "{$this->main_css_element}_title .dipl_tabs_item_title_inner_wrap .dipl_tab_icon",
						'css_property'   => 'font-size',
						'important'	     => true,
						'priority'		 => 999,
						'render_slug'    => $render_slug,
						'type'           => 'range',
					)
				);

				if ( class_exists( 'ET_Builder_Module_Helper_Style_Processor' ) && method_exists( 'ET_Builder_Module_Helper_Style_Processor', 'process_extended_icon' ) ) {
	                $this->generate_styles(
	                    array(
	                        'utility_arg'    => 'icon_font_family',
	                        'render_slug'    => $render_slug,
	                        'base_attr_name' => 'icon',
	                        'important'      => true,
	                        'selector'       => "{$this->main_css_element}_title .dipl_tabs_item_title_inner_wrap .dipl_tab_icon",
	                        'processor'      => array(
	                            'ET_Builder_Module_Helper_Style_Processor',
	                            'process_extended_icon',
	                        ),
	                    )
	                );
	            }
			}
		}
		
		//Description
		$content = $multi_view->render_element(
			array(
				'tag'     => 'div',
				'content' => '{{content}}',
				'required' => 'content',
			)
		);
		
		//Image Max Width
		if ( '' !== $image_width ) {
			$this->generate_styles(
				array(
					'base_attr_name' => 'image_width',
					'selector'       => "{$this->main_css_element}_title img",
					'css_property'   => 'width',
					'important'		 => true,
					'render_slug'    => $render_slug,
					'type'           => 'range',
				)
			);
		}
		
		//Button
		$button = $this->render_button(
			array(
				'display_button'      => ( '' !== $this->props['button_url'] && 'off' !== $this->props['show_button'] ) ? true : false,
				'button_custom'       => isset( $this->props['custom_button'] ) ? esc_attr( $this->props['custom_button'] ) : 'off',
				'button_rel'          => isset( $this->props['button_rel'] ) ? esc_attr( $this->props['button_rel'] ) : '',
				'button_text'         => $button_text,
				'button_text_escaped' => true,
				'button_url'          => esc_url( $this->props['button_url'] ),
				'custom_icon'         => isset( $this->props['button_icon'] ) ? $this->props['button_icon'] : '',
				'has_wrapper'         => true,
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
		
		// Inactive Tab Background Color
		if ( '' !== $tab_background_color ) {
			$this->generate_styles(
				array(
					'base_attr_name' => 'tab_background_color',
					'selector'       => "{$this->main_css_element}_title:not(.dipl_active_tab) .dipl_tabs_item_title_inner_wrap",
					'hover_selector' => "{$this->main_css_element}_title:not(.dipl_active_tab):hover .dipl_tabs_item_title_inner_wrap",
					'css_property'   => 'background-color',
					'important'		 => true,
					'priority'		 => 999,
					'render_slug'    => $render_slug,
					'type'           => 'color',
				)
			);
		}

		// Active Tab Background Color
		if ( '' !== $active_tab_background_color ) {
			$this->generate_styles(
				array(
					'base_attr_name' => 'active_tab_background_color',
					'selector'       => "{$this->main_css_element}_title.dipl_active_tab .dipl_tabs_item_title_inner_wrap",
					'hover_selector' => "{$this->main_css_element}_title.dipl_active_tab:hover .dipl_tabs_item_title_inner_wrap",
					'css_property'   => 'background-color',
					'important'		 => true,
					'priority'		 => 1000,
					'render_slug'    => $render_slug,
					'type'           => 'color',
				)
			);
		}
		
		//Content Layout
		if ( 'dipl_content_text' === $content_type && '' !== $content || '' !== $button ) {
			$dipl_tabs_item_content = sprintf( 
				'<div class="dipl_tab_desc">
				%1$s
				</div>
				%2$s',
				et_core_intentionally_unescaped( $content, 'html' ),
				et_core_intentionally_unescaped( $button, 'html' )
			);			
		}
		
		if( 'dipl_content_layout' === $content_type && '' !== $select_content_layout && 0 !== $select_content_layout ) {
			$dipl_tabs_item_content = sprintf(
				'%1$s',
				do_shortcode( get_the_content( null, false, $select_content_layout ) ) 
			);
		}

        $title = '' !== $this->props['title'] ?
	    	sprintf(
	    		'<span class="dipl_tab_title">%1$s</span>',
	    		esc_html( $this->props['title'] )
	    	) :
	    	'';

	    $icon = '' !== $this->props['icon'] ?
	    	sprintf(
	    		'<span class="dipl_tab_icon et-pb-icon">%1$s</span>',
	    		esc_html( et_pb_process_font_icon( $this->props['icon'] ) )
	    	) :
	    	'';

	    $default_image = 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTA4MCIgaGVpZ2h0PSI1NDAiIHZpZXdCb3g9IjAgMCAxMDgwIDU0MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICAgIDxnIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+CiAgICAgICAgPHBhdGggZmlsbD0iI0VCRUJFQiIgZD0iTTAgMGgxMDgwdjU0MEgweiIvPgogICAgICAgIDxwYXRoIGQ9Ik00NDUuNjQ5IDU0MGgtOTguOTk1TDE0NC42NDkgMzM3Ljk5NSAwIDQ4Mi42NDR2LTk4Ljk5NWwxMTYuMzY1LTExNi4zNjVjMTUuNjItMTUuNjIgNDAuOTQ3LTE1LjYyIDU2LjU2OCAwTDQ0NS42NSA1NDB6IiBmaWxsLW9wYWNpdHk9Ii4xIiBmaWxsPSIjMDAwIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz4KICAgICAgICA8Y2lyY2xlIGZpbGwtb3BhY2l0eT0iLjA1IiBmaWxsPSIjMDAwIiBjeD0iMzMxIiBjeT0iMTQ4IiByPSI3MCIvPgogICAgICAgIDxwYXRoIGQ9Ik0xMDgwIDM3OXYxMTMuMTM3TDcyOC4xNjIgMTQwLjMgMzI4LjQ2MiA1NDBIMjE1LjMyNEw2OTkuODc4IDU1LjQ0NmMxNS42Mi0xNS42MiA0MC45NDgtMTUuNjIgNTYuNTY4IDBMMTA4MCAzNzl6IiBmaWxsLW9wYWNpdHk9Ii4yIiBmaWxsPSIjMDAwIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz4KICAgIDwvZz4KPC9zdmc+Cg==';

	    $image = '' !== $this->props['tab_image'] ?
	    	sprintf(
	    		'<img src="%1$s"/>',
	    		$default_image === $this->props['tab_image'] ? $this->props['tab_image'] : esc_url( $this->props['tab_image'] )
	    	) :
	    	'';

        switch( $title_type ) {
        	case 'text':
        		$dipl_tabs_item_titles[] = $title;
	        	break;

	        case 'icon':
	        	$dipl_tabs_item_titles[] = $icon;
	        	break;

	        case 'image':
	        	$dipl_tabs_item_titles[] = $image;
	        	break;

	        case 'text_icon':
	        	$dipl_tabs_item_titles[] = $title . $icon;
	        	break;

	        case 'text_image':
	        	$dipl_tabs_item_titles[] = $title . $image;
	        	break;

	        default:
	        	break;
        }

		$dipl_tabs_item_order_class[] = $this->get_module_order_class( $render_slug );
		
		if ( 1 === count( $dipl_tabs_item_titles ) ) {
			$this->add_classname( 'dipl_active_tab_content' );
		}

		$output = sprintf(
			'<div class="dipl_single_tab_content">
					%1$s
			</div>',
			( isset( $dipl_tabs_item_content ) && '' !== $dipl_tabs_item_content )  ? $dipl_tabs_item_content : ''
		);
		
		$this->process_advanced_margin_padding_css( $this, $render_slug, $this->margin_padding );

		$file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        wp_enqueue_style( 'dipl-tabs-item-style', PLUGIN_PATH . 'includes/modules/TabsItem/' . $file . '.min.css', array(), '1.0.0' );
		
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

        $allowed_advanced_fields = array( 'tab_margin_padding' );
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
	
	
}

$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
	$modules = explode( ',', $plugin_options['dipl-modules'] );
	if ( in_array( 'dipl_tabs', $modules, true ) ) {
		new DIPL_TabsItem();
	}
} else {
	new DIPL_TabsItem();
}