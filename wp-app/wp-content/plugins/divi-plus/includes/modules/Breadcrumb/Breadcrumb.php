<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.4
 */
class DIPL_Breadcrumb extends ET_Builder_Module {

	public $slug       = 'dipl_breadcrumb';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com',
	);

	public function init() {
		$this->name = esc_html__( 'DP Breadcrumbs', 'divi-plus' );
	}

	public function get_settings_modal_toggles() {
		return array(
			'general'  => array(
				'toggles' => array(
					'main_content' => array(
						'title'    => esc_html__( 'Breadcrumbs Settings', 'divi-plus' ),
						'priority' => 1,
					),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'breadcrumb_settings' => array(
						'title'    => esc_html__( 'Breadcrumbs Styling', 'divi-plus' ),
						'priority' => 1,
					),
					'separator_settings'  => array(
						'title'    => esc_html__( 'Separator Styling', 'divi-plus' ),
						'priority' => 2,
					),
					'home_settings'       => array(
						'title'    => esc_html__( 'Home Link Styling', 'divi-plus' ),
						'priority' => 3,
					),
					'text_settings'       => array(
						'title'             => esc_html__( 'Text Settings', 'divi-plus' ),
						'priority'          => 4,
						'sub_toggles'       => array(
							'global_settings'  => array(
								'name' => 'Global',
							),
							'general_settings' => array(
								'name' => 'Text',
							),
							'link_settings'    => array(
								'name' => 'Link',
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
					'label'               => esc_html__( 'Global', 'divi-plus' ),
					'font_size'           => array(
						'default'        => '14px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'css'                 => array(
						'main' => '%%order_class%% .dipl-breadcrumb-wrapper,
									%%order_class%% .dipl-breadcrumb-wrapper li .breadcrumb-page',
					),
					'hide_font'           => true,
					'hide_font_weight'    => true,
					'hide_font_style'     => true,
					'hide_letter_spacing' => true,
					'hide_text_color'     => true,
					'hide_text_shadow'    => true,
					'hide_line_height'    => true,
					'important'           => 'all',
					'tab_slug'            => 'advanced',
					'toggle_slug'         => 'text_settings',
					'sub_toggle'          => 'global_settings',
				),
				'text'                 => array(
					'label'            => esc_html__( 'Text', 'divi-plus' ),
					'line_height'      => array(
						'default'        => '1.7em',
						'range_settings' => array(
							'min'  => '0',
							'max'  => '5',
							'step' => '0.1',
						),
					),
					'letter_spacing'   => array(
						'default'        => '0px',
						'range_settings' => array(
							'min'  => '0',
							'max'  => '10',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'css'              => array(
						'main' => '%%order_class%% .dipl-breadcrumb-wrapper li .breadcrumb-page',
					),
					'hide_text_align'  => true,
					'hide_font_size'   => true,
					'hide_line_height' => true,
					'important'        => 'all',
					'tab_slug'         => 'advanced',
					'toggle_slug'      => 'text_settings',
					'sub_toggle'       => 'general_settings',
				),
				'link'                 => array(
					'label'            => esc_html__( 'Link', 'divi-plus' ),
					'line_height'      => array(
						'default'        => '1.7em',
						'range_settings' => array(
							'min'  => '0',
							'max'  => '5',
							'step' => '0.1',
						),
					),
					'letter_spacing'   => array(
						'default'        => '0px',
						'range_settings' => array(
							'min'  => '0',
							'max'  => '10',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'css'              => array(
						'main' => '%%order_class%% .dipl-breadcrumb-wrapper li a .breadcrumb-page',
					),
					'hide_text_align'  => true,
					'hide_font_size'   => true,
					'hide_line_height' => true,
					'important'        => 'all',
					'tab_slug'         => 'advanced',
					'toggle_slug'      => 'text_settings',
					'sub_toggle'       => 'link_settings',
				),
			),
			'custom_margin_padding' => array(
				'css' => array(
					'main'      => '%%order_class%%',
					'important' => 'all',
				),
			),
			'breadcrumb'            => array(
				'breadcrumb_item' => array(
					'label'          => 'Breadcrumbs Items Padding',
					'margin_padding' => array(
						'css' => array(
							'main'      => '%%order_class%% .dipl-text-wrapper',
							'important' => 'all',
						),
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'breadcrumb_settings',
				),
			),
			'max_width'             => array(
				'css' => array(
					'main'             => '%%order_class%%',
					'module_alignment' => '%%order_class%%',
				),
			),
			'text'                  => false,
		);
	}

	public function get_fields() {
		$et_accent_color = et_builder_accent_color();

		return array(
			'breadcrumb_layout'              => array(
				'label'           => esc_html__( 'Breadcrumbs Layout.', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'layout1' => esc_html__( 'Layout 1', 'divi-plus' ),
					'layout2' => esc_html__( 'Layout 2', 'divi-plus' ),
				),
				'default'         => 'layout1',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can select Breadcrumbs layout', 'divi-plus' ),
			),
			'link_target'                    => array(
				'label'           => esc_html__( 'Open link in new tab', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'default'         => 'off',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can enable link target.', 'divi-plus' ),
			),
			'nav_bg_color'                   => array(
				'label'        => esc_html__( 'Breadcrumbs Background Color', 'divi-plus' ),
				'type'         => 'color-alpha',
				'hover'        => 'tabs',
				'show_if'      => array(
					'breadcrumb_layout' => 'layout1',
				),
				'custom_color' => true,
				'default'      => $et_accent_color,
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'breadcrumb_settings',
				'description'  => esc_html__( 'Here you can select navigation item background color', 'divi-plus' ),
			),
			'enable_different_bg'            => array(
				'label'           => esc_html__( 'Different Background for last item', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'show_if'         => array(
					'breadcrumb_layout' => 'layout1',
				),
				'default'         => 'off',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'breadcrumb_settings',
				'description'     => esc_html__( 'Here you can enable different background color for last item.', 'divi-plus' ),
			),
			'nav_last_item_bg_color'         => array(
				'label'        => esc_html__( 'Last item Background Color', 'divi-plus' ),
				'type'         => 'color-alpha',
				'show_if'      => array(
					'breadcrumb_layout'   => 'layout1',
					'enable_different_bg' => 'on',
				),
				'custom_color' => true,
				'default'      => $et_accent_color,
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'breadcrumb_settings',
				'description'  => esc_html__( 'Here you can select last breadcrumb item background color', 'divi-plus' ),
			),
			'enable_fade'                    => array(
				'label'           => esc_html__( 'Enable Opacity', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'show_if'         => array(
					'breadcrumb_layout' => 'layout1',
				),
				'default'         => 'off',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'breadcrumb_settings',
				'description'     => esc_html__( 'Here you can enable opacity on breadcrumbs.', 'divi-plus' ),
			),
			'fade_range'                     => array(
				'label'           => esc_html__( 'Decrease Opacity By', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'font_option',
				'range_settings'  => array(
					'min'  => '0.01',
					'max'  => '0.90',
					'step' => '0.01',
				),
				'show_if'         => array(
					'enable_fade'       => 'on',
					'breadcrumb_layout' => 'layout1',
				),
				'mobile_options'  => true,
				'default'         => '0.01',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'breadcrumb_settings',
				'description'     => esc_html__( 'Here you set opacity decrease point', 'divi-plus' ),
			),
			'breadcrumb_item_custom_padding' => array(
				'label'           => esc_html__( 'Breadcrumbs Items Padding', 'divi-plus' ),
				'type'            => 'custom_padding',
				'option_category' => 'layout',
				'mobile_options'  => true,
				'show_if'         => array(
					'breadcrumb_layout' => 'layout1',
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'breadcrumb_settings',
				'description'     => esc_html__( 'Here you can choose Breadcrumbs Items Padding', 'divi-plus' ),
			),
			'separator_type'                 => array(
				'label'           => esc_html__( 'Separator Type', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'text_separator' => esc_html__( 'Text Separator', 'divi-plus' ),
					'icon_separator' => esc_html__( 'Icon Separator', 'divi-plus' ),
				),
				'show_if'         => array(
					'breadcrumb_layout' => 'layout2',
				),
				'default'         => 'text_separator',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'separator_settings',
				'description'     => esc_html__( 'Here you can select Separator Type', 'divi-plus' ),
			),
			'separator_text'                 => array(
				'label'           => esc_html__( 'Separator Text', 'divi-plus' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'show_if'         => array(
					'separator_type'    => 'text_separator',
					'breadcrumb_layout' => 'layout2',
				),
				'default'         => '|',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'separator_settings',
				'description'     => esc_html__( 'Here you can set separator text', 'divi-plus' ),
			),
			'separator_icon'                 => array(
				'label'           => esc_html__( 'Separator Icon', 'divi-plus' ),
				'type'            => 'select_icon',
				'option_category' => 'basic_option',
				'class'           => array(
					'et-pb-font-icon',
				),
				'show_if'         => array(
					'separator_type'    => 'icon_separator',
					'breadcrumb_layout' => 'layout2',
				),
				'default' 		  => ET_BUILDER_PRODUCT_VERSION < '4.13.0' ? '%%3%%' : '&#x24;||divi||400',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'separator_settings',
				'description'     => esc_html__( 'Here you can set separator icon', 'divi-plus' ),
			),
			'separator_size'                 => array(
				'label'           => esc_html__( 'Separator Font Size', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'font_option',
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '120',
					'step' => '1',
				),
				'show_if'         => array(
					'breadcrumb_layout' => 'layout2',
				),
				'mobile_options'  => true,
				'default'         => '16px',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'separator_settings',
				'description'     => esc_html__( 'Here you enable custom icon size', 'divi-plus' ),
			),
			'separator_color'                => array(
				'label'        => esc_html__( 'Separator Color', 'divi-plus' ),
				'type'         => 'color-alpha',
				'hover'        => 'tabs',
				'custom_color' => true,
				'default'      => $et_accent_color,
				'show_if'      => array(
					'breadcrumb_layout' => 'layout2',
				),
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'separator_settings',
				'description'  => esc_html__( 'Here you can select Separator Color', 'divi-plus' ),
			),
			'use_home_link_custom_text'      => array(
				'label'           => esc_html__( 'Custom Home Link Text', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'home_settings',
				'description'     => esc_html__( 'Here you can enable custom home link text.', 'divi-plus' ),
			),
			'home_link_text'                 => array(
				'label'       => esc_html__( 'Home Link Text', 'divi-plus' ),
				'type'        => 'text',
				'show_if'     => array(
					'use_home_link_custom_text' => 'on',
				),
				'default'     => 'Home',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'home_settings',
				'description' => esc_html__( 'Here you can set custom home link text', 'divi-plus' ),
			),
			'use_home_link_icon'             => array(
				'label'           => esc_html__( 'Use Home Link Icon', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'default'         => 'off',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'home_settings',
				'description'     => esc_html__( 'Here you can enable Home link icon.', 'divi-plus' ),
			),
			'hide_home_text'                 => array(
				'label'           => esc_html__( 'Hide Home Text(Display Icon Only)', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'show_if'         => array(
					'use_home_link_icon' => 'on',
				),
				'default'         => 'off',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'home_settings',
				'description'     => esc_html__( 'Here you can hide Home link text.', 'divi-plus' ),
			),
			'home_link_icon'                 => array(
				'label'           => esc_html__( 'Home Link Icon', 'divi-plus' ),
				'type'            => 'select_icon',
				'option_category' => 'basic_option',
				'class'           => array(
					'et-pb-font-icon',
				),
				'show_if'         => array(
					'use_home_link_icon' => 'on',
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'home_settings',
				'description'     => esc_html__( 'Here you can select Home link icon', 'divi-plus' ),
			),
			'home_link_icon_color'           => array(
				'label'        => esc_html__( 'Home Link Icon Color', 'divi-plus' ),
				'type'         => 'color-alpha',
				'hover'        => 'tabs',
				'custom_color' => true,
				'show_if'      => array(
					'use_home_link_icon' => 'on',
				),
				'default'      => '#ccc',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'home_settings',
				'description'  => esc_html__( 'Here you can select Home link icon color.', 'divi-plus' ),
			),
			'home_link_icon_size'            => array(
				'label'           => esc_html__( 'Home Link Icon Size', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'font_option',
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '120',
					'step' => '1',
				),
				'show_if'         => array(
					'use_home_link_icon' => 'on',
				),
				'mobile_options'  => true,
				'default'         => '20px',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'home_settings',
				'description'     => esc_html__( 'Here you can select Home link icon size.', 'divi-plus' ),
			),
			'__breadcrumb_list'              => array(
				'type'                => 'computed',
				'computed_callback'   => array( 'DIPL_Breadcrumb', 'traverse_breadcrumbs' ),
				'computed_depends_on' => array(
					'breadcrumb_layout',
				),
			),
		);
	}

	public function render( $attrs, $content, $render_slug ) {

		$breadcrumb_layout                     = esc_attr( $this->props['breadcrumb_layout'] );
		$link_target                           = ( 'on' === esc_attr( $this->props['link_target'] ) ) ? 'target="_blank"' : '';
		$nav_bg_color                          = esc_attr( $this->props['nav_bg_color'] );
		$nav_bg_color_hover                    = ( '' !== esc_attr( $this->get_hover_value( 'nav_bg_color' ) ) ) ? esc_attr( $this->get_hover_value( 'nav_bg_color' ) ) : $nav_bg_color;
		$enable_different_bg                   = esc_attr( $this->props['enable_different_bg'] );
		$nav_last_item_bg_color                = esc_attr( $this->props['nav_last_item_bg_color'] );
		$enable_fade                           = esc_attr( $this->props['enable_fade'] );
		$fade_range                            = esc_attr( $this->props['fade_range'] );
		$breadcrumb_item_custom_padding        = esc_attr( $this->props['breadcrumb_item_custom_padding'] );
		$breadcrumb_item_custom_padding_tablet = esc_attr( $this->props['breadcrumb_item_custom_padding_tablet'] );
		$breadcrumb_item_custom_padding_phone  = esc_attr( $this->props['breadcrumb_item_custom_padding_phone'] );
		$separator_type                        = esc_attr( $this->props['separator_type'] );
		$separator_text                        = esc_attr( $this->props['separator_text'] );
		$separator_icon                        = esc_attr( $this->props['separator_icon'] );
		$separator_size                        = et_pb_responsive_options()->get_property_values( $this->props, 'separator_size' );
		$separator_color                       = esc_attr( $this->props['separator_color'] );
		$separator_color_hover                 = esc_attr( $this->get_hover_value( 'separator_color' ) );
		$use_home_link_custom_text             = esc_attr( $this->props['use_home_link_custom_text'] );
		$home_link_text                        = esc_attr( $this->props['home_link_text'] ) ? esc_attr( $this->props['home_link_text'] ) : esc_attr__( 'Home' );
		$use_home_link_icon                    = esc_attr( $this->props['use_home_link_icon'] );
		$hide_home_text                        = esc_attr( $this->props['hide_home_text'] );
		$home_link_icon                        = esc_attr( $this->props['home_link_icon'] );
		$home_link_icon_color                  = esc_attr( $this->props['home_link_icon_color'] );
		$home_link_icon_color_hover            = esc_attr( $this->get_hover_value( 'home_link_icon_color' ) );
		$home_link_icon_size                   = et_pb_responsive_options()->get_property_values( $this->props, 'home_link_icon_size' );
		$breadcrumb_list                       = '';
		$output                                = '';
		$opacity                               = 1;
		$opacity_style                         = '';
		$breadcrumb                            = $this->traverse_breadcrumbs();
		$breadcrumb_alignment 				   = et_pb_responsive_options()->get_property_values( $this->props,'global_text_settings_text_align' );

		foreach( $breadcrumb_alignment as &$align ) {
			$align = str_replace( array( 'left', 'right', 'justify' ), array( 'flex-start', 'flex-end', 'flex-start' ), $align);
		}

		if ( '' !== $breadcrumb_item_custom_padding ) {
			$padding_desktop = $this->process_padding( $breadcrumb_item_custom_padding );
			$padding_tablet  = ( '' !== $breadcrumb_item_custom_padding_tablet ) ? $this->process_padding( $breadcrumb_item_custom_padding_tablet ) : $padding_desktop;
			$padding_phone   = ( '' !== $breadcrumb_item_custom_padding_phone ) ? $this->process_padding( $breadcrumb_item_custom_padding_phone ) : $padding_desktop;
		} else {
			$padding_desktop = array(
				'top'    => 20,
				'right'  => 10,
				'bottom' => 20,
				'left'   => 10,
			);
			$padding_tablet  = $padding_desktop;
			$padding_phone   = $padding_desktop;
		}

		if ( 'on' === $use_home_link_icon && '' !== $home_link_icon ) {
			if ( class_exists( 'ET_Builder_Module_Helper_Style_Processor' ) && method_exists( 'ET_Builder_Module_Helper_Style_Processor', 'process_extended_icon' ) ) {
				$this->generate_styles(
					array(
						'utility_arg'    => 'icon_font_family',
						'render_slug'    => $render_slug,
						'base_attr_name' => 'home_link_icon',
						'important'      => true,
						'selector'       => '%%order_class%% .dipl-breadcrumb-wrapper li .breadcrumb-home-icon',
						'processor'      => array(
							'ET_Builder_Module_Helper_Style_Processor',
							'process_extended_icon',
						),
					)
				);
			}
		}

		if ( ! empty( array_filter( $breadcrumb_alignment ) ) ) {
			et_pb_responsive_options()->generate_responsive_css( $breadcrumb_alignment, '%%order_class%% .dipl-breadcrumb-wrapper', 'justify-content', $render_slug, '', 'type' );
		}

		if ( ! empty( array_filter( $home_link_icon_size ) ) ) {
			et_pb_responsive_options()->generate_responsive_css( $home_link_icon_size, '%%order_class%% .dipl-breadcrumb-wrapper li .breadcrumb-home-icon', 'font-size', $render_slug, '', 'type' );
		}

		if ( '' !== $home_link_icon_color ) {
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl-breadcrumb-wrapper li .breadcrumb-home-icon',
					'declaration' => sprintf( 'color: %1$s;', esc_html( $home_link_icon_color ) ),
				)
			);
		}

		if ( isset( $home_link_icon_color_hover ) ) {
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl-breadcrumb-wrapper li .breadcrumb-home-icon:hover',
					'declaration' => sprintf( 'color: %1$s;', esc_html( $home_link_icon_color_hover ) ),
				)
			);
		}

		if ( 'layout1' === $breadcrumb_layout && '' !== $breadcrumb ) {
			if ( '' !== $padding_desktop['left'] ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl-breadcrumb-wrapper.layout1 li .breadcrumb-page',
						'declaration' => sprintf( 'padding-left: %1$spx;', esc_html( $padding_desktop['left'] ) ),
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl-breadcrumb-wrapper.layout1 li .breadcrumb-page',
						'declaration' => sprintf( 'padding-left: %1$spx;', esc_html( $padding_tablet['left'] ) ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl-breadcrumb-wrapper.layout1 li .breadcrumb-page',
						'declaration' => sprintf( 'padding-left: %1$spx;', esc_html( $padding_phone['left'] ) ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}
			if ( '' !== $padding_desktop['right'] ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl-breadcrumb-wrapper.layout1 li .breadcrumb-page',
						'declaration' => sprintf( 'padding-right: %1$spx;', esc_html( $padding_desktop['right'] ) ),
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl-breadcrumb-wrapper.layout1 li .breadcrumb-page',
						'declaration' => sprintf( 'padding-right: %1$spx;', esc_html( $padding_tablet['right'] ) ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl-breadcrumb-wrapper.layout1 li .breadcrumb-page',
						'declaration' => sprintf( 'padding-right: %1$spx;', esc_html( $padding_phone['right'] ) ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}
			if ( '' !== $nav_bg_color ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl-breadcrumb-wrapper.layout1 li .breadcrumb-page',
						'declaration' => sprintf( 'background-color: %1$s;', esc_html( $nav_bg_color ) ),
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .layout1 li .breadcrumb-page::after',
						'declaration' => sprintf( 'border-color: transparent transparent transparent %1$s;', esc_html( $nav_bg_color ) ),
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .layout1 li .breadcrumb-page::before',
						'declaration' => sprintf( 'border-color: %1$s %1$s %1$s transparent', esc_html( $nav_bg_color ) ),
					)
				);
			}

			if ( isset( $nav_bg_color_hover ) ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl-breadcrumb-wrapper.layout1 li .breadcrumb-page:hover',
						'declaration' => sprintf( 'background-color: %1$s;', esc_html( $nav_bg_color_hover ) ),
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .layout1 li .breadcrumb-page:hover:after',
						'declaration' => sprintf( 'border-color: transparent transparent transparent %1$s;', esc_html( $nav_bg_color_hover ) ),
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .layout1 li .breadcrumb-page:hover::before',
						'declaration' => sprintf( 'border-color: %1$s %1$s %1$s transparent', esc_html( $nav_bg_color_hover ) ),
					)
				);
			}

			if ( '' !== $nav_last_item_bg_color && 'on' === $enable_different_bg ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl-breadcrumb-wrapper.layout1 li .breadcrumb-page.dipl-last-page',
						'declaration' => sprintf( 'background-color: %1$s;', esc_html( $nav_last_item_bg_color ) ),
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .layout1 li .breadcrumb-page.dipl-last-page::after',
						'declaration' => sprintf( 'border-color: transparent transparent transparent %1$s;', esc_html( $nav_last_item_bg_color ) ),
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .layout1 li .breadcrumb-page.dipl-last-page::before',
						'declaration' => sprintf( 'border-color: %1$s %1$s %1$s transparent', esc_html( $nav_last_item_bg_color ) ),
					)
				);
			}

			if ( '' !== $this->props['global_text_settings_font_size'] ) {
				$height   = ( intval( $this->props['global_text_settings_font_size'] ) + $padding_desktop['top'] + $padding_desktop['bottom'] ) . 'px';
				$height_f = floor( intval( $height ) / 2 ) . 'px';
				$height_c = ceil( intval( $height ) / 2 ) . 'px';

				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl-breadcrumb-wrapper.layout1 li .breadcrumb-page',
						'declaration' => sprintf( 'height: %1$s;', esc_html( $height ) ),
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl-breadcrumb-wrapper.layout1 li .breadcrumb-page::before,
										%%order_class%% .dipl-breadcrumb-wrapper.layout1 li .breadcrumb-page::after',
						'declaration' => sprintf( 'border-width: %1$s 10px %2$s 10px', esc_html( $height_f ), esc_html( $height_c ) ),
					)
				);
			}
			if ( '' !== $this->props['global_text_settings_font_size_tablet'] ) {
				$height   = ( intval( $this->props['global_text_settings_font_size_tablet'] ) + $padding_tablet['top'] + $padding_tablet['bottom'] ) . 'px';
				$height_f = floor( intval( $height ) / 2 ) . 'px';
				$height_c = ceil( intval( $height ) / 2 ) . 'px';

				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl-breadcrumb-wrapper.layout1 li .breadcrumb-page',
						'declaration' => sprintf( 'height: %1$s;', esc_html( $height ) ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl-breadcrumb-wrapper.layout1 li .breadcrumb-page::before,
										%%order_class%% .dipl-breadcrumb-wrapper.layout1 li .breadcrumb-page::after',
						'declaration' => sprintf( 'border-width: %1$s 10px %2$s 10px', esc_html( $height_f ), esc_html( $height_c ) ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}
			if ( '' !== $this->props['global_text_settings_font_size_phone'] ) {
				$height   = ( intval( $this->props['global_text_settings_font_size_phone'] ) + $padding_phone['top'] + $padding_phone['bottom'] ) . 'px';
				$height_f = floor( intval( $height ) / 2 ) . 'px';
				$height_c = ceil( intval( $height ) / 2 ) . 'px';

				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl-breadcrumb-wrapper.layout1 li .breadcrumb-page',
						'declaration' => sprintf( 'height: %1$s;', esc_html( $height ) ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl-breadcrumb-wrapper.layout1 li .breadcrumb-page::before,
										%%order_class%% .dipl-breadcrumb-wrapper.layout1 li .breadcrumb-page::after',
						'declaration' => sprintf( 'border-width: %1$s 10px %2$s 10px', esc_html( $height_f ), esc_html( $height_c ) ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}

			$breadcrumb_size = (int) esc_attr( count( $breadcrumb ) );
			for ( $i = 0; $i < $breadcrumb_size; $i++ ) {
				$breadcrumbs_keys = array_keys( $breadcrumb[ $i ] );
				$title            = $breadcrumbs_keys[0];
				$link             = $breadcrumb[ $i ][ $title ];

				if ( 'on' === $enable_fade && '' !== $fade_range ) {
					$opacity_style = sprintf( 'style="opacity: %1$s;"', esc_attr( $opacity ) );
					$opacity       = ( $opacity > $fade_range ) ? $opacity - floatval( $fade_range ) : $opacity;
				}

				if ( 0 === $i ) {
					$title = ( '' !== $title ) ? $title : $home_link_text;
					if ( 'on' === $use_home_link_icon && '' !== $home_link_icon && 'off' === $hide_home_text ) {
						$breadcrumb_list .= sprintf(
							'<li property="itemListElement" typeof="ListItem" %1$s>
														    <a class="breadcrumb-item dipl-home-page" href="%2$s" property="item" typeof="WebPage" %6$s>
														      	<span class="breadcrumb-page" property="name">
														      		<span class="breadcrumb-home-icon et-pb-icon">%3$s</span>
														      		%4$s
														      	</span>
														    </a>
														    <meta property="position" content="%5$s" />
														</li>',
							$opacity_style,
							$link,
							esc_attr( et_pb_process_font_icon( $home_link_icon ) ),
							$title,
							( $i + 1 ),
							$link_target
						);
					} elseif ( 'on' === $use_home_link_icon && '' !== $home_link_icon && 'on' === $hide_home_text ) {
						$breadcrumb_list .= sprintf(
							'<li property="itemListElement" typeof="ListItem" %1$s>
														    <a class="breadcrumb-item dipl-home-page" href="%2$s" property="item" typeof="WebPage" %5$s>
														      	<span class="breadcrumb-page" property="name">
														      		<span class="breadcrumb-home-icon et-pb-icon">
														      			%3$s
														      		</span>
														      	</span>
														    </a>
													    	<meta property="position" content="%4$s" />
														</li>',
							$opacity_style,
							$link,
							esc_attr( et_pb_process_font_icon( $home_link_icon ) ),
							( $i + 1 ),
							$link_target
						);

					} else {
						$breadcrumb_list .= sprintf(
							'<li property="itemListElement" typeof="ListItem" %1$s>
														    <a class="breadcrumb-item dipl-home-page" href="%2$s" property="item" typeof="WebPage" %5$s>
														      	<span class="breadcrumb-page" property="name">%3$s</span>
														    </a>
														    <meta property="position" content="%4$s" />
														</li>',
							$opacity_style,
							$link,
							$title,
							( $i + 1 ),
							$link_target
						);
					}
				} elseif ( ( $i + 1 ) === $breadcrumb_size ) {
					$breadcrumb_list .= sprintf(
						'<li property="itemListElement" typeof="ListItem" %1$s>
											      		<span class="breadcrumb-page dipl-last-page" property="name">%2$s</span>
											    		<meta property="position" content="%3$s" />
											  		</li>',
						$opacity_style,
						$title,
						( $i + 1 )
					);
				} else {
					$breadcrumb_list .= sprintf(
						'<li property="itemListElement" typeof="ListItem" %1$s>
													    <a class="breadcrumb-item" href="%2$s" property="item" typeof="WebPage" %5$s>
													      <span class="breadcrumb-page" property="name">%3$s</span>
													    </a>
													    <meta property="position" content="%4$s" />
													</li>',
						$opacity_style,
						$link,
						$title,
						( $i + 1 ),
						$link_target
					);
				}
			}
		}
		if ( 'layout2' === $breadcrumb_layout && '' !== $breadcrumb ) {

			if ( 'text_separator' === $separator_type ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl-breadcrumb-inner li:after',
						'declaration' => sprintf( 'content: "%1$s";', esc_html( $separator_text ) ),
					)
				);
			} else {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl-breadcrumb-inner li:after',
						'declaration' => 'font-family: "ETmodules";',
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl-breadcrumb-inner li:after',
						'declaration' => 'content: attr(data-icon);',
					)
				);
				if ( '' !== $this->props['separator_icon'] ) {
					if ( class_exists( 'ET_Builder_Module_Helper_Style_Processor' ) && method_exists( 'ET_Builder_Module_Helper_Style_Processor', 'process_extended_icon' ) ) {
						$this->generate_styles(
							array(
								'utility_arg'    => 'icon_font_family',
								'render_slug'    => $render_slug,
								'base_attr_name' => 'separator_icon',
								'important'      => true,
								'selector'       => '%%order_class%% .dipl-breadcrumb-inner li:after',
								'processor'      => array(
									'ET_Builder_Module_Helper_Style_Processor',
									'process_extended_icon',
								),
							)
						);
					}
				}
			}

			if ( ! empty( array_filter( $separator_size ) ) ) {
				et_pb_responsive_options()->generate_responsive_css( $separator_size, '%%order_class%% .dipl-breadcrumb-inner li:after', 'font-size', $render_slug, '', 'type' );
			}

			if ( '' !== $separator_color ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl-breadcrumb-inner li:after',
						'declaration' => sprintf( 'color: %1$s;', esc_html( $separator_color ) ),
					)
				);
			}

			if ( isset( $separator_color_hover ) ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl-breadcrumb-inner li:after:hover',
						'declaration' => sprintf( 'color: %1$s;', esc_html( $separator_color_hover ) ),
					)
				);
			}

			$breadcrumb_size = (int) esc_attr( count( $breadcrumb ) );
			for ( $i = 0; $i < $breadcrumb_size; $i++ ) {
				$breadcrumbs_keys = array_keys( $breadcrumb[ $i ] );
				$title            = $breadcrumbs_keys[0];
				$link             = $breadcrumb[ $i ][ $title ];

				if ( 0 === $i ) {
					$title = ( '' !== $title ) ? $title : $home_link_text;
					if ( 'on' === $use_home_link_icon && '' !== $home_link_icon && 'off' === $hide_home_text ) {
						$breadcrumb_list .= sprintf(
							'<li property="itemListElement" typeof="ListItem" data-icon="%1$s">
												    <a class="breadcrumb-item dipl-home-page" href="%2$s" property="item" typeof="WebPage" %6$s>
												      	<span class="breadcrumb-page" property="name">
												      		<span class="breadcrumb-home-icon et-pb-icon">%3$s</span>
												      		%4$s
												      	</span>
												    </a>
												    <meta property="position" content="%5$s" />
												</li>',
							esc_attr( et_pb_process_font_icon( $separator_icon ) ),
							$link,
							esc_attr( et_pb_process_font_icon( $home_link_icon ) ),
							$title,
							( $i + 1 ),
							$link_target
						);

					} elseif ( 'on' === $use_home_link_icon && '' !== $home_link_icon && 'on' === $hide_home_text ) {
						$breadcrumb_list .= sprintf(
							'<li property="itemListElement" typeof="ListItem" data-icon="%1$s">
													    <a class="breadcrumb-item dipl-home-page" href="%2$s" property="item" typeof="WebPage" %5$s>
													      	<span class="breadcrumb-page" property="name">
													      		<span class="breadcrumb-home-icon et-pb-icon">%3$s</span>
													      	</span>
													    </a>
												    	<meta property="position" content="%4$s" />
													</li>',
							esc_attr( et_pb_process_font_icon( $separator_icon ) ),
							$link,
							esc_attr( et_pb_process_font_icon( $home_link_icon ) ),
							( $i + 1 ),
							$link_target
						);

					} else {
						$breadcrumb_list .= sprintf(
							'<li property="itemListElement" typeof="ListItem" data-icon="%1$s">
													    <a class="breadcrumb-item dipl-home-page" href="%2$s" property="item" typeof="WebPage" %5$s>
													      	<span class="breadcrumb-page" property="name">%3$s</span>
													    </a>
													    <meta property="position" content="%4$s" />
													</li>',
							esc_attr( et_pb_process_font_icon( $separator_icon ) ),
							$link,
							$title,
							( $i + 1 ),
							$link_target
						);
					}
				} else {
					$breadcrumb_list .= sprintf(
						'<li property="itemListElement" typeof="ListItem" data-icon="%1$s">
											    <a class="breadcrumb-item" href="%2$s" property="item" typeof="WebPage" %5$s>
											      <span class="breadcrumb-page" property="name">%3$s</span>
											    </a>
											    <meta property="position" content="%4$s" />
											</li>',
						esc_attr( et_pb_process_font_icon( $separator_icon ) ),
						$link,
						$title,
						( $i + 1 ),
						$link_target
					);
				}
			}
		}

		$file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        wp_enqueue_style( 'dipl-breadcrumb-style', PLUGIN_PATH . 'includes/modules/Breadcrumb/' . $file . '.min.css', array(), '1.0.0' );

		$output = sprintf(
			'<div class="dipl-breadcrumb-wrapper %1$s">
								<ol class="dipl-breadcrumb-inner" vocab="https://schema.org/" typeof="BreadcrumbList">
									%2$s
								</ol>
							</div>',
			$breadcrumb_layout,
			$breadcrumb_list
		);

		return $output;
	}

	public function process_padding( $padding ) {
		$padding_array  = explode( '|', $padding );
		$padding_output = array(
			'top'    => intval( $padding_array[0] ) ? intval( $padding_array[0] ) : 20,
			'right'  => intval( $padding_array[1] ) ? intval( $padding_array[1] ) : 10,
			'bottom' => intval( $padding_array[2] ) ? intval( $padding_array[2] ) : 20,
			'left'   => intval( $padding_array[3] ) ? intval( $padding_array[3] ) : 10,
		);
		return $padding_output;
	}

	public static function traverse_breadcrumbs( $args = array(), $conditional_tags = array(), $current_page = array() ) {
		global $paged, $wp_query;
		$defaults = array(
			'home_link_text' => '',
		);
		$args     = wp_parse_args( $args, $defaults );
		$page_id  = isset( $current_page['id'] ) ? (int) $current_page['id'] : 0;

		$home_link_text = $args['home_link_text'];
		$query_object   = $wp_query->get_queried_object();
		$breadcrumb     = array();

		if ( ! is_front_page() || ! is_home()
			|| et_fb_conditional_tag( 'is_front_page', $conditional_tags )
			|| et_fb_conditional_tag( 'is_home', $conditional_tags ) ) {
			$breadcrumb[] = array(
				$home_link_text => get_home_url(),
			);

			if ( is_singular() || et_fb_conditional_tag( 'is_singular', $conditional_tags ) ) {
				$post_object = get_post( $page_id );
				$post_type   = $post_object->post_type;
				$post_parent = $post_object->post_parent;

				if ( 'post' === $post_type ) {
					$categories = get_the_category( $post_object->ID );

					if ( ! empty( $categories ) ) {

						$indexed_categories = array_values( $categories );
						$category           = end( $indexed_categories );
						$category_parent    = $category->parent;
						$category_trail[]   = array( $category->name => get_term_link( $category->term_id ) );

						if ( 0 !== $category_parent ) {

							while ( $category_parent ) {
								$parent_category  = get_term( $category_parent, 'category' );
								$category_trail[] = array( $parent_category->name => get_term_link( $parent_category->term_id ) );
								$category_parent  = $parent_category->parent;
							}
							$category_trail = array_reverse( $category_trail );
						}
						$category_trail_size = (int) count( $category_trail );
						for ( $i = 0; $category_trail_size > $i; $i++ ) {
							array_push( $breadcrumb, $category_trail[ $i ] );
						}
					}
				}

				if ( ! in_array( $post_type, array( 'post', 'page', 'attachment' ), true ) ) {
					$post_type_object = get_post_type_object( $post_type );
					$archive_link     = esc_url( get_post_type_archive_link( $post_type ) );
					$archive_trail    = array( $post_type_object->labels->singular_name => $archive_link );
					array_push( $breadcrumb, $archive_trail );
				}

				if ( 0 !== $post_parent ) {
					$post_trail[] = array( $post_object->post_title => get_permalink( $post_object ) );
					while ( $post_parent ) {
						$parent       = get_post( $post_parent );
						$post_trail[] = array( get_the_title( $parent->ID ) => esc_url( get_permalink( $parent->ID ) ) );
						$post_parent  = wp_get_post_parent_id( $parent->ID );
					}

					$post_trail      = array_reverse( $post_trail );
					$post_trail_size = (int) count( $post_trail );

					for ( $i = 0; $post_trail_size > $i; $i++ ) {
						array_push( $breadcrumb, $post_trail[ $i ] );
					}
				} else {
					$breadcrumb[] = array( $post_object->post_title => get_permalink( $post_object ) );
				}
			}

			if ( is_archive() || et_fb_conditional_tag( 'is_archive', $conditional_tags ) ) {
				if ( is_category() || is_tag() || is_tax() || et_fb_conditional_tag( 'is_category', $conditional_tags ) || et_fb_conditional_tag( 'is_tag', $conditional_tags ) || et_fb_conditional_tag( 'is_tax', $conditional_tags ) ) {
					$term_object   = get_term( $query_object );
					$taxonomy      = $term_object->taxonomy;
					$terms_name    = $term_object->name;
					$term_parent   = $term_object->parent;
					$term_link     = get_term_link( $term_object->term_id );
					$terms_trail[] = array( $term_object->name => get_term_link( $term_object->term_id ) );

					if ( 0 !== $term_parent ) {
						while ( $term_parent ) {
							$term          = get_term( $term_parent, $taxonomy );
							$terms_trail[] = array( $term->name => get_term_link( $term->term_id ) );
							$term_parent   = $term->parent;
						}
						$terms_trail = array_reverse( $terms_trail );
					}
					$terms_trail_size = (int) count( $terms_trail );
					for ( $i = 0; $terms_trail_size > $i; $i++ ) {
						array_push( $breadcrumb, $terms_trail[ $i ] );
					}
				} elseif ( is_author() || et_fb_conditional_tag( 'is_author', $conditional_tags ) ) {
					global $author;
					$author_data  = get_userdata( $author );
					$breadcrumb[] = array( 'Author archive for: ' . $author_data->display_name => '#' );

				} elseif ( is_day() || et_fb_conditional_tag( 'is_day', $conditional_tags ) ) {
					$breadcrumb[] = array( get_the_time( 'Y' ) => get_year_link( get_the_time( 'Y' ) ) );
					$breadcrumb[] = array( get_the_time( 'M' ) . ' Archives' => get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) );
					$breadcrumb[] = array( get_the_time( 'j' ) . ' ' . get_the_time( 'M' ) . ' Archives' => '#' );

				} elseif ( is_month() || et_fb_conditional_tag( 'is_month', $conditional_tags ) ) {
					$breadcrumb[] = array( get_the_time( 'Y' ) . ' Archives' => get_year_link( get_the_time( 'Y' ) ) );
					$breadcrumb[] = array( get_the_time( 'M' ) . ' Archives' => '#' );

				} elseif ( is_year() || et_fb_conditional_tag( 'is_year', $conditional_tags ) ) {
					$breadcrumb[] = array( get_the_time( 'Y' ) . ' Archives' => '#' );

				} elseif ( is_post_type_archive() || et_fb_conditional_tag( 'is_post_type_archive', $conditional_tags ) ) {
					$post_type        = $wp_query->query_vars['post_type'];
					$post_type_object = get_post_type_object( $post_type );
					$breadcrumb[]     = array( $post_type_object->labels->singular_name => '#' );

				}
			}

			if ( is_paged() || et_fb_conditional_tag( 'is_paged', $conditional_tags ) ) {
					$current_page = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : get_query_var( 'page' );
					$breadcrumb[] = array( 'Page ' . number_format_i18n( $current_page ) => '#' );
			}
			if ( is_search() || et_fb_conditional_tag( 'is_search', $conditional_tags ) ) {
					$breadcrumb[] = array( 'Search results for: ' . get_search_query() => '#' );
			}
			if ( is_404() || et_fb_conditional_tag( 'is_404', $conditional_tags ) ) {
					$breadcrumb[] = array( 'Error 404' => '#' );
			}
		} else {
			$breadcrumb = '';
		}
		return $breadcrumb;
	}
}
$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
	$modules = explode( ',', $plugin_options['dipl-modules'] );
	if ( in_array( 'dipl_breadcrumb', $modules ) ) {
		new DIPL_Breadcrumb();
	}
} else {
	new DIPL_Breadcrumb();
}