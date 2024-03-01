<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.4
 */
class DIPL_ButtonItem extends ET_Builder_Module {

    public $slug           = 'dipl_button_item';
    public $type           = 'child';
    public $vb_support     = 'on';
    public $text_shadow    = '';

    protected $module_credits = array(
        'module_uri' => 'https://diviextended.com/product/divi-plus/',
        'author'     => 'Elicus',
        'author_uri' => 'https://elicus.com/',
    );

    public function init() {
        $this->name                         = esc_html__( 'DP Button Item', 'divi-plus' );
        $this->advanced_setting_title_text  = esc_html__( 'Button', 'divi-plus' );
        $this->child_title_var              = 'button_text';
        $this->text_shadow                  = ET_Builder_Module_Fields_Factory::get( 'TextShadow' );
        $this->main_css_element             = '%%order_class%%';
    }

    public function get_settings_modal_toggles() {
        return array(
            'general'  => array(
                'toggles' => array(
                    'main_content'  => esc_html__( 'Button', 'divi-plus' ),
                    'link'          => esc_html__( 'Link', 'divi-plus' ),
                    'background'    => esc_html__( 'Background', 'divi-plus' ),
                ),
            ),
            'advanced'  => array(
                'toggles' => array(
                    'text' => array(
                        'title' => esc_html__( 'Alignment', 'divi-plus' ),
                    ),
                    'secondary_text' => array(
                        'title' => esc_html__( 'Secondary Text', 'divi-plus' ),
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
                        'main'  => "{$this->main_css_element} .dipl_button_text",
                        'hover' => "{$this->main_css_element} .dipl_button_link:hover .dipl_button_text",
                        'important' => 'all',
                    ),
                    'hide_text_align'       => true,
                    'tab_slug'              => 'advanced',
                    'toggle_slug'           => 'button',
                    'sub_toggle'            => 'text',
                ),
                'secondary_text'    => array(
                    'label'           => esc_html__( 'Secondary Text', 'divi-plus' ),
                    'font_size'       => array(
                        'default'        => '14px',
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
                        'main'  => "{$this->main_css_element} .dipl_button_secondary_text",
                        'hover' => "{$this->main_css_element} .dipl_button_link:hover .dipl_button_secondary_text",
                        'important' => 'all',
                    ),
                    'hide_text_align'   => true,
                    'hide_text_shadow'  => true,
                    'depends_on'        => array( 'button_type' ),
                    'depends_show_if'   => 'conversion',
                    'tab_slug'          => 'advanced',
                    'toggle_slug'       => 'secondary_text',
                ),
            ),
            'button_margin_padding' => array(
                'button' => array(
                    'margin_padding' => array(
                        'css' => array(
                            'padding'   => "{$this->main_css_element} .dipl_button_link",
                            'margin'    => $this->main_css_element,
                            'important' => 'all',
                        ),
                    ),
                ),
            ),
            'borders' => array(
                'default' => array(
                    'css' => array(
                        'main' => array(
                            'border_radii'  => "{$this->main_css_element} .dipl_button_link",
                            'border_styles' => "{$this->main_css_element} .dipl_button_link",
                            'important' => 'all',
                        ),
                        'hover' => array(
                            'border_radii'  => "{$this->main_css_element} .dipl_button_link:hover",
                            'border_styles' => "{$this->main_css_element} .dipl_button_link:hover",
                            'important' => 'all',
                        ),
                    ),
                ),
            ),
            'box_shadow' => array(
                'default' => array(
                    'css' => array(
                        'main' => "{$this->main_css_element} .dipl_button_link",
                        'important' => 'all',
                    ),
                ),
            ),
            'transform' => array(
                'css' => array(
                    'main' => "{$this->main_css_element} .dipl_button_link",
                    'important' => 'all',
                ),
            ),
            'text' => array(
                'css' => array(
                    'text_orientation' => "{$this->main_css_element} .dipl_button_link",
                    'important' => 'all',
                ),
            ),
            'margin_padding'=> false,
            'text_shadow'   => false,
            'link_options'  => false,
            'max_width'     => false,
            'height'        => false,
            'filters'       => false,
            'background'    => false,
        );
    }

