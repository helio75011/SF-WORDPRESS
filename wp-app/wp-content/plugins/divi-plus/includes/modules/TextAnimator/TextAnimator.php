<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.4
 */
class DIPL_TextAnimator extends ET_Builder_Module {

	public $slug       = 'dipl_text_animator';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name = esc_html__( 'DP Text Animator', 'divi-plus' );
	}

	public function get_settings_modal_toggles() {
		return array(
			'general'  => array(
				'toggles' => array(
					'main_content' => array(
						'title'    => esc_html__( 'Animator Content', 'divi-plus' ),
					),
					'animation' => array(
						'title'    => esc_html__( 'Animation', 'divi-plus' ),
					),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'text_settings'    => array(
						'title'             => esc_html__( 'Text Setting', 'divi-plus' ),
						'priority'          => 2,
						'sub_toggles'       => array(
							'global_settings'    => array(
								'name' => 'Global',
							),
							'pre_post_part_text' => array(
								'name' => 'Pre/Post',
							),
							'main_part_text'     => array(
								'name' => 'Main',
							),
						),
						'tabbed_subtoggles' => true,
					),
					'text_bg_settings' => array(
						'title'             => esc_html__( 'Text Background Settings', 'divi-plus' ),
						'priority'          => 3,
						'sub_toggles'       => array(
							'pre_post_part_bg' => array(
								'name' => 'Pre/Post',
							),
							'main_part_bg'     => array(
								'name' => 'Main',
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
				'global_text_settings' => array(
					'label'          => esc_html__( 'Global', 'divi-plus' ),
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
						'main' => '%%order_class%% .animated_text_wrapper h1, %%order_class%% .animated_text_wrapper h2, %%order_class%% .animated_text_wrapper h3, %%order_class%% .animated_text_wrapper h4, %%order_class%% .animated_text_wrapper h5, %%order_class%% .animated_text_wrapper h6, %%order_class%% .animated_text_wrapper p',
					),
					'important'      => 'all',
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'text_settings',
					'sub_toggle'     => 'global_settings',
				),
				'pre_and_post_text'    => array(
					'label'           => esc_html__( 'Pre/Post', 'divi-plus' ),
					'font_size'       => array(
						'default'        => '18px',
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
						'main' => '%%order_class%% .pre_text_wrapper, %%order_class%% .post_text_wrapper',
					),
					'hide_text_align' => true,
					'important'       => 'all',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'text_settings',
					'sub_toggle'      => 'pre_post_part_text',
				),
				'main_text'            => array(
					'label'           => esc_html__( 'Animated', 'divi-plus' ),
					'font_size'       => array(
						'default'        => '18px',
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
						'main' => '%%order_class%% .animated_text',
					),
					'hide_text_align' => true,
					'important'       => 'all',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'text_settings',
					'sub_toggle'      => 'main_part_text',
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
		);
	}

	public function get_fields() {
		$et_accent_color = et_builder_accent_color();

		$dipl_animator_fields = array(
			'prefix_text'                   => array(
				'label'           => esc_html__( 'Prefix Text', 'divi-plus' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can input the text that would come before the Animated Text.', 'divi-plus' ),
			),
			'animated_text'                 => array(
				'label'           => esc_html__( 'Animated Text(| Separated)', 'divi-plus' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can input the text you want to display with animation effects. Use the vertical bar "|" to separate the multiple text you want to animate.', 'divi-plus' ),
			),
			'postfix_text'                  => array(
				'label'           => esc_html__( 'Postfix Text', 'divi-plus' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can input the text that would come after the Animated Text.', 'divi-plus' ),
			),
			'display_tag'                   => array(
				'label'           => esc_html__( 'Select Display Tag', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'h1' => esc_html( 'H1' ),
					'h2' => esc_html( 'H2' ),
					'h3' => esc_html( 'H3' ),
					'h4' => esc_html( 'H4' ),
					'h5' => esc_html( 'H5' ),
					'h6' => esc_html( 'H6' ),
					'p'  => esc_html( 'p' ),
				),
				'default'         => 'h2',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can select the HTML tag for the text.', 'divi-plus' ),
			),
			'animation_layout'              => array(
				'label'           => esc_html__( 'Select Animation', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'fade'   => esc_html__( 'Fade', 'divi-plus' ),
					'flip'   => esc_html__( 'Flip', 'divi-plus' ),
					'typing' => esc_html__( 'Typing', 'divi-plus' ),
					'slide'  => esc_html__( 'Slide', 'divi-plus' ),
					'zoom'   => esc_html__( 'Zoom', 'divi-plus' ),
					'bounce' => esc_html__( 'Bounce', 'divi-plus' ),
					'wipe'   => esc_html__( 'Wipe', 'divi-plus' ),
					'wave'   => esc_html__( 'Wave', 'divi-plus' ),
				),
				'default'         => 'fade',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'animation',
				'description'     => esc_html__( 'Here you can select the layout that you want to use for the text animation.', 'divi-plus' ),
			),
			'in_stack'                      => array(
				'label'           => esc_html__( 'Display Text in Stack', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'default'         => 'off',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'animation',
				'description'     => esc_html__( 'Here you can choose whether or not to display the text in stack.', 'divi-plus' ),
			),
			'typing_speed'                  => array(
				'label'           => esc_html__( 'Typing Speed(in ms)', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'range_settings'  => array(
					'min'  => '10',
					'max'  => '5000',
					'step' => '10',
				),
				'mobile_options'  => false,
				'show_if'         => array(
					'animation_layout' => 'typing',
				),
				'default'         => '100ms',
				'allowed_units'   => array( 'ms' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'animation',
				'description'     => esc_html__( 'Move the slider, or input the value to set the speed for typing single character at a time.', 'divi-plus' ),
			),
			'erasing_speed'                 => array(
				'label'           => esc_html__( 'Erasing Speed(in ms)', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'range_settings'  => array(
					'min'  => '10',
					'max'  => '5000',
					'step' => '10',
				),
				'mobile_options'  => false,
				'show_if'         => array(
					'animation_layout' => 'typing',
				),
				'default'         => '100',
				'allowed_units'   => array( 'ms' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'animation',
				'description'     => esc_html__( 'Move the slider, or input the value to set the speed for deleting the single character at a time.', 'divi-plus' ),
			),
			'animation_time'                => array(
				'label'           => esc_html__( 'Animation Duration(in ms)', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'range_settings'  => array(
					'min'  => '10',
					'max'  => '5000',
					'step' => '10',
				),
				'mobile_options'  => false,
				'show_if_not'     => array(
					'animation_layout' => 'typing',
				),
				'default'         => '500ms',
				'allowed_units'   => array( 'ms' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'animation',
				'description'     => esc_html__( 'Move the slider, or input the value to set the duration for completing an animation effect.', 'divi-plus' ),
			),
			'animation_hold'                => array(
				'label'           => esc_html__( 'Animation Delay(in ms)', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'range_settings'  => array(
					'min'  => '100',
					'max'  => '10000',
					'step' => '10',
				),
				'mobile_options'  => false,
				'default'         => '2000ms',
				'allowed_units'   => array( 'ms' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'animation',
				'description'     => esc_html__( 'Move the slider, or input the value to set the speed for displaying next animated text.', 'divi-plus' ),
			),
			'stop_animation_on_hover'  => array(
				'label'           => esc_html__( 'Stop Animation on Hover', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'default'         => 'off',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'animation',
				'description'     => esc_html__( 'Here you can choose whether or not to stop animation on hover.', 'divi-plus' ),
			),
			'pre_post_part_text_background' => array(
				'label'           => esc_html__( 'Use Background', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'default'         => 'off',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'text_bg_settings',
				'sub_toggle'      => 'pre_post_part_bg',
				'description'     => esc_html__( 'Here you can choose whether or not to use background for the Pre/Post text.', 'divi-plus' ),
			),
			'pre_post_background_color'     => array(
				'label'             => esc_html__( 'Pre/Post Text Background', 'divi-plus' ),
				'type'              => 'background-field',
				'base_name'         => 'pre_post_background',
				'context'           => 'pre_post_background_color',
				'option_category'   => 'button',
				'custom_color'      => true,
				'show_if'           => array(
					'pre_post_part_text_background' => 'on',
				),
				'background_fields' => $this->generate_background_options( 'pre_post_background', 'button', 'advanced', 'text_bg_settings', 'pre_post_background_color' ),
				'mobile_options'    => true,
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'text_bg_settings',
				'sub_toggle'        => 'pre_post_part_bg',
				'description'       => esc_html__( 'Adjust the background color, gradient, and image customize the background style of the Pre/Post text.' ),
			),
			'main_part_text_background'     => array(
				'label'           => esc_html__( 'Use Background', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'default'         => 'off',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'text_bg_settings',
				'sub_toggle'      => 'main_part_bg',
				'description'     => esc_html__( 'Here you can choose whether or not to use background for the Main text.', 'divi-plus' ),
			),
			'main_background_color'         => array(
				'label'             => esc_html__( 'Main Text Background', 'divi-plus' ),
				'type'              => 'background-field',
				'base_name'         => 'main_background',
				'context'           => 'main_background_color',
				'option_category'   => 'button',
				'custom_color'      => true,
				'show_if'           => array(
					'main_part_text_background' => 'on',
				),
				'background_fields' => $this->generate_background_options( 'main_background', 'button', 'advanced', 'text_bg_settings', 'main_background_color' ),
				'mobile_options'    => true,
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'text_bg_settings',
				'sub_toggle'        => 'main_part_bg',
				'description'       => esc_html__( 'Adjust the background color, gradient, and image customize the background style of the Main text.' ),
			),
		);
		$dipl_animator_fields = array_merge( $dipl_animator_fields, $this->generate_background_options( 'pre_post_background', 'skip', 'advanced', 'text_bg_settings', 'pre_post_background_color' ) );
		$dipl_animator_fields = array_merge( $dipl_animator_fields, $this->generate_background_options( 'main_background', 'skip', 'advanced', 'text_bg_settings', 'main_background_color' ) );

		return $dipl_animator_fields;
	}

	public function render( $attrs, $content, $render_slug ) {
		$animation_layout              = $this->props['animation_layout'];
		$in_stack                      = $this->props['in_stack'];
		$typing_speed                  = $this->props['typing_speed'];
		$erasing_speed                 = $this->props['erasing_speed'];
		$animation_hold                = $this->props['animation_hold'];
		$animation_time                = $this->props['animation_time'];
		$prefix_text                   = $this->props['prefix_text'];
		$animated_text                 = $this->props['animated_text'];
		$postfix_text                  = $this->props['postfix_text'];
		$display_tag                   = $this->props['display_tag'];
		$pre_post_part_text_background = $this->props['pre_post_part_text_background'];
		$main_part_text_background     = $this->props['main_part_text_background'];
		$stop_animation_on_hover	   = $this->props['stop_animation_on_hover'];

		wp_enqueue_script( 'dipl-text-animator-custom', PLUGIN_PATH . 'includes/modules/TextAnimator/dipl-text-animator-custom.min.js', array('jquery'), '1.0.1', true );
		$file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        wp_enqueue_style( 'dipl-text-animator-style', PLUGIN_PATH . 'includes/modules/TextAnimator/' . $file . '.min.css', array(), '1.0.0' );

		$processed_display_tag = esc_html( $display_tag );
		$valid_display_tag     = array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'p' );

		if ( ! in_array( $display_tag, $valid_display_tag, true ) ) {
			$processed_display_tag = esc_html( 'h2' );
		}

		if ( 'on' === $pre_post_part_text_background ) {
			$options['dipl_pre_post'] = 'pre_post_background';
		}

		if ( 'on' === $main_part_text_background ) {
			$options['dipl_main_part'] = 'main_background';
		}

		if ( 'on' === $in_stack ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .pre_text_wrapper, %%order_class%% .post_text_wrapper',
					'declaration' => 'display: block;',
				)
			);
		}

		$initial_text = explode( '|', $animated_text )[0];

		switch ( $animation_layout ) {
			case 'typing':
				$animated_phrase = '<span
								     class="animated_text dipl_main_part" 
								     data-wait-time="' . intval( $animation_hold ) . '"
								     data-typing-time="' . intval( $typing_speed ) . '"
								     data-erasing-time="' . intval( $erasing_speed ) . '"
								     data-text="' . esc_attr( $animated_text ) . '"
								     data-interval-id="0"
								     data-stop-animation-on-hover="' . esc_attr( $stop_animation_on_hover ) . '"
								     ></span>';
				break;
			default:
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .animated_text',
						'declaration' => sprintf( 'animation-duration: %1$sms;', intval( $animation_time ) ),
					)
				);
				$animated_phrase = '<span
								     class="animated_text dipl_main_part" 
								     data-wait-time="' . intval( $animation_hold ) . '"
								     data-animation-time="' . intval( $animation_time ) . '"
								     data-text="' . $animated_text . '"
								     data-stop-animation-on-hover="' . esc_attr( $stop_animation_on_hover ) . '"
								     >' . esc_html( $initial_text ) . '</span>';
				break;
		}

		if ( isset( $options ) ) {
			$this->process_custom_background( $render_slug, $options );
		}

		$prefix_text_wrap = '' !== $prefix_text ?
			sprintf(
				'<span class="pre_text_wrapper dipl_pre_post">%1$s</span>',
				esc_html( $prefix_text )
			) :
			'';

		$postfix_text_wrap = '' !== $postfix_text ?
			sprintf(
				'<span class="post_text_wrapper dipl_pre_post">%1$s</span>',
				esc_html( $postfix_text )
			) :
			'';

		return sprintf(
			'<div class="animated_text_wrapper %3$s">
				<%5$s>
				%1$s
				%4$s
				%2$s
				</%5$s>
			</div>',
			et_core_intentionally_unescaped( $prefix_text_wrap, 'html' ),
			et_core_intentionally_unescaped( $postfix_text_wrap, 'html' ),
			esc_attr( 'dipl-' . $animation_layout ),
			et_core_intentionally_unescaped( $animated_phrase, 'html' ),
			esc_html( $processed_display_tag )
		);
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
    if ( in_array( 'dipl_text_animator', $modules ) ) {
        new DIPL_TextAnimator();
    }
} else {
    new DIPL_TextAnimator();
}
