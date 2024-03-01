<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.4
 */
class DIPL_PriceListItem extends ET_Builder_Module {

	public $slug       = 'dipl_price_list_item';
	public $type       = 'child';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name                        = esc_html__( 'DP Price List Item', 'divi-plus' );
		$this->advanced_setting_title_text = esc_html__( 'Price List Item', 'divi-plus' );
		$this->child_title_var             = 'item_name';
		$this->main_css_element            = '.dipl_price_list %%order_class%%';
	}

	public function get_settings_modal_toggles() {
		return array(
			'general'  => array(
				'toggles' => array(
					'main_content' => array(
						'title'    => esc_html__( 'Content', 'divi-plus' ),
						'priority' => 1,
						'tab'      => 'active',
					),
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
				'use_margin' => false,
				'css'        => array(
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
		);
	}

	public function get_fields() {
		$fields = array(
			'item_name'             => array(
				'label'           => esc_html__( 'Item Name', 'divi-plus' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'default'         => 'Item Name',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can input the item name.', 'divi-plus' ),
			),
			'item_currency'         => array(
				'label'           => esc_html__( 'Currency', 'divi-plus' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'default'         => '$',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can input the currency symbol.', 'divi-plus' ),
			),
			'item_price'            => array(
				'label'           => esc_html__( 'Item Price', 'divi-plus' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'default'         => '10',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can input the item price.', 'divi-plus' ),
			),
			'item_thumbnail_option' => array(
				'label'           => esc_html__( 'Image/Icon as thumbnail', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'use_image' => esc_html__( 'Use Image', 'divi-plus' ),
					'use_icon'  => esc_html__( 'Use Icon', 'divi-plus' ),
				),
				'default'         => 'use_image',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can choose either to display Image or Icon as thumbnail.', 'divi-plus' ),
			),
			'item_thumbnail'        => array(
				'label'              => esc_html__( 'Item Thumbnail', 'divi-plus' ),
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'upload_button_text' => esc_attr__( 'Upload an image', 'divi-plus' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'divi-plus' ),
				'update_text'        => esc_attr__( 'Set As Image', 'divi-plus' ),
				'show_if'            => array(
					'item_thumbnail_option' => 'use_image',
				),
				'tab_slug'           => 'general',
				'toggle_slug'        => 'main_content',
				'description'        => esc_html__( 'Here you can add an item image.', 'divi-plus' ),
			),
			'item_thumbnail_alt'    => array(
				'label'           => esc_html__( 'Item Thumbnail Alt Text', 'divi-plus' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'dynamic_content' => 'text',
				'show_if'         => array(
					'item_thumbnail_option' => 'use_image',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can add an item image alt text.', 'divi-plus' ),
			),
			'icon'                  => array(
				'label'           => esc_html__( 'Icon', 'divi-plus' ),
				'type'            => 'select_icon',
				'option_category' => 'basic_option',
				'class'           => array(
					'et-pb-font-icon',
				),
				'show_if'         => array(
					'item_thumbnail_option' => 'use_icon',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Choose an icon to display.', 'divi-plus' ),
			),
			'content'               => array(
				'label'           => esc_html__( 'Item description', 'divi-plus' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can input short description for item.', 'divi-plus' ),
			),
			'icon_font_size'        => array(
				'label'           => esc_html__( 'Icon Font Size', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'font_option',
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '500',
					'step' => '1',
				),
				'mobile_options'  => true,
				'show_if'         => array(
					'item_thumbnail_option' => 'use_icon',
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'icon',
				'description'     => esc_html__( 'Control the size of the icon by increasing or decreasing the font size.', 'divi-plus' ),
			),
			'icon_color'            => array(
				'label'          => esc_html__( 'Icon Color', 'divi-plus' ),
				'type'           => 'color-alpha',
				'hover'          => 'tabs',
				'mobile_options' => true,
				'show_if'        => array(
					'item_thumbnail_option' => 'use_icon',
				),
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'icon',
				'description'    => esc_html__( 'Here you can define a custom color for your icon.', 'divi-plus' ),
			),
			'style_icon'            => array(
				'label'           => esc_html__( 'Style Icon', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'show_if'         => array(
					'item_thumbnail_option' => 'use_icon',
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'icon',
				'description'     => esc_html__( 'Here you can choose whether icon should display within a shape or not.', 'divi-plus' ),
			),
			'icon_shape'            => array(
				'label'           => esc_html__( 'Shape', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'               => array(
					'dipl_icon_shape_square'    => esc_html__( 'Square', 'divi-plus' ),
					'dipl_icon_shape_circle'    => esc_html__( 'Circle', 'divi-plus' ),
					'dipl_icon_shape_hexagon'   => esc_html__( 'Hexagon', 'divi-plus' ),
				),
				'show_if'         => array(
					'item_thumbnail_option' => 'use_icon',
					'style_icon'            => 'on',
				),
				'default'		  => 'dipl_icon_shape_square',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'icon',
				'description'     => esc_html__( 'Here you can choose shape to display icon within.', 'divi-plus' ),
			),
			'shape_bg_color'        => array(
				'label'        => esc_html__( 'Shape Background', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'show_if'      => array(
					'item_thumbnail_option' => 'use_icon',
					'style_icon'            => 'on',
				),
				'hover'        => 'tabs',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'icon',
				'description'  => esc_html__( 'Pick a color to be used for the icon shape.', 'divi-plus' ),
			),
		);

		return $fields;
	}

	public function render( $attrs, $content, $render_slug ) {
		global $dp_pl_parent_name_level, $dp_pl_parent_item_list_layout, $dp_pl_parent_icon_font_size;

		$item_list_layout      = '' === $dp_pl_parent_item_list_layout ? 'layout1' : $dp_pl_parent_item_list_layout;
		$item_thumbnail_alt    = $this->props['item_thumbnail_alt'];
		$name_level            = $this->props['name_level'];
		$item_thumbnail_option = esc_attr( $this->props['item_thumbnail_option'] );
		$icon                  = esc_attr( $this->props['icon'] );
		$icon_color_hover      = $this->get_hover_value( 'icon_color' );
		$style_icon            = esc_attr( $this->props['style_icon'] );
		$shape_bg_color        = esc_attr( $this->props['shape_bg_color'] );
		$shape_bg_color_hover  = $this->get_hover_value( 'shape_bg_color' );
		$name_level            = '' === $name_level && '' !== $dp_pl_parent_name_level ? $dp_pl_parent_name_level : $name_level;
		$processed_name_level  = et_pb_process_header_level( $name_level, 'h4' );
		$processed_name_level  = esc_html( $processed_name_level );
		$item_image_thumbnail  = '';
		$item_icon_thumbnail   = '';

		if ( '' === $this->props['item_name'] ) {
			return '';
		}

		$multi_view = et_pb_multi_view_options( $this );

		$item_name = $multi_view->render_element(
			array(
				'tag'      => esc_html( $processed_name_level ),
				'attrs'    => array(
					'class' => 'dipl_price_list_item_name',
				),
				'content'  => '{{item_name}}',
				'required' => 'item_name',
			)
		);

		if ( 'use_image' === $item_thumbnail_option ) {
			$item_image_thumbnail = $multi_view->render_element(
				array(
					'tag'      => 'img',
					'attrs'    => array(
						'src' => '{{item_thumbnail}}',
						'alt' => esc_attr( $item_thumbnail_alt ),
					),
					'required' => 'item_thumbnail',
				)
			);
		}

		if ( 'use_icon' === $item_thumbnail_option ) {
			$icon_shape 	= 'on' === $style_icon ? esc_attr( $this->props['icon_shape'] ) : '';
			$icon_classes	= implode(
				' ',
				array(
					'dipl_price_list_icon',
					'et-pb-icon',
					$icon_shape,
				)
			);
			$item_icon_thumbnail = $multi_view->render_element(
				array(
					'content' => '{{icon}}',
					'attrs'   => array(
						'class' => $icon_classes,
					),
					'required' => 'icon',
				)
			);

			if ( 'dipl_icon_shape_hexagon' === $icon_shape ) {
				$item_icon_thumbnail = sprintf(
					'<div class="dipl_icon_hexagon_wrapper">
						<div class="dipl_icon_hexagon_inner_wrap">
							<div class="dipl_icon_hexagon">%1$s</div>
						</div>
					</div>',
					$item_icon_thumbnail
				);
			}

			$icon_font_size = et_pb_responsive_options()->get_property_values( $this->props, 'icon_font_size' );
			$icon_font_size = array_merge( $dp_pl_parent_icon_font_size, array_filter( $icon_font_size ) );
			et_pb_responsive_options()->generate_responsive_css( $icon_font_size, "{$this->main_css_element} .dipl_price_list_icon", 'font-size', $render_slug, '', 'range' );
			
			$icon_color = et_pb_responsive_options()->get_property_values( $this->props, 'icon_color' );
			et_pb_responsive_options()->generate_responsive_css( $icon_color, "{$this->main_css_element} .dipl_price_list_icon", 'color', $render_slug, '', 'color' );

			if ( $icon_color_hover ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => "{$this->main_css_element}:hover .dipl_price_list_icon",
						'declaration' => sprintf(
							'color: %1$s;',
							esc_attr( $icon_color_hover )
						),
					)
				);
			}

			if ( 'on' === $style_icon ) {
				if ( $shape_bg_color ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => "{$this->main_css_element} .dipl_price_list_icon:not(.dipl_icon_shape_hexagon)",
							'declaration' => sprintf(
								'background-color: %1$s;',
								esc_attr( $shape_bg_color )
							),
						)
					);
					self::set_style(
						$render_slug,
						array(
							'selector'    => "{$this->main_css_element} .dipl_icon_hexagon",
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
							'selector'    => "{$this->main_css_element}:hover .dipl_price_list_icon:not(.dipl_icon_shape_hexagon)",
							'declaration' => sprintf(
								'background-color: %1$s;',
								esc_attr( $shape_bg_color_hover )
							),
						)
					);
					self::set_style(
						$render_slug,
						array(
							'selector'    => "{$this->main_css_element}:hover .dipl_icon_hexagon",
							'declaration' => sprintf(
								'background-color: %1$s;',
								esc_attr( $shape_bg_color_hover )
							),
						)
					);
				}
			}
			if ( class_exists( 'ET_Builder_Module_Helper_Style_Processor' ) && method_exists( 'ET_Builder_Module_Helper_Style_Processor', 'process_extended_icon' ) ) {
                $this->generate_styles(
                    array(
                        'utility_arg'    => 'icon_font_family',
                        'render_slug'    => $render_slug,
                        'base_attr_name' => 'icon',
                        'important'      => true,
                        'selector'       => "{$this->main_css_element} .dipl_price_list_icon",
                        'processor'      => array(
                            'ET_Builder_Module_Helper_Style_Processor',
                            'process_extended_icon',
                        ),
                    )
                );
            }
		}

		$item_price = $multi_view->render_element(
			array(
				'tag'      => 'span',
				'attrs'    => array(
					'class' => 'dipl_price_list_item_price',
				),
				'content'  => '{{item_price}}',
				'required' => 'item_price',
			)
		);

		$item_currency = $multi_view->render_element(
			array(
				'tag'      => 'span',
				'attrs'    => array(
					'class' => 'dipl_price_list_item_currency',
				),
				'content'  => '{{item_currency}}',
				'required' => 'item_currency',
			)
		);

		$item_desc = $multi_view->render_element(
			array(
				'tag'      => 'div',
				'attrs'    => array(
					'class' => 'dipl_price_list_item_description',
				),
				'content'  => '{{content}}',
				'required' => 'content',
			)
		);

		$item_inner_wrap = '';

		if ( file_exists( plugin_dir_path( __FILE__ ) . 'layouts/' . sanitize_file_name( $item_list_layout ) . '.php' ) ) {
			include( plugin_dir_path( __FILE__ ) . 'layouts/' . sanitize_file_name( $item_list_layout ) . '.php' );
		}

		$dipl_price_list_item_wrap = sprintf(
			'<div class="dipl_price_list_item_wrap">%1$s</div>',
			et_core_intentionally_unescaped( $item_inner_wrap, 'html' )
		);

		$file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        wp_enqueue_style( 'dipl-price-list-item-style', PLUGIN_PATH . 'includes/modules/PriceListItem/' . $file . '.min.css', array(), '1.0.0' );

		return et_core_intentionally_unescaped( $dipl_price_list_item_wrap, 'html' );
	}

	/**
	 * Filter multi view value.
	 *
	 * @since 3.27.1
	 *
	 * @see ET_Builder_Module_Helper_MultiViewOptions::filter_value
	 *
	 * @param mixed                                     $raw_value Props raw value.
	 * @param array                                     $args {
	 *                                         Context data.
	 *
	 *     @type string $context      Context param: content, attrs, visibility, classes.
	 *     @type string $name         Module options props name.
	 *     @type string $mode         Current data mode: desktop, hover, tablet, phone.
	 *     @type string $attr_key     Attribute key for attrs context data. Example: src, class, etc.
	 *     @type string $attr_sub_key Attribute sub key that availabe when passing attrs value as array such as styes. Example: padding-top, margin-botton, etc.
	 * }
	 * @param ET_Builder_Module_Helper_MultiViewOptions $multi_view Multiview object instance.
	 *
	 * @return mixed
	 */
	public function multi_view_filter_value( $raw_value, $args, $multi_view ) {
		$name = isset( $args['name'] ) ? $args['name'] : '';
		$mode = isset( $args['mode'] ) ? $args['mode'] : '';

		if ( $raw_value && 'icon' === $name ) {
			$processed_value = html_entity_decode( et_pb_process_font_icon( $raw_value ) );
			if ( '%%1%%' === $raw_value ) {
				$processed_value = '"';
			}

			return $processed_value;
		}

		$fields_need_escape = array(
			'button_text',
		);

		if ( $raw_value && in_array( $name, $fields_need_escape, true ) ) {
			return $this->_esc_attr( $multi_view->get_name_by_mode( $name, $mode ), 'none', $raw_value );
		}

		return $raw_value;
	}
}
$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
	$modules = explode( ',', $plugin_options['dipl-modules'] );
	if ( in_array( 'dipl_price_list', $modules ) ) {
		new DIPL_PriceListItem();
	}
} else {
	new DIPL_PriceListItem();
}
