<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2022 Elicus Technologies Private Limited
 * @version     1.9.5
 */
class DIPL_WooProductsCategories extends ET_Builder_Module {
	public $slug       = 'dipl_woo_products_categories';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name             = esc_html__( 'DP Woo Products Categories', 'divi-plus' );
		$this->main_css_element = '%%order_class%%';
		add_filter( 'et_builder_processed_range_value', array( $this, 'dipl_builder_processed_range_value' ), 10, 3 );
	}

	public function get_settings_modal_toggles() {
		return array(
			'general'  => array(
				'toggles' => array(
					'main_content'    => array(
						'title'    => esc_html__( 'Content', 'divi-plus' ),
					),
					'display_setting' => array(
						'title'    => esc_html__( 'Display', 'divi-plus' ),
					),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'title_text'  => array(
						'title' => esc_html__( 'Title', 'divi-plus' ),
					),
					'product_count' => array(
						'title' => esc_html__( 'Product Count', 'divi-plus' ),
					),
					'sale_badge' => array(
						'title' => esc_html__( 'Sale Badge', 'divi-plus' ),
					),
					'add_to_cart_button' => array (
						'title' => esc_html__( 'Add to Cart', 'divi-plus' ),
					),
				),
			),
		);
	}


	public function get_advanced_fields_config() {
		return array(
			'fonts' => array(
				'title' => array(
					'label'          => esc_html__( 'Title', 'divi-plus' ),
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
					'header_level'   => array(
						'default' => 'h4',
					),
					'text_align'     => array(
						'default' => 'center',
					),
					'css'            => array(
						'main'       => "{$this->main_css_element} .dipl_woo_product_category_name, {$this->main_css_element} .dipl_woo_product_category_name a",
					),
					'tab_slug'	=> 'advanced',
                    'toggle_slug' => 'title_text',
				),
				'product_count' => array(
					'label'          => esc_html__( 'Product Count', 'divi-plus' ),
					'font_size'      => array(
						'default'        => '16px',
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
					'text_align'     => array(
						'default' => 'center',
					),
					'css' => array(
						'main'  => "{$this->main_css_element} .dipl_woo_product_category_count, {$this->main_css_element} .dipl_woo_product_category_count a",
					),
					'tab_slug'	=> 'advanced',
                    'toggle_slug' => 'product_count',
				),
			),
			'borders' => array(
				'category' => array(
					'label_prefix'    => esc_html__( 'Product Category', 'divi-plus' ),
					'css' => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dipl_woo_product_category',
							'border_styles' => '%%order_class%% .dipl_woo_product_category',
							'important' => 'all',
						),
					),
				),
				'category_content_wrapper' => array(
					'label_prefix'    => esc_html__( 'Content Wrapper', 'divi-plus' ),
					'defaults' => array(
				        'border_radii' => 'on||||',
				        'border_styles' => array(
				            'width' => '1px',
				            'color' => '#333333',
							'style' => 'solid',
				        ),
				    ),
					'depends_on' => array( 'category_layout' ),
					'depends_show_if' => 'layout2',
					'css' => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .layout2 .dipl_woo_product_category_content_wrapper',
							'border_styles' => '%%order_class%% .layout2 .dipl_woo_product_category_content_wrapper',
							'important' => 'all',
						),
					),
				),
				'default' => array(
					'css' => array(
						'main' => array(
							'border_radii'  => $this->main_css_element,
							'border_styles' => $this->main_css_element,
						),
					),
				),
			),
			'box_shadow' => array(
				'product_category' => array(
					'label'       => esc_html__( 'Product Category', 'divi-plus' ),
					'css'         => array(
						'main' => "%%order_class%% .dipl_woo_product_category",
						'important' => 'all',
					),
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'box_shadow',
				),
				'default' => array(
					'css' => array(
						'main' => $this->main_css_element,
						'important' => 'all',
					),
				),
			),
			'background' => array(
				'css' => array(
					'main' => $this->main_css_element,
				),
			),
			'margin_padding' => array(
				'css' => array(
					'main'      => $this->main_css_element,
					'important' => 'all',
				),
			),
			'text' 			=> false,
			'filters'       => false,
			'link_options'  => false,
		);

	}

	public function get_fields() {
		return array_merge(
			array(
				'category_layout' => array(
	                'label'             => esc_html__( 'Layout', 'divi-plus' ),
	                'type'              => 'select',
	                'option_category'   => 'configuration',
	                'options'           => array(
	                    'layout1'	=> esc_html__( 'Layout 1', 'divi-plus' ),
	                    'layout2'   => esc_html__( 'Layout 2', 'divi-plus' ),
	                ),
	                'default'			=> 'layout1',
	                'default_on_front'	=> 'layout1',
	                'tab_slug'          => 'general',
	                'toggle_slug'       => 'main_content',
	                'description'       => esc_html__( 'Here you can select the layout to display categories.', 'divi-plus' ),
	                'computed_affects' => array(
						'__products_data',
					),
	            ),
				'include_categories' => array(
					'label'            => esc_html__( 'Include Categories', 'divi-plus' ),
					'type'             => 'categories',
					'renderer_options' => array(
						'use_terms' => true,
						'term_name' => 'product_cat',
						'field_name' => 'et_pb_include_dipl_product_cat',
					),
					'tab_slug'         => 'general',
					'toggle_slug'      => 'main_content',
					'description'      => esc_html__( 'Select Categories. If no category is selected, all categories will be displayed.', 'divi-plus' ),
					'computed_affects' => array(
						'__products_data',
					),
				),
				'order_by' => array(
					'label'            => esc_html__( 'Order by', 'divi-plus' ),
					'type'             => 'select',
					'option_category'  => 'configuration',
					'options'          => array(
						'name'     		=> esc_html__( 'Name', 'divi-plus' ),
						'slug'      	=> esc_html__( 'Slug', 'divi-plus' ),
						'term_id'   	=> esc_html__( 'Term Id', 'divi-plus' ),
						'count'			=> esc_html__( 'Count', 'divi-plus' ),
						'menu_order'	=> esc_html__( 'Menu Order', 'divi-plus' ),
					),
					'default'          => 'name',
					'tab_slug'         => 'general',
					'toggle_slug'      => 'main_content',
					'description'      => esc_html__( 'Here you can specify the order in which the categories will be displayed.', 'divi-plus' ),
					'computed_affects' => array(
						'__products_data',
					),
				),
				'order' => array(
					'label'            => esc_html__( 'Order', 'divi-plus' ),
					'type'             => 'select',
					'option_category'  => 'configuration',
					'options'          => array(
						'DESC' => esc_html__( 'DESC', 'divi-plus' ),
						'ASC'  => esc_html__( 'ASC', 'divi-plus' ),
					),
					'default'          => 'ASC',
					'tab_slug'         => 'general',
					'toggle_slug'      => 'main_content',
					'description'      => esc_html__( 'Here you can specify the sorting order for the categories.', 'divi-plus' ),
					'computed_affects' => array(
						'__products_data',
					),
				),
				'no_result_text' => array(
					'label'            => esc_html__( 'No Result Text', 'divi-plus' ),
					'type'             => 'text',
					'option_category'  => 'configuration',
					'default'		   => esc_html__( 'The categories you requested could not be found. Try changing your module settings or create some new categories.', 'divi-plus' ),
					'tab_slug'         => 'general',
					'toggle_slug'      => 'main_content',
					'description'      => esc_html__( 'Here you can define custom no result text.', 'divi-plus' ),
				),
				'number_of_columns' => array(
	                'label'             => esc_html__( 'Number Of Columns', 'divi-plus' ),
	                'type'              => 'select',
	                'option_category'   => 'configuration',
	                'options'           => array(
	                    '1'         => esc_html( '1' ),
	                    '2'         => esc_html( '2' ),
	                    '3'         => esc_html( '3' ),
	                    '4'			=> esc_html( '4' ),
	                    '5'			=> esc_html( '5' ),
	                    '6'			=> esc_html( '6' ),
	                ),
	                'mobile_options'	=> true,
	                'default'			=> '4',
	                'default_on_front'	=> '4',
	                'tab_slug'          => 'general',
	                'toggle_slug'       => 'display_setting',
	                'description'       => esc_html__( 'Here you can select the number of columns to display categories.', 'divi-plus' ),
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
					'toggle_slug'     	=> 'display_setting',
					'description'       => esc_html__( 'Increase or decrease spacing between columns.', 'divi-plus' ),
	            ),
	            'use_masonry' => array(
					'label'            => esc_html__( 'Enable Masonry', 'divi-plus' ),
					'type'             => 'yes_no_button',
					'option_category'  => 'configuration',
					'options'          => array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'default'          => 'off',
					'default_on_front' => 'off',
					'tab_slug'         => 'general',
					'toggle_slug'      => 'display_setting',
					'description'      => esc_html__( 'Enable Masonry for categories.', 'divi-plus' ),
					'computed_affects' => array(
						'__products_data',
					),
				),
				'show_thumbnail' => array(
					'label'           => esc_html__( 'Show Thumbnail', 'divi-plus' ),
					'type'            => 'yes_no_button',
					'option_category' => 'configuration',
					'options'         => array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'default'         => 'on',
					'tab_slug'        => 'general',
					'toggle_slug'     => 'display_setting',
					'description'     => esc_html__( 'Choose whether or not the product thumbnail should be visible.', 'divi-plus' ),
					'computed_affects' => array(
						'__products_data',
					),
				),
				'thumbnail_size' => array(
					'label'            => esc_html__( 'Thumbnail Size', 'divi-plus' ),
					'type'             => 'select',
					'option_category'  => 'configuration',
					'options'          => array(
						'woocommerce_thumbnail'	=> esc_html__( 'Woocommerce Thumbnail', 'divi-plus' ),
						'woocommerce_single'	=> esc_html__( 'Woocommerce Single', 'divi-plus' ),
					),
					'default'          => 'woocommerce_thumbnail',
					'default_on_front' => 'woocommerce_thumbnail',
					'show_if'      	   => array(
						'show_thumbnail' => 'on',
					),
					'tab_slug'         => 'general',
					'toggle_slug'      => 'display_setting',
					'description'      => esc_html__( 'Here you can specify the size of category image.', 'divi-plus' ),
					'computed_affects' => array(
						'__products_data',
					),
				),
				'show_product_count' => array(
					'label'           => esc_html__( 'Show Product Count', 'divi-plus' ),
					'type'            => 'yes_no_button',
					'option_category' => 'configuration',
					'options'         => array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'default'         => 'on',
					'tab_slug'        => 'general',
					'toggle_slug'     => 'display_setting',
					'description'     => esc_html__( 'Choose whether or not the product count should be visible.', 'divi-plus' ),
					'computed_affects' => array(
						'__products_data',
					),
				),
				'show_content_on_hover' => array(
					'label'           => esc_html__( 'Show Content on Hover', 'divi-plus' ),
					'type'            => 'yes_no_button',
					'option_category' => 'configuration',
					'options'         => array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'show_if' 		  => array(
						'category_layout' => 'layout2',
					),
					'default'         => 'off',
					'tab_slug'        => 'general',
					'toggle_slug'     => 'display_setting',
					'description'     => esc_html__( 'Choose whether or not the content should show on hover.', 'divi-plus' ),
				),
				'category_content_bg_color' => array(
	                'label'                 => esc_html__( 'Category Content Background', 'divi-plus' ),
	                'type'                  => 'background-field',
	                'base_name'             => 'category_content_bg',
	                'context'               => 'category_content_bg_color',
	                'option_category'       => 'button',
	                'custom_color'          => true,
	                'background_fields'     => $this->generate_background_options( 'category_content_bg', 'button', 'general', 'background', 'category_content_bg_color' ),
	                'hover'                 => 'tabs',
	                'tab_slug'              => 'general',
	                'toggle_slug'           => 'background',
	                'description'           => esc_html__( 'Customize the background style of the product by adjusting the background color, gradient, and image.', 'divi-plus' ),
	            ),
				'__products_data' => array(
					'type'                => 'computed',
					'computed_callback'   => array( 'DIPL_WooProductsCategories', 'get_products_data' ),
					'computed_depends_on' => array(
						'category_layout',
						'include_categories',
						'order_by',
						'order',
						'use_masonry',
						'show_thumbnail',
						'thumbnail_size',
						'show_product_count',
						'title_level',
					),
				),
			),
			$this->generate_background_options( 'category_content_bg', 'skip', 'general', 'background', 'category_content_bg_color' )
		);
	}

	/**
	 * This function return values to react for front end builder.
	 *
	 * @param array arguments to get products data
	 * @return array
	 * */
	public static function get_products_data( $args = array(), $conditional_tags = array(), $current_page = array() ) {
		
		$defaults = array(
			'category_layout' => 'layout1',
			'include_categories' => '',
			'order_by' => 'name',
			'order'	=> 'ASC',
			'use_masonry' => 'off',
			'show_thumbnail' => 'on',
			'thumbnail_size' => 'woocommerce_thumbnail',
			'show_product_count' => 'on',
			'title_level' => 'h4',
		);

		$args = wp_parse_args( $args, $defaults );

		foreach ( $defaults as $key => $default ) {
			${$key} = sanitize_text_field( et_()->array_get( $args, $key, $default ) );
		}

		$processed_title_level 	= et_pb_process_header_level( $title_level, 'h4' );
		$processed_title_level	= esc_html( $processed_title_level );

		$cat_args = array(
		    'orderby'    => $order_by,
		    'order'      => $order,
		    'include'    => $include_categories,
		    'hide_empty' => true,
		);

		$product_categories = get_terms( 'product_cat', $cat_args );

		if ( $product_categories && ! is_wp_error( $product_categories ) ) {

			$output = sprintf(
				'<div class="dipl_woo_products_category_layout %1$s">',
				esc_attr( $category_layout )
			);

			if ( 'on' === $use_masonry ) {
				$output .= '<div class="dipl_woo_products_category_isotope_container">';
				$output .= '<div class="dipl_woo_products_category_isotope_item_gutter"></div>';
			}

			foreach( $product_categories as $product_category ) {
				
				$output .= '<div class="dipl_woo_products_category_isotope_item">';

				include plugin_dir_path( __FILE__ ) . 'layouts/' . sanitize_file_name( $category_layout ) . '.php';

				$output .= '</div>';
			}

			if ( 'on' === $use_masonry ) {
				$output .= '</div>';
			}

			$output .= '</div>';

		} else {
			$output = '';
		}

		return et_core_intentionally_unescaped( $output, 'html' );
	}

	public function render( $attrs, $content, $render_slug ) {

		$category_layout 					= $this->props['category_layout'];
		$include_categories 				= $this->props['include_categories'];
		$order_by 							= $this->props['order_by'];
		$order 								= $this->props['order'];
		$no_result_text						= $this->props['no_result_text'];
		$number_of_columns 					= $this->props['number_of_columns'];
		$column_spacing						= $this->props['column_spacing'];
		$use_masonry						= $this->props['use_masonry'];
		$show_thumbnail						= $this->props['show_thumbnail'];
		$thumbnail_size						= $this->props['thumbnail_size'];
		$show_product_count 				= $this->props['show_product_count'];
		$show_content_on_hover				= $this->props['show_content_on_hover'];
		$title_level						= $this->props['title_level'];
		$processed_title_level 				= et_pb_process_header_level( $title_level, 'h4' );
		$processed_title_level				= esc_html( $processed_title_level );

		wp_enqueue_script( 'dipl-woo-products-categories-custom', PLUGIN_PATH . 'includes/modules/WooProductsCategories/dipl-woo-products-categories-custom.min.js', array('jquery'), '1.0.0', true );
		$file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        wp_enqueue_style( 'dipl-woo-products-categories-style', PLUGIN_PATH . 'includes/modules/WooProductsCategories/' . $file . '.min.css', array(), '1.0.0' );

		$cat_args = array(
		    'orderby'    => sanitize_text_field( $order_by ),
		    'order'      => sanitize_text_field( $order ),
		    'include'    => sanitize_text_field( $include_categories ),
		    'hide_empty' => true,
		);

		$product_categories = get_terms( 'product_cat', $cat_args );

		if ( $product_categories && ! is_wp_error( $product_categories ) ) {

			$output = sprintf(
				'<div class="dipl_woo_products_category_layout %1$s">',
				esc_attr( $category_layout )
			);

			if ( 'on' === $use_masonry ) {
				wp_enqueue_script( 'elicus-images-loaded-script' );
				wp_enqueue_script( 'elicus-isotope-script' );

				$output .= '<div class="dipl_woo_products_category_isotope_container">';
				$output .= '<div class="dipl_woo_products_category_isotope_item_gutter"></div>';
			}

			foreach( $product_categories as $product_category ) {
				
				$output .= '<div class="dipl_woo_products_category_isotope_item">';

				include plugin_dir_path( __FILE__ ) . 'layouts/' . sanitize_file_name( $category_layout ) . '.php';

				$output .= '</div>';
			}

			if ( 'on' === $use_masonry ) {
				$output .= '</div>';
			}

			$output .= '</div>';

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

			et_pb_responsive_options()->generate_responsive_css( $width, '%%order_class%% .dipl_woo_products_category_isotope_item', 'width', $render_slug, '', 'range' );
			et_pb_responsive_options()->generate_responsive_css( $column_spacing, '%%order_class%% .dipl_woo_products_category_isotope_item', array( 'margin-bottom' ), $render_slug, '', 'range' );

			if ( 'on' === $use_masonry ) {
				et_pb_responsive_options()->generate_responsive_css( $column_spacing, '%%order_class%% .dipl_woo_products_category_isotope_item_gutter', 'width', $render_slug, '', 'range' );
			} else {
				foreach ( $number_of_columns as $device => $cols ) {
					if ( 'desktop' === $device ) {
						self::set_style( $render_slug, array(
		                    'selector'    => '%%order_class%% .dipl_woo_products_category_isotope_item:not(:nth-child(' . absint( $cols ) . 'n+' . absint( $cols ) . '))',
		                    'declaration' => sprintf( 'margin-right: %1$s;', esc_attr( $column_spacing['desktop'] ) ),
		                    'media_query' => self::get_media_query( 'min_width_981' ),
		                ) );
		                if ( '' !== $cols ) {
							self::set_style( $render_slug, array(
			                    'selector'    => '%%order_class%% .dipl_woo_products_category_isotope_item:nth-child(' . absint( $cols ) . 'n+1)',
			                    'declaration' => 'clear: left;',
			                    'media_query' => self::get_media_query( 'min_width_981' ),
			                ) );
						}
					} else if ( 'tablet' === $device ) {
						self::set_style( $render_slug, array(
		                    'selector'    => '%%order_class%% .dipl_woo_products_category_isotope_item:not(:nth-child(' . absint( $cols ) . 'n+' . absint( $cols ) . '))',
		                    'declaration' => sprintf( 'margin-right: %1$s;', esc_attr( $column_spacing['tablet'] ) ),
		                    'media_query' => self::get_media_query( '768_980' ),
		                ) );
		                if ( '' !== $cols ) {
							self::set_style( $render_slug, array(
			                    'selector'    => '%%order_class%% .dipl_woo_products_category_isotope_item:nth-child(' . absint( $cols ) . 'n+1)',
			                    'declaration' => 'clear: left;',
			                    'media_query' => self::get_media_query( '768_980' ),
			                ) );
						}
					} else if ( 'phone' === $device ) {
						self::set_style( $render_slug, array(
		                    'selector'    => '%%order_class%% .dipl_woo_products_category_isotope_item:not(:nth-child(' . absint( $cols ) . 'n+' . absint( $cols ) . '))',
		                    'declaration' => sprintf( 'margin-right: %1$s;', esc_attr( $column_spacing['phone'] ) ),
		                    'media_query' => self::get_media_query( 'max_width_767' ),
		                ) );
		                if ( '' !== $cols ) {
							self::set_style( $render_slug, array(
			                    'selector'    => '%%order_class%% .dipl_woo_products_category_isotope_item:nth-child(' . absint( $cols ) . 'n+1)',
			                    'declaration' => 'clear: left;',
			                    'media_query' => self::get_media_query( 'max_width_767' ),
			                ) );
						}
					}
				}
			}



			if ( 'layout2' === $category_layout && 'on' === $show_content_on_hover ) {
				self::set_style( $render_slug, array(
                    'selector'    => '%%order_class%% .layout2 .dipl_woo_product_category_content',
                    'declaration' => 'visibility: hidden; opacity: 0; transform: translateY(15px); transition: all 500ms cubic-bezier(0.39, 0.58, 0.57, 1);',
                    'media_query' => self::get_media_query( 'min_width_981' ),
                ) );

                self::set_style( $render_slug, array(
                    'selector'    => '%%order_class%% .layout2 .dipl_woo_product_category:hover .dipl_woo_product_category_content',
                    'declaration' => 'visibility: visible; opacity: 1; transform: translateY(0);',
                    'media_query' => self::get_media_query( 'min_width_981' ),
                ) );
			}

			$options = array(
				'normal' => array(
					'category_content_bg' => "{$this->main_css_element} .dipl_woo_product_category_content",
				),
				'hover' => array(
					'category_content_bg' => "{$this->main_css_element}:hover .dipl_woo_product_category_content",
				),
			);

			$this->process_custom_background( $render_slug, $options );

		} else {
			$output = '<div class="entry">' . esc_html( $no_result_text ) . '</div>';
		}
		
		return et_core_intentionally_unescaped( $output, 'html' );
	}

	public function dipl_builder_processed_range_value( $result, $range, $range_string ) {
		if ( false !== strpos( $result, '0calc' ) ) {
			return $range;
		}
		return $result;
	}

	public function process_custom_background( $function_name, $options ) {

		$normal_fields = $options['normal'];

		foreach ( $normal_fields as $option_name => $element ) {

			$css_element           = $element;
			$css_element_processed = $element;

			if ( is_array( $element ) ) {
				$css_element_processed = implode( ', ', $element );
			}

			// Place to store processed background. It will be compared with the smaller device
			// background processed value to avoid rendering the same styles.
			$processed_background_color = '';
			$processed_background_image = '';
			$processed_background_blend = '';

			// Store background images status because the process is extensive.
			$background_image_status = array(
				'desktop' => false,
				'tablet'  => false,
				'phone'   => false,
			);

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
				if ( ! $is_desktop && ! et_pb_responsive_options()->is_responsive_enabled( $this->props, "{$option_name}_color" ) ) {
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

		if ( isset( $options['hover'] ) ) {
			$hover_fields = $options['hover'];
		} else {
			$hover_fields = $options['normal'];
			foreach ( $hover_fields as &$value ) {
				$value = $value . ':hover';
			}
		}

		foreach ( $hover_fields as $option_name => $element ) {

			$css_element           = $element;
			$css_element_processed = $element;

			if ( is_array( $element ) ) {
				$css_element_processed = implode( ', ', $element );
			}

			// Background Hover.
			if ( et_builder_is_hover_enabled( "{$option_name}_color", $this->props ) ) {

				$background_base_name    = $option_name;
				$background_prefix       = "{$option_name}_";
				$background_images_hover = array();
				$background_hover_style  = '';

				$has_background_color_gradient_hover         = false;
				$has_background_image_hover                  = false;
				$has_background_gradient_and_image_hover     = false;
				$is_background_color_gradient_hover_disabled = false;
				$is_background_image_hover_disabled          = false;

				$background_color_gradient_overlays_image_desktop = et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_overlays_image", 'off', true );

				$gradient_properties_desktop = array(
					'type'             => et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_type", '', true ),
					'direction'        => et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_direction", '', true ),
					'radial_direction' => et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_direction_radial", '', true ),
					'color_start'      => et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_start", '', true ),
					'color_end'        => et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_end", '', true ),
					'start_position'   => et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_start_position", '', true ),
					'end_position'     => et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_end_position", '', true ),
				);

				$background_color_gradient_overlays_image_hover = 'off';

				// Background Gradient Hover.
				// This part is little bit different compared to other hover implementation. In
				// this case, hover is enabled on the background field, not on the each of those
				// fields. So, built in function get_value() doesn't work in this case.
				// Temporarily, we need to fetch the the value from get_raw_value().
				$use_background_color_gradient_hover = et_pb_responsive_options()->get_inheritance_background_value( $this->props, "{$background_prefix}use_color_gradient", 'hover', $background_base_name, $this->fields_unprocessed );

				if ( 'on' === $use_background_color_gradient_hover ) {
					// Desktop value as default.
					$background_color_gradient_type_desktop             = ET_Builder_Element::$_->array_get( $gradient_properties_desktop, 'type', '' );
					$background_color_gradient_direction_desktop        = ET_Builder_Element::$_->array_get( $gradient_properties_desktop, 'direction', '' );
					$background_color_gradient_radial_direction_desktop = ET_Builder_Element::$_->array_get( $gradient_properties_desktop, 'radial_direction', '' );
					$background_color_gradient_color_start_desktop      = ET_Builder_Element::$_->array_get( $gradient_properties_desktop, 'color_start', '' );
					$background_color_gradient_color_end_desktop        = ET_Builder_Element::$_->array_get( $gradient_properties_desktop, 'color_end', '' );
					$background_color_gradient_start_position_desktop   = ET_Builder_Element::$_->array_get( $gradient_properties_desktop, 'start_position', '' );
					$background_color_gradient_end_position_desktop     = ET_Builder_Element::$_->array_get( $gradient_properties_desktop, 'end_position', '' );

					// Hover value.
					$background_color_gradient_type_hover             = et_pb_hover_options()->get_raw_value( "{$background_prefix}color_gradient_type", $this->props, $background_color_gradient_type_desktop );
					$background_color_gradient_direction_hover        = et_pb_hover_options()->get_raw_value( "{$background_prefix}color_gradient_direction", $this->props, $background_color_gradient_direction_desktop );
					$background_color_gradient_direction_radial_hover = et_pb_hover_options()->get_raw_value( "{$background_prefix}color_gradient_direction_radial", $this->props, $background_color_gradient_radial_direction_desktop );
					$background_color_gradient_start_hover            = et_pb_hover_options()->get_raw_value( "{$background_prefix}color_gradient_start", $this->props, $background_color_gradient_color_start_desktop );
					$background_color_gradient_end_hover              = et_pb_hover_options()->get_raw_value( "{$background_prefix}color_gradient_end", $this->props, $background_color_gradient_color_end_desktop );
					$background_color_gradient_start_position_hover   = et_pb_hover_options()->get_raw_value( "{$background_prefix}color_gradient_start_position", $this->props, $background_color_gradient_start_position_desktop );
					$background_color_gradient_end_position_hover     = et_pb_hover_options()->get_raw_value( "{$background_prefix}color_gradient_end_position", $this->props, $background_color_gradient_end_position_desktop );
					$background_color_gradient_overlays_image_hover   = et_pb_hover_options()->get_raw_value( "{$background_prefix}color_gradient_overlays_image", $this->props, $background_color_gradient_overlays_image_desktop );

					$has_background_color_gradient_hover = true;

					$gradient_values_hover = array(
						'type'             => '' !== $background_color_gradient_type_hover ? $background_color_gradient_type_hover : $background_color_gradient_type_desktop,
						'direction'        => '' !== $background_color_gradient_direction_hover ? $background_color_gradient_direction_hover : $background_color_gradient_direction_desktop,
						'radial_direction' => '' !== $background_color_gradient_direction_radial_hover ? $background_color_gradient_direction_radial_hover : $background_color_gradient_radial_direction_desktop,
						'color_start'      => '' !== $background_color_gradient_start_hover ? $background_color_gradient_start_hover : $background_color_gradient_color_start_desktop,
						'color_end'        => '' !== $background_color_gradient_end_hover ? $background_color_gradient_end_hover : $background_color_gradient_color_end_desktop,
						'start_position'   => '' !== $background_color_gradient_start_position_hover ? $background_color_gradient_start_position_hover : $background_color_gradient_start_position_desktop,
						'end_position'     => '' !== $background_color_gradient_end_position_hover ? $background_color_gradient_end_position_hover : $background_color_gradient_end_position_desktop,
					);

					$background_images_hover[] = $this->get_gradient( $gradient_values_hover );
				} elseif ( 'off' === $use_background_color_gradient_hover ) {
					$is_background_color_gradient_hover_disabled = true;
				}

				// Background Image Hover.
				// This part is little bit different compared to other hover implementation. In
				// this case, hover is enabled on the background field, not on the each of those
				// fields. So, built in function get_value() doesn't work in this case.
				// Temporarily, we need to fetch the the value from get_raw_value().
				$background_image_hover = et_pb_responsive_options()->get_inheritance_background_value( $this->props, "{$background_prefix}image", 'hover', $background_base_name, $this->fields_unprocessed );
				$parallax_hover         = et_pb_hover_options()->get_raw_value( "{$background_prefix}parallax", $this->props );

				if ( '' !== $background_image_hover && null !== $background_image_hover && 'on' !== $parallax_hover ) {
					// Flag to inform BG Color if current module has Image.
					$has_background_image_hover = true;

					// Size.
					$background_size_hover   = et_pb_hover_options()->get_raw_value( "{$background_prefix}size", $this->props );
					$background_size_desktop = ET_Builder_Element::$_->array_get( $this->props, "{$background_prefix}size", '' );
					$is_same_background_size = $background_size_hover === $background_size_desktop;
					if ( empty( $background_size_hover ) && ! empty( $background_size_desktop ) ) {
						$background_size_hover = $background_size_desktop;
					}

					if ( ! empty( $background_size_hover ) && ! $is_same_background_size ) {
						$background_hover_style .= sprintf(
							'background-size: %1$s; ',
							esc_html( $background_size_hover )
						);
					}

					// Position.
					$background_position_hover   = et_pb_hover_options()->get_raw_value( "{$background_prefix}position", $this->props );
					$background_position_desktop = ET_Builder_Element::$_->array_get( $this->props, "{$background_prefix}position", '' );
					$is_same_background_position = $background_position_hover === $background_position_desktop;
					if ( empty( $background_position_hover ) && ! empty( $background_position_desktop ) ) {
						$background_position_hover = $background_position_desktop;
					}

					if ( ! empty( $background_position_hover ) && ! $is_same_background_position ) {
						$background_hover_style .= sprintf(
							'background-position: %1$s; ',
							esc_html( str_replace( '_', ' ', $background_position_hover ) )
						);
					}

					// Repeat.
					$background_repeat_hover   = et_pb_hover_options()->get_raw_value( "{$background_prefix}repeat", $this->props );
					$background_repeat_desktop = ET_Builder_Element::$_->array_get( $this->props, "{$background_prefix}repeat", '' );
					$is_same_background_repeat = $background_repeat_hover === $background_repeat_desktop;
					if ( empty( $background_repeat_hover ) && ! empty( $background_repeat_desktop ) ) {
						$background_repeat_hover = $background_repeat_desktop;
					}

					if ( ! empty( $background_repeat_hover ) && ! $is_same_background_repeat ) {
						$background_hover_style .= sprintf(
							'background-repeat: %1$s; ',
							esc_html( $background_repeat_hover )
						);
					}

					// Blend.
					$background_blend_hover   = et_pb_hover_options()->get_raw_value( "{$background_prefix}blend", $this->props );
					$background_blend_default = ET_Builder_Element::$_->array_get( $this->fields_unprocessed, "{$background_prefix}blend.default", '' );
					$background_blend_desktop = ET_Builder_Element::$_->array_get( $this->props, "{$background_prefix}blend", '' );
					$is_same_background_blend = $background_blend_hover === $background_blend_desktop;
					if ( empty( $background_blend_hover ) && ! empty( $background_blend_desktop ) ) {
						$background_blend_hover = $background_blend_desktop;
					}

					if ( ! empty( $background_blend_hover ) ) {
						if ( ! $is_same_background_blend ) {
							$background_hover_style .= sprintf(
								'background-blend-mode: %1$s; ',
								esc_html( $background_blend_hover )
							);
						}

						// Force background-color: initial.
						if ( $has_background_color_gradient_hover && $has_background_image_hover && $background_blend_hover !== $background_blend_default ) {
							$has_background_gradient_and_image_hover = true;
							$background_hover_style                 .= 'background-color: initial !important;';
						}
					}

					// Only append background image when the image exists.
					$background_images_hover[] = sprintf( 'url(%1$s)', esc_html( $background_image_hover ) );
				} elseif ( '' === $background_image_hover ) {
					$is_background_image_hover_disabled = true;
				}

				if ( ! empty( $background_images_hover ) ) {
					// The browsers stack the images in the opposite order to what you'd expect.
					if ( 'on' !== $background_color_gradient_overlays_image_hover ) {
						$background_images_hover = array_reverse( $background_images_hover );
					}

					$background_hover_style .= sprintf(
						'background-image: %1$s !important;',
						esc_html( join( ', ', $background_images_hover ) )
					);
				} elseif ( $is_background_color_gradient_hover_disabled && $is_background_image_hover_disabled ) {
					$background_hover_style .= 'background-image: initial !important;';
				}

				// Background Color Hover.
				if ( ! $has_background_gradient_and_image_hover ) {
					$background_color_hover = et_pb_responsive_options()->get_inheritance_background_value( $this->props, "{$background_prefix}color", 'hover', $background_base_name, $this->fields_unprocessed );
					$background_color_hover = '' !== $background_color_hover ? $background_color_hover : 'transparent';

					if ( '' !== $background_color_hover ) {
						$background_hover_style .= sprintf(
							'background-color: %1$s !important; ',
							esc_html( $background_color_hover )
						);
					}
				}

				// Print background hover gradient and image styles.
				if ( '' !== $background_hover_style ) {
					$background_hover_style_attrs = array(
						'selector'    => $css_element_processed,
						'declaration' => rtrim( $background_hover_style ),
						'priority'    => $this->_style_priority,
					);

					ET_Builder_Element::set_style( $function_name, $background_hover_style_attrs );
				}
			}
		}
	}
}
$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
	$modules = explode( ',', $plugin_options['dipl-modules'] );
	if (
		in_array( 'dipl_woo_products_categories', $modules, true ) &&
		et_is_woocommerce_plugin_active()
	) {
		new DIPL_WooProductsCategories();
	}
} else {
	if ( et_is_woocommerce_plugin_active() ) {
		new DIPL_WooProductsCategories();
	}
}