<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.4
 */
class DIPL_ScrollImage extends ET_Builder_Module {

    public $slug       = 'dipl_scroll_image';
    public $vb_support = 'on';

    protected $module_credits = array(
        'module_uri' => 'https://diviextended.com/product/divi-plus/',
        'author'     => 'Elicus',
        'author_uri' => 'https://elicus.com/',
    );

    public function init() {
        $this->name             = esc_html__( 'DP Scroll Image', 'divi-plus' );
        $this->main_css_element = '%%order_class%%';
    }

    public function get_settings_modal_toggles() {
        return array(
            'general'  => array(
                'toggles' => array(
                    'main_content'     => esc_html__( 'Image', 'divi-plus' ),
                    'configuration'    => esc_html__( 'Configuration', 'divi-plus' ),
                ),
            ),
            'advanced'  => array(
                'toggles' => array(
                    'rating_number' => array(
                        'title'    => esc_html__( 'Rating Number', 'divi-plus' ),
                    ),
                ),
            ),
        );
    }

    public function get_advanced_fields_config() {
        return array (
            'borders' => array(
                'image' => array(
                    'label_prefix' => esc_html__( 'Image', 'divi-plus' ),
                    'css'          => array(
                        'main' => array(
                            'border_radii'  => "{$this->main_css_element} .dipl_scroll_image_inner_wrap",
                            'border_styles' => "{$this->main_css_element} .dipl_scroll_image_inner_wrap",
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
            'max_width' => array(
                'extra' => array(
                    'scroll_wrapper' => array(
                        'use_max_width'        => false,
                        'use_module_alignment' => true,
                        'options' => array(
                            'width' => array(
                                'label'          => esc_html__( 'Image Container Width', 'divi-plus' ),
                                'range_settings' => array(
                                    'min'  => 1,
                                    'max'  => 100,
                                    'step' => 1,
                                ),
                                'hover'          => false,
                                'default_unit'   => '%',
                                'default_tablet' => '',
                                'default_phone'  => '',
                                'tab_slug'       => 'general',
                                'toggle_slug'    => 'configuration',
                            ),
                            'module_alignment' => array(
                                'label'             => esc_html__( 'Image Container Alignment', 'divi-plus' ),
                                'type'              => 'align',
                                'option_category'   => 'layout',
                                'options'           => et_builder_get_text_orientation_options( array( 'justified' ) ),
                                'tab_slug'          => 'general',
                                'toggle_slug'       => 'configuration',
                                'description'       => esc_html__( 'Align the container to the left, right or center.', 'divi-plus' ),
                            ),
                        ),
                        'css'                  => array(
                            'main' => "{$this->main_css_element} .dipl_scroll_image_wrapper",
                        ),
                    ),
                ),
            ),
            'height' => array(
                'extra' => array(
                    'scroll_wrapper' => array(
                        'options' => array(
                            'height' => array(
                                'label'          => esc_html__( 'Image Container Height', 'divi-plus' ),
                                'range_settings' => array(
                                    'min'  => 1,
                                    'max'  => 100,
                                    'step' => 1,
                                ),
                                'hover'          => false,
                                'default_unit'   => 'px',
                                'default_tablet' => '',
                                'default_phone'  => '',
                                'tab_slug'       => 'general',
                                'toggle_slug'    => 'configuration',
                            ),
                        ),
                        'use_max_height' => false,
                        'use_min_height' => false,
                        'css'            => array(
                            'main' => "{$this->main_css_element} .dipl_scroll_image_wrapper",
                        ),
                    ),
                ),
            ),
            'fonts' => false,
            'text' => false,
            'text_shadow' => false,
        );
    }

    public function get_fields() {

        return array(
            'image' => array(
                'label'                 => esc_html__( 'Image', 'divi-plus' ),
                'type'                  => 'upload',
                'option_category'       => 'basic_option',
                'upload_button_text'    => esc_attr__( 'Upload an image', 'divi-plus' ),
                'choose_text'           => esc_attr__( 'Choose an Image', 'divi-plus' ),
                'update_text'           => esc_attr__( 'Set As Image', 'divi-plus' ),
                'dynamic_content'       => 'image',
                'tab_slug'              => 'general',
                'toggle_slug'           => 'main_content',
                'description'           => esc_html__( 'Here you can add an image to scroll.', 'divi-plus'),
            ),
            'image_alt' => array(
                'label'                 => esc_html__( 'Image Alt Text', 'divi-plus' ),
                'type'                  => 'text',
                'option_category'       => 'basic_option',
                'tab_slug'              => 'general',
                'toggle_slug'           => 'main_content',
                'description'           => esc_html__( 'Define the HTML ALT attribute text for your image here.', 'divi-plus' ),
            ),
            'image_title' => array(
                'label'                 => esc_html__( 'Image Title Text', 'divi-plus' ),
                'type'                  => 'text',
                'option_category'       => 'basic_option',
                'tab_slug'              => 'general',
                'toggle_slug'           => 'main_content',
                'description'           => esc_html__( 'Define the HTML Title attribute text for your image here.', 'divi-plus' ),
            ),
            'scroll_direction' => array(
                'label'                 => esc_html__( 'Scroll Direction', 'divi-plus' ),
                'type'                  => 'select',
                'option_category'       => 'configuration',
                'options'               => array(
                    'top'       => esc_html__( 'Top', 'divi-plus' ),
                    'bottom'    => esc_html__( 'Bottom', 'divi-plus' ),
                    'left'      => esc_html__( 'Left', 'divi-plus' ),
                    'right'     => esc_html__( 'Right', 'divi-plus' ),
                ),
                'default'               => 'top',
                'default_on_front'      => 'top',
                'tab_slug'              => 'general',
                'toggle_slug'           => 'configuration',
                'description'           => esc_html__( 'Here you can select the scroll direction.', 'divi-plus' ),
            ),
            'scroll_speed' => array(
                'label'                 => esc_html__( 'Scroll Speed', 'divi-plus' ),
                'type'                  => 'range',
                'option_category'       => 'layout',
                'range_settings'        => array(
                    'min'  => '1',
                    'max'  => '15',
                    'step' => '1',
                ),
                'unitless'              => true,
                'default'               => '5',
                'default_on_front'      => '5',
                'tab_slug'              => 'general',
                'toggle_slug'           => 'configuration',
                'description'           => esc_html__( 'Here you can select the scroll speed in seconds.', 'divi-plus' ),
            ),
        );
    }

    public function render( $attrs, $content, $render_slug ) {
        $multi_view         = et_pb_multi_view_options( $this );
        $image_alt          = $this->props['image_alt'];
        $image_title        = $this->props['image_title'];
        $scroll_direction   = $this->props['scroll_direction'];
        $scroll_speed       = $this->props['scroll_speed'];

        wp_enqueue_script( 'dipl-scroll-image-custom', PLUGIN_PATH . 'includes/modules/ScrollImage/dipl-scroll-image-custom.min.js', array('jquery'), '1.0.0', true );
        $file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        wp_enqueue_style( 'dipl-scroll-image-style', PLUGIN_PATH . 'includes/modules/ScrollImage/' . $file . '.min.css', array(), '1.0.0' );

        $image = $multi_view->render_element(
            array(
                'tag'      => 'img',
                'attrs'    => array(
                    'src'   => '{{image}}',
                    'alt'   => esc_attr( $image_alt ),
                    'title' => esc_attr( $image_title ),
                ),
                'required' => 'image',
            )
        );

        if ( '' === $image ) {
            return '';
        }

        $wrapper = sprintf(
            '<div class="dipl_scroll_image_wrapper">
                <div class="dipl_scroll_image_inner_wrap" data-direction="%2$s">
                    %1$s
                </div>
            </div>',
            et_core_intentionally_unescaped( $image, 'html' ),
            esc_attr( $scroll_direction )
        );

        self::set_style(
            $render_slug,
            array(
                'selector'    => '%%order_class%% .dipl_scroll_image_inner_wrap img',
                'declaration' => sprintf( 'transition: all %1$ss ease-out;', floatval( $scroll_speed ) ),
            )
        );

        return et_core_intentionally_unescaped( $wrapper, 'html' );
    }

}
$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
    $modules = explode( ',', $plugin_options['dipl-modules'] );
    if ( in_array( 'dipl_scroll_image', $modules ) ) {
        new DIPL_ScrollImage();
    }
} else {
    new DIPL_ScrollImage();
}