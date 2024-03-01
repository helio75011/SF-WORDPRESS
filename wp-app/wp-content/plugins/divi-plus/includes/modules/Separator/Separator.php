<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.4
 */
class DIPL_Separator extends ET_Builder_Module {

	public $slug       = 'dipl_separator';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name = esc_html__( 'DP Separator', 'divi-plus' );
	}

	public function get_settings_modal_toggles() {
		return array(
			'general'  => array(
				'toggles' => array(
					'main_content' => array(
						'title'    => esc_html__( 'Separator Content', 'divi-plus' ),
						'priority' => 1,
					),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'separator_settings' => array(
						'title'    => esc_html__( 'Separator Styling', 'divi-plus' ),
						'priority' => 1,
					),
					'icon_settings'      => array(
						'title'    => esc_html__( 'Icon Styling', 'divi-plus' ),
						'priority' => 2,
					),
					'image_settings'     => array(
						'title'    => esc_html__( 'Image Styling', 'divi-plus' ),
						'priority' => 3,
					),
					'title_settings'     => array(
						'title'    => esc_html__( 'Title Styling', 'divi-plus' ),
						'priority' => 4,
					),
					'text_settings'      => array(
						'title'    => esc_html__( 'Text Styling', 'divi-plus' ),
						'priority' => 5,
					),
				),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts'                 => array(
				'title' => array(
					'label'           => esc_html__( 'Title', 'divi-plus' ),
					'font_size'       => array(
						'default'        => '24px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '120',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height'     => array(
						'default'        => '1.7em',
						'range_settings' => array(
							'min'  => '0',
							'max'  => '5',
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
						'main' => '%%order_class%% .dipl-text-wrapper h1,
									%%order_class%% .dipl-text-wrapper h2,
									%%order_class%% .dipl-text-wrapper h3,
									%%order_class%% .dipl-text-wrapper h4,
									%%order_class%% .dipl-text-wrapper h5,
									%%order_class%% .dipl-text-wrapper h6',
					),
					'important'       => 'all',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'title_settings',
				),
				'body'  => array(
					'label'           => esc_html__( 'Text Settings', 'divi-plus' ),
					'font_size'       => array(
						'default'        => '14px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height'     => array(
						'default'        => '1.7em',
						'range_settings' => array(
							'min'  => '0',
							'max'  => '5',
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
						'main' => '%%order_class%% .dipl-text-wrapper p,
									%%order_class%% .dipl-text-wrapper',
					),
					'depends_on'      => array( 'use_with' ),
					'depends_show_if' => 'text',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'text_settings',
				),
			),
			'custom_margin_padding' => array(
				'css' => array(
					'main'      => '%%order_class%%',
					'important' => 'all',
				),
			),
			'max_width'            => array(
				'extra' => array(
					'separator_image' => array(
						'options'              => array(
							'width' => array(
								'label'          => esc_html__( 'Image Width', 'divi-plus' ),
								'range_settings' => array(
									'min'  => 1,
									'max'  => 100,
									'step' => 1,
								),
								'hover'          => false,
								'default_unit'   => 'px',
								'default_tablet' => '',
								'default_phone'  => '',
								'show_if'        => array(
									'separator_type' => 'dipl_line',
									'use_with'       => 'image',
								),
								'tab_slug'       => 'advanced',
								'toggle_slug'    => 'image_settings',
							),
						),
						'use_max_width'        => false,
						'use_module_alignment' => false,
						'css'                  => array(
							'main' => "%%order_class%% .dipl_separator_image",
						),
					),
				),
				'css' => array(
					'main'             => '%%order_class%%',
					'module_alignment' => '%%order_class%%',
				),
			),
			'borders' => array(
				'default' => array(
					'css' => array(
						'main' => array(
							'border_styles' => '%%order_class%%',
							'border_radii'  => '%%order_class%%',
						),
					),
				),
			),
			'background' => array(
				'use_background_video' => false,
				'options' => array(
					'parallax' => array( 'type' => 'skip' ),
				),
			),
			'text'                  => false,
		);
	}

	public function get_fields() {
		$et_accent_color = et_builder_accent_color();

		return array(
			'separator_type'             => array(
				'label'           => esc_html__( 'Separator Type', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'dipl_line'   => esc_html__( 'Line', 'divi-plus' ),
					'dipl_shadow' => esc_html__( 'Shadow', 'divi-plus' ),
				),
				'default'         => 'dipl_line',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can choose Separator Type', 'divi-plus' ),
			),
			'line_type'                  => array(
				'label'           => esc_html__( 'Select Line Style', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'show_if'         => array(
					'separator_type' => 'dipl_line',
				),
				'options'         => array(
					'solid'  => esc_html__( 'Solid', 'divi-plus' ),
					'dashed' => esc_html__( 'Dashed', 'divi-plus' ),
					'dotted' => esc_html__( 'Dotted', 'divi-plus' ),
					'double' => esc_html__( 'Double', 'divi-plus' ),
					'ridge'  => esc_html__( 'Ridge', 'divi-plus' ),
					'groove' => esc_html__( 'Groove', 'divi-plus' ),
					'inset'  => esc_html__( 'Inset', 'divi-plus' ),
					'outset' => esc_html__( 'Outset', 'divi-plus' ),
					'none'   => esc_html__( 'None', 'divi-plus' ),
				),
				'mobile_options'  => true,
				'default'         => 'solid',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can choose Line Type', 'divi-plus' ),
			),
			'use_with'                   => array(
				'label'           => esc_html__( 'Use With', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'show_if'         => array(
					'separator_type' => 'dipl_line',
				),
				'options'         => array(
					'none' => esc_html__( 'Only Separator', 'divi-plus' ),
					'text' => esc_html__( 'Separator With Text', 'divi-plus' ),
					'icon' => esc_html__( 'Separator With Icon', 'divi-plus' ),
					'image' => esc_html__( 'Separator With Image', 'divi-plus' ),
				),
				'affects'         => array(
					'body',
				),
				'default'         => 'none',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can control text or icon display with separator', 'divi-plus' ),
			),
			'separator_image' => array(
                'label'              => esc_html__( 'Image', 'divi-plus' ),
                'type'               => 'upload',
                'option_category'    => 'basic_option',
                'upload_button_text' => esc_attr__( 'Upload an image', 'divi-plus' ),
                'choose_text'        => esc_attr__( 'Choose an Image', 'divi-plus' ),
                'update_text'        => esc_attr__( 'Set As Image', 'divi-plus' ),
                'show_if'         	 => array(
					'use_with'       => 'image',
					'separator_type' => 'dipl_line',
				),
                'tab_slug'           => 'general',
                'toggle_slug'        => 'main_content',
                'description'        => esc_html__( 'Here you can add an separator image image.', 'divi-plus'),
            ),
			'seprator_thickness'         => array(
				'label'           => esc_html__( 'Separator Thickness.', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'basic_option',
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),
				'mobile_options'  => true,
				'default'         => '3px',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'separator_settings',
				'description'     => esc_html__( 'Here you can choose Separator Weight', 'divi-plus' ),
			),
			'separator_color'            => array(
				'label'        => esc_html__( 'Separator Color', 'divi-plus' ),
				'type'         => 'color-alpha',
				'hover'        => 'tabs',
				'custom_color' => true,
				'default'      => '#2b87da',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'separator_settings',
				'description'  => esc_html__( 'Here you can control Separator Color', 'divi-plus' ),
			),
			'separator_gradient'         => array(
				'label'           => esc_html__( 'Use Gradient', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'font_option',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'show_if'         => array(
					'separator_type' => 'dipl_line',
					'line_type'      => 'solid',
				),
				'default'         => 'off',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'separator_settings',
				'description'     => esc_html__( 'Here you can control gradient display', 'divi-plus' ),
			),
			'grandient_color_1'          => array(
				'label'       	 	=> esc_html__( 'Gradient Color 1', 'divi-plus' ),
				'type'         		=> 'color-alpha',
				'hover'        		=> 'tabs',
				'custom_color' 		=> true,
				'show_if'      		=> array(
					'separator_type'     => 'dipl_line',
					'line_type'          => 'solid',
					'separator_gradient' => 'on',
				),
				'default'      		=> '#2b87da',
				'default_on_front'  => '#2b87da',
				'tab_slug'     		=> 'advanced',
				'toggle_slug'  		=> 'separator_settings',
				'description' 	 	=> esc_html__( 'Here you can select first Gradient Color', 'divi-plus' ),
			),
			'grandient_color_2'          => array(
				'label'        		=> esc_html__( 'Gradient Color 2', 'divi-plus' ),
				'type'         		=> 'color-alpha',
				'hover'        		=> 'tabs',
				'custom_color' 		=> true,
				'show_if'      		=> array(
					'separator_type'     => 'dipl_line',
					'line_type'          => 'solid',
					'separator_gradient' => 'on',
				),
				'default'      		=> '#29c4a9',
				'default_on_front'  => '#29c4a9',
				'tab_slug'     		=> 'advanced',
				'toggle_slug'  		=> 'separator_settings',
				'description'  		=> esc_html__( 'Here you can select second Gradient Color', 'divi-plus' ),
			),
			'gradient_type'              => array(
				'label'           	=> esc_html__( 'Gradient Type', 'divi-plus' ),
				'type'            	=> 'select',
				'option_category' 	=> 'layout',
				'options'         	=> array(
					'linear-gradient' => esc_html__( 'Linear', 'divi-plus' ),
					'radial-gradient' => esc_html__( 'Radial', 'divi-plus' ),
				),
				'show_if'         	=> array(
					'separator_type'     => 'dipl_line',
					'line_type'          => 'solid',
					'separator_gradient' => 'on',
				),
				'default'         	=> 'linear-gradient',
				'default_on_front'  => 'linear-gradient',
				'tab_slug'        	=> 'advanced',
				'toggle_slug'     	=> 'separator_settings',
				'description'     	=> esc_html__( 'Here you can select Gradient Type', 'divi-plus' ),
			),
			'linear_direction'           => array(
				'label'          	=> esc_html__( 'Gradient Direction', 'divi-plus' ),
				'type'           	=> 'range',
				'range_settings' 	=> array(
					'min'  => '1',
					'max'  => '360',
					'step' => '1',
				),
				'mobile_options' 	=> true,
				'show_if'        	=> array(
					'gradient_type'      => 'linear-gradient',
					'separator_type'     => 'dipl_line',
					'line_type'          => 'solid',
					'separator_gradient' => 'on',
				),
				'default'        	=> '180deg',
				'default_on_front'  => '180deg',
				'tab_slug'       	=> 'advanced',
				'toggle_slug'    	=> 'separator_settings',
				'description'    	=> esc_html__( 'Here you can select Linear Gradient Direction', 'divi-plus' ),
			),
			'radial_direction'           => array(
				'label'           	=> esc_html__( 'Gradient Direction', 'divi-plus' ),
				'type'            	=> 'select',
				'option_category' 	=> 'layout',
				'options'         	=> array(
					'circle at center'       => esc_html__( 'Center', 'divi-plus' ),
					'circle at top left'     => esc_html__( 'Top Left', 'divi-plus' ),
					'circle at top'          => esc_html__( 'Top', 'divi-plus' ),
					'circle at top right'    => esc_html__( 'Top Right', 'divi-plus' ),
					'circle at bottom right' => esc_html__( 'Bottom Right', 'divi-plus' ),
					'circle at bottom'       => esc_html__( 'Bottom', 'divi-plus' ),
					'circle at bottom left'  => esc_html__( 'Bottom Left', 'divi-plus' ),
					'circle at left'         => esc_html__( 'Left', 'divi-plus' ),
				),
				'show_if'         => array(
					'gradient_type'      => 'radial-gradient',
					'separator_type'     => 'dipl_line',
					'line_type'          => 'solid',
					'separator_gradient' => 'on',
				),
				'default'         	=> 'circle at center',
				'default_on_front'	=> 'circle at center',
				'tab_slug'        	=> 'advanced',
				'toggle_slug'     	=> 'separator_settings',
				'description'     	=> esc_html__( 'Here you can select Radial Gradient Direction', 'divi-plus' ),
			),
			'gradient_start_position'    => array(
				'label'          	=> esc_html__( 'Start Position', 'divi-plus' ),
				'type'           	=> 'range',
				'range_settings' 	=> array(
					'min'  => '0',
					'max'  => '100',
					'step' => '1',
				),
				'mobile_options' 	=> true,
				'show_if'        	=> array(
					'separator_type'     => 'dipl_line',
					'line_type'          => 'solid',
					'separator_gradient' => 'on',
				),
				'default'        	=> '0%',
				'default_on_front'	=> '0%',
				'tab_slug'       	=> 'advanced',
				'toggle_slug'    	=> 'separator_settings',
				'description'    	=> esc_html__( 'Here you can select Gradient Start Position', 'divi-plus' ),
			),
			'gradient_end_position'      => array(
				'label'          	=> esc_html__( 'End Position', 'divi-plus' ),
				'type'           	=> 'range',
				'range_settings' 	=> array(
					'min'  => '0',
					'max'  => '100',
					'step' => '1',
				),
				'mobile_options' 	=> true,
				'show_if'        	=> array(
					'separator_type'     => 'dipl_line',
					'line_type'          => 'solid',
					'separator_gradient' => 'on',
				),
				'default'        	=> '100%',
				'default_on_front'	=> '100%',
				'tab_slug'       	=> 'advanced',
				'toggle_slug'    	=> 'separator_settings',
				'description'    	=> esc_html__( 'Here you can select Gradient End Position', 'divi-plus' ),
			),
			'content'                    => array(
				'label'           => esc_html__( 'Separator Text', 'divi-plus' ),
				'type'            => 'tiny_mce',
				'show_if'         => array(
					'use_with'       => 'text',
					'separator_type' => 'dipl_line',
				),
				'option_category' => 'basic_option',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can set separator text', 'divi-plus' ),
			),
			'separator_image_alignment'             => array(
				'label'           => esc_html__( 'Image Position', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'center' => esc_html__( 'Center', 'divi-plus' ),
					'left'   => esc_html__( 'Left', 'divi-plus' ),
					'right'  => esc_html__( 'Right', 'divi-plus' ),
				),
				'show_if'         => array(
					'use_with'       => 'image',
					'separator_type' => 'dipl_line',
				),
				'default'         => 'center',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'image_settings',
				'description'     => esc_html__( 'Here you can select image position', 'divi-plus' ),
			),
			'font_icon'                  => array(
				'label'           => esc_html__( 'Icon', 'divi-plus' ),
				'type'            => 'select_icon',
				'option_category' => 'basic_option',
				'class'           => array(
					'et-pb-font-icon',
				),
				'default'		  => ET_BUILDER_PRODUCT_VERSION < '4.13.0' ? '%%40%%' : '&#x49;||divi||400',
				'show_if'         => array(
					'use_with'       => 'icon',
					'separator_type' => 'dipl_line',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can set separator icon', 'divi-plus' ),
			),
			'icon_placement'             => array(
				'label'           => esc_html__( 'Image/Icon Position', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'center' => esc_html__( 'Center', 'divi-plus' ),
					'left'   => esc_html__( 'Left', 'divi-plus' ),
					'right'  => esc_html__( 'Right', 'divi-plus' ),
				),
				'show_if'         => array(
					'use_with'       => 'icon',
					'separator_type' => 'dipl_line',
				),
				'default'         => 'center',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'icon_settings',
				'description'     => esc_html__( 'Here you can select icon position', 'divi-plus' ),
			),
			'icon_color'                 => array(
				'label'       => esc_html__( 'Icon Color', 'divi-plus' ),
				'type'        => 'color-alpha',
				'show_if'     => array(
					'use_with'       => 'icon',
					'separator_type' => 'dipl_line',
				),
				'default'     => $et_accent_color,
				'hover'       => 'tabs',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'icon_settings',
				'description' => esc_html__( 'Here you can define a custom color for your icon.', 'divi-plus' ),
			),
			'use_icon_font_size'         => array(
				'label'           => esc_html__( 'Use Icon Font Size', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'font_option',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'show_if'         => array(
					'use_with'       => 'icon',
					'separator_type' => 'dipl_line',
				),
				'default'         => 'off',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'icon_settings',
				'description'     => esc_html__( 'Here you can on icon font size control.', 'divi-plus' ),
			),
			'icon_font_size'             => array(
				'label'           => esc_html__( 'Icon Font Size', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'font_option',
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '120',
					'step' => '1',
				),
				'mobile_options'  => true,
				'show_if'         => array(
					'use_with'           => 'icon',
					'use_icon_font_size' => 'on',
					'separator_type'     => 'dipl_line',
				),
				'default'         => '32px',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'icon_settings',
				'description'     => esc_html__( 'Here you can define a icon font size.', 'divi-plus' ),
			),
			'style_icon'                 => array(
				'label'           => esc_html__( 'Style Icon', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'show_if'         => array(
					'use_with'       => 'icon',
					'separator_type' => 'dipl_line',
				),
				'default'         => 'off',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'icon_settings',
				'description'     => esc_html__( 'Here you can choose whether icon set above should display within a shape.', 'divi-plus' ),
			),
			'icon_shape'                 => array(
				'label'           => esc_html__( 'Shape', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'use_square'  => esc_html__( 'Square', 'divi-plus' ),
					'use_circle'  => esc_html__( 'Circle', 'divi-plus' ),
					'use_hexagon' => esc_html__( 'Hexagon', 'divi-plus' ),
				),
				'show_if'         => array(
					'use_with'       => 'icon',
					'style_icon'     => 'on',
					'separator_type' => 'dipl_line',
				),
				'default'         => 'use_square',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'icon_settings',
				'description'     => esc_html__( 'Here you can choose shape.', 'divi-plus' ),
			),
			'shape_color'                => array(
				'label'        => esc_html__( 'Shape Background', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'show_if'      => array(
					'use_with'       => 'icon',
					'style_icon'     => 'on',
					'separator_type' => 'dipl_line',
				),
				'default'      => $et_accent_color,
				'hover'        => 'tabs',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'icon_settings',
				'description'  => esc_html__( 'Here you can define a custom color for the icon shape.', 'divi-plus' ),
			),
			'use_shape_border'           => array(
				'label'           => esc_html__( 'Display Shape Border', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'layout',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'show_if'         => array(
					'use_with'       => 'icon',
					'style_icon'     => 'on',
					'separator_type' => 'dipl_line',
				),
				'default'         => 'off',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'icon_settings',
				'description'     => esc_html__( 'Here you can choose whether if the icon border should display.', 'divi-plus' ),
			),
			'shape_border_color'         => array(
				'label'        => esc_html__( 'Shape Border Color', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'show_if'      => array(
					'use_with'         => 'icon',
					'style_icon'       => 'on',
					'use_shape_border' => 'on',
					'separator_type'   => 'dipl_line',
				),
				'default'      => $et_accent_color,
				'hover'        => 'tabs',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'icon_settings',
				'description'  => esc_html__( 'Here you can define a custom color for the icon border.', 'divi-plus' ),
			),
			'icon_font_size_last_edited' => array(
				'type'        => 'skip',
				'show_if'     => array(
					'separator_type' => 'dipl_line',
				),
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'icon_settings',
			),
			'icon_font_size_tablet'      => array(
				'type'        => 'skip',
				'show_if'     => array(
					'separator_type' => 'dipl_line',
				),
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'icon_settings',
			),
			'icon_font_size_phone'       => array(
				'type'        => 'skip',
				'show_if'     => array(
					'separator_type' => 'dipl_line',
				),
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'icon_settings',
			),
		);
	}

	public function render( $attrs, $content, $render_slug ) {
		$multi_view               	= et_pb_multi_view_options( $this );
		$separator_type           	= $this->props['separator_type'];
		$line_type                	= $this->props['line_type'];
		$use_with                 	= $this->props['use_with'];
		$seprator_thickness       	= $this->props['seprator_thickness'];
		$separator_color          	= $this->props['separator_color'];
		$separator_color_hover    	= $this->get_hover_value( 'separator_color' );
		$separator_gradient       	= $this->props['separator_gradient'];
		$grandient_color_1        	= $this->props['grandient_color_1'];
		$grandient_color_1_hover  	= $this->get_hover_value( 'grandient_color_1' );
		$grandient_color_2        	= $this->props['grandient_color_2'];
		$grandient_color_2_hover  	= $this->get_hover_value( 'grandient_color_2' );
		$gradient_type            	= $this->props['gradient_type'];
		$linear_direction         	= $this->props['linear_direction'];
		$radial_direction         	= $this->props['radial_direction'];
		$gradient_start_position  	= $this->props['gradient_start_position'];
		$gradient_end_position    	= $this->props['gradient_end_position'];
		$font_icon                	= $this->props['font_icon'];
		$separator_image_alignment	= $this->props['separator_image_alignment'];
		$icon_color               	= $this->props['icon_color'];
		$icon_color_hover         	= $this->get_hover_value( 'icon_color' );
		$icon_placement           	= $this->props['icon_placement'];
		$use_icon_font_size       	= $this->props['use_icon_font_size'];
		$icon_font_size          	= $this->props['icon_font_size'];
		$style_icon               	= $this->props['style_icon'];
		$icon_shape               	= $this->props['icon_shape'];
		$shape_color              	= $this->props['shape_color'];
		$shape_color_hover        	= $this->get_hover_value( 'shape_color' );
		$use_shape_border         	= $this->props['use_shape_border'];
		$shape_border_color       	= $this->props['shape_border_color'];
		$shape_border_color_hover 	= $this->get_hover_value( 'shape_border_color' );
		$separator_content        	= '';
		$separator_icon           	= '';
		$alignment                	= '';
		$output                   	= '';

		wp_enqueue_script( 'dipl-separator-custom', PLUGIN_PATH."includes/modules/Separator/dipl-separator-custom.min.js", array('jquery'), '1.0.0', true );
		$file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        wp_enqueue_style( 'dipl-separator-style', PLUGIN_PATH . 'includes/modules/Separator/' . $file . '.min.css', array(), '1.0.0' );

		if ( 'dipl_line' === $separator_type ) {
			if ( 'off' !== $use_icon_font_size ) {
				$font_size_values = et_pb_responsive_options()->get_property_values( $this->props, 'icon_font_size' );
				et_pb_responsive_options()->generate_responsive_css( $font_size_values, '%%order_class%% .dipl-icon-wrapper .et-pb-icon', 'font-size', $render_slug, '', 'type' );
			}

			if ( '' !== $line_type ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%%.dipl_separator .dipl_line',
						'declaration' => sprintf( 'border-style: %1$s;', esc_attr( $line_type ) ),
					)
				);
			}

			if ( '' !== $seprator_thickness ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%%.dipl_separator .dipl_line',
						'declaration' => sprintf( 'border-top-width: %1$s;', esc_attr( $seprator_thickness ) ),
					)
				);
			}

			if ( '' !== $separator_color ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%%.dipl_separator .dipl_line',
						'declaration' => sprintf( 'border-color: %1$s;', esc_attr( $separator_color ) ),
					)
				);
			}

			if ( isset( $separator_color_hover ) ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%%.dipl_separator:hover .dipl_line',
						'declaration' => sprintf( 'border-color: %1$s;', esc_attr( $separator_color_hover ) ),
					)
				);
			}

			if ( 'on' === $separator_gradient && 'dipl_line' === $separator_type && 'solid' === $line_type ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%%.dipl_separator .dipl_line',
						'declaration' => sprintf( 'border-image-slice: 1;' ),
					)
				);

				if ( 'linear-gradient' === $gradient_type ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%%.dipl_separator .dipl_line',
							'declaration' => sprintf( 'border-image-source: linear-gradient(%1$s, %2$s %3$s, %4$s %5$s);', esc_attr( $linear_direction ), esc_attr( $grandient_color_1 ), esc_attr( $gradient_start_position ), esc_attr( $grandient_color_2 ), esc_attr( $gradient_end_position ) ),
						)
					);
				}

				if ( 'radial-gradient' === $gradient_type ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%%.dipl_separator .dipl_line',
							'declaration' => sprintf( 'border-image-source: radial-gradient(%1$s, %2$s %3$s, %4$s %5$s);', esc_attr( $radial_direction ), esc_attr( $grandient_color_1 ), esc_attr( $gradient_start_position ), esc_attr( $grandient_color_2 ), esc_attr( $gradient_end_position ) ),
						)
					);
				}

				if ( 'linear-gradient' === $gradient_type || isset( $grandient_color_1_hover ) || isset( $grandient_color_2_hover ) ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%%.dipl_separator:hover .dipl_line',
							'declaration' => sprintf( 'border-image-source: linear-gradient(%1$s, %2$s %3$s, %4$s %5$s);', esc_attr( $linear_direction ), esc_attr( $grandient_color_1_hover ), esc_attr( $gradient_start_position ), esc_attr( $grandient_color_2_hover ), esc_attr( $gradient_end_position ) ),
						)
					);
				}

				if ( 'radial-gradient' === $gradient_type || isset( $grandient_color_1_hover ) || isset( $grandient_color_2_hover ) ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%%.dipl_separator:hover .dipl_line',
							'declaration' => sprintf( 'border-image-source: radial-gradient(%1$s, %2$s %3$s, %4$s %5$s);', esc_attr( $linear_direction ), esc_attr( $grandient_color_1_hover ), esc_attr( $gradient_start_position ), esc_attr( $grandient_color_2_hover ), esc_attr( $gradient_end_position ) ),
						)
					);
				}
			}

			if ( 'text' === $use_with ) {
				$allowed_html_tags = array(
					'div'    => array(
						'class' => array(),
						'id'    => array(),
					),
					'h1'     => array(
						'class' => array(),
						'id'    => array(),
					),
					'h2'     => array(
						'class' => array(),
						'id'    => array(),
					),
					'h3'     => array(
						'class' => array(),
						'id'    => array(),
					),
					'h4'     => array(
						'class' => array(),
						'id'    => array(),
					),
					'h5'     => array(
						'class' => array(),
						'id'    => array(),
					),
					'h6'     => array(
						'class' => array(),
						'id'    => array(),
					),
					'p'      => array(
						'class' => array(),
						'id'    => array(),
					),
					'span'   => array(
						'class' => array(),
						'id'    => array(),
					),
					'a'      => array(
						'class' => array(),
						'id'    => array(),
						'href'  => array(),
						'title' => array(),
					),
					'br'     => array(),
					'em'     => array(),
					'strong' => array(),
				);
				$separator_content = '<div class="dipl-text-wrapper">' . wp_kses( $this->content, $allowed_html_tags ) . '</div>';
				$alignment         = $this->props['body_text_align'] ? $this->props['body_text_align'] : 'left';
			}

			if ( 'icon' === $use_with && '' !== $font_icon ) {
				$image_class   = '';
				$icon_class    = '';
				$hexagon_start = '';
				$hexagon_end   = '';

				if ( '' !== $icon_color ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl-icon-wrapper .et-pb-icon',
							'declaration' => sprintf( 'color: %1$s;', esc_attr( $icon_color ) ),
						)
					);
				}

				if ( isset( $icon_color_hover ) ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%%:hover .dipl-icon-wrapper .et-pb-icon',
							'declaration' => sprintf( 'color: %1$s;', esc_attr( $icon_color_hover ) ),
						)
					);
				}

				if ( 'on' === $style_icon ) {
					if ( 'use_circle' === $icon_shape ) {
						$icon_class = ' dipl-icon-circle';
					} elseif ( 'use_square' === $icon_shape ) {
						$icon_class = ' dipl-icon-square';
					} elseif ( 'use_hexagon' === $icon_shape ) {
						$icon_class    = ' dipl-icon-hexagon';
						$hexagon_start = sprintf( '<div class="hexagon-wrapper"><div class="hex"><div class="hexagon' . ( 'on' === $use_shape_border ? ' dipl-icon-shape-border' : '' ) . '">' );
						$hexagon_end   = '</div></div></div>';
					}

					if ( '' !== $shape_color ) {
						if ( 'use_hexagon' === $icon_shape ) {
							self::set_style(
								$render_slug,
								array(
									'selector'    => '%%order_class%% .hexagon',
									'declaration' => sprintf( 'background-color: %1$s;', esc_attr( $shape_color ) ),
								)
							);
						} else {
							self::set_style(
								$render_slug,
								array(
									'selector'    => '%%order_class%% .dipl-icon-wrapper .et-pb-icon',
									'declaration' => sprintf( 'background-color: %1$s;', esc_attr( $shape_color ) ),
								)
							);
						}
					}

					if ( isset( $shape_color_hover ) ) {
						if ( 'use_hexagon' === $icon_shape ) {
							self::set_style(
								$render_slug,
								array(
									'selector'    => '%%order_class%%:hover .hexagon',
									'declaration' => sprintf( 'background-color: %1$s;', esc_attr( $shape_color_hover ) ),
								)
							);
						} else {
							self::set_style(
								$render_slug,
								array(
									'selector'    => '%%order_class%%:hover .dipl-icon-wrapper .et-pb-icon',
									'declaration' => sprintf( 'background-color: %1$s;', esc_attr( $shape_color_hover ) ),
								)
							);
						}
					}

					if ( '' !== $shape_border_color && 'on' === $use_shape_border ) {
						if ( 'use_hexagon' === $icon_shape ) {
							self::set_style(
								$render_slug,
								array(
									'selector'    => '%%order_class%% .hex .dipl-icon-shape-border',
									'declaration' => sprintf( 'border-color: %1$s;', esc_attr( $shape_border_color ) ),
								)
							);
						} else {
							self::set_style(
								$render_slug,
								array(
									'selector'    => '%%order_class%% .dipl-icon-wrapper .et-pb-icon',
									'declaration' => sprintf( 'border-color: %1$s;', esc_attr( $shape_border_color ) ),
								)
							);
						}
					}

					if ( isset( $shape_border_color_hover ) && 'on' === $use_shape_border ) {
						if ( 'use_hexagon' === $icon_shape ) {
							self::set_style(
								$render_slug,
								array(
									'selector'    => '%%order_class%%:hover .hex .dipl-icon-shape-border',
									'declaration' => sprintf( 'border-color: %1$s;', esc_attr( $shape_border_color_hover ) ),
								)
							);
						} else {
							self::set_style(
								$render_slug,
								array(
									'selector'    => '%%order_class%%:hover .dipl-icon-wrapper .et-pb-icon',
									'declaration' => sprintf( 'border-color: %1$s;', esc_attr( $shape_border_color_hover ) ),
								)
							);
						}
					}
				}

				if ( class_exists( 'ET_Builder_Module_Helper_Style_Processor' ) && method_exists( 'ET_Builder_Module_Helper_Style_Processor', 'process_extended_icon' ) ) {
	                $this->generate_styles(
	                    array(
	                        'utility_arg'    => 'icon_font_family',
	                        'render_slug'    => $render_slug,
	                        'base_attr_name' => 'font_icon',
	                        'important'      => true,
	                        'selector'       => '%%order_class%% .dipl-icon-wrapper .et-pb-icon',
	                        'processor'      => array(
	                            'ET_Builder_Module_Helper_Style_Processor',
	                            'process_extended_icon',
	                        ),
	                    )
	                );
	            }

				$icon_container = ( '' !== $font_icon ) ? sprintf(
					'%2$s<span class="et-pb-icon %4$s%5$s">%1$s</span>%3$s',
					esc_attr( et_pb_process_font_icon( $font_icon ) ),
					$hexagon_start,
					$hexagon_end,
					$icon_class,
					( ( 'on' === $style_icon && 'on' === $use_shape_border && 'use_hexagon' !== $icon_shape ) ? ' dipl-icon-shape-border' : '' )
				) : '';

				$separator_icon = '<div class="dipl-icon-wrapper">' . $icon_container . '</div>';
				$alignment      = $icon_placement ? $icon_placement : 'center';
			}

			$separator_image = $multi_view->render_element(
				array(
					'tag'      => 'img',
					'attrs'    => array(
						'src'   => '{{separator_image}}',
						'class' => 'dipl_separator_image',
					),
					'required' => array(
						'separator_type' => 'dipl_line',
						'use_with'       => 'image',
						'separator_image',
					),
				)
			);

			if ( '' !== $separator_image ) {
				$alignment = $separator_image_alignment ? $separator_image_alignment : 'center';
			}

			if ( '' === $alignment ) {
				$alignment = ' align_none';
			} else {
				$alignment = ' align_' . $alignment;
			}

			$output = sprintf(
				'<div class="dipl_separator_container%3$s">
									<div class="dipl_line dipl_line_before"></div>
										%1$s
										%2$s
										%4$s
									<div class="dipl_line dipl_line_after"></div>
								</div>',
				et_core_intentionally_unescaped( $separator_content, 'html' ),
				et_core_intentionally_unescaped( $separator_icon, 'html' ),
				esc_attr( $alignment ),
				et_core_intentionally_unescaped( $separator_image, 'html' )
			);
		} else {
			if ( '' !== $seprator_thickness ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%%.dipl_separator .dipl_shadow',
						'declaration' => sprintf( 'height: %1$s;', esc_attr( $seprator_thickness ) ),
					)
				);
			}

			if ( '' !== $separator_color ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%%.dipl_separator .dipl_shadow',
						'declaration' => 'background: radial-gradient(ellipse at 50% -50% , ' . esc_attr( $separator_color ) . ' 0%, rgba(0, 0, 0, 0) 75%), repeat scroll;',
					)
				);
			}

			if ( isset( $separator_color_hover ) ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%%.dipl_separator:hover .dipl_shadow',
						'declaration' => 'background: radial-gradient(ellipse at 50% -50% , ' . esc_attr( $separator_color_hover ) . ' 0%, rgba(0, 0, 0, 0) 75%), repeat scroll;',
					)
				);
			}
			$output = '<div class="dipl_shadow"></div>';
		}
		return et_core_intentionally_unescaped( $output, 'html' );
	}
}
$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
    $modules = explode( ',', $plugin_options['dipl-modules'] );
    if ( in_array( 'dipl_separator', $modules ) ) {
        new DIPL_Separator();
    }
} else {
    new DIPL_Separator();
}