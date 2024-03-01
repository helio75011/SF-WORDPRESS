<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.4
 */
class DIPL_ImageAccordionItem extends ET_Builder_Module {

	public $slug           = 'dipl_image_accordion_item';
    public $type           = 'child';
    public $vb_support     = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name 						= esc_html__( 'DP Image Accordion Item', 'divi-plus' );
		$this->advanced_setting_title_text  = esc_html__( 'Image Accordion Item', 'divi-plus' );
        $this->child_title_var              = 'title';
		$this->main_css_element 			= '.dipl_image_accordion %%order_class%%';
		if ( is_archive() ) {
            $this->main_css_element = '%%order_class%%';
        }
	}
	
	public function get_settings_modal_toggles() {
		return array(
			'general' => array(
				'toggles' => array(
					'main_content' 	=> array(
                        'title' => esc_html__( 'Accordion', 'divi-plus' ),
                        'tabbed_subtoggles' => true,
                        'bb_icons_support'  => true,
                        'sub_toggles'       => array(
                            'accordion'     => array(
                                'name' => 'Accordion',
                            ),
                            'active_accordion' => array(
                                'name' => 'Active Accordion',
                            ),
                        ),
                    ),
					'content_box' => esc_html__( 'Content', 'divi-plus' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'text' 		=> esc_html__( 'Text', 'divi-plus' ),
					'title' 	=> esc_html__( 'Title', 'divi-plus' ),
					'desc' 		=> array(
                        'title' => esc_html__( 'Description', 'divi-plus' ),
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
					'icon_settings' => esc_html__( 'Icon', 'divi-plus' ),
					'button' 		=> esc_html__( 'Button', 'divi-plus' ),
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
						'default' => '18px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit' => true,
					),
					'line_height' => array(
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
					'header_level' => array(
						'default' => 'h4',
					),
					'css'            => array(
						'main'       => "{$this->main_css_element} .dipl_image_accordion_item_title",
						'hover'      => "{$this->main_css_element} .dipl_image_accordion_item_title:hover",
					),
                    'tab_slug'       => 'advanced',
                    'toggle_slug'    => 'title',
				),
				'desc_text' => array(
                    'label'     => esc_html__( 'Description', 'divi-plus' ),
                    'font_size' => array(
                        'default'           => '14px',
                        'range_settings'    => array(
                            'min'   => '1',
                            'max'   => '100',
                            'step'  => '1',
                        ),
                        'validate_unit'     => true,
                    ),
                    'line_height' => array(
                        'default'           => '1.3',
                        'range_settings'    => array(
                            'min'   => '0.1',
                            'max'   => '10',
                            'step'  => '0.1',
                        ),
                    ),
                    'letter_spacing' => array(
                        'default'           => '0px',
                        'range_settings'    => array(
                            'min'   => '0',
                            'max'   => '10',
                            'step'  => '1',
                        ),
                        'validate_unit'     => true,
                    ),
                    'css' => array(
                        'main' => "{$this->main_css_element} .dipl_image_accordion_item_desc, {$this->main_css_element} .dipl_image_accordion_item_desc p",
                    ),
                    'tab_slug'    => 'advanced',
                    'toggle_slug' => 'desc',
                    'sub_toggle'  => 'p',
                ),
                'desc_link' => array(
                    'label'     => esc_html__( 'Description Link', 'divi-plus' ),
                    'font_size' => array(
                        'default'           => '14px',
                        'range_settings'    => array(
                            'min'   => '1',
                            'max'   => '100',
                            'step'  => '1',
                        ),
                        'validate_unit'     => true,
                    ),
                    'line_height' => array(
                        'default'           => '1.3',
                        'range_settings'    => array(
                            'min'   => '0.1',
                            'max'   => '10',
                            'step'  => '0.1',
                        ),
                    ),
                    'letter_spacing' => array(
                        'default'           => '0px',
                        'range_settings'    => array(
                            'min'   => '0',
                            'max'   => '10',
                            'step'  => '1',
                        ),
                        'validate_unit'     => true,
                    ),
                    'css' => array(
                        'main' => "{$this->main_css_element} .dipl_image_accordion_item_desc a",
                    ),
                    'tab_slug'    => 'advanced',
                    'toggle_slug' => 'desc',
                    'sub_toggle'  => 'a',
                ),
                'desc_ul' => array(
                    'label'     => esc_html__( 'Description Unordered List', 'divi-plus' ),
                    'font_size' => array(
                        'default'           => '14px',
                        'range_settings'    => array(
                            'min'   => '1',
                            'max'   => '100',
                            'step'  => '1',
                        ),
                        'validate_unit'     => true,
                    ),
                    'line_height' => array(
                        'default'           => '1.3',
                        'range_settings'    => array(
                            'min'   => '0.1',
                            'max'   => '10',
                            'step'  => '0.1',
                        ),
                    ),
                    'letter_spacing' => array(
                        'default'           => '0px',
                        'range_settings'    => array(
                            'min'   => '0',
                            'max'   => '10',
                            'step'  => '1',
                        ),
                        'validate_unit'     => true,
                    ),
                    'css' => array(
                        'main' => "{$this->main_css_element} .dipl_image_accordion_item_desc ul li",
                    ),
                    'tab_slug'    => 'advanced',
                    'toggle_slug' => 'desc',
                    'sub_toggle'  => 'ul',
                ),
                'desc_ol' => array(
                    'label'     => esc_html__( 'Description Ordered List', 'divi-plus' ),
                    'font_size' => array(
                        'default'           => '14px',
                        'range_settings'    => array(
                            'min'   => '1',
                            'max'   => '100',
                            'step'  => '1',
                        ),
                        'validate_unit'     => true,
                    ),
                    'line_height' => array(
                        'default'           => '1.3',
                        'range_settings'    => array(
                            'min'   => '0.1',
                            'max'   => '10',
                            'step'  => '0.1',
                        ),
                    ),
                    'letter_spacing' => array(
                        'default'           => '0px',
                        'range_settings'    => array(
                            'min'   => '0',
                            'max'   => '10',
                            'step'  => '1',
                        ),
                        'validate_unit'     => true,
                    ),
                    'css' => array(
                        'main' => "{$this->main_css_element} .dipl_image_accordion_item_desc ol li",
                    ),
                    'tab_slug'    => 'advanced',
                    'toggle_slug' => 'desc',
                    'sub_toggle'  => 'ol',
                ),
                'desc_quote' => array(
                    'label'     => esc_html__( 'Description Blockquote', 'divi-plus' ),
                    'font_size' => array(
                        'default'           => '14px',
                        'range_settings'    => array(
                            'min'   => '1',
                            'max'   => '100',
                            'step'  => '1',
                        ),
                        'validate_unit'     => true,
                    ),
                    'line_height' => array(
                        'default'           => '1.3',
                        'range_settings'    => array(
                            'min'   => '0.1',
                            'max'   => '10',
                            'step'  => '0.1',
                        ),
                    ),
                    'letter_spacing' => array(
                        'default'           => '0px',
                        'range_settings'    => array(
                            'min'   => '0',
                            'max'   => '10',
                            'step'  => '1',
                        ),
                        'validate_unit'     => true,
                    ),
                    'css' => array(
                        'main' => "{$this->main_css_element} .dipl_image_accordion_item_desc blockquote",
                    ),
                    'tab_slug'    => 'advanced',
                    'toggle_slug' => 'desc',
                    'sub_toggle'  => 'quote',
                ),
			),
			'button' => array(
			    'button' => array(
				    'label' => esc_html__( 'Button', 'divi-plus' ),
				    'css' => array(
						'main'      => "{$this->main_css_element} .et_pb_button",
						'alignment' => "{$this->main_css_element} .et_pb_button_wrapper",
					),
					'margin_padding'  => array(
						'css' => array(
							'margin'    => "{$this->main_css_element} .et_pb_button_wrapper",
							'padding'   => "{$this->main_css_element} .et_pb_button",
							'important' => 'all',
						),
					),
					'use_alignment'   	=> true,
					'box_shadow'      	=> false,
				    'depends_on'        => array( 'show_button' ),
		            'depends_show_if'   => 'on',
				    'tab_slug'          => 'advanced',
				    'toggle_slug'       => 'button',
			    ),
			),
			'text' => array(
				'use_background_layout' => true,
				'options'               => array(
					'background_layout' => array(
						'hover' => 'tabs',
					),
				),
			),
			'borders'        => array(
				'default' => array(
					'css' => array(
						'main' => array(
							'border_styles' => $this->main_css_element,
							'border_radii'  => $this->main_css_element,
							'important' => 'all',
						),
					),
				),
			),
            'margin_padding' => array(
                'css' => array(
                    'margin'    => $this->main_css_element,
                    'padding'   => "{$this->main_css_element} .dipl_image_accordion_item_content_wrapper",
                    'important' => 'all',
                ),
            ),
			'text_shadow' => false,
			'background' => false,
			'max_width' => false,
			'height' => false,
		);

	}

	public function get_fields() {
		
		$et_accent_color = et_builder_accent_color();
		
		$fields = array(
			'title' => array(
				'label'           => esc_html__( 'Title', 'divi-plus' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'dynamic_content' => 'text',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'content_box',
				'description'     => esc_html__( 'Here you can define the title which will appear in the active state.', 'divi-plus' ),
			),
			'content' => array(
				'label'           => esc_html__( 'Description', 'divi-plus' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'content_box',
				'description'     => esc_html__( 'Here you can define the content which will appear in the active state.', 'divi-plus' ),
			),
			'icon' => array(
				'label'    			=> esc_html__( 'Icon', 'divi-plus' ),
				'type'              => 'select_icon',
				'option_category'	=> 'basic_option',
				'class'             => array(
					'et-pb-font-icon'
				),
				'tab_slug'          => 'general',
				'toggle_slug'       => 'content_box',
				'description'       => esc_html__( 'Choose an icon to display with the accordion.', 'divi-plus' ),
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
				'default'           => 'off',
				'tab_slug'          => 'general',
				'toggle_slug'       => 'content_box',
				'description'       => esc_html__( 'Here you can choose whether or not use the button.', 'divi-plus' ),
			),
			'button_text' => array(
				'label'    			=> esc_html__( 'Button Text', 'divi-plus' ),
				'type'              => 'text',
				'option_category'   => 'basic_option',
				'show_if'           => array(
				    'show_button' => 'on',
				),
				'default'			=> esc_html__( 'Learn More', 'divi-plus' ),
				'default_on_front'	=> esc_html__( 'Learn More', 'divi-plus' ),
				'tab_slug'          => 'general',
				'toggle_slug'       => 'content_box',
				'description'       => esc_html__( 'Here you can input the text to be used for the  Read More Button.', 'divi-plus' ),
			),
			'button_url' => array(
				'label'           	=> esc_html__( 'Button Link URL', 'divi-plus' ),
				'type'            	=> 'text',
				'option_category' 	=> 'basic_option',
				'dynamic_content' 	=> 'url',
				'tab_slug'          => 'general',
				'toggle_slug'     	=> 'link_options',
				'description'     	=> esc_html__( 'Here you can input the destination URL for the button to open when clicked.', 'divi-plus' ),
			),
			'button_url_new_window' => array(
				'label'            	=> esc_html__( 'Button Link Target', 'divi-plus' ),
				'type'             	=> 'select',
				'option_category'  	=> 'configuration',
				'options'          	=> array(
					'off' => esc_html__( 'In The Same Window', 'divi-plus' ),
					'on'  => esc_html__( 'In The New Tab', 'divi-plus' ),
				),
				'tab_slug'          => 'general',
				'toggle_slug'      	=> 'link_options',
				'description'      	=> esc_html__( 'Here you can choose whether or not your link opens in a new window', 'divi-plus' ),
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
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'icon_settings',
				'description'      => esc_html__( 'Control the size of the icon by increasing or decreasing the font size.', 'divi-plus' ),
			),
			'icon_color' => array(
				'label'          	 => esc_html__( 'Icon Color', 'divi-plus' ),
				'type'            	=> 'color-alpha',
				'hover'           	=> 'tabs',
				'mobile_options'  	=> true,
				'tab_slug'        	=> 'advanced',
				'toggle_slug'     	=> 'icon_settings',
				'description'     	=> esc_html__( 'Here you can define a custom color for your icon.', 'divi-plus' ),
			),
			'style_icon' => array(
				'label'                 => esc_html__( 'Style Icon', 'divi-plus' ),
				'type'                  => 'yes_no_button',
				'option_category'       => 'configuration',
				'options'               => array(
					'off'   => esc_html__( 'No', 'divi-plus' ),
					'on'    => esc_html__( 'Yes', 'divi-plus' )
				),
				'default'               => 'off',
				'default_on_front'      => 'off',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'icon_settings',
				'description'           => esc_html__( 'Here you can choose whether icon should display within a shape or not.', 'divi-plus' ),
			),
			'icon_shape' => array(
				'label'                 => esc_html__( 'Shape', 'divi-plus' ),
				'type'                  => 'select',
				'option_category'       => 'configuration',
				'options'               => array(
					'dipl_icon_shape_circle'    => esc_html__( 'Circle', 'divi-plus' ),
					'dipl_icon_shape_square' 	=> esc_html__( 'Square', 'divi-plus' ),
                    'dipl_icon_shape_hexagon'   => esc_html__( 'Hexagon', 'divi-plus' ),
				),
				'show_if'               => array(
				    'style_icon' => 'on',
				),
				'default' 				=> 'dipl_icon_shape_square',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'icon_settings',
				'description'           => esc_html__( 'Here you can choose shape to display icon within.', 'divi-plus' ),
			),
			'shape_color' => array(
				'label'                 => esc_html__( 'Shape Background', 'divi-plus' ),
				'type'                  => 'color-alpha',
				'custom_color'          => true,
				'show_if'               => array(
				    'style_icon' => 'on',
				),
				'default'               => '#000',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'icon_settings',
				'description'           => esc_html__( 'Pick a color to be used for the icon shape.', 'divi-plus' ),
			),
			'accordion_bg_color' => array(
				'label'             => esc_html__( 'Accordion Background', 'divi-plus' ),
				'type'              => 'background-field',
				'base_name'         => 'accordion_bg',
				'context'           => 'accordion_bg_color',
				'option_category'   => 'button',
				'custom_color'      => true,
				'background_fields' => $this->generate_background_options( 'accordion_bg', 'button', 'general', 'main_content', 'accordion_bg_color' ),
				'hover'             => false,
				'tab_slug'          => 'general',
				'toggle_slug'       => 'main_content',
				'sub_toggle'		=> 'accordion',
				'description'       => esc_html__( 'Customize the background of the accordion by adjusting background color, gradient, and image.', 'divi-plus' ),
			),
			'active_accordion_bg_color' => array(
				'label'             => esc_html__( 'Active Accordion Background', 'divi-plus' ),
				'type'              => 'background-field',
				'base_name'         => 'active_accordion_bg',
				'context'           => 'active_accordion_bg_color',
				'option_category'   => 'button',
				'custom_color'      => true,
				'background_fields' => $this->generate_background_options( 'active_accordion_bg', 'button', 'general', 'main_content', 'active_accordion_bg_color' ),
				'hover'             => false,
				'tab_slug'          => 'general',
				'toggle_slug'       => 'main_content',
				'sub_toggle'		=> 'active_accordion',
				'description'       => esc_html__( 'Customize the background of the active accordion by adjusting background color, gradient, and image. Leave empty for same.', 'divi-plus' ),
			),
            'animation' => array(
                'label'             => esc_html__( 'Accordion Content Animation', 'divi-plus' ),
                'type'              => 'select',
                'option_category'   => 'configuration',
                'options'           => array(
                    'top'       => esc_html__( 'Top To Bottom', 'divi-plus' ),
                    'left'      => esc_html__( 'Left To Right', 'divi-plus' ),
                    'right'     => esc_html__( 'Right To Left', 'divi-plus' ),
                    'bottom'    => esc_html__( 'Bottom To Top', 'divi-plus' ),
                    'off'       => esc_html__( 'No Animation', 'divi-plus' ),
                ),
                'default'           => 'off',
                'default_on_front'  => 'off',
                'tab_slug'          => 'advanced',
                'toggle_slug'       => 'animation',
                'description'       => esc_html__( 'This controls the direction of the lazy-loading accordion content animation.', 'divi-plus' ),
            ),
		);
		
		return array_merge(
			$fields,
			$this->generate_background_options( 'accordion_bg', 'skip', 'general', 'main_content', 'accordion_bg_color' ),
			$this->generate_background_options( 'active_accordion_bg', 'skip', 'general', 'main_content', 'active_accordion_bg_color' )
		);
	}	

	public function render( $attrs, $content, $render_slug ) {
		global $dp_ia_parent_title_level;

		$multi_view            	= et_pb_multi_view_options( $this );
        $style_icon             = $this->props['style_icon'];
		$shape_color            = esc_attr( $this->props['shape_color'] );
		$button_text           	= esc_html__( $this->props['button_text'], 'divi-plus' );
        $animation              = $this->props['animation'];
		$title_level			= $this->props['title_level'];
		$title_level            = '' === $title_level && '' !== $dp_ia_parent_title_level ? $dp_ia_parent_title_level : $title_level;
		$processed_title_level 	= et_pb_process_header_level( $title_level, 'h4' );
		$processed_title_level 	= esc_html( $processed_title_level );

		$icon_shape 	= 'on' === $style_icon ? esc_attr( $this->props['icon_shape'] ) : '';
		$icon_classes	= implode(
			' ',
			array(
				'dipl_image_accordion_item_icon',
				'et-pb-icon',
				$icon_shape,
			)
		);

		$icon = $multi_view->render_element(
			array(
				'content'  => '{{icon}}',
				'attrs'    => array(
					'class' => $icon_classes,
				),
				'required' => 'icon',
			)
		);

        if ( 'dipl_icon_shape_hexagon' === $icon_shape ) {
            $icon = sprintf(
                '<div class="dipl_icon_hexagon_wrapper">
                    <div class="dipl_icon_hexagon_inner_wrap">
                        <div class="dipl_icon_hexagon">%1$s</div>
                    </div>
                </div>',
                $icon
            );
        }

		$title = $multi_view->render_element(
			array(
				'tag'      => $processed_title_level,
				'content'  => '{{title}}',
				'attrs'    => array(
					'class' => 'dipl_image_accordion_item_title',
				),
				'required' => 'title',
			)
		);

		$content = $multi_view->render_element(
			array(
				'tag'      => 'div',
				'content'  => '{{content}}',
				'attrs'    => array(
					'class' => 'dipl_image_accordion_item_desc',
				),
				'required' => 'content',
			)
		);

		$button = $this->render_button(
			array(
				'display_button'	  => '' !== $this->props['button_url'] && 'off' !== $this->props['show_button'] ? true : false,
				'button_text'         => $button_text,
				'button_text_escaped' => true,
				'has_wrapper'      	  => true,
				'button_url'          => esc_url( $this->props['button_url'] ),
				'url_new_window'      => esc_attr( $this->props['button_url_new_window'] ),
				'button_custom'       => isset( $this->props['custom_button'] ) ? esc_attr( $this->props['custom_button'] ) : 'off',
				'custom_icon'         => isset( $this->props['button_icon'] ) ? $this->props['button_icon'] : '',
				'button_rel'          => isset( $this->props['button_rel'] ) ? esc_attr( $this->props['button_rel'] ) : '',
			)
		);

		if ( '' !== $icon || '' !== $title || '' !== $content || '' !== $button ) {
			$content_wrapper = sprintf(
				'<div class="dipl_image_accordion_item_content_wrapper">
					<div class="dipl_image_accordion_item_content_inner_wrap et_pb_animation_%5$s">%1$s%2$s%3$s%4$s</div>
				</div>',
				et_core_intentionally_unescaped( $icon, 'html' ),
				et_core_intentionally_unescaped( $title, 'html' ),
				et_core_intentionally_unescaped( $content, 'html' ),
				et_core_intentionally_unescaped( $button, 'html' ),
                esc_attr( $animation )
			);
		} else {
			$content_wrapper = '';
		}

		if ( '' !== $content_wrapper ) {
			$icon_selector  = "{$this->main_css_element} .dipl_image_accordion_item_icon";
			$icon_font_size = et_pb_responsive_options()->get_property_values( $this->props, 'icon_font_size' );
			et_pb_responsive_options()->generate_responsive_css( $icon_font_size, $icon_selector, 'font-size', $render_slug, '!important;', 'range' );

			$icon_color 	= et_pb_responsive_options()->get_property_values( $this->props, 'icon_color' );
			et_pb_responsive_options()->generate_responsive_css( $icon_color, $icon_selector, 'color', $render_slug, '!important;', 'color' );

			$icon_color_hover = $this->get_hover_value( 'icon_color' );
	        if ( $icon_color_hover ) {
	            self::set_style( $render_slug, array(
	                'selector'    => "{$this->main_css_element} .dipl_image_accordion_item_icon:hover",
	                'declaration' => sprintf(
	                    'color: %1$s;',
	                    esc_attr( $icon_color_hover )
	                ),
	            ) );
	        }

            if ( 'on' === $this->props['style_icon'] ) {

				if ( $shape_color ) {
					self::set_style( $render_slug, array(
	                    'selector'    => '%%order_class%% .dipl_image_accordion_item_icon:not(.dipl_icon_shape_hexagon)',
	                    'declaration' => sprintf(
	                        'background-color: %1$s;',
	                        esc_attr( $shape_color )
	                    ),
	                ) );
					
	                self::set_style( $render_slug, array(
	                    'selector'    => '%%order_class%% .dipl_icon_hexagon',
	                    'declaration' => sprintf(
	                        'background-color: %1$s;',
	                        esc_attr( $shape_color )
	                    ),
	                ) );
				}

                $shape_color_hover = $this->get_hover_value( 'shape_color' );
                if ( $shape_color_hover ) {
                    self::set_style( $render_slug, array(
                        'selector'    => "{$this->main_css_element} .dipl_image_accordion_item_icon:hover",
                        'declaration' => sprintf(
                            'background-color: %1$s;',
                            esc_attr( $shape_color_hover )
                        ),
                    ) );
                }
            }

		}

		if ( '' !== $icon ) {
			if ( class_exists( 'ET_Builder_Module_Helper_Style_Processor' ) && method_exists( 'ET_Builder_Module_Helper_Style_Processor', 'process_extended_icon' ) ) {
                $this->generate_styles(
                    array(
                        'utility_arg'    => 'icon_font_family',
                        'render_slug'    => $render_slug,
                        'base_attr_name' => 'icon',
                        'important'      => true,
                        'selector'       => '%%order_class%% .dipl_image_accordion_item_icon',
                        'processor'      => array(
                            'ET_Builder_Module_Helper_Style_Processor',
                            'process_extended_icon',
                        ),
                    )
                );
            }
		}

		$options = array(
			'normal' => array(
				'accordion_bg' => $this->main_css_element,
				'active_accordion_bg' => "{$this->main_css_element}.dipl_active_image_accordion_item:before",
			),
		);

		$this->process_custom_background( $render_slug, $options );

        $background_layout_class_names = et_pb_background_layout_options()->get_background_layout_class( $this->props );
        $this->add_classname(
            array(
                $this->get_text_orientation_classname(),
                $background_layout_class_names[0]
            )
        );

        $file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        wp_enqueue_style( 'dipl-image-accordion-item-style', PLUGIN_PATH . 'includes/modules/ImageAccordionItem/' . $file . '.min.css', array(), '1.0.0' );
		
		return et_core_intentionally_unescaped( $content_wrapper, 'html' );
				
	}
	
	//Remove Module inner wrapper
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
		$outer_wrapper_attrs = apply_filters( "et_builder_module_{$slug}_outer_wrapper_attrs", $outer_wrapper_attrs, $this );
		return sprintf(
			'<div%1$s>
				%2$s
			</div>',
			et_html_attrs( $outer_wrapper_attrs ),
			$output
		);
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

		return $raw_value;
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
	if ( in_array( 'dipl_image_accordion', $modules, true ) ) {
		new DIPL_ImageAccordionItem();
	}
} else {
	new DIPL_ImageAccordionItem();
}