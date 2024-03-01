<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.4
 */
class DIPL_BarCounter extends ET_Builder_Module {

    public $slug       = 'dipl_bar_counter';
    public $vb_support = 'on';

    protected $module_credits = array(
        'module_uri' => 'https://diviextended.com/product/divi-plus/',
        'author'     => 'Elicus',
        'author_uri' => 'https://elicus.com/',
    );

    public function init() {
        $this->name             = esc_html__( 'DP Bar Counter', 'divi-plus' );
        $this->main_css_element = '%%order_class%%';
    }

    public function get_settings_modal_toggles() {
        return array(
            'general'  => array(
                'toggles' => array(
                    'main_content' => esc_html__( 'Configuration', 'divi-plus' ),
                ),
            ),
            'advanced'  => array(
                'toggles' => array(
                    'text' => array(
                        'title' => esc_html__( 'Text', 'divi-plus' ),
                        'sub_toggles'   => array(
                            'title_text' => array(
                                'name' => 'Title',
                            ),
                            'percent_text' => array(
                                'name' => 'Percent',
                            ),
                        ),
                        'tabbed_subtoggles' => true,
                    ),
                ),
            ),
        );
    }

    public function get_advanced_fields_config() {
        return array (
            'fonts' => array(
                'title' => array(
                    'label' => esc_html__( 'Title', 'divi-plus' ),
                    'font_size' => array(
                        'default'        => '18px',
                        'range_settings' => array(
                            'min'  => '1',
                            'max'  => '100',
                            'step' => '1',
                        ),
                        'validate_unit'  => true,
                    ),
                    'line_height' => array(
                        'default'        => '1.5em',
                        'range_settings' => array(
                            'min'  => '0.1',
                            'max'  => '10',
                            'step' => '0.1',
                        ),
                    ),
                    'letter_spacing' => array(
                        'default'        => '0px',
                        'range_settings' => array(
                            'min'  => '0',
                            'max'  => '10',
                            'step' => '1',
                        ),
                        'validate_unit'  => true,
                    ),
                    'header_level'   => array(
                        'default' => 'h4',
                    ),
                    'hide_text_align' => true,
                    'css' => array(
                        'main' => "{$this->main_css_element} .dipl_bar_counter_title",
                    ),
                    'tab_slug'      => 'advanced',
                    'toggle_slug'   => 'text',
                    'sub_toggle'    => 'title_text',
                ),
                'percent' => array(
                    'label' => esc_html__( 'Percent', 'divi-plus' ),
                    'font_size' => array(
                        'default'        => '16px',
                        'range_settings' => array(
                            'min'  => '1',
                            'max'  => '100',
                            'step' => '1',
                        ),
                        'validate_unit'  => true,
                    ),
                    'line_height' => array(
                        'default'        => '1.4em',
                        'range_settings' => array(
                            'min'  => '0.1',
                            'max'  => '10',
                            'step' => '0.1',
                        ),
                    ),
                    'letter_spacing' => array(
                        'default'        => '0px',
                        'range_settings' => array(
                            'min'  => '0',
                            'max'  => '10',
                            'step' => '1',
                        ),
                        'validate_unit'  => true,
                    ),
                    'text_align' => array(
                        'default' => 'right',
                    ),
                    'css'            => array(
                        'main'  => "{$this->main_css_element} .dipl_bar_counter_percent",
                        'text_align' => "{$this->main_css_element} .layout1 .dipl_bar_counter_filled_bar_wrapper",
                    ),
                    'tab_slug'      => 'advanced',
                    'toggle_slug'   => 'text',
                    'sub_toggle'    => 'percent_text',
                ),
            ),
            'borders' => array(
                'bar' => array(
                    'label_prefix' => esc_html__( 'Bar/Chunks', 'divi-plus' ),
                    'css'          => array(
                        'main' => array(
                            'border_radii'  => "{$this->main_css_element} .dipl_bar_counter_bar, {$this->main_css_element} .dipl_bar_counter_chunks",
                            'border_styles' => "{$this->main_css_element} .dipl_bar_counter_bar, {$this->main_css_element} .dipl_bar_counter_chunks",
                        ),
                    ),
                    'tab_slug'     => 'advanced',
                    'toggle_slug'  => 'border',
                ),
                'filled_bar' => array(
                    'label_prefix' => esc_html__( 'Filled Bar/Chunks', 'divi-plus' ),
                    'css'          => array(
                        'main' => array(
                            'border_radii'  => "{$this->main_css_element} .dipl_bar_counter_filled_bar, {$this->main_css_element} .dipl_bar_counter_filled_chunks",
                            'border_styles' => "{$this->main_css_element} .dipl_bar_counter_filled_bar, {$this->main_css_element} .dipl_bar_counter_filled_chunks",
                        ),
                    ),
                    'tab_slug'     => 'advanced',
                    'toggle_slug'  => 'border',
                ),
                'default' => array(
                    'css' => array(
                        'main' => array(
                            'border_radii'  => $this->main_css_element,
                            'border_styles' => $this->main_css_element,
                        ),
                        'important' => 'all',
                    ),
                ),
            ),
            'box_shadow' => array(
                'default' => array(
                    'css' => array(
                        'main' => $this->main_css_element,
                        'important' => 'all',
                    ),
                ),
            ),
            'max_width' => array(
                'extra' => array(
                    'chunks' => array(
                        'options' => array(
                            'width' => array(
                                'label'             => esc_html__( 'Chunks Width', 'divi-plus' ),
                                'range_settings'    => array(
                                    'min'  => 1,
                                    'max'  => 100,
                                    'step' => 1,
                                ),
                                'hover'             => false,
                                'default_unit'      => 'px',
                                'default_tablet'    => '',
                                'default_phone'     => '',
                                'show_if'           => array(
                                    'enable_custom_chunks_size' => 'on'
                                ),
                                'tab_slug'          => 'general',
                                'toggle_slug'       => 'main_content',
                            ),
                        ),
                        'use_max_width'        => false,
                        'use_module_alignment' => false,
                        'css'                  => array(
                            'main' => "{$this->main_css_element} .dipl_bar_counter_chunks",
                        ),
                    ),
                ),
            ),
            'height' => array(
                'extra' => array(
                    'chunks' => array(
                        'options' => array(
                            'height' => array(
                                'label'             => esc_html__( 'Chunks Height', 'divi-plus' ),
                                'range_settings'    => array(
                                    'min'  => 1,
                                    'max'  => 100,
                                    'step' => 1,
                                ),
                                'hover'             => false,
                                'default_unit'      => 'px',
                                'default_tablet'    => '',
                                'default_phone'     => '',
                                'show_if'           => array(
                                    'enable_custom_chunks_size' => 'on'
                                ),
                                'tab_slug'          => 'general',
                                'toggle_slug'       => 'main_content',
                            ),
                        ),
                        'use_max_height' => false,
                        'use_min_height' => false,
                        'css'            => array(
                            'main' => "{$this->main_css_element} .dipl_bar_counter_chunks",
                        ),
                    ),
                ),
            ),
            'margin_padding' => array(
                'css' => array(
                    'main'      => $this->main_css_element,
                    'important' => 'all',
                ),
            ),
            'background' => array(
                'css' => array(
                    'main' => $this->main_css_element,
                ),
            ),
            'text' => false,
            'text_shadow' => false,
        );
    }

