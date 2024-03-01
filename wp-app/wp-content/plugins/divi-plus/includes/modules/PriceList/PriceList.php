<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.4
 */
class DIPL_PriceList extends ET_Builder_Module {

	public $slug       = 'dipl_price_list';
	public $child_slug = 'dipl_price_list_item';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name             = esc_html__( 'DP Price List', 'divi-plus' );
		$this->child_item_text  = esc_html__( 'Item', 'divi-plus' );
		$this->main_css_element = '%%order_class%%';
		add_filter( 'et_builder_processed_range_value', array( $this, 'dipl_builder_processed_range_value' ), 10, 3 );
	}

	public function get_settings_modal_toggles() {
		return array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Configuration', 'divi-plus' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'text'     => array(
						'title' => esc_html__( 'Alignment', 'divi-plus' ),
					),
					'icon'     => array(
						'title' => esc_html__( 'Icon', 'divi-plus' ),
					),
					'name'     => array(
						'title' => esc_html__( 'Name', 'divi-plus' ),
					),
					'price'    => array(
						'title' => esc_html__( 'Price', 'divi-plus' ),
					),
					'currency' => array(
						'title' => esc_html__( 'Currency', 'divi-plus' ),
					),
					'desc'     => array(
						'title'             => esc_html__( 'Description', 'divi-plus' ),
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
					'divider'  => array(
						'title' => esc_html__( 'Divider', 'divi-plus' ),
					),
				),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts'          => array(
				'name'       => array(
					'label'           => esc_html__( 'Item Name', 'divi-plus' ),
					'font_size'       => array(
						'default'        => '20px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height'     => array(
						'default'        => '1.2',
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
					'header_level'    => array(
						'default' => 'h4',
					),
					'hide_text_align' => true,
					'css'             => array(
						'main' => "{$this->main_css_element} .dipl_price_list_item_name",
					),
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'name',
				),
				'price'      => array(
					'label'           => esc_html__( 'Price', 'divi-plus' ),
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
						'default'        => '1',
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
					'hide_text_align' => true,
					'css'             => array(
						'main' => "{$this->main_css_element} .dipl_price_list_item_price",
					),
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'price',
				),
				'currency'   => array(
					'label'           => esc_html__( 'Currency Symbol', 'divi-plus' ),
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
						'default'        => '1',
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
					'hide_text_align' => true,
					'css'             => array(
						'main' => "{$this->main_css_element} .dipl_price_list_item_currency",
					),
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'currency',
				),
				'desc_text'  => array(
					'label'          => esc_html__( 'Description', 'divi-plus' ),
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
						'default'        => '1.3',
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
						'main' => "{$this->main_css_element} .dipl_price_list_item_description, {$this->main_css_element} .dipl_price_list_item_description p",
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'desc',
					'sub_toggle'     => 'p',
				),
				'desc_link'  => array(
					'label'          => esc_html__( 'Description Link', 'divi-plus' ),
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
						'default'        => '1.3',
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
						'main' => "{$this->main_css_element} .dipl_price_list_item_description a",
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'desc',
					'sub_toggle'     => 'a',
				),
				'desc_link'  => array(
					'label'          => esc_html__( 'Link', 'divi-plus' ),
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
						'default'        => '1.3',
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
						'main' => "{$this->main_css_element} .dipl_price_list_item_description a",
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'desc',
					'sub_toggle'     => 'a',
				),
				'desc_ul'    => array(
					'label'          => esc_html__( 'Unordered List', 'divi-plus' ),
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
						'default'        => '1.3',
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
						'main' => "{$this->main_css_element} .dipl_price_list_item_description ul li",
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'desc',
					'sub_toggle'     => 'ul',
				),
				'desc_ol'    => array(
					'label'          => esc_html__( 'Ordered List', 'divi-plus' ),
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
						'default'        => '1.3',
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
						'main' => "{$this->main_css_element} .dipl_price_list_item_description ol li",
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'desc',
					'sub_toggle'     => 'ol',
				),
				'desc_quote' => array(
					'label'          => esc_html__( 'Blockquote', 'divi-plus' ),
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
						'default'        => '1.3',
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
						'main' => "{$this->main_css_element} .dipl_price_list_item_description blockquote",
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'desc',
					'sub_toggle'     => 'quote',
				),
			),
			'borders'        => array(
				'thumbnail' => array(
					'label_prefix' => 'Thumbnail',
					'css'          => array(
						'main' => array(
							'border_radii'  => "{$this->main_css_element} .dipl_price_list_item_thumbnail img",
							'border_styles' => "{$this->main_css_element} .dipl_price_list_item_thumbnail img",
						),
					),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'border',
				),
				'default'   => array(
					'label_prefix' => 'Item List',
					'css'          => array(
						'main' => array(
							'border_radii'  => $this->main_css_element,
							'border_styles' => $this->main_css_element,
						),
					),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'border',
				),
			),
			'box_shadow'     => array(
				'thumbnail' => array(
					'label'       => esc_html__( 'Thumbnail Box Shadow', 'divi-plus' ),
					'css'         => array(
						'main' => "{$this->main_css_element} .dipl_price_list_item_thumbnail img",
					),
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'box_shadow',
				),
				'default'   => array(
					'label'       => esc_html__( 'Item List Box Shadow', 'divi-plus' ),
					'css'         => array(
						'main' => $this->main_css_element,
					),
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'box_shadow',
				),
			),
			'max_width' => array(
				'extra' => array(
					'thumbnail' => array(
						'options' => array(
							'width' => array(
								'label'          => esc_html__( 'Thumbnail Width', 'divi-plus' ),
								'range_settings' => array(
									'min'  => 1,
									'max'  => 100,
									'step' => 1,
								),
								'hover'          => false,
								'fixed_unit'	 => 'px',
								'default_unit'   => 'px',
								'default'		 => '100px',
								'default_tablet' => '',
								'default_phone'  => '',
								'tab_slug'       => 'advanced',
								'toggle_slug'    => 'width',
							),
						),
						'use_max_width'        => false,
						'use_module_alignment' => false,
						'css'                  => array(
							'main' => "{$this->main_css_element} .dipl_price_list_item_thumbnail img",
						),
					),
				),
				'default' => array(
					'css' => array(
						'main'             => '%%order_class%%',
						'module_alignment' => '%%order_class%%',
					),
				),
			),
			'margin_padding' => array(
				'css' => array(
					'main'      => $this->main_css_element,
					'important' => 'all',
				),
			),
			'text'           => array(
				'text_orientation' => array(
					'exclude_options' => array( 'justified' ),
				),
				'css'              => array(
					'text_orientation' => $this->main_css_element,
				),
			),
			'text_shadow'    => false,
			'link_options'   => false,
		);
	}

	public function get_fields() {
		$fields = array(
			'item_list_layout' => array(
				'label'           => esc_html__( 'Layout', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'layout1' => esc_html( 'Layout 1' ),
					'layout2' => esc_html( 'Layout 2' ),
				),
				'default'         => 'layout1',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can select the price list layout.', 'divi-plus' ),
			),
			'number_of_columns' => array(
				'label'           => esc_html__( 'Number of Columns', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'1' => esc_html( '1' ),
					'2' => esc_html( '2' ),
					'3' => esc_html( '3' ),
					'4' => esc_html( '4' ),
					'5' => esc_html( '5' ),
					'6' => esc_html( '6' ),
				),
				'default'         => '1',
				'mobile_options'  => true,
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can select the price list column.', 'divi-plus' ),
			),
			'column_spacing' => array(
                'label'             => esc_html__( 'Column Spacing', 'divi-plus' ),
				'type'              => 'range',
				'option_category'  	=> 'layout',
				'range_settings'    => array(
					'min'   => '0',
					'max'   => '100',
					'step'  => '1',
				),
				'fixed_unit'		=> 'px',
				'fixed_range'       => true,
				'validate_unit'		=> true,
				'mobile_options'    => true,
				'default'           => '15px',
				'default_on_front'  => '15px',
				'tab_slug'        	=> 'general',
				'toggle_slug'     	=> 'main_content',
				'description'       => esc_html__( 'Increase or decrease spacing between columns.', 'divi-plus' ),
            ),
			'divider_width'    => array(
				'label'           => esc_html__( 'Divider Width', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'font_option',
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '20',
					'step' => '1',
				),
				'mobile_options'  => true,
				'default'         => '1px',
				'show_if'         => array(
					'item_list_layout' => 'layout1',
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'divider',
				'description'     => esc_html__( 'Here you can set the divider width.', 'divi-plus' ),
			),
			'divider_style'    => array(
				'label'           => esc_html__( 'Divider Style', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'solid'  => esc_html__( 'Solid', 'divi-plus' ),
					'dashed' => esc_html__( 'Dashed', 'divi-plus' ),
					'dotted' => esc_html__( 'Dotted', 'divi-plus' ),
					'double' => esc_html__( 'Double', 'divi-plus' ),
					'groove' => esc_html__( 'Groove', 'divi-plus' ),
					'ridge'  => esc_html__( 'Ridge', 'divi-plus' ),
					'inset'  => esc_html__( 'Inset', 'divi-plus' ),
					'outset' => esc_html__( 'Outset', 'divi-plus' ),
				),
				'mobile_options'  => true,
				'default'         => 'dotted',
				'show_if'         => array(
					'item_list_layout' => 'layout1',
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'divider',
				'description'     => esc_html__( 'Here you can select the divider style.', 'divi-plus' ),
			),
			'divider_color'    => array(
				'label'       => esc_html__( 'Divider Color', 'divi-plus' ),
				'type'        => 'color-alpha',
				'hover'       => 'tabs',
				'show_if'     => array(
					'item_list_layout' => 'layout1',
				),
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'divider',
				'description' => esc_html__( 'Here you can define a custom color for your divider.', 'divi-plus' ),
			),
			'icon_font_size'   => array(
				'label'            => esc_html__( 'Icon Font Size', 'divi-plus' ),
				'type'             => 'range',
				'option_category'  => 'font_option',
				'range_settings'   => array(
					'min'  => '1',
					'max'  => '500',
					'step' => '1',
				),
				'mobile_options'   => true,
				'default'          => '100px',
				'default_on_front' => '100px',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'icon',
				'description'      => esc_html__( 'Control the size of the icon by increasing or decreasing the font size.', 'divi-plus' ),
			),
			'icon_color' => array(
				'label'            => esc_html__( 'Icon Color', 'divi-plus' ),
				'type'             => 'color-alpha',
				'hover'            => 'tabs',
				'mobile_options'   => true,
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'icon',
				'description'      => esc_html__( 'Here you can define a custom color for your icon.', 'divi-plus' ),
			),
			'shape_bg_color'   => array(
				'label'            => esc_html__( 'Shape Background', 'divi-plus' ),
				'type'             => 'color-alpha',
				'custom_color'     => true,
				'hover'            => 'tabs',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'icon',
				'description'      => esc_html__( 'Pick a color to be used for the icon shape.', 'divi-plus' ),
			),
		);

		return $fields;
	}

	public function before_render() {
		global $dp_pl_parent_name_level, $dp_pl_parent_item_list_layout, $dp_pl_parent_icon_font_size;
		$dp_pl_parent_icon_font_size 	= et_pb_responsive_options()->get_property_values( $this->props, 'icon_font_size' );
		$dp_pl_parent_name_level       	= 'h4' === $this->props['name_level'] ? '' : $this->props['name_level'];
		$dp_pl_parent_item_list_layout 	= $this->props['item_list_layout'];
	}

	public function render( $attrs, $content, $render_slug ) {
		$icon_font_size       = et_pb_responsive_options()->get_property_values( $this->props, 'icon_font_size' );
		$icon_color           = et_pb_responsive_options()->get_property_values( $this->props, 'icon_color' );
		$icon_color_hover     = $this->get_hover_value( 'icon_color' );
		$shape_bg_color       = esc_attr( $this->props['shape_bg_color'] );
		$shape_bg_color_hover = $this->get_hover_value( 'shape_bg_color' );

		$number_of_columns 	= et_pb_responsive_options()->get_property_values( $this->props, 'number_of_columns' );
		$column_spacing 	= et_pb_responsive_options()->get_property_values( $this->props, 'column_spacing' );
		
		$number_of_columns['tablet'] = '' !== $number_of_columns['tablet'] ? $number_of_columns['tablet'] : $number_of_columns['desktop'];
		$number_of_columns['phone']  = '' !== $number_of_columns['phone'] ? $number_of_columns['phone'] : $number_of_columns['tablet'];

		$column_spacing['tablet'] = '' !== $column_spacing['tablet'] ? $column_spacing['tablet'] : $column_spacing['desktop'];
		$column_spacing['phone']  = '' !== $column_spacing['phone'] ? $column_spacing['phone'] : $column_spacing['tablet'];
		
		$breakpoints 	= array( 'desktop', 'tablet', 'phone' );
		$width 			= array();

		foreach ( $breakpoints as $breakpoint ) {
			if ( 1 === absint( $number_of_columns[$breakpoint] ) ) {
				$width[$breakpoint] = '100%';
			} else {
				$divided_width 	= 100 / absint( $number_of_columns[$breakpoint] );
				if ( 0.0 !== floatval( $column_spacing[$breakpoint] ) ) {
					$gutter = floatval( ( floatval( $column_spacing[$breakpoint] ) * ( absint( $number_of_columns[$breakpoint] ) - 1 ) ) / absint( $number_of_columns[$breakpoint] ) );
					$width[$breakpoint] = 'calc(' . $divided_width . '% - ' . $gutter . 'px)';
				} else {
					$width[$breakpoint] = $divided_width . '%';
				}
			}
		}

		et_pb_responsive_options()->generate_responsive_css( $width, '%%order_class%% .dipl_price_list_item', 'width', $render_slug, '', 'range' );

		foreach ( $number_of_columns as $device => $cols ) {
			if ( 'desktop' === $device ) {
				self::set_style( $render_slug, array(
                    'selector'    => '%%order_class%% .dipl_price_list_item:not(:nth-child(' . absint( $cols ) . 'n+' . absint( $cols ) . '))',
                    'declaration' => sprintf( 'margin-right: %1$s;', esc_attr( $column_spacing['desktop'] ) ),
                    'media_query' => self::get_media_query( 'min_width_981' ),
                ) );
                if ( '' !== $cols ) {
					self::set_style( $render_slug, array(
	                    'selector'    => '%%order_class%% .dipl_price_list_item:nth-child(' . absint( $cols ) . 'n+1)',
	                    'declaration' => 'clear: left;',
	                    'media_query' => self::get_media_query( 'min_width_981' ),
	                ) );
				}
			} else if ( 'tablet' === $device ) {
				self::set_style( $render_slug, array(
                    'selector'    => '%%order_class%% .dipl_price_list_item:not(:nth-child(' . absint( $cols ) . 'n+' . absint( $cols ) . '))',
                    'declaration' => sprintf( 'margin-right: %1$s;', esc_attr( $column_spacing['tablet'] ) ),
                    'media_query' => self::get_media_query( '768_980' ),
                ) );
                if ( '' !== $cols ) {
					self::set_style( $render_slug, array(
	                    'selector'    => '%%order_class%% .dipl_price_list_item:nth-child(' . absint( $cols ) . 'n+1)',
	                    'declaration' => 'clear: left;',
	                    'media_query' => self::get_media_query( '768_980' ),
	                ) );
				}
			} else if ( 'phone' === $device ) {
				self::set_style( $render_slug, array(
                    'selector'    => '%%order_class%% .dipl_price_list_item:not(:nth-child(' . absint( $cols ) . 'n+' . absint( $cols ) . '))',
                    'declaration' => sprintf( 'margin-right: %1$s;', esc_attr( $column_spacing['phone'] ) ),
                    'media_query' => self::get_media_query( 'max_width_767' ),
                ) );
                if ( '' !== $cols ) {
					self::set_style( $render_slug, array(
	                    'selector'    => '%%order_class%% .dipl_price_list_item:nth-child(' . absint( $cols ) . 'n+1)',
	                    'declaration' => 'clear: left;',
	                    'media_query' => self::get_media_query( 'max_width_767' ),
	                ) );
				}
			}
			
		}
		
		et_pb_responsive_options()->generate_responsive_css( $icon_font_size, '%%order_class%% .dipl_price_list_icon', 'font-size', $render_slug, '', 'range' );
		et_pb_responsive_options()->generate_responsive_css( $icon_color, '%%order_class%% .dipl_price_list_icon', 'color', $render_slug, '', 'color' );

		if ( $icon_color_hover ) {
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%:hover .dipl_price_list_icon',
					'declaration' => sprintf(
						'color: %1$s;',
						esc_attr( $icon_color_hover )
					),
				)
			);
		}

		if ( $shape_bg_color ) {
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl_price_list_icon:not(.dipl_icon_shape_hexagon)',
					'declaration' => sprintf(
						'background-color: %1$s;',
						esc_attr( $shape_bg_color )
					),
				)
			);
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl_icon_hexagon',
					'declaration' => sprintf(
						'background-color: %1$s;',
						esc_attr( $shape_bg_color )
					),
				)
			);
		}

		if ( $shape_bg_color_hover ) {
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%:hover .dipl_price_list_icon:not(.dipl_icon_shape_hexagon)',
					'declaration' => sprintf(
						'background-color: %1$s;',
						esc_attr( $shape_bg_color_hover )
					),
				)
			);
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%:hover .dipl_icon_hexagon',
					'declaration' => sprintf(
						'background-color: %1$s;',
						esc_attr( $shape_bg_color_hover )
					),
				)
			);
		}

		$price_list_wrapper = sprintf(
            '<div class="dipl_price_list_layout dipl_price_list_%1$s">%2$s</div>',
            esc_attr( $this->props['item_list_layout'] ),
            et_core_intentionally_unescaped( $this->content, 'html' )
        );

		if ( 'layout1' === $this->props['item_list_layout'] ) {
			$divider_width = et_pb_responsive_options()->get_property_values( $this->props, 'divider_width' );
			$divider_style = et_pb_responsive_options()->get_property_values( $this->props, 'divider_style' );
			$divider_color = et_pb_responsive_options()->get_property_values( $this->props, 'divider_color' );

			et_pb_responsive_options()->generate_responsive_css( $divider_width, '%%order_class%% .dipl_price_list_item_price_divider', 'border-top-width', $render_slug, '', 'range' );
			et_pb_responsive_options()->generate_responsive_css( $divider_style, '%%order_class%% .dipl_price_list_item_price_divider', 'border-top-style', $render_slug, '', 'type' );
			et_pb_responsive_options()->generate_responsive_css( $divider_color, '%%order_class%% .dipl_price_list_item_price_divider', 'border-top-color', $render_slug, '', 'color' );

			$divider_color_hover = $this->get_hover_value( 'divider_color' );
			if ( $divider_color_hover ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_price_list_item:hover .dipl_price_list_item_price_divider',
						'declaration' => sprintf(
							'border-color: %1$s;',
							esc_attr( $divider_color_hover )
						),
					)
				);
			}
		}

		$file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        wp_enqueue_style( 'dipl-price-list-style', PLUGIN_PATH . 'includes/modules/PriceList/' . $file . '.min.css', array(), '1.0.0' );

		return et_core_intentionally_unescaped( $price_list_wrapper, 'html' );
	}

	public function dipl_builder_processed_range_value( $result, $range, $range_string ) {
		if ( false !== strpos( $result, '0calc' ) ) {
			return $range;
		}
		return $result;
	}
}
$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
	$modules = explode( ',', $plugin_options['dipl-modules'] );
	if ( in_array( 'dipl_price_list', $modules ) ) {
		new DIPL_PriceList();
	}
} else {
	new DIPL_PriceList();
}
