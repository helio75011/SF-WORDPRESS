<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.3
 */
class DIPL_FAQPageSchema_Item extends ET_Builder_Module {

	public $slug       = 'dipl_faq_page_schema_item';
	public $type       = 'child';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name             = esc_html__( 'DP Question', 'divi-plus' );
		$this->plural           = esc_html__( 'DP Questions', 'divi-plus' );
		$this->child_title_var  = 'faq_question';
		$this->main_css_element = '%%order_class%%';
	}

	public function get_settings_modal_toggles() {
		return array(
			'general'  => array(
				'toggles' => array(
					'question_content' => array(
						'title'    => esc_html__( 'Content', 'divi-plus' ),
						'priority' => 1,
					),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'question_heading_setting'       => array(
						'title'    => esc_html__( 'Question', 'divi-plus' ),
						'priority' => 1,
					),
					'answer_text_settings'           => array(
						'title'             => esc_html__( 'Answer', 'divi-plus' ),
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
					'single_question_answer_padding' => array(
						'title'    => esc_html__( 'Question Answer Spacing', 'divi-plus' ),
						'priority' => 3,
					),
				),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts'                   => array(
				'question_heading'  => array(
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
						'main' => '.dipl_faq_page_schema %%order_class%% .dipl_question_wrapper h1, .dipl_faq_page_schema %%order_class%% .dipl_question_wrapper h2, .dipl_faq_page_schema %%order_class%% .dipl_question_wrapper h3, .dipl_faq_page_schema %%order_class%% .dipl_question_wrapper h4, .dipl_faq_page_schema %%order_class%% .dipl_question_wrapper h5, .dipl_faq_page_schema %%order_class%% .dipl_question_wrapper h6',
					),
					'toggle_slug'    => 'question_heading_setting',
				),
				'answer_text'       => array(
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
						'main' => '.dipl_faq_page_schema %%order_class%% .dipl_answer_wrapper, .dipl_faq_page_schema %%order_class%% .dipl_answer_wrapper p',
					),
					'toggle_slug'    => 'answer_text_settings',
					'sub_toggle'     => 'p',
				),
				'answer_text_link'  => array(
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
						'main' => '.dipl_faq_page_schema %%order_class%% .dipl_answer_wrapper a',
					),
					'toggle_slug'    => 'answer_text_settings',
					'sub_toggle'     => 'a',
				),
				'answer_text_ul'    => array(
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
						'main' => '.dipl_faq_page_schema %%order_class%% .dipl_answer_wrapper ul li',
					),
					'toggle_slug'    => 'answer_text_settings',
					'sub_toggle'     => 'ul',
				),
				'answer_text_ol'    => array(
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
						'main' => '.dipl_faq_page_schema %%order_class%% .dipl_answer_wrapper ol li',
					),
					'toggle_slug'    => 'answer_text_settings',
					'sub_toggle'     => 'ol',
				),
				'answer_text_quote' => array(
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
						'main' => '.dipl_faq_page_schema %%order_class%% .dipl_answer_wrapper blockquote',
					),
					'toggle_slug'    => 'answer_text_settings',
					'sub_toggle'     => 'quote',
				),
			),
			'borders'                 => array(
				'default' => array(
					'css'      => array(
						'main' => array(
							'border_radii'  => '%%parent_class%% .et_pb_module%%order_class%%',
							'border_styles' => '%%parent_class%% .et_pb_module%%order_class%%',
						),
					),
					'defaults' => array(
						'border_radii'  => 'on||||',
						'border_styles' => array(
							'width' => '1px',
							'color' => '#d9d9d9',
							'style' => 'solid',
						),
					),
				),
			),
			'box_shadow'              => array(
				'default' => array(
					'css' => array(
						'main' => '%%order_class%%',
					),
				),
			),
			'margin_padding'          => array(
				'css' => array(
					'main'      => '%%order_class%%',
					'important' => 'all',
				),
			),
			'question_answer_padding' => array(
				'question' => array(
					'label'          => 'Question Padding',
					'margin_padding' => array(
						'css' => array(
							'main'      => '%%parent_class%% .et_pb_module%%order_class%% .dipl_question_wrapper',
							'important' => 'all',
						),
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'single_question_answer_padding',
				),
				'answer'   => array(
					'label'          => 'Answer Padding',
					'margin_padding' => array(
						'css' => array(
							'main'      => '%%parent_class%% .et_pb_module%%order_class%% .dipl_answer_wrapper',
							'important' => 'all',
						),
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'single_question_answer_padding',
				),
			),
			'background'              => false,
			'max_width'               => false,
			'height'                  => false,
			'link_options'            => false,
			'text'                    => false,
		);
	}

	public function get_fields() {
		$et_accent_color = et_builder_accent_color();

		return array(
			'faq_question'            => array(
				'label'           => esc_html__( 'Question', 'divi-plus' ),
				'type'            => 'text',
				'dynamic_content' => 'text',
				'option_category' => 'basic_option',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'question_content',
				'description'     => esc_html__( 'Here you can input the text to be used for the Question field of the FAQ.', 'divi-plus' ),
			),
			'content'                 => array(
				'label'           => esc_html__( 'Answer', 'divi-plus' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'question_content',
				'description'     => esc_html__( 'Here you can input the text to be used for the Answer field of the FAQ.', 'divi-plus' ),
			),
			'question_custom_padding' => array(
				'label'           => esc_html__( 'Question Padding', 'divi-plus' ),
				'type'            => 'custom_padding',
				'option_category' => 'layout',
				'mobile_options'  => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'single_question_answer_padding',
				'description'     => esc_html__( 'Padding adds extra space to the inside of the element, increasing the distance between the edge of the element and its inner contents.', 'divi-plus' ),
			),
			'answer_custom_padding'   => array(
				'label'           => esc_html__( 'Answer Padding', 'divi-plus' ),
				'type'            => 'custom_padding',
				'option_category' => 'layout',
				'mobile_options'  => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'single_question_answer_padding',
				'description'     => esc_html__( 'Padding adds extra space to the inside of the element, increasing the distance between the edge of the element and its inner contents.', 'divi-plus' ),
			),
		);
	}

	public function render( $attrs, $content, $render_slug ) {
		$faq_question = esc_attr( $this->props['faq_question'] );
		$header_level = esc_attr( $this->props['question_heading_level'] ) ? esc_attr( $this->props['question_heading_level'] ) : 'h4';

		if ( '' !== $faq_question ) {
			$faq_question = sprintf( '<div class="dipl_question_wrapper"><%2$s itemprop="name">%1$s</%2$s></div>', $faq_question, $header_level );
		} else {
			$faq_question = '';
		}

		if ( '' !== $this->content ) {
			$content = sprintf( '<div class="dipl_answer_wrapper" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer"><div itemprop="text">%1$s</div></div>', $this->content );
		} else {
			$content = '';
		}

		$this->process_advanced_css( $this, $render_slug, $this->margin_padding );
		return sprintf(
			'<div class="dipl_faq_item_wrapper" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                %1$s
                %2$s
            </div>',
			$faq_question,
			$content
		);
	}

	protected function _render_module_wrapper( $output = '', $render_slug = '' ) {
		$wrapper_settings    = $this->get_wrapper_settings( $render_slug );
		$slug                = $render_slug;
		$outer_wrapper_attrs = $wrapper_settings['attrs'];      /**
		* Filters the HTML attributes for the module's outer wrapper. The dynamic portion of the
		* filter name, '$slug', corresponds to the module's slug.
		*
		* @since 3.23 Add support for responsive video background.
		* @since 3.1
		*
		* @param string[]           $outer_wrapper_attrs
		* @param ET_Builder_Element $module_instance
		*/
		$outer_wrapper_attrs = apply_filters( "et_builder_module_{$slug}_outer_wrapper_attrs", $outer_wrapper_attrs, $this );
		return sprintf(
			'<div%1$s>
				%2$s
			</div>',
			et_html_attrs( $outer_wrapper_attrs ),
			$output
		);
	}

	public function process_advanced_css( $module, $function_name, $margin_padding ) {
		$utils           = ET_Core_Data_Utils::instance();
		$all_values      = $module->props;
		$advanced_fields = $module->advanced_fields;
		if ( ! $module->has_vb_support() && ! $module->has_advanced_fields ) {
			return;
		}
		$allowed_advanced_fields = array( 'form_field', 'button', 'question_answer_padding' );
		foreach ( $allowed_advanced_fields as $advanced_field ) {
			if ( ! empty( $advanced_fields[ $advanced_field ] ) ) {
				foreach ( $advanced_fields[ $advanced_field ] as $label => $form_field ) {
					$padding_key = "{$label}_custom_padding";
					if ( '' !== $utils->array_get( $all_values, $padding_key, '' ) ) {
						$settings                      = $utils->array_get( $form_field, 'margin_padding', array() ); // Ensure main selector exists.
						$form_field_margin_padding_css = $utils->array_get( $settings, 'css.main', '' );
						if ( empty( $form_field_margin_padding_css ) ) {
							$utils->array_set( $settings, 'css.main', $utils->array_get( $form_field, 'css.main', '' ) );
						}                        $margin_padding->update_styles( $module, $label, $settings, $function_name, $advanced_field );
					}
				}
			}
		}
	}
}
$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
	$modules = explode( ',', $plugin_options['dipl-modules'] );
	if ( in_array( 'dipl_faq_page_schema', $modules ) ) {
		new DIPL_FAQPageSchema_Item();
	}
} else {
	new DIPL_FAQPageSchema_Item();
}
