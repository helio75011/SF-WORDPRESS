<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.4
 */
class DIPL_FloatingImageItem extends ET_Builder_Module {

	public $slug       = 'dipl_floating_image_item';
	public $type       = 'child';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name                        = esc_html__( 'DP Floating Image Item', 'divi-plus' );
		$this->advanced_setting_title_text = esc_html__( 'Floating Image Item', 'divi-plus' );
		$this->child_title_var             = 'image_alt';
		$this->main_css_element            = '.dipl_floating_image %%order_class%%';
		if ( is_archive() ) {
            $this->main_css_element = '%%order_class%%';
        }
	}

	public function get_settings_modal_toggles() {
		return array(
			'general' => array(
				'toggles' => array(
					'main_content'    => array(
						'title' => esc_html__( 'Content', 'divi-plus' ),
					),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'image_position'  => array(
						'title' => esc_html__( 'Image Position', 'divi-plus' ),
					),
					'image_animation' => array(
						'title' => esc_html__( 'Image Animation', 'divi-plus' ),
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
			'text'           => false,
			'text_shadow'    => false,
			'height'         => false,
			'max_width'		 => array(
				'use_module_alignment' => false,
			),
			'transform'      => false,
		);

	}

	public function get_fields() {

		$fields = array(
			'image'                  => array(
				'label'              => esc_html__( 'Image', 'divi-plus' ),
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'dynamic_content'    => 'image',
				'upload_button_text' => esc_attr__( 'Upload an image', 'divi-plus' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'divi-plus' ),
				'update_text'        => esc_attr__( 'Set As Image', 'divi-plus' ),
				'tab_slug'           => 'general',
				'toggle_slug'        => 'main_content',
				'description'        => esc_html__( 'Upload an image to display.', 'divi-plus' ),
			),
			'image_alt'              => array(
				'label'           => esc_html__( 'Image Alt Text', 'divi-plus' ),
				'type'            => 'text',
				'dynamic_content' => 'text',
				'option_category' => 'basic_option',
				'depends_show_if' => 'on',
				'depends_on'      => array(
					'image',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Define the HTML ALT text for your image here.', 'divi-plus' ),
			),
			'floatingimage_effect'   => array(
				'label'            => esc_html__( 'Floating Effect', 'divi-plus' ),
				'type'             => 'select',
				'option_category'  => 'basic_option',
				'options'          => array(
					'up-down'    => esc_html__( 'Up Down', 'divi-plus' ),
					'left-right' => esc_html__( 'Left Right', 'divi-plus' ),
					'no-effect'  => esc_html__( 'No Effect', 'divi-plus' ),
				),
				'default'          => 'up-down',
				'default_on_front' => 'up-down',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'image_animation',
				'description'      => esc_html__( 'Here you can select the floating image effect.', 'divi-plus' ),
			),
			'floatingimage_delay'    => array(
				'label'            => esc_html__( 'Animation Delay', 'divi-plus' ),
				'type'             => 'range',
				'option_category'  => 'basic_option',
				'range_settings'   => array(
					'min'  => '0',
					'max'  => '5000',
					'step' => '1',
				),
				'show_if_not'      => array(
					'floatingimage_effect' => 'no-effect',
				),
				'default'          => '0ms',
				'default_on_front' => '0ms',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'image_animation',
				'description'      => esc_html__( 'Here you can select the image animation delay ( in ms ).', 'divi-plus' ),
			),
			'floatingimage_duration' => array(
				'label'            => esc_html__( 'Animation Duration', 'divi-plus' ),
				'type'             => 'range',
				'option_category'  => 'basic_option',
				'range_settings'   => array(
					'min'  => '0',
					'max'  => '9000',
					'step' => '1',
				),
				'show_if_not'      => array(
					'floatingimage_effect' => 'no-effect',
				),
				'default'          => '4000ms',
				'default_on_front' => '4000ms',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'image_animation',
				'description'      => esc_html__( 'Here you can select the image animation speed ( in ms ).', 'divi-plus' ),
			),
			'animation_speedcurve'   => array(
				'label'            => esc_html__( 'Animation Speed Curve', 'divi-plus' ),
				'type'             => 'select',
				'option_category'  => 'basic_option',
				'options'          => array(
					'ease-in-out' => esc_html__( 'Ease-In-Out', 'divi-plus' ),
					'ease'        => esc_html__( 'Ease', 'divi-plus' ),
					'ease-in'     => esc_html__( 'Ease-In', 'divi-plus' ),
					'ease-out'    => esc_html__( 'Ease-Out', 'divi-plus' ),
					'linear'      => esc_html__( 'Linear', 'divi-plus' ),
				),
				'show_if_not'      => array(
					'floatingimage_effect' => 'no-effect',
				),
				'default'          => 'ease-in-out',
				'default_on_front' => 'ease-in-out',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'image_animation',
				'description'      => esc_html__( 'Here you can adjust the easing method of your animation. Easing your animation in and out will create a smoother effect when compared to a linear speed curve.', 'divi-plus' ),
			),
			'animation_repeat'       => array(
				'label'            => esc_html__( 'Animation Repeat', 'divi-plus' ),
				'type'             => 'select',
				'option_category'  => 'basic_option',
				'options'          => array(
					'infinite' => esc_html__( 'Infinite', 'divi-plus' ),
					'initial'  => esc_html__( 'Initial', 'divi-plus' ),
				),
				'show_if_not'      => array(
					'floatingimage_effect' => 'no-effect',
				),
				'default'          => 'infinite',
				'default_on_front' => 'infinite',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'image_animation',
				'description'      => esc_html__( 'Here you can adjust animation to play once or in loop.', 'divi-plus' ),
			),
			'horizontal_align'       => array(
				'label'           => esc_html__( 'Horizontal Align', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'mobile_options'  => true,
				'validate_unit'   => true,
				'default'         => '0%',
				'default_unit'    => '%',
				'range_settings'  => array(
					'min'  => '-100',
					'max'  => '100',
					'step' => '1',
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'image_position',
				'description'     => esc_html__( 'Here you can adjust animation to play once or in loop.', 'divi-plus' ),
			),
			'vertical_align'         => array(
				'label'           => esc_html__( 'Vertical Align', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'mobile_options'  => true,
				'validate_unit'   => true,
				'default'         => '0%',
				'default_unit'    => '%',
				'range_settings'  => array(
					'min'  => '-100',
					'max'  => '100',
					'step' => '1',
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'image_position',
				'description'     => esc_html__( 'Here you can adjust animation to play once or in loop.', 'divi-plus' ),
			),
		);

		return $fields;
	}

	public function render( $attrs, $content, $render_slug ) {
		
		$multi_view             = et_pb_multi_view_options( $this );
		$floatingimage_effect   = $this->props['floatingimage_effect'] ? $this->props['floatingimage_effect'] : 'up-down';
		$floatingimage_delay    = $this->props['floatingimage_delay'] ? $this->props['floatingimage_delay'] : '0ms';
		$floatingimage_duration = $this->props['floatingimage_duration'] ? $this->props['floatingimage_duration'] : '4000ms';
		$animation_repeat       = $this->props['animation_repeat'] ? $this->props['animation_repeat'] : 'infinite';
		$animation_speedcurve   = $this->props['animation_speedcurve'] ? $this->props['animation_speedcurve'] : 'ease-in-out';
		$horizontal_align       = et_pb_responsive_options()->get_property_values( $this->props, 'horizontal_align' );
		$vertical_align         = et_pb_responsive_options()->get_property_values( $this->props, 'vertical_align' );
		$image                  = $this->props['image'];
		$image_alt              = esc_attr( $this->props['image_alt'] ) ? esc_attr( $this->props['image_alt'] ) : '';

		if ( ! empty( array_filter( $horizontal_align ) ) ) {
			et_pb_responsive_options()->generate_responsive_css( $horizontal_align, '%%order_class%%.dipl_floating_image_item', 'left', $render_slug, '', 'type' );
		}

		if ( ! empty( array_filter( $vertical_align ) ) ) {
			et_pb_responsive_options()->generate_responsive_css( $vertical_align, '%%order_class%%.dipl_floating_image_item', 'top', $render_slug, '', 'type' );
		}

		if ( 'no-effect' !== $floatingimage_effect ) {
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%.dipl_floating_image_item',
					'declaration' => sprintf(
						'animation: dipl-float-%1$s %2$s alternate %3$s %4$s;',
						esc_attr( $floatingimage_effect ),
						esc_attr( $floatingimage_duration ),
						esc_attr( $animation_repeat ),
						esc_attr( $animation_speedcurve )
					),
				)
			);
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%.dipl_floating_image_item',
					'declaration' => sprintf(
						'animation-delay: %1$s;',
						esc_attr( $floatingimage_delay )
					),
				)
			);
		}

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

		if ( '' !== $image ) {
			$image_wrapper = sprintf(
				'%1$s',
				et_core_intentionally_unescaped( $image, 'html' )
			);
		}

		$file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        wp_enqueue_style( 'dipl-floating-image-item-style', PLUGIN_PATH . 'includes/modules/FloatingImageItem/' . $file . '.min.css', array(), '1.0.0' );

		return $image_wrapper;
	}
}
$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
	$modules = explode( ',', $plugin_options['dipl-modules'] );
	if ( in_array( 'dipl_floating_image', $modules, true ) ) {
		new DIPL_FloatingImageItem();
	}
} else {
	new DIPL_FloatingImageItem();
}