    public function get_fields() {
        $fields = array(
            'button_type' => array(
                'label'             => esc_html__( 'Button Type', 'divi-plus' ),
                'type'              => 'select',
                'option_category'   => 'layout',
                'options'           => array(
                    'classic'       => esc_html__( 'Classic', 'divi-plus' ),
                    'conversion'    => esc_html__( 'Conversion', 'divi-plus' ),
                ),
                'default'           => 'classic',
                'default_on_front'  => 'classic',
                'affects'           => array(
                    'secondary_text',
                    'secondary_text_font',
                    'secondary_text_font_size',
                    'secondary_text_letter_spacing',
                    'secondary_text_line_height',
                    'secondary_text_text_color',
                    'secondary_text_text_shadow',
                ),
                'tab_slug'          => 'general',
                'toggle_slug'       => 'main_content',
                'description'       => esc_html__( 'Here you can choose the type of the button you want to use.', 'divi-plus' ),
            ),
            'button_text' => array(
                'label'            => esc_html__( 'Button Text', 'divi-plus' ),
                'type'             => 'text',
                'option_category'  => 'basic_option',
                'dynamic_content'  => 'text',
                'mobile_options'   => true,
                'hover'            => 'tabs',
                'tab_slug'         => 'general',
                'toggle_slug'      => 'main_content',
                'description'      => esc_html__( 'Here you can input the text for the button.', 'divi-plus' ),
            ),
            'secondary_text' => array(
                'label'            => esc_html__( 'Secondary Text', 'divi-plus' ),
                'type'             => 'text',
                'option_category'  => 'basic_option',
                'dynamic_content'  => 'text',
                'mobile_options'   => true,
                'hover'            => 'tabs',
                'show_if'         => array(
                    'button_type' => 'conversion',
                ),
                'tab_slug'         => 'general',
                'toggle_slug'      => 'main_content',
                'description'      => esc_html__( 'Here you can input the secondary text for the button.', 'divi-plus' ),
            ),
            'button_url' => array(
                'label'            => esc_html__( 'Button Link URL', 'divi-plus' ),
                'type'             => 'text',
                'option_category'  => 'basic_option',
                'dynamic_content'  => 'url',
                'tab_slug'         => 'general',
                'toggle_slug'      => 'link',
                'description'      => esc_html__( 'Here you can input the destination URL for the button to open when clicked.', 'divi-plus' ),
            ),
            'url_new_window' => array(
                'label'             => esc_html__( 'Button Link Target', 'divi-plus' ),
                'type'              => 'select',
                'option_category'   => 'configuration',
                'options'           => array(
                    'off' => esc_html__( 'In The Same Window', 'divi-plus' ),
                    'on'  => esc_html__( 'In The New Tab', 'divi-plus' ),
                ),
                'default'           => 'off',
                'default_on_front'  => 'off',
                'tab_slug'          => 'general',
                'toggle_slug'       => 'link',
                'description'       => esc_html__( 'Here you can choose whether or not the button opens the link in a new window.', 'divi-plus' ),
            ),
            'background_fill_style' => array(
                'label'             => esc_html__( 'Background Hover Fill Style', 'divi-plus' ),
                'type'              => 'select',
                'option_category'   => 'layout',
                'options'           => array(
                    'default_fill'              => esc_html__( 'Default', 'divi-plus' ),
                    'wipe_fill'                 => esc_html__( 'Wipe', 'divi-plus' ),
                    'slide_up_fill'             => esc_html__( 'Slide Up', 'divi-plus' ),
                    'slide_down_fill'           => esc_html__( 'Slide Down', 'divi-plus' ),
                    'slide_left_fill'           => esc_html__( 'Slide Left', 'divi-plus' ),
                    'slide_right_fill'          => esc_html__( 'Slide Right', 'divi-plus' ),
                    'vertical_shutter_fill'     => esc_html__( 'Vertical Shutter', 'divi-plus' ),
                    'horizontal_shutter_fill'   => esc_html__( 'Horizontal Shutter', 'divi-plus' ),
                ),
                'default'           => 'default_fill',
                'default_on_front'  => 'default_fill',
                'tab_slug'          => 'general',
                'toggle_slug'       => 'background',
                'description'       => esc_html__( 'Here you can choose the button background animation to be displayed when hovered.', 'divi-plus' ),
            ),
            'button_bg_color' => array(
                'label'                 => esc_html__( 'Button Background', 'divi-plus' ),
                'type'                  => 'background-field',
                'base_name'             => 'button_bg',
                'context'               => 'button_bg_color',
                'option_category'       => 'button',
                'custom_color'          => true,
                'background_fields'     => $this->generate_background_options( 'button_bg', 'button', 'general', 'background', 'button_bg_color' ),
                'hover'                 => 'tabs',
                'mobile_options'        => true,
                'tab_slug'              => 'general',
                'toggle_slug'           => 'background',
                'description'           => esc_html__( 'Customize the background style of the button by adjusting the background color, gradient, and image.', 'divi-plus' ),
            ),
            'button_alignment' => array(
                'label'                 => esc_html__( 'Button Alignment', 'divi-plus' ),
                'type'                  => 'text_align',
                'option_category'       => 'layout',
                'options'               => et_builder_get_text_orientation_options( array( 'justified' ) ),
                'mobile_options'        => true,
                'tab_slug'              => 'advanced',
                'toggle_slug'           => 'text',
                'description'           => esc_html__( 'Here you can choose the alignment of the button in the left, right, or center of the module.', 'divi-plus' ),
            ),
            'button_use_icon' => array(
                'label'                 => esc_html__( 'Use Icon on Button', 'divi-plus' ),
                'type'                  => 'yes_no_button',
                'option_category'       => 'button',
                'options'               => array(
                    'off'   => esc_html__( 'No', 'divi-plus' ),
                    'on'    => esc_html__( 'Yes', 'divi-plus' ),
                ),
                'default'               => 'off',
                'default_on_front'      => 'off',
                'tab_slug'              => 'advanced',
                'toggle_slug'           => 'button',
                'sub_toggle'            => 'icon',
                'description'           => esc_html__( 'Here you can choose whether or not to display a custom icon on the button.', 'divi-plus' ),
            ),
            'button_icon' => array(
                'label'                 => esc_html__( 'Button Icon', 'divi-plus' ),
                'type'                  => 'select_icon',
                'option_category'       => 'button',
                'class'                 => array(
                    'et-pb-font-icon'
                ),
                'show_if'               => array(
                    'button_use_icon' => 'on',
                ),
                'hover'                 => 'tabs',
                'tab_slug'              => 'advanced',
                'toggle_slug'           => 'button',
                'sub_toggle'            => 'icon',
                'description'           => esc_html__( 'Here you can choose an icon to be displayed on the button.', 'divi-plus' ),
            ),
            'button_icon_color' => array(
                'label'                 => esc_html__( 'Button Icon Color', 'divi-plus' ),
                'description'           => esc_html__( 'Here you can define a custom color for the button icon.', 'divi-plus' ),
                'type'                  => 'color-alpha',
                'option_category'       => 'button',
                'custom_color'          => true,
                'show_if'               => array(
                    'button_use_icon' => 'on',
                ),
                'hover'                 => 'tabs',
                'mobile_options'        => true,
                'tab_slug'              => 'advanced',
                'toggle_slug'           => 'button',
                'sub_toggle'            => 'icon',
            ),
            'button_icon_placement' => array(
                'label'                 => esc_html__( 'Button Icon Placement', 'divi-plus' ),
                'type'                  => 'select',
                'option_category'       => 'button',
                'options'               => array(
                    'right' => esc_html__( 'Right', 'divi-plus' ),
                    'left'  => esc_html__( 'Left', 'divi-plus' ),
                ),
                'default'               => 'right',
                'default_on_front'      => 'right',
                'show_if'               => array(
                    'button_use_icon' => 'on',
                ),
                'hover'                 => 'tabs',
                'tab_slug'              => 'advanced',
                'toggle_slug'           => 'button',
                'sub_toggle'            => 'icon',
                'description'           => esc_html__( 'Here you can choose the area where you want to place the button icon within the button.', 'divi-plus' ),
            ),
            'button_on_hover' => array(
                'label'                 => esc_html__( 'Only Show Icon on Hover', 'divi-plus' ),
                'type'                  => 'yes_no_button',
                'option_category'       => 'button',
                'options'               => array(
                    'on'    => esc_html__( 'Yes', 'divi-plus' ),
                    'off'   => esc_html__( 'No', 'divi-plus' ),
                ),
                'default'               => 'on',
                'default_on_front'      => 'on',
                'show_if'               => array(
                    'button_use_icon' => 'on',
                ),
                'tab_slug'              => 'advanced',
                'toggle_slug'           => 'button',
                'sub_toggle'            => 'icon',
                'description'           => esc_html__( 'Here you can choose whether or not to display button icon on hover.', 'divi-plus' ),
            ),
            'button_custom_margin' => array(
                'label'                 => esc_html__( 'Margin', 'divi-plus' ),
                'type'                  => 'custom_margin',
                'option_category'       => 'layout',
                'mobile_options'        => true,
                'hover'                 => 'tabs',
                'tab_slug'              => 'advanced',
                'toggle_slug'           => 'margin_padding',
                'description'           => esc_html__( 'Margin adds extra space to the outside of the element, increasing the distance between the element and other items on the page.', 'divi-plus' ),
            ),
            'button_custom_padding' => array(
                'label'                 => esc_html__( 'Padding', 'divi-plus' ),
                'type'                  => 'custom_padding',
                'option_category'       => 'layout',
                'mobile_options'        => true,
                'hover'                 => 'tabs',
                'tab_slug'              => 'advanced',
                'toggle_slug'           => 'margin_padding',
                'description'           => esc_html__( 'Padding adds extra space to the inside of the element, increasing the distance between the edge of the element and its inner contents.', 'divi-plus' ),
            ),
            'button_id' => array(
                'label'             => esc_html__( 'CSS ID', 'divi-plus' ),
                'type'              => 'text',
                'option_category'   => 'configuration',
                'tab_slug'          => 'custom_css',
                'toggle_slug'       => 'classes',
                'option_class'      => 'et_pb_custom_css_regular',
            ),
            'button_class' => array(
                'label'                 => esc_html__( 'CSS Class', 'divi-plus' ),
                'type'                  => 'text',
                'option_category'       => 'configuration',
                'tab_slug'              => 'custom_css',
                'toggle_slug'           => 'classes',
                'option_class'          => 'et_pb_custom_css_regular',
            ),
        );
        
        $background_options     =  $this->generate_background_options( 'button_bg', 'skip', 'general', 'background', 'button_bg_color' );

        $secondary_text_shadow  = $this->text_shadow->get_fields(array(
            'label'           => 'Secondary',
            'prefix'          => 'secondary_text',
            'option_category' => 'font_option',
            'tab_slug'        => 'advanced',
            'toggle_slug'     => 'secondary_text',
            'show_if'         => array(
                'button_type' => 'conversion',
            ),
        ));

        return array_merge( $fields, $background_options, $secondary_text_shadow );
    }

