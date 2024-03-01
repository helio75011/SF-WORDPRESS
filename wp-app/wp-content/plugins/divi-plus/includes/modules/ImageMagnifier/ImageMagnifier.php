<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.4
 */
class DIPL_ImageMagnifier extends ET_Builder_Module {

	public $slug       = 'dipl_image_magnifier';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name = esc_html__( 'DP Image Magnifier', 'divi-plus' );
		$this->main_css_element = '%%order_class%%';
	}

	public function get_settings_modal_toggles() {
		return array(
			'general' => array(
				'toggles' => array(
					'main_content'    => array(
						'title' => esc_html__( 'Image', 'divi-plus' ),
					),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'text' => array(
						'title' => esc_html__( 'Image Alignment', 'divi-plus' ),
					),
					'magnifier_setting'    => array(
						'title' => esc_html__( 'Magnifier Setting', 'divi-plus' ),
					),
				),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts'          => false,
			'margin_padding' => array(
				'css' => array(
					'margin'    => $this->main_css_element,
					'padding'   => $this->main_css_element,
					'important' => 'all',
				),
			),
			'text' => array(
				'text_orientation' => array(
					'exclude_options' => array( 'justified' ),
				),
				'options' => array(
					'text_orientation' => array(
						'label' => esc_html__( 'Alignment', 'divi-plus' ),
					),
				),
				'css' => array(
					'text_orientation' => $this->main_css_element,
				),
			),
			'text_shadow'    => false,
			'height'         => false,
		);
	}

	public function get_fields() {

		$fields = array(
			'image'                  => array(
				'label'              => esc_html__( 'Image', 'divi-plus' ),
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'upload_button_text' => esc_attr__( 'Upload an image', 'divi-plus' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'divi-plus' ),
				'update_text'        => esc_attr__( 'Set As Image', 'divi-plus' ),
				'dynamic_content' 	 => 'image',
				'tab_slug'           => 'general',
				'toggle_slug'        => 'main_content',
				'description'        => esc_html__( 'Upload an image to display.', 'divi-plus' ),
			),
			'image_alt'              => array(
				'label'           => esc_html__( 'Image Alt Text', 'divi-plus' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'depends_show_if' => 'on',
				'depends_on'      => array(
					'image',
				),
				'dynamic_content' 	 => 'text',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Define the HTML ALT text for your image here.', 'divi-plus' ),
			),
			'lens_size'    => array(
				'label'            => esc_html__( 'Lens Size', 'divi-plus' ),
				'type'             => 'range',
				'option_category'  => 'basic_option',
				'default_unit'    => 'px',
				'range_settings'   => array(
					'min'  => '100',
					'max'  => '600',
					'step' => '1',
				),
				'mobile_options'   => true,
				'default'          => '200px',
				'default_on_front' => '200px',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'magnifier_setting',
				'description'      => esc_html__( 'Here you can set the lens size.', 'divi-plus' ),
			),
			'lens_speed'    => array(
				'label'            => esc_html__( 'Lens Speed', 'divi-plus' ),
				'type'             => 'range',
				'option_category'  => 'basic_option',
				'range_settings'   => array(
					'min'  => '100',
					'max'  => '1000',
					'step' => '1',
				),
				'default'          => '100',
				'default_on_front' => '100',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'magnifier_setting',
				'description'      => esc_html__( 'Here you can set the lens speed.', 'divi-plus' ),
			),
			'lens_border_width'    => array(
				'label'            => esc_html__( 'Lens Border Width', 'divi-plus' ),
				'type'             => 'range',
				'option_category'  => 'basic_option',
				'default_unit'    => 'px',
				'range_settings'   => array(
					'min'  => '1',
					'max'  => '50',
					'step' => '1',
				),
				'default'          => '5px',
				'default_on_front' => '5px',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'magnifier_setting',
				'description'      => esc_html__( 'Here you can set the lens border width.', 'divi-plus' ),
			),
			'lens_border_color'            => array(
				'label'        => esc_html__( 'Lens Border Color', 'divi-plus' ),
				'type'         => 'color-alpha',
				'hover'        => 'tabs',
				'custom_color' => true,
				'default'      => '#ffffff',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'magnifier_setting',
				'description'  => esc_html__( 'Here you can set lens border color.', 'divi-plus' ),
			),
		);

		return $fields;
	}

	public function render( $attrs, $content, $render_slug ) {

		$multi_view     		= et_pb_multi_view_options( $this );
		$image          		= esc_attr( $this->props['image'] );
		$image_alt      		= esc_attr( $this->props['image_alt'] ) ? esc_attr( $this->props['image_alt'] ) : '';
		$lens_size 				= et_pb_responsive_options()->get_property_values( $this->props, 'lens_size' );
		$lens_speed 			= esc_attr( intval( $this->props['lens_speed'] ) ); 
		$lens_border_width 		= esc_attr( $this->props['lens_border_width'] );
		$lens_border_color 		= esc_attr( $this->props['lens_border_color'] );
		$src_pathinfo 			= pathinfo( $image );
		$is_src_svg   			= isset( $src_pathinfo['extension'] ) ? 'svg' === $src_pathinfo['extension'] : false;

		wp_enqueue_script( 'elicus-magnify-script' );
        wp_enqueue_script( 'elicus-magnify-mobile-script' );
        wp_enqueue_style( 'elicus-magnify-style' );
        wp_enqueue_script( 'dipl-image-magnifier-custom', PLUGIN_PATH."includes/modules/ImageMagnifier/dipl-image-magnifier-custom.min.js", array('jquery'), '1.0.0', true );
        $file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
		wp_enqueue_style( 'dipl-image-magnifier-style', PLUGIN_PATH . 'includes/modules/ImageMagnifier/' . $file . '.min.css', array(), '1.0.0' );

		if ( $is_src_svg ) {
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%',
					'declaration' => 'width: 100%;',
				)
			);
		}

		if ( ! empty( array_filter( $lens_size ) ) ) {
			et_pb_responsive_options()->generate_responsive_css( $lens_size, '%%order_class%% .magnify > .magnify-lens', 'width', $render_slug, '', 'type' );
			et_pb_responsive_options()->generate_responsive_css( $lens_size, '%%order_class%% .magnify > .magnify-lens', 'height', $render_slug, '', 'type' );
		}

		if ( '' !== $lens_border_color && '' !== $lens_border_width ) {
			self::set_style(
				$render_slug,
				array(
	                'selector' => "%%order_class%% .magnify .magnify-lens",
	                'declaration' => sprintf(
	                    'box-shadow: 0 0 0 %1$s %2$s, 0 0 %1$s %1$s rgba(0, 0, 0, 0.25), inset 0 0 40px 2px rgba(0, 0, 0, 0.25);',
	                    $lens_border_width,
	                    $lens_border_color
	                )
            ));
		}

		$image = $multi_view->render_element(
			array(
				'tag'      => 'img',
				'attrs'    => array(
					'src' => '{{image}}',
					'alt' => $image_alt,
					'class' => 'zoom',
					'data-magnify-src' => $this->props['image'],
					'data-magnify-speed' => $lens_speed
				),
				'required' => 'image',
			)
		);

		if ( '' !== $image ) {
			$output = sprintf(
				'%1$s',
				et_core_intentionally_unescaped( $image, 'html' )
			);
		}

		return $output;
	}
}

$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
	$modules = explode( ',', $plugin_options['dipl-modules'] );
	if ( in_array( 'dipl_image_magnifier', $modules, true ) ) {
		new DIPL_ImageMagnifier();
	}
} else {
	new DIPL_ImageMagnifier();
}
