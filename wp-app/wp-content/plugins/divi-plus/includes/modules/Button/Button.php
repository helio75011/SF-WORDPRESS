<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.3
 */
class DIPL_Button extends ET_Builder_Module {

    public $slug       = 'dipl_button';
    public $child_slug = 'dipl_button_item';
    public $vb_support = 'on';

    protected $module_credits = array(
        'module_uri' => 'https://diviextended.com/product/divi-plus/',
        'author'     => 'Elicus',
        'author_uri' => 'https://elicus.com/',
    );

    public function init() {
        $this->name             = esc_html__( 'DP Button', 'divi-plus' );
        $this->child_item_text  = esc_html__( 'Button', 'divi-plus' );
        $this->main_css_element = '%%order_class%%';
    }

    public function get_settings_modal_toggles() {
        return array(
            'general'  => array(
                'toggles' => array(
                    'main_content'  => esc_html__( 'Configuration', 'divi-plus' ),
                ),
            ),
            'advanced'  => array(
                'toggles' => array(
                    'alignment' => array(
                        'title' => esc_html__( 'Alignment', 'divi-plus' ),
                    ),
                    'button' => array(
                        'title' => esc_html__( 'Button', 'divi-plus' ),
                        'sub_toggles'   => array(
                            'text' => array(
                                'name' => 'Text',
                            ),
                            'icon' => array(
                                'name' => 'Icon',
                            ),
                        ),
                        'tabbed_subtoggles' => true,
                    ),
                ),
            ),
        );
    }

    public function get_advanced_fields_config() {
        return array(
            'fonts'                 => array(
                'button' => array(
                    'label'         => esc_html__( 'Button', 'divi-plus' ),
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
                    'css'                 => array(
                        'main' => "{$this->main_css_element} .dipl_button_text",
                        'hover' => "{$this->main_css_element} .dipl_button_link:hover .dipl_button_text",
                    ),
                    'hide_text_align'       => true,
                    'tab_slug'              => 'advanced',
                    'toggle_slug'           => 'button',
                    'sub_toggle'            => 'text',
                ),
            ),
            'borders' => array(
                'default' => array(
                    'css' => array(
                        'main' => array(
                            'border_radii'  => "{$this->main_css_element} .dipl_button_link",
                            'border_styles' => "{$this->main_css_element} .dipl_button_link",
                        ),
                    ),
                ),
            ),
            'box_shadow' => array(
                'default' => array(
                    'css' => array(
                        'main' => "{$this->main_css_element} .dipl_button_link",
                    ),
                ),
            ),
            'margin_padding' => array(
                'css' => array(
                    'main'      => '%%order_class%%',
                    'important' => 'all',
                ),
            ),
            'max_width' => array(
                'css' => array(
                    'main'             => '%%order_class%%',
                    'module_alignment' => '%%order_class%%',
                ),
            ),
            'text'              => false,
            'text_shadow'       => false,
            'link_options'      => false,
            'height'            => false,
            'filters'           => false,
            'background'        => false,
        );
    }

    public function get_fields() {
        return array(
            'inline_buttons'  => array(
                'label'           => esc_html__( 'Inline Buttons', 'divi-plus' ),
                'type'            => 'yes_no_button',
                'option_category' => 'configuration',
                'options'         => array(
                    'off' => esc_html__( 'No', 'divi-plus' ),
                    'on'  => esc_html__( 'Yes', 'divi-plus' ),
                ),
                'default'         => 'off',
                'mobile_options'  => true,
                'tab_slug'        => 'general',
                'toggle_slug'     => 'main_content',
                'description'     => esc_html__( 'Here you can choose whether or not to keep buttons in the same line.', 'divi-plus' ),
            ),
            'button_icon_color' => array(
                'label'                 => esc_html__( 'Button Icon Color', 'divi-plus' ),
                'description'           => esc_html__( 'Here you can define a custom color for the button icon.', 'divi-plus' ),
                'type'                  => 'color-alpha',
                'option_category'       => 'button',
                'custom_color'          => true,
                'hover'                 => 'tabs',
                'mobile_options'        => true,
                'tab_slug'              => 'advanced',
                'toggle_slug'           => 'button',
                'sub_toggle'            => 'icon',
            ),
            'buttons_alignment' => array(
                'label'                 => esc_html__( 'Buttons Alignment', 'divi-plus' ),
                'type'                  => 'text_align',
                'option_category'       => 'layout',
                'options'               => et_builder_get_text_orientation_options( array( 'justified' ) ),
                'mobile_options'        => true,
                'tab_slug'              => 'advanced',
                'toggle_slug'           => 'alignment',
                'description'           => esc_html__( 'Here you can choose the alignment of the buttons in the left, right, or center of the module.', 'divi-plus' ),
            ),
        );
    }

