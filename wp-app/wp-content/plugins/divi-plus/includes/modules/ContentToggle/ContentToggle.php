<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.4
 */
class DIPL_ContentToggle extends ET_Builder_Module {

	public $slug       = 'dipl_content_toggle';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name = esc_html__( 'DP Content Toggle', 'divi-plus' );
	}

	public function get_settings_modal_toggles() {
		return array(
			'general'  => array(
				'toggles' => array(
					'content_one' => array(
						'title'    => esc_html__( 'Content One', 'divi-plus' ),
						'priority' => 1,
					),
					'content_two' => array(
						'title'    => esc_html__( 'Content Two', 'divi-plus' ),
						'priority' => 2,
					),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'content_toggle_styling' => array(
						'title'    => esc_html__( 'Toggle Switch Styling', 'divi-plus' ),
						'priority' => 1,
					),
					'toggle_title_text_settings'         => array(
						'title'             => esc_html__( 'Toggle Title Text Setting', 'divi-plus' ),
						'priority'          => 2,
					),
					'toggle_label_text_settings'         => array(
						'title'             => esc_html__( 'Toggle Label Text Setting', 'divi-plus' ),
						'priority'          => 3,
						'sub_toggles'	=> array(
                        						'active_toggle'		=> array(
												'name'		=> 'Active Toggle',
											),
												'inactive_toggle'		=> array(
												'name'		=> 'Inactive Toggle',
											),
										),
                        'tabbed_subtoggles'	=> true,
					),
					'content_one_text_settings'         => array(
						'title'             => esc_html__( 'Content One Text Setting', 'divi-plus' ),
						'priority'          => 4,
					),
					'content_two_text_settings'         => array(
						'title'             => esc_html__( 'Content Two Text Setting', 'divi-plus' ),
						'priority'          => 5,
					),
				),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts'                 => array(
				'content_toogle_header' => array(
					'label'          => esc_html__( 'Title', 'divi-plus' ),
					'font_size'      => array(
						'default_on_front' => '18px',
						'range_settings'   => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'    => true,
					),
					'line_height'    => array(
						'default_on_front' => '1.5em',
						'range_settings'   => array(
							'min'  => '0.1',
							'max'  => '10',
							'step' => '0.1',
						),
					),
					'letter_spacing' => array(
						'default_on_front' => '0px',
						'range_settings'   => array(
							'min'  => '0',
							'max'  => '10',
							'step' => '1',
						),
						'validate_unit'    => true,
					),
					'header_level'   => array(
						'default' => 'h5',
					),
					'hide_text_align' => true,
					'hide_text_shadow' => true,
					'css'            => array(
						'main' => '%%order_class%% .dipl_toggle_title_value h1, %%order_class%% .dipl_toggle_title_value h2, %%order_class%% .dipl_toggle_title_value h3, %%order_class%% .dipl_toggle_title_value h4, %%order_class%% .dipl_toggle_title_value h5, %%order_class%% .dipl_toggle_title_value h6',
					),
					'toggle_slug'    => 'toggle_title_text_settings',
					'depends_on'      	=> array( 'select_toggle_layout' ),
					'depends_show_if' 	=> 'dipl_toggle_layout_one',
				),
				'content_toggle_active' => array(
					'label'          => esc_html__( 'Active', 'divi-plus' ),
					'font_size'      => array(
						'default_on_front' => '18px',
						'range_settings'   => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'    => true,
					),
					'line_height'    => array(
						'default_on_front' => '1.5em',
						'range_settings'   => array(
							'min'  => '0.1',
							'max'  => '10',
							'step' => '0.1',
						),
					),
					'letter_spacing' => array(
						'default_on_front' => '0px',
						'range_settings'   => array(
							'min'  => '0',
							'max'  => '10',
							'step' => '1',
						),
						'validate_unit'    => true,
					),
					'hide_text_align' => true,
					'hide_text_shadow' => true,
					'css'            => array(
						'main' => '%%order_class%% .dipl_switch .dipl_switch_trigger.dipl_active',
					),
					'toggle_slug'    => 'toggle_label_text_settings',
					'sub_toggle'    => 'active_toggle',
					'depends_on'      	=> array( 'select_toggle_layout' ),
					'depends_show_if' 	=> 'dipl_toggle_layout_two',
				),
				'content_toggle_inactive' => array(
					'label'          => esc_html__( 'Inactive', 'divi-plus' ),
					'font_size'      => array(
						'default_on_front' => '18px',
						'range_settings'   => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'    => true,
					),
					'line_height'    => array(
						'default_on_front' => '1.5em',
						'range_settings'   => array(
							'min'  => '0.1',
							'max'  => '10',
							'step' => '0.1',
						),
					),
					'letter_spacing' => array(
						'default_on_front' => '0px',
						'range_settings'   => array(
							'min'  => '0',
							'max'  => '10',
							'step' => '1',
						),
						'validate_unit'    => true,
					),
					'hide_text_align' => true,
					'hide_text_shadow' => true,
					'css'            => array(
						'main' => '%%order_class%% .dipl_switch .dipl_switch_trigger.dipl_inactive',
					),
					'toggle_slug'    => 'toggle_label_text_settings',
					'sub_toggle'    => 'inactive_toggle',
					'depends_on'      	=> array( 'select_toggle_layout' ),
					'depends_show_if' 	=> 'dipl_toggle_layout_two',
				),
				'content_toogle_content_one'   => array(
					'label'          => esc_html__( 'Content One', 'divi-plus' ),
					'font_size'      => array(
						'default_on_front' => '18px',
						'range_settings'   => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'    => true,
					),
					'line_height'    => array(
						'default_on_front' => '1.5em',
						'range_settings'   => array(
							'min'  => '0.1',
							'max'  => '10',
							'step' => '0.1',
						),
					),
					'letter_spacing' => array(
						'default_on_front' => '0px',
						'range_settings'   => array(
							'min'  => '0',
							'max'  => '10',
							'step' => '1',
						),
						'validate_unit'    => true,
					),
					'css'            => array(
						'main' => '%%order_class%% .dipl_content_one_toggle.dipl_content_toggle_text, %%order_class%% .dipl_content_one_toggle.dipl_content_toggle_text p',
					),
					'toggle_slug'    => 'content_one_text_settings',
				),
				'content_toogle_content_two'   => array(
					'label'          => esc_html__( 'Content Two', 'divi-plus' ),
					'font_size'      => array(
						'default_on_front' => '18px',
						'range_settings'   => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'    => true,
					),
					'line_height'    => array(
						'default_on_front' => '1.5em',
						'range_settings'   => array(
							'min'  => '0.1',
							'max'  => '10',
							'step' => '0.1',
						),
					),
					'letter_spacing' => array(
						'default_on_front' => '0px',
						'range_settings'   => array(
							'min'  => '0',
							'max'  => '10',
							'step' => '1',
						),
						'validate_unit'    => true,
					),
					'css'            => array(
						'main' => '%%order_class%% .dipl_content_two_toggle.dipl_content_toggle_text, %%order_class%% .dipl_content_two_toggle.dipl_content_toggle_text p',
					),
					'toggle_slug'    => 'content_two_text_settings',
				),
			),
			'custom_margin_padding' => array(
				'css' => array(
					'main'      => '%%order_class%%',
					'important' => 'all',
				),
			),
			'content_toggle_padding' => array(
                'content_toggle_wrapper' => array(
                    'margin_padding' => array(
                        'css' => array(
                            'margin'    => "%%order_class%% .dipl_toggle_button_wrapper",
                            'padding'   => "%%order_class%% .dipl_toggle_button_wrapper",
                            'important' => 'all',
                        ),
                    ),
                ),
            ),
			'max_width'             => array(
				'css' => array(
					'main'             => '%%order_class%%',
					'module_alignment' => '%%order_class%%',
				),
			),
			'filters'               => false,
			'text'                  => false,
			'borders'               => array(
				'default' => array(
					'css' => array(
						'main' => array(
							'border_styles' => '%%order_class%%',
							'border_radii'  => '%%order_class%%',
						),
					),
				),
			),
		);
	}

	public function get_fields() {
		$et_accent_color = et_builder_accent_color();
		$layouts[-1] = 'Select Layout';
		$args = array( 
					'post_type' => 'et_pb_layout',
    				'post_status' => 'publish', 
    				'posts_per_page' => -1
    			);
		$query = new WP_Query($args);

		while ($query->have_posts()) {
		    $query->the_post();
		    
		    $post_id = get_the_ID();
		    $post_title = get_the_title();
		    $layouts[$post_id] = $post_title;
		}
		wp_reset_postdata();

		$dipl_content_toggle_fields = array(
			'content_one_title'          => array(
				'label'           => esc_html__( 'Toggle Title', 'divi-plus' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'content_one',
				'description'     => esc_html__( 'Here you can input the text to be used for the toggle title of Content One.', 'divi-plus' ),
			),
			'select_content_one_type' => array(
                'label'                 => esc_html__( 'Content Type', 'divi-plus' ),
                'type'                  => 'select',
                'option_category'       => 'configuration',
                'options'               => array(
                    'dipl_content_one_text'   		=> esc_html__( 'Text', 'divi-plus' ),
                    'dipl_content_one_layout'       => esc_html__( 'Layout', 'divi-plus' ),
                ),
                'default'               => 'dipl_content_one_text',
                'tab_slug'              => 'general',
                'toggle_slug'           => 'content_one',
                'description'           => esc_html__( 'Here you can choose the Content One type.', 'divi-plus' ),
            ),
            'content_one_text'          => array(
				'label'           => esc_html__( 'Content', 'divi-plus' ),
				'type'            => 'textarea',
				'option_category' => 'basic_option',
				'show_if'           => array(
					'select_content_one_type' => 'dipl_content_one_text',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'content_one',
				'description'     => esc_html__( 'Here you can input the text to be used as content for Content One.', 'divi-plus' ),
			),
			'select_content_one_layout' => array(
                'label'                 => esc_html__( 'Select Layout', 'divi-plus' ),
                'type'                  => 'select',
                'option_category'       => 'configuration',
                'options'               => $layouts,
                'show_if'           => array(
					'select_content_one_type' => 'dipl_content_one_layout',
				),
                'default'               => '-1',
                'tab_slug'              => 'general',
                'toggle_slug'           => 'content_one',
                'description'           => esc_html__( 'Here you can choose the layout saved in your Divi library to be used for the Content One.', 'divi-plus' ),
            ),
            'content_two_title'          => array(
				'label'           => esc_html__( 'Toggle Title', 'divi-plus' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'content_two',
				'description'     => esc_html__( 'Here you can input the text to be used for the toggle title of Content Two.', 'divi-plus' ),
			),
			'select_content_two_type' => array(
                'label'                 => esc_html__( 'Content Type', 'divi-plus' ),
                'type'                  => 'select',
                'option_category'       => 'configuration',
                'options'               => array(
                    'dipl_content_two_text'   		=> esc_html__( 'Text', 'divi-plus' ),
                    'dipl_content_two_layout'       => esc_html__( 'Layout', 'divi-plus' ),
                ),
                'default'               => 'dipl_content_two_text',
                'tab_slug'              => 'general',
                'toggle_slug'           => 'content_two',
                'description'           => esc_html__( 'Here you can choose the Content Two type.', 'divi-plus' ),
            ),
            'content_two_text'          => array(
				'label'           => esc_html__( 'Content', 'divi-plus' ),
				'type'            => 'textarea',
				'option_category' => 'basic_option',
				'show_if'           => array(
					'select_content_two_type' => 'dipl_content_two_text',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'content_two',
				'description'     => esc_html__( 'Here you can input the text to be used as content for Content Two.', 'divi-plus' ),
			),
			'select_content_two_layout' => array(
                'label'                 => esc_html__( 'Select Layout', 'divi-plus' ),
                'type'                  => 'select',
                'option_category'       => 'configuration',
                'options'               => $layouts,
                'show_if'           => array(
					'select_content_two_type' => 'dipl_content_two_layout',
				),
                'default'               => '-1',
                'tab_slug'              => 'general',
                'toggle_slug'           => 'content_two',
                'description'           => esc_html__( 'Here you can choose the layout saved in your Divi library to be used for the Content Two.', 'divi-plus' ),
            ),
            'select_toggle_layout' => array(
                'label'                 => esc_html__( 'Select Toggle Layout', 'divi-plus' ),
                'type'                  => 'select',
                'option_category'       => 'configuration',
                'options'               => array(
                    'dipl_toggle_layout_one'   		=> esc_html__( 'Layout 1', 'divi-plus' ),
                    'dipl_toggle_layout_two'       => esc_html__( 'Layout 2', 'divi-plus' ),
                ),
                'affects'		=> array(
					'content_toogle_header_font',
					'content_toogle_header_text_align',
					'content_toogle_header_text_color',
					'content_toogle_header_font_size',
					'content_toogle_header_letter_spacing',
					'content_toogle_header_line_height',
					'content_toogle_header_text_shadow_style',
					'content_toogle_header_text_shadow_horizontal_length',
					'content_toogle_header_text_shadow_vertical_length',
					'content_toogle_header_text_shadow_blur_strength',
					'content_toogle_header_level',
					'content_toggle_active_font',
					'content_toggle_active_text_align',
					'content_toggle_active_text_color',
					'content_toggle_active_font_size',
					'content_toggle_active_letter_spacing',
					'content_toggle_active_line_height',
					'content_toggle_active_text_shadow_style',
					'content_toggle_active_text_shadow_horizontal_length',
					'content_toggle_active_text_shadow_vertical_length',
					'content_toggle_active_text_shadow_blur_strength',
					'content_toggle_inactive_font',
					'content_toggle_inactive_text_align',
					'content_toggle_inactive_text_color',
					'content_toggle_inactive_font_size',
					'content_toggle_inactive_letter_spacing',
					'content_toggle_inactive_line_height',
					'content_toggle_inactive_text_shadow_style',
					'content_toggle_inactive_text_shadow_horizontal_length',
					'content_toggle_inactive_text_shadow_vertical_length',
					'content_toggle_inactive_text_shadow_blur_strength'
				),
                'default'               => 'dipl_toggle_layout_one',
                'tab_slug'              => 'advanced',
                'toggle_slug'           => 'content_toggle_styling',
                'description'           => esc_html__( 'Here you can choose the Toggle Layout.', 'divi-plus' ),
            ),
            'toggle_alignment' => array(
                'label'                 => esc_html__( 'Switch Alignment', 'divi-plus' ),
                'type'                  => 'text_align',
                'option_category'       => 'layout',
                'options'               => et_builder_get_text_orientation_options( array( 'justified' ) ),
                'mobile_options'        => false,
                'tab_slug'     			=> 'advanced',
				'toggle_slug'  			=> 'content_toggle_styling',
                'description'           => esc_html__( 'Here you can select the alignment of the toggle switch in the left, right, or center of the module.', 'divi-plus' ),
            ),
            'switch_color_off'                => array(
				'label'        => esc_html__( 'Switch Color', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'default'      => '#000',
				'hover'        => 'tabs',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'content_toggle_styling',
				'description'  => esc_html__( 'Here you can select the custom color to be used for the circular switch icon during OFF state.', 'divi-plus' ),
			),
			'switch_color_on'                => array(
				'label'        => esc_html__( 'Switch Color(ON State)', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'default'      => '#eee',
				'hover'        => 'tabs',
				'show_if'           => array(
					'select_toggle_layout' => 'dipl_toggle_layout_one',
				),
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'content_toggle_styling',
				'description'  => esc_html__( 'Here you can select the custom color to be used for the circular switch icon during On state.', 'divi-plus' ),
			),
			'switch_bg_color_off'                => array(
				'label'        => esc_html__( 'Switch Background Color', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'default'      => '#eee',
				'hover'        => 'tabs',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'content_toggle_styling',
				'description'  => esc_html__( 'Here you can select the custom color to be used for the switch background during OFF state.', 'divi-plus' ),
			),
			'switch_bg_color_on'                => array(
				'label'        => esc_html__( 'Switch Background Color(ON State)', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'default'      => '#000',
				'hover'        => 'tabs',
				'show_if'           => array(
					'select_toggle_layout' => 'dipl_toggle_layout_one',
				),
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'content_toggle_styling',
				'description'  => esc_html__( 'Here you can select the custom color to be used for the switch background during On state.', 'divi-plus' ),
			),
			'content_toggle_wrapper_custom_margin' => array(
                'label'             => esc_html__( 'Toggle Margin', 'divi-plus' ),
                'type'              => 'custom_padding',
                'option_category'   => 'layout',
                'mobile_options'    => true,
                'hover'             => true,
                'default'           => '0|0|2%|0',
                'default_on_front'  => '0|0|2%|0',
                'tab_slug'     		=> 'advanced',
				'toggle_slug'  		=> 'margin_padding',
                'description'       => esc_html__( 'Margin adds extra space to the outside of the element, increasing the distance between the toggle and toggle content.', 'divi-plus' ),
            ),
			'content_toggle_wrapper_custom_padding' => array(
                'label'             => esc_html__( 'Toggle Padding', 'divi-plus' ),
                'type'              => 'custom_padding',
                'option_category'   => 'layout',
                'mobile_options'    => true,
                'hover'             => true,
                'default'           => '',
                'default_on_front'  => '',
                'tab_slug'     		=> 'advanced',
				'toggle_slug'  		=> 'margin_padding',
                'description'       => esc_html__( 'Padding adds extra space to the inside of the element, increasing the distance between the toggle and toggle content.', 'divi-plus' ),
            ),
			'__content_one_layout'                        => array(
				'type'                => 'computed',
				'computed_callback'   => array( 'DIPL_ContentToggle', 'dipl_content_one_layout' ),
				'computed_depends_on' => array(
					'select_content_one_type',
					'select_content_one_layout'
				),
			),
			'__content_two_layout'                        => array(
				'type'                => 'computed',
				'computed_callback'   => array( 'DIPL_ContentToggle', 'dipl_content_two_layout' ),
				'computed_depends_on' => array(
					'select_content_two_type',
					'select_content_two_layout'
				),
			),
		);

		return $dipl_content_toggle_fields;
	}

	public static function dipl_content_one_layout( $args = array() ) {
		$defaults = array(
			'select_content_one_type' => '',
			'select_content_one_layout'  => '',
		);

		$args = wp_parse_args( $args, $defaults );

		$select_content_one_type 	= esc_attr( $args['select_content_one_type'] );
		$select_content_one_layout  = intval( esc_attr( $args['select_content_one_layout'] ) );

		if( 'dipl_content_one_layout' === $select_content_one_type && '' !== $select_content_one_layout && -1 !== $select_content_one_layout ) {
			$output = do_shortcode( get_the_content( null, false, $select_content_one_layout ) );
		} else {
			$output = '';
		}
		return $output;
	}

	public static function dipl_content_two_layout( $args = array() ) {
		$defaults = array(
			'select_content_two_type' => '',
			'select_content_two_layout'  => '',
		);

		$args = wp_parse_args( $args, $defaults );

		$select_content_two_type 	= esc_attr( $args['select_content_two_type'] );
		$select_content_two_layout  = intval( esc_attr( $args['select_content_two_layout'] ) );

		if( 'dipl_content_two_layout' === $select_content_two_type && '' !== $select_content_two_layout && -1 !== $select_content_two_layout ) {
			$output = do_shortcode( get_the_content( null, false, $select_content_two_layout ) );
		} else {
			$output = '';
		}
		return $output;
	}

	public function render( $attrs, $content, $render_slug ) {
		$content_one_title 					= $this->props['content_one_title'];
		$select_content_one_type 			= $this->props['select_content_one_type'];
        $content_one_text 					= $this->props['content_one_text'];
		$select_content_one_layout 			= (int)$this->props['select_content_one_layout'];
        $content_two_title 					= $this->props['content_two_title'];
		$select_content_two_type 			= $this->props['select_content_two_type'];
        $content_two_text 					= $this->props['content_two_text'];
		$select_content_two_layout 			= (int)$this->props['select_content_two_layout'];
		$select_toggle_layout 				= esc_attr( $this->props['select_toggle_layout'] );
        $toggle_alignment					= esc_attr( $this->props['toggle_alignment'] ) ? esc_attr( $this->props['toggle_alignment'] ) : 'center';
        $switch_color_off					= $this->props['switch_color_off'];
        $switch_color_off_hover 			= esc_attr( $this->get_hover_value( 'switch_color_off' ) );
		$switch_color_on					= $this->props['switch_color_on'];
		$switch_color_on_hover 				= esc_attr( $this->get_hover_value( 'switch_color_on' ) );
		$switch_bg_color_off				= $this->props['switch_bg_color_off'];
		$switch_bg_color_off_hover 			= esc_attr( $this->get_hover_value( 'switch_bg_color_off' ) );
		$switch_bg_color_on					= $this->props['switch_bg_color_on'];
		$switch_bg_color_on_hover 			= esc_attr( $this->get_hover_value( 'switch_bg_color_on' ) );
		$content_toggle_header_level 		= $this->props['content_toogle_header_level'];

		$processed_content_toggle_header_level = et_pb_process_header_level( $content_toggle_header_level, 'h5' );
		$processed_content_toggle_header_level = esc_html( $processed_content_toggle_header_level );
		wp_enqueue_script( 'dipl-content-toggle-custom', PLUGIN_PATH . 'includes/modules/ContentToggle/dipl-content-toggle-custom.min.js', array('jquery'), '1.0.1', true );
		$file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        wp_enqueue_style( 'dipl-content-toggle-style', PLUGIN_PATH . 'includes/modules/ContentToggle/' . $file . '.min.css', array(), '1.0.0' );
		
		if ( '' !== $switch_color_off ) {
			self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_toggle_layout_one .dipl_switch::before',
						'declaration' => sprintf( 'background-color: %1$s;', esc_attr( $switch_color_off ) ),
					)
				);
			self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_toggle_layout_two .dipl_switch::before',
						'declaration' => sprintf( 'background-color: %1$s;', esc_attr( $switch_color_off ) ),
					)
				);
		}

		if ( '' !== $switch_color_off_hover ) {
			self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_toggle_layout_one .dipl_toggle_button:hover .dipl_switch::before',
						'declaration' => sprintf( 'background-color: %1$s;', esc_attr( $switch_color_off_hover ) ),
					)
				);
			self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_toggle_layout_two .dipl_switch:hover:before',
						'declaration' => sprintf( 'background-color: %1$s;', esc_attr( $switch_color_off_hover ) ),
					)
				);
		}

		if ( '' !== $switch_color_on ) {
			self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_toggle_layout_one .dipl_toggle_field:checked + .dipl_switch::before',
						'declaration' => sprintf( 'background-color: %1$s;', esc_attr( $switch_color_on ) ),
					)
				);
		}

		if ( '' !== $switch_color_on_hover ) {
			self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_toggle_layout_one  .dipl_toggle_button:hover .dipl_toggle_field:checked + .dipl_switch::before',
						'declaration' => sprintf( 'background-color: %1$s;', esc_attr( $switch_color_on_hover ) ),
					)
				);
		}

		if ( '' !== $switch_bg_color_off ) {
			self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_toggle_layout_one .dipl_toggle_bg',
						'declaration' => sprintf( 'background-color: %1$s;', esc_attr( $switch_bg_color_off ) ),
					)
				);
			self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_toggle_layout_two .dipl_switch',
						'declaration' => sprintf( 'background-color: %1$s;', esc_attr( $switch_bg_color_off ) ),
					)
				);
		}

		if ( '' !== $switch_bg_color_off_hover ) {
			self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_toggle_layout_one .dipl_toggle_button:hover .dipl_toggle_bg',
						'declaration' => sprintf( 'background-color: %1$s;', esc_attr( $switch_bg_color_off_hover ) ),
					)
				);
			self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_toggle_layout_two .dipl_switch:hover',
						'declaration' => sprintf( 'background-color: %1$s;', esc_attr( $switch_bg_color_off_hover ) ),
					)
				);
		}

		if ( '' !== $switch_bg_color_on ) {
			self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_toggle_layout_one .dipl_toggle_field:checked ~ .dipl_toggle_bg',
						'declaration' => sprintf( 'background-color: %1$s;', esc_attr( $switch_bg_color_on ) ),
					)
				);
		}

		if ( '' !== $switch_bg_color_on_hover ) {
			self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_toggle_layout_one .dipl_toggle_button:hover .dipl_toggle_field:checked ~ .dipl_toggle_bg',
						'declaration' => sprintf( 'background-color: %1$s;', esc_attr( $switch_bg_color_on_hover ) ),
					)
				);
		}

		$content_one = '';
		$content_two = '';

		if ( 'dipl_content_one_text' === $select_content_one_type && '' !== $content_one_text ) {
			$content_one = sprintf(
				'<div class="dipl_content_one_toggle dipl_content_toggle_text">
					%1$s
				</div>',
				$content_one_text
			);
		}

		if ( 'dipl_content_one_layout' === $select_content_one_type && '' !== $select_content_one_layout && -1 !== $select_content_one_layout ) {
			$content_one = sprintf(
				'<div class="dipl_content_one_toggle dipl_content_toggle_layout">
					%1$s
				</div>',
				do_shortcode( get_the_content( null, false, $select_content_one_layout ) )
			);
		}

		if ( 'dipl_content_two_text' === $select_content_two_type && '' !== $content_two_text ) {
			$content_two = sprintf(
				'<div class="dipl_content_two_toggle dipl_content_toggle_text">
					%1$s
				</div>',
				$content_two_text
			);
		}

		if ( 'dipl_content_two_layout' === $select_content_two_type && '' !== $select_content_two_layout && -1 !== $select_content_two_layout ) {
			$content_two = sprintf(
				'<div class="dipl_content_two_toggle dipl_content_toggle_layout">
					%1$s
				</div>',
				do_shortcode( get_the_content( null, false, $select_content_two_layout ) )
			);
		}

		if ( '' !== $content_one_title && 'dipl_toggle_layout_one' === $select_toggle_layout ) {
			$content_one_title = sprintf(
				'<div class="dipl_toggle_title_value dipl_toggle_off_value">
					<%2$s>%1$s</%2$s>
				</div>',
				$content_one_title,
				$processed_content_toggle_header_level
			);
		}

		if ( '' !== $content_two_title && 'dipl_toggle_layout_one' === $select_toggle_layout ) {
			$content_two_title =  sprintf(
				'<div class="dipl_toggle_title_value dipl_toggle_on_value">
					<%2$s>%1$s</%2$s>
				</div>',
				$content_two_title,
				$processed_content_toggle_header_level
			);
		}

		if( 'dipl_toggle_layout_one' === $select_toggle_layout ) {
			$toggle_layout = sprintf(
				'<div class="dipl_toggle_button_wrapper %4$s dipl_toggle_%3$s">
					%1$s
					<div class="dipl_toggle_button">
				        <div class="dipl_toggle_button_inner">
							<input class="dipl_toggle_field" type="checkbox" value="" />
							<div class="dipl_switch"></div>
				          	<div class="dipl_toggle_bg"></div>
				        </div>
			      </div>
	                %2$s
	           	</div>',
				$content_one_title,
				$content_two_title,
				$toggle_alignment,
				$select_toggle_layout
			);
		} elseif( 'dipl_toggle_layout_two' === $select_toggle_layout ) {
			$toggle_layout = sprintf(
				'<div class="dipl_toggle_button_wrapper %4$s dipl_toggle_%3$s">
					<input class="dipl_toggle_field" id="%5$s" type="checkbox" value="" />
					<label class="dipl_switch" for="%5$s">
						<div class="dipl_switch_trigger dipl_switch_one dipl_active" data-value="%1$s"></div>
					    <div class="dipl_switch_trigger dipl_switch_two dipl_inactive" data-value="%2$s"></div>
					</label>
				</div>', 
				$content_one_title,
				$content_two_title,
				$toggle_alignment,
				$select_toggle_layout,
				wp_rand()
			);
		}

		$this->process_advanced_margin_padding_css( $this, $render_slug, $this->margin_padding );
		if ( '' === $content_one && '' === $content_two ) {
			return '';
		} else {
			return sprintf(
				'<div class="dipl_content_toggle_wrapper">
					%1$s%2$s%3$s
				</div>',
				'' === $content_one || '' === $content_two ? '' : $toggle_layout,
				$content_one,
				$content_two
			);
		}
		
	}

	public function process_advanced_margin_padding_css( $module, $function_name, $margin_padding ) {
        $utils           = ET_Core_Data_Utils::instance();
        $all_values      = $module->props;
        $advanced_fields = $module->advanced_fields;

        // Disable if module doesn't set advanced_fields property and has no VB support.
        if ( ! $module->has_vb_support() && ! $module->has_advanced_fields ) {
            return;
        }

        $allowed_advanced_fields = array( 'content_toggle_padding' );
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

	protected function _render_module_wrapper( $output = '', $render_slug = '' ) {
		$wrapper_settings    = $this->get_wrapper_settings( $render_slug );
		$slug                = $render_slug;
		$outer_wrapper_attrs = $wrapper_settings['attrs'];
		$inner_wrapper_attrs = $wrapper_settings['inner_attrs'];

		/**
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

		/**
		 * Filters the HTML attributes for the module's inner wrapper. The dynamic portion of the
		 * filter name, '$slug', corresponds to the module's slug.
		 *
		 * @since 3.1
		 *
		 * @param string[]           $inner_wrapper_attrs
		 * @param ET_Builder_Element $module_instance
		 */
		$inner_wrapper_attrs = apply_filters( "et_builder_module_{$slug}_inner_wrapper_attrs", $inner_wrapper_attrs, $this );

		return sprintf(
			'<div%1$s>
				%2$s
				%3$s
				%4$s
				%5$s
				%6$s
			</div>',
			et_html_attrs( $outer_wrapper_attrs ),
			$wrapper_settings['parallax_background'],
			$wrapper_settings['video_background'],
			et_()->array_get( $wrapper_settings, 'video_background_tablet', '' ),
			et_()->array_get( $wrapper_settings, 'video_background_phone', '' ),
			$output
		);
	}
}
$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
    $modules = explode( ',', $plugin_options['dipl-modules'] );
    if ( in_array( 'dipl_content_toggle', $modules ) ) {
        new DIPL_ContentToggle();
    }
} else {
    new DIPL_ContentToggle();
}