    public function render( $attrs, $content, $render_slug ) {
        $multi_view             = et_pb_multi_view_options( $this );
        $button_type            = $this->props['button_type'];
        $button_text            = $this->props['button_text'];
        $secondary_text         = $this->props['secondary_text'];
        $button_url             = $this->props['button_url'];
        $url_new_window         = $this->props['url_new_window'];
        $background_fill_style  = $this->props['background_fill_style'];
        $button_use_icon        = $this->props['button_use_icon'];
        $button_icon            = $this->props['button_icon'];
        $button_icon_color      = $this->props['button_icon_color'];
        $button_icon_placement  = $this->props['button_icon_placement'];
        $button_on_hover        = $this->props['button_on_hover'];
        $button_id              = $this->props['button_id'];
        $button_class           = $this->props['button_class'];

        if ( '' === $button_text && 'off' === $button_use_icon ) {
            return '';
        }

        if ( 'on' === $button_use_icon ) {
            $button_icon        = '' === $button_icon ? '5' : $button_icon;
            $button_icon_hover  = $this->get_hover_value( 'button_icon' );
            if ( $button_icon_hover ) {
                $custom_button_icon_hover = sprintf(
                    ' data-icon-hover="%1$s"',
                    esc_attr( et_pb_process_font_icon( $button_icon_hover ) )
                );
            }
            $custom_button_icon = sprintf(
                ' data-icon="%1$s"%2$s',
                esc_attr( et_pb_process_font_icon( $button_icon ) ),
                isset( $custom_button_icon_hover ) ? $custom_button_icon_hover : ''
            );
        }

        $button_inner_wrap = sprintf(
            '<span class="dipl_button_text%3$s"%2$s%4$s>%1$s</span>',
            esc_html( $button_text ),
            isset( $custom_button_icon ) ? et_core_esc_previously( $custom_button_icon ) : '',
            isset( $custom_button_icon ) ? esc_attr( ' dipl_button_icon' ) : '',
            $multi_view->render_attrs(
                array(
                    'content'        => '{{button_text}}',
                    'hover_selector' => "{$this->main_css_element} .dipl_button_link",
                    'visibility'     => array(
                        'button_text' => '__not_empty',
                    ),
                )
            )
        );



        switch ( $button_type ) {
            case 'conversion':
                if ( '' !== $secondary_text ) {
                    $button_inner_wrap .= sprintf(
                        '<span class="dipl_button_secondary_text"%2$s>%1$s</span>',
                        esc_html( $secondary_text ),
                        $multi_view->render_attrs(
                            array(
                                'content'        => '{{secondary_text}}',
                                'hover_selector' => "{$this->main_css_element} .dipl_button_link",
                                'visibility'     => array(
                                    'button_text' => '__not_empty',
                                ),
                            )
                        )
                    );
                }
                break;
                
            default:
                break;
        }

        $button_classes = array(
            'dipl_button_link',
            "dipl_button_{$background_fill_style}",
        );

        if ( '' === $button_text ) {
            array_push( $button_classes, 'dipl_button_no_text' );
        }
        
        if ( 'on' === $button_use_icon && '' !== $button_icon ) {
            if ( 'on' === $button_on_hover && '' !== $button_text ) {
                array_push( $button_classes, 'dipl_button_icon_on_hover' );
            }
            array_push( $button_classes, "dipl_button_icon_{$button_icon_placement}" );
        }

        if ( 'default_fill' !== $background_fill_style ) {
            $background_wrap = '<span class="dipl_background_effect_wrap"></span>';
        }

        if ( '' !== $button_class ) {
            array_push( $button_classes, esc_attr( $button_class ) );
        }

        $button_classes = implode( ' ', $button_classes );

        $button         = sprintf(
            '<a%6$s class="%2$s" href="%3$s" target="%4$s">%1$s%5$s</a>',
            et_core_intentionally_unescaped(  $button_inner_wrap, 'html' ),
            esc_attr( $button_classes ),
            esc_url( $button_url ),
            'on' === $url_new_window ? esc_attr( '_blank' ) : esc_attr( '_self' ),
            'default_fill' !== $background_fill_style ? $background_wrap : '',
            '' !== $button_id ? sprintf( ' id="%1$s"', esc_attr( $button_id ) ) : ''
        );


        $button_wrapper = sprintf(
            '<div class="dipl_button_wrapper %2$s">%1$s</div>',
            et_core_intentionally_unescaped( $button, 'html' ),
            "dipl_button_{$button_type}"
        );

        
        $button_font_size_values = et_pb_responsive_options()->get_property_values( $this->props, 'button_font_size' );
        if ( '' === $button_font_size_values['desktop'] ) {
            $button_font_size_values['desktop'] = '18px';
        }
        if ( empty( array_filter( $button_font_size_values ) ) ) {
            $button_font_size_values['desktop'] = '18px';
        }

        /* Icon Related CSS */
        if ( 'on' === $button_use_icon ) {
            /* Positioning of icon when show icon only on hover */
            $icon_pseudo_selector   = 'left' === $button_icon_placement ? 'before'  : 'after';
            $negation_sign          = 'left' === $button_icon_placement ? '-'       : '';

            if ( 'on' === $button_on_hover && '' !== $button_text ) {
                $placement_selector = "{$this->main_css_element} .dipl_button_icon:{$icon_pseudo_selector}";
                $translate_values   = $this->translate_button_values( $button_font_size_values, $negation_sign );
                $translate_selector = "{$this->main_css_element} .dipl_button_icon";
                et_pb_responsive_options()->generate_responsive_css( $button_font_size_values, $placement_selector, $button_icon_placement, $render_slug, '', 'type' );
                et_pb_responsive_options()->generate_responsive_css( $translate_values, $translate_selector, 'transform', $render_slug, '', 'type' );
                self::set_style( $render_slug, array(
                    'selector'    => $translate_selector,
                    'declaration' => 'transition: color 300ms linear, transform 300ms linear !important'
                ) );
                if ( 'conversion' === $button_type ) {
                    if ( '' !== $secondary_text ) {
                        $orientation_values = et_pb_responsive_options()->get_property_values( $this->props, 'text_orientation' );
                        $translate_values   = $this->translate_secondary_text_values( $orientation_values, $button_font_size_values );
                        if ( is_array( $translate_values ) && ! empty( $translate_values ) ) {
                            $this->process_secondary_text_style( $render_slug, $translate_values );
                        }
                    }
                }
            }

            /* Button Icon Color */
            $button_icon_color_values   = et_pb_responsive_options()->get_property_values( $this->props, 'button_icon_color' );
            $icon_selector              = "{$this->main_css_element} .dipl_button_icon:{$icon_pseudo_selector}";
            et_pb_responsive_options()->generate_responsive_css( $button_icon_color_values, $icon_selector, 'color', $render_slug, '!important;', 'color' );
            $button_icon_color_hover    = $this->get_hover_value( 'button_icon_color' );
            if ( $button_icon_color_hover ) {
                self::set_style( $render_slug, array(
                    'selector'    => "{$this->main_css_element} .dipl_button_link:hover .dipl_button_icon:{$icon_pseudo_selector}",
                    'declaration' => sprintf(
                        'color: %1$s !important;',
                        esc_attr( $button_icon_color_hover )
                    ),
                ) );
            }

            if ( class_exists( 'ET_Builder_Module_Helper_Style_Processor' ) && method_exists( 'ET_Builder_Module_Helper_Style_Processor', 'process_extended_icon' ) ) {
                $this->generate_styles(
                    array(
                        'utility_arg'    => 'icon_font_family',
                        'render_slug'    => $render_slug,
                        'base_attr_name' => 'button_icon',
                        'important'      => true,
                        'selector'       => $icon_selector,
                        'processor'      => array(
                            'ET_Builder_Module_Helper_Style_Processor',
                            'process_extended_icon',
                        ),
                    )
                );
            }

            /* Icon Placement on Hover */
            $button_icon_placement_hover = $this->get_hover_value( 'button_icon_placement' );
            if ( $button_icon_placement_hover ) {
                $placement_selector_hover   = "{$this->main_css_element} .dipl_button_link:not(.dipl_button_no_text):hover .dipl_button_icon:{$icon_pseudo_selector}";
                $translate_selector_hover   = "{$this->main_css_element} .dipl_button_link:not(.dipl_button_no_text):hover .dipl_button_icon";
                $translate_values_hover     = $this->translate_button_values_hover( $button_font_size_values, $negation_sign );
                self::set_style( $render_slug, array(
                    'selector'    => $placement_selector_hover,
                    'declaration' => sprintf(
                        '%1$s: 100%%; padding: 0; padding-%1$s: 6px;',
                        esc_attr( $button_icon_placement )
                    )
                ) );
                self::set_style( $render_slug, array(
                    'selector'    => "{$this->main_css_element} .dipl_button_link:not(.dipl_button_no_text) .dipl_button_icon:{$icon_pseudo_selector}",
                    'declaration' => sprintf(
                        'transition: %1$s 300ms linear !important',
                        esc_attr( $button_icon_placement )
                    )
                ) );
                self::set_style( $render_slug, array(
                    'selector'    => "{$this->main_css_element} .dipl_button_link:not(.dipl_button_no_text) .dipl_button_icon",
                    'declaration' => 'transition: transform 300ms linear !important'
                ) );
                et_pb_responsive_options()->generate_responsive_css( $translate_values_hover, $translate_selector_hover, 'transform', $render_slug, '', 'type' );
            }

            /* Icon on Hover */
            $button_icon_hover  = $this->get_hover_value( 'button_icon' );
            if ( $button_icon_hover ) {
                $icon_selector_hover = "{$this->main_css_element} .dipl_button_link:hover .dipl_button_icon:{$icon_pseudo_selector}";
                self::set_style( $render_slug, array(
                    'selector'    => $icon_selector_hover,
                    'declaration' => 'animation-name: diplChangeIcon; animation-fill-mode: forwards; animation-delay: 100ms;'
                ) );
            }

        }

        /* Button Alignment */
        $button_alignment_values    = et_pb_responsive_options()->get_property_values( $this->props, 'button_alignment' );
        if ( ! empty( array_filter( $button_alignment_values ) ) ) {
            $alignment_selector     = "{$this->main_css_element} .dipl_button_wrapper";
            et_pb_responsive_options()->generate_responsive_css( $button_alignment_values, $alignment_selector, 'text-align', $render_slug, '', 'type' );
        }
        

        $options = array(
            'normal' => array(
                'button_bg' => "{$this->main_css_element} .dipl_button_link",
            ),
            'hover' => array(
                'button_bg' => "{$this->main_css_element} .dipl_background_effect_wrap:before",
            )
        );

        if ( 'default_fill' === $background_fill_style ) {
            $options['hover']['button_bg'] = "{$this->main_css_element} .dipl_button_link:hover";
        }

        if ( 'vertical_shutter_fill' === $background_fill_style || 'horizontal_shutter_fill' === $background_fill_style ) {
            $options['hover']['button_bg'] = array( 
                "{$this->main_css_element} .dipl_background_effect_wrap:before",
                "{$this->main_css_element} .dipl_background_effect_wrap:after",
            );
        }

        $this->process_custom_background( $render_slug, $options );
        $this->process_advanced_margin_padding_css( $this, $render_slug, $this->margin_padding );

        $file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        wp_enqueue_style( 'dipl-button-item-style', PLUGIN_PATH . 'includes/modules/ButtonItem/' . $file . '.min.css', array(), '1.0.0' );

        return et_core_intentionally_unescaped( $button_wrapper, 'html' );
    }

