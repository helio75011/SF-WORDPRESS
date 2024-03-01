<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.4
 */
class DIPL_BusinessHoursItem extends ET_Builder_Module {

    public $slug           = 'dipl_business_hours_item';
    public $type           = 'child';
    public $vb_support     = 'on';
    public $text_shadow    = '';

    protected $module_credits = array(
        'module_uri' => 'https://diviextended.com/product/divi-plus/',
        'author'     => 'Elicus',
        'author_uri' => 'https://elicus.com/',
    );

    public function init() {
        $this->name                         = esc_html__( 'DP Business Hour', 'divi-plus' );
        $this->advanced_setting_title_text  = esc_html__( 'Business Hour', 'divi-plus' );
        $this->child_title_var              = 'business_day';
        $this->main_css_element             = '.dipl_business_hours %%order_class%%';
        if ( is_archive() ) {
            $this->main_css_element = '%%order_class%%';
        }
    }

    public function get_settings_modal_toggles() {
        return array(
            'general'  => array(
                'toggles' => array(
                    'main_content' => array(
                        'title' => esc_html__( 'Content', 'divi-plus' ),
                        'priority' => 1,
                        'tab' => 'active'
                    ),
                ),
            ),
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
                'custom_margin' => array(
                    'default_on_front' => '||0px||false|false',
                ),
                'css' => array(
                    'main'      => $this->main_css_element,
                    'important' => 'all',
                ),
            ),
            'text'          => false,
            'text_shadow'   => false,
            'link_options'  => false,
            'height'        => false,
        );
    }

    public function get_fields() {
        $fields = array(
            'business_day' => array(
                'label'            => esc_html__( 'Day', 'divi-plus' ),
                'type'             => 'text',
                'option_category'  => 'basic_option',
                'dynamic_content'  => 'text',
                'tab_slug'         => 'general',
                'toggle_slug'      => 'main_content',
                'description'      => esc_html__( 'Here you can input the value to be used for the day of the business hours.', 'divi-plus' ),
            ),
            'business_time' => array(
                'label'            => esc_html__( 'Time', 'divi-plus' ),
                'type'             => 'text',
                'option_category'  => 'basic_option',
                'dynamic_content'  => 'text',
                'tab_slug'         => 'general',
                'toggle_slug'      => 'main_content',
                'description'      => esc_html__( 'Here you can input the valur to be used for the time of the business hours.', 'divi-plus' ),
            ),
            'enable_fullwidth' => array(
                'label'            => esc_html__( 'Enable Day/Time Fullwidth', 'divi-plus' ),
                'type'             => 'yes_no_button',
                'option_category'  => 'layout',
                'options'          => array(
                    'off'   => esc_html__( 'No', 'divi-blurb-extended' ),
                    'on'    => esc_html__( 'Yes', 'divi-blurb-extended' )
                ),
                'default'          => 'off',
                'tab_slug'         => 'advanced',
                'toggle_slug'      => 'width',
                'description'      => esc_html__( 'Here you can choose whether or not to make Day/Time Fullwidth.', 'divi-plus' ),
            ),
        );

        return $fields;
    }

    public function render( $attrs, $content, $render_slug ) {
        $business_day       = $this->props['business_day'];
        $business_time      = $this->props['business_time'];
        $enable_fullwidth   = $this->props['enable_fullwidth'];

        if ( '' === $business_day && '' === $business_time ) {
            return '';
        }

        $business_hours_inner_wrap = '';

        if ( '' !== $business_day ) {
            $business_hours_inner_wrap .= sprintf(
                '<div class="dipl_business_day">%1$s</div>',
                esc_html( $business_day )
            );
        }

        if ( '' !== $business_time ) {
            $business_hours_inner_wrap .= sprintf(
                '<div class="dipl_business_time">%1$s</div>',
                esc_html( $business_time )
            );
        }

        $business_hours = sprintf(
            '<div class="dipl_business_hour_wrapper">%1$s</div>',
            et_core_intentionally_unescaped( $business_hours_inner_wrap, 'html' )
        );

        if ( 'on' === $enable_fullwidth ) {
            self::set_style( $render_slug, array(
                'selector'    => "{$this->main_css_element} .dipl_business_hour_wrapper",
                'declaration' => 'display: block;'
            ) );
            self::set_style( $render_slug, array(
                'selector'    => "{$this->main_css_element} .dipl_business_day, {$this->main_css_element} .dipl_business_time",
                'declaration' => 'width: 100%;'
            ) );
        }

        $file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        wp_enqueue_style( 'dipl-business-hours-item-style', PLUGIN_PATH . 'includes/modules/BusinessHoursItem/' . $file . '.min.css', array(), '1.0.0' );

        return et_core_intentionally_unescaped( $business_hours, 'html' );
    }

}
$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
    $modules = explode( ',', $plugin_options['dipl-modules'] );
    if ( in_array( 'dipl_business_hours', $modules ) ) {
        new DIPL_BusinessHoursItem();
    }
} else {
    new DIPL_BusinessHoursItem();
}