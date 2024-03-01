<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.4
 */
class DIPL_DoubleColorHeading extends ET_Builder_Module {

	public $slug       = 'dipl_double_color_heading';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name = esc_html__( 'DP Fancy Heading', 'divi-plus' );
	}

	public function get_settings_modal_toggles() {
		return array(
			'general'  => array(
				'toggles' => array(
					'main_content' => array(
						'title'    => esc_html__( 'Heading Content', 'divi-plus' ),
						'priority' => 1,
					),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'text_settings'         => array(
						'title'             => esc_html__( 'Text Setting', 'divi-plus' ),
						'priority'          => 1,
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
					'text_styling_settings' => array(
						'title'             => esc_html__( 'Text Styling', 'divi-plus' ),
						'priority'          => 2,
						'sub_toggles'       => array(
							'pre_part_styling'  => array(
								'name' => 'Pre',
							),
							'main_part_styling' => array(
								'name' => 'Main',
							),
							'post_part_styling' => array(
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
			'fonts'                 => array(
				'global_heading_settings' => array(
					'label'               => esc_html__( 'Global', 'divi-plus' ),
					'css'                 => array(
						'main' => '%%order_class%% h1, %%order_class%% h1 a,
									%%order_class%% h2, %%order_class%% h2 a,
									%%order_class%% h3, %%order_class%% h3 a,
									%%order_class%% h4, %%order_class%% h4 a,
									%%order_class%% h5, %%order_class%% h5 a,
									%%order_class%% h6, %%order_class%% h6 a',
					),
					'header_level'        => array(
						'default' => 'h2',
					),
					'hide_font'           => true,
					'hide_font_size'      => true,
					'hide_font_weight'    => true,
					'hide_font_style'     => true,
					'hide_letter_spacing' => true,
					'hide_line_height'    => true,
					'hide_text_color'     => true,
					'hide_text_shadow'    => true,
					'important'           => 'all',
					'tab_slug'            => 'advanced',
					'toggle_slug'         => 'text_settings',
					'sub_toggle'          => 'global_settings',
				),
				'pre_header'              => array(
					'label'           => esc_html__( 'Pre', 'divi-plus' ),
					'font_size'       => array(
						'default'        => '24px',
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
					'css'             => array(
						'main' => '%%order_class%% h1 .dipl_pre_text, %%order_class%% h1 a .dipl_pre_text,
									%%order_class%% h2 .dipl_pre_text, %%order_class%% h2 a .dipl_pre_text,
									%%order_class%% h3 .dipl_pre_text, %%order_class%% h3 a .dipl_pre_text,
									%%order_class%% h4 .dipl_pre_text, %%order_class%% h4 a .dipl_pre_text,
									%%order_class%% h5 .dipl_pre_text, %%order_class%% h5 a .dipl_pre_text,
									%%order_class%% h6 .dipl_pre_text, %%order_class%% h6 a .dipl_pre_text',
						'text_align' => '%%order_class%% .dipl_text_wrapper .dipl_pre_text_stack',
					),
					'important'       => 'all',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'text_settings',
					'sub_toggle'      => 'pre_part_text',
				),
				'main_header'             => array(
					'label'           => esc_html__( 'Main', 'divi-plus' ),
					'font_size'       => array(
						'default'        => '24px',
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
					'css'             => array(
						'main' => '%%order_class%% h1 .dipl_main_text, %%order_class%% h1 a .dipl_main_text,
									%%order_class%% h2 .dipl_main_text, %%order_class%% h2 a .dipl_main_text,
									%%order_class%% h3 .dipl_main_text, %%order_class%% h3 a .dipl_main_text,
									%%order_class%% h4 .dipl_main_text, %%order_class%% h4 a .dipl_main_text,
									%%order_class%% h5 .dipl_main_text, %%order_class%% h5 a .dipl_main_text,
									%%order_class%% h6 .dipl_main_text, %%order_class%% h6 a .dipl_main_text',
						'text_align' => '%%order_class%% .dipl_text_wrapper .dipl_main_text_stack',
					),
					'important'       => 'all',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'text_settings',
					'sub_toggle'      => 'main_part_text',
				),
				'post_header'             => array(
					'label'           => esc_html__( 'Post', 'divi-plus' ),
					'font_size'       => array(
						'default'        => '24px',
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
					'css'             => array(
						'main' => '%%order_class%% h1 .dipl_post_text, %%order_class%% h1 a .dipl_post_text,
									%%order_class%% h2 .dipl_post_text, %%order_class%% h2 a .dipl_post_text,
									%%order_class%% h3 .dipl_post_text, %%order_class%% h3 a .dipl_post_text,
									%%order_class%% h4 .dipl_post_text, %%order_class%% h4 a .dipl_post_text,
									%%order_class%% h5 .dipl_post_text, %%order_class%% h5 a .dipl_post_text,
									%%order_class%% h6 .dipl_post_text, %%order_class%% h6 a .dipl_post_text',
						'text_align' => '%%order_class%% .dipl_text_wrapper .dipl_post_text_stack',
					),
					'important'       => 'all',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'text_settings',
					'sub_toggle'      => 'post_part_text',
				),
			),
			'custom_margin_padding' => array(
				'css' => array(
					'main'      => '%%order_class%%',
					'important' => 'all',
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
			'text_padding'          => array(
				'pre_part'  => array(
					'label'          => 'Pre Padding',
					'margin_padding' => array(
						'css' => array(
							'main'      => '%%order_class%% .dipl_pre_text',
							'important' => 'all',
						),
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'text_styling_settings',
					'sub_toggle'     => 'pre_part_styling',
				),
				'main_part' => array(
					'label'          => 'Main Padding',
					'margin_padding' => array(
						'css' => array(
							'main'      => '%%order_class%% .dipl_main_text',
							'important' => 'all',
						),
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'text_styling_settings',
					'sub_toggle'     => 'main_part_styling',
				),
				'post_part' => array(
					'label'          => 'Post Padding',
					'margin_padding' => array(
						'css' => array(
							'main'      => '%%order_class%% .dipl_post_text',
							'important' => 'all',
						),
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'text_styling_settings',
					'sub_toggle'     => 'post_part_styling',
				),
			),
		);
	}

	public function get_fields() {
		$et_accent_color = et_builder_accent_color();

		$dipl_heading_fields = array(
			'heading_pre_part'          => array(
				'label'           => esc_html__( 'Pre Heading', 'divi-plus' ),
				'type'            => 'text',
				'dynamic_content' => 'text',
				'option_category' => 'basic_option',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Text Before Heading.', 'divi-plus' ),
			),
			'heading_main_part'         => array(
				'label'           => esc_html__( 'Heading', 'divi-plus' ),
				'type'            => 'text',
				'dynamic_content' => 'text',
				'option_category' => 'basic_option',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Heading Text.', 'divi-plus' ),
			),
			'heading_post_part'         => array(
				'label'           => esc_html__( 'Post Heading', 'divi-plus' ),
				'type'            => 'text',
				'dynamic_content' => 'text',
				'option_category' => 'basic_option',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Text After Heading.', 'divi-plus' ),
			),
			'display_in_stack'          => array(
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
				'description'     => esc_html__( 'To display heading text in stack enable this setting.', 'divi-plus' ),
			),
			'pre_part_text_background'  => array(
				'label'           => esc_html__( 'Use Background', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'default'         => 'off',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'text_styling_settings',
				'sub_toggle'      => 'pre_part_styling',
				'description'     => esc_html__( 'Here you can enable background for pre/post text.', 'divi-plus' ),
			),
			'pre_background_color'      => array(
				'label'             => esc_html__( 'Pre Text Background', 'divi-plus' ),
				'type'              => 'background-field',
				'base_name'         => 'pre_background',
				'context'           => 'pre_background_color',
				'option_category'   => 'button',
				'custom_color'      => true,
				'show_if'           => array(
					'pre_part_text_background' => 'on',
				),
				'background_fields' => $this->generate_background_options( 'pre_background', 'button', 'advanced', 'text_styling_settings', 'pre_background_color' ),
				'mobile_options'    => true,
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'text_styling_settings',
				'sub_toggle'        => 'pre_part_styling',
				'description'       => esc_html__( 'Adjust the background style of the pre/post part text by customizing the background color, gradient, and image.' ),
			),
			'main_part_text_background' => array(
				'label'           => esc_html__( 'Use Background', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'default'         => 'off',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'text_styling_settings',
				'sub_toggle'      => 'main_part_styling',
				'description'     => esc_html__( 'Here you can enable background for main text.', 'divi-plus' ),
			),
			'main_background_color'     => array(
				'label'             => esc_html__( 'Main Text Background', 'divi-plus' ),
				'type'              => 'background-field',
				'base_name'         => 'main_background',
				'context'           => 'main_background_color',
				'option_category'   => 'button',
				'custom_color'      => true,
				'show_if'           => array(
					'main_part_text_background' => 'on',
				),
				'background_fields' => $this->generate_background_options( 'main_background', 'button', 'advanced', 'text_styling_settings', 'main_background_color' ),
				'mobile_options'    => true,
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'text_styling_settings',
				'sub_toggle'        => 'main_part_styling',
				'description'       => esc_html__( 'Adjust the background style of the main part text by customizing the background color, gradient, and image.' ),
			),
			'post_part_text_background' => array(
				'label'           => esc_html__( 'Use Background', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'default'         => 'off',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'text_styling_settings',
				'sub_toggle'      => 'post_part_styling',
				'description'     => esc_html__( 'Here you can enable background for pre/post text.', 'divi-plus' ),
			),
			'post_background_color'     => array(
				'label'             => esc_html__( 'Post Text Background', 'divi-plus' ),
				'type'              => 'background-field',
				'base_name'         => 'post_background',
				'context'           => 'post_background_color',
				'option_category'   => 'button',
				'custom_color'      => true,
				'show_if'           => array(
					'post_part_text_background' => 'on',
				),
				'background_fields' => $this->generate_background_options( 'post_background', 'button', 'advanced', 'text_styling_settings', 'post_background_color' ),
				'mobile_options'    => true,
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'text_styling_settings',
				'sub_toggle'        => 'post_part_styling',
				'description'       => esc_html__( 'Adjust the background style of the pre/post part text by customizing the background color, gradient, and image.' ),
			),
			'pre_part_custom_padding'   => array(
				'label'           => esc_html__( 'Padding', 'divi-plus' ),
				'type'            => 'custom_padding',
				'option_category' => 'layout',
				'mobile_options'  => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'text_styling_settings',
				'sub_toggle'      => 'pre_part_styling',
				'description'     => esc_html__( 'Here you can adjust Pre/Post Part padding.', 'divi-plus' ),
			),
			'main_part_custom_padding'  => array(
				'label'           => esc_html__( 'Padding', 'divi-plus' ),
				'type'            => 'custom_padding',
				'option_category' => 'layout',
				'mobile_options'  => true,
				'show_if'         => array(
					'main_part_text_background' => 'on',
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'text_styling_settings',
				'sub_toggle'      => 'main_part_styling',
				'description'     => esc_html__( 'Here you can adjust Main Part padding.', 'divi-plus' ),
			),
			'post_part_custom_padding'  => array(
				'label'           => esc_html__( 'Padding', 'divi-plus' ),
				'type'            => 'custom_padding',
				'option_category' => 'layout',
				'mobile_options'  => true,
				'show_if'         => array(
					'post_part_text_background' => 'on',
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'text_styling_settings',
				'sub_toggle'      => 'post_part_styling',
				'description'     => esc_html__( 'Here you can adjust Pre/Post Part padding.', 'divi-plus' ),
			),
		);
		$dipl_heading_fields = array_merge( $dipl_heading_fields, $this->generate_background_options( 'pre_background', 'skip', 'advanced', 'text_styling_settings', 'pre_background_color' ) );
		$dipl_heading_fields = array_merge( $dipl_heading_fields, $this->generate_background_options( 'main_background', 'skip', 'advanced', 'text_styling_settings', 'main_background_color' ) );
		$dipl_heading_fields = array_merge( $dipl_heading_fields, $this->generate_background_options( 'post_background', 'skip', 'advanced', 'text_styling_settings', 'post_background_color' ) );

		return $dipl_heading_fields;
	}

	public function render( $attrs, $content, $render_slug ) {
		$heading_pre_part          = $this->props['heading_pre_part'];
		$heading_main_part         = $this->props['heading_main_part'];
		$heading_post_part         = $this->props['heading_post_part'];
		$display_in_stack          = $this->props['display_in_stack'];
		$header_level              = $this->props['global_heading_settings_level'];
		$processed_header_level    = et_pb_process_header_level( $header_level, 'h2' );
		$pre_part_text_background  = $this->props['pre_part_text_background'];
		$main_part_text_background = $this->props['main_part_text_background'];
		$post_part_text_background = $this->props['post_part_text_background'];
		$pre_part                  = '';
		$main_part                 = '';
		$post_part                 = '';

		if ( 'on' === $pre_part_text_background ) {
			$options['dipl_pre_text'] = 'pre_background';
		}

		if ( 'on' === $main_part_text_background ) {
			$options['dipl_main_text'] = 'main_background';
		}

		if ( 'on' === $post_part_text_background ) {
			$options['dipl_post_text'] = 'post_background';
		}

		if ( '' !== $heading_pre_part && 'off' === $display_in_stack ) {
			$pre_part = sprintf(
				'<span class="dipl_pre_text">%1$s</span>',
				esc_html( trim( $heading_pre_part ) )
			);
		}

		if ( '' !== $heading_pre_part && 'on' === $display_in_stack ) {
			$pre_part = sprintf(
				'<span class="dipl_text_stack dipl_pre_text_stack"><span class="dipl_pre_text">%1$s</span></span>',
				esc_html( trim( $heading_pre_part ) )
			);
		}

		if ( '' !== $heading_main_part && 'off' === $display_in_stack ) {
			$main_part = sprintf(
				'<span class="dipl_main_text">%1$s%2$s%3$s</span>',
				( '' !== $heading_pre_part && 'off' === $display_in_stack ) ? '&nbsp;' : '',
				esc_html( trim( $heading_main_part ) ),
				( '' !== $heading_post_part && 'off' === $display_in_stack ) ? '&nbsp;' : ''
			);
		}

		if ( '' !== $heading_main_part && 'on' === $display_in_stack ) {
			$main_part = sprintf(
				'<span class="dipl_text_stack dipl_main_text_stack"><span class="dipl_main_text">%1$s</span></span>',
				esc_html( trim( $heading_main_part ) )
			);
		}

		if ( '' !== $heading_post_part && 'off' === $display_in_stack ) {
			$post_part = sprintf(
				'<span class="dipl_post_text">%1$s</span>',
				esc_html( trim( $heading_post_part ) )
			);
		}

		if ( '' !== $heading_post_part && 'on' === $display_in_stack ) {
			$post_part = sprintf(
				'<span class="dipl_text_stack dipl_post_text_stack"><span class="dipl_post_text">%1$s</span></span>',
				esc_html( trim( $heading_post_part ) )
			);
		}

		$this->add_classname(
			array(
				$this->get_text_orientation_classname(),
			)
		);

		$this->process_advanced_css( $this, $render_slug, $this->margin_padding );

		if ( isset( $options ) ) {
			$this->process_custom_background( $render_slug, $options );
		}

		$output = sprintf(
			'<div class="dipl_text_wrapper"><%1$s>%2$s%3$s%4$s</%1$s></div>',
			$processed_header_level,
			$pre_part,
			$main_part,
			$post_part
		);

		$file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        wp_enqueue_style( 'dipl-fancy-heading-style', PLUGIN_PATH . 'includes/modules/DoubleColorHeading/' . $file . '.min.css', array(), '1.0.0' );

		return et_core_intentionally_unescaped( $output, 'html' );
	}

	public function process_advanced_css( $module, $function_name, $margin_padding ) {
		$utils           = ET_Core_Data_Utils::instance();
		$all_values      = $module->props;
		$advanced_fields = $module->advanced_fields;
		if ( ! $module->has_vb_support() && ! $module->has_advanced_fields ) {
			return;
		}
		$allowed_advanced_fields = array( 'form_field', 'button', 'text_padding' );
		foreach ( $allowed_advanced_fields as $advanced_field ) {
			if ( ! empty( $advanced_fields[ $advanced_field ] ) ) {
				foreach ( $advanced_fields[ $advanced_field ] as $label => $form_field ) {
					$padding_key = "{$label}_custom_padding";
					if ( '' !== $utils->array_get( $all_values, $padding_key, '' ) ) {
						$settings                      = $utils->array_get( $form_field, 'margin_padding', array() );                        // Ensure main selector exists.
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
						$gradient_properties_desktop                      = $gradient_properties;
						$background_color_gradient_overlays_image_desktop = $background_color_gradient_overlays_image;
					}

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
	}
}
$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
	$modules = explode( ',', $plugin_options['dipl-modules'] );
	if ( in_array( 'dipl_double_color_heading', $modules ) ) {
		new DIPL_DoubleColorHeading();
	}
} else {
	new DIPL_DoubleColorHeading();
}