    public function translate_button_values( $button_font_size_values = array(), $negation_sign = '' ) {
        if ( empty( $button_font_size_values ) ) {
            return $button_font_size_values;
        }

        $translate_values = $button_font_size_values;

        foreach ( $translate_values as &$value ) {
            if ( '' !== $value ) {
                $unit  = str_replace( floatval( $value ), '', $value );
                $value = ( floatval( $value ) / 2 ) + 3;
                $value = 'translateX(' . $negation_sign . $value . $unit . ')';
            }
        }

        return $translate_values;
    }

    public function translate_button_values_hover( $button_font_size_values = array(), $negation_sign = '' ) {
        if ( empty( $button_font_size_values ) ) {
            return $button_font_size_values;
        }

        $translate_values_hover = $button_font_size_values;

        foreach ( $translate_values_hover as &$value ) {
            if ( '' !== $value ) {
                $unit  = str_replace( floatval( $value ), '', $value );
                $value = floatval( $value ) + 6;
                $value = 'translateX(' . $negation_sign . $value . $unit . ')';
            }
        }

        return $translate_values_hover;
    }

    public function translate_secondary_text_values( $text_orientation_values = array(), $button_font_size_values = array() ) {
        if ( empty( $button_font_size_values ) || empty( $text_orientation_values ) ) {
            return '';
        }

        $translate_values   = array();
        foreach( $text_orientation_values as $key => $value ) {
            if ( 'desktop' === $key && '' !== $value ) {
                $translate_values['orientation'][$key] = $value;
            } else if ( 'desktop' === $key && '' === $value ) {
                $translate_values['orientation'][$key] = 'left';
            }

            if ( 'tablet' === $key && '' !== $value ) {
                $translate_values['orientation'][$key] = $value;
            } else if ( 'tablet' === $key && '' === $value ) {
                $translate_values['orientation'][$key] = $translate_values['orientation']['desktop'];
            }

            if ( 'phone' === $key && '' !== $value ) {
                $translate_values['orientation'][$key] = $value;
            } else if ( 'phone' === $key && '' === $value ) {
                $translate_values['orientation'][$key] = $translate_values['orientation']['tablet'];
            }
        }

        foreach ( $button_font_size_values as $key => $value ) {
            if ( '' !== $value ) {
                $unit  = str_replace( floatval( $value ), '', $value );
                $value = ( floatval( $value ) / 2 ) + 3;
                $value = $value . $unit;
                $translate_values['width'][$key] = $value;
            }
        }

        return $translate_values;
    }

