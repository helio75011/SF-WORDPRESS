<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2020 Elicus Technologies Private Limited
 * @version     1.9.3
 */
class DIPL_LogoSlider_Item extends ET_Builder_Module {

	public $slug       = 'dipl_logo_slider_item';
	public $type       = 'child';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name            = esc_html__( 'DP Logo Slider Item', 'divi-plus' );
		$this->plural          = esc_html__( 'DP Logo Slider Items', 'divi-plus' );
		$this->child_title_var = 'logo_alt';
	}

	public function get_settings_modal_toggles() {
		return array(
			'general' => array(
				'toggles' => array(
					'logo_slider_item_content' => array(
						'title'    => esc_html__( 'Content', 'divi-plus' ),
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
			'borders' => array(
				'default' => array(
					'css' => array(
						'main' => array(
							'border_styles' => '%%order_class%%',
							'border_radii'  => '%%order_class%%',
						),
						'important' => 'all',
					),
				),
			),
			'box_shadow' => array(
				'default' => array(
					'css' => array(
						'main' => '%%order_class%%',
					),
				),
			),
			'margin_padding' => array(
				'use_margin' => false,
			),
			'max_width'      => false,
			'height'         => false,
			'transform'      => false,
		);
	}

	public function get_fields() {
		return array(
			'logo_alt'          => array(
				'label'           => esc_html__( 'Alt', 'divi-plus' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'logo_slider_item_content',
				'description'     => esc_html__( 'Here you can input the text to be used for the logo image as alternative text.', 'divi-plus' ),
			),
			'upload_logo_image' => array(
				'label'              => esc_html__( 'Upload Logo', 'divi-plus' ),
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'upload_button_text' => esc_attr__( 'Upload an image', 'divi-plus' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'divi-plus' ),
				'update_text'        => esc_attr__( 'Set As Image', 'divi-plus' ),
				'tab_slug'           => 'general',
				'toggle_slug'        => 'logo_slider_item_content',
				'description'        => esc_html__( 'Here you can upload the image to be used for the logo slider.', 'divi-plus' ),
			),
		);
	}

	public function render( $attrs, $content, $render_slug ) {

		$logo_alt          = esc_attr( $this->props['logo_alt'] );
		$upload_logo_image = esc_attr( $this->props['upload_logo_image'] );
		$output            = '';

		$this->add_classname(
			array(
				'swiper-slide',
			)
		);

		if ( '' !== $upload_logo_image ) {
			$output = sprintf(
				'<div class="dipl_logo_wrapper"><img class="dipl_logo_image" src="%1$s" alt="%2$s"/></div>',
				$upload_logo_image,
				( $logo_alt ? $logo_alt : '' )
			);
		}

		return $output;
	}
}

$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
    $modules = explode( ',', $plugin_options['dipl-modules'] );
    if ( in_array( 'dipl_logo_slider', $modules ) ) {
        new DIPL_LogoSlider_Item();
    }
} else {
    new DIPL_LogoSlider_Item();
}
