<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.4
 */
class DIPL_BeforeAfterSlider extends ET_Builder_Module {

	public $slug       = 'dipl_before_after_slider';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name = esc_html__( 'DP Before After Slider', 'divi-plus' );
	}

	public function get_settings_modal_toggles() {
		return array(
			'general'  => array(
				'toggles' => array(
					'main_content' => array(
						'title'             => esc_html__( 'Slider Content', 'divi-plus' ),
						'priority'          => 1,
						'sub_toggles'       => array(
							'before_content' => array(
								'name' => 'Before',
							),
							'after_content'  => array(
								'name' => 'After',
							),
						),
						'tabbed_subtoggles' => true,
					),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'before_after_styling' => array(
						'title'    => esc_html__( 'Slider Stlying', 'divi-plus' ),
						'priority' => 1,
					),
					'text_settings'        => array(
						'title'    => esc_html__( 'Label Text Setting', 'divi-plus' ),
						'priority' => 2,
					),
				),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts'                 => array(
				'label_text' => array(
					'label'          => esc_html__( 'Label', 'divi-plus' ),
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
					'hide_text_align' => true,
					'css'            => array(
						'main' => '%%order_class%%.dipl_before_after_slider .twentytwenty-before-label:before, %%order_class%%.dipl_before_after_slider .twentytwenty-after-label:before',
					),
					'important'      => 'all',
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'text_settings',
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

		return array(
			'before_image'                    => array(
				'label'              => esc_html__( 'Image', 'divi-plus' ),
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'upload_button_text' => esc_attr__( 'Upload an image', 'divi-plus' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'divi-plus' ),
				'update_text'        => esc_attr__( 'Set As Image', 'divi-plus' ),
				'default'			 => 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTA4MCIgaGVpZ2h0PSI1NDAiIHZpZXdCb3g9IjAgMCAxMDgwIDU0MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICAgIDxnIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+CiAgICAgICAgPHBhdGggZmlsbD0iI0VCRUJFQiIgZD0iTTAgMGgxMDgwdjU0MEgweiIvPgogICAgICAgIDxwYXRoIGQ9Ik00NDUuNjQ5IDU0MGgtOTguOTk1TDE0NC42NDkgMzM3Ljk5NSAwIDQ4Mi42NDR2LTk4Ljk5NWwxMTYuMzY1LTExNi4zNjVjMTUuNjItMTUuNjIgNDAuOTQ3LTE1LjYyIDU2LjU2OCAwTDQ0NS42NSA1NDB6IiBmaWxsLW9wYWNpdHk9Ii4xIiBmaWxsPSIjMDAwIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz4KICAgICAgICA8Y2lyY2xlIGZpbGwtb3BhY2l0eT0iLjA1IiBmaWxsPSIjMDAwIiBjeD0iMzMxIiBjeT0iMTQ4IiByPSI3MCIvPgogICAgICAgIDxwYXRoIGQ9Ik0xMDgwIDM3OXYxMTMuMTM3TDcyOC4xNjIgMTQwLjMgMzI4LjQ2MiA1NDBIMjE1LjMyNEw2OTkuODc4IDU1LjQ0NmMxNS42Mi0xNS42MiA0MC45NDgtMTUuNjIgNTYuNTY4IDBMMTA4MCAzNzl6IiBmaWxsLW9wYWNpdHk9Ii4yIiBmaWxsPSIjMDAwIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz4KICAgIDwvZz4KPC9zdmc+Cg==',
				'dynamic_content'    => 'image',
				'tab_slug'           => 'general',
				'toggle_slug'        => 'main_content',
				'sub_toggle'         => 'before_content',
				'description'        => esc_html__( 'Upload Before Image.', 'divi-plus' ),
			),
			'show_before_label'               => array(
				'label'           => esc_html__( 'Show Label', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'default'         => 'off',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'sub_toggle'      => 'before_content',
				'description'     => esc_html__( 'Control Label Display.', 'divi-plus' ),
			),
			'before_label'                    => array(
				'label'           => esc_html__( 'Label', 'divi-plus' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'show_if'         => array(
					'show_before_label' => 'on',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'sub_toggle'      => 'before_content',
				'description'     => esc_html__( 'Set a custom before label', 'divi-plus' ),
			),
			'before_label_bg'                 => array(
				'label'       => esc_html__( 'Label Background', 'divi-plus' ),
				'type'        => 'color-alpha',
				'show_if'     => array(
					'show_before_label' => 'on',
				),
				'default'     => $et_accent_color,
				'tab_slug'    => 'general',
				'toggle_slug' => 'main_content',
				'sub_toggle'  => 'before_content',
				'description' => esc_html__( 'Before Label Background.', 'divi-plus' ),
			),
			'after_image'                     => array(
				'label'              => esc_html__( 'Image', 'divi-plus' ),
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'upload_button_text' => esc_attr__( 'Upload an image', 'divi-plus' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'divi-plus' ),
				'update_text'        => esc_attr__( 'Set As Image', 'divi-plus' ),
				'default'			 => 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTA4MCIgaGVpZ2h0PSI1NDAiIHZpZXdCb3g9IjAgMCAxMDgwIDU0MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICAgIDxnIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+CiAgICAgICAgPHBhdGggZmlsbD0iI0VCRUJFQiIgZD0iTTAgMGgxMDgwdjU0MEgweiIvPgogICAgICAgIDxwYXRoIGQ9Ik00NDUuNjQ5IDU0MGgtOTguOTk1TDE0NC42NDkgMzM3Ljk5NSAwIDQ4Mi42NDR2LTk4Ljk5NWwxMTYuMzY1LTExNi4zNjVjMTUuNjItMTUuNjIgNDAuOTQ3LTE1LjYyIDU2LjU2OCAwTDQ0NS42NSA1NDB6IiBmaWxsLW9wYWNpdHk9Ii4xIiBmaWxsPSIjMDAwIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz4KICAgICAgICA8Y2lyY2xlIGZpbGwtb3BhY2l0eT0iLjA1IiBmaWxsPSIjMDAwIiBjeD0iMzMxIiBjeT0iMTQ4IiByPSI3MCIvPgogICAgICAgIDxwYXRoIGQ9Ik0xMDgwIDM3OXYxMTMuMTM3TDcyOC4xNjIgMTQwLjMgMzI4LjQ2MiA1NDBIMjE1LjMyNEw2OTkuODc4IDU1LjQ0NmMxNS42Mi0xNS42MiA0MC45NDgtMTUuNjIgNTYuNTY4IDBMMTA4MCAzNzl6IiBmaWxsLW9wYWNpdHk9Ii4yIiBmaWxsPSIjMDAwIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz4KICAgIDwvZz4KPC9zdmc+Cg==',
				'dynamic_content'    => 'image',
				'tab_slug'           => 'general',
				'toggle_slug'        => 'main_content',
				'sub_toggle'         => 'after_content',
				'description'        => esc_html__( 'Upload After Image.', 'divi-plus' ),
			),
			'show_after_label'                => array(
				'label'           => esc_html__( 'Show Label', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'default'         => 'off',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'sub_toggle'      => 'after_content',
				'description'     => esc_html__( 'Control Label Display.', 'divi-plus' ),
			),
			'after_label'                     => array(
				'label'           => esc_html__( 'Label', 'divi-plus' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'show_if'         => array(
					'show_after_label' => 'on',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'sub_toggle'      => 'after_content',
				'description'     => esc_html__( 'Set a custom after label.', 'divi-plus' ),
			),
			'after_label_bg'                  => array(
				'label'       => esc_html__( 'Label Background', 'divi-plus' ),
				'type'        => 'color-alpha',
				'show_if'     => array(
					'show_after_label' => 'on',
				),
				'default'     => $et_accent_color,
				'tab_slug'    => 'general',
				'toggle_slug' => 'main_content',
				'sub_toggle'  => 'after_content',
				'description' => esc_html__( 'After Label Background.', 'divi-plus' ),
			),
			'slider_orientation'              => array(
				'label'           => esc_html__( 'Slider Orientation', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'horizontal' => esc_html__( 'Horizontal', 'divi-plus' ),
					'vertical'   => esc_html__( 'Vertical', 'divi-plus' ),
				),
				'default'         => 'horizontal',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'before_after_styling',
				'description'     => esc_html__( 'Orientation of the before and after images', 'divi-plus' ),
			),
			'handle_offset'                   => array(
				'label'           => esc_html__( 'Handle Offset', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'range_settings'  => array(
					'min'  => '0',
					'max'  => '0.99',
					'step' => '0.1',
				),
				'mobile_options'  => true,
				'default'         => '0.5',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'before_after_styling',
				'description'     => esc_html__( 'How much of the before image is visible when the page loads.', 'divi-plus' ),
			),
			'move_on_hover'                   => array(
				'label'           => esc_html__( 'Move On Hover', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'default'         => 'off',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'before_after_styling',
				'description'     => esc_html__( 'Move slider on mouse hover?', 'divi-plus' ),
			),
			'move_on_click'                   => array(
				'label'           => esc_html__( 'Move On Click', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'default'         => 'off',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'before_after_styling',
				'description'     => esc_html__( 'Allow a user to click (or tap) anywhere on the image to move the slider to that location.', 'divi-plus' ),
			),
			'slider_handle_color'             => array(
				'label'        => esc_html__( 'Handle Color', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'default'      => $et_accent_color,
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'before_after_styling',
				'description'  => esc_html__( 'Here you can select Handle Color', 'divi-plus' ),
			),
			'show_slider_overlay'             => array(
				'label'           => esc_html__( 'On Hover Overlay', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'default'         => 'off',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'before_after_styling',
				'description'     => esc_html__( 'Slider on hover overlay', 'divi-plus' ),
			),
			'slider_overlay_type'             => array(
				'label'           => esc_html__( 'Overlay Type', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'basic_option',
				'options'         => array(
					'color'    => esc_html__( 'Color', 'divi-plus' ),
					'gradient' => esc_html__( 'Gradient', 'divi-plus' ),
				),
				'show_if'         => array(
					'show_slider_overlay' => 'on',
				),
				'default'         => 'color',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'before_after_styling',
				'description'     => esc_html__( 'Here you can choose slider overlay type.', 'divi-plus' ),
			),
			'slider_overlay_bg_color'         => array(
				'label'        => esc_html__( 'Overlay Color', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'show_if'      => array(
					'show_slider_overlay' => 'on',
					'slider_overlay_type' => 'color',
				),
				'default'      => $et_accent_color,
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'before_after_styling',
				'description'  => esc_html__( 'Here you can select second Gradient Color', 'divi-plus' ),
			),
			'overlay_grandient_color_1'       => array(
				'label'        => esc_html__( 'Gradient Color 1', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'show_if'      => array(
					'show_slider_overlay' => 'on',
					'slider_overlay_type' => 'gradient',
				),
				'default'      => '#2b87da',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'before_after_styling',
				'description'  => esc_html__( 'Here you can select first Gradient Color', 'divi-plus' ),
			),
			'overlay_grandient_color_2'       => array(
				'label'        => esc_html__( 'Gradient Color 2', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'show_if'      => array(
					'show_slider_overlay' => 'on',
					'slider_overlay_type' => 'gradient',
				),
				'default'      => '#29c4a9',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'before_after_styling',
				'description'  => esc_html__( 'Here you can select second Gradient Color', 'divi-plus' ),
			),
			'overlay_gradient_type'           => array(
				'label'           => esc_html__( 'Gradient Type', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'linear-gradient' => esc_html__( 'Linear', 'divi-plus' ),
					'radial-gradient' => esc_html__( 'Radial', 'divi-plus' ),
				),
				'show_if'         => array(
					'show_slider_overlay' => 'on',
					'slider_overlay_type' => 'gradient',
				),
				'default'         => 'linear-gradient',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'before_after_styling',
				'description'     => esc_html__( 'Here you can select Gradient Type', 'divi-plus' ),
			),
			'overlay_linear_direction'        => array(
				'label'          => esc_html__( 'Gradient Direction', 'divi-plus' ),
				'type'           => 'range',
				'range_settings' => array(
					'min'  => '1',
					'max'  => '360',
					'step' => '1',
				),
				'show_if'        => array(
					'show_slider_overlay'   => 'on',
					'slider_overlay_type'   => 'gradient',
					'overlay_gradient_type' => 'linear-gradient',
				),
				'default'        => '180deg',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'before_after_styling',
				'description'    => esc_html__( 'Here you can select Linear Gradient Direction', 'divi-plus' ),
			),
			'overlay_radial_direction'        => array(
				'label'           => esc_html__( 'Gradient Direction', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
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
					'show_slider_overlay'   => 'on',
					'slider_overlay_type'   => 'gradient',
					'overlay_gradient_type' => 'radial-gradient',
				),
				'default'         => 'circle at center',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'before_after_styling',
				'description'     => esc_html__( 'Here you can select Radial Gradient Direction', 'divi-plus' ),
			),
			'overlay_gradient_start_position' => array(
				'label'          => esc_html__( 'Start Position', 'divi-plus' ),
				'type'           => 'range',
				'range_settings' => array(
					'min'  => '0',
					'max'  => '100',
					'step' => '1',
				),
				'show_if'        => array(
					'show_slider_overlay' => 'on',
					'slider_overlay_type' => 'gradient',
				),
				'default'        => '0%',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'before_after_styling',
				'description'    => esc_html__( 'Here you can select Gradient Start Position', 'divi-plus' ),
			),
			'overlay_gradient_end_position'   => array(
				'label'          => esc_html__( 'End Position', 'divi-plus' ),
				'type'           => 'range',
				'range_settings' => array(
					'min'  => '0',
					'max'  => '100',
					'step' => '1',
				),
				'show_if'        => array(
					'show_slider_overlay' => 'on',
					'slider_overlay_type' => 'gradient',
				),
				'default'        => '100%',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'before_after_styling',
				'description'    => esc_html__( 'Here you can select Gradient End Position', 'divi-plus' ),
			),
			'__images'                        => array(
				'type'                => 'computed',
				'computed_callback'   => array( 'DIPL_BeforeAfterSlider', 'slider_images' ),
				'computed_depends_on' => array(
					'before_image',
					'after_image',
					'show_before_label',
					'before_label',
					'show_after_label',
					'after_label',
					'slider_orientation',
					'handle_offset',
					'move_on_hover',
					'move_on_click',
					'show_slider_overlay',
				),
			),
		);
	}

	public static function slider_images( $args = array() ) {
		$defaults = array(
			'before_img' => '',
			'after_img'  => '',
		);

		$args = wp_parse_args( $args, $defaults );

		$before_image = $args['before_image'];
		$after_image  = $args['after_image'];

		if ( '' !== $before_image ) {
			$before_image_wrapper = sprintf(
				'<img class="dipl-before-img" src="%1$s"/>',
				$before_image
			);
		} else {
			$before_image_wrapper = '';
		}

		if ( '' !== $after_image ) {
			$after_image_wrapper = sprintf(
				'<img class="dipl-after-img" src="%1$s"/>',
				$after_image
			);
		} else {
			$after_image_wrapper = '';
		}

		$output = $before_image_wrapper . $after_image_wrapper;

		return $output;
	}

	public function render( $attrs, $content, $render_slug ) {

		$multi_view                  	 = et_pb_multi_view_options( $this );
		$before_image                    = $this->props['before_image'];
		$before_label_bg                 = $this->props['before_label_bg'];
		$show_before_label               = $this->props['show_before_label'];
		$after_image                     = $this->props['after_image'];
		$after_label_bg                  = $this->props['after_label_bg'];
		$show_after_label                = $this->props['show_after_label'];
		$show_slider_overlay             = $this->props['show_slider_overlay'];
		$slider_overlay_type             = $this->props['slider_overlay_type'];
		$slider_overlay_bg_color         = $this->props['slider_overlay_bg_color'];
		$overlay_gradient_type           = $this->props['overlay_gradient_type'];
		$overlay_grandient_color_1       = $this->props['overlay_grandient_color_1'];
		$overlay_grandient_color_2       = $this->props['overlay_grandient_color_2'];
		$overlay_linear_direction        = $this->props['overlay_linear_direction'];
		$overlay_radial_direction        = $this->props['overlay_radial_direction'];
		$overlay_gradient_start_position = $this->props['overlay_gradient_start_position'];
		$overlay_gradient_end_position   = $this->props['overlay_gradient_end_position'];
		$slider_handle_color             = $this->props['slider_handle_color'];

		$before_image_wrapper = $multi_view->render_element(
			array(
				'tag'      => 'img',
				'attrs'    => array(
					'src'   => '{{before_image}}',
					'class' => 'dipl-before-img',
				),
				'required' => 'before_image',
			)
		);

		$after_image_wrapper = $multi_view->render_element(
			array(
				'tag'      => 'img',
				'attrs'    => array(
					'src'   => '{{after_image}}',
					'class' => 'dipl-after-img',
				),
				'required' => 'after_image',
			)
		);

		if ( $before_image_wrapper || $after_image_wrapper ) {

			if ( 'on' === $show_slider_overlay ) {
				if ( 'color' === $slider_overlay_type ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl-before-after-slider-wrapper .twentytwenty-overlay:hover',
							'declaration' => sprintf( 'background: %1$s;', esc_attr( $slider_overlay_bg_color ) ),
						)
					);
				} else {
					if ( 'linear-gradient' === $overlay_gradient_type ) {
						self::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% .dipl-before-after-slider-wrapper .twentytwenty-overlay:hover',
								'declaration' => sprintf( 'background-image: linear-gradient(%1$s, %2$s %3$s, %4$s %5$s);', esc_attr( $overlay_linear_direction ), esc_attr( $overlay_grandient_color_1 ), esc_attr( $overlay_gradient_start_position ), esc_html( $overlay_grandient_color_2 ), esc_attr( $overlay_gradient_end_position ) ),
							)
						);
					}

					if ( 'radial-gradient' === $overlay_gradient_type ) {
						self::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% .dipl-before-after-slider-wrapper .twentytwenty-overlay:hover',
								'declaration' => sprintf( 'background-image: radial-gradient(%1$s, %2$s %3$s, %4$s %5$s);', esc_attr( $overlay_radial_direction ), esc_attr( $overlay_grandient_color_1 ), esc_attr( $overlay_gradient_start_position ), esc_attr( $overlay_grandient_color_2 ), esc_attr( $overlay_gradient_end_position ) ),
							)
						);
					}
				}
			} else {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl-before-after-slider-wrapper .twentytwenty-overlay:hover',
						'declaration' => sprintf( 'background: transparent;' ),
					)
				);
			}

			if ( '' !== $slider_handle_color ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl-before-after-slider-wrapper .twentytwenty-handle',
						'declaration' => sprintf( 'border-color: %1$s;', esc_attr( $slider_handle_color ) ),
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl-before-after-slider-wrapper .twentytwenty-up-arrow',
						'declaration' => sprintf( 'border-bottom-color: %1$s;', esc_attr( $slider_handle_color ) ),
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl-before-after-slider-wrapper .twentytwenty-down-arrow',
						'declaration' => sprintf( 'border-top-color: %1$s;', esc_attr( $slider_handle_color ) ),
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl-before-after-slider-wrapper .twentytwenty-left-arrow',
						'declaration' => sprintf( 'border-right-color: %1$s;', esc_attr( $slider_handle_color ) ),
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl-before-after-slider-wrapper .twentytwenty-right-arrow',
						'declaration' => sprintf( 'border-left-color: %1$s;', esc_attr( $slider_handle_color ) ),
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl-before-after-slider-wrapper .twentytwenty-horizontal 									.twentytwenty-handle::before,
										%%order_class%% .dipl-before-after-slider-wrapper .twentytwenty-horizontal .twentytwenty-handle::after, 
										%%order_class%% .dipl-before-after-slider-wrapper .twentytwenty-vertical .twentytwenty-handle::before, 
										%%order_class%% .dipl-before-after-slider-wrapper .twentytwenty-vertical .twentytwenty-handle::after',
						'declaration' => sprintf( 'background: %1$s;', esc_attr( $slider_handle_color ) ),
					)
				);
			}

			if ( '' !== $before_label_bg && 'on' === $show_before_label ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl-before-after-slider-wrapper .twentytwenty-before-label:before',
						'declaration' => sprintf( 'background: %1$s;', esc_attr( $before_label_bg ) ),
					)
				);
			}

			if ( '' !== $after_label_bg && 'on' === $show_after_label ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl-before-after-slider-wrapper .twentytwenty-after-label::before',
						'declaration' => sprintf( 'background: %1$s;', esc_attr( $after_label_bg ) ),
					)
				);
			}

			wp_enqueue_script( 'elicus-twenty-twenty-script' );
			wp_enqueue_script( 'elicus-event-move-script' );
			$file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        	wp_enqueue_style( 'dipl-before-after-slider-style', PLUGIN_PATH . 'includes/modules/BeforeAfterSlider/' . $file . '.min.css', array(), '1.0.0' );

			$output = sprintf(
				'<div class="dipl-before-after-slider-wrapper">
					<div class="dipl-image-wrapper">
			 			%1$s%2$s
					</div>
				</div>%3$s',
				et_core_intentionally_unescaped( $before_image_wrapper, 'html' ),
				et_core_intentionally_unescaped( $after_image_wrapper, 'html' ),
				et_core_intentionally_unescaped( $this->init_slider(), 'html' )
			);

			return et_core_intentionally_unescaped( $output, 'html' );

		}

		return '';
	}

	public function init_slider() {

		$props				  = $this->props;
		$offset               = ( '' !== $props['handle_offset'] ) ? $props['handle_offset'] : 0.5;
		$orientation          = ( '' !== $props['slider_orientation'] ) ? $props['slider_orientation'] : 'horizontal';
		$move_slider_on_hover = ( 'on' === $props['move_on_hover'] ) ? true : false;
		$click_to_move        = ( 'on' === $props['move_on_click'] && ! $move_slider_on_hover ) ? true : false;
		$order_class          = $this->get_module_order_class( 'dipl_before_after_slider' );

		if ( 'on' === $props['show_before_label'] ) {
			$before_label = ( '' !== $props['before_label'] ) ? sprintf( esc_html( '%s' ), esc_html( $props['before_label'] ) ) : '';
		} else {
			$before_label = '';
		}

		if ( 'on' === $props['show_after_label'] ) {
			$after_label = ( '' !== $props['after_label'] ) ? sprintf( esc_html( '%s' ), esc_html( $props['after_label'] ) ) : '';
		} else {
			$after_label = '';
		}

		return '<script type="text/javascript">
				jQuery(function($) {
					$(".' . esc_attr( $order_class ) . ' .dipl-image-wrapper").twentytwenty({
					    default_offset_pct: "' . esc_attr( $offset ) . '",
					    orientation: "' . esc_attr( $orientation ) . '",
					    before_label: "' . esc_attr( $before_label ) . '",
					    after_label: "' . esc_attr( $after_label ) . '",
					    move_slider_on_hover: "' . esc_attr( $move_slider_on_hover ) . '",
					    move_with_handle_only: true,
					    click_to_move: "' . esc_attr( $click_to_move ) . '"
					});
				});
			</script>';
	}
}
$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
    $modules = explode( ',', $plugin_options['dipl-modules'] );
    if ( in_array( 'dipl_before_after_slider', $modules ) ) {
        new DIPL_BeforeAfterSlider();
    }
} else {
    new DIPL_BeforeAfterSlider();
}