    public function process_secondary_text_style( $render_slug, $translate_values = array() ) {
        if ( empty( $translate_values ) ) {
            return '';
        }
        $orientations   = isset( $translate_values['orientation'] ) ? $translate_values['orientation'] : array();
        $widths         = isset( $translate_values['width'] ) ? $translate_values['width'] : array();
        $devices        = array( 'desktop', 'tablet', 'phone' );
        foreach ( $devices as $device ) {
            if ( isset( $orientations[$device] ) ) {
                if ( 'center' !== $orientations[$device] ) {
                    $left_oriented                      = in_array( $orientations[$device], array( 'left', 'justified' ), true );
                    $secondary_pseudo_selector          = $left_oriented ? 'before' : 'after';
                    $secondary_pseudo_selector_hover    = $left_oriented ? 'after'  : 'before';
                    if ( 'desktop' === $device ) {
                        self::set_style( $render_slug, array(
                            'selector'    => "{$this->main_css_element} .dipl_button_secondary_text:{$secondary_pseudo_selector}",
                            'declaration' => sprintf(
                                'width: %1$s;',
                                esc_attr( $widths['desktop'] )
                            ),
                        ) );
                        self::set_style( $render_slug, array(
                            'selector'    => "{$this->main_css_element} .dipl_button_link:hover .dipl_button_secondary_text:{$secondary_pseudo_selector_hover}",
                            'declaration' => sprintf(
                                'width: %1$s;',
                                esc_attr( $widths['desktop'] )
                            ),
                        ) );
                        self::set_style( $render_slug, array(
                            'selector'    => "{$this->main_css_element} .dipl_button_link:hover .dipl_button_secondary_text:{$secondary_pseudo_selector}",
                            'declaration' => 'width: 0;',
                        ) );
                    }
                    if ( 'tablet' === $device ) {
                        if ( isset( $widths['tablet'] ) ) {
                            self::set_style( $render_slug, array(
                                'selector'    => "{$this->main_css_element} .dipl_button_secondary_text:{$secondary_pseudo_selector}",
                                'declaration' => sprintf(
                                    'width: %1$s;',
                                    esc_attr( $widths['tablet'] )
                                ),
                                'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
                            ) );
                            self::set_style( $render_slug, array(
                                'selector'    => "{$this->main_css_element} .dipl_button_link:hover .dipl_button_secondary_text:{$secondary_pseudo_selector_hover}",
                                'declaration' => sprintf(
                                    'width: %1$s;',
                                    esc_attr( $widths['tablet'] )
                                ),
                                'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
                            ) );
                            self::set_style( $render_slug, array(
                                'selector'    => "{$this->main_css_element} .dipl_button_link:hover .dipl_button_secondary_text:{$secondary_pseudo_selector}",
                                'declaration' => 'width: 0;',
                                'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
                            ) );
                        } else if ( $orientations['desktop'] !== $orientations[$device] ) {
                            self::set_style( $render_slug, array(
                                'selector'    => "{$this->main_css_element} .dipl_button_secondary_text:{$secondary_pseudo_selector}",
                                'declaration' => sprintf(
                                    'width: %1$s;',
                                    esc_attr( $widths['desktop'] )
                                ),
                                'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
                            ) );
                            self::set_style( $render_slug, array(
                                'selector'    => "{$this->main_css_element} .dipl_button_link:hover .dipl_button_secondary_text:{$secondary_pseudo_selector_hover}",
                                'declaration' => sprintf(
                                    'width: %1$s;',
                                    esc_attr( $widths['desktop'] )
                                ),
                                'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
                            ) );
                            self::set_style( $render_slug, array(
                                'selector'    => "{$this->main_css_element} .dipl_button_link:hover .dipl_button_secondary_text:{$secondary_pseudo_selector}",
                                'declaration' => 'width: 0;',
                                'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
                            ) );
                        }
                    }
                    if ( 'phone' === $device ) {
                        if ( isset( $widths['phone'] ) ) {
                            self::set_style( $render_slug, array(
                                'selector'    => "{$this->main_css_element} .dipl_button_secondary_text:{$secondary_pseudo_selector}",
                                'declaration' => sprintf(
                                    'width: %1$s;',
                                    esc_attr( $widths['phone'] )
                                ),
                                'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
                            ) );
                            self::set_style( $render_slug, array(
                                'selector'    => "{$this->main_css_element} .dipl_button_link:hover .dipl_button_secondary_text:{$secondary_pseudo_selector_hover}",
                                'declaration' => sprintf(
                                    'width: %1$s;',
                                    esc_attr( $widths['phone'] )
                                ),
                                'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
                            ) );
                            self::set_style( $render_slug, array(
                                'selector'    => "{$this->main_css_element} .dipl_button_link:hover .dipl_button_secondary_text:{$secondary_pseudo_selector}",
                                'declaration' => 'width: 0;',
                                'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
                            ) );
                        } else if ( $orientations['tablet'] !== $orientations[$device] ) {
                            if ( isset( $widths['tablet'] ) ) {
                                $width = $widths['tablet'];
                            } else {
                                $width = $widths['desktop'];
                            }
                            self::set_style( $render_slug, array(
                                'selector'    => "{$this->main_css_element} .dipl_button_secondary_text:{$secondary_pseudo_selector}",
                                'declaration' => sprintf(
                                    'width: %1$s;',
                                    esc_attr( $width )
                                ),
                                'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
                            ) );
                            self::set_style( $render_slug, array(
                                'selector'    => "{$this->main_css_element} .dipl_button_link:hover .dipl_button_secondary_text:{$secondary_pseudo_selector_hover}",
                                'declaration' => sprintf(
                                    'width: %1$s;',
                                    esc_attr( $width )
                                ),
                                'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
                            ) );
                            self::set_style( $render_slug, array(
                                'selector'    => "{$this->main_css_element} .dipl_button_link:hover .dipl_button_secondary_text:{$secondary_pseudo_selector}",
                                'declaration' => 'width: 0;',
                                'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
                            ) );
                        }
                    }
                } else {
                    if ( 'desktop' === $device ) {
                        $media_query = '';
                    } else if ( 'tablet' === $device  ) {
                        $media_query = ET_Builder_Element::get_media_query( 'max_width_980' );
                    } else if ( 'phone' === $device  ) {
                        $media_query = ET_Builder_Element::get_media_query( 'max_width_767' );
                    }
                    $secondory_text_translate_selector  = "{$this->main_css_element} .dipl_button_secondary_text:before, {$this->main_css_element} .dipl_button_secondary_text:after, {$this->main_css_element} .dipl_button_link:hover .dipl_button_secondary_text:before, {$this->main_css_element} .dipl_button_link:hover .dipl_button_secondary_text:after";
                    self::set_style( $render_slug, array(
                        'selector'    => $secondory_text_translate_selector,
                        'declaration' => 'width: 0;',
                        'media_query' => $media_query,
                    ) );
                }
            }
        }
    }

