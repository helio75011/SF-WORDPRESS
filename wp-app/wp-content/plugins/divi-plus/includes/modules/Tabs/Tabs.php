<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.5
 */
class DIPL_Tabs extends ET_Builder_Module {

	public $slug       = 'dipl_tabs';
    public $child_slug = 'dipl_tabs_item';
    public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name 			= esc_html__( 'DP Tabs', 'divi-plus' );
		$this->child_item_text  = esc_html__( 'Items', 'divi-plus' );
		$this->main_css_element = '%%order_class%%';
	} 
	
	public function get_settings_modal_toggles() {
		return array(
			'general'  => array(
                'toggles' => array(
					'main_content'   => array(
						'title'    => esc_html__( 'Configuration', 'divi-plus' ),
						'priority' => 1,
					),
                ),
            ),
			'advanced'   => array(
				'toggles' => array(
					'icon_setting'   => array(
						'title'    => esc_html__( 'Icon/Image', 'divi-plus' ),
						'priority' => 1,
					),
					'alignment'   => array(
						'title'    => esc_html__( 'Alignment', 'divi-plus' ),
						'priority' => 2,
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
						'main'      => "{$this->main_css_element} .dipl_tab_title",
						'hover'     => "{$this->main_css_element} .dipl_tabs_item_title:hover .dipl_tab_title",
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
						'main'      => "{$this->main_css_element} .dipl_active_tab .dipl_tab_title",
						'hover'     => "{$this->main_css_element} .dipl_active_tab:hover .dipl_tab_title",
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
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'body',
					'sub_toggle'     => 'quote',
				),
			),
			'max_width'      => array(
				'css' => array(
					'main'             => "{$this->main_css_element}",
					'module_alignment' => "{$this->main_css_element}",
				),
			),
			'borders' => array(
				'default' => array(
					'css' => array(
						'main' => array(
							'border_styles' => "{$this->main_css_element}",
							'border_radii'  => "{$this->main_css_element}",
						),
					),
				),
			),
			'box_shadow'     => array(
				'default' => array(
					'css' => array(
						'main'    => "{$this->main_css_element}",
					),
				),
			),
			'margin_padding' => array(
				'css'            => array(
                    'margin'    => "{$this->main_css_element}",
                    'padding'   => "{$this->main_css_element}",
					'important' => 'all',
				),
			),
			'text_shadow' => false,
			'background' => array(
				'use_background_video' => false,
			),
			'text'           => false,
			'link_options'   => false,
		);
	}

	public function get_fields() {
		
		$et_accent_color = et_builder_accent_color();

		$fields = array(
            'tab_trigger' => array(
                'label'             => esc_html__( 'Tab Trigger', 'divi-plus' ),
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
                'description'       => esc_html__( 'Here you can select the tab trigger.', 'divi-plus' ),
            ),
			'tab_orientation' => array(
                'label'             => esc_html__( 'Tab Orientation', 'divi-plus' ),
                'type'              => 'select',
                'option_category'   => 'basic_option',
                'options'           => array(
                    'horizontal' => esc_html__( 'Horizontal', 'divi-plus' ),
                    'vertical' => esc_html__( 'Vertical', 'divi-plus' ),
                ),
                'default'           => 'horizontal',
                'default_on_front'  => 'horizontal',
                'tab_slug'          => 'general',
                'toggle_slug'       => 'main_content',
                'description'       => esc_html__( 'Here you can select the tab orientation.', 'divi-plus' ),
            ),
            'horizontal_tab_alignment' => array(
                'label'             => esc_html__( 'Horizontal Tab Alignment', 'divi-plus' ),
                'type'              => 'select',
                'option_category'   => 'configuration',
                'options'           => array(
                    'top'      => esc_html__( 'Top', 'divi-plus' ),
                    'bottom'     => esc_html__( 'Bottom', 'divi-plus' ),
                ),
				'show_if'          => array(
					'tab_orientation' => 'horizontal',
				),
                'default'           => 'top',
                'default_on_front'  => 'top',
                'tab_slug'          => 'general',
                'toggle_slug'       => 'main_content',
                'description'       => esc_html__( 'Here you can select the horizontal tab alignment.', 'divi-plus' ),
            ),
			'fullwidth_tabs'     => array(
				'label'            => esc_html__( 'Fullwidth Tabs', 'divi-plus' ),
				'description'      => esc_html__( "When enabled, this will force your tab to extend 100% of the width of the container it's in.", 'divi-plus' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'layout',
				'options'          => array(
					'off' => et_builder_i18n( 'No' ),
					'on'  => et_builder_i18n( 'Yes' ),
				),
				'show_if'          => array(
					'tab_orientation' => 'horizontal',
				),
				'default_on_front' => 'off',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
			),
            'vertical_tab_alignment' => array(
                'label'             => esc_html__( 'Vertical Tab Alignment', 'divi-plus' ),
                'type'              => 'select',
                'option_category'   => 'configuration',
                'options'           => array(
                    'left'      => esc_html__( 'Left', 'divi-plus' ),
                    'right'     => esc_html__( 'Right', 'divi-plus' ),
                ),
				'show_if'          => array(
					'tab_orientation' => 'vertical',
				),
                'default'           => 'left',
                'default_on_front'  => 'left',
                'tab_slug'          => 'general',
                'toggle_slug'       => 'main_content',
                'description'       => esc_html__( 'Here you can select the vertical tab alignment.', 'divi-plus' ),
            ),
			'nav_bg_color' => array(
				'label'                 => esc_html__( 'Nav Background', 'divi-plus' ),
				'type'                  => 'background-field',
				'base_name'             => 'nav_bg',
				'context'               => 'nav_bg_color',
				'option_category'       => 'button',
				'custom_color'          => true,
				'background_fields'     => $this->generate_background_options( 'nav_bg', 'button', 'general', 'background', 'nav_bg_color' ),
				'hover'                 => 'tabs',
				'tab_slug'              => 'general',
				'toggle_slug'           => 'background',
				'description'           => esc_html__( 'Customize the background style of the product by adjusting the background color, gradient, and image.', 'divi-plus' ),
			),
			'content_bg_color' => array(
				'label'                 => esc_html__( 'Content Background', 'divi-plus' ),
				'type'                  => 'background-field',
				'base_name'             => 'content_bg',
				'context'               => 'content_bg_color',
				'option_category'       => 'button',
				'custom_color'          => true,
				'background_fields'     => $this->generate_background_options( 'content_bg', 'button', 'general', 'background', 'content_bg_color' ),
				'hover'                 => 'tabs',
				'tab_slug'              => 'general',
				'toggle_slug'           => 'background',
				'description'           => esc_html__( 'Customize the background style of the product by adjusting the background color, gradient, and image.', 'divi-plus' ),
			),
			'icon_color' => array(
				'label'          	=> esc_html__( 'Icon Color', 'divi-plus' ),
				'type'            	=> 'color-alpha',
				'hover'           	=> 'tabs',
				'mobile_options'  	=> true,
				'tab_slug'        	=> 'advanced',
				'toggle_slug'     	=> 'icon_setting',
				'description'     	=> esc_html__( 'Here you can define a custom color for your icon.', 'divi-plus' ),
			),
			'active_tab_icon_color'     => array(
				'label'          => esc_html__( 'Active Tab Icon Color', 'divi-plus' ),
				'type'           => 'color-alpha',
				'custom_color'   => true,
				'hover'          => 'tabs',
				'mobile_options' => true,
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'icon_setting',
				'description'    => esc_html__( 'Pick a color to use for tab icon within active tabs. You can assign a unique color to active tab icon to differentiate them from inactive tab icons.', 'divi-plus' ),
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
				'default'          => '28px',
				'default_on_front' => '28px',
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
				'default'        => '#dddddd',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'title_settings',
				'sub_toggle'     => 'active_title',
				'priority' 		 => 1,
				'description'    => esc_html__( 'Pick a color to be used for active tab backgrounds. You can assign a unique color to active tabs to differentiate them from inactive tabs.', 'divi-plus' ),
			),
			'tab_alignment' => array(
                'label'             => esc_html__( 'Tab Text Alignment', 'divi-plus' ),
                'type'              => 'select',
                'option_category'   => 'configuration',
                'options'           => array(
                    'left'      => esc_html__( 'Left', 'divi-plus' ),
                    'center'     => esc_html__( 'Center', 'divi-plus' ),
					'right'    => esc_html__( 'Right', 'divi-plus' ),
                ),
				'show_if'          => array(
					'tab_orientation' => 'vertical',
				),
				'mobile_options' 	=> true,
                'default'           => 'center',
                'default_on_front'  => 'center',
                'tab_slug'          => 'advanced',
                'toggle_slug'       => 'tab_alignment',
                'description'       => esc_html__( 'Here you can select the tab content alignment.', 'divi-plus' ),
            ),
            'icon_alignment' => array(
                'label'             => esc_html__( 'Icon/Image Alignment', 'divi-plus' ),
                'type'              => 'select',
                'option_category'   => 'configuration',
                'options'           => array(
					'top'       => esc_html__( 'Top', 'divi-plus' ),
                    'left'      => esc_html__( 'Left', 'divi-plus' ),
                    'right'     => esc_html__( 'Right', 'divi-plus' ),
					'bottom'    => esc_html__( 'Bottom', 'divi-plus' ),
                ),
				'default'           => 'right',
				'default_on_front'  => 'right',
                'tab_slug'          => 'advanced',
                'toggle_slug'       => 'tab_alignment',
                'description'       => esc_html__( 'Here you can select the icon/image alignment.', 'divi-plus' ),
            ),
			'tab_background_color' => array(
				'label'          => esc_html__( 'Tab Background Color', 'divi-plus' ),
				'type'           => 'color-alpha',
				'custom_color'   => true,
				'hover'          => 'tabs',
				'mobile_options' => true,
				'default'        => '#eeeeee',
				'default_on_front'  => '#eeeeee',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'title_settings',
				'sub_toggle'     => 'title',
				'priority' 		 => 1,
				'description'    => esc_html__( 'Pick a color to be used for inactive tab backgrounds. You can assign a unique color to inactive tabs to differentiate them from active tabs.', 'divi-plus' ),
			),
			'tab_max_width' => array(
				'label'                 => esc_html__( 'Tab Width', 'divi-plus' ),
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
				'show_if'          => array(
					'tab_orientation' => 'vertical',
				),
				'default' 				=> '150px',
				'default_on_front'  	=> '150px',
				'tab_slug'              => 'advanced',
				'toggle_slug'           => 'width',
				'description'           => esc_html__( 'Here you can set the width of tab.', 'divi-plus' ),
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
				'default'          => '32px',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'width',
				'description'      => esc_html__( 'Adjust the width of the image in the tab titles.', 'divi-plus' ),
			),
		);

		return array_merge(
			$fields,		
			$this->generate_background_options( 'nav_bg', 'skip', 'general', 'background', 'nav_bg_color' ),
			$this->generate_background_options( 'content_bg', 'skip', 'general', 'background', 'content_bg_color' )
		);
		
	}
	
	// Get Tabs Title
	public function before_render() {
		global $dipl_tabs_item_titles, $dipl_tabs_item_order_class, $dipl_tabs_item_icon_alignment;
		$dipl_tabs_item_titles			= array();
		$dipl_tabs_item_order_class 	= array();
	}
	
	// Render Output
	public function render( $attrs, $content, $render_slug ) {
		global $dipl_tabs_item_titles, $dipl_tabs_item_order_class, $dipl_tabs_item_icon_alignment;

		$tab_trigger        			= esc_attr( $this->props['tab_trigger'] );
		$tab_orientation        		= esc_attr( $this->props['tab_orientation'] );
		$horizontal_tab_alignment 		= esc_attr( $this->props['horizontal_tab_alignment'] );
		$fullwidth_tabs 				= esc_attr( $this->props['fullwidth_tabs'] );
		$vertical_tab_alignment 		= esc_attr( $this->props['vertical_tab_alignment'] );
		$fullwidth_tabs 				= esc_attr( $this->props['fullwidth_tabs'] );
		$tab_max_width 					= esc_attr( $this->props['tab_max_width'] );
		$image_width                	= esc_attr( $this->props['image_width'] );
		$icon_alignment 				= esc_attr( $this->props['icon_alignment'] );
		$tab_alignment					= et_pb_responsive_options()->get_property_values( $this->props,'tab_alignment' );
		
		wp_enqueue_script( 'dipl-tabs-custom', PLUGIN_PATH . 'includes/modules/Tabs/dipl-tabs-custom.min.js', array('jquery'), '1.0.1', true );
		$file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        wp_enqueue_style( 'dipl-tabs-style', PLUGIN_PATH . 'includes/modules/Tabs/' . $file . '.min.css', array(), '1.0.0' );

		if ( 'horizontal' === $tab_orientation ) {
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl_tab_wrapper',
					'declaration' => 'flex-direction: column;',
				)
			);
			
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl_tab_wrapper .dipl_tabs_controls',
					'declaration' => 'justify-content: center; width: 100%;',
				)
			);
			
			if ( 'bottom' === $horizontal_tab_alignment ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_tab_wrapper',
						'declaration' => 'flex-direction: column-reverse;',
					)
				);
			}

			if ( 'on' === $fullwidth_tabs ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_tab_wrapper .dipl_tabs_item_title',
						'declaration' => 'flex-grow: 1;',
					)
				);
			}
			
		}

		//Icon Alignment
		if ( 'right' === $icon_alignment ) {
			self::set_style(
				$render_slug,
				array(
					'selector'    => "{$this->main_css_element} .dipl_tabs_item_title .dipl_tab_icon, {$this->main_css_element} .dipl_tabs_item_title img",
					'declaration' => 'margin-left: 10px;'
				)
			);
		}
		
		
		if ( 'left' === $icon_alignment ) {
			self::set_style(
				$render_slug,
				array(
					'selector'    => "{$this->main_css_element} .dipl_tabs_item_title .dipl_tab_icon, {$this->main_css_element} .dipl_tabs_item_title img",
					'declaration' => 'margin-right: 10px; order: -1;'
				)
			);
		}

		if ( 'top' === $icon_alignment ) {
			self::set_style(
				$render_slug,
				array(
					'selector'    => "{$this->main_css_element} .dipl_tabs_item_title_inner_wrap",
					'declaration' => 'flex-direction: column-reverse;'
				)
			);
			self::set_style(
				$render_slug,
				array(
					'selector'    => "{$this->main_css_element} .dipl_tabs_item_title .dipl_tab_icon, {$this->main_css_element} .dipl_tabs_item_title img",
					'declaration' => 'margin-bottom: 10px;'
				)
			);
		}

		if ( 'bottom' === $icon_alignment ) {
			self::set_style(
				$render_slug,
				array(
					'selector'    => "{$this->main_css_element} .dipl_tabs_item_title_inner_wrap",
					'declaration' => 'flex-direction: column;'
				)
			);
			self::set_style(
				$render_slug,
				array(
					'selector'    => "{$this->main_css_element} .dipl_tabs_item_title .dipl_tab_icon, {$this->main_css_element} .dipl_tabs_item_title img",
					'declaration' => 'margin-top: 10px;'
				)
			);
		}
		
		if ( 'vertical' === $tab_orientation ) {		
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl_tab_wrapper .dipl_tabs_controls',
					'declaration' => 'flex-direction: column;',
				)
			); 
			
			self::set_style(
				$render_slug, array(
					'selector'    => '%%order_class%% .dipl_tab_wrapper',
					'declaration' => 'flex-direction: column;',
					'media_query' => self::get_media_query( 'max_width_767' ),
				)
			);
			
			if ( 'right' === $vertical_tab_alignment ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_tab_wrapper',
						'declaration' => 'flex-direction: row-reverse;',
					)
				);
			}

			// Tabs Max Width
			if ( '' !== $tab_max_width ) {
				$this->generate_styles(
					array(
						'base_attr_name' => 'tab_max_width',
						'selector'       => "{$this->main_css_element} .dipl_tabs_item_title",
						'css_property'   => 'width',
						'render_slug'    => $render_slug,
						'type'           => 'range',
					)
				);
		
			}

			foreach( $tab_alignment as &$align ) {
				$align = str_replace( array( 'left', 'center', 'right' ), array( 'flex-start', 'center', 'flex-end' ), $align);
			}
		
			if ( ! empty( array_filter( $tab_alignment ) ) ) {
				$align_property = in_array( $icon_alignment, array( 'top', 'bottom' ), true ) ? 'align-items' : 'justify-content';
				$tab_alignment_selector	= "{$this->main_css_element} .dipl_tabs_controls .dipl_tabs_item_title_inner_wrap";
				et_pb_responsive_options()->generate_responsive_css( $tab_alignment, $tab_alignment_selector, $align_property, $render_slug, '', 'type' );
			}
		}
		
		// Inactive Tab Background Color
		$this->generate_styles(
			array(
				'base_attr_name' => 'tab_background_color',
				'selector'       => '%%order_class%% .dipl_tabs_item_title:not(.dipl_active_tab)',
				'hover_selector' => '%%order_class%% .dipl_tabs_item_title:not(.dipl_active_tab):hover',
				'css_property'   => 'background-color',
				'important'		 => true,
				'priority'		 => 1000,
				'render_slug'    => $render_slug,
				'type'           => 'color',
			)
		);

		// Active Tab Background Color
		$this->generate_styles(
			array(
				'base_attr_name' => 'active_tab_background_color',
				'selector'       => '%%order_class%% .dipl_tabs_item_title.dipl_active_tab',
				'hover_selector' => '%%order_class%% .dipl_tabs_item_title.dipl_active_tab:hover',
				'css_property'   => 'background-color',
				'important'		 => true,
				'priority'		 => 999,
				'render_slug'    => $render_slug,
				'type'           => 'color',
			)
		);

		//Image Max Width
		if ( '' !== $image_width ) {
			$this->generate_styles(
				array(
					'base_attr_name' => 'image_width',
					'selector'       => "{$this->main_css_element} .dipl_tabs_item_title img",
					'css_property'   => 'width',
					'render_slug'    => $render_slug,
					'type'           => 'range',
				)
			);
		}

		// Icon Color.
		$this->generate_styles(
			array(
				'base_attr_name' => 'icon_color',
				'selector'       => "{$this->main_css_element} .dipl_tabs_item_title:not(.dipl_active_tab) .dipl_tab_icon",
				'hover_selector' => "{$this->main_css_element} .dipl_tabs_item_title:not(.dipl_active_tab):hover .dipl_tab_icon",
				'css_property'   => 'color',
				'important'		 => true,
				'render_slug'    => $render_slug,
				'type'           => 'color',
			)
		);
			
		$this->generate_styles(
			array(
				'base_attr_name' => 'active_tab_icon_color',
				'selector'       => "{$this->main_css_element} .dipl_tabs_item_title.dipl_active_tab .dipl_tab_icon",
				'hover_selector' => "{$this->main_css_element} .dipl_tabs_item_title.dipl_active_tab:hover .dipl_tab_icon",
				'css_property'   => 'color',
				'important'		 => true,
				'render_slug'    => $render_slug,
				'type'           => 'color',
			)
		);
		
		$this->generate_styles(
			array(
				'base_attr_name' => 'icon_font_size',
				'selector'       => "{$this->main_css_element} .dipl_tab_icon",
				'css_property'   => 'font-size',
				'important'		 => true,
				'render_slug'    => $render_slug,
				'type'           => 'range',
			)
		);

		$all_tabs_content = $this->content;

		$tabs = '';
		if ( ! empty( $dipl_tabs_item_titles ) ) {
			$i = 0;
			foreach ( $dipl_tabs_item_titles as $key => $titles ) {
				$tabs .= sprintf(
					'<div class="%2$s_title dipl_tabs_item_title%1$s" aria-controls="tab-%4$s">
						<div class="dipl_tabs_item_title_inner_wrap">
							%3$s
						</div>
					</div>',
					( 0 === $i ? ' dipl_active_tab' : '' ),
					esc_attr( ltrim( $dipl_tabs_item_order_class[ $i ] ) ),
					$titles,
					intval( $key ) + 1
				);
				++$i;
			}
		}

		// Module Output
		$output = sprintf(
			'<div class="dipl_tab_wrapper" data-trigger="%3$s">				
				<div class="dipl_tabs_controls">
					%1$s
				</div>
				<div class="dipl_tabs_content">
					%2$s
				</div>
			</div>',
			et_core_intentionally_unescaped( $tabs, 'html' ),
			et_core_intentionally_unescaped( $all_tabs_content, 'html' ),
			esc_attr( $tab_trigger )
		);
		
		$options = array(
			'normal' => array(
				'nav_bg'		=> "%%order_class%% .dipl_tabs_controls",
				'content_bg'	=> "%%order_class%% .dipl_tabs_content",
			),
		);
		
		$this->process_custom_background( $render_slug, $options );		

		return et_core_intentionally_unescaped( $output, 'html' );
					
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
	if ( in_array( 'dipl_tabs', $modules, true ) ) {
		new DIPL_Tabs();
	}
} else {
	new DIPL_Tabs();
}