    public function get_fields() {

        return array_merge(
            array(
                'bar_layout' => array(
                    'label'             => esc_html__( 'Layout', 'divi-plus' ),
                    'type'              => 'select',
                    'option_category'   => 'configuration',
                    'options'           => array(
                        'layout1'   => esc_html__( 'Layout 1', 'divi-plus' ),
                        'layout2'   => esc_html__( 'Layout 2', 'divi-plus' ),
                    ),
                    'default'           => 'layout1',
                    'default_on_front'  => 'layout1',
                    'tab_slug'          => 'general',
                    'toggle_slug'       => 'main_content',
                    'description'       => esc_html__( 'Here you can select the layout for your bar.', 'divi-plus' ),
                ),
                'title' => array(
                    'label'             => esc_html__( 'Title', 'divi-plus' ),
                    'type'              => 'text',
                    'option_category'   => 'basic_option',
                    'tab_slug'          => 'general',
                    'toggle_slug'       => 'main_content',
                    'description'       => esc_html__( 'Define the title for your bar.', 'divi-plus' ),
                ),
                'percent' => array(
                    'label'             => esc_html__( 'Percent', 'divi-plus' ),
                    'type'              => 'range',
                    'option_category'   => 'layout',
                    'range_settings'    => array(
                        'min'  => '1',
                        'max'  => '100',
                        'step' => '1',
                    ),
                    'fixed_unit'        => '%',
                    'default'           => '50%',
                    'default_on_front'  => '50%',
                    'tab_slug'          => 'general',
                    'toggle_slug'       => 'main_content',
                    'description'       => esc_html__( 'Define the percentage for your bar.', 'divi-plus' ),
                ),
                'show_empty_bar' => array(
                    'label'             => esc_html__( 'Display Empty Bar/Chunks', 'divi-plus' ),
                    'type'              => 'yes_no_button',
                    'option_category'   => 'configuration',
                    'options'           => array(
                        'on'  => esc_html__( 'Yes', 'divi-plus' ),
                        'off' => esc_html__( 'No', 'divi-plus' ),
                    ),
                    'default'           => 'off',
                    'tab_slug'          => 'general',
                    'toggle_slug'       => 'main_content',
                    'description'       => esc_html__( 'Here you can choose whether to display empty bar or not.', 'divi-plus' ),
                ),
                'enable_custom_chunks_size' => array(
                    'label'            => esc_html__( 'Enable Custom Chunks Size', 'divi-plus' ),
                    'type'             => 'yes_no_button',
                    'option_category'  => 'configuration',
                    'options'          => array(
                        'on'  => esc_html__( 'Yes', 'divi-plus' ),
                        'off' => esc_html__( 'No', 'divi-plus' ),
                    ),
                    'default'           => 'off',
                    'default_on_front'  => 'off',
                    'show_if'           => array(
                        'bar_layout' => 'layout2',
                    ),
                    'tab_slug'          => 'general',
                    'toggle_slug'       => 'main_content',
                    'description'       => esc_html__( 'Whether or not to enable custom chunks size.', 'divi-plus' ),
                ),
                'use_stripes' => array(
                    'label'             => esc_html__( 'Use Stripes', 'divi-plus' ),
                    'type'              => 'yes_no_button',
                    'option_category'   => 'configuration',
                    'options'           => array(
                        'on'  => esc_html__( 'Yes', 'divi-plus' ),
                        'off' => esc_html__( 'No', 'divi-plus' ),
                    ),
                    'default'           => 'off',
                    'show_if'           => array(
                        'bar_layout' => 'layout1',
                    ),
                    'tab_slug'          => 'general',
                    'toggle_slug'       => 'main_content',
                    'description'       => esc_html__( 'Here you can choose whether to use striped bar or not.', 'divi-plus' ),
                ),
                'stripe_color' => array(
                    'label'            => esc_html__( 'Stripe Color', 'divi-plus' ),
                    'type'             => 'color-alpha',
                    'custom_color'     => true,
                    'show_if'          => array(
                        'bar_layout' => 'layout1',
                        'use_stripes' => 'on',
                    ),
                    'default'          => 'rgba(255,255,255,.15)',
                    'default_on_front' => 'rgba(255,255,255,.15)',
                    'tab_slug'         => 'general',
                    'toggle_slug'      => 'main_content',
                    'description'      => esc_html__( 'Here you can select the color for the stripes.', 'divi-plus' ),
                ),
                'use_animated_stripes' => array(
                    'label'             => esc_html__( 'Enable Stripes animation', 'divi-plus' ),
                    'type'              => 'yes_no_button',
                    'option_category'   => 'configuration',
                    'options'           => array(
                        'on'  => esc_html__( 'Yes', 'divi-plus' ),
                        'off' => esc_html__( 'No', 'divi-plus' ),
                    ),
                    'default'           => 'off',
                    'show_if'           => array(
                        'bar_layout' => 'layout1',
                        'use_stripes' => 'on',
                    ),
                    'tab_slug'          => 'general',
                    'toggle_slug'       => 'main_content',
                    'description'       => esc_html__( 'Here you can choose whether to use animated striped bar or not.', 'divi-plus' ),
                ),
                'animation_speed' => array(
                    'label'                 => esc_html__( 'Animation Speed', 'divi-plus' ),
                    'type'                  => 'range',
                    'option_category'       => 'layout',
                    'range_settings'        => array(
                        'min'  => '1',
                        'max'  => '10',
                        'step' => '1',
                    ),
                    'unitless'              => true,
                    'default'               => '1',
                    'default_on_front'      => '1',
                    'show_if'          => array(
                        'bar_layout' => 'layout1',
                        'use_stripes' => 'on',
                        'use_animated_stripes' => 'on',
                    ),
                    'tab_slug'              => 'general',
                    'toggle_slug'           => 'main_content',
                    'description'           => esc_html__( 'Here you can select the animation speed in seconds.', 'divi-plus' ),
                ),
                'bar_bg_color' => array(
                    'label'                 => esc_html__( 'Bar/Chunks Background', 'divi-plus' ),
                    'type'                  => 'background-field',
                    'base_name'             => 'bar_bg',
                    'context'               => 'bar_bg_color',
                    'option_category'       => 'button',
                    'custom_color'          => true,
                    'background_fields'     => $this->generate_background_options( 'bar_bg', 'button', 'general', 'background', 'bar_bg_color' ),
                    'hover'                 => 'tabs',
                    'tab_slug'              => 'general',
                    'toggle_slug'           => 'background',
                    'description'           => esc_html__( 'Customize the background style of the bar by adjusting the background color, gradient, and image.', 'divi-plus' ),
                ),
                'filled_bar_bg_color' => array(
                    'label'                 => esc_html__( 'Filled Bar/Chunks Background', 'divi-plus' ),
                    'type'                  => 'background-field',
                    'base_name'             => 'filled_bar_bg',
                    'context'               => 'filled_bar_bg_color',
                    'option_category'       => 'button',
                    'custom_color'          => true,
                    'background_fields'     => $this->generate_background_options( 'filled_bar_bg', 'button', 'general', 'background', 'filled_bar_bg_color' ),
                    'hover'                 => 'tabs',
                    'tab_slug'              => 'general',
                    'toggle_slug'           => 'background',
                    'description'           => esc_html__( 'Customize the background style of the bar by adjusting the background color, gradient, and image.', 'divi-plus' ),
                ),
            ),
            $this->generate_background_options( 'bar_bg', 'skip', 'general', 'background', 'bar_bg_color' ),
            $this->generate_background_options( 'filled_bar_bg', 'skip', 'general', 'background', 'filled_bar_bg_color' )
        );
    }