    public function process_advanced_margin_padding_css( $module, $function_name, $margin_padding ) {
        $utils           = ET_Core_Data_Utils::instance();
        $all_values      = $module->props;
        $advanced_fields = $module->advanced_fields;

        // Disable if module doesn't set advanced_fields property and has no VB support.
        if ( ! $module->has_vb_support() && ! $module->has_advanced_fields ) {
            return;
        }

        $allowed_advanced_fields = array( 'button_margin_padding' );
        foreach ( $allowed_advanced_fields as $advanced_field ) {
            if ( ! empty( $advanced_fields[ $advanced_field ] ) ) {
                foreach ( $advanced_fields[ $advanced_field ] as $label => $form_field ) {
                    $margin_key  = "{$label}_custom_margin";
                    $padding_key = "{$label}_custom_padding";
                    if ( '' !== $utils->array_get( $all_values, $margin_key, '' ) || '' !== $utils->array_get( $all_values, $padding_key, '' ) ) {
                        $settings = $utils->array_get( $form_field, 'margin_padding', array() );
                        // Ensure main selector exists.
                        $form_field_margin_padding_css = $utils->array_get( $settings, 'css.main', '' );
                        if ( empty( $form_field_margin_padding_css ) ) {
                            $utils->array_set( $settings, 'css.main', $utils->array_get( $form_field, 'css.main', '' ) );
                        }

                        $margin_padding->update_styles( $module, $label, $settings, $function_name, $advanced_field );
                    }
                }
            }
        }
    }

