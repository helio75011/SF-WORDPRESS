<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.4
 */
class DIPL_ImageAccordion extends ET_Builder_Module {

	public $slug       = 'dipl_image_accordion';
    public $child_slug = 'dipl_image_accordion_item';
    public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name 			= esc_html__( 'DP Image Accordion', 'divi-plus' );
		$this->child_item_text  = esc_html__( 'Image', 'divi-plus' );
		$this->main_css_element = '%%order_class%%';
	} 
	
	public function get_settings_modal_toggles() {
		return array(
			'general'  => array(
                'toggles' => array(
                    'main_content' => array(
                        'title' => esc_html__( 'Configuration', 'divi-plus' ),
                    ),
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
			'height' => array(
				'options' => array(
					'height' => array(
						'label'          => esc_html__( 'Height', 'divi-plus' ),
						'range_settings' => array(
							'min'  => 1,
							'max'  => 500,
							'step' => 1,
						),
						'hover'          	=> false,
						'validate_unit'	 	=> true,
						'default'		 	=> '350px',
						'default_on_front' 	=> '350px',
					),
					'min_height' => array(
						'label'          => esc_html__( 'Min Height', 'divi-plus' ),
						'range_settings' => array(
							'min'  => 1,
							'max'  => 500,
							'step' => 1,
						),
						'hover'          => false,
						'validate_unit'	 => true,
					),
					'max_height' => array(
						'label'          => esc_html__( 'Max Height', 'divi-plus' ),
						'range_settings' => array(
							'min'  => 1,
							'max'  => 500,
							'step' => 1,
						),
						'hover'          => false,
						'validate_unit'	 => true,
					),
				),
				'css' => array(
					'main' => "{$this->main_css_element} .dipl_image_accordion_wrapper",
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
					'no_rel_attr'     	=> true,
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
                        'default'           => 'light',
						'default_on_front'  => 'light',
						'hover'             => 'tabs',
					),
					'text_orientation'  => array(
                        'default' => 'center',
						'default_on_front' => 'center',
					),
				),
			),
			'borders'        => array(
				'default' => array(
					'css' => array(
						'main' => array(
							'border_styles' => $this->main_css_element,
							'border_radii'  => $this->main_css_element,
						),
					),
				),
			),
            'margin_padding' => array(
                'css' => array(
                    'main'      => '%%order_class%%',
                    'important' => 'all',
                ),
            ),
			'text_shadow' => false,
			'background' => array(
				'use_background_video' => false,
			),
		);

	}

	public function get_fields() {
		$et_accent_color = et_builder_accent_color();
		
		$search_in = array( 
			'title' => esc_html__( 'Title', 'divi-plus' ),
			'icon'  => esc_html__( 'Icon', 'divi-plus' ),
		);

		return array(
            'accordion_trigger' => array(
                'label'             => esc_html__( 'Accordion Trigger', 'divi-plus' ),
                'type'              => 'select',
                'option_category'   => 'basic_option',
                'options'           => array(
                    'hover' => esc_html__( 'Hover', 'divi-plus' ),
                    'click' => esc_html__( 'Click', 'divi-plus' ),
                ),
                'default'           => 'hover',
                'default_on_front'  => 'hover',
                'tab_slug'          => 'general',
                'toggle_slug'       => 'main_content',
                'description'       => esc_html__( 'Here you can select the accordion trigger.', 'divi-plus' ),
            ),
			'accordion_orientation' => array(
                'label'             => esc_html__( 'Accordion Orientation', 'divi-plus' ),
                'type'              => 'select',
                'option_category'   => 'basic_option',
                'options'           => array(
                    'horizontal' => esc_html__( 'Horizontal', 'divi-plus' ),
                    'vertical' => esc_html__( 'Vertical', 'divi-plus' ),
                ),
                'mobile_options'    => true,
                'default'           => 'horizontal',
                'default_on_front'  => 'horizontal',
                'tab_slug'          => 'general',
                'toggle_slug'       => 'main_content',
                'description'       => esc_html__( 'Here you can select the accordion orientation.', 'divi-plus' ),
            ),
            'content_alignment' => array(
                'label'             => esc_html__( 'Content Alignment', 'divi-plus' ),
                'type'              => 'select',
                'option_category'   => 'configuration',
                'options'           => array(
                    'top_left'      => esc_html__( 'Top Left', 'divi-plus' ),
                    'top_right'     => esc_html__( 'Top Right', 'divi-plus' ),
                    'top_center'    => esc_html__( 'Top Center', 'divi-plus' ),
                    'center'        => esc_html__( 'Center', 'divi-plus' ),
                    'bottom_left'   => esc_html__( 'Bottom Left', 'divi-plus' ),
                    'bottom_right'  => esc_html__( 'Bottom Right', 'divi-plus' ),
                    'bottom_center' => esc_html__( 'Bottom Center', 'divi-plus' ),
                ),
                'default'           => 'center',
                'default_on_front'  => 'center',
                'tab_slug'          => 'general',
                'toggle_slug'       => 'main_content',
                'description'       => esc_html__( 'Here you can select the content alignment.', 'divi-plus' ),
            ),
			'inactive_state' => array(
				'label'           => esc_html__( 'Display in Inactive State', 'divi-plus' ),
				'type'             		=> 'multiple_checkboxes',
				'option_category'  		=> 'basic_option',
				'options'				=> $search_in,
				'default'				=> 'off|off',
				'default_on_front'		=> 'off|off',
				'tab_slug'         		=> 'general',
				'toggle_slug'      		=> 'main_content',
				'description'     => esc_html__( 'Here you can choose whether or not to show the title and icon in default state.', 'divi-plus' ),
			),
			'active_accordion_size' => array(
				'label'           	=> esc_html__( 'Active Accordion Image Size', 'divi-plus' ),
				'type'            	=> 'range',
				'option_category'	=> 'basic_option',
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '10',
					'step' => '1',
				),
				'unitless'		  	=> true,
				'default'         	=> '4',
				'default_on_front'  => '4',
				'mobile_options'   	=> true,
				'tab_slug'        	=> 'general',
				'toggle_slug'     	=> 'main_content',
				'description'     	=> esc_html__( 'Move the slider or input the value to increase or decrease the size of active accordion.', 'divi-plus' ),
			),
			'active_accordion' => array(
				'label'           	=> esc_html__( 'Default Active Accordion', 'divi-plus' ),
				'type'            	=> 'range',
				'option_category'	=> 'basic_option',
				'range_settings'  => array(
					'min'  => '0',
					'max'  => '10',
					'step' => '1',
				),
				'unitless'		  	=> true,
				'default'         	=> '0',
				'default_on_front'  => '0',
				'tab_slug'        	=> 'general',
				'toggle_slug'     	=> 'main_content',
				'description'     	=> esc_html__( 'Here you can enter the accordion number which you want to set as active in default state. Set 0 for no accordion to be in active state.', 'divi-plus' ),
			),
            'accordion_transition_duration' => array(
                'label'             => esc_html__( 'Transition Duration', 'divi-plus' ),
                'type'              => 'range',
                'option_category'   => 'basic_option',
                'range_settings'  => array(
                    'min'  => '100',
                    'max'  => '2000',
                    'step' => '100',
                ),
                'fixed_unit'        => 'ms',
                'default'           => '500ms',
                'default_on_front'  => '500ms',
                'tab_slug'          => 'general',
                'toggle_slug'       => 'main_content',
                'description'       => esc_html__( 'Here you can enter the transition duration.', 'divi-plus' ),
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
				'toggle_slug'      => 'icon_settings',
				'description'      => esc_html__( 'Control the size of the icon by increasing or decreasing the font size.', 'divi-plus' ),
			),
			'icon_color' => array(
				'label'          	=> esc_html__( 'Icon Color', 'divi-plus' ),
				'type'            	=> 'color-alpha',
				'hover'           	=> 'tabs',
				'mobile_options'  	=> true,
				'default'         	=> esc_attr( $et_accent_color ),
				'default_on_front'  => esc_attr( $et_accent_color ),
				'tab_slug'        	=> 'advanced',
				'toggle_slug'     	=> 'icon_settings',
				'description'     	=> esc_html__( 'Here you can define a custom color for your icon.', 'divi-plus' ),
			),
		);
	}

	public function before_render() {
        global $dp_ia_parent_title_level;
        $dp_ia_parent_title_level = 'h4' === $this->props['title_level'] ? '' : $this->props['title_level'];
    }

	public function render( $attrs, $content, $render_slug ) {

		$accordion_trigger                = $this->props['accordion_trigger'];
		$active_accordion_size		      = $this->props['active_accordion_size'];
		$active_accordion 			      = intval( $this->props['active_accordion'] );
		$content_alignment                = $this->props['content_alignment'];
		$inactive_state					  = $this->props['inactive_state'];
        $accordion_transition_duration    = $this->props['accordion_transition_duration'];
        $accordion_orientation            = et_pb_responsive_options()->get_property_values( $this->props,'accordion_orientation' );

        wp_enqueue_script( 'dipl-image-accordion-custom', PLUGIN_PATH."includes/modules/ImageAccordion/dipl-image-accordion-custom.min.js", array('jquery'), '1.0.0', true );
        $file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        wp_enqueue_style( 'dipl-image-accordion-style', PLUGIN_PATH . 'includes/modules/ImageAccordion/' . $file . '.min.css', array(), '1.0.0' );
		
        foreach( $accordion_orientation as &$orientation ) {
            $orientation = str_replace( array( 'horizontal', 'vertical' ), array( 'row', 'column' ), $orientation);
        }
    
        if ( ! empty( array_filter( $accordion_orientation ) ) ) {
            $accordion_orientation_selector = "{$this->main_css_element} .dipl_image_accordion_wrapper";
            et_pb_responsive_options()->generate_responsive_css( $accordion_orientation, $accordion_orientation_selector, 'flex-direction', $render_slug, '', 'type' );
        }

		self::set_style( $render_slug, array(
			'selector'      => '%%order_class%% .dipl_image_accordion_wrapper .dipl_active_image_accordion_item',
			'declaration'   => sprintf(
				'flex: %1$s 0 auto;',
				floatval( $active_accordion_size )
			),
		));

        self::set_style( $render_slug, array(
            'selector'      => '%%order_class%% .dipl_image_accordion_item',
            'declaration'   => sprintf(
                'transition-duration: %1$s;',
                esc_attr( $accordion_transition_duration )
            ),
        ));
		
		$inactive_state_array 	= array( 'title', 'icon' );
		$inactive_state = $this->process_multiple_checkboxes_value( $inactive_state, $inactive_state_array );
		
		if ( "" !== $inactive_state ) {		
			self::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .dipl_image_accordion_item_content_wrapper',
				'declaration' => sprintf(
					'visibility: visible;
					opacity: 1;'
				),
			) );

			self::set_style( $render_slug, array(
				'selector'    => '.dipl_image_accordion_item:not(.dipl_active_image_accordion_item) .dipl_image_accordion_item_icon, .dipl_image_accordion_item:not(.dipl_active_image_accordion_item) .dipl_image_accordion_item_title, .dipl_image_accordion .dipl_image_accordion_item_desc, .dipl_image_accordion .et_pb_button_wrapper',
				'declaration' => sprintf(
					'display: none;'
				),
			) );
			
			self::set_style( $render_slug, array(
				'selector'    => '.dipl_active_image_accordion_item .dipl_image_accordion_item_desc, .dipl_active_image_accordion_item .et_pb_button_wrapper',
				'declaration' => sprintf(
					'display: block;'
				),
			) );
			
			if ( in_array( 'title', $inactive_state ) ) {
				self::set_style( $render_slug, array(
					'selector'    => '.dipl_image_accordion_item .dipl_image_accordion_item_title',
					'declaration' => sprintf(
						'display: block !important;'
					),
				) );
				
			}

			if ( in_array( 'icon', $inactive_state ) ) { 
				self::set_style( $render_slug, array(
					'selector'    => '.dipl_image_accordion .dipl_image_accordion_item_icon',
					'declaration' => sprintf(
						'display: block !important;'
					),
				) );
				
			}
			
		}

        $icon_selector  = "{$this->main_css_element} .dipl_image_accordion_item_icon";
		$icon_font_size = et_pb_responsive_options()->get_property_values( $this->props, 'icon_font_size' );
		et_pb_responsive_options()->generate_responsive_css( $icon_font_size, $icon_selector, 'font-size', $render_slug, '', 'range' );

		$icon_color 	= et_pb_responsive_options()->get_property_values( $this->props, 'icon_color' );
		et_pb_responsive_options()->generate_responsive_css( $icon_color, $icon_selector, 'color', $render_slug, '', 'color' );

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

		$output = sprintf(
			'<div class="dipl_image_accordion_wrapper dipl_image_accordion_content_%4$s" data-trigger="%2$s" data-default-active="%3$s">%1$s</div>',
			et_core_intentionally_unescaped( $this->content, 'html' ),
			esc_attr( $accordion_trigger ),
			esc_attr( $active_accordion ),
			esc_attr( $content_alignment )
		);

        $background_layout_class_names = et_pb_background_layout_options()->get_background_layout_class( $this->props );
        $this->add_classname(
            array(
                $this->get_text_orientation_classname(),
                $background_layout_class_names[0]
            )
        );

		return et_core_intentionally_unescaped( $output, 'html' );
					
	}

	public function process_multiple_checkboxes_value( $value, $values = array() ) {
		if ( empty( $values ) && ! is_array( $values ) ) {
			return '';
		}
		
		$new_values = array();
		$value 		= explode( '|', $value );
		foreach( $value as $key => $val ) {
			if ( 'on' === strtolower( $val ) ) {
				array_push( $new_values, $values[$key] );
			}
		}
		return $new_values;
	}
	
}
$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
	$modules = explode( ',', $plugin_options['dipl-modules'] );
	if ( in_array( 'dipl_image_accordion', $modules, true ) ) {
		new DIPL_ImageAccordion();
	}
} else {
	new DIPL_ImageAccordion();
}