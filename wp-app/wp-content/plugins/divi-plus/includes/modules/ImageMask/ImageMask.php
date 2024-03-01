<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.5
 */
class DIPL_ImageMask extends ET_Builder_Module {

	public $slug       = 'dipl_image_mask';
	public $child_slug = 'dipl_image_mask_item';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name = esc_html__( 'DP Image Mask', 'divi-plus' );
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
					'mask_settings' => array(
						'title'    => esc_html__( 'Mask Settings', 'divi-plus' ),
						'priority' => 1,
					),
				),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts'          => false,
			'text'           => false,
			'borders'        => false,
			'max_width'      => false,
			'margin_padding' => false,
			'filters'        => false,
		);
	}

	public function get_fields() {

		$dipl_image_mask_fields = array(
			'mask_on'                  => array(
				'label'           => esc_html__( 'Mask On', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'image'      => esc_html__( 'Image', 'divi-plus' ),
					'background' => esc_html__( 'Background', 'divi-plus' ),
				),
				'default'         => 'image',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can choose the mask on which element.', 'divi-plus' ),
			),
			'mask_image'               => array(
				'label'              => esc_html__( 'Upload Image to be Masked', 'divi-plus' ),
				'type'               => 'upload',
				'option_category'    => 'configuration',
				'upload_button_text' => esc_attr__( 'Upload an image', 'divi-plus' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'divi-plus' ),
				'update_text'        => esc_attr__( 'Set As Image', 'divi-plus' ),
				'show_if'            => array(
					'mask_on' => 'image',
				),
				'tab_slug'           => 'general',
				'toggle_slug'        => 'main_content',
				'description'        => esc_html__( 'Here you can set the image to be masked.', 'divi-plus' ),
			),
			'mask_image_alt'           => array(
				'label'           => esc_html__( 'Image Alt Text', 'divi-plus' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'show_if'         => array(
					'mask_on' => 'image',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Define the HTML ALT text for your image here.', 'divi-plus' ),
			),
			'mask_background_color'    => array(
				'label'             => esc_html__( 'Background to be Masked', 'divi-plus' ),
				'type'              => 'background-field',
				'base_name'         => 'mask_background',
				'context'           => 'mask_background_color',
				'option_category'   => 'button',
				'custom_color'      => true,
				'background_fields' => $this->generate_background_options( 'mask_background', 'button', 'advanced', 'main_content', 'mask_background_color' ),
				'show_if'           => array(
					'mask_on' => 'background',
				),
				'mobile_options'    => true,
				'tab_slug'          => 'general',
				'toggle_slug'       => 'main_content',
				'description'       => esc_html__( 'Here you can set the background to be masked.', 'divi-plus' ),
			),
			'mask_type'                => array(
				'label'           => esc_html__( 'Mask Type', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'arrow'   => esc_html__( 'Arrow', 'divi-plus' ),
					'circle'  => esc_html__( 'Circle', 'divi-plus' ),
					'fluid'   => esc_html__( 'Fluid', 'divi-plus' ),
					'heart'   => esc_html__( 'Heart', 'divi-plus' ),
					'leaf'    => esc_html__( 'Leaf', 'divi-plus' ),
					'music'   => esc_html__( 'Music', 'divi-plus' ),
					'shield'  => esc_html__( 'Shield', 'divi-plus' ),
					'speech'  => esc_html__( 'Speech Bubble', 'divi-plus' ),
					'splodge' => esc_html__( 'Splodge', 'divi-plus' ),
					'star'    => esc_html__( 'Star', 'divi-plus' ),
					'square'  => esc_html__( 'Square', 'divi-plus' ),
					'no_mask' => esc_html__( 'No Mask', 'divi-plus' ),
				),
				'default'         => 'arrow',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can set the mask type.', 'divi-plus' ),
			),
			'arrow_style'              => array(
				'label'           => esc_html__( 'Arrow Style', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'arrow_1'  => esc_html__( 'Arrow 1', 'divi-plus' ),
					'arrow_2'  => esc_html__( 'Arrow 2', 'divi-plus' ),
					'arrow_3'  => esc_html__( 'Arrow 3', 'divi-plus' ),
					'arrow_4'  => esc_html__( 'Arrow 4', 'divi-plus' ),
					'arrow_5'  => esc_html__( 'Arrow 5', 'divi-plus' ),
					'arrow_6'  => esc_html__( 'Arrow 6', 'divi-plus' ),
					'arrow_7'  => esc_html__( 'Arrow 7', 'divi-plus' ),
					'arrow_8'  => esc_html__( 'Arrow 8', 'divi-plus' ),
					'arrow_9'  => esc_html__( 'Arrow 9', 'divi-plus' ),
					'arrow_10' => esc_html__( 'Arrow 10', 'divi-plus' ),
					'arrow_11' => esc_html__( 'Arrow 11', 'divi-plus' ),
				),
				'default'         => 'arrow_1',
				'show_if'         => array(
					'mask_type' => 'arrow',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can set the arrow style.', 'divi-plus' ),
			),
			'circle_style'             => array(
				'label'           => esc_html__( 'Circle Style', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'circle_1' => esc_html__( 'Circle 1', 'divi-plus' ),
					'circle_2' => esc_html__( 'Circle 2', 'divi-plus' ),
				),
				'default'         => 'circle_1',
				'show_if'         => array(
					'mask_type' => 'circle',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can set the circle style.', 'divi-plus' ),
			),
			'fluid_style'              => array(
				'label'           => esc_html__( 'Fluid Style', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'fluid_1'  => esc_html__( 'Fluid 1', 'divi-plus' ),
					'fluid_2'  => esc_html__( 'Fluid 2', 'divi-plus' ),
					'fluid_3'  => esc_html__( 'Fluid 3', 'divi-plus' ),
					'fluid_4'  => esc_html__( 'Fluid 4', 'divi-plus' ),
					'fluid_5'  => esc_html__( 'Fluid 5', 'divi-plus' ),
					'fluid_6'  => esc_html__( 'Fluid 6', 'divi-plus' ),
					'fluid_7'  => esc_html__( 'Fluid 7', 'divi-plus' ),
					'fluid_8'  => esc_html__( 'Fluid 8', 'divi-plus' ),
					'fluid_9'  => esc_html__( 'Fluid 9', 'divi-plus' ),
					'fluid_10' => esc_html__( 'Fluid 10', 'divi-plus' ),
					'fluid_11' => esc_html__( 'Fluid 11', 'divi-plus' ),
					'fluid_12' => esc_html__( 'Fluid 12', 'divi-plus' ),
				),
				'default'         => 'fluid_1',
				'show_if'         => array(
					'mask_type' => 'fluid',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can set the fluid style.', 'divi-plus' ),
			),
			'heart_style'              => array(
				'label'           => esc_html__( 'Heart Style', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'heart_1' => esc_html__( 'Heart 1', 'divi-plus' ),
					'heart_2' => esc_html__( 'Heart 2', 'divi-plus' ),
					'heart_3' => esc_html__( 'Heart 3', 'divi-plus' ),
					'heart_4' => esc_html__( 'Heart 4', 'divi-plus' ),
					'heart_5' => esc_html__( 'Heart 5', 'divi-plus' ),
					'heart_6' => esc_html__( 'Heart 6', 'divi-plus' ),
				),
				'default'         => 'heart_1',
				'show_if'         => array(
					'mask_type' => 'heart',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can set the heart style.', 'divi-plus' ),
			),
			'hexagon_style'            => array(
				'label'           => esc_html__( 'Hexagon Style', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'hexagon_1' => esc_html__( 'Hexagon 1', 'divi-plus' ),
					'hexagon_2' => esc_html__( 'Hexagon 2', 'divi-plus' ),
					'hexagon_3' => esc_html__( 'Hexagon 3', 'divi-plus' ),
					'hexagon_4' => esc_html__( 'Hexagon 4', 'divi-plus' ),
					'hexagon_5' => esc_html__( 'Hexagon 5', 'divi-plus' ),
					'hexagon_6' => esc_html__( 'Hexagon 6', 'divi-plus' ),
				),
				'default'         => 'hexagon_1',
				'show_if'         => array(
					'mask_type' => 'hexagon',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can set the hexagon style.', 'divi-plus' ),
			),
			'leaf_style'               => array(
				'label'           => esc_html__( 'Leaf Style', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'leaf_1' => esc_html__( 'Leaf 1', 'divi-plus' ),
					'leaf_2' => esc_html__( 'Leaf 2', 'divi-plus' ),
					'leaf_3' => esc_html__( 'Leaf 3', 'divi-plus' ),
					'leaf_4' => esc_html__( 'Leaf 4', 'divi-plus' ),
				),
				'default'         => 'leaf_1',
				'show_if'         => array(
					'mask_type' => 'leaf',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can set the leaf style.', 'divi-plus' ),
			),
			'music_style'              => array(
				'label'           => esc_html__( 'Music Style', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'music_1' => esc_html__( 'Music 1', 'divi-plus' ),
					'music_2' => esc_html__( 'Music 2', 'divi-plus' ),
					'music_3' => esc_html__( 'Music 3', 'divi-plus' ),
					'music_4' => esc_html__( 'Music 4', 'divi-plus' ),
					'music_5' => esc_html__( 'Music 5', 'divi-plus' ),
				),
				'default'         => 'music_1',
				'show_if'         => array(
					'mask_type' => 'music',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can set the music style.', 'divi-plus' ),
			),
			'shield_style'             => array(
				'label'           => esc_html__( 'Shield Style', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'shield_1' => esc_html__( 'Shield 1', 'divi-plus' ),
					'shield_2' => esc_html__( 'Shield 2', 'divi-plus' ),
				),
				'default'         => 'shield_1',
				'show_if'         => array(
					'mask_type' => 'shield',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can set the shield style.', 'divi-plus' ),
			),
			'speech_style'             => array(
				'label'           => esc_html__( 'Speech Style', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'speech_1' => esc_html__( 'Speech 1', 'divi-plus' ),
					'speech_2' => esc_html__( 'Speech 2', 'divi-plus' ),
					'speech_3' => esc_html__( 'Speech 3', 'divi-plus' ),
				),
				'default'         => 'speech_1',
				'show_if'         => array(
					'mask_type' => 'speech',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can set the speech style.', 'divi-plus' ),
			),
			'splodge_style'            => array(
				'label'           => esc_html__( 'Splodge Style', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'splodge_1' => esc_html__( 'Splodge 1', 'divi-plus' ),
					'splodge_2' => esc_html__( 'Splodge 2', 'divi-plus' ),
					'splodge_3' => esc_html__( 'Splodge 3', 'divi-plus' ),
					'splodge_4' => esc_html__( 'Splodge 4', 'divi-plus' ),
				),
				'default'         => 'splodge_1',
				'show_if'         => array(
					'mask_type' => 'splodge',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can set the splodge style.', 'divi-plus' ),
			),
			'star_style'               => array(
				'label'           => esc_html__( 'Star Style', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'star_1' => esc_html__( 'Star 1', 'divi-plus' ),
					'star_2' => esc_html__( 'Star 2', 'divi-plus' ),
					'star_3' => esc_html__( 'Star 3', 'divi-plus' ),
					'star_4' => esc_html__( 'Star 4', 'divi-plus' ),
					'star_5' => esc_html__( 'Star 5', 'divi-plus' ),
				),
				'default'         => 'star_1',
				'show_if'         => array(
					'mask_type' => 'star',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can set the star style.', 'divi-plus' ),
			),
			'square_style'             => array(
				'label'           => esc_html__( 'Square Style', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'square_1' => esc_html__( 'Square 1', 'divi-plus' ),
					'square_2' => esc_html__( 'Square 2', 'divi-plus' ),
					'square_3' => esc_html__( 'Square 3', 'divi-plus' ),
					'square_4' => esc_html__( 'Square 4', 'divi-plus' ),
				),
				'default'         => 'square_1',
				'show_if'         => array(
					'mask_type' => 'square',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can set the square style.', 'divi-plus' ),
			),
			'mask_width'               => array(
				'label'          => esc_html__( 'Mask Width', 'divi-plus' ),
				'type'           => 'range',
				'range_settings' => array(
					'min'  => '0',
					'max'  => '100',
					'step' => '1',
				),
				'mobile_options' => true,
				'default'        => '100%',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'mask_settings',
				'description'    => esc_html__( 'Here you can select mask width', 'divi-plus' ),
			),
			'mask_height'              => array(
				'label'          => esc_html__( 'Mask Height', 'divi-plus' ),
				'type'           => 'range',
				'range_settings' => array(
					'min'  => '0',
					'max'  => '3000',
					'step' => '1',
				),
				'show_if'        => array(
					'mask_on' => 'background',
				),
				'mobile_options' => true,
				'default'        => '500px',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'mask_settings',
				'description'    => esc_html__( 'Here you can select mask height', 'divi-plus' ),
			),
			'scale_mask'               => array(
				'label'          => esc_html__( 'Scale Mask', 'divi-plus' ),
				'type'           => 'range',
				'range_settings' => array(
					'min'  => '0',
					'max'  => '1',
					'step' => '0.05',
				),
				'unitless'       => true,
				'default'        => '1',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'mask_settings',
				'description'    => esc_html__( 'Here you can scale the mask.', 'divi-plus' ),
			),
			'rotate_mask'              => array(
				'label'          => esc_html__( 'Rotate Mask', 'divi-plus' ),
				'type'           => 'range',
				'range_settings' => array(
					'min'  => '0',
					'max'  => '360',
					'step' => '1',
				),
				'default'        => '0deg',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'mask_settings',
				'description'    => esc_html__( 'Here you can rotate the mask.', 'divi-plus' ),
			),
			'horizontal_mask_position' => array(
				'label'          => esc_html__( 'Horizontal Mask Position', 'divi-plus' ),
				'type'           => 'range',
				'range_settings' => array(
					'min'  => '0',
					'max'  => '100',
					'step' => '1',
				),
				'default'        => '0%',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'mask_settings',
				'description'    => esc_html__( 'Here you can set the mask position horizontally.', 'divi-plus' ),
			),
			'vertical_mask_position'   => array(
				'label'          => esc_html__( 'Vertical Mask Position', 'divi-plus' ),
				'type'           => 'range',
				'range_settings' => array(
					'min'  => '0',
					'max'  => '100',
					'step' => '1',
				),
				'default'        => '0%',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'mask_settings',
				'description'    => esc_html__( 'Here you can set the mask position vertically.', 'divi-plus' ),
			),
		);

		$dipl_image_mask_fields = array_merge( $dipl_image_mask_fields, $this->generate_background_options( 'mask_background', 'skip', 'general', 'main_content', 'mask_background_color' ) );

		return $dipl_image_mask_fields;
	}

	public function render( $attrs, $content, $render_slug ) {

		$mask_on                  = esc_attr( $this->props['mask_on'] );
		$mask_image               = esc_attr( $this->props['mask_image'] );
		$mask_image_alt           = esc_attr( $this->props['mask_image_alt'] );
		$mask_type                = esc_attr( $this->props['mask_type'] );
		$arrow_style              = esc_attr( $this->props['arrow_style'] );
		$circle_style             = esc_attr( $this->props['circle_style'] );
		$fluid_style              = esc_attr( $this->props['fluid_style'] );
		$heart_style              = esc_attr( $this->props['heart_style'] );
		$hexagon_style            = esc_attr( $this->props['hexagon_style'] );
		$leaf_style               = esc_attr( $this->props['leaf_style'] );
		$music_style              = esc_attr( $this->props['music_style'] );
		$shield_style             = esc_attr( $this->props['shield_style'] );
		$speech_style             = esc_attr( $this->props['speech_style'] );
		$splodge_style            = esc_attr( $this->props['splodge_style'] );
		$star_style               = esc_attr( $this->props['star_style'] );
		$square_style             = esc_attr( $this->props['square_style'] );
		$mask_width               = et_pb_responsive_options()->get_property_values( $this->props, 'mask_width' );
		$mask_height              = et_pb_responsive_options()->get_property_values( $this->props, 'mask_height' );
		$scale_mask               = floatval( $this->props['scale_mask'] );
		$rotate_mask              = esc_attr( $this->props['rotate_mask'] );
		$horizontal_mask_position = esc_attr( $this->props['horizontal_mask_position'] );
		$vertical_mask_position   = esc_attr( $this->props['vertical_mask_position'] );
		$content                  = ( '' !== $this->content ) ? $this->content : '';

		if ( '' !== $scale_mask ) {
			$scale = sprintf( 'scale(%1$s)', esc_attr( $scale_mask ) );
		}

		if ( '' !== $rotate_mask ) {
			$rotate = sprintf( 'rotate(%1$s)', esc_attr( $rotate_mask ) );
		}

		if ( ! empty( array_filter( $mask_width ) ) && 'no_mask' !== $mask_type ) {
			et_pb_responsive_options()->generate_responsive_css( $mask_width, '%%order_class%% .dipl_image_mask_container .dipl_image_mask_inner', 'width', $render_slug, '', 'type' );
		}

		if ( ( '' !== $scale || '' !== $rotate ) && 'no_mask' !== $mask_type ) {
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl_image_mask_container .dipl_image_mask_inner',
					'declaration' => sprintf( 'transform: %1$s %2$s;', esc_attr( $scale ), esc_attr( $rotate ) ),
				)
			);
		}

		if ( '' !== $horizontal_mask_position && 'no_mask' !== $mask_type ) {
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl_image_mask_container .dipl_image_mask_inner',
					'declaration' => sprintf( '-webkit-mask-position-x: %1$s;', esc_attr( $horizontal_mask_position ) ),
				)
			);
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl_image_mask_container .dipl_image_mask_inner',
					'declaration' => sprintf( '-moz-mask-position-x: %1$s;', esc_attr( $horizontal_mask_position ) ),
				)
			);
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl_image_mask_container .dipl_image_mask_inner',
					'declaration' => sprintf( '-o-mask-position-x: %1$s;', esc_attr( $horizontal_mask_position ) ),
				)
			);
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl_image_mask_container .dipl_image_mask_inner',
					'declaration' => sprintf( 'mask-position-x: %1$s;', esc_attr( $horizontal_mask_position ) ),
				)
			);
		}

		if ( '' !== $vertical_mask_position && 'no_mask' !== $mask_type ) {
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl_image_mask_container .dipl_image_mask_inner',
					'declaration' => sprintf( '-webkit-mask-position-y: %1$s;', esc_attr( $vertical_mask_position ) ),
				)
			);
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl_image_mask_container .dipl_image_mask_inner',
					'declaration' => sprintf( '-moz-mask-position-y: %1$s;', esc_attr( $vertical_mask_position ) ),
				)
			);
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl_image_mask_container .dipl_image_mask_inner',
					'declaration' => sprintf( '-o-mask-position-y: %1$s;', esc_attr( $vertical_mask_position ) ),
				)
			);
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl_image_mask_container .dipl_image_mask_inner',
					'declaration' => sprintf( 'mask-position-y: %1$s;', esc_attr( $vertical_mask_position ) ),
				)
			);
		}

		if ( '' !== $mask_type && 'no_mask' !== $mask_type ) {
			$base_url = get_site_url() . '/wp-content/plugins/divi-plus/includes/assets/image_mask/';
			if ( 'circle' === $mask_type ) {
				$mask_url = $base_url . $mask_type . '/' . $circle_style . '.svg';
			} elseif ( 'fluid' === $mask_type ) {
				$mask_url = $base_url . $mask_type . '/' . $fluid_style . '.svg';
			} elseif ( 'heart' === $mask_type ) {
				$mask_url = $base_url . $mask_type . '/' . $heart_style . '.svg';
			} elseif ( 'hexagon' === $mask_type ) {
				$mask_url = $base_url . $mask_type . '/' . $hexagon_style . '.svg';
			} elseif ( 'leaf' === $mask_type ) {
				$mask_url = $base_url . $mask_type . '/' . $leaf_style . '.svg';
			} elseif ( 'music' === $mask_type ) {
				$mask_url = $base_url . $mask_type . '/' . $music_style . '.svg';
			} elseif ( 'shield' === $mask_type ) {
				$mask_url = $base_url . $mask_type . '/' . $shield_style . '.svg';
			} elseif ( 'speech' === $mask_type ) {
				$mask_url = $base_url . $mask_type . '/' . $speech_style . '.svg';
			} elseif ( 'splodge' === $mask_type ) {
				$mask_url = $base_url . $mask_type . '/' . $splodge_style . '.svg';
			} elseif ( 'star' === $mask_type ) {
				$mask_url = $base_url . $mask_type . '/' . $star_style . '.svg';
			} elseif ( 'square' === $mask_type ) {
				$mask_url = $base_url . $mask_type . '/' . $square_style . '.svg';
			} else {
				$mask_url = $base_url . $mask_type . '/' . $arrow_style . '.svg';
			}

			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl_image_mask_container .dipl_image_mask_inner',
					'declaration' => sprintf( '-webkit-mask-image: url(%1$s);', esc_attr( $mask_url ) ),
				)
			);
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl_image_mask_container .dipl_image_mask_inner',
					'declaration' => sprintf( '-moz-mask-image: url(%1$s);', esc_attr( $mask_url ) ),
				)
			);
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl_image_mask_container .dipl_image_mask_inner',
					'declaration' => sprintf( '-o-mask-image: url(%1$s);', esc_attr( $mask_url ) ),
				)
			);
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl_image_mask_container .dipl_image_mask_inner',
					'declaration' => sprintf( 'mask-image: url(%1$s);', esc_attr( $mask_url ) ),
				)
			);
		}

		if ( 'image' === $mask_on ) {
			$output = sprintf( '<div class="dipl_image_mask_container"><div class="dipl_image_mask_inner"><img src="%1$s" alt="%3$s"/></div>%2$s</div>', $mask_image, $content, $mask_image_alt );

		} else {
			if ( ! empty( array_filter( $mask_height ) ) ) {
				et_pb_responsive_options()->generate_responsive_css( $mask_height, '%%order_class%% .dipl_image_mask_container .dipl_image_mask_inner', 'height', $render_slug, '', 'type' );
			}
			$options = array( 'dipl_image_mask_inner' => 'mask_background' );
			$this->process_custom_background( $render_slug, $options );
			$output = sprintf( '<div class="dipl_image_mask_container"><div class="dipl_image_mask_inner"></div>%1$s</div>', $content );
		}

		$file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        wp_enqueue_style( 'dipl-image-mask-style', PLUGIN_PATH . 'includes/modules/ImageMask/' . $file . '.min.css', array(), '1.0.1' );

		return $output;
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

	public function add_new_child_text() {
		return esc_html__( 'Add Element', 'divi-plus' );
	}
}

$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
	$modules = explode( ',', $plugin_options['dipl-modules'] );
	if ( in_array( 'dipl_image_mask', $modules ) ) {
		new DIPL_ImageMask();
	}
} else {
	new DIPL_ImageMask();
}
