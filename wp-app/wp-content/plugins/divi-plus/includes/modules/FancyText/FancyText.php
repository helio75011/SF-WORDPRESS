<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.4
 */
class DIPL_Fancy_Text extends ET_Builder_Module {

	public $slug       = 'dipl_fancy_text';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name = esc_html__( 'DP Fancy Text', 'divi-plus' );
	}

	public function get_settings_modal_toggles() {
		return array(
			'general'  => array(
				'toggles' => array(
					'main_content' => array(
						'title'    => esc_html__( 'Fancy Text Content', 'divi-plus' ),
						'priority' => 1,
					),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'fancy_text_settings' => array(
						'title'    => esc_html__( 'Fancy Text Styling', 'divi-plus' ),
						'priority' => 1,
					),
					'text_settings'       => array(
						'title'    => esc_html__( 'Text Settings', 'divi-plus' ),
						'priority' => 2,
					),
					'title_settings'      => array(
						'title'    => esc_html__( 'Title Settings', 'divi-plus' ),
						'priority' => 3,
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
					'hide_text_color' => true,
					'css'             => array(
						'main' => '%%order_class%% .dipl-text-wrapper-inner h1,
									%%order_class%% .dipl-text-wrapper-inner h2,
									%%order_class%% .dipl-text-wrapper-inner h3,
									%%order_class%% .dipl-text-wrapper-inner h4,
									%%order_class%% .dipl-text-wrapper-inner h5,
									%%order_class%% .dipl-text-wrapper-inner h6',
						'text_align' => "%%order_class%% .dipl-text-wrapper-inner",
					),
					'important'       => 'all',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'title_settings',
				),
				'body'  => array(
					'label'           => esc_html__( 'Text', 'divi-plus' ),
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
					'hide_text_color' => true,
					'css'             => array(
						'main' => '%%order_class%% .dipl-text-wrapper-inner p,
									%%order_class%% .dipl-text-wrapper-inner',
					),
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
			'max_width'             => array(
				'css' => array(
					'main'             => '%%order_class%%',
					'module_alignment' => '%%order_class%%',
				),
			),
			'overlay'               => array(
				'overlay' => array(
					'label'          => 'Overlay Padding',
					'margin_padding' => array(
						'css' => array(
							'main'      => '%%order_class%% .dipl-text-wrapper',
							'important' => 'all',
						),
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'fancy_text_settings',
				),
			),
			'text'                  => false,
		);
	}

	public function get_fields() {
		$et_accent_color = et_builder_accent_color();

		return array(
			'text_style'                   => array(
				'label'           => esc_html__( 'Text Style', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'dipl_gradient' => esc_html__( 'Gradient', 'divi-plus' ),
					'dipl_clipping' => esc_html__( 'Background Clipping', 'divi-plus' ),
				),
				'default'         => 'dipl_gradient',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can choose Text Style', 'divi-plus' ),
			),
			'fancy_text'                   => array(
				'label'            => esc_html__( 'Fancy Text', 'divi-plus' ),
				'type'             => 'textarea',
				'option_category'  => 'basic_option',
				'dynamic_content'  => 'text',
				'default_on_front' => 'Fancy Text',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Here you can set text', 'divi-plus' ),
			),
			'grandient_color_1'            => array(
				'label'        => esc_html__( 'Gradient Color 1', 'divi-plus' ),
				'type'         => 'color-alpha',
				'hover'        => 'tabs',
				'custom_color' => true,
				'show_if'      => array(
					'text_style' => 'dipl_gradient',
				),
				'default'      => '#2b87da',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'fancy_text_settings',
				'description'  => esc_html__( 'Here you can select first Gradient Color', 'divi-plus' ),
			),
			'grandient_color_2'            => array(
				'label'        => esc_html__( 'Gradient Color 2', 'divi-plus' ),
				'type'         => 'color-alpha',
				'hover'        => 'tabs',
				'custom_color' => true,
				'show_if'      => array(
					'text_style' => 'dipl_gradient',
				),
				'default'      => '#29c4a9',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'fancy_text_settings',
				'description'  => esc_html__( 'Here you can select second Gradient Color', 'divi-plus' ),
			),
			'gradient_type'                => array(
				'label'           => esc_html__( 'Gradient Type', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'linear-gradient' => esc_html__( 'Linear', 'divi-plus' ),
					'radial-gradient' => esc_html__( 'Radial', 'divi-plus' ),
				),
				'show_if'         => array(
					'text_style' => 'dipl_gradient',
				),
				'default'         => 'linear-gradient',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'fancy_text_settings',
				'description'     => esc_html__( 'Here you can select Gradient Type', 'divi-plus' ),
			),
			'linear_direction'             => array(
				'label'          => esc_html__( 'Gradient Direction', 'divi-plus' ),
				'type'           => 'range',
				'range_settings' => array(
					'min'  => '1',
					'max'  => '360',
					'step' => '1',
				),
				'show_if'        => array(
					'text_style'    => 'dipl_gradient',
					'gradient_type' => 'linear-gradient',
				),
				'default'        => '180deg',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'fancy_text_settings',
				'description'    => esc_html__( 'Here you can select Linear Gradient Direction', 'divi-plus' ),
			),
			'radial_direction'             => array(
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
					'text_style'    => 'dipl_gradient',
					'gradient_type' => 'radial-gradient',
				),
				'default'         => 'circle at center',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'fancy_text_settings',
				'description'     => esc_html__( 'Here you can select Radial Gradient Direction', 'divi-plus' ),
			),
			'gradient_start_position'      => array(
				'label'          => esc_html__( 'Start Position', 'divi-plus' ),
				'type'           => 'range',
				'range_settings' => array(
					'min'  => '0',
					'max'  => '100',
					'step' => '1',
				),
				'show_if'        => array(
					'text_style' => 'dipl_gradient',
				),
				'default'        => '0%',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'fancy_text_settings',
				'description'    => esc_html__( 'Here you can select Gradient Start Position', 'divi-plus' ),
			),
			'gradient_end_position'        => array(
				'label'          => esc_html__( 'End Position', 'divi-plus' ),
				'type'           => 'range',
				'range_settings' => array(
					'min'  => '0',
					'max'  => '100',
					'step' => '1',
				),
				'show_if'        => array(
					'text_style' => 'dipl_gradient',
				),
				'default'        => '100%',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'fancy_text_settings',
				'description'    => esc_html__( 'Here you can select Gradient End Position', 'divi-plus' ),
			),
			'clip_image'                   => array(
				'label'              => esc_html__( 'Clip Background Image', 'divi-plus' ),
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'upload_button_text' => esc_attr__( 'Upload an image', 'divi-plus' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'divi-plus' ),
				'update_text'        => esc_attr__( 'Set As Image', 'divi-plus' ),
				'show_if'            => array(
					'text_style' => 'dipl_clipping',
				),
				'dynamic_content'    => 'image',
				'default'			 => 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTA4MCIgaGVpZ2h0PSI1NDAiIHZpZXdCb3g9IjAgMCAxMDgwIDU0MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICAgIDxnIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+CiAgICAgICAgPHBhdGggZmlsbD0iI0VCRUJFQiIgZD0iTTAgMGgxMDgwdjU0MEgweiIvPgogICAgICAgIDxwYXRoIGQ9Ik00NDUuNjQ5IDU0MGgtOTguOTk1TDE0NC42NDkgMzM3Ljk5NSAwIDQ4Mi42NDR2LTk4Ljk5NWwxMTYuMzY1LTExNi4zNjVjMTUuNjItMTUuNjIgNDAuOTQ3LTE1LjYyIDU2LjU2OCAwTDQ0NS42NSA1NDB6IiBmaWxsLW9wYWNpdHk9Ii4xIiBmaWxsPSIjMDAwIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz4KICAgICAgICA8Y2lyY2xlIGZpbGwtb3BhY2l0eT0iLjA1IiBmaWxsPSIjMDAwIiBjeD0iMzMxIiBjeT0iMTQ4IiByPSI3MCIvPgogICAgICAgIDxwYXRoIGQ9Ik0xMDgwIDM3OXYxMTMuMTM3TDcyOC4xNjIgMTQwLjMgMzI4LjQ2MiA1NDBIMjE1LjMyNEw2OTkuODc4IDU1LjQ0NmMxNS42Mi0xNS42MiA0MC45NDgtMTUuNjIgNTYuNTY4IDBMMTA4MCAzNzl6IiBmaWxsLW9wYWNpdHk9Ii4yIiBmaWxsPSIjMDAwIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz4KICAgIDwvZz4KPC9zdmc+Cg==',
				'tab_slug'           => 'advanced',
				'toggle_slug'        => 'fancy_text_settings',
				'description'        => esc_html__( 'Upload an image for clipping.', 'divi-plus' ),
			),
			'clip_bg_size'                 => array(
				'label'           => esc_html__( 'Background Size', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'basic_option',
				'options'         => array(
					'cover'   => esc_html__( 'Cover', 'divi-plus' ),
					'contain' => esc_html__( 'Fit', 'divi-plus' ),
					'auto'    => esc_html__( 'Actual Size', 'divi-plus' ),
				),
				'show_if'         => array(
					'text_style' => 'dipl_clipping',
				),
				'default'         => 'cover',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'fancy_text_settings',
				'description'     => esc_html__( 'Here you can choose whether icon set below should be used.', 'divi-plus' ),
			),
			'clip_bg_position'             => array(
				'label'           => esc_html__( 'Background Position', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'basic_option',
				'options'         => array(
					'top left'      => esc_html__( 'Top Left', 'divi-plus' ),
					'top center'    => esc_html__( 'Top Center', 'divi-plus' ),
					'top right'     => esc_html__( 'Top Right', 'divi-plus' ),
					'center left'   => esc_html__( 'Center Left', 'divi-plus' ),
					'center'        => esc_html__( 'Center', 'divi-plus' ),
					'center right'  => esc_html__( 'Center Right', 'divi-plus' ),
					'bottom left'   => esc_html__( 'Bottom Left', 'divi-plus' ),
					'bottom center' => esc_html__( 'Bottom Center', 'divi-plus' ),
					'bottom right'  => esc_html__( 'Bottom Right', 'divi-plus' ),
				),
				'show_if'         => array(
					'text_style' => 'dipl_clipping',
				),
				'default'         => 'center',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'fancy_text_settings',
				'description'     => esc_html__( 'Here you can choose whether icon set below should be used.', 'divi-plus' ),
			),
			'clip_bg_repeat'               => array(
				'label'           => esc_html__( 'Background Repeat', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'basic_option',
				'options'         => array(
					'initial'  => esc_html__( 'No Repeat', 'divi-plus' ),
					'repeat'   => esc_html__( 'Repeat', 'divi-plus' ),
					'repeat-x' => esc_html__( 'Repeat X (horizontal)', 'divi-plus' ),
					'repeat-y' => esc_html__( 'Repeat Y (vertical)', 'divi-plus' ),
					'space'    => esc_html__( 'Space', 'divi-plus' ),
					'round'    => esc_html__( 'Round', 'divi-plus' ),
				),
				'show_if'         => array(
					'text_style' => 'dipl_clipping',
				),
				'default'         => 'initial',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'fancy_text_settings',
				'description'     => esc_html__( 'Here you can choose whether icon set below should be used.', 'divi-plus' ),
			),
			'clip_overlay'                 => array(
				'label'           => esc_html__( 'Background Color Overlay', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'basic_option',
				'options'         => array(
					'none'     => esc_html__( 'None', 'divi-plus' ),
					'color'    => esc_html__( 'Color', 'divi-plus' ),
					'gradient' => esc_html__( 'Gradient', 'divi-plus' ),
				),
				'show_if'         => array(
					'text_style' => 'dipl_clipping',
				),
				'default'         => 'none',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'fancy_text_settings',
				'description'     => esc_html__( 'Here you can choose whether icon set below should be used.', 'divi-plus' ),
			),
			'clip_bg_color'                => array(
				'label'        => esc_html__( 'Clip Background Color', 'divi-plus' ),
				'type'         => 'color-alpha',
				'hover'        => 'tabs',
				'custom_color' => true,
				'show_if'      => array(
					'text_style'   => 'dipl_clipping',
					'clip_overlay' => 'color',
				),
				'default'      => '#000',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'fancy_text_settings',
				'description'  => esc_html__( 'Here you can select second Gradient Color', 'divi-plus' ),
			),
			'clip_grandient_color_1'       => array(
				'label'        => esc_html__( 'Gradient Color 1', 'divi-plus' ),
				'type'         => 'color-alpha',
				'hover'        => 'tabs',
				'custom_color' => true,
				'show_if'      => array(
					'text_style'   => 'dipl_clipping',
					'clip_overlay' => 'gradient',
				),
				'default'      => '#2b87da',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'fancy_text_settings',
				'description'  => esc_html__( 'Here you can select first Gradient Color', 'divi-plus' ),
			),
			'clip_grandient_color_2'       => array(
				'label'        => esc_html__( 'Gradient Color 2', 'divi-plus' ),
				'type'         => 'color-alpha',
				'hover'        => 'tabs',
				'custom_color' => true,
				'show_if'      => array(
					'text_style'   => 'dipl_clipping',
					'clip_overlay' => 'gradient',
				),
				'default'      => '#29c4a9',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'fancy_text_settings',
				'description'  => esc_html__( 'Here you can select second Gradient Color', 'divi-plus' ),
			),
			'clip_gradient_type'           => array(
				'label'           => esc_html__( 'Gradient Type', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'linear-gradient' => esc_html__( 'Linear', 'divi-plus' ),
					'radial-gradient' => esc_html__( 'Radial', 'divi-plus' ),
				),
				'show_if'         => array(
					'text_style'   => 'dipl_clipping',
					'clip_overlay' => 'gradient',
				),
				'default'         => 'linear-gradient',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'fancy_text_settings',
				'description'     => esc_html__( 'Here you can select Gradient Type', 'divi-plus' ),
			),
			'clip_linear_direction'        => array(
				'label'          => esc_html__( 'Gradient Direction', 'divi-plus' ),
				'type'           => 'range',
				'range_settings' => array(
					'min'  => '1',
					'max'  => '360',
					'step' => '1',
				),
				'show_if'        => array(
					'text_style'    => 'dipl_clipping',
					'clip_overlay'  => 'gradient',
					'clip_gradient_type' => 'linear-gradient',
				),
				'default'        => '180deg',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'fancy_text_settings',
				'description'    => esc_html__( 'Here you can select Linear Gradient Direction', 'divi-plus' ),
			),
			'clip_radial_direction'        => array(
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
					'text_style'    => 'dipl_clipping',
					'clip_overlay'  => 'gradient',
					'clip_gradient_type' => 'radial-gradient',
				),
				'default'         => 'circle at center',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'fancy_text_settings',
				'description'     => esc_html__( 'Here you can select Radial Gradient Direction', 'divi-plus' ),
			),
			'clip_gradient_start_position' => array(
				'label'          => esc_html__( 'Start Position', 'divi-plus' ),
				'type'           => 'range',
				'range_settings' => array(
					'min'  => '0',
					'max'  => '100',
					'step' => '1',
				),
				'show_if'        => array(
					'text_style'   => 'dipl_clipping',
					'clip_overlay' => 'gradient',
				),
				'default'        => '0%',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'fancy_text_settings',
				'description'    => esc_html__( 'Here you can select Gradient Start Position', 'divi-plus' ),
			),
			'clip_gradient_end_position'   => array(
				'label'          => esc_html__( 'End Position', 'divi-plus' ),
				'type'           => 'range',
				'range_settings' => array(
					'min'  => '0',
					'max'  => '100',
					'step' => '1',
				),
				'show_if'        => array(
					'text_style'   => 'dipl_clipping',
					'clip_overlay' => 'gradient',
				),
				'default'        => '100%',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'fancy_text_settings',
				'description'    => esc_html__( 'Here you can select Gradient End Position', 'divi-plus' ),
			),
			'overlay_custom_padding'       => array(
				'label'           => esc_html__( 'Overlay Padding', 'divi-plus' ),
				'type'            => 'custom_padding',
				'option_category' => 'layout',
				'mobile_options'  => true,
				'show_if'         => array(
					'text_style'   => 'dipl_clipping',
					'clip_overlay' => array( 'color', 'gradient' ),
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'fancy_text_settings',
				'description'     => esc_html__( 'Here you can choose Overlay Padding', 'divi-plus' ),
			),
		);
	}

	public function render( $attrs, $content, $render_slug ) {
		$text_style                   = $this->props['text_style'];
		$fancy_text                   = $this->props['fancy_text'];
		$grandient_color_1            = $this->props['grandient_color_1'];
		$grandient_color_1_hover      = $this->get_hover_value( 'grandient_color_1' );
		$grandient_color_2            = $this->props['grandient_color_2'];
		$grandient_color_2_hover      = $this->get_hover_value( 'grandient_color_2' );
		$gradient_type                = $this->props['gradient_type'];
		$linear_direction             = $this->props['linear_direction'];
		$radial_direction             = $this->props['radial_direction'];
		$gradient_start_position      = $this->props['gradient_start_position'];
		$gradient_end_position        = $this->props['gradient_end_position'];
		$clip_image                   = $this->props['clip_image'];
		$clip_bg_position             = $this->props['clip_bg_position'];
		$clip_bg_repeat               = $this->props['clip_bg_repeat'];
		$clip_bg_size                 = $this->props['clip_bg_size'];
		$clip_overlay                 = $this->props['clip_overlay'];
		$clip_bg_color                = $this->props['clip_bg_color'];
		$clip_bg_color_hover          = $this->get_hover_value( 'clip_bg_color' );
		$clip_grandient_color_1       = $this->props['clip_grandient_color_1'];
		$clip_grandient_color_1_hover = $this->get_hover_value( 'clip_grandient_color_1' );
		$clip_grandient_color_2       = $this->props['clip_grandient_color_2'];
		$clip_grandient_color_2_hover = $this->get_hover_value( 'clip_grandient_color_2' );
		$clip_gradient_type           = $this->props['clip_gradient_type'];
		$clip_linear_direction        = $this->props['clip_linear_direction'];
		$clip_radial_direction        = $this->props['clip_radial_direction'];
		$clip_gradient_start_position = $this->props['clip_gradient_start_position'];
		$clip_gradient_end_position   = $this->props['clip_gradient_end_position'];

		if ( 'dipl_gradient' === $text_style ) {
			if ( 'linear-gradient' === $gradient_type ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%%.dipl_fancy_text .dipl_gradient_text',
						'declaration' => sprintf( 'background-image: linear-gradient(%1$s, %2$s %3$s, %4$s %5$s);', esc_attr( $linear_direction ), esc_attr( $grandient_color_1 ), esc_attr( $gradient_start_position ), esc_attr( $grandient_color_2 ), esc_attr( $gradient_end_position ) ),
					)
				);
			}

			if ( 'radial-gradient' === $gradient_type ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%%.dipl_fancy_text .dipl_gradient_text',
						'declaration' => sprintf( 'background-image: radial-gradient(%1$s, %2$s %3$s, %4$s %5$s);', esc_attr( $radial_direction ), esc_attr( $grandient_color_1 ), esc_attr( $gradient_start_position ), esc_attr( $grandient_color_2 ), esc_attr( $gradient_end_position ) ),
					)
				);
			}

			if ( 'linear-gradient' === $gradient_type && ( isset( $grandient_color_1_hover ) || isset( $grandient_color_2_hover ) ) ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%%.dipl_fancy_text:hover .dipl_gradient_text',
						'declaration' => sprintf( 'background-image: linear-gradient(%1$s, %2$s %3$s, %4$s %5$s);', esc_attr( $linear_direction ), esc_attr( $grandient_color_1_hover ), esc_attr( $gradient_start_position ), esc_attr( $grandient_color_2_hover ), esc_attr( $gradient_end_position ) ),
					)
				);
			}

			if ( 'radial-gradient' === $gradient_type && ( isset( $grandient_color_1_hover ) || isset( $grandient_color_2_hover ) ) ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%%.dipl_fancy_text:hover .dipl_gradient_text',
						'declaration' => sprintf( 'background-image: radial-gradient(%1$s, %2$s %3$s, %4$s %5$s);', esc_attr( $radial_direction ), esc_attr( $grandient_color_1_hover ), esc_attr( $gradient_start_position ), esc_attr( $grandient_color_2_hover ), esc_attr( $gradient_end_position ) ),
					)
				);
			}
		} else {
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%.dipl_fancy_text .dipl_clipping_text',
					'declaration' => sprintf( 'background-image: url(%1$s);', esc_attr( $clip_image ) ),
				)
			);
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%.dipl_fancy_text .dipl_clipping_text',
					'declaration' => sprintf( 'background-repeat: %1$s;', esc_attr( $clip_bg_repeat ) ),
				)
			);
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%.dipl_fancy_text .dipl_clipping_text',
					'declaration' => sprintf( 'background-position: %1$s;', esc_attr( $clip_bg_position ) ),
				)
			);
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%.dipl_fancy_text .dipl_clipping_text',
					'declaration' => sprintf( 'background-size: %1$s;', esc_attr( $clip_bg_size ) ),
				)
			);

			if ( 'none' !== $clip_overlay ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%%.dipl_fancy_text .dipl_clipping_text:before',
						'declaration' => sprintf( 'content: "";' ),
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%%.dipl_fancy_text .dipl_clipping_text:before',
						'declaration' => sprintf( 'background-repeat: %1$s;', esc_attr( $clip_bg_repeat ) ),
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%%.dipl_fancy_text .dipl_clipping_text:before',
						'declaration' => sprintf( 'background-position: %1$s;', esc_attr( $clip_bg_position ) ),
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%%.dipl_fancy_text .dipl_clipping_text:before',
						'declaration' => sprintf( 'background-size: %1$s;', esc_attr( $clip_bg_size ) ),
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%%.dipl_fancy_text .dipl_clipping_text:after',
						'declaration' => sprintf( 'content: "";' ),
					)
				);
			}

			if ( 'color' === $clip_overlay ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%%.dipl_fancy_text .dipl_clipping_text:after',
						'declaration' => sprintf( 'background-color: %1$s;', esc_attr( $clip_bg_color ) ),
					)
				);
			}
			if ( 'gradient' === $clip_overlay ) {
				if ( 'linear-gradient' === $clip_gradient_type ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%%.dipl_fancy_text .dipl_clipping_text:after',
							'declaration' => sprintf( 'background-image: linear-gradient(%1$s, %2$s %3$s, %4$s %5$s);', esc_attr( $clip_linear_direction ), esc_attr( $clip_grandient_color_1 ), esc_attr( $clip_gradient_start_position ), esc_attr( $clip_grandient_color_2 ), esc_attr( $clip_gradient_end_position ) ),
						)
					);
				}

				if ( 'radial-gradient' === $clip_gradient_type ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%%.dipl_fancy_text .dipl_clipping_text:after',
							'declaration' => sprintf( 'background-image: radial-gradient(%1$s, %2$s %3$s, %4$s %5$s);', esc_attr( $clip_radial_direction ), esc_attr( $clip_grandient_color_1 ), esc_attr( $clip_gradient_start_position ), esc_attr( $clip_grandient_color_2 ), esc_attr( $clip_gradient_end_position ) ),
						)
					);
				}

				if ( 'linear-gradient' === $clip_gradient_type && ( isset( $clip_grandient_color_1_hover ) || isset( $clip_grandient_color_2_hover ) ) ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%%.dipl_fancy_text:hover .dipl_clipping_text:after',
							'declaration' => sprintf( 'background-image: linear-gradient(%1$s, %2$s %3$s, %4$s %5$s);', esc_attr( $clip_linear_direction ), esc_attr( $clip_grandient_color_1_hover ), esc_attr( $clip_gradient_start_position ), esc_attr( $clip_grandient_color_2_hover ), esc_attr( $clip_gradient_end_position ) ),
						)
					);
				}

				if ( 'radial-gradient' === $clip_gradient_type && ( isset( $clip_grandient_color_1_hover ) || isset( $clip_grandient_color_2_hover ) ) ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%%.dipl_fancy_text:hover .dipl_clipping_text:after',
							'declaration' => sprintf( 'background-image: radial-gradient(%1$s, %2$s %3$s, %4$s %5$s);', esc_attr( $clip_radial_direction ), esc_attr( $clip_grandient_color_1_hover ), esc_attr( $clip_gradient_start_position ), esc_attr( $clip_grandient_color_2_hover ), esc_attr( $clip_gradient_end_position ) ),
						)
					);
				}
			}
		}

		$this->process_advanced_css( $this, $render_slug, $this->margin_padding );
		$allowed_html_tags = array(
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
			'p'   	=> array(
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
		$output            = sprintf(
			'<div class=%1$s>
				<div class="dipl-text-wrapper">
					<div class="dipl-text-wrapper-inner %1$s_text">%2$s</div>
				</div>
			</div>',
			esc_attr( $text_style ),
			wp_kses( $fancy_text, $allowed_html_tags )
		);

		$file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        wp_enqueue_style( 'dipl-fancy-text-style', PLUGIN_PATH . 'includes/modules/FancyText/' . $file . '.min.css', array(), '1.0.0' );

		return et_core_intentionally_unescaped( $output, 'html' );
	}

	public function process_advanced_css( $module, $function_name, $margin_padding ) {
		$utils           = ET_Core_Data_Utils::instance();
		$all_values      = $module->props;
		$advanced_fields = $module->advanced_fields;
		$order_class     = $this->get_module_order_class( 'dipl_fancy_text' );
		$padding_class   = '.' . $order_class . '.dipl_fancy_text .dipl-text-wrapper';
		if ( ! $module->has_vb_support() && ! $module->has_advanced_fields ) {
			return;
		}

		$label       = 'overlay';
		$form_field  = array(
			'label'          => 'Overlay Padding',
			'margin_padding' => array(
				'css' => array(
					'main'      => $padding_class,
					'important' => 'all',
				),
			),
			'tab_slug'       => 'advanced',
			'toggle_slug'    => 'fancy_text_settings',
		);
		$padding_key = "{$label}_custom_padding";
		if ( '' !== $utils->array_get( $all_values, $padding_key, '' ) ) {
			$settings                      = $utils->array_get( $form_field, 'margin_padding', array() );
			$form_field_margin_padding_css = $utils->array_get( $settings, 'css.main', '' );
			if ( empty( $form_field_margin_padding_css ) ) {
				$utils->array_set( $settings, 'css.main', $utils->array_get( $form_field, 'css.main', '' ) );
			}
			$margin_padding->update_styles( $module, $label, $settings, $function_name, '' );
		}
	}
}
$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
	$modules = explode( ',', $plugin_options['dipl-modules'] );
	if ( in_array( 'dipl_fancy_text', $modules ) ) {
		new DIPL_Fancy_Text();
	}
} else {
	new DIPL_Fancy_Text();
}
