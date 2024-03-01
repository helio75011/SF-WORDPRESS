<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2022 Elicus Technologies Private Limited
 * @version     1.9.5
 */
class DIPL_WooProductsCarousel extends ET_Builder_Module {
	public $slug       = 'dipl_woo_products_carousel';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	/**
	 * Track if the module is currently rendering to prevent unnecessary rendering and recursion.
	 *
	 * @var bool
	 */
	protected static $rendering = false;

	public function init() {
		$this->name             = esc_html__( 'DP Woo Products Carousel', 'divi-plus' );
		$this->main_css_element = '%%order_class%%';
		add_filter( 'et_builder_processed_range_value', array( $this, 'dipl_builder_processed_range_value' ), 10, 3 );
	}

	public function get_settings_modal_toggles() {
		return array(
			'general'  => array(
				'toggles' => array(
					'main_content'    => array(
						'title'    => esc_html__( 'Content', 'divi-plus' ),
					),
					'display_setting' => array(
						'title'    => esc_html__( 'Display', 'divi-plus' ),
					),
					'slider_settings' => array(
						'title' => esc_html__( 'Slider', 'divi-plus' ),
					),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'title_text'  => array(
						'title' => esc_html__( 'Title', 'divi-plus' ),
					),
					'price_text' => array(
						'title' => esc_html__( 'Price', 'divi-plus' ),
						 'sub_toggles' => array(
                            'regular_price_text' => array(
                                'name' => esc_html__( 'Regular Price', 'divi-plus' ),
                            ),
                            'sale_price_text' => array(
                                'name' => esc_html__( 'Sale Price', 'divi-plus' ),
                            ),
                        ),
                        'tabbed_subtoggles' => true,
					),
					'sale_badge' => array(
						'title' => esc_html__( 'Sale Badge', 'divi-plus' ),
					),
					'add_to_cart_button' => array (
						'title' => esc_html__( 'Add to Cart', 'divi-plus' ),
					),
					'out_of_stock' => array (
						'title' => esc_html__( 'Out of Stock', 'divi-plus' ),
					),
					'star_rating' => array (
						'title' => esc_html__( 'Star Rating', 'divi-plus' ),
					),
					'slider_styles' => array(
						'title' => esc_html__( 'Slider', 'divi-plus' ),
					),
					'quickview_popup' => array(
						'title' => esc_html__( 'Quickview Lightbox', 'divi-plus' ),
					),
					'quickview_link' => array(
						'title' => esc_html__( 'Quickview Link', 'divi-plus' ),
					),
					'quickview_title_text' => array(
						'title' => esc_html__( 'Quickview Product Title', 'divi-plus' ),
					),
					'quickview_price_text' => array(
						'title' => esc_html__( 'Quickview Product Price', 'divi-plus' ),
						'sub_toggles' => array(
                            'regular_price_text' => array(
                                'name' => esc_html__( 'Regular Price', 'divi-plus' ),
                            ),
                            'sale_price_text' => array(
                                'name' => esc_html__( 'Sale Price', 'divi-plus' ),
                            ),
                        ),
                        'tabbed_subtoggles' => true,
					),
					'quickview_desc_text' => array(
						'title' => esc_html__( 'Quickview Product Description', 'divi-plus' ),
					),
					'quickview_quantity' => array(
						'title' => esc_html__( 'Quickview Product Quantity', 'divi-plus' ),
					),
					'quickview_add_to_cart_button' => array(
						'title' => esc_html__( 'Quickview Add to Cart', 'divi-plus' ),
					),
					'quickview_meta' => array(
						'title' => esc_html__( 'Quickview Product Meta', 'divi-plus' ),
						'sub_toggles' => array(
                            'label_text' => array(
                                'name' => esc_html__( 'Label', 'divi-plus' ),
                            ),
                            'value_text' => array(
                                'name' => esc_html__( 'Value', 'divi-plus' ),
                            ),
                        ),
                        'tabbed_subtoggles' => true,
					),
					'quickview_attributes' => array(
						'title' => esc_html__( 'Quickview Product Attributes', 'divi-plus' ),
						'sub_toggles' => array(
                            'label_text' => array(
                                'name' => esc_html__( 'Label', 'divi-plus' ),
                            ),
                            'field_text' => array(
                                'name' => esc_html__( 'Field', 'divi-plus' ),
                            ),
                        ),
                        'tabbed_subtoggles' => true,
					),
					'loader' => array(
						'title' => esc_html__( 'Loader', 'divi-plus' ),
					),
					'woocommerce_notice' => array(
						'title'             => esc_html__( 'Woocommerce Notice', 'divi-plus' ),
						'tabbed_subtoggles' => true,
						'bb_icons_support'  => true,
						'sub_toggles'       => array(
							'p'     => array(
								'name' => 'P',
								'icon' => 'text-left',
							),
							'a'     => array(
								'name' => 'A',
								'icon' => 'text-link',
							),
						),
					),
				),
			),
		);
	}


