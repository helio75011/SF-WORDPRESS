<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.5
 */
class DIPL_HotSpotItem extends ET_Builder_Module {

	public $slug       = 'dipl_hotspot_item';
	public $type       = 'child';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name                        = esc_html__( 'DP Hotspot Marker', 'divi-plus' );
		$this->child_title_var 			   = 'marker_admin_label';
		$this->settings_text               = esc_html__( 'Marker Settings', 'divi-plus' );
		$this->advanced_setting_title_text = esc_html__( 'Hotspot Marker', 'divi-plus' );
	}

	public function get_settings_modal_toggles() {
		return array(
			'general'  => array(
				'toggles' => array(
					'marker_content'  => esc_html__( 'Marker Content', 'divi-plus' ),
					'tooltip_content' => esc_html__( 'Tooltip Content', 'divi-plus' ),
					'marker_admin_label' => esc_html__( 'Admin Label', 'divi-plus' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'single_marker_styling'         => array(
						'title'    => esc_html__( 'Marker Styling', 'divi-plus' ),
						'priority' => 1,
					),
					'single_marker_element_styling' => array(
						'title'    => esc_html__( 'Marker Element Styling', 'divi-plus' ),
						'priority' => 2,
					),
					'single_marker_text_settings'   => array(
						'title'    => esc_html__( 'Marker Text', 'divi-plus' ),
						'priority' => 3,
					),
				),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts'          => array(
				'single_marker_text_settings' => array(
					'label'          => esc_html__( 'Marker', 'divi-plus' ),
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
						'main' => '.dipl_hotspot .dipl_hotspot_wrapper %%order_class%% .dipl_text_marker',
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'single_marker_text_settings',
				),
			),
			'borders'        => array(
				'single_marker_image_border' => array(
					'css'             => array(
						'main' => array(
							'border_radii'  => '.dipl_hotspot %%order_class%% .dipl_image_marker img',
							'border_styles' => '.dipl_hotspot %%order_class%% .dipl_image_marker img',
						),
					),
					'depends_on'      => array( 'marker_type' ),
					'depends_show_if' => 'image',
					'label_prefix'    => esc_html__( 'Marker Image', 'divi-plus' ),
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'single_marker_element_styling',
				),
			),
			'box_shadow'     => array(
				'default' => array(
					'css' => array(
						'main' => '%%order_class%%.dipl_hotspot_item',
					),
				),
			),
			'margin_padding' => array(
				'use_margin' => false,
				'css'        => array(
					'main'      => '%%order_class%%.dipl_hotspot_item',
					'important' => 'all',
				),
			),
			'background'     => false,
			'max_width'      => false,
			'height'         => false,
			'text'           => false,
			'transform'      => false,
		);
	}

	public function get_fields() {
		$et_accent_color = et_builder_accent_color();
		$layouts[-1] = 'Select Layout';
		$args = array( 
					'post_type' => 'et_pb_layout',
    				'post_status' => 'publish', 
    				'posts_per_page' => -1
    			);
		$query = new WP_Query($args);

		while ($query->have_posts()) {
		    $query->the_post();
		    
		    $post_id = get_the_ID();
		    $post_title = get_the_title();
		    $layouts[$post_id] = $post_title;
		}
		wp_reset_postdata();

		return array(
			'marker_admin_label'                              => array(
				'label'           => esc_html__( 'Marker Admin Label', 'divi-plus' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'marker_admin_label',
				'description'     => esc_html__( 'Here you can input the text to be used for the hotspot marker admin label. ', 'divi-plus' ),
			),
			'marker_type'                              => array(
				'label'           => esc_html__( 'Marker Type', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'basic_option',
				'options'         => array(
					'icon'  => esc_html__( 'Icon', 'divi-plus' ),
					'text'  => esc_html__( 'Text', 'divi-plus' ),
					'image' => esc_html__( 'Image', 'divi-plus' ),
				),
				'default'         => 'icon',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'marker_content',
				'description'     => esc_html__( 'Choose the marker type to be used for the hotspot.', 'divi-plus' ),
			),
			'marker_icon'                              => array(
				'label'           => esc_html__( 'Marker Icon', 'divi-plus' ),
				'type'            => 'select_icon',
				'option_category' => 'basic_option',
				'class'           => array(
					'et-pb-font-icon',
				),
				'show_if'         => array(
					'marker_type' => 'icon',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'marker_content',
				'description'     => esc_html__( 'Here you can select the icon to be used for the hotspot icon marker.', 'divi-plus' ),
			),
			'marker_text'                              => array(
				'label'           => esc_html__( 'Marker Text', 'divi-plus' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'show_if'         => array(
					'marker_type' => 'text',
				),
				'dynamic_content' 	 => 'text',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'marker_content',
				'description'     => esc_html__( 'Here you can input the text to be used for the hotspot text marker. ', 'divi-plus' ),
			),
			'marker_image'                             => array(
				'label'              => esc_html__( 'Marker Image', 'divi-plus' ),
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'show_if'            => array(
					'marker_type' => 'image',
				),
				'upload_button_text' => esc_attr__( 'Upload an image', 'divi-plus' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'divi-plus' ),
				'update_text'        => esc_attr__( 'Set As Image', 'divi-plus' ),
				'dynamic_content' 	 => 'image',
				'tab_slug'           => 'general',
				'toggle_slug'        => 'marker_content',
				'description'        => esc_html__( 'Here you can add an image to be used for the hotspot image marker.', 'divi-plus' ),
			),
			'tooltip_content_type'                                  => array(
				'label'           => esc_html__( 'Tooltip Content Type', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'text'      => esc_html__( 'Text', 'divi-plus' ),
					'layout' 	=> esc_html__( 'Library Layout', 'divi-plus' ),
				),
				'default'         => 'text',
				'dynamic_content' => 'text',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'tooltip_content',
				'description'     => esc_html__( 'Here you can select the content type.', 'divi-plus' ),
			),
			'content'                                  => array(
				'label'           => esc_html__( 'Tooltip Text', 'divi-plus' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'show_if_not'            => array(
					'tooltip_content_type' => 'layout',
				),
				'dynamic_content'  => 'text',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'tooltip_content',
				'description'     => esc_html__( 'Here you can input the text that you want to display when hotspot marker gets hovered or clicked.', 'divi-plus' ),
			),
			'select_tooltip_layout' => array(
                'label'                 => esc_html__( 'Select Layout', 'divi-plus' ),
                'type'                  => 'select',
                'option_category'       => 'configuration',
                'options'               => $layouts,
                'show_if'           => array(
					'tooltip_content_type' => 'layout',
				),
                'default'               => '-1',
                'tab_slug'        		=> 'general',
				'toggle_slug'     		=> 'tooltip_content',
                'description'           => esc_html__( 'Here you can choose the layout saved in your Divi library to be used for the Tooltip.', 'divi-plus' ),
            ),
			'marker_position_top'                      => array(
				'label'           => esc_html__( 'Marker Position Top', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'range_settings'  => array(
					'min'  => '0',
					'max'  => '100',
					'step' => '1',
				),
				'mobile_options'  => true,
				'default'         => '50%',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'single_marker_styling',
				'description'     => esc_html__( 'Move the slider or input the value to bring changes in the vertical position of the marker.', 'divi-plus' ),
			),
			'marker_position_left'                     => array(
				'label'           => esc_html__( 'Marker Position Left', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'range_settings'  => array(
					'min'  => '0',
					'max'  => '100',
					'step' => '1',
				),
				'mobile_options'  => true,
				'default'         => '50%',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'single_marker_styling',
				'description'     => esc_html__( 'Move the slider, or input the value to bring changes in the horizontal position of the marker.', 'divi-plus' ),

			),
			'single_marker_shape'                      => array(
				'label'           => esc_html__( 'Marker Shape', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'none'       => esc_html__( 'None', 'divi-plus' ),
					'use_square' => esc_html__( 'Square', 'divi-plus' ),
					'use_circle' => esc_html__( 'Circle', 'divi-plus' ),
				),
				'default'         => 'none',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'single_marker_styling',
				'description'     => esc_html__( 'Here you can choose the shape to be used for the hotspot marker.', 'divi-plus' ),
			),
			'single_marker_shape_color'                => array(
				'label'        => esc_html__( 'Marker Shape Background', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'show_if_not'  => array(
					'single_marker_shape' => 'none',
				),
				'hover'        => 'tabs',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'single_marker_styling',
				'description'  => esc_html__( 'Here you can select the custom color for the marker icon shape.', 'divi-plus' ),
			),
			'single_marker_use_shape_border'           => array(
				'label'           => esc_html__( 'Display Marker Shape Border', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'layout',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'show_if_not'     => array(
					'single_marker_shape' => 'none',
				),
				'default'         => 'off',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'single_marker_styling',
				'description'     => esc_html__( 'Here you can choose whether or not to display a border on the marker icon shape.', 'divi-plus' ),
			),
			'single_marker_shape_border_color'         => array(
				'label'        => esc_html__( 'Marker Shape Border Color', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'show_if_not'  => array(
					'single_marker_shape' => 'none',
				),
				'show_if'      => array(
					'single_marker_use_shape_border' => 'on',
				),
				'hover'        => 'tabs',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'single_marker_styling',
				'description'  => esc_html__( 'Here you can select the custom color for the border of the marker icon shape.', 'divi-plus' ),
			),
			'single_marker_border_size'                => array(
				'label'           => esc_html__( 'Marker Shape Border Size', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),
				'show_if_not'     => array(
					'single_marker_shape' => 'none',
				),
				'show_if'         => array(
					'single_marker_use_shape_border' => 'on',
				),
				'mobile_options'  => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'single_marker_styling',
				'description'     => esc_html__( 'Move the slider, or input the value to increase or decrease the border thickness of the marker icon shape.', 'divi-plus' ),
			),
			'single_marker_icon_color'                 => array(
				'label'        => esc_html__( 'Icon Color', 'divi-plus' ),
				'type'         => 'color-alpha',
				'show_if'      => array(
					'marker_type' => 'icon',
				),
				'default_unit' => $et_accent_color,
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'single_marker_element_styling',
				'description'  => esc_html__( 'Here you can select the custom color to be used for the hotspot marker icon.', 'divi-plus' ),
			),
			'single_marker_icon_font_size'             => array(
				'label'           => esc_html__( 'Icon Font Size', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'font_option',
				'show_if'         => array(
					'marker_type' => 'icon',
				),
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '120',
					'step' => '1',
				),
				'default_unit'    => 'px',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'vh', 'vw', 'cm', 'mm', 'in', 'pt', 'pc', 'ex' ),
				'mobile_options'  => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'single_marker_element_styling',
				'description'     => esc_html__( 'Move the slider, or input the value to increase or decrease the hotspot marker icon size.', 'divi-plus' ),
			),
			'single_marker_image_size'                 => array(
				'label'           => esc_html__( 'Image Size', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'show_if'         => array(
					'marker_type' => 'image',
				),
				'range_settings'  => array(
					'min'  => '32',
					'max'  => '600',
					'step' => '1',
				),
				'default'         => '32px',
				'mobile_options'  => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'single_marker_element_styling',
				'description'     => esc_html__( 'Move the slider, or input the value to increase or decrease the hotspot marker image size.', 'divi-plus' ),
			),
			'__tooltip_layout_content'                        => array(
				'type'                => 'computed',
				'computed_callback'   => array( 'DIPL_HotSpotItem', 'dipl_tooltip_content' ),
				'computed_depends_on' => array(
					'tooltip_content_type',
					'select_tooltip_layout'
				),
			),
		);
	}

	public static function dipl_tooltip_content( $args = array() ) {
		$defaults = array(
			'tooltip_content_type' => '',
			'select_tooltip_layout'  => '',
		);

		$args = wp_parse_args( $args, $defaults );

		$tooltip_content_type 	= esc_attr( $args['tooltip_content_type'] );
		$select_tooltip_layout  = intval( esc_attr( $args['select_tooltip_layout'] ) );

		if( 'layout' === $tooltip_content_type && '' !== $select_tooltip_layout && -1 !== $select_tooltip_layout ) {
			$output = do_shortcode( get_the_content( null, false, $select_tooltip_layout ) );
		} else {
			$output = '';
		}
		return $output;
	}

	public function render( $attrs, $content, $render_slug ) {
		$marker_type                            = esc_attr( $this->props['marker_type'] );
		$marker_icon                            = esc_attr( $this->props['marker_icon'] );
		$marker_text                            = esc_attr( $this->props['marker_text'] );
		$marker_image                           = esc_attr( $this->props['marker_image'] );
		$marker_position_top                    = esc_attr( $this->props['marker_position_top'] );
		$marker_position_left                   = esc_attr( $this->props['marker_position_left'] );
		$single_marker_shape                    = esc_attr( $this->props['single_marker_shape'] );
		$single_marker_shape_color              = esc_attr( $this->props['single_marker_shape_color'] );
		$single_marker_shape_color_hover        = esc_attr( $this->get_hover_value( 'single_marker_shape_color' ) );
		$single_marker_use_shape_border         = esc_attr( $this->props['single_marker_use_shape_border'] );
		$single_marker_shape_border_color       = esc_attr( $this->props['single_marker_shape_border_color'] );
		$single_marker_shape_border_color_hover = esc_attr( $this->get_hover_value( 'single_marker_shape_border_color' ) );
		$single_marker_border_size              = intval( esc_attr( $this->props['single_marker_border_size'] ) );
		$single_marker_icon_color               = esc_attr( $this->props['single_marker_icon_color'] );
		$single_marker_icon_font_size           = et_pb_responsive_options()->get_property_values( $this->props, 'single_marker_icon_font_size' );
		$single_marker_image_size               = et_pb_responsive_options()->get_property_values( $this->props, 'single_marker_image_size' );
		$marker_content                         = '';
		$tooltip_content_type               	= ( '' !== esc_attr( $this->props['tooltip_content_type'] ) ) ? esc_attr( $this->props['tooltip_content_type'] ) : 'text';
		$tooltip_content                        = '';
		$select_tooltip_layout 					= esc_attr( $this->props['select_tooltip_layout'] );

		$file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        wp_enqueue_style( 'dipl-hotspot-item-style', PLUGIN_PATH . 'includes/modules/HotSpotItem/' . $file . '.min.css', array(), '1.0.0' );

		$order_class  = $this->get_module_order_class( 'dipl_hotspot_item' );
		$order_number = str_replace( '_', '', str_replace( 'dipl_hotspot_item', '', $order_class ) );
		$hotspot_item_width = [];

		if ( 'icon' === $marker_type ) {
			$marker_content = sprintf( '<div class="dipl_marker" id="dipl_marker_%2$s" data-tooltip-content="#dipl_tooltip_%2$s"><span class="dipl_marker_wrapper dipl_icon_marker et-pb-icon">%1$s</span></div>', esc_attr( et_pb_process_font_icon( $marker_icon ) ), $order_number );
			if ( '' !== $marker_icon ) {
				if ( class_exists( 'ET_Builder_Module_Helper_Style_Processor' ) && method_exists( 'ET_Builder_Module_Helper_Style_Processor', 'process_extended_icon' ) ) {
	                $this->generate_styles(
	                    array(
	                        'utility_arg'    => 'icon_font_family',
	                        'render_slug'    => $render_slug,
	                        'base_attr_name' => 'marker_icon',
	                        'important'      => true,
	                        'selector'       => '%%order_class%% .dipl_marker .et-pb-icon',
	                        'processor'      => array(
	                            'ET_Builder_Module_Helper_Style_Processor',
	                            'process_extended_icon',
	                        ),
	                    )
	                );
	            }
			}
		}

		if ( 'image' === $marker_type ) {
			if( ! empty( array_filter( $single_marker_image_size ) ) ) {
				$hotspot_item_width['desktop'] = ( '' !== $single_marker_image_size['desktop'] ? ( intval( $single_marker_image_size['desktop'] ) + 20 ).'px' : '52px' );
				$hotspot_item_width['tablet'] = ( '' !== $single_marker_image_size['tablet'] ? ( intval( $single_marker_image_size['tablet'] ) + 20 ).'px' : $hotspot_item_width['desktop'] );
				$hotspot_item_width['phone'] = ( '' !== $single_marker_image_size['phone'] ? ( intval( $single_marker_image_size['phone'] ) + 20 ).'px' : $hotspot_item_width['desktop'] );
			} else {
				$hotspot_item_width['desktop'] = '52px';
				$hotspot_item_width['tablet'] = '52px';
				$hotspot_item_width['phone'] = '52px';
			}
			if ( ! empty( array_filter( $hotspot_item_width ) ) ) {
				et_pb_responsive_options()->generate_responsive_css( $hotspot_item_width, '.dipl_hotspot %%order_class%%', 'width', $render_slug, '', 'type' );
			}
			if ( ! empty( array_filter( $single_marker_image_size ) ) ) {
				et_pb_responsive_options()->generate_responsive_css( $single_marker_image_size, '.dipl_hotspot %%order_class%% .dipl_marker_wrapper img', 'width', $render_slug, '', 'type' );
			}
			$marker_content = sprintf( '<div class="dipl_marker" id="dipl_marker_%2$s" data-tooltip-content="#dipl_tooltip_%2$s"><span class="dipl_marker_wrapper dipl_image_marker"><img src="%1$s"/></span></div>', esc_html( $marker_image ), $order_number );
		}

		if ( 'text' === $marker_type ) {
			$marker_content = sprintf( '<div class="dipl_marker" id="dipl_marker_%2$s" data-tooltip-content="#dipl_tooltip_%2$s"><span class="dipl_marker_wrapper dipl_text_marker">%1$s</span></div>', esc_html( $marker_text ), $order_number );
		}

		if ( '' !== $this->content && 'layout' !== $tooltip_content_type ) {
			$tooltip_content = $this->content;
		}

		if( 'layout' === $tooltip_content_type ) {
			$tooltip_content = do_shortcode( get_the_content( null, false, $select_tooltip_layout ) );
		}

		if ( ! empty( array_filter( $single_marker_icon_font_size ) ) && 'icon' === $marker_type ) {
			et_pb_responsive_options()->generate_responsive_css( $single_marker_icon_font_size, '.dipl_hotspot %%order_class%% .dipl_marker .et-pb-icon', 'font-size', $render_slug, '', 'type' );
		}

		if ( '' !== $marker_position_top ) {
			self::set_style(
				$render_slug,
				array(
					'selector'    => '.dipl_hotspot %%order_class%%',
					'declaration' => sprintf( 'top: %1$s !important;', esc_html( $marker_position_top ) ),
				)
			);
		}

		if ( '' !== $marker_position_left ) {
			self::set_style(
				$render_slug,
				array(
					'selector'    => '.dipl_hotspot %%order_class%%',
					'declaration' => sprintf( 'left: %1$s !important;', esc_html( $marker_position_left ) ),
				)
			);
		}

		if ( '' !== $marker_position_left || '' !== $marker_position_top ) {
			self::set_style(
				$render_slug,
				array(
					'selector'    => '.dipl_hotspot %%order_class%%',
					'declaration' => sprintf( 'transform: translate(-%1$s, -%2$s) !important;', ( '' !== $marker_position_left ? esc_html( $marker_position_left ) : '50%' ), ( '' !== $marker_position_top ? esc_html( $marker_position_top ) : '50%' ) ),
				)
			);
		}

		if ( '' !== $single_marker_icon_color ) {
			self::set_style(
				$render_slug,
				array(
					'selector'    => '.dipl_hotspot %%order_class%% .dipl_marker .et-pb-icon',
					'declaration' => sprintf( 'color: %1$s !important;', esc_html( $single_marker_icon_color ) ),
				)
			);
		}

		if ( 'none' !== $single_marker_shape ) {
			if ( 'use_circle' === $single_marker_shape ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '.dipl_hotspot .dipl_hotspot_wrapper %%order_class%%',
						'declaration' => 'border-radius: 50%;',
					)
				);
			} else {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '.dipl_hotspot .dipl_hotspot_wrapper %%order_class%%',
						'declaration' => 'border-radius: 0;',
					)
				);
			}
			if ( '' !== $single_marker_shape_color ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '.dipl_hotspot .dipl_hotspot_wrapper %%order_class%%',
						'declaration' => sprintf( 'background-color: %1$s;', esc_html( $single_marker_shape_color ) ),
					)
				);
			}
			if ( isset( $single_marker_shape_color_hover ) ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '.dipl_hotspot .dipl_hotspot_wrapper %%order_class%%:hover',
						'declaration' => sprintf( 'background-color: %1$s;', esc_html( $single_marker_shape_color_hover ) ),
					)
				);
			}
			if ( 'on' === $single_marker_use_shape_border ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '.dipl_hotspot .dipl_hotspot_wrapper %%order_class%%',
						'declaration' => 'border-style: solid;',
					)
				);
				if ( '' !== $single_marker_shape_border_color ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '.dipl_hotspot .dipl_hotspot_wrapper %%order_class%%',
							'declaration' => sprintf( 'border-color: %1$s;', esc_html( $single_marker_shape_border_color ) ),
						)
					);
				}
				if ( isset( $single_marker_shape_border_color_hover ) ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '.dipl_hotspot .dipl_hotspot_wrapper %%order_class%%:hover',
							'declaration' => sprintf( 'border-color: %1$s;', esc_html( $single_marker_shape_border_color_hover ) ),
						)
					);
				}
				if ( '' !== $single_marker_border_size ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '.dipl_hotspot .dipl_hotspot_wrapper %%order_class%%',
							'declaration' => sprintf( 'border-width: %1$spx;', esc_html( $single_marker_border_size ) ),
						)
					);
				}
			}
		}

		$this->process_advanced_css( $this, $render_slug, $this->margin_padding );
		return sprintf( '%1$s<div class="dipl_tooltip_wrapper"><div id="dipl_tooltip_%3$s">%2$s</div></div>', $marker_content, $tooltip_content, $order_number );
	}

	public function process_advanced_css( $module, $function_name, $margin_padding ) {
		$utils           = ET_Core_Data_Utils::instance();
		$all_values      = $module->props;
		$advanced_fields = $module->advanced_fields;
		if ( ! $module->has_vb_support() && ! $module->has_advanced_fields ) {
			return;
		}
		$allowed_advanced_fields = array( 'form_field', 'button', 'tooltip_padding' );
		foreach ( $allowed_advanced_fields as $advanced_field ) {
			if ( ! empty( $advanced_fields[ $advanced_field ] ) ) {
				foreach ( $advanced_fields[ $advanced_field ] as $label => $form_field ) {
					$padding_key = "{$label}_custom_padding";
					if ( '' !== $utils->array_get( $all_values, $padding_key, '' ) ) {
						$settings                      = $utils->array_get( $form_field, 'margin_padding', array() );                        // Ensure main selector exists.
						$form_field_margin_padding_css = $utils->array_get( $settings, 'css.main', '' );
						if ( empty( $form_field_margin_padding_css ) ) {
							$utils->array_set( $settings, 'css.main', $utils->array_get( $form_field, 'css.main', '' ) );
						}                        $margin_padding->update_styles( $module, $label, $settings, $function_name, $advanced_field );
					}
				}
			}
		}
	}
}
$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
    $modules = explode( ',', $plugin_options['dipl-modules'] );
    if ( in_array( 'dipl_hot_spot', $modules ) ) {
        new DIPL_HotSpotItem();
    }
} else {
    new DIPL_HotSpotItem();
}