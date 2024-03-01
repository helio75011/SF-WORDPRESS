<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.4
 */
class DIPL_ImageMask_Item extends ET_Builder_Module {

	public $slug       = 'dipl_image_mask_item';
	public $type       = 'child';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name            = esc_html__( 'DP Image Mask Element', 'divi-plus' );
		$this->plural          = esc_html__( 'DP Image Mask Elements', 'divi-plus' );
		$this->child_title_var = 'select_element';
	}

	public function get_settings_modal_toggles() {
		return array(
			'general'  => array(
				'toggles' => array(
					'main_content' => array(
						'title' => esc_html__( 'Content', 'divi-plus' ),
					),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'element_position' => array(
						'title'    => esc_html__( 'Element Position', 'divi-plus' ),
						'priority' => 1,
					),
					'element_size'     => array(
						'title'    => esc_html__( 'Element Size', 'divi-plus' ),
						'priority' => 2,
					),
					'element_color'    => array(
						'title'    => esc_html__( 'Element Color', 'divi-plus' ),
						'priority' => 3,
					),
				),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts'          => false,
			'text'           => false,
			'box_shadow'     => false,
			'borders'        => false,
			'max_width'      => false,
			'margin_padding' => false,
			'filters'        => false,
			'background'     => array(
				'use_background_video' => false,
			),
		);
	}

	public function get_fields() {

		return array(
			'select_element'          => array(
				'label'            => esc_html__( 'Select Element', 'divi-plus' ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
					'circle'   => esc_html__( 'Circle', 'divi-plus' ),
					'fluid'    => esc_html__( 'Fluid', 'divi-plus' ),
					'grid'     => esc_html__( 'Grid', 'divi-plus' ),
					'line'     => esc_html__( 'Line', 'divi-plus' ),
					'plus'     => esc_html__( 'Plus', 'divi-plus' ),
					'square'   => esc_html__( 'Square', 'divi-plus' ),
					'star'     => esc_html__( 'Star', 'divi-plus' ),
					'triangle' => esc_html__( 'Triangle', 'divi-plus' ),
				),
				'default'          => 'circle',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Here you can choose element to be displayed on image mask.', 'divi-plus' ),
				'computed_affects' => array(
					'__svg_element_data',
				),
			),
			'select_circle_type'      => array(
				'label'            => esc_html__( 'Select Circle', 'divi-plus' ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
					'elements_empty_broad_circle' => esc_html__( 'Heavy Border Circle', 'divi-plus' ),
					'elements_empty_circle'       => esc_html__( 'Light Border Circle', 'divi-plus' ),
					'elements_solid_circle'       => esc_html__( 'Solid Circle', 'divi-plus' ),
					'elements_line_circle'        => esc_html__( 'Line Circle', 'divi-plus' ),
				),
				'show_if'          => array(
					'select_element' => 'circle',
				),
				'default'          => 'elements_empty_broad_circle',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Here you can choose the circle type.', 'divi-plus' ),
				'computed_affects' => array(
					'__svg_element_data',
				),
			),
			'select_fluid_type'       => array(
				'label'            => esc_html__( 'Select Fluid', 'divi-plus' ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
					'elements_fluid_1'  => esc_html__( 'Fluid 1', 'divi-plus' ),
					'elements_fluid_2'  => esc_html__( 'Fluid 2', 'divi-plus' ),
					'elements_fluid_3'  => esc_html__( 'Fluid 3', 'divi-plus' ),
					'elements_fluid_4'  => esc_html__( 'Fluid 4', 'divi-plus' ),
					'elements_fluid_5'  => esc_html__( 'Fluid 5', 'divi-plus' ),
					'elements_fluid_6'  => esc_html__( 'Fluid 6', 'divi-plus' ),
					'elements_fluid_7'  => esc_html__( 'Fluid 7', 'divi-plus' ),
					'elements_fluid_8'  => esc_html__( 'Fluid 8', 'divi-plus' ),
					'elements_fluid_9'  => esc_html__( 'Fluid 9', 'divi-plus' ),
					'elements_fluid_10' => esc_html__( 'Fluid 10', 'divi-plus' ),
					'elements_fluid_11' => esc_html__( 'Fluid 11', 'divi-plus' ),
					'elements_fluid_12' => esc_html__( 'Fluid 12', 'divi-plus' ),
				),
				'show_if'          => array(
					'select_element' => 'fluid',
				),
				'default'          => 'elements_fluid_1',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Here you can choose the fluid type.', 'divi-plus' ),
				'computed_affects' => array(
					'__svg_element_data',
				),
			),
			'select_grid_type'        => array(
				'label'            => esc_html__( 'Select Grid', 'divi-plus' ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
					'elements_grid'         => esc_html__( 'Grid', 'divi-plus' ),
					'elements_aligned_grid' => esc_html__( 'Grid Aligned', 'divi-plus' ),
				),
				'show_if'          => array(
					'select_element' => 'grid',
				),
				'default'          => 'elements_grid',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Here you can choose the grid type.', 'divi-plus' ),
				'computed_affects' => array(
					'__svg_element_data',
				),
			),
			'select_line_type'        => array(
				'label'            => esc_html__( 'Select Line', 'divi-plus' ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
					'elements_solid_line'  => esc_html__( 'Straight Line', 'divi-plus' ),
					'elements_swirl_line'  => esc_html__( 'Swirl Line', 'divi-plus' ),
					'elements_zigzag_line' => esc_html__( 'Zig Zag Line', 'divi-plus' ),
				),
				'show_if'          => array(
					'select_element' => 'line',
				),
				'default'          => 'elements_solid_line',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Here you can choose the line type.', 'divi-plus' ),
				'computed_affects' => array(
					'__svg_element_data',
				),
			),
			'select_plus_type'        => array(
				'label'            => esc_html__( 'Select Plus', 'divi-plus' ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
					'elements_plus'         => esc_html__( 'Plus', 'divi-plus' ),
					'elements_plus_rounded' => esc_html__( 'Rounded Plus', 'divi-plus' ),
					'elements_cross'        => esc_html__( 'Cross', 'divi-plus' ),
				),
				'show_if'          => array(
					'select_element' => 'plus',
				),
				'default'          => 'elements_plus',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Here you can choose the plus type.', 'divi-plus' ),
				'computed_affects' => array(
					'__svg_element_data',
				),
			),
			'select_square_type'      => array(
				'label'            => esc_html__( 'Select Square', 'divi-plus' ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
					'elements_square_1' => esc_html__( 'Square 1', 'divi-plus' ),
					'elements_square_2' => esc_html__( 'Square 2', 'divi-plus' ),
					'elements_square_3' => esc_html__( 'Square 3', 'divi-plus' ),
					'elements_square_4' => esc_html__( 'Square 4', 'divi-plus' ),
					'elements_square_5' => esc_html__( 'Square 5', 'divi-plus' ),

				),
				'show_if'          => array(
					'select_element' => 'square',
				),
				'default'          => 'elements_square_1',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Here you can choose the square type.', 'divi-plus' ),
				'computed_affects' => array(
					'__svg_element_data',
				),
			),
			'select_star_type'        => array(
				'label'            => esc_html__( 'Select Star', 'divi-plus' ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
					'elements_star_1' => esc_html__( 'Star 1', 'divi-plus' ),
					'elements_star_2' => esc_html__( 'Star 2', 'divi-plus' ),
					'elements_star_3' => esc_html__( 'Star 3', 'divi-plus' ),
				),
				'show_if'          => array(
					'select_element' => 'star',
				),
				'default'          => 'elements_star_1',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Here you can choose the star type.', 'divi-plus' ),
				'computed_affects' => array(
					'__svg_element_data',
				),
			),
			'select_triangle_type'    => array(
				'label'            => esc_html__( 'Select Triangle', 'divi-plus' ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
					'elements_filled_triangle' => esc_html__( 'Filled Triangle', 'divi-plus' ),
					'elements_empty_triangle'  => esc_html__( 'Empty Triangle', 'divi-plus' ),
				),
				'show_if'          => array(
					'select_element' => 'triangle',
				),
				'default'          => 'elements_filled_triangle',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Here you can choose the triangle type.', 'divi-plus' ),
				'computed_affects' => array(
					'__svg_element_data',
				),
			),
			'element_position_top'    => array(
				'label'           => esc_html__( 'Vertical Position', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'range_settings'  => array(
					'min'  => '-100',
					'max'  => '100',
					'step' => '1',
				),
				'default'         => '0%',
				'mobile_options'  => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'element_position',
				'description'     => esc_html__( 'Here you can set the vertical position of the element.', 'divi-plus' ),
			),
			'element_position_left'   => array(
				'label'           => esc_html__( 'Horizontal Position', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'range_settings'  => array(
					'min'  => '-100',
					'max'  => '100',
					'step' => '1',
				),
				'default'         => '0%',
				'mobile_options'  => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'element_position',
				'description'     => esc_html__( 'Here you can set the horizontal position of the element.', 'divi-plus' ),
			),
			'element_placement'       => array(
				'label'           => esc_html__( 'Element Placement', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'dipl_elements_top'    => esc_html__( 'Above Image', 'divi-plus' ),
					'dipl_elements_bottom' => esc_html__( 'Below Image', 'divi-plus' ),
				),
				'default'         => 'dipl_elements_top',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'element_position',
				'description'     => esc_html__( 'Here you can set the element placement.', 'divi-plus' ),
			),
			'element_sizing'          => array(
				'label'          => esc_html__( 'Element Sizing', 'divi-plus' ),
				'type'           => 'range',
				'range_settings' => array(
					'min'  => '0',
					'max'  => '3000',
					'step' => '1',
				),
				'mobile_options' => true,
				'default'        => '50px',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'element_size',
				'description'    => esc_html__( 'Here you can set the element size', 'divi-plus' ),
			),
			'enable_gradient'         => array(
				'label'           => esc_html__( 'Enable Gradient', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'default'         => 'off',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'element_color',
				'description'     => esc_html__( 'Here you can enable the gradient for shape.', 'divi-plus' ),
			),
			'element_bg_color'        => array(
				'label'        => esc_html__( 'Element Color', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'show_if'      => array(
					'enable_gradient' => array(
						'off',
					),
				),
				'hover'        => 'tabs',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'element_color',
				'description'  => esc_html__( 'Here you can set the element color.', 'divi-plus' ),
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
				'default'      => '#2b87da',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'element_color',
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
				'default'      => '#29c4a9',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'element_color',
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
				'default'         => 'linear-gradient',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'element_color',
				'description'     => esc_html__( 'Here you can select Gradient Type', 'divi-plus' ),
			),
			'linear_direction'        => array(
				'label'           => esc_html__( 'Gradient Direction', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'linear-gradient-vertical'   => esc_html__( 'Vertical', 'divi-plus' ),
					'linear-gradient-horizontal' => esc_html__( 'Horizontal', 'divi-plus' ),
				),
				'show_if'         => array(
					'enable_gradient' => array(
						'on',
					),
					'gradient_type'   => 'linear-gradient',
				),
				'default'         => 'linear-gradient-vertical',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'element_color',
				'description'     => esc_html__( 'Here you can select Linear Gradient Direction', 'divi-plus' ),
			),
			'radial_direction'        => array(
				'label'           => esc_html__( 'Gradient Direction', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'circle at center'       => esc_html__( 'Center', 'divi-plus' ),
					'circle at left'         => esc_html__( 'Center Left', 'divi-plus' ),
					'circle at right'        => esc_html__( 'Center Right', 'divi-plus' ),
					'circle at top'          => esc_html__( 'Top', 'divi-plus' ),
					'circle at top left'     => esc_html__( 'Top Left', 'divi-plus' ),
					'circle at top right'    => esc_html__( 'Top Right', 'divi-plus' ),
					'circle at bottom'       => esc_html__( 'Bottom', 'divi-plus' ),
					'circle at bottom left'  => esc_html__( 'Bottom Left', 'divi-plus' ),
					'circle at bottom right' => esc_html__( 'Bottom Right', 'divi-plus' ),
				),
				'show_if'         => array(
					'enable_gradient' => array(
						'on',
					),
					'gradient_type'   => 'radial-gradient',
				),
				'default'         => 'circle at center',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'element_color',
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
				'mobile_options' => true,
				'show_if'        => array(
					'enable_gradient' => array(
						'on',
					),
				),
				'default'        => '0%',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'element_color',
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
				'mobile_options' => true,
				'show_if'        => array(
					'enable_gradient' => array(
						'on',
					),
				),
				'default'        => '100%',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'element_color',
				'description'    => esc_html__( 'Here you can select Gradient End Position', 'divi-plus' ),
			),
			'__svg_element_data'      => array(
				'type'                => 'computed',
				'computed_callback'   => array( 'DIPL_ImageMask_Item', 'get_svg_element_data' ),
				'computed_depends_on' => array(
					'select_element',
					'select_circle_type',
					'select_fluid_type',
					'select_grid_type',
					'select_line_type',
					'select_plus_type',
					'select_square_type',
					'select_star_type',
					'select_triangle_type',
				),
			),
		);
	}

	public static function get_svg_element_data( $attrs = array(), $conditional_tags = array(), $current_page = array() ) {

		$defaults = array(
			'select_element'       => 'circle',
			'select_circle_type'   => 'elements_empty_broad_circle',
			'select_fluid_type'    => 'elements_fluid_1',
			'select_grid_type'     => 'elements_grid',
			'select_line_type'     => 'elements_solid_line',
			'select_plus_type'     => 'elements_plus',
			'select_square_type'   => 'elements_square_triangle',
			'select_star_type'     => 'elements_star_1',
			'select_triangle_type' => 'elements_empty_triangle',
		);

		$attrs = wp_parse_args( $attrs, $defaults );
		foreach ( $defaults as $key => $default ) {
			${$key} = esc_html( et_()->array_get( $attrs, $key, $default ) );
		}

		if ( '' !== $select_element ) {
			$element_type = 'select_' . $select_element . '_type';
			// ELICUS_DIVI_PLUS_DIR_PATH is a global variable which consist plugin_dir_path( __FILE__ ).
			//phpcs:ignore
			$output       = file_get_contents( ELICUS_DIVI_PLUS_DIR_PATH . 'includes/assets/image_mask/elements/' . $select_element . '/' . ${$element_type} . '.svg' );
		} else {
			$output = '';
		}
		return $output;
	}


	public function render( $attrs, $content, $render_slug ) {

		$select_element          = esc_attr( $this->props['select_element'] );
		$select_circle_type      = esc_attr( $this->props['select_circle_type'] );
		$select_fluid_type       = esc_attr( $this->props['select_fluid_type'] );
		$select_grid_type        = esc_attr( $this->props['select_grid_type'] );
		$select_line_type        = esc_attr( $this->props['select_line_type'] );
		$select_plus_type        = esc_attr( $this->props['select_plus_type'] );
		$select_square_type      = esc_attr( $this->props['select_square_type'] );
		$select_star_type        = esc_attr( $this->props['select_star_type'] );
		$select_triangle_type    = esc_attr( $this->props['select_triangle_type'] );
		$element_position_top    = et_pb_responsive_options()->get_property_values( $this->props, 'element_position_top' );
		$element_position_left   = et_pb_responsive_options()->get_property_values( $this->props, 'element_position_left' );
		$element_placement       = esc_attr( $this->props['element_placement'] );
		$element_sizing          = et_pb_responsive_options()->get_property_values( $this->props, 'element_sizing' );
		$enable_gradient         = ( '' !== esc_attr( $this->props['enable_gradient'] ) ) ? esc_attr( $this->props['enable_gradient'] ) : 'off';
		$element_bg_color        = esc_attr( $this->props['element_bg_color'] );
		$grandient_color_1       = esc_attr( $this->props['grandient_color_1'] );
		$grandient_color_2       = esc_attr( $this->props['grandient_color_2'] );
		$gradient_type           = esc_attr( $this->props['gradient_type'] );
		$linear_direction        = esc_attr( $this->props['linear_direction'] );
		$radial_direction        = esc_attr( $this->props['radial_direction'] );
		$gradient_start_position = esc_attr( $this->props['gradient_start_position'] );
		$gradient_end_position   = esc_attr( $this->props['gradient_end_position'] );
		$order_class             = $this->get_module_order_class( $render_slug );
		$order_number            = esc_attr( preg_replace( '/[^0-9]/', '', esc_attr( $order_class ) ) );
		$gradient                = '';

		if ( ! empty( array_filter( $element_position_top ) ) ) {
			et_pb_responsive_options()->generate_responsive_css( $element_position_top, '.dipl_image_mask %%order_class%%', 'top', $render_slug, '', 'type' );
		}

		if ( ! empty( array_filter( $element_position_left ) ) ) {
			et_pb_responsive_options()->generate_responsive_css( $element_position_left, '.dipl_image_mask %%order_class%%', 'left', $render_slug, '', 'type' );
		}

		if ( ! empty( array_filter( $element_sizing ) ) ) {
			et_pb_responsive_options()->generate_responsive_css( $element_sizing, '%%order_class%% svg', 'width', $render_slug, '', 'type' );
			et_pb_responsive_options()->generate_responsive_css( $element_sizing, '%%order_class%% svg', 'height', $render_slug, '', 'type' );
		}

		if ( 'dipl_elements_top' === $element_placement ) {
			self::set_style(
				$render_slug,
				array(
					'selector'    => '.dipl_image_mask %%order_class%%',
					'declaration' => 'z-index: 9;',
				)
			);
		} else {
			self::set_style(
				$render_slug,
				array(
					'selector'    => '.dipl_image_mask %%order_class%%',
					'declaration' => 'z-index: -1;',
				)
			);
		}

		if ( 'off' === $enable_gradient ) {
			if ( '' !== $element_bg_color ) {
				if ( 'circle' === $select_element ) {
					if ( 'elements_empty_broad_circle' === $select_circle_type || 'elements_empty_circle' === $select_circle_type ) {
						self::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% svg path',
								'declaration' => sprintf( 'stroke: %1$s !important;', esc_html( $element_bg_color ) ),
							)
						);

					} elseif ( 'elements_line_circle' === $select_circle_type ) {
						self::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% svg rect',
								'declaration' => sprintf( 'fill: %1$s !important;', esc_html( $element_bg_color ) ),
							)
						);
						self::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% svg rect',
								'declaration' => sprintf( 'stroke: %1$s !important;', esc_html( $element_bg_color ) ),
							)
						);
					} else {
						self::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% svg circle',
								'declaration' => sprintf( 'fill: %1$s !important;', esc_html( $element_bg_color ) ),
							)
						);
					}
				}
				if ( 'fluid' === $select_element ) {
					if ( 'elements_fluid_8' === $select_fluid_type ) {
						self::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% svg path',
								'declaration' => sprintf( 'fill: %1$s !important;', esc_html( $element_bg_color ) ),
							)
						);
						self::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% svg path',
								'declaration' => sprintf( 'stroke: %1$s !important;', esc_html( $element_bg_color ) ),
							)
						);

					} else {
						self::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% svg path',
								'declaration' => sprintf( 'fill: %1$s !important;', esc_html( $element_bg_color ) ),
							)
						);
					}
				}
				if ( 'grid' === $select_element ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% svg path, %%order_class%% svg circle',
							'declaration' => sprintf( 'fill: %1$s !important;', esc_html( $element_bg_color ) ),
						)
					);
				}
				if ( 'line' === $select_element ) {
					if ( 'elements_solid_line' === $select_line_type ) {
						self::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% svg line',
								'declaration' => sprintf( 'stroke: %1$s !important;', esc_html( $element_bg_color ) ),
							)
						);

					} elseif ( 'elements_swirl_line' === $select_line_type ) {
						self::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% svg path',
								'declaration' => sprintf( 'stroke: %1$s !important;', esc_html( $element_bg_color ) ),
							)
						);
					} else {
						self::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% svg polyline',
								'declaration' => sprintf( 'stroke: %1$s !important;', esc_html( $element_bg_color ) ),
							)
						);
					}
				}
				if ( 'square' === $select_element ) {
					if ( 'elements_square_5' === $select_square_type ) {
						self::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% svg polygon',
								'declaration' => sprintf( 'fill: %1$s !important;', esc_html( $element_bg_color ) ),
							)
						);
					} else {
						self::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% svg path, %%order_class%% svg rect',
								'declaration' => sprintf( 'fill: %1$s !important;', esc_html( $element_bg_color ) ),
							)
						);
					}
				}
				if ( 'plus' === $select_element ) {
					if ( 'elements_plus' === $select_plus_type ) {
						self::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% svg rect',
								'declaration' => sprintf( 'fill: %1$s !important;', esc_html( $element_bg_color ) ),
							)
						);
					} elseif ( 'elements_plus_rounded' === $select_plus_type ) {
						self::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% svg path',
								'declaration' => sprintf( 'fill: %1$s !important;', esc_html( $element_bg_color ) ),
							)
						);
					} else {
						self::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% svg polygon',
								'declaration' => sprintf( 'fill: %1$s !important;', esc_html( $element_bg_color ) ),
							)
						);
					}
				}
				if ( 'star' === $select_element ) {
					if ( 'elements_star_1' === $select_star_type ) {
						self::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% svg polygon',
								'declaration' => sprintf( 'fill: %1$s !important;', esc_html( $element_bg_color ) ),
							)
						);
					} else {
						self::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% svg path',
								'declaration' => sprintf( 'fill: %1$s !important;', esc_html( $element_bg_color ) ),
							)
						);
					}
				}
				if ( 'triangle' === $select_element ) {
					if ( 'elements_empty_triangle' === $select_triangle_type ) {
						self::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% svg polygon',
								'declaration' => sprintf( 'stroke: %1$s !important;', esc_html( $element_bg_color ) ),
							)
						);
					} else {
						self::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% svg polygon',
								'declaration' => sprintf( 'fill: %1$s !important;', esc_html( $element_bg_color ) ),
							)
						);
						self::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% svg polygon',
								'declaration' => sprintf( 'stroke: %1$s !important;', esc_html( $element_bg_color ) ),
							)
						);
					}
				}
			}
		} else {
			$selector = 'element_gradient_' . $order_number;
			if ( 'linear-gradient' === $gradient_type ) {
				if ( 'linear-gradient-vertical' === $linear_direction ) {
					$gradient  = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg"><defs><linearGradient id="' . $selector . '" x1="0" y1="0" x2="0" y2="100%">';
					$gradient .= sprintf(
						'<stop offset="%3$s" style="stop-color:%1$s;stop-opacity:1" />
											<stop offset="%4$s" style="stop-color:%2$s;stop-opacity:1" />',
						$grandient_color_1,
						$grandient_color_2,
						$gradient_start_position,
						$gradient_end_position
					);
					$gradient .= '</linearGradient></defs></svg>';
				} else {
					$gradient  = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg"><defs><linearGradient id="' . $selector . '" x1="0" y1="0" x2="100%" y2="0">';
					$gradient .= sprintf(
						'<stop offset="%3$s" style="stop-color:%1$s;stop-opacity:1" />
											<stop offset="%4$s" style="stop-color:%2$s;stop-opacity:1" />',
						$grandient_color_1,
						$grandient_color_2,
						$gradient_start_position,
						$gradient_end_position
					);
					$gradient .= '</linearGradient></defs></svg>';
				}
			} else {
				if ( 'circle at center' === $radial_direction ) {
					$gradient  = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg"><defs><radialGradient id="' . $selector . '" cx="50%" cy="50%" r="50%">';
					$gradient .= sprintf(
						'<stop offset="%3$s" style="stop-color:%1$s;stop-opacity:1" />
											<stop offset="%4$s" style="stop-color:%2$s;stop-opacity:1" />',
						$grandient_color_1,
						$grandient_color_2,
						$gradient_start_position,
						$gradient_end_position
					);
					$gradient .= '</radialGradient></defs></svg>';
				} elseif ( 'circle at top left' === $radial_direction ) {
					$gradient  = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg"><defs><radialGradient id="' . $selector . '" cx="0%" cy="0%" r="50%">';
					$gradient .= sprintf(
						'<stop offset="%3$s" style="stop-color:%1$s;stop-opacity:1" />
											<stop offset="%4$s" style="stop-color:%2$s;stop-opacity:1" />',
						$grandient_color_1,
						$grandient_color_2,
						$gradient_start_position,
						$gradient_end_position
					);
					$gradient .= '</radialGradient></defs></svg>';

				} elseif ( 'circle at top' === $radial_direction ) {
					$gradient  = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg"><defs><radialGradient id="' . $selector . '" cx="50%" cy="0%" r="50%">';
					$gradient .= sprintf(
						'<stop offset="%3$s" style="stop-color:%1$s;stop-opacity:1" />
											<stop offset="%4$s" style="stop-color:%2$s;stop-opacity:1" />',
						$grandient_color_1,
						$grandient_color_2,
						$gradient_start_position,
						$gradient_end_position
					);
					$gradient .= '</radialGradient></defs></svg>';

				} elseif ( 'circle at top left' === $radial_direction ) {
					$gradient  = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg"><defs><radialGradient id="' . $selector . '" cx="0%" cy="0%" r="50%">';
					$gradient .= sprintf(
						'<stop offset="%3$s" style="stop-color:%1$s;stop-opacity:1" />
											<stop offset="%4$s" style="stop-color:%2$s;stop-opacity:1" />',
						$grandient_color_1,
						$grandient_color_2,
						$gradient_start_position,
						$gradient_end_position
					);
					$gradient .= '</radialGradient></defs></svg>';

				} elseif ( 'circle at top right' === $radial_direction ) {
					$gradient  = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg"><defs><radialGradient id="' . $selector . '" cx="100%" cy="0%" r="50%">';
					$gradient .= sprintf(
						'<stop offset="%3$s" style="stop-color:%1$s;stop-opacity:1" />
											<stop offset="%4$s" style="stop-color:%2$s;stop-opacity:1" />',
						$grandient_color_1,
						$grandient_color_2,
						$gradient_start_position,
						$gradient_end_position
					);
					$gradient .= '</radialGradient></defs></svg>';

				} elseif ( 'circle at bottom right' === $radial_direction ) {
					$gradient  = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg"><defs><radialGradient id="' . $selector . '" cx="100%" cy="100%" r="50%">';
					$gradient .= sprintf(
						'<stop offset="%3$s" style="stop-color:%1$s;stop-opacity:1" />
											<stop offset="%4$s" style="stop-color:%2$s;stop-opacity:1" />',
						$grandient_color_1,
						$grandient_color_2,
						$gradient_start_position,
						$gradient_end_position
					);
					$gradient .= '</radialGradient></defs></svg>';

				} elseif ( 'circle at bottom' === $radial_direction ) {
					$gradient  = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg"><defs><radialGradient id="' . $selector . '" cx="50%" cy="100%" r="50%">';
					$gradient .= sprintf(
						'<stop offset="%3$s" style="stop-color:%1$s;stop-opacity:1" />
											<stop offset="%4$s" style="stop-color:%2$s;stop-opacity:1" />',
						$grandient_color_1,
						$grandient_color_2,
						$gradient_start_position,
						$gradient_end_position
					);
					$gradient .= '</radialGradient></defs></svg>';

				} elseif ( 'circle at bottom left' === $radial_direction ) {
					$gradient  = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg"><defs><radialGradient id="' . $selector . '" cx="0%" cy="100%" r="50%">';
					$gradient .= sprintf(
						'<stop offset="%3$s" style="stop-color:%1$s;stop-opacity:1" />
											<stop offset="%4$s" style="stop-color:%2$s;stop-opacity:1" />',
						$grandient_color_1,
						$grandient_color_2,
						$gradient_start_position,
						$gradient_end_position
					);
					$gradient .= '</radialGradient></defs></svg>';

				} elseif ( 'circle at left' === $radial_direction ) {
					$gradient  = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg"><defs><radialGradient id="' . $selector . '" cx="0%" cy="50%" r="50%">';
					$gradient .= sprintf(
						'<stop offset="%3$s" style="stop-color:%1$s;stop-opacity:1" />
											<stop offset="%4$s" style="stop-color:%2$s;stop-opacity:1" />',
						$grandient_color_1,
						$grandient_color_2,
						$gradient_start_position,
						$gradient_end_position
					);
					$gradient .= '</radialGradient></defs></svg>';

				} else {
					$gradient  = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg"><defs><radialGradient id="' . $selector . '" cx="100%" cy="50%" r="50%">';
					$gradient .= sprintf(
						'<stop offset="%3$s" style="stop-color:%1$s;stop-opacity:1" />
											<stop offset="%4$s" style="stop-color:%2$s;stop-opacity:1" />',
						$grandient_color_1,
						$grandient_color_2,
						$gradient_start_position,
						$gradient_end_position
					);
					$gradient .= '</radialGradient></defs></svg>';
				}
			}
			if ( 'circle' === $select_element ) {
				if ( 'elements_empty_broad_circle' === $select_circle_type || 'elements_empty_circle' === $select_circle_type ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% svg path',
							'declaration' => sprintf( 'stroke: url(#%1$s) !important;', $selector ),
						)
					);

				} elseif ( 'elements_line_circle' === $select_circle_type ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% svg rect',
							'declaration' => sprintf( 'fill: url(#%1$s) !important;', $selector ),
						)
					);
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% svg rect',
							'declaration' => sprintf( 'stroke: url(#%1$s) !important;', $selector ),
						)
					);
				} else {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% svg circle',
							'declaration' => sprintf( 'fill: url(#%1$s) !important;', $selector ),
						)
					);
				}
			}
			if ( 'fluid' === $select_element ) {
				if ( 'elements_fluid_8' === $select_fluid_type ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% svg path',
							'declaration' => sprintf( 'fill: url(#%1$s) !important;', $selector ),
						)
					);
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% svg path',
							'declaration' => sprintf( 'stroke: url(#%1$s) !important;', $selector ),
						)
					);

				} else {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% svg path',
							'declaration' => sprintf( 'fill: url(#%1$s) !important;', $selector ),
						)
					);
				}
			}
			if ( 'grid' === $select_element ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% svg path, %%order_class%% svg circle',
							'declaration' => sprintf( 'fill: url(#%1$s) !important;', $selector ),
						)
					);
			}
			if ( 'line' === $select_element ) {
				if ( 'elements_solid_line' === $select_line_type ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% svg line',
							'declaration' => sprintf( 'stroke: url(#%1$s) !important;', $selector ),
						)
					);

				} elseif ( 'elements_swirl_line' === $select_line_type ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% svg path',
							'declaration' => sprintf( 'stroke: url(#%1$s) !important;', $selector ),
						)
					);
				} else {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% svg polyline',
							'declaration' => sprintf( 'stroke: url(#%1$s) !important;', $selector ),
						)
					);
				}
			}
			if ( 'square' === $select_element ) {
				if ( 'elements_square_5' === $select_square_type ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% svg polygon',
							'declaration' => sprintf( 'fill: url(#%1$s) !important;', $selector ),
						)
					);
				} else {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% svg path, %%order_class%% svg rect',
							'declaration' => sprintf( 'fill: url(#%1$s) !important;', $selector ),
						)
					);
				}
			}
			if ( 'plus' === $select_element ) {
				if ( 'elements_plus' === $select_plus_type ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% svg rect',
							'declaration' => sprintf( 'fill: url(#%1$s) !important;', $selector ),
						)
					);
				} elseif ( 'elements_plus_rounded' === $select_plus_type ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% svg path',
							'declaration' => sprintf( 'fill: url(#%1$s) !important;', $selector ),
						)
					);
				} else {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% svg polygon',
							'declaration' => sprintf( 'fill: url(#%1$s) !important;', $selector ),
						)
					);
				}
			}
			if ( 'star' === $select_element ) {
				if ( 'elements_star_1' === $select_star_type ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% svg polygon',
							'declaration' => sprintf( 'fill: url(#%1$s) !important;', $selector ),
						)
					);
				} else {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% svg path',
							'declaration' => sprintf( 'fill: url(#%1$s) !important;', $selector ),
						)
					);
				}
			}
			if ( 'triangle' === $select_element ) {
				if ( 'elements_empty_triangle' === $select_triangle_type ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% svg polygon',
							'declaration' => sprintf( 'stroke: url(#%1$s) !important;', $selector ),
						)
					);
				} else {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% svg polygon',
							'declaration' => sprintf( 'stroke: url(#%1$s) !important;', $selector ),
						)
					);
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% svg polygon',
							'declaration' => sprintf( 'fill: url(#%1$s) !important;', $selector ),
						)
					);
				}
			}
		}

		if ( '' !== $select_element ) {
			$element_type = 'select_' . $select_element . '_type';
			// ELICUS_DIVI_PLUS_DIR_PATH is a global variable which consist plugin_dir_path( __FILE__ ).
			//phpcs:ignore
			$svg_element  = file_get_contents( ELICUS_DIVI_PLUS_DIR_PATH . 'includes/assets/image_mask/elements/' . $select_element . '/' . ${$element_type} . '.svg' );
		}

		$output = sprintf(
			'<div class="dipl_image_mask_element">%1$s%2$s</div>',
			$svg_element,
			( '' !== $gradient ) ? $gradient : ''
		);

		$file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        wp_enqueue_style( 'dipl-image-mask-item-style', PLUGIN_PATH . 'includes/modules/ImageMaskItem/' . $file . '.min.css', array(), '1.0.0' );

		return $output;
	}
}

$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
	$modules = explode( ',', $plugin_options['dipl-modules'] );
	if ( in_array( 'dipl_image_mask', $modules ) ) {
		new DIPL_ImageMask_Item();
	}
} else {
	new DIPL_ImageMask_Item();
}