	public function get_advanced_fields_config() {
		return array(
			'fonts' => array(
				'title' => array(
					'label'          => esc_html__( 'Title', 'divi-plus' ),
					'font_size'      => array(
						'default'        => '18px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height'    => array(
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
					'text_align'     => array(
						'default' => 'center',
					),
					'css'            => array(
						'main'       => "{$this->main_css_element} .dipl_single_woo_product_title, {$this->main_css_element} .dipl_single_woo_product_title a",
					),
					'tab_slug'	=> 'advanced',
                    'toggle_slug' => 'title_text',
				),
				'price' => array(
					'label'          => esc_html__( 'Regular Price', 'divi-plus' ),
					'font_size'      => array(
						'default'        => '16px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height'    => array(
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
					'text_align'     => array(
						'default' => 'center',
					),
					'css' => array(
						'main'  => "{$this->main_css_element} .dipl_single_woo_product_price, {$this->main_css_element} .dipl_single_woo_product_price span",
					),
					'tab_slug'	=> 'advanced',
                    'toggle_slug' => 'price_text',
                    'sub_toggle' => 'regular_price_text',
				),
				'sale_price' => array(
					'label'          => esc_html__( 'Sale Price', 'divi-plus' ),
					'font_size'      => array(
						'default'        => '16px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height'    => array(
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
					'hide_text_align' => true,
					'css' => array(
						'main'  => "{$this->main_css_element} .dipl_single_woo_product_price ins span",
					),
					'tab_slug'	=> 'advanced',
                    'toggle_slug' => 'price_text',
                    'sub_toggle' => 'sale_price_text',
				),
				'sale' => array(
					'label'          => esc_html__( 'Sale Badge', 'divi-plus' ),
					'font_size'      => array(
						'default'        => '14px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height'    => array(
						'default'        => '1.2em',
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
					'hide_text_align' => true,
					'css' => array(
						'main'  => "{$this->main_css_element} .dipl_single_woo_product_sale_badge",
					),
					'tab_slug'	=> 'advanced',
                    'toggle_slug' => 'sale_badge',
				),
				'add_to_cart' => array(
					'label' => esc_html__( 'Add to Cart Button', 'divi-plus' ),
					'font_size' => array(
						'default'        => '20px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height' => array(
						'default'        => '1.2em',
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
						'default' => 'center',
					),
					'css' => array(
						'main' => "{$this->main_css_element} .dipl_single_woo_product_add_to_cart a.button, {$this->main_css_element} .dipl_single_woo_product_add_to_cart a.add_to_cart_button, {$this->main_css_element} .dipl_single_woo_product_add_to_cart a.added_to_cart",
						'important' => 'all',
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'add_to_cart_button',
				),
				'out_of_stock_label' => array(
					'label'          => esc_html__( 'Out of Stock', 'divi-plus' ),
					'font_size'      => array(
						'default'        => '14px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height'    => array(
						'default'        => '1.2em',
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
					'text_color' => array(
						'default' => '#f00',
					),
					'hide_text_align' => true,
					'css' => array(
						'main'  => "{$this->main_css_element} .dipl_out_of_stock_label",
					),
					'tab_slug'	=> 'advanced',
                    'toggle_slug' => 'out_of_stock',
				),
				'star_rating_text' => array(
					'label'          => esc_html__( 'Star Rating', 'divi-plus' ),
					'font_size' => array(
						'default'        => '14px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height' => array(
						'default'        => '1em',
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
						'default' => 'center',
					),
					'hide_text_color' => true,
					'hide_font'	=> true,
					'hide_text_shadow' => true,
					'css' => array(
						'main'  => "{$this->main_css_element} .dipl_single_woo_product_star_rating .star-rating",
						'important' => 'all',
					),
					'tab_slug'	=> 'advanced',
                    'toggle_slug' => 'star_rating',
				),
				'loader_icon_text' => array(
					'label'          => esc_html__( 'Loader Icon', 'divi-plus' ),
					'font_size'      => array(
						'default'        => '36px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'text_color' => array(
						'default' => '#000',
					),
					'hide_font' => true,
					'hide_text_shadow' => true,
					'hide_text_align' => true,
					'hide_line_height' => true,
					'hide_letter_spacing' => true,
					'css' => array(
						'main'  => "{$this->main_css_element} .dipl_product_lightbox_loader:after",
					),
					'tab_slug'	=> 'advanced',
                    'toggle_slug' => 'loader',
				),
				'woo_notice_p' => array(
					'label'          => esc_html__( 'Notice', 'divi-plus' ),
					'font_size'      => array(
						'default'        => '18px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height'    => array(
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
					'hide_text_align' => true,
					'css' => array(
						'main'  => "{$this->main_css_element} .woocommerce-message",
						'important' => 'all',
					),
					'tab_slug'	=> 'advanced',
                    'toggle_slug' => 'woocommerce_notice',
                    'sub_toggle' => 'p',
				),
				'woo_notice_a' => array(
					'label'          => esc_html__( 'Notice Link', 'divi-plus' ),
					'font_size'      => array(
						'default'        => '18px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height'    => array(
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
					'hide_text_align' => true,
					'css' => array(
						'main'  => "{$this->main_css_element} .woocommerce-message a",
						'important' => 'all',
					),
					'tab_slug'	=> 'advanced',
                    'toggle_slug' => 'woocommerce_notice',
                    'sub_toggle' => 'a',
				),
				'quickview_button' => array(
					'label'          => esc_html__( 'Quickview Link', 'divi-plus' ),
					'font_size'      => array(
						'default'        => '14px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height'    => array(
						'default'        => '1.2em',
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
						'default' => 'center',
					),
					'css' => array(
						'main'  => "{$this->main_css_element} .dipl_single_woo_product_quickview_wrapper a",
					),
					'tab_slug'	=> 'advanced',
                    'toggle_slug' => 'quickview_link',
				),
				'quickview_title' => array(
					'label'          => esc_html__( 'Title', 'divi-plus' ),
					'font_size'      => array(
						'default'        => '18px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height'    => array(
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
						'default' => 'h2',
					),
					'text_align'     => array(
						'default' => 'left',
					),
					'css'            => array(
						'main'       => "{$this->main_css_element}_lightbox .dipl_single_woo_product_title, {$this->main_css_element}_lightbox .dipl_single_woo_product_title a",
						'important' => 'all',
					),
					'tab_slug'	=> 'advanced',
                    'toggle_slug' => 'quickview_title_text',
				),
				'quickview_price' => array(
					'label'          => esc_html__( 'Regular Price', 'divi-plus' ),
					'font_size'      => array(
						'default'        => '16px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height'    => array(
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
					'text_align'     => array(
						'default' => 'left',
					),
					'css' => array(
						'main'  => "{$this->main_css_element}_lightbox .dipl_single_woo_product_price, {$this->main_css_element}_lightbox .dipl_single_woo_product_price span",
						'important' => 'all',
					),
					'tab_slug'	=> 'advanced',
                    'toggle_slug' => 'quickview_price_text',
                    'sub_toggle' => 'regular_price_text',
				),
				'quickview_sale_price' => array(
					'label'          => esc_html__( 'Sale Price', 'divi-plus' ),
					'font_size'      => array(
						'default'        => '16px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height'    => array(
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
					'hide_text_align' => true,
					'css' => array(
						'main'  => "{$this->main_css_element}_lightbox .dipl_single_woo_product_price del span",
						'important' => 'all',
					),
					'tab_slug'	=> 'advanced',
                    'toggle_slug' => 'quickview_price_text',
                    'sub_toggle' => 'sale_price_text',
				),
				'quickview_desc' => array(
					'label'          => esc_html__( 'Short Description', 'divi-plus' ),
					'font_size'      => array(
						'default'        => '16px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height'    => array(
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
					'text_align'     => array(
						'default' => 'left',
					),
					'css'            => array(
						'main'       => "{$this->main_css_element}_lightbox .dipl_single_woo_product_desc",
						'important' => 'all',
					),
					'tab_slug'	=> 'advanced',
                    'toggle_slug' => 'quickview_desc_text',
				),
				'quickview_quantity_text' => array(
					'label'          => esc_html__( 'Quantity', 'divi-plus' ),
					'font_size'      => array(
						'default'        => '16px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height'    => array(
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
					'text_align'     => array(
						'default' => 'center',
					),
					'css'            => array(
						'main'       => "{$this->main_css_element}_lightbox .product .dipl_product_lightbox_content_wrapper .qty",
						'important' => 'all',
					),
					'tab_slug'	=> 'advanced',
                    'toggle_slug' => 'quickview_quantity',
				),
				'quickview_add_to_cart' => array(
					'label' => esc_html__( 'Add to Cart Button', 'divi-plus' ),
					'font_size' => array(
						'default'        => '20px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height' => array(
						'default'        => '1.2em',
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
					'hide_text_align' => true,
					'css' => array(
						'main' => "{$this->main_css_element}_lightbox .product .dipl_product_lightbox_content_wrapper .single_add_to_cart_button, {$this->main_css_element}_lightbox .product .dipl_product_lightbox_content_wrapper .single_add_to_cart_button.added_to_cart",
						'important' => 'all',
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'quickview_add_to_cart_button',
				),
				'quickview_meta_label' => array(
					'label' => esc_html__( 'Label', 'divi-plus' ),
					'font_size' => array(
						'default'        => '14px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height' => array(
						'default'        => '1.2em',
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
					'hide_text_align' => true,
					'css' => array(
						'main' => "{$this->main_css_element}_lightbox .product .dipl_product_lightbox_content_wrapper .product_meta label",
						'important' => 'all',
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'quickview_meta',
					'sub_toggle'	 => 'label_text',
				),
				'quickview_meta_value' => array(
					'label' => esc_html__( 'Value', 'divi-plus' ),
					'font_size' => array(
						'default'        => '14px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height' => array(
						'default'        => '1.2em',
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
					'hide_text_align' => true,
					'css' => array(
						'main' => "{$this->main_css_element}_lightbox .product .dipl_product_lightbox_content_wrapper .product_meta > span span, {$this->main_css_element}_lightbox .product .dipl_product_lightbox_content_wrapper .product_meta > span a",
						'important' => 'all',
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'quickview_meta',
					'sub_toggle'	 => 'value_text',
				),
				'quickview_attributes_label' => array(
					'label'          => esc_html__( 'Attribute Label', 'divi-plus' ),
					'font_size'      => array(
						'default'        => '16px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height'    => array(
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
					'hide_text_align' => true,
					'css' => array(
						'main'  => "{$this->main_css_element}_lightbox .dipl_product_lightbox_content_wrapper .variations label",
						'important' => 'all',
					),
					'tab_slug'	=> 'advanced',
                    'toggle_slug' => 'quickview_attributes',
                    'sub_toggle' => 'label_text',
				),
				'quickview_attributes_field' => array(
					'label'          => esc_html__( 'Attribute Field', 'divi-plus' ),
					'font_size'      => array(
						'default'        => '16px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height'    => array(
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
					'hide_text_align' => true,
					'css' => array(
						'main'  => "{$this->main_css_element}_lightbox .product .dipl_product_lightbox_content_wrapper .cart .variations select",
						'important' => 'all',
					),
					'tab_slug'	=> 'advanced',
                    'toggle_slug' => 'quickview_attributes',
                    'sub_toggle' => 'field_text',
				),
			),
			'borders' => array(
				'product' => array(
					'label_prefix'    => esc_html__( 'Product', 'divi-plus' ),
					'css' => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dipl_single_woo_product',
							'border_styles' => '%%order_class%% .dipl_single_woo_product',
							'important' => 'all',
						),
					),
				),
				'sale_badge' => array(
					'label_prefix'    => esc_html__( 'Sale Badge', 'divi-plus' ),
					'css' => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dipl_single_woo_product_sale_badge',
							'border_styles' => '%%order_class%% .dipl_single_woo_product_sale_badge',
							'important' => 'all',
						),
					),
					'tab_slug' => 'advanced',
					'toggle_slug' => 'sale_badge',
				),
				'add_to_cart_button' => array(
					'label_prefix'    => esc_html__( 'Add to Cart Button', 'divi-plus' ),
					'css' => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dipl_single_woo_product_add_to_cart a.button, %%order_class%% .dipl_single_woo_product_add_to_cart a.add_to_cart_button, %%order_class%% .dipl_single_woo_product_add_to_cart a.added_to_cart',
							'border_styles' => '%%order_class%% .dipl_single_woo_product_add_to_cart a.button, %%order_class%% .dipl_single_woo_product_add_to_cart a.add_to_cart_button, %%order_class%% .dipl_single_woo_product_add_to_cart a.added_to_cart',
							'important' => 'all',
						),
					),
					'tab_slug' => 'advanced',
					'toggle_slug' => 'add_to_cart_button',
				),
				'quickview_add_to_cart_button' => array(
					'label_prefix'    => esc_html__( 'Add to Cart Button', 'divi-plus' ),
					'css' => array(
						'main' => array(
							'border_radii'  => "{$this->main_css_element}_lightbox .product .dipl_product_lightbox_content_wrapper .single_add_to_cart_button, {$this->main_css_element}_lightbox .product .dipl_product_lightbox_content_wrapper .single_add_to_cart_button.added_to_cart",
							'border_styles' => "{$this->main_css_element}_lightbox .product .dipl_product_lightbox_content_wrapper .single_add_to_cart_button, {$this->main_css_element}_lightbox .product .dipl_product_lightbox_content_wrapper .single_add_to_cart_button.added_to_cart",
							'important' => 'all',
						),
					),
					'tab_slug' => 'advanced',
					'toggle_slug' => 'quickview_add_to_cart_button',
				),
				'default' => array(
					'css' => array(
						'main' => array(
							'border_radii'  => $this->main_css_element,
							'border_styles' => $this->main_css_element,
						),
					),
				),
			),
			'box_shadow' => array(
				'product' => array(
					'label'       => esc_html__( 'Product Box Shadow', 'divi-plus' ),
					'css'         => array(
						'main' => "%%order_class%% .dipl_single_woo_product",
						'important' => 'all',
					),
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'box_shadow',
				),
				'default' => array(
					'css' => array(
						'main' => $this->main_css_element,
						'important' => 'all',
					),
				),
			),
			'background' => array(
				'css' => array(
					'main' => $this->main_css_element,
				),
			),
			'margin_padding' => array(
				'css' => array(
					'main'      => $this->main_css_element,
					'important' => 'all',
				),
			),
			'product_margin_padding' => array(
				'product_content' => array(
					'margin_padding' => array(
						'css' => array(
							'use_margin' 	=> false,
							'padding'		=> "{$this->main_css_element} .dipl_single_woo_product_content",
							'important'	 	=> 'all',
						),
					),
				),
				'product_image' => array(
					'margin_padding' => array(
						'css' => array(
							'use_margin' 	=> false,
							'padding'		=> "{$this->main_css_element} .dipl_single_woo_product_thumbnail",
							'important' 	=> 'all',
						),
					),
				),
			),
			'slider_margin_padding' => array(
				'slider_container' => array(
					'margin_padding' => array(
						'css' => array(
							'use_margin' => false,
							'padding'   => "{$this->main_css_element} .dipl_woo_products_carousel_layout > .swiper-container",
							'important' => 'all',
						),
					),
				),
				'arrows' => array(
					'margin_padding' => array(
						'css' => array(
							'use_margin' => false,
							'padding'    => "{$this->main_css_element} .dipl_woo_products_carousel_layout > .dipl_swiper_navigation .swiper-button-next, {$this->main_css_element} .dipl_woo_products_carousel_layout > .dipl_swiper_navigation .swiper-button-prev",
							'important'  => 'all',
						),
					),
				),
			),
			'text' 			=> false,
			'filters'       => false,
			'link_options'  => false,
		);

	}

	public function get_fields() {
		return array_merge(
			array(
				'view_type' => array(
					'label'            => esc_html__( 'Product View Type', 'divi-plus' ),
					'type'             => 'select',
					'option_category'  => 'basic_option',
					'options'          => array(
						'default'          => esc_html__( 'Default', 'divi-plus' ),
						'featured'         => esc_html__( 'Featured Products', 'divi-plus' ),
						'sale'             => esc_html__( 'Sale Products', 'divi-plus' ),
						'best_selling'     => esc_html__( 'Best Selling Products', 'divi-plus' ),
						'top_rated'        => esc_html__( 'Top Rated Products', 'divi-plus' ),
					),
					'default_on_front' => 'default',
					'tab_slug'         => 'general',
					'toggle_slug'      => 'main_content',
					'description'      => esc_html__( 'Choose which type of product view you would like to display.', 'divi-plus' ),
					'computed_affects' => array(
						'__products_data',
					),
				),
				'use_current_loop' => array(
					'label'            => esc_html__( 'Use Current Loop', 'divi-plus' ),
					'type'             => 'yes_no_button',
					'option_category'  => 'configuration',
					'options'          => array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'default'          => 'off',
					'default_on_front' => 'off',
					'show_if'          => array(
						'function.isTBLayout' => 'on',
					),
					'tab_slug'         => 'general',
					'toggle_slug'      => 'main_content',
					'description'      => esc_html__( 'Only include products for the current page. Useful on archive and index pages. For example let\'s say you used this module on a Theme Builder layout that is enabled for product categories. Selecting the "Sale Products" view type above and enabling this option would show only products that are on sale when viewing product categories.', 'divi-plus' ),
					'computed_affects' => array(
						'__products_data',
					),
				),
				'product_layout' => array(
	                'label' 			=> esc_html__( 'Layout', 'divi-plus' ),
	                'type'              => 'select',
	                'option_category'   => 'configuration',
	                'options'           => array(
	                    'layout1'	=> esc_html__( 'Layout 1', 'divi-plus' ),
	                    'layout2'   => esc_html__( 'Layout 2', 'divi-plus' ),
	                ),
	                'default'			=> 'layout1',
	                'default_on_front'	=> 'layout1',
	                'tab_slug'          => 'general',
	                'toggle_slug'       => 'main_content',
	                'description'       => esc_html__( 'Here you can select the layout to display products.', 'divi-plus' ),
	                'computed_affects' => array(
						'__products_data',
					),
	            ),
				'products_number' => array(
					'label'            => esc_html__( 'Number of Products', 'divi-plus' ),
					'type'             => 'text',
					'option_category'  => 'configuration',
					'default'          => 10,
					'tab_slug'         => 'general',
					'toggle_slug'      => 'main_content',
					'description'      => esc_html__( 'Here you can specify the total number of products to display.', 'divi-plus' ),
					'computed_affects' => array(
						'__products_data',
					),
				),
				'offset_number' => array(
	                'label'            => esc_html__( 'Offset Number', 'divi-plus' ),
	                'type'             => 'text',
	                'option_category'  => 'configuration',
	                'default'          => 0,
	                'tab_slug'         => 'general',
	                'toggle_slug'      => 'main_content',
	                'description'      => esc_html__( 'Choose how many products you would like to skip. These products will not be shown.', 'divi-plus' ),
	                'computed_affects' => array(
	                    '__products_data',
	                ),
	            ),
	            'products_order_by' => array(
					'label'            => esc_html__( 'Order by', 'divi-plus' ),
					'type'             => 'select',
					'option_category'  => 'configuration',
					'options'          => array(
						'date'     		=> esc_html__( 'Date', 'divi-plus' ),
						'modified'		=> esc_html__( 'Modified Date', 'divi-plus' ),
						'menu_order'	=> esc_html__( 'Menu Order', 'divi-plus' ),
						'title'    		=> esc_html__( 'Title', 'divi-plus' ),
						'name'     		=> esc_html__( 'Slug', 'divi-plus' ),
						'ID'       		=> esc_html__( 'ID', 'divi-plus' ),
						'rand'     		=> esc_html__( 'Random', 'divi-plus' ),
						'price'			=> esc_html__( 'Price', 'divi-plus' ),
						'stock_status'	=> esc_html__( 'Stock Status', 'divi-plus' ),
						'none'     		=> esc_html__( 'None', 'divi-plus' ),
					),
					'default'          => 'date',
					'show_if_not'      => array(
						'view_type' => array( 'best_selling', 'top_rated', 'featured' ),
					),
					'tab_slug'         => 'general',
					'toggle_slug'      => 'main_content',
					'description'      => esc_html__( 'Here you can specify the order in which the products will be displayed.', 'divi-plus' ),
					'computed_affects' => array(
						'__products_data',
					),
				),
				'products_order' => array(
					'label'            => esc_html__( 'Order', 'divi-plus' ),
					'type'             => 'select',
					'option_category'  => 'configuration',
					'options'          => array(
						'DESC' => esc_html__( 'DESC', 'divi-plus' ),
						'ASC'  => esc_html__( 'ASC', 'divi-plus' ),
					),
					'default'          => 'DESC',
					'show_if_not'      => array(
						'view_type' => array( 'best_selling', 'top_rated', 'featured' ),
					),
					'tab_slug'         => 'general',
					'toggle_slug'      => 'main_content',
					'description'      => esc_html__( 'Here you can specify the sorting order for the products.', 'divi-plus' ),
					'computed_affects' => array(
						'__products_data',
					),
				),
				'hide_out_of_stock' => array(
					'label'            => esc_html__( 'Hide Out of Stock Products', 'divi-plus' ),
					'type'             => 'yes_no_button',
					'option_category'  => 'configuration',
					'options'          => array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'default'          => 'off',
					'default_on_front' => 'off',
					'tab_slug'         => 'general',
					'toggle_slug'      => 'main_content',
					'description'      => esc_html__( 'Hide out of stock products from the loop.', 'divi-plus' ),
					'computed_affects' => array(
						'__products_data',
					),
				),
				'enable_out_of_stock_label' => array(
					'label'            => esc_html__( 'Display Out of Stock Label', 'divi-woocommerce-extended' ),
					'type'             => 'yes_no_button',
					'option_category'  => 'configuration',
					'options'          => array(
						'on'  => esc_html__( 'Yes', 'divi-woocommerce-extended' ),
						'off' => esc_html__( 'No', 'divi-woocommerce-extended' ),
					),
					'show_if'		  => array(
						'hide_out_of_stock' => 'off',
					),
					'default'          => 'off',
					'tab_slug'         => 'general',
					'toggle_slug'      => 'main_content',
					'description'      => esc_html__( 'Display Out of Stock label on products.', 'divi-woocommerce-extended' ),
					'computed_affects' => array(
						'__products_data',
					),
				),
				'out_of_stock_label' => array(
					'label'            => esc_html__( 'Out of Stock Label Text', 'divi-woocommerce-extended' ),
					'type'             => 'text',
					'option_category'  => 'configuration',
					'show_if'		  => array(
						'hide_out_of_stock' => 'off',
						'enable_out_of_stock_label' => 'on',
					),
					'default'		   => esc_html__( 'Out of Stock', 'divi-woocommerce-extended' ),
					'tab_slug'         => 'general',
					'toggle_slug'      => 'main_content',
					'description'      => esc_html__( 'Here you can specify the text for out of stock label.', 'divi-woocommerce-extended' ),
					'computed_affects' => array(
						'__products_data',
					),
				),
				'include_categories' => array(
					'label'            => esc_html__( 'Include Categories', 'divi-plus' ),
					'type'             => 'categories',
					'renderer_options' => array(
						'use_terms' => true,
						'term_name' => 'product_cat',
						'field_name' => 'et_pb_include_dipl_product_cat',
					),
					'show_if'      	   => array(
						'use_current_loop' => 'off',
					),
					'tab_slug'         => 'general',
					'toggle_slug'      => 'main_content',
					'description'      => esc_html__( 'Select Categories. If no category is selected, products from all categories will be displayed.', 'divi-plus' ),
					'computed_affects' => array(
						'__products_data',
					),
				),
				'include_tags' => array(
					'label'            => esc_html__( 'Include Tags', 'divi-plus' ),
					'type'             => 'categories',
					'renderer_options' => array(
						'use_terms' => true,
						'term_name' => 'product_tag',
						'field_name' => 'et_pb_include_dipl_product_tags',
					),
					'show_if'      	   => array(
						'use_current_loop' => 'off',
					),
					'tab_slug'         => 'general',
					'toggle_slug'      => 'main_content',
					'description'      => esc_html__( 'Select Tags. If no tag is selected, products from all tags will be displayed.', 'divi-plus' ),
					'computed_affects' => array(
						'__products_data',
					),
				),
				'taxonomies_relation' => array(
					'label'            => esc_html__( 'Taxonomies Relation', 'divi-plus' ),
					'type'             => 'select',
					'option_category'  => 'configuration',
					'options'          => array(
						'OR'   	=> esc_html__( 'OR', 'divi-plus' ),
						'AND'	=> esc_html__( 'AND', 'divi-plus' ),
					),
					'default'          => 'OR',
					'show_if'		   => array(
						'use_current_loop' => 'off',
					),
					'tab_slug'         => 'general',
					'toggle_slug'      => 'main_content',
					'description'      => esc_html__( 'This will set the relationship between taxonomies.', 'divi-plus' ),
					'computed_affects' => array(
						'__products_data',
					),
				),
				'no_result_text' => array(
					'label'            => esc_html__( 'No Result Text', 'divi-plus' ),
					'type'             => 'text',
					'option_category'  => 'configuration',
					'default'		   => esc_html__( 'The products you requested could not be found. Try changing your module settings or create some new products.', 'divi-plus' ),
					'tab_slug'         => 'general',
					'toggle_slug'      => 'main_content',
					'description'      => esc_html__( 'Here you can define custom no result text.', 'divi-plus' ),
				),
				'enable_quickview' => array(
					'label'           => esc_html__( 'Display Quickview Link', 'divi-plus' ),
					'type'            => 'yes_no_button',
					'option_category' => 'configuration',
					'options'         => array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'default'         => 'off',
					'tab_slug'        => 'general',
					'toggle_slug'     => 'display_setting',
					'description'     => esc_html__( 'Choose whether or not the product quickview link should be displayed or not.', 'divi-plus' ),
					'computed_affects' => array(
						'__products_data',
					),
				),
				'quickview_link_text' => array(
					'label'            => esc_html__( 'Quickview Link Text', 'divi-plus' ),
					'type'             => 'text',
					'option_category'  => 'configuration',
					'show_if'		  => array(
						'enable_quickview' => 'on',
					),
					'default'		   => esc_html__( 'Quickview', 'divi-plus' ),
					'tab_slug'         => 'general',
					'toggle_slug'      => 'display_setting',
					'description'      => esc_html__( 'Here you can specify the text for quickview link.', 'divi-plus' ),
					'computed_affects' => array(
						'__products_data',
					),
				),
				'show_thumbnail' => array(
					'label'           => esc_html__( 'Show Thumbnail', 'divi-plus' ),
					'type'            => 'yes_no_button',
					'option_category' => 'configuration',
					'options'         => array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'default'         => 'on',
					'tab_slug'        => 'general',
					'toggle_slug'     => 'display_setting',
					'description'     => esc_html__( 'Choose whether or not the product thumbnail should be visible.', 'divi-plus' ),
					'computed_affects' => array(
						'__products_data',
					),
				),
				'thumbnail_size' => array(
					'label'            => esc_html__( 'Thumbnail Size', 'divi-plus' ),
					'type'             => 'select',
					'option_category'  => 'configuration',
					'options'          => array(
						'woocommerce_thumbnail'	=> esc_html__( 'Woocommerce Thumbnail', 'divi-plus' ),
						'woocommerce_single'	=> esc_html__( 'Woocommerce Single', 'divi-plus' ),
					),
					'default'          => 'woocommerce_thumbnail',
					'default_on_front' => 'woocommerce_thumbnail',
					'show_if'      	   => array(
						'show_thumbnail' => 'on',
					),
					'tab_slug'         => 'general',
					'toggle_slug'      => 'display_setting',
					'description'      => esc_html__( 'Here you can specify the size of product image.', 'divi-plus' ),
					'computed_affects' => array(
						'__products_data',
					),
				),
				'show_rating' => array(
					'label'           => esc_html__( 'Show Star Rating', 'divi-plus' ),
					'type'            => 'yes_no_button',
					'option_category' => 'configuration',
					'options'         => array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'default'         => 'off',
					'tab_slug'        => 'general',
					'toggle_slug'     => 'display_setting',
					'description'     => esc_html__( 'Choose whether or not the star rating should be visible.', 'divi-plus' ),
					'computed_affects' => array(
						'__products_data',
					),
				),
				'show_price' => array(
					'label'           => esc_html__( 'Show Price', 'divi-plus' ),
					'type'            => 'yes_no_button',
					'option_category' => 'configuration',
					'options'         => array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'default'         => 'on',
					'tab_slug'        => 'general',
					'toggle_slug'     => 'display_setting',
					'description'     => esc_html__( 'Choose whether or not the price should be visible.', 'divi-plus' ),
					'computed_affects' => array(
						'__products_data',
					),
				),
				'show_add_to_cart' => array(
					'label'           => esc_html__( 'Show Add to Cart', 'divi-plus' ),
					'type'            => 'yes_no_button',
					'option_category' => 'configuration',
					'options'         => array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'default'         => 'on',
					'tab_slug'        => 'general',
					'toggle_slug'     => 'display_setting',
					'description'     => esc_html__( 'Choose whether or not the add to cart button should be visible.', 'divi-plus' ),
					'computed_affects' => array(
						'__products_data',
					),
				),
				'show_add_to_cart_on_hover' => array(
					'label'           	=> esc_html__( 'Show Add to Cart on Hover', 'divi-plus' ),
					'type'            	=> 'yes_no_button',
					'option_category' 	=> 'configuration',
					'options'         	=> array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'default'         	=> 'off',
					'show_if'		  	=> array(
						'show_add_to_cart' => 'on',
						'product_layout' => 'layout1'
					),
					'tab_slug'        	=> 'general',
					'toggle_slug'     	=> 'display_setting',
					'description'     	=> esc_html__( 'Choose whether or not the add to cart button should be visible only on hover. This will not work on tablet and mobiles.', 'divi-plus' ),
					'computed_affects' 	=> array(
						'__products_data',
					),
				),
				'simple_add_to_cart_text' => array(
					'label'            => esc_html__( 'Simple Product Add to Cart Text', 'divi-plus' ),
					'type'             => 'text',
					'option_category'  => 'configuration',
					'show_if'		  => array(
						'show_add_to_cart' => 'on',
					),
					'tab_slug'         => 'general',
					'toggle_slug'      => 'display_setting',
					'description'      => esc_html__( 'Here you can specify the text for Simple Product Add to Cart.', 'divi-plus' ),
					'computed_affects' => array(
						'__products_data',
					),
				),
				'variable_add_to_cart_text' => array(
					'label'            => esc_html__( 'Variable Product Add to Cart Text', 'divi-plus' ),
					'type'             => 'text',
					'option_category'  => 'configuration',
					'show_if'		   => array(
						'show_add_to_cart' => 'on',
					),
					'tab_slug'         => 'general',
					'toggle_slug'      => 'display_setting',
					'description'      => esc_html__( 'Here you can specify the text for Variable Product Add to Cart.', 'divi-plus' ),
					'computed_affects' => array(
						'__products_data',
					),
				),
				'grouped_add_to_cart_text' => array(
					'label'            => esc_html__( 'Grouped Product Add to Cart Text', 'divi-plus' ),
					'type'             => 'text',
					'option_category'  => 'configuration',
					'show_if'		   => array(
						'show_add_to_cart' => 'on',
					),
					'tab_slug'         => 'general',
					'toggle_slug'      => 'display_setting',
					'description'      => esc_html__( 'Here you can specify the text for Grouped Product Add to Cart.', 'divi-plus' ),
					'computed_affects' => array(
						'__products_data',
					),
				),
				'external_add_to_cart_text' => array(
					'label'            => esc_html__( 'External Product Add to Cart Text', 'divi-plus' ),
					'type'             => 'text',
					'option_category'  => 'configuration',
					'show_if'		   => array(
						'show_add_to_cart' => 'on',
					),
					'tab_slug'         => 'general',
					'toggle_slug'      => 'display_setting',
					'description'      => esc_html__( 'Here you can specify the text for External Product Add to Cart.', 'divi-plus' ),
					'computed_affects' => array(
						'__products_data',
					),
				),
				'out_of_stock_add_to_cart_text' => array(
					'label'            => esc_html__( 'Out of Stock/Unpurchaseable Add to Cart Text', 'divi-plus' ),
					'type'             => 'text',
					'option_category'  => 'configuration',
					'show_if'		   => array(
						'show_add_to_cart' => 'on',
					),
					'tab_slug'         => 'general',
					'toggle_slug'      => 'display_setting',
					'description'      => esc_html__( 'Here you can specify the text for Out of stock/unpurchaseable Product Add to Cart.', 'divi-plus' ),
					'computed_affects' => array(
						'__products_data',
					),
				),
				'show_sale_badge' => array(
					'label'           	=> esc_html__( 'Show Sale Badge', 'divi-plus' ),
					'type'            	=> 'yes_no_button',
					'option_category' 	=> 'configuration',
					'options'         	=> array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'default'         	=> 'on',
					'show_if'			=> array(
						'show_thumbnail' => 'on',
					),
					'tab_slug'        	=> 'general',
					'toggle_slug'     	=> 'display_setting',
					'description'     	=> esc_html__( 'Choose whether or not the sale badge should be visible.', 'divi-plus' ),
					'computed_affects' 	=> array(
						'__products_data',
					),
				),
				'sale_badge_text' => array(
					'label'           	=> esc_html__( 'Badge Text', 'divi-plus' ),
					'type'              => 'select',
	                'option_category'   => 'configuration',
	                'options'           => array(
	                    'label'         => esc_html__( 'Sale Label', 'divi-plus' ),
	                    'percentage'    => esc_html__( 'Sale Percentage', 'divi-plus' ),
	                ),
	                'default'			=> 'label',
	                'default_on_front'	=> 'label',
					'show_if'			=> array(
						'show_thumbnail' 	=> 'on',
						'show_sale_badge' 	=> 'on',
					),
					'tab_slug'        	=> 'general',
					'toggle_slug'     	=> 'display_setting',
					'description'     	=> esc_html__( 'Choose which sale badge should be visible.', 'divi-plus' ),
					'computed_affects' 	=> array(
						'__products_data',
					),
				),
				'sale_label_text' => array(
					'label'            => esc_html__( 'Sale Label', 'divi-plus' ),
					'type'             => 'text',
					'option_category'  => 'configuration',
					'show_if'		   => array(
						'show_thumbnail' 	=> 'on',
						'show_sale_badge' 	=> 'on',
						'sale_badge_text'	=> 'label',
					),
					'tab_slug'         => 'general',
					'toggle_slug'      => 'display_setting',
					'description'      => esc_html__( 'Here you can specify the text for Sale label.', 'divi-plus' ),
					'computed_affects' => array(
						'__products_data',
					),
				),
				'slide_effect' => array(
					'label'           => esc_html__( 'Slide Effect', 'divi-plus' ),
					'type'            => 'select',
					'option_category' => 'layout',
					'options'         => array(
						'slide'     => esc_html__( 'Slide', 'divi-plus' ),
						'cube'      => esc_html__( 'Cube', 'divi-plus' ),
						'coverflow' => esc_html__( 'Coverflow', 'divi-plus' ),
						'flip'      => esc_html__( 'Flip', 'divi-plus' ),
					),
					'default'         => 'slide',
					'tab_slug'        => 'general',
					'toggle_slug'     => 'slider_settings',
					'description'     => esc_html__( 'Here you can choose the slide animation effect.', 'divi-plus' ),
				),
				'products_per_slide' => array(
					'label'           => esc_html__( 'Products Per View', 'divi-plus' ),
					'type'            => 'select',
					'option_category' => 'layout',
					'options'         => array(
						'1' => esc_html__( '1', 'divi-plus' ),
						'2' => esc_html__( '2', 'divi-plus' ),
						'3' => esc_html__( '3', 'divi-plus' ),
						'4' => esc_html__( '4', 'divi-plus' ),
						'5' => esc_html__( '5', 'divi-plus' ),
						'6' => esc_html__( '6', 'divi-plus' ),
						'7'  => esc_html__( '7', 'divi-plus' ),
						'8'  => esc_html__( '8', 'divi-plus' ),
						'9'  => esc_html__( '9', 'divi-plus' ),
						'10'  => esc_html__( '10', 'divi-plus' ),
					),
					'default'         => '4',
					'mobile_options'  => true,
					'show_if'         => array(
						'slide_effect' => array( 'slide', 'coverflow' ),
					),
					'tab_slug'        => 'general',
					'toggle_slug'     => 'slider_settings',
					'description'     => esc_html__( 'Here you can choose the number of products to display per slide.', 'divi-plus' ),
				),
				'slides_per_group' => array(
					'label'           => esc_html__( 'Number of Slides Per Group', 'divi-plus' ),
					'type'            => 'select',
					'option_category' => 'layout',
					'options'         => array(
						'1'  => esc_html__( '1', 'divi-plus' ),
						'2'  => esc_html__( '2', 'divi-plus' ),
						'3'  => esc_html__( '3', 'divi-plus' ),
						'4' => esc_html__( '4', 'divi-plus' ),
						'5' => esc_html__( '5', 'divi-plus' ),
						'6' => esc_html__( '6', 'divi-plus' ),
						'7' => esc_html__( '7', 'divi-plus' ),
						'8' => esc_html__( '8', 'divi-plus' ),
						'9' => esc_html__( '9', 'divi-plus' ),
						'10' => esc_html__( '10', 'divi-plus' ),
					),
					'default'         => '1',
					'mobile_options'  => true,
					'show_if'         => array(
						'slide_effect' => array( 'slide' ),
					),
					'tab_slug'        => 'general',
					'toggle_slug'     => 'slider_settings',
					'description'     => esc_html__( 'Here you can choose the number of slides per group to slide by.', 'divi-plus' ),
				),
				'space_between_slides' => array(
					'label'           => esc_html__( 'Space between Slides', 'divi-plus' ),
					'type'            => 'range',
					'option_category' => 'layout',
					'range_settings'  => array(
						'min'  => '10',
						'max'  => '100',
						'step' => '1',
					),
					'show_if'         => array(
						'slide_effect' => array( 'slide', 'coverflow' ),
					),
					'fixed_unit'	  => 'px',
					'default'         => '20px',
					'mobile_options'  => true,
					'tab_slug'        => 'general',
					'toggle_slug'     => 'slider_settings',
					'description'     => esc_html__( 'Move the slider or input the value to increse or decrease the space between slides.', 'divi-plus' ),
				),
				'enable_coverflow_shadow' => array(
					'label'            => esc_html__( 'Enable Slide Shadow', 'divi-plus' ),
					'type'             => 'yes_no_button',
					'option_category'  => 'configuration',
					'options'          => array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'default'          => 'off',
					'show_if'          => array(
						'slide_effect' => 'coverflow',
					),
					'tab_slug'         => 'general',
					'toggle_slug'      => 'slider_settings',
					'description'      => esc_html__( 'Enable Slide Shadow For Coverflow Effect.', 'divi-plus' ),
				),
				'coverflow_shadow_color' => array(
					'label'        	   => esc_html__( 'Shadow Color', 'divi-plus' ),
					'type'         	   => 'color-alpha',
					'custom_color' 	   => true,
					'show_if'          => array(
						'slide_effect' => 'coverflow',
						'enable_coverflow_shadow' => 'on',
					),
					'default'      	   => '#ccc',
					'tab_slug'         => 'general',
					'toggle_slug'      => 'slider_settings',
					'description'      => esc_html__( 'Here you can select color for the Shadow.', 'divi-plus' ),
				),
				'coverflow_rotate' => array(
					'label'            => esc_html__( 'Coverflow Rotate', 'divi-plus' ),
					'type'             => 'range',
					'option_category'  => 'font_option',
					'range_settings'   => array(
						'min'  => '1',
						'max'  => '360',
						'step' => '1',
					),
					'unitless'         => true,
					'show_if'          => array(
						'slide_effect' => 'coverflow',
					),
					'default'          => '40',
					'tab_slug'         => 'general',
					'toggle_slug'      => 'slider_settings',
					'description'      => esc_html__( 'Coverflow Rotate Slide.', 'divi-plus' ),
				),
				'coverflow_depth' => array(
					'label'            => esc_html__( 'Coverflow Depth', 'divi-plus' ),
					'type'             => 'range',
					'option_category'  => 'font_option',
					'range_settings'   => array(
						'min'  => '1',
						'max'  => '1000',
						'step' => '1',
					),
					'unitless'         => true,
					'show_if'          => array(
						'slide_effect' => 'coverflow',
					),
					'default'          => '100',
					'tab_slug'         => 'general',
					'toggle_slug'      => 'slider_settings',
					'description'      => esc_html__( 'Coverflow Depth Slide.', 'divi-plus' ),
				),
				'equalize_slides_height' => array(
					'label'            => esc_html__( 'Equalize Slides Height', 'divi-plus' ),
					'type'             => 'yes_no_button',
					'option_category'  => 'configuration',
					'options'          => array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'default'          => 'off',
					'default_on_front' => 'off',
					'tab_slug'         => 'general',
					'toggle_slug'      => 'slider_settings',
					'description'      => esc_html__( 'Choose whether or not equalize slides height.', 'divi-plus' ),
				),
				'slider_loop' => array(
					'label'            => esc_html__( 'Enable Loop', 'divi-plus' ),
					'type'             => 'yes_no_button',
					'option_category'  => 'configuration',
					'options'          => array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'default'          => 'off',
					'tab_slug'         => 'general',
					'toggle_slug'      => 'slider_settings',
					'description'      => esc_html__( 'Here you can enable loop for the slides.', 'divi-plus' ),
				),
				'autoplay' => array(
					'label'            => esc_html__( 'Autoplay', 'divi-plus' ),
					'type'             => 'yes_no_button',
					'option_category'  => 'configuration',
					'options'          => array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'default'          => 'on',
					'tab_slug'         => 'general',
					'toggle_slug'      => 'slider_settings',
					'description'      => esc_html__( 'This controls the auto play the slider.', 'divi-plus' ),
				),
				'autoplay_speed' => array(
					'label'            => esc_html__( 'Autoplay Delay', 'divi-plus' ),
					'type'             => 'text',
					'option_category'  => 'configuration',
					'default'          => '3000',
					'show_if'          => array(
						'autoplay' => 'on',
					),
					'tab_slug'         => 'general',
					'toggle_slug'      => 'slider_settings',
					'description'      => esc_html__( 'This controls the time of the slide before the transition.', 'divi-plus' ),
				),
				'pause_on_hover' => array(
					'label'            => esc_html__( 'Pause On Hover', 'divi-plus' ),
					'type'             => 'yes_no_button',
					'option_category'  => 'configuration',
					'options'          => array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'default'          => 'on',
					'show_if'          => array(
						'autoplay' => 'on',
					),
					'tab_slug'         => 'general',
					'toggle_slug'      => 'slider_settings',
					'description'      => esc_html__( 'Control for pausing slides on mouse hover.', 'divi-plus' ),
				),
				'slide_transition_duration' => array(
					'label'           => esc_html__( 'Transition Duration', 'divi-plus' ),
					'type'            => 'text',
					'option_category' => 'configuration',
					'default'         => '1000',
					'tab_slug'        => 'general',
					'toggle_slug'     => 'slider_settings',
					'description'     => esc_html__( 'Here you can specify the duration of transition for each slide in miliseconds.', 'divi-plus' ),
				),
				'show_arrow' => array(
					'label'            => esc_html__( 'Show Arrows', 'divi-plus' ),
					'type'             => 'yes_no_button',
					'option_category'  => 'configuration',
					'options'          => array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'default'          => 'off',
					'default_on_front' => 'off',
					'tab_slug'         => 'general',
					'toggle_slug'      => 'slider_settings',
					'description'      => esc_html__( 'Choose whether or not the previous & next arrows should be visible.', 'divi-plus' ),
				),
				'previous_slide_arrow' => array(
					'label'           => esc_html__( 'Previous Arrow', 'divi-plus' ),
					'type'            => 'select_icon',
					'option_category' => 'basic_option',
					'class'           => array(
						'et-pb-font-icon',
					),
					'show_if'         => array(
						'show_arrow' => 'on',
					),
					'tab_slug'        => 'general',
					'toggle_slug'     => 'slider_settings',
					'description'     => esc_html__( 'Here you can select the icon to be used for the previous slide navigation.', 'divi-plus' ),
				),
				'next_slide_arrow' => array(
					'label'           => esc_html__( 'Next Arrow', 'divi-plus' ),
					'type'            => 'select_icon',
					'option_category' => 'basic_option',
					'class'           => array(
						'et-pb-font-icon',
					),
					'show_if'         => array(
						'show_arrow' => 'on',
					),
					'tab_slug'        => 'general',
					'toggle_slug'     => 'slider_settings',
					'description'     => esc_html__( 'Here you can select the icon to be used for the next slide navigation.', 'divi-plus' ),
				),
				'show_arrow_on_hover' => array(
					'label'            => esc_html__( 'Show Arrows On Hover', 'divi-plus' ),
					'type'             => 'yes_no_button',
					'option_category'  => 'configuration',
					'options'          => array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'show_if'          => array(
						'show_arrow' => 'on',
					),
					'default'          => 'off',
					'default_on_front' => 'off',
					'tab_slug'         => 'general',
					'toggle_slug'      => 'slider_settings',
					'description'      => esc_html__( 'Choose whether or not the previous and next arrows should be visible.', 'divi-plus' ),
				),
				'arrows_position' => array(
					'label'           => esc_html__( 'Arrows Position', 'divi-plus' ),
					'type'            => 'select',
					'option_category' => 'layout',
					'options'         => array(
						'inside' 		=> esc_html__( 'Inside', 'divi-plus' ),
						'outside'		=> esc_html__( 'Outside', 'divi-plus' ),
						'top_left'      => esc_html__( 'Top Left', 'divi-plus' ),
						'top_right'     => esc_html__( 'Top Right', 'divi-plus' ),
						'top_center'    => esc_html__( 'Top Center', 'divi-plus' ),
						'bottom_left'   => esc_html__( 'Bottom Left', 'divi-plus' ),
						'bottom_right'  => esc_html__( 'Bottom Right', 'divi-plus' ),
						'bottom_center' => esc_html__( 'Bottom Center', 'divi-plus' ),
					),
					'default'         => 'inside',
					'mobile_options'  => true,
					'show_if'         => array(
						'show_arrow' => 'on',
					),
					'tab_slug'        => 'general',
					'toggle_slug'     => 'slider_settings',
					'description'     => esc_html__( 'Here you can choose the arrows position.', 'divi-plus' ),
				),
				'show_control_dot' => array(
					'label'            => esc_html__( 'Show Dots Pagination', 'divi-plus' ),
					'type'             => 'yes_no_button',
					'option_category'  => 'configuration',
					'options'          => array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'default'          => 'off',
					'default_on_front' => 'off',
					'tab_slug'         => 'general',
					'toggle_slug'      => 'slider_settings',
					'description'      => esc_html__( 'This setting will turn on and off the pagination of the slider.', 'divi-plus' ),
				),
				'control_dot_style' => array(
					'label'            => esc_html__( 'Dots Pagination Style', 'divi-plus' ),
					'type'             => 'select',
					'option_category'  => 'layout',
					'options'          => array(
						'solid_dot'       => esc_html__( 'Solid Dot', 'divi-plus' ),
						'transparent_dot' => esc_html__( 'Transparent Dot', 'divi-plus' ),
						'stretched_dot'   => esc_html__( 'Stretched Dot', 'divi-plus' ),
						'line'            => esc_html__( 'Line', 'divi-plus' ),
						'rounded_line'    => esc_html__( 'Rounded Line', 'divi-plus' ),
						'square_dot'      => esc_html__( 'Squared Dot', 'divi-plus' ),
					),
					'show_if'          => array(
						'show_control_dot' => 'on',
					),
					'default'          => 'solid_dot',
					'tab_slug'         => 'general',
					'toggle_slug'      => 'slider_settings',
					'description'      => esc_html__( 'control dot style', 'divi-plus' ),
				),
				'enable_dynamic_dots' => array(
					'label'            => esc_html__( 'Enable Dynamic Dots', 'divi-plus' ),
					'type'             => 'yes_no_button',
					'option_category'  => 'configuration',
					'options'          => array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'default'          => 'off',
					'show_if'          => array(
						'show_control_dot' => 'on',
						'control_dot_style' => array(
							'solid_dot',
							'transparent_dot',
							'square_dot'
						),
					),
					'tab_slug'         => 'general',
					'toggle_slug'      => 'slider_settings',
					'description'      => esc_html__( 'This setting will turn on and off the dynamic pagination of the slider.', 'divi-plus' ),
				),
				'arrows_custom_padding' => array(
	                'label'                 => esc_html__( 'Arrows Padding', 'divi-plus' ),
	                'type'                  => 'custom_padding',
	                'option_category'       => 'layout',
	                'show_if'         		=> array(
						'show_arrow' => 'on',
					),
					'default'				=> '5px|10px|5px|10px|true|true',
                	'default_on_front'		=> '5px|10px|5px|10px|true|true',
	                'mobile_options'        => true,
	                'hover'                 => false,
	                'tab_slug'              => 'advanced',
	                'toggle_slug'           => 'slider_styles',
	                'description'           => esc_html__( 'Padding adds extra space to the inside of the element, increasing the distance between the edge of the element and its inner contents.', 'divi-plus' ),
	            ),
				'arrow_font_size' => array(
					'label'           => esc_html__( 'Arrow Font Size', 'divi-plus' ),
					'type'            => 'range',
					'option_category' => 'layout',
					'range_settings'  => array(
						'min'  => '10',
						'max'  => '100',
						'step' => '1',
					),
					'show_if'         => array(
						'show_arrow' => 'on',
					),
					'default'         => '24px',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'slider_styles',
					'description'     => esc_html__( 'Here you can choose the arrow font size.', 'divi-plus' ),
				),
				'arrow_color' => array(
					'label'        => esc_html__( 'Arrow Color', 'divi-plus' ),
					'type'         => 'color-alpha',
					'custom_color' => true,
					'show_if'      => array(
						'show_arrow' => 'on',
					),
					'hover'        => 'tabs',
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'slider_styles',
					'description'  => esc_html__( 'Here you can define color for the arrow', 'divi-plus' ),
				),
				'arrow_background_color' => array(
					'label'        => esc_html__( 'Arrow Background', 'divi-plus' ),
					'type'         => 'color-alpha',
					'custom_color' => true,
					'show_if'      => array(
						'show_arrow' => 'on',
					),
					'hover'        => 'tabs',
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'slider_styles',
					'description'  => esc_html__( 'Here you can choose a custom color to be used for the shape background of arrows.', 'divi-plus' ),
				),
				'arrow_background_border_size' => array(
					'label'           => esc_html__( 'Arrow Background Border', 'divi-plus' ),
					'type'            => 'range',
					'option_category' => 'layout',
					'range_settings'  => array(
						'min'  => '1',
						'max'  => '10',
						'step' => '1',
					),
					'show_if' 		  => array(
						'show_arrow' => 'on',
					),
					'default'         => '0px',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'slider_styles',
					'description'     => esc_html__( 'Move the slider or input the value to increase or decrease the border size of the arrow background.', 'divi-plus' ),
				),
				'arrow_background_border_color' => array(
					'label'        => esc_html__( 'Arrow Background Border Color', 'divi-plus' ),
					'type'         => 'color-alpha',
					'custom_color' => true,
					'show_if'      => array(
						'show_arrow' => 'on',
					),
					'hover'        => 'tabs',
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'slider_styles',
					'description'  => esc_html__( 'Here you can choose a custom color to be used for the arrow border', 'divi-plus' ),
				),
				'control_dot_active_color' => array(
					'label'        	   => esc_html__( 'Active Dot Pagination Color', 'divi-plus' ),
					'type'         	   => 'color-alpha',
					'custom_color'     => true,
					'show_if'          => array(
						'show_control_dot' => 'on',
					),
					'default'      	   => '#000000',
					'tab_slug'     	   => 'advanced',
					'toggle_slug'  	   => 'slider_styles',
					'description'  	   => esc_html__( 'Here you can define color for the active pagination item.', 'divi-plus' ),
				),
				'control_dot_inactive_color' => array(
					'label'        	   => esc_html__( 'Inactive Dot Pagination Color', 'divi-plus' ),
					'type'         	   => 'color-alpha',
					'custom_color'     => true,
					'show_if'      	   => array(
						'show_control_dot' => 'on',
					),
					'default'      	   => '#cccccc',
					'tab_slug'     	   => 'advanced',
					'toggle_slug'  	   => 'slider_styles',
					'description'  	   => esc_html__( 'Here you can define color for the inactive pagination item.', 'divi-plus' ),
				),
				'quickview_link_bg_color' => array(
	                'label'                 => esc_html__( 'Link Background', 'divi-plus' ),
	                'type'         			=> 'color-alpha',
					'custom_color' 			=> true,
	                'show_if'		  		=> array(
						'enable_quickview' => 'on',
					),
					'default'				=> 'rgba(255, 255, 255, 0.6)',
	                'tab_slug'              => 'advanced',
	                'toggle_slug'           => 'quickview_link',
	                'description'           => esc_html__( 'Customize the background style of the quickview link by adjusting the background color.', 'divi-plus' ),
	            ),
				'sale_badge_bg_color' => array(
					'label'        	   => esc_html__( 'Sale Badge Background Color', 'divi-plus' ),
					'type'         	   => 'color-alpha',
					'custom_color' 	   => true,
					'show_if'          => array(
						'show_thumbnail'	=> 'on',
						'show_sale_badge' 	=> 'on',
					),
					'default'      	   => '#000',
					'tab_slug'         => 'advanced',
					'toggle_slug'      => 'sale_badge',
					'description'      => esc_html__( 'Here you can select the backround color for the sale badge.', 'divi-plus' ),
				),
				'product_bg_color' => array(
	                'label'                 => esc_html__( 'Product Background', 'divi-plus' ),
	                'type'                  => 'background-field',
	                'base_name'             => 'product_bg',
	                'context'               => 'product_bg_color',
	                'option_category'       => 'button',
	                'custom_color'          => true,
	                'background_fields'     => $this->generate_background_options( 'product_bg', 'button', 'general', 'background', 'product_bg_color' ),
	                'hover'                 => 'tabs',
	                'tab_slug'              => 'general',
	                'toggle_slug'           => 'background',
	                'description'           => esc_html__( 'Customize the background style of the product by adjusting the background color, gradient, and image.', 'divi-plus' ),
	            ),
	            'add_to_cart_bg_color' => array(
	                'label'                 => esc_html__( 'Add to Cart Button Background', 'divi-plus' ),
	                'type'                  => 'background-field',
	                'base_name'             => 'add_to_cart_bg',
	                'context'               => 'add_to_cart_bg_color',
	                'option_category'       => 'button',
	                'custom_color'          => true,
	                'background_fields'     => $this->generate_background_options( 'add_to_cart_bg', 'button', 'advanced', 'add_to_cart_button', 'add_to_cart_bg_color' ),
	                'hover'                 => 'tabs',
	                'tab_slug'              => 'advanced',
	                'toggle_slug'           => 'add_to_cart_button',
	                'description'           => esc_html__( 'Customize the background style of the add to cart button by adjusting the background color, gradient, and image.', 'divi-plus' ),
	            ),
	            'quickview_add_to_cart_bg_color' => array(
	                'label'                 => esc_html__( 'Add to Cart Button Background', 'divi-plus' ),
	                'type'                  => 'background-field',
	                'base_name'             => 'quickview_add_to_cart_bg',
	                'context'               => 'quickview_add_to_cart_bg_color',
	                'option_category'       => 'button',
	                'custom_color'          => true,
	                'background_fields'     => $this->generate_background_options( 'quickview_add_to_cart_bg', 'button', 'advanced', 'quickview_add_to_cart_button', 'quickview_add_to_cart_bg_color' ),
	                'hover'                 => 'tabs',
	                'show_if'		  		=> array(
						'enable_quickview' => 'on',
					),
	                'tab_slug'              => 'advanced',
	                'toggle_slug'           => 'quickview_add_to_cart_button',
	                'description'           => esc_html__( 'Customize the background style of the add to cart button by adjusting the background color, gradient, and image.', 'divi-plus' ),
	            ),
	            'quickview_quantity_bg_color' => array(
	                'label'                 => esc_html__( 'Quantity Field Background', 'divi-plus' ),
	                'type'         			=> 'color-alpha',
					'custom_color' 			=> true,
	                'show_if'		  		=> array(
						'enable_quickview' => 'on',
					),
	                'tab_slug'              => 'advanced',
	                'toggle_slug'           => 'quickview_quantity',
	                'description'           => esc_html__( 'Customize the background color of the quantity field by adjusting the background color.', 'divi-plus' ),
	            ),
	            'quickview_attributes_bg_color' => array(
	                'label'                 => esc_html__( 'Attributes Field Background', 'divi-plus' ),
	                'type'         			=> 'color-alpha',
					'custom_color' 			=> true,
	                'show_if'		  		=> array(
						'enable_quickview' => 'on',
					),
	                'tab_slug'              => 'advanced',
	                'toggle_slug'           => 'quickview_attributes',
	                'sub_toggle'			=> 'field_text',
	                'description'           => esc_html__( 'Customize the background style of the attributes field by adjusting the background color.', 'divi-plus' ),
	            ),
	            'star_rating_color' => array(
	                'label'                 => esc_html__( 'Star Rating Color', 'divi-plus' ),
	                'type'         			=> 'color-alpha',
					'custom_color' 			=> true,
	                'show_if'		  		=> array(
						'show_rating' => 'on',
					),
					'default'				=> '#ffca00',
	                'tab_slug'              => 'advanced',
	                'toggle_slug'           => 'star_rating',
	                'description'           => esc_html__( 'Customize the color of star rating.', 'divi-plus' ),
	            ),
	            'add_to_cart_use_icon' => array(
					'label'            		=> esc_html__( 'Show Add to Cart Icon', 'divi-plus' ),
					'type'             		=> 'yes_no_button',
					'option_category'  		=> 'configuration',
					'options'          		=> array(
						'off' => esc_html__( 'No', 'divi-plus' ),
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
					),
					'default'          		=> 'on',
					'show_if'		  		=> array(
						'show_add_to_cart' => 'on',
					),
					'tab_slug'         		=> 'advanced',
					'toggle_slug'      		=> 'add_to_cart_button',
					'description'      		=> esc_html__( 'When enabled, this will add a custom icon within the button.', 'divi-plus' ),
				),
				'add_to_cart_icon' => array(
					'label'               	=> esc_html__( 'Add to Cart Icon', 'divi-plus' ),
					'type'                	=> 'select_icon',
					'option_category'     	=> 'button',
					'class'               	=> array( 'et-pb-font-icon' ),
					'default'             	=> '',
					'mobile_options'      	=> true,
					'show_if'      			=> array(
						'show_add_to_cart' 		=> 'on',
						'add_to_cart_use_icon' 	=> 'on',
					),
					'tab_slug'         		=> 'advanced',
					'toggle_slug'      		=> 'add_to_cart_button',
					'description'         	=> esc_html__( 'Pick an icon to be used for the button.', 'divi-plus' ),
					'computed_affects' 		=> array(
						'__products_data',
					),
				),
				'add_to_cart_on_hover' => array(
					'label'            		=> esc_html__( 'Only Show Icon On Hover', 'divi-plus' ),
					'type'             		=> 'yes_no_button',
					'option_category'  		=> 'configuration',
					'options'          		=> array(
						'off' => esc_html__( 'No', 'divi-plus' ),
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
					),
					'default'          		=> 'on',
					'show_if'      			=> array(
						'show_add_to_cart' 		=> 'on',
						'add_to_cart_use_icon' 	=> 'on',
					),
					'tab_slug'         		=> 'advanced',
					'toggle_slug'      		=> 'add_to_cart_button',
					'description'      		=> esc_html__( 'By default, button icons are displayed on hover. If you would like button icons to always be displayed, then you can disable this option.', 'divi-plus' ),
				),
				'add_to_cart_icon_placement' => array(
					'label'            		=> esc_html__( 'Add to Cart Icon Placement', 'divi-plus' ),
					'type'                	=> 'select',
					'option_category'     	=> 'button',
					'options'             	=> array(
						'right' => esc_html__( 'Right', 'divi-plus' ),
						'left'  => esc_html__( 'Left', 'divi-plus' ),
					),
					'default'             	=> 'right',
					'show_if'      			=> array(
						'show_add_to_cart' 		=> 'on',
						'add_to_cart_use_icon' 	=> 'on',
					),
					'tab_slug'            	=> 'advanced',
					'toggle_slug'        	=> 'add_to_cart_button',
					'description'         	=> esc_html__( 'Choose where the button icon should be displayed within the button.', 'divi-plus' ),
				),
				'quickview_add_to_cart_use_icon' => array(
					'label'            		=> esc_html__( 'Show Add to Cart Icon', 'divi-plus' ),
					'type'             		=> 'yes_no_button',
					'option_category'  		=> 'configuration',
					'options'          		=> array(
						'off' => esc_html__( 'No', 'divi-plus' ),
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
					),
					'default'          		=> 'on',
					'show_if'		  		=> array(
						'enable_quickview' => 'on',
					),
					'tab_slug'         		=> 'advanced',
					'toggle_slug'      		=> 'quickview_add_to_cart_button',
					'description'      		=> esc_html__( 'When enabled, this will add a custom icon within the button.', 'divi-plus' ),
				),
				'quickview_add_to_cart_icon' => array(
					'label'               	=> esc_html__( 'Add to Cart Icon', 'divi-plus' ),
					'type'                	=> 'select_icon',
					'option_category'     	=> 'button',
					'class'               	=> array( 'et-pb-font-icon' ),
					'default'             	=> '',
					'mobile_options'      	=> true,
					'show_if'      			=> array(
						'enable_quickview' 					=> 'on',
						'quickview_add_to_cart_use_icon' 	=> 'on',
					),
					'tab_slug'         		=> 'advanced',
					'toggle_slug'      		=> 'quickview_add_to_cart_button',
					'description'         	=> esc_html__( 'Pick an icon to be used for the button.', 'divi-plus' ),
				),
				'quickview_add_to_cart_on_hover' => array(
					'label'            		=> esc_html__( 'Only Show Icon On Hover', 'divi-plus' ),
					'type'             		=> 'yes_no_button',
					'option_category'  		=> 'configuration',
					'options'          		=> array(
						'off' => esc_html__( 'No', 'divi-plus' ),
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
					),
					'default'          		=> 'on',
					'show_if'      			=> array(
						'enable_quickview' 					=> 'on',
						'quickview_add_to_cart_use_icon' 	=> 'on',
					),
					'tab_slug'         		=> 'advanced',
					'toggle_slug'      		=> 'quickview_add_to_cart_button',
					'description'      		=> esc_html__( 'By default, button icons are displayed on hover. If you would like button icons to always be displayed, then you can disable this option.', 'divi-plus' ),
				),
				'quickview_add_to_cart_icon_placement' => array(
					'label'            		=> esc_html__( 'Add to Cart Icon Placement', 'divi-plus' ),
					'type'                	=> 'select',
					'option_category'     	=> 'button',
					'options'             	=> array(
						'right' => esc_html__( 'Right', 'divi-plus' ),
						'left'  => esc_html__( 'Left', 'divi-plus' ),
					),
					'default'             	=> 'right',
					'show_if'      			=> array(
						'enable_quickview' 					=> 'on',
						'quickview_add_to_cart_use_icon' 	=> 'on',
					),
					'tab_slug'            	=> 'advanced',
					'toggle_slug'        	=> 'quickview_add_to_cart_button',
					'description'         	=> esc_html__( 'Choose where the button icon should be displayed within the button.', 'divi-plus' ),
				),
	            'slider_container_custom_padding' => array(
					'label'            => esc_html__( 'Slider Container Padding', 'divi-plus' ),
					'type'             => 'custom_padding',
					'option_category'  => 'layout',
					'mobile_options'   => true,
					'hover'            => false,
					'tab_slug'         => 'advanced',
					'toggle_slug'      => 'margin_padding',
					'description'      => esc_html__( 'Padding adds extra space to the inside of the element, increasing the distance between the edge of the element and its inner contents.', 'divi-plus' ),
				),
				'product_content_custom_padding' => array(
	                'label'                 => esc_html__( 'Product Content Padding', 'divi-plus' ),
	                'type'                  => 'custom_padding',
	                'option_category'       => 'layout',
	                'mobile_options'        => true,
	                'hover'                 => false,
	                'default'				=> '15px|15px|15px|15px|true|true',
	                'default_on_front'		=> '15px|15px|15px|15px|true|true',
	                'tab_slug'              => 'advanced',
	                'toggle_slug'           => 'margin_padding',
	                'description'           => esc_html__( 'Padding adds extra space to the inside of the element, increasing the distance between the edge of the element and its inner contents.', 'divi-plus' ),
	            ),
	            'product_image_custom_padding' => array(
	                'label'                 => esc_html__( 'Product Image Padding', 'divi-plus' ),
	                'type'                  => 'custom_padding',
	                'option_category'       => 'layout',
	                'mobile_options'        => true,
	                'hover'                 => false,
	                'tab_slug'              => 'advanced',
	                'toggle_slug'           => 'margin_padding',
	                'description'           => esc_html__( 'Padding adds extra space to the inside of the element, increasing the distance between the edge of the element and its inner contents.', 'divi-plus' ),
	            ),
	            'lightbox_content_width' => array(
					'label'           => esc_html__( 'Lightbox Content Width', 'divi-plus' ),
					'type'            => 'range',
					'option_category' => 'layout',
					'range_settings'  => array(
						'min'  => '1',
						'max'  => '100',
						'step' => '1',
					),
					'mobile_options' => true,
					'show_if' 		  => array(
						'enable_quickview' => 'on',
					),
					'default'         => '60%',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'quickview_popup',
					'description'     => esc_html__( 'Move the slider or input the value to increase or decrease the width of lightbox content.', 'divi-plus' ),
				),
	            'lightbox_bg_color' => array(
					'label'        => esc_html__( 'Lightbox Background Color', 'divi-plus' ),
					'type'         => 'color-alpha',
					'custom_color' => true,
					'default'	   => 'rgba(11, 11, 11, 0.8)',
					'show_if'      => array(
						'enable_quickview' => 'on',
					),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'quickview_popup',
					'description'  => esc_html__( 'Here you can define a custom background color for the lightbox.', 'divi-plus' ),
				),
				'lightbox_close_icon_color' => array(
					'label'            => esc_html__( 'Close Icon Color', 'divi-plus' ),
					'type'             => 'color-alpha',
					'default'          => '#fff',
					'show_if'          => array(
						'enable_quickview' => 'on',
					),
					'tab_slug'         => 'advanced',
					'toggle_slug'      => 'quickview_popup',
					'description'      => esc_html__( 'Here you can define a custom color to be used for the close icon.', 'divi-plus' ),
				),
				'loader_background_color' => array(
					'label'        => esc_html__( 'Loader Overlay', 'divi-plus' ),
					'type'         => 'color-alpha',
					'custom_color' => true,
					'show_if'      => array(
						'enable_quickview' => 'on',
					),
					'default'	   => 'rgba(255, 255, 255, 0.8)',
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'loader',
					'description'  => esc_html__( 'Here you can choose a custom color to be used for the loader overlay.', 'divi-plus' ),
				),
				'woo_notice_background_color' => array(
					'label'        => esc_html__( 'Notice Background Color', 'divi-plus' ),
					'type'         => 'color-alpha',
					'custom_color' => true,
					'show_if'      => array(
						'enable_quickview' => 'on',
					),
					'default'	   => '#000',
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'woocommerce_notice',
					'sub_toggle'   => 'p',
					'description'  => esc_html__( 'Here you can choose a custom color to be used for the woocommerce notice.', 'divi-plus' ),
				),
				'__products_data' => array(
					'type'                => 'computed',
					'computed_callback'   => array( 'DIPL_WooProductsCarousel', 'get_products_data' ),
					'computed_depends_on' => array(
						'view_type',
						'use_current_loop',
						'product_layout',
						'products_number',
						'offset_number',
						'products_order' ,
						'products_order_by',
						'hide_out_of_stock',
						'enable_out_of_stock_label',
						'out_of_stock_label',
						'include_categories',
						'include_tags',
						'taxonomies_relation',
						'enable_quickview',
						'quickview_link_text',
						'show_thumbnail',
						'thumbnail_size',
						'show_rating',
						'show_price',
						'show_add_to_cart',
						'show_add_to_cart_on_hover',
						'simple_add_to_cart_text',
						'variable_add_to_cart_text',
						'grouped_add_to_cart_text',
						'external_add_to_cart_text',
						'out_of_stock_add_to_cart_text',
						'add_to_cart_icon',
						'add_to_cart_icon_tablet',
						'add_to_cart_icon_phone',
						'show_sale_badge',
						'sale_badge_text',
						'sale_label_text',
						'title_level',
					),
				),
			),
			$this->generate_background_options( 'product_bg', 'skip', 'general', 'background', 'product_bg_color' ),
			$this->generate_background_options( 'add_to_cart_bg', 'skip', 'advanced', 'add_to_cart_button', 'add_to_cart_bg_color' ),
			$this->generate_background_options( 'quickview_add_to_cart_bg', 'skip', 'advanced', 'quickview_add_to_cart_button', 'quickview_add_to_cart_bg_color' )
			
		);
	}

	/**
	 * This function return values to react for front end builder.
	 *
	 * @param array arguments to get products data
	 * @return array
	 * */
	public static function get_products_data( $args = array(), $conditional_tags = array(), $current_page = array() ) {
		if ( self::$rendering ) {
			// We are trying to render a Blog module while a Blog module is already being rendered
			// which means we have most probably hit an infinite recursion. While not necessarily
			// the case, rendering a post which renders a Blog module which renders a post
			// which renders a Blog module is not a sensible use-case.
			return '';
		}

		$defaults = array(
			'view_type' => 'default',
			'use_current_loop' => 'off',
			'product_layout' => 'layout1',
			'products_number' => '10',
			'offset_number' => 0,
			'products_order' => 'DESC',
			'products_order_by' => 'date',
			'hide_out_of_stock'	=> 'off',
			'enable_out_of_stock_label' => 'off',
			'out_of_stock_label' => esc_html__( 'Out of Stock', 'divi-woocommerce-extended' ),
			'include_categories' => '',
			'include_tags' => '',
			'taxonomies_relation' => 'OR',
			'enable_quickview' => 'off',
			'quickview_link_text' => 'Quickview',
			'show_thumbnail' => 'on',
			'thumbnail_size' => 'woocommerce_thumbnail',
			'show_rating' => 'off',
			'show_price' => 'on',
			'show_add_to_cart' => 'on',
			'show_add_to_cart_on_hover' => 'off',
			'simple_add_to_cart_text' => '',
			'variable_add_to_cart_text' => '',
			'grouped_add_to_cart_text' => '',
			'external_add_to_cart_text' => '',
			'out_of_stock_add_to_cart_text' => '',
			'add_to_cart_icon' => '',
			'add_to_cart_icon_tablet' => '',
			'add_to_cart_icon_phone' => '',
			'show_sale_badge' => 'on',
			'sale_badge_text' => 'label',
			'sale_label_text' => '',
			'title_level' => 'h4',
		);

		$args = wp_parse_args( $args, $defaults );

		foreach ( $defaults as $key => $default ) {
			if ( isset( $args[$key] ) && et_()->includes( $args[$key], '%' ) ) {
    			// phpcs:ignore ET.Sniffs.ValidatedSanitizedInput.InputNotSanitized
        		$prepared_value  = preg_replace( '/%([a-f0-9]{2})/', '%_$1', $args[$key] );
				${$key} = preg_replace( '/%_([a-f0-9]{2})/', '%$1', trim( sanitize_text_field( wp_unslash( $prepared_value ) ) ) );
        	} else {
				${$key} = sanitize_text_field( et_()->array_get( $args, $key, $default ) );
			}
		}

		$is_single         = (bool) et_fb_conditional_tag( 'is_single', $conditional_tags );
		$is_user_logged_in = (bool) et_fb_conditional_tag( 'is_user_logged_in', $conditional_tags );
		$current_post_id   = isset( $current_page['id'] ) ? (int) $current_page['id'] : 0;

		$processed_title_level 	= et_pb_process_header_level( $title_level, 'h4' );
		$processed_title_level	= esc_html( $processed_title_level );

		$add_to_cart_icon = array(
            'desktop' => $add_to_cart_icon,
            'tablet' => $add_to_cart_icon_tablet,
            'phone' => $add_to_cart_icon_phone
        );

        $add_to_cart_icon = array_filter( $add_to_cart_icon );

		$products_number = ( 0 === $products_number ) ? -1 : (int) $products_number;

		$args = array(
			'post_type'      => 'product',
			'posts_per_page' => intval( $products_number ),
			'offset'		 => intval( $offset_number ),
			'post_status'    => 'publish',
			'orderby'        => $products_order_by,
			'order'          => $products_order,
		);

		if ( 'price' === $products_order_by ) {
			$args['orderby'] = 'meta_value_num';
			$args['meta_key'] = '_price';
		} else if( 'stock_status' === $products_order_by ) {
			$args['orderby'] 	= 'meta_value';
			$args['meta_key'] 	= '_stock_status';
		}

		if ( $is_user_logged_in ) {
			$args['post_status'] = array(
				'publish',
				'private',
			);
		}

		$use_current_loop = 'on' === $use_current_loop;

		$args['tax_query'] = array(
			array(
				'taxonomy'         => 'product_visibility',
				'terms'            => 'exclude-from-catalog',
				'field'            => 'slug',
				'operator'         => 'NOT IN',
			),
		);

		$tax_query = array();

		if ( $include_categories && '' !== $include_categories && ! $use_current_loop ) {
			$tax_query[] = array(
				'taxonomy' => 'product_cat',
				'field'    => 'term_id',
				'terms'    => array_map( 'intval', explode( ',', $include_categories ) ),
				'operator' => 'IN',
			);
		}

		if ( $include_tags && '' !== $include_tags && ! $use_current_loop ) {
			$tax_query[] = array(
				'taxonomy' => 'product_tag',
				'field'    => 'term_id',
				'terms'    => array_map( 'intval', explode( ',', $include_tags ) ),
				'operator' => 'IN',
			);
		}

		switch( $view_type ) {

			case 'featured':
				$args['tax_query'][] = array(
					'taxonomy'         => 'product_visibility',
					'terms'            => 'featured',
					'field'            => 'name',
					'operator'         => 'IN',
					'include_children' => false,
				);
				break;

			case 'sale':
				if ( function_exists( 'wc_get_product_ids_on_sale' ) ) {
					$args['post__in'] = array_merge( array( 0 ), wc_get_product_ids_on_sale() );
				}
				break;

			case 'best_selling':
				$args['meta_key'] = 'total_sales';
				$args['order']    = 'DESC';
				$args['orderby']  = 'meta_value_num';
				break;

			case 'top_rated':
				$args['meta_key'] = '_wc_average_rating';
				$args['order']    = 'DESC';
				$args['orderby']  = 'meta_value_num';
				break;

			default:
				break;
		}

		if ( 'on' === $hide_out_of_stock ) {
			$args['meta_query'] = array(
				array(
					'key'     => '_stock_status',
		            'value'   => 'instock',
		            'compare' => 'IN',
				),
				array(
					'key'     => '_stock_status',
		            'value'   => 'onbackorder',
		            'compare' => 'IN',
				),
				'relation' => 'OR'
			);
		}

		if ( ! empty( $tax_query ) ) {
			if ( ! $use_current_loop && count( $tax_query ) > 1 ) {
				$tax_query['relation'] = sanitize_text_field( $taxonomies_relation );
			}
			$args['tax_query'][] = $tax_query;
		}
		
		$args['tax_query']['relation'] = 'AND';

		$args = apply_filters( 'dipl_woo_products_carousel_args', $args );

		$query = new WP_Query( $args );

		self::$rendering = true;

		$output_array = array();

		if ( $query->have_posts() ) {

			if ( $simple_add_to_cart_text || $variable_add_to_cart_text || $grouped_add_to_cart_text || $external_add_to_cart_text || $out_of_stock_add_to_cart_text ) {
				$add_to_cart_text = array(
					'simple' => esc_html( $simple_add_to_cart_text ),
					'variable' => esc_html( $variable_add_to_cart_text ),
					'grouped' => esc_html( $grouped_add_to_cart_text ),
					'external' => esc_html( $external_add_to_cart_text ),
					'out_of_stock' => esc_html( $out_of_stock_add_to_cart_text ),
				);
			} else {
				$add_to_cart_text = array();
			}

			while ( $query->have_posts() ) {
				$query->the_post();
				$product_id = intval( get_the_ID() );

				$output = '';
				include plugin_dir_path( __FILE__ ) . 'layouts/' . sanitize_file_name( $product_layout ) . '.php';

				array_push( $output_array, $output );
			}

			wp_reset_postdata();

		} else {
			$output_array = '';
		}

		self::$rendering = false;

		return et_core_intentionally_unescaped( $output_array, 'html' );
	}

	public function render( $attrs, $content, $render_slug ) {

		if ( self::$rendering ) {
			// We are trying to render a DIPL Woo Product module while a DIPL Woo Product module is already being rendered
			// which means we have most probably hit an infinite recursion. While not necessarily
			// the case, rendering a post which renders a Blog module which renders a post
			// which renders a Blog module is not a sensible use-case.
			return '';
		}

		$view_type										= $this->props['view_type'];
		$use_current_loop								= $this->props['use_current_loop'];
		$product_layout									= $this->props['product_layout'];
		$products_number 								= $this->props['products_number'];
		$offset_number									= $this->props['offset_number'];
		$products_order 								= $this->props['products_order'];
		$products_order_by								= $this->props['products_order_by'];
		$hide_out_of_stock								= $this->props['hide_out_of_stock'];
		$enable_out_of_stock_label						= $this->props['enable_out_of_stock_label'];
		$out_of_stock_label 							= $this->props['out_of_stock_label'];
		$include_categories 							= $this->props['include_categories'];
		$include_tags 									= $this->props['include_tags'];
		$taxonomies_relation							= $this->props['taxonomies_relation'];
		$no_result_text									= $this->props['no_result_text'];
		$enable_quickview								= $this->props['enable_quickview'];
		$quickview_link_text 							= $this->props['quickview_link_text'];
		$quickview_link_bg_color						= $this->props['quickview_link_bg_color'];
		$show_thumbnail									= $this->props['show_thumbnail'];
		$thumbnail_size									= $this->props['thumbnail_size'];
		$show_rating 									= $this->props['show_rating'];
		$show_price 									= $this->props['show_price'];
		$show_add_to_cart								= $this->props['show_add_to_cart'];
		$show_add_to_cart_on_hover						= $this->props['show_add_to_cart_on_hover'];
		$simple_add_to_cart_text						= $this->props['simple_add_to_cart_text'];
		$variable_add_to_cart_text						= $this->props['variable_add_to_cart_text'];
		$grouped_add_to_cart_text		    			= $this->props['grouped_add_to_cart_text'];
		$external_add_to_cart_text						= $this->props['external_add_to_cart_text'];
		$out_of_stock_add_to_cart_text					= $this->props['out_of_stock_add_to_cart_text'];
		$add_to_cart_use_icon							= $this->props['add_to_cart_use_icon'];
		$add_to_cart_on_hover 							= $this->props['add_to_cart_on_hover'];
		$add_to_cart_icon_placement						= $this->props['add_to_cart_icon_placement'];
		$quickview_add_to_cart_use_icon					= $this->props['quickview_add_to_cart_use_icon'];
		$quickview_add_to_cart_on_hover 				= $this->props['quickview_add_to_cart_on_hover'];
		$quickview_add_to_cart_icon_placement			= $this->props['quickview_add_to_cart_icon_placement'];
		$show_sale_badge 								= $this->props['show_sale_badge'];
		$sale_badge_text								= $this->props['sale_badge_text'];
		$sale_label_text								= $this->props['sale_label_text'];
		$slide_effect 									= $this->props['slide_effect'];
		$products_per_slide								= $this->props['products_per_slide'];
		$enable_coverflow_shadow 						= $this->props['enable_coverflow_shadow'];
		$coverflow_shadow_color 						= $this->props['coverflow_shadow_color'];
		$coverflow_rotate 								= $this->props['coverflow_rotate'];
		$coverflow_depth 								= $this->props['coverflow_depth'];
		$equalize_slides_height							= $this->props['equalize_slides_height'];
		$slider_loop 									= $this->props['slider_loop'];
		$autoplay 										= $this->props['autoplay'];
		$autoplay_speed 								= $this->props['autoplay_speed'];
		$pause_on_hover 								= $this->props['pause_on_hover'];
		$show_arrow 									= $this->props['show_arrow'];
		$show_arrow_on_hover 							= $this->props['show_arrow_on_hover'];
		$arrow_background_color         				= $this->props['arrow_background_color'];
		$arrow_background_color_hover 					= $this->get_hover_value( 'arrow_background_color' );
		$arrow_background_border_size   	 			= $this->props['arrow_background_border_size'];
		$arrow_background_border_color       			= $this->props['arrow_background_border_color'];
		$arrow_background_border_color_hover 			= $this->get_hover_value( 'arrow_background_border_color' );
		$show_control_dot 								= $this->props['show_control_dot'];
		$control_dot_style 								= $this->props['control_dot_style'];
		$control_dot_active_color 						= $this->props['control_dot_active_color'];
		$control_dot_inactive_color 					= $this->props['control_dot_inactive_color'];
		$slide_transition_duration						= $this->props['slide_transition_duration'];
		$arrow_color									= $this->props['arrow_color'];
		$arrow_color_hover								= $this->get_hover_value( 'arrow_color' );
		$star_rating_color								= $this->props['star_rating_color'];
		$loader_background_color						= $this->props['loader_background_color'];
		$woo_notice_background_color					= $this->props['woo_notice_background_color'];
		$add_to_cart_icon 								= et_pb_responsive_options()->get_property_values( $this->props, 'add_to_cart_icon' );
		$add_to_cart_icon 								= array_filter( $add_to_cart_icon );
		$quickview_add_to_cart_icon 					= et_pb_responsive_options()->get_property_values( $this->props, 'quickview_add_to_cart_icon' );
		$quickview_add_to_cart_icon 					= array_filter( $quickview_add_to_cart_icon );
		$arrows_position								= et_pb_responsive_options()->get_property_values( $this->props, 'arrows_position' );
		$arrows_position								= array_filter( $arrows_position );
		$lightbox_content_width							= et_pb_responsive_options()->get_property_values( $this->props, 'lightbox_content_width' );
		$title_level									= $this->props['title_level'];
		$processed_title_level 							= et_pb_process_header_level( $title_level, 'h4' );
		$processed_title_level							= esc_html( $processed_title_level );

		$products_number = ( 0 === $products_number ) ? -1 : (int) $products_number;
	
		$args = array(
			'post_type'      => 'product',
			'posts_per_page' => intval( $products_number ),
			'offset'		 => intval( $offset_number ),
			'post_status'    => 'publish',
			'orderby'        => 'date',
			'order'          => 'DESC',
		);

		if ( is_user_logged_in() ) {
			$args['post_status'] = array(
				'publish',
				'private',
			);
		}

		$use_current_loop   = 'on' === $this->prop( 'use_current_loop', 'off' );
		$use_current_loop   = $use_current_loop && ( is_post_type_archive( 'product' ) || is_search() || et_is_product_taxonomy() );

		$args['tax_query'] = array(
			array(
				'taxonomy'         => 'product_visibility',
				'terms'            => 'exclude-from-catalog',
				'field'            => 'slug',
				'operator'         => 'NOT IN',
			),
		);

		$tax_query = array();

		if ( $use_current_loop ) {
			if ( is_product_category() ) {
				$tax_query[] = array(
					'taxonomy' => 'product_cat',
					'field'    => 'term_id',
					'terms'    => intval( get_queried_object_id() ),
					'operator' => 'IN',
				);
			} else if ( is_product_tag() ) {
				$tax_query[] = array(
					'taxonomy' => 'product_tag',
					'field'    => 'slug',
					'terms'    => sanitize_text_field( get_queried_object()->slug ),
					'operator' => 'IN',
				);
			} else if ( is_product_taxonomy() ) {
				$object = get_queried_object();
				$tax_query[] = array(
					'taxonomy' => sanitize_text_field( $object->taxonomy ),
					'field'    => 'term_id',
					'terms'    => intval( $object->term_id ),
					'operator' => 'IN',
				);
			}

			if ( is_search() ) {
				$args['s'] = sanitize_text_field( get_search_query() );
			}
		}

		if ( $include_categories && '' !== $include_categories && ! $use_current_loop ) {
			$tax_query[] = array(
				'taxonomy' => 'product_cat',
				'field'    => 'term_id',
				'terms'    => array_map( 'intval', explode( ',', $include_categories ) ),
				'operator' => 'IN',
			);
		}

		if ( $include_tags && '' !== $include_tags && ! $use_current_loop ) {
			$tax_query[] = array(
				'taxonomy' => 'product_tag',
				'field'    => 'term_id',
				'terms'    => array_map( 'intval', explode( ',', $include_tags ) ),
				'operator' => 'IN',
			);
		}

		if ( '' !== $products_order_by ) {
			if ( 'price' === $products_order_by ) {
				$args['orderby'] 	= 'meta_value_num';
				$args['meta_key'] 	= '_price';
			} else if( 'stock_status' === $products_order_by ) {
				$args['orderby'] 	= 'meta_value';
				$args['meta_key'] 	= '_stock_status';
			} else {
				$args['orderby'] = sanitize_text_field( $products_order_by );
			}
		}

		if ( '' !== $products_order ) {
			$args['order'] = sanitize_text_field( $products_order );
		}

		switch( $view_type ) {

			case 'featured':
				$args['tax_query'][] = array(
					'taxonomy'         => 'product_visibility',
					'terms'            => 'featured',
					'field'            => 'name',
					'operator'         => 'IN',
					'include_children' => false,
				);
				break;

			case 'sale':
				if ( function_exists( 'wc_get_product_ids_on_sale' ) ) {
					$args['post__in'] = array_merge( array( 0 ), wc_get_product_ids_on_sale() );
				}
				break;

			case 'best_selling':
				$args['meta_key'] = 'total_sales';
				$args['order']    = 'DESC';
				$args['orderby']  = 'meta_value_num';
				break;

			case 'top_rated':
				$args['meta_key'] = '_wc_average_rating';
				$args['order']    = 'DESC';
				$args['orderby']  = 'meta_value_num';
				break;

			default:
				break;
		}

		if ( 'on' === $hide_out_of_stock ) {
			$args['meta_query'] = array(
				array(
					'key'     => '_stock_status',
		            'value'   => 'instock',
		            'compare' => 'IN',
				),
				array(
					'key'     => '_stock_status',
		            'value'   => 'onbackorder',
		            'compare' => 'IN',
				),
				'relation' => 'OR'
			);
		}

		if ( ! empty( $tax_query ) ) {
			if ( ! $use_current_loop && count( $tax_query ) > 1 ) {
				$tax_query['relation'] = sanitize_text_field( $taxonomies_relation );
			}
			$args['tax_query'][] = $tax_query;
		}

		$args['tax_query']['relation'] = 'AND';

		if ( $use_current_loop ) {
			$args = $this->filter_products_query($args);
			add_action( 'pre_get_posts', array( $this, 'apply_woo_widget_filters' ), 10 );
		}

		$args = apply_filters( 'dipl_woo_products_carousel_args', $args );

		$query = new WP_Query( $args );

		self::$rendering = true;

		if ( $query->have_posts() ) {

			wp_enqueue_script( 'elicus-swiper-script' );
			wp_enqueue_style( 'elicus-swiper-style' );
			wp_enqueue_style( 'dipl-swiper-style' );

			wp_enqueue_script( 'dipl-woo-products-carousel-custom', PLUGIN_PATH."includes/modules/WooProductsCarousel/dipl-woo-products-carousel-custom.min.js", array('jquery'), '1.0.2', true );
			wp_localize_script( 'dipl-woo-products-carousel-custom', 'DiviPlusWooProductsCarouselData', array(
	            'ajaxurl'   => admin_url( 'admin-ajax.php' ),
	            'ajaxnonce' => wp_create_nonce( 'elicus-divi-plus-woo-products-carousel-nonce' ),
	            'siteurl'   => site_url(),
	        ));

	        $file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        	wp_enqueue_style( 'dipl-woo-products-carousel-style', PLUGIN_PATH . 'includes/modules/WooProductsCarousel/' . $file . '.min.css', array(), '1.0.0' );
        	wp_enqueue_style( 'dipl-woo-products-style', PLUGIN_PATH . 'includes/modules/WooProducts/' . $file . '.min.css', array(), '1.0.0' );

	        $output = '';

			if ( $simple_add_to_cart_text || $variable_add_to_cart_text || $grouped_add_to_cart_text || $external_add_to_cart_text || $out_of_stock_add_to_cart_text ) {
				$add_to_cart_text = array(
					'simple' => esc_html( $simple_add_to_cart_text ),
					'variable' => esc_html( $variable_add_to_cart_text ),
					'grouped' => esc_html( $grouped_add_to_cart_text ),
					'external' => esc_html( $external_add_to_cart_text ),
					'out_of_stock' => esc_html( $out_of_stock_add_to_cart_text ),
				);
			} else {
				$add_to_cart_text = array();
			}

			if ( 'on' === $enable_quickview ) {
				$order_class = $this->get_module_order_class( 'dipl_woo_products_carousel' );
				$order_number = str_replace( 'dipl_woo_products_carousel_', '', $order_class );
				$data_props = array(
					'show_sale_badge',
					'sale_badge_text',
					'sale_label_text',
					'quickview_title_level',
				);
				$data_atts = $this->props_to_html_data_attrs( $data_props );

				if ( ! empty( $quickview_add_to_cart_icon ) ) {
		            $quickview_atc_icons = array();
		            foreach ( $quickview_add_to_cart_icon as $attr => $value ) {
		                $quickview_atc_icons[] = 'data-quickview_add_to_cart_icon_' . esc_attr( $attr ) . '="' . esc_attr( et_pb_process_font_icon( $value ) ) . '"';
		            }
		            $quickview_atc_icons = implode( ' ', $quickview_atc_icons );
		            $data_atts .= $quickview_atc_icons;
		        }
		        
				wp_enqueue_script( 'magnific-popup' );
				wp_enqueue_style( 'magnific-popup' );
				wp_enqueue_script( 'wc-add-to-cart-variation' );

				$quickview_quantity_bg_color 	= $this->props['quickview_quantity_bg_color'];
				$quickview_attributes_bg_color	= $this->props['quickview_attributes_bg_color'];
				if ( $quickview_quantity_bg_color ) {
					self::set_style( $render_slug, array(
	                    'selector'    => '%%order_class%%_lightbox .product .dipl_product_lightbox_content_wrapper .qty',
	                    'declaration' => sprintf( 'background-color: %1$s !important;', esc_attr( $quickview_quantity_bg_color ) ),
	                ) );
				}
				if ( $quickview_attributes_bg_color ) {
					self::set_style( $render_slug, array(
	                    'selector'    => '%%order_class%%_lightbox .product .dipl_product_lightbox_content_wrapper .variations select',
	                    'declaration' => sprintf( 'background-color: %1$s !important;', esc_attr( $quickview_attributes_bg_color ) ),
	                ) );
				}
				// phpcs:ignore WordPress,NonceVerification,NoNonce.
				if ( isset( $_REQUEST['add-to-cart'] ) ) {
					$output .= wc_print_notices( true );
				}
			}

			$output .= '<div class="dipl_swiper_wrapper">';
			$output .= sprintf(
				'<div class="dipl_woo_products_carousel_layout dipl_swiper_inner_wrap %1$s">',
				esc_attr( $product_layout )
			);

			$output .= '<div class="swiper-container">';
			$output .= '<div class="swiper-wrapper">';

			while ( $query->have_posts() ) {
				$query->the_post();
				$product_id = intval( get_the_ID() );
				
				$dipl_product = wc_get_product( $product_id );
				$product_visibility = $dipl_product->get_catalog_visibility();
                if ( ! in_array( $product_visibility, array( 'catalog', 'visible' ) ) ) {
                    continue;
                }

				$output .= '<div class="dipl_woo_products_carousel_slide swiper-slide">';
				
				include plugin_dir_path( __FILE__ ) . 'layouts/' . sanitize_file_name( $product_layout ) . '.php';
				
				$output .= '</div>';
			}

			wp_reset_postdata();

			if ( $use_current_loop ) {
				remove_action( 'pre_get_posts', array( $this, 'apply_woo_widget_filters' ), 10 );
			}

			$output .= '</div> <!-- swiper-wrapper -->';
			$output .= '</div> <!-- swiper-container -->';

			if ( 'on' === $show_arrow ) {
				$next = sprintf(
					'<div class="swiper-button-next"%1$s></div>',
					'' !== $this->props['next_slide_arrow'] ?
					sprintf(
						' data-next_slide_arrow="%1$s"',
						esc_attr( et_pb_process_font_icon( $this->props['next_slide_arrow'] ) )
					) :
					''
				);

				$prev = sprintf(
					'<div class="swiper-button-prev"%1$s></div>',
					'' !== $this->props['previous_slide_arrow'] ?
					sprintf(
						' data-previous_slide_arrow="%1$s"',
						esc_attr( et_pb_process_font_icon( $this->props['previous_slide_arrow'] ) )
					) :
					''
				);

				if ( ! empty( $arrows_position ) ) {
					$arrows_position_data = '';
					foreach( $arrows_position as $device => $value ) {
						$arrows_position_data .= ' data-arrows_' . $device . '="' . $value . '"';
					}
				}

				$output .= sprintf(
					'<div class="dipl_swiper_navigation"%3$s>%1$s %2$s</div>',
					$next,
					$prev,
					! empty( $arrows_position ) ? $arrows_position_data : ''
				);
			}

			$output .= '</div> <!-- dipl_woo_products_carousel_layout -->';

			if ( 'on' === $show_control_dot ) {
				$output .= sprintf(
					'<div class="dipl_swiper_pagination"><div class="swiper-pagination %1$s"></div></div>',
					esc_attr( $control_dot_style )
				);
			}

			$output .= '</div> <!-- dipl_swiper_wrapper -->';

			$output .= $this->dipl_render_slider_script();

			$options = array(
				'normal' => array(
					'product_bg' => "{$this->main_css_element} .dipl_single_woo_product",
					'add_to_cart_bg' => array( 
						"{$this->main_css_element} .dipl_single_woo_product_add_to_cart a.button",
						"{$this->main_css_element} .dipl_single_woo_product_add_to_cart a.add_to_cart_button",
						"{$this->main_css_element} .dipl_single_woo_product_add_to_cart a.added_to_cart",
					),
					'quickview_add_to_cart_bg' => array(
						"{$this->main_css_element}_lightbox .product .dipl_product_lightbox_content_wrapper .button.single_add_to_cart_button",
						"{$this->main_css_element}_lightbox .product .dipl_product_lightbox_content_wrapper .button.single_add_to_cart_button.added_to_cart",
					),
				),
				'hover' => array(
					'product_bg' => "{$this->main_css_element} .dipl_single_woo_product:hover",
					'add_to_cart_bg' => array( 
						"{$this->main_css_element} .dipl_single_woo_product_add_to_cart a.button:hover",
						"{$this->main_css_element} .dipl_single_woo_product_add_to_cart a.add_to_cart_button:hover",
						"{$this->main_css_element} .dipl_single_woo_product_add_to_cart a.added_to_cart:hover",
					),
					'quickview_add_to_cart_bg' => array(
						"{$this->main_css_element}_lightbox .product .dipl_product_lightbox_content_wrapper .button.single_add_to_cart_button:hover",
						"{$this->main_css_element}_lightbox .product .dipl_product_lightbox_content_wrapper .button.single_add_to_cart_button.added_to_cart:hover",
					),
				),
			);

			$this->process_custom_background( $render_slug, $options );
			$this->process_advanced_margin_padding_css( $this, $render_slug, $this->margin_padding );

			if ( '' !== $this->props['sale_badge_bg_color'] ) {
				self::set_style( $render_slug, array(
                    'selector'    => '%%order_class%% .dipl_single_woo_product_sale_badge',
                    'declaration' => sprintf( 'background-color: %1$s;', esc_attr( $this->props['sale_badge_bg_color'] ) ),
                ) );
			}

			if ( 'on' === $show_add_to_cart ) {
				$add_to_cart_text_align = et_pb_responsive_options()->get_property_values( $this->props,'add_to_cart_text_align' );
				foreach( $add_to_cart_text_align as &$align ) {
					$align = str_replace( array( 'left', 'right', 'justify' ), array( 'flex-start', 'flex-end', 'flex-start' ), $align );
				}

				et_pb_responsive_options()->generate_responsive_css( $add_to_cart_text_align, '%%order_class%% .dipl_single_woo_product_add_to_cart a.button, %%order_class%% .dipl_single_woo_product_add_to_cart a.add_to_cart_button, %%order_class%% .dipl_single_woo_product_add_to_cart a.added_to_cart', 'justify-content', $render_slug, '', 'type' );

				if ( 'on' === $show_add_to_cart_on_hover ) {
					self::set_style( $render_slug, array(
	                    'selector'    => '%%order_class%% .dipl_single_woo_product .add_to_cart_inline',
	                    'declaration' => 'position: absolute; top: 0; left: 0; width: 100%; height: inherit; visibility: hidden; opacity: 0; transform: translateY(0);',
	                    'media_query' => self::get_media_query( 'min_width_981' ),
	                ) );

	                self::set_style( $render_slug, array(
	                    'selector'    => '%%order_class%% .dipl_single_woo_product:hover .add_to_cart_inline',
	                    'declaration' => 'visibility: visible; opacity: 1;',
	                    'media_query' => self::get_media_query( 'min_width_981' ),
	                ) );
				}

				if ( 'on' === $add_to_cart_use_icon ) {
					$icon_pseudo_selector = 'left' === $add_to_cart_icon_placement ? 'before'  : 'after';

					self::set_style( $render_slug, array(
	                    'selector'    => '%%order_class%% .dipl_single_woo_product_add_to_cart a.button:' . $icon_pseudo_selector . ', %%order_class%% .dipl_single_woo_product_add_to_cart a.add_to_cart_button:' . $icon_pseudo_selector,
	                    'declaration' => 'display: inline-block;',
	                ) );

					if ( ! empty( $add_to_cart_icon ) ) {
						foreach( $add_to_cart_icon as $device => &$icon ) {
							$icon = 'attr(data-icon_' . $device . ')';
						}
						et_pb_responsive_options()->generate_responsive_css( $add_to_cart_icon, '%%order_class%% .dipl_single_woo_product_add_to_cart a.button:not(.loading):' . $icon_pseudo_selector . ', %%order_class%% .dipl_single_woo_product_add_to_cart a.add_to_cart_button:not(.loading):' . $icon_pseudo_selector, 'content', $render_slug, '', 'icon' );
					}

					if ( 'off' === $add_to_cart_on_hover ) {
						self::set_style( $render_slug, array(
		                    'selector'    => '%%order_class%% .dipl_single_woo_product_add_to_cart a.button:' . $icon_pseudo_selector . ', %%order_class%% .dipl_single_woo_product_add_to_cart a.add_to_cart_button:' . $icon_pseudo_selector,
		                    'declaration' => 'opacity: 1; margin-left: 0; margin-right: 0;',
		                ) );
					}

					if ( class_exists( 'ET_Builder_Module_Helper_Style_Processor' ) && method_exists( 'ET_Builder_Module_Helper_Style_Processor', 'process_extended_icon' ) ) {
						$this->generate_styles(
							array(
								'utility_arg'    => 'icon_font_family',
								'render_slug'    => $render_slug,
								'base_attr_name' => 'add_to_cart_icon',
								'important'      => true,
								'selector'       => '%%order_class%% .dipl_single_woo_product_add_to_cart a.button:not(.loading):' . $icon_pseudo_selector . ', %%order_class%% .dipl_single_woo_product_add_to_cart a.add_to_cart_button:not(.loading):' . $icon_pseudo_selector,
								'processor'      => array(
									'ET_Builder_Module_Helper_Style_Processor',
									'process_extended_icon',
								),
							)
						);
					}
				}
			}

			if ( 'on' === $enable_quickview ) {
				if ( 'on' === $quickview_add_to_cart_use_icon ) {
					$icon_pseudo_selector = 'left' === $quickview_add_to_cart_icon_placement ? 'before'  : 'after';

					self::set_style( $render_slug, array(
	                    'selector'    => "{$this->main_css_element}_lightbox .product .dipl_product_lightbox_content_wrapper .single_add_to_cart_button:not(.loading):" . $icon_pseudo_selector . ", {$this->main_css_element}_lightbox .product .dipl_product_lightbox_content_wrapper .single_add_to_cart_button.added_to_cart:not(.loading):" . $icon_pseudo_selector,
	                    'declaration' => 'display: inline-block;',
	                ) );

					if ( ! empty( $quickview_add_to_cart_icon ) ) {
						foreach( $quickview_add_to_cart_icon as $device => &$icon ) {
							$icon = 'attr(data-icon_' . $device . ')';
						}
						et_pb_responsive_options()->generate_responsive_css( $quickview_add_to_cart_icon, "{$this->main_css_element}_lightbox .product .dipl_product_lightbox_content_wrapper .single_add_to_cart_button:not(.loading):" . $icon_pseudo_selector . ", {$this->main_css_element}_lightbox .product .dipl_product_lightbox_content_wrapper .single_add_to_cart_button.added_to_cart:not(.loading):" . $icon_pseudo_selector, 'content', $render_slug, '', 'icon' );
					}

					if ( 'off' === $quickview_add_to_cart_on_hover ) {
						self::set_style( $render_slug, array(
		                    'selector'    => "{$this->main_css_element}_lightbox .product .dipl_product_lightbox_content_wrapper .single_add_to_cart_button:not(.loading):" . $icon_pseudo_selector . ", {$this->main_css_element}_lightbox .product .dipl_product_lightbox_content_wrapper .single_add_to_cart_button.added_to_cart:not(.loading):" . $icon_pseudo_selector,
		                    'declaration' => 'opacity: 1; margin-left: 0; margin-right: 0;',
		                ) );
					}

					if ( class_exists( 'ET_Builder_Module_Helper_Style_Processor' ) && method_exists( 'ET_Builder_Module_Helper_Style_Processor', 'process_extended_icon' ) ) {
						$this->generate_styles(
							array(
								'utility_arg'    => 'icon_font_family',
								'render_slug'    => $render_slug,
								'base_attr_name' => 'quickview_add_to_cart_icon',
								'important'      => true,
								'selector'       => "{$this->main_css_element}_lightbox .product .dipl_product_lightbox_content_wrapper .single_add_to_cart_button:not(.loading):" . $icon_pseudo_selector . ", {$this->main_css_element}_lightbox .product .dipl_product_lightbox_content_wrapper .single_add_to_cart_button.added_to_cart:not(.loading):" . $icon_pseudo_selector,
								'processor'      => array(
									'ET_Builder_Module_Helper_Style_Processor',
									'process_extended_icon',
								),
							)
						);
					}
				}
				$lightbox_bg_color 			= $this->props['lightbox_bg_color'];
				$lightbox_close_icon_color	= $this->props['lightbox_close_icon_color'];
				self::set_style( $render_slug, array(
                    'selector'    => "{$this->main_css_element}_lightbox.mfp-bg",
                    'declaration' => sprintf('background-color: %1$s', esc_attr( $lightbox_bg_color ) ),
                ) );
				self::set_style( $render_slug, array(
                    'selector'    => "{$this->main_css_element}_lightbox .mfp-close",
                    'declaration' => sprintf('color: %1$s', esc_attr( $lightbox_close_icon_color ) ),
                ) );
                self::set_style( $render_slug, array(
                    'selector'    => '%%order_class%% .dipl_single_woo_product_quickview_wrapper a',
                    'declaration' => sprintf( 'background-color: %1$s;', esc_attr( $quickview_link_bg_color ) ),
                ) );
                self::set_style( $render_slug, array(
                    'selector'    => '%%order_class%% .dipl_product_lightbox_loader:before',
                    'declaration' => sprintf( 'background-color: %1$s;', esc_attr( $loader_background_color ) ),
                ) );
                self::set_style( $render_slug, array(
                    'selector'    => '%%order_class%% .woocommerce-message',
                    'declaration' => sprintf( 'background-color: %1$s;', esc_attr( $woo_notice_background_color ) ),
                ) );
                et_pb_responsive_options()->generate_responsive_css( $lightbox_content_width, "{$this->main_css_element}_lightbox .mfp-content", 'width', $render_slug, '', 'range' );
			}

			if ( 'on' === $show_rating ) {
				self::set_style( $render_slug, array(
                    'selector'    => "{$this->main_css_element} .dipl_single_woo_product_star_rating .star-rating span:before",
                    'declaration' => sprintf('color: %1$s', esc_attr( $star_rating_color ) ),
                ) );

                $star_rating_alignment = et_pb_responsive_options()->get_property_values( $this->props,'star_rating_text_text_align' );
				foreach( $star_rating_alignment as &$align ) {
					$align = str_replace( array( 'left', 'right', 'justify' ), array( 'flex-start', 'flex-end', 'flex-start' ), $align);
				}
				if ( ! empty( array_filter( $star_rating_alignment ) ) ) {
					et_pb_responsive_options()->generate_responsive_css( $star_rating_alignment, '%%order_class%% .dipl_single_woo_product_star_rating', 'justify-content', $render_slug, '', 'alignment' );
				}
			}

			if ( 'on' === $equalize_slides_height ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_woo_products_carousel_slide',
						'declaration' => 'height: auto;',
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_single_woo_product',
						'declaration' => 'display: flex; flex-direction: column; height: 100%;',
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_single_woo_product_content',
						'declaration' => 'display: flex; flex-direction: column; flex-grow: 1;',
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_single_woo_product_add_to_cart',
						'declaration' => 'display: flex; flex-direction: column; justify-content: flex-end; flex-grow: 1;',
					)
				);
			}

			if ( 'on' === $enable_coverflow_shadow ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-container-3d .swiper-slide-shadow-left',
						'declaration' => sprintf( 'background-image: linear-gradient(to left,%1$s,rgba(0,0,0,0));', esc_attr( $coverflow_shadow_color ) ),
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-container-3d .swiper-slide-shadow-right',
						'declaration' => sprintf( 'background-image: linear-gradient(to right,%1$s,rgba(0,0,0,0));', esc_attr( $coverflow_shadow_color ) ),
					)
				);
			} else {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-container-3d .swiper-slide-shadow-left, %%order_class%% .swiper-container-3d .swiper-slide-shadow-right',
						'declaration' => 'background-image: none;',
					)
				);
			}

			if ( 'on' === $show_control_dot ) {
				if ( $control_dot_inactive_color ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_swiper_wrapper > .dipl_swiper_pagination .swiper-pagination-bullet',
							'declaration' => sprintf( 'background: %1$s;', esc_attr( $control_dot_inactive_color ) ),
						)
					);

					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_swiper_wrapper > .dipl_swiper_pagination .transparent_dot .swiper-pagination-bullet',
							'declaration' => sprintf( 'border-color: %1$s;', esc_attr( $control_dot_inactive_color ) ),
						)
					);
				}

				if ( $control_dot_active_color ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_swiper_wrapper > .dipl_swiper_pagination .swiper-pagination-bullet.swiper-pagination-bullet-active',
							'declaration' => sprintf( 'background: %1$s;', esc_attr( $control_dot_active_color ) ),
						)
					);
				}

				if ( 'stretched_dot' === $control_dot_style && $slide_transition_duration ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_swiper_wrapper > .dipl_swiper_pagination .stretched_dot .swiper-pagination-bullet',
							'declaration' => sprintf( 'transition: all %1$sms ease;', intval( $slide_transition_duration ) ),
						)
					);
				}
			}

			if ( 'on' === $show_arrow ) {
				if ( $arrow_color ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_woo_products_carousel_layout > .dipl_swiper_navigation .swiper-button-prev, %%order_class%% .dipl_woo_products_carousel_layout > .dipl_swiper_navigation .swiper-button-next',
							'declaration' => sprintf( 'color: %1$s;', esc_attr( $arrow_color ) ),
						)
					);
				}

				if ( $arrow_color_hover ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_woo_products_carousel_layout > .dipl_swiper_navigation .swiper-button-prev:hover, %%order_class%% .dipl_woo_products_carousel_layout > .dipl_swiper_navigation .swiper-button-next:hover',
							'declaration' => sprintf( 'color: %1$s;', esc_attr( $arrow_color_hover ) ),
						)
					);
				}

				$arrow_font_size = et_pb_responsive_options()->get_property_values( $this->props, 'arrow_font_size' );
				if ( ! empty( array_filter( $arrow_font_size ) ) ) {
					et_pb_responsive_options()->generate_responsive_css( $arrow_font_size, '%%order_class%% .dipl_woo_products_carousel_layout > .dipl_swiper_navigation .swiper-button-prev, %%order_class%% .dipl_woo_products_carousel_layout > .dipl_swiper_navigation .swiper-button-next', 'font-size', $render_slug, '', 'range' );
				}

				if ( '' !== $this->props['next_slide_arrow'] ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_woo_products_carousel_layout > .dipl_swiper_navigation .swiper-button-next::after',
							'declaration' => 'display: flex; align-items: center; height: 100%; content: attr(data-next_slide_arrow);',
						)
					);
					if ( class_exists( 'ET_Builder_Module_Helper_Style_Processor' ) && method_exists( 'ET_Builder_Module_Helper_Style_Processor', 'process_extended_icon' ) ) {
						$this->generate_styles(
							array(
								'utility_arg'    => 'icon_font_family',
								'render_slug'    => $render_slug,
								'base_attr_name' => 'next_slide_arrow',
								'important'      => true,
								'selector'       => '%%order_class%% .dipl_woo_products_carousel_layout > .dipl_swiper_navigation .swiper-button-next::after',
								'processor'      => array(
									'ET_Builder_Module_Helper_Style_Processor',
									'process_extended_icon',
								),
							)
						);
					} else {
						self::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% .dipl_woo_products_carousel_layout > .dipl_swiper_navigation .swiper-button-next::after',
								'declaration' => 'font-family: "ETmodules";',
							)
						);
					}
				}

				if ( '' !== $this->props['previous_slide_arrow'] ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_woo_products_carousel_layout > .dipl_swiper_navigation .swiper-button-prev::after',
							'declaration' => 'display: flex; align-items: center; height: 100%; content: attr(data-previous_slide_arrow);',
						)
					);
					if ( class_exists( 'ET_Builder_Module_Helper_Style_Processor' ) && method_exists( 'ET_Builder_Module_Helper_Style_Processor', 'process_extended_icon' ) ) {
						$this->generate_styles(
							array(
								'utility_arg'    => 'icon_font_family',
								'render_slug'    => $render_slug,
								'base_attr_name' => 'previous_slide_arrow',
								'important'      => true,
								'selector'       => '%%order_class%% .dipl_woo_products_carousel_layout > .dipl_swiper_navigation .swiper-button-prev::after',
								'processor'      => array(
									'ET_Builder_Module_Helper_Style_Processor',
									'process_extended_icon',
								),
							)
						);
					} else {
						self::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% .dipl_woo_products_carousel_layout > .dipl_swiper_navigation .swiper-button-prev::after',
								'declaration' => 'font-family: "ETmodules";',
							)
						);
					}
				}

				if ( 'on' === $show_arrow_on_hover ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_woo_products_carousel_layout > .dipl_swiper_navigation .swiper-button-prev',
							'declaration' => 'visibility: hidden; opacity: 0; transition: all 300ms ease;',
						)
					);
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_woo_products_carousel_layout > .dipl_swiper_navigation .swiper-button-next',
							'declaration' => 'visibility: hidden; opacity: 0; transition: all 300ms ease;',
						)
					);
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%%:hover .dipl_woo_products_carousel_layout > .dipl_swiper_navigation .swiper-button-prev, %%order_class%%:hover .dipl_woo_products_carousel_layout > .dipl_swiper_navigation .swiper-button-next',
							'declaration' => 'visibility: visible; opacity: 1;',
						)
					);
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%%:hover .dipl_woo_products_carousel_layout > .dipl_swiper_navigation .swiper-button-prev.swiper-button-disabled, %%order_class%%:hover .dipl_woo_products_carousel_layout > .dipl_swiper_navigation .swiper-button-next.swiper-button-disabled',
							'declaration' => 'opacity: 0.35;',
						)
					);
					
					/* Outside Slider */
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_woo_products_carousel_layout > .dipl_arrows_outside .swiper-button-prev',
							'declaration' => 'left: 50px;',
						)
					);
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_woo_products_carousel_layout > .dipl_arrows_outside .swiper-button-next',
							'declaration' => 'right: 50px;',
						)
					);
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%%:hover .dipl_woo_products_carousel_layout > .dipl_arrows_outside .swiper-button-prev',
							'declaration' => 'left: 0;',
						)
					);
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%%:hover .dipl_woo_products_carousel_layout > .dipl_arrows_outside .swiper-button-next',
							'declaration' => 'right: 0;',
						)
					);
					/* Inside Slider */
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_woo_products_carousel_layout > .dipl_arrows_inside .swiper-button-prev',
							'declaration' => 'left: -50px;',
						)
					);
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_woo_products_carousel_layout > .dipl_arrows_inside .swiper-button-next',
							'declaration' => 'right: -50px;',
						)
					);
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%%:hover .dipl_woo_products_carousel_layout > .dipl_arrows_inside .swiper-button-prev',
							'declaration' => 'left: 0;',
						)
					);
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%%:hover .dipl_woo_products_carousel_layout > .dipl_arrows_inside .swiper-button-next',
							'declaration' => 'right: 0;',
						)
					);

				}

				if ( '' !== $arrow_background_color ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_woo_products_carousel_layout > .dipl_swiper_navigation .swiper-button-prev, %%order_class%% .dipl_woo_products_carousel_layout > .dipl_swiper_navigation .swiper-button-next',
							'declaration' => sprintf( 'background: %1$s;', esc_attr( $arrow_background_color ) ),
						)
					);
				}

				if ( '' !== $arrow_background_color_hover ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_woo_products_carousel_layout > .dipl_swiper_navigation .swiper-button-prev:hover, %%order_class%% .dipl_woo_products_carousel_layout > .dipl_swiper_navigation .swiper-button-next:hover',
							'declaration' => sprintf( 'background: %1$s;', esc_attr( $arrow_background_color_hover ) ),
						)
					);
				}

				if ( '' !== $arrow_background_border_size ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_woo_products_carousel_layout > .dipl_swiper_navigation .swiper-button-prev, %%order_class%% .dipl_woo_products_carousel_layout > .dipl_swiper_navigation .swiper-button-next',
							'declaration' => sprintf( 'border-width: %1$s;', esc_attr( $arrow_background_border_size ) ),
						)
					);
				}

				if ( '' !== $arrow_background_border_color ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_woo_products_carousel_layout > .dipl_swiper_navigation .swiper-button-prev, %%order_class%% .dipl_woo_products_carousel_layout > .dipl_swiper_navigation .swiper-button-next',
							'declaration' => sprintf( 'border-color: %1$s;', esc_attr( $arrow_background_border_color ) ),
						)
					);
				}

				if ( '' !== $arrow_background_border_color_hover ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_woo_products_carousel_layout > .dipl_swiper_navigation .swiper-button-prev:hover, %%order_class%% .dipl_woo_products_carousel_layout > .dipl_swiper_navigation .swiper-button-next:hover',
							'declaration' => sprintf( 'border-color: %1$s;', esc_attr( $arrow_background_border_color_hover ) ),
						)
					);
				}
			}

		} else {
			$output = '<div class="entry">' . esc_html( $no_result_text ) . '</div>';
		}

		self::$rendering = false;

		$this->process_advanced_margin_padding_css( $this, $render_slug, $this->margin_padding );

		return et_core_intentionally_unescaped( $output, 'html' );
	}

	public function before_render() {
		$is_responsive = et_pb_responsive_options()->is_responsive_enabled( $this->props, 'products_per_slide' );
		if ( ! $is_responsive ) {
			$products_per_slide = $this->props['products_per_slide'];
			if ( 'slide' === $this->props['slide_effect'] ) {
				$products_per_slide_tablet = $products_per_slide < 3 ? $products_per_slide : 2;
				$products_per_slide_mobile = 1;
			} else if ( 'coverflow' === $this->props['slide_effect'] ) {
				$products_per_slide_tablet = 3;
				$products_per_slide_mobile = 1;
			}
			if ( isset( $products_per_slide_tablet ) && '' !== $products_per_slide_tablet ) {
				$this->props['products_per_slide_tablet'] = $products_per_slide_tablet;
			}

			if ( isset( $products_per_slide_mobile ) && '' !== $products_per_slide_mobile ) {
				$this->props['products_per_slide_phone'] = $products_per_slide_mobile;
			}
		}
	}

	/**
	 * This function dynamically creates script parameters according to the user settings
	 *
	 * @return string
	 * */
	public function dipl_render_slider_script() {
		$order_class     			= $this->get_module_order_class( 'dipl_woo_products_carousel' );
		$slide_effect          		= esc_attr( $this->props['slide_effect'] );
		$show_arrow            		= esc_attr( $this->props['show_arrow'] );
		$show_control_dot          	= esc_attr( $this->props['show_control_dot'] );
		$loop                  		= esc_attr( $this->props['slider_loop'] );
		$autoplay              		= esc_attr( $this->props['autoplay'] );
		$autoplay_speed        		= intval( $this->props['autoplay_speed'] );
		$transition_duration  		= intval( $this->props['slide_transition_duration'] );
		$pause_on_hover        		= esc_attr( $this->props['pause_on_hover'] );
		$enable_coverflow_shadow 	= 'on' === $this->props['enable_coverflow_shadow'] ? 'true' : 'false';
		$coverflow_rotate 	   		= intval( $this->props['coverflow_rotate'] );
		$coverflow_depth 	   		= intval( $this->props['coverflow_depth'] );
		$products_per_slide 		= et_pb_responsive_options()->get_property_values( $this->props, 'products_per_slide', '', true );
		$space_between_slides 		= et_pb_responsive_options()->get_property_values( $this->props, 'space_between_slides', '', true );
		$slides_per_group 			= et_pb_responsive_options()->get_property_values( $this->props, 'slides_per_group', '', true );
		$dynamic_bullets			= 'on' === $this->props['enable_dynamic_dots'] && in_array( $this->props['control_dot_style'], array( 'solid_dot', 'transparent_dot', 'square_dot' ), true ) ? 'true' : 'false';

		$autoplay_speed      		= '' !== $autoplay_speed || 0 !== $autoplay_speed ? $autoplay_speed : 3000;
		$transition_duration 		= '' !== $transition_duration || 0 !== $transition_duration ? $transition_duration : 1000;
		$loop          				= 'on' === $loop ? 'true' : 'false';
		$arrows 					= 'false';
		$dots 						= 'false';
		$autoplaySlides				= 0;
		$cube 						= 'false';
		$coverflow 					= 'false';
		$slidesPerGroup 			= 1;
		$slidesPerGroupSkip			= 0;
		$slidesPerGroup 			= 1;
		$slidesPerGroupIpad			= 1;
		$slidesPerGroupMobile		= 1;
		$slidesPerGroupSkip			= 0;
		$slidesPerGroupSkipIpad		= 0;
		$slidesPerGroupSkipMobile	= 0;

		if ( in_array( $slide_effect, array( 'slide', 'coverflow' ), true ) ) {
			$products_per_view        		= $products_per_slide['desktop'];
			$products_per_view_ipad   		= '' !== $products_per_slide['tablet'] ? $products_per_slide['tablet'] : $this->props['products_per_slide_tablet'];
			$products_per_view_mobile 		= '' !== $products_per_slide['phone'] ? $products_per_slide['phone'] : $this->props['products_per_slide_phone'];
			$products_space_between   		= $space_between_slides['desktop'];
			$products_space_between_ipad  	= '' !== $space_between_slides['tablet'] ? $space_between_slides['tablet'] : $products_space_between;
			$products_space_between_mobile 	= '' !== $space_between_slides['phone'] ? $space_between_slides['phone'] : $products_space_between_ipad;
			$slidesPerGroup 				= $slides_per_group['desktop'];
			$slidesPerGroupIpad				= '' !== $slides_per_group['tablet'] ? $slides_per_group['tablet'] : $slidesPerGroup;
			$slidesPerGroupMobile			= '' !== $slides_per_group['phone'] ? $slides_per_group['phone'] : $slidesPerGroupIpad;

			if ( $products_per_view > $slidesPerGroup && 1 !== $slidesPerGroup ) {
				$slidesPerGroupSkip = $products_per_view - $slidesPerGroup;
			}
			if ( $products_per_view_ipad > $slidesPerGroupIpad && 1 !== $slidesPerGroupIpad ) {
				$slidesPerGroupSkipIpad = $products_per_view_ipad - $slidesPerGroupIpad;
			}
			if ( $products_per_view_mobile > $slidesPerGroupMobile && 1 !== $slidesPerGroupMobile ) {
				$slidesPerGroupSkipMobile = $products_per_view_mobile - $slidesPerGroupMobile;
			}
		} else {
			$products_per_view        		= 1;
			$products_per_view_ipad   		= 1;
			$products_per_view_mobile 		= 1;
			$products_space_between   		= 0;
			$products_space_between_ipad	= 0;
			$products_space_between_mobile	= 0;
		}

		if ( 'on' === $show_arrow ) {
			$arrows = "{    
                            nextEl: '." . esc_attr( $order_class ) . " .dipl_woo_products_carousel_layout > .dipl_swiper_navigation .swiper-button-next',
                            prevEl: '." . esc_attr( $order_class ) . " .dipl_woo_products_carousel_layout > .dipl_swiper_navigation .swiper-button-prev',
                    }";
		}

		if ( 'on' === $show_control_dot ) {
			$dots = "{
                        el: '." . esc_attr( $order_class ) . " .dipl_woo_products_carousel_layout + .dipl_swiper_pagination .swiper-pagination',
                        dynamicBullets: " . $dynamic_bullets . ",
                        clickable: true,
                    }";
		}

		if ( 'on' === $autoplay ) {
			if ( 'on' === $pause_on_hover ) {
				$autoplaySlides = '{
                                delay:' . $autoplay_speed . ',
                                disableOnInteraction: true,
                            }';
			} else {
				$autoplaySlides = '{
                                delay:' . $autoplay_speed . ',
                                disableOnInteraction: false,
                            }';
			}
		}

		if ( 'cube' === $slide_effect ) {
			$cube = '{
                        shadow: false,
                        slideShadows: false,
                    }';
		}

		if ( 'coverflow' === $slide_effect ) {
			$coverflow = '{
                            rotate: ' . $coverflow_rotate . ',
                            stretch: 0,
                            depth: ' . $coverflow_depth . ',
                            modifier: 1,
                            slideShadows : ' . $enable_coverflow_shadow . ',
                        }';
		}

		$script  = '<script type="text/javascript">';
		$script .= 'jQuery(function($) {';
		$script .= 'var ' . esc_attr( $order_class ) . '_swiper = new Swiper(\'.' . esc_attr( $order_class ) . ' .dipl_woo_products_carousel_layout > .swiper-container\', {
                            slidesPerView: ' . $products_per_view . ',
                            autoplay: ' . $autoplaySlides . ',
                            spaceBetween: ' . intval( $products_space_between ) . ',
                            slidesPerGroup: ' . $slidesPerGroup . ',
                            slidesPerGroupSkip: ' . $slidesPerGroupSkip . ',
                            effect: "' . $slide_effect . '",
                            cubeEffect: ' . $cube . ',
                            coverflowEffect: ' . $coverflow . ',
                            speed: ' . $transition_duration . ',
                            loop: ' . $loop . ',
                            pagination: ' . $dots . ',
                            navigation: ' . $arrows . ',
                            grabCursor: \'true\',
                            breakpoints: {
                            	981: {
		                          	slidesPerView: ' . $products_per_view . ',
		                          	spaceBetween: ' . intval( $products_space_between ) . ',
                            		slidesPerGroup: ' . $slidesPerGroup . ',
                            		slidesPerGroupSkip: ' . $slidesPerGroupSkip . ',
		                        },
		                        768: {
		                          	slidesPerView: ' . $products_per_view_ipad . ',
		                          	spaceBetween: ' . intval( $products_space_between_ipad ) . ',
		                          	slidesPerGroup: ' . $slidesPerGroupIpad . ',
                            		slidesPerGroupSkip: ' . $slidesPerGroupSkipIpad . ',
		                        },
		                        0: {
		                          	slidesPerView: ' . $products_per_view_mobile . ',
		                          	spaceBetween: ' . intval( $products_space_between_mobile ) . ',
		                          	slidesPerGroup: ' . $slidesPerGroupMobile . ',
                            		slidesPerGroupSkip: ' . $slidesPerGroupSkipMobile . ',
		                        }
		                    },
                    });';

		if ( 'on' === $pause_on_hover && 'on' === $autoplay ) {
			$script .= '$(".' . esc_attr( $order_class ) . ' .dipl_woo_products_carousel_layout > .swiper-container").on("mouseenter", function(e) {
							if ( typeof ' . esc_attr( $order_class ) . '_swiper.autoplay.stop === "function" ) {
								' . esc_attr( $order_class ) . '_swiper.autoplay.stop();
							}
                        });';
            $script .= '$(".' . esc_attr( $order_class ) . ' .dipl_woo_products_carousel_layout > .swiper-container").on("mouseleave", function(e) {
        					if ( typeof ' . esc_attr( $order_class ) . '_swiper.autoplay.start === "function" ) {
                            	' . esc_attr( $order_class ) . '_swiper.autoplay.start();
                            }
                        });';
		}

		if ( 'true' !== $loop ) {
			$script .=  esc_attr( $order_class ) . '_swiper.on(\'reachEnd\', function(){
                            ' . esc_attr( $order_class ) . '_swiper.autoplay = false;
                        });';
		}

		$script .= '});</script>';

		return $script;
	}

	/**
	 * Filter the products query arguments.
	 * 
	 * @param array $args Query array.
	 *
	 * @return array
	 */
	public function filter_products_query( $args ) {
		if ( is_search() ) {
			$args['s'] = get_search_query();
		}

		if ( function_exists( 'WC' ) ) {
			$args['meta_query'] = WC()->query->get_meta_query( et_()->array_get( $args, 'meta_query', array() ), true );
			$args['tax_query']  = WC()->query->get_tax_query( et_()->array_get( $args, 'tax_query', array() ), true );

			// Add fake cache-busting argument as the filtering is actually done in self::apply_woo_widget_filters().
			$args['nocache'] = microtime( true );
		}

		return $args;
	}

	/* Filter the products shortcode query so Woo widget filters apply.
	 *
	 * @param WP_Query $query WP QUERY object.
	 */
	public function apply_woo_widget_filters( $query ) {
		global $wp_the_query;

		// Trick Woo filters into thinking the products shortcode query is the
		// main page query as some widget filters have is_main_query checks.
		$wp_the_query = $query;

		if ( function_exists( 'WC' ) ) {
			add_filter( 'posts_clauses', array( WC()->query, 'price_filter_post_clauses' ), 10, 2 );
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

		$allowed_advanced_fields = array( 'product_margin_padding', 'slider_margin_padding' );
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

	public function dipl_builder_processed_range_value( $result, $range, $range_string ) {
		if ( false !== strpos( $result, '0calc' ) ) {
			return $range;
		}
		return $result;
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
	if (
		in_array( 'dipl_woo_products_carousel', $modules, true ) &&
		et_is_woocommerce_plugin_active()
	) {
		new DIPL_WooProductsCarousel();
	}
} else {
	if ( et_is_woocommerce_plugin_active() ) {
		new DIPL_WooProductsCarousel();
	}
}