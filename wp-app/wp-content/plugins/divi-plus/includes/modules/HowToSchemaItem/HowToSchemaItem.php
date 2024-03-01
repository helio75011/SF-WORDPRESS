<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.4
 */
class DIPL_HowToSchema_Item extends ET_Builder_Module {

	public $slug       = 'dipl_how_to_schema_item';
	public $type       = 'child';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name            = esc_html__( 'DP How To Step', 'divi-plus' );
		$this->plural          = esc_html__( 'DP How To Steps', 'divi-plus' );
		$this->child_title_var = 'step_title';
	}

	public function get_settings_modal_toggles() {
		return array(
			'general'  => array(
				'toggles' => array(
					'step_content' => array(
						'title'    => esc_html__( 'Step Content', 'divi-plus' ),
						'priority' => 1,
					),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'step_heading_setting'      => array(
						'title'    => esc_html__( 'Step Heading', 'divi-plus' ),
						'priority' => 1,
					),
					'step_description_settings' => array(
						'title'             => esc_html__( 'Step Description', 'divi-plus' ),
						'priority'          => 2,
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
							'ul'    => array(
								'name' => 'UL',
								'icon' => 'list',
							),
							'ol'    => array(
								'name' => 'OL',
								'icon' => 'numbered-list',
							),
							'quote' => array(
								'name' => 'QUOTE',
								'icon' => 'text-quote',
							),
						),
					),
				),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts'          => array(
				'step_heading'    => array(
					'label'          => esc_html__( 'Heading', 'divi-plus' ),
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
					'css'            => array(
						'main' => '.dipl_how_to_schema %%order_class%% .dipl_step_title h1, .dipl_how_to_schema %%order_class%% .dipl_step_title h2, .dipl_how_to_schema %%order_class%% .dipl_step_title h3, .dipl_how_to_schema %%order_class%% .dipl_step_title h4, .dipl_how_to_schema %%order_class%% .dipl_step_title h5, .dipl_how_to_schema %%order_class%% .dipl_step_title h6',
					),
					'toggle_slug'    => 'step_heading_setting',
				),
				'step_text'       => array(
					'label'          => esc_html__( 'Text', 'divi-plus' ),
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
					'css'            => array(
						'main' => '.dipl_how_to_schema %%order_class%% .dipl_step_desc, .dipl_how_to_schema %%order_class%% .dipl_step_desc p',
					),
					'toggle_slug'    => 'step_description_settings',
					'sub_toggle'     => 'p',
				),
				'step_text_link'  => array(
					'label'          => esc_html__( 'Link', 'divi-plus' ),
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
					'css'            => array(
						'main' => '.dipl_how_to_schema %%order_class%% .dipl_step_desc a',
					),
					'toggle_slug'    => 'step_description_settings',
					'sub_toggle'     => 'a',
				),
				'step_text_ul'    => array(
					'label'          => esc_html__( 'Unordered List', 'divi-plus' ),
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
					'css'            => array(
						'main' => '.dipl_how_to_schema %%order_class%% .dipl_step_desc ul li',
					),
					'toggle_slug'    => 'step_description_settings',
					'sub_toggle'     => 'ul',
				),
				'step_text_ol'    => array(
					'label'          => esc_html__( 'Ordered List', 'divi-plus' ),
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
					'css'            => array(
						'main' => '.dipl_how_to_schema %%order_class%% .dipl_step_desc ol li',
					),
					'toggle_slug'    => 'step_description_settings',
					'sub_toggle'     => 'ol',
				),
				'step_text_quote' => array(
					'label'          => esc_html__( 'Blockquote', 'divi-plus' ),
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
					'css'            => array(
						'main' => '.dipl_how_to_schema %%order_class%% .dipl_step_desc blockquote',
					),
					'toggle_slug'    => 'step_description_settings',
					'sub_toggle'     => 'quote',
				),
			),
			'borders'        => array(
				'default' => array(
					'css' => array(
						'main' => array(
							'border_radii'  => '%%order_class%%',
							'border_styles' => '%%order_class%%',
						),
					),
				),
			),
			'box_shadow'     => array(
				'default' => array(
					'css' => array(
						'main' => '%%order_class%%',
					),
				),
			),
			'margin_padding' => array(
				'css' => array(
					'main'      => '%%order_class%%',
					'important' => 'all',
				),
			),
			'height'         => false,
			'link_options'   => false,
			'text'           => false,
		);
	}

	public function get_fields() {
		$et_accent_color = et_builder_accent_color();

		return array(
			'step_title' => array(
				'label'           => esc_html__( 'Title', 'divi-plus' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'step_content',
				'description'     => esc_html__( 'Here you can input the text to be used for the  step title.', 'divi-plus' ),
			),
			'content'    => array(
				'label'           => esc_html__( 'Content', 'divi-plus' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'step_content',
				'description'     => esc_html__( 'Here you can input the text to be used for the step content.', 'divi-plus' ),
			),
			'step_image' => array(
				'label'              => esc_html__( 'Image', 'divi-plus' ),
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'upload_button_text' => esc_attr__( 'Upload an image', 'divi-plus' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'divi-plus' ),
				'update_text'        => esc_attr__( 'Set As Image', 'divi-plus' ),
				'tab_slug'           => 'general',
				'toggle_slug'        => 'step_content',
				'description'        => esc_html__( 'Here you can upload the image to be used for the step.', 'divi-plus' ),
			),
		);
	}

	public function render( $attrs, $content, $render_slug ) {
		$step_title   = esc_attr( $this->props['step_title'] );
		$step_image   = esc_attr( $this->props['step_image'] );
		$header_level = esc_attr( $this->props['step_heading_level'] ) ? esc_attr( $this->props['step_heading_level'] ) : 'h4';
		$order_class  = $this->get_module_order_class( 'dipl_how_to_schema_item' );
		$order_number = str_replace( '_', '', str_replace( 'dipl_how_to_schema_item', '', $order_class ) );
		$unique_id    = 'item_' . $order_number;
		/*Getting the URL similar to Divi's Contact Form Module*/
		$page_url = ( isset( $_SERVER['HTTP_HOST'] ) ? esc_url_raw( wp_unslash( $_SERVER['HTTP_HOST'] ) ) : '' ) . ( isset( $_SERVER['REQUEST_URI'] ) ? esc_url_raw( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : '' );

		if ( '' !== $step_title ) {
			$step_title = sprintf( '<div class="dipl_step_title" itemprop="name"><%2$s>%1$s</%2$s></div>', $step_title, $header_level );
		} else {
			$step_title = '';
		}

		if ( '' !== $this->content ) {
			$content = sprintf( '<div class="dipl_step_desc" itemprop="text">%1$s</div>', $this->content );
		} else {
			$content = '';
		}

		if ( '' !== $step_image ) {
			$step_image = sprintf( '<div class="dipl_step_image" itemprop="image" itemscope itemtype="https://www.schema.org/ImageObject"><link itemprop="url" href="%1$s"><img src="%1$s"/></div>', $step_image );
		} else {
			$step_image = '';
		}

		$file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        wp_enqueue_style( 'dipl-how-to-schema-item-style', PLUGIN_PATH . 'includes/modules/HowToSchemaItem/' . $file . '.min.css', array(), '1.0.0' );

		return sprintf(
			'<div id="%4$s" class="dipl_step_wrapper" itemprop="step" itemscope itemtype="http://schema.org/HowToStep">
                            <div class="dipl_step_content">
                                %1$s
                                %2$s
                            </div>
                            %3$s
                            <meta itemprop="url" content="%5$s#%4$s" />
                        </div>',
			$step_title,
			$content,
			$step_image,
			$unique_id,
			$page_url
		);
	}
}
$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
    $modules = explode( ',', $plugin_options['dipl-modules'] );
    if ( in_array( 'dipl_how_to_schema', $modules ) ) {
        new DIPL_HowToSchema_Item();
    }
} else {
    new DIPL_HowToSchema_Item();
}