    public function process_custom_background( $function_name, $options ) {

        $normal_fields = $options['normal'];
        
        foreach ( $normal_fields as $option_name => $element ) {
            
            $css_element           = $element;
            $css_element_processed = $element;

            if ( is_array( $element ) ) {
                $css_element_processed = implode( ', ', $element );
            }
            
            // Place to store processed background. It will be compared with the smaller device
            // background processed value to avoid rendering the same styles.
            $processed_background_color  = '';
            $processed_background_image  = '';
            $processed_background_blend  = '';
    
            // Store background images status because the process is extensive.
            $background_image_status = array(
                'desktop' => false,
                'tablet'  => false,
                'phone'   => false,
            );

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
                if ( ! $is_desktop && ! et_pb_responsive_options()->is_responsive_enabled( $this->props, "{$option_name}_color" ) ) {
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
    
                    // Save background gradient into background images list.
                    $background_images[] = $this->get_gradient( $gradient_properties );
    
                    // Flag to inform BG Color if current module has Gradient.
                    $has_background_color_gradient = true;
                } else if ( 'off' === $use_background_color_gradient ) {
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
                            $background_style                  .= 'background-color: initial; ';
                        }
    
                        $processed_background_blend = $background_blend;
                    }
    
                    // Only append background image when the image is exist.
                    $background_images[] = sprintf( 'url(%1$s)', esc_html( $background_image ) );
                } else if ( '' === $background_image ) {
                    // Reset - If background image is disabled, ensure we reset prev background blend mode.
                    if ( '' !== $processed_background_blend ) {
                        $background_style .= 'background-blend-mode: normal; ';
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
                } else if ( ! $is_desktop && $is_background_color_gradient_disabled && $is_background_image_disabled ) {
                    // Reset - If background image and gradient are disabled, reset current background image.
                    $background_image_style = 'initial';
                    $background_style .= 'background-image: initial !important;';
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
                        $current_media_query = 'tablet' === $device ? 'max_width_980' : 'max_width_767';
                        $background_style_attrs['media_query'] = ET_Builder_Element::get_media_query( $current_media_query );
                    }
    
                    ET_Builder_Element::set_style( $function_name, $background_style_attrs );
                }
            }
            
        }

        if ( isset( $options['hover'] ) ) {
            $hover_fields = $options['hover'];
        } else {
            $hover_fields = $options['normal'];
            foreach ( $hover_fields as &$value ) {
                $value = $value . ':hover';
            }
        }

        foreach ( $hover_fields as $option_name => $element ) {

            $css_element           = $element;
            $css_element_processed = $element;
            
            if ( is_array( $element ) ) {
                $css_element_processed = implode( ', ', $element );
            }

            // Background Hover.
            if ( et_builder_is_hover_enabled( "{$option_name}_color", $this->props ) ) {

                $background_base_name       = $option_name;
                $background_prefix          = "{$option_name}_";
                $background_images_hover    = array();
                $background_hover_style     = '';

                $has_background_color_gradient_hover         = false;
                $has_background_image_hover                  = false;
                $has_background_gradient_and_image_hover     = false;
                $is_background_color_gradient_hover_disabled = false;
                $is_background_image_hover_disabled          = false;

                $background_color_gradient_overlays_image_desktop = et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_overlays_image", 'off', true );
    
                $gradient_properties_desktop = array(
                    'type'             => et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_type", '', true ),
                    'direction'        => et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_direction", '', true ),
                    'radial_direction' => et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_direction_radial", '', true ),
                    'color_start'      => et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_start", '', true ),
                    'color_end'        => et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_end", '', true ),
                    'start_position'   => et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_start_position", '', true ),
                    'end_position'     => et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_end_position", '', true ),
                );

                $background_color_gradient_overlays_image_hover = 'off';

                // Background Gradient Hover.
                // This part is little bit different compared to other hover implementation. In
                // this case, hover is enabled on the background field, not on the each of those
                // fields. So, built in function get_value() doesn't work in this case.
                // Temporarily, we need to fetch the the value from get_raw_value().
                $use_background_color_gradient_hover = et_pb_responsive_options()->get_inheritance_background_value( $this->props, "{$background_prefix}use_color_gradient", 'hover', $background_base_name, $this->fields_unprocessed );

                if ( 'on' === $use_background_color_gradient_hover ) {
                    // Desktop value as default.
                    $background_color_gradient_type_desktop             = ET_Builder_Element::$_->array_get( $gradient_properties_desktop, 'type', '' );
                    $background_color_gradient_direction_desktop        = ET_Builder_Element::$_->array_get( $gradient_properties_desktop, 'direction', '' );
                    $background_color_gradient_radial_direction_desktop = ET_Builder_Element::$_->array_get( $gradient_properties_desktop, 'radial_direction', '' );
                    $background_color_gradient_color_start_desktop      = ET_Builder_Element::$_->array_get( $gradient_properties_desktop, 'color_start', '' );
                    $background_color_gradient_color_end_desktop        = ET_Builder_Element::$_->array_get( $gradient_properties_desktop, 'color_end', '' );
                    $background_color_gradient_start_position_desktop   = ET_Builder_Element::$_->array_get( $gradient_properties_desktop, 'start_position', '' );
                    $background_color_gradient_end_position_desktop     = ET_Builder_Element::$_->array_get( $gradient_properties_desktop, 'end_position', '' );

                    // Hover value.
                    $background_color_gradient_type_hover             = et_pb_hover_options()->get_raw_value( "{$background_prefix}color_gradient_type", $this->props, $background_color_gradient_type_desktop );
                    $background_color_gradient_direction_hover        = et_pb_hover_options()->get_raw_value( "{$background_prefix}color_gradient_direction", $this->props, $background_color_gradient_direction_desktop );
                    $background_color_gradient_direction_radial_hover = et_pb_hover_options()->get_raw_value( "{$background_prefix}color_gradient_direction_radial", $this->props, $background_color_gradient_radial_direction_desktop );
                    $background_color_gradient_start_hover            = et_pb_hover_options()->get_raw_value( "{$background_prefix}color_gradient_start", $this->props, $background_color_gradient_color_start_desktop );
                    $background_color_gradient_end_hover              = et_pb_hover_options()->get_raw_value( "{$background_prefix}color_gradient_end", $this->props, $background_color_gradient_color_end_desktop );
                    $background_color_gradient_start_position_hover   = et_pb_hover_options()->get_raw_value( "{$background_prefix}color_gradient_start_position", $this->props, $background_color_gradient_start_position_desktop );
                    $background_color_gradient_end_position_hover     = et_pb_hover_options()->get_raw_value( "{$background_prefix}color_gradient_end_position", $this->props, $background_color_gradient_end_position_desktop );
                    $background_color_gradient_overlays_image_hover   = et_pb_hover_options()->get_raw_value( "{$background_prefix}color_gradient_overlays_image", $this->props, $background_color_gradient_overlays_image_desktop );

                    $has_background_color_gradient_hover = true;

                    $gradient_values_hover = array(
                        'type'             => '' !== $background_color_gradient_type_hover ? $background_color_gradient_type_hover : $background_color_gradient_type_desktop,
                        'direction'        => '' !== $background_color_gradient_direction_hover ? $background_color_gradient_direction_hover : $background_color_gradient_direction_desktop,
                        'radial_direction' => '' !== $background_color_gradient_direction_radial_hover ? $background_color_gradient_direction_radial_hover : $background_color_gradient_radial_direction_desktop,
                        'color_start'      => '' !== $background_color_gradient_start_hover ? $background_color_gradient_start_hover : $background_color_gradient_color_start_desktop,
                        'color_end'        => '' !== $background_color_gradient_end_hover ? $background_color_gradient_end_hover : $background_color_gradient_color_end_desktop,
                        'start_position'   => '' !== $background_color_gradient_start_position_hover ? $background_color_gradient_start_position_hover : $background_color_gradient_start_position_desktop,
                        'end_position'     => '' !== $background_color_gradient_end_position_hover ? $background_color_gradient_end_position_hover : $background_color_gradient_end_position_desktop,
                    );

                    $background_images_hover[] = $this->get_gradient( $gradient_values_hover );
                } else if ( 'off' === $use_background_color_gradient_hover ) {
                    $is_background_color_gradient_hover_disabled = true;
                }

                // Background Image Hover.
                // This part is little bit different compared to other hover implementation. In
                // this case, hover is enabled on the background field, not on the each of those
                // fields. So, built in function get_value() doesn't work in this case.
                // Temporarily, we need to fetch the the value from get_raw_value().
                $background_image_hover = et_pb_responsive_options()->get_inheritance_background_value( $this->props, "{$background_prefix}image", 'hover', $background_base_name, $this->fields_unprocessed );
                $parallax_hover         = et_pb_hover_options()->get_raw_value( "{$background_prefix}parallax", $this->props );

                if ( '' !== $background_image_hover && null !== $background_image_hover && 'on' !== $parallax_hover ) {
                    // Flag to inform BG Color if current module has Image.
                    $has_background_image_hover = true;

                    // Size.
                    $background_size_hover   = et_pb_hover_options()->get_raw_value( "{$background_prefix}size", $this->props );
                    $background_size_desktop = ET_Builder_Element::$_->array_get( $this->props, "{$background_prefix}size", '' );
                    $is_same_background_size = $background_size_hover === $background_size_desktop;
                    if ( empty( $background_size_hover ) && ! empty( $background_size_desktop ) ) {
                        $background_size_hover = $background_size_desktop;
                    }

                    if ( ! empty( $background_size_hover ) && ! $is_same_background_size ) {
                        $background_hover_style .= sprintf(
                            'background-size: %1$s; ',
                            esc_html( $background_size_hover )
                        );
                    }

                    // Position.
                    $background_position_hover   = et_pb_hover_options()->get_raw_value( "{$background_prefix}position", $this->props );
                    $background_position_desktop = ET_Builder_Element::$_->array_get( $this->props, "{$background_prefix}position", '' );
                    $is_same_background_position = $background_position_hover === $background_position_desktop;
                    if ( empty( $background_position_hover ) && ! empty( $background_position_desktop ) ) {
                        $background_position_hover = $background_position_desktop;
                    }

                    if ( ! empty( $background_position_hover ) && ! $is_same_background_position ) {
                        $background_hover_style .= sprintf(
                            'background-position: %1$s; ',
                            esc_html( str_replace( '_', ' ', $background_position_hover ) )
                        );
                    }

                    // Repeat.
                    $background_repeat_hover   = et_pb_hover_options()->get_raw_value( "{$background_prefix}repeat", $this->props );
                    $background_repeat_desktop = ET_Builder_Element::$_->array_get( $this->props, "{$background_prefix}repeat", '' );
                    $is_same_background_repeat = $background_repeat_hover === $background_repeat_desktop;
                    if ( empty( $background_repeat_hover ) && ! empty( $background_repeat_desktop ) ) {
                        $background_repeat_hover = $background_repeat_desktop;
                    }

                    if ( ! empty( $background_repeat_hover ) && ! $is_same_background_repeat ) {
                        $background_hover_style .= sprintf(
                            'background-repeat: %1$s; ',
                            esc_html( $background_repeat_hover )
                        );
                    }

                    // Blend.
                    $background_blend_hover = et_pb_hover_options()->get_raw_value( "{$background_prefix}blend", $this->props );
                    $background_blend_default = ET_Builder_Element::$_->array_get( $this->fields_unprocessed, "{$background_prefix}blend.default", '' );
                    $background_blend_desktop = ET_Builder_Element::$_->array_get( $this->props, "{$background_prefix}blend", '' );
                    $is_same_background_blend = $background_blend_hover === $background_blend_desktop;
                    if ( empty( $background_blend_hover ) && ! empty( $background_blend_desktop ) ) {
                        $background_blend_hover = $background_blend_desktop;
                    }

                    if ( ! empty( $background_blend_hover ) ) {
                        if ( ! $is_same_background_blend ) {
                            $background_hover_style .= sprintf(
                                'background-blend-mode: %1$s; ',
                                esc_html( $background_blend_hover )
                            );
                        }

                        // Force background-color: initial;
                        if ( $has_background_color_gradient_hover && $has_background_image_hover && $background_blend_hover !== $background_blend_default ) {
                            $has_background_gradient_and_image_hover = true;
                            $background_hover_style .= 'background-color: initial !important;';
                        }
                    }

                    // Only append background image when the image exists.
                    $background_images_hover[] = sprintf( 'url(%1$s)', esc_html( $background_image_hover ) );
                } else if ( '' === $background_image_hover ) {
                    $is_background_image_hover_disabled = true;
                }

                if ( ! empty( $background_images_hover ) ) {
                    // The browsers stack the images in the opposite order to what you'd expect.
                    if ( 'on' !== $background_color_gradient_overlays_image_hover ) {
                        $background_images_hover = array_reverse( $background_images_hover );
                    }

                    $background_hover_style .= sprintf(
                        'background-image: %1$s !important;',
                        esc_html( join( ', ', $background_images_hover ) )
                    );
                } else if ( $is_background_color_gradient_hover_disabled && $is_background_image_hover_disabled ) {
                    $background_hover_style .= 'background-image: initial !important;';
                }

                // Background Color Hover.
                if ( ! $has_background_gradient_and_image_hover ) {
                    $background_color_hover = et_pb_responsive_options()->get_inheritance_background_value( $this->props, "{$background_prefix}color", 'hover', $background_base_name, $this->fields_unprocessed );
                    $background_color_hover = '' !== $background_color_hover ? $background_color_hover : 'transparent';

                    if ( '' !== $background_color_hover ) {
                        $background_hover_style .= sprintf(
                            'background-color: %1$s !important; ',
                            esc_html( $background_color_hover )
                        );
                    }
                }

                // Print background hover gradient and image styles.
                if ( '' !== $background_hover_style ) {
                    $background_hover_style_attrs = array(
                        'selector'    => $css_element_processed,
                        'declaration' => rtrim( $background_hover_style ),
                        'priority'    => $this->_style_priority,
                    );

                    ET_Builder_Element::set_style( $function_name, $background_hover_style_attrs );
                }
            }
        }
    }

}
$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
    $modules = explode( ',', $plugin_options['dipl-modules'] );
    if ( in_array( 'dipl_button', $modules ) ) {
        new DIPL_ButtonItem();
    }
} else {
    new DIPL_ButtonItem();
}