    public function render( $attrs, $content, $render_slug ) {
        $button_icon_color      = $this->props['button_icon_color'];
        wp_enqueue_script( 'dipl-button-custom', PLUGIN_PATH."includes/modules/Button/dipl-button-custom.min.js", array('jquery'), '1.0.0', true );

        $inline_buttons_values  = et_pb_responsive_options()->get_property_values( $this->props, 'inline_buttons' );
        if ( 'on' === $inline_buttons_values['desktop'] ) {
            self::set_style(
                $render_slug,
                array(
                    'selector'    => '%%order_class%% .dipl_button_item',
                    'declaration' => 'display: inline-block;',
                )
            );
        }

        if ( 'off' === $inline_buttons_values['tablet'] ) {
            self::set_style(
                $render_slug,
                array(
                    'selector'    => '%%order_class%% .dipl_button_item',
                    'declaration' => 'display: block;',
                    'media_query' => self::get_media_query( 'max_width_980' ),
                )
            );
        } else if ( 'on' === $inline_buttons_values['tablet'] ) {
            self::set_style(
                $render_slug,
                array(
                    'selector'    => '%%order_class%% .dipl_button_item',
                    'declaration' => 'display: inline-block;',
                    'media_query' => self::get_media_query( 'max_width_980' ),
                )
            );
        }

        if ( 'off' === $inline_buttons_values['phone'] ) {
            self::set_style(
                $render_slug,
                array(
                    'selector'    => '%%order_class%% .dipl_button_item',
                    'declaration' => 'display: block;',
                    'media_query' => self::get_media_query( 'max_width_767' ),
                )
            );
        } else if ( 'on' === $inline_buttons_values['phone'] ) {
            self::set_style(
                $render_slug,
                array(
                    'selector'    => '%%order_class%% .dipl_button_item',
                    'declaration' => 'display: inline-block;',
                    'media_query' => self::get_media_query( 'max_width_767' ),
                )
            );
        }

        /* Button Alignment */
        $buttons_alignment_values   = et_pb_responsive_options()->get_property_values( $this->props, 'buttons_alignment' );
        if ( ! empty( array_filter( $buttons_alignment_values ) ) ) {
            $alignment_selector     = $this->main_css_element;
            et_pb_responsive_options()->generate_responsive_css( $buttons_alignment_values, $alignment_selector, 'text-align', $render_slug, '', 'type' );
        }

        /* Button Icon Color */
        $button_icon_color_values   = et_pb_responsive_options()->get_property_values( $this->props, 'button_icon_color' );
        $icon_selector              = "{$this->main_css_element} .dipl_button_icon:before, {$this->main_css_element} .dipl_button_icon:after";
        et_pb_responsive_options()->generate_responsive_css( $button_icon_color_values, $icon_selector, 'color', $render_slug, '', 'type' );
        $button_icon_color_hover    = $this->get_hover_value( 'button_icon_color' );
        if ( $button_icon_color_hover ) {
            self::set_style( $render_slug, array(
                'selector'    => "{$this->main_css_element} .dipl_button_link:hover .dipl_button_icon:before, {$this->main_css_element} .dipl_button_link:hover .dipl_button_icon:after",
                'declaration' => sprintf(
                    'color: %1$s;',
                    esc_attr( $button_icon_color_hover )
                ),
            ) );
        }

        return et_core_intentionally_unescaped( $this->content, 'html' );
    }

}
$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
    $modules = explode( ',', $plugin_options['dipl-modules'] );
    if ( in_array( 'dipl_button', $modules ) ) {
        new DIPL_Button();
    }
} else {
    new DIPL_Button();
}