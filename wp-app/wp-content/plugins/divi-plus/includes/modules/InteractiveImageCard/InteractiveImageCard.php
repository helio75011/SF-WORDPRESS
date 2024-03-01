<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.4
 */
class DIPL_InteractiveImageCard extends ET_Builder_Module {

	public $slug       = 'dipl_interactive_image_card';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name             = esc_html__( 'DP Interactive Image Card', 'divi-plus' );
		$this->main_css_element = '%%order_class%%';
	}

	public function get_settings_modal_toggles() {
		return array(
			'general'  => array(
				'toggles' => array(
					'main_content' => array(
						'title' => esc_html__( 'Content', 'divi-plus' ),
					),
					'image'        => array(
						'title' => esc_html__( 'Image', 'divi-plus' ),
					),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'layout'          => array(
						'title' => esc_html__( 'Layout', 'divi-plus' ),
					),
					'layout_settings' => array(
						'title' => esc_html__( 'Layout Settings', 'divi-plus' ),
					),
					'overlay_color'   => array(
						'title' => esc_html__( 'Overlay Color', 'divi-plus' ),
					),
					'text'            => array(
						'title' => esc_html__( 'Text', 'divi-plus' ),
					),
					'text_settings'   => array(
						'title'             => esc_html__( 'Title & Content', 'divi-plus' ),
						'sub_toggles'       => array(
							'title'   => array(
								'name' => 'Title',
							),
							'content' => array(
								'name' => 'Content',
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
				'title'   => array(
					'label'          => esc_html__( 'Title', 'divi-plus' ),
					'font_size'      => array(
						'default_on_front' => '24px',
						'range_settings'   => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'    => true,
					),
					'line_height'    => array(
						'default_on_front' => '1.2em',
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
						'default' => 'h2',
					),
					'css'            => array(
						'main' => '%%order_class%% .dipl_interactive_image_card_wrapper h1, %%order_class%% .dipl_interactive_image_card_wrapper h2, %%order_class%% .dipl_interactive_image_card_wrapper h3, %%order_class%% .dipl_interactive_image_card_wrapper h4, %%order_class%% .dipl_interactive_image_card_wrapper h5, %%order_class%% .dipl_interactive_image_card_wrapper h6',
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'text_settings',
					'sub_toggle'     => 'title',
				),
				'content' => array(
					'label'          => esc_html__( 'Content', 'divi-plus' ),
					'font_size'      => array(
						'default_on_front' => '14px',
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
						'main' => '%%order_class%% .dipl_interactive_image_card_wrapper_inner .dipl_interactive_image_card_wrapper_content',
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'text_settings',
					'sub_toggle'     => 'content',
				),
			),
			'margin_padding' => array(
				'css' => array(
					'main'      => '%%order_class%%',
					'important' => 'all',
				),
			),
			'max_width'      => array(
				'css' => array(
					'main'             => '%%order_class%%',
					'module_alignment' => '%%order_class%%',
				),
			),
			'borders'        => array(
				'default' => array(
					'css' => array(
						'main' => array(
							'border_styles' => '%%order_class%% .dipl_interactive_image_card_wrapper figure',
							'border_radii'  => '%%order_class%% .dipl_interactive_image_card_wrapper figure',
							'important'     => 'all',
						),
					),
				),
			),
			'box_shadow'     => array(
				'default' => array(
					'css' => array(
						'main' => '%%order_class%%',
					),
				),
			),
			'text'           => false,
			'text_shadow'    => false,
		);
	}

	public function get_fields() {
		$et_accent_color = et_builder_accent_color();
		return array(
			'title'                   => array(
				'label'            => esc_html__( 'Title', 'divi-plus' ),
				'type'             => 'text',
				'option_category'  => 'basic_option',
				'default_on_front' => esc_html__( 'Title', 'divi-plus' ),
				'default'          => esc_html__( 'Title', 'divi-plus' ),
				'dynamic_content'  => 'text',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Here you can input the text to be used for the title.', 'divi-plus' ),
			),
			'content'                 => array(
				'label'           => esc_html__( 'Content', 'divi-plus' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'dynamic_content' => 'text',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can input the text to be used for the content.', 'divi-plus' ),
			),
			'image'                   => array(
				'label'              => esc_html__( 'Image', 'divi-plus' ),
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'upload_button_text' => esc_attr__( 'Upload an image', 'divi-plus' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'divi-plus' ),
				'update_text'        => esc_attr__( 'Set As Image', 'divi-plus' ),
				'dynamic_content'    => 'image',
				'tab_slug'           => 'general',
				'toggle_slug'        => 'image',
				'description'        => esc_html__( 'Upload an image to display for Interactive Image Card.', 'divi-plus' ),
			),
			'image_alt'               => array(
				'label'           => esc_html__( 'Image Alt Text', 'divi-plus' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'dynamic_content' => 'text',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'image',
				'description'     => esc_html__( 'Here you can input the text to be used for the image as HTML ALT text.', 'divi-plus' ),
			),
			'select_layout'           => array(
				'label'           => esc_html__( 'Select Layout', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'effect-lily'   => esc_html__( 'Effect: Lily', 'divi-plus' ),
					'effect-sadie'  => esc_html__( 'Effect: Sadie', 'divi-plus' ),
					'effect-roxy'   => esc_html__( 'Effect: Roxy', 'divi-plus' ),
					'effect-bubba'  => esc_html__( 'Effect: Bubba', 'divi-plus' ),
					'effect-romeo'  => esc_html__( 'Effect: Romeo', 'divi-plus' ),
					'effect-layla'  => esc_html__( 'Effect: Layla', 'divi-plus' ),
					'effect-oscar'  => esc_html__( 'Effect: Oscar', 'divi-plus' ),
					'effect-marley' => esc_html__( 'Effect: Marley', 'divi-plus' ),
					'effect-ruby'   => esc_html__( 'Effect: Ruby', 'divi-plus' ),
					'effect-milo'   => esc_html__( 'Effect: Milo', 'divi-plus' ),
				),
				'default'         => 'effect-lily',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'layout',
				'description'     => esc_html__( 'Here you can select the Layout for Interactive Image Card.', 'divi-plus' ),
			),
			'image_opacity'           => array(
				'label'          => esc_html__( 'Image Opacity', 'divi-plus' ),
				'type'           => 'range',
				'range_settings' => array(
					'min'  => '0.1',
					'max'  => '1',
					'step' => '0.01',
				),
				'default'        => '0.7',
				'unitless'       => true,
				'hover'          => 'tabs',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'layout_settings',
				'description'    => esc_html__( 'Here you can select the image opacity.', 'divi-plus' ),
			),
			'border_size'             => array(
				'label'          => esc_html__( 'Border Size', 'divi-plus' ),
				'type'           => 'range',
				'range_settings' => array(
					'min'  => '1',
					'max'  => '20',
					'step' => '1',
				),
				'show_if'        => array(
					'select_layout' => array(
						'effect-roxy',
						'effect-bubba',
						'effect-romeo',
						'effect-layla',
						'effect-oscar',
						'effect-marley',
						'effect-ruby',
						'effect-milo',
					),
				),
				'default'        => '1px',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'layout_settings',
				'description'    => esc_html__( 'Here you can select Border Size.', 'divi-plus' ),
			),
			'border_color'            => array(
				'label'        => esc_html__( 'Border Color', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'show_if'      => array(
					'select_layout' => array(
						'effect-roxy',
						'effect-bubba',
						'effect-romeo',
						'effect-layla',
						'effect-oscar',
						'effect-marley',
						'effect-ruby',
						'effect-milo',
					),
				),
				'default'      => '#ffffff',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'layout_settings',
				'description'  => esc_html__( 'Here you can select Border Color.', 'divi-plus' ),
			),
			'overlay_color'           => array(
				'label'        => esc_html__( 'Overlay Color', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'show_if'      => array(
					'enable_gradient' => array(
						'off',
					),
				),
				'show_if_not'  => array(
					'select_layout' => array(
						'effect-romeo',
						'effect-marley',
					),
				),
				'default' 	   => 'rgba(0,0,0,0.53)',
				'hover'        => 'tabs',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'overlay_color',
				'description'  => esc_html__( 'Here you can set the Overlay Color.', 'divi-plus' ),
			),
			'enable_gradient'         => array(
				'label'           => esc_html__( 'Enable Gradient', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'show_if_not'     => array(
					'select_layout' => array(
						'effect-romeo',
						'effect-marley',
					),
				),
				'default'         => 'off',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'overlay_color',
				'description'     => esc_html__( 'Here you can enable the Overlay Gradient.', 'divi-plus' ),
			),
			'grandient_color_1'       => array(
				'label'        => esc_html__( 'Gradient Color 1', 'divi-plus' ),
				'type'         => 'color-alpha',
				'hover'        => 'tabs',
				'custom_color' => true,
				'show_if'      => array(
					'enable_gradient' => array(
						'on',
					),
				),
				'show_if_not'  => array(
					'select_layout' => array(
						'effect-romeo',
						'effect-marley',
					),
				),
				'default'      => '#2b87da',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'overlay_color',
				'description'  => esc_html__( 'Here you can select first Gradient Color', 'divi-plus' ),
			),
			'grandient_color_2'       => array(
				'label'        => esc_html__( 'Gradient Color 2', 'divi-plus' ),
				'type'         => 'color-alpha',
				'hover'        => 'tabs',
				'custom_color' => true,
				'show_if'      => array(
					'enable_gradient' => array(
						'on',
					),
				),
				'show_if_not'  => array(
					'select_layout' => array(
						'effect-romeo',
						'effect-marley',
					),
				),
				'default'      => '#29c4a9',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'overlay_color',
				'description'  => esc_html__( 'Here you can select second Gradient Color', 'divi-plus' ),
			),
			'gradient_type'           => array(
				'label'           => esc_html__( 'Gradient Type', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'linear-gradient' => esc_html__( 'Linear', 'divi-plus' ),
					'radial-gradient' => esc_html__( 'Radial', 'divi-plus' ),
				),
				'show_if'         => array(
					'enable_gradient' => array(
						'on',
					),
				),
				'show_if_not'     => array(
					'select_layout' => array(
						'effect-romeo',
						'effect-marley',
					),
				),
				'default'         => 'linear-gradient',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'overlay_color',
				'description'     => esc_html__( 'Here you can select Gradient Type', 'divi-plus' ),
			),
			'linear_direction'        => array(
				'label'          => esc_html__( 'Gradient Direction', 'divi-plus' ),
				'type'           => 'range',
				'range_settings' => array(
					'min'  => '1',
					'max'  => '360',
					'step' => '1',
				),
				'show_if'        => array(
					'enable_gradient' => array(
						'on',
					),
				),
				'show_if_not'    => array(
					'select_layout' => array(
						'effect-romeo',
						'effect-marley',
					),
				),
				'default'        => '180deg',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'overlay_color',
				'description'    => esc_html__( 'Here you can select Linear Gradient Direction', 'divi-plus' ),
			),
			'radial_direction'        => array(
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
					'enable_gradient' => array(
						'on',
					),
				),
				'show_if_not'     => array(
					'select_layout' => array(
						'effect-romeo',
						'effect-marley',
					),
				),
				'default'         => 'circle at center',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'overlay_color',
				'description'     => esc_html__( 'Here you can select Radial Gradient Direction', 'divi-plus' ),
			),
			'gradient_start_position' => array(
				'label'          => esc_html__( 'Start Position', 'divi-plus' ),
				'type'           => 'range',
				'range_settings' => array(
					'min'  => '0',
					'max'  => '100',
					'step' => '1',
				),
				'show_if'        => array(
					'enable_gradient' => array(
						'on',
					),
				),
				'show_if_not'    => array(
					'select_layout' => array(
						'effect-romeo',
						'effect-marley',
					),
				),
				'default'        => '0%',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'overlay_color',
				'description'    => esc_html__( 'Here you can select Gradient Start Position', 'divi-plus' ),
			),
			'gradient_end_position'   => array(
				'label'          => esc_html__( 'End Position', 'divi-plus' ),
				'type'           => 'range',
				'range_settings' => array(
					'min'  => '0',
					'max'  => '100',
					'step' => '1',
				),
				'show_if'        => array(
					'enable_gradient' => array(
						'on',
					),
				),
				'show_if_not'    => array(
					'select_layout' => array(
						'effect-romeo',
						'effect-marley',
					),
				),
				'default'        => '100%',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'overlay_color',
				'description'    => esc_html__( 'Here you can select Gradient End Position', 'divi-plus' ),
			),
		);
	}


	public function render( $attrs, $content, $render_slug ) {

		$multi_view              = et_pb_multi_view_options( $this );
		$layout                  = esc_attr( $this->props['select_layout'] ) ? esc_attr( $this->props['select_layout'] ) : 'effect-lily';
		$image                   = esc_attr( $this->props['image'] );
		$image_alt               = esc_attr( $this->props['image_alt'] ) ? esc_attr( $this->props['image_alt'] ) : '';
		$title                   = esc_attr( $this->props['title'] );
		$enable_gradient         = esc_attr( $this->props['enable_gradient'] );
		$overlay_color           = esc_attr( $this->props['overlay_color'] );
		$overlay_color_hover     = $this->get_hover_value( 'overlay_color' );
		$gradient_type           = esc_attr( $this->props['gradient_type'] );
		$grandient_color_1       = esc_attr( $this->props['grandient_color_1'] );
		$grandient_color_1_hover = $this->get_hover_value( 'grandient_color_1' );
		$grandient_color_2       = esc_attr( $this->props['grandient_color_2'] );
		$grandient_color_2_hover = $this->get_hover_value( 'grandient_color_2' );
		$linear_direction        = esc_attr( $this->props['linear_direction'] );
		$radial_direction        = esc_attr( $this->props['radial_direction'] );
		$gradient_start_position = esc_attr( $this->props['gradient_start_position'] );
		$gradient_end_position   = esc_attr( $this->props['gradient_end_position'] );
		$image_opacity           = esc_attr( $this->props['image_opacity'] );
		$image_opacity_hover     = $this->get_hover_value( 'image_opacity' );
		$border_size             = et_pb_responsive_options()->get_property_values( $this->props, 'border_size' );
		$border_color            = esc_attr( $this->props['border_color'] );
		$content                 = $this->content;
		$title_level             = esc_html( $this->props['title_level'] );
		$processed_title_level   = et_pb_process_header_level( $title_level, 'h2' );

		if ( ! empty( array_filter( $border_size ) ) ) {
			if ( 'effect-roxy' === $layout || 'effect-oscar' === $layout ) {
				$selector = '%%order_class%% figure.' . $layout . ' figcaption::before';
				et_pb_responsive_options()->generate_responsive_css( $border_size, $selector, 'border-width', $render_slug, '', 'type' );
			}
			if ( 'effect-bubba' === $layout || 'effect-layla' === $layout ) {
				$before_selector = '%%order_class%% figure.' . $layout . ' figcaption::before';
				$after_selector  = '%%order_class%% figure.' . $layout . ' figcaption::after';
				et_pb_responsive_options()->generate_responsive_css( $border_size, $before_selector, 'border-top-width', $render_slug, '', 'type' );
				et_pb_responsive_options()->generate_responsive_css( $border_size, $before_selector, 'border-bottom-width', $render_slug, '', 'type' );
				et_pb_responsive_options()->generate_responsive_css( $border_size, $after_selector, 'border-left-width', $render_slug, '', 'type' );
				et_pb_responsive_options()->generate_responsive_css( $border_size, $after_selector, 'border-right-width', $render_slug, '', 'type' );
			}
			if ( 'effect-romeo' === $layout ) {
				et_pb_responsive_options()->generate_responsive_css( $border_size, '%%order_class%% figure.effect-romeo figcaption::before', 'height', $render_slug, '', 'type' );
				et_pb_responsive_options()->generate_responsive_css( $border_size, '%%order_class%% figure.effect-romeo figcaption::after', 'height', $render_slug, '', 'type' );
			}
			if ( 'effect-marley' === $layout ) {
				et_pb_responsive_options()->generate_responsive_css( $border_size, '%%order_class%% figure.effect-marley h2::after', 'height', $render_slug, '', 'type' );
			}
			if ( 'effect-ruby' === $layout ) {
				$selector = '%%order_class%% figure.effect-ruby .dipl_interactive_image_card_wrapper_content';
				et_pb_responsive_options()->generate_responsive_css( $border_size, $selector, 'border-width', $render_slug, '', 'type' );
			}
			if ( 'effect-milo' === $layout ) {
				et_pb_responsive_options()->generate_responsive_css( $border_size, '%%order_class%% figure.effect-milo .dipl_interactive_image_card_wrapper_content', 'border-right-width', $render_slug, '', 'type' );
			}
		}

		if ( '' !== $border_color ) {
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% figure.effect-roxy figcaption::before, %%order_class%% figure.effect-bubba figcaption::before, %%order_class%% figure.effect-bubba figcaption::after, %%order_class%% figure.effect-layla figcaption::before, %%order_class%% figure.effect-layla figcaption::after, %%order_class%% figure.effect-oscar figcaption::before, %%order_class%% figure.effect-ruby .dipl_interactive_image_card_wrapper_content, %%order_class%% figure.effect-milo .dipl_interactive_image_card_wrapper_content',
					'declaration' => sprintf( 'border-color: %1$s;', $border_color ),
				)
			);
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% figure.effect-romeo figcaption::before, %%order_class%% figure.effect-romeo figcaption::after, %%order_class%% figure.effect-marley h2::after',
					'declaration' => sprintf( 'background: %1$s;', $border_color ),
				)
			);
		}

		if ( '' !== $image_opacity ) {
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl_interactive_image_card_wrapper figure img',
					'declaration' => sprintf( 'opacity: %1$s;', $image_opacity ),
				)
			);
		}

		if ( $image_opacity_hover ) {
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%:hover .dipl_interactive_image_card_wrapper figure img',
					'declaration' => sprintf( 'opacity: %1$s;', $image_opacity_hover ),
				)
			);
		}

		if ( 'on' === $enable_gradient ) {
			if ( 'linear-gradient' === $gradient_type ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% figure.effect-lily, %%order_class%% figure.effect-sadie figcaption::before, %%order_class%% figure.effect-roxy, %%order_class%% figure.effect-bubba, %%order_class%% figure.effect-layla, %%order_class%% figure.effect-oscar, %%order_class%% figure.effect-ruby, %%order_class%% figure.effect-milo',
						'declaration' => sprintf( 'background: linear-gradient(%1$s, %2$s %3$s, %4$s %5$s);', esc_attr( $linear_direction ), esc_attr( $grandient_color_1 ), esc_attr( $gradient_start_position ), esc_attr( $grandient_color_2 ), esc_attr( $gradient_end_position ) ),
					)
				);
			}

			if ( 'radial-gradient' === $gradient_type ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% figure.effect-lily, %%order_class%% figure.effect-sadie figcaption::before, %%order_class%% figure.effect-roxy, %%order_class%% figure.effect-bubba, %%order_class%% figure.effect-layla, %%order_class%% figure.effect-oscar, %%order_class%% figure.effect-ruby, %%order_class%% figure.effect-milo',
						'declaration' => sprintf( 'background: radial-gradient(%1$s, %2$s %3$s, %4$s %5$s);', esc_attr( $radial_direction ), esc_attr( $grandient_color_1 ), esc_attr( $gradient_start_position ), esc_attr( $grandient_color_2 ), esc_attr( $gradient_end_position ) ),
					)
				);
			}

			if ( 'linear-gradient' === $gradient_type && ( isset( $grandient_color_1_hover ) || isset( $grandient_color_2_hover ) ) ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%%:hover figure.effect-lily, %%order_class%%:hover figure.effect-sadie figcaption::before, %%order_class%%:hover figure.effect-roxy, %%order_class%%:hover figure.effect-bubba, %%order_class%%:hover figure.effect-layla, %%order_class%%:hover  figure.effect-oscar, %%order_class%%:hover figure.effect-ruby, %%order_class%%:hover figure.effect-milo',
						'declaration' => sprintf( 'background: linear-gradient(%1$s, %2$s %3$s, %4$s %5$s);', esc_attr( $linear_direction ), esc_attr( $grandient_color_1_hover ), esc_attr( $gradient_start_position ), esc_attr( $grandient_color_2_hover ), esc_attr( $gradient_end_position ) ),
					)
				);
			}

			if ( 'radial-gradient' === $gradient_type && ( isset( $grandient_color_1_hover ) || isset( $grandient_color_2_hover ) ) ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%%:hover figure.effect-lily, %%order_class%%:hover figure.effect-sadie figcaption::before, %%order_class%%:hover figure.effect-roxy, %%order_class%%:hover figure.effect-bubba, %%order_class%%:hover figure.effect-layla, %%order_class%%:hover  figure.effect-oscar, %%order_class%%:hover figure.effect-ruby, %%order_class%%:hover figure.effect-milo',
						'declaration' => sprintf( 'background: radial-gradient(%1$s, %2$s %3$s, %4$s %5$s);', esc_attr( $radial_direction ), esc_attr( $grandient_color_1_hover ), esc_attr( $gradient_start_position ), esc_attr( $grandient_color_2_hover ), esc_attr( $gradient_end_position ) ),
					)
				);
			}
		} else {
			if ( '' !== $overlay_color ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% figure.effect-lily, %%order_class%% figure.effect-sadie figcaption::before, %%order_class%% figure.effect-roxy, %%order_class%% figure.effect-bubba, %%order_class%% figure.effect-layla, %%order_class%% figure.effect-oscar, %%order_class%% figure.effect-ruby, %%order_class%% figure.effect-milo',
						'declaration' => sprintf( 'background: %1$s;', $overlay_color ),
					)
				);
			}

			if ( isset( $overlay_color_hover ) ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%%:hover figure.effect-lily, %%order_class%%:hover figure.effect-sadie figcaption::before, %%order_class%%:hover figure.effect-roxy, %%order_class%%:hover figure.effect-bubba, %%order_class%%:hover figure.effect-layla, %%order_class%%:hover figure.effect-oscar, %%order_class%%:hover figure.effect-ruby, %%order_class%%:hover figure.effect-milo',
						'declaration' => sprintf( 'background: %1$s;', $overlay_color_hover ),
					)
				);
			}
		}

		if ( '' !== $image ) {
			$image = $multi_view->render_element(
				array(
					'tag'      => 'img',
					'attrs'    => array(
						'src' => '{{image}}',
						'alt' => $image_alt,
					),
					'required' => 'image',
				)
			);
		}

		if ( '' !== $title ) {
			$title = $multi_view->render_element(
				array(
					'tag'      => $processed_title_level,
					'content'  => '{{title}}',
					'attrs'    => array(
						'class' => 'dipl_interactive_image_card_title',
					),
					'required' => 'title',
				)
			);
		}

		if ( '' !== $content ) {
			$content = $multi_view->render_element(
				array(
					'tag'      => 'div',
					'content'  => '{{content}}',
					'attrs'    => array(
						'class' => 'dipl_interactive_image_card_wrapper_content',
					),
					'required' => 'content',
				)
			);
		}

		$output = sprintf(
			'<div class="dipl_interactive_image_card_wrapper">
							<figure class="%1$s">
								%2$s
								<figcaption>
									<div class="dipl_interactive_image_card_wrapper_inner">
										%3$s
										%4$s
									</div>
								</figcaption>			
							</figure>
						</div>',
			$layout,
			( '' !== $image ) ? $image : '',
			( '' !== $title ) ? $title : '',
			( '' !== $content ) ? $content : ''
		);

		$file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        wp_enqueue_style( 'dipl-interactive-image-card-style', PLUGIN_PATH . 'includes/modules/InteractiveImageCard/' . $file . '.min.css', array(), '1.0.0' );

		return $output;
	}
}
$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
	$modules = explode( ',', $plugin_options['dipl-modules'] );
	if ( in_array( 'dipl_interactive_image_card', $modules ) ) {
		new DIPL_InteractiveImageCard();
	}
} else {
	new DIPL_InteractiveImageCard();
}
