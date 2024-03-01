<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.4
 */
class DIPL_FlipBox extends ET_Builder_Module {
	
	public $slug       = 'dipl_flipbox';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name = esc_html__( 'DP Flip Box', 'divi-plus' );
		$this->main_css_element = '%%order_class%%.dipl_flipbox';
	}

	public function get_settings_modal_toggles() {
        return array(
            'general' => array(
                'toggles' => array(
                	'flipbox_layout' => array(
                        'title' => esc_html__( 'Flip Box Layout', 'divi-plus' ),
                        'priority'  => 1,
                    ),
                    'flipbox_content' => array(
                        'title' => esc_html__( 'Flip Box Content', 'divi-plus' ),
                        'priority' 	=> 2,
                        'sub_toggles'	=> array(
                        						'front_data'		=> array(
												'name'		=> 'Front Content',
											),
												'back_data'		=> array(
												'name'		=> 'Back Content',
											),
										),
                        'tabbed_subtoggles'	=> true,
                    ),
                    'flipbox_elements' => array(
                        'title' => esc_html__( 'Flip Box Elements', 'divi-plus' ),
                        'priority' 	=> 3,
                        'sub_toggles'	=> array(
                        						'front_elements'		=> array(
												'name'		=> 'Front Elements',
											),
												'back_elements'		=> array(
												'name'		=> 'Back Elements',
											),
										),
                        'tabbed_subtoggles'	=> true,
                    ),
                    'link_options' => array(
						'priority' 	=> 4,
                    ),
                    'flipbox_background' => array(
                        'title' => esc_html__( 'Flip Box Background', 'divi-plus' ),
                        'priority' 	=> 5,
                        'sub_toggles'	=> array(
                        						'front'		=> array(
													'name'		=> 'Front',
												),
												'back'		=> array(
													'name'		=> 'Back',
												),
											),
                        'tabbed_subtoggles'	=> true,
                    ),
                    'hide_background' => true,
                ),
            ),
            'advanced' => array(
                'toggles' => array(
                    'front_icon_settings' => array(
                        'title' => esc_html__( 'Front Image/Icon Style', 'divi-plus' ),
                        'priority'  => 1,
                    ),
                    'back_icon_settings' => array(
                        'title' => esc_html__( 'Back Image/Icon Style', 'divi-plus' ),
                        'priority'  => 2,
                    ),
                    'front_text_settings' => array(
                        'title'     => esc_html__( 'Front Text Style', 'divi-plus' ),
                        'priority'  => 3,
                        'sub_toggles'	=> array(
                        						'front_general'		=> array(
													'name'		=> 'General',
												),
												'front_title'		=> array(
													'name'		=> 'Title',
												),
												'front_body'		=> array(
													'name'		=> 'Content',
												),
											),
                        'tabbed_subtoggles'	=> true,
                    ),
                    'back_text_settings' => array(
                        'title'     => esc_html__( 'Back Text Style', 'divi-plus' ),
                        'priority'  => 4,
                        'sub_toggles'	=> array(
                        	                    'back_general'		=> array(
													'name'		=> 'General',
												),
												'back_title'		=> array(
													'name'		=> 'Title',
												),
												'back_body'		=> array(
													'name'		=> 'Content',
												),
											),
                        'tabbed_subtoggles'	=> true,
                    ),
                    'button' => array(
                        'title'     => esc_html__( 'Back Button Style', 'divi-plus' ),
                        'priority'  => 5,
                    ),
                    'front_style_settings' => array(
                        'title'     => esc_html__( 'Front Box Style', 'divi-plus' ),
                        'priority'  => 6,
                    ),
                    'back_style_settings' => array(
                        'title'     => esc_html__( 'Back Box Style', 'divi-plus' ),
                        'priority'  => 7,
                    ),
                    'width' => array(
    					'title'    => esc_html__( 'Sizing', 'divi-plus' ),
    					'priority' => 8,
    				),
                ),
            ),
        );
    }
    
    public function get_advanced_fields_config() {
        return array(
            'fonts' => array(
            	'front_general_settings' => array(
                    'label'     => esc_html__( 'General', 'divi-plus' ),
					'css'       => array(
						'main'  => "%%order_class%% .flipbox_front .et_pb_flipbox_heading .et_pb_module_header, %%order_class%% .flipbox_front .et_pb_flipbox_heading .et_pb_module_header a, %%order_class%% .flipbox_front .et_pb_flipbox_description, %%order_class%% .flipbox_front .et_pb_flipbox_description p, %%order_class%% .flipbox_front .et_pb_main_flipbox_image.use_icon",
					),
					'hide_font' 			=> true,
					'hide_font_size' 		=> true,
					'hide_font_weight' 		=> true,
					'hide_font_style' 		=> true,
					'hide_letter_spacing' 	=> true,
					'hide_line_height' 		=> true,
					'hide_text_color' 		=> true,
					'hide_text_shadow' 		=> true,
					'important' 			=> 'all',
					'tab_slug'				=> 'advanced',
					'toggle_slug'			=> 'front_text_settings',
					'sub_toggle'			=> 'front_general',
				),
                'front_header' => array(
                    'label'     => esc_html__( 'Title', 'divi-plus' ),
                    'font_size' => array(
                        'default'           => '18px',
                        'range_settings'    => array(
                            'min'   => '1',
                            'max'   => '100',
                            'step'  => '1',
                        ),
                        'validate_unit'     => true,
                    ),
                    'line_height' => array(
                        'default'           => '1.5em',
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
					'css'       => array(
						'main'  => "%%order_class%% .flipbox_front .et_pb_module_header, %%order_class%% .flipbox_front .et_pb_module_header a",
					),
					'header_level'  => array(
						'default'   => 'h4',
					),
					'hide_text_align'		=> true,
					'important' 			=> 'all',
					'tab_slug'				=> 'advanced',
					'toggle_slug'			=> 'front_text_settings',
					'sub_toggle'			=> 'front_title',
				),
				'front_body'  => array(
				    'label' => esc_html__( 'Body', 'divi-plus' ),
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
                        'default'           => '1em',
                        'range_settings'    => array(
                            'min'   => '0',
                            'max'   => '5',
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
					'css'   => array(
						'main' => "%%order_class%% .flipbox_front .et_pb_flipbox_description, %%order_class%% .flipbox_front .et_pb_flipbox_description p",
					),
					'hide_text_align' 		=> true,
					'important' 			=> 'all',
					'tab_slug'				=> 'advanced',
					'toggle_slug'			=> 'front_text_settings',
					'sub_toggle'			=> 'front_body',
				),
				'back_general_settings' => array(
                    'label'     => esc_html__( 'General', 'divi-plus' ),
					'css'       => array(
						'main'  => "%%order_class%% .flipbox_back .et_pb_flipbox_heading_back .et_pb_module_header, %%order_class%% .flipbox_back .et_pb_flipbox_heading_back .et_pb_module_header a, %%order_class%% .flipbox_back .et_pb_flipbox_description, %%order_class%% .flipbox_back .et_pb_flipbox_description p, %%order_class%% .flipbox_back .et_pb_main_flipbox_image.use_icon",
					),
					'hide_font' 			=> true,
					'hide_font_size' 		=> true,
					'hide_font_weight' 		=> true,
					'hide_font_style' 		=> true,
					'hide_letter_spacing' 	=> true,
					'hide_line_height' 		=> true,
					'hide_text_color' 		=> true,
					'hide_text_shadow' 		=> true,
					'important' 			=> 'all',
					'tab_slug'				=> 'advanced',
					'toggle_slug'			=> 'back_text_settings',
					'sub_toggle'			=> 'back_general',
				),
				'back_header' => array(
                    'label'     => esc_html__( 'Title', 'divi-plus' ),
                    'font_size' => array(
                        'default'           => '18px',
                        'range_settings'    => array(
                            'min'   => '1',
                            'max'   => '100',
                            'step'  => '1',
                        ),
                        'validate_unit'     => true,
                    ),
                    'line_height' => array(
                        'default'           => '1.5em',
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
					'css'       => array(
						'main'  => "%%order_class%% .flipbox_back .et_pb_module_header, %%order_class%% .flipbox_back .et_pb_module_header a",
					),
					'header_level'  => array(
						'default'   => 'h4',
					),
					'hide_text_align' 		=> true,
					'important' 			=> 'all',
					'tab_slug'				=> 'advanced',
					'toggle_slug'			=> 'back_text_settings',
					'sub_toggle'			=> 'back_title',
				),
				'back_body'  => array(
				    'label' => esc_html__( 'Body', 'divi-plus' ),
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
                        'default'           => '1em',
                        'range_settings'    => array(
                            'min'   => '0',
                            'max'   => '5',
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
					'css'   => array(
						'main' => "%%order_class%% .flipbox_back .et_pb_flipbox_description, %%order_class%% .flipbox_back .et_pb_flipbox_description p",
					),
					'hide_text_align' 		=> true,
					'important' 			=> 'all',
					'tab_slug'				=> 'advanced',
					'toggle_slug'			=> 'back_text_settings',
					'sub_toggle'			=> 'back_body',
				),
			),
			'background' => array(
			    'css' => array(
				    'main' => "%%order_class%%",
			    )
			),
			'button' => array(
			    'back_button' => array(
				    'label'             => esc_html__( 'Button', 'divi-plus' ),
				    'css'               => array(
				        'main'         => "%%order_class%% .flipbox_back .et_pb_button",
				        'background'         => "%%order_class%% .flipbox_back .et_pb_button",
				        'alignment'    => "%%order_class%% .flipbox_back .et_pb_button_wrapper",
				        'important'    => 'all',
				    ),
				    'margin_padding' => array(
						'css' => array(
						    'main'      => "%%order_class%% .flipbox_back .et_pb_button",
						    'hover'     => "%%order_class%% .flipbox_back .et_pb_button:hover",
						    'important'    => 'all',
						),
					),
				    'no_rel_attr'       => true,
				    'box_shadow'        => false,
				    'use_alignment' 	=> true,
				  	'depends_on'        => array( 'back_button_display' ),
		            'depends_show_if'   => 'on',
		           	'tab_slug'			=> 'advanced',
					'toggle_slug'		=> 'button',
			    ),
			),
			'custom_margin_padding' => array(
			    'css' => array(
				    'padding'   => "%%order_class%% .flipbox_front, %%order_class%% .flipbox_back",
				    'margin'    => "%%order_class%%",
				    'important' => 'all',
			    ),
			),
			'max_width' => array(
				'css' => array(
					'main'              => "%%order_class%%",
					'module_alignment'  => "%%order_class%%",
				),
			),
			'borders'		=> array(
				'default'	=> false,
				'front_image'	=> array(
					'css'				=> array(
						'main'			=> array(
							'border_radii'	=> "%%order_class%% .flipbox_front .et_pb_main_flipbox_image img",
							'border_styles'	=> "%%order_class%% .flipbox_front .et_pb_main_flipbox_image img",
						),
					),
					'label_prefix'    	=> esc_html__( 'Front Image', 'divi-plus' ),
					'depends_on'        => array( 'front_use_icon' ),
		            'depends_show_if'   => 'off',
					'tab_slug'        	=> 'advanced',
					'toggle_slug'     	=> 'front_icon_settings',
				),
				'back_image'		=> array(
					'css'				=> array(
						'main'			=> array(
							'border_radii'	=> "%%order_class%% .flipbox_back .et_pb_main_flipbox_image img",
							'border_styles'	=> "%%order_class%% .flipbox_back .et_pb_main_flipbox_image img",
						),
					),
					'label_prefix'    	=> esc_html__( 'Back Image', 'divi-plus' ),
					'depends_on'        => array( 'back_use_icon' ),
		            'depends_show_if'   => 'off',
					'tab_slug'        	=> 'advanced',
					'toggle_slug'     	=> 'back_icon_settings',
				),
				'front_box'		=> array(
					'css'				=> array(
						'main'			=> array(
						    'border_radii'	=> "%%order_class%% .flipbox_front",
							'border_styles'	=> "%%order_class%%.et_pb_with_border .flipbox_front",
						),
					),
					'label_prefix'    	=> esc_html__( 'Front', 'divi-plus' ),
					'tab_slug'        	=> 'advanced',
					'toggle_slug'     	=> 'front_style_settings',
				),
				'back_box'		=> array(
					'css'				=> array(
						'main'			=> array(
						    'border_radii'	=> "%%order_class%% .flipbox_back",
							'border_styles'	=> "%%order_class%%.et_pb_with_border .flipbox_back",
						),
					),
					'label_prefix'    	=> esc_html__( 'Back', 'divi-plus' ),
					'tab_slug'        	=> 'advanced',
					'toggle_slug'     	=> 'back_style_settings',
				),
			),
			'box_shadow'  	=> array(
			    'default'     => false,
			    'front_box'   => array(
			        'css' => array(
						'main' => "%%order_class%% .dipl_flipbox_wrapper .flipbox_front",
					),
					'tab_slug'     => 'advanced',
				    'toggle_slug'  => 'front_style_settings',
			     ),
			     'back_box'   => array(
			        'css' => array(
						'main' => "%%order_class%% .dipl_flipbox_wrapper .flipbox_back",
					),
					'tab_slug'     => 'advanced',
				    'toggle_slug'  => 'back_style_settings',
			     ),
			),
			'height'        => false,
			'filters'       => false,
			'text'  		=> false,
        );
    }
    
    public function get_custom_css_fields_config() {
        return array(
        	/*Front CSS Fields*/
            'front_container_css' => array(
				'label'     => esc_html__( 'Front Container', 'divi-plus' ),
				'selector'  => '.flipbox_front'
			),
			'front_title_css' => array(
				'label'     => esc_html__( 'Front Title', 'divi-plus' ),
				'selector'  => ' .flipbox_front .et_pb_module_header'
			),
			'front_content_css' => array(
				'label'     => esc_html__( 'Front Content', 'divi-plus' ),
				'selector'  => '.flipbox_front .et_pb_flipbox_description'
			),
			'front_icon_css' => array(
				'label'     => esc_html__( 'Front Image/Icon', 'divi-plus' ),
				'selector'  => '.flipbox_front .et_pb_main_flipbox_image'
			),
			/*Back CSS Fields*/
			'back_container_css' => array(
				'label'     => esc_html__( 'Back Container', 'divi-plus' ),
				'selector'  => '.flipbox_back'
			),
			'back_title_css' => array(
				'label'     => esc_html__( 'Back Title', 'divi-plus' ),
				'selector'  => '.flipbox_back .et_pb_module_header'
			),
			'back_content_css' => array(
				'label'     => esc_html__( 'Back Content', 'divi-plus' ),
				'selector'  => '.flipbox_back .et_pb_flipbox_description'
			),
			'back_icon_css' => array(
				'label'     => esc_html__( 'Back Image/Icon', 'divi-plus' ),
				'selector'  => '.flipbox_back .et_pb_main_flipbox_image'
			),
			'back_button_css' => array(
				'label'     => esc_html__( 'Back Button', 'divi-plus' ),
				'selector'  => '.flipbox_back .et_pb_flipbox_button_back .et_pb_button'
			),
        );
    }

	public function get_fields() {
	    $et_accent_color = et_builder_accent_color();
		
		$flip_box_fields = array(
			'flipbox_layout' => array(
				'label'                 => esc_html__( 'Select Layout', 'divi-plus' ),
				'type'                  => 'select',
				'option_category'       => 'layout',
				'options'               => array(
					'layout1'       => esc_html__( 'Flip', 'divi-plus' ),
					'layout2'       => esc_html__( '3D Cube', 'divi-plus' ),
				),
				'default'               => 'layout1',
				'tab_slug'              => 'general',
				'toggle_slug'           => 'flipbox_layout',
				'description'           => esc_html__( 'Here you can choose the layout for Flip Box.', 'divi-plus' ),
			),
			'layout1_flip_style' => array(
				'label'                 => esc_html__( 'Flip Direction', 'divi-plus' ),
				'type'                  => 'select',
				'option_category'       => 'layout',
				'options'               => array(
					'top'       => esc_html__( 'Top', 'divi-plus' ),
					'bottom'       => esc_html__( 'Bottom', 'divi-plus' ),
					'left'       => esc_html__( 'Left', 'divi-plus' ),
					'right'       => esc_html__( 'Right', 'divi-plus' ),
					'diagonalLeft'       => esc_html__( 'Diagonal Left', 'divi-plus' ),
					'diagonalRight'       => esc_html__( 'Diagonal Right', 'divi-plus' ),
					'diagonalLeftInverted'       => esc_html__( 'Diagonal Left Inverted', 'divi-plus' ),
					'diagonalRightInverted'       => esc_html__( 'Diagonal Right Inverted', 'divi-plus' ),
				),
				'show_if'               => array(
				    'flipbox_layout'  => 'layout1',
				),
				'default'               => 'top',
				'tab_slug'              => 'general',
				'toggle_slug'           => 'flipbox_layout',
				'description'           => esc_html__( 'Here you can choose the flip direction.', 'divi-plus' ),
			),
			'layout1_3d_depth' => array(
				'label'                 => esc_html__( '3D Depth Effect', 'divi-plus' ),
				'type'                  => 'yes_no_button',
				'option_category'       => 'layout',
				'options'               => array(
					'off'   => esc_html__( 'No', 'divi-plus' ),
					'on'    => esc_html__( 'Yes', 'divi-plus' ),
				),
				'show_if'               => array(
				    'flipbox_layout'  => 'layout1',
				),
				'default'               => 'on',
				'tab_slug'              => 'general',
				'toggle_slug'           => 'flipbox_layout',
				'description'           => esc_html__( 'This option enable 3D depth effect on flip.', 'divi-plus' ),
			),
			'layout1_shake_effect' => array(
				'label'                 => esc_html__( 'Shake on Flip', 'divi-plus' ),
				'type'                  => 'yes_no_button',
				'option_category'       => 'layout',
				'options'               => array(
					'off'   => esc_html__( 'No', 'divi-plus' ),
					'on'    => esc_html__( 'Yes', 'divi-plus' ),
				),
				'show_if'               => array(
				    'flipbox_layout'  => 'layout1',
				),
				'default'               => 'off',
				'tab_slug'              => 'general',
				'toggle_slug'           => 'flipbox_layout',
				'description'           => esc_html__( 'This option will enable shake effect on flip.', 'divi-plus' ),
			),
			'layout2_flip_style' => array(
				'label'                 => esc_html__( 'Entrance Direction', 'divi-plus' ),
				'type'                  => 'select',
				'option_category'       => 'layout',
				'options'               => array(
					'top'       => esc_html__( 'Top', 'divi-plus' ),
					'bottom'       => esc_html__( 'Bottom', 'divi-plus' ),
					'left'       => esc_html__( 'Left', 'divi-plus' ),
					'right'       => esc_html__( 'Right', 'divi-plus' ),
				),
				'show_if'               => array(
				    'flipbox_layout'  => 'layout2',
				),
				'default'               => 'top',
				'tab_slug'              => 'general',
				'toggle_slug'           => 'flipbox_layout',
				'description'           => esc_html__( 'Here you can choose the entrance direction of the back part.', 'divi-plus' ),
			),
			'flip_speed' => array(
				'label'                 => esc_html__( 'Flip Speed(in ms)', 'divi-plus' ),
				'type'                  => 'range',
				'option_category'       => 'layout',
				'validate_unit'         => true,
				'range_settings'        => array(
					'min'   => '100',
					'max'   => '10000',
					'step'  => '100',
				),
				'default'               => '700ms',
				'tab_slug'              => 'general',
				'toggle_slug'           => 'flipbox_layout',
				'description'           => esc_html__( 'Define the Flip speed(in ms).', 'divi-plus' ),
			),
			'front_title' => array(
				'label'                 => esc_html__( 'Title', 'divi-plus' ),
				'type'                  => 'text',
				'option_category'       => 'basic_option',
				'tab_slug'              => 'general',
				'toggle_slug'           => 'flipbox_content',
				'sub_toggle'			=> 'front_data',
				'description'           => esc_html__( 'The front title of your module.', 'divi-plus' ),
			),
			'front_content' => array(
				'label'                 => esc_html__( 'Content', 'divi-plus' ),
				'type'                  => 'textarea',
				'option_category'       => 'basic_option',
				'tab_slug'              => 'general',
				'toggle_slug'           => 'flipbox_content',
				'sub_toggle'			=> 'front_data',
				'description'           => esc_html__( 'Input the front text content for your module here.', 'divi-plus' ),
			),
			'back_title' => array(
				'label'                 => esc_html__( 'Title', 'divi-plus' ),
				'type'                  => 'text',
				'option_category'       => 'basic_option',
				'tab_slug'              => 'general',
				'toggle_slug'           => 'flipbox_content',
				'sub_toggle'			=> 'back_data',
				'description'           => esc_html__( 'The back title of your module.', 'divi-plus' ),
			),
			'content' => array(
				'label'                 => esc_html__( 'Content', 'divi-plus' ),
				'type'                  => 'tiny_mce',
				'option_category'       => 'basic_option',
				'tab_slug'              => 'general',
				'toggle_slug'           => 'flipbox_content',
				'sub_toggle'			=> 'back_data',
				'description'           => esc_html__( 'Input the back text content for your module here.', 'divi-plus' ),
			),
			'front_use_icon' => array(
				'label'                 => esc_html__( 'Use Icon on Front', 'divi-plus' ),
				'type'                  => 'yes_no_button',
				'option_category'       => 'basic_option',
				'options'               => array(
					'off'   => esc_html__( 'No', 'divi-plus' ),
					'on'    => esc_html__( 'Yes', 'divi-plus' ),
				),
				'default'               => 'off',
				'tab_slug'              => 'general',
				'toggle_slug'           => 'flipbox_elements',
				'sub_toggle'			=> 'front_elements',
				'description'           => esc_html__( 'Here you can choose whether icon set below should be used.', 'divi-plus' ),
			),
			'front_font_icon' => array(
				'label'                 => esc_html__( 'Front Icon', 'divi-plus' ),
				'type'                  => 'select_icon',
				'option_category'       => 'basic_option',
				'class'                 => array(
					'et-pb-font-icon'
				),
				'show_if'               => array(
				    'front_use_icon'  => 'on',
				),
				'tab_slug'              => 'general',
				'toggle_slug'           => 'flipbox_elements',
				'sub_toggle'			=> 'front_elements',
				'description'           => esc_html__( 'Choose an icon to display on frontside of your flip box.', 'divi-plus' ),
			),
			'front_image' => array(
				'label'                 => esc_html__( 'Front Image', 'divi-plus' ),
				'type'                  => 'upload',
				'option_category'       => 'basic_option',
				'upload_button_text'    => esc_attr__( 'Upload an image', 'divi-plus' ),
				'choose_text'           => esc_attr__( 'Choose an Image', 'divi-plus' ),
				'update_text'           => esc_attr__( 'Set As Image', 'divi-plus' ),
				'show_if'               => array(
				    'front_use_icon'  => 'off',
				),
				'tab_slug'              => 'general',
				'toggle_slug'           => 'flipbox_elements',
				'sub_toggle'			=> 'front_elements',
				'description'           => esc_html__( 'Upload an image to display on frontside of your flip box.', 'divi-plus' ),
			),
			'front_image_alt' => array(
				'label'                 => esc_html__( 'Front Image Alt Text', 'divi-plus' ),
				'type'                  => 'text',
				'option_category'       => 'basic_option',
				'show_if'               => array(
				    'front_use_icon'  => 'off',
				),
				'tab_slug'              => 'general',
				'toggle_slug'           => 'flipbox_elements',
				'sub_toggle'			=> 'front_elements',
				'description'           => esc_html__( 'Define the HTML ALT text for your image here.', 'divi-plus' ),
			),
			/*General - Elements(Back)*/
			'back_use_icon' => array(
				'label'                 => esc_html__( 'Use Icon on Back', 'divi-plus' ),
				'type'                  => 'yes_no_button',
				'option_category'       => 'basic_option',
				'options'               => array(
					'off'   => esc_html__( 'No', 'divi-plus' ),
					'on'    => esc_html__( 'Yes', 'divi-plus' ),
				),
				'default'               => 'off',
				'tab_slug'              => 'general',
				'toggle_slug'           => 'flipbox_elements',
				'sub_toggle'			=> 'back_elements',
				'description'           => esc_html__( 'Here you can choose whether icon set below should be used.', 'divi-plus' ),
			),
			'back_font_icon' => array(
				'label'                 => esc_html__( 'Back Icon', 'divi-plus' ),
				'type'                  => 'select_icon',
				'option_category'       => 'basic_option',
				'class'                 => array(
					'et-pb-font-icon'
				),
				'show_if'               => array(
				    'back_use_icon'  => 'on',
				),
				'tab_slug'              => 'general',
				'toggle_slug'           => 'flipbox_elements',
				'sub_toggle'			=> 'back_elements',
				'description'           => esc_html__( 'Choose an icon to display on backside of your flip box.', 'divi-plus' ),
			),
			'back_image' => array(
				'label'                 => esc_html__( 'Back Image', 'divi-plus' ),
				'type'                  => 'upload',
				'option_category'       => 'basic_option',
				'upload_button_text'    => esc_attr__( 'Upload an image', 'divi-plus' ),
				'choose_text'           => esc_attr__( 'Choose an Image', 'divi-plus' ),
				'update_text'           => esc_attr__( 'Set As Image', 'divi-plus' ),
				'show_if'               => array(
				    'back_use_icon'  => 'off',
				),
				'tab_slug'              => 'general',
				'toggle_slug'           => 'flipbox_elements',
				'sub_toggle'			=> 'back_elements',
				'description'           => esc_html__( 'Upload an image to display on backside of your flip box.', 'divi-plus' ),
			),
			'back_image_alt' => array(
				'label'                 => esc_html__( 'Back Image Alt Text', 'divi-plus' ),
				'type'                  => 'text',
				'option_category'       => 'basic_option',
				'show_if'               => array(
				    'back_use_icon'  => 'off',
				),
				'tab_slug'              => 'general',
				'toggle_slug'           => 'flipbox_elements',
				'sub_toggle'			=> 'back_elements',
				'description'           => esc_html__( 'Define the HTML ALT text for your image here.', 'divi-plus' ),
			),
			'back_button_display' => array(
				'label'                 => esc_html__( 'Display Button on Back', 'divi-plus' ),
				'type'                  => 'yes_no_button',
				'option_category'       => 'basic_option',
				'options'               => array(
					'off'   => esc_html__( 'No', 'divi-plus' ),
					'on'    => esc_html__( 'Yes', 'divi-plus' ),
				),
				'affects'               => array(
				    'custom_back_button',
				),
				'default'               => 'off',
				'tab_slug'              => 'general',
				'toggle_slug'           => 'flipbox_elements',
				'sub_toggle'			=> 'back_elements',
				'description'           => esc_html__( 'Here you can choose whether button should be used.', 'divi-plus' ),
			),
			'back_button_text' => array(
				'label'                 => esc_html__( 'Back Button Text', 'divi-plus' ),
				'type'                  => 'text',
				'option_category'       => 'basic_option',
				'show_if'               => array(
				    'back_button_display'  => 'on',
				),
				'tab_slug'              => 'general',
				'toggle_slug'           => 'flipbox_elements',
				'sub_toggle'			=> 'back_elements',
				'description'           => esc_html__( 'Here you can define custom button text.', 'divi-plus' ),
			),
			'back_button_url' => array(
				'label'                 => esc_html__( 'Back Button URL', 'divi-plus' ),
				'type'                  => 'text',
				'option_category'       => 'basic_option',
				'tab_slug'              => 'general',
				'show_if'               => array(
				    'back_button_display'  => 'on',
				),
				'dynamic_content' 		=> 'url',
				'toggle_slug'           => 'flipbox_elements',
				'sub_toggle'			=> 'back_elements',
				'description'           => esc_html__( 'Your button link, input your destination URL here.', 'divi-plus' ),
			),
			'back_button_target' => array(
				'label'                 => esc_html__( 'URL Opens in New Window', 'divi-plus' ),
				'type'                  => 'select',
				'option_category'       => 'configuration',
				'show_if'               => array(
				    'back_button_display'  => 'on',
				),
				'options'               => array(
					'off'       => esc_html__( 'In The Same Window', 'divi-plus' ),
					'on'       => esc_html__( 'In The New Tab', 'divi-plus' ),
				),
				'default'               => 'off',
				'tab_slug'              => 'general',
				'toggle_slug'           => 'flipbox_elements',
				'sub_toggle'			=> 'back_elements',
				'description'           => esc_html__( 'Here you can choose whether or not your button link opens in a new window', 'divi-plus' ),
			),
			'front_background_color' => array(
				'label'             => esc_html__( 'Front Background', 'divi-plus' ),
				'type'              => 'background-field',
				'base_name'         => 'front_background',
				'context'           => 'front_background_color',
				'custom_color'      => true,
				'background_fields' => $this->generate_background_options( "front_background", 'button', 'general', 'flipbox_background', 'front_background_color' ),
				'mobile_options'	=> true,
				'tab_slug'          => 'general',
				'toggle_slug'       => 'flipbox_background',
				'sub_toggle'		=> 'front',
				'description'		=> esc_html__( 'Adjust the background style of the frontside of your flip box by customizing the background color, gradient, and image.' ),
			),
			/*General - Background(Back)*/
			'back_background_color' => array(
				'label'             => esc_html__( 'Back Background', 'divi-plus' ),
				'type'              => 'background-field',
				'base_name'         => 'back_background',
				'context'           => 'back_background_color',
				'custom_color'      => true,
				'background_fields' => $this->generate_background_options( "back_background", 'button', 'general', 'flipbox_background', 'back_background_color' ),
				'mobile_options'	=> true,
				'tab_slug'          => 'general',
				'toggle_slug'       => 'flipbox_background',
				'sub_toggle'		=> 'back',
				'description'		=> esc_html__( 'Adjust the background style of the backside of your flip box by customizing the background color, gradient, and image.' ),
			),
			'front_icon_placement' => array(
				'label'                 => esc_html__( 'Image/Icon Placement', 'divi-plus' ),
				'type'                  => 'select',
				'option_category'       => 'layout',
				'options'               => array(
        			'top'   => esc_html__( 'Top', 'divi-plus' ),
        			'left'  => esc_html__( 'Left', 'divi-plus' ),
        			'right' => esc_html__( 'Right', 'divi-plus' ),
        		),
        		'default'               => 'top',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'front_icon_settings',
				'description'           => esc_html__( 'Here you can choose where to place the icon.', 'divi-plus' ),
			),
			'front_icon_color' => array(
				'label'                 => esc_html__( 'Icon Color', 'divi-plus' ),
				'type'                  => 'color-alpha',
				'show_if'               => array(
				    'front_use_icon'  => 'on',
				),
				'default'               => $et_accent_color,
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'front_icon_settings',
				'description'           => esc_html__('Here you can define a custom color for your icon.', 'divi-plus'),
			),
			'front_use_icon_font_size' => array(
				'label'                 => esc_html__( 'Use Icon Font Size', 'divi-plus' ),
				'type'                  => 'yes_no_button',
				'option_category'       => 'font_option',
				'options'               => array(
					'off'   => esc_html__( 'No', 'divi-plus' ),
					'on'    => esc_html__( 'Yes', 'divi-plus' )
				),
				'show_if'               => array(
				    'front_use_icon'  => 'on',
				),
				'default'               => 'off',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'front_icon_settings',
			),
			'front_icon_font_size' => array(
				'label'                 => esc_html__( 'Icon Font Size', 'divi-plus' ),
				'type'                  => 'range',
				'option_category'       => 'font_option',
				'range_settings'        => array(
					'min'   => '1',
					'max'   => '120',
					'step'  => '1',
				),
				'mobile_options'        => true,
				'show_if'               => array(
					'front_use_icon'  				=> 'on',
				    'front_use_icon_font_size'   	=> 'on',
				),
				'default'               => '32px',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'front_icon_settings',
			),
			'front_icon_font_size_last_edited' => array(
				'type'                  => 'skip',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'front_icon_settings',
			),
			'front_icon_font_size_tablet' => array(
				'type'                  => 'skip',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'front_icon_settings',
			),
			'front_icon_font_size_phone' => array(
				'type'                  => 'skip',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'front_icon_settings',
			),
			'front_style_icon' => array(
				'label'                 => esc_html__( 'Style Icon', 'divi-plus' ),
				'type'                  => 'yes_no_button',
				'option_category'       => 'configuration',
				'options'               => array(
					'off'   => esc_html__( 'No', 'divi-plus' ),
					'on'    => esc_html__( 'Yes', 'divi-plus' )
				),
				'show_if'               => array(
				    'front_use_icon'  => 'on',
				),
				'default'               => 'off',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'front_icon_settings',
				'description'           => esc_html__( 'Here you can choose whether icon set above should display within a shape.', 'divi-plus' ),
			),
			'front_icon_shape' => array(
				'label'                 => esc_html__( 'Shape', 'divi-plus' ),
				'type'                  => 'select',
				'option_category'       => 'configuration',
				'options'               => array(
					'use_square'    => esc_html__( 'Square', 'divi-plus' ),
					'use_circle'    => esc_html__( 'Circle', 'divi-plus' ),
					'use_hexagon'   => esc_html__( 'Hexagon', 'divi-plus' )
				),
				'show_if'               => array(
					'front_use_icon'  		=> 'on',
				    'front_style_icon'   	=> 'on',
				),
				'default' 				=> 'use_square',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'front_icon_settings',
				'description'           => esc_html__( 'Here you can choose shape.', 'divi-plus' ),
			),
			'front_shape_color' => array(
				'label'                 => esc_html__( 'Shape Background', 'divi-plus' ),
				'type'                  => 'color-alpha',
				'custom_color'          => true,
				'show_if'               => array(
					'front_use_icon'  		=> 'on',
				    'front_style_icon'  	=> 'on',
				),
				'default'               => '#000000',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'front_icon_settings',
				'description'           => esc_html__( 'Here you can define a custom color for the icon shape.', 'divi-plus' ),
			),
			'front_use_shape_border' => array(
				'label'                 => esc_html__( 'Display Shape Border', 'divi-plus' ),
				'type'                  => 'yes_no_button',
				'option_category'       => 'layout',
				'options'               => array(
					'off'   => esc_html__( 'No', 'divi-plus' ),
					'on'    => esc_html__( 'Yes', 'divi-plus' )
				),
				'show_if'               => array(
					'front_use_icon'  		=> 'on',
				    'front_style_icon'   	=> 'on',
				),
				'default'               => 'off',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'front_icon_settings',
				'description'           => esc_html__( 'Here you can choose whether if the icon border should display.', 'divi-plus' ),
			),
			'front_shape_border_color' => array(
				'label'                 => esc_html__( 'Shape Border Color', 'divi-plus' ),
				'type'                  => 'color-alpha',
				'custom_color'          => true,
				'show_if'               => array(
					'front_use_icon'  			=> 'on',
					'front_style_icon'    		=> 'on',
				    'front_use_shape_border'  	=> 'on',
				),
				'default'               => $et_accent_color,
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'front_icon_settings',
				'description'           => esc_html__( 'Here you can define a custom color for the icon border.', 'divi-plus' ),
			),
			'back_icon_placement' => array(
				'label'                 => esc_html__( 'Image/Icon Placement', 'divi-plus' ),
				'type'                  => 'select',
				'option_category'       => 'layout',
				'options'               => array(
        			'top'   => esc_html__( 'Top', 'divi-plus' ),
        			'left'  => esc_html__( 'Left', 'divi-plus' ),
        			'right' => esc_html__( 'Right', 'divi-plus' ),
        		),
        		'default'               => 'top',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'back_icon_settings',
				'description'           => esc_html__( 'Here you can choose where to place the icon.', 'divi-plus' ),
			),
			'back_icon_color' => array(
				'label'                 => esc_html__( 'Icon Color', 'divi-plus' ),
				'type'                  => 'color-alpha',
				'show_if'               => array(
				    'back_use_icon'  => 'on',
				),
				'default'               => $et_accent_color,
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'back_icon_settings',
				'description'           => esc_html__('Here you can define a custom color for your icon.', 'divi-plus'),
			),
			'back_use_icon_font_size' => array(
				'label'                 => esc_html__( 'Use Icon Font Size', 'divi-plus' ),
				'type'                  => 'yes_no_button',
				'option_category'       => 'font_option',
				'options'               => array(
					'off'   => esc_html__( 'No', 'divi-plus' ),
					'on'    => esc_html__( 'Yes', 'divi-plus' )
				),
				'show_if'               => array(
				    'back_use_icon'  => 'on',
				),
				'default'               => 'off',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'back_icon_settings',
			),
			'back_icon_font_size' => array(
				'label'                 => esc_html__( 'Icon Font Size', 'divi-plus' ),
				'type'                  => 'range',
				'option_category'       => 'font_option',
				'range_settings'        => array(
					'min'   => '1',
					'max'   => '120',
					'step'  => '1',
				),
				'mobile_options'        => true,
				'show_if'               => array(
					'back_use_icon'  			=> 'on',
				    'back_use_icon_font_size'   => 'on',
				),
				'default'               => '32px',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'back_icon_settings',
			),
			'back_icon_font_size_last_edited' => array(
				'type'                  => 'skip',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'back_icon_settings',
			),
			'back_icon_font_size_tablet' => array(
				'type'                  => 'skip',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'back_icon_settings',
			),
			'back_icon_font_size_phone' => array(
				'type'                  => 'skip',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'back_icon_settings',
			),
			'back_style_icon' => array(
				'label'                 => esc_html__( 'Style Icon', 'divi-plus' ),
				'type'                  => 'yes_no_button',
				'option_category'       => 'configuration',
				'options'               => array(
					'off'   => esc_html__( 'No', 'divi-plus' ),
					'on'    => esc_html__( 'Yes', 'divi-plus' )
				),
				'show_if'               => array(
				    'back_use_icon'  => 'on',
				),
				'default'               => 'off',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'back_icon_settings',
				'description'           => esc_html__( 'Here you can choose whether icon set above should display within a shape.', 'divi-plus' ),
			),
			'back_icon_shape' => array(
				'label'                 => esc_html__( 'Shape', 'divi-plus' ),
				'type'                  => 'select',
				'option_category'       => 'configuration',
				'options'               => array(
					'use_square'    => esc_html__( 'Square', 'divi-plus' ),
					'use_circle'    => esc_html__( 'Circle', 'divi-plus' ),
					'use_hexagon'   => esc_html__( 'Hexagon', 'divi-plus' )
				),
				'show_if'               => array(
					'back_use_icon'  	 => 'on',
				    'back_style_icon'    => 'on',
				),
				'default' 				=> 'use_square',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'back_icon_settings',
				'description'           => esc_html__( 'Here you can choose shape.', 'divi-plus' ),
			),
			'back_shape_color' => array(
				'label'                 => esc_html__( 'Shape Background', 'divi-plus' ),
				'type'                  => 'color-alpha',
				'custom_color'          => true,
				'show_if'               => array(
					'back_use_icon'     => 'on',
				    'back_style_icon'   => 'on',
				),
				'default'               => '#000000',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'back_icon_settings',
				'description'           => esc_html__( 'Here you can define a custom color for the icon shape.', 'divi-plus' ),
			),
			'back_use_shape_border' => array(
				'label'                 => esc_html__( 'Display Shape Border', 'divi-plus' ),
				'type'                  => 'yes_no_button',
				'option_category'       => 'layout',
				'options'               => array(
					'off'   => esc_html__( 'No', 'divi-plus' ),
					'on'    => esc_html__( 'Yes', 'divi-plus' )
				),
				'show_if'               => array(
					'back_use_icon'      => 'on',
				    'back_style_icon'    => 'on',
				),
				'default'               => 'off',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'back_icon_settings',
				'description'           => esc_html__( 'Here you can choose whether if the icon border should display.', 'divi-plus' ),
			),
			'back_shape_border_color' => array(
				'label'                 => esc_html__( 'Shape Border Color', 'divi-plus' ),
				'type'                  => 'color-alpha',
				'custom_color'          => true,
				'show_if'               => array(
					'back_use_icon'  		 => 'on',
					'back_style_icon'     	 => 'on',
				    'back_use_shape_border'  => 'on',
				),
				'default'               => $et_accent_color,
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'back_icon_settings',
				'description'           => esc_html__( 'Here you can define a custom color for the icon border.', 'divi-plus' ),
			),
			/*Advanced - Sizing*/
			'front_image_max_width' => array(
				'label'                 => esc_html__( 'Front Image Width', 'divi-plus' ),
				'type'                  => 'range',
				'option_category'       => 'layout',
				'mobile_options'        => true,
				'validate_unit'         => true,
				'allow_empty'           => true,
				'range_settings'        => array(
					'min'   => '0',
					'max'   => '1100',
					'step'  => '1',
				),
				'show_if'               => array(
				    'front_use_icon'  => 'off',
				),
				'default' 				=> '150px',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'width',
				'description'           => esc_html__( 'Here you can set the minimum width of front image.', 'divi-plus' ),
			),
			'front_image_max_width_tablet' => array(
				'type'                  => 'skip',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'width',
			),
			'front_image_max_width_phone' => array(
				'type'                  => 'skip',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'width',
			),
			'front_image_max_width_last_edited' => array(
				'type'                  => 'skip',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'width',
			),
			'front_image_alignment' => array(
				'label'                 => esc_html__( 'Front Image Alignment', 'divi-plus' ),
				'type'                  => 'text_align',
				'option_category'       => 'layout',
				'options'               => et_builder_get_text_orientation_options( array( 'justified' ) ),
				'mobile_options'        => true,
				'show_if'               => array(
				    'front_use_icon' => 'off',
				    'front_icon_placement' => 'top'
				),
				'default'				=> 'center',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'width',
				'description'           => esc_html__( 'Here you can set the alignment of front image.', 'divi-plus' ),
			),
			'front_image_alignment_tablet' => array(
				'type'                  => 'skip',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'width',
			),
			'front_image_alignment_phone' => array(
				'type'                  => 'skip',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'width',
			),
			'front_image_alignment_last_edited' => array(
				'type'                  => 'skip',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'width',
			),
			'back_image_max_width' => array(
				'label'                 => esc_html__( 'Back Image Width', 'divi-plus' ),
				'type'                  => 'range',
				'option_category'       => 'layout',
				'mobile_options'        => true,
				'validate_unit'         => true,
				'allow_empty'           => true,
				'range_settings'        => array(
					'min'   => '64',
					'max'   => '1100',
					'step'  => '1',
				),
				'show_if'               => array(
				    'back_use_icon'  => 'off',
				),
				'default' 				=> '150px',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'width',
				'description'           => esc_html__( 'Here you can set the minimum width of back image.', 'divi-plus' ),
			),
			'back_image_max_width_tablet' => array(
				'type'                  => 'skip',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'width',
			),
			'back_image_max_width_phone' => array(
				'type'                  => 'skip',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'width',
			),
			'back_image_max_width_last_edited' => array(
				'type'                  => 'skip',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'width',
			),
			'back_image_alignment' => array(
				'label'                 => esc_html__( 'Back Image Alignment', 'divi-plus' ),
				'type'                  => 'text_align',
				'option_category'       => 'layout',
				'options'               => et_builder_get_text_orientation_options( array( 'justified' ) ),
				'mobile_options'        => true,
				'show_if'               => array(
				    'back_use_icon' => 'off',
				    'back_icon_placement' => 'top'
				),
				'default'				=> 'center',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'width',
				'description'           => esc_html__( 'Here you can set the alignment of back image.', 'divi-plus' ),
			),
			'back_image_alignment_tablet' => array(
				'type'                  => 'skip',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'width',
			),
			'back_image_alignment_phone' => array(
				'type'                  => 'skip',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'width',
			),
			'back_image_alignment_last_edited' => array(
				'type'                  => 'skip',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'width',
			),
			'content_max_width' => array(
				'label'                 => esc_html__( 'Content Width', 'divi-plus' ),
				'type'                  => 'range',
				'option_category'       => 'layout',
				'mobile_options'        => true,
				'validate_unit'         => true,
				'allow_empty'           => true,
				'range_settings'        => array(
					'min'   => '0',
					'max'   => '1100',
					'step'  => '1',
				),
				'default'               => '550px',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'width',
				'description'           => esc_html__( 'Here you can set the width of the Flip Box.', 'divi-plus' ),
			),
			'content_max_width_tablet' => array(
				'type'                  => 'skip',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'width',
			),
			'content_max_width_phone' => array(
				'type'                  => 'skip',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'width',
			),
			'content_max_width_last_edited' => array(
				'type'                  => 'skip',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'width',
			),
			'flipbox_min_height' => array(
				'label'                 => esc_html__( 'Min Height', 'divi-plus' ),
				'type'                  => 'range',
				'option_category'       => 'layout',
				'mobile_options'        => true,
				'validate_unit'         => true,
				'allow_empty'           => true,
				'range_settings'        => array(
					'min'   => '0',
					'max'   => '1000',
					'step'  => '1',
				),
				'default'               => '200px',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'width',
				'description'           => esc_html__( 'Increase or decrease the height of the Flip Box.', 'divi-plus' ),
			),
			'flipbox_min_height_tablet' => array(
				'type'                  => 'skip',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'width',
			),
			'flipbox_min_height_phone' => array(
				'type'                  => 'skip',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'width',
			),
			'flipbox_min_height_last_edited' => array(
				'type'                  => 'skip',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'width',
			),
			/*Content Alignmenr*/
			'front_content_align' => array(
				'label'                 => esc_html__( 'Front Content Alignment', 'divi-plus' ),
				'type'                  => 'select',
				'option_category'       => 'configuration',
				'options'               => array(
					'top'       => esc_html__( 'Top', 'divi-plus' ),
					'center'      => esc_html__( 'Center', 'divi-plus' ),
					'bottom'     => esc_html__( 'Bottom', 'divi-plus' ),
				),
				'default'               => 'center',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'front_style_settings',
				'description'            => esc_html__( 'This controls the content alignment of front box.', 'divi-plus' ),
			),
			'back_content_align' => array(
				'label'                 => esc_html__( 'Back Content Alignment', 'divi-plus' ),
				'type'                  => 'select',
				'option_category'       => 'configuration',
				'options'               => array(
					'top'       => esc_html__( 'Top', 'divi-plus' ),
					'center'      => esc_html__( 'Center', 'divi-plus' ),
					'bottom'     => esc_html__( 'Bottom', 'divi-plus' ),
				),
				'default'               => 'center',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'back_style_settings',
				'description'            => esc_html__( 'This controls the content alignment of back box.', 'divi-plus' ),
			),
			'animation' => array(
				'label'                 => esc_html__( 'Image/Icon Animation', 'divi-plus' ),
				'type'                  => 'select',
				'option_category'       => 'configuration',
				'options'               => array(
					'top'       => esc_html__( 'Top To Bottom', 'divi-plus' ),
					'left'      => esc_html__( 'Left To Right', 'divi-plus' ),
					'right'     => esc_html__( 'Right To Left', 'divi-plus' ),
					'bottom'    => esc_html__( 'Bottom To Top', 'divi-plus' ),
					'off'       => esc_html__( 'No Animation', 'divi-plus' ),
				),
				'default'               => 'top',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'animation',
				'description'            => esc_html__( 'This controls the direction of the lazy-loading animation.', 'divi-plus' ),
			),
			'disabled_on' => array(
				'label'                 => esc_html__( 'Disable on', 'divi-plus' ),
				'type'                  => 'multiple_checkboxes',
				'options'               => array(
					'phone'     => esc_html__( 'Phone', 'divi-plus' ),
					'tablet'    => esc_html__( 'Tablet', 'divi-plus' ),
					'desktop'   => esc_html__( 'Desktop', 'divi-plus' ),
				),
				'additional_att'        => 'disable_on',
				'option_category'       => 'configuration',
				'tab_slug'              => 'custom_css',
				'toggle_slug'           => 'visibility',
				'description'           => esc_html__( 'This will disable the module on selected devices', 'divi-plus' ),
			),
			'admin_label' => array(
				'label'                 => esc_html__( 'Admin Label', 'divi-plus' ),
				'type'                  => 'text',
				'tab_slug'              => 'general',
				'toggle_slug'           => 'admin_label',
				'description'           => esc_html__('This will change the label of the module in the builder for easy identification.', 'divi-plus'),
			),
			'module_id' => array(
				'label'                 => esc_html__( 'CSS ID', 'divi-plus' ),
				'type'                  => 'text',
				'option_category'       => 'configuration',
				'option_class'          => 'et_pb_custom_css_regular',
				'tab_slug'              => 'custom_css',
				'toggle_slug'           => 'classes',
			),
			'module_class' => array(
				'label'                 => esc_html__( 'CSS Class', 'divi-plus' ),
				'type'                  => 'text',
				'option_category'       => 'configuration',
				'option_class'          => 'et_pb_custom_css_regular',
				'tab_slug'              => 'custom_css',
				'toggle_slug'           => 'classes',
			));
  			$flip_box_fields = array_merge( $flip_box_fields, $this->generate_background_options( 'front_background', 'skip', 'general', 'flipbox_background', 'front_background_color' ) );
  			$flip_box_fields = array_merge( $flip_box_fields, $this->generate_background_options( 'back_background', 'skip', 'general', 'flipbox_background', 'back_background_color' ) );
  			return $flip_box_fields;
	}

	public function render( $attrs, $content, $render_slug ) {

		$flipbox_layout 					= esc_attr( $this->props['flipbox_layout'] );
		$layout1_flip_style 				= esc_attr( $this->props['layout1_flip_style'] );
		$layout1_3d_depth 					= esc_attr( $this->props['layout1_3d_depth'] );
		$layout1_shake_effect				= esc_attr( $this->props['layout1_shake_effect'] );
		$layout2_flip_style 				= esc_attr( $this->props['layout2_flip_style'] );
		$flip_speed 						= esc_attr( $this->props['flip_speed'] );
		$front_title 						= wp_kses_post( $this->props['front_title'] );
		$front_content                      = wp_kses_post( $this->props['front_content'] );
		$back_title 						= wp_kses_post( $this->props['back_title'] );
		$front_use_icon 					= esc_attr( $this->props['front_use_icon'] );
		$front_font_icon 					= $this->props['front_font_icon'];
		$front_image 						= esc_attr( $this->props['front_image'] );
		$front_image_alt 					= esc_attr( $this->props['front_image_alt'] );
		$back_use_icon 						= esc_attr( $this->props['back_use_icon'] );
		$back_font_icon 					= $this->props['back_font_icon'];
		$back_image 						= esc_attr( $this->props['back_image'] );
		$back_image_alt 					= esc_attr( $this->props['back_image_alt'] );
		$back_button_display 				= esc_attr( $this->props['back_button_display'] );
		$back_button_use_icon 				= esc_attr( $this->props['back_button_use_icon'] );
		$back_button_text 					= esc_attr( $this->props['back_button_text'] );
		$back_button_url 					= esc_attr( $this->props['back_button_url'] );
		$back_button_target 				= esc_attr( $this->props['back_button_target'] );
		$custom_back_button					= esc_attr( $this->props['custom_back_button'] );
		$back_button_use_icon       		= esc_attr( $this->props['back_button_use_icon'] );
		$back_data_icon 					= $this->props['back_button_icon'];
		$front_icon_placement 				= esc_attr( $this->props['front_icon_placement'] );
		$front_icon_color 					= esc_attr( $this->props['front_icon_color'] );
		$front_use_icon_font_size 			= esc_attr( $this->props['front_use_icon_font_size'] );
		$front_icon_font_size 				= esc_attr( $this->props['front_icon_font_size'] );
		$front_icon_font_size_last_edited 	= esc_attr( $this->props['front_icon_font_size_last_edited'] );
		$front_icon_font_size_tablet 		= esc_attr( $this->props['front_icon_font_size_tablet'] );
		$front_icon_font_size_phone 		= esc_attr( $this->props['front_icon_font_size_phone'] );
		$front_style_icon 					= esc_attr( $this->props['front_style_icon'] );
		$front_icon_shape 					= esc_attr( $this->props['front_icon_shape'] );
		$front_shape_color 					= esc_attr( $this->props['front_shape_color'] );
		$front_use_shape_border 			= esc_attr( $this->props['front_use_shape_border'] );
		$front_shape_border_color 			= esc_attr( $this->props['front_shape_border_color'] );
		$back_icon_placement 				= esc_attr( $this->props['back_icon_placement'] );
		$back_icon_color 					= esc_attr( $this->props['back_icon_color'] );
		$back_use_icon_font_size 			= esc_attr( $this->props['back_use_icon_font_size'] );
		$back_icon_font_size 				= esc_attr( $this->props['back_icon_font_size'] );
		$back_icon_font_size_last_edited 	= esc_attr( $this->props['back_icon_font_size_last_edited'] );
		$back_icon_font_size_tablet 		= esc_attr( $this->props['back_icon_font_size_tablet'] );
		$back_icon_font_size_phone 			= esc_attr( $this->props['back_icon_font_size_phone'] );
		$back_style_icon 					= esc_attr( $this->props['back_style_icon'] );
		$back_icon_shape 					= esc_attr( $this->props['back_icon_shape'] );
		$back_shape_color 					= esc_attr( $this->props['back_shape_color'] );
		$back_use_shape_border 				= esc_attr( $this->props['back_use_shape_border'] );
		$back_shape_border_color 			= esc_attr( $this->props['back_shape_border_color'] );
		$front_image_max_width 				= esc_attr( $this->props['front_image_max_width'] );
		$front_image_max_width_tablet 		= esc_attr( $this->props['front_image_max_width_tablet'] );
		$front_image_max_width_phone 		= esc_attr( $this->props['front_image_max_width_phone'] );
		$front_image_max_width_last_edited 	= esc_attr( $this->props['front_image_max_width_last_edited'] );
		$front_image_alignment              = esc_attr( $this->props['front_image_alignment'] );
		$back_image_max_width 				= esc_attr( $this->props['back_image_max_width'] );
		$back_image_max_width_tablet 		= esc_attr( $this->props['back_image_max_width_tablet'] );
		$back_image_max_width_phone 		= esc_attr( $this->props['back_image_max_width_phone'] );
		$back_image_max_width_last_edited 	= esc_attr( $this->props['back_image_max_width_last_edited'] );
		$back_image_alignment               = esc_attr( $this->props['back_image_alignment'] );
		$content_max_width 					= esc_attr( $this->props['content_max_width'] );
		$content_max_width_tablet 			= esc_attr( $this->props['content_max_width_tablet'] );
		$content_max_width_phone 			= esc_attr( $this->props['content_max_width_phone'] );
		$content_max_width_last_edited 		= esc_attr( $this->props['content_max_width_last_edited'] );
		$flipbox_min_height 				= esc_attr( $this->props['flipbox_min_height'] );
		$flipbox_min_height_tablet 			= esc_attr( $this->props['flipbox_min_height_tablet'] );
		$flipbox_min_height_phone 			= esc_attr( $this->props['flipbox_min_height_phone'] );
		$flipbox_min_height_last_edited 	= esc_attr( $this->props['flipbox_min_height_last_edited'] );
		$animation 							= esc_attr( $this->props['animation'] );
		$module_id 							= esc_attr( $this->props['module_id'] );
		$module_class 						= esc_attr( $this->props['module_class'] );
		$front_header_level                 = esc_attr( $this->props['front_header_level'] );
		$back_header_level                  = esc_attr( $this->props['back_header_level'] );
		$front_content_align 				= esc_attr( $this->props['front_content_align'] );
		$back_content_align 				= esc_attr( $this->props['back_content_align'] );
		$processed_header_level_front 		= et_pb_process_header_level( esc_attr( $front_header_level ), 'h4' );
		$processed_header_level_back 		= et_pb_process_header_level( esc_attr( $back_header_level ), 'h4' );
		
		/*Default Animation Class Added for backward compatibility*/
		if ( empty( $animation ) ) {
			$animation = 'top';
		}

		wp_enqueue_script( 'elicus-images-loaded-script' );
		wp_enqueue_script( 'dipl-flipbox-custom', PLUGIN_PATH."includes/modules/FlipBox/dipl-flipbox-custom.min.js", array('jquery'), '1.0.1', true );
		$file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        wp_enqueue_style( 'dipl-flipbox-style', PLUGIN_PATH . 'includes/modules/FlipBox/' . $file . '.min.css', array(), '1.0.0' );


		if ( function_exists( 'et_get_dynamic_assets_path' ) && 'off' !== $animation ) {
			wp_enqueue_style( 'legacy_animations', et_get_dynamic_assets_path( true ) . '/css/legacy_animations.css' );
		}

		/*Advanced Flip Box Front Title*/
		if ( '' !== $front_title ) {
			$front_title = sprintf( '<%1$s class="et_pb_module_header">%2$s</%1$s>', $processed_header_level_front, $front_title );
		}

		/*Advanced Flip Box Back Title*/
		if ( '' !== $back_title ) {
			$back_title = sprintf( '<%1$s class="et_pb_module_header">%2$s</%1$s>', $processed_header_level_back, $back_title );
		}

		/*Advanced Flip Box Front Content reponsive CSS*/
		if ( '' !== $content_max_width_tablet || '' !== $content_max_width_phone || '' !== $content_max_width ) {
			$content_max_width_responsive_active = et_pb_get_responsive_status( $content_max_width_last_edited );

			$content_max_width_values = array(
				'desktop' => $content_max_width,
				'tablet'  => $content_max_width_responsive_active ? $content_max_width_tablet : '',
				'phone'   => $content_max_width_responsive_active ? $content_max_width_phone : '',
			);

			et_pb_responsive_options()->generate_responsive_css( $content_max_width_values, '%%order_class%% .dipl_flipbox_wrapper', 'max-width', $render_slug, '', 'range' );
		}

		if ( '' !== $flipbox_min_height_tablet || '' !== $flipbox_min_height_phone || '' !== $flipbox_min_height ) {
			$flipbox_min_height_responsive_active = et_pb_get_responsive_status( $flipbox_min_height_last_edited );

			$flipbox_min_height_values = array(
				'desktop' => $flipbox_min_height,
				'tablet'  => $flipbox_min_height_responsive_active ? $flipbox_min_height_tablet : '',
				'phone'   => $flipbox_min_height_responsive_active ? $flipbox_min_height_phone : '',
			);

			et_pb_responsive_options()->generate_responsive_css( $flipbox_min_height_values, '%%order_class%% .flipbox_side', 'min-height', $render_slug, '', 'range' );
		}


		/*Advanced Flip Box Back Content*/
		if ( '' !== $this->content ) {
			$back_content = sprintf( '%1$s', __( wp_kses_post( $this->content ), 'divi-plus' ) );
		} else {
			$back_content = '';
		} 

		/*Advanced Flip Box Front Image & Icon responsive CSS*/
		if ( 'off' !== $front_use_icon_font_size ) {
			$front_font_size_responsive_active = et_pb_get_responsive_status( $front_icon_font_size_last_edited );
			
			$front_font_size_values = array(
				'desktop'   => $front_icon_font_size,
				'tablet'    => $front_font_size_responsive_active ? $front_icon_font_size_tablet : '',
				'phone'     => $front_font_size_responsive_active ? $front_icon_font_size_phone : '',
			);
			et_pb_responsive_options()->generate_responsive_css( $front_font_size_values, '%%order_class%% .flipbox_front .et-pb-icon', 'font-size', $render_slug, '', 'range' );
		}
		
		$image_alignment_styles = array(
			'left'   => 'margin-left: 0px !important; margin-right: auto !important; text-align: left;',
			'center' => 'margin-left: auto !important; margin-right: auto !important; text-align: center;',
			'right'  => 'margin-left: auto !important; margin-right: 0px !important; text-align: right;',
		);

		$front_image_pathinfo 	= pathinfo( $front_image );
		$is_front_image_svg		= isset( $front_image_pathinfo['extension'] ) ? 'svg' === $front_image_pathinfo['extension'] : false;
		if ( 'off' === $front_use_icon && ('' !== $front_image_max_width_tablet || '' !== $front_image_max_width_phone || '' !== $front_image_max_width || $is_front_image_svg) ) {
			// SVG image overwrite. SVG image needs its value to be explicit
			if ( '' === $front_image_max_width && $is_front_image_svg ) {
				$image_max_width = '100%';
			}

			$front_image_max_width_selector = '%%order_class%% .flipbox_front .et_pb_main_flipbox_image';
			$front_image_max_width_property =  'width'; //$is_image_svg ? 'width' : 'max-width';

			$front_image_max_width_responsive_active = et_pb_get_responsive_status( $front_image_max_width_last_edited );

			$front_image_max_width_values = array(
				'desktop' => $front_image_max_width,
				'tablet'  => $front_image_max_width_responsive_active ? $front_image_max_width_tablet : '',
				'phone'   => $front_image_max_width_responsive_active ? $front_image_max_width_phone : '',
			);

			et_pb_responsive_options()->generate_responsive_css( $front_image_max_width_values, $front_image_max_width_selector, $front_image_max_width_property, $render_slug, '', 'range' );
			
			if ( 'top' === $front_icon_placement ) {
			    if ( isset( $image_alignment_styles[$front_image_alignment] ) ) {
    			    ET_Builder_Element::set_style( $render_slug, array(
        			    'selector'      => $front_image_max_width_selector,
        			    'declaration'   => $image_alignment_styles[$front_image_alignment]
            		) );
			    }
			    
			    
			    $front_image_alignment_tablet = $this->props['front_image_alignment_tablet'];
				if ( isset( $image_alignment_styles[ $front_image_alignment_tablet ] ) ) {
					ET_Builder_Element::set_style( $render_slug, array(
        			    'selector'    => $front_image_max_width_selector,
						'declaration' => $image_alignment_styles[$front_image_alignment_tablet],
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					) );
				}

				$front_image_alignment_phone = $this->props['front_image_alignment_phone'];
				if ( isset( $image_alignment_styles[ $front_image_alignment_phone ] ) ) {
					ET_Builder_Element::set_style( $render_slug, array(
        			    'selector'    => $front_image_max_width_selector,
						'declaration' => $image_alignment_styles[ $front_image_alignment_phone ],
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					) );
				}
			}
		}

		/*Advanced Flip Box back image & icon responsive CSS*/
		if ( 'off' !== $back_use_icon_font_size ) {
			$back_font_size_responsive_active = et_pb_get_responsive_status( $back_icon_font_size_last_edited );
			
			$back_font_size_values = array(
				'desktop'   => $back_icon_font_size,
				'tablet'    => $back_font_size_responsive_active ? $back_icon_font_size_tablet : '',
				'phone'     => $back_font_size_responsive_active ? $back_icon_font_size_phone : '',
			);

			et_pb_responsive_options()->generate_responsive_css( $back_font_size_values, '%%order_class%% .flipbox_back .et-pb-icon', 'font-size', $render_slug, '', 'range' );
		}

		$back_image_pathinfo 	= pathinfo( $back_image );
		$is_back_image_svg		= isset( $back_image_pathinfo['extension'] ) ? 'svg' === $back_image_pathinfo['extension'] : false;
		if ( 'off' === $back_use_icon && ('' !== $back_image_max_width_tablet || '' !== $back_image_max_width_phone || '' !== $back_image_max_width || $is_back_image_svg) ) {
			// SVG image overwrite. SVG image needs its value to be explicit
			if ( '' === $back_image_max_width && $is_back_image_svg ) {
				$image_max_width = '100%';
			}

			$back_image_max_width_selector = '%%order_class%% .flipbox_back .et_pb_main_flipbox_image';
			$back_image_max_width_property =  'width'; //$is_image_svg ? 'width' : 'max-width';

			$back_image_max_width_responsive_active = et_pb_get_responsive_status( $back_image_max_width_last_edited );

			$back_image_max_width_values = array(
				'desktop' => $back_image_max_width,
				'tablet'  => $back_image_max_width_responsive_active ? $back_image_max_width_tablet : '',
				'phone'   => $back_image_max_width_responsive_active ? $back_image_max_width_phone : '',
			);
			
			et_pb_responsive_options()->generate_responsive_css( $back_image_max_width_values, $back_image_max_width_selector, $back_image_max_width_property, $render_slug, '', 'range' );
			
			if ( 'top' === $back_icon_placement ) {
			    if ( isset( $image_alignment_styles[$back_image_alignment] ) ) {
    			    ET_Builder_Element::set_style( $render_slug, array(
        			    'selector'      => $back_image_max_width_selector,
        			    'declaration'   => $image_alignment_styles[$back_image_alignment]
            		) );
			    }
			    
			    $back_image_alignment_tablet = $this->props['back_image_alignment_tablet'];
				if ( isset( $image_alignment_styles[ $back_image_alignment_tablet ] ) ) {
					ET_Builder_Element::set_style( $render_slug, array(
        			    'selector'    => $back_image_max_width_selector,
						'declaration' => $image_alignment_styles[$back_image_alignment_tablet],
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					) );
				}

				$back_image_alignment_phone = $this->props['back_image_alignment_phone'];
				if ( isset( $image_alignment_styles[ $back_image_alignment_phone ] ) ) {
					ET_Builder_Element::set_style( $render_slug, array(
        			    'selector'    => $back_image_max_width_selector,
						'declaration' => $image_alignment_styles[ $back_image_alignment_phone ],
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					) );
				}
			}
		}

		/*Advanced Flip Box front image/icon Display*/
		if ( 'off' === $front_use_icon && '' !== $front_image ) {
			    $front_image_class    = ( '' !== trim( $front_image ) ) ? ' use-image-front' : '';
				$front_image          = ( '' !== trim( $front_image ) ) ? sprintf( '<img src="%1$s" alt="%2$s"/>', esc_url( $front_image ), esc_attr( $front_image_alt ) ) : '';
		} else {
			$front_icon_style     = sprintf( 'color: %1$s;', esc_attr( $front_icon_color ) );
			$front_image_class    = '';
			$front_icon_class     = '';
			$hexagon_start  = '';
			$hexagon_end    = '';
			
			if ( 'on' === $front_style_icon ) {
				
				if ( 'use_circle' === $front_icon_shape ) {
					$front_icon_class     = ' el-icon-circle';
					$front_icon_style    .= sprintf( ' background-color: %1$s;', esc_attr( $front_shape_color ) );
					if ( 'on' === $front_use_shape_border ) {
						$front_icon_style .= sprintf( ' border-color: %1$s;', esc_attr( $front_shape_border_color ) );
					}
				} else if ( 'use_square' === $front_icon_shape ) {
					$front_icon_class     = ' el-icon-square';
					$front_icon_style    .= sprintf( ' background-color: %1$s;', esc_attr( $front_shape_color ) );
					if ( 'on' === $front_use_shape_border ) {
						$front_icon_style .= sprintf( ' border-color: %1$s;', esc_attr( $front_shape_border_color ) );
					}
				} else if ( 'use_hexagon' === $front_icon_shape ) {
					$front_icon_class     = ' el-icon-hexagon';
					$hexagon_style  = sprintf( ' background-color: %1$s;', esc_attr( $front_shape_color ) );
					if ( 'on' === $front_use_shape_border ) {
						$hexagon_style  .= sprintf( ' border-color: %1$s;', esc_attr( $front_shape_border_color ) );
					}
					$hexagon_start = sprintf( '<div class="hexagon-wrapper et-waypoint%2$s"><div class="hex"><div class="hexagon' . ( 'on' === $front_use_shape_border ? ' et-pb-icon-shape-border' : '' ) . '" style="%1$s">', $hexagon_style, esc_attr( " et_pb_animation_{$animation}" ) );
					$hexagon_end   = '</div></div></div>';
				}	
			}

			$front_image = ( '' !== $front_font_icon ) ?
				sprintf( $hexagon_start . '<span class="et-pb-icon%7$s%6$s%2$s%3$s%4$s" style="%5$s">%1$s</span>' . $hexagon_end,
		            esc_attr( et_pb_process_font_icon( $front_font_icon ) ),
		            esc_attr( " et_pb_animation_{$animation}" ),
		            $front_icon_class,
		            ( 'on' === $front_style_icon && 'on' === $front_use_shape_border && 'use_hexagon' !== $front_icon_shape ? ' et-pb-icon-shape-border' : '' ),
		            $front_icon_style,
		            'on' === $front_style_icon && 'use_hexagon' !== $front_icon_shape && 'off' !== $animation ? ' et-waypoint' : '',
		            'off' === $front_style_icon && 'off' !== $animation ? ' et-waypoint' : ''
		       	) :
				'';

			if ( '' !== $front_font_icon ) {
				if ( class_exists( 'ET_Builder_Module_Helper_Style_Processor' ) && method_exists( 'ET_Builder_Module_Helper_Style_Processor', 'process_extended_icon' ) ) {
	                $this->generate_styles(
	                    array(
	                        'utility_arg'    => 'icon_font_family',
	                        'render_slug'    => $render_slug,
	                        'base_attr_name' => 'front_font_icon',
	                        'important'      => true,
	                        'selector'       => '%%order_class%% .flipbox_front .et-pb-icon',
	                        'processor'      => array(
	                            'ET_Builder_Module_Helper_Style_Processor',
	                            'process_extended_icon',
	                        ),
	                    )
	                );
	            }
			}
		}

		/*Advanced Flip Box back image/icon Display*/
		if ( 'off' === $back_use_icon && '' !== $back_image ) {
			    $back_image_class    = ( '' !== trim( $back_image ) ) ? ' use-image-back' : '';
				$back_image          = ( '' !== trim( $back_image ) ) ? sprintf( '<img src="%1$s" alt="%2$s"/>', esc_url( $back_image ), esc_attr( $back_image_alt ) ) : '';
		} else {
			$back_icon_style     = sprintf( 'color: %1$s;', esc_attr( $back_icon_color ) );
			$back_image_class    = '';
			$back_icon_class     = '';
			$hexagon_start  = '';
			$hexagon_end    = '';
			
			if ( 'on' === $back_style_icon ) {
				
				if ( 'use_circle' === $back_icon_shape ) {
					$back_icon_class     = ' el-icon-circle';
					$back_icon_style    .= sprintf( ' background-color: %1$s;', esc_attr( $back_shape_color ) );
					if ( 'on' === $back_use_shape_border ) {
						$back_icon_style .= sprintf( ' border-color: %1$s;', esc_attr( $back_shape_border_color ) );
					}
				} else if ( 'use_square' === $back_icon_shape ) {
					$back_icon_class     = ' el-icon-square';
					$back_icon_style    .= sprintf( ' background-color: %1$s;', esc_attr( $back_shape_color ) );
					if ( 'on' === $back_use_shape_border ) {
						$back_icon_style .= sprintf( ' border-color: %1$s;', esc_attr( $back_shape_border_color ) );
					}
				} else if ( 'use_hexagon' === $back_icon_shape ) {
					$back_icon_class     = ' el-icon-hexagon';
					$hexagon_style  = sprintf( ' background-color: %1$s;', esc_attr( $back_shape_color ) );
					if ( 'on' === $back_use_shape_border ) {
						$hexagon_style  .= sprintf( ' border-color: %1$s;', esc_attr( $back_shape_border_color ) );
					}
					$hexagon_start = sprintf( '<div class="hexagon-wrapper et-waypoint%2$s"><div class="hex"><div class="hexagon' . ( 'on' === $back_use_shape_border ? ' et-pb-icon-shape-border' : '' ) . '" style="%1$s">', $hexagon_style, esc_attr( " et_pb_animation_{$animation}" ) );
					$hexagon_end   = '</div></div></div>';
				}
				
			}

			$back_image = ( '' !== $back_font_icon ) ? sprintf( $hexagon_start . '<span class="et-pb-icon%7$s%6$s%2$s%3$s%4$s" style="%5$s">%1$s</span>' . $hexagon_end,
			            esc_attr( et_pb_process_font_icon( $back_font_icon ) ),
			            esc_attr( " et_pb_animation_{$animation}" ),
			            $back_icon_class,
			            ( 'on' === $back_style_icon && 'on' === $back_use_shape_border && 'use_hexagon' !== $back_icon_shape ? ' et-pb-icon-shape-border' : '' ),
			            $back_icon_style,
			            ( 'on' === $back_style_icon && 'use_hexagon' !== $back_icon_shape && 'off' !== $animation ? ' et-waypoint' : '' ),
			        	( 'off' === $back_style_icon && 'off' !== $animation ? ' et-waypoint' : '' ) ) : '';

			if ( '' !== $back_font_icon ) {
				if ( class_exists( 'ET_Builder_Module_Helper_Style_Processor' ) && method_exists( 'ET_Builder_Module_Helper_Style_Processor', 'process_extended_icon' ) ) {
	                $this->generate_styles(
	                    array(
	                        'utility_arg'    => 'icon_font_family',
	                        'render_slug'    => $render_slug,
	                        'base_attr_name' => 'back_font_icon',
	                        'important'      => true,
	                        'selector'       => '%%order_class%% .flipbox_back .et-pb-icon',
	                        'processor'      => array(
	                            'ET_Builder_Module_Helper_Style_Processor',
	                            'process_extended_icon',
	                        ),
	                    )
	                );
	            }
			}
		}

		/*Advanced Flip Box back Button Display*/
		if ( 'off' !== $back_button_display ) {
			$back_button_output = $this->render_button( array(
				'button_text'      => esc_html( $back_button_text ),
				'button_url'       => esc_url( $back_button_url ),
				'url_new_window'   => $back_button_target,
				'button_custom'    => $custom_back_button,
				'custom_icon'	   => $back_data_icon,
			) );
		} else {
			$back_button_output = '';
		}
		
 		if ( file_exists( plugin_dir_path( __FILE__ ) . 'layouts/' . $flipbox_layout . '.php' ) ) {
            include ( plugin_dir_path( __FILE__ ) . 'layouts/' . $flipbox_layout . '.php' );
        }

		$options = array(
            'flipbox_front' => 'front_background',
            'flipbox_back' => 'back_background',
            );
        
        $this->process_custom_background( $render_slug, $options );
        
		return 	$flipbox_content;
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
    					$gradient_properties_desktop = $gradient_properties;
    					$background_color_gradient_overlays_image_desktop = $background_color_gradient_overlays_image;
    				}
    
    				// Save background gradient into background images list.
    				$background_images[] = $this->get_gradient( $gradient_properties );
    
    				// Flag to inform BG Color if current module has Gradient.
    				$has_background_color_gradient = true;
    			} else if ( 'off' === $use_background_color_gradient ) {
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
    						$background_style                  .= 'background-color: initial; ';
    					}
    
    					$processed_background_blend = $background_blend;
    				}
    
    				// Only append background image when the image is exist.
    				$background_images[] = sprintf( 'url(%1$s)', esc_html( $background_image ) );
    			} else if ( '' === $background_image ) {
    				// Reset - If background image is disabled, ensure we reset prev background blend mode.
    				if ( '' !== $processed_background_blend ) {
    					$background_style .= 'background-blend-mode: normal; ';
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
    			} else if ( ! $is_desktop && $is_background_color_gradient_disabled && $is_background_image_disabled ) {
    				// Reset - If background image and gradient are disabled, reset current background image.
    				$background_image_style = 'initial';
    				$background_style .= 'background-image: initial !important;';
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
    					$current_media_query = 'tablet' === $device ? 'max_width_980' : 'max_width_767';
    					$background_style_attrs['media_query'] = ET_Builder_Element::get_media_query( $current_media_query );
    				}
    
    				ET_Builder_Element::set_style( $function_name, $background_style_attrs );
    			}
    		}
	    }
	}
}

$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
    $modules = explode( ',', $plugin_options['dipl-modules'] );
    if ( in_array( 'dipl_flip_box', $modules ) ) {
        new DIPL_FlipBox();
    }
} else {
    new DIPL_FlipBox();
}