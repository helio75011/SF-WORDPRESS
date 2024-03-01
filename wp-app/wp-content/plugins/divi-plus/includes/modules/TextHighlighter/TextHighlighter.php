<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.4
 */
class DIPL_Text_Highlighter extends ET_Builder_Module {

	public $slug       = 'dipl_text_highlighter';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name = esc_html__( 'DP Text Highlighter', 'divi-plus' );
	}

	public function get_settings_modal_toggles() {
		return array(
			'general'  => array(
				'toggles' => array(
					'main_content' => array(
						'title'    => esc_html__( 'Content', 'divi-plus' ),
						'priority' => 1,
					),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'svg_settings'   => array(
						'title'    => esc_html__( 'Highlighter Shape Settings', 'divi-plus' ),
						'priority' => 1,
					),
					'text_settings'  => array(
						'title'             => esc_html__( 'Text Settings', 'divi-plus' ),
						'priority'          => 2,
						'sub_toggles'       => array(
							'global_settings' => array(
								'name' => 'Global',
							),
							'pre_part_text'   => array(
								'name' => 'Pre',
							),
							'main_part_text'  => array(
								'name' => 'Main',
							),
							'post_part_text'  => array(
								'name' => 'Post',
							),
						),
						'tabbed_subtoggles' => true,
					),
					'title_settings' => array(
						'title'             => esc_html__( 'Title Settings', 'divi-plus' ),
						'priority'          => 3,
						'sub_toggles'       => array(
							'global_settings' => array(
								'name' => 'Global',
							),
							'pre_part_text'   => array(
								'name' => 'Pre',
							),
							'main_part_text'  => array(
								'name' => 'Main',
							),
							'post_part_text'  => array(
								'name' => 'Post',
							),
						),
						'tabbed_subtoggles' => true,
					),
				),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts'          => array(
				'global_title' => array(
					'label'          => esc_html__( 'Global', 'divi-plus' ),
					'font_size'      => array(
						'default'        => '24px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '120',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height'    => array(
						'default'        => '1.7em',
						'range_settings' => array(
							'min'  => '0',
							'max'  => '5',
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
						'main' => '%%order_class%% .dipl_text_highlighter_wrapper.dipl_highlighter_heading h1,
									%%order_class%% .dipl_text_highlighter_wrapper.dipl_highlighter_heading h2,
									%%order_class%% .dipl_text_highlighter_wrapper.dipl_highlighter_heading h3,
									%%order_class%% .dipl_text_highlighter_wrapper.dipl_highlighter_heading h4,
									%%order_class%% .dipl_text_highlighter_wrapper.dipl_highlighter_heading h5,
									%%order_class%% .dipl_text_highlighter_wrapper.dipl_highlighter_heading h6',
					),
					'important'      => 'all',
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'title_settings',
					'sub_toggle'     => 'global_settings',
				),
				'pre_title'    => array(
					'label'           => esc_html__( 'Pre', 'divi-plus' ),
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
					'hide_text_align' => true,
					'css'             => array(
						'main' => '%%order_class%% .dipl_highlighter_heading h1 .dipl_text_highlighter_pre_inner_wrapper,
									%%order_class%% .dipl_highlighter_heading h2 .dipl_text_highlighter_pre_inner_wrapper,
									%%order_class%% .dipl_highlighter_heading h3 .dipl_text_highlighter_pre_inner_wrapper,
									%%order_class%% .dipl_highlighter_heading h4 .dipl_text_highlighter_pre_inner_wrapper,
									%%order_class%% .dipl_highlighter_heading h5 .dipl_text_highlighter_pre_inner_wrapper,
									%%order_class%% .dipl_highlighter_heading h6 .dipl_text_highlighter_pre_inner_wrapper',
					),
					'important'       => 'all',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'title_settings',
					'sub_toggle'      => 'pre_part_text',
				),
				'main_title'   => array(
					'label'           => esc_html__( 'Main', 'divi-plus' ),
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
					'hide_text_align' => true,
					'css'             => array(
						'main' => '%%order_class%% .dipl_highlighter_heading h1 .dipl_text_highlighted_content,
									%%order_class%% .dipl_highlighter_heading h2 .dipl_text_highlighted_content,
									%%order_class%% .dipl_highlighter_heading h3 .dipl_text_highlighted_content,
									%%order_class%% .dipl_highlighter_heading h4 .dipl_text_highlighted_content,
									%%order_class%% .dipl_highlighter_heading h5 .dipl_text_highlighted_content,
									%%order_class%% .dipl_highlighter_heading h6 .dipl_text_highlighted_content',
					),
					'important'       => 'all',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'title_settings',
					'sub_toggle'      => 'main_part_text',
				),
				'post_title'   => array(
					'label'           => esc_html__( 'Post', 'divi-plus' ),
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
					'hide_text_align' => true,
					'css'             => array(
						'main' => '%%order_class%% .dipl_highlighter_heading h1 .dipl_text_highlighter_post_inner_wrapper,
									%%order_class%% .dipl_highlighter_heading h2 .dipl_text_highlighter_post_inner_wrapper,
									%%order_class%% .dipl_highlighter_heading h3 .dipl_text_highlighter_post_inner_wrapper,
									%%order_class%% .dipl_highlighter_heading h4 .dipl_text_highlighter_post_inner_wrapper,
									%%order_class%% .dipl_highlighter_heading h5 .dipl_text_highlighter_post_inner_wrapper,
									%%order_class%% .dipl_highlighter_heading h6 .dipl_text_highlighter_post_inner_wrapper',
					),
					'important'       => 'all',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'title_settings',
					'sub_toggle'      => 'post_part_text',
				),
				'global_body'  => array(
					'label'          => esc_html__( 'Global', 'divi-plus' ),
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
						'default'        => '1.7em',
						'range_settings' => array(
							'min'  => '0',
							'max'  => '5',
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
						'main' => '%%order_class%% .dipl_text_highlighter_wrapper.dipl_highlighter_text span,
									%%order_class%% .dipl_text_highlighter_wrapper.dipl_highlighter_text p,
									%%order_class%% .dipl_text_highlighter_wrapper.dipl_highlighter_text',
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'text_settings',
					'sub_toggle'     => 'global_settings',
				),
				'pre_body'     => array(
					'label'           => esc_html__( 'Pre', 'divi-plus' ),
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
					'hide_text_align' => true,
					'css'             => array(
						'main' => '%%order_class%% .dipl_text_highlighter_wrapper.dipl_highlighter_text .dipl_text_highlighter_pre_inner_wrapper span,
									%%order_class%% .dipl_text_highlighter_wrapper.dipl_highlighter_text .dipl_text_highlighter_pre_inner_wrapper p,
									%%order_class%% .dipl_text_highlighter_wrapper.dipl_highlighter_text .dipl_text_highlighter_pre_inner_wrapper',
					),
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'text_settings',
					'sub_toggle'      => 'pre_part_text',
				),
				'main_body'    => array(
					'label'           => esc_html__( 'Main', 'divi-plus' ),
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
					'hide_text_align' => true,
					'css'             => array(
						'main' => '%%order_class%% .dipl_text_highlighter_wrapper.dipl_highlighter_text .dipl_text_highlighted_content span,
									%%order_class%% .dipl_text_highlighter_wrapper.dipl_highlighter_text .dipl_text_highlighted_content p,
									%%order_class%% .dipl_text_highlighter_wrapper.dipl_highlighter_text .dipl_text_highlighted_content',
					),
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'text_settings',
					'sub_toggle'      => 'main_part_text',
				),
				'post_body'    => array(
					'label'           => esc_html__( 'Post', 'divi-plus' ),
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
					'hide_text_align' => true,
					'css'             => array(
						'main' => '%%order_class%% .dipl_text_highlighter_wrapper.dipl_highlighter_text .dipl_text_highlighter_post_inner_wrapper span,
									%%order_class%% .dipl_text_highlighter_wrapper.dipl_highlighter_text .dipl_text_highlighter_post_inner_wrapper p,
									%%order_class%% .dipl_text_highlighter_wrapper.dipl_highlighter_text .dipl_text_highlighter_post_inner_wrapper',
					),
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'text_settings',
					'sub_toggle'      => 'post_part_text',
				),
			),
			'text'           => false,
			'margin_padding' => array(
				'css' => array(
					'main'      => '%%order_class%%',
					'important' => 'all',
				),
			),
		);
	}

	public function get_fields() {
		$et_accent_color = et_builder_accent_color();

		return array(
			'pre_highlighter_content'  => array(
				'label'           => esc_html__( 'Pre', 'divi-plus' ),
				'type'            => 'textarea',
				'dynamic_content' => 'text',
				'option_category' => 'basic_option',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can set text comes before the highlighted content.', 'divi-plus' ),
			),
			'highlighter_content'      => array(
				'label'           => esc_html__( 'Content', 'divi-plus' ),
				'type'            => 'textarea',
				'dynamic_content' => 'text',
				'option_category' => 'basic_option',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can set highlighted text.', 'divi-plus' ),
			),
			'post_highlighter_content' => array(
				'label'           => esc_html__( 'Post', 'divi-plus' ),
				'type'            => 'textarea',
				'dynamic_content' => 'text',
				'option_category' => 'basic_option',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can set text comes after the highlighted text.', 'divi-plus' ),
			),
			'svg_type'                 => array(
				'label'           => esc_html__( 'Text Highlighter Shape', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'highlight_zigzag'           => esc_html__( 'Zig Zag', 'divi-plus' ),
					'highlight_underline'        => esc_html__( 'Underline', 'divi-plus' ),
					'highlight_double_underline' => esc_html__( 'Double Underline', 'divi-plus' ),
					'highlight_circle'           => esc_html__( 'Circle', 'divi-plus' ),
					'highlight_diagonal'         => esc_html__( 'Diagonal', 'divi-plus' ),
					'highlight_cross'            => esc_html__( 'Cross', 'divi-plus' ),
					'highlight_curly_line'       => esc_html__( 'Curly Line', 'divi-plus' ),
				),
				'default'         => 'highlight_zigzag',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can select highlight type.', 'divi-plus' ),
			),
			'display_in_stack'         => array(
				'label'           => esc_html__( 'Display in Stack', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'default'         => 'off',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'To display text in stack enable this setting.', 'divi-plus' ),
			),
			'use_as_heading'           => array(
				'label'           => esc_html__( 'Wrap in Heading Tag', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'default'         => 'off',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'To use the content as heading text enable this setting.', 'divi-plus' ),
			),
			'svg_color'                => array(
				'label'        => esc_html__( 'Highlighter Color', 'divi-plus' ),
				'type'         => 'color-alpha',
				'hover'        => 'tabs',
				'custom_color' => true,
				'default'      => '#2b87da',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'svg_settings',
				'description'  => esc_html__( 'Here you can select highlight shape color.', 'divi-plus' ),
			),
			'stroke_width' => array(
				'label'           => esc_html__( 'Stroke Width', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'configuration',
				'range_settings'  => array(
					'min'  => '0.5',
					'max'  => '10',
					'step' => '0.5',
				),
				'default'      	  => '2.5',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'svg_settings',
				'description'     => esc_html__( 'Here you can set stroke width.', 'divi-plus' ),
			),
			'stroke_speed' => array(
				'label'           => esc_html__( 'Stroke Paint Animation Speed', 'divi-plus' ),
				'type'            => 'skip',
				'option_category' => 'configuration',
				'default'         => '3s',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'svg_settings',
				'description'     => esc_html__( 'Here you can set stroke paint animation speed in seconds.', 'divi-plus' ),
			),
			'stroke_paint_delay' => array(
				'label'           => esc_html__( 'Stroke Paint Animation Delay', 'divi-plus' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'default'         => '0s',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'svg_settings',
				'description'     => esc_html__( 'Here you can set how late to start stroke paint animation(in seconds).', 'divi-plus' ),
			),
			'__svg_highlighter'        => array(
				'type'                => 'computed',
				'computed_callback'   => array( 'DIPL_Text_Highlighter', 'get_svg_highlighter_data' ),
				'computed_depends_on' => array(
					'svg_type',
				),
			),
		);
	}

	public static function get_svg_highlighter_data( $attrs = array(), $conditional_tags = array(), $current_page = array() ) {

		$defaults = array(
			'svg_type' => 'highlight_zigzag',
		);

		$attrs = wp_parse_args( $attrs, $defaults );
		foreach ( $defaults as $key => $default ) {
			${$key} = esc_html( et_()->array_get( $attrs, $key, $default ) );
		}

		if ( '' !== $select_element ) {
			// ELICUS_DIVI_PLUS_DIR_PATH is a global variable which consist plugin_dir_path( __FILE__ ).
			//phpcs:ignore
			$output = file_get_contents( ELICUS_DIVI_PLUS_DIR_PATH . 'includes/assets/highlighter_elements/' . $svg_type . '.svg' );
		} else {
			$output = '';
		}
		return $output;
	}

	public function render( $attrs, $content, $render_slug ) {
		$pre_highlighter_content  = esc_attr( $this->props['pre_highlighter_content'] );
		$highlighter_content      = esc_attr( $this->props['highlighter_content'] );
		$post_highlighter_content = esc_attr( $this->props['post_highlighter_content'] );
		$display_in_stack         = esc_attr( $this->props['display_in_stack'] );
		$svg_type                 = esc_attr( $this->props['svg_type'] );
		$svg_color                = esc_attr( $this->props['svg_color'] );
		$svg_color_hover          = esc_attr( $this->get_hover_value( 'svg_color' ) );
		$stroke_width 			  = floatval( esc_attr( $this->props['stroke_width'] ) );
		$stroke_speed 			  = floatval( esc_attr( $this->props['stroke_speed'] ) );
		$stroke_paint_delay 	  = floatval( esc_attr( $this->props['stroke_paint_delay'] ) ); 
		$use_as_heading           = esc_attr( $this->props['use_as_heading'] );
		$header_level             = $this->props['global_title_level'];
		$processed_header_level   = et_pb_process_header_level( $header_level, 'h2' );
		$output                   = '';

		wp_enqueue_script( 'dipl-text-highlighter-custom', PLUGIN_PATH."includes/modules/TextHighlighter/dipl-text-highlighter-custom.min.js", array('jquery'), '1.0.0', true );
		$file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        wp_enqueue_style( 'dipl-text-highlighter-style', PLUGIN_PATH . 'includes/modules/TextHighlighter/' . $file . '.min.css', array(), '1.0.0' );

		if ( '' !== $pre_highlighter_content ) {
			$pre_highlighter_content = sprintf(
				'<span class="dipl_text_highlighter_pre_inner_wrapper">%1$s%2$s</span>',
				$pre_highlighter_content,
				'off' === $display_in_stack ? '&nbsp;' : ''
			);
		}

		if ( '' !== $highlighter_content ) {
			if ( '' !== $svg_color ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_text_highlighter_wrapper svg path',
						'declaration' => sprintf( 'stroke: %1$s !important;', $svg_color ),
					)
				);
			}

			if ( '' !== $svg_color_hover ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%%:hover .dipl_text_highlighter_wrapper svg path',
						'declaration' => sprintf( 'stroke: %1$s !important;', $svg_color_hover ),
					)
				);
			}

			if ( '' !== $stroke_width ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_text_highlighter_wrapper svg path',
						'declaration' => sprintf( 'stroke-width: %1$s;', $stroke_width ),
					)
				);
			}

			if ( '' !== $stroke_speed ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_text_highlighter_wrapper svg path',
						'declaration' => sprintf( 'animation-duration: %1$ss;', $stroke_speed ),
					)
				);
			}

			if ( '' !== $stroke_paint_delay ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_text_highlighter_wrapper svg path',
						'declaration' => sprintf( 'animation-delay: %1$ss;', $stroke_paint_delay ),
					)
				);
			}

			if ( '' !== $svg_type ) {
				// ELICUS_DIVI_PLUS_DIR_PATH is a global variable which consist plugin_dir_path( __FILE__ ).
				//phpcs:ignore
				$svg_element = file_get_contents( ELICUS_DIVI_PLUS_DIR_PATH . 'includes/assets/highlighter_elements/' . $svg_type . '.svg' );
			}

			$highlighter_content = sprintf(
				'<span class="dipl_text_highlighter_inner_wrapper"><span class="dipl_text_highlighted_content">%1$s</span>%2$s</span>',
				$highlighter_content,
				et_core_intentionally_unescaped( $svg_element, 'html' )
			);
		}

		if ( '' !== $post_highlighter_content ) {
			$post_highlighter_content = sprintf(
				'<span class="dipl_text_highlighter_post_inner_wrapper">%2$s%1$s</span>',
				$post_highlighter_content,
				'off' === $display_in_stack ? '&nbsp;' : ''
			);
		}

		if ( 'on' === $use_as_heading ) {
			$output = sprintf(
				'<div class="dipl_text_highlighter_wrapper dipl_highlighter_heading dipl_%4$s %5$s"><%6$s>%1$s%2$s%3$s</%6$s></div>',
				( '' !== $pre_highlighter_content ) ? $pre_highlighter_content : '',
				( '' !== $highlighter_content ) ? $highlighter_content : '',
				( '' !== $post_highlighter_content ) ? $post_highlighter_content : '',
				( '' !== $svg_type ) ? $svg_type : '',
				( 'on' === $display_in_stack ) ? 'dipl_text_highlighter_stack' : '',
				$processed_header_level
			);
		} else {
			$output = sprintf(
				'<div class="dipl_text_highlighter_wrapper dipl_highlighter_text dipl_%4$s %5$s">%1$s%2$s%3$s</div>',
				( '' !== $pre_highlighter_content ) ? $pre_highlighter_content : '',
				( '' !== $highlighter_content ) ? $highlighter_content : '',
				( '' !== $post_highlighter_content ) ? $post_highlighter_content : '',
				( '' !== $svg_type ) ? $svg_type : '',
				( 'on' === $display_in_stack ) ? 'dipl_text_highlighter_stack' : ''
			);
		}

		return $output;
	}
}
$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
	$modules = explode( ',', $plugin_options['dipl-modules'] );
	if ( in_array( 'dipl_text_highlighter', $modules ) ) {
		new DIPL_Text_Highlighter();
	}
} else {
	new DIPL_Text_Highlighter();
}
