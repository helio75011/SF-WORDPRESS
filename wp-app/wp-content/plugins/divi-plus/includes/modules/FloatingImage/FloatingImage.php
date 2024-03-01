<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.4
 */
class DIPL_FloatingImage extends ET_Builder_Module {

	public $slug       = 'dipl_floating_image';
	public $child_slug = 'dipl_floating_image_item';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name             = esc_html__( 'DP Floating Image', 'divi-plus' );
		$this->child_item_text  = esc_html__( 'Image', 'divi-plus' );
		$this->main_css_element = '%%order_class%%';
	}

	public function get_settings_modal_toggles() {
		return array(
			'general' => array(
				'toggles' => array(
					'main_content' => array(
						'title' => esc_html__( 'Container', 'divi-plus' ),
					),
				),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'margin_padding' => array(
				'css' => array(
					'margin'    => $this->main_css_element,
					'padding'   => $this->main_css_element,
					'important' => 'all',
				),
			),
			'fonts'        => false,
			'text'         => false,
			'button'       => false,
		);

	}

	public function get_fields() {

		return array(
			'floating_container_height' => array(
				'label'            => esc_html__( 'Container Height', 'divi-plus' ),
				'type'             => 'range',
				'option_category'  => 'basic_option',
				'validate_unit'    => true,
				'default'          => '450px',
				'default_unit'     => 'px',
				'default_on_front' => '450px',
				'range_settings'   => array(
					'min'  => '1',
					'max'  => '2000',
					'step' => '1',
				),
				'mobile_options'   => true,
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Here you can input floating image container height.', 'divi-plus' ),
			),
		);
	}

	public function render( $attrs, $content, $render_slug ) {

		$floating_container_height = et_pb_responsive_options()->get_property_values( $this->props, 'floating_container_height' );

		if ( ! empty( array_filter( $floating_container_height ) ) ) {
			et_pb_responsive_options()->generate_responsive_css( $floating_container_height, '%%order_class%% .dipl_floating_images_wrapper', 'height', $render_slug, '', 'type' );
			et_pb_responsive_options()->generate_responsive_css( $floating_container_height, '%%order_class%% .dipl_floating_image_item img', 'max-height', $render_slug, '', 'type' );
		}

		$output = sprintf(
			'<div class="dipl_floating_images_wrapper">%1$s</div>',
			et_core_intentionally_unescaped( $this->content, 'html' )
		);

		return et_core_intentionally_unescaped( $output, 'html' );

	}
}
$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
	$modules = explode( ',', $plugin_options['dipl-modules'] );
	if ( in_array( 'dipl_floating_image', $modules, true ) ) {
		new DIPL_FloatingImage();
	}
} else {
	new DIPL_FloatingImage();
}
