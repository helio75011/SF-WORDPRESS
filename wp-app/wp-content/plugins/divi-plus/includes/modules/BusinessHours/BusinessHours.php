<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.3
 */
class DIPL_BusinessHours extends ET_Builder_Module {

	public $slug       = 'dipl_business_hours';
	public $child_slug = 'dipl_business_hours_item';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name 			= esc_html__( 'DP Business Hours', 'divi-plus' );
        $this->child_item_text  = esc_html__( 'Business Hour', 'divi-plus' );
        $this->main_css_element = '%%order_class%%';
	}

    public function get_settings_modal_toggles() {
        return array(
            'advanced'  => array(
                'toggles' => array(
                    'business_day' => array(
                        'title' => esc_html__( 'Day', 'divi-plus' ),
                    ),
                    'business_time' => array(
                        'title' => esc_html__( 'Time', 'divi-plus' ),
                    ),
                ),
            ),
        );
    }

	public function get_advanced_fields_config() {
        return array(
            'fonts'  => array(
                'day' => array(
                    'label'         => esc_html__( 'Day', 'divi-plus' ),
                    'font_size'     => array(
                        'default'        => '18px',
                        'range_settings' => array(
                            'min'  => '1',
                            'max'  => '100',
                            'step' => '1',
                        ),
                        'validate_unit'  => true,
                    ),
                    'line_height'     => array(
                        'default'        => '1.5em',
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
                    'css' => array(
                        'main'  => "{$this->main_css_element} .dipl_business_day",
                        'hover' => "{$this->main_css_element} .dipl_business_day:hover",
                    ),
                    'tab_slug'          => 'advanced',
                    'toggle_slug'       => 'business_day',
                ),
                'time' => array(
                    'label'           => esc_html__( 'Time', 'divi-plus' ),
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
                        'default'        => '1.5em',
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
                    'css'             => array(
                        'main'  => "{$this->main_css_element} .dipl_business_time",
                        'hover' => "{$this->main_css_element} .dipl_business_time:hover",
                    ),
                    'tab_slug'          => 'advanced',
                    'toggle_slug'       => 'business_time',
                ),
            ),
            'margin_padding' => array(
                'css' => array(
                    'main'      => $this->main_css_element,
                    'important' => 'all',
                ),
            ),
            'text'          => false,
            'text_shadow'   => false,
            'link_options'  => false,
        );
    }

	public function get_fields() {
        return array();
    }

    public function render( $attrs, $content, $render_slug ) {
        return et_core_intentionally_unescaped( $this->content, 'html' );
    }

}
$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
    $modules = explode( ',', $plugin_options['dipl-modules'] );
    if ( in_array( 'dipl_business_hours', $modules ) ) {
        new DIPL_BusinessHours();
    }
} else {
    new DIPL_BusinessHours();
}