    public function render( $attrs, $content, $render_slug ) {
        $bar_layout                 = $this->props['bar_layout'];
        $title                      = $this->props['title'];
        $percent                    = absint( $this->props['percent'] );
        $show_empty_bar             = $this->props['show_empty_bar'];
        $use_stripes                = $this->props['use_stripes'];
        $use_animated_stripes       = $this->props['use_animated_stripes'];
        $animation_speed            = floatval( $this->props['animation_speed'] );
        $stripe_color               = $this->props['stripe_color'];
        $enable_custom_chunks_size  = $this->props['enable_custom_chunks_size'];

        $title_level                = $this->props['title_level'];
        $processed_title_level      = et_pb_process_header_level( $title_level, 'h4' );
        $processed_title_level      = esc_html( $processed_title_level );
        
        wp_enqueue_script( 'dipl-bar-counter-custom', PLUGIN_PATH."includes/modules/BarCounter/dipl-bar-counter-custom.min.js", array('jquery'), '1.0.0', true );
        $file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        wp_enqueue_style( 'dipl-bar-counter-style', PLUGIN_PATH . 'includes/modules/BarCounter/' . $file . '.min.css', array(), '1.0.0' );

        if ( $percent > 100 ) {
            $percent = 100;
        }
        
        if ( 'layout1' === $bar_layout ) {
            $filled_bar = sprintf(
                '<div class="dipl_bar_counter_filled_bar_wrapper" data-percent="%1$s">
                    <div class="dipl_bar_counter_filled_bar %2$s"></div>
                    <span class="dipl_bar_counter_percent">%1$s%%</span>
                </div>',
                esc_attr( $percent ),
                'on' === $use_stripes ? 'on' === $use_animated_stripes ? 'dipl_bar_counter_animated_striped_bar' : 'dipl_bar_counter_striped_bar' : ''

            );
            if ( 'on' === $show_empty_bar ) {
                $bar = sprintf(
                    '<div class="dipl_bar_counter_bar">
                        %1$s
                    </div>',
                    $filled_bar
                );
            }
            $bar_wrapper = sprintf(
                '<div class="dipl_bar_counter_bar_wrapper">
                    %1$s
                </div>',
                'on' === $show_empty_bar ? $bar : $filled_bar
            );
        }

        if ( 'layout2' === $bar_layout ) {
            $filled_chunks = absint( round( $percent/10 ) );
            $filled_chunks = $filled_chunks < 1 ? 1 : $filled_chunks;
            $chunks        = '';
            for ( $i=1; $i <= $filled_chunks; $i++ ) {
                $chunks .= '<div class="dipl_bar_counter_chunks dipl_bar_counter_filled_chunks"></div>';
            }
            
            if ( 'on' === $show_empty_bar ) {
                $empty_chunks  = 10 - $filled_chunks;
                if ( $empty_chunks > 0 ) {
                    for ( $i=1; $i <= $empty_chunks; $i++ ) {
                        $chunks .= '<div class="dipl_bar_counter_chunks dipl_bar_counter_empty_chunks"></div>';
                    }
                }
            }

            $chunks .= sprintf(
                '<span class="dipl_bar_counter_percent">%1$s%%</span>',
                esc_html( $percent )
            );

            $filled_bar = sprintf(
                '<div class="dipl_bar_counter_filled_bar_wrapper" data-percent="%1$s">
                    %2$s
                </div>',
                esc_attr( $percent ),
                $chunks
            );

            $bar_wrapper = sprintf(
                '<div class="dipl_bar_counter_bar_wrapper">
                    %1$s
                </div>',
                $filled_bar
            );
        }

        if ( '' !== $title ) {
            $title = sprintf(
                '<%1$s class="dipl_bar_counter_title">%2$s</%1$s>',
                $processed_title_level,
                esc_html__( $title, 'divi-plus' )
            );
        }

        $wrapper = sprintf(
            '<div class="dipl_bar_counter_wrapper %1$s">
                %2$s
                %3$s
            </div>',
            esc_attr( $bar_layout ),
            '' !== $title ? $title : '',
            $bar_wrapper
        );

        if ( 'layout2' === $bar_layout ) {
            if ( 'off' === $show_empty_bar ) {
                $width = intval( round( $percent/10 ) ) * 10;
                if (
                    'off' === $enable_custom_chunks_size ||
                    (
                        ( ! isset( $this->props['chunks_width'] ) || '' === $this->props['chunks_width'] ) &&
                        ( ! isset( $this->props['chunks_height'] ) || '' === $this->props['chunks_height'] )
                    )
                ) {
                    self::set_style(
                        $render_slug,
                        array(
                            'selector'    => '%%order_class%% .layout2 .dipl_bar_counter_filled_bar_wrapper',
                            'declaration' => sprintf( 'width: %1$s%%;', esc_attr( $width ) ),
                        )
                    );
                }
            }

            if (
                'on' === $enable_custom_chunks_size &&
                (
                    ( isset( $this->props['chunks_width'] ) && '' !== $this->props['chunks_width'] && 'auto' !== $this->props['chunks_width'] ) ||
                    ( isset( $this->props['chunks_height'] ) && '' !== $this->props['chunks_height'] && 'auto' !== $this->props['chunks_height'] )
                )
            ) {
                self::set_style(
                    $render_slug,
                    array(
                        'selector'    => '%%order_class%% .layout2 .dipl_bar_counter_filled_bar_wrapper',
                        'declaration' => 'align-items: center;',
                    )
                );
                self::set_style(
                    $render_slug,
                    array(
                        'selector'    => '%%order_class%% .dipl_bar_counter_chunks',
                        'declaration' => 'flex-grow: 0;',
                    )
                );
            }
        }
        
        self::set_style(
            $render_slug,
            array(
                'selector'    => '%%order_class%% .dipl_bar_counter_animated_striped_bar:before',
                'declaration' => sprintf( 'animation-duration: %1$ss;', esc_attr( $animation_speed ) ),
            )
        );

        self::set_style(
            $render_slug,
            array(
                'selector'    => '%%order_class%% .dipl_bar_counter_striped_bar:before, %%order_class%% .dipl_bar_counter_animated_striped_bar:before',
                'declaration' => sprintf( 
                    'background-image: -webkit-linear-gradient(-45deg, %1$s 25%%, transparent 25%%, transparent 50%%, %1$s 50%%, %1$s 75%%, transparent 75%%, transparent);
                    background-image: -moz-linear-gradient(-45deg, %1$s 25%%, transparent 25%%, transparent 50%%, %1$s 50%%, %1$s 75%%, transparent 75%%, transparent);
                    background-image: linear-gradient(-45deg, %1$s 25%%, transparent 25%%, transparent 50%%, %1$s 50%%, %1$s 75%%, transparent 75%%, transparent);',
                    esc_attr( $stripe_color )
                ),
            )
        );

        $options = array(
            'normal' => array(
                'bar_bg' => array( 
                    "{$this->main_css_element} .dipl_bar_counter_bar",
                    "{$this->main_css_element} .dipl_bar_counter_chunks"
                ),
                'filled_bar_bg' => array( 
                    "{$this->main_css_element} .dipl_bar_counter_filled_bar",
                    "{$this->main_css_element} .dipl_bar_counter_filled_chunks:before"
                ),
            ),
            'hover' => array(
                'bar_bg' => array( 
                    "{$this->main_css_element} .dipl_bar_counter_bar:hover",
                    "{$this->main_css_element} .dipl_bar_counter_filled_bar_wrapper:hover .dipl_bar_counter_chunks"
                ),
                'filled_bar_bg' => array( 
                    "{$this->main_css_element} .dipl_bar_counter_filled_bar:hover",
                    "{$this->main_css_element} .dipl_bar_counter_filled_bar_wrapper:hover .dipl_bar_counter_filled_chunks:before"
                ),
            ),
        );

        $this->process_custom_background( $render_slug, $options );
        
        return et_core_intentionally_unescaped( $wrapper, 'html' );
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
            $processed_background_color = '';
            $processed_background_image = '';
            $processed_background_blend = '';

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

                $background_base_name    = $option_name;
                $background_prefix       = "{$option_name}_";
                $background_images_hover = array();
                $background_hover_style  = '';

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
                } elseif ( 'off' === $use_background_color_gradient_hover ) {
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
                    $background_blend_hover   = et_pb_hover_options()->get_raw_value( "{$background_prefix}blend", $this->props );
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

                        // Force background-color: initial.
                        if ( $has_background_color_gradient_hover && $has_background_image_hover && $background_blend_hover !== $background_blend_default ) {
                            $has_background_gradient_and_image_hover = true;
                            $background_hover_style                 .= 'background-color: initial !important;';
                        }
                    }

                    // Only append background image when the image exists.
                    $background_images_hover[] = sprintf( 'url(%1$s)', esc_html( $background_image_hover ) );
                } elseif ( '' === $background_image_hover ) {
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
                } elseif ( $is_background_color_gradient_hover_disabled && $is_background_image_hover_disabled ) {
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
    if ( in_array( 'dipl_bar_counter', $modules ) ) {
        new DIPL_BarCounter();
    }
} else {
    new DIPL_BarCounter();
}